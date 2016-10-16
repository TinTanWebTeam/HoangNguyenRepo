<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceCustomers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceCode');
            $table->float('VAT');
            $table->decimal('notVAT', 18, 0)->default(0);
            $table->decimal('hasVAT', 18, 0)->default(0);
            $table->decimal('totalPay', 18, 0)->default(0);
            $table->decimal('totalPaid', 18, 0)->default(0);
            $table->dateTime('exportDate');
            $table->dateTime('invoiceDate');
            $table->dateTime('payDate');
            $table->integer('createdBy');
            $table->integer('updatedBy');
            $table->text('note');
            $table->boolean('active')->default(1);
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
        Schema::drop('invoiceCustomers');
    }
}
