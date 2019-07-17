<?php

namespace App\Http\Controllers\Admin\Subscriber;

use App\Helpers\Helper;
use App\Models\Subscriber\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Subscriber::get();
        return view("admin.pages.subscriber.index", compact("rows"));
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
    public function show($id)
    {
        $subscriber = Subscriber::findOrFail($id);
        return view('admin.pages.subscriber.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $subscriber = Subscriber::findOrFail($id);
//        return view('admin.pages.reservation.edit', compact('subscriber'));
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
        $subscriber = Subscriber::findOrFail($id);
        $subscriber->delete();
        Helper::custom_session_flash("success", "destroy");
        return redirect()->back();
    }

    public function softDeletes()
    {
        $rows = Subscriber::onlyTrashed()->get();
        return view("admin.pages.subscriber.trashed.index", compact("rows"));
    }

    public function forceDelete($id)
    {
        $subscriber = Subscriber::withTrashed()
            ->where('id', $id)
            ->firstOrFail();
        $subscriber->forceDelete();
        return back();
    }
}
