<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStolenCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stolen_cars', function (Blueprint $table) {
            $table->unique(['license_plate', 'vin']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stolen_cars', function (Blueprint $table) {
            $table->dropUnique(['license_plate', 'vin']);
        });
    }
}
