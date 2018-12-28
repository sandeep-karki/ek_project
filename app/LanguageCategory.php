<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LanguageCategory extends Model {
	protected $table = "language_category";

	protected $fillable = ['name', 'default_lang'];

	protected $guarded = ['id', '_token'];

	// public $timestamps = false;

	public function language() {
		return $this->belongsToMany('App\Language', 'system_languages', 'category_id', 'language_id');
	}

	public function defaultLang() {
		return $this->belongsTo('App\Language', 'default_lang');
	}
}
