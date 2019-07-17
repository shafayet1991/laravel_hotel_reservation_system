<?php

namespace App\Http\Controllers\Admin\Room;

use App\Helpers\Helper;
use App\Http\Requests\Hotel\Room\RoomRequest;
use App\Models\Contract\ContractDay;
use App\Models\Room\Room;
use App\Models\BoardType;
use App\Models\Room\RoomFeature;
use App\Models\Room\RoomPossibility;
use App\Models\Room\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function store(RoomRequest $request)
    {
        $inputs = $request->except('_token','room_features','room_possibilities');
        $hotel_room = Room::create($inputs);
        $hotel_room->features()->sync($request->room_features);
        $hotel_room->possibilities()->sync($request->room_possibilities);
        Helper::custom_session_flash("success","store");
        return redirect("/adminpanel/hotel/" . $hotel_room->hotel->id . "/edit?tab=rooms");
    }

    public function edit($id)
    {
        $room = Room::with(['features','hotel.rooms' => function($q) use($id){
            $q->whereNotIn('id',[$id]);
        },'contracts'])->findOrFail($id);
        $room_types = RoomType::all();
        $room_features = RoomFeature::get();
        $room_possibilities = RoomPossibility::get();
        $room_feature_ids = $room->features()->pluck('room_feature_id')->toArray();
        $room_possibility_ids = $room->possibilities()->pluck('room_possibility_id')->toArray();

        $board_types = BoardType::all();

        $stop_days = ContractDay::where('room_id', $id)->where('is_stop', true)->get();

        $names['hotel_name'] = $room->hotel->name ?? '';
        $names['room_name'] = $room->name ?? '';

        return view('admin.pages.hotel.room', compact(
            'room', 'room_types', 'names', 'board_types', 'stop_days',
            'room_features','room_feature_ids','room_possibilities','room_possibility_ids'
        ));
    }

    public function update(RoomRequest $request, $id)
    {
        $room = Room::findOrFail($id);

        $inputs = $request->except('_token','_method','room_features','room_possibilities');
        $room->update($inputs);
        $room->features()->sync($request->room_features);
        $room->possibilities()->sync($request->room_possibilities);
        Helper::custom_session_flash("success","update");
        return redirect("/adminpanel/hotel_room/" . $room->id . "/edit");
    }

    public function destroy($id)
    {
        $room = Room::with('files')->findOrFail($id);

        if(count($room->files) > 0){
            foreach($room->files as $file){
                $real_path=$room->rooms_path . "/" . $file->name;
                Helper::custom_delete_single_file($real_path);
                $file->delete();
            }
        }
        $room->files()->detach();

        $hotel_id = $room->hotel->id;

        $room->delete();

        return redirect("/adminpanel/hotel/" . $hotel_id . "/edit?tab=rooms");
    }

    public function features()
    {
        dd("here");
    }

}
