<?php

namespace App\Http\Controllers\Client\Page;

use App\Helpers\Helper;
use App\Models\Blog\Blog;
use App\Traits\ClientTrait;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    use ClientTrait;

    public function detail($slug)
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();

        $blog = Blog::with('categories', 'tags', 'author', 'image', 'seo')->where('slug', $slug)->firstOrFail();
        $blog_category_ids = $blog->categories()->pluck('blog_category_id')->toArray() ?? [];
        $random_sidebars =  $interests = Blog::with('author')->whereNotIn('id', [$blog->id])->inRandomOrder()->get();

//        SEOMeta::setSeoTitle($hotel->seo->seo_title ?? '');
        SEOMeta::setTitle($blog->seo->page_title ?? '');
        SEOMeta::setDescription($blog->seo->seo_description?? '');
        $a=SEOMeta::setKeywords($blog->seo->seo_keyword?? '');
        SEOMeta::setCanonical(url('/'));

        $interests = null;
        if (Helper::custom_check_empty($blog_category_ids) !== false && count($blog_category_ids) > 0) {
            $interests = Blog::with('author')->whereNotIn('id', [$blog->id])->orderByDesc('id')->get();
        }
        return view('client.pages.blog.detail', compact('blog', 'menus', 'general', 'socials', 'interests','random_sidebars'));
    }
}
