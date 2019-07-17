<?php

//Route::get('/hotel/{slug}', 'Client\Hotel\HotelController@detail')->name('hotel.detail');
Route::get('/hotel', 'Client\Room\RoomController@searchByParams')->name('hotel.rooms');
Route::get('/room', 'Client\Room\RoomController@getRoomPriceByParams')->name('hotel.room');