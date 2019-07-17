<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Helpers\Helper;
use App\Models\Setting\SocialMediaSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialMediaSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialMediaSetting::orderBy('id','ASC')->get();
        return view('admin.pages.settings.social.index',compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.settings.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SocialMediaSetting::create($request->except('_token'));

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
        $social = SocialMediaSetting::findOrFail($id);
        $names['social_media_name'] = $social->name;
        return view('admin.pages.settings.social.edit',compact('social','names'));
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
        $social= SocialMediaSetting::findOrFail($id);
        $social->update($request->except('_token', '_method'));

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
        $social = SocialMediaSetting::findOrFail($id);
        $social->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
