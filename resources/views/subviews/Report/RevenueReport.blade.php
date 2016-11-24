<style>

    ol.breadcrumb {
        border-bottom: 2px solid #e7e7e7
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>


<!-- Begin Table Detail Report -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">Báo cáo</a></li>
                        <li class="active">Doanh thu</li>
                    </ol>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Doanh thu / lợi nhuận giao hàng</strong></p>
                    <div class="row">
                        <div class="col-md-7">
                            <input id="dateStartForRevenueTransport" type="text" class="date start text-center"/> đến
                            <input id="dateEndForRevenueTransport" type="text" class="date end text-center"/>

                        </div>
                        <div class="col-md-5" style="padding-left: 0">
                            <button onclick=""
                                    class="btn btn-sm btn-info marginRight"><i
                                        class="fa fa-search" aria-hidden="true"></i> Tìm
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="tableRevenueProfitTransport">
                                    <thead>
                                    <tr class="active">
                                        <th>Khách hàng</th>
                                        <th>Doanh thu giao hàng</th>
                                        <th>Lợi nhuận giao hàng</th>
                                        <th>Khách hàng Nợ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Giao xe, đổ dầu, thay nhớt, đậu bãi, khác</strong>
                    </p>
                    <div class="row">
                        <div class="col-md-7">
                            <input id="dateStartForOilLubePackingSomethingElse" type="text" class="date start text-center"/> đến
                            <input id="dateEndForOilLubePackingSomethingElse" type="text" class="date end text-center"/>

                        </div>
                        <div class="col-md-5" style="padding-left: 0">
                            <button onclick=""
                                    class="btn btn-sm btn-info marginRight"><i
                                        class="fa fa-search" aria-hidden="true"></i> Tìm
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover"
                                       id="tableRevenueOilLubePackingSomethingElse">
                                    <thead>
                                    <tr class="active">
                                        <th>Nhà xe</th>
                                        <th>Giao nhà xe</th>
                                        <th>Phí đổ dầu</th>
                                        <th>Phí thay nhớt</th>
                                        <th>Phí đậu bãi</th>
                                        <th>Phí Khác</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Xem chi tiết phí giao xe</strong>
                    </p>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover"
                                       id="tableRevenueOilLubePackingSomethingElseDetail">
                                    <thead>
                                    <tr class="active">
                                        <th>Xe</th>
                                        <th>Nhà xe</th>
                                        <th>Giao xe</th>
                                        <th>Phí đổ dầu</th>
                                        <th>Phí thay nhớt</th>
                                        <th>Phí đậu bãi</th>
                                        <th>Phí khác</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Thống kê hàng năm</strong></p>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group form-md-line-input">
                                <select class="form-control" id="optionYear"
                                        name="optionYear"
                                        onchange="">
                                </select>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover" id="tableRevenueProfitTransport">
                                        <thead>
                                        <tr class="active">
                                            <th>Tháng</th>
                                            <th>Doanh thu</th>
                                            <th>Lợi nhuận</th>
                                            <th>Nợ</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div>
<!-- End Table Detail Report -->


<script>

    $(function () {
        if (typeof (revenueReportView) === 'undefined') {
            revenueReportView = {
                inputDateNeedRender: [
                    'dateStartForRevenueTransport',
                    'dateEndForRevenueTransport',
                    'dateStartForOilLubePackingSomethingElse',
                    'dateEndForOilLubePackingSomethingElse',
                ],
                loadBasicData: function(){
                    console.log();
                },
                loadChart: function (data) {
                    $('#container').highcharts({
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Doanh thu / lợi nhuận giao hàng'
                        },

                        xAxis: {
                            categories: [
                                'T1',
                                'T2',
                                'T3',
                                'T4',
                                'T5',
                                'T6',
                                'T7',
                                'T8',
                                'T9',
                                'T10',
                                'T11',
                                'T12'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: ' Triệu đồng'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} Vnd</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.1,
                                borderWidth: 0
                            }
                        },
                        series: [
                            {
                                name: 'Doanh Thu',
                                data: [80, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                            }, {
                                name: 'Lợi Nhuận',
                                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
                            }
                        ]
                    });
                },
                renderDateTimePicker: function () {
                    for(var dateInput in revenueReportView.inputDateNeedRender){
                        $("#"+revenueReportView.inputDateNeedRender[dateInput]).datepicker({
                            "format": "dd-mm-yyyy",
                            "autoclose": true
                        });
                        if(revenueReportView.inputDateNeedRender[dateInput].indexOf("start")){
                            $("#"+revenueReportView.inputDateNeedRender[dateInput]).datepicker("setDate", new Date());
                        }else{
                            $("#"+revenueReportView.inputDateNeedRender[dateInput]).datepicker("setDate", new Date());
                        }
                    }
                }
            };
            revenueReportView.loadBasicData();
            revenueReportView.loadChart();
            revenueReportView.renderDateTimePicker();
        } else {
            revenueReportView.loadBasicData();
            revenueReportView.loadChart();
            revenueReportView.renderDateTimePicker();
        }
    });
</script>