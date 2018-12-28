<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LangTranslation extends Model
{
    protected $table = "lang_translations";

    protected $fillable = ['word_id', 'language_id', 'translate_word', 'status'];

    protected $guarded = ['id', '_token'];

    // public $timestamps = false;

    public function word()
    {
      return $this->belongsTo('App\LangWord', 'word_id');
    }

    public function language()
    {
      return $this->belongsTo('App\Language', 'language_id');
    }

}
