<style>
    #divInvoice {
        z-index: 3;
        position: fixed;
        top: 30%;
        display: none;
        right: 0;
        width: 70%;
        height: 100%;
    }

    #divInvoice .panel-body {
        height: 400px;
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

<!-- Begin Table -->
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
                    <div class="menu-toggle pull-right fixed">
                        <div class="btn btn-warning btn-circle btn-md" title="Xuất hóa đơn"
                             onclick="debtCustomerView.createInvoiceCustomer()">
                            <i class="glyphicon glyphicon-list-alt icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p id="dateOnlySearch">
                        <input type="text" class="date start"/> đến
                        <input type="text" class="date end"/>
                        <button onclick="debtCustomerView.searchFromDateToDate()" class="btn btn-sm btn-info"><i
                                    class="fa fa-search" aria-hidden="true"></i> Tìm
                        </button>
                        <button onclick="debtCustomerView.clearSearch()" class="btn btn-sm btn-default"><i
                                    class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                        </button>
                    </p>
                    <div class="table-responsive">
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

                    <hr>
                    <label class="text-primary">Hóa đơn khách hàng</label>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="table-customerInvoice">
                            <thead>
                            <tr class="active">
                                <th>Mã hóa đơn</th>
                                <th>Khách hàng</th>
                                <th>Ngày xuất</th>
                                <th>Ngày hóa đơn</th>
                                <th>Tổng tiền</th>
                                <th>Tổng trả</th>
                                <th>Nợ</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div>
<!-- End Table -->

<!-- Begin divInvoice -->
<div class="row">
    <div id="divInvoice" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Xuất hóa đơn
                <div class="menu-toggles pull-right" onclick="debtCustomerView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" id="frmInvoice">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="invoiceCode"><b>Mã hóa đơn</b></label>
                                            <input type="text" class="form-control"
                                                   id="invoiceCode"
                                                   name="invoiceCode">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="totalPay"><b>Tổng tiền</b></label>
                                            <input type="number" class="form-control"
                                                   id="totalPay"
                                                   name="totalPay" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="VAT"><b>VAT</b></label>
                                            <input type="number" class="form-control"
                                                   id="VAT"
                                                   name="VAT">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="notVAT"><b>Chưa VAT</b></label>
                                            <input type="number" class="form-control"
                                                   id="notVAT"
                                                   name="notVAT">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="hasVAT"><b>Có VAT</b></label>
                                            <input type="number" class="form-control"
                                                   id="hasVAT"
                                                   name="hasVAT">
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="exportDate"><b>Ngày xuất</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="exportDate"
                                                   name="exportDate">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="invoiceDate"><b>Ngày hóa đơn</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="invoiceDate"
                                                   name="invoiceDate">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="payDate"><b>Ngày trả</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="payDate"
                                                   name="payDate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debt"><b>Còn nợ</b></label>
                                            <input type="number" class="form-control"
                                                   id="debt"
                                                   name="debt" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="paidAmt"><b>Tiền trả</b></label>
                                            <input type="number" class="form-control"
                                                   id="paidAmt"
                                                   name="paidAmt">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <input class="form-control"
                                                   id="note"
                                                   name="note">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-actions noborder">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary marginRight"
                                                        onclick="debtCustomerView.saveInvoiceCustomer()">
                                                    Hoàn tất
                                                </button>
                                                <button type="button" class="btn default" onclick="">Huỷ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <span class="text text-primary">Lịch sử</span>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-invoiceCustomerDetail">
                                <thead>
                                <tr class="active">
                                    <th>Ngày trả</th>
                                    <th>Tiền trả</th>
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
    </div>
</div>
</div>
<!-- End divInvoice -->

