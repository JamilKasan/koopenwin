<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;

class Sms
{
    public $number;
    public string $text;


    public function send()
    {
        try
        {
            Http::get('http://192.168.1.206/cgi/WebCGI?1500101=account=smsapi&password=P@ssw0rd&port=1&destination=' . $this->number . '&content=' . urlencode($this->text));
        }
        catch (\Exception $e)
        {
        }
    }
}
