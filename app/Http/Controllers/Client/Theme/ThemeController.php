<?php

namespace App\Http\Controllers\Client\Theme;

use App\Models\Theme;
use App\Traits\ClientTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    use ClientTrait;

    public function index($theme_id)
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();

        $theme = Theme::with('hotels')->findOrFail($theme_id);
        return view('client.pages.theme.index',compact('theme','menus','socials','general'));
    }
}
