<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    private $photos_path;

    public function __construct()
    {
        $this->photos_path = public_path('/hotels/images/');
    }

    public function store(Request $request)
    {
        $photos = $request->file('file');

        $files = array();

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

            $file->hotels()->attach($request->hotel_id);

            $files[] = [
                'id' => $file->id,
                'name' => $file->name,
                'original_name' => basename($photo->getClientOriginalName()),
            ];
        }

        return response()->json([
            'files' => $files,
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

        if (file_exists($file_path))
        {
            unlink($file_path);
        }

        if (!empty($uploaded_image))
        {
            $uploaded_image->hotels()->detach();
            $uploaded_image->delete();
        }

        return response()->json([
            'message' => 'File successfully delete'], 200
        );
    }
}
