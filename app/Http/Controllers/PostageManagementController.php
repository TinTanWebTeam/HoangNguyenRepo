<?php

namespace App\Http\Controllers;

use App\CustomerType;
use App\Postage;
use App\PostageDetail;
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

        $postage = null;
        $customer_id = null;
        $fuel_id = null;
        $createdDate = null;
        $note = null;
        $receivePlace = null;
        $deliveryPlace = null;
        $cashDelivery = null;
        $createdBy = null;
        $updatedBy = null;
        $applyDate = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidatePostage($request->input('_postage'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $postage = $request->input('_postage')['postage'];
            $customer_id = $request->input('_postage')['customer_id'];
            $fuel_id = $request->input('_postage')['fuel_id'];

            $createdDate = $request->input('_postage')['createdDate'];
            $createdDate = Carbon::createFromFormat('d-m-Y', $createdDate)->toDateTimeString();

            $note = $request->input('_postage')['note'];
            $receivePlace = $request->input('_postage')['receivePlace'];
            $deliveryPlace = $request->input('_postage')['deliveryPlace'];
            $cashDelivery = $request->input('_postage')['cashDelivery'];

            $applyDate = $request->input('_postage')['applyDate'];
            $applyDate = Carbon::createFromFormat('d-m-Y', $applyDate);

            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
        }

        try {
            DB::beginTransaction();
            switch ($action) {
                case 'add':
                    $postageOld = Postage::where('customer_id', $customer_id)->orderBy('applyDate', 'desc')->first();
                    $postageBase = ($postageOld) ? $postageOld->postage : 0;

                    //Check exists Customer
                    $postageNew = new Postage();
                    $postageNew->postage = $postage;
                    $postageNew->postageBase = $postageBase;
                    $postageNew->createdDate = $createdDate;
                    $postageNew->applyDate = $applyDate;
                    $postageNew->receivePlace = $receivePlace;
                    $postageNew->deliveryPlace = $deliveryPlace;
                    $postageNew->cashDelivery = $cashDelivery;
                    $postageNew->note = $note;
                    $postageNew->active = 1;
                    $postageNew->createdBy = $createdBy;
                    $postageNew->updatedBy = $updatedBy;
                    $postageNew->customer_id = $customer_id;
                    $postageNew->fuel_id = $fuel_id;
                    $postageNew->changeByFuel = 0;
                    if (!$postageNew->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create Postage failed'], 404);
                    }
                    DB::commit();
                    //Response
                    $response = $this->DataPostage();
                    return response()->json($response, 201);
                    break;
                case 'update':
                    $maxApplyDate = Carbon::createFromFormat('Y-m-d', Postage::where('customer_id', $customer_id)->get()->max('applyDate'));

                    if($maxApplyDate != null && $applyDate->diffInDays($maxApplyDate, false) < 0){
                        $postageOld = Postage::where('customer_id', $customer_id)->orderBy('applyDate', 'desc')->first();
                        $postageBase = ($postageOld) ? $postageOld->postage : 0;

                        //Add Postage
                        $postageNew = new Postage();
                        $postageNew->postage = $postage;
                        $postageNew->postageBase = $postageBase;
                        $postageNew->createdDate = $createdDate;
                        $postageNew->applyDate = $applyDate;
                        $postageNew->receivePlace = $receivePlace;
                        $postageNew->deliveryPlace = $deliveryPlace;
                        $postageNew->cashDelivery = $cashDelivery;
                        $postageNew->note = $note;
                        $postageNew->active = 1;
                        $postageNew->createdBy = $createdBy;
                        $postageNew->updatedBy = $updatedBy;
                        $postageNew->customer_id = $customer_id;
                        $postageNew->fuel_id = $fuel_id;
                        $postageNew->changeByFuel = 0;
                        if (!$postageNew->save()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Create Postage failed'], 404);
                        }
                        DB::commit();
                    } else {
                        return response()->json(['msg' => 'Ngày áp dụng phải lớn hơn ngày áp dụng trước đó!'], 203);
                    }

                    //Response
                    $response = $this->DataPostage();
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
            $postage = Postage::find($postageId);
            $postage->applyDate = $applyDate;
            if(!$postage->update()){
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
//        $postageFiltered = DB::select("
//            SELECT i1.*, c.fullName as customers_fullName
//            FROM postages AS i1
//            LEFT JOIN postages AS i2 ON (i1.receivePlace = i2.receivePlace AND i1.deliveryPlace = i2.deliveryPlace AND i1.applyDate < i2.applyDate)
//            INNER JOIN customers AS c ON c.id = i1.customer_id
//            WHERE i2.applyDate IS NULL;
//        ");
//
//        $postageFull = \DB::table('postages')
//            ->leftJoin('customers', 'customers.id', '=', 'postages.customer_id')
//            ->select('postages.*', 'customers.fullName as customers_fullName')
//            ->get();

        $postageFiltered = \DB::table('formulas')->get();

        $postageFull = \DB::table('formulas')->get();

        $fuels = \DB::table('fuels')->where('type', 'oil')->get();

        $response = [
            'msg'            => 'Get success',
            'postageFull'    => $postageFull,
            'postageFiltered'=> $postageFiltered,
            'fuels'          => $fuels
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
