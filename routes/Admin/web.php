<?php

Route::group(['namespace' => 'Admin','middleware' => 'auth'], function () {

    Route::view('/dashboard', 'admin.pages.dashboard.index');

    Route::group(['namespace' => 'Page'], function () {
        Route::resource('blog_author', 'BlogAuthorController');
        Route::resource('blog_category', 'BlogCategoryController');
        Route::resource('blog_tag', 'BlogTagController');
        Route::resource('blog', 'BlogController');
        Route::resource('menu', 'MenuController');
        Route::resource('static_page', 'StaticPageController');
        Route::resource('homepage_icon', 'HomepageIconController');
        Route::resource('contact_customer', 'ContactCustomerController');
    });

    Route::group(['namespace' => 'Hotel'],function(){
        Route::resource('hotel', 'HotelController');
        Route::post('/hotel_setting', 'HotelController@setting');
        Route::resource('hotel_type', 'HotelTypeController');
    });

    Route::group(['namespace' => 'Facility'],function(){
        Route::resource('facility', 'FacilityController');
    });

    Route::group(['namespace' => 'Payment'],function(){
        Route::resource('payment_type', 'PaymentTypeController');
    });

    Route::post('/hotel_add_file', 'FileController@store');
    Route::post('/hotel_remove_file', 'FileController@delete');

    Route::group(['namespace' => 'Reservation'],function(){
        Route::get('/reservation/pdf/{id}', 'ReservationController@pdf')->name('reservation.pdf');
        Route::get('/reservation/completed', 'ReservationController@completed')->name('reservation.completed');
        Route::get('/reservation/uncompleted', 'ReservationController@uncompleted')->name('reservation.uncompleted');
        Route::get('/reservation/softDeletes', 'ReservationController@softDeletes')->name('reservation.softDeletes');
        Route::delete('/reservation/forceDelete/{id}', 'ReservationController@forceDelete')->name('reservation.forceDelete');
        Route::post('/hotel_reservation', 'ReservationTransferController@store')->name('hotel.transfer.store');
        Route::get('/hotel_reservation/{hotel_id}/{transfer_id}', 'ReservationTransferController@edit')->name('hotel.transfer.edit');
        Route::put('/hotel_reservation/{hotel_id}/edit/{transfer_id}', 'ReservationTransferController@update')->name('hotel.transfer.update');
        Route::get('/hotel_reservation/{hotel_id}/delete/{transfer_id}', 'ReservationTransferController@delete')->name('hotel.transfer.delete');
        Route::resource('reservation', 'ReservationController');
    });

    Route::group(['namespace' => 'Subscriber'],function(){
        Route::get('/subscribe/softDeletes', 'SubscribeController@softDeletes')->name('subscribe.softDeletes');
        Route::delete('/subscribe/forceDelete/{id}', 'SubscribeController@forceDelete')->name('subscribe.forceDelete');
        Route::resource('subscribe', 'SubscribeController');
    });


    Route::group(['namespace' => 'Contract'],function(){
        Route::resource('room_contract', 'ContractController');
        Route::post('copy_contract','ContractController@copy')->name('contract.copy');
        Route::post('calc_contract/{room_id}','ContractController@calc')->name('contract.calc');
        Route::post('store_stop','ContractController@store_stop')->name('contract.store_stop');
        Route::get('update_stop/{id}','ContractController@update_stop')->name('contract.update_stop');
    });

    Route::group(['namespace' => 'Room'],function(){
        Route::resource('hotel_room', 'RoomController');
        Route::resource('room_feature', 'RoomFeatureController');
        Route::resource('room_possibility', 'RoomPossibilityController');
        Route::get('hotel_room/{room_id}/gallery', 'RoomFileController@gallery')->name('room.gallery');
        Route::post('/room_add_file', 'RoomFileController@multiple_files')->name('room.gallery.multiple');
        Route::post('/room_remove_file', 'RoomFileController@delete')->name('room.gallery.remove');
        Route::resource('{room_id}/room_person_detail', 'RoomPersonDetailController');
    });

    Route::group(['namespace' => 'Tour'],function(){
        Route::resource('tour', 'TourController');
        Route::resource('tour_type', 'TourTypeController');
        Route::resource('tour_price', 'TourPriceController');
        Route::post('/tour_day/{tour_id}', 'TourController@tour_day')->name('tour.day');
        Route::post('/tour_add_file', 'TourFileController@multiple_files');
        Route::post('/tour_remove_file', 'TourFileController@delete');
    });

    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

});