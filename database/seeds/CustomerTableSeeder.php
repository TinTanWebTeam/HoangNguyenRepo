<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Customer::create([
            'code'     => 'KH001',
            'fullName' => 'Nguyễn Văn Xinh',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvxinh@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
        ]);
        Customer::create([
            'code'     => 'KH002',
            'fullName' => 'Nguyễn Văn Nghĩa',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvnghia@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
        ]);
        Customer::create([
            'code'     => 'KH003',
            'fullName' => 'Nguyễn Văn Hòa',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvhoa@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
        ]);
        Customer::create([
            'code'     => 'KH004',
            'fullName' => 'Nguyễn Văn lãm',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvlam@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
        ]);
        Customer::create([
            'code'     => 'KH005',
            'fullName' => 'Nguyễn Văn Khởi',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvkhoi@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
        ]);
    }
}
