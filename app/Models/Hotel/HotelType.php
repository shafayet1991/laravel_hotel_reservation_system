<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelType extends Model
{
    const SELECTED = 6;
    const THERMAL = 3;
    const CITY = 2;
    const VILLA = 5;

    protected $guarded = ['id'];

    public $timestamps = false;

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class,'hotel_type_hotel');
    }
}
