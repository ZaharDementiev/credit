<?php

namespace App\Http\Controllers;

use App\Contact;
use App\PersonalLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PersonalLinkController extends Controller
{
    public function linkOpened($ref, $id)
    {
        $contact = Contact::where('id', $id)->first();
        $contact->sms_checked = true;
        $contact->save();
        $link = URL::to('/') . '/' . $ref;
        return redirect($link);
    }
}
