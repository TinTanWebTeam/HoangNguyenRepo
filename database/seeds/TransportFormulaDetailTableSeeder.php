<?php

use Illuminate\Database\Seeder;

class TransportFormulaDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* FORMOSA */
        \App\TransportFormulaDetail::create([
            'name'         => 'Tỉnh',
            'value'        => 'Đồng Nai',
            'rule'         => 'S',
            'transport_id' => 1,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Tỉnh',
            'value'        => 'Tp HCM',
            'rule'         => 'S',
            'transport_id' => 2,
            'active'       => 1
        ]);

        /* A Chau */
        \App\TransportFormulaDetail::create([
            'name'         => 'Tỉnh',
            'value'        => 'An Giang',
            'rule'         => 'S',
            'transport_id' => 3,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Địa chỉ giao hàng',
            'value'        => 'TX Châu Đốc',
            'rule'         => 'S',
            'transport_id' => 3,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Cự ly',
            'value'        => '310',
            'rule'         => 'S',
            'transport_id' => 3,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Mã sản phẩm',
            'value'        => 'M',
            'rule'         => 'S',
            'transport_id' => 3,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Tỉnh',
            'value'        => 'An Giang',
            'rule'         => 'S',
            'transport_id' => 4,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Địa chỉ giao hàng',
            'value'        => 'TX Châu Đốc',
            'rule'         => 'S',
            'transport_id' => 4,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Cự ly',
            'value'        => '310',
            'rule'         => 'S',
            'transport_id' => 4,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Mã sản phẩm',
            'value'        => 'P',
            'rule'         => 'S',
            'transport_id' => 4,
            'active'       => 1
        ]);

        /**/
        \App\TransportFormulaDetail::create([
            'name'         => 'Tỉnh/ Thành phố',
            'value'        => 'HCM',
            'rule'         => 'S',
            'transport_id' => 5,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Quận',
            'value'        => '1',
            'rule'         => 'S',
            'transport_id' => 5,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'CBM',
            'value'        => '9',
            'rule'         => 'R',
            'transport_id' => 5,
            'active'       => 1
        ]);

        \App\TransportFormulaDetail::create([
            'name'         => 'Giờ',
            'value'        => '24',
            'rule'         => 'S',
            'transport_id' => 5,
            'active'       => 1
        ]);
    }
}
