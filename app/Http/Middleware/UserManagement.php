<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

class UserManagement
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->id == 1) {
            return $next($request);
        } else {
            $array_roleid = \App\SubRole::where('user_id', \Auth::user()->id)->pluck('role_id');
            $roleId = \DB::table('roles')
                ->where('name','UserManagement')
                ->select('roles.id')
                ->first();
            if ($array_roleid->contains($roleId->id)) {
                return $next($request);
            } else {
                return redirect()->back();
            }
        }
    }
}
