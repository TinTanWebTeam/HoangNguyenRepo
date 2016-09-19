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
        return view('partials.User', ['roles' => $roles]);
    }
    public function getDataUser(){
        $users = \DB::table('users')
            ->join('positions', 'users.position_id', '=', 'positions.id')
            ->select('users.*', 'positions.name as positions_name')
            ->get();
        return $users;
    }

    public  function getViewPosition(){
        return view('partials.Position');
    }

    public function getDataPosition()
    {
        $position = Position::where('active',1)->get();
        return $position;
    }






}
