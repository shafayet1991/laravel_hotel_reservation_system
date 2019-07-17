<?php

namespace App\Http\Controllers\Admin\Page;

use App\Helpers\Helper;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use App\Models\Page\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::orderBy('id','DESC')->get();
        return view('admin.pages.menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::where('top_id',0)->get();
        return view('admin.pages.menu.create',compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $inputs = $request->except('_token','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $inputs['slug'] = str_slug($request->slug);
        $menu  = Menu::create($inputs);

        $menu->seo()->create([
            'seo_title' => $request->seo_title ?? '',
            'seo_keyword' => $request->seo_keyword ?? '',
            'seo_description' => $request->seo_description ?? '',
            'page_title' => $request->page_title ?? '',
        ]);

        $last_menu  = Menu::getLastMenuId();
        $menu->rank = $last_menu->id + 1;
        $menu->save();

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
        $menus = Menu::where('top_id',0)->get();
        $menu = Menu::findOrFail($id);
        $names['menu_name'] = $menu->tr_name;
        return view('admin.pages.menu.edit',compact('menu','names','menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, $id)
    {
        $menu= Menu::findOrFail($id);
        $inputs = $request->except('_token','_method','menu_id','seo_title', 'seo_description', 'seo_keyword', 'page_title');
        $inputs['slug'] = str_slug($request->slug);
        $menu->update($inputs);

        $menu->seo()->updateOrCreate(['seoable_id' => $menu->id ?? 0],[
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
        $menu = Menu::findOrFail($id);
        $menu->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
