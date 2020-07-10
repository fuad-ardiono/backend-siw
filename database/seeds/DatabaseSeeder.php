<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
		$this->call(RolesTableSeeder::class);
		$this->call(AdminsTableSeeder::class);
		$this->call(HeadFamilyTableSeeder::class);
		$this->call(AnnouncementTableSeeder::class);
		$this->call(ComplaintTableSeeder::class);
		$this->call(CriticsSuggestionTableSeeder::class);
    }
}
