<?php

namespace App\Http\Controllers\Client\Tour;

use App\Models\Tour\Tour;
use App\Traits\ClientTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TourController extends Controller
{
    use ClientTrait;

    public function detail($id)
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();
        $tour = Tour::with(['prices','files','type'])->findOrFail($id);
        return view("client.pages.tour.detail",compact('tour','menus','general','socials'));
    }
}
