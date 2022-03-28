<?php

namespace App\Console\Commands;

use App\Models\Bagtag;
use App\Models\TagOrder;
use App\Models\TicketOrder;
use App\Models\TicketPayment;
use App\Models\TournamentEntry;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class update_metadata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:metadata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $stripe = new \Stripe\StripeClient(
            config('enums.stripe_secret')
        );


        TagOrder::where('created_at','>',Carbon::create(2022,01,01))->get()->each(function ($item) use ($stripe){
            $total = $item->amount - 500;
            if(Str::contains(substr( $total, -2 ),'9'))
            {
                $total = $total - 390;
            }
            $stripe->paymentIntents->update(
                $item->payment_intent_id,
                ['metadata' => ['lilford' => $total/100]]
            );
        });

        TournamentEntry::where('tournament_id',1)->get()->each(function ($item) use ($stripe){

            $stripe->paymentIntents->update(
                $item->payment_intent_id,
                ['metadata' => ['lilford' => $item->donation + 4]]
            );
        });

        TicketOrder::all()->each(function ($item) use ($stripe){
            $stripe->paymentIntents->update(
                $item->payment_intent_id,
                ['metadata' => ['lilford' => $item->donation]]
            );
        });
    }
}
