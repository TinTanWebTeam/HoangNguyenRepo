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
            $table->string('rule')->comment('Loại rule: khoảng(R) hoặc giá trị(S)');
            $table->string('name')->comment('Tên trường');
            $table->decimal('from', 18, 0)->comment('Từ')->nullable();
            $table->decimal('to', 18, 0)->comment('Đến')->nullable();
            $table->string('fromPlace')->comment('Từ')->nullable();
            $table->string('toPlace')->comment('Đến')->nullable();
            $table->string('value')->comment('Giá trị')->nullable();
            $table->integer('index')->nullable();
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
