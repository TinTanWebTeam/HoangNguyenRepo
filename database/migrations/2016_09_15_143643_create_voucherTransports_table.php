<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucherTransports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucher_id')->unsigned();
            $table->integer('transport_id')->unsigned();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
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
        Schema::drop('voucherTransports');
    }
}
