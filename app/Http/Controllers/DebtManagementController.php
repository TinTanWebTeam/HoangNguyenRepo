<?php

namespace App\Http\Controllers;

use App\InvoiceCustomer;
use App\Transport;
use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
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
            ->whereRaw('transports.cashReceive < transports.cashRevenue')
            ->where('transports.active', '=', '1')
            ->get();

        $invoiceCustomers = DB::table('invoiceCustomers')
            ->select('invoiceCustomers.*', 'customers.fullName')
            ->join('transports', 'transports.invoiceCustomer_id', '=', 'invoiceCustomers.id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->where('invoiceCustomers.active', '=', '1')
            ->get();

        $response = [
            'msg'        => 'Get list all Transport',
            'transports' => $transports,
            'invoiceCustomers' => $invoiceCustomers
        ];
        return response()->json($response, 200);
    }

    public function postModifyDebtCustomer(Request $request)
    {
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

    public function postExportInvoiceCustomer(Request $request)
    {
        $transports = $request->input('_transports');

        $invoice = new Invoice();
        $invoice->VAT = "";
        $invoice->notVAT = "";
        $invoice->hasVAT = "";
        $invoice->exportDate = "";
        $invoice->invoiceDate = "";
        $invoice->payDate = "";
        $invoice->note = "";
        $invoice->createdBy = \Auth::user()->id;
        $invoice->updatedBy = \Auth::user()->id;

        try{
            DB::beginTransaction();
            if(!$invoice->save()){
                DB::rollBack();
                return response()->json(['msg' => 'Create new Invoice fail!'], 404);
            }
            foreach ($transports as $transport){
                $transportUpdate = Transport::find($transport['id']);
                $transportUpdate->cashReceive = $transportUpdate->cashRevenue;
                $transportUpdate->invoice_id = $invoice->id;
                $transportUpdate->status_customer = 7;

                if(!$transportUpdate->update()){
                    DB::rollBack();
                    return response()->json(['msg' => 'Update transport fail!'], 404);
                }
            }
            DB::commit();
            $response = [
                'msg' => 'Export Invoice successful!'
            ];
            return response()->json($response, 201);
        }catch (Exception $ex){
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }


    }

    //Garage
    public function getViewDebtVehicleOutside()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }

}
