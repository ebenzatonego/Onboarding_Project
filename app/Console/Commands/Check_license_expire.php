<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class Check_license_expire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:check_license_expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check_license_expire';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $currentDate = Carbon::now()->toDateString();

        DB::table('users')
            ->whereDate('license_expire', '=', $currentDate)
            ->update(['status_login' => 'Inactive']);

    }

}
