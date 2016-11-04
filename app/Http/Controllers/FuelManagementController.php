<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Fuel;
use App\Http\Requests;

class FuelManagementController extends Controller
{
    /*--------------------------------------------------------------------------------*/
    /*---------------------------- OIL MANAGEMENT ------------------------------------*/
    /*--------------------------------------------------------------------------------*/

    /* GET VIEW */
    public function getOilView()
    {
        return view('subviews.Fuel.Oil');
    }

    /* GET VIEW COMPLETE DATA */
    public function getOilViewCompleteData()
    {
        $result = Fuel::where('type','oil')
            ->leftJoin('users as userCreated','fuels.createdBy','=','userCreated.id')
            ->leftJoin('users as userUpdated','fuels.updatedBy','=','userUpdated.id')
            ->select(
                'fuels.id',
                'fuels.type',
                'fuels.price',
                'fuels.note',
                'fuels.applyDate',
                'userCreated.fullName as createdBy',
                'userUpdated.fullName as updatedBy'
            )
            ->get();
        return response()->json($result,201);
    }

    /* ADD NEW OIL PRICE */
    public function addNewOilPrice(Request $request)
    {
        $oilPrice = new Fuel();
        $oilPrice->price = $request->price;
        $oilPrice->note = $request->note;
        $oilPrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y',$request->applyDate);
        $oilPrice->createdBy = Auth::user()->id;
        $oilPrice->updatedBy = Auth::user()->id;
        $oilPrice->type = 'oil';
        try{
            if($oilPrice->save()){
                $result = Fuel::where('type','oil')
                    ->where('fuels.id',$oilPrice->id)
                    ->leftJoin('users as userCreated','fuels.createdBy','=','userCreated.id')
                    ->leftJoin('users as userUpdated','fuels.updatedBy','=','userUpdated.id')
                    ->select(
                        'fuels.id',
                        'fuels.type',
                        'fuels.price',
                        'fuels.note',
                        'fuels.applyDate',
                        'userCreated.fullName as createdBy',
                        'userUpdated.fullName as updatedBy'
                    )
                    ->get();
                return response()->json($result->first(),201);
            }else{
                return response()->json([],500);
            }
        }catch (Exception $ex){
            return response()->json([],500);
        }
    }

    /* UPDATE OIL PRICE */
    public function updateOilPrice(Request $request)
    {
        $oilPrice = Fuel::findOrFail($request->id);
        if($oilPrice){
            $oilPrice->price = $request->price;
            $oilPrice->note = $request->note;
            $oilPrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y',$request->applyDate);
            $oilPrice->updatedBy = Auth::user()->id;
            try{
                if($oilPrice->save()){
                    $result = Fuel::where('type','oil')
                        ->where('fuels.id',$oilPrice->id)
                        ->leftJoin('users as userCreated','fuels.createdBy','=','userCreated.id')
                        ->leftJoin('users as userUpdated','fuels.updatedBy','=','userUpdated.id')
                        ->select(
                            'fuels.id',
                            'fuels.type',
                            'fuels.price',
                            'fuels.note',
                            'fuels.applyDate',
                            'userCreated.fullName as createdBy',
                            'userUpdated.fullName as updatedBy'
                        )
                        ->get();
                    return response()->json($result->first(),201);
                }else{
                    return response()->json(500);
                }
            }catch (Exception $ex){
                return response()->json(500);
            }
        }
        return response()->json(500);
    }

    /*--------------------------------------------------------------------------------*/
    /*-------------------------  LUBE MANAGEMENT -------------------------------------*/
    /*--------------------------------------------------------------------------------*/

    /* GET VIEW */
    public function getLubeView()
    {
        return view('subviews.Fuel.Lube');
    }

    /* GET VIEW COMPLETE DATA */
    public function getLubeViewCompleteData()
    {
        $result = Fuel::where('type','lube')
            ->leftJoin('users as userCreated','fuels.createdBy','=','userCreated.id')
            ->leftJoin('users as userUpdated','fuels.updatedBy','=','userUpdated.id')
            ->select(
                'fuels.id',
                'fuels.type',
                'fuels.price',
                'fuels.note',
                'fuels.applyDate',
                'userCreated.fullName as createdBy',
                'userUpdated.fullName as updatedBy'
            )
            ->get();
        return response()->json($result,201);
    }

    /* ADD NEW LUBE PRICE */
    public function addNewLubePrice(Request $request)
    {
        $lubePrice = new Fuel();
        $lubePrice->price = $request->price;
        $lubePrice->note = $request->note;
        $lubePrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y',$request->applyDate);
        $lubePrice->createdBy = Auth::user()->id;
        $lubePrice->updatedBy = Auth::user()->id;
        $lubePrice->type = 'lube';
        try{
            if($lubePrice->save()){
                $result = Fuel::where('type','lube')
                    ->where('fuels.id',$lubePrice->id)
                    ->leftJoin('users as userCreated','fuels.createdBy','=','userCreated.id')
                    ->leftJoin('users as userUpdated','fuels.updatedBy','=','userUpdated.id')
                    ->select(
                        'fuels.id',
                        'fuels.type',
                        'fuels.price',
                        'fuels.note',
                        'fuels.applyDate',
                        'userCreated.fullName as createdBy',
                        'userUpdated.fullName as updatedBy'
                    )
                    ->get();
                return response()->json($result->first(),201);
            }else{
                return response()->json([],500);
            }
        }catch (Exception $ex){
            return response()->json([],500);
        }
    }
    
    /* UPDATE LUBE PRICE */
    public function updateLubePrice(Request $request)
    {
        $lubePrice = Fuel::findOrFail($request->id);
        if($lubePrice){
            $lubePrice->price = $request->price;
            $lubePrice->note = $request->note;
            $lubePrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y',$request->applyDate);
            $lubePrice->updatedBy = Auth::user()->id;
            try{
                if($lubePrice->save()){
                    $result = Fuel::where('type','lube')
                        ->where('fuels.id',$lubePrice->id)
                        ->leftJoin('users as userCreated','fuels.createdBy','=','userCreated.id')
                        ->leftJoin('users as userUpdated','fuels.updatedBy','=','userUpdated.id')
                        ->select(
                            'fuels.id',
                            'fuels.type',
                            'fuels.price',
                            'fuels.note',
                            'fuels.applyDate',
                            'userCreated.fullName as createdBy',
                            'userUpdated.fullName as updatedBy'
                        )
                        ->get();
                    return response()->json($result->first(),201);
                }else{
                    return response()->json(500);
                }
            }catch (Exception $ex){
                return response()->json(500);
            }
        }
        return response()->json(500);
    }
}
