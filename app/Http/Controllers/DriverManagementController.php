<?php

namespace App\Http\Controllers;

use App\DriverVehicle;
use App\User;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;

class DriverManagementController extends Controller
{
    public function getViewDriver()
    {
        return view('subviews.Driver.Driver');
    }

    public function getDataDriver()
    {
        $dataDrivers = \DB::table('driverVehicles')
            ->select('drivers.fullName',
                'drivers.phone',
                'drivers.licenseDriverType as driverType',
                'garageTypes.name as garageTypes',
                'drivers.expireDate as expireDate ',
                'drivers.issueDate_licenseDriver as issueDate_driver',
                'drivers.governmentId',
                'vehicles.areaCode',
                'vehicles.vehicleNumber',
                'vehicleTypes.name as vehicle_types  ',
                'garages.name as garage'
            )
            ->join('drivers', 'drivers.id', '=', 'driverVehicles.driver_id')
            ->join('vehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->join('garageTypes', 'garages.garageType_id', '=', 'garagetypes.id')
            ->get();
        $response = [
            'msg'         => 'Get list all Driver',
            'dataDrivers' => $dataDrivers
        ];

        return response()->json($response, 200);
    }

    public function postModifyDivisiveDriver(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }

        $user_id = null;
        $vehicle_id = null;
        $createdBy = null;
        $updatedBy = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateVehicleUser($request->input('_vehicleUser'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $user_id = $request->input('_vehicleUser')['user_id'];
            $vehicle_id = $request->input('_vehicleUser')['vehicle_id'];
        }

        switch ($action) {
            case 'add':
                $vehicleUserNew = new UserVehicle();
                $vehicleUserNew->user_id = $user_id;
                $vehicleUserNew->vehicle_id = $vehicle_id;
                $vehicleUserNew->createdBy = Auth::user()->id;
                $vehicleUserNew->updatedBy = Auth::user()->id;
                if ($vehicleUserNew->save()) {
                    $vehicleUser = \DB::table('userVehicles')
                        ->select('userVehicles.*', 'users.fullname as users_fullname', 'users.phone as users_phone', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'garages.name as garages_name')
                        ->join('users', 'users.id', '=', 'userVehicles.user_id')
                        ->join('vehicles', 'vehicles.id', '=', 'userVehicles.vehicle_id')
                        ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                        ->where('userVehicles.id', '=', $vehicleUserNew->id)
                        ->first();
                    $response = [
                        'msg'         => 'Created vehicleUser',
                        'vehicleUser' => $vehicleUser
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $vehicleUserUpdate = UserVehicle::findOrFail($request->input('_vehicleUser')['id']);
                $vehicleUserUpdate->user_id = $user_id;
                $vehicleUserUpdate->vehicle_id = $vehicle_id;
                $vehicleUserUpdate->updatedBy = Auth::user()->id;
                if ($vehicleUserUpdate->update()) {
                    $vehicleUser = \DB::table('userVehicles')
                        ->join('users', 'users.id', '=', 'userVehicles.user_id')
                        ->join('vehicles', 'vehicles.id', '=', 'userVehicles.vehicle_id')
                        ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                        ->select('userVehicles.*', 'users.fullname as users_fullname', 'users.phone as users_phone', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'garages.name as garages_name')
                        ->where('userVehicles.id', $vehicleUserUpdate->id)
                        ->first();

                    $response = [
                        'msg'         => 'Updated vehicleUser',
                        'vehicleUser' => $vehicleUser
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $vehicleUserDelete = UserVehicle::findOrFail($request->input('_id'));
                $vehicleUserDelete->active = 0;
                if ($vehicleUserDelete->update()) {
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

    public function getAllDriver()
    {
        $users = \DB::table('users')
            ->select('users.*')
            ->join('positions', 'positions.id', '=', 'users.position_id')
            ->where('positions.name', 'like', '%Tài xế%')
            ->get();

        $response = [
            'msg'  => '',
            'user' => $users
        ];

        return response()->json($response, 200);
    }

    public function postModifyDriver(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }

        $fullName = null;
        $phone = null;
        $address = null;
        $note = null;
        $createdBy = null;
        $updatedBy = null;


        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateDriver($request->input('_driver'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $fullName = $request->input('_driver')['fullName'];
            $address = $request->input('_driver')['address'];
            $phone = $request->input('_driver')['phone'];
            $note = $request->input('_driver')['note'];
            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
        }

        switch ($action) {
            case 'add':
                $driverNew = new User();
                $driverNew->fullName = $fullName;
                $driverNew->address = $address;
                $driverNew->phone = $phone;
                $driverNew->note = $note;
                $driverNew->createdBy = $createdBy;
                $driverNew->updatedBy = $updatedBy;
                if ($driverNew->save()) {
                    $response = [
                        'msg'    => 'Created driver',
                        'driver' => $driverNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $driverUpdate = User::findOrFail($request->input('_driver')['id']);
                $driverUpdate->fullName = $fullName;
                $driverUpdate->address = $address;
                $driverUpdate->phone = $phone;
                $driverUpdate->note = $note;
                $driverUpdate->updatedBy = $updatedBy;
                if ($driverUpdate->update()) {
                    $response = [
                        'msg'    => 'Updated driver',
                        'driver' => $driverUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $driverDelete = User::findOrFail($request->input('_id'));
                $driverDelete->active = 0;

                if ($driverDelete->update()) {
                    $response = [
                        'msg' => 'Deleted driver'
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
}
