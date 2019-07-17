<?php

namespace App\Http\Controllers\Admin\Tour;

use App\Models\File\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourFileController extends Controller
{
    private $photos_path;

    public function __construct()
    {
        $this->photos_path = public_path('/tours/images');
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

            $file->tours()->attach($request->tour_id);
        }

        return response()->json([
            'message' => 'Image saved Successfully'
        ], 200);
    }

    public function delete(Request $request)
    {
        $filename = $request->id;

        $uploaded_image = File::where('original_name', basename($filename))->first();

        if (empty($uploaded_image))
        {
            return response()->json([
                'message' => 'Sorry file does not exist'], 400
            );
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->name;

        if (file_exists($file_path))
        {
            unlink($file_path);
        }

        if (!empty($uploaded_image))
        {
            $uploaded_image->tours()->detach();
            $uploaded_image->delete();
        }

        return response()->json([
            'message' => 'File successfully delete'], 200
        );
    }
}
