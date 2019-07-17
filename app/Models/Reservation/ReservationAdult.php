<?php

namespace App\Models\Reservation;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class ReservationAdult extends Model
{
    protected $guarded = ['id'];

    public function getAgeAttribute()
    {
        if(Helper::custom_check_empty($this->adult_birthday) !== false){
            return Helper::custom_carbon_calculate_age($this->adult_birthday);
        }
        return null;
    }

    public function getAdultFullNameAttribute()
    {
        $name = $this->adult_name ?? '';
        $surname = $this->adult_surname ?? '';
        return $name . " " . $surname;
    }

    public function getGenderNameAttribute()
    {
        switch ($this->adult_gender) {
            case "male":
                return "ERKEK";
                break;
            case "female":
                return "KADIN";
                break;
            default:
                return "";
                break;
        }
    }
}
