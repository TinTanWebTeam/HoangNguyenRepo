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
            $table->string('formulaCode')->comment('Mã công thức');
            $table->decimal('unitPrice', 18, 0)->default(0)->comment('Đơn giá');
            $table->string('unit')->comment('Đơn vị tính');
            $table->integer('customer_id')->unsigned()->comment('Mã khách hàng');
            $table->text('extendDate')->nullable()->comment('Dữ liệu mở rộng');
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
