<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DivisiveDriverController extends Controller
{
    public function getViewDivisiveDriver()
    {
        return view('subviews.Vehicle.DivisiveDriver');
    }
    public function getDataDivisiveDriver(){
        $userVehicles = \DB::table('userVehicles')
            ->join('users', 'users.id', '=', 'userVehicles.user_id')
            ->join('vehicles', 'vehicles.id', '=', 'userVehicles.vehicle_id')
            ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
            ->select('userVehicles.*', 'users.fullname as users_fullname', 'users.phone as users_phone', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'garages.name as garages_name')
            ->where('users.position_id', '=', '1')
            ->get();
        return $userVehicles;
    }
}
