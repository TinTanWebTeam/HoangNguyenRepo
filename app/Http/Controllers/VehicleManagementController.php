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
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')->get();
//        dd($vehicles);
        return view('partials.VehicleInside', ['vehicles' => $vehicles]);
    }
    public function getViewVehicleOutside()
    {
        $garages = Garage::all();
        return view('partials.VehicleOutside', ['garages' => $garages]);
    }
}
