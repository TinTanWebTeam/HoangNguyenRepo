<?php

namespace App\Http\Controllers;

use App\Transport;
use Illuminate\Http\Request;
use Carbon\Carbon;
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
//        $tableReport = \DB::table('transports')
//            ->join('customers', 'transports.customer_id', '=', 'customers.id')
//            ->select('transports.*', 'customers.fullName')
//            ->where('transports.active', 1)
//            ->get();
        $tableReportYear = \DB::table('transports')
            ->select('receiveDate',
                \DB::raw('SUM(cashRevenue) as total_Revenue'),
                \DB::raw('SUM(cashProfit) as total_Profit'))
            ->where(\DB::raw('YEAR(receiveDate)'), '=', \DB::raw('YEAR(NOW())'))
            ->groupBy(\DB::raw('MONTH(receiveDate)'))
            ->get();

        $year = DB::table('transports')
            ->select('receiveDate')
            ->groupBy(\DB::raw('YEAR(receiveDate)'))
            ->get();

        $response = [
            'msg'              => 'Get data report success',
//            'tableReport'      => $tableReport,
            'tableReportMonth' => $tableReportYear,
            'year'             => $year
        ];

        return response()->json($response, 200);
    }

    public function getDataReportMonth(Request $request)
    {
        $action = $request->get('_action');
        switch ($action) {
            case "year":
                try {
                    $tableReportYear = \DB::table('transports')
                        ->select('receiveDate',
                            \DB::raw('SUM(cashRevenue) as total_Revenue'),
                            \DB::raw('SUM(cashProfit) as total_Profit'))
                        ->where(\DB::raw('YEAR(receiveDate)'), '=', $request->get('_object'))
                        ->groupBy(\DB::raw('MONTH(receiveDate)'))
                        ->get();
                    $response = [
                        'msg'              => 'Get data report success',
                        'tableReportMonth' => $tableReportYear,

                    ];
                    return response()->json($response, 200);
                } catch (\Exception $ex) {
                    return $ex;
                }
                break;
            case "month":
                $tableDetail = \DB::table('transports')
                    ->join('customers', 'transports.customer_id', '=', 'customers.id')
                    ->select('transports.*', 'customers.fullName')
                    ->where(\DB::raw('YEAR(receiveDate)'), '=', $request->get('_objectYear'))
                    ->where(\DB::raw('MONTH(receiveDate)'), '=', $request->get('_objectMonth'))
                    ->get();
                $response = [
                    'msg'              => 'Get data detail report success',
                    'tableDetailReport' => $tableDetail,
                ];

                return response()->json($response, 200);
                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;

        }


    }


    public function getViewHistoryDeliveryReport()
    {
        return view('subviews.Report.HistoryDeliveryReport');
    }
}
