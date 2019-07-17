<?php

namespace App\Http\Controllers\Admin\Reservation;

use App\Helpers\Helper;
use App\Models\Reservation\Reservation;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::orderByDesc('id')->get();
        return view("admin.pages.reservation.list", compact("reservations"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.reservation.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('admin.pages.reservation.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.pages.reservation.edit', compact('reservation'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }

    public function softDeletes()
    {
        $trasheds = Reservation::onlyTrashed()->get();
        return view("admin.pages.reservation.trashed.list", compact("trasheds"));
    }

    public function forceDelete($id)
    {
        $reservation = Reservation::withTrashed()
            ->where('id', $id)
            ->firstOrFail();
        $reservation->forceDelete();
        return back();
    }

    public function completed()
    {
        $rows = Reservation::completed(1)->get();
        return view("admin.pages.reservation.completed.list", compact("rows"));
    }

    public function uncompleted()
    {
        $rows = Reservation::completed(0)->get();
        return view("admin.pages.reservation.uncompleted.list", compact("rows"));
    }

    public function pdf($id)
    {
        $reservation = Reservation::findOrFail($id);
        $pdf = PDF::loadView('pdfs.reservation.detail', compact('reservation'));
        return $pdf->download("$reservation->order_number.pdf");
    }
}
