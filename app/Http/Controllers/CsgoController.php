<?php



namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class CsgoController extends Controller
{
    public function index()
    {
        return view('csgo.index');
    }

    public function getGames()
    {

        if(Request::ajax()){
            $result = DB::select('select * from games');
            return print_r($result);
            return redirect('/');
        }
        return redirect('/');
    }
}
