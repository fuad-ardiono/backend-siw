<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Admin;
use App\Announcement;

class AnnouncementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Announcement::class, 50)->create()->each(function($announcement) {
			$admin = Admin::query()->inRandomOrder()->first();

			$announcement->admin_id = $admin->id;
			$announcement->save();
		});
    }
}
