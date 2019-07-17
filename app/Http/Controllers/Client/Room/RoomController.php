<?php

namespace App\Http\Controllers\Client\Room;

use App\Services\HotelService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function searchByParams(Request $request)
    {
        $rooms = HotelService::roomSearchByParams
        (
            $request->adult_count,
            $request->child_count,
            $request->child_ages,
            $request->start_date,
            $request->end_date,
            $request->hotel_id
        );

        return view('client.pages.room.rooms', compact('rooms'));
    }

    public function getRoomPriceByParams(Request $request)
    {
        $child_ages = explode('-',$request->child_ages);
        $result = HotelService::roomSearchByParams
        (
            $request->adult_count,
            $request->child_count,
            $child_ages,
            $request->start_date,
            $request->end_date,
            null,
            $request->room_id
        );

        return response()->json($result);
    }
}
