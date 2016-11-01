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
        $array_name = [
            'CTY TNHH BIA VÀ NƯỚC GIẢI KHÁT VN',
            'CTY CP THỰC PHẨM Á CHÂU',
            'CTY TNHH SX TM DV ĐOÀN KẾT',
            'CTY TNHH INDO-TRANS KEPPEL LOGISTICS VIỆT NAM',
            'CTY TNHH AUNTEX',
            'CTY PHẦN MỀM TIN TẤN',
        ];

        foreach($array_name as $item){
            Customer::create([
                'fullName'        => $item,
                'address'         => '662 Le Quang Dinh',
                'phone'           => '0987654321',
                'email'           => 'mycompany@company.com',
                'note'            => $item,
                'createdBy'       => 1,
                'updatedBy'       => 1,
                'taxCode'         => '0301876168',
                'customerType_id' => 1,
                'percentPetroleum'=> 20,
                'percentFuel'=> 10
            ]);
        }
    }
}
