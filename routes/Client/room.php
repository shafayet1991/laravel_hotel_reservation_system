<?php

Route::group(['prefix' => '{room_id}/payment/{start_date}/{end_date}/{adult_count}/{child_count}/{child_ages}'], function () {

    Route::get('/', 'Client\Payment\PaymentController@extra')->name('hotel.payment');
    Route::post('/', 'Client\Payment\PaymentController@extra_store')->name('hotel.payment ');

    Route::get('/personal/{reservation_id}', 'Client\Payment\PaymentController@personal')->name('hotel.payment.personal');
    Route::post('/personal/{reservation_id}', 'Client\Payment\PaymentController@personal_update')->name('hotel.payment.personal');
    Route::get('/card/{reservation_id}', 'Client\Payment\PaymentController@card')->name('hotel.payment.card');
    Route::post('/card/{reservation_id}', 'Client\Payment\PaymentController@card_update')->name('hotel.payment.card');
});

Route::post('/reservation_payment_report', 'Client\Payment\PaymentController@reservation_payment_report')->name('hotel.payment.reservation_payment_report');