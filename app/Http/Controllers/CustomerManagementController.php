<?php

namespace App\Http\Controllers;

use App\CostPrice;
use App\Customer;

use App\CustomerType;
use App\Driver;
use App\Garage;
use App\GarageType;
use App\InvoiceCustomer;
use App\InvoiceCustomerDetail;
use App\Postage;
use App\Product;

use App\ProductType;
use App\StaffCustomer;
use App\Status;
use App\Transport;
use App\VehicleType;
use App\Voucher;
use App\VoucherTransport;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

use League\Flysystem\Exception;

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
        $staffCustomers = DB::table('staffCustomers')
            ->select('staffCustomers.*')
            ->join('customers', 'customers.id', '=', 'staffCustomers.customer_id')
            ->where('staffCustomers.active', 1)
            ->get();
        $customers = DB::table('customers')
            ->select('customers.*', 'customerTypes.name as customerTypes_name')
            ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
            ->where('customers.active', '=', '1')
            ->get();
        $customerTypes = CustomerType::all();
        $response = [
            'msg'           => 'Get list all Customer',
            'customers'     => $customers,
            'customerTypes' => $customerTypes,
            'dataStaff'     => $staffCustomers,
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

        $fullNameEdit = null;
        $taxCodeEdit = null;
        $addressEdit = null;
        $phoneEdit = null;
        $emailEdit = null;
        $noteEdit = null;
        $createdBy = null;
        $updatedBy = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCustomer($request->input('_customer'), $action);
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }
            if ($action == "add") {
                $fullName = $request->input('_customer')['fullName'];
                $taxCode = $request->input('_customer')['taxCode'];
                $address = $request->input('_customer')['address'];
                $phone = $request->input('_customer')['phone'];
                $email = $request->input('_customer')['email'];
                $percentFuel = $request->input('_customer')['percentFuel'];
                $percentFuelChange = $request->input('_customer')['percentFuelChange'];
                $note = $request->input('_customer')['note'];
            } elseif ($action == "update") {
                $fullNameEdit = $request->input('_customer')['fullName'];
                $taxCodeEdit = $request->input('_customer')['taxCode'];
                $addressEdit = $request->input('_customer')['address'];
                $phoneEdit = $request->input('_customer')['phone'];
                $emailEdit = $request->input('_customer')['email'];
                $percentFuelEdit = $request->input('_customer')['percentFuel'];
                $percentFuelChangeEdit = $request->input('_customer')['percentFuelChange'];
                $noteEdit = $request->input('_customer')['note'];
            }
            $customerType_id = $request->input('_customer')['customerType_id'];

            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;
        }

        switch ($action) {

            case 'add':
                $customerNew = Customer::where('fullName', $fullName)->first();
                if ($customerNew != null) {
                    return response()->json(['msg' => 'fullName exists'], 203);
                }

                $customerNew = new Customer();
                $customerNew->customerType_id = $customerType_id;
                $customerNew->fullName = $fullName;
                $customerNew->taxCode = $taxCode;
                $customerNew->address = $address;
                $customerNew->phone = $phone;
                $customerNew->email = $email;
                $customerNew->note = $note;
                $customerNew->percentOilPerPostage = $percentFuel;
                $customerNew->percentOilLimitToChangePostage = $percentFuelChange;
                $customerNew->createdBy = $createdBy;
                $customerNew->updatedBy = $updatedBy;
                if ($customerNew->save()) {
                    $customer = DB::table('customers')
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
                $customerUpdate->fullName = $fullNameEdit;
                $customerUpdate->taxCode = $taxCodeEdit;
                $customerUpdate->address = $addressEdit;
                $customerUpdate->phone = $phoneEdit;
                $customerUpdate->email = $emailEdit;
                $customerUpdate->note = $noteEdit;
                $customerUpdate->percentOilPerPostage = $percentFuelEdit;
                $customerUpdate->percentOilLimitToChangePostage = $percentFuelChangeEdit;
                $customerUpdate->updatedBy = $updatedBy;
                if ($customerUpdate->update()) {
                    $customer = DB::table('customers')
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

    /*Add staff*/


    public function postModifyStaff(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not authorize'], 404);
        }
        $fullNameStaff = null;
        $positionStaff = null;
        $addressStaff = null;
        $phoneStaff = null;
        $emailStaff = null;
        $birthdayStaff = null;
        $noteStaff = null;
        $action = $request->input('_action');
        if ($action != 'deleteStaff') {
            $validator = ValidateController::ValidateStaffOfCustomer($request->input('_object'));
            if ($validator->fails()) {
                return $validator->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }
            $idCustomer = $request->input('_object')['customer_id'];
            $fullNameStaff = $request->input('_object')['fullNameStaff'];
            $positionStaff = $request->input('_object')['positionStaff'];
            $addressStaff = $request->input('_object')['addressStaff'];
            $phoneStaff = $request->input('_object')['phoneStaff'];
            $emailStaff = $request->input('_object')['emailStaff'];
            $birthdayStaff = $request->input('_object')['birthdayStaff'];
            $birthday = Carbon::createFromFormat('d-m-Y', $birthdayStaff)->toDateTimeString();
            $noteStaff = $request->input('_object')['noteStaff'];
            $createdBy = \Auth::user()->id;
            $updatedBy = \Auth::user()->id;

        }


        switch ($action) {
            case 'addStaff':
                $staffNew = new StaffCustomer();
                $staffNew->fullName = $fullNameStaff;
                $staffNew->position = $positionStaff;
                $staffNew->address = $addressStaff;
                $staffNew->phone = $phoneStaff;
                $staffNew->email = $emailStaff;
                $staffNew->birthday = $birthday;
                $staffNew->customer_id = $idCustomer;
                $staffNew->note = $noteStaff;
                $staffNew->updatedBy = $updatedBy;
                $staffNew->createdBy = $createdBy;
                if ($staffNew->save()) {
                    $staff = DB::table('staffCustomers')
                        ->select('staffCustomers.*')
                        ->join('customers', 'customers.id', '=', 'staffCustomers.customer_id')
                        ->where('staffCustomers.id', '=', $staffNew->id)
                        ->first();
                    $response = [
                        'msg'      => 'Created customer',
                        'staffNew' => $staff
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'updateStaff':

                $staffUpdate = StaffCustomer::findOrFail($request->input('_object')['id']);
                $staffUpdate->fullName = $fullNameStaff;
                $staffUpdate->position = $positionStaff;
                $staffUpdate->address = $addressStaff;
                $staffUpdate->phone = $phoneStaff;
                $staffUpdate->email = $emailStaff;
                $staffUpdate->birthday = $birthday;
                $staffUpdate->note = $noteStaff;
                $staffUpdate->updatedBy = $updatedBy;
                $staffUpdate->createdBy = $createdBy;
                if ($staffUpdate->update()) {
                    $staff = DB::table('staffCustomers')
                        ->select('staffCustomers.*')
                        ->join('customers', 'customers.id', '=', 'staffCustomers.customer_id')
                        ->where('staffCustomers.id', '=', $staffUpdate->id)
                        ->first();
                    $response = [
                        'msg'         => 'Updated Staff',
                        'updateStaff' => $staff
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;

            case 'deleteStaff':

                $staffDelete = StaffCustomer::findOrFail($request->input('_object'));
                $staffDelete->active = 0;
                if ($staffDelete->update()) {
                    $response = [
                        'msg' => 'Deleted staff'
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
        $products = DB::table('products')
            ->select('products.*', 'productTypes.name as productTypes_name')
            ->join('productTypes', 'productTypes.id', '=', 'products.productType_id')
            ->get();
        $response = [
            'msg'      => 'Get list all Product',
            'products' => $products,
        ];
        return response()->json($response, 200);
    }

    public function postModifyProduct(Request $request)
    {
        if (!\Auth::check()) {
            return response()->json(['msg' => 'Not Authorize'], 404);
        }

        $name = null;
        $description = null;
        $productType_id = null;
        $productType = null;

        $action = $request->input('_action');
        if ($action != 'delete') {
            $validator = ValidateController::ValidateCustomerType($request->input('_product'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $name = $request->input('_product')['name'];
            $productType = $request->input('_product')['productType'];
            $description = $request->input('_product')['description'];
            $productType_id = $request->input('_product')['productType_id'];
        }

        switch ($action) {
            case 'add':
                if(!$productType_id){
                    $productTypeNew = new ProductType();
                    $productTypeNew->name = $productType;
                    if ($productTypeNew->save()) {
                        $productNew = new Product();
                        $productNew->name = $name;
                        $productNew->description = $description;
                        $productNew->productType_id = $productTypeNew->id;
                        if ($productNew->save()) {
                            $response = [
                                'msg'     => 'Created Product',
                                'product' => $productNew,
                                'productType' => $productTypeNew
                            ];
                            return response()->json($response, 201);
                        }
                    }
                    return response()->json(['msg' => 'Create failed'], 404);
                }else{
                    $productNew = new Product();
                    $productNew->name = $name;
                    $productNew->description = $description;
                    $productNew->productType_id = $productType_id;
                    if ($productNew->save()) {
                        $response = [
                            'msg'     => 'Created Product',
                            'product' => $productNew
                        ];
                        return response()->json($response, 201);
                    }
                    return response()->json(['msg' => 'Create failed'], 404);
                }

                break;
            case 'update':
                $productUpdate = Product::findOrFail($request->input('_product')['id']);
                $productUpdate->name = $name;
                $productUpdate->description = $description;
                $productUpdate->productType_id = $productType_id;
                if ($productUpdate->update()) {
                    $response = [
                        'msg'     => 'Updated Product',
                        'product' => $productUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $productDelete = CustomerType::findOrFail($request->input('_id'));
                $productDelete->active = 0;

                if ($productDelete->update()) {
                    $response = [
                        'msg' => 'Deleted Product'
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
     * Product Type
     * */
    public function getDataProductType()
    {
        $productTypes = DB::table('productTypes')
            ->select('productTypes.*')
            ->get();
        $response = [
            'msg'          => 'Get list all Product',
            'productTypes' => $productTypes,
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

        try {
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
        } catch (Exception $ex) {
            return response()->json(['msg' => $ex], 404);
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
        $transports = DB::table('transports')
            ->select('transports.*',
                'products.name as products_name',
                'customers.fullName as customers_fullName',
                'vehicles.areaCode as vehicles_areaCode',
                'vehicles.vehicleNumber as vehicles_vehicleNumber',
                'statuses_tran.status as status_transport_',
                'statuses_cust.status as status_customer_',
                'statuses_gar.status as status_garage_',
                'users_createdBy.fullName as users_createdBy',
                'users_updatedBy.fullName as users_updatedBy'
            )
            ->leftJoin('products', 'products.id', '=', 'transports.product_id')
            ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
            ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
            ->leftJoin('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
            ->leftJoin('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
            ->leftJoin('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
            ->leftJoin('users as users_createdBy', 'users_createdBy.id', '=', 'transports.createdBy')
            ->leftJoin('users as users_updatedBy', 'users_updatedBy.id', '=', 'transports.updatedBy')
//            ->orderBy('receiveDate', 'desc')
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
        $carrying = null;
        $parking = null;
        $fine = null;
        $cashProfit = null;
        $voucherNumber = null;
        $voucherQuantumProduct = null;
        $receiver = null;
        $receiveDate = null;
        $receivePlace = null;
        $deliveryPlace = null;
        $note = null;
        $status_transport = null;
        $status_customer = null;
        $status_garage = null;
        $vehicle_id = null;
        $product_id = null;
        $customer_id = null;
        $costNote = null;
        $transportType = null;
        $vehicle_name = null;
        $customer_name = null;
        $product_name = null;

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
            $carrying = $request->input('_transport')['carrying'];
            $parking = $request->input('_transport')['parking'];
            $fine = $request->input('_transport')['fine'];
            $cashReceive = $request->input('_transport')['cashReceive'];
            $cashProfit = $cashRevenue - $cashDelivery - $carrying - $parking - $fine;
            $voucherNumber = $request->input('_transport')['voucherNumber'];
            $voucherQuantumProduct = $request->input('_transport')['voucherQuantumProduct'];
            $receiver = $request->input('_transport')['receiver'];
            $receiveDate = $request->input('_transport')['receiveDate'];
            $receiveDate = Carbon::createFromFormat('d-m-Y', $receiveDate)->toDateTimeString();
            $receivePlace = $request->input('_transport')['receivePlace'];
            $deliveryPlace = $request->input('_transport')['deliveryPlace'];
            $note = $request->input('_transport')['note'];
            $status_transport = $request->input('_transport')['status_transport'];
            $status_customer = ($cashRevenue == $cashReceive) ? 6 : 5;
            $status_garage = 8;
            $vehicle_id = $request->input('_transport')['vehicle_id'];
            $product_id = $request->input('_transport')['product_id'];
            $customer_id = $request->input('_transport')['customer_id'];
            $costNote = $request->input('_transport')['costNote'];
            $transportType = $request->input('_transport')['transportType'];
            if ($transportType == 1) {
                $vehicle_name = $request->input('_transport')['vehicle_name'];
                $customer_name = $request->input('_transport')['customer_name'];
                $product_name = $request->input('_transport')['product_name'];
            }
            if (array_key_exists('voucher_transport', $request->input('_transport'))) {
                $array_voucherTransport = $request->input('_transport')['voucher_transport'];
            }
        }
        try {
            DB::beginTransaction();
            switch ($action) {
                case 'add':
                    $transportNew = new Transport();
                    $transportNew->transportCode = $this->generateTransportCode();
                    $transportNew->weight = $weight;
                    $transportNew->quantumProduct = $quantumProduct;
                    $transportNew->cashRevenue = $cashRevenue;
                    $transportNew->cashDelivery = $cashDelivery;
                    $transportNew->cashPreDelivery = 0;
                    $transportNew->carrying = $carrying;
                    $transportNew->parking = $parking;
                    $transportNew->fine = $fine;
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
                    $transportNew->transportType = $transportType;
                    $transportNew->costNote = $costNote;
                    $transportNew->vehicle_id = $vehicle_id;
                    if ($transportType == 1) {
                        $transportNew->vehicle_name = $vehicle_name;
                        $transportNew->customer_name = $customer_name;
                        $transportNew->product_name = $product_name;
                    }

                    if (!$transportNew->save()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Create Transport failed'], 404);
                    }
                    //Add VoucherTransport
                    for ($i = 0; $i < count($array_voucherTransport); $i++) {
                        $vouTranNew = new VoucherTransport();
                        $vouTranNew->voucher_id = $array_voucherTransport[$i];
                        $vouTranNew->transport_id = $transportNew->id;
                        $vouTranNew->createdBy = \Auth::user()->id;
                        $vouTranNew->updatedBy = \Auth::user()->id;
                        if (!$vouTranNew->save()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Create VoucherTransport failed'], 404);
                        }
                    }

                    //Response
                    $transport = DB::table('transports')
                        ->select('transports.*',
                            'products.name as products_name',
                            'customers.fullName as customers_fullName',
                            'vehicles.areaCode as vehicles_areaCode',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'statuses_tran.status as status_transport_',
                            'statuses_cust.status as status_customer_',
                            'statuses_gar.status as status_garage_',
                            'users_createdBy.fullName as users_createdBy',
                            'users_updatedBy.fullName as users_updatedBy'
                        )
                        ->leftJoin('products', 'products.id', '=', 'transports.product_id')
                        ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
                        ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
                        ->leftJoin('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
                        ->leftJoin('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
                        ->leftJoin('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
                        ->leftJoin('users as users_createdBy', 'users_createdBy.id', '=', 'transports.createdBy')
                        ->leftJoin('users as users_updatedBy', 'users_updatedBy.id', '=', 'transports.updatedBy')
                        ->where('transports.id', '=', $transportNew->id)
                        ->first();

                    $voucherTransport = VoucherTransport::where('transport_id', $transportNew->id)->get();

                    $response = [
                        'msg'              => 'Created transport',
                        'transport'        => $transport,
                        'voucherTransport' => $voucherTransport
                    ];
                    DB::commit();
                    return response()->json($response, 201);
                    break;
                case 'update':
                    $transportUpdate = Transport::findOrFail($request->input('_transport')['id']);

                    //keep value old row
                    $kp_cashRevenue = $transportUpdate->cashRevenue;
                    $kp_cashReceive = $transportUpdate->cashReceive;

                    $transportUpdate->weight = $weight;
                    $transportUpdate->quantumProduct = $quantumProduct;
                    $transportUpdate->cashRevenue = $cashRevenue;
                    $transportUpdate->cashDelivery = $cashDelivery;
                    $transportUpdate->cashPreDelivery = 0;
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
                    $transportUpdate->status_transport = $status_transport;
                    $transportUpdate->status_customer = $status_customer;
                    $transportUpdate->status_garage = $status_garage;
                    $transportUpdate->product_id = $product_id;
                    $transportUpdate->customer_id = $customer_id;
                    $transportUpdate->costNote = $costNote;
                    $transportUpdate->vehicle_id = $vehicle_id;

                    if ($transportType == 1) {
                        $transportUpdate->vehicle_name = $vehicle_name;
                        $transportUpdate->customer_name = $customer_name;
                        $transportUpdate->product_name = $product_name;
                    }

                    if (!$transportUpdate->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Update Transport failed'], 404);
                    }
                    //Delete VoucherTransport
                    $vouTranDelete = VoucherTransport::where('transport_id', $transportUpdate->id)->get()->toArray();
                    if (count($vouTranDelete) > 0) {
                        $ids_to_delete = array_map(function ($item) {
                            return $item['id'];
                        }, $vouTranDelete);
                        if (DB::table('voucherTransports')->whereIn('id', $ids_to_delete)->delete() <= 0) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Delete VoucherTransport failed'], 404);
                        }
                    }

                    //Add VoucherTransport
                    for ($i = 0; $i < count($array_voucherTransport); $i++) {
                        $vouTranNew = new VoucherTransport();
                        $vouTranNew->voucher_id = $array_voucherTransport[$i];
                        $vouTranNew->transport_id = $transportUpdate->id;
                        $vouTranNew->createdBy = $createdBy;
                        $vouTranNew->updatedBy = \Auth::user()->id;
                        if (!$vouTranNew->save()) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Create VoucherTransport failed'], 404);
                        }
                    }

                    //Update InvoiceCustomer for Transport
//                    if ($transportUpdate->invoiceCustomer_id != null) {
//                        $invoiceCustomer = InvoiceCustomer::find($transportUpdate->invoiceCustomer_id);
//                        $invoiceCustomer->totalPay = $invoiceCustomer->totalPay - $kp_cashRevenue + $transportUpdate->cashRevenue;
//                        $invoiceCustomer->prePaid = $invoiceCustomer->prePaid - $kp_cashReceive + $transportUpdate->cashReceive;
//                        $invoiceCustomer->totalPaid = $invoiceCustomer->totalPay - $invoiceCustomer->prePaid;
//                        $invoiceCustomer->notVAT = $invoiceCustomer->totalPay;
//                        $invoiceCustomer->hasVAT = $invoiceCustomer->notVAT * $invoiceCustomer->VAT / 100;
//                        $invoiceCustomer->updatedBy = \Auth::user()->id;
//                        if (!$invoiceCustomer->update()) {
//                            DB::rollBack();
//                            return response()->json(['msg' => 'Update InvoiceCustomer failed'], 404);
//                        }
//
//                        $invoiceCustomerDetail = InvoiceCustomerDetail::where('invoiceCustomer_id', $invoiceCustomer->id)->orderBy('created_at', 'desc')->first();
//                        $invoiceCustomerDetail->paidAmt = $invoiceCustomerDetail->paidAmt + ($transportUpdate->cashReceive - $kp_cashReceive);
//                        $invoiceCustomerDetail->payDate = date('Y-m-d H:i');
//                        $invoiceCustomerDetail->modify = true;
//                        $invoiceCustomerDetail->updatedBy = \Auth::user()->id;
//                        if (!$invoiceCustomerDetail->update()) {
//                            DB::rollBack();
//                            return response()->json(['msg' => 'Update InvoiceCustomerDetail failed'], 404);
//                        }
//                    }

                    //Response
                    $transport = DB::table('transports')
                        ->select('transports.*',
                            'products.name as products_name',
                            'customers.fullName as customers_fullName',
                            'vehicles.areaCode as vehicles_areaCode',
                            'vehicles.vehicleNumber as vehicles_vehicleNumber',
                            'statuses_tran.status as status_transport_',
                            'statuses_cust.status as status_customer_',
                            'statuses_gar.status as status_garage_',
                            'users_createdBy.fullName as users_createdBy',
                            'users_updatedBy.fullName as users_updatedBy'
                        )
                        ->leftJoin('products', 'products.id', '=', 'transports.product_id')
                        ->leftJoin('customers', 'customers.id', '=', 'transports.customer_id')
                        ->leftJoin('vehicles', 'vehicles.id', '=', 'transports.vehicle_id')
                        ->leftJoin('statuses as statuses_tran', 'statuses_tran.id', '=', 'transports.status_transport')
                        ->leftJoin('statuses as statuses_cust', 'statuses_cust.id', '=', 'transports.status_customer')
                        ->leftJoin('statuses as statuses_gar', 'statuses_gar.id', '=', 'transports.status_garage')
                        ->leftJoin('users as users_createdBy', 'users_createdBy.id', '=', 'transports.createdBy')
                        ->leftJoin('users as users_updatedBy', 'users_updatedBy.id', '=', 'transports.updatedBy')
                        ->where('transports.id', '=', $transportUpdate->id)
                        ->first();

                    $voucherTransport = VoucherTransport::where('transport_id', $transportUpdate->id)->get();

                    $response = [
                        'msg'              => 'Updated transport',
                        'transport'        => $transport,
                        'voucherTransport' => $voucherTransport
                    ];
                    DB::commit();
                    return response()->json($response, 201);
                    break;
                case 'delete':
                    $transport_id = $request->input('_id');
                    //Delete VoucherTransport
                    $vouTranDelete = VoucherTransport::where('transport_id', $transport_id)->get()->toArray();
                    if (count($vouTranDelete) > 0) {
                        $ids_to_delete = array_map(function ($item) {
                            return $item['id'];
                        }, $vouTranDelete);
                        if (DB::table('voucherTransports')->whereIn('id', $ids_to_delete)->delete() <= 0) {
                            DB::rollBack();
                            return response()->json(['msg' => 'Delete VoucherTransport failed'], 404);
                        }
                    }

                    $transportDelete = Transport::findOrFail($request->input('_id'));
                    $transportDelete->active = 0;
                    $transportDelete->updatedBy = \Auth::user()->id;

                    //Response
                    if (!$transportDelete->update()) {
                        DB::rollBack();
                        return response()->json(['msg' => 'Delete Transport failed'], 404);
                    }
                    $response = [
                        'msg' => 'Deleted transport'
                    ];
                    DB::commit();
                    return response()->json($response, 201);
                    break;
                default:
                    DB::rollBack();
                    return response()->json(['msg' => 'Connection to server failed'], 404);
                    break;
            }
        } catch (Exception $ex) {
            DB::rollBack();
            return response()->json(['msg' => $ex], 404);
        }
    }

    public function generateTransportCode()
    {
        $transportCode = "DH" . date('ymd');

        $stt = Transport::where('transportCode', 'like', $transportCode . '%')->get()->count() + 1;
        $transportCode .= substr("00" . $stt, -3);
        return $transportCode;
    }

    /*
     * Postage
     * */
    public function postDataPostageOfCustomer(Request $request)
    {
        $customerId = $request->input('_customerId');
        $receivePlace = $request->input('_receivePlace');
        $deliveryPlace = $request->input('_deliveryPlace');
        $receiveDate = $request->input('_receiveDate');
        $receiveDate = Carbon::createFromFormat('d-m-Y', $receiveDate)->toDateString();

        $postageDetail = Postage::where([
            ['customer_id', $customerId],
            ['receivePlace', $receivePlace],
            ['deliveryPlace', $deliveryPlace]
        ])
            ->where(\DB::raw('DATE(applyDate)'), '<=', $receiveDate)
            ->orderBy('applyDate', 'desc')->first();

        $postage = ($postageDetail == null) ? 0 : $postageDetail->postage;
        $cashDelivery = ($postageDetail == null) ? 0 : $postageDetail->cashDelivery;

        $response = [
            'msg'          => 'Get postage success',
            'postage'      => $postage,
            'cashDelivery' => $cashDelivery
        ];
        return response()->json($response, 201);
    }

    public function getDataVehicle()
    {
        $vehicleTypes = VehicleType::all();
        $garageType = GarageType::all();
        $driver = Driver::all();
        $garages = Garage::all();
        $vehicles = \DB::table('vehicles')
            ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
            ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
            ->join('driverVehicles', 'vehicles.id', '=', 'driverVehicles.vehicle_id')
            ->leftJoin('drivers', 'drivers.id', '=', 'driverVehicles.driver_id')
            ->select('vehicles.*'
                , 'vehicleTypes.name as vehicleTypes_name'
                , 'garages.name as garages_name'
                , 'drivers.fullName as driverName'
                , 'drivers.id as driver_id')
            ->where('vehicles.active', 1)
            ->orderBy('vehicles.id', 'desc')
            ->get();
        $response = [
            'msg'          => 'Get data vehicle success',
            'vehicles'     => $vehicles,
            'vehicleTypes' => $vehicleTypes,
            'drivers'      => $driver,
            'garageTypes'  => $garageType,
            'garages'      => $garages,
        ];
        return response()->json($response, 200);
    }
}
