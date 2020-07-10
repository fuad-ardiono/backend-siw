<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyResidentOnCriticsSuggestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('critics_suggestion', function(Blueprint $table) {
			$table->foreignId('resident_id')->nullable()
				->references('id')->on('residents');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('critics_suggestion', function(Blueprint $table) {
			$table->dropForeign(['resident_id']);
			$table->dropColumn('resident_id');
		});
    }
}