<script>
    if (typeof debtCustomerView === 'undefined') {
        debtCustomerView = {
            table: null,
            tableInvoiceCustomer: null,
            tableHistory: null,

            dataTransport: null,
            dataInvoiceCustomer: null,
            dataSearch: null,
            payment: null,

            current: null,
            currentInvoiceCustomer: null,

            showControl: function () {
                $('.menu-toggle').fadeOut();
                $('#divInvoice').fadeIn(300);
            },
            hideControl: function (idDiv) {
                $('#divInvoice').fadeOut(300, function () {
                    $('.menu-toggle').fadeIn();
                });

                debtCustomerView.clearValidation("#frmInvoice");
                debtCustomerView.clearInput();
            },
            displayModal: function (type, idModal) {
                $(idModal).modal(type);

                //Clear Validate
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
            clearInput: function () {
                $("input[id='invoiceCode']").val('');
                $("input[id='totalPay']").val('');
                $("input[id='VAT']").val('');
                $("input[id='notVAT']").val('');
                $("input[id='hasVAT']").val('');
                $("input[id='exportDate]").val('');
                $("input[id='invoiceDate]").val('');
                $("input[id='payDate]").val('');
                $("input[id='debt']").val('');
                $("input[id='paidAmt']").val('');
                $("input[id='note']").val('');
            },

            renderScrollbar: function () {
                $("#divControl").find('.panel-body').mCustomScrollbar({
                    theme: "dark"
                });
//                $("#divInvoice").find('.panel-body').mCustomScrollbar({
//                    theme: "dark"
//                });
            },
            renderCustomToastr: function () {
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
            renderDateTimePicker: function () {
                $('#dateOnlySearch .date').datepicker({
                    'format': 'dd-mm-yyyy',
                    'autoclose': true
                });

                var dateOnlySearchEl = document.getElementById('dateOnlySearch');
                var dateOnlyDatepair = new Datepair(dateOnlySearchEl);

                $('#divInvoice').find('.date').datepicker({
                    "setDate": new Date(),
                    'format': 'dd-mm-yyyy',
                    'autoclose': true
                });

                $('#divInvoice').find('.date').datepicker("setDate", new Date());
            },

            loadData: function () {
                $.ajax({
                    url: url + '/debt-customer/transports',
                    type: "GET",
                    dataType: "json"
                }).done(function (data, textStatus, jqXHR) {
                    if (jqXHR.status == 200) {
                        debtCustomerView.dataTransport = data['transports'];
                        debtCustomerView.dataSearch = data['transports'];
                        debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                        debtCustomerView.dataInvoiceCustomer = data['invoiceCustomers'];
                        debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);
                    } else {
                        debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                });

                debtCustomerView.renderDateTimePicker();
                debtCustomerView.renderScrollbar();
                debtCustomerView.renderCustomToastr();
            },
            fillDataToDatatable: function (data) {
                for (var i = 0; i < data.length; i++) {
                    data[i].fullNumber = data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                    data[i].debt = data[i]['cashRevenue'] - data[i]['cashReceive'];
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
                            data: 'debt',
                            render: $.fn.dataTable.render.number(".", ",", 0)
                        },
                        {data: 'receiver'},
                        {
                            data: 'receiveDate',
                            render: function (data, type, full, meta) {
                                return moment(data).format("DD/MM/YYYY");
                            }
                        },
                        {
                            render: function (data, type, full, meta) {
                                var tr = '';
                                tr += '<div class="btn btn-success btn-circle" title="Trả đủ" onclick="debtCustomerView.autoEditTransport(' + full.id + ')">';
                                tr += '<i class="fa fa-money" aria-hidden="true"></i>';
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
            },
            fillDataToDatatableInvoiceCustomer: function (data) {
                for (var i = 0; i < data.length; i++) {
                    data[i].debt = data[i]['totalPay'] - data[i]['totalPaid'];
                }
                debtCustomerView.tableInvoiceCustomer = $('#table-customerInvoice').DataTable({
                    language: languageOptions,
                    data: data,
                    columns: [
                        {data: 'invoiceCode'},
                        {data: 'fullName'},
                        {
                            data: 'exportDate',
                            render: function (data, type, full, meta) {
                                return moment(data).format("DD/MM/YYYY");
                            }
                        },
                        {
                            data: 'invoiceDate',
                            render: function (data, type, full, meta) {
                                return moment(data).format("DD/MM/YYYY");
                            }
                        },
                        {data: 'totalPay', render: $.fn.dataTable.render.number(".", ",", 0)},
                        {data: 'totalPaid', render: $.fn.dataTable.render.number(".", ",", 0)},
                        {data: 'debt', render: $.fn.dataTable.render.number(".", ",", 0)},
                        {
                            render: function (data, type, full, meta) {
                                var tr = '';
                                tr += '<div class="btn btn-primary btn-circle" title="Xem lịch sử" onclick="">';
                                tr += '<i class="glyphicon glyphicon-credit-card"></i>';
                                tr += '</div>';
                                return tr;
                            }
                        }
                    ]
                })
            },
            fillDataToDatatableHistory: function (data) {
                debtCustomerView.tableHistory = $('#table-invoiceCustomerDetail').DataTable({
                    language: languageOptions,
                    data: data,
                    columns: [
                        {
                            data: 'payDate',
                            render: function (data, type, full, meta) {
                                return moment(data).format("DD/MM/YYYY");
                            }
                        },
                        {
                            data: 'paidAmt',
                            render: $.fn.dataTable.render.number(".", ",", 0)
                        }
                    ]
                })
            },
            fillCurrentObjectToForm: function () {
                $("input[id='invoiceCode']").val(debtCustomerView.currentInvoiceCustomer["invoiceCode"]);
                $("input[id='totalPay']").val(debtCustomerView.currentInvoiceCustomer["totalPay"]);
                $("input[id='VAT']").val(debtCustomerView.currentInvoiceCustomer["VAT"]);
                $("input[id='notVAT']").val(debtCustomerView.currentInvoiceCustomer["invoiceCode"]);
                $("input[id='hasVAT']").val(debtCustomerView.currentInvoiceCustomer["hasVAT"]);

                var exportDate = moment(debtCustomerView.currentInvoiceCustomer["exportDate"], "YYYY-MM-DD");
                $("input[id='exportDate']").datepicker('update', exportDate.format("DD-MM-YYYY"));

                var invoiceDate = moment(debtCustomerView.currentInvoiceCustomer["invoiceDate"], "YYYY-MM-DD");
                $("input[id='invoiceDate']").datepicker('update', invoiceDate.format("DD-MM-YYYY"));

                var payDate = moment(debtCustomerView.currentInvoiceCustomer["payDate"], "YYYY-MM-DD");
                $("input[id='payDate']").datepicker('update', payDate.format("DD-MM-YYYY"));

                $("input[id='debt']").val(debtCustomerView.currentInvoiceCustomer["debt"]);
                $("input[id='paidAmt']").val(debtCustomerView.currentInvoiceCustomer["paidAmt"]);
                $("input[id='note']").val(debtCustomerView.currentInvoiceCustomer["note"]);
            },
            fillFormDataToCurrentObject: function () {
                debtCustomerView.currentInvoiceCustomer.invoiceCode = $("input[id='invoiceCode']").val();
                debtCustomerView.currentInvoiceCustomer.totalPay = $("input[id='totalPay']").val();
                debtCustomerView.currentInvoiceCustomer.VAT = $("input[id='VAT']").val();
                debtCustomerView.currentInvoiceCustomer.notVAT = $("input[id='notVAT']").val();
                debtCustomerView.currentInvoiceCustomer.hasVAT = $("input[id='hasVAT']").val();
                debtCustomerView.currentInvoiceCustomer.exportDate = $("input[id='exportDate']").val();
                debtCustomerView.currentInvoiceCustomer.invoiceDate = $("input[id='invoiceDate']").val();
                debtCustomerView.currentInvoiceCustomer.payDate = $("input[id='payDate']").val();
                debtCustomerView.currentInvoiceCustomer.debt = $("input[id='debt']").val();
                debtCustomerView.currentInvoiceCustomer.paidAmt = $("input[id='paidAmt']").val();
                debtCustomerView.currentInvoiceCustomer.note = $("input[id='note']").val();
            },

            autoEditTransport: function (id) {
                debtCustomerView.current = null;
                debtCustomerView.current = _.clone(_.find(debtCustomerView.dataTransport, function (o) {
                    return o.id == id;
                }), true);
                debtCustomerView.action = 'autoEdit';
                debtCustomerView.save();
            },
            createInvoiceCustomer: function () {
                debtCustomerView.showControl();

                var totalPaid = 0, totalPay = 0;
                for (var i = 0; i < debtCustomerView.dataSearch.length; i++) {
                    totalPay += parseInt(debtCustomerView.dataSearch[i]['cashRevenue']);
                    totalPaid += parseInt(debtCustomerView.dataSearch[i]['cashReceive']);
                }
                var debt = totalPay - totalPaid;
                $("input[id=totalPay]").val(totalPay);
                $("input[id=debt]").val(debt);

//                debtCustomerView.fillDataToDatatableHistory();
            },

            formValidate: function () {
                $("#frmInvoice").validate({
                    rules: {
                        paidAmt: "required"
                    },
                    ignore: ".ignore",
                    messages: {
                        paidAmt: "Vui lòng nhập số tiền thanh toán."
                    }
                });
            },
            clearValidation: function (idForm) {
                $(idForm).find("label[class=error]").remove();
            },

            save: function () {
                var sendToServer = {
                    _token: _token,
                    _transport: debtCustomerView.current.id
                };
                console.log("CLIENT");
                console.log(sendToServer._transport);
                $.ajax({
                    url: url + 'debt-customer/modify',
                    type: "POST",
                    dataType: "json",
                    data: sendToServer
                }).done(function (data, textStatus, jqXHR) {
                    console.log("SERVER");
                    console.log(data);
                    if (jqXHR.status == 201) {
                        var Old = _.find(debtCustomerView.dataTransport, function (o) {
                            return o.id == sendToServer._transport;
                        });
                        var indexOfOld = _.indexOf(debtCustomerView.dataTransport, Old);
                        debtCustomerView.dataTransport.splice(indexOfOld, 1);
                        debtCustomerView.showNotification("success", "Thanh toán thành công!");
                        debtCustomerView.displayModal("hide", "#modal-confirmDelete");

                        debtCustomerView.table.clear().rows.add(debtCustomerView.dataTransport).draw();
                        debtCustomerView.clearInput();
                    } else {
                        debtCustomerView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                });
            },
            saveInvoiceCustomer: function () {
                debtCustomerView.formValidate();
                if ($("#frmInvoice").valid()) {
                    debtCustomerView.fillFormDataToCurrentObject();

                    var array_transportId = _.map(debtCustomerView.dataSearch, 'id');

                    var sendToServer = {
                        _token: _token,
                        _invoiceCustomer: debtCustomerView.currentInvoiceCustomer,
                        _array_transportId: array_transportId
                    };
                    console.log("CLIENT");
                    console.log(sendToServer);
                    $.ajax({
                        url: url + 'invoice-customer/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {


                            debtCustomerView.tableInvoiceCustomer.clear().rows.add(debtCustomerView.dataInvoiceCustomer).draw();
                            debtCustomerView.clearInput();
                        } else {
                            debtCustomerView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                } else {
                    $("form#frmInvoice").find("label[class=error]").css("color", "red");
                }
            },

            searchFromDateToDate: function () {
                var fromDate = $("#dateOnlySearch").find(".start").val();
                var toDate = $("#dateOnlySearch").find(".end").val();
                fromDate = moment(fromDate, "DD-MM-YYYY");
                toDate = moment(toDate, "DD-MM-YYYY");

                if (fromDate.isValid() && toDate.isValid()) {
                    var found = _.filter(debtCustomerView.dataTransport, function (o) {
                        var find = moment(o.receiveDate, "YYYY-MM-DD H:m:s");
                        return moment(find).isBetween(fromDate, toDate, null, '[]');
                    });
                    debtCustomerView.dataSearch = found;
                    debtCustomerView.table.clear().rows.add(found).draw();
                } else {
                    debtCustomerView.showNotification('warning', 'Giá trị nhập vào không phải định dạng ngày tháng, vui lòng nhập lại!');
                }
            },
            clearSearch: function () {
                $("#dateOnlySearch").find(".start").datepicker('update', '');
                $("#dateOnlySearch").find(".end").datepicker('update', '');
                debtCustomerView.table.clear().rows.add(debtCustomerView.dataTransport).draw();
            }
        };
        debtCustomerView.loadData();
    } else {
        debtCustomerView.loadData();
    }
</script>
