<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class RoomviewController extends Controller
{
    public function index($id)
    {
        $gamedata =  DB::select('select * from games where id = ? limit 1',[$id]);
        $gamedata = (array)$gamedata[0];
        //print_r($gamedata);
        return view('csgo.roomview',$gamedata);
    }

    public function redirectroom()
    {
        $gamedata =  DB::select('select * from games where id = ? limit 1',[$_POST['room_id']]);
        $gamedata = (array)$gamedata[0];
        //print_r($gamedata);
        return view('csgo.roomview',$gamedata);
    }
}
