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
            $table->float('weight');
            $table->decimal('cashRevenue',18,0);
            $table->decimal('cashDelivery',18,0);
            $table->decimal('cashReceive',18,0);
            $table->decimal('cashProfit',18,0);
            $table->string('voucherNumber');
            $table->string('voucherQuantumProduct');
            $table->string('receiver');
            $table->dateTime('receiveDate');
            $table->string('receivePlace');
            $table->string('deliveryPlace');
            $table->integer('createdBy');
            $table->integer('updatedBy');
            $table->text('note');
            $table->string('status');
            $table->boolean('active')->default(1);
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->integer('invoice_id');
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
