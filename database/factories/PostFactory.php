<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        $title = $faker->sentence(3),
        'title' => $title,
        'slug' => str_slug($title),
        'user_id' => $faker->randomDigit,
        'category_id' => $faker->randomDigit,
        'content' =>$faker->paragraph(3),
        'featured' => asset('uploads/posts/sample.jpg'),
    ];
});
