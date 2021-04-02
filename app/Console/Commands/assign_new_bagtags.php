<?php

namespace App\Console\Commands;

use App\Http\Resources\User;
use App\Models\Bagtag;
use App\Notifications\EmailTagPos;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class assign_new_bagtags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagtags:new';

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
        $start_tag = Bagtag::latest()->first()->tag_number + 1;

        $users = \App\Models\User::where('paid_2021',true)->get()->filter(function ($item) {
            return $item->current_tag_position == "Unassigned";
        })->each(function ($item) use (&$start_tag){
            $t = new Bagtag();
            $t->tag_number = $start_tag;
            $t->save();
            $start_tag++;
            $item->bagtags()->attach($t);
            Log::info($item->name . ' Gets tag ' . $t->tag_number);
            $user = $item->fresh();
            $user->notify(new EmailTagPos($user->current_tag_position));
        });

        return 0;
    }
}
