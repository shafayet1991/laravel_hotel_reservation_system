<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Helpers\Helper;
use App\Http\Requests\Hotel\Theme\StoreThemeRequest;
use App\Http\Requests\Hotel\Theme\UpdateThemeRequest;
use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        return view('admin.pages.hotel.theme.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.hotel.theme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = Theme::create($request->except('_token', 'photo'));
        if ($request->hasFile('photo')) {
            $path = $theme->path . "/" . $theme->id;
            $photo = Helper::custom_upload_single_image($request->file('photo'), $path);
            $theme->photo = $photo;
            $theme->save();
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
    public function edit($id)
    {
        $theme = Theme::with('hotels')->findOrFail($id);
        return view('admin.pages.hotel.theme.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThemeRequest $request, $id)
    {
        $theme = Theme::findOrFail($id);
        $theme->update($request->except('_token', '_method', 'theme_id', 'photo'));

        if ($request->hasFile('photo')) {
            if (Helper::custom_check_empty($theme->photo) !== false) {
                if (Helper::custom_delete_single_file($theme->file) === false) {
                    Helper::custom_session_flash("error", "file_delete");
                    return redirect()->back();
                }
            }
            $path = $theme->path . "/" . $theme->id;
            $photo = Helper::custom_upload_single_image($request->file('photo'), $path);
            $theme->photo = $photo;
            $theme->save();
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
        $theme = Theme::findOrFail($id);
        if(Helper::custom_check_empty($theme->photo) !== false){
            if (Helper::custom_recursive_remove_directory($theme->file_directory) === false) {
                Helper::custom_session_flash("error", "file_delete");
                return redirect()->back();
            }
        }
        $theme->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
