<?php

use Illuminate\Database\Seeder;

class GarageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Garage Hoàng Nguyễn',
            'Carcare An Dương Vương',
            'Chevrolet Vạn Hạnh',
            'CN Cty cp XNK&DV ôtô Mặt trời mọc (Honda Cộng Hòa)',
            'CN Cty TNHH Sài Gòn ôtô'
        ];

        foreach($array_name  as $item){
            \App\Garage::create([
                'name' => $item,
                'contact' => 'Binh',
                'address' => '70 Bis Nguyễn Văn Lượng, P.10, Gò Vấp - TP HCM',
                'phone' => '0987650650',
                'note' => '',
                'active' => 1,
                'garageType_id' => 1
            ]);
        }

        $array_name = [
            'Công ty Cổ Phần Ôtô Việt',
            'Công ty CP Ô tô Âu Châu (Euro Auto)',
            'Công ty Lâm Phong',
            'Công ty TNHH bảo trì sửa chữa ô tô Earth Việt Nam',
            'Công ty TNHH Hoàng Xa',
        ];

        foreach($array_name  as $item){
            \App\Garage::create([
                'name' => $item,
                'contact' => 'Binh',
                'address' => '70 Bis Nguyễn Văn Lượng, P.10, Gò Vấp - TP HCM',
                'phone' => '0987650650',
                'note' => '',
                'active' => 1,
                'garageType_id' => 2
            ]);
        }
    }
}
