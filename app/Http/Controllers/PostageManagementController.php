<?php

namespace App\Http\Controllers;

use App\CustomerType;
use App\Formula;
use App\FormulaDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;

class PostageManagementController extends Controller
{
    public function getViewPostage()
    {
        return view('subviews.Postage.Postage');
    }

    public function getDataPostage()
    {
        $response = $this->DataPostage();
        return response()->json($response, 200);
    }

    public function postModifyPostage(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }

        $customer_id = null;
        $cashDelivery = null;
        $unitPrice = null;
        $unit_id = null;
        $createdDate = null;
        $applyDate = null;
        $note = null;
        $fuel_id = null;
        $createdBy = null;
        $updatedBy = null;
        $arrayDetail = [];

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidatePostage($request->input('_postage'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $customer_id = $request->input('_postage')['customer_id'];
            $cashDelivery = $request->input('_postage')['cashDelivery'];
            $unitPrice = $request->input('_postage')['unitPrice'];
            $unit_id = $request->input('_postage')['unit_id'];
            $createdDate = $request->input('_postage')['createdDate'];
            $createdDate = Carbon::createFromFormat('d-m-Y', $createdDate);
            $applyDate = $request->input('_postage')['applyDate'];
            $applyDate = Carbon::createFromFormat('d-m-Y', $applyDate);
            $note = $request->input('_postage')['note'];
            $fuel_id = $request->input('_postage')['fuel_id'];
            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
            $arrayDetail = $request->input('_postageDetail');

            // $cashDelivery = $unitPrice * $cashDelivery / 100;
        }

        try {
            DB::beginTransaction();
            switch ($action) {
                case 'add':
                    $postageOld = Formula::where('customer_id', $customer_id)->orderBy('applyDate', 'desc')->first();

                    //Add Formula
                    $postageNew = new Formula;
                    $postageNew->customer_id = $customer_id;
                    $postageNew->cashDelivery = $cashDelivery;
                    $postageNew->unitPrice = $unitPrice;
                    $postageNew->unit_id = $unit_id;
                    $postageNew->createdDate = $createdDate->toDateString();
                    $postageNew->applyDate = $applyDate->toDateString();
                    $postageNew->note = $note;
                    $postageNew->active = 1;
                    $postageNew->createdBy = $createdBy;
                    $postageNew->updatedBy = $updatedBy;
                    $postageNew->fuel_id = $fuel_id;
                    $postageNew->postageBase = 0;
                    $postageNew->changeByFuel = 0;
                    if (!$postageNew->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create Postage failed'], 404);
                    }

                    //Add FormulaDetail
                    foreach ($arrayDetail as $detail) {
                        $postageDetailNew = new FormulaDetail;
                        $postageDetailNew->formula_id = $postageNew->id;
                        $postageDetailNew->rule = $detail['rule'];
                        $postageDetailNew->name = $detail['name'];

                        switch ($detail['rule']) {
                            case 'S':
                            case 'PC':
                                $postageDetailNew->value = $detail['value'];
                                break;
                            case 'R':
                                $postageDetailNew->from = $detail['from'];
                                $postageDetailNew->to = $detail['to'];
                                break;
                            case 'P':
                                $postageDetailNew->fromPlace = $detail['fromPlace'];
                                $postageDetailNew->toPlace = $detail['toPlace'];
                                break;
                            case 'O':
                                $postageDetailNew->from = $detail['from'];
                                $postageDetailNew->to = $detail['to'];
                                $postageNew->update(['status' => 2]);
                                break;

                            default:
                                DB::rollBack();
                                return response()->json(['msg' => 'Rule invalid'], 404);
                                break;
                        }

                        if (!$postageDetailNew->save()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Create PostageDetail failed'], 404);
                        }
                    }

                    DB::commit();
                    //Response
                    $response = $this->DataPostage();
                    $response['id'] = $postageNew->id;
                    return response()->json($response, 201);
                    break;
                case 'update':
                    //Deactive old Postage
                    $postageDeactive = Formula::findOrFail($request->input('_postage')['id']);
                    $postageDeactive->update(['active' => 0]);

                    $first = $applyDate->toDateString();
                    $second = Carbon::createFromFormat('Y-m-d', $postageDeactive->applyDate)->toDateString();

                    if ($first != $second) {
                        $maxApplyDate = Formula::where('customer_id', $customer_id)->get()->max('applyDate');
                        $maxApplyDate = Carbon::createFromFormat('Y-m-d', $maxApplyDate);

                        if ($maxApplyDate != null && $applyDate->diffInDays($maxApplyDate, false) < 0) {
                            // Nothing happen
                        } else {
                            return response()->json(['msg' => 'Ngày áp dụng phải lớn hơn ngày áp dụng trước đó!'], 203);
                        }
                    }

                    //Add Postage
                    $postageNew = new Formula;
                    $postageNew->customer_id = $customer_id;
                    $postageNew->cashDelivery = $cashDelivery;
                    $postageNew->unitPrice = $unitPrice;
                    $postageNew->unit_id = $unit_id;
                    $postageNew->createdDate = $createdDate->toDateString();
                    $postageNew->applyDate = $applyDate->toDateString();
                    $postageNew->note = $note;
                    $postageNew->active = 1;
                    $postageNew->createdBy = $createdBy;
                    $postageNew->updatedBy = $updatedBy;
                    $postageNew->postageBase = 0;
                    $postageNew->fuel_id = $fuel_id;
                    $postageNew->changeByFuel = 0;
                    if (!$postageNew->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create Postage failed'], 404);
                    }

                    //Delete FormulaDetail
                    $ids_to_delete = FormulaDetail::where('formula_id', $postageDeactive->id)->pluck('id')->toArray();
                    if (count($ids_to_delete) > 0) {
                        if (DB::table('formulaDetails')->whereIn('id', $ids_to_delete)->delete() <= 0) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Delete FormulaDetail failed'], 404);
                        }
                    }

                    //Add FormulaDetail
                    foreach ($arrayDetail as $detail) {
                        $postageDetailNew = new FormulaDetail;
                        $postageDetailNew->formula_id = $postageNew->id;
                        $postageDetailNew->rule = $detail['rule'];
                        $postageDetailNew->name = $detail['name'];

                        switch ($detail['rule']) {
                            case 'S':
                            case 'PC':
                                $postageDetailNew->value = $detail['value'];
                                break;
                            case 'R':
                                $postageDetailNew->from = $detail['from'];
                                $postageDetailNew->to = $detail['to'];
                                break;
                            case 'P':
                                $postageDetailNew->fromPlace = $detail['fromPlace'];
                                $postageDetailNew->toPlace = $detail['toPlace'];
                                break;
                            case 'O':
                                $postageDetailNew->from = $detail['from'];
                                $postageDetailNew->to = $detail['to'];
                                $postageNew->update(['status' => 2]);
                                break;

                            default:
                                DB::rollBack();
                                return response()->json(['msg' => 'Rule invalid'], 404);
                                break;
                        }

                        if (!$postageDetailNew->save()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Create PostageDetail failed'], 404);
                        }
                    }
                    DB::commit();

                    //Response
                    $response = $this->DataPostage();
                    $response['id'] = $postageNew->id;
                    return response()->json($response, 201);
                    break;
                case 'delete':
                    $postageDeactive = Formula::findOrFail($request->input('_id'));
                    $postageDeactive->update(['active' => 0]);
                    DB::commit();
                    //Response
                    $response = $this->DataPostage();
                    return response()->json($response, 201);
                    break;
                default:
                    return response()->json(['msg' => 'Connection to server failed'], 404);
                    break;
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    public function postModifyPostageDetail(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }

        $formula_id = null;
        $rule = null;
        $name = null;
        $value = null;
        $from = null;
        $to = null;
        // $index      = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $formula_id = $request->input('_postageDetail')['formula_id'];
            $rule = $request->input('_postageDetail')['rule'];
            $name = $request->input('_postageDetail')['name'];
            $value = $request->input('_postageDetail')['value'];
            $from = $request->input('_postageDetail')['from'];
            $to = $request->input('_postageDetail')['to'];
            // $index      = $request->input('_postageDetail')['index'];
        }
        $formula_id = 0;
        if ($rule == 'R') {
            $value = null;
        } else {
            $from = null;
            $to = null;
        }

        try {
            DB::beginTransaction();
            switch ($action) {
                case 'add':
                    $postageDetailNew = new FormulaDetail;
                    $postageDetailNew->formula_id = $formula_id;
                    $postageDetailNew->rule = $rule;
                    $postageDetailNew->name = $name;
                    $postageDetailNew->value = $value;
                    $postageDetailNew->from = $from;
                    $postageDetailNew->to = $to;
                    // $postageDetailNew->index      = $index;

                    if (!$postageDetailNew->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create PostageDetail failed'], 404);
                    }
                    DB::commit();
                    //Response
                    $response = $this->DataPostage();
                    $response['id'] = $postageDetailNew->id;
                    return response()->json($response, 201);
                    break;
                case 'update':
                    $postageDetailNew = FormulaDetail::find($request->input('_postageDetail')['id']);
                    $postageDetailNew->formula_id = $formula_id;
                    $postageDetailNew->rule = $rule;
                    $postageDetailNew->name = $name;
                    $postageDetailNew->value = $value;
                    $postageDetailNew->from = $from;
                    $postageDetailNew->to = $to;
                    // $postageDetailNew->index = $index;

                    if (!$postageDetailNew->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update PostageDetail failed'], 404);
                    }
                    DB::commit();

                    //Response
                    $response = $this->DataPostage();
                    $response['id'] = $postageDetailNew->id;
                    return response()->json($response, 201);
                    break;
                case 'delete':
                    break;
                default:
                    return response()->json(['msg' => 'Connection to server failed'], 404);
                    break;
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    public function postUpdateApplyDate(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }

        $postageId = $request->input('_id');
        $applyDate = $request->input('_applyDate');
        $applyDate = Carbon::createFromFormat('d-m-Y', $applyDate);

        try {
            DB::beginTransaction();
            $postage = Formula::find($postageId);
            $postage->applyDate = $applyDate;
            if (!$postage->update()) {
                DB::rollBack();
                return response()->json(['msg' => 'Update ApplyDate Postage failed'], 404);
            }
            DB::commit();

            //Response
            $response = $this->DataPostage();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    public function DataPostage()
    {
        $formulas = \DB::table('formulas')
            ->leftJoin('customers', 'customers.id', '=', 'formulas.customer_id')
            ->leftJoin('units', 'units.id', '=', 'formulas.unit_id')
            ->select('formulas.*', 'customers.fullName as customers_fullName', 'units.name as unit_name')
            ->where('formulas.active', 1)
            ->get();

        $formulaDetails = \DB::table('formulaDetails')
            ->get();

        $fuels = \DB::table('fuels')->where('type', 'oil')->get();

        $units = \DB::table('units')->where('active', 1)->select('units.id', 'units.name')->get();

        $response = [
            'msg'            => 'Get success',
            'postages'       => $formulas,
            'postageDetails' => $formulaDetails,
            'fuels'          => $fuels,
            'units'          => $units,
            'nowDay'         => date("d-m-Y")
        ];
        return $response;
    }

    public function getDataCustomer()
    {
        $staffCustomers = DB::table('staffCustomers')
            ->select('staffCustomers.*')
            ->join('customers', 'customers.id', '=', 'staffCustomers.customer_id')
            ->where('staffCustomers.active', 1)
            ->get();
        $customers = DB::table('customers')
            ->select('customers.*', 'customerTypes.name as customerTypes_name')
            ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
            ->where('customers.active', '=', '1')
            ->get();
        $customerTypes = CustomerType::all();
        $response = [
            'msg'           => 'Get list all Customer',
            'customers'     => $customers,
            'customerTypes' => $customerTypes,
            'dataStaff'     => $staffCustomers,
        ];
        return response()->json($response, 200);
    }
}
