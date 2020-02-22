<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\order;
use Faker\Generator as Faker;

$factory->define(order::class, function (Faker $faker) {
    return [
        'order_number' => $faker->unique()->numberBetween(1,20000),
        'item' => $faker->text(40),
        'quantity' => $faker->numberBetween(1,100),
        'price' => $faker->numberBetween(1,100),
        'total' => $faker->numberBetween(1,100),

        'company_id' => App\Company::inRandomOrder()->first()->id,
        'contact_id' => App\Contact::inRandomOrder()->first()->id

    ];
});

