<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Fuel;
use App\Http\Requests;
use App\Customer;
use DB;

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
        $result = Fuel::where('type', 'oil')
            ->leftJoin('users as userCreated', 'fuels.createdBy', '=', 'userCreated.id')
            ->leftJoin('users as userUpdated', 'fuels.updatedBy', '=', 'userUpdated.id')
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
        return response()->json($result, 201);
    }

    /* ADD NEW OIL PRICE */
    public function addNewOilPrice(Request $request)
    {
        $oilPrice = new Fuel;
        $oilPrice->price = $request->price;
        $oilPrice->note = $request->note;
        $oilPrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y H:i', $request->applyDate . " " . $request->applyTime);
        $oilPrice->createdBy = Auth::user()->id;
        $oilPrice->updatedBy = Auth::user()->id;
        $oilPrice->type = 'oil';
        try {
            /* Select Max Oil Apply Date */
            $currentOilPrice = Fuel::whereRaw('applyDate = (select max(`applyDate`) from fuels where `type` = \'oil\')')->first();
            if (!$currentOilPrice) {
                $oilPrice->save();
                $result = Fuel::where('type', 'oil')
                    ->where('fuels.id', $oilPrice->id)
                    ->leftJoin('users as userCreated', 'fuels.createdBy', '=', 'userCreated.id')
                    ->leftJoin('users as userUpdated', 'fuels.updatedBy', '=', 'userUpdated.id')
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
                return response()->json($result->first(), 201);
            } else {
                $currentApplyDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $currentOilPrice->applyDate);
                if ($oilPrice->applyDate->diffInDays($currentApplyDate, false) >= 0) {
                    return response()->json(['Error' => 'Vui lòng chọn này áp dụng giá dầu phù hợp!'], 500);
                }
                DB::beginTransaction();
                if ($oilPrice->save()) {
                    /* Check Oil Change Margin Percent */
                    $changePercent = ($oilPrice->price - $currentOilPrice->price) / ($currentOilPrice->price) * 100;
                    $customersToChangePostage = Customer::where('percentOilLimitToChangePostage', '<', abs($changePercent))->get();
                    try {
                        foreach ($customersToChangePostage as $customer) {
                            $postagesToChange = Postage::where('customer_id', $customer->id)->groupBy(['receivePlace', 'deliveryPlace'])->get();
                            foreach ($postagesToChange as $postage) {
                                $postageReference = Postage::where('receivePlace', $postage->receivePlace)
                                    ->where('deliveryPlace', $postage->deliveryPlace)
                                    ->where('customer_id', $customer->id)
                                    ->orderBy('applyDate', 'desc')
                                    ->first();
                                $postageNew = new Postage;
                                if ($changePercent < 0) {
                                    $postageNew->postage = $postageReference->postage * (1 - abs($changePercent) * $customer->percentOilPerPostage / 10000);
                                    $postageNew->note = "Giảm cước phí vận chuyển và giao xe do giá dầu giảm từ " . number_format($currentOilPrice->price) . " xuống " . number_format($oilPrice->price);
                                } else {
                                    $postageNew->postage = $postageReference->postage * (1 + abs($changePercent) * $customer->percentOilPerPostage / 10000);
                                    $postageNew->note = "Tăng cước vận chuyển và giao xe do giá dầu tăng từ " . number_format($currentOilPrice->price) . " lên " . number_format($oilPrice->price);
                                }
                                $postageNew->postageBase = $postageReference->postageBase;
                                $postageNew->createdDate = date('Y-m-d');
                                $postageNew->receivePlace = $postageReference->receivePlace;
                                $postageNew->deliveryPlace = $postageReference->deliveryPlace;
                                $postageNew->cashDelivery = $postageReference->cashDelivery * $postageNew->postage / $postageReference->postage;
                                $postageNew->active = true;
                                $postageNew->createdBy = Auth::user()->id;
                                $postageNew->updatedBy = Auth::user()->id;
                                $postageNew->changeByFuel = true;
                                $postageNew->customer_id = $postageReference->customer_id;
                                $postageNew->fuel_id = $oilPrice->id;
                                $postageNew->save();
                            }
                        }
                        DB::commit();
                    } catch (Exception $ex) {
                        DB::rollBack();
                        return response()->json(['Error' => $ex], 500);
                    }
                    /* Find Customer Match Percent Of OilChange */
                    $result = Fuel::where('type', 'oil')
                        ->where('fuels.id', $oilPrice->id)
                        ->leftJoin('users as userCreated', 'fuels.createdBy', '=', 'userCreated.id')
                        ->leftJoin('users as userUpdated', 'fuels.updatedBy', '=', 'userUpdated.id')
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
                    return response()->json($result->first(), 201);
                } else {
                    return response()->json(['Error' => 'Có lỗi trong quá trình lưu vui lòng xem lại dữ liệu!'], 500);
                }
            }

        } catch (Exception $ex) {
            return response()->json(['Error' => $ex], 500);
        }
    }

    /* UPDATE OIL PRICE */
    public function updateOilPrice(Request $request)
    {
        $oilPrice = Fuel::findOrFail($request->id);
        if ($oilPrice) {
            $oilPrice->price = $request->price;
            $oilPrice->note = $request->note;
            $oilPrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y H:i', $request->applyDate . " " . $request->applyTime);
            $oilPrice->updatedBy = Auth::user()->id;
            try {
                if ($oilPrice->save()) {
                    $result = Fuel::where('type', 'oil')
                        ->where('fuels.id', $oilPrice->id)
                        ->leftJoin('users as userCreated', 'fuels.createdBy', '=', 'userCreated.id')
                        ->leftJoin('users as userUpdated', 'fuels.updatedBy', '=', 'userUpdated.id')
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
                    return response()->json($result->first(), 201);
                } else {
                    return response()->json(['Error' => 'Có lỗi trong quá trình lưu vui lòng xe lại dữ liệu!'], 500);
                }
            } catch (Exception $ex) {
                return response()->json(['Error' => $ex], 500);
            }
        }
        return response()->json(['Error' => 'Có lỗi trong quá trình lưu vui lòng xe lại dữ liệu!'], 500);
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
        $result = Fuel::where('type', 'lube')
            ->leftJoin('users as userCreated', 'fuels.createdBy', '=', 'userCreated.id')
            ->leftJoin('users as userUpdated', 'fuels.updatedBy', '=', 'userUpdated.id')
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
        return response()->json($result, 201);
    }

    /* ADD NEW LUBE PRICE */
    public function addNewLubePrice(Request $request)
    {
        $lubePrice = new Fuel;
        $lubePrice->price = $request->price;
        $lubePrice->note = $request->note;
        $lubePrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y H:i', $request->applyDate . " " . $request->applyTime);
        $lubePrice->createdBy = Auth::user()->id;
        $lubePrice->updatedBy = Auth::user()->id;
        $lubePrice->type = 'lube';
        try {
            if ($lubePrice->save()) {
                $result = Fuel::where('type', 'lube')
                    ->where('fuels.id', $lubePrice->id)
                    ->leftJoin('users as userCreated', 'fuels.createdBy', '=', 'userCreated.id')
                    ->leftJoin('users as userUpdated', 'fuels.updatedBy', '=', 'userUpdated.id')
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
                return response()->json($result->first(), 201);
            } else {
                return response()->json(['Error' => 'Có lỗi trong quá trình lưu vui lòng xe lại dữ liệu!'], 500);
            }
        } catch (Exception $ex) {
            return response()->json(['Error' => $ex], 500);
        }
    }

    /* UPDATE LUBE PRICE */
    public function updateLubePrice(Request $request)
    {
        $lubePrice = Fuel::findOrFail($request->id);
        if ($lubePrice) {
            $lubePrice->price = $request->price;
            $lubePrice->note = $request->note;
            $lubePrice->applyDate = \Carbon\Carbon::createFromFormat('d-m-Y H:i', $request->applyDate . " " . $request->applyTime);
            $lubePrice->updatedBy = Auth::user()->id;
            try {
                if ($lubePrice->save()) {
                    $result = Fuel::where('type', 'lube')
                        ->where('fuels.id', $lubePrice->id)
                        ->leftJoin('users as userCreated', 'fuels.createdBy', '=', 'userCreated.id')
                        ->leftJoin('users as userUpdated', 'fuels.updatedBy', '=', 'userUpdated.id')
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
                    return response()->json($result->first(), 201);
                } else {
                    return response()->json(['Error' => 'Có lỗi trong quá trình lưu vui lòng xe lại dữ liệu!'], 500);
                }
            } catch (Exception $ex) {
                return response()->json(['Error' => $ex], 500);
            }
        }
        return response()->json(['Error' => 'Có lỗi trong quá trình lưu vui lòng xe lại dữ liệu!'], 500);
    }
}
