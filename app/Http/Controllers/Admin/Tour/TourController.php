<?php

namespace App\Http\Controllers\Admin\Tour;

use App\Helpers\Helper;
use App\Models\City;
use App\Models\Tour\Tour;
use App\Models\Tour\TourDay;
use App\Models\Tour\TourType;
use App\Services\TourService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::orderByDesc("id")->paginate(10);
        return view('admin.pages.tour.list', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        $types = TourType::get();
        return view('admin.pages.tour.create', compact('cities', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $tour = Tour::create($inputs);
        Helper::custom_session_flash("success","store");
        return redirect(route('tour.edit', $tour->id));

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
    public function edit($id)
    {
        $tour = Tour::with('type', 'files', 'prices', 'days')->findOrFail($id);
        $types = TourType::get();
        $cities = City::get();
        return view("admin.pages.tour.edit", compact("tour", "cities", 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $tour->update($request->except('_token'));
        Session::flash("success", "update");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();
        Session::flash("success", "Başarılı bir şekilde silme işlemi gerçekleştirildi");
        return redirect()->back();
    }

    public function tour_day(Request $request)
    {
        if(Helper::custom_check_empty($request->title) !== false){
            if(count($request->title) > 0){
                for ($i = 0; $i < count($request->title); $i++) {
                    if (Helper::custom_check_empty($request->title[$i]) !== false) {
                        TourDay::updateOrCreate(
                            ['tour_id' => $request->tour_id ?? 0, 'rank' => $request->rank[$i] ?? 0],
                            [
                                'title' => $request->title[$i] ?? '',
                                'description' => $request->description[$i] ?? ''
                            ]
                        );
                    }
                }
            }
            Helper::custom_session_flash("success","update");
            return redirect()->back();
        }
        Helper::custom_session_flash("error","update");
        return redirect()->back();

    }

}
