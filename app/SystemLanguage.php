<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemLanguage extends Model
{
    protected $table = "system_languages";

    protected $fillable = ['category_id', 'language_id'];

    protected $guarded = ['id', '_token'];

    // public $timestamps = false;
}
