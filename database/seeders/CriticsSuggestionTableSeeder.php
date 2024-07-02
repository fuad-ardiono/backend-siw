<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Resident;
use App\CriticsSuggestion;

class CriticsSuggestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CriticsSuggestion::class, 50)->create()->each(function ($critics_suggestion) {
			$resident = Resident::query()->inRandomOrder()->first();

			$critics_suggestion->resident_id = $resident->id;
			$critics_suggestion->save();
		});
    }
}
