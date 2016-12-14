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
            'msg' => 'Get data garages',
            'dataGarages' => $garages,
        ];
        return response()->json($response, 200);
    }

    public function postModifyGarageInside(Request $request)
    {
        $garage_name = null;
        $address = null;
        $contactor = null;
        $phone = null;
        $note = null;
        $action = $request->input('_action');

        if ($action != 'delete') {
            $validator = ValidateController::ValidateGarageInside($request->input('_garage'));
            if ($validator->fails()) {
                return $validator->errors();
                //return response()->json(['msg' => 'Input data fail'], 404);
            }
            $garage_name = $request->input('_garage')['name'];
            $address = $request->input('_garage')['address'];
            $contactor = $request->input('_garage')['contactor'];
            $phone = $request->input('_garage')['phone'];
            $note = $request->input('_garage')['note'];

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
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }
    }

    public function postModifyVehicleInside(Request $request)
    {
        /*
            ### action = 'add'
            if(co tai xe){
                them vao driverVehicle
            } else {
                them vao driverVehicle vs driver_id = 0
            }

            ### action = 'update'
            if(co tai xe){
                edit vao driverVehicle (cap nhat lai driver_id)
            } else {
                xoa driverVehicle
            }
        
        */


        $areaCode = null;
        $vehicleNumber = null;
        $size = null;
        $weight = null;
        $note = null;
        $vehicleType_id = null;
        $owner = null;
        $garage_id = null;
        $idUpdateGarage = null;
        $idDriver = null;
        $vehicle_id = null;
        $action = $request->input('_action');
        if ($action != 'deleteVehicle') {
            $validator = ValidateController::ValidateVehicleInside($request->input('_vehicle'));
            if ($validator->fails()) {
                return $validator->errors();
                //return response()->json(['msg' => 'Input data fail'], 404);
            }
            $areaCode = $request->input('_vehicle')['areaCode'];
            $vehicleNumber = $request->input('_vehicle')['vehicleNumber'];
            $size = $request->input('_vehicle')['size'];
            $weight = $request->input('_vehicle')['weight'];
            $note = $request->input('_vehicle')['note'];
            $vehicleType_id = $request->input('_vehicle')['vehicleType_id'];
            $owner = $request->input('_vehicle')['owner'];
            $trademark = $request->input('_vehicle')['trademark'];
            $yearOfProduction = $request->input('_vehicle')['yearOfProduction'];
            $garage_id = $request->input('_vehicle')['idUpdateGarage'];

            if (array_key_exists('idDriver', $request->input('_vehicle'))) {
                $idDriver = $request->input('_vehicle')['idDriver'];
            } else {
                $idDriver = 0;
            }

            if (array_key_exists('vehicle_id', $request->input('_vehicle'))) {
                $vehicle_id = $request->input('_vehicle')['vehicle_id'];
            } else {
                $vehicle_id = 0;
            }
        }
        switch ($action) {
            case 'addVehicle':
                $vehicleNew = new Vehicle();
                $vehicleNew->areaCode = $areaCode;
                $vehicleNew->vehicleNumber = $vehicleNumber;
                $vehicleNew->size = $size;
                $vehicleNew->weight = $weight;
                $vehicleNew->owner = $owner;
                $vehicleNew->note = $note;
                $vehicleNew->vehicleType_id = $vehicleType_id;
                $vehicleNew->garage_id = $garage_id;
                $vehicleNew->trademark = $trademark;
                $vehicleNew->yearOfProduction = $yearOfProduction;
                if (!$vehicleNew->save()) {
                    return response()->json(['msg' => 'Create failed'], 404);
                }
                $addDriverVehicle = new DriverVehicle();
                $addDriverVehicle->driver_id = $idDriver;
                $addDriverVehicle->vehicle_id = $vehicleNew->id;
                $addDriverVehicle->createdBy = \Auth::id();
                $addDriverVehicle->updatedBy = \Auth::id();
                if (!$addDriverVehicle->save()) {
                    return response()->json(['msg' => 'add driverVehicle failed'], 404);
                }
                $vehicle = \DB::table('vehicles')
                    ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                    ->join('vehicleTypes', 'vehicleTypes.id', '=', 'vehicles.vehicleType_id')
                    ->leftjoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
                    ->leftjoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
                    ->where([
                        ['vehicles.active', 1],
                        ['garage_id', $garage_id],
                        ['vehicles.id', $vehicleNew->id]
                    ])
                    ->select('driverVehicles.driver_id', 'vehicles.*', 'vehicleTypes.name'
                        , 'vehicleTypes.id as vehicleType_id'
                        , 'drivers.fullName'
                        , 'drivers.id as idDriver'
                        , 'driverVehicles.vehicle_id as vehicle_id '
                        , 'garages.name as garageName')
                    ->first();
                $response = [
                    'msg' => 'Created vehicle',
                    'addVehicle' => $vehicle
                ];
                return response()->json($response, 201);

                break;
            case 'updateVehicle':
                $driverVehicle = \DB::table('driverVehicles')
                ->where('vehicle_id', $vehicle_id)
                ->where('active', 1)
                ->select('*')
                ->first();

                $vehicleUpdate = Vehicle::findOrFail($request->input('_vehicle')['id']);
                $vehicleUpdate->areaCode = $areaCode;
                $vehicleUpdate->vehicleNumber = $vehicleNumber;
                $vehicleUpdate->size = $size;
                $vehicleUpdate->weight = $weight;
                $vehicleUpdate->note = $note;
                $vehicleUpdate->vehicleType_id = $vehicleType_id;
                $vehicleUpdate->owner = $owner;
                $vehicleUpdate->trademark = $trademark;
                $vehicleUpdate->yearOfProduction = $yearOfProduction;
                $vehicleUpdate->garage_id = $garage_id;
                if (!$vehicleUpdate->update()) {
                    return response()->json(['msg' => 'Update failed'], 404);
                } 
                if ($driverVehicle->driver_id == 0 && $idDriver != 0) {
                    $updateDriverVehicle = DriverVehicle::findOrFail($driverVehicle->id);
                    $updateDriverVehicle->driver_id = $idDriver;
                    $updateDriverVehicle->vehicle_id = $vehicleUpdate->id;
                    $updateDriverVehicle->updatedBy = \Auth::id();
                    if (!$updateDriverVehicle->update()) {
                        return response()->json(['msg' => 'Update failed'], 404);
                    }
                } else if ($driverVehicle->driver_id != $idDriver) {
                    $addDriver = new DriverVehicle();
                    $addDriver->driver_id = $idDriver;
                    $addDriver->vehicle_id = $vehicleUpdate->id;
                    $addDriver->updatedBy = \Auth::id();
                    if (!$addDriver->save()) {
                        return response()->json(['msg' => 'Update failed'], 404);
                    }
                    $deleteDriver = DriverVehicle::findOrFail($driverVehicle->id);
                    $deleteDriver->active = 0;
                    $deleteDriver->update();
                }
                $vehicles = \DB::table('vehicles')
                ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                ->join('vehicleTypes', 'vehicleTypes.id', '=', 'vehicles.vehicleType_id')
                ->leftjoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
                ->leftjoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
                ->where('vehicles.active', 1)
                ->where('driverVehicles.active', 1)
                ->where('vehicles.id', $vehicleUpdate->id)
                ->where('vehicles.garage_id', $garage_id)
                ->select('driverVehicles.driver_id', 'vehicles.*', 'vehicleTypes.name'
                    , 'vehicleTypes.id as vehicleType_id'
                    , 'drivers.fullName'
                    , 'drivers.id as idDriver'
                    , 'driverVehicles.vehicle_id as vehicle_id '
                    , 'garages.name as garageName'
                )
                ->first();
                $response = [
                    'msg' => 'Updated Vehicle',
                    'updateVehicle' => $vehicles
                ];
                return response()->json($response, 201);

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

                //Deactive DriverVehicle

                return response()->json(['msg' => 'Deletion failed'], 404);
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
            ->where('garages.active', 1)
            ->select('garages.*')
            ->orderBy('id', 'desc')
            ->get();
        $response = [
            'msg' => 'Get data garages',
            'dataGarages' => $garages,
        ];
        return response()->json($response, 200);

    }

    public function postModifyGarageOutside(Request $request)
    {
        $garage_name = null;
        $address = null;
        $contactor = null;
        $phone = null;
        $note = null;
        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateGarageOutside($request->input('_garage'));
            if ($validator->fails()) {
                return $validator->errors();
                //return response()->json(['msg' => 'Input data fail'], 404);
            }
            $garage_name = $request->input('_garage')['name'];
            $address = $request->input('_garage')['address'];
            $contactor = $request->input('_garage')['contactor'];
            $phone = $request->input('_garage')['phone'];
            $note = $request->input('_garage')['note'];

        }


        switch ($action) {
            case 'add':
                $garageNew = new Garage();
                $garageNew->name = $garage_name;
                $garageNew->address = $address;
                $garageNew->contactor = $contactor;
                $garageNew->phone = $phone;
                $garageNew->note = $note;
                $garageNew->garageType_id = 2;
                if ($garageNew->save()) {
                    $garages = \DB::table('garages')
                        ->where('garages.garageType_id', 2)
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
                        ->where('garages.garageType_id', 2)
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
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }
    }

    public function postModifyVehicleOutside(Request $request)
    {
        $areaCode = null;
        $vehicleNumber = null;
        $size = null;
        $weight = null;
        $note = null;
        $vehicleType_id = null;
        $owner = null;
        $garage_id = null;
        $idUpdateGarage = null;
        $driverVehiclesId = null;
        $action = $request->input('_action');

        if ($action != 'deleteVehicle') {
            $validator = ValidateController::ValidateVehicleOutside($request->input('_vehicle'));
            if ($validator->fails()) {
                return $validator->errors();
                //return response()->json(['msg' => 'Input data fail'], 404);
            }

            $areaCode = $request->input('_vehicle')['areaCode'];
            $vehicleNumber = $request->input('_vehicle')['vehicleNumber'];
            $size = $request->input('_vehicle')['size'];
            $weight = $request->input('_vehicle')['weight'];
            $note = $request->input('_vehicle')['note'];
            $vehicleType_id = $request->input('_vehicle')['vehicleType_id'];
            $owner = $request->input('_vehicle')['owner'];
            $trademark = $request->input('_vehicle')['trademark'];
            $yearOfProduction = $request->input('_vehicle')['yearOfProduction'];
            $garage_id = $request->input('_vehicle')['idUpdateGarage'];

            if (array_key_exists('idDriver', $request->input('_vehicle'))) {
                $idDriver = $request->input('_vehicle')['idDriver'];
            } else {
                $idDriver = '';
            }

            if (array_key_exists('vehicle_id', $request->input('_vehicle'))) {
                $vehicle_id = $request->input('_vehicle')['vehicle_id'];
            } else {
                $vehicle_id = '';
            }
        }
        $driverVehicle = \DB::table('driverVehicles')
            ->where('vehicle_id', $vehicle_id)
            ->where('active', 1)
            ->select('*')
            ->first();

        switch ($action) {
            case 'addVehicle':
                $vehicleNew = new Vehicle();
                $vehicleNew->areaCode = $areaCode;
                $vehicleNew->vehicleNumber = $vehicleNumber;
                $vehicleNew->size = $size;
                $vehicleNew->weight = $weight;
                $vehicleNew->owner = $owner;
                $vehicleNew->note = $note;
                $vehicleNew->vehicleType_id = $vehicleType_id;
                $vehicleNew->garage_id = $garage_id;
                $vehicleNew->trademark = $trademark;
                $vehicleNew->yearOfProduction = $yearOfProduction;
                if (!$vehicleNew->save()) {
                    return response()->json(['msg' => 'Create failed'], 404);
                }
                $addDriverVehicle = new DriverVehicle();
                $addDriverVehicle->driver_id = $idDriver;
                $addDriverVehicle->vehicle_id = $vehicleNew->id;
                $addDriverVehicle->createdBy = \Auth::id();
                $addDriverVehicle->updatedBy = \Auth::id();
                if (!$addDriverVehicle->save()) {
                    return response()->json(['msg' => 'add driverVehicle failed'], 404);
                }
                $vehicle = \DB::table('vehicles')
                    ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                    ->join('vehicleTypes', 'vehicleTypes.id', '=', 'vehicles.vehicleType_id')
                    ->leftjoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
                    ->leftjoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
                    ->where('vehicles.active', 1)
                    ->where('garage_id', $garage_id)
                    ->where('vehicles.id', $vehicleNew->id)
                    ->select('driverVehicles.driver_id', 'vehicles.*', 'vehicleTypes.name'
                        , 'vehicleTypes.id as vehicleType_id'
                        , 'drivers.fullName'
                        , 'drivers.id as idDriver'
                        , 'driverVehicles.vehicle_id as vehicle_id '
                        , 'garages.name as garageName')
                    ->first();
                $response = [
                    'msg' => 'Created vehicle',
                    'addVehicle' => $vehicle
                ];
                return response()->json($response, 201);

                break;


            case 'updateVehicle':
                $vehicleUpdate = Vehicle::findOrFail($request->input('_vehicle')['id']);
                $vehicleUpdate->areaCode = $areaCode;
                $vehicleUpdate->vehicleNumber = $vehicleNumber;
                $vehicleUpdate->size = $size;
                $vehicleUpdate->weight = $weight;
                $vehicleUpdate->note = $note;
                $vehicleUpdate->vehicleType_id = $vehicleType_id;
                $vehicleUpdate->owner = $owner;
                $vehicleUpdate->trademark = $trademark;
                $vehicleUpdate->yearOfProduction = $yearOfProduction;
                $vehicleUpdate->garage_id = $garage_id;
                if (!$vehicleUpdate->update()) {
                    return response()->json(['msg' => 'Update failed'], 404);
                } else if ($driverVehicle->driver_id == 0 && $idDriver != '') {
                    $updateDriverVehicle = DriverVehicle::findOrFail($driverVehicle->id);
                    $updateDriverVehicle->driver_id = $idDriver;
                    $updateDriverVehicle->vehicle_id = $vehicleUpdate->id;
                    $updateDriverVehicle->createdBy = \Auth::id();
                    $updateDriverVehicle->updatedBy = \Auth::id();
                    if (!$updateDriverVehicle->update()) {
                        return response()->json(['msg' => 'Update failed'], 404);
                    }
                } else if ($driverVehicle->driver_id != $idDriver) {
                    $addDriver = new DriverVehicle();
                    $addDriver->driver_id = $idDriver;
                    $addDriver->vehicle_id = $vehicleUpdate->id;
                    $addDriver->createdBy = \Auth::id();
                    $addDriver->updatedBy = \Auth::id();
                    if (!$addDriver->save()) {
                        return response()->json(['msg' => 'Update failed'], 404);
                    }
                    $deleteDriver = DriverVehicle::findOrFail($driverVehicle->id);
                    $deleteDriver->active = 0;
                    $deleteDriver->update();
                }

                $vehicles = \DB::table('vehicles')
                    ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                    ->join('vehicleTypes', 'vehicleTypes.id', '=', 'vehicles.vehicleType_id')
                    ->leftjoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
                    ->leftjoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
                    ->where('vehicles.active', 1)
                    ->where('driverVehicles.active', 1)
                    ->where('vehicles.id', $vehicleUpdate->id)
                    ->where('vehicles.garage_id', $garage_id)
                    ->select('driverVehicles.driver_id', 'vehicles.*', 'vehicleTypes.name'
                        , 'vehicleTypes.id as vehicleType_id'
                        , 'drivers.fullName'
                        , 'drivers.id as idDriver'
                        , 'driverVehicles.vehicle_id as vehicle_id '
                        , 'garages.name as garageName'
                    )
                    ->first();
                $response = [
                    'msg' => 'Updated Vehicle',
                    'updateVehicle' => $vehicles
                ];
                return response()->json($response, 201);

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

        $vehicleType = null;
        $description = null;
        $action = $request->input('_action');

        if ($action != 'delete') {
            $validator = ValidateController::ValidateVehicleType($request->input('_vehicleType'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }
            $vehicleType = $request->get('_vehicleType')['vehicleType'];
            $description = $request->get('_vehicleType')['description'];
        }
        switch ($action) {
            case'vehicleType':
                $vehicleTypeNew = new VehicleType();
                $vehicleTypeNew->name = $vehicleType;
                $vehicleTypeNew->description = $description;
                if (!$vehicleTypeNew->save()) {
                    return response()->json(['msg' => 'Create failed'], 404);
                }
                $vehicleTypes = \DB::table('vehicleTypes')
                    ->where('vehicleTypes.id', $vehicleTypeNew->id)
                    ->first();
                $response = [
                    'msg' => 'Created vehicleType',
                    'dataVehicleTypes' => $vehicleTypes,
                ];
                return response()->json($response, 201);
                break;
            case 'updateVehicleType':
                $vehicleTypeUpdate = VehicleType::findOrFail($request->input('_vehicleType')['id']);
                $vehicleTypeUpdate->name = $vehicleType;
                $vehicleTypeUpdate->description = $description;
                if ($vehicleTypeUpdate->update()) {
                    $vehicleTypes = \DB::table('vehicleTypes')
                        ->where('vehicleTypes.id', $vehicleTypeUpdate->id)
                        ->first();
                    $response = [
                        'msg' => 'Updated Vehicle',
                        'updateVehicleType' => $vehicleTypes
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }
    }

    public function postDataVehicle(Request $request)
    {

        $vehicles = \DB::table('vehicles')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->join('vehicleTypes', 'vehicleTypes.id', '=', 'vehicles.vehicleType_id')
            ->leftjoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
            ->leftjoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
            ->where('vehicles.active', 1)
            ->where('driverVehicles.active', 1)
            ->where('vehicles.garage_id', $request->input('_idGarage'))
            ->select('vehicles.*', 'vehicleTypes.name'
                , 'vehicleTypes.id as vehicleType_id'
                , 'drivers.fullName'
                , 'drivers.id as idDriver'
                , 'driverVehicles.vehicle_id as vehicle_id '
                , 'garages.name as garageName'
            )
            ->get();
        $vehicleTypes = VehicleType::all();
        $allGarage = Garage::all();
        $driver = \DB::table('drivers')
            ->where('active', 1)
            ->select('id', 'fullName', 'identityCardNumber', 'driverLicenseType')
            ->get();
        $response = [
            'msg' => 'Get data vehicleType success',
            'vehicleTypes' => $vehicleTypes,
            'dataVehicles' => $vehicles,
            'allGarage' => $allGarage,
            'dataDriver' => $driver
        ];
        return response()->json($response, 200);
    }
}
