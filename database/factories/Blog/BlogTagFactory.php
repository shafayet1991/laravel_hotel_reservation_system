<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Blog\BlogTag;
use Faker\Generator as Faker;

$factory->define(BlogTag::class, function (Faker $faker) {
    $words = $faker->words[2];
    return [
        'name' => $words,
        'slug' => str_slug($words),
    ];
});
