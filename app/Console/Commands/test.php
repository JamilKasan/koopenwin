<?php

namespace App\Console\Commands;

use App\Classes\CodeValidation;
use App\Classes\Sms;
use App\Mail\ThankYou;
use App\Models\SmsMessage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

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
        function isCodeInRange($code, $start, $end) {
            if (!preg_match('/^\d{4}[A-Za-z]$/', $code) ||
                !preg_match('/^\d{4}[A-Za-z]$/', $start) ||
                !preg_match('/^\d{4}[A-Za-z]$/', $end)) {
            }

            $codeValue = convertToComparable($code);
            $startValue = convertToComparable($start);
            $endValue = convertToComparable($end);

            return $codeValue >= $startValue && $codeValue <= $endValue;
        }

        function convertToComparable($code) {
            $digits = substr($code, 0, 4);
            $letter = strtoupper(substr($code, 4, 1));

            return $digits . '_' . ord($letter);
        }
        $code = "0119O";
        $start = "0001A";
        $end = "0119P";

        if (isCodeInRange($code, $start, $end)) {
            echo "The code is within the range.";
        } else {
            echo "The code is not within the range.";
        }
//        $text = SmsMessage::query()->first();
//        $sms = new Sms();
//        $sms->number = removeCountryCode('+5978744174');
//        $sms->text = $text->text;
//        $sms->send();


//        try {
//            Http::get('http://192.168.1.206/cgi/WebCGI?1500101=account=smsapi&password=P@ssw0rd&port=1&destination=8744174&content=' . urlencode($text->text));
//        }
//        catch(Exception $e)
//        {
//
//        }


// Example usage
//        $code = new CodeValidation();
//        $code->start = '0001A';
//        $code->end = '0003Z';
//        $code->code = '0003a';
//
//        if ($code->validate()) {
//            echo "The code is within the range.";
//        } else {
//            echo "The code is not within the range.";
//        }

//        Mail::to('jamilkasan123@gmail.com')->send(new ThankYou('667b0b67302d1eaa6e0c7e92'));
    }
}
