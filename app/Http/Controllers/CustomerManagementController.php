<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerType;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerManagementController extends Controller
{
    public function getViewCustomer()
    {
        return view('subviews.Customer.Customer');
    }
    public function getDataCustomer(){
        $customers = \DB::table('customers')
            ->select('customers.*', 'customerTypes.name as customerTypes_name')
            ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
            ->where('customers.active', '=', '1')
            ->get();
        $customerTypes = CustomerType::all();
        $response = [
            'msg'          => 'Get list all Customer',
            'customers'     => $customers,
            'customerTypes' => $customerTypes
        ];
        return response()->json($response, 200);
    }

    public function postModifyCustomer(Request $request)
    {
        if(!\Auth::check()){
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
        if($action != 'delete'){
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
                $customerNew->fullName        = $fullName;
                $customerNew->taxCode         = $taxCode;
                $customerNew->address         = $address;
                $customerNew->phone           = $phone;
                $customerNew->email           = $email;
                $customerNew->note            = $note;
                $customerNew->createdBy       = $createdBy;
                $customerNew->updatedBy       = $updatedBy;
                if ($customerNew->save()) {
                    $customer = \DB::table('customers')
                        ->select('customers.*', 'customerTypes.name as customerTypes_name')
                        ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
                        ->where('customers.id', '=', $customerNew->id)
                        ->get();

                    $response = [
                        'msg' => 'Created customer',
                        'customer' => $customer
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $customerUpdate = Customer::findOrFail($request->input('_customer')['id']);
                $customerUpdate->customerType_id = $customerType_id;
                $customerUpdate->fullName        = $fullName;
                $customerUpdate->taxCode         = $taxCode;
                $customerUpdate->address         = $address;
                $customerUpdate->phone           = $phone;
                $customerUpdate->email           = $email;
                $customerUpdate->note            = $note;
                $customerUpdate->updatedBy       = $updatedBy;
                if ($customerUpdate->update()) {
                    $customer = \DB::table('customers')
                        ->select('customers.*', 'customerTypes.name as customerTypes_name')
                        ->join('customerTypes', 'customerTypes.id', '=', 'customers.customerType_id')
                        ->where('customers.id', '=', $customerUpdate->id)
                        ->get();
                    $response = [
                        'msg' => 'Updated customer',
                        'customer' => $customer
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $customerDelete = Customer::findOrFail($request->input('_id'));
                $customerDelete->active = 0;

                if ($customerDelete->update()){
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
        if(!\Auth::check()){
            return response()->json(['msg' => 'Not Authorize'], 404);
        }

        $name = null;
        $description = null;

        $action = $request->input('_action');
        if($action != 'delete'){
            $validator = ValidateController::ValidateCustomerType($request->input('_customerType'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $name      = $request->input('_customerType')['name'];
            $description = $request->input('_customerType')['description'];
        }

        switch ($action) {
            case 'add':
                $customerTypeNew = new CustomerType();
                $customerTypeNew->name      = $name     ;
                $customerTypeNew->description = $description;
                if ($customerTypeNew->save()) {
                    $response = [
                        'msg' => 'Created customerType',
                        'customerType' => $customerTypeNew
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $customerTypeUpdate = CustomerType::findOrFail($request->input('_customerType')['id']);
                $customerTypeUpdate->name      = $name     ;
                $customerTypeUpdate->description = $description;
                if ($customerTypeUpdate->update()) {
                    $response = [
                        'msg' => 'Updated customerType',
                        'customerType' => $customerTypeUpdate
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $customerTypeDelete = CustomerType::findOrFail($request->input('_id'));
                $customerTypeDelete->active = 0;

                if ($customerTypeDelete->update()){
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
     * Transport
     * */
    public function getViewDeliveryRequirement()
    {
        return view('subviews.Customer.DeliveryRequirement');
    }

    public function getDataDeliveryRequirement()
    {
        $transports = \DB::table('transports')
            ->join('costs', 'costs.transport_id', '=', 'transports.id')
            ->join('products', 'products.id', '=', 'transports.product_id')
            ->join('customers', 'customers.id', '=', 'transports.customer_id')
            ->join('vehicles', 'vehicles.id', '=', 'costs.vehicle_id')
            ->select('transports.*', 'products.name as products_name', 'customers.fullName as customers_fullName', 'vehicles.vehicleNumber as vehicles_vehicleNumber')
            ->get();

        $response = [
            'msg' => 'Get list all Transport',
            'transport' => $transports
        ];

        return response()->json($response, 200);
    }

    public function postModifyTransport(Request $request)
    {
        $weight = null;
        $cashRevenue = null;
        $cashDelivery = null;
        $cashReceive = null;
        $cashProfit = null;
        $voucher = null;
        $voucherQuantumProduct = null;
        $receiver = null;
        $receiveDate = null;
        $receivePlace = null;
        $deliveryPlace = null;
        $createdBy = null;
        $updatedBy = null;
        $note = null;
        $status = null;
        $product_id = null;
        $customer_id = null;
        $invoice_id = null;


        $action = $request->input('_action');
        if($action != 'delete'){
            $validator = ValidateController::ValidateVehicle($request->input('_vehicle'));
            if ($validator->fails()) {
                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $vehicleType_id = $request->input('_vehicle')['vehicleType_id'];
            $garage_id = $request->input('_vehicle')['garage_id'];
            $areaCode = $request->input('_vehicle')['areaCode'];
            $vehicleNumber = $request->input('_vehicle')['vehicleNumber'];
            $size = $request->input('_vehicle')['size'];
            $weight = $request->input('_vehicle')['weight'];
        }

        switch ($action) {
            case 'add':
                $vehicleNew = new Vehicle();
                $vehicleNew->vehicleType_id = $vehicleType_id;
                $vehicleNew->garage_id      = $garage_id;
                $vehicleNew->areaCode       = $areaCode;
                $vehicleNew->vehicleNumber  = $vehicleNumber;
                $vehicleNew->size           = $size;
                $vehicleNew->weight         = $weight;
                if ($vehicleNew->save()) {
                    $vehicle = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleNew->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
                        ->get();

                    $response = [
                        'msg' => 'Created vehicle',
                        'vehicle' => $vehicle
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Create failed'], 404);
                break;
            case 'update':
                $vehicleUpdate = Vehicle::findOrFail($request->input('_vehicle')['id']);
                $vehicleUpdate->vehicleType_id = $vehicleType_id;
                $vehicleUpdate->garage_id      = $garage_id;
                $vehicleUpdate->areaCode       = $areaCode;
                $vehicleUpdate->vehicleNumber  = $vehicleNumber;
                $vehicleUpdate->size           = $size;
                $vehicleUpdate->weight         = $weight;
                if ($vehicleUpdate->update()) {
                    $vehicle = \DB::table('vehicles')
                        ->join('vehicleTypes', 'vehicles.vehicleType_id', '=', 'vehicleTypes.id')
                        ->join('garages', 'vehicles.garage_id', '=', 'garages.id')
                        ->where('vehicles.id', $vehicleUpdate->id)
                        ->select('vehicles.*', 'vehicleTypes.name as vehicleTypes_name', 'garages.name as garages_name')
                        ->get();

                    $response = [
                        'msg' => 'Updated vehicle',
                        'vehicle' => $vehicle
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Update failed'], 404);
                break;
            case 'delete':
                $vehicleDelete = Vehicle::findOrFail($request->input('_id'));
                $vehicleDelete->active = 0;

                if ($vehicleDelete->update()){
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
}
