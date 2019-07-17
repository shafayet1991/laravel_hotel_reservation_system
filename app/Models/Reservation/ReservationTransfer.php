<?php

namespace App\Models\Reservation;

use Illuminate\Database\Eloquent\Model;

class ReservationTransfer extends Model
{
    protected $guarded = ['id'];

    public function getTypeAttribute()
    {
        switch ($this->transfer_type) {
            case 1:
                return "KİŞİ BAŞINA";
            case 2:
                return "TOPLU TAŞIMA";
                break;
            default:
                return $this->transfer_type = "";
                break;
        }
    }
}
