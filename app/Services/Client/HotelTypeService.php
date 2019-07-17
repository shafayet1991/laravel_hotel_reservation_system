<?php


namespace App\Services\Client;


use App\Helpers\Helper;
use App\Models\Contract\Contract;
use App\Models\Contract\ContractDay;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\HotelType;
use App\Models\Room\Room;
use App\Models\Room\RoomPersonDetail;
use Carbon\Carbon;
use DateTime;

class HotelTypeService
{
    public static function get_hotels($type,$count=5)
    {
        if(Helper::custom_check_empty($type) !== false)
        {
            $hotels = HotelType::with(['hotels' => function($q) use($count){
                $q->orderByDesc('id')->where('is_active',true)->take($count);
            }])->where('pivot_name',$type)->first();
            return $hotels;
        }
        return $hotels = [];
    }

}
