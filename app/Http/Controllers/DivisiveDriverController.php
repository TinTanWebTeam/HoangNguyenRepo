<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DivisiveDriverController extends Controller
{
    public function getViewDivisiveDriver()
    {
        return view('partials.DivisiveDriver');
    }
}
