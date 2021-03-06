<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName', 100)->unique();
            $table->string('address', 500)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('taxCode')->nullable();
            $table->text('note', 500)->nullable();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->boolean('active')->default(1);
            $table->integer('customerType_id')->unsigned();
            $table->integer('percentOilPerPostage')->default(0)->comment('Phần trăm dầu trên cước phí');
            $table->integer('percentOilLimitToChangePostage')->default(0)->comment('Phần trăm dầu giới hạn thay đổi giá cước phí');
            $table->integer('percentLubePerPostage')->default(0)->comment('Phần trăm nhớt trên cước phí');
            $table->integer('percentLubeLimitToChangePostage')->default(0)->comment('Phần trăm nhớt giới hạn thay đổi giá cước phí');
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
        Schema::drop('customers');
    }
}
