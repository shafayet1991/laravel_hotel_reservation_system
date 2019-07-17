<?php

namespace App\Models\Blog;

use App\Helpers\Helper;
use App\Models\Image\Image;
use App\Models\Seo\Seo;
use Illuminate\Database\Eloquent\Model;

class BlogAuthor extends Model
{
    protected $guarded = ['id'];

    public $path = "blogs/author";

    public function getFileAttribute()
    {
        if(Helper::custom_check_empty($this->image) !== false){
            return $this->path . "/" . $this->id . "/" . $this->image->name;
        }else{
            return "images/no-image.png";
        }
    }

    public function getFileDirectoryAttribute()
    {
        if(Helper::custom_check_empty($this->image) !== false){
            return $this->path . "/" . $this->id;
        }else{
            return false;
        }
    }

    public function seo()
    {
        return $this->morphOne(Seo::class,'seoable');
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }
}
