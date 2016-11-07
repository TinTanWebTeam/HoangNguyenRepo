<?php

namespace App\Http\Controllers;

use App\Driver;
use App\User;
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
        $dataDrivers = \DB::table('driverVehicles')
            ->select(
                'drivers.id',
                'drivers.fullName',
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
            ->where('drivers.active',1)
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
//        if ($action != 'delete') {
//            $validator = ValidateController::ValidateDriver($request->input('_driver'));
//            if ($validator->fails()) {
//                return response()->json(['msg' => 'Input data fail'], 404);
//            }
//
//            $fullName = $request->input('_driver')['fullName'];
//            $address = $request->input('_driver')['address'];
//            $phone = $request->input('_driver')['phone'];
//            $note = $request->input('_driver')['note'];
//            $createdBy = \Auth::user()->id;
//            $updatedBy = \Auth::user()->id;
//        }

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
