<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Hotel\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'airport_id' => $faker->randomDigitNotNull,
        'hotel_type_id' => $faker->randomDigitNotNull,
        'currency_id' => $faker->randomDigitNotNull,
        'phone' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'city_id' => $faker->randomDigitNotNull,
        'county_id' => $faker->randomDigitNotNull,
        'address' => $faker->address,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'authorized_full_name' => $faker->firstName . " " . $faker->lastName,
        'authorized_phone' => $faker->phoneNumber,
        'authorized_email' => $faker->companyEmail,
        'checkout_time' => $faker->time('H:i:s'),
        'ops_day' => $faker->randomDigitNotNull,
        'min_day' => $faker->randomDigitNotNull,
        'season_date' => $faker->date('Y-m-d'),
        'reservation' => $faker->boolean,
        'seo_title' => $faker->title,
        'seo_keyword' => $faker->word,
        'seo_description' => $faker->text(200),
        'promo_photo' => $faker->imageUrl('191'),
        'hotel_description' => $faker->realText('600'),
        'airport_distance' => $faker->randomDigitNotNull . " " . "km",
        'sea_distance' => $faker->randomDigitNotNull . " " . "km",
        'shop_distance' => $faker->randomDigitNotNull . " " . "km",
        'hospital_distance' => $faker->randomDigitNotNull . " " . "km",
        'restaurant_distance' => $faker->randomDigitNotNull . " " . "km",
        'center_distance' => $faker->randomDigitNotNull . " " . "km",
        'baby_age_limit' => $faker->randomFloat(2,2),
        'child_age_limit' => $faker->randomFloat(2,2),
        'young_age_limit' => $faker->randomFloat(2,2),
        'commission_rate' => $faker->randomDigitNotNull,
        'status' => $faker->boolean
    ];
});
