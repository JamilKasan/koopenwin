<?php

namespace App\Http\Controllers;

use App\Mail\ThankYou;
use App\Models\PromoCode;
use App\Models\PromoEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PromoEntryController extends Controller
{
    public function store(Request $request)
    {
        if (PromoCode::query()->where('code', $request->code)->exists())
        {
            $entry = new PromoEntry();
            $entry->code = $request->code;
            $entry->name = $request->name;
            $entry->firstname = $request->firstname;
            $entry->contact = $request->contact;
            $entry->email = $request->email;
            $entry->save();

            $code = PromoCode::query()->where('code', $request->code)->first();
            if ($code->times_used == null)
            {
                $code->times_used = 1;

            }
            else{
                $code->times_used++;
            }
            $code->save();
            Mail::to($entry->email)->send(new ThankYou($entry->_id));
            return redirect(route('thank-you'));
        }
        else
        {
            session()->flash('promo_error', 'Your promo code is invalid');
            return back();
        }

    }
}
