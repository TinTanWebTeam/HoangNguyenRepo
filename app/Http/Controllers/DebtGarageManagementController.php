<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Garage;
use App\InvoiceCustomer;
use App\InvoiceCustomerDetail;
use App\InvoiceGarage;
use App\InvoiceGarageDetail;
use App\Transport;
use App\TransportInvoice;
use App\Vehicle;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

use League\Flysystem\Exception;

class DebtGarageManagementController extends Controller
{
    private $firstDayUTS;
    private $lastDayUTS;

    public function __construct()
    {
        $this->firstDayUTS = mktime(0, 0, 0, date("m"), 1, date("Y"));
        $this->lastDayUTS = mktime(0, 0, 0, date("m"), date('t'), date("Y"));
    }

    //Function
    public function generateInvoiceCode($type)
    {
        switch ($type) {
            case 'bill_garage':
                $invoiceCode = "BG" . date('ymd');
                break;
            default:
                break;
        }

        $stt = InvoiceGarage::where('invoiceCode', 'like', $invoiceCode . '%')->get()->count() + 1;
        $invoiceCode .= substr("00" . $stt, -3);
        return $invoiceCode;
    }

    public function getDataDebtGarage()
    {
        $response = $this->DataDebtGarage();
        return response()->json($response, 200);
    }

