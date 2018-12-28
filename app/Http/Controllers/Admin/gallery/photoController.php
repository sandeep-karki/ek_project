<?php

namespace App\Http\Controllers\Admin\gallery;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Language;
use App\Photo;
use App\PhotoLangContent;
use App\Services\PermissionService;
use File;
use Image;
use Input;

class photoController extends Controller {

	public function __construct(Photo $photo) {
		$this->pageTitle = "Photos";
		$this->model = $photo;
		$this->redirectUrl = PREFIX . "/gallery/pages/photo";
		$this->photoUrl = PREFIX . "/photo";
		$this->pathBig = public_path() . '/uploads/photos';
		$this->pathMedium = $this->pathBig . '/thumbs-medium';
		$this->pathSmall = $this->pathBig . '/thumbs-small';
		$this->photoContent = new PhotoLangContent;
        $this->permissionService = new PermissionService();
		$this->gallery = new Gallery;
	}
	public function index(PhotoRequest $request) {
        $permissions = $this->permissionService->modelPermission('page', 'page');
		$data = $this->model->getAllData(Input::all())->orderBy('position', 'asc')->paginate(25);
		$gallery = $this->gallery->find(Input::get('gallery_id'));
		$pageTitle = $this->pageTitle;
		if (empty($gallery) && (Input::has('gallery_id'))) {
			return redirect($this->photoUrl)->withErrors(['alert-success' => 'Gallery Didn\'t Exist!']);
		} else {
			return view('system.photo.index', compact('data', 'pageTitle', 'gallery','permissions'));
		}
	}

	public function create(PhotoRequest $request) {
		$gallery_id = Input::get('gallery_id');
		$galleryPhoto = $this->gallery->find(Input::get('gallery_id'));
		$gallery = $this->gallery->where('status', 'active')->get();
		$langCategories = Language::all();
		return view('system.photo.create', compact('gallery', 'langCategories', 'gallery_id', 'galleryPhoto'));
	}

	public function store(PhotoRequest $request) {
		try {
			$attributes = $request->all();

			if (empty($request->position)) {
				$attributes['position'] = \App\Photo::max('position') + 1;
			}
			$pageData['status'] = $attributes['status'];
			$pageData['position'] = $attributes['position'];
			if ($attributes['gallery_id'] == 0) {
				$attributes['gallery_id'] = $request->root_id;
			}
			$pageData['gallery_id'] = $attributes['gallery_id'];
			if (!empty($request->file('image'))) {
				$image = $request->file('image');
				if (is_dir($this->pathBig) != true) {
					\File::makeDirectory($this->pathBig, $mode = 0777, true);
				}
				if (is_dir($this->pathMedium) != true) {
					\File::makeDirectory($this->pathMedium, $mode = 0777, true);
				}
				if (is_dir($this->pathSmall) != true) {
					\File::makeDirectory($this->pathSmall, $mode = 0777, true);
				}
				$filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

				$imgBig = \Image::make($request->file('image'))->save($this->pathBig . '/' . $filename);

				$imgMedium = \Image::make($request->file('image'))->fit(279, 231)->save($this->pathMedium . '/' . $filename);

				$imgSmall = \Image::make($request->file('image'))->fit(65, 65)->save($this->pathSmall . '/' . $filename);

				$pageData['image'] = $filename;
			}
			$photopage = $this->model->create($pageData);

			$pageId = $photopage->id;
			foreach ($request->flags as $flagId) {
				if (!empty($attributes['caption_' . $flagId])) {
					$pageContent['photo_id'] = $pageId;
					$pageContent['lang_id'] = $flagId;
					$pageContent['caption'] = $attributes['caption_' . $flagId];
					$this->photoContent->create($pageContent);
				}
			}
			return redirect($this->redirectUrl . '?gallery_id=' . $request->gallery_id)->withErrors(['alert-success' => 'Successfully Added!']);
		} catch (Exception $e) {
			return redirect($this->redirectUrl . '?gallery_id=' . $request->gallery_id)->withErrors(['alert-danger' => 'Data was not saved!']);
		}
	}

