<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PostageManagementController extends Controller
{
    public function getViewCustomerPostage()
    {
        return view('subviews.Postage.CustomerPostage');
    }
    public function getViewMonthPostage()
    {
        return view('subviews.Postage.MonthPostage');
    }
}
