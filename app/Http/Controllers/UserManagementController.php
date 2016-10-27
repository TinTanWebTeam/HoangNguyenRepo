<?php

namespace App\Http\Controllers;

use App\Position;
use App\SubRole;
use App\User;
use Carbon\Carbon;
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
                ->whereBetween('id', [2, 9])
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
            $position = Position::all();
            $users = DB::table('users')
                ->where('users.active', 1)
                ->join('positions','users.position_id', '=', 'positions.id')
                ->select('users.*', 'positions.name as positions_name')
                ->orderBy('users.id','DESC')
                ->get();
            $response = [
                'msg'           => 'Get data User success',
                'tableUser'     => $users,
                'tablePosition' => $position
            ];
            return response()->json($response, 200);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function postDataUserValidate(Request $request)
    {

        $user = DB::table('users')
            ->where('users.username', '=', $request->get('_object'))
            ->first();
        if ($user == null) {
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
            $subRoles = DB::table('subRoles')
                ->where('user_id', $request->get('_object'))
                ->get();

            $password = DB::table('users')
                ->where('id', $request->get('_object'))
                ->select('users.password')
                ->first();
            $password_confirm = decrypt($password->password, Config::get('app.key'));

            $response = [
                'msg'      => 'Get data user success',
                'subRoles' => $subRoles,
                'password' => $password_confirm

            ];
            return response()->json($response, 200);
        } catch (\Exception $ex) {
            return $ex;
        }
    }

    public function postModifyUser(Request $request)
    {
        $fullName = null;
        $userName = null;
        $password = null;
        $email = null;
        $address = null;
        $phone = null;
        $user = null;
        $array_roleId = null;
        $birthday = null;
        $position_id = null;
        $action = $request->get('_action');

        if ($action != 'delete') {
            $validateUser = ValidateController::ValidateCreateUser($request->get('_object'));
            if ($validateUser->fails()) {
                return $validateUser->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }

            $fullName = $request->get('_object')['fullName'];
            $userName = $request->get('_object')['username'];
            $password = encrypt($request->get('_object')['password']);
            $email = $request->get('_object')['email'];
            $address = $request->get('_object')['address'];
            $phone = $request->get('_object')['phone'];
            $position_id = $request->get('_object')['position_id'];
            $test = $request->get('_object')['birthday'];
            $birthday = Carbon::createFromFormat('d-m-Y', $test)->toDateTimeString();
            $array_roleId = $request->get('_object2');

        }
        switch ($action) {
            case "add":
                try {
                    $userNew = new User();
                    $userNew->fullName = $fullName;
                    $userNew->username = $userName;
                    $userNew->password = $password;
                    $userNew->email = $email;
                    $userNew->address = $address;
                    $userNew->phone = $phone;
                    $userNew->birthday = $birthday;
                    $userNew->position_id = $position_id;
                    $userNew->createdBy = \Auth::user()->id;
                    $userNew->updatedBy = \Auth::user()->id;
                    if (!$userNew->save()) {
                        return response()->json(['msg' => 'Create failed'], 404);
                    }
                    $addNewRoles = collect($array_roleId)->toArray();
                    foreach ($addNewRoles as $item) {
                        $subRoleNew = new SubRole();
                        $subRoleNew->user_id = $userNew->id;
                        $subRoleNew->role_id = $item;
                        if (!$subRoleNew->save()) {
                            return response()->json(['msg' => 'Create failed'], 404);
                        }
                    }

                    $userAdd = \DB::table('users')
                        ->where('users.active', 1)
                        ->where('users.id', $userNew->id)
                        ->join('positions', 'users.position_id', '=', 'positions.id')
                        ->select('users.*', 'positions.name as positions_name')
                        ->orderBy('users.id','DESC')
                        ->get();
                    $response = [
                        'msg'          => 'Created user',
                        'tableUserAdd' => $userAdd,
//                        'subRoleNew'   => $subRoleNew
                    ];
                    return response()->json($response, 201);

                } catch (Exception $ex) {
                    return $ex;
                }
                break;
            case "update":
                try {
                    $userUpdate = User::findOrFail($request->get('_object')['id']);
                    $userUpdate->fullName = $fullName;
                    $userUpdate->username = $userName;
                    $userUpdate->password = $password;
                    $userUpdate->email = $email;
                    $userUpdate->address = $address;
                    $userUpdate->phone = $phone;
                    $userUpdate->birthday = $birthday;
                    $userUpdate->position_id = $position_id;
                    $userUpdate->updatedBy = \Auth::user()->id;
                    if (!$userUpdate->save()) {
                        return response()->json(['msg' => 'Update failed'], 404);
                    }
                    $deleteList = SubRole::where('user_id', $request->get('_object')['id'])->pluck('role_id')->map(function ($item, $key) {
                        return '' . $item;
                    });
                    $deleteRoles = $deleteList->diff($array_roleId);
                    SubRole::where('user_id', '=', $request->get('_object')['id'])
                        ->whereIn('role_id', $deleteRoles->toArray())
                        ->delete();
                    $addRoles = collect($array_roleId)->diff($deleteList->toArray());
                    foreach ($addRoles as $item) {
                        $subRoleUpdate = new SubRole();
                        $subRoleUpdate->user_id = $request->get('_object')['id'];
                        $subRoleUpdate->role_id = $item;
                        if (!$subRoleUpdate->save()) {
                            return response()->json(['msg' => 'Update failed'], 404);
                        }
                    }
                    $subRoles = \DB::table('subRoles')
                        ->where('user_id', $userUpdate->id)
                        ->get();
                    $userUpdate = \DB::table('users')
                        ->join('positions', 'users.position_id', '=', 'positions.id')
                        ->where('users.id', $userUpdate->id)
                        ->select('users.*', 'positions.name as positions_name')
                        ->orderBy('users.id','DESC')
                        ->get();
                    $response = [
                        'msg'             => 'Updated user',
                        'tableUserUpdate' => $userUpdate,
                        'subRoles'        => $subRoles
                    ];
                    return response()->json($response, 201);

                } catch (Exception $ex) {
                    return $ex;
                }
                break;
            case "delete":
                $userDelete = User::findOrFail($request->get('_object'));
                $userDelete->active = 0;
                if ($userDelete->update()) {
                    $response = [
                        'msg' => 'Deleted user'
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Deletion failed'], 404);
                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
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
