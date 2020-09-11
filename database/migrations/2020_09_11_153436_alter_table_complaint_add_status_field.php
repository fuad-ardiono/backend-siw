<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableComplaintAddStatusField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('complaint', function(Blueprint $table){
        	$table->dropColumn('is_resolved');
        	$table->enum('status', ['pending', 'acc', 'read'])->default('pending');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complaint', function(Blueprint $table){
        	$table->dropColumn('status');
		});
    }
}
