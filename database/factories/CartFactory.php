<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Cart;
use App\User;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'hash' => $faker->uuid,
        'user_id' => function() {
        	return create(User::class);
        }
    ];
});
