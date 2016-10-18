<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;


class ValidateController extends Controller
{
    public static function ValidatePositionUpdate(array $data)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Trường tên bắt buộc nhập'
        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateCreateUser(array $data)
    {
        $rules = [
            'fullName' => 'required|min:6|max:20',
            'username' => 'required|min:6|max:20',
            'email'    => 'required',
            'password' => 'required|min:6|max:20',

        ];
        $messages = [
            'fullName.required' => 'Trường fullname bắt buộc nhập',
            'username.required' => 'Trường username bắt buộc nhập',
            'email.required'    => 'Trường email bắt buộc nhập',
            'password.required' => 'Trường password bắt buộc nhập',
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateVehicle(array $data)
    {
        $rules = [
            'vehicleType_id' => 'required',
            'garage_id'      => 'required',
            'areaCode'       => 'required',
            'vehicleNumber'  => 'required',
        ];
        $messages = [
            'vehicleType_id.required' => 'Trường loại xe bắt buộc nhập',
            'garage_id.required'      => 'Trường nhà xe bắt buộc nhập',
            'areaCode .required'      => 'Trường mã vùng bắt buộc nhập',
            'vehicleNumber.required'  => 'Trường số xe bắt buộc nhập'
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateGarage(array $data)
    {
        $rules = [
            'name'      => 'required',
            'contactor' => 'required',
            'phone'     => 'required',
            'address'   => 'required',
        ];
        $messages = [
            'name.required'      => 'Trường tên nhà xe bắt buộc nhập',
            'contactor.required' => 'Trường người liên hệ bắt buộc nhập',
            'phone .required'    => 'Trường điện thoại vùng bắt buộc nhập',
            'address.required'   => 'Trường địa chỉ bắt buộc nhập'
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateVehicleType(array $data)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Trường tên loại xe bắt buộc nhập'
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateVehicleUser(array $data)
    {
        $rules = [
            'vehicle_id' => 'required',
            'user_id'    => 'required'
        ];
        $messages = [
            'vehicle_id.required' => 'Trường xe bắt buộc nhập',
            'user_id.required'    => 'Trường tài xế bắt buộc nhập'
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateCustomer(array $data)
    {
        $rules = [
            'customerType_id' => 'required',
            'fullName'        => 'required',
            'taxCode'         => "required"
        ];
        $messages = [
            'customerType_id.required' => 'Trường loại khách hàng bắt buộc nhập',
            'fullName.required'        => 'Trường tên khách hàng bắt buộc nhập',
            'taxCode.required'         => 'Trường mã số thuế bắt buộc nhập'
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateCustomerType(array $data)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Trường tên loại xe bắt buộc nhập'
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateVoucherTransport(array $data)
    {
        $rules = [
            "vehicle_id"  => "required",
            "customer_id" => "required",
            "product_id"  => "required",
        ];
        $messages = [
            "vehicle_id.required"  => "Trường xe bắt buộc nhập",
            "customer_id.required" => "Trường khách hàng bắt buộc nhập",
            "product_id.required"  => "Trường sản phẩm bắt buộc nhập",
        ];

        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateCost(array $data)
    {
        $rules = [
            'vehicle_id'  => 'required',
            'literNumber' => 'required'
        ];
        $messages = [
            'vehicle_id.required'  => 'Trường xe bắt buộc nhập',
            'literNumber.required' => 'Trường lít bắt buộc nhập'
        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateCostPrice(array $data)
    {
        $rules = [
            'price' => 'required',
        ];
        $messages = [
            'price.required' => 'Trường giá bắt buộc nhập',

        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateCostVehicle(array $data)
    {
        $rules = [
            'vehicleNumber'  => 'required',
            'areaCode'       => 'required',
            'size'           => 'required',
            'weight'         => 'required',
            'vehicleType_id' => 'required',
            'garage_id'      => 'required'
        ];
        $messages = [
            'vehicleNumber.required'  => 'Trường xe bắt buộc nhập',
            'areaCode.required'       => 'Trường lít bắt buộc nhập',
            'size.required'           => 'Trường xe bắt buộc nhập',
            'weight.required'         => 'Trường lít bắt buộc nhập',
            'vehicleType_id.required' => 'Trường xe bắt buộc nhập',
            'garage_id.required'      => 'Trường lít bắt buộc nhập'
        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidatePetroleum(array $data)
    {
        $rules = [
            'vehicle_id'  => 'required',
            'literNumber' => 'required'
        ];
        $messages = [
            'vehicle_id.required'  => 'Trường xe bắt buộc nhập',
            'literNumber.required' => 'Trường lít bắt buộc nhập'
        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidatePostage(array $data)
    {
        $rules = [
            'customer_id' => 'required',
            'postage'     => 'required',
            'month'       => 'required',
        ];
        $messages = [
            'customer_id.required' => 'Trường khách hàng bắt buộc nhập',
            'postage.required'     => 'Trường cước phí bắt buộc nhập',
            'month.required'       => 'Trường tháng bắt buộc nhập'
        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateOtherCost(array $data)
    {
        $rules = [
            'vehicle_id' => 'required',
            'cost'       => 'required',

        ];
        $messages = [
            'vehicle_id.required' => 'Trường xe bắt buộc nhập',
            'cost.required'       => 'Trường cước phí bắt buộc nhập',

        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateParkingCost(array $data)
    {
        $rules = [
            'vehicle_id' => 'required',

        ];
        $messages = [
            'vehicle_id.required' => 'Trường xe bắt buộc nhập',
        ];
        return Validator::make($data, $rules, $messages);
    }

    public static function ValidateDriver(array $data)
    {
        $rules = [
            'fullName' => 'required'
        ];
        $messages = [
            'fullName.required' => 'Trường tên tài xế bắt buộc nhập',
        ];
        return Validator::make($data, $rules, $messages);
    }

}
