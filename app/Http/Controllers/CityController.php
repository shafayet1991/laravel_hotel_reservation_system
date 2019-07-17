<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show($id)
    {
        $counties = County::where('city_id', $id)->get();

        return response()->json($counties);
    }
}
