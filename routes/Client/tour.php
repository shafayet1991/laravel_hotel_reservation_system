<?php

Route::group(['prefix' => '/tur','namespace' => 'Client\Tour'],function(){
    Route::get("/{id}","TourController@detail");
});