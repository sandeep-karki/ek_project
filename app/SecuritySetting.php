<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecuritySetting extends Model
{
    protected $table = "security_settings";

    protected $fillable = ['title', 'target'];

    protected $guarded = ['id', '_token'];

    // public $timestamps = false;
}

