<?php

namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;
use DB;

class AuthController extends Controller
{
    /**
     * @var SteamAuth
     */
    private $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function logincsgo()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (!is_null($info)) {
                $user = User::where('steamid', $info->getSteamID64())->first();
                if (is_null($user)) {
                    $user = User::create([
                        'username' => $info->getNick(),
                        'avatar'   => $info->getProfilePictureFull(),
                        'steamid'  => $info->getSteamID64()
                    ]);

                }
                Auth::login($user, true);
                DB::insert('insert into player_state values (NULL,?,0,0)',[Auth::user()->id]);
                return redirect('/csgo'); // redirect to site
            }
        }

        return $this->steam->redirect(); // redirect to Steam login page
    }

    public function logoutcsgo()
    {
        DB::delete('delete from player_state where player_id = ? limit 1',[Auth::user()->id]);
        Auth::logout();
        return redirect('/csgo'); // redirect to Steam login page
    }
}