<?php

namespace App\Http\Controllers\Client\Search;

use App\Helpers\Helper;
use App\Models\City;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelType;
use App\Services\HotelService;
use App\Traits\ClientTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    use ClientTrait;

    public function index()
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();
        $client = Input::all();

        Session::put('client', $client);

        $query = Hotel::query();

        $query->where('is_active', true);
        $selected_city = null;

        $cities = City::all();

        if ($client['type'] === "hotel") {
            $search_hotel = Hotel::findOrFail($client['id']);
            return redirect(route('client.slug', $search_hotel->slug ?? ''));
        } elseif ($client['type'] === "city") {
            $query->with('rooms')->where('city_id', $client['id']);

            $selected_city = City::findOrFail($client['id']);
        } elseif ($client['type'] === "holiday_resort_hotels") {
            $query->where('is_active', true)->whereHas('hotel_types', function ($query) {
                $query->where('hotel_type_id', 1);
            });
        } elseif ($client['type'] === "city_hotels") {
            $query->where('is_active', true)->whereHas('hotel_types', function ($query) {
                $query->where('hotel_type_id', 2);
            });
        } elseif ($client['type'] === "thermal_hotels") {
            $query->where('is_active', true)->whereHas('hotel_types', function ($query) {
                $query->where('hotel_type_id', 3);
            });
        } elseif ($client['type'] === "villas") {
            $query->where('is_active', true)->whereHas('hotel_types', function ($query) {
                $query->where('hotel_type_id', 5);
            });
        } elseif ($client['type'] === "choosed_hotels") {
            $query->where('is_active', true)->whereHas('hotel_types', function ($query) {
                $query->where('hotel_type_id', HotelType::SELECTED);
            });
        }

        $hotels = $query->get();

        foreach ($hotels as $hotel) {
            $rooms = HotelService::roomSearchByParams
            (
                $client['adult_count'],
                $client['child_count'],
                $client['child_ages'],
                $client['start_date'],
                $client['end_date'],
                $hotel->id
            );

            $hotel->min_price = count($rooms) ? min(array_column($rooms, 'price')) : 0;

            $hotel->discount = rand(10, 20);
        }

        $filtered_hotels = $hotels->reject(function ($item, $key) {
            return $item->min_price < 1;
        });


        if (!empty($client["sorting"]) && $client["sorting"] == "price_asc") {
            $filtered_hotels = $filtered_hotels->sortBy('min_price');
        }

        if (!empty($client["sorting"]) && $client["sorting"] == "price_desc") {
            $filtered_hotels = $filtered_hotels->sortBy('min_price', null, true);
        }

        return view('client.pages.search.index',
            [
                'menus' => $menus,
                'socials' => $socials,
                'general' => $general,
                'hotels' => $filtered_hotels,
                'cities' => $cities,
                'selected_city' => $selected_city,
            ]
        );
    }

    public function sort(Request $request)
    {
        $client = Input::all();
        Session::put('client', $client);
        $query = Hotel::query();
        $hotels = $query->get();
        foreach ($hotels as $hotel) {
            $rooms = HotelService::roomSearchByParams
            (
                $client['adult_count'],
                $client['child_count'],
                $client['child_ages'],
                $client['start_date'],
                $client['end_date'],
                $hotel->id,
                null,
                $client['sorting']
            );

            $hotel->min_price = count($rooms) ?? '' ? min(array_column($rooms, 'price')) : 0;

            $hotel->discount = rand(10, 20);
        }


        return view('client.pages.search.hotels', compact('hotels'));

//        return view('client.pages.search.hotels',['hotels' => array()]);
    }
}
