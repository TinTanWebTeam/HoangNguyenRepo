<style>
    #divInvoice {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divInvoice .panel-body {
        height: 501px;
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
                        <li class="active">Nhà xe</li>
                    </ol>
                    <div class="menu-toggle pull-right fixed">
                        <div class="btn btn-warning btn-circle btn-md" title="Xuất hóa đơn"
                             onclick="debtGarageView.createInvoiceGarage(0)">
                            <i class="glyphicon glyphicon-list-alt icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <!-- Chú thích -->
                    <div class="row">
                        <div class="col-md-2">
                            <p class="lead text-primary text-left"><strong>Đơn hàng</strong></p>
                        </div>
                        <div class="col-md-offset-7 col-md-3">
                            <span class="label label-danger" style="font-size: 1em;">Chưa trả</span>
                            <span class="label label-primary" style="font-size: 1em;">Đã trả trước</span>
                            <span class="label label-success" style="font-size: 1em;">Đã trả đủ</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" id="dateSearchTransport">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <div class="ui-widget">
                                <input type="text" class="form-control" id="garaName_transport"
                                       name="garaName_transport" placeholder="Nhập tên nhà xe">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="radio" id="invoiceUp">
                                <label style="margin-right: 10px"><input type="radio" name="rdoTransport" value="All"
                                                                         checked>Tất cả</label>
                                <label style="margin-right: 10px"><input type="radio" name="rdoTransport"
                                                                         value="NotInvoice">Chưa xuất hóa đơn</label>
                                <label><input type="radio" name="rdoTransport"
                                              value="Invoice">Đã xuất hóa đơn</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="statusMoney" class="form-control">Trạng thái:</label>
                                </div>
                                <div class="col-md-5">
                                    <select class="form-control" id="statusMoney"
                                            onchange="debtGarageView.searchTransport(this); debtGarageView.selectAll()">
                                        <option value="All">Tất cả</option>
                                        <option value="NotPay">Chưa trả</option>
                                        <option value="PrePay">Trả trước</option>
                                        <option value="FullPay">Trả đủ</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <button id="btnSearchTransport" class="btn btn-sm btn-info marginRight"
                                                onclick="debtGarageView.searchTransport();debtGarageView.selectAll()">
                                            <i class="fa fa-search" aria-hidden="true"></i> Tìm
                                        </button>
                                        <button class="btn btn-sm btn-default"
                                                onclick="debtGarageView.clearSearch('transport');$('#ToolTables_table-data_1').click()">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-data">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã</th>
                                        <th>Nhà xe</th>
                                        <th>Số xe</th>
                                        <th>Nơi giao</th>
                                        <th>Số chứng từ</th>
                                        <th>Giao xe</th>
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
                    <p class="lead text-primary text-left"><strong>Hóa đơn nhà xe</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchInvoice">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="garaName_invoice" name="garaName_transport"
                                   placeholder="Nhập tên nhà xe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="radio" id="invoiceDown">
                                <label style="margin-right: 10px"><input type="radio" name="rdoInvoice" checked
                                                                         value="All">Tất cả</label>
                                <label style="margin-right: 10px"><input type="radio" name="rdoInvoice"
                                                                         value="StillDebt">Còn nợ</label>
                                <label><input type="radio" name="rdoInvoice" value="FullPay">Trả đủ</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio">
                                <button onclick="debtGarageView.searchInvoice()" id="btnSearchInvoice"
                                        class="btn btn-sm btn-info marginRight"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button class="btn btn-sm btn-default" onclick="debtGarageView.clearSearch('invoice')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-garageInvoice">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã</th>
                                        <th>Nhà xe</th>
                                        <th>Mã HĐ</th>
                                        <th>Ngày xuất</th>
                                        <th>Ngày HĐ</th>
                                        <th>Tổng tiền (+VAT)</th>
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
            <div class="panel-heading">
                <span class="titleControl">Tạo mới hóa đơn</span>
                <div class="menu-toggles pull-right" onclick="
                                debtGarageView.clearInput();
                                debtGarageView.clearValidation('#frmInvoice');
                                debtGarageView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6" id="frm-control">
                        <form role="form" id="frmInvoice">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="invoiceCode"><b>Mã hóa đơn</b></label>
                                            <input type="text" class="form-control"
                                                   id="invoiceCode"
                                                   name="invoiceCode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="totalPay"><b>Tổng tiền</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="totalPay" name="totalPay" data-totalTransport=""
                                                   onkeyup="debtGarageView.computeWhenTotalpayChange(this.value)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debt-real"><b>Còn nợ</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="debt-real" name="debt-real" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="notVAT"><b>Chưa VAT</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="notVAT"
                                                   name="notVAT" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="VAT" class="red"><b>VAT (%)</b></label>
                                            <input type="number" class="form-control defaultZero"
                                                   id="VAT" name="VAT"
                                                   onkeyup="debtGarageView.computeHasVAT(this.value, event)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="hasVAT" class="red"><b>Có VAT</b></label>
                                            <input type="text" class="form-control currency defaultZero"
                                                   id="hasVAT" name="hasVAT"
                                                   onkeyup="debtGarageView.computeVAT(this.value)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="paidAmt" class="red"><b>Tiền trả</b></label>
                                            <input type="text" class="form-control currency defaultZero"
                                                   id="paidAmt" name="paidAmt"
                                                   onkeyup="debtGarageView.computeDebt(this.value)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debt"><b>Còn nợ lại</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="debt" name="debt" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="prePaid"><b>Trả trước</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="prePaid"
                                                   name="prePaid" readonly>
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
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input ">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <textarea class="form-control" id="note" name="note" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-actions noborder">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary marginRight"
                                                        onclick="debtGarageView.saveInvoiceGarage()">
                                                    Hoàn tất
                                                </button>
                                                <button type="button" class="btn default"
                                                        onclick="debtGarageView.retype()">Nhập lại
                                                </button>
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
                                    <table class="table table-bordered table-hover" id="table-invoiceGarageDetail">
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

