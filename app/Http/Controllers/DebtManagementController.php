<?php

namespace App\Http\Controllers;

use App\Garage;
use App\InvoiceCustomer;
use App\InvoiceCustomerDetail;
use App\InvoiceGarage;
use App\InvoiceGarageDetail;
use App\Transport;
use App\TransportInvoice;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use League\Flysystem\Exception;

class DebtManagementController extends Controller
{
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

    //Customer
    public function getViewDebtCustomer()
    {
        return view('subviews.Debt.DebtCustomer');
    }

    public function getDataDebtCustomer()
    {
        $transports = \DB::table('transports')
            ->select('transports.*',
                'products.name as products_name',
                'customers.fullName as customers_fullName',
                'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'costs.cost', 'costs.note as costs_note',
                'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                'statuses_tran.status as status_transport_',
                'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_'
            )
            ->leftJoin('products', 'products.id', '=', 'transports.product_id')
            ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
            ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
            ->leftJoin('costs', 'costs.transport_id', '=', 'transports.id')
            ->leftJoin('prices', 'prices.id', '=', 'costs.price_id')
            ->leftJoin('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
            ->leftJoin('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
            ->leftJoin('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
            ->leftJoin('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
            ->where('transports.active', 1)
            ->get();

        $invoiceCustomers = DB::table('invoiceCustomers')
            ->select('invoiceCustomers.*', 'customers.fullName as customers_fullName')
            ->leftJoin('transportInvoices', 'transportInvoices.invoiceCustomer_id', '=', 'invoiceCustomers.id')
            ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
            ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
            ->where('invoiceCustomers.active', 1)
            ->get();

        $invoiceCustomerDetails = DB::table('invoiceCustomerDetails')
            ->get();

        $printHistories = DB::table('printHistories')
            ->leftJoin('users', 'users.id', '=', 'printHistories.updatedBy')
            ->select('printHistories.*', 'users.fullName as users_fullName')
            ->get();

        $invoiceCode = $this->generateInvoiceCode('customer');

        $transportInvoices = DB::table('transportInvoices')->get();

        $response = [
            'msg'                    => 'Get list all Transport',
            'transports'             => $transports,
            'invoiceCustomers'       => $invoiceCustomers,
            'invoiceCustomerDetails' => $invoiceCustomerDetails,
            'printHistories'         => $printHistories,
            'invoiceCode'            => $invoiceCode,
            'transportInvoices'      => $transportInvoices
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
                $transport = \DB::table('transports')
                    ->select('transports.*',
                        'products.name as products_name',
                        'customers.fullName as customers_fullName',
                        'vehicles.areaCode as vehicles_areaCode',
                        'vehicles.vehicleNumber as vehicles_vehicleNumber',
                        'costs.cost', 'costs.note as costs_note',
                        'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                        'statuses_tran.status as status_transport_',
                        'statuses_cust.status as status_customer_',
                        'statuses_gar.status as status_garage_'
                    )
                    ->leftJoin('products', 'products.id', '=', 'transports.product_id')
                    ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
                    ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
                    ->leftJoin('costs', 'costs.transport_id', '=', 'transports.id')
                    ->leftJoin('prices', 'prices.id', '=', 'costs.price_id')
                    ->leftJoin('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
                    ->leftJoin('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
                    ->leftJoin('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
                    ->leftJoin('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
                    ->where([
                        ['transports.active', '=', 1],
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

    //Invoice Customer
    public function postValidateTransportCustomer(Request $request)
    {
        $array_transportId = $request->input('_array_transportId');

        #Kiểm tra cùng khách hàng
        $arrayCustomer = Transport::whereIn('id', $array_transportId)->pluck('customer_id');
        $collection = collect($arrayCustomer);
        $unique = $collection->unique();
        if(count($unique->values()->all()) != 1){
            $response = [
                'status' => 0,
                'msg' => 'Các đơn hàng có khách hàng không giống nhau.'
            ];
            return response()->json($response, 203);
        }

        #Kiểm tra đơn hàng đã xuất hđ hay chưa
        $kt = false;
        $array_transportInvoice = TransportInvoice::whereIn('transport_id', $array_transportId)
            ->where('invoiceCustomer_id', '<>', null)
            ->get();
        if(count($array_transportInvoice) > 0)
            $kt = true;

        //Nếu chưa xuất hóa đơn lần nào
        if(!$kt){
            $arr_transport = Transport::whereIn('id', $array_transportId)->get();
            $totalPay = $arr_transport->pluck('cashRevenue');
            $sum_totalPay = array_sum($totalPay->toArray());

            $prePaid = $arr_transport->pluck('cashReceive');
            $sum_prePaid = array_sum($prePaid->toArray());
            //Tiền trả trước > 0, cho dùng checkbox
            if($sum_prePaid > 0)
                $statusPrePaid = 0;
            //Tiền trả trước <= 0, ko cho dùng checkbox
            else
                $statusPrePaid = 1;
            $response = [
                'status' => 1,
                'totalPay' => $sum_totalPay,
                'prePaid' => $sum_prePaid,
                'statusPrePaid' => $statusPrePaid,
                'msg' => 'Các đơn hàng chưa xuất hóa đơn, hợp lệ cho thêm mới'
            ];
            return response()->json($response, 200);
        }
        //Nếu đã xuất hóa đơn
        else {
            #Kiểm tra xem các đơn hàng đã chọn và các đơn hàng ở database có khớp nhau không?
            $arrayInvoice = TransportInvoice::where('transport_id', $array_transportId[0])
                ->where('invoiceCustomer_id', '<>', null)
                ->pluck('invoiceCustomer_id');
            if($arrayInvoice == null) {
                $response = [
                    'status' => 0,
                    'totalPay' => 0,
                    'msg' => 'Không tìm thấy arrayInvoice'
                ];
                return response()->json($response, 203);
            };
            $array_match = true;
            foreach($arrayInvoice as $invoiceId){
                $arrayTransport = TransportInvoice::where('invoiceCustomer_id', $invoiceId)
                    ->where('invoiceCustomer_id', '<>', null)
                    ->pluck('transport_id');
                if($arrayTransport == null) {
                    $response = [
                        'status' => 0,
                        'totalPay' => 0,
                        'msg' => 'Không tìm thấy arrayTransport'
                    ];
                    return response()->json($response, 203);
                }
                $collectTransportStock = collect($array_transportId);
                $diff = $collectTransportStock->diff($arrayTransport);
                if(count($diff->all()) > 0){
                    //khac nhau
                    $array_match = false;
                }
            }
            //Nếu các đơn hàng không khớp nhau
            if(!$array_match){
                $response = [
                    'status' => 0,
                    'totalPay' => 0,
                    'msg' => 'Các đơn hàng không khớp nhau.'
                ];
                return response()->json($response, 203);
            }
            //Nếu các đơn hàng khớp nhau
            else {
                #Kiểm tra xem đã dùng trả trước hay chưa
                $statusPrePaid = InvoiceCustomer::whereIn('id', $arrayInvoice)->pluck('statusPrePaid');
                //Nếu đã dùng trả trước
                if (in_array(1, $statusPrePaid->toArray())) {
                    $statusPrePaid = 1;
                }
                //Nếu chưa dùng trả trước
                else {
                    #Kiểm tra tiền trả trước nếu bé hơn hoặc = 0 thì k cho dùng checkbox
                    $prePaid = Transport::whereIn('id', $array_transportId)->pluck('cashReceive');
                    $sum_prePaid = array_sum($prePaid->toArray());
                    //Tiền trả trước > 0, cho dùng checkbox
                    if($sum_prePaid > 0)
                        $statusPrePaid = 0;
                    //Tiền trả trước <= 0, ko cho dùng checkbox
                    else
                        $statusPrePaid = 1;
                }

                #Tính totalPay (Tổng tiền) cho lần tạo mới hóa đơn này
                $invoice = InvoiceCustomer::find($arrayInvoice[0]);
                $invoices = InvoiceCustomer::whereIn('id', $arrayInvoice)->get();
                if($invoice == null){
                    $response = [
                        'status' => 0,
                        'totalPay' => 0,
                        'msg' => 'Không tìm thấy invoices'
                    ];
                    return response()->json($response, 203);
                }

                $totalTransport = $invoice->totalTransport;
                $prePaid = $invoice->prePaid;;
                $totalPay = 0;

                foreach($invoices as $invoice_item){
                    $totalPay += $invoice_item->totalPay;
                }
                $totalPay = $totalTransport - $totalPay;

                if($statusPrePaid == 1)
                    $totalPay -= $prePaid;

                if($totalPay == 0){
                    $response = [
                        'status' => 0,
                        'totalPay' => 0,
                        'msg' => 'Các đơn hàng đã xuất hết hóa đơn.'
                    ];
                    return response()->json($response, 203);
                }

                #Tính debt-real (Nợ thực tế)
                $totalPaid = InvoiceCustomerDetail::whereIn('invoiceCustomer_id', $arrayInvoice)->pluck('paidAmt');
                $sum_totalPaid = array_sum($totalPaid->toArray());
                $debtReal = $totalTransport - $prePaid - $sum_totalPaid;
                dd($debtReal);

                $response = [
                    'status' => 2,
                    'totalPay' => $totalPay,
                    'prePaid' => $prePaid,
                    'debtReal' => $debtReal,
                    'statusPrePaid' => $statusPrePaid,
                    'msg' => 'Các đơn hàng khớp nhau'
                ];
                return response()->json($response, 200);
            }
        }
    }

    public function postModifyInvoiceCustomer(Request $request)
    {
        $action = $request->input('_action');
        $invoiceCode = $request->input('_invoiceCustomer')['invoiceCode'];
        $note = $request->input('_invoiceCustomer')['note'];
        $totalTransport = $request->input('_invoiceCustomer')['totalTransport'];
        $prePaid = $request->input('_invoiceCustomer')['prePaid'];
        $totalPay = $request->input('_invoiceCustomer')['totalPay'];
        $totalPaid = $request->input('_invoiceCustomer')['paidAmt'];
        $vat = $request->input('_invoiceCustomer')['VAT'];
        $hasVat = $request->input('_invoiceCustomer')['hasVAT'];
        $exportDate = $request->input('_invoiceCustomer')['exportDate'];
        $exportDate = Carbon::createFromFormat('d-m-Y', $exportDate)->toDateTimeString();
        $invoiceDate = $request->input('_invoiceCustomer')['invoiceDate'];
        $invoiceDate = Carbon::createFromFormat('d-m-Y', $invoiceDate)->toDateTimeString();
        $payDate = $request->input('_invoiceCustomer')['payDate'];
        $payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();
        $statusPrePaid = $request->input('_invoiceCustomer')['statusPrePaid'];

        $createdBy = \Auth::user()->id;
        $updatedBy = \Auth::user()->id;
        $invoiceType = 0;
        if ($action == 'new') {
            $array_transportId = $request->input('_array_transportId');

            //Kiem tra xem cac transport nay da xuat hoa don chua
            //Neu da xuat hoa don thi kiem tra xem ma cac hoa don do co giong nhau khong
            //Neu giong nhau tien hanh them hoa don them lan nua

            //Kiểm tra xem đã xuất hđ hay chưa
            $kt = false;
            $array_transportInvoice = TransportInvoice::whereIn('transport_id', $array_transportId)->get();
            if(count($array_transportInvoice) > 0)
                $kt = true;

            //Nếu đã xuất hóa đơn
            if($kt){
                $arrayInvoice = TransportInvoice::where('transport_id', $array_transportId[0])->pluck('invoiceCustomer_id');
                if($arrayInvoice == null) {
                    return response()->json(['msg' => 'Không tìm thấy arrayInvoice'], 203);
                };
                $array_match = true;
                foreach($arrayInvoice as $invoiceId){
                    $arrayTransport = TransportInvoice::where('invoiceCustomer_id', $invoiceId)->pluck('transport_id');
                    if($arrayTransport == null) {
                        return response()->json(['msg' => 'Không tìm thấy arrayTransport'], 203);
                    }
                    $collectTransportStock = collect($array_transportId);
                    $diff = $collectTransportStock->diff($arrayTransport);
                    if(count($diff->all()) > 0){
                        //khac nhau
                        $array_match = false;
                    }
                }
                if(!$array_match){
                    return response()->json(['msg' => 'Các đơn hàng đã chọn không khớp nhau.'], 203);
                }
            }

            $invoiceCustomer = new InvoiceCustomer();

            if ($invoiceCode == '')
                $invoiceCustomer->invoiceCode = $this->generateInvoiceCode('customer');
            else {
                if (InvoiceCustomer::where('invoiceCode', $invoiceCode)->get()->count() == 0)
                    $invoiceCustomer->invoiceCode = $invoiceCode;
                else
                    return response()->json(['msg' => 'invoiceCode exists!'], 203);
            }

            $invoiceCustomer->VAT = $vat;
            $invoiceCustomer->notVAT = $totalPay;
            $invoiceCustomer->hasVAT = $hasVat;
            $invoiceCustomer->exportDate = $exportDate;
            $invoiceCustomer->invoiceDate = $invoiceDate;
            $invoiceCustomer->payDate = $payDate;
            $invoiceCustomer->note = $note;
            $invoiceCustomer->totalPay = $totalPay;
            $invoiceCustomer->totalTransport = $totalTransport;
            $invoiceCustomer->prePaid = $prePaid;
            $invoiceCustomer->totalPaid = $totalPaid;
            $invoiceCustomer->createdBy = $createdBy;
            $invoiceCustomer->updatedBy = $updatedBy;
            $invoiceCustomer->statusPrePaid = $statusPrePaid;
            $invoiceCustomer->invoiceType = 0;
            try {
                DB::beginTransaction();
                //Insert Invoice
                if (!$invoiceCustomer->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create new Invoice fail!'], 404);
                }

                //Insert InvoiceDetail
                $invoiceCustomerDetail = new InvoiceCustomerDetail();
                $invoiceCustomerDetail->invoiceCustomer_id = $invoiceCustomer->id;
                $invoiceCustomerDetail->paidAmt = $totalPaid;

                $payDate = $request->input('_invoiceCustomer')['payDate'];
                $invoiceCustomerDetail->payDate = $payDate;

                $invoiceCustomerDetail->modify = false;
                $invoiceCustomerDetail->createdBy = $createdBy;
                $invoiceCustomerDetail->updatedBy = $updatedBy;

                if (!$invoiceCustomerDetail->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceCustomerDetail fail!'], 404);
                }

                //Update InvoiceCustomer_id for Transport
                foreach ($array_transportId as $transport_id) {
                    $transportUpdate = Transport::find($transport_id);
                    $transportUpdate->status_customer = 7;
                    $transportUpdate->updatedBy = \Auth::user()->id;

                    if (!$transportUpdate->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update transport fail!'], 404);
                    }

                    //Insert TransportInvoice
                    $transportInvoice = new TransportInvoice();
                    $transportInvoice->transport_id = $transportUpdate->id;
                    $transportInvoice->invoiceCustomer_id = $invoiceCustomer->id;
                    $transportInvoice->createdBy = $createdBy;
                    $transportInvoice->updatedBy = $updatedBy;

                    if(!$transportInvoice->save()){
                        DB::rollBack();
                        return response()->json(['msg' => 'Create transportInvoice fail!'], 404);
                    }
                }

                DB::commit();

                $invoiceCustomer = DB::table('invoiceCustomers')
                    ->leftJoin('transportInvoices', 'transportInvoices.invoiceCustomer_id', '=', 'invoiceCustomers.id')
                    ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
                    ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
                    ->where([
                        ['invoiceCustomers.id', '=', $invoiceCustomer->id],
                        ['invoiceCustomers.active', '=', 1]
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
            $invoiceCustomer->exportDate = $exportDate;
            $invoiceCustomer->invoiceDate = $invoiceDate;
            $invoiceCustomer->payDate = $payDate;
            $invoiceCustomer->note = $note;
            $invoiceCustomer->totalPaid += $totalPaid;
            $invoiceCustomer->updatedBy = $updatedBy;

            try {
                DB::beginTransaction();
                //Update Invoice
                if (!$invoiceCustomer->update()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Update Invoice fail!'], 404);
                }

                //Insert InvoiceDetail
                $invoiceCustomerDetail = new InvoiceCustomerDetail();
                $invoiceCustomerDetail->invoiceCustomer_id = $invoiceCustomer->id;
                $invoiceCustomerDetail->paidAmt = $totalPaid;
                $invoiceCustomerDetail->payDate = $payDate;

                $invoiceCustomerDetail->modify = false;
                $invoiceCustomerDetail->createdBy = $createdBy;
                $invoiceCustomerDetail->updatedBy = $updatedBy;

                if (!$invoiceCustomerDetail->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceCustomerDetail fail!'], 404);
                }

                //Nothing happen with TransportInvoice

                DB::commit();

                $invoiceCustomer = DB::table('invoiceCustomers')
                    ->leftJoin('transportInvoices', 'transportInvoices.invoiceCustomer_id', '=', 'invoiceCustomers.id')
                    ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
                    ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
                    ->where([
                        ['invoiceCustomers.id', '=', $invoiceCustomer->id],
                        ['invoiceCustomers.active', '=', 1]
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
            //Delete TransportInvoice
            $array_transportInvoice = TransportInvoice::where('invoiceCustomer_id', $invoiceCustomerId)->get();
            if(count($array_transportInvoice) > 0){
                foreach ($array_transportInvoice as $transportInvoice) {
                    if (!$transportInvoice->delete()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Delete TransportInvoice fail.'], 404);
                    }
                }
            }

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
                    ->leftJoin('transportInvoices', 'transportInvoices.invoiceCustomer_id', '=', 'invoiceCustomers.id')
                    ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
                    ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
                    ->where([
                        ['invoiceCustomers.active', '=', 1],
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

                //Delete TransportInvoice
                $array_transportInvoice = TransportInvoice::where('invoiceCustomer_id', $invoiceCustomer->id)->get();
                if(count($array_transportInvoice) > 0){
                    foreach ($array_transportInvoice as $transportInvoice) {
                        if (!$transportInvoice->delete()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Delete TransportInvoice fail.'], 404);
                        }
                    }
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

    ###############################

    //Garage
    public function getViewDebtGarage()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }

    public function getDataDebtGarage()
    {
        $transports = \DB::table('transports')
            ->select('transports.*',
                'products.name as products_name',
                'customers.fullName as customers_fullName',
                'garages.name as garages_name',
                'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'costs.cost', 'costs.note as costs_note',
                'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_'
            )
            ->leftJoin('products', 'products.id', '=', 'transports.product_id')
            ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
            ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
            ->leftJoin('garages', 'garages.id', '=', 'vehicles.garage_id')
            ->leftJoin('costs', 'costs.transport_id', '=', 'transports.id')
            ->leftJoin('prices', 'prices.id', '=', 'costs.price_id')
            ->leftJoin('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
            ->leftJoin('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
            ->leftJoin('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
            ->leftJoin('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
            ->where([
                ['transports.active', '=', 1],
                ['transports.product_id', '<>', 0],
                ['transports.vehicle_id', '<>', 0],
                ['transports.customer_id', '<>', 0]
            ])
            ->get();

        $invoiceGarages = DB::table('invoiceGarages')
            ->select('invoiceGarages.*', 'garages.name as garages_name')
            ->leftJoin('transportInvoices', 'transportInvoices.invoiceGarage_id', '=', 'invoiceGarages.id')
            ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
            ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
            ->leftJoin('garages', 'garages.id', '=', 'vehicles.garage_id')
            ->where([
                ['invoiceGarages.active', 1],
                ['transports.active', '=', 1],
                ['transports.product_id', '<>', 0],
                ['transports.vehicle_id', '<>', 0],
                ['transports.customer_id', '<>', 0]
            ])
            ->get();

        $invoiceGarageDetails = DB::table('invoiceGarageDetails')
            ->get();

        $printHistories = DB::table('printHistories')
            ->leftJoin('users', 'users.id', '=', 'printHistories.updatedBy')
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

            if (!$transportUpdate->update()) {
                DB::rollBack();
                return response()->json(['msg' => 'Update failed'], 404);
            }
            //Response
            $transport = \DB::table('transports')
                ->select('transports.*',
                    'products.name as products_name',
                    'customers.fullName as customers_fullName',
                    'garages.name as garages_name',
                    'vehicles.areaCode as vehicles_areaCode',
                    'vehicles.vehicleNumber as vehicles_vehicleNumber',
                    'costs.cost', 'costs.note as costs_note',
                    'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                    'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                    'statuses_gar.status as status_garage_'
                )
                ->leftJoin('products', 'products.id', '=', 'transports.product_id')
                ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
                ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
                ->leftJoin('garages', 'garages.id', '=', 'vehicles.garage_id')
                ->leftJoin('costs', 'costs.transport_id', '=', 'transports.id')
                ->leftJoin('prices', 'prices.id', '=', 'costs.price_id')
                ->leftJoin('costPrices', 'costPrices.id', '=', 'prices.costPrice_id')
                ->leftJoin('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
                ->leftJoin('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
                ->leftJoin('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
                ->where([
                    ['transports.active', '=', 1],
                    ['transports.product_id', '<>', 0],
                    ['transports.vehicle_id', '<>', 0],
                    ['transports.customer_id', '<>', 0],
                    ['transports.id', '=', $transportUpdate->id]
                ])
                ->first();
            $response = [
                'msg'       => 'Updated transport',
                'transport' => $transport
            ];
            DB::commit();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    //Invoice Garage
    public function postValidateTransportGarage(Request $request)
    {
        $array_transportId = $request->input('_array_transportId');

        //Kiểm tra cùng nhà xe
        $arrayVehicle = Transport::whereIn('id', $array_transportId)->pluck('vehicle_id');
        $arrayGarage = Garage::whereIn('id', $arrayVehicle)->pluck('id');
        $collection = collect($arrayGarage);
        $unique = $collection->unique();
        if(count($unique->values()->all()) != 1){
            return response()->json(['status' => 0, 'msg' => 'Các đơn hàng có nhà xe không giống nhau.'], 203);
        }

        //Kiểm tra xem đã xuất hđ hay chưa
        $kt = false;
        $array_transportInvoice = TransportInvoice::whereIn('transport_id', $array_transportId)
            ->where('invoiceGarage_id', '<>', null)
            ->get();
        if(count($array_transportInvoice) > 0)
            $kt = true;

        //Nếu đã xuất hóa đơn
        if($kt){
            $arrayInvoice = TransportInvoice::where('transport_id', $array_transportId[0])
                ->where('invoiceGarage_id', '<>', null)
                ->pluck('invoiceGarage_id');
            if($arrayInvoice == null) {
                return response()->json(['status' => 0, 'totalPay' => 0, 'msg' => 'Không tìm thấy arrayInvoice'], 203);
            };
            $array_match = true;
            foreach($arrayInvoice as $invoiceId){
                $arrayTransport = TransportInvoice::where('invoiceGarage_id', $invoiceId)
                    ->where('invoiceGarage_id', '<>', null)
                    ->pluck('transport_id');
                if($arrayTransport == null) {
                    return response()->json(['status' => 0, 'totalPay' => 0, 'msg' => 'Không tìm thấy arrayTransport'], 203);
                }
                $collectTransportStock = collect($array_transportId);
                $diff = $collectTransportStock->diff($arrayTransport);
                if(count($diff->all()) > 0){
                    //khac nhau
                    $array_match = false;
                }
            }
            if($array_match){
                $invoices = InvoiceGarage::find($arrayInvoice[0])->get();
                if($invoices == null)
                    return response()->json(['status' => 0, 'totalPay' => 0, 'msg' => 'Không tìm thấy invoices'], 203);

                $totalTransport = $invoices[0]->totalTransport;
                $totalPay = 0;
                foreach($invoices as $invoice){
                    $totalPay += $invoice->totalPay;
                }
                $totalPay = $totalTransport - $totalPay;
                if($totalPay == 0){
                    return response()->json(['status' => 0, 'totalPay' => 0, 'msg' => 'Các đơn hàng đã xuất hết hóa đơn.'], 203);
                }
                return response()->json(['status' => 2, 'totalPay' => $totalPay, 'msg' => 'Các đơn hàng khớp nhau'], 200);
            }
            else{
                return response()->json(['status' => 0, 'totalPay' => 0, 'msg' => 'Các đơn hàng không khớp nhau.'], 203);
            }
        } else {
            return response()->json(['status' => 1, 'totalPay' => 0, 'msg' => 'Các đơn hàng chưa xuất hóa đơn, hợp lệ cho thêm mới'], 200);
        }
    }

    public function postModifyInvoiceGarage(Request $request)
    {
        $action = $request->input('_action');
        if ($action == 'new') {
            $array_transportId = $request->input('_array_transportId');

            //Kiem tra xem cac transport nay da xuat hoa don chua
            //Neu da xuat hoa don thi kiem tra xem ma cac hoa don do co giong nhau khong
            //Neu giong nhau tien hanh them hoa don them lan nua

            //Kiểm tra xem đã xuất hđ hay chưa
            $kt = false;
            $array_transportInvoice = TransportInvoice::whereIn('transport_id', $array_transportId)->get();
            if(count($array_transportInvoice) > 0)
                $kt = true;

            //Nếu đã xuất hóa đơn
            if($kt){
                $arrayInvoice = TransportInvoice::where('transport_id', $array_transportId[0])->pluck('invoiceGarage_id');
                if($arrayInvoice == null) {
                    return response()->json(['msg' => 'Không tìm thấy arrayInvoice'], 203);
                };
                $array_match = true;
                foreach($arrayInvoice as $invoiceId){
                    $arrayTransport = TransportInvoice::where('invoiceGarage_id', $invoiceId)->pluck('transport_id');
                    if($arrayTransport == null) {
                        return response()->json(['msg' => 'Không tìm thấy arrayTransport'], 203);
                    }
                    $collectTransportStock = collect($array_transportId);
                    $diff = $collectTransportStock->diff($arrayTransport);
                    if(count($diff->all()) > 0){
                        //khac nhau
                        $array_match = false;
                    }
                }
                if(!$array_match){
                    return response()->json(['msg' => 'Các đơn hàng đã chọn không khớp nhau.'], 203);
                }
            }

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
            $invoiceGarage->totalTransport = $request->input('_invoiceGarage')['totalTransport'];
            $invoiceGarage->prePaid = $request->input('_invoiceGarage')['prePaid'];
            $invoiceGarage->totalPaid = $request->input('_invoiceGarage')['paidAmt'];
            $invoiceGarage->createdBy = \Auth::user()->id;
            $invoiceGarage->updatedBy = \Auth::user()->id;

            try {
                DB::beginTransaction();
                //Insert InvoiceGarage
                if (!$invoiceGarage->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create new Invoice fail!'], 404);
                }

                //Insert InvoiceGarageDetail
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

                //Update InvoiceGarage_id for Transport
                foreach ($array_transportId as $transport_id) {
                    $transportUpdate = Transport::find($transport_id);
                    $transportUpdate->status_garage = 7;
                    $transportUpdate->updatedBy = \Auth::user()->id;

                    if (!$transportUpdate->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update transport fail!'], 404);
                    }

                    //Insert TransportInvoice
                    $transportInvoice = new TransportInvoice();
                    $transportInvoice->transport_id = $transportUpdate->id;
                    $transportInvoice->invoiceGarage_id = $invoiceGarage->id;
                    $transportInvoice->createdBy = \Auth::user()->id;
                    $transportInvoice->updatedBy = \Auth::user()->id;

                    if(!$transportInvoice->save()){
                        DB::rollBack();
                        return response()->json(['msg' => 'Create transportInvoice fail!'], 404);
                    }
                }

                DB::commit();

                $invoiceGarage = DB::table('invoiceGarages')
                    ->select('invoiceGarages.*', 'garages.name as garages_name')
                    ->leftJoin('transportInvoices', 'transportInvoices.invoiceGarage_id', '=', 'invoiceGarages.id')
                    ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
                    ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
                    ->leftJoin('garages', 'garages.id', '=', 'vehicles.garage_id')
                    ->where([
                        ['invoiceGarages.active', '=', 1],
                        ['invoiceGarages.id', '=', $invoiceGarage->id],
                        ['transports.active', '=', 1],
                        ['transports.product_id', '<>', 0],
                        ['transports.vehicle_id', '<>', 0],
                        ['transports.customer_id', '<>', 0]
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
                //Update Invoice
                if (!$invoiceGarage->update()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Update Invoice fail!'], 404);
                }

                //Insert InvoiceDetail
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

                //Nothing happen with TransportInvoice

                DB::commit();

                $invoiceGarage = DB::table('invoiceGarages')
                    ->select('invoiceGarages.*', 'garages.name as garages_name')
                    ->leftJoin('transportInvoices', 'transportInvoices.invoiceGarage_id', '=', 'invoiceGarages.id')
                    ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
                    ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
                    ->leftJoin('garages', 'garages.id', '=', 'vehicles.garage_id')
                    ->where([
                        ['invoiceGarages.active', '=', 1],
                        ['invoiceGarages.id', '=', $invoiceGarage->id],
                        ['transports.active', '=', 1],
                        ['transports.product_id', '<>', 0],
                        ['transports.vehicle_id', '<>', 0],
                        ['transports.customer_id', '<>', 0]
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
            //Delete TransportInvoice
            $array_transportInvoice = TransportInvoice::where('invoiceGarage_id', $invoiceGarageId)->get();
            if(count($array_transportInvoice) > 0){
                foreach ($array_transportInvoice as $transportInvoice) {
                    if (!$transportInvoice->delete()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Delete TransportInvoice fail.'], 404);
                    }
                }
            }

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
                    ->leftJoin('transportInvoices', 'transportInvoices.invoiceGarage_id', '=', 'invoiceGarages.id')
                    ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
                    ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
                    ->leftJoin('garages', 'garages.id', '=', 'vehicles.garage_id')
                    ->where([
                        ['invoiceGarages.active', '=', 1],
                        ['invoiceGarages.id', '=', $invoiceGarage->id],
                        ['transports.active', '=', 1],
                        ['transports.product_id', '<>', 0],
                        ['transports.vehicle_id', '<>', 0],
                        ['transports.customer_id', '<>', 0]
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

                //Delete TransportInvoice
                $array_transportInvoice = TransportInvoice::where('invoiceGarage_id', $invoiceGarage->id)->get();
                if(count($array_transportInvoice) > 0){
                    foreach ($array_transportInvoice as $transportInvoice) {
                        if (!$transportInvoice->delete()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Delete TransportInvoice fail.'], 404);
                        }
                    }
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
