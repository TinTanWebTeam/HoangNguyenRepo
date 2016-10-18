<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printHistories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceCustomerDetail_id')->unsigned();
            $table->integer('invoiceGarageDetail_id')->unsigned();
            $table->dateTime('printDate');
            $table->string('sendToPerson');
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
        Schema::drop('printHistories');
    }
}
