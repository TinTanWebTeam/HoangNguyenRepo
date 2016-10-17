<?php

namespace App\Http\Controllers;

use App\InvoiceCustomer;
use App\InvoiceCustomerDetail;
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
                'statuses_gar.status as status_garage_'
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
//            ->whereRaw('transports.cashReceive < transports.cashRevenue')
            ->where('transports.active', '=', '1')
            ->get();

        $invoiceCustomers = DB::table('invoiceCustomers')
            ->select('invoiceCustomers.*', 'customers.fullName')
            ->join('transports', 'transports.invoiceCustomer_id', '=', 'invoiceCustomers.id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->where('invoiceCustomers.active', '=', '1')
            ->select('invoiceCustomers.*', 'customers.fullName as customers_fullName')
            ->get();

        $invoiceCustomerDetails = DB::table('invoiceCustomerDetails')
            ->get();

        $printHistories = DB::table('printHistories')
            ->join('users', 'users.id', '=', 'printHistories.updatedBy')
            ->select('printHistories.*', 'users.fullName as users_fullName')
            ->get();

        $invoiceCode = $this->generateInvoiceCode();

        $response = [
            'msg'        => 'Get list all Transport',
            'transports' => $transports,
            'invoiceCustomers' => $invoiceCustomers,
            'invoiceCustomerDetails' => $invoiceCustomerDetails,
            'printHistories' => $printHistories,
            'invoiceCode' => $invoiceCode
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
                        'statuses_gar.status as status_garage_'
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
        if($action == 'new'){
            $array_transportId = $request->input('_array_transportId');

            $invoiceCustomer = new InvoiceCustomer();

            $invoiceCode = $this->generateInvoiceCode();
            if($request->input('_invoiceCustomer')['invoiceCode'] == '')
                $invoiceCustomer->invoiceCode = $invoiceCode;
            else
                $invoiceCustomer->invoiceCode = $request->input('_invoiceCustomer')['invoiceCode'];
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

            try{
                DB::beginTransaction();
                if(!$invoiceCustomer->save()){
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

                if(!$invoiceCustomerDetail->save()){
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceCustomerDetail fail!'], 404);
                }

                foreach ($array_transportId as $transport_id){
                    $transportUpdate = Transport::find($transport_id);
                    $transportUpdate->invoiceCustomer_id = $invoiceCustomer->id;
                    $transportUpdate->status_customer = 7;
                    $transportUpdate->updatedBy = \Auth::user()->id;

                    if(!$transportUpdate->save()){
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
                    'msg' => 'Create Invoice successful!',
                    'invoiceCustomer' => $invoiceCustomer,
                    'invoiceCustomerDetail' => $invoiceCustomerDetail,
                    'invoiceCode' => $this->generateInvoiceCode()
                ];
                return response()->json($response, 201);
            }catch (Exception $ex){
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

            try{
                DB::beginTransaction();
                if(!$invoiceCustomer->update()){
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

                if(!$invoiceCustomerDetail->save()){
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
                    'msg' => 'Create Invoice successful!',
                    'invoiceCustomer' => $invoiceCustomer,
                    'invoiceCustomerDetail' => $invoiceCustomerDetail,
                    'invoiceCode' => $this->generateInvoiceCode()
                ];
                return response()->json($response, 201);
            }catch (Exception $ex){
                DB::rollBack();
                return response()->json(['msg' => $ex], 404);
            }
        }
    }

    //Garage
    public function getViewDebtVehicleOutside()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }

    //Generate invoiceCode
    public function generateInvoiceCode()
    {
        $invoiceCode = "HD" . date('ymd');
        $stt = InvoiceCustomer::where('invoiceCode', 'like', $invoiceCode.'%')->get()->count();
        $invoiceCode .= substr("00" . $stt, -3);
        return $invoiceCode;
    }

}
