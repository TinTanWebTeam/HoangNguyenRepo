<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DebtManagementController extends Controller
{
    public function getViewDebtCustomer()
    {
        return view('subviews.Debt.DebtCustomer');
    }

    public function getDataDebtCustomer(){
        $transports = \DB::table('transports')
            ->select('transports.*',
                'products.id as products_id',
                'products.name as products_name',
                'customers.id as customers_id',
                'customers.fullName as customers_fullName',
                'vehicles.id as vehicles_id',
                'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'costs.cost', 'costs.note as costs_note')
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('products', 'products.id', '=', 'transports.product_id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->where('transports.cashReceive','>','cashProfit')
            ->where('transports.active',1)
            ->get();

        $response = [
            'msg'               => 'Get list all Transport',
            'transports'        => $transports,
        ];
        return response()->json($response, 200);
        dd($transports);
    }











    public function getViewDebtVehicleOutside()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }
}
