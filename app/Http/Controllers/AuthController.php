<?php

namespace App\Http\Controllers;

use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;
use Auth;

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
                return redirect('/csgo'); // redirect to site
            }
        }
        return $this->steam->redirect(); // redirect to Steam login page
    }

    public function logoutcsgo()
    {
        Auth::logout();
        return redirect('/csgo'); // redirect to Steam login page
    }
}