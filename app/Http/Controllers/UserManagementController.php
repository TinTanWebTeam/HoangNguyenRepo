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
use Symfony\Component\Finder\Comparator\NumberComparator;

class UserManagementController extends Controller
{
    public function getViewUser()
    {
        try {
            $roles = DB::table('roles')
                ->whereBetween('id', [2, 10])
                ->select('roles.*')
                ->get();
            $positions = Position::where('active', 1)->get();
            return view('subviews.User.User', ['roles' => $roles, 'positions' => $positions]);
        } catch (\Exception $ex) {
            return $ex;
        }

    }

    public function getDataUser()
    {
        try {
            $users = DB::table('users')
                ->where('users.active', 1)
                ->join('positions', 'users.position_id', '=', 'positions.id')
                ->select('users.*', 'positions.name as positions_name')
                ->get();
            return $users;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function postDataUserValidate(Request $request)
    {

        $user = DB::table('users')
            ->where('users.active', 1)
            ->where('users.username','=',$request->get('_object'))
            ->first();
        if($user == null){
            $response = [
                'msg' => "User khong ton tai"
            ];
            return response()->json($response, 200);
        }
        $response = [
            'msg' => "User đa ton tai"
        ];
        return response()->json($response, 201);

    }









    public function postEditUser(Request $request)
    {
        try {
            $subroles = DB::table('subroles')
                ->where('user_id', $request->get('user_id'))
                ->get();

            $password = DB::table('users')
                ->where('id', $request->get('user_id'))
                ->select('users.password')
                ->first();
            $pass2 = decrypt($password->password, Config::get('app.key'));
            return [
                'subroles' => $subroles,
                'password' => $pass2
            ];
        } catch (\Exception $ex) {
            return $ex;
        }


    }

    public function postModifyUser(Request $request)
    {
        try {

            $user = $request->get('_object');
            $array_roleid = $request->get('_object2');
            $validateUser = ValidateController::ValidateCreateUser($request->get('_object'));
            if ($validateUser->fails()) {
                return $validateUser->errors();
                //return ['status' => 'Fail'];
            } else {
                switch ($request->get('_action')) {
                    case "add":
                        try {

                            $userNew = new User();
                            $userNew->fullName = $user['fullName'];
                            $userNew->userName = $user['username'];
                            $userNew->password = encrypt($user['password'], Config::get('app.key'));
                            $userNew->email = $user['email'];
                            $userNew->address = $user['address'];
                            $userNew->phone = $user['phone'];
                            $userNew->note = $user['note'];
                            $userNew->position_id = $user['position_id'];
                            if (!$userNew->save()) {
                                return ['status' => 'Fail'];
                            }
                            //insert subrole
                            for ($i = 0; $i < count($array_roleid); $i++) {
                                $subRoleNew = new SubRole();
                                $subRoleNew->user_id = $userNew->id;
                                $subRoleNew->role_id = $array_roleid[$i];
                                if (!$subRoleNew->save()) {
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
                            $userUpdate->fullname = $request->get('_object')['fullName'];
                            $userUpdate->username = $request->get('_object')['username'];
                            $userUpdate->password = encrypt($request->get('_object')['password'], Config::get('app.key'));
                            $userUpdate->email = $request->get('_object')['email'];
                            $userUpdate->address = $user['address'];
                            $userUpdate->phone = $user['phone'];
                            $userUpdate->note = $user['note'];
                            $userUpdate->position_id = $request->get('_object')['position_id'];
                            if (!$userUpdate->save()) {
                                return ['status' => 'Fail'];
                            }
                            /* delete subrole*/
                            $deleteList = SubRole::where('user_id', $request->get('_object')['id'])->pluck('role_id');
                            for ($i = 0; $i < count($deleteList); $i++) {
                                $subroleDelete = SubRole::where([
                                        ['role_id', '=', $deleteList[$i]],
                                        ['user_id', '=', $request->get('_object')['id']]
                                    ]
                                )->get();
                                for ($j = 0; $j < count($subroleDelete); $j++) {
                                    $deleteSubrole = SubRole::findOrFail($subroleDelete[$j]['id']);
                                    if (!$deleteSubrole->delete()) {
                                        return ['status' => 'Fail'];
                                    };
                                }

                            }
                            //insert subrole
                            for ($i = 0; $i < count($array_roleid); $i++) {
                                $subRoleUpdate = new SubRole();
                                $subRoleUpdate->user_id = $userUpdate->id;
                                $subRoleUpdate->role_id = $array_roleid[$i];
                                if (!$subRoleUpdate->save()) {
                                    return ['status' => 'Fail'];
                                };
                            }

                            $roleRowUpdate = DB::table('users')
                                ->join('positions', 'users.position_id', '=', 'positions.id')
                                ->where('users.id', $userUpdate->id)
                                ->select('users.*', 'positions.name as positions_name')
                                ->get();
                            return ['status' => 'Ok',
                                    'obj'    => $roleRowUpdate
                            ];
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
        } catch (\Exception $ex) {
            return $ex;
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
        try {
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
        } catch (\Exception $ex) {
            return $ex;
        }

    }
}
