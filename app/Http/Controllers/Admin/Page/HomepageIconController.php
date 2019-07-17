<?php

namespace App\Http\Controllers\Admin\Page;

use App\Helpers\Helper;
use App\Models\FontawesomeIcon;
use App\Models\Page\HomepageIcon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = HomepageIcon::orderByDesc('id')->get();
        return view('admin.pages.homepage_icon.index',compact('icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fa_icons = FontawesomeIcon::get();
        return view('admin.pages.homepage_icon.create',compact('fa_icons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HomepageIcon::create($request->except('_token'));

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
        $fa_icons = FontawesomeIcon::get();
        $icon = HomepageIcon::findOrFail($id);
        $names['homepage_icon_title'] = $icon->title;
        return view('admin.pages.homepage_icon.edit',compact('icon','names','fa_icons'));
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
        $icon= HomepageIcon::findOrFail($id);
        $icon->update($request->except('_token', '_method'));

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
        $icon = HomepageIcon::findOrFail($id);
        $icon->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
