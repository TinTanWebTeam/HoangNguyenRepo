<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FuelManagementController extends Controller
{
    /* GET VIEW */
    public function getView()
    {
        return view('subviews.Fuel.Fuel');
    }

    /* GET BASIC DATA WHEN VIEW LOAD COMPLETE */
    public function getDataWhenViewLoadComplete()
    {

    }
}
