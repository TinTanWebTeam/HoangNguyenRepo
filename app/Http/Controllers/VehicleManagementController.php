<?php

namespace App\Http\Controllers;

use App\Garage;
use App\Vehicle;
use App\VehicleType;
use Illuminate\Http\Request;

use App\Http\Requests;

class VehicleManagementController extends Controller
{
    /*
     * Vehicle
     * */
    public function getViewVehicle()
    {
        return view('subviews.Vehicle.VehicleInside');
    }

    public function getDataVehicle()
    {
        $vehicleTypes = VehicleType::all();
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
            ->where('vehicles.active', 1)
            ->orderBy('vehicles.id', 'desc')
            ->get();
        return [
            'vehicles' => $vehicles,
            'vehicleTypes' => $vehicleTypes
        ];
    }

    public function getAllVehicle()
    {
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')->get();
        return $vehicles;
    }

    public function postModifyVehicle(Request $request)
    {
        $action = $request->input('_action');
        if($action != 'delete'){
            $validator = ValidateController::ValidateVehicle($request->input('_vehicle'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $vehicleType_id = $request->input('_vehicle')['vehicleType_id'];
            $garage_id = $request->input('_vehicle')['garage_id'];
            $areaCode = $request->input('_vehicle')['areaCode'];
            $vehicleNumber = $request->input('_vehicle')['vehicleNumber'];
            $size = $request->input('_vehicle')['size'];
            $weight = $request->input('_vehicle')['weight'];
        }

        switch ($action) {
            case 'add':
                $vehicleNew = new Vehicle();
                $vehicleNew->vehicleType_id = $vehicleType_id;
                $vehicleNew->garage_id      = $garage_id;
                $vehicleNew->areaCode       = $areaCode;
                $vehicleNew->vehicleNumber  = $vehicleNumber;
                $vehicleNew->size           = $size;
                $vehicleNew->weight         = $weight;
                if ($vehicleNew->save()) {
                    $vehicle = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleNew->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
                        ->get();

                    $response = [
                        'msg' => 'Created vehicle',
                        'vehicle' => $vehicle
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $vehicleUpdate = Vehicle::findOrFail($request->input('_vehicle')['id']);
                $vehicleUpdate->vehicleType_id = $vehicleType_id;
                $vehicleUpdate->garage_id      = $garage_id;
                $vehicleUpdate->areaCode       = $areaCode;
                $vehicleUpdate->vehicleNumber  = $vehicleNumber;
                $vehicleUpdate->size           = $size;
                $vehicleUpdate->weight         = $weight;
                if ($vehicleUpdate->update()) {
                    $vehicle = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleUpdate->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
                        ->get();

                    $response = [
                        'msg' => 'Updated vehicle',
                        'vehicle' => $vehicle
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $vehicleDelete = Vehicle::findOrFail($request->input('_id'));
                $vehicleDelete->active = 0;

                if ($vehicleDelete->update()){
                    $response = [
                        'msg' => 'Deleted vehicle'
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Deletion failed'], 404);
                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }
    }

    /*
     * Garage
     * */

    public function getViewGarage()
    {
        $garages = Garage::all();
        return view('subviews.Vehicle.VehicleOutside', ['garages' => $garages]);
    }

    public function getAllGarage()
    {
        return Garage::all();
    }


}
