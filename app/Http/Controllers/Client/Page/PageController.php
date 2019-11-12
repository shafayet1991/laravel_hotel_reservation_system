<?php

namespace App\Http\Controllers\Client\Page;

use App\Helpers\Helper;
use App\Models\Blog\Blog;
use App\Models\Facility\FacilityCategory;
use App\Models\Hotel\Hotel;
use App\Models\Page\Menu;
use App\Models\Page\StaticPage;
use App\Services\Client\StaticPageService;
use App\Traits\ClientTrait;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    use ClientTrait;

    public function page($slug)
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();

        $menu = Menu::where('slug', $slug)->first();

        if(Helper::custom_check_empty($menu) !== false){

            //        SEOMeta::setSeoTitle($hotel->seo->seo_title ?? '');
            SEOMeta::setTitle($menu->seo->page_title ?? '');
            SEOMeta::setDescription($menu->seo->seo_description?? '');
            SEOMeta::setKeywords($menu->seo->seo_keyword?? '');
            SEOMeta::setCanonical(url('/'));

            switch ($menu->template) {
                case "staticpage-template":
                    $static = StaticPageService::staticpage_template($menu->id);
                    $names['page'] = $menu->textTrans('name');

                    return view('client.pages.static.index',compact('general','socials','static','names','menus'));
                    break;
                case "hotel-template":
                    $hotels = StaticPageService::hotel_template(3);
                    $names['page'] = $menu->textTrans('name');
                    return view('client.pages.hotel.index',compact('general','socials','hotels','names','menus'));
                    break;
                case "contact-template":
                    $names['page'] = $menu->textTrans('name');
                    return view('client.pages.contact.index',compact('general','socials','names','menus'));
                    break;
                case "blog-template":
                    $randoms = Blog::with('categories','tags','author')->inRandomOrder()->take(8)->get();
                    $blogs = Blog::with('categories','tags','author')->orderByDesc('id')->paginate(6);
                    $names['page'] = $menu->textTrans('name');
                    return view('client.pages.blog.index',compact('general','socials','names','menus','blogs','randoms'));
                    break;
                case "tour-template":
                    dd("tur şablonu yapılma aşamasındadır...");
                    $names['page'] = $menu->textTrans('name');
                    return view('client.pages.static.index',compact('general','socials','static','names','menus'));
                    break;
                default:
                    abort(404);
                    break;
            }
        }

        $hotel = Hotel::with(['seo','city','county','rooms','facilities','files' => function($query) {
            $query->where("file_type_id", 1);
        }
        ])->where('slug',$slug)->first();

        if(Helper::custom_check_empty($hotel) !== false){
            //        SEOMeta::setSeoTitle($hotel->seo->seo_title ?? '');
            SEOMeta::setTitle($hotel->seo->page_title ?? '');
            SEOMeta::setDescription($hotel->seo->seo_description?? '');
            $a=SEOMeta::setKeywords($hotel->seo->seo_keyword?? '');
            SEOMeta::setCanonical(url('/'));

            $interests = Hotel::where('is_active', true)->whereNotIn("id",[$hotel->id])->where("city_id",$hotel->city_id ?? 0)->inRandomOrder()->take(3)->get();

            $facility_categories = FacilityCategory::all();

            $city_or_hotel = \session('client.city_or_hotel');
            $city_or_hotel_id = \session('client.city_or_hotel_id');
            $start_date = \session('client.start_date');
            $end_date = \session('client.end_date');
            $adult_count = \session('client.adult_count')??0;
            $child_count = \session('client.child_count')??0;
            $child_ages = \session('client.child_ages')??array();

            \session()->forget('client');

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
}
