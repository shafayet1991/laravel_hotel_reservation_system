<?php

namespace App\Http\Controllers\Admin\Facility;

use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FacilityController extends Controller
{
    public function store(Request $request)
    {
        $hotel = Hotel::findOrFail($request->hotel_id);

        $hotel->facilities()->sync($request->facilities);

        if (!is_null($request->is_paid))
        {
            foreach ($request->is_paid as $paid_facility)
            {
                $hotel->facilities()->updateExistingPivot($paid_facility, ['is_paid' => true]);
            }
        }

        return redirect('/adminpanel/hotel/'.$hotel->id.'/edit?tab=facilities');
    }
}
