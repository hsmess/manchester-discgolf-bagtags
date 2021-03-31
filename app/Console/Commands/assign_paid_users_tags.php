<?php

namespace App\Console\Commands;

use App\Models\Bagtag;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class assign_paid_users_tags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tags:assign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign BagTags to all the paying users and email them to tell them what we did and what tag they start with';

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
        $players = User::where('paid_2021',true)->get()->sortByDesc(function ($item){
            return $item->donation_amount;
        });
        //check if we already have tags for some reason...
        $first = DB::table('bagtags')->latest('created_at')->first();
        if($first != null)
        {
            $initial_tag = $first['tag_number'] + 1;
        }
        else{
            $initial_tag = 1;
        }
        $players->each(function ($item) use (&$initial_tag){
            $t = new Bagtag();
            $t->tag_number = $initial_tag;
            $t->save();
            $initial_tag++;
            $item->bagtags()->attach($t);
            Log::info($item->name . ' Gets tag ' . $t->tag_number);
        });

        return 0;
    }
}
