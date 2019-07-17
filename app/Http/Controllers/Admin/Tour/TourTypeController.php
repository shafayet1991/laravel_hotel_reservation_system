<?php

namespace App\Http\Controllers\Admin\Tour;

use App\Helpers\Helper;
use App\Models\File\File;
use App\Models\Tour\TourType;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TourType::orderByDesc("id")->paginate(10);
        return view('admin.pages.tour.type.list', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tour.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $path = public_path('tours\types\images');
            if(Helper::custom_upload_single_image($request->file('file'),$path,3) !== false){
                $file_id = Helper::custom_upload_single_image($request->file('file'),$path,3);
            }
        }
        $inputs = $request->except('_token','file');
        $inputs['file_id'] = $file_id ?? '';
        $type = TourType::create($inputs);
        Session::flash("success","Başarılı bir şekilde yeni bir kayıt oluşturuldu");
        return redirect(route('tour_type.edit',$type->id));
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
        $type = TourType::with('file')->findOrFail($id);
        return view("admin.pages.tour.type.edit",compact("type"));
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
        dd("Update kısmının resim işlemisi henüz yapılmadı. Şimdilik duraklatıldı!");
        $type = TourType::findOrFail($id);
        $inputs = $request->except('_token','file');
        $type->update($inputs);
        Session::flash("success","Başarılı bir şekilde kayıt güncelleme işlemi gerçekleştirildi");
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
        $type = TourType::findOrFail($id);
        $type->delete();
        Session::flash("success","Başarılı bir şekilde kayıt silme işlemi gerçekleştirildi");
        return redirect()->back();
    }
}
