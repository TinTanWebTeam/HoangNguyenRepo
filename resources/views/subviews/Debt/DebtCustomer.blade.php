<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 53%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

    @media (max-height: 500px) {
        #divControl {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }
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
                        <li><a href="javascript:;">QL công nợ</a></li>
                        <li class="active">Khách hàng</li>
                    </ol>
                    <div class="menu-toggle  pull-right fixed">
                        <div class="btn btn-warning btn-circle btn-md" title="Xuất hóa đơn">
                            <i class="glyphicon glyphicon-list-alt icon-center"></i>
                        </div>

                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-hover" id="table-data">
                        <thead>
                        <tr class="active">

                            <th>Khách hàng</th>
                            <th>Số xe</th>
                            <th>Nơi giao</th>
                            <th>Số chứng từ</th>
                            <th>Doanh thu</th>
                            <th>Nợ</th>
                            <th>Người nhận</th>
                            <th>Ngày nhận</th>
                            <th>Thanh toán</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->

<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thanh toán cước phí
                <div class="menu-toggles pull-right" onclick="debtCustomerView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" id="formUser">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-12 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="FullName"><b>Khách hàng</b></label>
                                        <input type="text" class="form-control"
                                               id="FullName"
                                               name="FullName"
                                               placeholder="Tên khách hàng"
                                               autofocus>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="Payments"><b>Tiền thanh toán</b></label>
                                        <input type="text" class="form-control"
                                               id="Payments"
                                               name="Payments"
                                               placeholder="00.00">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary"
                                            onclick="">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="">Huỷ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end #frmControl -->

<script>
    if (typeof debtCustomerView === 'undefined') {
        debtCustomerView = {
            tableCustomer: null,
            table: null,

            loadData: function () {
                $.ajax({
                    url: url + 'get-data-customer',
                    type: "GET",
                    dataType: "json"
                }).done(function (data, textStatus, jqXHR) {
                    if (jqXHR.status == 200) {
                        debtCustomerView.tableCustomer = data['transports'];
                        debtCustomerView.fillDataToDatatable(data['transports']);


                    } else {
                        debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                });

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
            },
            fillDataToDatatable: function (data) {
                for (var i = 0; i < data.length; i++) {
                    data[i].fullNumber = data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                    data[i].receive = data[i]['cashRevenue'] - data[i]['cashReceive'];
                }

                debtCustomerView.table = $('#table-data').DataTable({
                    language: languageOptions,
                    data: data,
                    columns: [

                        {data: 'customers_fullName'},
                        {data: 'fullNumber'},
                        {data: 'deliveryPlace'},
                        {data: 'voucherNumber'},

                        {
                            data: 'cashRevenue',
                            render: $.fn.dataTable.render.number(".", ",", 0)
                        },
                        {
                            data: 'receive',
                            render: $.fn.dataTable.render.number(".", ",", 0)
                        },
                        {data: 'receiver'},
                        {data: 'receiveDate'},
                        {
                            render: function (data, type, full, meta) {
                                var tr = '';
                                tr += '<div class="btn-del-edit">';
                                tr += '<div class="btn btn-success  btn-circle" title="Thanh toán" onclick="fuelCostView.editFuelCost(' + full.id + ')">';
                                tr += '<i class="glyphicon glyphicon-credit-card"></i>';
                                tr += '</div>';
                                tr += '</div>';
                                tr += '<div class="btn-del-edit">';
                                tr += '<div class="btn btn-info btn-circle" onclick="fuelCostView.msgDelete(' + full.id + ')">';
                                tr += '<i class="fa fa-money" aria-hidden="true"></i>';
                                tr += '</div>';
                                tr += '</div>';
                                return tr;
                            }
                        }
                    ],

                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            text: 'Sao chép',
                            exportOptions: {
                                columns: [0, ':visible']
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Xuất Excel',
                            exportOptions: {
                                columns: ':visible'
                            },
                            customize: function (xlsx) {
                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Xuất PDF',
                            message: 'Thống Kê Xe Từ Ngày ... Đến Ngày',
                            customize: function (doc) {
                                doc.content.splice(0, 1);
                                doc.styles.tableBodyEven.alignment = 'center';
                                doc.styles.tableBodyOdd.alignment = 'center';
                                doc.content.columnGap = 10;
                                doc.pageOrientation = 'landscape';
                                for (var i = 0; i < doc.content[1].table.body.length; i++) {
                                    for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                                        doc.content[1].table.body[i].splice(6, 1);
                                    }
                                }
                                doc.content[1].table.widths = ['*', '*', '*', '*', '*', '*'];
                            }
                        },
                        {
                            extend: 'colvis',
                            text: 'Ẩn cột'
                        }
                    ]
                })
            }
        };
        debtCustomerView.loadData();
    } else {
        debtCustomerView.loadData();
    }


</script>
