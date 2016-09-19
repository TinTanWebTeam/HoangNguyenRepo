<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    public function getViewRevenueReport()
    {
        return view('subviews.Report.RevenueReport');
    }
    public function getViewHistoryDeliveryReport()
    {
        return view('subviews.Report.HistoryDeliveryReport');
    }
}
