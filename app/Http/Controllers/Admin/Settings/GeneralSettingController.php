<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Helpers\Helper;
use App\Models\Setting\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralSettingController extends Controller
{
    public function form()
    {
        $general = GeneralSetting::first();
        return view('admin.pages.settings.general.form',compact('general'));
    }

    public function save(Request $request)
    {
        $general = GeneralSetting::updateOrCreate(['id' => $request->id],[
            'contract_detail' => $request->contract_detail,
            'tr_title' => $request->tr_title,
            'en_title' => $request->en_title,
            'ru_title' => $request->ru_title,
            'ar_title' => $request->ar_title,
            'tr_description' => $request->tr_description,
            'en_description' => $request->en_description,
            'ru_description' => $request->ru_description,
            'ar_description' => $request->ar_description,
        ]);

        if ($request->hasFile('logo')) {
            if (Helper::custom_check_empty($general->logo) !== false) {
                if (Helper::custom_delete_single_file($general->file) === false) {
                    Helper::custom_session_flash("error", "file_delete");
                    return redirect()->back();
                }
            }
            $logo = Helper::custom_upload_single_image($request->file('logo'), $general->path);
            $general->logo = $logo;
            $general->save();
        }

        Helper::custom_session_flash('success','update');
        return redirect()->action('Admin\Settings\GeneralSettingController@form');
    }
}
