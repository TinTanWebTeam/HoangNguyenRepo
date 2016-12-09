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
            'index'      => 1
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 2,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'Tp HCM',
            'index'      => 1
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 3,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'Nha Trang',
            'index'      => 1
        ]);

        # A CHAU #
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'An Giang',
            'index'      => 1
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Địa chỉ giao hàng',
            'from'       => null,
            'to'         => null,
            'value'      => 'TX Châu Đốc',
            'index'      => 2
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Cự ly',
            'from'       => null,
            'to'         => null,
            'value'      => '310',
            'index'      => 3
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 4,
            'rule'       => 'S',
            'name'       => 'Mã sản phẩm',
            'from'       => null,
            'to'         => null,
            'value'      => 'M',
            'index'      => 4
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Tỉnh',
            'from'       => null,
            'to'         => null,
            'value'      => 'An Giang',
            'index'      => 1
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Địa chỉ giao hàng',
            'from'       => null,
            'to'         => null,
            'value'      => 'TX Châu Đốc',
            'index'      => 2
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Cự ly',
            'from'       => null,
            'to'         => null,
            'value'      => '310',
            'index'      => 3
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 5,
            'rule'       => 'S',
            'name'       => 'Mã sản phẩm',
            'from'       => null,
            'to'         => null,
            'value'      => 'P',
            'index'      => 4
        ]);

        # YCH-PROTRADE #
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'S',
            'name'       => 'Tỉnh/ Thành phố',
            'from'       => null,
            'to'         => null,
            'value'      => 'HCM',
            'index'      => 1
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'S',
            'name'       => 'Quận',
            'from'       => null,
            'to'         => null,
            'value'      => '1',
            'index'      => 2
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'R',
            'name'       => 'CBM',
            'from'       => 0,
            'to'         => 10,
            'value'      => null,
            'index'      => 3
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 6,
            'rule'       => 'S',
            'name'       => 'Giờ',
            'from'       => null,
            'to'         => null,
            'value'      => '24',
            'index'      => 4
        ]);

        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'S',
            'name'       => 'Tỉnh/ Thành phố',
            'from'       => null,
            'to'         => null,
            'value'      => 'HCM',
            'index'      => 1
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'S',
            'name'       => 'Quận',
            'from'       => null,
            'to'         => null,
            'value'      => '1',
            'index'      => 2
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'R',
            'name'       => 'CBM',
            'from'       => 10,
            'to'         => 27,
            'value'      => null,
            'index'      => 3
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 7,
            'rule'       => 'S',
            'name'       => 'Giờ',
            'from'       => null,
            'to'         => null,
            'value'      => '24',
            'index'      => 4
        ]);


        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'S',
            'name'       => 'Tỉnh/ Thành phố',
            'from'       => null,
            'to'         => null,
            'value'      => 'HCM',
            'index'      => 1
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'S',
            'name'       => 'Quận',
            'from'       => null,
            'to'         => null,
            'value'      => '1',
            'index'      => 2
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'R',
            'name'       => 'CBM',
            'from'       => 27,
            'to'         => 1000000,
            'value'      => null,
            'index'      => 3
        ]);
        \App\FormulaDetail::create([
            'formula_id' => 8,
            'rule'       => 'S',
            'name'       => 'Giờ',
            'from'       => null,
            'to'         => null,
            'value'      => '24',
            'index'      => 4
        ]);


    }
}
