<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStolensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stolen_cars', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 255);
            $table->string('license_plate', 32);
            $table->string('color', 32);
            $table->string('vin', 32);

            //if make and model not exists yet
            //we can save its model and make names
            $table->string('make', 32);
            $table->string('model', 32);

            $table->year('year');

            $table->unsignedBigInteger('make_id')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();

            $table->timestamps();

            $table->foreign('make_id')->references('id')->on('makes')->onDelete('set null');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stolen_cars');
    }
}
