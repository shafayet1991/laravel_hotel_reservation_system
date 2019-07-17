<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Blog\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    $sentence = $faker->sentence;
    return [
        'name' => $sentence,
        'slug' => str_slug($sentence),
        'description' => $faker->realText(1000),
        'short_description' => $faker->paragraphs[2],
    ];
});
