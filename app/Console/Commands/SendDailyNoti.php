<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LaraSignal;

class SendDailyNoti extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:noti';

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
     * @return mixed
     */
    public function handle()
    {
        $title = "Trưa nay ăn gì?";
        $subTitle = 'Click vào để xem món ăn hấp dẫn nào sẽ là bữa trưa của bạn.';
        LaraSignal::sendToSegments($segments = ['All'], $title, $subTitle, [1 => 1], $options = []);
    }
}
