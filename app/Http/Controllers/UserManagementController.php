<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;

class UserManagementController extends Controller
{
    public function getViewUserManagement()
    {
        $role = Role::where('active',1)->whereBetween('id',[2,10])->pluck('description','id')->toArray();
       
        return view('partials.UserManagement')->with('roles',$role);
    }
    public  function postViewUserManagement(Request $request)
    {

    }





}
