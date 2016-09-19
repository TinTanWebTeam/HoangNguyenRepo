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
    public function getViewDebtVehicleOutside()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }
}
