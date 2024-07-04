<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;

class Check_open_news extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:check_open_news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check_open_news';

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
        $currentDateTime = Carbon::now();

        // อัพเดต status เป็น 'Yes' ถ้าวันเวลาปัจจุบันอยู่ระหว่าง datetime_start และ datetime_end
        DB::table('news')
            ->where('datetime_start', '<=', $currentDateTime)
            // ->where('datetime_end', '>=', $currentDateTime)
            ->update(['status' => 'Yes']);

        // อัพเดต status เป็น null ถ้าวันเวลาปัจจุบันไม่อยู่ระหว่าง datetime_start และ datetime_end
        DB::table('news')
            // ->where('datetime_start', '<=', $currentDateTime)
            ->where('datetime_end', '!=', null)
            ->where('datetime_end', '<', $currentDateTime)
            ->update(['status' => null]);
    }

}
