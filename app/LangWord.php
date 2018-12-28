<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LangWord extends Model
{
    protected $table = "lang_words";

    protected $fillable = ['word'];

    protected $guarded = ['id', '_token'];

    // public $timestamps = false;
}
