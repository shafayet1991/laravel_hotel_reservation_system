<?php

namespace App\Http\Controllers\Admin\Page;

use App\Helpers\Helper;
use App\Http\Requests\Blog\Author\StoreBlogAuthorRequest;
use App\Http\Requests\Blog\Author\UpdateBlogAuthorRequest;
use App\Models\Blog\BlogAuthor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = BlogAuthor::orderByDesc('id')->get();

        return view('admin.pages.blog.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogAuthorRequest $request)
    {
        $inputs = $request->except('_token','photo','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $author = BlogAuthor::create($inputs);

        $author->seo()->create([
            'seo_title' => $request->seo_title ?? '',
            'seo_keyword' => $request->seo_keyword ?? '',
            'seo_description' => $request->seo_description ?? '',
            'page_title' => $request->page_title ?? '',
        ]);

        if ($request->hasFile('photo')) {
            $path = $author->path . "/" . $author->id;
            $saved_name = Helper::custom_upload_single_image($request->file('photo'), $path);
            $author->image()->create(['name' => $saved_name]);
        }

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
        $author = BlogAuthor::findOrFail($id);
        $names['author_name'] = $author->name;
        return view('admin.pages.blog.author.edit',compact('author','names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogAuthorRequest $request, $id)
    {
        $inputs = $request->except('_token', '_method','blog_author_id','photo','photo','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $author = BlogAuthor::findOrFail($id);
        $author->update($inputs);

        $author->seo()->updateOrCreate(['seoable_id' => $author->id ?? 0],[
            'seo_title' => $request->seo_title ?? '',
            'seo_keyword' => $request->seo_keyword ?? '',
            'seo_description' => $request->seo_description ?? '',
            'page_title' => $request->page_title ?? '',
        ]);

        if ($request->hasFile('photo')) {
            if (Helper::custom_check_empty($author->image) !== false) {
                if (Helper::custom_delete_single_file($author->file) === false) {
                    Helper::custom_session_flash("error", "file_delete");
                    return redirect()->back();
                }
            }
            $path = $author->path . "/" . $author->id;
            $saved_name = Helper::custom_upload_single_image($request->file('photo'), $path);
            $author->image()->updateOrCreate(['imageable_id' => $author->id ?? 0],[
                'name' => $saved_name ?? ''
            ]);
        }

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
        $author = BlogAuthor::findOrFail($id);
        if(Helper::custom_check_empty($author->seo) !== false){
            $author->seo()->delete();
        }
        if(Helper::custom_check_empty($author->image) !== false){
            if (Helper::custom_recursive_remove_directory($author->file_directory) === false) {
                Helper::custom_session_flash("error", "file_delete");
                return redirect()->back();
            }
            $author->image()->delete();
        }
        $author->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
