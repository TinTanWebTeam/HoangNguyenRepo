<?php

namespace App\Http\Controllers;

use App\Transport;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function getViewRevenueReport()
    {
        return view('subviews.Report.RevenueReport');
    }

    public function getDataViewRevenueReport()
    {

        $tableReport = \DB::table('transports')
            ->join('customers', 'transports.customer_id', '=', 'customers.id')
            ->select('transports.*', 'customers.fullName')
            ->where('transports.active', 1)
            ->get();
        $tableReportYear = \DB::table('transports')
            ->select('receiveDate',
                \DB::raw('SUM(cashRevenue) as total_Revenue'),
                \DB::raw('SUM(cashProfit) as total_Profit'))
            ->where(\DB::raw('YEAR(receiveDate)'), '=', '2017')
            ->groupBy(\DB::raw('MONTH(receiveDate)'))
            ->get();



        $year = DB::table('transports')
            ->select('receiveDate')
            ->groupBy(\DB::raw('YEAR(receiveDate)'))
            ->get();

        $response = [
            'msg'              => 'Get data report success',
            'tableReport'      => $tableReport,
            'tableReportMonth' => $tableReportYear,
            'year'             => $year
        ];

        return response()->json($response, 200);
    }


    public function getViewHistoryDeliveryReport()
    {
        return view('subviews.Report.HistoryDeliveryReport');
    }
}
