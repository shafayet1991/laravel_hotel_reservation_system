<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Models\Hotel\Hotel;
use App\Models\Theme;

class ThemeService
{
    public static function theme_hotel_cities($pivots)
    {
        if(Helper::custom_check_empty($pivots) !== false){
            $theme = [];
            foreach($pivots as $index => $pivot){
                switch($pivot){
                    case "domestic":
                        $domestic_cities = [];
                        $theme['domestic'] = Theme::with(['hotels.city' => function($q){
                            $q->take(16);
                        }])->where('pivot_name','domestic')->first();
                        if(Helper::custom_check_empty($theme) !== false){
                            if(count($theme[$pivot]->hotels) > 0){
                                foreach($theme[$pivot]->hotels as $hotel){
                                    $city['id'] = $hotel->city->id ?? '';
                                    $city['name'] = $hotel->city->name ?? '';
                                    array_push($domestic_cities,$city);
                                }
                            }
                            $theme['domestic']['cities'] = array_unique($domestic_cities,SORT_REGULAR);
                        }
                        break;
                    case "international":
                        $international_cities = [];
                        $theme['international'] = Theme::with(['hotels.city' => function($q){
                            $q->take(4);
                        }])->where('pivot_name','international')->first();
                        if(Helper::custom_check_empty($theme) !== false){
                            if(count($theme[$pivot]->hotels) > 0){
                                foreach($theme[$pivot]->hotels as $hotel){
                                    $city['id'] = $hotel->city->id ?? '';
                                    $city['name'] = $hotel->city->name ?? '';
                                    array_push($international_cities,$city);
                                }
                            }
                        }
                        $theme['international']['cities'] = array_unique($international_cities,SORT_REGULAR);
                        break;
                    default:
                        break;
                }

            }
            return $theme;
        }
        return false;
    }
}