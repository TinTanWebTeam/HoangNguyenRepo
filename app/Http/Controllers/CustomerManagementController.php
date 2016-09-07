<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerManagementController extends Controller
{
    public function getViewCustomer()
    {
        return view('partials.Customer');
    }
    public function getViewDeliveryRequirement()
    {
        return view('partials.DeliveryRequirement');
    }
}
