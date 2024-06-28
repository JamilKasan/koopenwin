<?php

namespace App\Console\Commands;

use App\Mail\ThankYou;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to('jamilkasan123@gmail.com')->send(new ThankYou('667b0b67302d1eaa6e0c7e92'));
    }
}
