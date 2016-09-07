<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class VehicleManagementController extends Controller
{
    public function getViewVehicleInside()
    {
       
        return view('partials.VehicleInside');
    }
    public function getViewVehicleOutside()
    {
        return view('partials.VehicleOutside');
    }
}
