<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Offer;
use App\PersonalLink;
use App\Services\SmsService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        if (!isset($_COOKIE["TestCookie1"]) && PersonalLink::where('link', Request::capture()->url())->exists()) {
            $personalLink = PersonalLink::where('link', Request::capture()->url())->first();
            $personalLink->openings++;
            $personalLink->save();
            setcookie("TestCookie1", $personalLink->id, time() + 3600, (route('index') . '/'));
        }

        return view('index');
    }

    public function callBack()
    {
        return view('call_back');
    }

    public function loan()
    {
        return view('loan');
    }

    public function loading()
    {
        return view('loading');
    }

    public function offers()
    {
        $offers = Offer::orderBy('position', 'ASC')->get();
        return view('offers', compact('offers'));
    }

    public function unNewsletters()
    {
        return view('unNewsletters');
    }

    public function unSubscribe()
    {
        return view('unSubscribe');
    }

    public function saveData(Request $request)
    {
        $contact = new Contact();
        if ($request->input('email') != null) {
            $contact->email = $request->input('email');
        }
        $contact->phone = $request->input('phone');
        $contact->next_payment_at = Carbon::now()->endOfDay();

        if ($request->email != null && $request->surname != null && $request->code != null && $request->placeBirth != null) {
            $contact->full_info = true;
        }

        if (isset($_COOKIE["TestCookie1"])) {
            $link = PersonalLink::where('id', $_COOKIE["TestCookie1"])->first();
            $contact->link_id = $link->id;
        }

        $contact->save();

        return redirect()->route('first.paid', $contact->id);
    }

    public function openSms($id)
    {
        $contact = Contact::where('id', $id)->first();
        $contact->sms_checked = true;
        $contact->next_sms_at = Carbon::now()->addDays(3);
        $contact->save();
    }
}
