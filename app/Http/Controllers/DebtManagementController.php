<?php

namespace App\Http\Controllers;

use App\InvoiceCustomer;
use App\InvoiceCustomerDetail;
use App\InvoiceGarage;
use App\InvoiceGarageDetail;
use App\Transport;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use League\Flysystem\Exception;

class DebtManagementController extends Controller
{
    //Customer
    public function getViewDebtCustomer()
    {
        return view('subviews.Debt.DebtCustomer');
    }

    public function getDataDebtCustomer()
    {
        $transports = \DB::table('transports')
            ->select('transports.*', 'products.id as products_id', 'products.name as products_name',
                'customers.id as customers_id', 'customers.fullName as customers_fullName',
                'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note',
                'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_',
                'invoiceCustomers.invoiceCode'
            )
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('products', 'products.id', '=', 'transports.product_id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
            ->join('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
            ->join('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
            ->join('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
            ->leftJoin('invoiceCustomers', 'invoiceCustomers.id', '=', 'transports.invoiceCustomer_id')
//            ->whereRaw('transports.cashReceive < transports.cashRevenue')
            ->where('transports.active', '=', '1')
            ->get();

        $invoiceCustomers = DB::table('invoiceCustomers')
            ->select('invoiceCustomers.*', 'customers.fullName as customers_fullName')
            ->join('transports', 'transports.invoiceCustomer_id', '=', 'invoiceCustomers.id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->where('invoiceCustomers.active', '=', '1')
            ->get();

        $invoiceCustomerDetails = DB::table('invoiceCustomerDetails')
            ->get();

        $printHistories = DB::table('printHistories')
            ->join('users', 'users.id', '=', 'printHistories.updatedBy')
            ->select('printHistories.*', 'users.fullName as users_fullName')
            ->get();

        $invoiceCode = $this->generateInvoiceCode('customer');

        $response = [
            'msg'                    => 'Get list all Transport',
            'transports'             => $transports,
            'invoiceCustomers'       => $invoiceCustomers,
            'invoiceCustomerDetails' => $invoiceCustomerDetails,
            'printHistories'         => $printHistories,
            'invoiceCode'            => $invoiceCode
        ];
        return response()->json($response, 200);
    }

    public function postModifyDebtCustomer(Request $request)
    {
        //Trả đủ
        $transport_id = $request->input('_transport');

        try {
            DB::beginTransaction();
            $transportUpdate = Transport::findOrFail($transport_id);
            $transportUpdate->cashReceive = $transportUpdate->cashRevenue;
            $transportUpdate->status_customer = 7;

            $transportUpdate->updatedBy = \Auth::user()->id;

            if ($transportUpdate->update()) {
                //Response
                $transport = DB::table('transports')
                    ->select('transports.*', 'products.id as products_id', 'products.name as products_name',
                        'customers.id as customers_id', 'customers.fullName as customers_fullName',
                        'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode',
                        'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note',
                        'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                        'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                        'statuses_gar.status as status_garage_',
                        'invoiceCustomers.invoiceCode'
                    )
                    ->join('costs', 'costs.transport_id', '=', 'transports.id')
                    ->join('products', 'products.id', '=', 'transports.product_id')
                    ->join('customers', 'customers.id', '=', 'transports.customer_id')
                    ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
                    ->join('prices', 'prices.id', '=', 'costs.price_id')
                    ->join('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
                    ->join('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
                    ->join('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
                    ->join('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
                    ->leftJoin('invoiceCustomers', 'invoiceCustomers.id', '=', 'transports.invoiceCustomer_id')
                    ->where('transports.id', '=', $transportUpdate->id)
                    ->first();

                $response = [
                    'msg'       => 'Updated transport',
                    'transport' => $transport
                ];
                DB::commit();
                return response()->json($response, 201);
            }
            DB::rollBack();
            return response()->json(['msg' => 'Update failed'], 404);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    //Invoice Customer
    public function postModifyInvoiceCustomer(Request $request)
    {
        $action = $request->input('_action');
        if ($action == 'new') {
            $array_transportId = $request->input('_array_transportId');

            $invoiceCustomer = new InvoiceCustomer();

            $invoiceCode = $this->generateInvoiceCode('customer');
            if ($request->input('_invoiceCustomer')['invoiceCode'] == '')
                $invoiceCustomer->invoiceCode = $invoiceCode;
            else {
                $invoiceCode = $request->input('_invoiceCustomer')['invoiceCode'];
                if (InvoiceCustomer::where('invoiceCode', $invoiceCode)->get()->count() == 0)
                    $invoiceCustomer->invoiceCode = $invoiceCode;
                else
                    return response()->json(['msg' => 'invoiceCode exists!'], 203);
            }

            $invoiceCustomer->VAT = $request->input('_invoiceCustomer')['VAT'];
            $invoiceCustomer->notVAT = $request->input('_invoiceCustomer')['notVAT'];
            $invoiceCustomer->hasVAT = $request->input('_invoiceCustomer')['hasVAT'];

            $exportDate = $request->input('_invoiceCustomer')['exportDate'];
            $invoiceCustomer->exportDate = Carbon::createFromFormat('d-m-Y', $exportDate)->toDateTimeString();

            $invoiceDate = $request->input('_invoiceCustomer')['invoiceDate'];
            $invoiceCustomer->invoiceDate = Carbon::createFromFormat('d-m-Y', $invoiceDate)->toDateTimeString();

            $payDate = $request->input('_invoiceCustomer')['payDate'];
            $invoiceCustomer->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

            $invoiceCustomer->note = $request->input('_invoiceCustomer')['note'];
            $invoiceCustomer->totalPay = $request->input('_invoiceCustomer')['totalPay'];
            $invoiceCustomer->prePaid = $request->input('_invoiceCustomer')['prePaid'];
            $invoiceCustomer->totalPaid = $request->input('_invoiceCustomer')['paidAmt'];
            $invoiceCustomer->createdBy = \Auth::user()->id;
            $invoiceCustomer->updatedBy = \Auth::user()->id;

            try {
                DB::beginTransaction();
                if (!$invoiceCustomer->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create new Invoice fail!'], 404);
                }

                $invoiceCustomerDetail = new InvoiceCustomerDetail();
                $invoiceCustomerDetail->invoiceCustomer_id = $invoiceCustomer->id;
                $invoiceCustomerDetail->paidAmt = $request->input('_invoiceCustomer')['paidAmt'];

                $payDate = $request->input('_invoiceCustomer')['payDate'];
                $invoiceCustomerDetail->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

                $invoiceCustomerDetail->modify = false;
                $invoiceCustomerDetail->createdBy = \Auth::user()->id;
                $invoiceCustomerDetail->updatedBy = \Auth::user()->id;

                if (!$invoiceCustomerDetail->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceCustomerDetail fail!'], 404);
                }

                foreach ($array_transportId as $transport_id) {
                    $transportUpdate = Transport::find($transport_id);
                    $transportUpdate->invoiceCustomer_id = $invoiceCustomer->id;
                    $transportUpdate->status_customer = 7;
                    $transportUpdate->updatedBy = \Auth::user()->id;

                    if (!$transportUpdate->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update transport fail!'], 404);
                    }
                }

                DB::commit();

                $invoiceCustomer = DB::table('invoiceCustomers')
                    ->join('transports', 'transports.invoiceCustomer_id', '=', 'invoiceCustomers.id')
                    ->join('customers', 'customers.id', '=', 'transports.customer_id')
                    ->where([
                        ['invoiceCustomers.id', '=', $invoiceCustomer->id],
                        ['invoiceCustomers.active', '=', '1']
                    ])
                    ->select('invoiceCustomers.*', 'customers.fullName as customers_fullName')
                    ->first();

                $response = [
                    'msg'                   => 'Create Invoice successful!',
                    'invoiceCustomer'       => $invoiceCustomer,
                    'invoiceCustomerDetail' => $invoiceCustomerDetail,
                    'invoiceCode'           => $this->generateInvoiceCode('customer')
                ];
                return response()->json($response, 201);
            } catch (Exception $ex) {
                DB::rollBack();
                return response()->json(['msg' => $ex], 404);
            }
        } else {
            $invoiceCustomer = InvoiceCustomer::find($request->input('_invoiceCustomer')['id']);

            $exportDate = $request->input('_invoiceCustomer')['exportDate'];
            $invoiceCustomer->exportDate = Carbon::createFromFormat('d-m-Y', $exportDate)->toDateTimeString();

            $invoiceDate = $request->input('_invoiceCustomer')['invoiceDate'];
            $invoiceCustomer->invoiceDate = Carbon::createFromFormat('d-m-Y', $invoiceDate)->toDateTimeString();

            $payDate = $request->input('_invoiceCustomer')['payDate'];
            $invoiceCustomer->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

            $invoiceCustomer->note = $request->input('_invoiceCustomer')['note'];
            $invoiceCustomer->totalPaid += $request->input('_invoiceCustomer')['paidAmt'];
            $invoiceCustomer->updatedBy = \Auth::user()->id;

            try {
                DB::beginTransaction();
                if (!$invoiceCustomer->update()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Update Invoice fail!'], 404);
                }

                $invoiceCustomerDetail = new InvoiceCustomerDetail();
                $invoiceCustomerDetail->invoiceCustomer_id = $invoiceCustomer->id;
                $invoiceCustomerDetail->paidAmt = $request->input('_invoiceCustomer')['paidAmt'];

                $payDate = $request->input('_invoiceCustomer')['payDate'];
                $invoiceCustomerDetail->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

                $invoiceCustomerDetail->modify = false;
                $invoiceCustomerDetail->createdBy = \Auth::user()->id;
                $invoiceCustomerDetail->updatedBy = \Auth::user()->id;

                if (!$invoiceCustomerDetail->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceCustomerDetail fail!'], 404);
                }

                DB::commit();

                $invoiceCustomer = DB::table('invoiceCustomers')
                    ->join('transports', 'transports.invoiceCustomer_id', '=', 'invoiceCustomers.id')
                    ->join('customers', 'customers.id', '=', 'transports.customer_id')
                    ->where([
                        ['invoiceCustomers.id', '=', $invoiceCustomer->id],
                        ['invoiceCustomers.active', '=', '1']
                    ])
                    ->select('invoiceCustomers.*', 'customers.fullName as customers_fullName')
                    ->first();

                $response = [
                    'msg'                   => 'Create Invoice successful!',
                    'invoiceCustomer'       => $invoiceCustomer,
                    'invoiceCustomerDetail' => $invoiceCustomerDetail,
                    'invoiceCode'           => $this->generateInvoiceCode('customer')
                ];
                return response()->json($response, 201);
            } catch (Exception $ex) {
                DB::rollBack();
                return response()->json(['msg' => $ex], 404);
            }
        }
    }

    public function postDeleteInvoiceCustomer(Request $request)
    {
        $invoiceCustomerId = $request->get('_invoiceCustomer_id');
        if ($invoiceCustomerId == '') {
            return response()->json(['msg' => 'Dữ liệu không hợp lệ.'], 404);
        }
        try {
            DB::beginTransaction();
            //Delete InvoiceCustomerDetail
            $array_invoiceCustomerDetail = InvoiceCustomerDetail::where('invoiceCustomer_id', $invoiceCustomerId)->get();
            $array_invoiceCustomerDetailId = null;
            if(count($array_invoiceCustomerDetail) > 0){
                $array_invoiceCustomerDetailId = collect($array_invoiceCustomerDetail)->pluck('id');
                foreach ($array_invoiceCustomerDetail as $invoiceCustomerDetail) {
                    if (!$invoiceCustomerDetail->delete()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Delete InvoiceCustomerDetail fail.'], 404);
                    }
                }
            }

            //Delete InvoiceCustomer
            $invoiceCustomer = InvoiceCustomer::find($invoiceCustomerId);
            if(!$invoiceCustomer){
                DB::rollBack();
                return response()->json(['msg' => 'InvoiceCustomer does not exists.'], 404);
            }
            if (!$invoiceCustomer->delete()) {
                DB::rollBack();
                return response()->json(['msg' => 'Delete InvoiceCustomer fail.'], 404);
            }

            //Response
            $response = [
                'msg' => 'Delete InvoiceCustomer successful!',
                'invoiceCustomer' => $invoiceCustomerId,
                'invoiceCustomerDetails' => $array_invoiceCustomerDetailId
            ];
            DB::commit();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    public function postDeleteInvoiceCustomerDetail(Request $request)
    {
        $action = $request->get('_action');
        $invoiceCustomerDetailId = $request->get('_invoiceCustomerDetail_id');
        if ($invoiceCustomerDetailId == '') {
            return response()->json(['msg' => 'Dữ liệu không hợp lệ.'], 404);
        }
        try {
            DB::beginTransaction();
            //Delete InvoiceCustomerDetail
            $invoiceCustomerDetail = InvoiceCustomerDetail::find($invoiceCustomerDetailId);
            if(!$invoiceCustomerDetailId){
                DB::rollBack();
                return response()->json(['msg' => 'InvoiceCustomerDetail does not exists.'], 404);
            }

            $invoiceCustomer_id = $invoiceCustomerDetail->invoiceCustomer_id;
            $paidAmt = $invoiceCustomerDetail->paidAmt;

            if (!$invoiceCustomerDetail->delete()) {
                DB::rollBack();
                return response()->json(['msg' => 'Delete InvoiceCustomerDetail fail.'], 404);
            }
            if($action == 'delete1'){
                //Update InvoiceCustomer
                $invoiceCustomer = InvoiceCustomer::find($invoiceCustomer_id);
                if(!$invoiceCustomer){
                    DB::rollBack();
                    return response()->json(['msg' => 'InvoiceCustomer does not exists.'], 404);
                }

                $invoiceCustomer->totalPaid = $invoiceCustomer->totalPaid - $paidAmt;
                $invoiceCustomer->updatedBy = \Auth::user()->id;

                if (!$invoiceCustomer->update()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Update InvoiceCustomer fail.'], 404);
                }

                //Response
                $invoiceCustomer = DB::table('invoiceCustomers')
                    ->select('invoiceCustomers.*', 'customers.fullName')
                    ->join('transports', 'transports.invoiceCustomer_id', '=', 'invoiceCustomers.id')
                    ->join('customers', 'customers.id', '=', 'transports.customer_id')
                    ->where([
                        ['invoiceCustomers.active', '=', '1'],
                        ['invoiceCustomers.id', '=', $invoiceCustomer->id]
                    ])
                    ->select('invoiceCustomers.*', 'customers.fullName as customers_fullName')
                    ->first();

                $response = [
                    'msg' => 'Delete InvoiceCustomer successful!',
                    'invoiceCustomer' => $invoiceCustomer,
                    'invoiceCustomerDetail' => $invoiceCustomerDetailId
                ];
            } else {
                //Delete InvoiceCustomer
                $invoiceCustomer = InvoiceCustomer::find($invoiceCustomer_id);
                if(!$invoiceCustomer){
                    DB::rollBack();
                    return response()->json(['msg' => 'InvoiceCustomer does not exists.'], 404);
                }
                if (!$invoiceCustomer->delete()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Delete InvoiceCustomer fail.'], 404);
                }

                //Response
                $response = [
                    'msg' => 'Delete InvoiceCustomer successful!',
                    'invoiceCustomer' => $invoiceCustomer_id,
                    'invoiceCustomerDetail' => $invoiceCustomerDetailId
                ];
            }

            DB::commit();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    //Generate invoiceCode
    public function generateInvoiceCode($type)
    {
        if ($type == 'customer')
            $invoiceCode = "IC" . date('ymd');
        else
            $invoiceCode = "IG" . date('ymd');

        $stt = InvoiceCustomer::where('invoiceCode', 'like', $invoiceCode . '%')->get()->count() + 1;
        $invoiceCode .= substr("00" . $stt, -3);
        return $invoiceCode;
    }

    ###############################

    //Garage
    public function getViewDebtGarage()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }

    public function getDataDebtGarage()
    {
        $transports = \DB::table('transports')
            ->select('transports.*', 'products.id as products_id', 'products.name as products_name',
                'customers.id as customers_id', 'customers.fullName as customers_fullName',
                'garages.id as garages_id', 'garages.name as garages_name',
                'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note',
                'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_',
                'invoiceGarages.invoiceCode'
            )
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('products', 'products.id', '=', 'transports.product_id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
            ->join('prices', 'prices.id', '=', 'costs.price_id')
            ->join('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
            ->join('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
            ->join('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
            ->join('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
            ->leftJoin('invoiceGarages', 'invoiceGarages.id', '=', 'transports.invoiceGarage_id')
//            ->whereRaw('transports.cashReceive < transports.cashRevenue')
            ->where([
                ['transports.active', '=', '1'],
                ['garages.id', '<>', '1']
            ])
            ->get();

        $invoiceGarages = DB::table('invoiceGarages')
            ->select('invoiceGarages.*', 'garages.name as garages_name')
            ->join('transports', 'transports.invoiceGarage_id', '=', 'invoiceGarages.id')
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
            ->where([
                ['invoiceGarages.active', '=', '1'],
                ['garages.id', '<>', '1']
            ])
            ->get();

        $invoiceGarageDetails = DB::table('invoiceGarageDetails')
            ->get();

        $printHistories = DB::table('printHistories')
            ->join('users', 'users.id', '=', 'printHistories.updatedBy')
            ->select('printHistories.*', 'users.fullName as users_fullName')
            ->get();

        $invoiceCode = $this->generateInvoiceCode('garage');

        $response = [
            'msg'                  => 'Get list all Transport',
            'transports'           => $transports,
            'invoiceGarages'       => $invoiceGarages,
            'invoiceGarageDetails' => $invoiceGarageDetails,
            'printHistories'       => $printHistories,
            'invoiceCode'          => $invoiceCode
        ];
        return response()->json($response, 200);
    }

    public function postModifyDebtGarage(Request $request)
    {
        //Trả đủ
        $transport_id = $request->input('_transport');

        try {
            DB::beginTransaction();
            $transportUpdate = Transport::findOrFail($transport_id);
            $transportUpdate->cashReceive = $transportUpdate->cashRevenue;
            $transportUpdate->status_garage = 7;

            $transportUpdate->updatedBy = \Auth::user()->id;

            if ($transportUpdate->update()) {
                //Response
                $transport = \DB::table('transports')
                    ->select('transports.*', 'products.id as products_id', 'products.name as products_name',
                        'customers.id as customers_id', 'customers.fullName as customers_fullName',
                        'garages.id as garages_id', 'garages.name as garages_name',
                        'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode',
                        'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note',
                        'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                        'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                        'statuses_gar.status as status_garage_',
                        'invoiceGarages.invoiceCode'
                    )
                    ->join('costs', 'costs.transport_id', '=', 'transports.id')
                    ->join('products', 'products.id', '=', 'transports.product_id')
                    ->join('customers', 'customers.id', '=', 'transports.customer_id')
                    ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
                    ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                    ->join('prices', 'prices.id', '=', 'costs.price_id')
                    ->join('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
                    ->join('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
                    ->join('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
                    ->join('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
                    ->leftJoin('invoiceGarages', 'invoiceGarages.id', '=', 'transports.invoiceGarage_id')
                    ->where([
                        ['transports.active', '=', '1'],
                        ['garages.id', '<>', '1'],
                        ['transports.id', '=', $transportUpdate->id]
                    ])
                    ->first();

                $response = [
                    'msg'       => 'Updated transport',
                    'transport' => $transport
                ];
                DB::commit();
                return response()->json($response, 201);
            }
            DB::rollBack();
            return response()->json(['msg' => 'Update failed'], 404);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    //Invoice Garage
    public function postModifyInvoiceGarage(Request $request)
    {
        $action = $request->input('_action');
        if ($action == 'new') {
            $array_transportId = $request->input('_array_transportId');

            $invoiceGarage = new InvoiceGarage();

            $invoiceCode = $this->generateInvoiceCode('garage');
            if ($request->input('_invoiceGarage')['invoiceCode'] == '')
                $invoiceGarage->invoiceCode = $invoiceCode;
            else {
                $invoiceCode = $request->input('_invoiceGarage')['invoiceCode'];
                if (InvoiceGarage::where('invoiceCode', $invoiceCode)->get()->count() == 0)
                    $invoiceGarage->invoiceCode = $invoiceCode;
                else
                    return response()->json(['msg' => 'invoiceCode exists!'], 203);
            }

            $invoiceGarage->VAT = $request->input('_invoiceGarage')['VAT'];
            $invoiceGarage->notVAT = $request->input('_invoiceGarage')['notVAT'];
            $invoiceGarage->hasVAT = $request->input('_invoiceGarage')['hasVAT'];

            $exportDate = $request->input('_invoiceGarage')['exportDate'];
            $invoiceGarage->exportDate = Carbon::createFromFormat('d-m-Y', $exportDate)->toDateTimeString();

            $invoiceDate = $request->input('_invoiceGarage')['invoiceDate'];
            $invoiceGarage->invoiceDate = Carbon::createFromFormat('d-m-Y', $invoiceDate)->toDateTimeString();

            $payDate = $request->input('_invoiceGarage')['payDate'];
            $invoiceGarage->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

            $invoiceGarage->note = $request->input('_invoiceGarage')['note'];
            $invoiceGarage->totalPay = $request->input('_invoiceGarage')['totalPay'];
            $invoiceGarage->prePaid = $request->input('_invoiceGarage')['prePaid'];
            $invoiceGarage->totalPaid = $request->input('_invoiceGarage')['paidAmt'];
            $invoiceGarage->createdBy = \Auth::user()->id;
            $invoiceGarage->updatedBy = \Auth::user()->id;

            try {
                DB::beginTransaction();
                if (!$invoiceGarage->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create new Invoice fail!'], 404);
                }

                $invoiceGarageDetail = new InvoiceGarageDetail();
                $invoiceGarageDetail->invoiceGarage_id = $invoiceGarage->id;
                $invoiceGarageDetail->paidAmt = $request->input('_invoiceGarage')['paidAmt'];

                $payDate = $request->input('_invoiceGarage')['payDate'];
                $invoiceGarageDetail->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

                $invoiceGarageDetail->modify = false;
                $invoiceGarageDetail->createdBy = \Auth::user()->id;
                $invoiceGarageDetail->updatedBy = \Auth::user()->id;

                if (!$invoiceGarageDetail->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceGarageDetail fail!'], 404);
                }

                foreach ($array_transportId as $transport_id) {
                    $transportUpdate = Transport::find($transport_id);
                    $transportUpdate->invoiceGarage_id = $invoiceGarage->id;
                    $transportUpdate->status_garage = 7;
                    $transportUpdate->updatedBy = \Auth::user()->id;

                    if (!$transportUpdate->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update transport fail!'], 404);
                    }
                }

                DB::commit();

                $invoiceGarage = DB::table('invoiceGarages')
                    ->select('invoiceGarages.*', 'garages.name as garages_name')
                    ->join('transports', 'transports.invoiceGarage_id', '=', 'invoiceGarages.id')
                    ->join('costs', 'costs.transport_id', '=', 'transports.id')
                    ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
                    ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                    ->where([
                        ['invoiceGarages.active', '=', '1'],
                        ['garages.id', '<>', '1'],
                        ['invoiceGarages.id', '=', $invoiceGarage->id],
                    ])
                    ->first();

                $response = [
                    'msg'                   => 'Create Invoice successful!',
                    'invoiceGarage'       => $invoiceGarage,
                    'invoiceGarageDetail' => $invoiceGarageDetail,
                    'invoiceCode'           => $this->generateInvoiceCode('garage')
                ];
                return response()->json($response, 201);
            } catch (Exception $ex) {
                DB::rollBack();
                return response()->json(['msg' => $ex], 404);
            }
        } else {
            $invoiceGarage = InvoiceGarage::find($request->input('_invoiceGarage')['id']);

            $exportDate = $request->input('_invoiceGarage')['exportDate'];
            $invoiceGarage->exportDate = Carbon::createFromFormat('d-m-Y', $exportDate)->toDateTimeString();

            $invoiceDate = $request->input('_invoiceGarage')['invoiceDate'];
            $invoiceGarage->invoiceDate = Carbon::createFromFormat('d-m-Y', $invoiceDate)->toDateTimeString();

            $payDate = $request->input('_invoiceGarage')['payDate'];
            $invoiceGarage->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

            $invoiceGarage->note = $request->input('_invoiceGarage')['note'];
            $invoiceGarage->totalPaid += $request->input('_invoiceGarage')['paidAmt'];
            $invoiceGarage->updatedBy = \Auth::user()->id;

            try {
                DB::beginTransaction();
                if (!$invoiceGarage->update()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Update Invoice fail!'], 404);
                }

                $invoiceGarageDetail = new InvoiceGarageDetail();
                $invoiceGarageDetail->invoiceGarage_id = $invoiceGarage->id;
                $invoiceGarageDetail->paidAmt = $request->input('_invoiceGarage')['paidAmt'];

                $payDate = $request->input('_invoiceGarage')['payDate'];
                $invoiceGarageDetail->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();

                $invoiceGarageDetail->modify = false;
                $invoiceGarageDetail->createdBy = \Auth::user()->id;
                $invoiceGarageDetail->updatedBy = \Auth::user()->id;

                if (!$invoiceGarageDetail->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceGarageDetail fail!'], 404);
                }

                DB::commit();

                $invoiceGarage = DB::table('invoiceGarages')
                    ->select('invoiceGarages.*', 'garages.name as garages_name')
                    ->join('transports', 'transports.invoiceGarage_id', '=', 'invoiceGarages.id')
                    ->join('costs', 'costs.transport_id', '=', 'transports.id')
                    ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
                    ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                    ->where([
                        ['invoiceGarages.active', '=', '1'],
                        ['garages.id', '<>', '1'],
                        ['invoiceGarages.id', '=', $invoiceGarage->id],
                    ])
                    ->first();

                $response = [
                    'msg'                   => 'Create Invoice successful!',
                    'invoiceGarage'       => $invoiceGarage,
                    'invoiceGarageDetail' => $invoiceGarageDetail,
                    'invoiceCode'           => $this->generateInvoiceCode('garage')
                ];
                return response()->json($response, 201);
            } catch (Exception $ex) {
                DB::rollBack();
                return response()->json(['msg' => $ex], 404);
            }
        }
    }

    public function postDeleteInvoiceGarage(Request $request)
    {
        $invoiceGarageId = $request->get('_invoiceGarage_id');
        if ($invoiceGarageId == '') {
            return response()->json(['msg' => 'Dữ liệu không hợp lệ.'], 404);
        }
        try {
            DB::beginTransaction();
            //Delete InvoiceGarageDetail
            $array_invoiceGarageDetail = InvoiceGarageDetail::where('invoiceGarage_id', $invoiceGarageId)->get();
            $array_invoiceGarageDetailId = null;
            if(count($array_invoiceGarageDetail) > 0){
                $array_invoiceGarageDetailId = collect($array_invoiceGarageDetail)->pluck('id');
                foreach ($array_invoiceGarageDetail as $invoiceGarageDetail) {
                    if (!$invoiceGarageDetail->delete()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Delete InvoiceGarageDetail fail.'], 404);
                    }
                }
            }

            //Delete InvoiceGarage
            $invoiceGarage = InvoiceGarage::find($invoiceGarageId);
            if(!$invoiceGarage){
                DB::rollBack();
                return response()->json(['msg' => 'InvoiceGarage does not exists.'], 404);
            }
            if (!$invoiceGarage->delete()) {
                DB::rollBack();
                return response()->json(['msg' => 'Delete InvoiceGarage fail.'], 404);
            }

            //Response
            $response = [
                'msg' => 'Delete InvoiceGarage successful!',
                'invoiceGarage' => $invoiceGarageId,
                'invoiceGarageDetails' => $array_invoiceGarageDetailId
            ];
            DB::commit();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    public function postDeleteInvoiceGarageDetail(Request $request)
    {
        $action = $request->get('_action');
        $invoiceGarageDetailId = $request->get('_invoiceGarageDetail_id');
        if ($invoiceGarageDetailId == '') {
            return response()->json(['msg' => 'Dữ liệu không hợp lệ.'], 404);
        }
        try {
            DB::beginTransaction();
            //Delete InvoiceGarageDetail
            $invoiceGarageDetail = InvoiceGarageDetail::find($invoiceGarageDetailId);
            if(!$invoiceGarageDetailId){
                DB::rollBack();
                return response()->json(['msg' => 'InvoiceGarageDetail does not exists.'], 404);
            }

            $invoiceGarage_id = $invoiceGarageDetail->invoiceGarage_id;
            $paidAmt = $invoiceGarageDetail->paidAmt;

            if (!$invoiceGarageDetail->delete()) {
                DB::rollBack();
                return response()->json(['msg' => 'Delete InvoiceGarageDetail fail.'], 404);
            }
            if($action == 'delete1'){
                //Update InvoiceGarage
                $invoiceGarage = InvoiceGarage::find($invoiceGarage_id);
                if(!$invoiceGarage){
                    DB::rollBack();
                    return response()->json(['msg' => 'InvoiceGarage does not exists.'], 404);
                }

                $invoiceGarage->totalPaid = $invoiceGarage->totalPaid - $paidAmt;
                $invoiceGarage->updatedBy = \Auth::user()->id;

                if (!$invoiceGarage->update()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Update InvoiceGarage fail.'], 404);
                }

                //Response
                $invoiceGarage = DB::table('invoiceGarages')
                    ->select('invoiceGarages.*', 'garages.name as garages_name')
                    ->join('transports', 'transports.invoiceGarage_id', '=', 'invoiceGarages.id')
                    ->join('costs', 'costs.transport_id', '=', 'transports.id')
                    ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
                    ->join('garages', 'garages.id', '=', 'vehicles.garage_id')
                    ->where([
                        ['invoiceGarages.active', '=', '1'],
                        ['garages.id', '<>', '1'],
                        ['invoiceGarages.id', '=', $invoiceGarage->id],
                    ])
                    ->first();

                $response = [
                    'msg' => 'Delete InvoiceGarage successful!',
                    'invoiceGarage' => $invoiceGarage,
                    'invoiceGarageDetail' => $invoiceGarageDetailId
                ];
            } else {
                //Delete InvoiceGarage
                $invoiceGarage = InvoiceGarage::find($invoiceGarage_id);
                if(!$invoiceGarage){
                    DB::rollBack();
                    return response()->json(['msg' => 'InvoiceGarage does not exists.'], 404);
                }
                if (!$invoiceGarage->delete()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Delete InvoiceGarage fail.'], 404);
                }

                //Response
                $response = [
                    'msg' => 'Delete InvoiceGarage successful!',
                    'invoiceGarage' => $invoiceGarage_id,
                    'invoiceGarageDetail' => $invoiceGarageDetailId
                ];
            }

            DB::commit();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }
}
