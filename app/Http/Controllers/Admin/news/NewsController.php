<?php

namespace App\Http\Controllers\Admin\news;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(News $newslist)
    {
        $this->model = $newslist;

    }

    public function index(Request $request)
    {
        $data = News::get();
        $pagetitle = "News List";

        return view('system.news.index', compact('pagetitle', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pagetitle = "Create news";
        return view('system.news.create', compact('pagetitle'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $get_data = $request->all();
        // dd($get_data);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
                            $extension = $file->getClientOriginalExtension(); // getting image extension
                            $filename = time() . '.' . $extension;
                            $file->move('uploads/appsetting/', $filename);
                        }
                        $get_data['image']=$filename;
                        $this->model->create($get_data);

                        return redirect('system/news')->with('status', 'Data inserted successfully');
                    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagetitle = "Edit News";

        $data = News::find($id);

        return view('system.news.edit', compact('pagetitle', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = News::find($id);
        $data->update($request->all());

        // $this->model->

        return redirect('system/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('system/news')->with('status', 'News deleted successfully');
    }
}
