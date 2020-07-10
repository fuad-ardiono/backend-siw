<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Announcement::class, 50)->create()->each(function($announcement) {
			$admin = Admin::query()->inRandomOrder()->first();

			$announcement->admin_id = $admin->id;
			$announcement->save();
		});
    }
}
