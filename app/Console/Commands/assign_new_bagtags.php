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


        return 0;
    }
}
