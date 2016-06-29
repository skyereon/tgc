<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;

class RoomviewcreatorController extends Controller
{
    public function index($id)
    {
        $gamedata =  DB::select('select * from games where id = ? limit 1',[$id]);
        $gamedata = (array)$gamedata[0];
        //print_r($gamedata);
        return view('csgo.roomviewcreator',$gamedata);
    }

    public function delete($id)
    {
        DB::delete('delete from games where id = ? limit 1',[$id]);
        return redirect('/csgo');
    }

    public function joincancel($id)
    {
        if ($_POST['val']=="send") {
            $response = DB::select('select * from player_state where player_id = ? limit 1', [Auth::user()->id]);
            if ($response[0]->free == 0) {
                DB::update('update player_state set free = 1, room = ? where player_id = ? limit 1', [$id, Auth::user()->id]);
                return redirect("/csgo/roomview/" . $id);
            } else
                return redirect('/csgo');
        }else
            if ($_POST['val']=="cancel")
            {
                DB::update('update player_state set free = 0, room = 0 where player_id = ? limit 1', [Auth::user()->id]);
                return redirect("/csgo/roomview/" . $id);
            }
    }
}
