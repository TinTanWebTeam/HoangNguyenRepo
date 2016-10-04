<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostageManagementController extends Controller
{
    public function getViewPostage()
    {
        return view('subviews.Postage.CustomerPostage');
    }
    public function getDataPostage()
    {
        $postages = \DB::table('postages')
            ->join('customers', 'customers.id', '=', 'postages.customer_id')
            ->select('postages.*', 'customers.fullName as customers_fullName')
            ->get();
        $response = [
            'msg' => 'Get success',
            'postages' => $postages
        ];
        return response()->json($response, 200);
    }
}
