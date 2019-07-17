<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Room\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'photo' => $faker->imageUrl('191'),
        'max_adult_count' => $faker->randomDigitNotNull,
        'hotel_id' => $faker->randomDigitNotNull,
        'room_type_id' => $faker->randomDigitNotNull,
    ];
});
