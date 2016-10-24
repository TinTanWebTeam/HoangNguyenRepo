<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    ol.breadcrumb {
        border-bottom: 2px solid #e7e7e7
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">Báo cáo</a></li>
                        <li class="active">Lịch sử giao hàng</li>
                    </ol>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Chi tiết giao hàng</strong></p>
                    <div class="row">
                        <div class="col-md-4" id="dateSearchDetailDelivery">
                            <input id="dateStart" type="text" class="date start"/> đến
                            <input id="dateEnd" type="text" class="date end"/>

                        </div>
                        <div class="col-md-8" style="padding-left: 0">
                            <button onclick="" id="btnSearchTransport"
                                    class="btn btn-sm btn-info marginRight"><i
                                        class="fa fa-search" aria-hidden="true"></i> Tìm
                            </button>
                            <button class="btn btn-sm btn-default" onclick="">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                            </button>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-data">
                                    <thead>
                                    <tr class="active">
                                        <th>Khách hàng</th>
                                        <th>Số chuyến</th>
                                        <th>Đã thanh toán</th>
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
                    <p class="lead text-primary text-left"><strong>Các chuyến theo tháng</strong></p>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group form-md-line-input">
                                <label for="optionYear"><b>Chọn năm</b></label>
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
                                <div class="col-md-6">
                                    <table class="table table-bordered table-hover" id="table-data-year">
                                        <thead>
                                        <tr class="active">
                                            <th>Tháng</th>
                                            <th>Số chuyến</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 ">
                                    <div id="container"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<script>
    $(function () {
        if (typeof (historyDeliveryReportView) === 'undefined') {
            historyDeliveryReportView = {
                table: null,
                tableYear: null,
                data: null,
                action: null,
                tableDetailRevenue: null,
                tableRevenueMonth: null,
                tableOptionYear: null,
                current: null,
                loadData: function () {
                    historyDeliveryReportView.table = $('#table-data').DataTable({
                        language: languageOptions
                    });
                    historyDeliveryReportView.loadChart();
                },
                loadChart: function () {
                    $('#container').highcharts({
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Doanh thu / lợi nhuận theo tháng'
                        },

                        xAxis: {
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar',
                                'Apr',
                                'May',
                                'Jun',
                                'Jul',
                                'Aug',
                                'Sep',
                                'Oct',
                                'Nov',
                                'Dec'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Đơn vị ( Vnd )'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
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
                        series: [{
                            name: 'Tokyo',
                            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                        }, {
                            name: 'New York',
                            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                        }]
                    });

                },
            };
            historyDeliveryReportView.loadData();
        } else {
            historyDeliveryReportView.loadData();
        }
    });
</script>