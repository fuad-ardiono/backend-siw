<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package', function (Blueprint $table) {
        	$table->foreignId('package_price_id')->nullable()
				->references('id')->on('package_price');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package', function(Blueprint $table) {
			$table->dropForeign(['package_price_id']);
			$table->dropColumn('package_price_id');
		});
    }
}
