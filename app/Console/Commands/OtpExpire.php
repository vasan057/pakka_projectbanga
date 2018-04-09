<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class OtpExpire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:otp_expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command To delete otp after 30min';

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
        \Log::info("now 30 min");
    }
}
