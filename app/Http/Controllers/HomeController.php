<?php

namespace App\Http\Controllers;

use App\Contact;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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

    public function offers()
    {
        return view('offers');
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
        $contact->next_payment_at = Carbon::now()->addDays(3);
        //$contact->next_sms_at = Carbon::now()->addMinutes(20);
        $contact->save();

        return redirect()->route('first.paid', $contact->id);

//        return response()->json([
//            'id' => $contact->id,
//        ]);
    }

    public function openSms($id)
    {
        $contact = Contact::where('id', $id)->first();
        $contact->sms_checked = true;
        $contact->next_sms_at = Carbon::now()->addDays(3);
        $contact->save();
    }
}
