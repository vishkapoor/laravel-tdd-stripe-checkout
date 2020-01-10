<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(1000, 10000),
        'user_id' => function() {
        	return create(User::class);
        }
    ];
});
