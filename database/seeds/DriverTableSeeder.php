<?php

use Illuminate\Database\Seeder;

class DriverTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Đặng Hùng Lãm',
            'Nguyễn Phước Hòa',
            'Nguyễn Văn Nghĩa',
            'Phạm Văn Lập'
        ];

        foreach($array_name as $key=>$item){
            \App\Driver::create([
                'fullName' => $item,
                'temporaryAddress' => '652/2A Lê Quang Định',
                'permanentAddress' => 'Điện Biên Phủ',
                'phone' => '0987654321',
                'birthday' => '1994-01-05',
                'identityCardNumber' => random_int(100000000, 900000000),
                'issueDate_identityCard' => '2012-01-05',
                'driverLicenseNumber' => '1029384756',
                'issueDate_driverLicense' => '2013-01-05',
                'expireDate_driverLicense' => '2038-01-05',
                'driverLicenseType' => 'B2',
                'startDate' => '2013-01-05',
                'finishDate' => '2016-12-05',
                'createdBy' => 1,
                'updatedBy' => 1,
                'note' => '',
                'active' => 1,
            ]);
        }

    }
}
