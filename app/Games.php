<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = ['id', 'name','date','map','result','players','rate','type','rounds','fullness','password','creator_id'];
}
