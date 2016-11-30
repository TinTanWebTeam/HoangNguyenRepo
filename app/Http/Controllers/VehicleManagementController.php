<?php

namespace App\Http\Controllers;

use App\Driver;
use App\DriverVehicle;
use App\Garage;
use App\GarageType;
use App\Vehicle;
use App\VehicleType;
use Illuminate\Http\Request;


class VehicleManagementController extends Controller
{
    /*
     * Garage Công ty
     * */
    public function getViewGarageInside()
    {
        return view('subviews.Vehicle.VehicleInside');
    }

    public function getDataGarageInside()
    {
        $garages = \DB::table('garages')
            ->where('garages.garageType_id', 1)
            ->where('garages.active', 1)
            ->select('garages.*')
            ->get();
        $response = [
            'msg' => 'Get data garages + vehicle in side success',
            'dataGarages' => $garages,
        ];
        return response()->json($response, 200);
    }

    public function postModifyGarageInside(Request $request)
    {
        /*
         * request Garages
        */
        $garage_name = null;
        $address = null;
        $contactor = null;
        $phone = null;
        $note = null;
        /*
         * request Vehicle Type
        */
        $vehicleType = null;
        $description = null;
        $action = $request->input('_action');
        if ($request->input('_garage')) {
            if ($action != 'delete') {
                $validator = ValidateController::ValidateGarageInside($request->input('_garage'));
                if ($validator->fails()) {
                    return $validator->errors();
                    //return response()->json(['msg' => 'Input data fail'], 404);
                }
                /*
                 * request Garages
                */
                $garage_name = $request->input('_garage')['name'];
                $address = $request->input('_garage')['address'];
                $contactor = $request->input('_garage')['contactor'];
                $phone = $request->input('_garage')['phone'];
                $note = $request->input('_garage')['note'];

            }
        } else {
            /*
            * request Vehicle Type
           */
            $vehicleType = $request->input('_vehicleType')['vehicleType'];
            $description = $request->input('_vehicleType')['description'];
        }

        switch ($action) {
            case 'add':
                $garageNew = new Garage();
                $garageNew->name = $garage_name;
                $garageNew->address = $address;
                $garageNew->contactor = $contactor;
                $garageNew->phone = $phone;
                $garageNew->note = $note;
                $garageNew->garageType_id = 1;
                if ($garageNew->save()) {
                    $garages = \DB::table('garages')
                        ->where('garages.garageType_id', 1)
                        ->where('garages.active', 1)
                        ->where('garages.id', $garageNew->id)
                        ->leftjoin('vehicles', 'vehicles.garage_id', '=', 'garages.id')
                        ->select('garages.*', 'vehicles.areaCode', 'vehicles.vehicleNumber')
                        ->first();
                    $response = [
                        'msg' => 'Created vehicle',
                        'addGarage' => $garages
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $garageUpdate = Garage::findOrFail($request->input('_garage')['id']);
                $garageUpdate->name = $garage_name;
                $garageUpdate->address = $address;
                $garageUpdate->contactor = $contactor;
                $garageUpdate->note = $note;
                $garageUpdate->phone = $phone;
                if ($garageUpdate->update()) {
                    $garages = \DB::table('garages')
                        ->where('garages.garageType_id', 1)
                        ->where('garages.active', 1)
                        ->where('garages.id', $request->input('_garage')['id'])
                        ->leftjoin('vehicles', 'vehicles.garage_id', '=', 'garages.id')
                        ->select('garages.*', 'vehicles.areaCode', 'vehicles.vehicleNumber')
                        ->first();
                    $response = [
                        'msg' => 'Updated Garage',
                        'updateGarage' => $garages
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
            case'vehicleType':
                $vehicleTypeNew = new VehicleType();
                $vehicleTypeNew->name = $vehicleType;
                $vehicleTypeNew->description = $description;
                if (!$vehicleTypeNew->save()) {
                    return response()->json(['msg' => 'Create failed'], 404);
                }
                $vehicleTypes = \DB::table('vehicleTypes')
                    ->where('vehicleTypes.id',$vehicleTypeNew->id)
                    ->first();
                $response = [
                    'msg' => 'Created vehicleType',
                    'dataVehicleTypes' => $vehicleTypes,

                ];
                return response()->json($response, 201);


                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }
    }

    public function postModifyVehicleInside(Request $request){
        $action = $request->input('_action');
        switch ($action) {
            case 'add':
                $garageNew = new Garage();
                $garageNew->name = $garage_name;
                $garageNew->address = $address;
                $garageNew->contactor = $contactor;
                $garageNew->phone = $phone;
                $garageNew->note = $note;
                $garageNew->garageType_id = 1;
                if ($garageNew->save()) {
                    $garages = \DB::table('garages')
                        ->where('garages.garageType_id', 1)
                        ->where('garages.active', 1)
                        ->where('garages.id', $garageNew->id)
                        ->leftjoin('vehicles', 'vehicles.garage_id', '=', 'garages.id')
                        ->select('garages.*', 'vehicles.areaCode', 'vehicles.vehicleNumber')
                        ->first();
                    $response = [
                        'msg' => 'Created vehicle',
                        'addGarage' => $garages
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $garageUpdate = Garage::findOrFail($request->input('_garage')['id']);
                $garageUpdate->name = $garage_name;
                $garageUpdate->address = $address;
                $garageUpdate->contactor = $contactor;
                $garageUpdate->note = $note;
                $garageUpdate->phone = $phone;
                if ($garageUpdate->update()) {
                    $garages = \DB::table('garages')
                        ->where('garages.garageType_id', 1)
                        ->where('garages.active', 1)
                        ->where('garages.id', $request->input('_garage')['id'])
                        ->leftjoin('vehicles', 'vehicles.garage_id', '=', 'garages.id')
                        ->select('garages.*', 'vehicles.areaCode', 'vehicles.vehicleNumber')
                        ->first();
                    $response = [
                        'msg' => 'Updated Garage',
                        'updateGarage' => $garages
                    ];
                    return response()->json($response, 201);
                }

                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'deleteVehicle':
                $vehicleDelete = Vehicle::findOrFail($request->input('_id'));
                $vehicleDelete->active = 0;
                if ($vehicleDelete->update()) {
                    $response = [
                        'msg' => 'Deleted Vehicle'
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Deletion failed'], 404);
                break;
            case'vehicleType':
                $vehicleTypeNew = new VehicleType();
                $vehicleTypeNew->name = $vehicleType;
                $vehicleTypeNew->description = $description;
                if (!$vehicleTypeNew->save()) {
                    return response()->json(['msg' => 'Create failed'], 404);
                }
                $vehicleTypes = \DB::table('vehicleTypes')
                    ->where('vehicleTypes.id',$vehicleTypeNew->id)
                    ->first();
                $response = [
                    'msg' => 'Created vehicleType',
                    'dataVehicleTypes' => $vehicleTypes,

                ];
                return response()->json($response, 201);


                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }

    }



    /*
     * Garage ngoài
     * */

    public function getViewGarageOutside()
    {
        return view('subviews.Vehicle.VehicleOutside');
    }

    public function getDataGarageOutside()
    {
        $garages = \DB::table('garages')
            ->where('garages.garageType_id', 2)
            ->leftjoin('vehicles', 'vehicles.garage_id', '=', 'garages.id')
            ->get();
        $vehicles = \DB::table('vehicles')
            ->where('vehicles.garage_id', 2)
            ->get();
        $response = [
            'msg' => 'Get data garages + vehicle out side success',
            'dataVehicles' => $vehicles,
            'dataGarages' => $garages,
        ];
        return response()->json($response, 200);
    }
//    public function getDataGarage()
//    {
////        $garages = Garage::all();
//        $garages = \DB::table('garages')
//            ->select('garages.*', 'garageTypes.name as garageTypes')
//            ->join('garageTypes', 'garages.garageType_id', '=', 'garageTypes.id')
//            ->where('garages.active', 1)
//            ->get();
//
//        $garageTypes = GarageType::all();
//        $response = [
//            'msg' => 'List of all Garage',
//            'garages' => $garages,
//            'garageTypes' => $garageTypes
//        ];
//        return response()->json($response, 200);
//    }

    public function postModifyGarageOutside(Request $request)
    {
        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateGarage($request->input('_garage'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
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
                    $garages = \DB::table('garages')
                        ->select('garages.*', 'garageTypes.name as garageTypes')
                        ->join('garageTypes', 'garages.garageType_id', '=', 'garageTypes.id')
                        ->where('garages.active', 1)
                        ->where('garages.id', $garageNew->id)
                        ->first();
                    $response = [
                        'msg' => 'Created garage',
                        'garage' => $garages
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
                    $garages = \DB::table('garages')
                        ->select('garages.*', 'garageTypes.name as garageTypes')
                        ->join('garageTypes', 'garages.garageType_id', '=', 'garageTypes.id')
                        ->where('garages.active', 1)
                        ->where('garages.id', $request->input('_garage')['id'])
                        ->first();
                    $response = [
                        'msg' => 'Updated garage',
                        'garage' => $garages
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
                        'msg' => 'Created vehicleType',
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
                        'msg' => 'Updated vehicleType',
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

    public function postDataVehicleType(Request $request)
    {
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes','vehicleType_id','=','vehicles.id')
            ->where('active',1)
            ->where('garage_id',$request->input('_idGarage'))
            ->get();
        $vehicleTypes = VehicleType::all();
        $response = [
            'msg' => 'Get data vehicleType success',
            'vehicleTypes' => $vehicleTypes,
            'dataVehicles' => $vehicles
        ];
        return response()->json($response, 200);
    }

}
