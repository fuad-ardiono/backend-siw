<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resident;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(Resident::class, function (Faker $faker) {
    return [
		'nik_id' => $faker->uuid,
		'name' => $faker->name,
		'password' => Hash::make('resident'),
		'gender' => $faker->randomElement(['L', 'P']),
		'religion' => $faker->randomElement(['Islam', 'Kristen', 'Hindu', 'Budha', 'Konghucu']),
		'address' => $faker->address,
		'birth_place' => $faker->randomElement(['Jakarta', 'Yogyakarta', 'Balikpapan', 'Samarinda']),
		'birth_date' => $faker->dateTimeBetween(),
		'occupation' => $faker->randomElement(['PNS', 'Karyawan Swasta', 'Guru', 'TNI']),
		'role_id' => 2
    ];
});
