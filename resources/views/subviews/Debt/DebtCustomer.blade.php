<style>
    #divInvoice {
        z-index: 3;
        position: fixed;
        top: 20%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divInvoice .panel-body {
        height: 480px;
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
                             onclick="debtCustomerView.createInvoiceCustomer(0)">
                            <i class="glyphicon glyphicon-list-alt icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Đơn hàng</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchTransport">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <div class="ui-widget">
                                <input type="text" class="form-control" id="custName_transport" name="custName_transport" placeholder="Nhập tên khách hàng">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="radio" id="invoiceUp">
                                <label style="margin-right: 10px"><input type="radio" name="rdoTransport" checked
                                                                         value="NotInvoice">Chưa xuất hóa đơn</label>
                                <label><input type="radio" name="rdoTransport" value="All">Tất cả</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio">
                                <button onclick="debtCustomerView.searchTransport()" id="btnSearchTransport"
                                        class="btn btn-sm btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button class="btn btn-sm btn-default" onclick="debtCustomerView.clearSearch('transport')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-data">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã đơn hàng</th>
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
                    </div>


                    <hr>
                    <p class="lead text-primary text-left"><strong>Hóa đơn khách hàng</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchInvoice">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="custName_invoice" name="custName_transport" placeholder="Nhập tên khách hàng">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="radio" id="invoiceDown">
                                <label style="margin-right: 10px"><input type="radio" name="rdoInvoice" checked
                                                                         value="stillDebt">Còn nợ</label>
                                <label><input type="radio" name="rdoInvoice" value="fullPay">Trả đủ</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio">
                                <button onclick="debtCustomerView.searchInvoice()" id="btnSearchInvoice"
                                        class="btn btn-sm btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button class="btn btn-sm btn-default" onclick="debtCustomerView.clearSearch('invoice')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-customerInvoice">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã</th>
                                        <th>Mã HĐ</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày xuất</th>
                                        <th>Ngày HĐ</th>
                                        <th>Tổng tiền</th>
                                        <th>Trả trước</th>
                                        <th>Trả trên HĐ</th>
                                        <th>Nợ</th>
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
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div>
<!-- End Table -->

<!-- Begin divInvoice -->
<div class="row">
    <div id="divInvoice" class="col-md-offset-2 col-md-10">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Xuất hóa đơn
                <div class="menu-toggles pull-right" onclick="
                                debtCustomerView.clearInput();
                                debtCustomerView.clearValidation('#frmInvoice');
                                debtCustomerView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6" id="frm-control">
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
                                            <label for="notVAT"><b>Chưa VAT</b></label>
                                            <input type="number" class="form-control"
                                                   id="notVAT"
                                                   name="notVAT" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="VAT"><b>VAT (%)</b></label>
                                            <input type="number" class="form-control"
                                                   id="VAT" name="VAT"
                                                   onchange="debtCustomerView.computeHasVAT(this.value)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="hasVAT"><b>Có VAT</b></label>
                                            <input type="number" class="form-control"
                                                   id="hasVAT"
                                                   name="hasVAT" onchange="debtCustomerView.computeVAT(this.value)">
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
                                            <label for="paidAmt"><b>Tiền trả</b></label>
                                            <input type="number" class="form-control"
                                                   id="paidAmt"
                                                   name="paidAmt" onchange="debtCustomerView.computeDebt(this.value)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debt"><b>Còn nợ</b></label>
                                            <input type="number" class="form-control"
                                                   id="debt" name="debt" readonly
                                                   debt-real="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="prePaid"><b>Trả trước</b></label>
                                            <input type="number" class="form-control"
                                                   id="prePaid"
                                                   name="prePaid" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
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
                    <div class="col-md-6" id="tbl-history">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="text text-primary">Lịch sử trả nợ</span>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="table-invoiceCustomerDetail">
                                        <thead>
                                        <tr class="active">
                                            <th>Mã</th>
                                            <th>Ngày trả</th>
                                            <th>Tiền trả</th>
                                            <th>In</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <span class="text text-primary">Lịch sử in</span>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="table-printHistory">
                                        <thead>
                                        <tr class="active">
                                            <th>Mã in</th>
                                            <th>Ngày in</th>
                                            <th>Người nhận</th>
                                            <th>Người in</th>
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
</div>
<!-- End divInvoice -->

<!-- Modal confirm tra du -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn trả đủ cho đơn hàng này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="debtCustomerView.autoEditTransport()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="debtCustomerView.transportId = null;debtCustomerView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm tra du -->

<!-- Modal print review -->
<div class="row">
    <div id="modal-printReview" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">In review</h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal print review -->

<script>
    if (typeof debtCustomerView === 'undefined') {
        debtCustomerView = {
            table: null,
            tableInvoiceCustomer: null,
            tableInvoiceCustomerDetail: null,
            tablePrintHistory: null,

            dataTransport: null,
            dataInvoiceCustomer: null,
            dataInvoiceCustomerDetail: null,
            dataPrintHistory: null,

            dataSearch: null,
            dataSearchInvoiceCustomer: null,

            current: null,
            currentInvoiceCustomer: null,
            array_transportId: [],
            transportId: null,
            invoiceCustomerId: null,
            action: null,
            invoiceCode: null,
            tagsCustomerNameTransport: [],
            tagsCustomerNameInvoice: [],

            showControl: function (flag) {
                if (flag == 0) {
                    $('#divInvoice').css("width", "40%");
                    $("#tbl-history").hide();
                    $("#frm-control").removeClass("col-md-6").addClass("col-md-12");
                } else {
                    $('#divInvoice').css("width", "80%");
                    $("#tbl-history").show();
                    $("#frm-control").removeClass("col-md-12").addClass("col-md-6");
                }
                $('.menu-toggle').fadeOut();
                $('#divInvoice').fadeIn(300);
            },
            hideControl: function () {
                $('#divInvoice').fadeOut(300, function () {
                    debtCustomerView.displayButtonExportInvoice()
                });
            },
            displayModal: function (type, idModal) {
                $(idModal).modal(type);

                //Clear Validate
            },
            displayButtonExportInvoice: function(){
                var array_customerId = _.map(debtCustomerView.dataSearch, 'customer_id');
                var array_customerId_unique = _.uniq(array_customerId);
                if(array_customerId_unique.length == 1){
                    $('.menu-toggle').fadeIn();
                } else {
                    $('.menu-toggle').fadeOut();
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
                $("#divInvoice").find('.panel-body').mCustomScrollbar({
                    theme: "dark"
                });
            },
            renderDateTimePicker: function () {
                $('#dateSearchTransport .date').datepicker({
                    'format': 'dd-mm-yyyy',
                    'autoclose': true
                });
                $('#dateSearchInvoice .date').datepicker({
                    'format': 'dd-mm-yyyy',
                    'autoclose': true
                });

                $('#divInvoice').find('.date').datepicker({
                    "setDate": new Date(),
                    'format': 'dd-mm-yyyy',
                    'autoclose': true
                });

                $('#divInvoice').find('.date').datepicker("setDate", new Date());
            },
            renderEventRadioInput: function() {
                $('input[type="radio"][name=rdoTransport]').on('change', function(e) {
                    debtCustomerView.searchTransport(e.currentTarget.defaultValue);

//                    if(e.currentTarget.defaultValue == 'All'){
//                        $('.menu-toggle').fadeOut();
//                    } else {
//                        $('.menu-toggle').fadeIn();
//                    }
                });

                $('input[type="radio"][name=rdoInvoice]').on('change', function(e) {
                    debtCustomerView.searchInvoice();
                });
            },
            renderAutoCompleteSearch: function(){
                $( "#custName_transport" ).autocomplete({
                    source: debtCustomerView.tagsCustomerNameTransport
                });

                $( "#custName_invoice" ).autocomplete({
                    source: debtCustomerView.tagsCustomerNameInvoice
                });
            },
            renderEventKeyCode: function(){
                $("#custName_transport").keyup(function(event){
                    if(event.keyCode == 13){ //Enter
                        $("#btnSearchTransport").click();
                    }
                });

                $("#custName_invoice").keyup(function(event){
                    if(event.keyCode == 13){ //Enter
                        $("#btnSearchInvoice").click();
                    }
                });
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
                        {data: 'id'},
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
                                tr += '<div class="text-center">';
                                tr += "<div class='btn btn-success btn-circle' title='Trả đủ' onclick='debtCustomerView.transportId = "+full.id+";debtCustomerView.displayModal(\"show\", \"#modal-confirmDelete\")'>";
                                tr += '<i class="fa fa-usd" aria-hidden="true"></i>';
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
            },
            fillDataToDatatableInvoiceCustomer: function (data) {
                for (var i = 0; i < data.length; i++) {
                    data[i].debt = data[i]['totalPay'] - data[i]['totalPaid'] - data[i]['prePaid'];
                }
                debtCustomerView.tableInvoiceCustomer = $('#table-customerInvoice').DataTable({
                    language: languageOptions,
                    data: data,
                    columns: [
                        {data: 'id'},
                        {data: 'invoiceCode'},
                        {data: 'customers_fullName'},
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
                        {data: 'prePaid', render: $.fn.dataTable.render.number(".", ",", 0)},
                        {data: 'totalPaid', render: $.fn.dataTable.render.number(".", ",", 0)},
                        {data: 'debt', render: $.fn.dataTable.render.number(".", ",", 0)},
                        {
                            render: function (data, type, full, meta) {
                                var tr = '';
                                tr += '<div class="text-center">';
                                tr += '<div class="btn btn-primary btn-circle" title="Xem lịch sử" onclick="debtCustomerView.createInvoiceCustomer(1, '+full.id+')">';
                                tr += '<i class="fa fa-eye" aria-hidden="true"></i>';
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
            },
            fillDataToDatatableInvoiceCustomerDetail: function (data) {
                if (debtCustomerView.tableInvoiceCustomerDetail != null) {
                    debtCustomerView.tableInvoiceCustomerDetail.destroy();
                }
                debtCustomerView.tableInvoiceCustomerDetail = $('#table-invoiceCustomerDetail').DataTable({
                    language: languageOptions,
                    data: data,
                    columns: [
                        { data: 'id' },
                        {
                            data: 'payDate',
                            render: function (data, type, full, meta) {
                                return moment(data).format("DD/MM/YYYY");
                            }
                        },
                        {
                            data: 'paidAmt',
                            render: $.fn.dataTable.render.number(".", ",", 0)
                        },
                        {
                            render: function (data, type, full, meta) {
                                var tr = '';
                                tr += '<div class="text-center">';
                                tr += '<div class="btn btn-primary btn-circle marginRight" title="In" onclick="debtCustomerView.printReview('+full.id+')">';
                                tr += '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>';
                                tr += '</div>';
                                tr += '<div class="btn btn-default btn-circle" title="Đính kèm tập tin" onclick="debtCustomerView.attachFile('+full.id+')">';
                                tr += '<i class="fa fa-file" aria-hidden="true"></i>';
                                tr += '</div>';
                                tr += '</div>';
                                return tr;
                            }
                        }
                    ]
                })
            },
            fillDataToDatatablePrintHistory: function(data){
                if (debtCustomerView.tablePrintHistory != null) {
                    debtCustomerView.tablePrintHistory.destroy();
                }
                debtCustomerView.tablePrintHistory = $('#table-printHistory').DataTable({
                    language: languageOptions,
                    data: data,
                    columns: [
                        { data: 'id' },
                        {
                            data: 'printDate',
                            render: function (data, type, full, meta) {
                                return moment(data).format("DD/MM/YYYY");
                            }
                        },
                        { data: 'sendToPerson' },
                        { data: 'users_fullName' }
                    ]
                })
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
                        debtCustomerView.dataSearchInvoiceCustomer = data['invoiceCustomers'];
                        debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);

                        debtCustomerView.dataInvoiceCustomerDetail = data['invoiceCustomerDetails'];
                        debtCustomerView.dataPrintHistory = data['printHistories'];

                        debtCustomerView.invoiceCode = data['invoiceCode'];

                        debtCustomerView.searchTransport();
                        debtCustomerView.searchInvoice();
                    } else {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                });

                debtCustomerView.renderDateTimePicker();
                debtCustomerView.renderScrollbar();
                debtCustomerView.renderEventRadioInput();
                debtCustomerView.renderEventKeyCode();
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
                debtCustomerView.currentInvoiceCustomer = {
                    id: debtCustomerView.invoiceCustomerId,
                    invoiceCode : $("input[id='invoiceCode']").val(),
                    VAT : $("input[id='VAT']").val(),
                    notVAT : $("input[id='notVAT']").val(),
                    hasVAT : $("input[id='hasVAT']").val(),
                    exportDate : $("input[id='exportDate']").val(),
                    invoiceDate : $("input[id='invoiceDate']").val(),
                    payDate : $("input[id='payDate']").val(),
                    note : $("input[id='note']").val(),
                    totalPay : $("input[id='totalPay']").val(),
                    prePaid : $("input[id='prePaid']").val(),
                    debt : $("#debt").attr('debt-real'),
                    paidAmt : $("input[id='paidAmt']").val()
                }
            },

            autoEditTransport: function () {
                debtCustomerView.current = null;
                debtCustomerView.current = _.clone(_.find(debtCustomerView.dataTransport, function (o) {
                    return o.id == debtCustomerView.transportId;
                }), true);
                debtCustomerView.action = 'autoEdit';
                debtCustomerView.save();
            },
            createInvoiceCustomer: function (flag, invoiceCustomer_id) {
                debtCustomerView.showControl(flag);
                if (flag == 0){
                    debtCustomerView.action = "new";
                    var prePaid = 0, totalPay = 0;
                    debtCustomerView.getListCurrentRowTransport();
                    for(var i = 0; i < debtCustomerView.array_transportId.length; i++ ){
                        var currentRow = _.find(debtCustomerView.dataTransport, function(o){
                            return o.id == debtCustomerView.array_transportId[i];
                        });

                        if(typeof currentRow !== 'undefined'){
                            totalPay += parseInt(currentRow['cashRevenue']);
                            prePaid += parseInt(currentRow['cashReceive']);
                        }
                    }

                    $("input[id=totalPay]").val(totalPay);
                    $("input[id=prePaid]").val(prePaid);

                    var debt = totalPay - prePaid;
                    $("input[id=debt]").val(debt);
                    $("#debt").attr('debt-real', debt);
                    $("input[id=invoiceCode]").attr("placeholder", debtCustomerView.invoiceCode);

                    //set default value
                    $("input[id=notVAT]").val(totalPay);
                    $("input[id=VAT]").val(0);
                    $("input[id=hasVAT]").val(totalPay);
                    $("input[id=paidAmt]").val(0);

                    //remove readly input
                    $("input[id=invoiceCode]").prop('readonly', false);
                    $("input[id=VAT]").prop('readonly', false);
                    $("input[id=hasVAT]").prop('readonly', false);

                    $("input[id=invoiceCode]").focus();
                } else {
                    if(typeof invoiceCustomer_id === 'undefined') return;

                    debtCustomerView.action = "edit";
                    debtCustomerView.invoiceCustomerId = invoiceCustomer_id;
                    //fill data to table InvoiceCustomerDetail
                    var data = _.filter(debtCustomerView.dataInvoiceCustomerDetail, function(o){
                       return o.invoiceCustomer_id == invoiceCustomer_id;
                    });
                    if(typeof data === 'undefined') return;
                    debtCustomerView.fillDataToDatatableInvoiceCustomerDetail(data);

                    //fill data to table PrintHistory
                    var data2 = [];
                    for(var i = 0; i < data.length; i++){
                        var found = _.find(debtCustomerView.dataPrintHistory, function(o){
                            return o.invoiceCustomerDetail_id == data[i]['id'];
                        });
                        if(typeof found !== 'undefined')
                            data2.push(found);
                    }
                    debtCustomerView.fillDataToDatatablePrintHistory(data2);

                    //load data to input
                    var rowInvoiceCustomer = _.find(debtCustomerView.dataInvoiceCustomer, function(o){
                        return o.id == invoiceCustomer_id;
                    });
                    if(typeof rowInvoiceCustomer === 'undefined') return;

                    var totalPay = parseInt(rowInvoiceCustomer['totalPay']);
                    var hasVAT = parseInt(rowInvoiceCustomer['hasVAT']);
                    var totalPaid = parseInt(rowInvoiceCustomer['totalPaid']);
                    var prePaid = parseInt(rowInvoiceCustomer['prePaid']);
                    var debt = hasVAT - (totalPaid + prePaid);
                    $("input[id=totalPay]").val(totalPay);
                    $("input[id=debt]").val(debt);
                    $("#debt").attr('debt-real', debt);

                    $("input[id=invoiceCode]").val(rowInvoiceCustomer['invoiceCode']);
                    $("input[id=VAT]").val(rowInvoiceCustomer['VAT']);
                    $("input[id=notVAT]").val(rowInvoiceCustomer['notVAT']);
                    $("input[id=hasVAT]").val(hasVAT);
                    $("input[id=prePaid]").val(prePaid);

                    //set default value
                    $("input[id=paidAmt]").val(0);

                    //add readly input
                    $("input[id=invoiceCode]").prop('readonly', true);
                    $("input[id=VAT]").prop('readonly', true);
                    $("input[id=hasVAT]").prop('readonly', true);

                    $("input[id=paidAmt]").focus();
                }
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
                        //Remove and Add Transport
                        var Old = _.find(debtCustomerView.dataTransport, function (o) {
                            return o.id == sendToServer._transport;
                        });
                        var indexOfOld = _.indexOf(debtCustomerView.dataTransport, Old);
                        data['transport'].fullNumber = data['transport']['areaCode'] + ' ' + data['transport']['vehicleNumber'];
                        data['transport'].debt = data['transport']['cashRevenue'] - data['transport']['cashReceive'];
                        debtCustomerView.dataTransport.splice(indexOfOld, 1, data['transport']);

                        //reload 2 table
                        debtCustomerView.table.clear().rows.add(debtCustomerView.dataTransport).draw();

                        //call search Method
                        debtCustomerView.dataSearch = debtCustomerView.dataTransport;
                        debtCustomerView.searchTransport();

                        //clear Input
                        debtCustomerView.clearInput();

                        //Show notification
                        showNotification("success", "Thanh toán thành công!");
                        debtCustomerView.displayModal("hide", "#modal-confirmDelete");
                    } else {
                        showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                });
            },
            saveInvoiceCustomer: function () {
                debtCustomerView.formValidate();
                if ($("#frmInvoice").valid()) {
                    debtCustomerView.fillFormDataToCurrentObject();

                    var sendToServer = {
                        _token: _token,
                        _action: debtCustomerView.action,
                        _invoiceCustomer: debtCustomerView.currentInvoiceCustomer,
                        _array_transportId: debtCustomerView.array_transportId
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
                        debugger;
                        if (jqXHR.status == 201) {
                            var invoiceCustomer = data['invoiceCustomer'];
                            var invoiceCustomerDetail = data['invoiceCustomerDetail'];
                            debtCustomerView.invoiceCode = data['invoiceCode'];
                            invoiceCustomer.debt = invoiceCustomer['totalPay'] - invoiceCustomer['totalPaid'] - invoiceCustomer['prePaid'];

                            if(debtCustomerView.action == 'new'){
                                //Update InvoiceCustomer_Id for Transports
                                for(var i = 0; i < debtCustomerView.array_transportId.length; i++){
                                    var Old = _.find(debtCustomerView.dataTransport, function (o) {
                                        return o.id == debtCustomerView.array_transportId[i];
                                    });
                                    Old['invoiceCustomer_id'] = invoiceCustomer['id'];
                                }

                                //add InvoiceCustomer
                                debtCustomerView.dataInvoiceCustomer.push(invoiceCustomer);

                                //add InvoiceCustomerDetails
                                debtCustomerView.dataInvoiceCustomerDetail.push(invoiceCustomerDetail);

                                //reload 2 table & search
                                debtCustomerView.dataSearch = [];
                                debtCustomerView.table.clear().rows.add(debtCustomerView.dataSearch).draw();
                                debtCustomerView.tagsCustomerNameTransport = [];

                                debtCustomerView.dataSearchInvoiceCustomer = debtCustomerView.dataInvoiceCustomer;
                                debtCustomerView.tableInvoiceCustomer.clear().rows.add(debtCustomerView.dataSearchInvoiceCustomer).draw();
                                debtCustomerView.searchInvoice();

                                //clear Input
                                debtCustomerView.clearInput();
                                debtCustomerView.clearValidation("#frmInvoice");
                                debtCustomerView.hideControl();

                                //Show notification
                                showNotification("success", "Thanh toán thành công!");
                            } else {
                                //Remove & Add InvoiceCustomer
                                var Old = _.find(debtCustomerView.dataInvoiceCustomer, function (o) {
                                    return o.id == sendToServer._invoiceCustomer.id;
                                });
                                var indexOfOld = _.indexOf(debtCustomerView.dataInvoiceCustomer, Old);
                                debtCustomerView.dataInvoiceCustomer.splice(indexOfOld, 1, invoiceCustomer);

                                //add InvoiceCustomerDetails
                                debtCustomerView.dataInvoiceCustomerDetail.push(invoiceCustomerDetail);

                                //reload 2 table
                                debtCustomerView.tableInvoiceCustomer.clear().rows.add(debtCustomerView.dataInvoiceCustomer).draw();
                                debtCustomerView.tableInvoiceCustomerDetail.clear().rows.add(debtCustomerView.dataInvoiceCustomerDetail).draw();

                                //call search Method
                                debtCustomerView.dataSearchInvoiceCustomer = debtCustomerView.dataInvoiceCustomer;
                                debtCustomerView.searchInvoice();

                                //clear Input
                                $("input[id=paidAmt]").val('');
                                $("input[id=note]").val('');

                                var prePaid = parseInt(sendToServer._invoiceCustomer['paidAmt']);
                                var debtReal = parseInt($("#debt").attr("data-real")) - prePaid;
                                $("input[id=debt]").val(debtReal);
                                $("#debt").attr("data-real", debtReal);

                                //Show notification
                                showNotification("success", "Thanh toán thành công!");
                            }
                        } else if (jqXHR.status == 203){
                            showNotification("error", "Tác vụ thất bại! Mã HĐ này đã tồn tại. Vui lòng nhập một mã HĐ khác và thử lại.");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                } else {
                    $("form#frmInvoice").find("label[class=error]").css("color", "red");
                }
            },

            printReview: function(invoiceCustomerDetail_id) {
                debtCustomerView.displayModal('show', '#modal-printReview');
                console.log(invoiceCustomerDetail_id);
            },
            attachFile: function(invoiceCustomerDetail_id) {
                console.log(invoiceCustomerDetail_id);
            },

            clearSearch: function (tableName) {
                if (tableName == "transport") {
                    $("#dateSearchTransport").find(".start").datepicker('update', '');
                    $("#dateSearchTransport").find(".end").datepicker('update', '');
                    $("input[id=custName_transport]").val('');
                    debtCustomerView.searchTransport();
                } else {
                    $("#dateSearchInvoice").find(".start").datepicker('update', '');
                    $("#dateSearchInvoice").find(".end").datepicker('update', '');
                    $("input[id=custName_invoice]").val('');
                    debtCustomerView.searchInvoice();
                }

            },
            searchTransport: function () {
                //Customer Name
                custName = $("#custName_transport").val();
                if(custName == '') delete custName;

                //Invoice Id
                invoice = $("#invoiceUp").find("input:checked").val();
                if (invoice == 'All') delete invoice;

                //Date to date
                fromDate = $("#dateSearchTransport").find(".start").val();
                toDate = $("#dateSearchTransport").find(".end").val();

                if (fromDate == '' && toDate == ''){
                    delete fromDate;
                    delete toDate;
                } else{
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid()) {
                        showNotification('warning', 'Giá trị nhập vào không phải định dạng ngày tháng, vui lòng nhập lại!');
                        return;
                    }
                }

                var data = debtCustomerView.dataSearch;
                if(data.length == 0)
                    data = debtCustomerView.dataTransport;
                var found = _.filter(data, function (o) {
                    if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof invoice !== 'undefined'){
                        var dateFind = moment(o.receiveDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]')
                                && removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()))
                                && o.invoiceCustomer_id == null && o.cashReceive < o.cashRevenue);
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName === 'undefined'
                            && typeof invoice === 'undefined'){
                        return false;
                    } else if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName === 'undefined'
                            && typeof invoice !== 'undefined'){
                        var dateFind = moment(o.receiveDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]')
                        && o.invoiceCustomer_id == null && o.cashReceive < o.cashRevenue);
                    } else if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof invoice === 'undefined'){
                        var dateFind = moment(o.receiveDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]')
                        && removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase())));
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof invoice !== 'undefined'){

                        return (removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()))
                                && o.invoiceCustomer_id == null && o.cashReceive < o.cashRevenue);
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName === 'undefined'
                            && typeof invoice !== 'undefined'){
                        return false;
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof invoice === 'undefined'){
                        return (removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase())));
                    }else if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName === 'undefined'
                            && typeof invoice === 'undefined'){
                        var dateFind = moment(o.receiveDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]'));
                    }
                });
                //set data for except circumstance
                if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                        && typeof custName === 'undefined'
                        && typeof invoice === 'undefined'){
                    found = debtCustomerView.dataTransport;
                } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                        && typeof custName === 'undefined'
                        && typeof invoice !== 'undefined'){
                    found = _.filter(debtCustomerView.dataTransport, function(o){
                       return (o.invoiceCustomer_id == null && o.cashReceive < o.cashRevenue);
                    });
                }
                debtCustomerView.dataSearch = found;
                debtCustomerView.table.clear().rows.add(debtCustomerView.dataSearch).draw();

                debtCustomerView.displayButtonExportInvoice();

                //fill data to listSearch
                debtCustomerView.tagsCustomerNameTransport = _.map(debtCustomerView.dataSearch, 'customers_fullName');
                debtCustomerView.renderAutoCompleteSearch();
            },
            searchInvoice: function () {
                //Customer Name
                custName = $("#custName_invoice").val();
                if(custName == '') delete custName;

                //Money
                money = $("#invoiceDown").find("input:checked").val();
                if (money == 'fullPay') delete money;

                //Date to date
                fromDate = $("#dateSearchInvoice").find(".start").val();
                toDate = $("#dateSearchInvoice").find(".end").val();

                if (fromDate == '' && toDate == ''){
                    delete fromDate;
                    delete toDate;
                } else{
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid()) {
                        showNotification('warning', 'Giá trị nhập vào không phải định dạng ngày tháng, vui lòng nhập lại!');
                        return;
                    }
                }

                var data = debtCustomerView.dataSearchInvoiceCustomer;
                if(data.length == 0)
                    data = debtCustomerView.dataInvoiceCustomer;
                var found = _.filter(data, function (o) {
                    if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof money !== 'undefined'){
                        var dateFind = moment(o.invoiceDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]')
                        && removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()))
                        && (parseInt(o.totalPay) > parseInt(o.totalPaid) + parseInt(o.prePaid)));
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName === 'undefined'
                            && typeof money === 'undefined'){
                        return (parseInt(o.totalPay) == parseInt(o.totalPaid) + parseInt(o.prePaid));
                    } else if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName === 'undefined'
                            && typeof money !== 'undefined'){
                        var dateFind = moment(o.invoiceDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]')
                        && (parseInt(o.totalPay) > parseInt(o.totalPaid) + parseInt(o.prePaid)));
                    } else if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof money === 'undefined'){
                        var dateFind = moment(o.invoiceDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]')
                        && removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()))
                        && (parseInt(o.totalPay) == parseInt(o.totalPaid) + parseInt(o.prePaid)));
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof money !== 'undefined'){
                        return (removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()))
                        && (parseInt(o.totalPay) > parseInt(o.totalPaid) + parseInt(o.prePaid)));
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName === 'undefined'
                            && typeof money !== 'undefined'){
                        return (parseInt(o.totalPay) > parseInt(o.totalPaid) + parseInt(o.prePaid));
                    } else if (typeof fromDate === 'undefined' && typeof toDate === 'undefined'
                            && typeof custName !== 'undefined'
                            && typeof money === 'undefined'){
                        return (removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()))
                        && (parseInt(o.totalPay) == parseInt(o.totalPaid) + parseInt(o.prePaid)));
                    }else if (typeof fromDate !== 'undefined' && typeof toDate !== 'undefined'
                            && typeof custName === 'undefined'
                            && typeof money === 'undefined'){
                        var dateFind = moment(o.invoiceDate, "YYYY-MM-DD H:m:s");
                        return (moment(dateFind).isBetween(fromDate, toDate, null, '[]')
                        && (parseInt(o.totalPay) == parseInt(o.totalPaid) + parseInt(o.prePaid)));
                    }
                });
                debtCustomerView.dataSearchInvoiceCustomer = found;
                debtCustomerView.tableInvoiceCustomer.clear().rows.add(debtCustomerView.dataSearchInvoiceCustomer).draw();

                //fill data to listSearch
                debtCustomerView.tagsCustomerNameInvoice = _.map(debtCustomerView.dataSearchInvoiceCustomer, 'customers_fullName');
                debtCustomerView.renderAutoCompleteSearch();
            },

            getListCurrentRowTransport: function() {
                debtCustomerView.array_transportId = [];
                $(debtCustomerView.table.$('tr', {"filter":"applied"}).each( function () {
                    debtCustomerView.array_transportId.push(parseInt($(this).find("td:eq(0)").text()));
                } ));
            },
            computeDebt: function(paidAmt){
                var debtReal = $("#debt").attr('debt-real');
                $("#debt").val(debtReal - paidAmt);
            },
            computeHasVAT: function(vat){
                var notVat = parseInt($("#notVAT").val());
                var hasVat = notVat - (vat/100) * notVat
                $("#hasVAT").val(hasVat);

                var prePaid = parseInt($("#prePaid").val());
                var paidAmt = parseInt($("#paidAmt").val());
                $("#debt").attr("debt-real", hasVat - prePaid - paidAmt);
                $("input[id=debt]").val(hasVat - prePaid - paidAmt)
            },
            computeVAT: function(hasVat){
                var notVat = parseInt($("#notVAT").val());
                var hasVat = (notVat - hasVat) * 100 / notVat
                $("#VAT").val(hasVat);

                var prePaid = parseInt($("#prePaid").val());
                var paidAmt = parseInt($("#paidAmt").val());
                $("#debt").attr("debt-real", hasVat - prePaid - paidAmt);
                $("input[id=debt]").val(hasVat - prePaid - paidAmt)
            }
        };
        debtCustomerView.loadData();
    } else {
        debtCustomerView.loadData();
    }

</script>
