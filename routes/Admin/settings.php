<?php

Route::group(['middleware' => 'auth','namespace' => 'Admin\Settings', 'prefix' => 'settings'], function () {

    Route::get('general', 'GeneralSettingController@form')->name('admin.pages.settings.general');
    Route::post('general', 'GeneralSettingController@save')->name('admin.pages.settings.general.save');

    Route::resource('social_media_setting', 'SocialMediaSettingController');
    Route::resource('user_setting', 'UserSettingController');
    Route::get('user_setting/{user_id}/password', 'UserSettingController@password')->name('user_setting.password');
    Route::post('user_setting/{user_id}/password', 'UserSettingController@save_password')->name('user_setting.password');

});