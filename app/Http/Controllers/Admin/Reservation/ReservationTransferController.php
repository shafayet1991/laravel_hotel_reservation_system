<?php

namespace App\Http\Controllers\Admin\Reservation;

use App\Models\Reservation\ReservationTransfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationTransferController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ReservationTransfer::create($request->except('_token'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($hotel_id,$transfer_id)
    {
        $transfer = ReservationTransfer::where(['hotel_id' => $hotel_id,'id' => $transfer_id])->firstOrFail();
        return view("admin.pages.hotel.transfer",compact('transfer','hotel_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $transfer = ReservationTransfer::where(['hotel_id' => $req->hotel_id,'id' => $req->transfer_id])->first();
        $transfer->update($req->except('_token'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($hotel_id,$transfer_id)
    {
        $transfer = ReservationTransfer::where(['hotel_id' => $hotel_id,'id' => $transfer_id])->first();
        isset($transfer) ? $transfer->delete() : '';
        return redirect()->back();
    }
}
