<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use App\Models\Blog\BlogAuthor;
use Faker\Generator as Faker;

$factory->define(BlogAuthor::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'title' => $faker->title,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'slug' => str_slug($name),
    ];
});
