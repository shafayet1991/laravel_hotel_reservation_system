<?php

namespace App\Http\Controllers\Admin\Page;

use App\Helpers\Helper;
use App\Http\Requests\Blog\Tag\StoreBlogTagRequest;
use App\Http\Requests\Blog\Tag\UpdateBlogTagRequest;
use App\Models\Blog\BlogTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = BlogTag::get();

        return view('admin.pages.blog.tag.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogTagRequest $request)
    {
        $inputs = $request->except('_token','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $inputs['slug'] = str_slug($request->slug);
        $tag = BlogTag::create($inputs);

        $tag->seo()->create([
            'seo_title' => $request->seo_title ?? '',
            'seo_keyword' => $request->seo_keyword ?? '',
            'seo_description' => $request->seo_description ?? '',
            'page_title' => $request->page_title ?? '',
        ]);

        Helper::custom_session_flash('success','store');
        return redirect()->back();
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
        $tag = BlogTag::findOrFail($id);
        $names['tag_name'] = $tag->name;
        return view('admin.pages.blog.tag.edit',compact('tag','names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogTagRequest $request, $id)
    {
        $tag = BlogTag::findOrFail($id);
        $inputs = $request->except('_token', '_method', 'blog_tag_id','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $inputs['slug'] = str_slug($request->slug);
        $tag->update($inputs);

        $tag->seo()->updateOrCreate(['seoable_id' => $tag   ->id ?? 0],[
            'seo_title' => $request->seo_title ?? '',
            'seo_keyword' => $request->seo_keyword ?? '',
            'seo_description' => $request->seo_description ?? '',
            'page_title' => $request->page_title ?? '',
        ]);

        Helper::custom_session_flash("success", "update");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = BlogTag::findOrFail($id);
        $tag->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
