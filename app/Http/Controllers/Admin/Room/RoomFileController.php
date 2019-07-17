<?php

namespace App\Http\Controllers\Admin\Room;

use App\Helpers\Helper;
use App\Models\File\File;
use App\Models\Room\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomFileController extends Controller
{
    private $photos_path;

    public function __construct()
    {
        $this->photos_path = public_path('hotels/rooms');
    }

    public function gallery($room_id)
    {
        $room = Room::with('files')->where("id",$room_id)->findOrFail($room_id);
        $names['hotel_name'] = $room->hotel->name ?? '';
        $names['room_name'] = $room->name ?? '';
        return view("admin.pages.hotel.room.gallery",compact('room','names'));
    }

    public function multiple_files(Request $request)
    {
        $photos = $request->file('file');


        if (!is_array($photos))
        {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path))
        {
            mkdir($this->photos_path, 0777);
        }

        for ($i = 0; $i < count($photos); $i++)
        {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();

            $photo->move($this->photos_path, $save_name);

            $file = new File();
            $file->name = $save_name;
            $file->file_type_id = $request->file_type_id;
            $file->original_name = basename($photo->getClientOriginalName());
            $file->save();

            $file->rooms()->attach($request->room_id);
        }

        return response()->json([
            'message' => 'Image saved Successfully'
        ], 200);
    }

    public function delete(Request $request)
    {
        $uploaded_image = File::findOrFail($request->id);

        if (empty($uploaded_image))
        {
            return response()->json([
                'message' => 'Sorry file does not exist'], 400
            );
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->name;

        Helper::custom_delete_single_file($file_path);

        if (!empty($uploaded_image))
        {
            $uploaded_image->rooms()->detach();
            $uploaded_image->delete();
        }

        return response()->json([
            'message' => 'File successfully delete'], 200
        );
    }
}
