<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceGaragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceGarages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoiceCode')->nullable();
            $table->float('VAT')->default(0);
            $table->decimal('notVAT', 18, 0)->default(0);
            $table->decimal('hasVAT', 18, 0)->default(0);
            $table->decimal('totalPay', 18, 0)->default(0);
            $table->decimal('prePaid', 18, 0)->default(0);
            $table->decimal('totalPaid', 18, 0)->default(0);
            $table->dateTime('exportDate')->nullable();
            $table->dateTime('invoiceDate')->nullable();
            $table->dateTime('payDate')->nullable();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('invoiceType')->default(0)->comment('Loại hóa đơn');
            $table->decimal('money', 18, 0)->default(0);
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
        Schema::drop('invoiceGarages');
    }
}
