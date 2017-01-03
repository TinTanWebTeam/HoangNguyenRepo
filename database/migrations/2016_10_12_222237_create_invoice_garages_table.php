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
            $table->increments('id')->comment('Mã');
            $table->string('invoiceCode')->nullable()->comment('Mã hóa đơn');
            $table->decimal('totalTransport', 18, 0)->default(0)->comment('Tổng tiền thật sự của các phiếu thanh toán');
            $table->decimal('totalPay', 18, 0)->default(0)->comment('Tổng tiền sẽ trả trên PTT');
            $table->decimal('prePaid', 18, 0)->default(0)->comment('Đã trả trước');
            $table->decimal('totalPaid', 18, 0)->default(0)->comment('Tổng tiền đã trả');
            $table->dateTime('exportDate')->nullable()->comment('Ngày tạo phiếu');
            $table->dateTime('invoiceDate')->nullable()->comment('Ngày trên phiếu');
            $table->dateTime('payDate')->nullable()->comment('Ngày trả');
            $table->integer('createdBy')->unsigned()->comment('Người tạo');
            $table->integer('updatedBy')->unsigned()->comment('Người cập nhật');
            $table->text('note')->nullable()->comment('Ghi chú');
            $table->boolean('active')->default(1)->comment('Trạng thái');
            $table->decimal('money', 18, 0)->default(0)->comment('');
            $table->string('sendToPerson')->comment('Người nhận phiếu');
            $table->integer('status_invoice')->default(1)->comment('Trạng thái phương thức thanh toán hóa đơn');
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
