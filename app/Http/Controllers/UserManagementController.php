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

    public function postUpdatePosition(Request $request){

        try{
            $result = Position::findOrFail($request->get('dataPosition')['id']);
            $result->name =$request->get('dataPosition')['name'];
            $result->code =$request->get('dataPosition')['code'];
            $result->description =$request->get('dataPosition')['description'];
            if($result->save())
                return ['status' => 'OK'];
            else
                return ['status' => 'NO'];
        } catch (\Exception $ex){
            return ['status' => 'NO'];
        }
    }

    public function postCreatePosition(Request $request){

        try{
            $positionNew = new Position();
            $positionNew->name = $request->get('dataPosition')['name'];
            $positionNew->code = $request->get('dataPosition')['code'];
            $positionNew->description = $request->get('dataPosition')['description'];
            if($positionNew->save()){
                return [
                    'status' => 'OK',
                    'obj' => $positionNew
                ];
            }else{
                return [
                    'status' => 'NO'
                ];
            }

        } catch (\Exception $ex){
            return [
                'status' => 'NO'
            ];
        }
    }






}
