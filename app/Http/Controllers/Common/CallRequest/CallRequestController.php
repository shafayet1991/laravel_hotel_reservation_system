<?php

namespace App\Http\Controllers\Common\CallRequest;

use App\Models\CallRequest\CallRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallRequestController extends Controller
{
    public function index()
    {
        $call_requests = CallRequest::orderByDesc('created_at')->get();

        return view("admin.pages.call_request.index", compact('call_requests'));
    }

    public function store(Request $request)
    {
        $call_time = $request->call_day . " " . $request->call_hour;
        $phone = $request->phone_code . " " . $request->phone;

        CallRequest::create([
            'full_name' => $request->full_name,
            'phone' => $phone,
            'email' => $request->email,
            'call_time' => $call_time
        ]);

        return redirect()->back();
    }
}
