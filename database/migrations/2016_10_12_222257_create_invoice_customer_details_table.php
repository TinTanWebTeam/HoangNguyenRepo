<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceCustomerDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceCustomer_id');
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
        Schema::drop('invoiceCustomerDetails');
    }
}
