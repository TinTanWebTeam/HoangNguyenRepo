<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->float('VAT');
            $table->decimal('notVAT');
            $table->decimal('hasVAT');
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
        Schema::drop('invoices');
    }
}
