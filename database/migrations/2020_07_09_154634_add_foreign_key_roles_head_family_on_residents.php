<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRolesHeadFamilyOnResidents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('residents', function(Blueprint $table) {
			$table->foreignId('role_id')->nullable()
				->references('id')->on('roles');
			$table->foreignId('head_family_id')->nullable()
				->references('id')->on('head_family');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('residents', function(Blueprint $table) {
			$table->dropForeign(['role_id']);
			$table->dropForeign(['head_family_id']);
			$table->dropColumn(['role_id', 'head_family_id']);
		});
    }
}
