<?php


namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class Server extends Facade{
    protected static function getFacadeAccessor() { return 'Server'; }
}