<?php

namespace App\Models\Seo;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $guarded = [];

    public function seoable()
    {
        return $this->morphTo();
    }
}
