<?php

namespace App\Http\Controllers\Common\Subscriber;

use App\Helpers\Helper;
use App\Http\Requests\Subscriber\StoreSubscriberRequest;
use App\Models\Subscriber\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::paginate(10);
        return view("admin.pages.subscriber.index",compact('subscribers'));
    }

    public function save(StoreSubscriberRequest $request)
    {
        Subscriber::create($request->except('_token'));
        return response()->json(
            ['status' => '200','message' => 'Aboneliğiniz içerisinde kampanyalarımızdan sizleri sık sık haberdar edeceğiz']
        );
    }


}
