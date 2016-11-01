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

        foreach($array_name as $item){
            \App\Driver::create([
                'fullName' => $item,
                'address' => '652/2A Lê Quang Định',
                'phone' => '0987654321',
                'birthday' => '1994-01-05',
                'governmentId' => '1234567890',
                'issueDate_governmentId' => '2012-01-05',
                'licenseDriver' => '1029384756',
                'issueDate_licenseDriver' => '2013-01-05',
                'expireDate' => '2038-01-05',
                'licenseDriverType' => 'B2',
                'createdBy' => 1,
                'updatedBy' => 1,
                'note' => '',
                'active' => 1,
            ]);
        }

    }
}
