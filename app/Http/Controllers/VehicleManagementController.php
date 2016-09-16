<?php

namespace App\Http\Controllers;

use App\Garage;
use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;

class VehicleManagementController extends Controller
{
    public function getViewVehicleInside()
    {
       $vehicles = Vehicle::all();
        return view('partials.VehicleInside', ['vehicles' => $vehicles]);
    }
    public function getViewVehicleOutside()
    {
        $garages = Garage::all();
        return view('partials.VehicleOutside', ['garages' => $garages]);
    }
}
