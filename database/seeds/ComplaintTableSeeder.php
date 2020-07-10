<?php

use Illuminate\Database\Seeder;
use App\Resident;

class ComplaintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Complaint::class, 50)->create()->each(function ($complaint) {
        	$resident = Resident::query()->inRandomOrder()->first();

        	$complaint->resident_id = $resident->id;
        	$complaint->save();
		});
    }
}
