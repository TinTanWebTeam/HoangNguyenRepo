<?php

use Illuminate\Database\Seeder;

class StaffCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Hồ Văn Khởi',
            'Lưu Hoàng Kha',
            'Phạm Hữu Dư',
            'Nguyễn Hoàng Phúc'
        ];

        foreach($array_name as $key=>$value){
            \App\StaffCustomer::create([
                'fullName'    => $value,
                'address'     => '',
                'phone'       => '0987655321',
                'birthday'    => '1990-01-03',
                'email'       => 'myemail@email.com',
                'note'        => '',
                'active'      => 1,
                'position'    => 'Kế toán',
                'createdBy'   => 1,
                'updatedBy'   => 1,
                'customer_id' => $key
            ]);
        }

    }
}
