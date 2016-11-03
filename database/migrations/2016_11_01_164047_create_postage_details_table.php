<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostageDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postageDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('postage', 18, 0)->default(0);
            $table->date('createdDate')->nullable();
            $table->integer('customer_id')->unsigned();
            $table->string('receivePlace');
            $table->string('deliveryPlace');
            $table->decimal('cashDelivery')->default(0);
            $table->date('applyDate')->nullable();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->integer('postage_id')->unsigned();
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
        Schema::drop('postageDetails');
    }
}