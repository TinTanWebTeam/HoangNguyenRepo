<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherAttachFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucherAttachFiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('voucherTransport_id');
            $table->string('filePath')->nullable();
            $table->string('fileExtension')->nullable();
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
        Schema::drop('voucherAttachFiles');
    }
}
