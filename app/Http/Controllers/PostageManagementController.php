<?php

namespace App\Http\Controllers;

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
        $response = $this->getData();
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
                    $response = $this->getData();
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
                    $response = $this->getData();
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

    public function getData()
    {
        $postageFiltered = DB::select("     
            select p.*, customers.fullName as customers_fullName
            from postages p
            INNER JOIN customers ON customers.id = p.customer_id
            INNER JOIN
            (
                select MAX(t.applyDate) as maxApplyDate, t.customer_id, t.receivePlace, t.deliveryPlace
                from (select * from postages order by applyDate desc) as t
                group by t.customer_id, t.receivePlace, t.deliveryPlace
            ) as t1 ON p.customer_id = t1.customer_id AND t1.maxApplyDate = p.applyDate
        ");

        $postageFull = \DB::table('postages')
            ->leftJoin('customers', 'customers.id', '=', 'postages.customer_id')
            ->select('postages.*', 'customers.fullName as customers_fullName')
            ->get();

        $fuels = \DB::table('fuels')->where('type', 'oil')->get();

        $response = [
            'msg'            => 'Get success',
            'postageFull'    => $postageFull,
            'postageFiltered'=> $postageFiltered,
            'fuels'          => $fuels
        ];
        return $response;
    }
}
