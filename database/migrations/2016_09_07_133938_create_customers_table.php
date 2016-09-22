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
            $table->string('fullName', 100);
            $table->string('address', 500);
            $table->string('phone', 50);
            $table->string('email', 100)->unique();
            $table->string('taxCode');
            $table->text('note', 500);
            $table->integer('createdBy');
            $table->integer('updatedBy');
            $table->boolean('active')->default(1);
            $table->integer('customerType_id');
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
