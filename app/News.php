<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $fillable = ['title', 'description', 'status', 'category', 'date', 'image'];
}
