<?php

namespace App\Http\Controllers\Admin\Page;

use App\Helpers\Helper;
use App\Http\Requests\Blog\Category\StoreBlogCategoryRequest;
use App\Http\Requests\Blog\Category\UpdateBlogCategoryRequest;
use App\Models\Blog\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::get();

        return view('admin.pages.blog.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCategoryRequest $request)
    {
        $inputs = $request->except('_token','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $inputs['slug'] = str_slug($request->slug);
        $category = BlogCategory::create($inputs);

        $category->seo()->create([
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
        $category = BlogCategory::findOrFail($id);
        $names['category_name'] = $category->name;
        return view('admin.pages.blog.category.edit',compact('category','names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogCategoryRequest $request, $id)
    {
        $category = BlogCategory::findOrFail($id);
        $inputs = $request->except('_token', '_method', 'blog_category_id','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $inputs['slug'] = str_slug($request->slug);
        $category->update($inputs);
        $category->seo()->updateOrCreate(['seoable_id' => $category->id ?? 0],[
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
        $category = BlogCategory::findOrFail($id);
        $category->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
