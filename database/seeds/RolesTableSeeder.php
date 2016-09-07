<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Role::create([
        	'name' => 'Admin',
        	'description' => 'Tài khoản quản trị'		
        ]);

        //2
        Role::create([
        	'name' => 'UserManagement',
        	'description' => 'Quản lý người dùng'
        ]);

        //3
        Role::create([
            'name' => 'CustomerManagement',
            'description' => 'Quản lý khách hàng'
        ]);

        //4
        Role::create([
            'name' => 'PortfolioManagement',
            'description' => 'Quản lý danh mục'
        ]);

        //5
        Role::create([
            'name' => 'VehicleManagement',
            'description' => 'Quản lý xe'
        ]);

        //6
        Role::create([
            'name' => 'DebtManagement',
            'description' => 'Quản lý công nợ'
        ]);

        //7
        Role::create([
            'name' => 'CostManagement',
            'description' => 'Quản lý chi phí'
        ]);

        //8
        Role::create([
            'name' => 'PostageManagement',
            'description' => 'Quản lý cước phí'
        ]);

        //9
        Role::create([
            'name' => 'DivisiveDriver',
            'description' => 'Phân tài'
        ]);

        //10
        Role::create([
            'name' => 'Report',
            'description' => 'Báo cáo'
        ]);

        //---------------
        //11
        Role::create([
            'name' => 'Customer',
            'description' => 'Khách hàng'
        ]);
        //12
        Role::create([
            'name' => 'DeliveryRequirement',
            'description' => 'Yêu cầu giao hàng'
        ]);
        //13
        Role::create([
            'name' => 'Unit',
            'description' => 'Đơn vị tính'
        ]);
        //14
        Role::create([
            'name' => 'City',
            'description' => 'Tỉnh thành'
        ]);
        //15
        Role::create([
            'name' => 'VehicleInside',
            'description' => 'Xe công ty'
        ]);
        //16
        Role::create([
            'name' => 'VehicleOutside',
            'description' => 'Nhà xe ngoài'
        ]);
        //17
        Role::create([
            'name' => 'DebtCustomer',
            'description' => 'Công nợ khách hàng'
        ]);
        //18
        Role::create([
            'name' => 'DebtVehicleOutside',
            'description' => 'Công nợ nhà xe ngoài'
        ]);
        //19
        Role::create([
            'name' => 'FuelCost',
            'description' => 'Nhiên liệu'
        ]);
        //20
        Role::create([
            'name' => 'PetroleumCost',
            'description' => 'Thay nhớt'
        ]);
        //21
        Role::create([
            'name' => 'ParkingCost',
            'description' => 'Đậu bãi'
        ]);
        //22
        Role::create([
            'name' => 'OtherCost',
            'description' => 'Khác'
        ]);
    }
}
