<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
	protected $guarded = ['id', '_token'];

	public function getAllData($data = array()) {
		$apiusers = Page::query();
		if (isset($data['keywords'])) {
			$apiusers->whereRaw(" LOWER(CONCAT_WS('', title,position,slug,description)) LIKE LOWER('%" . (trim($data['keywords'])) . "%')");
		}
		return $apiusers->orderBy('created_at', 'desc')->paginate(20);
	}

	public function parent() {
		return $this->hasOne('App\Page', 'id', 'parent_id')->orderBy('position', 'ASC');
	}

	public function children() {
		return $this->hasMany('App\Page', 'parent_id', 'id')->orderBy('position', 'ASC');
	}

	public function gallery() {
		return $this->belongsTo('App\Gallery', 'gallery_id', 'id');
	}

	public function getPageLangContent() {
		return $this->hasMany('App\PageLangContent', 'page_id', 'id');
	}

	public function getDataByParentId($parentId) {
		return Page::where('id', $parentId)->first();
	}

	public function getPageTitle($page_id) {
		$pageTitle = PageLangContent::where('page_id', $page_id)->where('lang_id', 1)->first();
		if (!empty($pageTitle)) {
			return $pageTitle->title;
		} else {
			return "N/A";

		}
	}

	public function getDefLangContent($page_id) {

		$pageDef = PageLangContent::where('page_id', $page_id)->where('lang_id', 1)->first();
		if (!empty($pageDef)) {
			return $pageDef;
		} else {
			return "N/A";
		}
	}

	public function getDataByLanguage($lang_id, $page_id) {
		$langcontent = PageLangContent::where('page_id', $page_id)->where('lang_id', $lang_id)->first();

		return $langcontent;
	}
	public function getpageGalleryContent($gallery_id, $lang_id) {

		$langcontent = GalleryLangContent::where('gallery_id', $gallery_id)->where('lang_id', 1)->first();
		return $langcontent;

	}
	public function getCaption($page_id, $lang_id) {
		$langcontent = PhotoLangContent::where('photo_id', $page_id)->where('lang_id', $lang_id)->first();
		return $langcontent;

	}
	public function getDataByLanguagefront($page_id) {

		$langcontent = PageLangContent::where('page_id', $page_id)->first();
		return $langcontent;
	}

}
