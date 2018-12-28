<?php

namespace App\Http\Controllers\Admin\page;

use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageValidationRequest;
use App\Language;
use App\Page;
use App\PageLangContent;
use App\Services\PermissionService;
use File;
use Image;
use Input;

class pageController extends Controller
{
    public function __construct(Page $page)
    {
        $this->pageTitle = "Pages";
        $this->model = $page;
        $this->redirectUrl = PREFIX . "/page";
        $this->pathBig = public_path() . '/uploads/pages';
        $this->pathMedium = $this->pathBig . '/' . 'thumbs_medium';
        $this->pathThumb = $this->pathBig . '/' . 'thumb_image';
        $this->permissionService = new PermissionService();
     }

    public function index(PageValidationRequest $request)
    {
        $permissions = $this->permissionService->modelPermission('page', 'page');
        $pageTitle = $this->pageTitle;
        $data = $this->model->where('parent_id', 0)->orderBy('position', 'asc')->paginate(25);

        return view('system.pages.index', compact('data', 'pageTitle', 'permissions'));
    }

    public function create(PageValidationRequest $request)
    {
        $data['pageParent'] = $this->model->where('parent_id', 0)->get();
        $data['galleries'] = Gallery::where('status', 'active')->get();
        $data['langCategories'] = Language::all();

        $data['pageTitle'] = $this->pageTitle;
        return view('system.pages.create', $data);

    }

    public function store(PageValidationRequest $request)
    {
        $data['pageParent'] = $this->model->where('parent_id', 0)->get();
        try {

            $path = public_path() . '/uploads/pages';
            $attributes = $request->all();
            $parentId = $request->get('parent_id');
            $pageParent = $this->model->getDataByParentId($parentId);

            if (is_dir($this->pathBig) != true) {
                File::makeDirectory($this->pathBig, $mode = 0777, true);
            }

            $pageModel = Page::create([
                'parent_id' => $attributes['parent_id'],
                'title' => $attributes['title'],
                'slug' => $attributes['slug'],
                'status' => $attributes['status'],
                'gallery_id' => $attributes['gallery_id'],
                'position' => $attributes['position'],

                // 'thumb_image' => $attributes['thumb_image'],
                // 'background_image' => $attributes['background_image'],
            ]);
            if ($pageModel) {
                $pageId = $pageModel->id;

                foreach ($request->flags as $flagId) {

                    if (!empty($attributes['title_' . $flagId])) {
                        if (!empty($request->file('background_image_' . $flagId))) {
                            $image = $request->file('background_image_' . $flagId);
                            $filename = uniqid() . '.' . $request->file('background_image_' . $flagId)->getClientOriginalExtension();

                            $imgBig = \Image::make($request->file('background_image_' . $flagId))->save($path . '/' . $filename);

                            $imgMedium = \Image::make($request->file('background_image_' . $flagId))->save($path . '/thumbs_medium/' . $filename);

                            $pageContent['background_image'] = $filename;
                        }
                        $pageContent['page_id'] = $pageId;
                        $pageContent['lang_id'] = $flagId;
                        $pageContent['title'] = $attributes['title_' . $flagId];
                        $pageContent['description'] = $attributes['description_' . $flagId];
                        $pageContent['html_title'] = $attributes['html_title_' . $flagId];
                        $pageContent['html_description'] = $attributes['html_description_' . $flagId];
                        $pageContent['html_keywords'] = $attributes['html_keywords_' . $flagId];
                        PageLangContent::create($pageContent);
                    }
                }
                return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Added!']);

            }

        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not saved!']);
        }
    }

    // }

    public function edit(PageValidationRequest $request,$id)
    {
        $data['pageTitle'] = $this->pageTitle;
        $data['langCategories'] = Language::all();
        $data['galleries'] = Gallery::where('status', 'active')->get();
        $data['data'] = $this->model->find($id);
        if (empty($data['data']) ) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
        }
        $data['pageParent'] = $this->model->where('id', '!=', $request->id)->where('parent_id', 0)->get();

