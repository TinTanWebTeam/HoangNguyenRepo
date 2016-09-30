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
        $price = $request->get('_PriceType')['price'];
        $note = $request->get('_PriceType')['note'];

        switch ($action) {
            case "addFuelCost":
                $pricesNew = new Price();
                $pricesNew->price = $price;
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
