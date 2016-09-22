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
        return view('subviews.Vehicle.VehicleInside');
    }

    public function getDataVehicleInside()
    {
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')->get();
        return $vehicles;
    }

    public function getViewVehicleOutside()
    {
        $garages = Garage::all();
        return view('subviews.Vehicle.VehicleOutside', ['garages' => $garages]);
    }

    public function getAllVehicle()
    {
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')->get();
        return $vehicles;
    }

    public function postModifyVehicleInside(Request $request)
    {
        switch ($request->get('_action')) {
            case 'add':
                $vehicleNew = new Vehicle();
                $vehicleNew->vehicleType_id = $request->get('_object')['vehicleType_id'];
                $vehicleNew->garage_id = $request->get('_object')['garage_id'];
                $vehicleNew->areaCode = $request->get('_object')['areaCode'];
                $vehicleNew->vehicleNumber = $request->get('_object')['vehicleNumber'];
                $vehicleNew->size = $request->get('_object')['size'];
                $vehicleNew->weight = $request->get('_object')['weight'];
                if ($vehicleNew->save()) {
                    $vehicleRow = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleNew->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')->get();
                    return [
                        'status' => 'Ok',
                        'obj'    => $vehicleRow
                    ];
                }
                return ['status' => 'Fail'];
                break;
            case 'update':
                $vehicleUpdate = Vehicle::findOrFail($request->get('_object')['id']);
                $vehicleUpdate->vehicleType_id = $request->get('_object')['vehicleType_id'];
                $vehicleUpdate->garage_id = $request->get('_object')['garage_id'];
                $vehicleUpdate->areaCode = $request->get('_object')['areaCode'];
                $vehicleUpdate->vehicleNumber = $request->get('_object')['vehicleNumber'];
                $vehicleUpdate->size = $request->get('_object')['size'];
                $vehicleUpdate->weight = $request->get('_object')['weight'];
                if ($vehicleUpdate->save()) {
                    $vehicleRow = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleUpdate->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')->get();
                    return [
                        'status' => 'Ok',
                        'obj'    => $vehicleRow
                    ];
                }
                return ['status' => 'Fail'];
                break;
            case 'delete':
                $vehicleDelete = Vehicle::findOrFail($request->get('_object'));
                if ($vehicleDelete->delete())
                    return ['status' => 'Ok'];
                return ['status' => 'Fail'];
                break;
            default:
                return ['status' => 'Fail'];
                break;
        }
    }

    public function getAllGarage()
    {
        return Garage::all();
    }


}
