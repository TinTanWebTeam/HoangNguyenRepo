<?php

namespace App\Http\Controllers;

use App\Driver;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class DriverManagementController extends Controller
{
    public function getViewDriver()
    {
        return view('subviews.Driver.Driver');
    }

    public function getDataDriver()
    {
        $dataDrivers = \DB::table('drivers')
            ->select(
                'drivers.*',
                'drivers.licenseDriverType as driverType',
                'drivers.issueDate_licenseDriver as issueDate_driver',
                'vehicles.areaCode',
                'vehicles.vehicleNumber',
                'vehicleTypes.name as vehicle_types',
                'garages.name as garage',
                'garageTypes.name as garageTypes'
            )
            ->leftJoin('driverVehicles', 'drivers.id', '=', 'driverVehicles.driver_id')
            ->leftJoin('vehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
            ->leftJoin('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->leftJoin('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->leftJoin('garageTypes', 'garages.garageType_id', '=', 'garageTypes.id')
            ->where('drivers.active', 1)
            ->get();
        $response = [
            'msg'         => 'Get list all Driver',
            'dataDrivers' => $dataDrivers
        ];

        return response()->json($response, 200);
    }

    public function postModifyDriver(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }

        $fullName = null;
        $birthday = null;
        $phone = null;
        $governmentId = null;
        $issueDateId = null;
        $note = null;
        $driverType = null;
        $issueDateDriver = null;
        $expireDateDriver = null;
        $createdBy = null;
        $updatedBy = null;
        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateDriver($request->input('_object'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $fullName = $request->input('_object')['fullName'];
            $address = $request->input('_object')['address'];
            $phone = $request->input('_object')['phone'];
            $note = $request->input('_object')['note'];
            $driverType = $request->input('_object')['driverType'];
            $governmentId = $request->input('_object')['governmentId'];
            $birthday = $request->input('_object')['birthday'];
            $issueDateId = $request->input('_object')['issueDateId'];
            $issueDateDriver = $request->input('_object')['issueDateDriver'];
            $expireDateDriver = $request->input('_object')['expireDateDriver'];
            $birthdayDate = Carbon::createFromFormat('d-m-Y', $birthday)->toDateTimeString();
            $issueDateIdDate = Carbon::createFromFormat('d-m-Y', $issueDateId)->toDateTimeString();
            $issueDateDriverDate = Carbon::createFromFormat('d-m-Y', $issueDateDriver)->toDateTimeString();
            $expireDateDriverDate = Carbon::createFromFormat('d-m-Y', $expireDateDriver)->toDateTimeString();
            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
        }

        switch ($action) {
            case 'add':
                $driverNew = new Driver();
                $driverNew->fullName = $fullName;
                $driverNew->address = $address;
                $driverNew->phone = $phone;
                $driverNew->note = $note;
                $driverNew->licenseDriverType = $driverType;
                $driverNew->governmentId = $governmentId;
                $driverNew->birthday = $birthdayDate;
                $driverNew->issueDate_governmentId = $issueDateIdDate;
                $driverNew->issueDate_licenseDriver = $issueDateDriverDate;
                $driverNew->expireDate = $expireDateDriverDate;
                $driverNew->createdBy = $createdBy;
                $driverNew->updatedBy = $updatedBy;
                if (!$driverNew->save()) {
                    return response()->json(['msg' => 'Create failed'], 404);

                }
                $dataAddDriver = \DB::table('drivers')
                    ->select(
                        'drivers.*',
                        'drivers.licenseDriverType as driverType',
                        'drivers.issueDate_licenseDriver as issueDate_driver',
                        'vehicles.areaCode',
                        'vehicles.vehicleNumber',
                        'vehicleTypes.name as vehicle_types',
                        'garages.name as garage',
                        'garageTypes.name as garageTypes'
                    )
                    ->leftJoin('driverVehicles', 'drivers.id', '=', 'driverVehicles.driver_id')
                    ->leftJoin('vehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
                    ->leftJoin('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                    ->leftJoin('garages', 'vehicles.garage_id', '=', 'garages.id')
                    ->leftJoin('garageTypes', 'garages.garageType_id', '=', 'garageTypes.id')
                    ->where('drivers.active', 1)
                    ->where('drivers.id', $driverNew->id)
                    ->first();
                $response = [
                    'msg'         => 'Get list all Driver',
                    'dataAddDriver' =>$dataAddDriver
                ];
                return response()->json($response, 201);

                break;
            case 'update':
                $driverUpdate = Driver::findOrFail($request->input('_object')['id']);
                $driverUpdate->fullName = $fullName;
                $driverUpdate->address = $address;
                $driverUpdate->phone = $phone;
                $driverUpdate->note = $note;
                $driverUpdate->licenseDriverType = $driverType;
                $driverUpdate->governmentId = $governmentId;
                $driverUpdate->birthday = $birthdayDate;
                $driverUpdate->issueDate_governmentId = $issueDateIdDate;
                $driverUpdate->issueDate_licenseDriver = $issueDateDriverDate;
                $driverUpdate->expireDate = $expireDateDriverDate;
                $driverUpdate->updatedBy = $updatedBy;
                if (!$driverUpdate->update()) {
                    return response()->json(['msg' => 'Update failed'], 404);
                }
                $dataUpdateDriver = \DB::table('drivers')
                    ->select(
                        'drivers.*',
                        'drivers.licenseDriverType as driverType',
                        'drivers.issueDate_licenseDriver as issueDate_driver',
                        'vehicles.areaCode',
                        'vehicles.vehicleNumber',
                        'vehicleTypes.name as vehicle_types',
                        'garages.name as garage',
                        'garageTypes.name as garageTypes'
                    )
                    ->leftJoin('driverVehicles', 'drivers.id', '=', 'driverVehicles.driver_id')
                    ->leftJoin('vehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
                    ->leftJoin('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                    ->leftJoin('garages', 'vehicles.garage_id', '=', 'garages.id')
                    ->leftJoin('garageTypes', 'garages.garageType_id', '=', 'garageTypes.id')
                    ->where('drivers.active', 1)
                    ->where('drivers.id', $request->input('_object')['id'])
                    ->first();
                $response = [
                    'msg'         => 'Get list all Driver',
                    'dataUpdateDriver' =>$dataUpdateDriver
                ];
                return response()->json($response, 201);
                break;
            case 'delete':
                $driverDelete = Driver::findOrFail($request->input('_id'));
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
