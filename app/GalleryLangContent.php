<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryLangContent extends Model {
	protected $table = 'gallery_lang_contents';

	protected $fillable = ['gallery_id', 'lang_id', 'title', 'description', 'html_title', 'html_description', 'html_keywords'];

	protected $guarded = ['id', '_token'];

	public function gallery() {
		return $this->belongsTo('App\Gallery', 'gallery_id', 'id');
	}
}
