<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostPrice;
use App\Price;
use App\Vehicle;
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

    public function getDataFuelCost()
    {
        $tableCostPrice = CostPrice::all();
        $tableVehicle = DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->where('vehicles.active', 1)
            ->select('vehicles.*', 'vehicleTypes.name as vehicleType')
            ->get();
        $tablePrice = DB::table('prices')
            ->select('price')
            ->orderBy('prices.id', 'desc')
            ->where('costPrice_id', 1)
            ->first();
        $tableCost = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->join('costPrices', 'costs.price_id', '=', 'costPrices.id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->where('costs.active', 1)
            ->select(
                'prices.price as prices_price',
                'costPrices.name',
                'costPrices.name as costPrice_name ',
                'costs.*',
                'costs.note as noteCost',
                'costs.cost as totalCost',
                'vehicles.areaCode as vehicles_code',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'vehicles.note as vehicleNote')
            ->orderBy('costs.id', 'desc')
            ->get();

        $response = [
            'msg'            => 'Get data cost success',
            'tableCost'      => $tableCost,
            'tablePrice'     => $tablePrice,
            'tableCostPrice' => $tableCostPrice,
            'tableVehicle'   => $tableVehicle
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
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $prices_price = $request->get('_object')['prices_price'];
            $literNumber = $request->get('_object')['literNumber'];
            $vehicle = $request->get('_object')['vehicle_id'];
            $totalCost = $literNumber * $prices_price;
            $datetime = Carbon::createFromFormat('d/m/Y H:i', $request->get('_object')['datetime'])->toDateTimeString();
            $note = $request->get('_object')['note'];
        }


        switch ($action) {
            case "add":
                $fuelCostsNew = new Cost();
                $fuelCostsNew->cost = $totalCost;
                $fuelCostsNew->literNumber = $literNumber;
                $fuelCostsNew->dateRefuel = $datetime;
                $fuelCostsNew->createdBy = Auth::user()->id;
                $fuelCostsNew->updatedBy = Auth::user()->id;
                $fuelCostsNew->note = $note;
                $fuelCostsNew->vehicle_id = $vehicle;
                $fuelCostsNew->price_id = 1;
                if ($fuelCostsNew->save()) {
                    $costs = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->join('costPrices', 'costs.price_id', '=', 'costPrices.id')
                        ->join('prices', 'costPrices.id', '=', 'prices.costPrice_id')
                        ->where('costs.active', 1)
                        ->where('costs.id', $fuelCostsNew->id)
                        ->select(
                            'prices.price as prices_price ',
                            'costPrices.name',
                            'costPrices.name as costPrice_name ',
                            'costs.*', 'costs.note as noteCost',
                            'costs.cost as totalCost',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'vehicles.note as vehicleNote')
                        ->get();

                    $response = [
                        'msg'   => 'Created vehicle',
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
                $fuelCostsUpdate->daytime = $datetime;
                $fuelCostsUpdate->note = $note;
                $fuelCostsUpdate->vehicle_id = $vehicle;
                $fuelCostsUpdate->price_id = 1;
                $fuelCostsUpdate->updatedBy = Auth::user()->id;

                if ($fuelCostsUpdate->update()) {
                    $tableCost = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->join('costPrices', 'costs.price_id', '=', 'costPrices.id')
                        ->join('prices', 'costPrices.id', '=', 'prices.costPrice_id')
                        ->where('costs.active', 1)
                        ->where('costs.id', $request->get('_object')['id'])
                        ->select(
                            'prices.price as prices_price ',
                            'costPrices.name',
                            'costPrices.name as costPrice_name ',
                            'costs.*', 'costs.note as noteCost',
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
        $price = $request->get('_PriceType')['price'];
        $note = $request->get('_PriceType')['note'];

        switch ($action) {
            case "addFuelCost":
                $pricesNew = new Price();
                $pricesNew->price = $price;
                $pricesNew->costPrice_id = 1;
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
            case "update":
                $fuelCostsUpdate = Cost::findOrFail($request->get('_object')['id']);
                $fuelCostsUpdate->literNumber = $liter;
                $fuelCostsUpdate->cost = $totalCost;
//                $fuelCostsUpdate->daytime = $datetime;
                $fuelCostsUpdate->note = $note;
                $fuelCostsUpdate->price_id = 1;
                $fuelCostsUpdate->updatedBy = Auth::user()->id;
//                $fuelCostsUpdate->vehicle_id = $vehicle;
                if ($fuelCostsUpdate->update()) {
                    $costs = \DB::table('costs')
                        ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
                        ->join('costprices', 'costs.price_id', '=', 'costprices.id')
                        ->join('prices', 'costprices.id', '=', 'prices.costPrice_id')
                        ->where('costs.active', 1)
                        ->where('costs.id', $request->get('_object')['id'])
                        ->select(
                            'prices.price as prices_price ',
                            'costprices.name',
                            'costprices.name as costprice_name ',
                            'costs.*', 'costs.note as noteCost',
                            'costs.cost as totalCost',
                            'vehicles.areaCode as vehicles_code',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'vehicles.note as vehicleNote')
                        ->get();

                    $response = [
                        'msg'       => 'Updated Cost',
                        'tableCost' => $costs
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;

            case "delete":
                $costDelete = Cost::findOrFail($id);
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


    public function getViewPetroleumCost()
    {
        return view('subviews.Cost.PetroleumCost');
    }

    public function getDataPetroleumCost()
    {
        $petroleumCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->where('prices.costPrice_id', '=', '2')
            ->get();
        return $petroleumCosts;
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
