<?php

namespace App;

use App\Gallery;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
	protected $table = 'photos';

	protected $fillable = ['image', 'status', 'position', 'gallery_id'];

	protected $guarded = ['id', '_token'];

	public function getAllData($data = array()) {
		$photoData = $this->query();
		if (isset($data['gallery_id']) && $data['gallery_id'] != '') {
			$gallerySelected = Gallery::where('id', $data['gallery_id'])->first();
			if (!empty($gallerySelected)) {
				$photoData->where('gallery_id', $data['gallery_id']);
			}
		}
		return $photoData;
	}

	public function gallery() {
		return   $this->belongsTo('App\Gallery','gallery_id','id');
	}

	public function getPhotoContent() {
		return $this->hasMany('App\PhotoLangContent', 'photo_id', 'id');
	}


	public function getPhotoLangContent($page_id) {
		return PhotoLangContent::where('photo_id', $page_id)->where('lang_id', 1)->first();
	}

	public function getPhotoLangContentfront($page_id,$lang_id)
	{
		return PhotoLangContent::where('photo_id', $page_id)->where('lang_id', $lang_id)->first();
	}

	public function getGalleryphotoContent($gallery_id,$a) {

		return GalleryLangContent::where('gallery_id', $gallery_id)->where('lang_id', 1)->first();

	}

	public function getDataByLanguage($lang_id, $page_id) {
		$langcontent = PhotoLangContent::where('photo_id', $page_id)->where('lang_id', $lang_id)->first();
		return $langcontent;
	}


}
