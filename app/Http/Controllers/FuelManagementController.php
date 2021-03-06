<?php

namespace App\Http\Controllers;

use Auth;
use Exception;
use Illuminate\Http\Request;
use App\Fuel;
use App\Http\Requests;
use App\Customer;
use App\Formula;
use App\FormulaDetail;
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
                // $oilPrice->save();
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
                $currentApplyDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', substr($currentOilPrice->applyDate, 0, 10) . '00:00:00');
                $input = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', $request->applyDate . '00:00:00');
                
                if ($input->diffInDays($currentApplyDate, false) >= 0) {
                    return response()->json(['Error' => 'Vui lòng chọn ngày áp dụng lớn hơn ngày áp dụng của giá dầu hiện tại!'], 500);
                }
                DB::beginTransaction();
                if ($oilPrice->save()) {
                    /* Check Oil Change Margin Percent */
                    $changePercent = ($oilPrice->price - $currentOilPrice->price) / ($currentOilPrice->price) * 100;
                    // Tính lại
                    $customersToChangePostage = Customer::where('percentOilLimitToChangePostage', '<', abs($changePercent))->get();
                    try {
                        foreach ($customersToChangePostage as $customer) {
                            $postagesToChange = Formula::where('customer_id', $customer->id)->get();
                            foreach ($postagesToChange as $postage) {
                                $formula = new Formula;
                                if ($changePercent < 0) {
                                    $formula->unitPrice = $postage->unitPrice * (1 - abs($changePercent) * $customer->percentOilPerPostage / 10000);
                                    $formula->note = "Giảm cước phí vận chuyển và giao xe do giá dầu giảm từ " . number_format($currentOilPrice->price) . " xuống " . number_format($oilPrice->price);
                                } else {
                                    $formula->unitPrice = $postage->unitPrice * (1 + abs($changePercent) * $customer->percentOilPerPostage / 10000);
                                    $formula->note = "Tăng cước vận chuyển và giao xe do giá dầu tăng từ " . number_format($currentOilPrice->price) . " lên " . number_format($oilPrice->price);
                                }
                                $formula->formulaCode = $postage->formulaCode;
                                $formula->unit_id = $postage->unit_id;
                                $formula->customer_id = $postage->customer_id;
                                $formula->extendData = $postage->extendData;
                                $formula->postageBase = $postage->postageBase;
                                $formula->createdDate = date('Y-m-d');
                                $formula->cashDelivery = $postage->cashDelivery * $formula->unitPrice / $postage->unitPrice;
                                $formula->active = true;
                                $formula->createdBy = Auth::user()->id;
                                $formula->updatedBy = Auth::user()->id;
                                $formula->changeByFuel = true;
                                $formula->fuel_id = $oilPrice->id;
                                $formula->status = 1;
                                $formula->save();

                                $postageDetailToChange = FormulaDetail::where('formula_id', $postage->id)->get();
                                foreach($postageDetailToChange as $postageDetail){
                                    $formulaDetail = new FormulaDetail;
                                    $formulaDetail->formula_id = $formula->id;
                                    $formulaDetail->rule = $postageDetail->rule;
                                    $formulaDetail->name = $postageDetail->name;
                                    if($formulaDetail->rule == 'S'){
                                        $formulaDetail->value = $postageDetail->value;
                                    } else {
                                        $formulaDetail->from = $postageDetail->from;
                                        $formulaDetail->to = $postageDetail->to;
                                    }
                                    $formulaDetail->save();
                                }
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
