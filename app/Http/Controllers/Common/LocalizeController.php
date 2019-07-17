<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalizeController extends Controller
{
    public function setCurrency($currency)
    {
        session()->put(['localize.currency' => $currency]);

        return redirect()->back();
    }
}
