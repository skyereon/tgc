<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class HeartstoneController extends Controller
{
    public function index()
    {
        return view('heartstone.index');
    }
}
