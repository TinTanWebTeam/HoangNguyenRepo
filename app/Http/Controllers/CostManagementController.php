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

    public function getDataVehicle()
    {
        $tableVehicle = DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->where('vehicles.active', 1)
            ->select('vehicles.*', 'vehicleTypes.name as vehicleType')
            ->get();
        $response = [
            'tableVehicle' => $tableVehicle
        ];
        return response()->json($response, 200);


    }

    public function getDataFuelCost()
    {
        $tableCostPrice = CostPrice::all();
        $tablePrice = DB::table('prices')
            ->select('prices.id', 'prices.price')
            ->orderBy('prices.created_at', 'desc')
            ->where('costPrice_id', 2)
            ->first();
        $tableCost = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
            ->where('costs.active', 1)
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
            'msg'            => 'Get data cost success',
            'tableCost'      => $tableCost,
            'tablePrice'     => $tablePrice,
            'tableCostPrice' => $tableCostPrice,

        ];
        return response()->json($response, 200);

    }

    public function getDataGarageAndVehicle()
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
            'msg'              => 'Get data cost success',
            'tableGarage'      => $tableGarage,
            'tableVehicleType' => $tableVehicleType,
            'tableVehicleNew'  => $tableVehicleNew,
        ];
        return response()->json($response, 200);
    }


    public function postModifyFuelCost(Request $request)
    {
        $prices_price = null;
        $literNumber = null;
        $vehicle = null;
        $totalCost = null;
        $datetime = null;
        $note = null;
        $action = $request->get('_action');

        if ($action != 'delete') {
            $validator = ValidateController::ValidateCost($request->input('_object'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $prices_price = $request->get('_object')['prices_price'];
            $prices_id = $request->get('_object')['prices_id'];
            $literNumber = $request->get('_object')['literNumber'];
            $vehicle = $request->get('_object')['vehicle_id'];
            $totalCost = $literNumber * $prices_price;
            $datetime = Carbon::createFromFormat('d/m/Y H:i', $request->get('_object')['datetime'])->toDateTimeString();
            $noted = $request->get('_object')['noted'];

        }


        switch ($action) {
            case "add":
                $fuelCostsNew = new Cost();
                $fuelCostsNew->cost = $totalCost;
                $fuelCostsNew->literNumber = $literNumber;
                $fuelCostsNew->dateRefuel = $datetime;
                $fuelCostsNew->createdBy = Auth::user()->id;
                $fuelCostsNew->updatedBy = Auth::user()->id;
                $fuelCostsNew->note = $noted;
                $fuelCostsNew->price_id = $prices_id;
                $fuelCostsNew->vehicle_id = $vehicle;

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
                        'msg'       => 'Created vehicle',
                        'tableCost' => $costs
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case "update":

                $fuelCostsUpdate = Cost::findOrFail($request->get('_object')['id']);
                $fuelCostsUpdate->literNumber = $literNumber;
                $fuelCostsUpdate->cost = $totalCost;
                $fuelCostsUpdate->dateRefuel = $datetime;
                $fuelCostsUpdate->note = $noted;
                $fuelCostsUpdate->vehicle_id = $vehicle;
                $fuelCostsUpdate->price_id = $prices_id;
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
                        'msg'       => 'Updated Cost',
                        'tableCost' => $tableCost
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case "delete":
                $costDelete = Cost::findOrFail($request->get('_object')['id']);
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

    public function postModifyPriceType(Request $request)
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
                $pricesNew = new Price();
                $pricesNew->price = $price;
                $pricesNew->note = $note;
                $pricesNew->costPrice_id = 2;
                $pricesNew->createdBy = Auth::user()->id;
                if ($pricesNew->save()) {
                    $response = [
                        'msg'    => 'Created price',
                        'prices' => $pricesNew

                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }

    }

    public function postModifyVehicleAndGarage(Request $request)
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
                $vehicleNew = new Vehicle();
                $vehicleNew->areaCode = $areaCode;
                $vehicleNew->vehicleNumber = $vehicleNumber;
                $vehicleNew->size = $size;
                $vehicleNew->weight = $weight;
                $vehicleNew->vehicleType_id = $vehicleType_id;
                $vehicleNew->garage_id = $garage_id;
//                $vehicleNew->createdBy = Auth::user()->id;
//                $vehicleNew->updated_at = Auth::user()->id;
                if ($vehicleNew->save()) {
                    $response = [
                        'msg'        => 'Created price',
                        'vehicleNew' => $vehicleNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
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
        $petroleumCosts = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
            ->where('costs.active', 1)
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
            'msg'            => 'Get data cost success',
            'petroleumCosts' => $petroleumCosts,

        ];
        return response()->json($response, 200);

    }


    public function getViewParkingCost()
    {
        return view('subviews.Cost.ParkingCost');
    }

    public function getDataParkingCost()
    {
        $parkingCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->where('prices.costPrice_id', '=', '3')
            ->get();
        return $parkingCosts;
    }


    public function getViewOtherCost()
    {
        return view('subviews.Cost.OtherCost');
    }

    public function getDataOtherCost()
    {
        $otherCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->where('prices.costPrice_id', '=', '4')
            ->get();
        return $otherCosts;
    }
}
