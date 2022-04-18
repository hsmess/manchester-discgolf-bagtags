<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bagtag;
use App\Models\Address;
use App\Models\Payment;
use App\Models\TagOrder;
use App\Models\TicketOrder;
use App\Models\TicketPayment;
use App\Models\Tournament;
use App\Models\TournamentEntry;
use App\Models\TournamentPayment;
use App\Models\User;
use App\Notifications\NotifyOfMWO2Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class TournamentController extends Controller
{


    public function pay(Request $request){

        $user = User::find($request->user_id);
        $tournament = Tournament::find($request->tournament_id);

        Stripe::setApiKey(config('enums.stripe_secret'));

        $tournamentEntry = new TournamentEntry();
        $tournamentEntry->amount = ($request->entry + $request->acepot + $request->donation) * 100;
        $tournamentEntry->user_id = $user->id;
        $tournamentEntry->tournament_id = $tournament->id;
        $tournamentEntry->acepot = $request->acepot;
        $tournamentEntry->donation = $request->donation;
        $tournamentEntry->first_name = $request->first_name;
        $tournamentEntry->last_name = $request->last_name;
        $tournamentEntry->division = $request->division;
        $tournamentEntry->pdga_number = $request->pdga_number;
        $customer = null;
        if($user->stripe_customer_token != null)
        {
            try{
                $customer = Customer::retrieve($user->stripe_customer_token);
            }
            catch(ApiErrorException $e)
            {
                //Case where a customer has a token but Stripe doesn't recognise it. We want to do the below code so this block left intentionally empty
            }
            catch(\Exception $e)
            {
                Log::info('__________Stripe Error.  __________');
                Log::critical($e);
                Log::info('__________ End __________');
            }
        }
        if($customer === null)
        {
            $customer =  Customer::create([
                'name' => $user->name,
                'email' => $user->email
            ]);
        }
        $user->stripe_customer_token = $customer->id;
        $user->save();
        $payment_intent = PaymentIntent::create([
            'amount' => $tournamentEntry->amount,
            'currency' => 'gbp',
            'customer' =>   $user->stripe_customer_token,
            'setup_future_usage' => 'on_session',
            'metadata' => [
                'name' => $user->name,
                'email' => $user->email,
                'source' => 'tournament-registration-'.Str::slug($tournament->name),
                'lilford' => $tournamentEntry->donation + 4
            ]
        ]);
        $tournamentEntry->payment_intent_id = $payment_intent->id;
        $tournamentEntry->save();
        return response()->json(['client_secret' => $payment_intent->client_secret, 'price'=>$tournamentEntry->amount,'order_id'=>$tournamentEntry->id]);
    }

    public function confirm(Request $request)
    {
        $to = TournamentEntry::where('id',$request->order_id)->firstOrFail();
        Stripe::setApiKey(config('enums.stripe_secret'));
        $payment_intent = PaymentIntent::retrieve($to->payment_intent_id);
        if ($payment_intent->canceled_at){
            return ['error' => 'Order Cancelled'];
        }
        if (!$payment_intent->charges){
            return ['error'=> 'No Charges'];
        }
        if ($payment_intent->status == 'requires_action'){
            return ['error'=> 'Customer did not complete checkout'];
        }
        if ($payment_intent->status == 'requires_payment_method'){
            return ['error'=> 'Customer\'s Payment failed on device'];
        }
        //this means we do have a charge, so grab it
        if(count($payment_intent->charges) == 0)
        {
            Log::critical('Attempt to count charges before charges');
            return ['error'=> 'Stripe Charge has not yet been made'];
        }

        $charge = $payment_intent->charges->data[0];
        try {
            //and retrieve the record of this balance transaction occurring from the charge
            $balance_transaction = \Stripe\BalanceTransaction::retrieve($charge->balance_transaction);
            //This is proof that the payment worked.
            //So we can confirm that.
            $payment = TournamentPayment::where('stripe_token', $charge->id)->first();
            if ($payment == null)
            {
                $payment = new TournamentPayment();
            }
            $payment->user_id = $request->user_id;
            $payment->tournament_entry_id = $to->id;
            $payment->stripe_token = $charge->id;
            $payment->fee = $balance_transaction->fee;
            $payment->amount = $payment_intent->amount;
            $payment->save();


        }
        catch (\Exception $e){
            //We have a big problem. Not able to retrieve data from the charge!
            Log::critical('Charge with no balance transaction?: ' . $e->getMessage());
            return ['error'=> 'No associated balance transaction'];
        }
        if($to->tournament_id === 2)
        {
            User::find($request->user_id)->notify(new NotifyOfMWO2Place());
        }
        return ['success'=>'Payment Approved!'];
    }
//
//    public function update(\App\Models\Bagtag $bagtag, Request $request)
//    {
//        $user = User::where('id',$request->new_user_id)->firstOrFail();
////        $user_old_tag = $user->bagtags->sortByDesc('pivot.created_at')->first();
////        $user_old_tag->currently_unassigned = true;
////        $user_old_tag->save();
//        $user->bagtags()->attach($bagtag);
////        $bagtag->currently_unassigned = false;
//        $bagtag->save();
//        return [
//            'tags' => Bagtag::collection(\App\Models\Bagtag::where('year',2022)->get()),
//            'users' => \App\Http\Resources\User::collection(\App\Models\User::where('paid_2022',true)->get()->sortBy('name'))
//        ];
//    }
}
