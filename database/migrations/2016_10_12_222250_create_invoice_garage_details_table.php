<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceGarageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceGarageDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceGarage_id');
            $table->decimal('paidAmt', 18, 0)->default(0);
            $table->dateTime('payDate');
            $table->boolean('modify');
            $table->integer('createdBy');
            $table->integer('updatedBy');
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
        Schema::drop('invoiceGarageDetails');
    }
}
