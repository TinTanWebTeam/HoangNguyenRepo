<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceGarageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoiceGarageDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoiceGarage_id')->unsigned();
            $table->decimal('paidAmt', 18, 0)->default(0)->comment('Số tiền trả có Vat');
            $table->decimal('debtOld', 18, 0)->default(0)->comment('nợ củ');
            $table->dateTime('payDate')->nullable()->comment('Ngày trả');
            $table->boolean('modify')->default(0)->comment('Có chỉnh sửa hay không');
            $table->integer('createdBy')->unsigned()->comment('Người tạo');
            $table->integer('updatedBy')->unsigned()->comment('Người cập nhật');
            $table->string('fileName')->nullable()->comment('Tên tập tin');
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
        Schema::drop('invoiceGarageDetails');
    }
}
