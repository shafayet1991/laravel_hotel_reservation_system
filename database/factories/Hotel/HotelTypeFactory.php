<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Hotel\HotelType;
use Faker\Generator as Faker;

$factory->define(HotelType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
