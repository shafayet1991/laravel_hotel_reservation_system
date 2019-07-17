<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Blog\BlogCategory;
use Faker\Generator as Faker;

$factory->define(BlogCategory::class, function (Faker $faker) {
    $words = $faker->words[2];
    return [
        'name' => $words,
        'slug' => str_slug($words),
    ];
});
