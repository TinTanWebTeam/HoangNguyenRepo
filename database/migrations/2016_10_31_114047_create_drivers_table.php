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
            $table->string('permanetAddress')->nullable();
            $table->string('phone')->nullable();
            $table->date('birthday')->nullable();
            // governmentId -> identityCardNumber
            $table->string('governmentId')->nullable()->comment('Số chứng minh thư');
            // issueDate_governmentId -> issueDate_identityCard
            $table->date('issueDate_governmentId')->nullable()->comment('Ngày cấp chứng minh thư');
            // licenseDriverType -> driverLicenseType
            $table->string('licenseDriverType')->nullable()->comment('Loại bằng lái');
            $table->string('driverLicenseNumber')->nullable()->comment('Số bằng lái');
            $table->date('issueDate_DriverLicense')->nullable()->comment('Ngày cấp bằng lái');
            $table->string('expireDate_DriverLicense')->nullable()->comment('Ngày hết hạn bằng lái');
            $table->date('startDate')->nullable()->comment('Ngày bắt đầu lái');
            $table->date('finishDate')->nullable()->comment('Ngày kết thúc lái');
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
