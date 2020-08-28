<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\OrderDetails;
use Faker\Generator as Faker;

$factory->define(OrderDetails::class, function (Faker $faker) {
    return [
        'tea_id' => $faker->shuffle(array(1, 2, 3, 4)),
        'unit_price' => [11.9, 11.9, 11.9, 11.9],
        'quantity' => $faker->shuffle(array(1, 2, 3, 4))
    ];
});
