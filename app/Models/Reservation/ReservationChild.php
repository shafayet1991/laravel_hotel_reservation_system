<?php

namespace App\Models\Reservation;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class ReservationChild extends Model
{
    protected $guarded = ['id'];

    public function getAgeAttribute()
    {
        if(Helper::custom_check_empty($this->child_birthday) !== false){
            return Helper::custom_carbon_calculate_age($this->child_birthday);
        }
        return null;
    }

    public function getChildFullNameAttribute()
    {
        $name = $this->child_name ?? '';
        $surname = $this->child_surname ?? '';
        return $name . " " . $surname;
    }

    public function getGenderNameAttribute()
    {
        switch ($this->child_gender) {
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
