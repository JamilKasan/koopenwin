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
        $codeUpper = ensureLastLetterUppercase($request->code);
        if ($code->validate())
        {
            if ( session()->has('request_values'))
            {
                session()->remove('request_values');
            }
            if (!PromoEntry::query()->where('code', $codeUpper)->exists())
            {
                $entry = new PromoEntry();
                $entry->code = $codeUpper;
                $entry->name = $request->name;
                $entry->firstname = $request->firstname;
                $entry->contact = $request->contact;
                $entry->location = $request->location;
                $entry->save();
            }
            $text = SmsMessage::query()->first();
            $sms = new Sms();
            $sms->number = removeCountryCode($request->contact);
            $text2 = str_replace('{name}', $request->firstname, $text->text);
            $text2 = str_replace('{code}', $codeUpper, $text2);
            $sms->text = $text2;
            $sms->send();
            return redirect(route('thank-you'));
        }
        else
        {
            $values = [];
            $values['code'] = $request->code;
            $values['name'] = $request->name;
            $values['firstname'] = $request->firstname;
            $values['contact'] = $request->contact;
            $values['location'] = $request->location;
            session()->flash('promo_error', 'Your promo code is invalid');
            session()->put('request_values', json_encode($values, true));
            return redirect('/');
        }

    }
}
