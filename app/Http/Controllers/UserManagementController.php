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
            if (\Auth::user()->id == 1) {
                return view('subviews.User.Admin', ['roles' => $roles, 'positions' => $positions]);
            }
            return view('subviews.User.User', ['roles' => $roles, 'positions' => $positions]);

        } catch (\Exception $ex) {
            return $ex;
        }
    }


    public function getDataUser()
    {
        try {
            $position = Position::where('active', 1)->get();
            $userOfAdmin = DB::table('users')
                ->join('positions', 'users.position_id', '=', 'positions.id')
                ->select('users.*', 'positions.name as positions_name')
                ->orderBy('users.id', 'DESC')
                ->get();
            $users = DB::table('users')
                ->where('users.active', 1)
                ->where('users.id','!=',\Auth::user()->id)
                ->join('positions', 'users.position_id', '=', 'positions.id')
                ->select('users.*', 'positions.name as positions_name')
                ->orderBy('users.id', 'DESC')
                ->get();
            $response = [
                'msg'           => 'Get data User success',
                'tableUser'     => $users,
                'tablePosition' => $position,
                'tableUserOfAdmin' =>$userOfAdmin
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
                'msg'      => "User khong ton tai",
                'dataUser' => $user
            ];
            return response()->json($response, 200);
        }
        $response = [
            'msg'      => "User đa ton tai",
            'dataUser' => $user
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

        if ($action != 'delete' && $action != 'restoreUser') {
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
                        ->orderBy('users.id', 'DESC')
                        ->get();
                    $response = [
                        'msg'          => 'Created user',
                        'tableUserAdd' => $userAdd,
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
                        ->orderBy('users.id', 'DESC')
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
                if (!$userDelete->update()) {
                    return response()->json(['msg' => 'Restore failed'], 404);
                }
                $deleteUser = \DB::table('users')
                    ->join('positions', 'users.position_id', '=', 'positions.id')
                    ->select('users.*', 'positions.name as positions_name')
                    ->where('users.id', $userDelete->id)
                    ->first();
                $response = [
                    'msg'              => 'Restore User',
                    'TableDeleteUser' => $deleteUser
                ];
                return response()->json($response, 201);
                break;

            case "restoreUser":
                $userRestore = User::findOrFail($request->get('_object'));
                $userRestore->active = 1;
                if (!$userRestore->update()) {
                    return response()->json(['msg' => 'Restore failed'], 404);
                }
                $restore = \DB::table('users')
                    ->join('positions', 'users.position_id', '=', 'positions.id')
                    ->select('users.*', 'positions.name as positions_name')
                    ->where('users.id', $userRestore->id)
                    ->first();

                $response = [
                    'msg'              => 'Restore User',
                    'TableRestoreUser' => $restore
                ];
                return response()->json($response, 201);
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

    public function postDataPositionValidate(Request $request)
    {
        $position = DB::table('positions')
            ->where('positions.name', '=', $request->get('_object'))
            ->first();
        if ($position == null) {
            $response = [
                'msg'          => "Position khong ton tai",
                'dataPosition' => $position
            ];
            return response()->json($response, 200);
        }
        $response = [
            'msg'          => "Position đa ton tai",
            'dataPosition' => $position
        ];
        return response()->json($response, 201);

    }

    public function postModifyPosition(Request $request)
    {
        $name = null;
        $description = null;
        $action = $request->get('_action');
        if ($action != 'delete' && $action != 'restorePosition') {
            $validateResult = ValidateController::ValidatePosition($request->get('_object'));
            if ($validateResult->fails()) {
                return $validateResult->errors();
//                return response()->json(['msg' => 'Input data fail'], 404);
            }
            $name = $request->get('_object')['name'];
            $description = $request->get('_object')['description'];
        }
        switch ($action) {
            case "add":
                try {
                    $positionNew = new Position();
                    $positionNew->name = $name;
                    $positionNew->description = $description;
                    if (!$positionNew->save()) {
                        return response()->json(['msg' => 'Create failed'], 404);
                    }
                    $positionNew = \DB::table('positions')
                        ->where('positions.active', 1)
                        ->where('positions.id', $positionNew->id)
                        ->select('positions.*')
                        ->orderBy('positions.id', 'DESC')
                        ->get();
                    $response = [
                        'msg'              => 'Created Position',
                        'tablePositionAdd' => $positionNew,
                    ];
                    return response()->json($response, 201);

                } catch (Exception $ex) {
                    return $ex;
                }
                break;
            case "update":
                try {
                    $positionUpdate = Position::findOrFail($request->get('_object')['id']);
                    $positionUpdate->name = $name;
                    $positionUpdate->description = $description;
                    if (!$positionUpdate->save()) {
                        return response()->json(['msg' => 'Update failed'], 404);
                    }
                    $positionUpdate = \DB::table('positions')
                        ->where('positions.active', 1)
                        ->where('positions.id', $positionUpdate->id)
                        ->select('positions.*')
                        ->orderBy('positions.id', 'DESC')
                        ->get();
                    $response = [
                        'msg'                 => 'Updated Position',
                        'tablePositionUpdate' => $positionUpdate,
                    ];
                    return response()->json($response, 201);

                } catch (Exception $ex) {
                    return $ex;
                }
                break;
            case "delete":
                $positionDelete = Position::findOrFail($request->get('_object'));
                $positionDelete->active = 0;
                if ($positionDelete->update()) {
                    $response = [
                        'msg' => 'Deleted Position'
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Deletion failed'], 404);
                break;
            case "restorePosition":
                $positionRestore = Position::findOrFail($request->get('_object'));
                $positionRestore->active = 1;
                if ($positionRestore->update()) {
                    $response = [
                        'msg'                  => 'Restore Position',
                        'TableRestorePosition' => $positionRestore
                    ];
                    return response()->json($response, 201);
                }
                return response()->json(['msg' => 'Restore failed'], 404);
                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;
        }


    }

}
