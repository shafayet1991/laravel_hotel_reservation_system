<?php

namespace App\Http\Controllers\Client\Hotel;

use App\Helpers\Helper;
use App\Models\City;
use App\Models\Hotel\Hotel;
use App\Http\Controllers\Controller;
use App\Traits\ClientTrait;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Services\HotelService as HotelService;
use Illuminate\Support\Facades\Cookie;
use App\Models\Facility\FacilityCategory;

class HotelController extends Controller
{
    use ClientTrait;

    public function detail($slug)
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();

        $city_or_hotel = \session('client.city_or_hotel');
        $city_or_hotel_id = \session('client.city_or_hotel_id');
        $start_date = \session('client.start_date');
        $end_date = \session('client.end_date');
        $adult_count = \session('client.adult_count')??0;
        $child_count = \session('client.child_count')??0;
        $child_ages = \session('client.child_ages')??array();

        \session()->forget('client');


        $hotel = Hotel::with(['seo','city','county','rooms','facilities','files' => function($query) {
            $query->where("file_type_id", 1);
        }
        ])->where('slug',$slug)->first();
//        SEOMeta::setSeoTitle($hotel->seo->seo_title ?? '');
        SEOMeta::setTitle($hotel->seo->page_title ?? '');
        SEOMeta::setDescription($hotel->seo->seo_description?? '');
        $a=SEOMeta::setKeywords($hotel->seo->seo_keyword?? '');
        SEOMeta::setCanonical(url('/'));

        $interests = Hotel::where('is_active', true)->whereNotIn("id",[$hotel->id])->where("city_id",$hotel->city_id ?? 0)->inRandomOrder()->take(3)->get();

        $facility_categories = FacilityCategory::all();

        return view('client.pages.hotel.detail',
            [
                'general' => $general,
                'socials' => $socials,
                'menus' => $menus,
                'hotel' => $hotel,
                'interests' => $interests,
                'city_or_hotel' => $city_or_hotel,
                'city_or_hotel_id' => $city_or_hotel_id,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'adult_count' => $adult_count,
                'child_count' => $child_count,
                'child_ages' => $child_ages,
                'facility_categories' => $facility_categories
            ]
        );
    }
}
