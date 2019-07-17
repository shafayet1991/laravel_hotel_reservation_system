<?php

namespace App\Models\Tour;

use App\Models\File\File;
use Illuminate\Database\Eloquent\Model;

class TourType extends Model
{
    protected $guarded = ['id'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