        return view('system.pages.edit', $data);

    }

    public function update(PageValidationRequest $request)
    {

        try {
            $path = public_path() . '/uploads/pages';
            $pageData = $this->model->where('id', $request->id)->first();
            $parentId = $request->get('parent_id');
            $pageParent = $this->model->getDataByParentId($parentId);
            $attributes = $request->all();

            //dd($attributes);

            if (!empty($attributes['parent_id'])) {
                $updateData['parent_id'] = $attributes['parent_id'];
            } else {
                $updateData['parent_id'] = 0;

            }
            $updateData['title'] = $attributes['title'];
            $updateData['slug'] = $attributes['slug'];
            $updateData['status'] = $attributes['status'];
            $updateData['position'] = $attributes['position'];
            $updateData['gallery_id'] = $attributes['gallery_id'];
            $pageData->update($updateData);

            $pageId = $pageData->id;
            foreach ($request->flags as $flagId) {
                //Update
                if (!empty($attributes['title_' . $flagId])) {
                    if (!empty($attributes['page_lang_contents_id_' . $flagId])) {
                        //Fetch data from page_lang_content
                        $languageContent = PageLangContent::where('id', $attributes['page_lang_contents_id_' . $flagId])->first();
                        if (!empty($languageContent)) {
                            if (!empty($request->file('background_image_' . $flagId))) {
                                if (null !== $languageContent->image && file_exists($this->pathBig . '/' . $languageContent->image)) {
                                    File::delete($this->pathBig . '/' . $languageContent->image);
                                    File::delete($this->pathMedium . '/' . $languageContent->image);
                                }
                                $image = $request->file('background_image_' . $flagId);
                                if (!file_exists($this->pathBig)) {
                                    File::makeDirectory($this->pathBig, $mode = 0777, true);
                                }

                                if (!file_exists($this->pathMedium)) {
                                    File::makeDirectory($this->pathMedium, $mode = 0777, true);
                                }
                                $filename = uniqid() . '.' . $request->file('background_image_' . $flagId)->getClientOriginalExtension();

                                $imgBig = \Image::make($request->file('background_image_' . $flagId))->save($this->pathBig . '/' . $filename);
                                $imgMedium = \Image::make($request->file('background_image_' . $flagId))->save($this->pathMedium . '/' . $filename);

                                $pageContent['background_image'] = $filename;
                            }
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
                        if (!empty($request->file('background_image_' . $flagId))) {
                            $image = $request->file('background_image_' . $flagId);
                            if (is_dir($this->pathBig) != true) {
                                File::makeDirectory($this->pathBig, $mode = 0777, true);
                            }

                            if (is_dir($this->pathMedium) != true) {
                                File::makeDirectory($this->pathBig, $mode = 0777, true);
                            }
                            $filename = uniqid() . '.' . $request->file('background_image_' . $flagId)->getClientOriginalExtension();

                            $imgBig = \Image::make($request->file('background_image_' . $flagId))->save($this->pathBig . '/' . $filename);
                            $imgMedium = \Image::make($request->file('background_image_' . $flagId))->save($this->pathMedium . '/' . $filename);

                            $pageContent['background_image'] = $filename;
                        }

                        $pageContent['page_id'] = $pageId;
                        $pageContent['lang_id'] = $flagId;
                        $pageContent['title'] = $attributes['title_' . $flagId];
                        $pageContent['description'] = $attributes['description_' . $flagId];
                        $pageContent['html_title'] = $attributes['html_title_' . $flagId];
                        $pageContent['html_description'] = $attributes['html_description_' . $flagId];
                        $pageContent['html_keywords'] = $attributes['html_keywords_' . $flagId];
                        PageLangContent::create($pageContent);
                    }
                }
            }
            return redirect($this->redirectUrl)->withErrors(['alert-success' => 'Successfully Updated!']);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not saved!']);
        }
    }

    public function status(PageValidationRequest $request, $id=0)
    {
        try {
            $page = $this->model->find($id);
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
            return back();
            // return redirect()->back()->withErrors(['alert-success' => 'Successfully Updated!']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

    public function destroy(PageValidationRequest $request)
    {
        try {
            $pageId = Input::get('id');

            $page = $this->model->find(Input::get('id'));
            $pagesImage = PageLangContent::where('page_id', $pageId)->get();
            //$pagelang= PageLangContent::where('page_id',$pageId);
            if (empty($page)) {
                return redirect($this->redirectUrl)->withErrors(['alert-danger' => 'Data was not found!']);
            }
            foreach ($pagesImage as $pImage) {
                if (null !== $pImage->image && file_exists($this->pathBig . '/' . $pImage->image)) {
                    File::delete($this->pathBig . '/' . $pImage->image);
                }
            }

            if (null !== $page->thumb_image && file_exists($this->pathBig . '/' . $page->thumb_image)) {
                File::delete($this->pathBig . '/' . $page->thumb_image);
            }
            if (null !== $page->background_image && file_exists($this->pathBig . '/' . $page->background_image)) {
                File::delete($this->pathBig . '/' . $page->background_image);
            }
            $t = $page->delete();
            $u = $page->getPageLangContent()->delete();
            return redirect()->back()->withErrors(['alert-success' => 'Successfully Deleted!']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

    }

}
