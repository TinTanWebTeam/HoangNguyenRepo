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
                        <div class="col-md-7" id="dateSearchRevenueReport">
                            <input id="dateStart" type="text" class="date start"/> đến
                            <input id="dateEnd" type="text" class="date end"/>

                        </div>
                        <div class="col-md-5" style="padding-left: 0">
                            <button onclick="revenueReportView.searchDateToDate()" id="btnSearchTransport"
                                    class="btn btn-sm btn-info marginRight"><i
                                        class="fa fa-search" aria-hidden="true"></i> Tìm
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
                                        <th>Ngày</th>
                                        <th>Khách hàng</th>
                                        <th>Doanh thu giao hàng</th>
                                        <th>Lợi nhuận giao hàng</th>
                                        <th>Khách hàng nợ</th>
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
                    <p class="lead text-primary text-left"><strong>Doanh thu đổ dầu, thay nhớt, đậu bãi, khác</strong></p>
                    <div class="row">
                        <div class="col-md-7" id="dateSearchRevenueReport">
                            <input id="dateStart" type="text" class="date start"/> đến
                            <input id="dateEnd" type="text" class="date end"/>

                        </div>
                        <div class="col-md-5" style="padding-left: 0">
                            <button onclick="revenueReportView.searchDateToDate()" id="btnSearchTransport"
                                    class="btn btn-sm btn-info marginRight"><i
                                        class="fa fa-search" aria-hidden="true"></i> Tìm
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
                                        <th>Doanh thu giao hàng</th>
                                        <th>Lợi nhuận giao hàng</th>
                                        <th>Khách hàng nợ</th>
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
                    <p class="lead text-primary text-left"><strong>Thống kê theo tháng</strong></p>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group form-md-line-input">
                                <label for="optionYear"><b>Chọn năm</b></label>
                                <select class="form-control" id="optionYear"
                                        name="optionYear"
                                        onchange="revenueReportView.listMonthReport()">
                                </select>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover" id="table-data-year">
                                        <thead>
                                        <tr class="active">
                                            <th>Tháng</th>
                                            <th>Tổng doanh thu</th>
                                            <th>Tổng lợi nhuận ước tính</th>
                                            <th>Tổng lợi nhuận thực tế</th>
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
                table: null,
                tableYear: null,
                data: null,
                action: null,
                tableDetailRevenue: null,
                tableRevenueMonth: null,
                tableOptionYear: null,
                current: null,
                dataTest: [],
                clearInput: function () {
                    $('input[id=dateStart]').val('');
                    $('input[id=dateEnd]').val('');
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'revenue-report-view',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            revenueReportView.tableRevenueMonth = data['tableReportMonth'];
                            revenueReportView.fillDataToDataTableYear(data['tableReportMonth']);
                            revenueReportView.tableOptionYear = data['year'];
                            revenueReportView.loadSelectBoxYear(data['year']);
                            revenueReportView.loadChart(data['test']);
                            revenueReportView.dataTest = data['test'];
                            revenueReportView.selectYearNow();
                        } else {
                            revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    revenueReportView.table = $('#table-data').DataTable({
                        language: languageOptions
                    });
                    revenueReportView.tableYear = $('#table-data-year').DataTable({
                        language: languageOptions
                    });
                    revenueReportView.loadChart();
                    revenueReportView.renderDateTimePicker();

                    $("#table-data-year").find("tbody").on('click', 'tr', function () {
                        var month = $(this).find('td:eq(0)')[0].innerText;
                        revenueReportView.loadDetailRespost(month);

                    });
                },
                loadDetailRespost: function (data) {
                    var dataYear = data.substr(3, 6);
                    var dataMonth = data.substr(0, 2);
                    var sendToServer = null;
                    sendToServer = {
                        _token: _token,
                        _action: 'listDays',
                        _objectYear: dataYear,
                        _objectMonth: dataMonth
                    };
                    $.ajax({
                        url: url + 'revenue-report-list',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            revenueReportView.fillDataDetailReportToDataTable(data['tableDetailReport']);
                        } else {
                            revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                renderDateTimePicker: function () {
                    $('#dateSearchRevenueReport .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });

                },

                showNotification: function (type, msg) {
                    switch (type) {
                        case "info":
                            toastr.info(msg);
                            break;
                        case "success":
                            toastr.success(msg);
                            break;
                        case "warning":
                            toastr.warning(msg);
                            break;
                        case "error":
                            toastr.error(msg);
                            break;
                    }
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
//                                data: a
                            }, {
                                name: 'Lợi Nhuận',
                                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
//                                data: a

                            }
                        ]
                    });

                },
                searchDateToDate: function () {
                    var dateStart = $('input[id=dateStart]').val();
                    var dateEnd = $('input[id=dateEnd]').val();
                    if (dateStart == "" || dateEnd == "") {
                        revenueReportView.showNotification("warning", "Vui lòng chọn ngày cần tìm !");
                    } else {
                        var sendToServer = null;
                        sendToServer = {
                            _token: _token,
                            _action: 'searchDateToDate',
                            _dateStart: dateStart,
                            _dateEnd: dateEnd
                        };
                        $.ajax({
                            url: url + 'revenue-report-list',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 200) {
                                revenueReportView.fillDataDetailReportToDataTable(data['tableDataSearch']);
                            } else {
                                revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }


                },
                selectYearNow: function () {
                    var yearNow = moment().year();
                    yearOption = _.find(revenueReportView.tableOptionYear, function (o) {
                        return moment(o.receiveDate).format("YYYY") == yearNow;
                    });
                    if (typeof yearOption === 'undefined')
                        return;
                    $("select[id='optionYear']").val(yearNow);
                    revenueReportView.listMonthReport();
                },
                listMonthReport: function () {
                    var data = $("select[id='optionYear']").val();
                    var sendToServer = null;
                    sendToServer = {
                        _token: _token,
                        _action: 'listMonths',
                        _object: data
                    };
                    $.ajax({
                        url: url + 'revenue-report-list',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            revenueReportView.fillDataToDataTableYear(data['tableReportMonth']);
                            revenueReportView.tableOptionYear = data['year'];
                        } else {
                            revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        revenueReportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                fillDataDetailReportToDataTable: function (data) {
                    if (revenueReportView.table != null) {
                        revenueReportView.table.destroy();
                    }
                    for (var i = 0; i < data.length; i++) {
                        data[i].Profit_actual = parseInt(data[i]['cashReceive']) - (parseInt(data[i]['cashPreDelivery']) + parseInt(data[i]['cost']));

                    }
                    revenueReportView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'receiveDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'fullName'},
                            {
                                data: 'cashRevenue',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {
                                data: 'cashProfit',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {
                                data: 'Profit_actual',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            }
                        ]

                    })
                },
                fillDataToDataTableYear: function (data) {
                    if (revenueReportView.tableYear != null) {
                        revenueReportView.tableYear.destroy();
                    }
                    for (var i = 0; i < data.length; i++) {
                        data[i].total_Profit_actual = parseInt(data[i]['total_Receive']) - (parseInt(data[i]['total_PreDelivery']) + parseInt(data[i]['total_Cost']));
                    }
                    revenueReportView.tableYear = $('#table-data-year').DataTable(
                            {
                                language: languageOptions,
                                data: data,
                                columns: [
                                    {
                                        data: 'receiveDate',
                                        render: function (data, type, full, meta) {
                                            return moment(data).format("MM/YYYY");
                                        }
                                    },
                                    {
                                        data: 'total_Revenue',
                                        render: $.fn.dataTable.render.number(",", ",", 0)
                                    },
                                    {
                                        data: 'total_Profit',
                                        render: $.fn.dataTable.render.number(",", ",", 0)
                                    },
                                    {
                                        data: 'total_Profit_actual',
                                        render: $.fn.dataTable.render.number(",", ",", 0)
                                    }

                                ]

                            })
                },
                loadSelectBoxYear: function (lstYear) {
                    //reset selectbox
                    $('#optionYear')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("optionYear");
                    for (var i = 0; i < lstYear.length; i++) {
                        var year = moment(lstYear[i]['receiveDate']).format("YYYY");
                        var el = document.createElement("option");
                        el.textContent = year;
                        el.value = year;
                        select.appendChild(el);
                    }

                }

            };
            revenueReportView.loadData();
        }
        else {
            revenueReportView.loadData();
        }
    });
</script>