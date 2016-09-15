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
        \App\Garage::create([
           'name' => 'Garage Hoàng Nguyễn',
            'contactor' => '',
            'address' => '70 Bis Nguyễn Văn Lượng, P.10, Gò Vấp - TP HCM',
            'phone' => '0987 650 650'
        ]);

        \App\Garage::create([
            'name' => 'Carcare An Dương Vương',
            'contactor' => '',
            'address' => '290, An Dương Vương, Phường 4, Quận 5, Hồ Chí Minh',
            'phone' => '(84-8) 38 309 688'
        ]);

        \App\Garage::create([
            'name' => 'Chevrolet Vạn Hạnh',
            'contactor' => '',
            'address' => '47/6 Đường kênh Tân Hóa, P. Tân Thới Hòa, Q. Tân Phú',
            'phone' => '08 3961 6424'
        ]);

        \App\Garage::create([
            'name' => 'CN Cty cp XNK&DV ôtô Mặt trời mọc (Honda Cộng Hòa)',
            'contactor' => '',
            'address' => '18 Cộng Hòa, P4, Q.Tân Bình',
            'phone' => '88116868'
        ]);

        \App\Garage::create([
            'name' => 'CN Cty TNHH Sài Gòn ôtô',
            'contactor' => '',
            'address' => '104 Phổ Quang, F2, Q.Tân Bình, HCM',
            'phone' => '838442795'
        ]);
        \App\Garage::create([
            'name' => 'Công ty Cổ Phần Ôtô Việt',
            'contactor' => '',
            'address' => '296 Lê Trọng Tấn, P. Tân Thạnh, Q. Tân Phú, Tp.HCM',
            'phone' => '(08) 3812 7979'
        ]);
        \App\Garage::create([
            'name' => 'Công ty CP Ô tô Âu Châu (Euro Auto)',
            'contactor' => '',
            'address' => '808 Nguyễn Văn Linh, Q.7, TP. HCM',
            'phone' => '08 54110072'
        ]);
        \App\Garage::create([
            'name' => 'Công ty Lâm Phong',
            'contactor' => '',
            'address' => '230-232, Trần Hưng Đạo, Phường Nguyễn Cư Trinh, Quận 1',
            'phone' => '(84-8) 39 201 551'
        ]);
        \App\Garage::create([
            'name' => 'Công ty TNHH bảo trì sửa chữa ô tô Earth Việt Nam',
            'contactor' => '',
            'address' => '422, Phan Văn Trị, Phường 7, Quận 5, Hồ Chí Minh',
            'phone' => '(84-8) 38 384 511'
        ]);
        \App\Garage::create([
            'name' => 'Công ty TNHH Hoàng Xa',
            'contactor' => '',
            'address' => '85 Hoàng Quốc Việt, Quận 7, TP.HCM',
            'phone' => '8.54339382'
        ]);
    }
}
