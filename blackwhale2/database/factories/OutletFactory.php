<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Outlet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'contact' => $faker->numerify('###-#######'),
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->text(50),
        'city' => $faker->text(20),
        'postcode' => $faker->numerify('#####')
    ];
});
