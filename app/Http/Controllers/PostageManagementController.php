<?php

namespace App\Http\Controllers;

use App\Postage;
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
        $postages = Postage::join('customers', 'customers.id', '=', 'postages.customer_id')
            ->select('postages.*', 'customers.fullName as customers_fullName')
            ->orderBy('postages.month', 'desc')
            ->get()
            ->groupBy('month')->first()->toArray();

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
        $month = null;
        $note = null;
        $createdBy = null;
        $updatedBy = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidatePostage($request->input('_postage'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $postage = $request->input('_postage')['postage'];
            $customer_id = $request->input('_postage')['customer_id'];
            $month = $request->input('_postage')['month'];
            $note = $request->input('_postage')['note'];
            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
        }

        switch ($action) {
            case 'add':
                $postageNew = new Postage();
                $postageNew->postage = $postage;
                $postageNew->month = $month;
                $postageNew->customer_id = $customer_id;
                $postageNew->note = $note;
                $postageNew->createdBy = $createdBy;
                $postageNew->updatedBy = $updatedBy;
                if ($postageNew->save()) {
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
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $postageUpdate = Postage::findOrFail($request->input('_postage')['id']);
                $postageUpdate->postage = $postage;
//                $postageUpdate->month = $month;
                $postageUpdate->customer_id = $customer_id;
                $postageUpdate->note = $note;
                $postageUpdate->updatedBy = $updatedBy;
                if ($postageUpdate->update()) {
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
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $postageDelete = Postage::findOrFail($request->input('_id'));
                $postageDelete->active = 0;

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
