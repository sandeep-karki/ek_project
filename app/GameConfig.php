<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameConfig extends Model
{
    protected $table = "game_configs";
    protected $fillable = ['id','code','value'];
}
