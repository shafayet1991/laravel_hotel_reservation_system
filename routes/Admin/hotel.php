<?php

Route::group(['middleware' => 'auth','namespace' => 'Admin\Hotel'], function () {

    Route::resource('hotel_theme', 'HotelThemeController');

});