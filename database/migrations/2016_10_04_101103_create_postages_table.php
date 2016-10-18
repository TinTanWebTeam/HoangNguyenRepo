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
            $table->dateTime('month');
            $table->integer('customer_id')->unsigned();
            $table->text('note')->nullable();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->boolean('active')->default(1);
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
