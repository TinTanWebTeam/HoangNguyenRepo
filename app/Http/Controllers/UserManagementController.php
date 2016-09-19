<?php

namespace App\Http\Controllers;

use App\Position;
use App\User;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;

class UserManagementController extends Controller
{
    public function getViewUser()
    {
        $roles = Role::where('active',1)->whereBetween('id',[2,10])->pluck('description','id')->toArray();
        return view('subviews.User.User', ['roles' => $roles]);
    }
    public function getDataUser(){
        $users = \DB::table('users')
            ->join('positions', 'users.position_id', '=', 'positions.id')
            ->select('users.*', 'positions.name as positions_name')
            ->get();
        return $users;
    }

    public  function getViewPosition(){
        return view('subviews.User.Position');
    }

    public function getDataPosition()
    {
        $position = Position::where('active',1)->get();
        return $position;
    }

    public function postCreatePosition(Request $request){

        DB::table('positions')
            ->where('id', $request->get('id'))
            ->update([
                'name' => $request->get('name'),
                'code' => $request->get('code'),
                'description' => $request->get('description')
            ]);

    }




}
