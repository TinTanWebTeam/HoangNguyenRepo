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
                ->where('users.active', 1)
                ->join('positions', 'users.position_id', '=', 'positions.id')
                ->select('users.*', 'positions.name as positions_name')
                ->get();
            return $users;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function postEditUser(Request $request)
    {
        $subroles = DB::table('subroles')
            ->where('user_id', $request->get('user_id'))
            ->get();
        return $subroles;
    }

    public function postModifyUser(Request $request)
    {
        $user = $request->get('_object');
        $array_roleid = $request->get('_object2');

//        $validateUser = ValidateController::ValidateCreateUser($request->get('_object'));
//        if ($validateUser->fails()) {
//            return ['status' => 'Fail'];
//        } else {
//            switch ($request->get('_action')) {
//                case "add":
//                    try {
//                        $userNew = new User();
//                        $subroles = new SubRole();
//                        $userNew->fullname = $request->get('_object')['fullname'];
//                        $userNew->username = $request->get('_object')['username'];
//                        $userNew->password = encrypt($request->get('_object')['password'], Config::get('app.key'));
//                        $userNew->address = $request->get('_object')['address'];
//                        $userNew->phone = $request->get('_object')['phone'];
//                        $userNew->email = $request->get('_object')['email'];
//                        $userNew->position_id = $request->get('_object')['position_id'];
//                        $subroles->role_id = $request->get(' _object'[ array_roleid]);
//                        if ($userNew->save())
//                            return ['status' => 'Ok',
//                                    'obj'    => $userNew
//                            ];
//                        else
//                            return ['status' => 'Fail'];
//                    } catch (Exception $ex) {
//                        return ['status' => 'Fail'];
//                    }
//                    break;
//                case "update":
//                    try {
//                        $result = Position::findOrFail($request->get('_object')['id']);
//                        $result->name = $request->get('_object')['name'];
//                        $result->description = $request->get('_object')['description'];
//                        if ($result->save())
//                            return [
//                                'status' => 'Ok',
//                                'obj'    => $result
//                            ];
//                        else
//                            return ['status' => 'Fail'];
//                    } catch (Exception $ex) {
//                        return ['status' => 'Fail'];
//                    }
//                    break;
//                case "delete":
//                    $userDelete = User::findOrFail($request->get('_object')['id']);
//                    $userDelete->active = 0;
//                    if ($userDelete->save())
//                        return ['status' => 'Ok'];
//                    return ['status' => 'Fail'];
//                    break;
//                default:
//                    break;
//            }
//        }
        switch ($request->get('_action')) {
            case "add":
                try {
                    $userNew = new User();
                    $userNew->fullname = $user['fullname'];
                    $userNew->username = $user['username'];
                    $userNew->password = encrypt($user['password'], Config::get('app.key'));
                    $userNew->email = $user['email'];
                    $userNew->position_id = $user['position_id'];
                    if (!$userNew->save()) {
                        return ['status' => 'Fail'];

                    }
                    //insert subrole
                    for($i =0; $i< count($array_roleid); $i++ ) {
                        $subRoleNew = new SubRole();
                        $subRoleNew->user_id = $userNew->id;
                        $subRoleNew->role_id = $array_roleid[$i];
                        if(!$subRoleNew->save()){
                            return ['status' => 'Fail'];
                        };
                    }
                    $userRow = DB::table('users')
                        ->join('positions', 'users.position_id', '=', 'positions.id')
                        ->where('users.id', $userNew->id)
                        ->select('users.*', 'positions.name as positions_name')
                        ->get();
                    return ['status' => 'Ok',
                            'obj'    => $userRow
                    ];
                } catch (Exception $ex) {
                    return ['status' => 'Fail'];
                }
                break;
            case "update":
                try {
                    $userUpdate = User::findOrFail($request->get('_object')['id']);
                    $userUpdate->fullname = $request->get('_object')['fullname'];
                    $userUpdate->username = $request->get('_object')['username'];
                    $userUpdate->password = encrypt($request->get('_object')['password'], Config::get('app.key'));
                    $userUpdate->email = $request->get('_object')['email'];
                    $userUpdate->position_id = $request->get('_object')['position_id'];
                    if ($userUpdate->save()) {
                        $userUpdateRow = DB::table('users')
                            ->join('positions', 'users.position_id', '=', 'positions.id')
                            ->where('users.id', $userUpdate->id)
                            ->select('users.*', 'positions.name as positions_name')
                            ->get();

                        return [
                            'status' => 'Ok',
                            'obj'    => $userUpdateRow
                        ];
                    } else
                        return ['status' => 'Fail'];
                } catch (Exception $ex) {
                    return ['status' => 'Fail'];
                }
                break;
            case "delete":
                $userDelete = User::findOrFail($request->get('_object')['id']);
                $userDelete->active = 0;
                if ($userDelete->save())
                    return ['status' => 'Ok'];
                return ['status' => 'Fail'];
                break;
            default:
                break;
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
