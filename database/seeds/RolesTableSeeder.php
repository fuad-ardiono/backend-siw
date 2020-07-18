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
					'level' => 'admin'
				],
				[
					'id' => 2,
					'name' => 'Residence',
					'level' => 'resident'
				]
			]);
		}
    }
}
