<?php

use Illuminate\Database\Seeder;

class FormulaDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # FORMOSA #
        \App\FormulaDetail::create([
            'formula_id' => 1,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'Đồng Nai',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 2,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'Tp HCM',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 3,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'Nha Trang',
            'index'      => null
        ]);

        # A CHAU #
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'An Giang',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Địa chỉ giao hàng',
            'from'       => null,
            'to'         => null,
            'value'      => 'TX Châu Đốc',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Cự ly',
            'from'       => null,
            'to'         => null,
            'value'      => '310',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Mã sản phẩm',
            'from'       => null,
            'to'         => null,
            'value'      => 'M',
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'An Giang',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Địa chỉ giao hàng',
            'from'       => null,
            'to'         => null,
            'value'      => 'TX Châu Đốc',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Cự ly',
            'from'       => null,
            'to'         => null,
            'value'      => '310',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Mã sản phẩm',
            'from'       => null,
            'to'         => null,
            'value'      => 'P',
            'index'      => null
        ]);

        # YCH-PROTRADE #
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'S',
            'name'       => 'Tỉnh/ Thành phố',
            'from'       => null,
            'to'         => null,
            'value'      => 'HCM',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'S',
            'name'       => 'Quận',
            'from'       => null,
            'to'         => null,
            'value'      => '1',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'R',
            'name'       => 'CBM',
            'from'       => 0,
            'to'         => 10,
            'value'      => null,
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'S',
            'name'       => 'Giờ',
            'from'       => null,
            'to'         => null,
            'value'      => '24',
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'S',
            'name'       => 'Tỉnh/ Thành phố',
            'from'       => null,
            'to'         => null,
            'value'      => 'HCM',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'S',
            'name'       => 'Quận',
            'from'       => null,
            'to'         => null,
            'value'      => '1',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'R',
            'name'       => 'CBM',
            'from'       => 10,
            'to'         => 27,
            'value'      => null,
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'S',
            'name'       => 'Giờ',
            'from'       => null,
            'to'         => null,
            'value'      => '24',
            'index'      => null
        ]);


        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'S',
            'name'       => 'Tỉnh/ Thành phố',
            'from'       => null,
            'to'         => null,
            'value'      => 'HCM',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'S',
            'name'       => 'Quận',
            'from'       => null,
            'to'         => null,
            'value'      => '1',
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'R',
            'name'       => 'CBM',
            'from'       => 27,
            'to'         => 1000000,
            'value'      => null,
            'index'      => null
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'S',
            'name'       => 'Giờ',
            'from'       => null,
            'to'         => null,
            'value'      => '24',
            'index'      => null
        ]);

        # CTY TNHH SCG TRADING VIET NAM #
        \App\FormulaDetail::create([
            'formula_id' => 9,
            'rule'       => 'O',
            'name'       => 'Giá dầu',
            'from'       => 8601,
            'to'         => 9600,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 9,
            'rule'       => 'R',
            'name'       => 'Khoảng cách',
            'from'       => 0,
            'to'         => 10,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 10,
            'rule'       => 'O',
            'name'       => 'Giá dầu',
            'from'       => 9601,
            'to'         => 10600,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 10,
            'rule'       => 'R',
            'name'       => 'Khoảng cách',
            'from'       => 0,
            'to'         => 10,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 11,
            'rule'       => 'O',
            'name'       => 'Giá dầu',
            'from'       => 8601,
            'to'         => 9600,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 11,
            'rule'       => 'R',
            'name'       => 'Khoảng cách',
            'from'       => 11,
            'to'         => 30,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 12,
            'rule'       => 'O',
            'name'       => 'Giá dầu',
            'from'       => 9601,
            'to'         => 10600,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 12,
            'rule'       => 'R',
            'name'       => 'Khoảng cách',
            'from'       => 11,
            'to'         => 30,
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 13,
            'rule'       => 'PC',
            'name'       => 'Mã hàng',
            'from'       => null,
            'to'         => null,
            'fromPlace'  => null,
            'toPlace'    => null,
            'value'      => 'M',
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 14,
            'rule'       => 'P',
            'name'       => 'Tuyến đường',
            'from'       => null,
            'to'         => null,
            'fromPlace'  => 'A',
            'toPlace'    => 'B',
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 15,
            'rule'       => 'P',
            'name'       => 'Tuyến đường',
            'from'       => null,
            'to'         => null,
            'fromPlace'  => 'C',
            'toPlace'    => 'D',
            'value'      => null,
            'index'      => null
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 16,
            'rule'       => 'P',
            'name'       => 'Tuyến đường',
            'from'       => null,
            'to'         => null,
            'fromPlace'  => 'E',
            'toPlace'    => 'F',
            'value'      => null,
            'index'      => null
        ]);

    }
}
