<?php

namespace App\Services\Client;

use App\Helpers\Helper;
use App\Models\Hotel\Hotel;
use App\Models\Page\StaticPage;
use App\Models\Theme;

class StaticPageService
{
    public static function staticpage_template($menu_id)
    {
        if (Helper::custom_check_empty($menu_id) !== false) {
            $static = StaticPage::with('seo')->where('menu_id',$menu_id)->first();
            return $static;
        }
        return false;
    }

    public static function hotel_template($paginate=20)
    {
        if (Helper::custom_check_empty($paginate) !== false) {
            $hotels = Hotel::paginate($paginate);
            return $hotels;
        }
        return false;
    }
}