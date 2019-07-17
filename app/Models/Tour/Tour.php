<?php

namespace App\Models\Tour;

use App\Models\File\File;
use App\Models\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = ['id'];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function type()
    {
        return $this->hasOne(TourType::class,'id','type_id');
    }

    public function files()
    {
        return $this->belongsToMany(File::class);
    }

    public function prices()
    {
        return $this->hasMany(TourPrice::class);
    }

    public function days()
    {
        return $this->hasMany(TourDay::class);
    }

}
