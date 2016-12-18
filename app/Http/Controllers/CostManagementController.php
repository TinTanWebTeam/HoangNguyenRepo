<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostPrice;
use App\Garage;
use App\Price;
use App\Vehicle;
use App\VehicleType;
use Auth;
use Carbon\Carbon;
use DateTime;
use DB;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class CostManagementController extends Controller
{
    public function getViewFuelCost()
    {
        return view('subviews.Cost.FuelCost');
    }

    public function getListDataOptionGarageAndVehicle()
    {
        $tableVehicleType = VehicleType::all();
        $tableVehicleNew = DB::table('vehicles')
            ->where('active', 1)
            ->select('id', 'areaCode', 'vehicleNumber')
            ->orderBy('created_at', 'Desc')
            ->first();
        $tableGarage = DB::table('garages')
            ->where('active', 1)
            ->select('id', 'name')
            ->get();

        $response = [
            'msg' => 'Get data cost success',
            'tableGarage' => $tableGarage,
            'tableVehicleType' => $tableVehicleType,
            'tableVehicleNew' => $tableVehicleNew,

        ];
        return response()->json($response, 200);
    }

    public function getDataFuelCost()
    {
        $tableCostPrice = CostPrice::all();
        $tableVehicle = Vehicle::all();
        $tablePrice = DB::table('prices')
            ->select('prices.id', 'prices.price')
            ->orderBy('prices.created_at', 'desc')
            ->where('costPrice_id', 2)
            ->first();
        $tableCost = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
            ->where([
                ['costs.active', 1],
                ['prices.costPrice_id', 2],
                ['costs.transport_id', null]
            ])
            ->select(
                'prices.price as prices_price',
                'costs.*',
                'costs.note as noteCost',
                'costs.cost as totalCost',
                'vehicles.areaCode as vehicles_code',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'vehicles.note as vehicleNote')
            ->get();
        $dataAllVehicle = DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->leftJoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
            ->leftJoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
            ->where([
                ['driverVehicles.active', 1],
                ['vehicles.active', 1],
                ['driverVehicles.driver_id', '!=', 0]
            ])
            ->select('vehicles.id'
                , DB::raw("CONCAT(vehicles.areaCode,'-',vehicles.vehicleNumber)  AS fullNumber")
                , 'vehicleTypes.name'
                , 'drivers.fullName')
            ->get();

        $response = [
            'msg' => 'Get data cost success',
            'tableCost' => $tableCost,
            'tablePrice' => $tablePrice,
            'tableCostPrice' => $tableCostPrice,
            'dataVehicle' => $tableVehicle,
            'dataAllVehicle' => $dataAllVehicle,

        ];
        return response()->json($response, 200);

    }

    public function postModifyFuelCost(Request $request)
    {

        $prices_price = null;
        $literNumber = null;
        $vehicle_id = null;
        $totalCost = null;
        $datetime = null;
        $note = null;
        $vat = null;
        $hasVat = null;
        $notVat = null;
        $action = $request->get('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCost($request->input('_object'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }
            $prices_price = str_replace(',', '', $request->get('_object')['prices_price']);
            $prices_id = $request->get('_object')['prices_id'];
            $literNumber = $request->get('_object')['literNumber'];
            $vehicle_id = $request->get('_object')['vehicle_id'];
            $dateFuel = $request->get('_object')['dateFuel'];
            $timeFuel = $request->get('_object')['timeFuel'];
            $vat = $request->get('_object')['vat'];
            $hasVat = $literNumber * $prices_price;
            $notVat = $hasVat / 1.1;
            $totalCost = $hasVat - ($notVat * ($vat / 100));
            if (Carbon::createFromFormat('d-m-Y H:i', $dateFuel . " " . $timeFuel) !== false) {
                $datetime = Carbon::createFromFormat('d-m-Y H:i', $dateFuel . " " . $timeFuel)->toDateTimeString();
            } else {
                return response()->json(['msg' => 'date invalid'], 207);
            }
            $noted = $request->get('_object')['noted'];

        }

        switch ($action) {
            case "add":
                try {
                    $fuelCostsNew = new Cost();
                    $fuelCostsNew->cost = $totalCost;
                    $fuelCostsNew->hasVat = $hasVat;
                    $fuelCostsNew->literNumber = $literNumber;
                    $fuelCostsNew->dateRefuel = $datetime;
                    $fuelCostsNew->createdBy = Auth::user()->id;
                    $fuelCostsNew->updatedBy = Auth::user()->id;
                    $fuelCostsNew->note = $noted;
                    $fuelCostsNew->price_id = $prices_id;
                    $fuelCostsNew->vehicle_id = $vehicle_id;
                    $fuelCostsNew->vat = $vat;
                    if ($fuelCostsNew->save()) {
                        $costs = \DB::table('costs')
                            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                            ->join('prices', 'prices.id', '=', 'costs.price_id')
                            ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                            ->where('costs.active', 1)
                            ->where('costs.id', $fuelCostsNew->id)
                            ->where('prices.costPrice_id', 2)
                            ->select(
                                'prices.price as prices_price',
                                'costs.*',
                                'costs.note as noteCost ',
                                'costs.cost as totalCost',
                                'vehicles.areaCode as vehicles_code',
                                'vehicles.vehicleNumber as vehicles_vehicleNumber')
                            ->get();
                        $response = [
                            'msg' => 'Created vehicle',
                            'tableCost' => $costs
                        ];
                        return response()->json($response, 201);
                    }
                    return response()->json(['msg' => 'Create failed'], 404);

                } catch (Exception $ex) {
                    return $ex;
                }
                break;
            case "update":
                try {
                    $fuelCostsUpdate = Cost::findOrFail($request->get('_object')['id']);
                    $fuelCostsUpdate->literNumber = $literNumber;
                    $fuelCostsUpdate->cost = $totalCost;
                    $fuelCostsUpdate->hasVat = $hasVat;
                    $fuelCostsUpdate->dateRefuel = $datetime;
                    $fuelCostsUpdate->note = $noted;
                    $fuelCostsUpdate->vehicle_id = $vehicle_id;
                    $fuelCostsUpdate->price_id = $prices_id;
                    $fuelCostsUpdate->vat = $vat;
                    $fuelCostsUpdate->updatedBy = Auth::user()->id;
                    if ($fuelCostsUpdate->update()) {

                        $tableCost = \DB::table('costs')
                            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                            ->join('prices', 'prices.id', '=', 'costs.price_id')
                            ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                            ->where('costs.active', 1)
                            ->where('costs.id', $request->get('_object')['id'])
                            ->where('prices.costPrice_id', 2)
                            ->select(
                                'prices.price as prices_price',
                                'costs.*',
                                'costs.note as noteCost',
                                'costs.cost as totalCost',
                                'vehicles.areaCode as vehicles_code',
                                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                                'vehicles.note as vehicleNote')
                            ->get();

                        $response = [
                            'msg' => 'Updated Cost',
                            'tableCost' => $tableCost
                        ];
                        return response()->json($response, 201);
                    }
                    return response()->json(['msg' => 'Update failed'], 404);
                } catch (Exception $ex) {

                    return $ex;
                }
                break;
            case "delete":
                $costDelete = Cost::findOrFail($request->get('_object'));
                $costDelete->active = 0;
                if ($costDelete->update()) {
                    $response = [
                        'msg' => 'Deleted cost'
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

    public function postModifyPriceNew(Request $request)
    {
        $action = $request->get('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCostPrice($request->get('_priceType'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }
            $price = $request->get('_priceType')['price'];
            $note = $request->get('_priceType')['note'];
        }
        switch ($action) {
            case "addFuelCost":
                try {
                    $pricesNew = new Price();
                    $pricesNew->price = $price;
                    $pricesNew->note = $note;
                    $pricesNew->costPrice_id = 2;
                    $pricesNew->createdBy = Auth::user()->id;
                    if ($pricesNew->save()) {
                        $response = [
                            'msg' => 'Created price fuel',
                            'price' => $pricesNew

                        ];
                        return response()->json($response, 201);
                    }
                    return response()->json(['msg' => 'Create failed'], 404);
                } catch (Exception $ex) {
                    return $ex;
                }

                break;
            case "addPetroleum":
                try {
                    $pricesNew = new Price();
                    $pricesNew->price = $price;
                    $pricesNew->note = $note;
                    $pricesNew->costPrice_id = 3;
                    $pricesNew->createdBy = Auth::user()->id;
                    if ($pricesNew->save()) {
                        $response = [
                            'msg' => 'Created price petroleum',
                            'prices' => $pricesNew

                        ];
                        return response()->json($response, 201);
                    }
                    return response()->json(['msg' => 'Create failed'], 404);
                } catch (Exception $ex) {
                    return $ex;
                }

                break;
            case "addParkingCost":
                try {
                    $pricesNew = new Price();
                    $pricesNew->price = $price;
                    $pricesNew->note = $note;
                    $pricesNew->vehicleType_id = $request->get('_priceType')['vehicleType'];;
                    $pricesNew->costPrice_id = 4;
                    $pricesNew->createdBy = Auth::user()->id;
                    if ($pricesNew->save()) {
                        $response = [
                            'msg' => 'Created Price Parking',
                            'prices' => $pricesNew

                        ];
                        return response()->json($response, 201);
                    }
                    return response()->json(['msg' => 'Create failed'], 404);
                } catch (Exception $ex) {
                    return $ex;
                }

                break;

            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }

    }

    public function postModifyVehicleNew(Request $request)
    {
        $action = $request->get('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCostVehicle($request->get('_vehicles'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }
            $vehicleNumber = $request->get('_vehicles')['vehicleNumber'];
            $areaCode = $request->get('_vehicles')['areaCode'];
            $size = $request->get('_vehicles')['size'];
            $weight = $request->get('_vehicles')['weight'];
            $vehicleType_id = $request->get('_vehicles')['vehicleType_id'];
            $garage_id = $request->get('_vehicles')['garage_id'];
        }

        switch ($action) {
            case "addVehicles":
                try {
                    $vehicleNew = new Vehicle();
                    $vehicleNew->areaCode = $areaCode;
                    $vehicleNew->vehicleNumber = $vehicleNumber;
                    $vehicleNew->size = $size;
                    $vehicleNew->weight = $weight;
                    $vehicleNew->vehicleType_id = $vehicleType_id;
                    $vehicleNew->garage_id = $garage_id;
                    if ($vehicleNew->save()) {
                        $response = [
                            'msg' => 'Created price',
                            'vehicleNew' => $vehicleNew
                        ];
                        return response()->json($response, 201);
                    }
                    return response()->json(['msg' => 'Create failed'], 404);
                } catch (Exception $ex) {
                    return $ex;
                }

                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }


    }


    public function getViewPetroleumCost()
    {

        return view('subviews.Cost.PetroleumCost');
    }

    public function getDataPetroleumCost()
    {
        $tableVehicle = Vehicle::all();
        $tablePrice = DB::table('prices')
            ->select('prices.id', 'prices.price')
            ->orderBy('prices.created_at', 'desc')
            ->where('costPrice_id', 3)
            ->first();
        $petroleumCost = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
            ->where([
                ['costs.active', 1],
                ['prices.costPrice_id', 3],
                ['costs.transport_id', null]
            ])
            ->select(
                'prices.price as prices_price',
                'costs.*',
                'costs.note as noteCost',
                'costs.cost as totalCost',
                'vehicles.areaCode as vehicles_code',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'vehicles.note as vehicleNote')
            ->get();
        $dataAllVehicle = DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->leftJoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
            ->leftJoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
            ->where([
                ['driverVehicles.active', 1],
                ['vehicles.active', 1],
                ['driverVehicles.driver_id', '!=', 0]
            ])
            ->select('vehicles.id'
                , DB::raw("CONCAT(vehicles.areaCode,'-',vehicles.vehicleNumber)  AS fullNumber")
                , 'vehicleTypes.name'
                , 'drivers.fullName')
            ->get();
        $response = [
            'msg' => 'Get data cost success',
            'petroleumCost' => $petroleumCost,
            'tablePrice' => $tablePrice,
            'dataVehicle' => $tableVehicle,
            'dataAllVehicle' => $dataAllVehicle

        ];
        return response()->json($response, 200);

    }


    public function postModifyPetroleum(Request $request)
    {
        $prices_price = null;
        $literNumber = null;
        $totalCost = null;
        $datetime = null;
        $note = null;
        $vehicle_id = null;
        $vat = null;
        $hasVat = null;
        $notVat = null;
        $action = $request->get('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidatePetroleum($request->get('_object'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $prices_price = str_replace(',', '', $request->get('_object')['prices_price']);
            $prices_id = $request->get('_object')['prices_id'];
            $literNumber = $request->get('_object')['literNumber'];
            $vehicle_id = $request->get('_object')['vehicle_id'];
            $dateFuel = $request->get('_object')['dateFuel'];
            $timeFuel = $request->get('_object')['timeFuel'];
            $vat = $request->get('_object')['vat'];
            $hasVat = $literNumber * $prices_price;
            $notVat = $hasVat / 1.1;
            $totalCost = $hasVat - ($notVat * ($vat / 100));
            $datetime = Carbon::createFromFormat('d-m-Y H:i', $dateFuel . " " . $timeFuel)->toDateTimeString();
            $noted = $request->get('_object')['noted'];
        }

        switch ($action) {
            case "add":
                $petroleumNew = new Cost();
                $petroleumNew->cost = $totalCost;
                $petroleumNew->vat = $vat;
                $petroleumNew->hasVat = $hasVat;
                $petroleumNew->literNumber = $literNumber;
                $petroleumNew->dateRefuel = $datetime;
                $petroleumNew->createdBy = Auth::user()->id;
                $petroleumNew->updatedBy = Auth::user()->id;
                $petroleumNew->note = $noted;
                $petroleumNew->price_id = $prices_id;
                $petroleumNew->vehicle_id = $vehicle_id;

                if ($petroleumNew->save()) {
                    $tablePetrolNew = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->join('prices', 'prices.id', '=', 'costs.price_id')
                        ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                        ->where('costs.active', 1)
                        ->where('costs.id', $petroleumNew->id)
                        ->where('prices.costPrice_id', 3)
                        ->select(
                            'prices.price as prices_price',
                            'costs.*',
                            'costs.note as noteCost ',
                            'costs.cost as totalCost',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber')
                        ->get();

                    $response = [
                        'msg' => 'Created vehicle',
                        'tablePetrolNew' => $tablePetrolNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case "update":
                $petroleumUpdate = Cost::findOrFail($request->get('_object')['id']);
                $petroleumUpdate->literNumber = $literNumber;
                $petroleumUpdate->cost = $totalCost;
                $petroleumUpdate->vat = $vat;
                $petroleumUpdate->hasVat = $hasVat;
                $petroleumUpdate->dateRefuel = $datetime;
                $petroleumUpdate->note = $noted;
                $petroleumUpdate->vehicle_id = $vehicle_id;
                $petroleumUpdate->price_id = $prices_id;
                $petroleumUpdate->updatedBy = Auth::user()->id;

                if ($petroleumUpdate->update()) {
                    $tablePetrolUpdate = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->join('prices', 'prices.id', '=', 'costs.price_id')
                        ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                        ->where('costs.active', 1)
                        ->where('costs.id', $request->get('_object')['id'])
                        ->where('prices.costPrice_id', 3)
                        ->select(
                            'prices.price as prices_price',
                            'costs.*',
                            'costs.note as noteCost',
                            'costs.cost as totalCost',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'vehicles.note as vehicleNote')
                        ->get();

                    $response = [
                        'msg' => 'Updated Cost',
                        'tablePetrolUpdate' => $tablePetrolUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case "delete":
                $PetroDelete = Cost::findOrFail($request->get('_object'));
                $PetroDelete->active = 0;
                if ($PetroDelete->update()) {
                    $response = [
                        'msg' => 'Deleted Petroleum'
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


    public function getViewParkingCost()
    {
        return view('subviews.Cost.ParkingCost');
    }

    public function getDataParkingCost()
    {
        $tableVehicle = DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->select('vehicles.id as idVehicle'
                ,'vehicleTypes.id as idVehicleType'
                ,'vehicleTypes.name as nameVehicleType')
            ->get();
        $tablePrice = DB::table('prices')
            ->where('costPrice_id', 4)
            ->orderBy('prices.created_at', 'desc')
            ->get();
        $parkingCosts = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
            ->where([
                ['costs.active', 1],
                ['prices.costPrice_id', 4],
                ['costs.transport_id', null]
            ])
            ->select(
                'prices.price as prices_price',
                'costs.*',
                'costs.cost as totalCost',
                'vehicles.areaCode as vehicles_code',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'vehicles.note as vehicleNote',
                'vehicleTypes.name as vehicleType'
            )
            ->get();
        $vehicleType = VehicleType::all();
        $dataAllVehicle = DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->leftJoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
            ->leftJoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
            ->where([
                ['driverVehicles.active', 1],
                ['vehicles.active', 1],
                ['driverVehicles.driver_id', '!=', 0]
            ])
            ->select('vehicles.id'
                , DB::raw("CONCAT(vehicles.areaCode,'-',vehicles.vehicleNumber)  AS fullNumber")
                , 'vehicleTypes.name'
                , 'drivers.fullName', 'vehicles.vehicleType_id')
            ->get();
        $response = [
            'msg' => 'Get data ParkingCost success',
            'tableParkingCost' => $parkingCosts,
            'tablePrice' => $tablePrice,
            'dataVehicle' => $tableVehicle,
            'dataVehicleType' => $vehicleType,
            'dataAllVehicle' => $dataAllVehicle,

        ];
        return response()->json($response, 200);
    }

    public function postModifyParkingCost(Request $request)
    {
dd($request->all());
        $vehicle_id = null;
        $checkIn = null;
        $checkOut = null;
        $totalCost = null;
        $note = null;
        $prices_id = null;
        $dayIn = null;
        $dayOut = null;
        $totalDay = null;
        $timeIn = null;
        $timeOut = null;
        $action = $request->get('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateParkingCost($request->get('_object'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }
            $vehicle_id = $request->get('_object')['vehicle_id'];
            $note = $request->get('_object')['note'];
            $prices_id = $request->get('_object')['prices_id'];
            $dateIn = $request->get('_object')['dateCheckIn'];
            $timeIn = $request->get('_object')['timeCheckIn'];
            $checkIn = Carbon::createFromFormat('d-m-Y H:i', $dateIn . " " . $timeIn)->toDateTimeString();
            $dateOut = $request->get('_object')['dateCheckOut'];
            $timeOut = $request->get('_object')['timeCheckOut'];
            if ($dateOut == '' && $timeOut == '') {
                $checkOut = null;
                $totalDate = 0;
                $totalHour = 0;
                $totalCost = 0;
            } else {
                $checkOut = Carbon::createFromFormat('d-m-Y H:i', $dateOut . " " . $timeOut)->toDateTimeString();
                $totalDate = $request->get('_object')['totalDate'];
                $totalHour = $request->get('_object')['totalTime'];
                $price = str_replace(',', '', $request->get('_object')['prices_price']);
                $totalCost = $price * $totalHour;
            }
        }


        switch ($action) {
            case "add":
                $parkingCostNew = new Cost();
                $parkingCostNew->cost = $totalCost;
                $parkingCostNew->dateCheckIn = $checkIn;
                $parkingCostNew->dateCheckOut = $checkOut;
                $parkingCostNew->totalDate = $totalDate;
                $parkingCostNew->totalHour = $totalHour;
                $parkingCostNew->note = $note;
                $parkingCostNew->price_id = $prices_id;
                $parkingCostNew->vehicle_id = $vehicle_id;
                $parkingCostNew->createdBy = Auth::user()->id;
                $parkingCostNew->updatedBy = Auth::user()->id;

                if ($parkingCostNew->save()) {
                    $tableParkingNew = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('prices', 'prices.id', '=', 'costs.price_id')
                        ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                        ->where('costs.active', 1)
                        ->where('costs.id', $parkingCostNew->id)
                        ->where('prices.costPrice_id', 4)
                        ->select(
                            'prices.price as prices_price',
                            'costs.*',
                            'costs.cost as totalCost',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'vehicleTypes.name as vehicleType'
                        )
                        ->get();

                    $response = [
                        'msg' => 'Created Parking Cost',
                        'tableParkingNew' => $tableParkingNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case "update":

                $parkingUpdate = Cost::findOrFail($request->get('_object')['id']);
                $parkingUpdate->cost = $totalCost;
                $parkingUpdate->dateCheckIn = $checkIn;
                $parkingUpdate->dateCheckOut = $checkOut;
                $parkingUpdate->totalDate = $totalDate;
                $parkingUpdate->totalHour = $totalHour;
                $parkingUpdate->note = $note;
                $parkingUpdate->price_id = $prices_id;
                $parkingUpdate->vehicle_id = $vehicle_id;
                $parkingUpdate->updatedBy = Auth::user()->id;
                if ($parkingUpdate->update()) {
                    $tableParkingUpdate = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('prices', 'prices.id', '=', 'costs.price_id')
                        ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                        ->where('costs.active', 1)
                        ->where('costs.id', $request->get('_object')['id'])
                        ->where('prices.costPrice_id', 4)
                        ->select(
                            'prices.price as prices_price',
                            'costs.*',
                            'costs.cost as totalCost',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'vehicles.note as vehicleNote', 'vehicleTypes.name as vehicleType'
                        )
                        ->get();

                    $response = [
                        'msg' => 'Updated Parking Cost',
                        'tableParkingUpdate' => $tableParkingUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case "delete":
                $parkingDelete = Cost::findOrFail($request->get('_object'));
                $parkingDelete->active = 0;
                if ($parkingDelete->update()) {
                    $response = [
                        'msg' => 'Deleted Parking Cost'
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


    public function getViewOtherCost()
    {
        return view('subviews.Cost.OtherCost');
    }

    public function getDataOtherCost()
    {
        $tableVehicle = Vehicle::all();
        $otherCost = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->where([
                ['costs.active', 1],
                ['costs.price_id', 0],
                ['costs.transport_id', null]
            ])
            ->select(
                'costs.*',
                'vehicles.areaCode as vehicles_code',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'vehicles.note as vehicleNote')
            ->get();
        $dataAllVehicle = DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->leftJoin('driverVehicles', 'driverVehicles.vehicle_id', '=', 'vehicles.id')
            ->leftJoin('drivers', 'driverVehicles.driver_id', '=', 'drivers.id')
            ->where([
                ['driverVehicles.active', 1],
                ['vehicles.active', 1],
                ['driverVehicles.driver_id', '!=', 0]
            ])
            ->select('vehicles.id'
                , DB::raw("CONCAT(vehicles.areaCode,'-',vehicles.vehicleNumber)  AS fullNumber")
                , 'vehicleTypes.name'
                , 'drivers.fullName')
            ->get();
        $response = [
            'msg' => 'Get data other cost success',
            'tableOtherCost' => $otherCost,
            'dataVehicle' => $tableVehicle,
            'dataAllVehicle' => $dataAllVehicle,


        ];
        return response()->json($response, 200);

    }

    public function postModifyOtherCost(Request $request)
    {

        $cost = null;
        $vehicle_id = null;
        $note = null;
        $action = $request->get('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateOtherCost($request->get('_object'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $vehicle_id = $request->get('_object')['vehicle_id'];
            $note = $request->get('_object')['note'];
            $cost = str_replace(',', '', $request->get('_object')['cost']);

        }


        switch ($action) {
            case "add":
                $otherCostNew = new Cost();
                $otherCostNew->cost = $cost;
                $otherCostNew->note = $note;
                // $otherCostNew->price_id = 1;
                $otherCostNew->vehicle_id = $vehicle_id;
                $otherCostNew->createdBy = Auth::user()->id;
                $otherCostNew->updatedBy = Auth::user()->id;

                if ($otherCostNew->save()) {
                    $tableOtherCostNew = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->where([
                            ['costs.id', $otherCostNew->id],
                            ['costs.active', 1],
                            ['costs.price_id', 0],
                            ['costs.transport_id', null]
                        ])
                        ->select(
                            'costs.*',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'vehicles.note as vehicleNote')
                        ->first();
                    $response = [
                        'msg' => 'Created other Cost',
                        'tableOtherCostNew' => $tableOtherCostNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case "update":
                $otherCostUpdate = Cost::findOrFail($request->get('_object')['id']);
                $otherCostUpdate->cost = $cost;
                $otherCostUpdate->vehicle_id = $vehicle_id;
                $otherCostUpdate->note = $note;
                $otherCostUpdate->updatedBy = Auth::user()->id;
                if ($otherCostUpdate->update()) {
                    $tableOtherUpdate = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->where([
                            ['costs.id', $request->get('_object')['id']],
                            ['costs.active', 1],
                            ['costs.price_id', 0],
                            ['costs.transport_id', null]
                        ])
                        ->select(
                            'costs.*',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'vehicles.note as vehicleNote')
                        ->first();

                    $response = [
                        'msg' => 'Updated Other Cost',
                        'tableOtherUpdate' => $tableOtherUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case "delete":
                $otherDelete = Cost::findOrFail($request->get('_object'));
                $otherDelete->active = 0;
                if ($otherDelete->update()) {
                    $response = [
                        'msg' => 'Deleted other cost'
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
