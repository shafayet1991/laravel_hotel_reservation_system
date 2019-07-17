<?php

namespace App\Http\Controllers\Admin\Tour;

use App\Helpers\Helper;
use App\Models\Tour\TourPrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TourPrice::create($request->except('_token'));
        Helper::custom_session_flash("success","store");
        return redirect()->back();
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
        $price = TourPrice::with("tour")->findOrFail($id);
        return view('admin.pages.tour.price', compact('price'));
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
        $inputs = $request->except('_token', '_method');
        $price = TourPrice::findOrFail($id);
        $price->update($inputs);
        $price->save();
        Helper::custom_session_flash("success","update");
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
        $type = TourPrice::findOrFail($id);
        $type->delete();
        Helper::custom_session_flash("success","destroy");
        return redirect()->back();
    }
}
