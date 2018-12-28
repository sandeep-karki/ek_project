<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "language";

    protected $fillable = ['name', 'short_code', 'flag', 'status'];

    protected $guarded = ['id', '_token'];

    // public $timestamps = false;

    public function category()
    {
      return $this->belongsToMany('App\LanguageCategory', 'system_languages','language_id', 'category_id');
    }
}
