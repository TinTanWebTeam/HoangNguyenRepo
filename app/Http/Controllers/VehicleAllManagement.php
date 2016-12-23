<?php

namespace App\Http\Controllers;

use App\Status;
use App\Transport;
use App\Vehicle;
use Illuminate\Http\Request;

use App\Http\Requests;
use League\Flysystem\Exception;

class VehicleAllManagement extends Controller
{
    public function getViewVehicleAll()
    {
        return view('subviews.Vehicle.VehicleAllManagement');
    }

    public function getDataVehicleAll()
    {
        $allVehicles = \DB::table('vehicles')
            ->leftJoin('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->leftJoin('statuses', 'vehicles.status_id', '=', 'statuses.id')
            ->where('vehicles.active', 1)
            ->select('vehicles.*'
                , 'garages.name as garagesName'
                , 'statuses.status'
            )
            ->get();

        $statuses = Status::where('tableName', 'vehicles')->get();
        $response = [
            'msg' => 'Get data vehicles success',
            'dataAllVehicle' => $allVehicles,
            'dataStatus' => $statuses,
        ];
        return response()->json($response, 200);

//        try {
//
//        } catch (\Exception $ex) {
//            return $ex;
//
//        }
    }

    public function postDataVehicleAll(Request $request)
    {
        $idVehicle = null;
        $status_id = null;
        $note = null;
        $action = $request->input('_action');
        if ($action) {
            $idVehicle = $request->input('_object')['idVehicle'];
            $status_id = $request->input('_object')['status_id'];
            $note = $request->input('_object')['note'];
        }
        switch ($action) {
            case 'updateStatusVehicle':
                $updateStatusVehicle = Vehicle::findOrFail($idVehicle);
                $updateStatusVehicle->status_id = $status_id;
                $updateStatusVehicle->note = $note;
                if ($updateStatusVehicle->update()) {
                    $vehicles = \DB::table('vehicles')
                        ->leftJoin('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->leftJoin('statuses', 'vehicles.status_id', '=', 'statuses.id')
                        ->where('vehicles.active', 1)
                        ->where('vehicles.id', $updateStatusVehicle->id)
                        ->select('vehicles.*'
                            , 'garages.name as garagesName'
                            , 'statuses.status'
                        )
                        ->first();
                    $response = [
                        'msg' => 'Updated status vehicles',
                        'vehicles' => $vehicles,
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


}
