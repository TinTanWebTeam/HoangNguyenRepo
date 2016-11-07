<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Garage;
use App\GarageType;
use App\Vehicle;
use App\VehicleType;
use Illuminate\Http\Request;


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
        $driver = Driver::all();
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
            ->where('vehicles.active', 1)
            ->orderBy('vehicles.id', 'desc')
            ->get();
        $response = [
            'msg'          => 'Get data vehicle success',
            'vehicles'     => $vehicles,
            'vehicleTypes' => $vehicleTypes,
            'drivers' => $driver
        ];
        return response()->json($response, 200);
    }

    public function postModifyVehicle(Request $request)
    {
        $vehicleType_id = null;
        $garage_id = null;
        $areaCode = null;
        $vehicleNumber = null;
        $size = null;
        $weight = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
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
                $vehicleNew->garage_id = $garage_id;
                $vehicleNew->areaCode = $areaCode;
                $vehicleNew->vehicleNumber = $vehicleNumber;
                $vehicleNew->size = $size;
                $vehicleNew->weight = $weight;
                if ($vehicleNew->save()) {
                    $vehicle = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleNew->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
                        ->first();

                    $response = [
                        'msg'     => 'Created vehicle',
                        'vehicle' => $vehicle
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $vehicleUpdate = Vehicle::findOrFail($request->input('_vehicle')['id']);
                $vehicleUpdate->vehicleType_id = $vehicleType_id;
                $vehicleUpdate->garage_id = $garage_id;
                $vehicleUpdate->areaCode = $areaCode;
                $vehicleUpdate->vehicleNumber = $vehicleNumber;
                $vehicleUpdate->size = $size;
                $vehicleUpdate->weight = $weight;
                if ($vehicleUpdate->update()) {
                    $vehicle = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleUpdate->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
                        ->first();

                    $response = [
                        'msg'     => 'Updated vehicle',
                        'vehicle' => $vehicle
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $vehicleDelete = Vehicle::findOrFail($request->input('_id'));
                $vehicleDelete->active = 0;

                if ($vehicleDelete->update()) {
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
        return view('subviews.Vehicle.VehicleOutside');
    }

    public function getDataGarage()
    {
//        $garages = Garage::all();
        $garages = \DB::table('garages')
            ->select('garages.*','garageTypes.name as garageTypes')
            ->join('garageTypes','garages.garageType_id','=','garageTypes.id')
            ->where('garages.active',1)
            ->get();

        $garageTypes = GarageType::all();
        $response = [
            'msg'         => 'List of all Garage',
            'garages'     => $garages,
            'garageTypes' => $garageTypes
        ];
        return response()->json($response, 200);
    }

    public function postModifyGarage(Request $request)
    {
        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateGarage($request->input('_garage'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $name = $request->input('_garage')['name'];
            $contactor = $request->input('_garage')['contactor'];
            $phone = $request->input('_garage')['phone'];
            $address = $request->input('_garage')['address'];
            $garageType_id = $request->input('_garage')['garageType_id'];
        }

        switch ($action) {
            case 'add':
                $garageNew = new Garage();
                $garageNew->name = $name;
                $garageNew->contactor = $contactor;
                $garageNew->phone = $phone;
                $garageNew->address = $address;
                $garageNew->garageType_id = $garageType_id;
                if ($garageNew->save()) {
                    $response = [
                        'msg'    => 'Created garage',
                        'garage' => $garageNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $garageUpdate = Garage::findOrFail($request->input('_garage')['id']);
                $garageUpdate->name = $name;
                $garageUpdate->contactor = $contactor;
                $garageUpdate->phone = $phone;
                $garageUpdate->address = $address;
                $garageUpdate->garageType_id = $garageType_id;
                if ($garageUpdate->update()) {
                    $response = [
                        'msg'    => 'Updated garage',
                        'garage' => $garageUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $garageDelete = Garage::findOrFail($request->input('_id'));
                $garageDelete->active = 0;

                if ($garageDelete->update()) {
                    $response = [
                        'msg' => 'Deleted garage'
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
     * VehicleType
     * */
    public function postModifyVehicleType(Request $request)
    {
        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateVehicleType($request->input('_vehicleType'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $name = $request->input('_vehicleType')['name'];
            $description = $request->input('_vehicleType')['description'];
        }

        switch ($action) {
            case 'add':
                $vehicleTypeNew = new VehicleType();
                $vehicleTypeNew->name = $name;
                $vehicleTypeNew->description = $description;
                if ($vehicleTypeNew->save()) {
                    $response = [
                        'msg'         => 'Created vehicleType',
                        'vehicleType' => $vehicleTypeNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $vehicleTypeUpdate = VehicleType::findOrFail($request->input('_vehicleType')['id']);
                $vehicleTypeUpdate->name = $name;
                $vehicleTypeUpdate->description = $description;
                if ($vehicleTypeUpdate->update()) {
                    $response = [
                        'msg'         => 'Updated vehicleType',
                        'vehicleType' => $vehicleTypeUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $vehicleTypeDelete = VehicleType::findOrFail($request->input('_id'));
                $vehicleTypeDelete->active = 0;

                if ($vehicleTypeDelete->update()) {
                    $response = [
                        'msg' => 'Deleted vehicleType'
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

    public function getDataVehicleType()
    {
        $vehicleTypes = VehicleType::all();
        $response = [
            'msg'          => 'Get data vehicleType success',
            'vehicleTypes' => $vehicleTypes
        ];
        return response()->json($response, 200);
    }

}
