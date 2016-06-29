<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FaqController extends Controller
{
    public function index()
    {
        //FAQ
        return view('csgo.faq');
    }
}
