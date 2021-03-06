<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SubRoleTableSeeder::class);
        $this->call(CostPriceTableSeeder::class);
        $this->call(VoucherTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(GarageTypeTableSeeder::class);
        $this->call(FuelPriceTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(ProductCodeTableSeeder::class);

//        Optional
        $this->call(PositionTableSeeder::class);
        $this->call(CustomerTypeTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(StaffCustomerTableSeeder::class);
        $this->call(ProductTypeTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(GarageTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(VehicleTableSeeder::class);
        $this->call(DriverVehicleTableSeeder::class);
        $this->call(DriverTableSeeder::class);

//         Tiền
        $this->call(PriceTableSeeder::class);
        $this->call(CostTableSeeder::class);

//         Hóa đơn
        $this->call(TransportTableSeeder::class);
        $this->call(VoucherTransportTableSeeder::class);
        $this->call(TransportFormulaDetailTableSeeder::class);
        $this->call(TransportInvoiceTableSeeder::class);
        $this->call(InvoiceCustomerTableSeeder::class);

//        Rule
        $this->call(RuleTableSeeder::class);
        $this->call(FormulaTableSeeder::class);
        $this->call(FormulaDetailTableSeeder::class);
    }
}
