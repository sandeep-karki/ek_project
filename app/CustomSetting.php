<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomSetting extends Model
{
    protected $table = "custom_settings";

    protected $fillable = ['label', 'value', 'type'];

    protected $guarded = ['id', '_token'];


}
