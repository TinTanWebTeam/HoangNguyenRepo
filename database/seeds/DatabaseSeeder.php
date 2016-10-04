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
        $this->call(PositionTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(CostPriceTableSeeder::class);
        $this->call(CustomerTypeTableSeeder::class);
        $this->call(GarageTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
        $this->call(PriceTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ProductTypeTableSeeder::class);
        $this->call(TransportTableSeeder::class);
        $this->call(VehicleTableSeeder::class);
        $this->call(VehicleTypeTableSeeder::class);
        $this->call(UserVehicleTableSeeder::class);
        $this->call(VoucherTableSeeder::class);
        $this->call(VoucherTransportTableSeeder::class);
        $this->call(CostTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PostageTableSeeder::class);
    }
}
