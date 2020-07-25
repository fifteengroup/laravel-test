<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'address' => $faker->address,
        'postcode' => $faker->postcode,
        'contact_id' => App\Contact::inRandomOrder()->first()->id,
    ];
});
