<?php

namespace App\Http\Controllers;

use App\Driver;
use App\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use File as FileSystem;

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
                'drivers.driverLicenseType as driverType',
                'drivers.issueDate_DriverLicense as issueDate_driver',
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
                $driverNew->driverLicenseType = $driverType;
                $driverNew->identityCardNumber = $governmentId;
                $driverNew->birthday = $birthdayDate;
                $driverNew->issueDate_identityCard = $issueDateIdDate;
                $driverNew->issueDate_DriverLicense = $issueDateDriverDate;
                $driverNew->expireDate_DriverLicense = $expireDateDriverDate;
                $driverNew->createdBy = $createdBy;
                $driverNew->updatedBy = $updatedBy;
                if (!$driverNew->save()) {
                    return response()->json(['msg' => 'Create failed'], 404);

                }
                $dataAddDriver = \DB::table('drivers')
                    ->select(
                        'drivers.*',
                        'drivers.driverLicenseType as driverType',
                        'drivers.issueDate_DriverLicense as issueDate_driver',
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
                $driverUpdate->driverLicenseType = $driverType;
                $driverUpdate->identityCardNumber = $governmentId;
                $driverUpdate->birthday = $birthdayDate;
                $driverUpdate->issueDate_identityCard = $issueDateIdDate;
                $driverUpdate->issueDate_DriverLicense = $issueDateDriverDate;
                $driverUpdate->expireDate_DriverLicense = $expireDateDriverDate;
                $driverUpdate->updatedBy = $updatedBy;
                if (!$driverUpdate->update()) {
                    return response()->json(['msg' => 'Update failed'], 404);
                }
                $dataUpdateDriver = \DB::table('drivers')
                    ->select(
                        'drivers.*',
                        'drivers.driverLicenseType as driverType',
                        'drivers.issueDate_DriverLicense as issueDate_driver',
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

    /*
     * File
     * */
    public function postUploadMultiFile(Request $request)
    {
        $id = $request->input('driverId');
        $files = $request->file('file');
        if (empty($files)) {
            return response()->json(['msg' => 'File emplty'], 203);
        }
        foreach ($files as $file) {
            $fileNew = new File();
            $fileNew->fileName = $file->getClientOriginalName();
            $fileNew->fileExtension = $file->getClientOriginalExtension();
            $fileNew->mimeType = $file->getClientMimeType();
            $fileNew->size = $file->getClientSize();
            $fileNew->id_type = ($id == null || $id == "") ? 0 : $id;
            $fileNew->type = 'driver';
            if (!$fileNew->save()) {
                return response()->json(['msg' => 'Add File in database fail!'], 203);
            }
            $fileNew->filePath = "files/driver/" . "driver_" . $fileNew->id . "." . $fileNew->fileExtension;
            if (!$fileNew->save()) {
                return response()->json(['msg' => 'Add File in database fail!'], 203);
            }

//            Storage::put($file->getClientOriginalName(), file_get_contents($file->getRealPath()));
            if (!$file->move('../public/files/driver', $fileNew->filePath)) {
                return response()->json(['msg' => 'Add File in folder fail!'], 203);
            }
        }
        return response()->json(['msg' => 'success'], 201);
    }

    public function postRetrieveMultiFile(Request $request)
    {
        $id = $request->input('_id');

        $files = DB::table('files')
            ->where('files.type', 'driver')
            ->where('files.id_type', $id)
            ->join('drivers', 'drivers.id', '=', 'files.id_type')
            ->select('files.*')
            ->get();
        $response = [
            'msg'   => 'success',
            'files' => $files
        ];
        return response()->json($response, 201);
    }

    public function postDeleteFile(Request $request)
    {
        $fileId = $request->input('_fileId');
        $file = File::findOrFail($fileId);

        if (!FileSystem::delete('../public/' . $file->filePath)) {
            return response()->json(['msg' => 'Delete file in folder fail!'], 203);
        }

        if (!$file->delete()) {
            return response()->json(['msg' => 'Delete File in database fail!'], 203);
        }

        $files = DB::table('files')
            ->where('files.type', 'driver')
            ->where('files.id_type', $file->id_type)
            ->join('drivers', 'drivers.id', '=', 'files.id_type')
            ->select('files.*')
            ->get();
        $response = [
            'msg'   => 'success',
            'files' => $files
        ];
        return response()->json($response, 201);
    }

    public function postDownloadFile(Request $request)
    {
        $fileId = $request->input('_fileId');

        $file = File::find($fileId);

        $pathToFile = public_path() . "/" . $file->filePath;

        $headers = array(
            'Content-Type: '.$file->mimeType,
            'Content-Disposition: attachment; filename="' . $file->fileName . '"',
            'Content-Transfer-Encoding: binary',
            'Accept-Ranges: bytes',
            'Content-Length: '.$file->size
        );

        $name = $file->fileName;

        return response()->download($pathToFile, $name, $headers);

    }
}
