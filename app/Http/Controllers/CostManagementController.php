<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostPrice;
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
        $tableCost = \DB::table('costs')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->join('costprices','costs.price_id','=','costprices.id')
            ->select('costprices.name','costprices.name as costprice_name ','costs.*','costs.note as noteCost','costs.cost as prices_price','vehicles.areaCode as vehicles_code','vehicles.vehicleNumber as vehicles_vehicleNumber','vehicles.note as vehicleNote')
            ->where('costs.active',1)
            ->orderBy('costs.id')
            ->get();
        $response = [
            'msg' => 'Get data vehicle success',
            'tableCostPrice' => $tableCostPrice,
            'tableCost' => $tableCost
        ];
        return response()->json($response, 200);


    }


    public function postModifyFuelCost(Request $request)
    {
        $action =$request->get('_action');
        $id =$request->get('_id');
        switch ($action) {
            case "add":
                try {
                    $fuelcosts = new Cost();
                    $fuelcosts->name = $request->get('_object')['name'];
                    $fuelcosts->description = $request->get('_object')['description'];
                    if ($fuelcosts->save())
                        return ['status' => 'Ok',
                                'obj'    => $fuelcosts
                        ];
                    else
                        return ['status' => 'Fail'];
                } catch (Exception $ex) {
                    return ['status' => 'Fail'];
                }
                break;
            case "update":
                try {
                    $result = Position::findOrFail();
                    $result->name = $request->get('_object')['name'];
                    $result->description = $request->get('_object')['description'];
                    if ($result->save())
                        return [
                            'status' => 'Ok',
                            'obj'    => $result
                        ];
                    else
                        return ['status' => 'Fail'];
                } catch (Exception $ex) {
                    return ['status' => 'Fail'];
                }
                break;
            case "delete":
                $costDelete = Cost::findOrFail($id);
                $costDelete->active = 0;
                if ($costDelete->update()){
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
