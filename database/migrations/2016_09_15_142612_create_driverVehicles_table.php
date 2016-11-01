<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriverVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driverVehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->boolean('active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('driverVehicles');
    }
}
