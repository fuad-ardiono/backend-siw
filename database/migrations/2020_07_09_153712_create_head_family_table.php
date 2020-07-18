<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_family', function (Blueprint $table) {
            $table->id();
            $table->string('head_family_nik');
            $table->string('name');
			$table->string('address');
			$table->string('postal_code');
			$table->string('kelurahan');
			$table->string('kecamatan');
			$table->string('city');
			$table->string('province');
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_family');
    }
}
