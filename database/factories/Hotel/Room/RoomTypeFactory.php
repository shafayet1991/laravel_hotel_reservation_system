<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Room\RoomType;
use Faker\Generator as Faker;

$factory->define(RoomType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
