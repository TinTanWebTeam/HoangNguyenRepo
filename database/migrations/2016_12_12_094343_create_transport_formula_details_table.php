<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransportFormulaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportFormulaDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('Tên trường trong FormulaDetails');
            $table->string('value')->comment('Giá trị trong FormulaDetails');
            $table->string('rule')->comment('Rule trong FormulaDetails');
            $table->integer('transport_id')->unsigned()->comment('Mã transport');
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
        Schema::drop('transportFormulaDetails');
    }
}
