<?php

namespace App\Traits;

use App\Helpers\Helper;
use App\Models\Page\HomepageIcon;
use App\Models\Page\Menu;
use App\Models\Setting\GeneralSetting;
use App\Models\Setting\SocialMediaSetting;

trait ClientTrait
{
    protected function get_client_menus()
    {
        $menus = Menu::where('top_id',0)->get();
        if(Helper::custom_check_empty($menus) !== false){
            return $menus;
        }
        return [];
    }

    protected function get_general_settings()
    {
        $general = GeneralSetting::first();
        if(Helper::custom_check_empty($general) !== false){
            return $general;
        }
        return null;
    }

    protected function get_social_media_settings()
    {
        $socials = SocialMediaSetting::get();
        if(Helper::custom_check_empty($socials) !== false){
            return $socials;
        }
        return [];
    }

    protected function get_homepage_icons()
    {
        $icons = HomepageIcon::take(6)->get();
        if(Helper::custom_check_empty($icons) !== false){
            return $icons;
        }
        return [];
    }
}