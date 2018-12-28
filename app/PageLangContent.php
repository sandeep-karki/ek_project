<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageLangContent extends Model {
	protected $table = 'page_lang_contents';

	protected $fillable = ['page_id', 'lang_id', 'title', 'background_image', 'description', 'html_title', 'html_description', 'html_keywords'];

	protected $guarded = ['id', '_token'];

	public function pages() {
		return $this->belongsTo('App\Page', 'page_id', 'id');
	}

}
