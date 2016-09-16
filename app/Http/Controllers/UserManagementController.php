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
        $roles = Role::where('active',1)->whereBetween('id',[2,10])->pluck('description','id')->toArray();
        $users = \DB::table('users')
            ->join('positions', 'users.position_id', '=', 'positions.id')
            ->select('users.*', 'positions.name as positions_name')
            ->get();
        return view('partials.User', ['roles' => $roles, 'users' => $users]);
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
