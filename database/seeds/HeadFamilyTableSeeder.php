<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class HeadFamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\HeadFamily::class, 50)->create()->each(function ($head_family) {
        	factory(App\Resident::class, 3)->create()->each(function ($resident) use ($head_family) {
        		$resident->head_family_id = $head_family->id;
        		$resident->save();
			});

        	factory(App\Resident::class, 1)->create()->each(function ($head_family_resident) use ($head_family) {
        		$head_family_resident->name = $head_family->name;
        		$head_family_resident->head_family_id = $head_family->id;
        		$head_family_resident->address = $head_family->address;
        		$head_family_resident->save();
			});
		});
    }
}
