<?php

namespace App\Http\Controllers;

use App\User;
use App\UserVehicle;
use Illuminate\Http\Request;

use App\Http\Requests;

class DivisiveDriverController extends Controller
{
    public function getViewDivisiveDriver()
    {
        return view('subviews.Vehicle.DivisiveDriver');
    }
    public function getDataDivisiveDriver(){
        $vehicleUser = \DB::table('userVehicles')
            ->join('users', 'users.id', '=', 'userVehicles.user_id')
            ->join('vehicles', 'vehicles.id', '=', 'userVehicles.vehicle_id')
            ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
            ->select('userVehicles.*', 'users.fullname as users_fullname', 'users.phone as users_phone', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'garages.name as garages_name')
            ->where('users.position_id', '=', '1')
            ->get();

        $response = [
            'msg' => 'Get list all VehicleUser',
            'vehicleUser' => $vehicleUser
        ];

        return response()->json($response, 200);
    }

    public function postModifyDivisiveDriver(Request $request)
    {
        $user_id = null;
        $vehicle_id = null;

        $action = $request->input('_action');
        if($action != 'delete'){
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
                if ($vehicleUserNew->save()) {
                    $vehicleUser = \DB::table('userVehicles')
                        ->select('userVehicles.*', 'users.fullname as users_fullname', 'users.phone as users_phone', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'garages.name as garages_name')
                        ->join('users', 'users.id', '=', 'userVehicles.user_id')
                        ->join('vehicles', 'vehicles.id', '=', 'userVehicles.vehicle_id')
                        ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                        ->where('userVehicles.id', '=', $vehicleUserNew->id)
                        ->get();
                    $response = [
                        'msg' => 'Created vehicle',
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
                if ($vehicleUserUpdate->update()) {
                    $vehicleUser = \DB::table('userVehicles')
                        ->join('users', 'users.id', '=', 'userVehicles.user_id')
                        ->join('vehicles', 'vehicles.id', '=', 'userVehicles.vehicle_id')
                        ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                        ->select('userVehicles.*', 'users.fullname as users_fullname', 'users.phone as users_phone', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'garages.name as garages_name')
                        ->where('userVehicles.id', $vehicleUserUpdate->id)
                        ->get();

                    $response = [
                        'msg' => 'Updated vehicle',
                        'vehicleUser' => $vehicleUser
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $vehicleUserDelete = UserVehicle::findOrFail($request->input('_id'));

                if ($vehicleUserDelete->delete()){
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

    public function getAllUser()
    {
        $users = \DB::table('users')
            ->select('users.*')
            ->join('positions', 'positions.id', '=', 'users.position_id')
            ->where('positions.name', 'like', '%Tài xế%')
            ->get();

        $response = [
            'msg' => '',
            'user' => $users
        ];

        return response()->json($response, 200);
    }
}
