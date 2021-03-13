<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Payment;
use App\Models\TagOrder;
use App\Models\User;
use App\PaymentRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class ApiController extends Controller
{
    public function pay(Request $request){

        $user = User::find($request->user_id);
        if($request->shipping_required)
        {
            $address = new Address();
            $address->address_line_1 = $request->address_line_1;
            $address->address_line_2 = $request->address_line_2;
            $address->city = $request->city;
            $address->state = $request->county;
            $address->postal_code = $request->postcode;
            $address->save();
            $user->shipping_address_id = $address->id;
            $user->save();
        }
        Stripe::setApiKey(config('enums.stripe_secret'));
        $tagOrder = new TagOrder();
        if($request->shipping_required)
        {
            $tagOrder->amount = ($request->shipping + $request->donation + $request->tag) * 100;
        }
        else{
            $tagOrder->amount = ($request->donation + $request->tag) * 100;
        }
        $tagOrder->user_id = $user->id;
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
           $customer =  Customer::create();
        }
        $user->stripe_customer_token = $customer->id;
        $user->save();
        $payment_intent = PaymentIntent::create([
            'amount' => $tagOrder->amount,
            'currency' => 'gbp',
            'customer' =>   $user->stripe_customer_token,
            'setup_future_usage' => 'on_session'
        ]);
        $tagOrder->payment_intent_id = $payment_intent->id;
        $tagOrder->save();
        return response()->json(['client_secret' => $payment_intent->client_secret, 'price'=>$tagOrder->amount,'order_id'=>$tagOrder->id]);
    }

    public function confirm(Request $request)
    {
        $to = TagOrder::where('id',$request->order_id)->firstOrFail();
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
            $payment = Payment::where('stripe_token', $charge->id)->first();
            if ($payment == null)
            {
                $payment = new Payment();
            }
            $payment->user_id = $request->user_id;
            $payment->stripe_token = $charge->id;
            $payment->fee = $balance_transaction->fee;
            $payment->amount = $payment_intent->amount;
            $payment->save();
            $to->user->paid_2021 = true;
            $to->user->save();
        }
        catch (\Exception $e){
            //We have a big problem. Not able to retrieve data from the charge!
            Log::critical('Charge with no balance transaction?: ' . $e->getMessage());
            return ['error'=> 'No associated balance transaction'];
        }
        return ['success'=>'Payment Approved!'];
    }
}
