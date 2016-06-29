<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DB;
use Auth;
use App\Http\Requests;

class CreateroomController extends Controller
{
    public function index()
    {
        //создание комнаты
        return view('csgo.createroom');
    }

    public function createroom()
    {
        $now = new DateTime();
        $result = DB::insert('insert into games (id, name, date, map, result, players, rate, type, rounds, fullness,password,creator_id)
 values (NULL,?,?,?,-1,?,?,?,?,1,?,?)', [$_POST['gamename'],$now,$_POST['selectmap'],$_POST['selectplayers'],
 $_POST['cash'],$_POST['selecttype'],$_POST['selectrounds'],$_POST['gamepassword'],Auth::user()->id]);
        $lastid = DB::getPdo()->lastInsertId();
       return redirect('/csgo/roomviewcreator/'.$lastid);

    }
}
