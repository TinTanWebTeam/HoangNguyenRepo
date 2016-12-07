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
            $table->decimal('postageBase', 18, 0)->default(0);
            $table->date('createdDate');
            $table->date('applyDate')->nullable();
            $table->decimal('cashDelivery', 18, 0)->default(0);
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->boolean('changeByFuel')->default(0)->comment('Thay đổi do giá dầu');
            $table->integer('customer_id')->unsigned();
            $table->integer('formula_id')->unsigned();
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
        Schema::drop('postages');
    }
}
