<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormulaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulaDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formula_id')->unsigned()->comment('Mã công thức');
            $table->integer('rule_id')->comment('Loại rule: khoảng hoặc giá trị');
            $table->string('name')->comment('Tên trường');
            $table->string('from')->comment('Từ')->nullable();
            $table->string('to')->comment('Đến')->nullable();
            $table->string('value')->comment('Giá trị')->nullable();
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
        Schema::drop('formulaDetails');
    }
}
