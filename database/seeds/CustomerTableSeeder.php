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
            'FORMOSA',
            'CTY CP THỰC PHẨM Á CHÂU',
            'CTY TNHH YCH-PROTRADE',
            'CTY TNHH BIA VÀ NƯỚC GIẢI KHÁT VN',
            'CTY TNHH SX TM DV ĐOÀN KẾT',
            'CTY TNHH INDO-TRANS KEPPEL LOGISTICS VIỆT NAM',
            'CTY TNHH AUNTEX',
            'CTY PHẦN MỀM TIN TẤN',
        ];

        foreach($array_name as $item){
            Customer::create([
                'fullName'                        => $item,
                'address'                         => '662 Le Quang Dinh',
                'phone'                           => '0987654321',
                'email'                           => 'mycompany@company.com',
                'note'                            => $item,
                'createdBy'                       => 1,
                'updatedBy'                       => 1,
                'taxCode'                         => '0301876168',
                'customerType_id'                 => 1,
                'percentOilPerPostage'            => 30,
                'percentOilLimitToChangePostage'  => 15,
                'percentLubePerPostage'           => 0,
                'percentLubeLimitToChangePostage' => 0
            ]);
        }
    }
}
