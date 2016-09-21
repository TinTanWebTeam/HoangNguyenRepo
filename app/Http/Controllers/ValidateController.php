<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class ValidateController extends Controller
{
    public static function ValidatePositionUpdate(array $data){
        $rules = [
            'code' => 'required',
            'name' => 'required'
        ];
        $messages = [
            'code.required' => 'Trường mã bắt buộc nhập',
            'name.required' => 'Trường tên bắt buộc nhập'
        ];
        return Validator::make($data,$rules,$messages);
    }
}
