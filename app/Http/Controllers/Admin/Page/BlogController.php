<?php

namespace App\Http\Controllers\Admin\Page;

use App\Helpers\Helper;
use App\Http\Requests\Blog\StoreBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogAuthor;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Blog::with('categories','tags','author','image','seo')->get();
        return view('admin.pages.blog.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = BlogAuthor::get();
        $categories = BlogCategory::get();
        $tags = BlogTag::get();
        return view('admin.pages.blog.create', compact('authors', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $inputs = $request->except('photo', 'blog_category_id', 'blog_tag_id', 'seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $blog = Blog::create($inputs);

        $blog->seo()->create([
            'seo_title' => $request->seo_title ?? '',
            'seo_keyword' => $request->seo_keyword ?? '',
            'seo_description' => $request->seo_description ?? '',
            'page_title' => $request->page_title ?? '',
        ]);

        if($request->exists('blog_category_id')){
            $blog->categories()->sync($request->blog_category_id);
        }

        if($request->exists('blog_tag_id')){
            $blog->tags()->sync($request->blog_tag_id);
        }

        if ($request->hasFile('photo')) {
            $path = $blog->path . "/" . $blog->id;
            $saved_name = Helper::custom_upload_single_image($request->file('photo'), $path);
            $blog->image()->create([
                'name' => $saved_name ?? ''
            ]);
        }

        Helper::custom_session_flash("success", "store");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $blog_category_ids = $blog->categories()->pluck('blog_category_id')->toArray() ?? 0;
        $blog_tag_ids = $blog->tags()->pluck('blog_tag_id')->toArray() ?? 0;
        $authors = BlogAuthor::get();
        $categories = BlogCategory::get();
        $tags = BlogTag::get();
        return view('admin.pages.blog.edit',compact('blog','authors','categories','tags','blog_category_ids','blog_tag_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        $inputs = $request->except('blog_id','photo', 'blog_category_id', 'blog_tag_id', 'seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $blog = Blog::findOrFail($id);
        $blog->update($inputs);

        $blog->seo()->updateOrCreate(['seoable_id' => $blog->id ?? 0],[
            'seo_title' => $request->seo_title ?? '',
            'seo_keyword' => $request->seo_keyword ?? '',
            'seo_description' => $request->seo_description ?? '',
            'page_title' => $request->page_title ?? '',
        ]);

        if($request->exists('blog_category_id')){
            $blog->categories()->sync($request->blog_category_id);
        }

        if($request->exists('blog_tag_id')){
            $blog->tags()->sync($request->blog_tag_id);
        }

        if ($request->hasFile('photo')) {
            if (Helper::custom_check_empty($blog->image) !== false) {
                if (Helper::custom_delete_single_file($blog->file) === false) {
                    Helper::custom_session_flash("error", "file_delete");
                    return redirect()->back();
                }
            }
            $path = $blog->path . "/" . $blog->id;
            $saved_name = Helper::custom_upload_single_image($request->file('photo'), $path);
            $blog->image()->updateOrCreate(['imageable_id' => $blog->id ?? 0],[
                'name' => $saved_name ?? ''
            ]);
        }

        Helper::custom_session_flash("success", "update");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if(Helper::custom_check_empty($blog->seo) !== false){
            $blog->seo()->delete();
        }
        if(Helper::custom_check_empty($blog->image) !== false){
            if (Helper::custom_recursive_remove_directory($blog->file_directory) === false) {
                Helper::custom_session_flash("error", "file_delete");
                return redirect()->back();
            }
            $blog->image()->delete();
        }
        $blog->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
