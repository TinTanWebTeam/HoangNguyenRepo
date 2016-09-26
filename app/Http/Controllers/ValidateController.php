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
            'fullname'    => 'required',
            'username'    => 'required',
            'password'    => 'required',
            'email'       => 'required',
        ];
        $messages = [
            'fullname.required'    => 'Trường fullname bắt buộc nhập',
            'username.required'    => 'Trường username bắt buộc nhập',
            'password .required'   => 'Trường password bắt buộc nhập',
            'email.required'       => 'Trường email bắt buộc nhập',
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
            'name'      => 'required'
        ];
        $messages = [
            'name.required'      => 'Trường tên loại xe bắt buộc nhập'
        ];

        return Validator::make($data, $rules, $messages);
    }
}
