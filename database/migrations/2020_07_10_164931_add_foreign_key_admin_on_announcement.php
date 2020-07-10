<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyAdminOnAnnouncement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('announcement', function(Blueprint $table) {
			$table->foreignId('admin_id')->nullable()
				->references('id')->on('admins');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('announcement', function(Blueprint $table) {
			$table->dropForeign(['admin_id']);
			$table->dropColumn('admin_id');
		});
	}
}
