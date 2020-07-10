<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Complaint;
use Faker\Generator as Faker;

$factory->define(Complaint::class, function (Faker $faker) {
    return [
        'type' => $faker->randomElement(['kematian', 'kehilangan', 'tamu']),
		'body' => $faker->text()
    ];
});
