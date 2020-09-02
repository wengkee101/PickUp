<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_id' => $faker->unique()->randomDigit,
        'user_id' => $faker->randomElement($array = array ('1','2', '3')),
        'customer_id' => 1,
        'outlet_id' => $faker->randomDigit,
        'payment' => $faker->randomElement($array = array ('on cash', 'fpx'))
    ];
});
