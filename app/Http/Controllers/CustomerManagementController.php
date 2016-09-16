<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerManagementController extends Controller
{
    public function getViewCustomer()
    {
        $customers = Customer::all();
        return view('partials.Customer', ['customers' => $customers]);
    }
    public function getViewDeliveryRequirement()
    {
        return view('partials.DeliveryRequirement');
    }
}
