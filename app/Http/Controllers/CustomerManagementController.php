<?php

namespace App\Http\Controllers;

use App\Cost;
use App\CostPrice;
use App\Customer;
use App\CustomerType;
use App\Postage;
use App\Status;
use App\Transport;
use App\Voucher;
use App\VoucherTransport;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;

class CustomerManagementController extends Controller
{
    /*
     * Customer
     * */
    public function getViewCustomer()
    {
        return view('subviews.Customer.Customer');
    }

    public function getDataCustomer()
    {
        $customers = \DB::table('customers')
            ->select('customers.*', 'customerTypes.name as customerTypes_name')
            ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
            ->where('customers.active', '=', '1')
            ->get();
        $customerTypes = CustomerType::all();
        $response = [
            'msg'           => 'Get list all Customer',
            'customers'     => $customers,
            'customerTypes' => $customerTypes
        ];
        return response()->json($response, 200);
    }

    public function postModifyCustomer(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }

        $customerType_id = null;
        $fullName = null;
        $taxCode = null;
        $address = null;
        $phone = null;
        $email = null;
        $note = null;
        $createdBy = null;
        $updatedBy = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCustomer($request->input('_customer'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $customerType_id = $request->input('_customer')['customerType_id'];
            $fullName = $request->input('_customer')['fullName'];
            $taxCode = $request->input('_customer')['taxCode'];
            $address = $request->input('_customer')['address'];
            $phone = $request->input('_customer')['phone'];
            $email = $request->input('_customer')['email'];
            $note = $request->input('_customer')['note'];
            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
        }

        switch ($action) {
            case 'add':
                $customerNew = new Customer();
                $customerNew->customerType_id = $customerType_id;
                $customerNew->fullName = $fullName;
                $customerNew->taxCode = $taxCode;
                $customerNew->address = $address;
                $customerNew->phone = $phone;
                $customerNew->email = $email;
                $customerNew->note = $note;
                $customerNew->createdBy = $createdBy;
                $customerNew->updatedBy = $updatedBy;
                if ($customerNew->save()) {
                    $customer = \DB::table('customers')
                        ->select('customers.*', 'customerTypes.name as customerTypes_name')
                        ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
                        ->where('customers.id', '=', $customerNew->id)
                        ->get();

                    $response = [
                        'msg'      => 'Created customer',
                        'customer' => $customer
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $customerUpdate = Customer::findOrFail($request->input('_customer')['id']);
                $customerUpdate->customerType_id = $customerType_id;
                $customerUpdate->fullName = $fullName;
                $customerUpdate->taxCode = $taxCode;
                $customerUpdate->address = $address;
                $customerUpdate->phone = $phone;
                $customerUpdate->email = $email;
                $customerUpdate->note = $note;
                $customerUpdate->updatedBy = $updatedBy;
                if ($customerUpdate->update()) {
                    $customer = \DB::table('customers')
                        ->select('customers.*', 'customerTypes.name as customerTypes_name')
                        ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
                        ->where('customers.id', '=', $customerUpdate->id)
                        ->get();
                    $response = [
                        'msg'      => 'Updated customer',
                        'customer' => $customer
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $customerDelete = Customer::findOrFail($request->input('_id'));
                $customerDelete->active = 0;

                if ($customerDelete->update()) {
                    $response = [
                        'msg' => 'Deleted customer'
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

    /*
     * Customer Type
     * */
    public function postModifyCustomerType(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not Authorize'], 404);
        }

        $name = null;
        $description = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCustomerType($request->input('_customerType'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $name = $request->input('_customerType')['name'];
            $description = $request->input('_customerType')['description'];
        }

        switch ($action) {
            case 'add':
                $customerTypeNew = new CustomerType();
                $customerTypeNew->name = $name;
                $customerTypeNew->description = $description;
                if ($customerTypeNew->save()) {
                    $response = [
                        'msg'          => 'Created customerType',
                        'customerType' => $customerTypeNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $customerTypeUpdate = CustomerType::findOrFail($request->input('_customerType')['id']);
                $customerTypeUpdate->name = $name;
                $customerTypeUpdate->description = $description;
                if ($customerTypeUpdate->update()) {
                    $response = [
                        'msg'          => 'Updated customerType',
                        'customerType' => $customerTypeUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $customerTypeDelete = CustomerType::findOrFail($request->input('_id'));
                $customerTypeDelete->active = 0;

                if ($customerTypeDelete->update()) {
                    $response = [
                        'msg' => 'Deleted Customer Type'
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

    /*
     * Product
     * */
    public function getDataProduct()
    {
        $products = \DB::table('products')
            ->select('products.*', 'productTypes.name as productTypes_name')
            ->join('productTypes', 'productTypes.id', '=', 'products.productType_id')
            ->get();
        $response = [
            'msg'      => 'Get list all Product',
            'products' => $products,
        ];
        return response()->json($response, 200);
    }

    /*
     * Voucher
     * */
    public function getDataVoucher()
    {
        $vouchers = Voucher::all();
        $response = [
            'msg'      => 'Get list all Voucher',
            'vouchers' => $vouchers,
        ];
        return response()->json($response, 200);
    }

    public function postModifyVoucher(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not Authorize'], 404);
        }

        $name = null;
        $description = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCustomerType($request->input('_voucher'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $name = $request->input('_voucher')['name'];
            $description = $request->input('_voucher')['description'];
        }

        switch ($action) {
            case 'add':
                $voucherNew = new Voucher();
                $voucherNew->name = $name;
                $voucherNew->description = $description;
                if ($voucherNew->save()) {
                    $response = [
                        'msg'     => 'Created voucher',
                        'voucher' => $voucherNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $voucherUpdate = Voucher::findOrFail($request->input('_voucher')['id']);
                $voucherUpdate->name = $name;
                $voucherUpdate->description = $description;
                if ($voucherUpdate->update()) {
                    $response = [
                        'msg'     => 'Updated voucher',
                        'voucher' => $voucherUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $voucherDelete = Voucher::findOrFail($request->input('_id'));
                $voucherDelete->active = 0;

                if ($voucherDelete->update()) {
                    $response = [
                        'msg' => 'Deleted Voucher'
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

    /*
     * Transport
     * */
    public function getViewTransport()
    {
        return view('subviews.Customer.DeliveryRequirement');
    }

    public function getDataTransport()
    {
        $transports = \DB::table('transports')
            ->select('transports.*', 'products.id as products_id', 'products.name as products_name', 'customers.id as customers_id', 'customers.fullName as customers_fullName', 'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note')
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('products', 'products.id', '=', 'transports.product_id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->get();

        $voucherTransports = VoucherTransport::all();
        $vouchers = Voucher::all();
        $statuses = Status::where('tableName', 'transports')->get();
        $costPrices = CostPrice::all();

        $response = [
            'msg'               => 'Get list all Transport',
            'transports'        => $transports,
            'voucherTransports' => $voucherTransports,
            'vouchers'          => $vouchers,
            'statuses'          => $statuses,
            'costPrices'        => $costPrices
        ];

        return response()->json($response, 200);
    }

    public function postModifyTransport(Request $request)
    {
        $weight = null;
        $quantumProduct = null;
        $cashRevenue = null;
        $cashDelivery = null;
        $cashReceive = null;
        $cashProfit = null;
        $voucherNumber = null;
        $voucherQuantumProduct = null;
        $receiver = null;
        $receiveDate = null;
        $receivePlace = null;
        $deliveryPlace = null;
        $note = null;
        $status_id = null;
        $vehicle_id = null;
        $product_id = null;
        $customer_id = null;
        $invoice_id = null;

        $cost = null;
        $costs_note = null;

        $array_voucherTransport = [];

        $action = $request->input('_action');
        if ($action != 'delete') {
//            $validator = ValidateController::ValidateVoucherTransport($request->input('_transport'));
//            if ($validator->fails()) {
//                return response()->json(['msg' => 'Input data fail'], 404);
//            }

            $weight = $request->input('_transport')['weight'];
            $quantumProduct = $request->input('_transport')['quantumProduct'];
            $cashRevenue = $request->input('_transport')['cashRevenue'];
            $cashDelivery = $request->input('_transport')['cashDelivery'];
            $cashReceive = $request->input('_transport')['cashReceive'];
            $cost = $request->input('_transport')['cost'];
            $cashProfit = $cashRevenue - $cashDelivery - $cost;
            $voucherNumber = $request->input('_transport')['voucherNumber'];
            $voucherQuantumProduct = $request->input('_transport')['voucherQuantumProduct'];
            $receiver = $request->input('_transport')['receiver'];

            $receiveDate = $request->input('_transport')['receiveDate'];
            $receiveDate = Carbon::createFromFormat('d/m/Y H:i', $receiveDate)->toDateTimeString();

            $receivePlace = $request->input('_transport')['receivePlace'];
            $deliveryPlace = $request->input('_transport')['deliveryPlace'];
            $note = $request->input('_transport')['note'];
            $status_transport = $request->input('_transport')['status_transport'];
            $status_customer = ($cashRevenue == $cashReceive) ? 6 : 5;
            $status_garage = 8;
            $vehicle_id = $request->input('_transport')['vehicles_id'];
            $product_id = $request->input('_transport')['products_id'];
            $customer_id = $request->input('_transport')['customers_id'];
            $invoice_id = null;
            $costPrice_id = $request->input('_transport')['costPrice_id'];

            $costs_note = $request->input('_transport')['costs_note'];

            $array_voucherTransport = $request->input('_transport')['voucher_transport'];
        }

        switch ($action) {
            case 'add':
                $transportNew = new Transport();
                $transportNew->weight = $weight;
                $transportNew->quantumProduct = $quantumProduct;
                $transportNew->cashRevenue = $cashRevenue;
                $transportNew->cashDelivery = $cashDelivery;
                $transportNew->cashReceive = $cashReceive;
                $transportNew->cashProfit = $cashProfit;
                $transportNew->voucherNumber = $voucherNumber;
                $transportNew->voucherQuantumProduct = $voucherQuantumProduct;
                $transportNew->receiver = $receiver;
                $transportNew->receiveDate = $receiveDate;
                $transportNew->receivePlace = $receivePlace;
                $transportNew->deliveryPlace = $deliveryPlace;
                $transportNew->createdBy = \Auth::user()->id;
                $transportNew->updatedBy = \Auth::user()->id;
                $transportNew->note = $note;
                $transportNew->status_transport = $status_transport;
                $transportNew->status_customer = $status_customer;
                $transportNew->status_garage = $status_garage;
                $transportNew->product_id = $product_id;
                $transportNew->customer_id = $customer_id;

                if ($transportNew->save()) {
                    //Add VoucherTransport
                    for ($i = 0; $i < count($array_voucherTransport); $i++) {
                        $vouTranNew = new VoucherTransport();
                        $vouTranNew->voucher_id = $array_voucherTransport[$i];
                        $vouTranNew->transport_id = $transportNew->id;
                        $vouTranNew->createdBy = \Auth::user()->id;
                        $vouTranNew->updatedBy = \Auth::user()->id;
                        if (!$vouTranNew->save()) {
                            return response()->json(['msg' => 'Create VoucherTransport failed'], 404);
                        }
                    }

                    //Add Cost
                    $costNew = new Cost();
                    $costNew->cost = $cost;
                    $costNew->literNumber = "";
                    $costNew->dayNumber = "";
                    $costNew->createdBy = \Auth::user()->id;
                    $costNew->updatedBy = \Auth::user()->id;
                    $costNew->note = $costs_note;
                    $costNew->transport_id = $transportNew->id;
                    $costNew->price_id = 1;
                    $costNew->vehicle_id = $vehicle_id;
                    if (!$costNew->save()) {
                        return response()->json(['msg' => 'Create Cost failed'], 404);
                    }

                    //Response
                    $transport = \DB::table('transports')
                        ->select('transports.*', 'products.id as products_id', 'products.name as products_name', 'customers.id as customers_id', 'customers.fullName as customers_fullName', 'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note')
                        ->where('transports.id', '=', $transportNew->id)
                        ->join('costs', 'costs.transport_id', '=', 'transports.id')
                        ->join('products', 'products.id', '=', 'transports.product_id')
                        ->join('customers', 'customers.id', '=', 'transports.customer_id')
                        ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
                        ->get();

                    $voucherTransport = VoucherTransport::where('transport_id', $transportNew->id)->get();

                    $response = [
                        'msg'              => 'Created transport',
                        'transport'        => $transport,
                        'voucherTransport' => $voucherTransport
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $transportUpdate = Transport::findOrFail($request->input('_transport')['id']);
                $transportUpdate->weight = $weight;
                $transportUpdate->quantumProduct = $quantumProduct;
                $transportUpdate->cashRevenue = $cashRevenue;
                $transportUpdate->cashDelivery = $cashDelivery;
                $transportUpdate->cashReceive = $cashReceive;
                $transportUpdate->cashProfit = $cashProfit;
                $transportUpdate->voucherNumber = $voucherNumber;
                $transportUpdate->voucherQuantumProduct = $voucherQuantumProduct;
                $transportUpdate->receiver = $receiver;
                $transportUpdate->receiveDate = $receiveDate;
                $transportUpdate->receivePlace = $receivePlace;
                $transportUpdate->deliveryPlace = $deliveryPlace;

                $createdBy = $transportUpdate->updatedBy;

                $transportUpdate->updatedBy = \Auth::user()->id;
                $transportUpdate->note = $note;
                $transportUpdate->status_id = $status_id;
                $transportUpdate->product_id = $product_id;
                $transportUpdate->customer_id = $customer_id;
                $transportUpdate->invoice_id = $invoice_id;

                if ($transportUpdate->update()) {
                    //Delete VoucherTransport
                    $vouTranDelete = VoucherTransport::where('transport_id', $transportUpdate->id)->get()->toArray();
                    $ids_to_delete = array_map(function($item){ return $item['id']; }, $vouTranDelete);
                    if(\DB::table('voucherTransports')->whereIn('id', $ids_to_delete)->delete() <= 0){
                        return response()->json(['msg' => 'Delete VoucherTransport failed'], 404);
                    }

                    //Add VoucherTransport
                    for ($i = 0; $i < count($array_voucherTransport); $i++) {
                        $vouTranNew = new VoucherTransport();
                        $vouTranNew->voucher_id = $array_voucherTransport[$i];
                        $vouTranNew->transport_id = $transportUpdate->id;
                        $vouTranNew->createdBy = $createdBy;
                        $vouTranNew->updatedBy = \Auth::user()->id;
                        if (!$vouTranNew->save()) {
                            return response()->json(['msg' => 'Create VoucherTransport failed'], 404);
                        }
                    }

                    //Delete Cost
                    $costDelete = Cost::where('transport_id', $transportUpdate->id)->get();
                    if (!$costDelete[0]->delete()) {
                        return response()->json(['msg' => 'Delete Cost failed'], 404);
                    }

                    //Add Cost
                    $costNew = new Cost();
                    $costNew->cost = $cost;
                    $costNew->literNumber = "";
                    $costNew->dayNumber = "";
                    $costNew->createdBy = $createdBy;
                    $costNew->updatedBy = \Auth::user()->id;
                    $costNew->note = $costs_note;
                    $costNew->transport_id = $transportUpdate->id;
                    $costNew->price_id = 1;
                    $costNew->vehicle_id = $vehicle_id;
                    if (!$costNew->save()) {
                        return response()->json(['msg' => 'Create Cost failed'], 404);
                    }

                    //Response
                    $transport = \DB::table('transports')
                        ->select('transports.*', 'products.id as products_id', 'products.name as products_name', 'customers.id as customers_id', 'customers.fullName as customers_fullName', 'vehicles.id as vehicles_id', 'vehicles.areaCode as vehicles_areaCode', 'vehicles.vehicleNumber as vehicles_vehicleNumber', 'costs.cost', 'costs.note as costs_note')
                        ->join('costs', 'costs.transport_id', '=', 'transports.id')
                        ->join('products', 'products.id', '=', 'transports.product_id')
                        ->join('customers', 'customers.id', '=', 'transports.customer_id')
                        ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
                        ->where('transports.id', '=', $transportUpdate->id)
                        ->get();

                    $voucherTransport = VoucherTransport::where('transport_id', $transportUpdate->id)->get();

                    $response = [
                        'msg'              => 'Updated transport',
                        'transport'        => $transport,
                        'voucherTransport' => $voucherTransport
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $transport_id = $request->input('_id');
                //Delete VoucherTransport
                $vouTranDelete = VoucherTransport::where('transport_id', $transport_id)->get()->toArray();
                $ids_to_delete = array_map(function($item){ return $item['id']; }, $vouTranDelete);
                if(\DB::table('voucherTransports')->whereIn('id', $ids_to_delete)->delete() <= 0){
                    return response()->json(['msg' => 'Delete VoucherTransport failed'], 404);
                }

                //Delete Cost
                $costDelete = Cost::where('transport_id', $transport_id)->get();
                if (!$costDelete[0]->delete()) {
                    return response()->json(['msg' => 'Delete Cost failed'], 404);
                }

                $transportDelete = Transport::findOrFail($request->input('_id'));
                $transportDelete->active = 0;
                $transportDelete->updatedBy = \Auth::user()->id;

                //Response
                if ($transportDelete->update()) {
                    $response = [
                        'msg' => 'Deleted vehicle'
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

    /*
     * Postage
     * */
    public function postDataPostageOfCustomer(Request $request)
    {
        $postage = Postage::where('customer_id', $request->input('_cust_id'))->orderBy('month', 'desc')->pluck('postage')->first();
        $response = [
            'msg' => 'return a postage success',
            'postage' => $postage
        ];
        return response()->json($response, 201);
    }
}
