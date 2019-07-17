<?php

namespace App\Models\Blog;

use App\Models\Seo\Seo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class BlogCategory extends Model
{
    protected $guarded = [];

    public function seo()
    {
        return $this->morphOne(Seo::class,'seoable');
    }
}
