<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        $admin = Admin::first();

        if(!$admin) {
			Admin::insert([
				'username' => 'admin',
				'name' => 'Admin',
				'password' => Hash::make('admin'),
				'role_id' => 1,
				'created_at' => $now,
				'updated_at' => $now
			]);
		}
    }
}
