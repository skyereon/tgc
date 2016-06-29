<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player_state extends Model
{
    protected $table = 'players_state';
    protected $timestamps = 'players_state';
    protected $fillable = ['id', 'player_id','free','room'];
}
