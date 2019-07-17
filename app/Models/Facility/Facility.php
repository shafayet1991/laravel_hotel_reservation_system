<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(FacilityCategory::class);
    }
}
