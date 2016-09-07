<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserManagementController extends Controller
{
    public function getViewUserManagement()
    {
        return view('partials.UserManagement');
    }
}
