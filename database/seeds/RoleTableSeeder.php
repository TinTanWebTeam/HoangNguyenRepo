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
        $array_name = [
            'Admin',
            'UserManagement',
            'DriverManagement',
            'CustomerManagement',
            'VehicleManagement',
            'DebtManagement',
            'CostManagement',
            'PostageManagement',
            'Report',
            'Customer',
            'DeliveryRequirement',
            'VehicleInside',
            'VehicleOutside',
            'DebtCustomer',
            'DebtVehicleOutside',
            'FuelCost',
            'PetroleumCost',
            'ParkingCost',
            'OtherCost',
            'RevenueReport',
            'HistoryDeliveryReport',
            'Position',
            'User'
        ];

        $array_description = [
            'Quản trị viên',
            'QL người dùng',
            'QL tài xế',
            'QL khách hàng',
            'QL xe',
            'QL công nợ',
            'QL chi phí',
            'QL cước phí',
            'Báo cáo',
            'Khách hàng',
            'Đơn hàng',
            'Xe',
            'Nhà xe ngoài',
            'Khách hàng',
            'Nhà xe ngoài',
            'Nhiên liệu',
            'Thay nhớt',
            'Đậu bãi',
            'Khác',
            'Doanh thu',
            'Lịch sử giao hàng',
            'Chức vụ',
            'Tài khoản'
        ];

        foreach($array_name as $key => $name){
            Role::create([
                'name' => $array_name[$key],
                'description' => $array_description[$key]
            ]);
        }
    }
}
