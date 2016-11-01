<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contactor')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('garageType_id')->unsigned();
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
        Schema::drop('garages');
    }
}
