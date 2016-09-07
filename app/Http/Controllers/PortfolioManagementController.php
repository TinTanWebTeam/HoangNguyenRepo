<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PortfolioManagementController extends Controller
{
    public function getViewUnit()
    {
        return view('partials.Unit');
    }
    public function getViewCity()
    {
        
        return view('partials.City');
    }
}
