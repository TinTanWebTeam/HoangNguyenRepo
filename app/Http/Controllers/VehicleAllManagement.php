<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use League\Flysystem\Exception;

class VehicleAllManagement extends Controller
{
    public function getViewVehicleAll()
    {
        return view('subviews.Vehicle.VehicleAllManagement');
    }

    public function getDataVehicleAll()
    {
        $allVehicles = \DB::table('vehicles')
            ->leftJoin('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->leftJoin('driverVehicles', 'vehicles.id', '=', 'driverVehicles.vehicle_id')
            ->leftJoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
            ->leftJoin('transports', 'vehicles.id', '=', 'transports.vehicle_id')
            ->leftJoin('statuses', 'transports.status_transport', '=', 'statuses.id')
            ->select('vehicles.areaCode'
                , 'vehicles.vehicleNumber'
                , 'garages.name as garagesName'
                , 'driverVehicles.driver_id'
                , 'drivers.fullName as driverName'
                , 'statuses.status as status')
            ->where('vehicles.active', 1)
            ->get();
        $response = [
            'msg' => 'Get data vehicles success',
            'dataAllVehicle' => $allVehicles,
        ];
        return response()->json($response, 200);

//        try {
//
//        } catch (\Exception $ex) {
//            return $ex;
//
//        }
    }

}