<!-- Modal notification -->
<div class="row">
    <div id="modal-notification" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal notification -->

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
    $(function () {
        if (typeof debtGarageView === 'undefined') {
            debtGarageView = {
                table: null,
                tableInvoiceGarage: null,
                tableInvoiceGarageDetail: null,
                tablePrintHistory: null,

                dataTransport: null,
                dataInvoiceGarage: null,
                dataInvoiceGarageDetail: null,
                dataPrintHistory: null,

                dataSearch: null,
                dataSearchInvoiceGarage: null,

                action: null, //new, edit, autoEdit
                current: null, //for autoEdit
                currentInvoiceGarage: null, //for new & edit
                invoiceGarageId: null, //for edit
                array_transportId: [], //array_transportId of InvoiceGarage current
                invoiceCode: null, //Get invoiceCode newest form Server
                tagsGarageNameTransport: [], //for search
                tagsGarageNameInvoice: [], //for search

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
                        $('.menu-toggle').fadeIn();
                    });
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);

                    //Clear Validate
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
                    $("input[id='debt-real']").val('');
                    $("input[id='paidAmt']").val('');
                    $("textarea[id='note']").val('');
                },
                retype: function () {
                    $("input[id='invoiceCode']").val('');
                    $("textarea[id='note']").val('');
                },
                selectAll: function () {
                    $('#ToolTables_table-data_0').click();
                },
                deselectAll: function () {
                    $('#ToolTables_table-data_1').click();
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
                renderEventRadioInput: function () {
                    $('input[type="radio"][name=rdoTransport]').on('change', function (e) {
                        debtGarageView.searchTransport(e.currentTarget.defaultValue);
                        debtGarageView.selectAll();
                    });

                    $('input[type="radio"][name=rdoInvoice]').on('change', function (e) {
                        debtGarageView.searchInvoice();
                    });
                },
                renderAutoCompleteSearch: function () {
                    $("#garaName_transport").autocomplete({
                        source: debtGarageView.tagsGarageNameTransport
                    });

                    $("#garaName_invoice").autocomplete({
                        source: debtGarageView.tagsGarageNameInvoice
                    });
                },
                renderEventKeyCode: function () {
                    $("#garaName_transport").keyup(function (event) {
                        if (event.keyCode == 13) { //Enter
                            $("#btnSearchTransport").click();
                        }
                    });

                    $("#garaName_invoice").keyup(function (event) {
                        if (event.keyCode == 13) { //Enter
                            $("#btnSearchInvoice").click();
                        }
                    });
                },
                renderEventRowClick: function () {
                    $("#table-data").find("tbody").on('click', 'tr td', function () {
                        var td = $(this);
                        var tr = $(this).parent();
                        if (tr.find('td:eq(0)').text() == td.text()) {
                            $("input[id=garaName_transport]").val(td.text());
                            debtGarageView.searchTransport();
                            debtGarageView.selectAll();
                        }
                    });

                    $("#table-garageInvoice").find("tbody").on('click', 'tr td', function () {
                        var td = $(this);
                        var tr = $(this).parent();
                        if (tr.find('td:eq(0)').text() == td.text()) {
                            $("input[id=garaName_invoice]").val(td.text());
                            debtGarageView.searchInvoice();
                        }
                    });

                    $("#table-invoiceGarageDetail").find("tbody").on('click', 'tr', function () {
                        //Get current object
                        invoiceGarageDetailId = $(this).find('td:first')[0].innerText;
                        invoiceGarageDetail = _.find(debtGarageView.dataInvoiceGarageDetail, function (o) {
                            return o.id == invoiceGarageDetailId;
                        });
                    });
                },

                fillDataToDatatable: function (data) {
//                    removeDataTable();

                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                        data[i].debt = parseInt(data[i]['cashDelivery']) - parseInt(data[i]['cashPreDelivery']);
                    }
                    debtGarageView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {data: 'garages_name'},
                            {data: 'fullNumber'},
                            {data: 'deliveryPlace'},
                            {data: 'voucherNumber'},
                            {
                                data: 'cashDelivery',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'debt',
                                render: $.fn.dataTable.render.number(",", ".", 0)
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
                                    color = 'btn-default';
                                    if (full.cashPreDelivery == 0 && full.invoiceGarage == null)
                                        color = 'btn-danger';
                                    else if (full.cashPreDelivery == full.cashDelivery)
                                        color = 'btn-success';
                                    else if (full.cashPreDelivery > 0 && full.invoiceGarage == null)
                                        color = 'btn-primary';

                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += "<div class='btn btn-circle " + color + "' title='Trả đủ' onclick='debtGarageView.autoEditTransportConfirm(" + full.id + ")'>";
                                    tr += '<i class="fa fa-usd" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
//                        fixedHeader: {
//                            header: true
//                        },
                        order: [[0, "desc"]],
                        dom: 'T<"clear">Bfrtip',
                        tableTools: {
                            "sRowSelect": "multi",
                            "aButtons": ["select_all", "select_none"]
                        },
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
                    });
                    $("#table-data").css("width", "auto");

