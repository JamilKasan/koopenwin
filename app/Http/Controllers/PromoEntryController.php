<?php

namespace App\Http\Controllers;

use App\Classes\CodeValidation;
use App\Classes\Sms;
use App\Mail\ThankYou;
use App\Models\CodeRange;
use App\Models\PromoCode;
use App\Models\PromoEntry;
use App\Models\SmsMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PromoEntryController extends Controller
{
    public function store(Request $request)
    {
        $codeRange = CodeRange::query()->first();
        $code = new CodeValidation();
        $code->code = $request->code;
        $code->start = $codeRange->start;
        $code->end = $codeRange->end;
        if ($code->validate())
        {
            $entry = new PromoEntry();
            $entry->code = $request->code;
            $entry->name = $request->name;
            $entry->firstname = $request->firstname;
            $entry->contact = $request->contact;
            $entry->location = $request->location;
            $entry->save();
            $text = SmsMessage::query()->first();
            $sms = new Sms();
            $sms->number = removeCountryCode($request->contact);
            $sms->text = $text->text;
            $sms->send();
            return redirect(route('thank-you'));
        }
        else
        {
            session()->flash('promo_error', 'Your promo code is invalid');
            return back();
        }

    }
}
