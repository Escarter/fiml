<?php

use Faker\Generator as Faker;

$factory->define(App\Models\TrainingContent::class, function (Faker $faker) {
    return [
        'title' => $faker->catchPhrase,
        'video_category_id' => $faker->numberBetween($min = 1, $max = 4),
        'type' => 'video',
        'content' => $faker->paragraph,
        'url' => 'https://www.youtube.com/embed/yL8U8aAuF7E',
        'user_id' => '1',
        'cover_image' => 'yVSWpjs0MQluL8rNqMwT0bGIvnEAHvYl1DQPqjM6.jpeg',
    ];
});
