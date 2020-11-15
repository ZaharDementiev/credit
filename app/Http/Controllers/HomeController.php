<?php

namespace App\Http\Controllers;

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
}
