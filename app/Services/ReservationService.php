<?php

namespace App\Services;

use App\Helpers\Helper;

class ReservationService
{
    public static function compare_child_ages($birthdays,$ages,$child_count)
    {
        if(Helper::custom_check_empty($birthdays) && count($birthdays) > 0 && Helper::custom_check_empty($ages) && Helper::custom_check_empty($child_count)){
            $ages=explode('-',$ages);
            $result=[];

            if(array_key_exists(0,$birthdays)){
                $result['child_birthday.' . 0] = ($ages[0] == Helper::custom_carbon_calculate_age($birthdays[0])) ? 'success' : '1.Çocuk Yaşı, Doğru Girilmedi';
            }

            if(array_key_exists(1,$birthdays)) {
                $result['child_birthday.' . 1] = ($ages[1] == Helper::custom_carbon_calculate_age($birthdays[1])) ? 'success' : '2.Çocuk Yaşı, Doğru Girilmedi';
            }

            if(array_key_exists(2,$birthdays)){
                $result['child_birthday.' . 2] = ($ages[2] == Helper::custom_carbon_calculate_age($birthdays[2])) ? 'success' : '3.Çocuk Yaşı, Doğru Girilmedi';
            }

            if(array_key_exists(3,$birthdays)) {
                $result['child_birthday.' . 3] = ($ages[3] == Helper::custom_carbon_calculate_age($birthdays[3])) ? 'success' : '4.Çocuk Yaşı, Doğru Girilmedi';
            }

            return $result;
        }
        return false;
    }
}