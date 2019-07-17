<?php

namespace App\Http\Controllers\Admin\Room;

use App\Helpers\Helper;
use App\Models\Room\RoomFeature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_features = RoomFeature::get();
        return view('admin.pages.hotel.room.feature.index', compact('room_features'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.hotel.room.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RoomFeature::create($request->except('_token'));
        Helper::custom_session_flash("success", "store");
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
        $feature = RoomFeature::findOrFail($id);
        return view('admin.pages.hotel.room.feature.edit', compact('feature'));
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
        $feature = RoomFeature::findOrFail($id);
        $feature->update($request->except('_token', '_method'));
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
        $feature = RoomFeature::findOrFail($id);
        $feature->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
