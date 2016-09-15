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
            $table->string('code');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->integer('invoice_id');
            $table->float('weight');
            $table->decimal('cashRevenue');
            $table->decimal('cashDelivery');
            $table->decimal('cashReceive');
            $table->decimal('cashProfit');
            $table->text('note');
            $table->string('voucherNumber');
            $table->string('voucherQuantumProduct');
            $table->string('receiver');
            $table->dateTime('receiveDate');
            $table->string('status');
            $table->string('receivePlace');
            $table->string('deliveryPlace');
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
        Schema::drop('transports');
    }
}
