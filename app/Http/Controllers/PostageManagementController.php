<?php

namespace App\Http\Controllers;

use App\Postage;
use App\PostageDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostageManagementController extends Controller
{
    public function getViewPostage()
    {
        return view('subviews.Postage.Postage');
    }
    public function getDataPostage()
    {
        $postages = \DB::table('postages')
            ->leftJoin('customers', 'customers.id', '=', 'postages.customer_id')
            ->select('postages.*', 'customers.fullName as customers_fullName')
            ->get();

        $response = [
            'msg' => 'Get success',
            'postages' => $postages
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

        switch ($action) {
            case 'add':
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
                    return response()->json(['msg' => 'Create Postage failed'], 404);
                }
                $postageDetail = new PostageDetail();
                $postageDetail->postage_id = $postageNew->id;
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
                    return response()->json(['msg' => 'Create PostageDetail failed'], 404);
                }

                //Response
                $postage = \DB::table('postages')
                    ->join('customers', 'customers.id', '=', 'postages.customer_id')
                    ->select('postages.*', 'customers.fullName as customers_fullName')
                    ->where('postages.id', '=', $postageNew->id)
                    ->first();

                $response = [
                    'msg'      => 'Created postage',
                    'postage' => $postage
                ];
                return response()->json($response, 201);
                break;
            case 'update':
                //Update PostageDetail
                $postageDetail = PostageDetail::where('postage_id', $request->input('_postage')['id'])->orderBy('createdDate', 'desc')->first();
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
                if (!$postageDetail->update()) {
                    return response()->json(['msg' => 'Update PostageDetail failed'], 404);
                }

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
                    return response()->json(['msg' => 'Update Postage failed'], 404);
                }

                //Response
                $postage = \DB::table('postages')
                    ->join('customers', 'customers.id', '=', 'postages.customer_id')
                    ->select('postages.*', 'customers.fullName as customers_fullName')
                    ->where('postages.id', '=', $postageUpdate->id)
                    ->first();
                $response = [
                    'msg'      => 'Updated postage',
                    'postage' => $postage
                ];
                return response()->json($response, 201);
                break;
            case 'delete':
                //Delete Postage
                $postageDelete = Postage::findOrFail($request->input('_id'));
                $postageDelete->active = 0;

                //Delete PostageDetail
                $postageDetail = PostageDetail::where('postage_id', $request->input('_id'))->get()->toArray();
                if(count($postageDetail) > 0){
                    $ids_to_delete = array_map(function($item){ return $item['id']; }, $postageDetail);
                    if(\DB::table('postageDetails')->whereIn('id', $ids_to_delete)->update(['active' => 0]) <= 0){
                        return response()->json(['msg' => 'Delete PostageDetail failed'], 404);
                    }
                }

                if ($postageDelete->update()) {
                    $response = [
                        'msg' => 'Deleted postage'
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
}
