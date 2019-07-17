<?php

namespace App\Models\Page;

use App\Models\Seo\Seo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class StaticPage extends Model
{
    protected $guarded = ['id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function textTrans($text)
    {
        $locale=App::getLocale();
        $column=$locale.'_'.$text;
        return $this->{$column};
    }

    public function seo()
    {
        return $this->morphOne(Seo::class,'seoable');
    }
}