    public function DataDebtGarage()
    {
        $transports = \DB::table('transports')
            ->select('transports.*',
                DB::raw("sum(transports.cashDelivery)  AS totalDelivery"),
                DB::raw("sum(transports.cashPreDelivery)  AS totalPreDelivery"),
                'products.name as products_name',
                'customers.fullName as customers_fullName',
                'garages.name as garages_name',
                'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'costs.cost', 'costs.note as costs_note',
                'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_',
                'users_createdBy.fullName as users_createdBy',
                'users_updatedBy.fullName as users_updatedBy'
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
            ->leftJoin('users as users_createdBy', 'users_createdBy.id', '=', 'transports.createdBy')
            ->leftJoin('users as users_updatedBy', 'users_updatedBy.id', '=', 'transports.updatedBy')
            ->where([
                ['transports.active', '=', 1],
                ['transports.product_id', '<>', 0],
                ['transports.vehicle_id', '<>', 0],
                ['transports.customer_id', '<>', 0],
                ['transports.status_invoice_garage', '=', 0]
            ])
            ->groupBy('transports.vehicle_id')
            ->orderBy('transports.receiveDate', 'desc')
            ->get();


//        Trả đủ
        $debtTransports = \DB::table('transports')
            ->select('transports.*',
                'products.name as products_name',
                'customers.fullName as customers_fullName',
                'garages.name as garages_name',
                'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'costs.cost', 'costs.note as costs_note',
                'costPrices.name as costPrices_name', 'costPrices.id as costPrices_id',
                'statuses_tran.status as status_transport_', 'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_',
                'users_createdBy.fullName as users_createdBy',
                'users_updatedBy.fullName as users_updatedBy'
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
            ->leftJoin('users as users_createdBy', 'users_createdBy.id', '=', 'transports.createdBy')
            ->leftJoin('users as users_updatedBy', 'users_updatedBy.id', '=', 'transports.updatedBy')
            ->where([
                ['transports.active', '=', 1],
                ['transports.product_id', '<>', 0],
                ['transports.vehicle_id', '<>', 0],
                ['transports.customer_id', '<>', 0],
                ['transports.status_invoice_garage', '=', 3]
            ])
            ->orderBy('transports.receiveDate', 'desc')
            ->get();


        //Phiếu thanh toán
        $invoiceGarages = DB::table('invoiceGarages')
            ->select('invoiceGarages.*',
                'garages.name as garages_name',
                'vehicles.areaCode as vehicles_areaCode',
                'vehicles.id as vehicle_id',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'users_createdBy.fullName as users_createdBy',
                'users_updatedBy.fullName as users_updatedBy',
                'invoiceGarageDetails.payDate as payDate_detail'
            )
            ->leftJoin('invoiceGarageDetails', 'invoiceGarages.id', '=', 'invoiceGarageDetails.invoiceGarage_id')
            ->leftJoin('transportInvoices', 'transportInvoices.invoiceGarage_id', '=', 'invoiceGarages.id')
            ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
            ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
            ->leftJoin('garages', 'garages.id', '=', 'vehicles.garage_id')
            ->leftJoin('users as users_createdBy', 'users_createdBy.id', '=', 'transports.createdBy')
            ->leftJoin('users as users_updatedBy', 'users_updatedBy.id', '=', 'transports.updatedBy')
            ->where([
                ['invoiceGarages.active', 1],
                ['transports.active', '=', 1],
                ['transports.product_id', '<>', 0],
                ['transports.vehicle_id', '<>', 0],
                ['transports.customer_id', '<>', 0],
                ['transports.status_invoice_garage', '=', 1]
            ])
            ->groupBy('invoiceGarages.id')
            ->get();

// chi tiet ptt
        $detailPtt = DB::table('invoiceGarageDetails')
            ->leftJoin('invoiceGarages', 'invoiceGarageDetails.invoiceGarage_id', '=', 'invoiceGarages.id')
            ->leftJoin('transportInvoices', 'invoiceGarages.id', '=', 'transportInvoices.invoiceGarage_id')
            ->leftJoin('transports', 'transports.id', '=', 'transportInvoices.transport_id')
            ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
            ->select(
                'vehicles.id as idVehicle',
                'vehicles.areaCode',
                'vehicles.vehicleNumber',
                'invoiceGarageDetails.invoiceGarage_id as idDetail',
                'invoiceGarageDetails.paidAmt',
                'invoiceGarageDetails.debtOld',
                'invoiceGarageDetails.payDate',
                'invoiceGarages.totalTransport as totalPtt',
                'invoiceGarages.totalCost',
                'invoiceGarages.debt')
            ->get();


        $invoiceCode = $this->generateInvoiceCode('bill_garage');
        $transportInvoices = DB::table('transportInvoices')->get();
        $allVehicle = DB::table('vehicles')
            ->join('transports', 'vehicles.id', '=', 'transports.vehicle_id')
            ->join('costs', 'vehicles.id', '=', 'costs.vehicle_id')
            ->select(
                'vehicles.id',
                DB::raw("CONCAT(vehicles.areaCode,'-',vehicles.vehicleNumber)  AS fullNumber"),
                'vehicles.note'
            )
            ->where('vehicles.active', 1)
            ->where('costs.status_invoice_garage', 0)
            ->get();
        $collection = collect($allVehicle);
        $uniqueVehicle = $collection->unique();
        $arrayDataVehicle = [];
        foreach ($uniqueVehicle as $item) {
            $oilPayment = Cost::leftJoin('prices', 'costs.price_id', '=', 'prices.id')
                ->leftJoin('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                ->where('prices.costPrice_id', 2)
                ->where('vehicle_id', $item->id)
                ->select(
                    'costs.vehicle_id as vehicle_id',
                    'costs.cost as cost',
                    'costs.note as note'
                )
                ->get()
                ->sum('cost');
            $lubePayment = Cost::leftJoin('prices', 'costs.price_id', '=', 'prices.id')
                ->leftJoin('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                ->where('prices.costPrice_id', 3)
                ->where('vehicle_id', $item->id)
                ->select(
                    'costs.vehicle_id as vehicle_id',
                    'costs.cost as cost',
                    'costs.note as note'

                )
                ->get()
                ->sum('cost');
            $parkingPayment = Cost::leftJoin('prices', 'costs.price_id', '=', 'prices.id')
                ->leftJoin('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                ->where('prices.costPrice_id', 4)
                ->where('vehicle_id', $item->id)
                ->select(
                    'costs.vehicle_id as vehicle_id',
                    'costs.cost as cost',
                    'costs.note as note'

                )
                ->get()
                ->sum('cost');
            $otherPayment = Cost::leftJoin('prices', 'costs.price_id', '=', 'prices.id')
                ->leftJoin('costPrices', 'prices.costPrice_id', '=', 'costPrices.id')
                ->where('prices.costPrice_id', 1)
                ->where('vehicle_id', $item->id)
                ->select(
                    'costs.vehicle_id as vehicle_id',
                    'costs.cost as cost',
                    'costs.note as note'

                )
                ->get()
                ->sum('cost');
            array_push($arrayDataVehicle, [
                'vehicle_id' => $item->id,
                'fullNumber' => $item->fullNumber,
                'note'       => $item->note,
                'oil'        => $oilPayment,
                'lube'       => $lubePayment,
                'parking'    => $parkingPayment,
                'other'      => $otherPayment,
                'sum'        => $oilPayment + $lubePayment + $parkingPayment + $otherPayment,
            ]);

        }
        $response = [
            'msg'                  => 'Get list all Transport',
            'arrayCostDataVehicle' => $arrayDataVehicle,
            'transports'           => $transports,
            'debtTransports'       => $debtTransports,
            'invoiceGarages'       => $invoiceGarages,
            'invoiceGarageDetails' => $detailPtt,
            'invoiceCode'          => $invoiceCode,
            'transportInvoices'    => $transportInvoices,
            'firstDay'             => date("d-m-Y", $this->firstDayUTS),
            'lastDay'              => date("d-m-Y", $this->lastDayUTS)
        ];
        return $response;
    }


    public function getViewDebtGarage()
    {
        return view('subviews.Debt.DebtVehicleOutside');
    }

    //Trả đủ
    public function postModifyDebtGarage(Request $request)
    {

        $transport_id = $request->input('_transport');
        $vehicleId = Transport::where('id', $transport_id)->pluck('vehicle_id');
        $costId = Cost::where('vehicle_id',$vehicleId)->pluck('id','vehicle_id');


        $pay = $request->input('_pay');
        try {
            DB::beginTransaction();
            $transportUpdate = Transport::findOrFail($transport_id);
            $transportUpdate->cashPreDelivery = $transportUpdate->cashDelivery;
            $transportUpdate->cashDelivery = $pay;
            $transportUpdate->status_invoice_garage = 3;
            $transportUpdate->updatedBy = \Auth::user()->id;
            if (!$transportUpdate->update()) {
                DB::rollBack();
                return response()->json(['msg' => 'Update failed'], 404);
            }
            if(count($costId) != "") {
                $updateCost = Cost::findOrFail($costId);
                $updateCost->status_invoice_garage = 1;
                if (!$updateCost->update()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Update cost failed'], 404);
                }
            }

            DB::commit();
            //Response
            $response = $this->DataDebtGarage();
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
        $arrayVehicleId = Transport::whereIn('id', $array_transportId)->pluck('vehicle_id');
        $uniqueVehicleId = $arrayVehicleId->unique();
        if (count($uniqueVehicleId->values()->all()) != 1) {
            return response()->json(['status' => 0, 'msg' => 'Các đơn hàng có xe không giống nhau.'], 203);
        } else {
            return response()->json(['status' => 1, 'totalPay' => 0, 'msg' => 'Các đơn hàng chưa có phiếu thanh toán, hợp lệ cho thêm mới'], 200);
        }
    }

    /// trả tiếp
    public function postModifyPayMore(Request $request)
    {

        $id = $request->input('_payMore')['idPayMore'];
        $debtVerb = $request->input('_payMore')['debtVerb'];
        $debtOld = $request->input('_payMore')['debtOld'];
        $paidAmtDebtVerb = $request->input('_payMore')['payMore'];
        $debtVerbPerson = $request->input('_payMore')['debtVerbPerson'];
        $payDateDebtVerb = $request->input('_payMore')['payDateDebtVerb'];
        $noteDebtVerb = $request->input('_payMore')['noteDebtVerb'];
        $datePay = Carbon::createFromFormat('d-m-Y', $payDateDebtVerb)->toDateTimeString();
        try {
            DB::beginTransaction();
            $payMore = InvoiceGarage::findOrFail($id);
            $payMore->debt = $debtVerb;
            $payMore->paidAmt += $paidAmtDebtVerb;
            $payMore->sendToPerson = $debtVerbPerson;
            $payMore->payDate = $datePay;
            $payMore->note = $noteDebtVerb;
            $payMore->updatedBy = \Auth::user()->id;
            if (!$payMore->update()) {
                DB::rollBack();
                return response()->json(['msg' => 'Update failed'], 404);
            }
            $invoiceDetail = new InvoiceGarageDetail();
            $invoiceDetail->invoiceGarage_id = $id;
            $invoiceDetail->paidAmt = $paidAmtDebtVerb;
            $invoiceDetail->debtOld = $debtOld;
            $invoiceDetail->payDate = $datePay;
            if (!$invoiceDetail->save()) {
                DB::rollBack();
                return response()->json(['msg' => 'invoiceDetail failed'], 404);
            }

            DB::commit();
            //Response
            $response = $this->DataDebtGarage();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }


    public function postModifyInvoiceGarage(Request $request)
    {
        $action = $request->input('_action');
        $invoiceCode = $request->input('_invoiceGarage')['invoiceCode'];
        if ($action == 'new') {
            $array_transportId = $request->input('_array_transportId');
            //Kiem tra xem cac transport nay da xuat phieu thanh toan chua
            //Neu da xuat phieu thanh toan thi kiem tra xem ma cac phieu do co giong nhau khong
            //Neu giong nhau tien hanh them hoa don them lan nua

            $cost = Cost::where('vehicle_id', $request->input('_invoiceGarage')['vehicle_id'])
                ->pluck('id');
            if (count($cost) > 0) {
                foreach ($cost as $itemCost) {
                    $updateCost = Cost::findOrFail($itemCost);
                    $updateCost->status_invoice_garage = 1;
                    if (!$updateCost->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update cost fail!'], 404);
                    }
                }
            }


            $invoiceGarage = new InvoiceGarage();
            if ($invoiceCode == '') {
                $invoiceGarage->invoiceCode = $this->generateInvoiceCode('bill_garage');
            } else {
                if (InvoiceGarage::where('invoiceCode', $invoiceCode)->get()->count() == 0)
                    $invoiceGarage->invoiceCode = $invoiceCode;
                else
                    return response()->json(['msg' => 'invoiceCode exists!'], 203);
            }
            $invoiceGarage->totalTransport = $request->input('_invoiceGarage')['totalTransport'];
            $invoiceGarage->totalCost = $request->input('_invoiceGarage')['totalCost'];
            $debt = $request->input('_invoiceGarage')['totalTransport'] - $request->input('_invoiceGarage')['totalCost'];
            $exportDate = $request->input('_invoiceGarage')['exportDate'];
            $invoiceGarage->exportDate = Carbon::createFromFormat('d-m-Y', $exportDate)->toDateTimeString();
            $invoiceGarage->note = $request->input('_invoiceGarage')['note'];
            $invoiceGarage->debt = $debt;
            $invoiceGarage->paidAmt = $request->input('_invoiceGarage')['paidAmt'];
            $invoiceGarage->sendToPerson = $request->input('_invoiceGarage')['sendToPerson'];
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
                $invoiceGarageDetail->debtOld = $debt;
                $payDate = $request->input('_invoiceGarage')['exportDate'];
                $invoiceGarageDetail->payDate = Carbon::createFromFormat('d-m-Y', $payDate)->toDateTimeString();
                $invoiceGarageDetail->modify = false;
                $invoiceGarageDetail->createdBy = \Auth::user()->id;
                $invoiceGarageDetail->updatedBy = \Auth::user()->id;
                if (!$invoiceGarageDetail->save()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Create InvoiceGarageDetail fail!'], 404);
                }


                //Update status_invoice_garage for Transport
                foreach ($array_transportId as $transport_id) {
                    $transportUpdate = Transport::find($transport_id);
                    $transportUpdate->status_invoice_garage = 1;
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
                    if (!$transportInvoice->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create transportInvoice fail!'], 404);
                    }
                }
                DB::commit();

                $response = $this->DataDebtGarage();
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
            if (count($array_transportInvoice) > 0) {
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
            if (count($array_invoiceGarageDetail) > 0) {
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
            if (!$invoiceGarage) {
                DB::rollBack();
                return response()->json(['msg' => 'InvoiceGarage does not exists.'], 404);
            }
            if (!$invoiceGarage->delete()) {
                DB::rollBack();
                return response()->json(['msg' => 'Delete InvoiceGarage fail.'], 404);
            }
            DB::commit();
            //Response
            $response = $this->DataDebtGarage();

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
            if (!$invoiceGarageDetailId) {
                DB::rollBack();
                return response()->json(['msg' => 'InvoiceGarageDetail does not exists.'], 404);
            }

            $invoiceGarage_id = $invoiceGarageDetail->invoiceGarage_id;
            $paidAmt = $invoiceGarageDetail->paidAmt;

            if (!$invoiceGarageDetail->delete()) {
                DB::rollBack();
                return response()->json(['msg' => 'Delete InvoiceGarageDetail fail.'], 404);
            }
            if ($action == 'delete1') {
                //Update InvoiceGarage
                $invoiceGarage = InvoiceGarage::find($invoiceGarage_id);
                if (!$invoiceGarage) {
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
                $response = $this->DataDebtGarage();
            } else {
                //Delete InvoiceGarage
                $invoiceGarage = InvoiceGarage::find($invoiceGarage_id);
                if (!$invoiceGarage) {
                    DB::rollBack();
                    return response()->json(['msg' => 'InvoiceGarage does not exists.'], 404);
                }
                if (!$invoiceGarage->delete()) {
                    DB::rollBack();
                    return response()->json(['msg' => 'Delete InvoiceGarage fail.'], 404);
                }

                //Delete TransportInvoice
                $array_transportInvoice = TransportInvoice::where('invoiceGarage_id', $invoiceGarage->id)->get();
                if (count($array_transportInvoice) > 0) {
                    foreach ($array_transportInvoice as $transportInvoice) {
                        if (!$transportInvoice->delete()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Delete TransportInvoice fail.'], 404);
                        }
                    }
                }

                //Response
                $response = $this->DataDebtGarage();
            }

            DB::commit();
            return response()->json($response, 201);
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }
}
