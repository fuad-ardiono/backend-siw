<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HeadFamily;
use Faker\Generator as Faker;

$factory->define(HeadFamily::class, function (Faker $faker) {
    return [
        'head_family_nik' => $faker->uuid,
		'name' => $faker->name,
		'address' => $faker->address,
		'postal_code' => $faker->postcode,
		'kelurahan' => $faker->randomElement(['Gn.Samarinda', 'Damai', 'Gn.Samarinda Baru']),
		'kecamatan' => $faker->randomElement(['Balikpapan Utara', 'Balikpapan Tengah', 'Balikpapan Kota']),
		'city' => 'Balikpapan',
		'province' => 'Kalimantan Timur',
		'created_at' => $faker->dateTime(),
		'updated_at' => $faker->dateTime(),
    ];
});
