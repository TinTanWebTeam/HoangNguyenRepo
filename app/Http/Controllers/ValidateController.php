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
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email'       => 'required',
            'position_id' => 'required'
        ];

        return Validator::make($data, $rules);
    }
}
