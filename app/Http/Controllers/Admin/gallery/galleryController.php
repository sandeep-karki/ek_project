<?php

namespace App\Http\Controllers\Admin\gallery;

use App\Gallery;
use App\GalleryLangContent;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Language;
use App\Services\PermissionService;
use File;
use Input;

class galleryController extends Controller
{
    public function __construct(Gallery $gallery)
    {
        $this->pageTitle = "Gallery";
        $this->model = $gallery;
        $this->redirectUrl = PREFIX . "/gallery/";
        $this->pathBig = public_path() . '/uploads/gallery';
        $this->galleryContent = new GalleryLangContent;
        $this->permissionService = new PermissionService();
    }

    public function index(GalleryRequest $request)
    {
        $permissions = $this->permissionService->modelPermission('gallery', 'gallery');
        $pageTitle = $this->pageTitle;
        $data = $this->model->orderBy('position', 'asc')->paginate(50);
        return view('system.gallery.index', compact('data', 'pageTitle','permissions'));
    }

    public function create(GalleryRequest $request)
    {
        $langCategories = Language::all();

        return view('system.gallery.create', compact('langCategories'));

    }

    public function store(GalleryRequest $request)
    {
        try {
            $attributes = $request->all();

            if (empty($request->position)) {
                $attributes['position'] = \App\Gallery::max('position') + 1;
            }

            $pageData['slug'] = $attributes['slug'];
            $pageData['status'] = $attributes['status'];
            $pageData['position'] = $attributes['position'];
            if (is_dir($this->pathBig) != true) {
                File::makeDirectory($this->pathBig, $mode = 0777, true);
            }

            if (!empty($request->file('image'))) {
                $image = $request->file('image');
                $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
                $img = \Image::make($request->file('image'))->fit(361, 260)->save($this->pathBig . '/' . $filename);
                $pageData['image'] = $filename;
            } else {
                $pageData['image'] = '';
            }
            $gallerypage = $this->model->create($pageData);

            $pageId = $gallerypage->id;
            foreach ($request->flags as $flagId) {
                if ((!empty($attributes['title_' . $flagId])) && (!empty($attributes['description_' . $flagId]))) {
                    $pageContent['gallery_id'] = $pageId;
                    $pageContent['lang_id'] = $flagId;
                    $pageContent['title'] = $attributes['title_' . $flagId];
                    $pageContent['description'] = $attributes['description_' . $flagId];
                    $pageContent['html_title'] = $attributes['html_title_' . $flagId];
                    $pageContent['html_description'] = $attributes['html_description_' . $flagId];
                    $pageContent['html_keywords'] = $attributes['html_keywords_' . $flagId];
                    $this->galleryContent->create($pageContent);
                }
            }
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Added']);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not saved!']);
        }
    }

    public function edit(GalleryRequest $request)
    {

        $pageTitle = $this->pageTitle;
        $langCategories = Language::all();
        $data = $this->model->find(Input::get('id'));

        if (empty($data)) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
        }

        return view('system.gallery.edit', compact('data', 'pageTitle', 'langCategories'));

    }

    public function update(GalleryRequest $request)
    {

        try {
            $pageData = $this->model->where('id', $request->id)->first();
            $attributes = $request->all();

            if (!empty($pageData->image) && file_exists('uploads/gallery/' . $pageData->image)) {

                if (!empty($request->file('image'))) {
                    \File::delete($this->pathBig . '/' . $pageData->image);
                    if (is_dir($this->pathBig) != true) {
                        \File::makeDirectory($this->pathBig, $mode = 0777, true);
                    }

                    $image = $request->file('image');

                    $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

                    $imgBig = \Image::make($request->file('image'))->save($this->pathBig . '/' . $filename);

                    // $imgMedium = \Image::make($request->file('image'))->fit(300, 420)->save($this->pathMedium.'/'.$filename);

                    $updateData['image'] = $filename;
                }
            } else {
                if (Input::hasFile('image')) {
                    if (is_dir($this->pathBig) != true) {
                        \File::makeDirectory($this->pathBig, $mode = 0777, true);
                    }

                    $filename = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

                    $imgBig = \Image::make($request->file('image'))->save($this->pathBig . '/' . $filename);
                    $updateData['image'] = $filename;
                } else {
                    $updateData['image'] = "";
                }

            }

            $updateData['slug'] = $attributes['slug'];
            $updateData['status'] = $attributes['status'];
            $updateData['position'] = $attributes['position'];
            $pageData->update($updateData);

            $pageId = $pageData->id;

            foreach ($request->flags as $flagId) {
                //Update
                //dump($attributes['page_lang_contents_id_'.$flagId]);
                if (!empty($attributes['page_lang_contents_id_' . $flagId])) {
                    //Fetch data from page_lang_content
                    $languageContent = GalleryLangContent::where('id', $attributes['page_lang_contents_id_' . $flagId])->first();

                    if (!empty($languageContent)) {

                        $pageContent['page_id'] = $pageId;
                        $pageContent['lang_id'] = $flagId;
                        $pageContent['title'] = $attributes['title_' . $flagId];
                        $pageContent['description'] = $attributes['description_' . $flagId];
                        $pageContent['html_title'] = $attributes['html_title_' . $flagId];
                        $pageContent['html_description'] = $attributes['html_description_' . $flagId];
                        $pageContent['html_keywords'] = $attributes['html_keywords_' . $flagId];

                        $languageContent->update($pageContent);
                    }
                } //Update
                else {

                    $pageContent['gallery_id'] = $pageId;
                    $pageContent['lang_id'] = $flagId;
                    $pageContent['title'] = $attributes['title_' . $flagId];
                    $pageContent['description'] = $attributes['description_' . $flagId];
                    $pageContent['html_title'] = $attributes['html_title_' . $flagId];
                    $pageContent['html_description'] = $attributes['html_description_' . $flagId];
                    $pageContent['html_keywords'] = $attributes['html_keywords_' . $flagId];
                    $this->galleryContent->create($pageContent);
                }
            }

            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated']);

        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not saved!']);
        }
    }

    public function status(GalleryRequest $request)
    {
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

    public function destroy(GalleryRequest $request)
    {
        try {
            $galleryId = Input::get('id');
            $gallery = $this->model->find(Input::get('id'));
            if (empty($gallery)) {
                return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
            }
            if (count($gallery->photo) >= 1) {
                return redirect()->back()->withErrors(['alert-danger' => 'Please delete the associated images first!']);
            }

            $t = $gallery->delete();
            $u = $gallery->getGalleryContent()->delete();
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Deleted']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

    }
}
