<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FuelManagementController extends Controller
{
    /*--------------------------------------------------------------------------------*/
    /* OIL MANAGEMENT */
    /*--------------------------------------------------------------------------------*/

    /* GET VIEW */
    public function getOilView()
    {
        return view('subviews.Fuel.Oil');
    }

    /* GET VIEW COMPLETE DATA */
    public function getOilViewCompleteData()
    {
        
    }

    /*--------------------------------------------------------------------------------*/
    /* LUBE MANAGEMENT */
    /*--------------------------------------------------------------------------------*/

    /* GET VIEW */
    public function getLubeView()
    {
        return view('subviews.Fuel.Lube');
    }

    /* GET VIEW COMPLETE DATA */
    public function getLubeViewCompleteData()
    {

    }

}
