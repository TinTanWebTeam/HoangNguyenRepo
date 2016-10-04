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
            $table->decimal('cost',18,0);
            $table->float('literNumber')->nullable();
            $table->dateTime('dateCheckIn')->nullable();
            $table->dateTime('dateCheckOut')->nullable();
            $table->time('timeIn')->nullable();
            $table->time('timeOut')->nullable();
            $table->date('totalHour')->nullable();
            $table->dateTime('dateRefuel')->nullable();
            $table->integer('createdBy');
            $table->integer('updatedBy');
            $table->text('note');
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
