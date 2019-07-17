<?php

namespace App\Models\File;

use App\Models\Hotel\Hotel;
use App\Models\Room\Room;
use App\Models\Tour\Tour;
use App\Models\Tour\TourType;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = ['id'];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class);
    }

    public function tour_type()
    {
        return $this->hasOne(TourType::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }
}
