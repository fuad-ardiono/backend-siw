<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRolesOnAdmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function(Blueprint $table) {
			$table->foreignId('role_id')->nullable()
				->references('id')->on('roles');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('admins', function(Blueprint $table) {
			$table->dropForeign(['role_id']);
			$table->dropColumn('role_id');
		});
    }
}
