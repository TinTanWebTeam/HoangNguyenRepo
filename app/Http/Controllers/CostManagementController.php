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
        $costPrice = DB::table('costPrices')->get();
        $vehicles = DB::table('vehicles')->get();
        return view('subviews.Cost.FuelCost', ['costPrices' => $costPrice, 'vehicles' => $vehicles]);
    }

    public function getDataFuelCost()
    {
        $fuelCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'vehicles.areaCode as vehicles_code')
            ->where('prices.costPrice_id', '=', '1')
            ->get();
        return $fuelCosts;

    }

    public function postModifyFuelCost(Request $request)
    {
        switch ($request->get('_action')) {
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
                    $result = Position::findOrFail($request->get('_object')['id']);
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
                $positionDelete = Position::findOrFail($request->get('_object')['id']);
                $positionDelete->active = 0;
                if ($positionDelete->save())
                    return ['status' => 'Ok'];
                return ['status' => 'Fail'];
                break;
            default:
                break;
        }
    }
    public function getViewFuelCostTest(Request $request){
        try {
            $vehicles = DB::table('vehicles')
                ->where('id','=',$request->get('AreaCode'))
                ->select('vehicles.vehicleNumber')
                ->get();
           return $vehicles;
        } catch (Exception $ex) {
            return $ex;
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
