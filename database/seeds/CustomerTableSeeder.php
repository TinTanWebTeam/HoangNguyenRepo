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
            'fullName' => 'CTY TNHH BIA VÀ NƯỚC GIẢI KHÁT VN',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nuocgiaikhat@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
            'updatedBy' => '1',
            'taxCode' => '0301876168',
            'customerType_id' => '1'
        ]);
        Customer::create([
            'fullName' => 'CTY CP THỰC PHẨM Á CHÂU',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvnghia@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
            'updatedBy' => '1',
            'taxCode' => '3700150020',
            'customerType_id' => '1'
        ]);
        Customer::create([
            'fullName' => 'CTY TNHH SX TM DV ĐOÀN KẾT',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvhoa@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
            'updatedBy' => '1',
            'taxCode' => '1100678922',
            'customerType_id' => '1'
        ]);
        Customer::create([
            'fullName' => 'CTY TNHH INDO-TRANS KEPPEL LOGISTICS VIỆT NAM',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvlam@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
            'updatedBy' => '1',
            'taxCode' => '0303852860',
            'customerType_id' => '1'
        ]);
        Customer::create([
            'fullName' => 'CTY TNHH AUNTEX',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nvkhoi@gmail.com',
            'note'     => '',
            'createdBy'=> '1',
            'updatedBy' => '1',
            'taxCode' => '0303551493',
            'customerType_id' => '1'
        ]);
        Customer::create([
            'fullName' => 'CTY PHẦN MỀM TIN TẤN',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'thkhanh@tintansoft.com',
            'note'     => '',
            'createdBy'=> '1',
            'updatedBy' => '1',
            'taxCode' => '0303551493',
            'customerType_id' => '1'
        ]);
    }
}
