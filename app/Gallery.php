<?php

namespace App;

use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
	protected $table = 'galleries';

	protected $fillable = ['slug', 'status', 'position', 'image'];

	protected $guarded = ['id', '_token'];

	public function getGalleryContent() {
		return $this->hasMany('App\GalleryLangContent', 'gallery_id', 'id');
	}

	public function getGalleryLangContent($gallery_id) {

		return GalleryLangContent::where('gallery_id', $gallery_id)->where('lang_id', 1)->first();

	}
	public function getDataByLanguage($lang_id, $gallery_id) {
		$langcontent = GalleryLangContent::where('gallery_id', $gallery_id)->where('lang_id', $lang_id)->first();
		return $langcontent;
	}

	public function photo() {
		return $this->hasMany('App\Photo', 'gallery_id', 'id');
	}
	public function pages() {
		return $this->hasMany('App\Pages', 'gallery_id', 'id');
	}

	public function news() {
		return $this->hasMany('App\News', 'gallery_id', 'id');
	}

}
