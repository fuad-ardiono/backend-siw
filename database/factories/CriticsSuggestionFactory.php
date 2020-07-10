<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CriticsSuggestion;
use Faker\Generator as Faker;

$factory->define(CriticsSuggestion::class, function (Faker $faker) {
    return [
        'subject' => $faker->text(50),
		'body' => $faker->text()
    ];
});
