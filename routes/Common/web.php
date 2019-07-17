<?php

Route::group(['namespace' => 'Common'], function () {

    Route::group(['prefix' => 'subscribe', 'namespace' => 'Subscriber'], function () {
        Route::get("/", "SubscriberController@index")->name('subscriber.index');
        Route::post("/save", "SubscriberController@save")->name('subscriber.save');
    });

    Route::group(['prefix' => 'reservation', 'namespace' => 'Reservation'], function () {
        Route::get("/{room_id}/{start_date}/{end_date}/{adult_count}/{child_count}/{child_ages}", "ReservationController@index")->name('common.reservation.index');
        Route::post("/save", "ReservationController@save")->name('common.reservation.save');
        Route::get('/detail', 'ReservationController@detail')->name('common.reservation.detail');
        Route::get('/complete/{reservation_id}', 'ReservationController@complete')->name('common.reservation.complete');
        Route::get('/sendEmail/{reservation_id}', 'ReservationController@sendEmail')->name('common.reservation.sendEmail');
    });

    Route::group(['prefix' => 'call_request', 'namespace' => 'CallRequest'], function () {
        Route::get("/", "CallRequestController@index")->name('call_request.index');
        Route::post("/", "CallRequestController@store")->name('call_request.store');
    });

    Route::group(['prefix' => 'location', 'namespace' => 'Location'], function () {
        Route::get("/country/{id}", "LocationController@get_cities_from_country")->name('location.country');
        Route::get("/city/{id}", "LocationController@get_counties_from_city")->name('location.city');
    });

    Route::get('/currency/{value}', 'LocalizeController@setCurrency')->name('currency_set');
});