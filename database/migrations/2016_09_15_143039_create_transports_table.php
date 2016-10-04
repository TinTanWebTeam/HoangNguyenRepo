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
            $table->decimal('cashReceive',18,0)->default(0);
            $table->decimal('cashProfit',18,0)->default(0);
            $table->decimal('postage');
            $table->string('voucherNumber');
            $table->string('voucherQuantumProduct');
            $table->string('receiver');
            $table->dateTime('receiveDate');
            $table->string('receivePlace');
            $table->string('deliveryPlace');
            $table->integer('createdBy')->unsigned();;
            $table->integer('updatedBy')->unsigned();;
            $table->text('note');
            $table->boolean('active')->default(1);
            $table->integer('product_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('invoice_id')->nullable;
            $table->integer('status_id')->unsigned();
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
