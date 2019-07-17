<?php

namespace App\Http\Controllers\Xml;

use App\Models\Seo\Seo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SitemapXmlController extends Controller
{
    public function sitemap()
    {
        try {
            $rows = Seo::orderBy('updated_at','DESC')->get();
            $now = Carbon::now()->toAtomString();
        } catch (\Exception $e) {

        }

        $content = view('api.xml.sitemap', compact('rows' ,'now'));

        return response($content)->header('Content-Type', 'application/xml');
    }
}
