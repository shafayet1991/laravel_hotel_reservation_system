<?php

namespace App\Models\Tour;

use Illuminate\Database\Eloquent\Model;

class TourDay extends Model
{
    protected $guarded = ['id'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
