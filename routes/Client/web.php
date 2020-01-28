<?php
//Auth::routes();

Route::get('login', ['as' => 'login', 'uses' => 'Admin\Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login', 'uses' => 'Admin\Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Admin\Auth\LoginController@logout']);

Route::get('/', 'Client\Home\HomeController@index')->name('client.homepage');
Route::get('/payment/detail', 'Client\Payment\PaymentController@detail')->name('payment.detail');
Route::get('/concept/{theme_id}', 'Client\Theme\ThemeController@index')->name('theme.index');
Route::get('/blog/{slug}', 'Client\Page\BlogController@detail')->name('page.blog.detail');
Route::post('/contact', 'Client\Page\ContactPageController@save')->name('page.contact.save');
Route::get('/404', 'Client\Page\ContactPageController@notfound')->name('page.contact');

Route::group(['prefix' => 'search','namespace' => 'Client\Search'],function () {
    Route::get("/","SearchController@index")->name('search');
    Route::post("/","SearchController@sort")->name('search');
});

Route::get('/city/{id}', 'CityController@show');

Route::get('/{slug}', 'Client\Page\PageController@page')->name('client.slug');