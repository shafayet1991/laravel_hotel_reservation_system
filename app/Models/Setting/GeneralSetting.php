<?php

namespace App\Models\Setting;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class GeneralSetting extends Model
{
    protected $guarded = ['id'];

    public $path = "images/logo";

    public function getFileAttribute()
    {
        if (Helper::custom_check_empty($this->logo) !== false) {
            return $this->path . "/" . $this->logo;
        } else {
            return $this->logo = "images/no-image.png";
        }
    }

    public function textTrans($text)
    {
        $locale=App::getLocale();
        $column=$locale.'_'.$text;
        return $this->{$column};
    }
}
