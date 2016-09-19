<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerManagementController extends Controller
{
    public function getViewCustomer()
    {
        return view('partials.Customer');
    }
    public function getDataCustomer(){
        $customers = Customer::all();
        return $customers;
    }


    public function getViewDeliveryRequirement()
    {
        return view('partials.DeliveryRequirement');
    }

    public function getDataDeliveryRequirement()
    {
        $orders = \DB::table('transports')
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('products', 'products.id', '=', 'transports.product_id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->select('transports.*', 'products.name as products_name', 'customers.fullName as customers_fullName', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->get();
        return $orders;
    }
}
