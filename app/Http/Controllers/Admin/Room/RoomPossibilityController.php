<?php

namespace App\Http\Controllers\Admin\Room;

use App\Helpers\Helper;
use App\Models\Room\RoomPossibility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomPossibilityController extends Controller
{
    public function index()
    {
        $room_possibilities = RoomPossibility::get();
        return view('admin.pages.hotel.room.possibility.index', compact('room_possibilities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.hotel.room.possibility.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RoomPossibility::create($request->except('_token'));
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
        $possibility = RoomPossibility::findOrFail($id);
        return view('admin.pages.hotel.room.possibility.edit', compact('possibility'));
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
        $possibility = RoomPossibility::findOrFail($id);
        $possibility->update($request->except('_token', '_method'));
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
        $possibility = RoomPossibility::findOrFail($id);
        $possibility->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }
}
