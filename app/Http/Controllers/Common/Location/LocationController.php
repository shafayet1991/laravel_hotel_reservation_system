<?php

namespace App\Http\Controllers\Common\Location;

use App\Models\City;
use App\Models\County;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function get_cities_from_country($id)
    {
        return City::where('country_id',$id)->get();
    }

    public function get_counties_from_city($id)
    {
        return County::where('city_id',$id)->get();
    }
}
