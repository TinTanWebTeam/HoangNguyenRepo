<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DebtManagementController extends Controller
{
    public function getViewDebtCustomer()
    {
        return view('partials.DebtCustomer');
    }
    public function getViewDebtVehicleOutside()
    {
        return view('partials.DebtVehicleOutside');
    }
}
