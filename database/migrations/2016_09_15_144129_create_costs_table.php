<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('cost',18,0)->default(0);
            $table->float('literNumber')->nullable();
            $table->dateTime('dateCheckIn')->nullable();
            $table->dateTime('dateCheckOut')->nullable();
            $table->integer('totalDate')->nullable();
            $table->float('totalHour')->nullable();
            $table->dateTime('dateRefuel')->nullable();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('transport_id')->nullable();
            $table->integer('price_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
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
        Schema::drop('costs');
    }
}
