<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('areaCode');
            $table->string('vehicleNumber');
            $table->string('size')->nullable();
            $table->float('weight')->nullable();
            $table->string('trademark')->nullable();
            $table->integer('yearOfProduction')->nullable();
            $table->string('owner')->nullable();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('vehicleType_id')->unsigned();
            $table->integer('garage_id')->unsigned();
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
        Schema::drop('vehicles');
    }
}
