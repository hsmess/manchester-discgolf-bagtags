<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\TournamentEntry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class TournamentController extends Controller
{
    public function mwo2(Request $request){
        $data = $request->all();
        $total = 0;
        if($data['tournament-entry'] === 'standard')
        {
            $total += 35;
        }
        else{
            $total += 50;
        }
        if($data['ace-pot'] === 'true')
        {
            $total += 1;
        }
        $total += $data['lilford-donation'];

        $user = User::firstOrCreate(['email' => $data['email']],['name' => $data['name'],'password'=>bcrypt('discgolf1')]);
        $user->save();




        $tournament = Tournament::find(2);

        Stripe::setApiKey(config('enums.stripe_secret'));

        $tournamentEntry = new TournamentEntry();
        $tournamentEntry->amount = ($total) * 100;
        $tournamentEntry->user_id = $user->id;
        $tournamentEntry->tournament_id = $tournament->id;
        $tournamentEntry->acepot = $request->acepot;
        $tournamentEntry->donation = $request->donation;
        $tournamentEntry->first_name = explode(' ',$request->name)[0];
        $tournamentEntry->last_name = explode(' ',$request->name)[1];
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
                'lilford' => $tournamentEntry->donation + 10
            ]
        ]);
        $tournamentEntry->payment_intent_id = $payment_intent->id;
        $tournamentEntry->save();
//        ['client_secret' => $payment_intent->client_secret, 'price'=>$tournamentEntry->amount,'order_id'=>$tournamentEntry->id]
        //pass those 3 things to the view
        //render the box
        //confirm payment?
        
    }

}
