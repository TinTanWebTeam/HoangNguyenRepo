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
            $table->float('literNumber');
            $table->float('dayNumber');
            $table->integer('createdBy');
            $table->integer('updatedBy');
            $table->text('note');
            $table->boolean('active')->default(1);
            $table->integer('transport_id');
            $table->integer('price_id');
            $table->integer('vehicle_id');
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
