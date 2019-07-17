<?php

namespace App\Http\Controllers\Admin\Page;

use App\Helpers\Helper;
use App\Models\Page\Menu;
use App\Models\Page\StaticPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    public function index()
    {
        $statics = StaticPage::with('menu')->orderByDesc('id')->get();
        return view('admin.pages.static.index',compact('statics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $static_menu_ids = StaticPage::pluck('menu_id')->toArray();
        $menus = Menu::whereNotIn('id',$static_menu_ids)->where(['top_id' => 0,'template' => 'staticpage-template'])->get();
        return view('admin.pages.static.create',compact('menus','static_menu_ids'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token','page_title','seo_title','seo_keyword','seo_description');
        $static=StaticPage::create($inputs);
        $static->seo()->create(['seoable_id' => $static->id],[
            'page_title' => $request->page_title,'seo_title' => $request->seo_title,'seo_keyword' => $request->seo_keyword,'seo_description' => $request->seo_description
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
        $static = StaticPage::findOrFail($id);
        $static_menu_ids = StaticPage::pluck('menu_id')->toArray();
        $menus = Menu::whereIn('id',[$static->menu_id])->get();
        return view('admin.pages.static.edit',compact('static','menus','static_menu_ids'));
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
        $inputs = $request->except('_token','_method','page_title','seo_title','seo_keyword','seo_description');
        $static= StaticPage::findOrFail($id);
        $static->update($inputs);
        $static->seo()->updateOrCreate(['seoable_id' => $static->id],[
            'page_title' => $request->page_title,'seo_title' => $request->seo_title,'seo_keyword' => $request->seo_keyword,'seo_description' => $request->seo_description
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
        $static = StaticPage::findOrFail($id);
        $static->seo()->delete();
        $static->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
