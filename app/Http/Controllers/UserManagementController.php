<?php

namespace App\Http\Controllers;

use App\Position;
use App\SubRole;
use App\User;
use Config;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use Mockery\CountValidator\Exception;

class UserManagementController extends Controller
{
    public function getViewUser()
    {

//        $roles = Role::where('active', 1)->whereBetween('id', [2, 10])->pluck('description', 'id')->toArray();
        $roles = DB::table('roles')
            ->whereBetween('id', [2, 10])
            ->select('roles.*')
            ->get();
        $positions = Position::where('active', 1)->get();
        return view('subviews.User.User', ['roles' => $roles, 'positions' => $positions]);
    }

    public function getDataUser()
    {
        try {
            $users = \DB::table('users')
                ->join('positions', 'users.position_id', '=', 'positions.id')
                ->select('users.*', 'positions.name as positions_name')
                ->get();
            return $users;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function postModifyUser(Request $request)
    {

        $subroles = DB::table('subroles')
            ->where('user_id',$request->get('user_id'))
            ->get();
        return $subroles;

        $validateResult = ValidateController::ValidateCreateUser($request->get('_object'));
        if ($validateResult->fails()) {

            return ['status' => 'Fail'];
        } else {
            switch ($request->get('_action')) {
                case "add":
                    try {
                        $userNew = new User();
                        $userNew->fullname = $request->get('_object')['fullname'];
                        $userNew->username = $request->get('_object')['username'];
                        $userNew->password = encrypt($request->get('_object')['password'], Config::get('app.key'));
                        $userNew->address = $request->get('_object')['address'];
                        $userNew->phone = $request->get('_object')['phone'];
                        $userNew->email = $request->get('_object')['email'];
                        $userNew->position_id = $request->get('_object')['position_id'];
                        $userNew->role_id = $request->get(' _object'[ array_roleid]);
                        if ($userNew->save())
                            return ['status' => 'Ok',
                                    'obj'    => $userNew
                            ];
                        else
                            return ['status' => 'Fail'];
                    } catch (Exception $ex) {
                        return ['status' => 'Fail'];
                    }
                    break;
                case "update":
                    try {
                        $result = Position::findOrFail($request->get('_object')['id']);
                        $result->name = $request->get('_object')['name'];
                        $result->description = $request->get('_object')['description'];
                        if ($result->save())
                            return [
                                'status' => 'Ok',
                                'obj'    => $result
                            ];
                        else
                            return ['status' => 'Fail'];
                    } catch (Exception $ex) {
                        return ['status' => 'Fail'];
                    }
                    break;
                case "delete":
                    $positionDelete = Position::findOrFail($request->get('_object')['id']);
                    $positionDelete->active = 0;
                    if ($positionDelete->save())
                        return ['status' => 'Ok'];
                    return ['status' => 'Fail'];
                    break;
                default:
                    break;
            }
        }


    }

    public function getViewPosition()
    {
        return view('subviews.User.Position');
    }

    public function getDataPosition()
    {
        $position = Position::where('active', 1)->get();
        return $position;
    }

    public function postModifyPosition(Request $request)
    {
        $validateResult = ValidateController::ValidatePositionUpdate($request->get('_object'));
        if ($validateResult->fails()) {
            return ['status' => 'Fail'];
        } else {
            switch ($request->get('_action')) {
                case "add":
                    try {
                        $positionNew = new Position();
                        $positionNew->name = $request->get('_object')['name'];
                        $positionNew->description = $request->get('_object')['description'];
                        if ($positionNew->save())
                            return ['status' => 'Ok',
                                    'obj'    => $positionNew
                            ];
                        else
                            return ['status' => 'Fail'];
                    } catch (Exception $ex) {
                        return ['status' => 'Fail'];
                    }
                    break;
                case "update":
                    try {
                        $result = Position::findOrFail($request->get('_object')['id']);
                        $result->name = $request->get('_object')['name'];
                        $result->description = $request->get('_object')['description'];
                        if ($result->save())
                            return [
                                'status' => 'Ok',
                                'obj'    => $result
                            ];
                        else
                            return ['status' => 'Fail'];
                    } catch (Exception $ex) {
                        return ['status' => 'Fail'];
                    }
                    break;
                case "delete":
                    $positionDelete = Position::findOrFail($request->get('_object')['id']);
                    $positionDelete->active = 0;
                    if ($positionDelete->save())
                        return ['status' => 'Ok'];
                    return ['status' => 'Fail'];
                    break;
                default:
                    break;
            }
        }
    }


}
