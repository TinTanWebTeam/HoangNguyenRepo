<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->increments('id');
            $table->float('weight')->unsigned();
            $table->float('quantumProduct')->unsigned();
            $table->decimal('cashRevenue',18,0)->default(0);
            $table->decimal('cashDelivery',18,0)->default(0);
            $table->decimal('cashPreDelivery',18,0)->default(0);
            $table->decimal('cashReceive',18,0)->default(0);
            $table->decimal('cashProfit',18,0)->default(0);
            $table->string('voucherNumber')->nullable();
            $table->string('voucherQuantumProduct')->nullable();
            $table->string('receiver')->nullable();
            $table->dateTime('receiveDate');
            $table->string('receivePlace')->nullable();
            $table->string('deliveryPlace')->nullable();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('product_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('invoiceCustomer_id')->nullable();
            $table->integer('invoiceGarage_id')->nullable();
            $table->integer('status_transport')->unsigned();
            $table->integer('status_customer')->unsigned();
            $table->integer('status_garage')->unsigned();
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
        Schema::drop('transports');
    }
}
