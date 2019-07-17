<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Requests\Contact\ContactCustomerRequest;
use App\Models\Contact\ContactCustomer;
use App\Models\Page\Menu;
use App\Services\Client\StaticPageService;
use App\Traits\ClientTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactPageController extends Controller
{
    use ClientTrait;

    public function detail()
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();

        return view('client.pages.contact.index',compact('general','socials','menus'));
    }

    public function save(ContactCustomerRequest $request)
    {
        ContactCustomer::create($request->except('_token'));
        return response()->json(
            ['status' => '200','message' => 'Bilgileriniz alınmıştır. En kısa sürede iletişime geçilecektir.']
        );
    }

    public function blog()
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();

        return view('client.pages.blog.index',compact('general','socials','menus'));
    }

    public function blog_detail()
    {
        $menus = $this->get_client_menus();
        $general = $this->get_general_settings();
        $socials = $this->get_social_media_settings();

        return view('client.pages.blog.detail',compact('general','socials','menus'));
    }
}
