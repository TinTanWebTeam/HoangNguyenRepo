<?php

namespace App\Http\Controllers;


use App\Role;
use Illuminate\Http\Request;


use App\Http\Requests;


class HomeController extends Controller
{
    public function index()
    {

        $array_url = [
            'Admin'                 => '',
            'UserManagement'        => 'user-management',
            'CustomerManagement'    => 'customer-management',
            'PortfolioManagement'   => 'portfolio-management',
            'VehicleManagement'     => 'vehicle-management',
            'DebtManagement'        => 'debt-management',
            'CostManagement'        => 'cost-management',
            'PostageManagement'     => 'postage-management',
            'DivisiveDriver'        => 'divisive-driver',
            'Report'                => 'report',
            'Customer'              => 'customer',
            'DeliveryRequirement'   => 'delivery-requirement',
            'Unit'                  => 'unit',
            'City'                  => 'city',
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
            'CustomerPostage'       => 'customer-postage',
            'MonthPostage'          => 'month-postage'
        ];

        $array_icon = [
            'Admin'               => "fa-user-secret",
            'UserManagement'      => "fa-users",
            'CustomerManagement'  => "fa-male",
            'PortfolioManagement' => "fa-folder",
            'VehicleManagement'   => "fa-car",
            'DebtManagement'      => "fa-money",
            'CostManagement'      => "fa-usd",
            'PostageManagement'   => "fa-dollar",
            'DivisiveDriver'      => "fa-hand-o-right",
            'Report'              => "fa-file-text",
        ];

        $array_auth = [
            'Admin'               => [],
            'UserManagement'      => [],
            'CustomerManagement'  => ['Customer', 'DeliveryRequirement'],
            'PortfolioManagement' => ['Unit', 'City'],
            'VehicleManagement'   => ['VehicleInside', 'VehicleOutside'],
            'DebtManagement'      => ['DebtCustomer', 'DebtVehicleOutside'],
            'CostManagement'      => ['FuelCost', 'PetroleumCost', 'ParkingCost', 'OtherCost'],
            'PostageManagement'   => ['CustomerPostage', 'MonthPostage'],
            'DivisiveDriver'      => [],
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

        return view('home', ['filtered' => $filtered, 'array_icon' => $array_icon, 'array_url' => $array_url]);
    }
}