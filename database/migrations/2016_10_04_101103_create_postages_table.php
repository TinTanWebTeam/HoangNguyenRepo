<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postages', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('postage', 18, 0)->default(0);
            $table->date('createdDate')->nullable();
            $table->integer('customer_id')->unsigned();
            $table->string('receivePlace');
            $table->string('deliveryPlace');
            $table->decimal('cashDelivery', 18, 0)->default(0);
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->boolean('changeByFuel')->default(0);
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
        Schema::drop('postages');
    }
}
