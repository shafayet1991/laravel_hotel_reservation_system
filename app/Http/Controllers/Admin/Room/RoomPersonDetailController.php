<?php

namespace App\Http\Controllers\Admin\Room;

use App\Helpers\Helper;
use App\Models\Room\Room;
use App\Models\Room\RoomPersonDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomPersonDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($room_id)
    {
        $room = Room::with('details')->findOrFail($room_id);

        $hotel = $room->hotel ?? '';
        $names['hotel_name'] = $room->hotel->name ?? '';
        $names['room_name'] = $room->name ?? '';
        $names['room_id'] = $room->id . " Numaralı Kişi Detayları" ?? '';

        return view('admin.pages.hotel.room.detail', compact('room', 'hotel','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        RoomPersonDetail::create($request->except('_token'));
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
    public function edit($room_id, $detail_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $room_id, $detail_id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
