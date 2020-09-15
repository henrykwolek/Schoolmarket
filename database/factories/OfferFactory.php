<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ShopItem;
use Faker\Generator as Faker;

$factory->define(ShopItem::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'title' => $faker->sentence,
        'post_image' => $faker->imageUrl(1400, 700),
        'body' => $faker->paragraph,
        'post_price' => '24,99',
    ];
});
