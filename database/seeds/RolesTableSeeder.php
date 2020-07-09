<?php

use Illuminate\Database\Seeder;
use App\Role;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = Carbon::now()->toDateTimeString();

    	$role = Role::first();

    	if(!$role) {
			Role::insert([
				[
					'id' => 1,
					'name' => 'Administrator',
					'level' => 'admin',
					'created_at' => $now,
					'updated_at' => $now
				],
				[
					'id' => 2,
					'name' => 'Residence',
					'level' => 'resident',
					'created_at' => $now,
					'updated_at' => $now
				]
			]);
		}
    }
}
