<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    public function getViewRevenueReport()
    {
        return view('partials.RevenueReport');
    }
    public function getViewHistoryDeliveryReport()
    {
        return view('partials.HistoryDeliveryReport');
    }
}
