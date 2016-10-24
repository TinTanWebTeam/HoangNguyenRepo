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
            $table->string('transportCode')->comment('Mã đơn hàng');
            $table->float('weight')->unsigned()->comment('Trọng tải');
            $table->float('quantumProduct')->unsigned()->comment('Số lượng hàng');
            $table->decimal('cashRevenue',18,0)->default(0)->comment('Doanh thu');
            $table->decimal('cashDelivery',18,0)->default(0)->comment('Tiền phải giao cho nhà xe');
            $table->decimal('cashPreDelivery',18,0)->default(0)->comment('Tiền đã giao trước cho nhà xe');
            $table->decimal('cashReceive',18,0)->default(0)->comment('Tiền đã nhận');
            $table->decimal('cashProfit',18,0)->default(0)->comment('Lợi nhuận lý tưởng');
            $table->string('voucherNumber')->nullable()->comment('Số chứng từ');
            $table->string('voucherQuantumProduct')->nullable()->comment('Số lượng hàng trên chứng từ');
            $table->string('receiver')->nullable()->comment('Người nhận');
            $table->dateTime('receiveDate')->comment('Ngày nhận');
            $table->string('receivePlace')->nullable()->comment('Nơi nhận');
            $table->string('deliveryPlace')->nullable()->comment('Nơi giao');
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('product_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->integer('invoiceCustomer_id')->nullable();
            $table->integer('invoiceGarage_id')->nullable();
            $table->integer('status_transport')->unsigned()->comment('Trạng thái đơn hàng');
            $table->integer('status_customer')->unsigned()->comment('Trạng thái công nợ khách hàng');
            $table->integer('status_garage')->unsigned()->comment('Trạng thái công nợ nhà xe');
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
