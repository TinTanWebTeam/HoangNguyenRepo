<?php

namespace App\Http\Controllers;

use App\Transport;
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
            ->select('transports.*', 'products.id as products_id', 'products.name as products_name',
                'customers.id as customers_id', 'customers.fullName as customers_fullName',
                'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note',
                'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_'
            )
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('products', 'products.id', '=', 'transports.product_id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
            ->join('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
            ->join('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
            ->join('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
            ->whereRaw('transports.cashReceive < transports.cashRevenue')
            ->where('transports.active', '=', '1')
            ->get();

        $response = [
            'msg'               => 'Get list all Transport',
            'transports'        => $transports,
        ];
        return response()->json($response, 200);
    }

    public function getViewDebtVehicleOutside()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }
}
