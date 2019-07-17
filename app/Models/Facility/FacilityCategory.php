<?php

namespace App\Models\Facility;

use Illuminate\Database\Eloquent\Model;

class FacilityCategory extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }
}
