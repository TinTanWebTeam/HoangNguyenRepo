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
            $table->integer('invoiceGarage_id')->unsigned();
            $table->decimal('paidAmt', 18, 0)->default(0);
            $table->dateTime('payDate')->nullable();
            $table->boolean('modify')->default(0);
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->string('fileName')->nullable();
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
