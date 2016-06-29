<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportsController extends Controller
{
    public function index()
    {
        //Reports
        return view('csgo.reports');
    }
}
