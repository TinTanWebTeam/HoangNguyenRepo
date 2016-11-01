<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            $table->string('governmentId')->nullable();
            $table->date('issueDate_governmentId')->nullable();
            $table->string('licenseDriver')->nullable();
            $table->date('issueDate_licenseDriver')->nullable();
            $table->string('expireDate')->nullable();
            $table->string('licenseDriverType')->nullable();
            $table->text('note')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
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
        Schema::drop('drivers');
    }
}
