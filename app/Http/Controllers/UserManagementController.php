<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;

class UserManagementController extends Controller
{
    public function getViewUser()
    {
        $user = User::Where('active',1)->where('id','>', '2')->get();
        $role = Role::where('active',1)->whereBetween('id',[2,10])->pluck('description','id')->toArray();
        return view('partials.User')->with('roles',$role)->with('users',$user);
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