//                    pushDataTable(debtGarageView.table);
                },
                fillDataToDatatableInvoiceGarage: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].debt = data[i]['hasVAT'] - data[i]['totalPaid'] - data[i]['prePaid'];
                    }
                    debtGarageView.tableInvoiceGarage = $('#table-garageInvoice').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {data: 'garages_name'},
                            {data: 'invoiceCode'},
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
                            {data: 'hasVAT', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'prePaid', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'totalPaid', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'debt', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div class="btn btn-primary btn-circle" title="Xem lịch sử" onclick="debtGarageView.createInvoiceGarage(1, ' + full.id + ')">';
                                    tr += '<i class="fa fa-eye" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '<div class="btn btn-danger btn-circle" title="Xóa hóa đơn" onclick="debtGarageView.deleteInvoiceGarageConfirm(' + full.id + ')">';
                                    tr += '<i class="fa fa-trash-o" aria-hidden="true"></i>';
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
                fillDataToDatatableInvoiceGarageDetail: function (data) {
                    if (debtGarageView.tableInvoiceGarageDetail != null) {
                        debtGarageView.tableInvoiceGarageDetail.destroy();
                    }
                    debtGarageView.tableInvoiceGarageDetail = $('#table-invoiceGarageDetail').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {
                                data: 'payDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                data: 'paidAmt',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div class="btn btn-primary btn-circle marginRight" title="In" onclick="debtGarageView.printReview(' + full.id + ')">';
                                    tr += '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>';
                                    tr += '</div>';
                                    tr += '<div class="btn btn-default btn-circle marginRight" title="Đính kèm tập tin" onclick="debtGarageView.attachFile(' + full.id + ')">';
                                    tr += '<i class="fa fa-file" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '<div class="btn btn-danger btn-circle" title="Xoá" onclick="debtGarageView.deleteInvoiceGarageDetailConfirm(' + full.id + ')">';
                                    tr += '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ]
                    })
                },
                fillDataToDatatablePrintHistory: function (data) {
                    if (debtGarageView.tablePrintHistory != null) {
                        debtGarageView.tablePrintHistory.destroy();
                    }
                    debtGarageView.tablePrintHistory = $('#table-printHistory').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {
                                data: 'printDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'sendToPerson'},
                            {data: 'users_fullName'}
                        ]
                    })
                },

                loadData: function () {
                    if (debtGarageView.table != null)
                        debtGarageView.table.destroy();
                    $.ajax({
                        url: url + 'debt-garage/transports',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            debtGarageView.dataTransport = data['transports'];
                            debtGarageView.dataSearch = data['transports'];
                            debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);

                            debtGarageView.dataInvoiceGarage = data['invoiceGarages'];
                            debtGarageView.dataSearchInvoiceGarage = data['invoiceGarages'];
                            debtGarageView.fillDataToDatatableInvoiceGarage(debtGarageView.dataInvoiceGarage);

                            debtGarageView.dataInvoiceGarageDetail = data['invoiceGarageDetails'];
                            debtGarageView.dataPrintHistory = data['printHistories'];

                            debtGarageView.invoiceCode = data['invoiceCode'];

                            debtGarageView.searchTransport();
                            debtGarageView.searchInvoice();
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    debtGarageView.renderDateTimePicker();
                    debtGarageView.renderScrollbar();
                    debtGarageView.renderEventRadioInput();
                    debtGarageView.renderEventKeyCode();
                    debtGarageView.renderEventRowClick();
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    defaultZero("#VAT");
                    defaultZero("#hasVAT");
                    defaultZero("#paidAmt");


                },
                fillCurrentObjectToForm: function () {
                    $("input[id='invoiceCode']").val(debtGarageView.currentInvoiceGarage["invoiceCode"]);
                    $("input[id='totalPay']").val(debtGarageView.currentInvoiceGarage["totalPay"]);
                    $("input[id='totalPay']").attr('data-totalTransport', debtGarageView.currentInvoiceGarage["totalPay"]);
                    $("input[id='VAT']").val(debtGarageView.currentInvoiceGarage["VAT"]);
                    $("input[id='notVAT']").val(debtGarageView.currentInvoiceGarage["invoiceCode"]);
                    $("input[id='hasVAT']").val(debtGarageView.currentInvoiceGarage["hasVAT"]);

                    var exportDate = moment(debtGarageView.currentInvoiceGarage["exportDate"], "YYYY-MM-DD");
                    $("input[id='exportDate']").datepicker('update', exportDate.format("DD-MM-YYYY"));

                    var invoiceDate = moment(debtGarageView.currentInvoiceGarage["invoiceDate"], "YYYY-MM-DD");
                    $("input[id='invoiceDate']").datepicker('update', invoiceDate.format("DD-MM-YYYY"));

                    var payDate = moment(debtGarageView.currentInvoiceGarage["payDate"], "YYYY-MM-DD");
                    $("input[id='payDate']").datepicker('update', payDate.format("DD-MM-YYYY"));

                    $("input[id='debt']").val(debtGarageView.currentInvoiceGarage["debt"]);
                    $("input[id='debt-real']").val(debtGarageView.currentInvoiceGarage["debt"]);
                    $("input[id='paidAmt']").val(debtGarageView.currentInvoiceGarage["paidAmt"]);
                    $("textarea[id='note']").val(debtGarageView.currentInvoiceGarage["note"]);
                    formatCurrency(".currency");
                },
                fillFormDataToCurrentObject: function () {
                    debtGarageView.currentInvoiceGarage = {
                        id: debtGarageView.invoiceGarageId,
                        invoiceCode: $("input[id='invoiceCode']").val(),
                        VAT: $("input[id='VAT']").val(),
                        notVAT: asNumberFromCurrency("#notVAT"),
                        hasVAT: asNumberFromCurrency("#hasVAT"),
                        exportDate: $("input[id='exportDate']").val(),
                        invoiceDate: $("input[id='invoiceDate']").val(),
                        payDate: $("input[id='payDate']").val(),
                        note: $("textarea[id='note']").val(),
                        totalPay: asNumberFromCurrency("#totalPay"),
                        totalTransport: $("input[id=totalPay]").attr('data-totalTransport'),
                        prePaid: asNumberFromCurrency("#prePaid"),
                        debt: asNumberFromCurrency("#debt-real"),
                        paidAmt: asNumberFromCurrency("#paidAmt")
                    }
                },

                createInvoiceGarage: function (flag, invoiceGarage_id) {
                    if (flag == 0) {
                        var dataAfterValidate = debtGarageView.validateListTransport();

                        if (dataAfterValidate['status'] === 0) {
                            $("#modal-notification").find(".modal-title").html("Cảnh báo");
                            $("#modal-notification").find(".modal-body").html(dataAfterValidate['msg']);
                            debtGarageView.displayModal('show', '#modal-notification');
                            return;
                        }

                        $("#divInvoice").find(".titleControl").html("Tạo mới hóa đơn");
                        debtGarageView.showControl(flag);
                        debtGarageView.action = "new";
                        prePaid = 0;
                        totalPay = 0;
                        for (var i = 0; i < debtGarageView.array_transportId.length; i++) {
                            var currentRow = _.find(debtGarageView.dataTransport, function (o) {
                                return o.id == debtGarageView.array_transportId[i];
                            });

                            if (typeof currentRow !== 'undefined') {
                                totalPay += parseInt(currentRow['cashDelivery']);
                                prePaid += parseInt(currentRow['cashPreDelivery']);
                            }
                        }

                        if (dataAfterValidate['status'] === 1) { //First
                            $("input[id=totalPay]").val(totalPay);
                            $("input[id=totalPay]").attr('data-totalTransport', totalPay);
                            $("input[id=prePaid]").val(prePaid);

                            debt = totalPay - prePaid;
                            $("input[id=debt]").val(debt);
                            $("input[id=debt-real]").val(debt);
                        } else if (dataAfterValidate['status'] === 2) { //Exported
                            $("input[id=totalPay]").attr('data-totalTransport', totalPay);
                            totalPay = dataAfterValidate['totalPay'];
                            $("input[id=totalPay]").val(totalPay);
                            $("input[id=prePaid]").val(prePaid);

                            $("input[id=debt]").val(totalPay);
                            $("input[id=debt-real]").val(totalPay);
                        }
                        $("input[id=invoiceCode]").attr("placeholder", debtGarageView.invoiceCode);

                        //set default value
                        $("input[id=notVAT]").val(totalPay);
                        $("input[id=VAT]").val(0);
                        $("input[id=hasVAT]").val(totalPay);
                        $("input[id=paidAmt]").val(0);

                        //set default VAT=10%
                        $("input[id=VAT]").val(10);
                        debtGarageView.computeHasVAT(10);

                        //remove readly input
                        $("input[id=invoiceCode]").prop('readonly', false);
                        $("input[id=VAT]").prop('readonly', false);
                        $("input[id=hasVAT]").prop('readonly', false);

                        $("input[id=invoiceCode]").focus();
                    } else {
                        if (typeof invoiceGarage_id === 'undefined') return;
                        $("#divInvoice").find(".titleControl").html("Chi tiết hóa đơn");
                        debtGarageView.showControl(flag);

                        debtGarageView.action = "edit";
                        debtGarageView.invoiceGarageId = invoiceGarage_id;
                        //fill data to table InvoiceGarageDetail
                        var data = _.filter(debtGarageView.dataInvoiceGarageDetail, function (o) {
                            return o.invoiceGarage_id == invoiceGarage_id;
                        });
                        if (typeof data === 'undefined') return;
                        debtGarageView.fillDataToDatatableInvoiceGarageDetail(data);

                        //fill data to table PrintHistory
                        var data2 = [];
                        for (var i = 0; i < data.length; i++) {
                            var found = _.find(debtGarageView.dataPrintHistory, function (o) {
                                return o.invoiceGarageDetail_id == data[i]['id'];
                            });
                            if (typeof found !== 'undefined')
                                data2.push(found);
                        }
                        debtGarageView.fillDataToDatatablePrintHistory(data2);

                        //load data to input
                        var rowInvoiceGarage = _.find(debtGarageView.dataInvoiceGarage, function (o) {
                            return o.id == invoiceGarage_id;
                        });
                        if (typeof rowInvoiceGarage === 'undefined') return;

                        var totalPay = parseInt(rowInvoiceGarage['totalPay']);
                        var hasVAT = parseInt(rowInvoiceGarage['hasVAT']);
                        var totalPaid = parseInt(rowInvoiceGarage['totalPaid']);
                        var prePaid = parseInt(rowInvoiceGarage['prePaid']);
                        var debt = hasVAT - (totalPaid + prePaid);
                        $("input[id=totalPay]").val(totalPay);
                        $("input[id=totalPay]").attr('data-totalTransport', parseInt(rowInvoiceGarage['totalTransport']));
                        $("input[id=debt]").val(debt);
                        $("input[id=debt-real]").val(debt);

                        $("input[id=invoiceCode]").val(rowInvoiceGarage['invoiceCode']);
                        $("input[id=VAT]").val(rowInvoiceGarage['VAT']);
                        $("input[id=notVAT]").val(rowInvoiceGarage['notVAT']);
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
                    formatCurrency(".currency");
                },
                autoEditTransport: function (transportId) {
                    debtGarageView.current = null;
                    debtGarageView.current = _.clone(_.find(debtGarageView.dataTransport, function (o) {
                        return o.id == transportId;
                    }), true);
                    debtGarageView.action = 'autoEdit';
                    debtGarageView.save();
                },
                autoEditTransportConfirm: function (transportId) {
                    debtGarageView.current = null;
                    debtGarageView.current = _.clone(_.find(debtGarageView.dataTransport, function (o) {
                        return o.id == transportId;
                    }), true);

                    if (debtGarageView.current['invoiceGarage_id'] != null) {
                        $("#modal-notification").find(".modal-title").html("Cảnh báo");
                        $("#modal-notification").find(".modal-body").html("Đơn hàng này đã xuất hóa đơn, không được dùng chức năng trả đủ. Vui lòng thanh toán vào hóa đơn của đơn hàng này!");
                        debtGarageView.displayModal('show', '#modal-notification');
                        return;
                    }

                    if (parseInt(debtGarageView.current['cashDelivery']) == parseInt(debtGarageView.current['cashPreDelivery'])) {
                        $("#modal-notification").find(".modal-title").html("Cảnh báo");
                        $("#modal-notification").find(".modal-body").html("Đơn hàng này đã trả đủ, không thể tiếp tục thanh toán!");
                        debtGarageView.displayModal('show', '#modal-notification');
                        return;
                    }

                    $("#modal-notification").find(".modal-title").html("Có chắc muốn trả đủ cho đơn hàng này?");
                    tr = '<div class="row">';
                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.autoEditTransport(' + transportId + ')">';
                    tr += 'Đồng ý';
                    tr += '</button>';
                    tr += '<button type="button" class="btn default" onclick="debtGarageView.displayModal(\'hide\', \'#modal-notification\')">';
                    tr += 'Huỷ';
                    tr += '</button>';
                    tr += '</div>';
                    tr += '</div>';
                    $("#modal-notification").find(".modal-body").html(tr);
                    debtGarageView.displayModal('show', '#modal-notification');
                },
                deleteInvoiceGarage: function (invoiceGarage_id) {
                    sendToServer = {
                        _token: _token,
                        _invoiceGarage_id: invoiceGarage_id
                    };
                    console.log("CLIENT");
                    console.log(sendToServer._invoiceGarage_id);
                    $.ajax({
                        url: url + 'invoice-garage/delete',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            invoiceGarageId = data['invoiceGarage'];
                            array_invoiceGarageDetailId = data['invoiceGarageDetails'];

                            //Remove invoiceGarage
                            Old = _.find(debtGarageView.dataInvoiceGarage, function (o) {
                                return o.id == invoiceGarageId;
                            });
                            indexOf = _.indexOf(debtGarageView.dataInvoiceGarage, Old);
                            debtGarageView.dataInvoiceGarage.splice(indexOf, 1);

                            //Remove invoiceGarageDetail
                            for (var i = 0; i < array_invoiceGarageDetailId.length; i++) {
                                Old = _.find(debtGarageView.dataInvoiceGarageDetail, function (o) {
                                    return o.id == array_invoiceGarageDetailId[i];
                                });
                                indexOf = _.indexOf(debtGarageView.dataInvoiceGarageDetail, Old);
                                debtGarageView.dataInvoiceGarageDetail.splice(indexOf, 1);
                            }

                            //Remove InvoiceGarage_id in Transport
                            dataTransport = _.filter(debtGarageView.dataTransport, function (o) {
                                return o.invoiceGarage_id == invoiceGarageId;
                            });
                            for (i = 0; i < dataTransport.length; i++) {
                                dataTransport[i]['invoiceGarage_id'] = null;
                                dataTransport[i]['invoiceCode'] = null;
                            }
                            debtGarageView.dataSearch = debtGarageView.dataTransport;
                            debtGarageView.searchTransport();

                            //reload table
                            debtGarageView.tableInvoiceGarage.clear().rows.add(debtGarageView.dataInvoiceGarage).draw();

                            //call search Method
                            debtGarageView.dataSearchInvoiceGarage = debtGarageView.dataInvoiceGarage;
                            debtGarageView.searchInvoice();

                            //Show notification
                            showNotification("success", "Xóa hóa đơn thành công!");
                            debtGarageView.displayModal("hide", "#modal-notification");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                deleteInvoiceGarageConfirm: function (invoiceGarage_id) {
                    $("#modal-notification").find(".modal-title").html("Có chắc muốn xóa hóa đơn này?");
                    tr = '<div class="row">';
                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.deleteInvoiceGarage(' + invoiceGarage_id + ')">';
                    tr += 'Đồng ý';
                    tr += '</button>';
                    tr += '<button type="button" class="btn default" onclick="debtGarageView.displayModal(\'hide\', \'#modal-notification\')">';
                    tr += 'Huỷ';
                    tr += '</button>';
                    tr += '</div>';
                    tr += '</div>';
                    $("#modal-notification").find(".modal-body").html(tr);
                    debtGarageView.displayModal('show', '#modal-notification');
                },
                deleteInvoiceGarageDetail: function (invoiceGarageDetail_id, flag) {
                    action = 'delete1';
                    if (typeof flag !== 'undefined') {
                        action = 'delete2';
                    }
                    sendToServer = {
                        _token: _token,
                        _action: action,
                        _invoiceGarageDetail_id: invoiceGarageDetail_id
                    };
                    console.log("CLIENT");
                    console.log(sendToServer._invoiceGarageDetail_id);
                    $.ajax({
                        url: url + 'invoice-garage-detail/delete',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            if (action == 'delete1') {
                                invoiceGarage = data['invoiceGarage'];
                                invoiceGarage.debt = invoiceGarage['hasVAT'] - invoiceGarage['totalPaid'] - invoiceGarage['prePaid'];
                                invoiceGarageDetailId = data['invoiceGarageDetail'];

                                //Update invoiceGarage
                                Old = _.find(debtGarageView.dataInvoiceGarage, function (o) {
                                    return o.id == invoiceGarage['id'];
                                });
                                indexOf = _.indexOf(debtGarageView.dataInvoiceGarage, Old);
                                debtGarageView.dataInvoiceGarage.splice(indexOf, 1, invoiceGarage);

                                //Remove invoiceGarageDetail
                                Old = _.find(debtGarageView.dataInvoiceGarageDetail, function (o) {
                                    return o.id == invoiceGarageDetailId;
                                });
                                indexOf = _.indexOf(debtGarageView.dataInvoiceGarageDetail, Old);
                                debtGarageView.dataInvoiceGarageDetail.splice(indexOf, 1);

                                //reload table
                                debtGarageView.tableInvoiceGarage.clear().rows.add(debtGarageView.dataInvoiceGarage).draw();

                                //fill data to table InvoiceGarageDetail
                                var data = _.filter(debtGarageView.dataInvoiceGarageDetail, function (o) {
                                    return o.invoiceGarage_id == invoiceGarage['id'];
                                });
                                if (typeof data === 'undefined') return;
                                debtGarageView.fillDataToDatatableInvoiceGarageDetail(data);

                                //call search Method
                                debtGarageView.dataSearchInvoiceGarage = debtGarageView.dataInvoiceGarage;
                                debtGarageView.searchInvoice();

                                var debtReal = parseInt(invoiceGarage['debt']);
                                $("input[id=debt]").val(debtReal);
                                $("input[id=debt-real]").val(debtReal);

                                //Show notification
                                showNotification("success", "Xóa chi tiết đơn hàng thành công!");
                                debtGarageView.displayModal("hide", "#modal-notification");
                            } else {
                                invoiceGarageId = data['invoiceGarage'];
                                invoiceGarageDetailId = data['invoiceGarageDetail'];

                                //Remove invoiceGarage
                                Old = _.find(debtGarageView.dataInvoiceGarage, function (o) {
                                    return o.id == invoiceGarageId;
                                });
                                indexOf = _.indexOf(debtGarageView.dataInvoiceGarage, Old);
                                debtGarageView.dataInvoiceGarage.splice(indexOf, 1);

                                //Remove invoiceGarageDetail
                                Old = _.find(debtGarageView.dataInvoiceGarageDetail, function (o) {
                                    return o.id == invoiceGarageDetailId;
                                });
                                indexOf = _.indexOf(debtGarageView.dataInvoiceGarageDetail, Old);
                                debtGarageView.dataInvoiceGarageDetail.splice(indexOf, 1);

                                //Remove InvoiceGarage_id in Transport
                                dataTransport = _.filter(debtGarageView.dataTransport, function (o) {
                                    return o.invoiceGarage_id == invoiceGarageId;
                                });
                                for (i = 0; i < dataTransport.length; i++) {
                                    dataTransport[i]['invoiceGarage_id'] = null;
                                    dataTransport[i]['invoiceCode'] = null;
                                }
                                debtGarageView.dataSearch = debtGarageView.dataTransport;
                                debtGarageView.searchTransport();

                                //reload table
                                debtGarageView.tableInvoiceGarage.clear().rows.add(debtGarageView.dataInvoiceGarage).draw();

                                //call search Method
                                debtGarageView.dataSearchInvoiceGarage = debtGarageView.dataInvoiceGarage;
                                debtGarageView.searchInvoice();

                                //Show notification
                                showNotification("success", "Xóa chi tiết đơn hàng thành công!");
                                debtGarageView.displayModal("hide", "#modal-notification");

                                //Close form
                                debtGarageView.clearInput();
                                debtGarageView.clearValidation("#frmInvoice");
                                debtGarageView.hideControl();
                            }
                            formatCurrency(".currency");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                deleteInvoiceGarageDetailConfirm: function (invoiceGarageDetail_id) {
                    array_invoiceGarageDetail_of_invoiceGarage = _.filter(debtGarageView.dataInvoiceGarageDetail, function (o) {
                        return o.invoiceGarage_id == debtGarageView.invoiceGarageId;
                    });
                    if (typeof array_invoiceGarageDetail_of_invoiceGarage === 'undefined') {
                        showNotification("error", "Có lỗi xảy ra. Vui lòng làm mới lại trình duyệt.");
                        return;
                    }
                    if (array_invoiceGarageDetail_of_invoiceGarage.length == 1) {
                        //Warning, delete InvoiceGarageDetail & InvoiceGarage
                        $("#modal-notification").find(".modal-title").html("Xóa chi tiết đơn hàng này cũng sẽ xóa hóa đơn.<br>Có chắc muốn xóa chi tiết hóa đơn này?");
                        tr = '<div class="row">';
                        tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                        tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.deleteInvoiceGarageDetail(' + invoiceGarageDetail_id + ', 1)">';
                        tr += 'Đồng ý';
                        tr += '</button>';
                        tr += '<button type="button" class="btn default" onclick="debtGarageView.displayModal(\'hide\', \'#modal-notification\')">';
                        tr += 'Huỷ';
                        tr += '</button>';
                        tr += '</div>';
                        tr += '</div>';
                        $("#modal-notification").find(".modal-body").html(tr);
                        debtGarageView.displayModal('show', '#modal-notification');
                    } else {
                        $("#modal-notification").find(".modal-title").html("Có chắc muốn xóa chi tiết hóa đơn này?");
                        tr = '<div class="row">';
                        tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                        tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.deleteInvoiceGarageDetail(' + invoiceGarageDetail_id + ')">';
                        tr += 'Đồng ý';
                        tr += '</button>';
                        tr += '<button type="button" class="btn default" onclick="debtGarageView.displayModal(\'hide\', \'#modal-notification\')">';
                        tr += 'Huỷ';
                        tr += '</button>';
                        tr += '</div>';
                        tr += '</div>';
                        $("#modal-notification").find(".modal-body").html(tr);
                        debtGarageView.displayModal('show', '#modal-notification');
                    }
                },

                validateListTransport: function () {
                    array = $.map(debtGarageView.table.rows('.selected').data(), function (value, index) {
                        return [value];
                    });
                    debtGarageView.array_transportId = [];
                    debtGarageView.array_transportId = _.map(array, 'id');

                    array_garageId = _.map(array, 'garage_id');
                    array_garageId = _.uniq(array_garageId);

                    if (array_garageId.length == 1 && debtGarageView.array_transportId.length > 0) {
                        var sendToServer = {
                            _token: _token,
                            _array_transportId: debtGarageView.array_transportId
                        };

                        var result = null;
                        $.ajax({
                            url: url + 'debt-garage/validate',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer,
                            async: false
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 200) {
                                result = data;
                            } else if (jqXHR.status == 203) {
                                showNotification("error", data['msg']);
                            } else {
                                showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            var data = {
                                'status': 0,
                                'totalPay': 0,
                                'msg': 'Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.'
                            };
                            result = data;
                        });
                        return result;
                    } else {
                        var result = {
                            'status': 0,
                            'totalPay': 0,
                            'msg': 'Nhà xe hoặc đơn hàng không hợp lệ!'
                        };
                        return result;
                    }
                },
                validateForm: function () {
                    $("#frmInvoice").validate({
                        rules: {
                            paidAmt: {
                                required: true
                            }
                        },
                        ignore: ".ignore",
                        messages: {
                            paidAmt: {
                                required: "Vui lòng nhập số tiền thanh toán."
                            }
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
                },

                save: function () {
                    var sendToServer = {
                        _token: _token,
                        _transport: debtGarageView.current.id
                    };
                    console.log("CLIENT");
                    console.log(sendToServer._transport);
                    $.ajax({
                        url: url + 'debt-garage/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            //Remove and Add Transport
                            var Old = _.find(debtGarageView.dataTransport, function (o) {
                                return o.id == sendToServer._transport;
                            });
                            var indexOfOld = _.indexOf(debtGarageView.dataTransport, Old);
                            data['transport'].fullNumber = data['transport']['vehicles_areaCode'] + ' ' + data['transport']['vehicles_vehicleNumber'];
                            data['transport'].debt = data['transport']['cashDelivery'] - data['transport']['cashPreDelivery'];
                            data['transport'].cashProfit_real = parseInt(data['transport']['cashPreDelivery']) - (parseInt(data['transport']['cashPreDelivery']) + parseInt(data['transport']['cost']));
                            debtGarageView.dataTransport.splice(indexOfOld, 1, data['transport']);

                            //reload 2 table
                            debtGarageView.table.clear().rows.add(debtGarageView.dataTransport).draw();

                            //call search Method
                            debtGarageView.dataSearch = debtGarageView.dataTransport;
                            debtGarageView.searchTransport();

                            //clear Input
                            debtGarageView.clearInput();

                            //Show notification
                            showNotification("success", "Thanh toán thành công!");
                            debtGarageView.displayModal("hide", "#modal-notification");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                saveInvoiceGarage: function () {
                    debtGarageView.validateForm();
                    if ($("#frmInvoice").valid()) {
                        debtGarageView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: debtGarageView.action,
                            _invoiceGarage: debtGarageView.currentInvoiceGarage,
                            _array_transportId: debtGarageView.array_transportId
                        };
                        console.log("CLIENT");
                        console.log(sendToServer);
                        $.ajax({
                            url: url + 'invoice-garage/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            console.log("SERVER");
                            console.log(data);
                            if (jqXHR.status == 201) {
                                var invoiceGarage = data['invoiceGarage'];
                                var invoiceGarageDetail = data['invoiceGarageDetail'];
                                debtGarageView.invoiceCode = data['invoiceCode'];
                                invoiceGarage.debt = parseInt(invoiceGarage['hasVAT']) - parseInt(invoiceGarage['totalPaid']) - parseInt(invoiceGarage['prePaid']);

                                if (debtGarageView.action == 'new') {
                                    //Update InvoiceGarage_Id for Transports
                                    for (var i = 0; i < debtGarageView.array_transportId.length; i++) {
                                        var Old = _.find(debtGarageView.dataTransport, function (o) {
                                            return o.id == debtGarageView.array_transportId[i];
                                        });
                                        Old['invoiceGarage_id'] = invoiceGarage['id'];
                                        Old['invoiceCode'] = invoiceGarage['invoiceCode'];
                                    }

                                    //add InvoiceGarage
                                    debtGarageView.dataInvoiceGarage.push(invoiceGarage);

                                    //add InvoiceGarageDetails
                                    debtGarageView.dataInvoiceGarageDetail.push(invoiceGarageDetail);

                                    //reload 2 table & search
                                    debtGarageView.dataSearch = [];
                                    debtGarageView.table.clear().rows.add(debtGarageView.dataSearch).draw();
                                    debtGarageView.tagsGarageNameTransport = [];
                                    debtGarageView.searchTransport();

                                    debtGarageView.dataSearchInvoiceGarage = debtGarageView.dataInvoiceGarage;
                                    debtGarageView.tableInvoiceGarage.clear().rows.add(debtGarageView.dataSearchInvoiceGarage).draw();
                                    debtGarageView.searchInvoice();

                                    //clear Input
                                    debtGarageView.clearInput();
                                    debtGarageView.clearValidation("#frmInvoice");
                                    debtGarageView.hideControl();

                                    //Show notification
                                    showNotification("success", "Thanh toán thành công!");
                                } else {
                                    //Remove & Add InvoiceGarage
                                    var Old = _.find(debtGarageView.dataInvoiceGarage, function (o) {
                                        return o.id == sendToServer._invoiceGarage.id;
                                    });
                                    var indexOfOld = _.indexOf(debtGarageView.dataInvoiceGarage, Old);
                                    debtGarageView.dataInvoiceGarage.splice(indexOfOld, 1, invoiceGarage);

                                    //add InvoiceGarageDetails
                                    debtGarageView.dataInvoiceGarageDetail.push(invoiceGarageDetail);

                                    //reload 2 table
                                    debtGarageView.tableInvoiceGarage.clear().rows.add(debtGarageView.dataInvoiceGarage).draw();

                                    //fill data to table InvoiceGarageDetail
                                    var data = _.filter(debtGarageView.dataInvoiceGarageDetail, function (o) {
                                        return o.invoiceGarage_id == sendToServer._invoiceGarage.id;
                                    });
                                    if (typeof data === 'undefined') return;
                                    debtGarageView.fillDataToDatatableInvoiceGarageDetail(data);

                                    //call search Method
                                    debtGarageView.dataSearchInvoiceGarage = debtGarageView.dataInvoiceGarage;
                                    debtGarageView.searchInvoice();

                                    //clear Input
                                    $("input[id=paidAmt]").val('');
                                    $("textarea[id=note]").val('');

                                    var prePaid = parseInt(sendToServer._invoiceGarage['paidAmt']);
                                    var debtReal = asNumberFromCurrency("#debt-real") - prePaid;
                                    debtReal = (debtReal < 0) ? 0 : debtReal;
                                    $("input[id=debt]").val(debtReal);
                                    $("input[id=debt-real]").val(debtReal);
                                    $("#paidAmt").focus();

                                    //Show notification
                                    showNotification("success", "Thanh toán thành công!");
                                }
                                formatCurrency(".currency");
                            } else if (jqXHR.status == 203) {
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

                printReview: function (invoiceGarageDetail_id) {
                    debtGarageView.displayModal('show', '#modal-printReview');
                    console.log(invoiceGarageDetail_id);
                },
                attachFile: function (invoiceGarageDetail_id) {
                    console.log(invoiceGarageDetail_id);
                },

                clearSearch: function (tableName) {
                    if (tableName == "transport") {
                        $("#dateSearchTransport").find(".start").datepicker('update', '');
                        $("#dateSearchTransport").find(".end").datepicker('update', '');
                        $("input[id=garaName_transport]").val('');
                        debtGarageView.searchTransport();
                    } else {
                        $("#dateSearchInvoice").find(".start").datepicker('update', '');
                        $("#dateSearchInvoice").find(".end").datepicker('update', '');
                        $("input[id=garaName_invoice]").val('');
                        debtGarageView.searchInvoice();
                    }

                },
                searchTransport: function (money) {
                    found = debtGarageView.searchExportInvoice(debtGarageView.dataTransport);

                    if (typeof money === 'undefined')
                        found = debtGarageView.searchStatusMoney(found);
                    else
                        found = debtGarageView.searchStatusMoney(found, money.value);

                    found = debtGarageView.searchGarage(found);
                    found = debtGarageView.searchDate(found);

                    debtGarageView.dataSearch = found;
                    debtGarageView.table.clear().rows.add(debtGarageView.dataSearch).draw();

                    //fill data to listSearch
                    debtGarageView.tagsGarageNameTransport = _.map(debtGarageView.dataSearch, 'garages_name');
                    debtGarageView.tagsGarageNameTransport = _.union(debtGarageView.tagsGarageNameTransport);
                    debtGarageView.renderAutoCompleteSearch();
                },
                searchInvoice: function () {
                    found = debtGarageView.searchStatusMoneyInvoice(debtGarageView.dataInvoiceGarage);

                    found = debtGarageView.searchGarageInvoice(found);
                    found = debtGarageView.searchDateInvoice(found);

                    debtGarageView.dataSearchInvoiceGarage = found;
                    debtGarageView.tableInvoiceGarage.clear().rows.add(debtGarageView.dataSearchInvoiceGarage).draw();

                    //fill data to listSearch
                    debtGarageView.tagsGarageNameInvoice = _.map(debtGarageView.dataSearchInvoiceGarage, 'garages_name');
                    debtGarageView.tagsGarageNameInvoice = _.union(debtGarageView.tagsGarageNameInvoice);
                    debtGarageView.renderAutoCompleteSearch();
                },

                searchDate: function (data) {
                    fromDate = $("#dateSearchTransport").find(".start").val();
                    toDate = $("#dateSearchTransport").find(".end").val();
                    if (fromDate == '' || toDate == '')
                        return data;

                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid())
                        return data;

                    found = _.filter(data, function (o) {
                        var dateFind = moment(o.receiveDate, "YYYY-MM-DD H:m:s");
                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
                    });
                    return found;
                },
                searchGarage: function (data) {
                    garaName = $("#garaName_transport").val();
                    if (garaName == '')
                        return data;

                    found = _.filter(data, function (o) {
                        return removeDiacritics(o.garages_name.toLowerCase()).includes(removeDiacritics(garaName.toLowerCase()));
                    });
                    return found;
                },
                searchExportInvoice: function (data) {
                    invoice = $("#invoiceUp").find("input:checked").val();
                    found = _.filter(data, function (o) {
                        if (invoice == 'All') {
                            return true;
                        } else if (invoice == 'Invoice') {
                            return o.invoiceGarage_id != null;
                        } else {
                            return o.invoiceGarage_id == null;
                        }
                    });
                    return found;
                },
                searchStatusMoney: function (data, value) {
                    if (typeof value === 'undefined')
                        money = $("select[id=statusMoney]").val();
                    else
                        money = value;
                    found = _.filter(data, function (o) {
                        if (money == 'FullPay') {
                            return o.cashDelivery == o.cashPreDelivery;
                        } else if (money == 'PrePay') {
                            return o.cashPreDelivery != 0 && o.cashDelivery > o.cashPreDelivery;
                        } else if (money == 'NotPay') {
                            return o.cashPreDelivery == 0;
                        } else {
                            return true;
                        }
                    });
                    return found;
                },

                searchDateInvoice: function (data) {
                    fromDate = $("#dateSearchInvoice").find(".start").val();
                    toDate = $("#dateSearchInvoice").find(".end").val();
                    if (fromDate == '' || toDate == '')
                        return data;

                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid())
                        return data;

                    found = _.filter(data, function (o) {
                        var dateFind = moment(o.invoiceDate, "YYYY-MM-DD H:m:s");
                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
                    });
                    return found;
                },
                searchGarageInvoice: function (data) {
                    garaName = $("#garaName_invoice").val();
                    if (garaName == '')
                        return data;

                    found = _.filter(data, function (o) {
                        return removeDiacritics(o.garages_name.toLowerCase()).includes(removeDiacritics(garaName.toLowerCase()));
                    });
                    return found;
                },
                searchStatusMoneyInvoice: function (data) {
                    money = $("#invoiceDown").find("input:checked").val();
                    found = _.filter(data, function (o) {
                        if (money == 'All') {
                            return true;
                        } else if (money == 'StillDebt') {
                            return parseInt(o.totalPay) > parseInt(o.totalPaid) + parseInt(o.prePaid);
                        } else {
                            return parseInt(o.totalPay) == parseInt(o.totalPaid) + parseInt(o.prePaid);
                        }
                    });
                    return found;
                },

                computeDebt: function (paidAmt) {
                    paidAmt = convertStringToNumber(paidAmt);
                    var debtReal = asNumberFromCurrency("#debt-real");
                    if (paidAmt > debtReal) {
                        showNotification('warning', 'Số tiền trả không được lớn hơn tiền còn nợ.');
                        paidAmt = debtReal;
                        $("input[id=paidAmt]").val(paidAmt);
                    }
                    var debt = debtReal - paidAmt;
                    debt = (debt < 0) ? 0 : debt;
                    $("input[id=debt]").val(debt);
                    formatCurrency(".currency");
                },
                computeVAT: function (hasVat) {
                    console.log(hasVat);
                    hasVat = convertStringToNumber(hasVat);
                    console.log(hasVat);
                    var notVat = asNumberFromCurrency("#notVAT");
                    var vat = ((hasVat - notVat) / notVat) * 100;
                    $("input[id=VAT]").val(vat);

                    var prePaid = asNumberFromCurrency("#prePaid");
                    var paidAmt = asNumberFromCurrency("#paidAmt");
                    $("input[id=debt-real]").val(hasVat - prePaid);
                    $("input[id=debt]").val(hasVat - (prePaid + paidAmt));
                    formatCurrency(".currency");
                },
                computeHasVAT: function (vat, e) {
//                    if((e.keyCode == 8 || e.keyCode == 46) && (vat == 0 || vat == '')) return;

                    console.log(vat);
                    if (vat == '') vat = 0;
                    var notVat = asNumberFromCurrency('#notVAT');
                    var hasVat = notVat + ((vat / 100) * notVat);
                    $("input[id=hasVAT]").val(hasVat);

                    var prePaid = asNumberFromCurrency('#prePaid');
                    var paidAmt = asNumberFromCurrency('#paidAmt');
                    $("input[id=debt-real]").val(hasVat - prePaid);
                    $("input[id=debt]").val(hasVat - (prePaid + paidAmt));
                    formatCurrency(".currency");
                },
                computeWhenTotalpayChange: function (totalPay) {
                    totalPay = convertStringToNumber(totalPay);
                    totalTransport = parseInt($('input[id=totalPay]').attr('data-totalTransport'));

                    if (totalPay > totalTransport) {
                        showNotification('warning', 'Số tiền trên hóa đơn không được lớn hơn tổng tiền của các đơn hàng.');
                        totalPay = totalTransport;
                        $("input[id=totalPay]").val(totalPay);
                    }

                    vat = parseInt($("input[id=VAT]").val());
                    paidAmt = asNumberFromCurrency("#paidAmt");
                    $("input[id=debt-real]").val(totalPay + (totalPay * vat / 100));
                    $("input[id=notVAT]").val(totalPay);
                    $("input[id=hasVAT]").val(totalPay + (totalPay * vat / 100));
                    $("input[id=debt]").val(totalPay - paidAmt);
                    formatCurrency(".currency");
                }
            };
            debtGarageView.loadData();
        } else {
            debtGarageView.loadData();
        }
    });
</script>
