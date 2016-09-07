<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CostManagementController extends Controller
{
    public function getViewFuelCost()
    {
        return view('partials.FuelCost');
    }
    public function getViewPetroleumCost()
    {
        return view('partials.PetroleumCost');
    }
    public function getViewParkingCost()
    {
        return view('partials.ParkingCost');
    }
    public function getViewOtherCost()
    {
        return view('partials.OtherCost');
    }
}
