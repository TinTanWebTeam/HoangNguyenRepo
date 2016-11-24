<?php

namespace App\Http\Controllers;

use App\Transport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class ReportController extends Controller
{

    public function getViewRevenueReport()
    {
        return view('subviews.Report.RevenueReport');
    }

    public function getViewTransportHistoryReport()
    {
        return view('subviews.Report.HistoryDeliveryReport');
    }

    public function getBasicData()
    {
        $dateNow = date('Y-m-d');
    }

    public function getDataForTableRevenueProfitTransport($from,$to)
    {
        // return array;
    }

    public function getDataForTableRevenueOilLubePackingSomethingElse($from,$to)
    {
        //return array;
    }

    public function getDataForTableRevenuePerYear($year)
    {
        // return array;
    }

}
