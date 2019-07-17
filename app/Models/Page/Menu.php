<?php

namespace App\Models\Page;

use App\Models\Seo\Seo;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Menu extends Model
{
    protected $guarded = ['id'];

    public static function getTopMenuName($top_menu_id)
    {
        if (is_numeric($top_menu_id)) {
            if ($top_menu_id !== 0) {
                $menu = DB::table('menus')->where(['id' => $top_menu_id])->first();
                $top_menu_name = $menu->en_name ?? '';
            } else {
                $top_menu_name = "ÜST MENÜ";
            }
            return $top_menu_name;
        }
        return false;
    }

    public static function getLastMenuId()
    {
        return DB::table('menus')->select('id')->orderByDesc('id')->first();
    }

    public static function getBottomMenus($menu_id)
    {
        if (is_numeric($menu_id)) {
            if ($menu_id !== 0) {
                $menus = DB::table('menus')->where(['top_id' => $menu_id])->get();
                return $menus;
            }
        }
        return false;
    }

    public function getThemeAttribute()
    {
        switch ($this->template) {
            case "staticpage-template":
                return "SABİT SAYFA";
                break;
            case "contact-template":
                return "İLETİŞİM SAYFASI";
                break;
            case "blog-template":
                return "BLOG SAYFASI";
                break;
                break;
            default:
                break;
        }
    }

    public function textTrans($text)
    {
        $locale = App::getLocale();
        $column = $locale . '_' . $text;
        return $this->{$column};
    }

    public function seo()
    {
        return $this->morphOne(Seo::class,'seoable');
    }
}
