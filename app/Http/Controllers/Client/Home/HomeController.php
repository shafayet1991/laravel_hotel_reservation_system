<?php

namespace App\Http\Controllers\Client\Home;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Currency;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelType;
use App\Models\Theme;
use App\Services\Client\HotelTypeService;
use App\Services\ThemeService;
use App\Traits\ClientTrait;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use ClientTrait;

    public function index()
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();
        $icons = $this->get_homepage_icons();

        $choosed_hotels = Hotel::with('seo')->where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::SELECTED);
        })->get();


        $thermal_hotels = Hotel::with('seo')->where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::THERMAL);
        })->get();

        $city_hotels = Hotel::with('seo')->where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::CITY);
        })->get();

        $villa_hotels = Hotel::with('seo')->where('is_active', true)->whereHas('hotel_types' , function ($query) {
            $query->where('hotel_type_id', HotelType::VILLA);
        })->get();

        $hotels = Hotel::where('is_active', true)->get();

        $cities = City::all();
        $themes = Theme::all();
//        $theme = ThemeService::theme_hotel_cities(['domestic','international','economic']);

        //        SEOMeta::setSeoTitle($hotel->seo->seo_title ?? '');
        SEOMeta::setTitle('Halal Otel Rezervasyonu | Huzurlu Bir Tatil | Halalhotelcheck.com');
        SEOMeta::setDescription('HalalHotelCheck.com Uluslararası Otel Rezervasyon Portalı Olup, Huzurlu Bir Tatil Arayan Siz Ailelerimizin Her Zaman Yanındadır.');
        $a=SEOMeta::setKeywords('halal hotel, halal hotel check');
        SEOMeta::setCanonical(url('/'));

        return view('client.pages.homepage.index',
            compact('general','socials','icons','menus','hotels', 'cities','themes','choosed_hotels','thermal_hotels','city_hotels','villa_hotels')
        );
    }
}
