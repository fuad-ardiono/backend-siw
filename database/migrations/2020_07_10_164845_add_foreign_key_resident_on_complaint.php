<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyResidentOnComplaint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('complaint', function(Blueprint $table) {
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
		Schema::table('complaint', function(Blueprint $table) {
			$table->dropForeign(['resident_id']);
			$table->dropColumn('resident_id');
		});
	}
}
