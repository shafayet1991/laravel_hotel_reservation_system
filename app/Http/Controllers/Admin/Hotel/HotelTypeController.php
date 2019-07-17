<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelType;
use App\Services\HotelService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelTypeController extends Controller
{
    public function index()
    {
        return true;
    }

    public function create()
    {
        $selected = Hotel::where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::SELECTED);
        })->pluck('id')->toArray();

        $se_hotels=[];
        if(count($selected) > 0){
            foreach($selected as $index => $se){
                $se_hotels[$index] = Hotel::where('id',$se)->first();
            }
        }

        $thermal = Hotel::where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::THERMAL);
        })->pluck('id')->toArray();

        $t_hotels=[];
        if(count($thermal) > 0){
            foreach($thermal as $index => $th){
                $t_hotels[$index] = Hotel::where('id',$th)->first();
            }
        }

        $city = Hotel::where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::CITY);
        })->pluck('id')->toArray();

        $city_hotels =[];
        if(count($city ) > 0){
            foreach($city as $index => $ci){
                $city_hotels[$index] = Hotel::where('id',$ci)->first();
            }
        }

        $villa = Hotel::where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::VILLA);
        })->pluck('id')->toArray();

        $villa_hotels=[];
        if(count($villa) > 0){
            foreach($villa as $index => $vi){
                $villa_hotels[$index] = Hotel::where('id',$vi)->first();
            }
        }

        $hotels = Hotel::all();

        return view("admin.pages.hotel.type.create",
            compact(
                'hotels',
                'selected',
                'thermal',
                'city',
                'villa',
                't_hotels',
                'city_hotels',
                'villa_hotels',
                'se_hotels'
            )
        );
    }

    public function store(Request $request)
    {
        $selected_type = HotelType::findOrFail(HotelType::SELECTED);
        $selected_type->hotels()->sync($request->selected_hotels);

        $thermal_type = HotelType::findOrFail(HotelType::THERMAL);
        $thermal_type->hotels()->sync($request->thermal_hotels);

        $city_type = HotelType::findOrFail(HotelType::CITY);
        $city_type->hotels()->sync($request->city_hotels);

        $villa_type = HotelType::findOrFail(HotelType::VILLA);
        $villa_type->hotels()->sync($request->villas);

        return redirect()->back();
    }
}