	public function edit(PhotoRequest $request) {

		$pageTitle = $this->pageTitle;
		$galleryList = $this->gallery->where('status', 'active')->get();
		$galleryPhoto = $this->gallery->find(Input::get('gallery_id'));
		$langCategories = Language::all();
		$data = $this->model->find(Input::get('id'));

		if (empty($data) || empty($galleryPhoto) || empty($galleryList)) {
			return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
		}

		return view('system.photo.edit', compact('data', 'pageTitle', 'langCategories', 'galleryList', 'galleryPhoto'));

	}

	public function update(PhotoRequest $request) {

		try {
			$pageData = $this->model->where('id', $request->id)->first();

			$attributes = $request->all();
			$updateData['gallery_id'] = $attributes['gallery_id'];
			$updateData['status'] = $attributes['status'];
			$updateData['position'] = $attributes['position'];
			if (!empty($request->file('image'))) {
				if (null !== $pageData->image && file_exists($this->pathBig . '/' . $pageData->image)) {
					\File::delete($this->pathMedium . '/' . $pageData->image);
					\File::delete($this->pathSmall . '/' . $pageData->image);
					\File::delete($this->pathBig . '/' . $pageData->image);
				}

				$image = $request->file('image');

				$filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

				$imgBig = \Image::make($request->file('image'))->save($this->pathBig . '/' . $filename);

				$imgMedium = \Image::make($request->file('image'))->fit(279, 231)->save($this->pathMedium . '/' . $filename);

				$imgSmall = \Image::make($request->file('image'))->fit(65, 65)->save($this->pathSmall . '/' . $filename);

				$updateData['image'] = $filename;
			}
			$pageData->update($updateData);

			$pageId = $pageData->id;

			foreach ($request->flags as $flagId) {
				//Update
				if (!empty($attributes['caption_' . $flagId])) {
					if (!empty($attributes['page_lang_contents_id_' . $flagId])) {
						//Fetch data from page_lang_content
						$languageContent = PhotoLangContent::where('id', $attributes['page_lang_contents_id_' . $flagId])->first();
						if (!empty($languageContent)) {

							$pageContent['photo_id'] = $pageId;
							$pageContent['lang_id'] = $flagId;
							$pageContent['caption'] = $attributes['caption_' . $flagId];
							$languageContent->update($pageContent);

						}
					} //Update
					else {
					}

					$pageContent['photo_id'] = $pageId;
					$pageContent['lang_id'] = $flagId;
					$pageContent['caption'] = $attributes['caption_' . $flagId];

					PhotoLangContent::create($pageContent);

				}
			}
			return redirect($this->redirectUrl . '?gallery_id=' . $request->gallery_id)->withErrors(['alert-success' => 'Successfully Updated!']);
		} catch (Exception $e) {
			return redirect($this->redirectUrl . '?gallery_id=' . $request->gallery_id)->withErrors(['alert-danger' => 'Data was not saved!']);
		}
	}

	public function status(PhotoRequest $request) {
		try {
			$page = $this->model->find(Input::get('id'));
			if (empty($page)) {
				return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
			}
			$status = $page->status;
			if ($status == 'inactive') {
				$page->status = 'active';
			} else {
				$page->status = 'inactive';
			}
			$t = $page->update();
			return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated']);
		} catch (Exception $e) {
			return redirect()->back()->withErrors([$e->getMessage()]);
		}
	}

	public function destroy(photoRequest $request) {
		try {
			$photoId = Input::get('id');
			$photo = $this->model->find(Input::get('id'));
			//$photolang= photoLangContent::where('photo_id',$photoId);
			if (empty($photo)) {
				return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
			}
			if (null !== $photo->image && file_exists($this->pathBig . '/' . $photo->image)) {
				\File::delete($this->pathBig . '/' . $photo->image);
				\File::delete($this->pathMedium . '/' . $photo->image);
				\File::delete($this->pathSmall . '/' . $photo->image);
			}
			$t = $photo->delete();
			$u = $photo->getPhotoContent()->delete();
			return redirect()->back()->withErrors(['alert-success' => 'Successfully Deleted!']);
		} catch (Exception $e) {
			return redirect()->back()->withErrors([$e->getMessage()]);
		}

	}

}
