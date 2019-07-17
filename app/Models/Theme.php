<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Models\Hotel\Hotel;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $guarded = ['id'];

    public $path = "hotels/themes";

    public function getFileAttribute()
    {
        if(Helper::custom_check_empty($this->photo) !== false){
            return $this->path . "/" . $this->id . "/" . $this->photo;
        }else{
            return $this->photo = "images/no-image.png";
        }
    }

    public function getFileDirectoryAttribute()
    {
        if(Helper::custom_check_empty($this->photo) !== false){
            return $this->path . "/" . $this->id;
        }else{
            return false;
        }
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class);
    }

}
