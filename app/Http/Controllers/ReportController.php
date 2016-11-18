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

    public function getDataViewRevenueReport()
    {
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
        $test = Transport::where('active', 1)->pluck('cashDelivery')->toArray();
        $response = [
            'msg'              => 'Get data report success',
            'tableReportMonth' => $tableReportYear,
            'year'             => $year,
            'test'             => $test
        ];

        return response()->json($response, 200);
    }

    public function getDataReportList(Request $request)
    {

        try {
            $action = $request->get('_action');
            switch ($action) {
                case "listMonths":
                    try {
                        $tableReportYear = \DB::table('transports')
                            ->join('costs', 'transports.id', '=', 'costs.transport_id')
                            ->select('receiveDate', 'costs.cost',
                                \DB::raw('SUM(cashRevenue) as total_Revenue'),
                                \DB::raw('SUM(cashReceive) as total_Receive'),
                                \DB::raw('SUM(cashProfit) as total_Profit'),
                                \DB::raw('SUM(cashPreDelivery) as total_PreDelivery'),
                                \DB::raw('SUM(costs.cost) as total_Cost'))
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
                case "listDays":
                    try {
                        $tableDetail = \DB::table('transports')
                            ->join('customers', 'transports.customer_id', '=', 'customers.id')
                            ->join('costs', 'transports.id', '=', 'costs.transport_id')
                            ->select('transports.*', 'costs.cost', 'customers.fullName')
                            ->where(\DB::raw('YEAR(receiveDate)'), '=', $request->get('_objectYear'))
                            ->where(\DB::raw('MONTH(receiveDate)'), '=', $request->get('_objectMonth'))
                            ->get();
                        $response = [
                            'msg'               => 'Get data detail report success',
                            'tableDetailReport' => $tableDetail,
                        ];
                        return response()->json($response, 200);
                    } catch (\Exception $ex) {
                        return $ex;
                    }

                    break;
                case "searchDateToDate":
                    try {
                        $start = $request->get('_dateStart');
                        $end = $request->get('_dateEnd');
                        $dateStart = Carbon::createFromFormat('d-m-Y', $start)->format('Y-m-d');
                        $dateEnd = Carbon::createFromFormat('d-m-Y', $end)->format('Y-m-d');
                        $tableDataSearch = \DB::table('transports')
                            ->join('customers', 'transports.customer_id', '=', 'customers.id')
                            ->select('transports.*', 'customers.fullName')
                            ->whereBetween(\DB::raw('DATE(receiveDate)'), [$dateStart, $dateEnd])
                            ->orderBy('receiveDate')
                            ->get();
                        $response = [
                            'msg'             => 'Get data detail report success',
                            'tableDataSearch' => $tableDataSearch,
                        ];
                        return response()->json($response, 200);
                    } catch (\Exception $ex) {
                        return $ex;
                    }
                    break;
                default:
                    return response()->json(['msg' => 'Connection to server failed'], 404);
                    break;

            }

        } catch (\Exception $ex) {
            return $ex;
        }


    }


    public function getViewHistoryDeliveryReport()
    {
        return view('subviews.Report.HistoryDeliveryReport');
    }

    public function getDataViewDeliveryReport()
    {
        $tableReportDelivery = \DB::table('transports')
            ->join('customers', 'transports.customer_id', '=', 'customers.id')
            ->select('transports.*', 'customers.fullName',
                \DB::raw('COUNT(*) as total_delivery')
            )
            ->where(\DB::raw('YEAR(receiveDate)'), '=', \DB::raw('YEAR(NOW())'))
            ->groupBy(\DB::raw('MONTH(receiveDate)'))
            ->get();
        $year = DB::table('transports')
            ->select('receiveDate')
            ->groupBy(\DB::raw('YEAR(receiveDate)'))
            ->get();

        $response = [
            'msg'           => 'Get data delivery success',
            'tableDelivery' => $tableReportDelivery,
            'year'          => $year
        ];

        return response()->json($response, 200);
    }

    public function getDataDeliveryList(Request $request)
    {
        $action = $request->get('_action');
        switch ($action) {
            case "listDeliveryMonths":
                try {
                    $tableDeliveryYear = \DB::table('transports')
                        ->join('customers', 'transports.customer_id', '=', 'customers.id')
                        ->select('transports.*', 'customers.fullName',
                            \DB::raw('COUNT(*) as total_delivery'))
                        ->where(\DB::raw('YEAR(receiveDate)'), '=', $request->get('_object'))
                        ->groupBy(\DB::raw('MONTH(receiveDate)'))
                        ->get();
                    $response = [
                        'msg'                => 'Get data delivery success',
                        'tableDeliveryMonth' => $tableDeliveryYear,
                    ];
                    return response()->json($response, 200);
                } catch (\Exception $ex) {
                    return $ex;
                }


                break;
            case "listDeliveryDays":
                try {
                    $tableDeliveryDays = \DB::table('transports')
                        ->join('customers', 'transports.customer_id', '=', 'customers.id')
                        ->select('transports.*', 'customers.fullName',
                            \DB::raw('SUM(cashRevenue) as total_Revenue'),
                            \DB::raw('SUM(cashReceive) as total_Receive'),
                            \DB::raw('COUNT(customer_id) as total_delivery'))
                        ->where(\DB::raw('YEAR(receiveDate)'), '=', $request->get('_objectYear'))
                        ->where(\DB::raw('MONTH(receiveDate)'), '=', $request->get('_objectMonth'))
                        ->groupBy(\DB::raw('customers.fullName'))
                        ->get();
                    $response = [
                        'msg'               => 'Get data delivery success',
                        'tableDeliveryDays' => $tableDeliveryDays,
                    ];
                    return response()->json($response, 200);
                } catch (\Exception $ex) {
                    return $ex;
                }

                break;
            case "searchDateToDate":
                try {
                    $start = $request->get('_dateStart');
                    $end = $request->get('_dateEnd');
                    $dateStart = Carbon::createFromFormat('d-m-Y', $start)->format('Y-m-d');
                    $dateEnd = Carbon::createFromFormat('d-m-Y', $end)->format('Y-m-d');
                    $tableDataSearch = \DB::table('transports')
                        ->join('customers', 'transports.customer_id', '=', 'customers.id')
                        ->select('transports.*', 'customers.fullName',
                            \DB::raw('SUM(cashRevenue) as total_Revenue'),
                            \DB::raw('SUM(cashReceive) as total_Receive'),
                            \DB::raw('COUNT(customer_id) as total_delivery'))
                        ->whereBetween(\DB::raw('DATE(receiveDate)'), [$dateStart, $dateEnd])
                        ->groupBy(\DB::raw('customers.fullName'))
                        ->get();
                    $response = [
                        'msg'             => 'Get data detail report success',
                        'tableDataSearch' => $tableDataSearch,
                    ];
                    return response()->json($response, 200);
                } catch (\Exception $ex) {
                    return $ex;
                }
                break;
            default:
                return response()->json(['msg' => 'Connection to server failed'], 404);
                break;

        }
    }
}
