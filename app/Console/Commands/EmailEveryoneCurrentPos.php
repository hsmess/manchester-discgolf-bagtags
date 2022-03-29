<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\EmailTagPos;
use Illuminate\Console\Command;

class EmailEveryoneCurrentPos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'everyone:email';

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
        $players = User::where('paid_2022',true)->get()->each(function ($user){
//            $user->notify(new EmailTagPos($user->current_tag_position));
            ray($user->current_tag_position);
        });
    }
}
