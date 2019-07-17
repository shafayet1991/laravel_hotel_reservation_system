<?php

namespace App\Http\Controllers;

use App\Models\Admin\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();

        return view('admin.setting', compact('setting'));
    }

    public function store(Request $request)
    {
        Setting::updateOrCreate(
            [
                'logo' => $request->logo,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube
            ]
        );

        return redirect()->back();
    }
}
