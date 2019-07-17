<?php

namespace App\Models\Reservation;

use App\Helpers\Helper;
use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Hotel\Hotel;
use App\Models\Room\Room;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $attributes = [
        'is_completed' => 0,
        'approval_information' => 1,
        'payment_type' => 1
    ];

    public function scopeCompleted($query,$data)
    {
        return $query->where('is_completed',$data);
    }

    public function getPersonFullNameAttribute()
    {
        $name = $this->person_name ?? '';
        $surname = $this->person_surname ?? '';
        return $name . " " . $surname;
    }

    public function getPaymentTypeAttribute($attribute)
    {
        $data = [
            '1' => 'Havale',
            '2' => 'Kredi Kartı'
        ];

        if(array_key_exists($attribute,$data)){
            return $data[$attribute];
        }else{
            return null;
        }
    }

    public function getApprovalInformationAttribute($attribute)
    {
        $data = [
            '0' => 'HAYIR, ONAYLAMADI',
            '1' => 'EVET, ONAYLADI'
        ];

        if(array_key_exists($attribute,$data)){
            return $data[$attribute];
        }else{
            return null;
        }
    }

    public function getGenderAttribute()
    {
        switch ($this->person_gender) {
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

    public function getStatusAttribute()
    {
        switch ($this->is_completed) {
            case 1:
                return "TAMAMLANDI";
                break;
            default:
                return "TAMAMLANMADI";
                break;
        }
    }

    public function getBillingTypeInfoAttribute()
    {
        switch ($this->billing_type) {
            case "a":
                return "Şahıs";
                break;
            case "b":
                return "Firma";
                break;
            default:
                return "";
                break;
        }
    }

    public function getTcCitizenAttribute()
    {
        switch ($this->no_tc_citizen) {
            case 0:
                return "T.C Vatandaşı | " . $this->person_tc_no ?? '';
                break;
            case 1:
                return "Yabancı Uyruklu";
                break;
            default:
                return "";
                break;
        }
    }

    public function getProcessAttribute()
    {
        switch ($this->is_process_incomplete) {
            case 0:
                return "TAMAMLANAMADI";
                break;
            case 1:
                return "TAMAMLANDI";
                break;
            default:
                return "";
                break;
        }
    }

    public function getCampaignAttribute()
    {
        switch ($this->is_aware_campaign) {
            case 0:
                return "HAYIR,İSTEMİYORUM";
                break;
            case 1:
                return "HABERDAR OLMAK İSTERİM";
                break;
            default:
                return "";
                break;
        }
    }

    public function getElevatorAttribute()
    {
        switch ($this->is_close_to_elevator) {
            case 0:
                return "FARKETMEZ";
                break;
            case 1:
                return "YAKIN OLSUN";
                break;
            default:
                return "";
                break;
        }
    }

    public function getSmokingAttribute()
    {
        switch ($this->is_close_to_elevator) {
            case 0:
                return "FARKETMEZ";
                break;
            case 1:
                return "SİGARA İÇİLMEYEN";
                break;
            default:
                return "";
                break;
        }
    }

    public function getGeneralUsageAttribute()
    {
        switch ($this->is_general_use) {
            case 0:
                return "FARKETMEZ";
                break;
            case 1:
                return "YAKIN OLSUN";
                break;
            default:
                return "";
                break;
        }
    }

    public function getFloorAttribute()
    {
        switch ($this->is_upper_floor) {
            case 0:
                return "FARKETMEZ";
                break;
            case 1:
                return "ÜST KATTA OLSUN";
                break;
            default:
                return "";
                break;
        }
    }

    public function getPlaneRoundTypeAttribute()
    {
        switch ($this->plane_round_trip) {
            case "a":
                return "Gidiş - Dönüş İstiyorum";
                break;
            case "b":
                return "Sadece Gidiş İstiyorum";
                break;
            case "c":
                return "Sadece Dönüş İstiyorum";
                break;
            default:
                return "";
                break;
        }
    }

    public function getPlanePassengerAttribute()
    {
        switch ($this->plane_passenger_type) {
            case 1:
                return "TÜM YOLCULAR";
                break;
            case 2:
                return "BAZI YOLCULAR";
                break;
            default:
                return "";
                break;
        }
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function reports()
    {
        return $this->hasMany(ReservationPaymentReport::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'billing_country','id');
    }

    public function city()
    {
        return $this->belongsTo(City::class,'billing_city','id');
    }

    public function district()
    {
        return $this->belongsTo(County::class,'billing_district','id');
    }

    public function adults()
    {
        return $this->hasMany(ReservationAdult::class);
    }

    public function children()
    {
        return $this->hasMany(ReservationChild::class);
    }

    public function transfers()
    {
        return $this->belongsToMany(ReservationTransfer::class,'reservation_transfer');
    }

}
