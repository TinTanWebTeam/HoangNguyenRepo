<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;

class UserManagementController extends Controller
{
    public function getViewCreateUser()
    {
        $role = Role::where('active',1)->whereBetween('id',[2,10])->pluck('description','id')->toArray();
        return view('partials.CreateUser')->with('roles',$role);
    }
    public  function getViewPosition(){
        $position = Position::where('active',1)->get();
        return view('partials.Position')->with('positions',$position);
    }

    public function postViewPosition(Request $request)
    {
        dd('a');
        //return view('partials.Position');
    }






}
