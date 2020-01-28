<?php

namespace App\Http\Controllers\Admin\Hotel;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\HotelRequest;
use App\Http\Requests\Hotel\UpdateHotelRequest;
use App\Models\Airport;
use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Currency;
use App\Models\Facility\FacilityCategory;
use App\Models\Feature;
use App\Models\File\File;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelBoardType;
use App\Models\Hotel\HotelType;
use App\Models\Reservation\ReservationTransfer;
use App\Models\BoardType;
use App\Models\Room\RoomFeature;
use App\Models\Room\RoomPossibility;
use App\Models\Room\RoomType;
use App\Models\PaymentType;
use App\Models\Theme;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();

        return view('admin.pages.hotel.list', compact('hotels'));
    }

    public function create()
    {
        $airports = Airport::all();
        $countries = Country::all();
        $currencies = Currency::all();
        $hotel_board_types = HotelBoardType::all();
        $hotel_types = HotelType::all();

        //return $countries;

        return view('admin.pages.hotel.create', compact('airports', 'currencies', 'countries', 'hotel_board_types', 'hotel_types'));
    }

    public function store(HotelRequest $request)
    {
        $inputs = $request->except('_token', 'hotel_type_id');
        $hotel = Hotel::create($inputs);
//        $hotel->hotel_types()->sync($request->hotel_type_id);
        Helper::custom_session_flash("success", "store");
        return redirect('/adminpanel/hotel/' . $hotel->id . '/edit?tab=general_information');
    }

    public function edit($id)
    {
        $hotel = Hotel::with('country', 'board_type','seo')->findOrFail($id);
        $room_features = RoomFeature::get();
        $room_possibilities = RoomPossibility::get();
        $airports = Airport::all();
        $features = Feature::all();
        $transfers = ReservationTransfer::where('hotel_id', $id)->get();
        $countries = Country::all();
        $hotel_board_types = HotelBoardType::all();
        $cities = null;
        $counties = null;
        $hotel_facilities = array();
        $hotel_themes = array();
        $hotel_payment_types = array();
        $hotel_features = array();

        $names['hotel_name'] = $hotel->name ?? '';

        if (!is_null($hotel->city_id)) {
            $counties = County::where('city_id', $hotel->city_id)->get();
        }

        $currencies = Currency::all();
        $hotel_types = HotelType::all();
        $hotel_type_ids = $hotel->hotel_types()->pluck('hotel_type_id')->toArray();
        $meal_types = BoardType::all();
        $room_types = RoomType::all();
        $facility_categories = FacilityCategory::all();
        $themes = Theme::all();
        $payment_types = PaymentType::all();

        foreach ($hotel->facilities()->get() as $f) {
            $hotel_facilities[$f->pivot->facility_id] = $f->pivot->is_paid;
        }

        $hotel_themes = [];
        foreach ($hotel->themes()->get() as $f) {
            array_push($hotel_themes, $f->pivot->theme_id);
        }

        foreach ($hotel->features()->get() as $f) {
            $hotel_features[] = $f->pivot->feature_id;
        }

        foreach ($hotel->payment_types()->get() as $f) {
            $hotel_payment_types[] = $f->pivot->payment_type_id;
        }

        return view
        ('admin.pages.hotel.edit',
            compact
            ('hotel',
                'airports',
                'room_features',
                'room_possibilities',
                'countries',
                'cities',
                'counties',
                'currencies',
                'meal_types',
                'room_types',
                'facility_categories',
                'themes',
                'payment_types',
                'hotel_facilities',
                'hotel_themes',
                'hotel_features',
                'hotel_payment_types',
                'features',
                'transfers',
                'names',
                'hotel_board_types',
                'hotel_types',
                'hotel_type_ids'
            )
        );
    }

    public function update(UpdateHotelRequest $request, $id)
    {
        $inputs = $request->except('_token', '_method', 'hotel_type_id','hotel_id');
        $hotel = Hotel::find($id);
        $hotel->update($inputs);
//        $hotel->hotel_types()->sync($request->hotel_type_id);

        Helper::custom_session_flash("success", "update");

        return redirect('/adminpanel/hotel/' . $hotel->id . '/edit?tab=general_information');
    }

    public function setting(Request $request)
    {
        $hotel = Hotel::with('seo')->findOrFail($request->id);
        $hotel->seo()->updateOrCreate(['seoable_id' => $hotel->id],[
            'page_title' => $request->page_title,'seo_title' => $request->seo_title,'seo_keyword' => $request->seo_keyword,'seo_description' => $request->seo_description
        ]);

        $imageName = null;

        if (!is_null($request->file('promo_photo'))) {

            $imageName = time() . '.' . $request->promo_photo->getClientOriginalExtension();
            $request->promo_photo->move(public_path('hotels/promo_photos'), $imageName);
            $hotel->promo_photo = $imageName;
        }

        $hotel->reservation = $request->reservation ?? false;

        $hotel->save();

        $hotel->payment_types()->sync($request->payment_types);
        $hotel->themes()->sync($request->themes);
        $hotel->features()->sync($request->features);

        return redirect('/adminpanel/hotel/' . $hotel->id . '/edit?tab=general_setting');
    }

    public function destroy($id)
    {
        $hotel = Hotel::with('files', 'rooms.files')->findOrFail($id);

        if (count($hotel->rooms) > 0) {
            foreach ($hotel->rooms as $room) {
                if (count($room->files) > 0) {
                    foreach ($room->files as $room_file) {
                        $real_path = $room->rooms_path . "/" . $room_file->name;
                        Helper::custom_delete_single_file($real_path);
                        $room_file->delete();
                    }
                }


            }
        }
        if (count($hotel->files) > 0) {
            foreach ($hotel->files as $file) {
                $real_path = $hotel->images_path . "/" . $file->name;
                Helper::custom_delete_single_file($real_path);
                $file->delete();
            }
        }

        if (Helper::custom_check_empty($hotel->promo_photo) !== false) {
            if (Helper::custom_delete_single_file($hotel->promo_photo_file) === false) {
                Helper::custom_session_flash("error", "file_delete");
                return redirect()->back();
            }
        }

        $hotel->files()->detach();
        $hotel->seo()->delete();
        $hotel->delete();

        Helper::custom_session_flash("success", "store");
        return redirect()->back();

    }
}

