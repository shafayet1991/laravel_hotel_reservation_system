<?php

namespace App\Models;

use App\Models\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }
}
