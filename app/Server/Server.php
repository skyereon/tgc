<?php

namespace App\Server;

use Illuminate\Support\Facades\Auth;
use DB;

class Server
{

    public function checkRegistration($userid)
    {
        $response = DB::select('select * from player_state where player_id = ? limit 1',[$userid]);
        if ($response[0]->free == 0)
            return false;
        else
            return true;
    }

    public function isThisRoom($userid,$roomid)
    {
        $response = DB::select('select * from player_state where player_id = ? limit 1',[$userid]);
        if ($response[0]->free != 0 and $response[0]->room == $roomid)
            return true;
        else
            return false;
    }

    public function getListPlayersForRoom($roomid)
    {
        $resurce = DB::select('select * from player_state where room= ? and free = 1',[$roomid]);
        return $resurce;
    }

    private function getnamePlayerById($id)
    {
        $resp = DB:: select ('select username from users where id = ? limit 1',[$id]);
        return $resp[0]->username;
    }

    public function printListPlayers($roomid)
    {
        $sth = DB::select('select * from player_state where room = ? and free > 0',[$roomid]);
        $list="";
        foreach ($sth as $row)
        {
            $list = $list.$this->getnamePlayerById($row->player_id).'</br>';
        }
        //print json_encode($rows);
        return $list;

    }

    public function getListFreePlayers($roomid)
    {
        $sth = DB::select('select * from player_state where room = ? and free = 1',[$roomid]);
        $list="";
        foreach ($sth as $row)
        {
            $list = $list."<option value=\"".$row->player_id."\">".$this->getnamePlayerById($row->player_id)."</option>";
        }
        //print json_encode($rows);
        return "<option>Rar</option>";//$list;

    }
}