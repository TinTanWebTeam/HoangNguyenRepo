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
        $postageFiltered = DB::select("     
            select p.*, customers.fullName as customers_fullName
            from postages p
            INNER JOIN customers ON customers.id = p.customer_id
            INNER JOIN
            (
                select MAX(t.applyDate) as maxApplyDate, t.customer_id
                from (select * from postages order by applyDate desc) as t
                group by t.customer_id
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
            $applyDate = Carbon::createFromFormat('d-m-Y', $applyDate)->toDateTimeString();

            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
        }

        try {
            DB::beginTransaction();
            switch ($action) {
                case 'add':
                    //Check exists Customer
                    $exist = Postage::where('customer_id', $customer_id)->first();
                    if ($exist != null) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Customer exitst'], 203);
                    }

                    $postageNew = new Postage();
                    $postageNew->postage = $postage;
                    $postageNew->createdDate = $createdDate;
                    $postageNew->customer_id = $customer_id;
                    $postageNew->note = $note;
                    $postageNew->receivePlace = $receivePlace;
                    $postageNew->deliveryPlace = $deliveryPlace;
                    $postageNew->cashDelivery = $cashDelivery;
                    $postageNew->createdBy = $createdBy;
                    $postageNew->updatedBy = $updatedBy;
                    $postageNew->changeByFuel = 0;
                    if (!$postageNew->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create Postage failed'], 404);
                    }

                    $postageDetail = new PostageDetail();
                    $postageDetail->postage_id = $postageNew->id;
                    $postageDetail->fuel_id = $fuel_id;
                    $postageDetail->postage = $postage;
                    $postageDetail->createdDate = $createdDate;
                    $postageDetail->receivePlace = $receivePlace;
                    $postageDetail->deliveryPlace = $deliveryPlace;
                    $postageDetail->cashDelivery = $cashDelivery;
                    $postageDetail->note = $note;
                    $postageDetail->createdBy = $createdBy;
                    $postageDetail->updatedBy = $updatedBy;
                    $postageDetail->applyDate = $applyDate;
                    $postageDetail->changeByFuel = 0;
                    if (!$postageDetail->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create PostageDetail failed'], 404);
                    }
                    DB::commit();
                    //Response
                    $postage = \DB::table('postages')
                        ->join('customers', 'customers.id', '=', 'postages.customer_id')
                        ->select('postages.*', 'customers.fullName as customers_fullName')
                        ->where('postages.id', $postageNew->id)
                        ->first();

                    $postageDetail = \DB::table('postageDetails')
                        ->where('postage_id', $postageNew->id)
                        ->orderBy('createdDate', 'desc')
                        ->first();

                    $response = [
                        'msg'           => 'Created postage',
                        'postage'       => $postage,
                        'postageDetail' => $postageDetail
                    ];
                    return response()->json($response, 201);
                    break;
                case 'update':
                    //Update Postage
                    $postageUpdate = Postage::findOrFail($request->input('_postage')['id']);
                    $postageUpdate->postage = $postage;
                    $postageUpdate->customer_id = $customer_id;
                    $postageUpdate->note = $note;
                    $postageUpdate->receivePlace = $receivePlace;
                    $postageUpdate->deliveryPlace = $deliveryPlace;
                    $postageUpdate->cashDelivery = $cashDelivery;
                    $postageUpdate->updatedBy = $updatedBy;
                    $postageUpdate->createdDate = $createdDate;
                    $postageUpdate->changeByFuel = 0;
                    if (!$postageUpdate->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update Postage failed'], 404);
                    }

                    //Add PostageDetail
                    $postageDetail = new PostageDetail();
                    $postageDetail->postage = $postage;
                    $postageDetail->postage_id = $postageUpdate->id;
                    $postageDetail->fuel_id = $fuel_id;
                    $postageDetail->createdDate = $createdDate;
                    $postageDetail->receivePlace = $receivePlace;
                    $postageDetail->deliveryPlace = $deliveryPlace;
                    $postageDetail->cashDelivery = $cashDelivery;
                    $postageDetail->note = $note;
                    $postageDetail->createdBy = $createdBy;
                    $postageDetail->updatedBy = $updatedBy;
                    $postageDetail->applyDate = $applyDate;
                    $postageDetail->changeByFuel = 0;
                    if (!$postageDetail->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Add PostageDetail failed'], 404);
                    }

                    DB::commit();
                    //Response
                    $postage = \DB::table('postages')
                        ->join('customers', 'customers.id', '=', 'postages.customer_id')
                        ->select('postages.*', 'customers.fullName as customers_fullName')
                        ->where('postages.id', '=', $postageUpdate->id)
                        ->first();

                    $postageDetail = \DB::table('postageDetails')
                        ->where('postage_id', $postageUpdate->id)
                        ->orderBy('createdDate', 'desc')
                        ->first();

                    $response = [
                        'msg'           => 'Updated postage',
                        'postage'       => $postage,
                        'postageDetail' => $postageDetail
                    ];
                    return response()->json($response, 201);
                    break;
                case 'delete':
                    //Delete Postage
                    $postageDelete = Postage::findOrFail($request->input('_id'));
                    $postageDelete->active = 0;

                    //Delete PostageDetail
                    $postageDetail = PostageDetail::where('postage_id', $request->input('_id'))->get()->toArray();
                    if (count($postageDetail) > 0) {
                        $ids_to_delete = array_map(function ($item) {
                            return $item['id'];
                        }, $postageDetail);
                        if (\DB::table('postageDetails')->whereIn('id', $ids_to_delete)->update(['active' => 0]) <= 0) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Delete PostageDetail failed'], 404);
                        }
                    }

                    if (!$postageDelete->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Deletion failed'], 404);
                    }
                    DB::commit();
                    $response = [
                        'msg' => 'Deleted postage'
                    ];
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
}
