<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contact', compact('contacts'));
    }

    public function store(Request $request)
    {
        Contact::create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'call_day' => $request->call_day,
            'call_time' => $request->call_time
        ]);

        return redirect()->back();
    }
}
