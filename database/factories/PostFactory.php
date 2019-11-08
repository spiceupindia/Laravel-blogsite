<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' =>$faker->sentence(3),
        'slug' => str_slug('title'),
        'user_id' => $faker->randomDigit,
        'category_id' => $faker->randomDigit,
        'content' =>$faker->paragraph(3),
        'featured' => asset('uploads/posts/'.sample.jpg),
    ];
});
