<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
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
        	'description' => 'QL người dùng'
        ]);


        //3
        Role::create([
            'name' => 'CustomerManagement',
            'description' => 'QL khách hàng'
        ]);

        //4
        Role::create([
            'name' => 'PortfolioManagement',
            'description' => 'QL danh mục'
        ]);

        //5
        Role::create([
            'name' => 'VehicleManagement',
            'description' => 'QL xe'
        ]);

        //6
        Role::create([
            'name' => 'DebtManagement',
            'description' => 'QL công nợ'
        ]);

        //7
        Role::create([
            'name' => 'CostManagement',
            'description' => 'QL chi phí'
        ]);

        //8
        Role::create([
            'name' => 'PostageManagement',
            'description' => 'QL cước phí'
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
            'description' => 'Đơn hàng'
        ]);

        //13
        Role::create([
            'name' => 'VehicleInside',
            'description' => 'Xe'
        ]);
        //14
        Role::create([
            'name' => 'VehicleOutside',
            'description' => 'Nhà xe ngoài'
        ]);
        //15
        Role::create([
            'name' => 'DebtCustomer',
            'description' => 'Khách hàng'
        ]);
        //16
        Role::create([
            'name' => 'DebtVehicleOutside',
            'description' => 'Nhà xe ngoài'
        ]);
        //17
        Role::create([
            'name' => 'FuelCost',
            'description' => 'Nhiên liệu'
        ]);
        //18
        Role::create([
            'name' => 'PetroleumCost',
            'description' => 'Thay nhớt'
        ]);
        //19
        Role::create([
            'name' => 'ParkingCost',
            'description' => 'Đậu bãi'
        ]);
        //20
        Role::create([
            'name' => 'OtherCost',
            'description' => 'Khác'
        ]);
        //21
        Role::create([
            'name' => 'RevenueReport',
            'description' => 'Doanh thu'
        ]);
        //22
        Role::create([
            'name' => 'HistoryDeliveryReport',
            'description' => 'Lịch sử giao hàng'
        ]);
        //23
        Role::create([
            'name' => 'Position',
            'description' => 'Chức vụ'
        ]);
        //24
        Role::create([
            'name' => 'User',
            'description' => 'Tài khoản'
        ]);
    }
}
