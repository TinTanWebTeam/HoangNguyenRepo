<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CostManagementController extends Controller
{
    public function getViewFuelCost()
    {
        return view('partials.FuelCost');
    }
    public function getDataFuelCost(){
        $fuelCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->where('prices.costPrice_id','=','1')
            ->get();
        return $fuelCosts;
        
    }
    
    
    
    
    public function getViewPetroleumCost()
    {
//        $petroleumCosts = \DB::table('costs')
//            ->join('prices', 'costs.price_id', '=', 'prices.id')
//            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
//            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
//            ->where('prices.costPrice_id','=','2')
//            ->get();
        return view('partials.PetroleumCost');
    }
    public function getDataPetroleumCost(){
        $petroleumCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->where('prices.costPrice_id','=','2')
            ->get();
        return $petroleumCosts;
    }





    public function getViewParkingCost()
    {
        $parkingCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->where('prices.costPrice_id','=','3')
            ->get();
        return view('partials.ParkingCost', ['parkingCosts' => $parkingCosts]);
    }
    public function getViewOtherCost()
    {
        $otherCosts = \DB::table('costs')
            ->join('prices', 'costs.price_id', '=', 'prices.id')
            ->join('vehicles', 'costs.vehicle_id', '=', 'vehicles.id')
            ->select('costs.*', 'prices.price as prices_price', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->where('prices.costPrice_id','=','4')
            ->get();
        return view('partials.OtherCost', ['otherCosts' => $otherCosts]);
    }
}
