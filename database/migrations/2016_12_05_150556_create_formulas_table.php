<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formulaCode')->comment('Mã công thức')->nullable();
            $table->decimal('unitPrice', 18, 0)->default(0)->comment('Đơn giá');
            $table->string('unit')->comment('Đơn vị tính');
            $table->integer('customer_id')->unsigned()->comment('Mã khách hàng');
            $table->text('extendData')->nullable()->comment('Dữ liệu mở rộng');

            $table->decimal('postageBase', 18, 0)->default(0);
            $table->date('createdDate');
            $table->date('applyDate')->nullable();
            $table->string('receivePlace')->nullable();
            $table->string('deliveryPlace')->nullable();
            $table->decimal('cashDelivery', 18, 0)->default(0);
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->boolean('changeByFuel')->default(0)->comment('Thay đổi do giá dầu');
            $table->integer('fuel_id')->unsigned();
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
        Schema::drop('formulas');
    }
}