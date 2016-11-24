<style>
    #divInvoice {
        z-index: 3;
        position: fixed;
        top: 53px;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divInvoice .panel-body {
        height: 579px;
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
                                <input type="text" class="form-control" id="custName_transport"
                                       name="custName_transport" placeholder="Nhập tên khách hàng">
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
                                            onchange="debtCustomerView.searchTransport(this); debtCustomerView.selectAll()">
                                        <option value="All">Tất cả</option>
                                        <option value="NotPay">Chưa trả</option>
                                        <option value="PrePay">Trả trước</option>
                                        <option value="FullPay">Trả đủ</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <button id="btnSearchTransport" class="btn btn-sm btn-info marginRight"
                                                onclick="debtCustomerView.searchTransport(); debtCustomerView.selectAll()">
                                            <i class="fa fa-search" aria-hidden="true"></i> Tìm
                                        </button>
                                        <button class="btn btn-sm btn-default"
                                                onclick="debtCustomerView.clearSearch('transport')">
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
                                        <th>Chi tiết</th>
                                        <th>Khách hàng</th>
                                        <th>Mã hóa đơn</th>
                                        <th>Số xe</th>
                                        <th>Nơi nhận</th>
                                        <th>Nơi giao</th>
                                        <th>Số chứng từ</th>
                                        <th>Doanh thu</th>
                                        <th>Nhận</th>
                                        <th>Người nhận</th>
                                        <th>Người tạo</th>
                                        <th>Người sửa</th>
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
                            <input type="text" class="form-control" id="custName_invoice" name="custName_transport"
                                   placeholder="Nhập tên khách hàng">
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
                                <button onclick="debtCustomerView.searchInvoice()" id="btnSearchInvoice"
                                        class="btn btn-sm btn-info marginRight"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button class="btn btn-sm btn-default"
                                        onclick="debtCustomerView.clearSearch('invoice')">
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
                                        <th>Tổng tiền (+VAT)</th>
                                        <th>Trả trước</th>
                                        <th>Trả trên HĐ</th>
                                        <th>Nợ</th>
                                        <th>Người tạo</th>
                                        <th>Người sửa</th>
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
                <span class="titleControl">Xuất hóa đơn</span>
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
                                    <div class="col-md-12">
                                        <fieldset>
                                            <legend>Giá trị thanh toán:</legend>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="totalTransport"><b>Tổng tiền đơn hàng</b></label>
                                                        <input type="text" class="form-control currency"
                                                               name="totalTransport" id="totalTransport" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="cashReceive"><b>Đã nhận</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="cashReceive" name="cashReceive" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="debt-real"><b>Cần thanh toán</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="payNeed" name="payNeed" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="debt"><b>Đã xuất hóa đơn</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="debt" name="debt" readonly>
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <legend>Thông tin nợ:</legend>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="debtNotExportInvoice"><b>Chưa xuất hóa đơn</b></label>
                                                        <input type="text" class="form-control currency"
                                                               name="debtNotExportInvoice" id="debtNotExportInvoice" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="debtExportInvoice"><b>Nợ hóa đơn</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="debtExportInvoice" name="debtExportInvoice" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="debt-real"><b>Nợ thực tế</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="debt-real" name="debt-real" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <legend>Hóa đơn:
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-size: 13px;">Xuất HĐ tiền đã nhận: </span>
                                                <input type="checkbox" id="statusPrePaid" name="statusPrePaid"
                                                       onchange="debtCustomerView.renderEventCheckbox(this)">
                                            </legend>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="totalPay"><b>Trả</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="totalPay" name="totalPay" data-totalTransport=""
                                                               onkeyup="debtCustomerView.computeWhenChangeTotalPay(this.value)">
                                                        <input type="hidden" id="invoice_id" name="invoice_id">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="totalPay-real"><b>Xuất HĐ</b></label>
                                                        <input type="text" class="form-control currency"
                                                               name="totalPay-real" id="totalPay-real" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="VAT" class="red"><b>VAT (%)</b></label>
                                                        <input type="number" class="form-control defaultZero"
                                                               id="VAT" name="VAT"
                                                               onkeyup="debtCustomerView.computeWhenChangeVat(this.value)">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="hasVAT" class="red"><b>Có VAT</b></label>
                                                        <input type="text" class="form-control currency defaultZero"
                                                               id="hasVAT" name="hasVAT"
                                                               onkeyup="debtCustomerView.computeWhenChangeHasVat(this.value)">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="paidAmt" class="red"><b>Nhận tiền</b></label>
                                                        <input type="text" class="form-control currency defaultZero"
                                                               id="paidAmt" name="paidAmt"
                                                               onkeyup="debtCustomerView.computeWhenChangePaidAmt(this.value)">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="debtInvoice"><b>Còn nợ lại</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="debtInvoice" name="debtInvoice" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="invoiceCode"><b>Mã hóa đơn</b></label>
                                                        <input type="text" class="form-control"
                                                               id="invoiceCode"
                                                               name="invoiceCode">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="exportDate"><b>Ngày xuất</b></label>
                                                        <input type="text" class="date form-control ignore"
                                                               id="exportDate" name="exportDate">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="invoiceDate"><b>Ngày hóa đơn</b></label>
                                                        <input type="text" class="date form-control ignore"
                                                               id="invoiceDate" name="invoiceDate">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="payDate"><b>Ngày trả</b></label>
                                                        <input type="text" class="date form-control ignore"
                                                               id="payDate" name="payDate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="note"><b>Ghi chú</b></label>
                                                        <textarea class="form-control" id="note" name="note" rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
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
                                                <button type="button" class="btn default"
                                                        onclick="debtCustomerView.retype()">Nhập lại
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
                                    <table class="table table-bordered table-hover" id="table-invoiceCustomerDetail">
                                        <thead>
                                        <tr class="active">
                                            <th>Mã</th>
                                            <th>Ngày trả</th>
                                            <th>Tiền trả (-VAT)</th>
                                            <th>Tiền trả (+VAT)</th>
                                            <th>In</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row hide">
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
                dataTransportInvoice: null,

                dataSearch: null,
                dataSearchInvoiceCustomer: null,

                action: null, //new, edit, autoEdit
                current: null, //for autoEdit
                currentInvoiceCustomer: null, //for new & edit
                invoiceCustomerId: null, //for edit
                array_transportId: [], //of InvoiceCustomer current
                invoiceCode: null, //Get invoiceCode newest form Server
                tagsCustomerNameTransport: [], //for search
                tagsCustomerNameInvoice: [], //for search
                statusPrePaid: 0,
                statusInvoice: 0,

                showControl: function (flag) {
                    if (flag == 0) {
                        $('#divInvoice').css("width", "60%");
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
                    $("textarea[id='note']").val('');
                    $("input[id='exportDate]").val('');
                    $("input[id='invoiceDate]").val('');
                    $("input[id='payDate]").val('');

                    $("input[id='totalTransport']").val('');
                    $("input[id='cashReceive']").val('');
                    $("input[id='debt']").val('');
                    $("input[id='debt-real']").val('');
                    $("input[id='totalPay']").val('');
                    $("input[id='totalPay-real']").val('');
                    $("input[id='VAT']").val('');
                    $("input[id='hasVAT']").val('');
                    $("input[id='paidAmt']").val('');
                    $("input[id='debtInvoice']").val('');
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
                        debtCustomerView.searchTransport(e.currentTarget.defaultValue);
                        debtCustomerView.selectAll();
                    });

                    $('input[type="radio"][name=rdoInvoice]').on('change', function (e) {
                        debtCustomerView.searchInvoice();
                    });
                },
                renderAutoCompleteSearch: function () {
                    $("#custName_transport").autocomplete({
                        source: debtCustomerView.tagsCustomerNameTransport
                    });

                    $("#custName_invoice").autocomplete({
                        source: debtCustomerView.tagsCustomerNameInvoice
                    });
                },
                renderEventKeyCode: function () {
                    $("#custName_transport").keyup(function (event) {
                        if (event.keyCode == 13) { //Enter
                            $("#btnSearchTransport").click();
                        }
                    });

                    $("#custName_invoice").keyup(function (event) {
                        if (event.keyCode == 13) { //Enter
                            $("#btnSearchInvoice").click();
                        }
                    });
                },
                renderEventRowClick: function () {
                    $("#table-data").find("tbody").on('click', 'tr td', function () {
                        var td = $(this);
                        var tr = $(this).parent();
                        var transportId = $(tr).find('td').last().find('div.text-center').attr('data-transportId');

                        var transport = _.find(debtCustomerView.dataTransport, function (o) {
                            return o.id == transportId;
                        });
                        if (typeof transport === 'undefined')
                            return;
                        if (transport.transportType === 1)
                            return;

                        if (tr.find('td:eq(1)').text() == td.text()) {
                            $("input[id=custName_transport]").val(td.text());
                            debtCustomerView.searchTransport();
                            debtCustomerView.selectAll();
                        }
                    });

                    $("#table-customerInvoice").find("tbody").on('click', 'tr td', function () {
                        var td = $(this);
                        var tr = $(this).parent();
                        if (tr.find('td:eq(1)').text() == td.text()) {
                            $("input[id=custName_invoice]").val(td.text());
                            debtCustomerView.searchInvoice();
                        }
                    });

                    $("#table-invoiceCustomerDetail").find("tbody").on('click', 'tr', function () {
                        //Get current object
                        invoiceCustomerDetailId = $(this).find('td:first')[0].innerText;
                        invoiceCustomerDetail = _.find(debtCustomerView.dataInvoiceCustomerDetail, function (o) {
                            return o.id == invoiceCustomerDetailId;
                        });
                    });
                },
                renderEventCheckbox: function (cb) {
                    // Thêm mới hóa đơn
                    debtCustomerView.statusPrePaid = (cb.checked) ? 1 : 0;
                    var statusCheck = cb.checked;

                    var totalPay = asNumberFromCurrency("#totalPay");
                    var debtNotExportInvoice = asNumberFromCurrency("#debtNotExportInvoice");
                    var cashReceive = asNumberFromCurrency("#cashReceive");
                    var vat = parseFloat($("input[id=VAT]").val());
                    var paidAmt = asNumberFromCurrency("#paidAmt");

                    if(statusCheck) {
                        // Dùng trả trước
                        if (totalPay > debtNotExportInvoice - cashReceive) {
                            showNotification('warning', 'Số tiền trả không được lớn hơn tiền cần thanh toán.');
                            totalPay = debtNotExportInvoice - cashReceive;
                        }
                        var totalPayReal = totalPay + cashReceive;
                    } else {
                        // Không dùng trả trước
                        if (totalPay > debtNotExportInvoice) {
                            showNotification('warning', 'Số tiền trả không được lớn hơn tổng tiền đơn hàng.');
                            totalPay = debtNotExportInvoice;
                        }
                        var totalPayReal = totalPay;
                    }

                    var hasVat = totalPayReal + (totalPayReal * vat / 100);

                    if(debtCustomerView.statusPrePaid === 1) {
                        var debtInvoice = hasVat - paidAmt - cashReceive;
                    } else {
                        var debtInvoice = hasVat - paidAmt;
                    }

                    debtInvoice = (debtInvoice < 0) ? 0 : debtInvoice;

                    $("input[id=totalPay-real]").val(totalPayReal);
                    $("input[id=hasVAT]").val(hasVat);
                    $("input[id=debtInvoice]").val(debtInvoice);
                    formatCurrency(".currency");
                },

                fillDataToDatatable: function (data) {
//                    removeDataTable();
                    if(debtCustomerView.table != null)
                        debtCustomerView.table.destroy();

                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['transportType'] === 1) {
                            data[i].fullNumber = data[i]['vehicle_name'];
                            data[i].products_name = data[i]['product_name'];
                            data[i].customers_fullName = data[i]['customer_name'];
                        } else {
                            var fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + "-" + data[i]['vehicles_vehicleNumber'];
                            data[i].fullNumber = fullNumber;
                        }
                        data[i].debt = data[i]['cashRevenue'] - data[i]['cashReceive'];

                        var transportInvoice = _.filter(debtCustomerView.dataTransportInvoice, function(o){
                            return o.transport_id == data[i]['id'];
                        });

                        if(transportInvoice.length > 0){
                            transportInvoice = _.map(transportInvoice, 'invoiceCustomer_id');
                            var invoice = _.filter(debtCustomerView.dataInvoiceCustomer, function(o){
                                return _.includes(transportInvoice, o.id);
                            });
                            if(invoice.length > 0){
                                invoice = _.map(invoice, 'invoiceCode');
                                data[i].invoiceCode = invoice.toString();
                            }
                            else {
                                data[i].invoiceCode = "";
                            }
                        }
                        else {
                            data[i].invoiceCode = "";
                        }
                    }

                    debtCustomerView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {
                                render: function(){
                                    return "";
                                }
                            },
                            {data: 'customers_fullName'},
                            {
                                data: 'invoiceCode',
                                render: function (data, type, full, meta) {
                                    var arr = data.split(",");
                                    var tr = "";
                                    for(var i in arr){
                                        tr += arr[i] + "<br>";
                                    }
                                    return tr;
                                }
                            },
                            {data: 'fullNumber'},
                            {data: 'receivePlace'},
                            {data: 'deliveryPlace'},
                            {data: 'voucherNumber'},
                            {
                                data: 'cashRevenue',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'cashReceive',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
//                            {
//                                data: 'debt',
//                                render: $.fn.dataTable.render.number(",", ".", 0)
//                            },
                            {data: 'receiver'},
                            {data: 'users_createdBy'},
                            {data: 'users_updatedBy'},
                            {
                                data: 'receiveDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var color = 'btn-default';
                                    var text = '';
                                    if (full.cashReceive == 0 && full.invoiceCode == ""){
                                        color = 'btn-danger';
                                        text = 'Click để trả đủ';
                                    }
                                    else if (full.cashReceive == full.cashRevenue){
                                        color = 'btn-success';
                                        text = 'Đã trả đủ';
                                    }
                                    else if (full.cashReceive > 0 && full.invoiceCode == ""){
                                        color = 'btn-primary';
                                        text = 'Click để trả đủ';
                                    }


                                    var tr = '';
                                    tr += '<div class="text-center" data-transportId="' + full.id + '">';
                                    tr += "<div class='btn btn-circle " + color + "' title='" + text + "' onclick='debtCustomerView.autoEditTransportConfirm(" + full.id + ")'>";
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
                        responsive: true,
                        columnDefs: [
                            {responsivePriority: 1, targets: 1},
                            {responsivePriority: 2, targets: 2},
                            {responsivePriority: 3, targets: 3},
                            {responsivePriority: 4, targets: 4},
                            {responsivePriority: 5, targets: 5},
                            {responsivePriority: 6, targets: 6},
                            {responsivePriority: 7, targets: 7},
                            {responsivePriority: 8, targets: 8},
                            {responsivePriority: 9, targets: 9},
                            {responsivePriority: 10, targets: 10},
                            {responsivePriority: 14, targets: 11}, //Nguoi sua
                            {responsivePriority: 13, targets: 12}, //Nguoi tao
                            {responsivePriority: 11, targets: 13},
                            {responsivePriority: 12, targets: 14}
                        ],
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

//                    pushDataTable(debtCustomerView.table);
                },
                fillDataToDatatableInvoiceCustomer: function (data) {
                    if(debtCustomerView.tableInvoiceCustomer != null)
                        debtCustomerView.tableInvoiceCustomer.destroy();

                    for (var i = 0; i < data.length; i++) {
                        if(data[i]['statusPrePaid'] === 1){
                            data[i].debt = data[i]['hasVAT'] - data[i]['totalPaid'] - data[i]['prePaid'];
                        } else {
                            data[i].debt = data[i]['hasVAT'] - data[i]['totalPaid'];
                        }
                    }
                    debtCustomerView.tableInvoiceCustomer = $('#table-customerInvoice').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
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
                            {data: 'hasVAT', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'prePaid', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'totalPaid', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'debt', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'users_createdBy'},
                            {data: 'users_updatedBy'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div class="btn btn-primary btn-circle" title="Xem lịch sử" onclick="debtCustomerView.createInvoiceCustomer(1, ' + full.id + ')">';
                                    tr += '<i class="fa fa-eye" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '<div class="btn btn-danger btn-circle" title="Xóa hóa đơn" onclick="debtCustomerView.deleteInvoiceCustomerConfirm(' + full.id + ')">';
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
                fillDataToDatatableInvoiceCustomerDetail: function (data) {
                    if (debtCustomerView.tableInvoiceCustomerDetail != null) {
                        debtCustomerView.tableInvoiceCustomerDetail.destroy();
                    }
                    debtCustomerView.tableInvoiceCustomerDetail = $('#table-invoiceCustomerDetail').DataTable({
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
                                data: 'paidAmtNotVat',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'paidAmt',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div class="btn btn-primary btn-circle marginRight" title="In" onclick="debtCustomerView.printReview(' + full.id + ')">';
                                    tr += '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>';
                                    tr += '</div>';
                                    tr += '<div class="btn btn-default btn-circle marginRight" title="Đính kèm tập tin" onclick="debtCustomerView.attachFile(' + full.id + ')">';
                                    tr += '<i class="fa fa-file" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '<div class="btn btn-danger btn-circle" title="Xoá" onclick="debtCustomerView.deleteInvoiceCustomerDetailConfirm(' + full.id + ')">';
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
                    if (debtCustomerView.tablePrintHistory != null) {
                        debtCustomerView.tablePrintHistory.destroy();
                    }
                    debtCustomerView.tablePrintHistory = $('#table-printHistory').DataTable({
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
                    $.ajax({
                        url: url + 'debt-customer/transports',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            debtCustomerView.dataTransport = data['transports'];
                            debtCustomerView.dataSearch = data['transports'];
                            debtCustomerView.dataInvoiceCustomerDetail = data['invoiceCustomerDetails'];
                            debtCustomerView.dataPrintHistory = data['printHistories'];
                            debtCustomerView.dataTransportInvoice = data['transportInvoices'];
                            debtCustomerView.dataInvoiceCustomer = data['invoiceCustomers'];
                            debtCustomerView.dataSearchInvoiceCustomer = data['invoiceCustomers'];
                            debtCustomerView.invoiceCode = data['invoiceCode'];

                            debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                            debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);

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
                    debtCustomerView.renderEventRowClick();
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    defaultZero("#totalPay");
                    defaultZero("#VAT");
                    defaultZero("#hasVAT");
                    defaultZero("#paidAmt");
                },
                fillCurrentObjectToForm: function () {
                    $("input[id='invoiceCode']").val(debtCustomerView.currentInvoiceCustomer["invoiceCode"]);
                    $("input[id='totalPay']").val(debtCustomerView.currentInvoiceCustomer["totalPay"]);
                    $("input[id='totalPay']").attr('data-totalTransport', debtCustomerView.currentInvoiceCustomer["totalPay"]);
                    $("input[id='VAT']").val(debtCustomerView.currentInvoiceCustomer["VAT"]);
                    $("input[id='hasVAT']").val(debtCustomerView.currentInvoiceCustomer["hasVAT"]);

                    var exportDate = moment(debtCustomerView.currentInvoiceCustomer["exportDate"], "YYYY-MM-DD");
                    $("input[id='exportDate']").datepicker('update', exportDate.format("DD-MM-YYYY"));

                    var invoiceDate = moment(debtCustomerView.currentInvoiceCustomer["invoiceDate"], "YYYY-MM-DD");
                    $("input[id='invoiceDate']").datepicker('update', invoiceDate.format("DD-MM-YYYY"));

                    var payDate = moment(debtCustomerView.currentInvoiceCustomer["payDate"], "YYYY-MM-DD");
                    $("input[id='payDate']").datepicker('update', payDate.format("DD-MM-YYYY"));

                    $("input[id='debt']").val(debtCustomerView.currentInvoiceCustomer["debt"]);
                    $("input[id='debt-real']").val(debtCustomerView.currentInvoiceCustomer["debt"]);
                    $("input[id='paidAmt']").val(debtCustomerView.currentInvoiceCustomer["paidAmt"]);
                    $("textarea[id='note']").val(debtCustomerView.currentInvoiceCustomer["note"]);
                    formatCurrency(".currency");
                },
                fillFormDataToCurrentObject: function () {
                    debtCustomerView.currentInvoiceCustomer = {
                        id: debtCustomerView.invoiceCustomerId,
                        invoiceCode: $("input[id='invoiceCode']").val(),

                        totalTransport: asNumberFromCurrency("#totalTransport"),
                        prePaid: asNumberFromCurrency("#cashReceive"),
                        totalPay: asNumberFromCurrency("#totalPay-real"),
                        VAT: parseFloat($("input[id='VAT']").val()),
                        hasVAT: asNumberFromCurrency("#hasVAT"),
                        paidAmt: asNumberFromCurrency("#paidAmt"),

                        exportDate: $("input[id='exportDate']").val(),
                        invoiceDate: $("input[id='invoiceDate']").val(),
                        payDate: $("input[id='payDate']").val(),
                        note: $("textarea[id='note']").val(),
                        statusPrePaid: ($("#statusPrePaid").prop("checked")) ? 1 : 0
                    }
                },

                createInvoiceCustomer: function (flag, invoiceCustomer_id) {
                    if (flag == 0) {
                        var dataAfterValidate = debtCustomerView.validateListTransport();

                        //
                        debtCustomerView.status = dataAfterValidate['status'];
                        if(debtCustomerView.status === 0){
                            //Unvalid
                            $("#modal-notification").find(".modal-title").html("Cảnh báo");
                            $("#modal-notification").find(".modal-body").html(dataAfterValidate['msg']);
                            debtCustomerView.displayModal('show', '#modal-notification');
                            return;
                        }

                        $("#divInvoice").find(".titleControl").html("Tạo mới hóa đơn");
                        debtCustomerView.showControl(flag);
                        debtCustomerView.action = "new";

                        debtCustomerView.statusPrePaid = dataAfterValidate['statusPrePaid'];
                        debtCustomerView.invoiceCode = dataAfterValidate['invoiceCode'];
                        if(debtCustomerView.statusPrePaid === 0) {
//                            $("input[id=statusPrePaid]").attr('disabled', false);
//                            $("input[id=statusPrePaid]").prop('checked', false);

                            $("input[id=statusPrePaid]").attr('disabled', true);
                            $("input[id=statusPrePaid]").prop('checked', true);
                            debtCustomerView.statusPrePaid == 1;
                        } else {
                            $("input[id=statusPrePaid]").attr('disabled', true);
                            $("input[id=statusPrePaid]").prop('checked', false);
                        }

                        var _totalPay = 0;
                        var _totalPayReal = dataAfterValidate['totalPayReal'];
                        var _vat = dataAfterValidate['vat'];
                        var _hasVat = dataAfterValidate['hasVat'];
                        var _paidAmt = 0;
                        var _debtInvoice = dataAfterValidate['debtInvoice'];
                        //

                        $("input[id=invoice_id]").val('');
                        $("input[id=invoiceCode]").attr("placeholder", debtCustomerView.invoiceCode);

                        // remove readonly input
                        $("input[id=totalPay]").prop('readonly', false);
                        $("input[id=invoiceCode]").prop('readonly', false);
                        $("input[id=VAT]").prop('readonly', false);
                        $("input[id=hasVAT]").prop('readonly', false);

                        // focus
                        $("input[id=invoiceCode]").focus();
                    } else {
                        if (typeof invoiceCustomer_id === 'undefined') return;
                        $("#divInvoice").find(".titleControl").html("Chi tiết hóa đơn");
                        debtCustomerView.showControl(flag);
                        debtCustomerView.action = "edit";
                        debtCustomerView.invoiceCustomerId = invoiceCustomer_id;

                        var dataAfterValidate = debtCustomerView.validateInvoice();
                        debtCustomerView.status = dataAfterValidate['status'];

                        //
                        debtCustomerView.statusPrePaid = dataAfterValidate['statusPrePaid'];
                        debtCustomerView.invoiceCode = dataAfterValidate['invoiceCode'];

                        $("input[id=statusPrePaid]").attr('disabled', true);
                        if(debtCustomerView.statusPrePaid === 0) {
                            $("input[id=statusPrePaid]").prop('checked', false);
                        } else {
                            $("input[id=statusPrePaid]").prop('checked', true);
                        }

                        var _totalPay = dataAfterValidate['totalPay'];
                        var _totalPayReal = dataAfterValidate['totalPayReal'];
                        var _vat = dataAfterValidate['vat'];
                        var _hasVat = dataAfterValidate['hasVat'];
                        var _paidAmt = 0;
                        var _debtInvoice = dataAfterValidate['debtInvoice'];
                        //

                        //fill data to table InvoiceCustomerDetail
                        var dataDetail = _.filter(debtCustomerView.dataInvoiceCustomerDetail, function (o) {
                            return o.invoiceCustomer_id == invoiceCustomer_id;
                        });
                        if (typeof dataDetail === 'undefined') return;
                        debtCustomerView.fillDataToDatatableInvoiceCustomerDetail(dataDetail);

                        //fill data to table PrintHistory
                        var dataHistory = [];
                        for (var i = 0; i < dataDetail.length; i++) {
                            var found = _.find(debtCustomerView.dataPrintHistory, function (o) {
                                return o.invoiceCustomerDetail_id == dataDetail[i]['id'];
                            });
                            if (typeof found !== 'undefined')
                                dataHistory.push(found);
                        }
                        debtCustomerView.fillDataToDatatablePrintHistory(dataHistory);

                        // set value
                        $("input[id=invoice_id]").val(debtCustomerView.invoiceCustomerId);
                        $("input[id=invoiceCode]").val(debtCustomerView.invoiceCode);

                        // add readonly input
                        $("input[id=totalPay]").prop('readonly', true);
                        $("input[id=invoiceCode]").prop('readonly', true);
                        $("input[id=VAT]").prop('readonly', true);
                        $("input[id=hasVAT]").prop('readonly', true);

                        // focus
                        $("input[id=paidAmt]").focus();
                    }

                    var _totalTransport = dataAfterValidate['totalTransport'];
                    var _cashReceive = dataAfterValidate['prePaid'];
                    var _payNeed = dataAfterValidate['payNeed'];
                    var _debt = dataAfterValidate['debt'];
                    var _debtNotExportInvoice = dataAfterValidate['debtNotExportInvoice'];
                    var _debtExportInvoice = dataAfterValidate['debtExportInvoice'];
                    var _debtReal = dataAfterValidate['debtReal'];

                    $("input[id=totalTransport]").val(_totalTransport);
                    $("input[id=cashReceive]").val(_cashReceive);
                    $("input[id=payNeed]").val(_payNeed);
                    $("input[id=debt]").val(_debt);
                    $("input[id=debt-real]").val(_debtReal);
                    $("input[id=totalPay]").val(_totalPay);
                    $("input[id=totalPay-real]").val(_totalPayReal);
                    $("input[id=VAT]").val(_vat);
                    $("input[id=hasVAT]").val(_hasVat);
                    $("input[id=paidAmt]").val(_paidAmt);
                    $("input[id=debtInvoice]").val(_debtInvoice);
                    $("input[id=debtNotExportInvoice]").val(_debtNotExportInvoice);
                    $("input[id=debtExportInvoice]").val(_debtExportInvoice);
                    formatCurrency(".currency");
                },
                autoEditTransport: function (transportId) {
                    debtCustomerView.current = null;
                    debtCustomerView.current = _.clone(_.find(debtCustomerView.dataTransport, function (o) {
                        return o.id == transportId;
                    }), true);
                    debtCustomerView.action = 'autoEdit';
                    debtCustomerView.save();
                },
                autoEditTransportConfirm: function (transportId) {
                    debtCustomerView.current = null;
                    debtCustomerView.current = _.clone(_.find(debtCustomerView.dataTransport, function (o) {
                        return o.id == transportId;
                    }), true);

                    var transportInvoice = _.clone(_.find(debtCustomerView.dataTransportInvoice, function (o) {
                        return o.transport_id == transportId;
                    }), true);

                    if (typeof transportInvoice !== "undefined") {
                        $("#modal-notification").find(".modal-title").html("Cảnh báo");
                        $("#modal-notification").find(".modal-body").html("Đơn hàng này đã xuất hóa đơn, không được dùng chức năng trả đủ. Vui lòng thanh toán vào hóa đơn của đơn hàng này!");
                        debtCustomerView.displayModal('show', '#modal-notification');
                        return;
                    }

                    if (parseInt(debtCustomerView.current['cashRevenue']) == parseInt(debtCustomerView.current['cashReceive'])) {
                        $("#modal-notification").find(".modal-title").html("Cảnh báo");
                        $("#modal-notification").find(".modal-body").html("Đơn hàng này đã trả đủ, không thể tiếp tục thanh toán!");
                        debtCustomerView.displayModal('show', '#modal-notification');
                        return;
                    }

                    $("#modal-notification").find(".modal-title").html("Có chắc muốn trả đủ cho đơn hàng này?");
                    tr = '<div class="row">';
                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtCustomerView.autoEditTransport(' + transportId + ')">';
                    tr += 'Đồng ý';
                    tr += '</button>';
                    tr += '<button type="button" class="btn default" onclick="debtCustomerView.displayModal(\'hide\', \'#modal-notification\')">';
                    tr += 'Huỷ';
                    tr += '</button>';
                    tr += '</div>';
                    tr += '</div>';
                    $("#modal-notification").find(".modal-body").html(tr);
                    debtCustomerView.displayModal('show', '#modal-notification');
                },
                deleteInvoiceCustomer: function (invoiceCustomer_id) {
                    var sendToServer = {
                        _token: _token,
                        _invoiceCustomer_id: invoiceCustomer_id
                    };
                    console.log("CLIENT");
                    console.log(sendToServer._invoiceCustomer_id);
                    $.ajax({
                        url: url + 'invoice-customer/delete',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            debtCustomerView.dataTransport = data['transports'];
                            debtCustomerView.dataSearch = data['transports'];
                            debtCustomerView.dataInvoiceCustomerDetail = data['invoiceCustomerDetails'];
                            debtCustomerView.dataPrintHistory = data['printHistories'];
                            debtCustomerView.dataTransportInvoice = data['transportInvoices'];
                            debtCustomerView.dataInvoiceCustomer = data['invoiceCustomers'];
                            debtCustomerView.dataSearchInvoiceCustomer = data['invoiceCustomers'];
                            debtCustomerView.invoiceCode = data['invoiceCode'];

                            debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                            debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);

                            debtCustomerView.searchTransport();
                            debtCustomerView.searchInvoice();


                            //Show notification
                            showNotification("success", "Xóa hóa đơn thành công!");
                            debtCustomerView.displayModal("hide", "#modal-notification");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                deleteInvoiceCustomerConfirm: function (invoiceCustomer_id) {
                    $("#modal-notification").find(".modal-title").html("Có chắc muốn xóa hóa đơn này?");
                    tr = '<div class="row">';
                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtCustomerView.deleteInvoiceCustomer(' + invoiceCustomer_id + ')">';
                    tr += 'Đồng ý';
                    tr += '</button>';
                    tr += '<button type="button" class="btn default" onclick="debtCustomerView.displayModal(\'hide\', \'#modal-notification\')">';
                    tr += 'Huỷ';
                    tr += '</button>';
                    tr += '</div>';
                    tr += '</div>';
                    $("#modal-notification").find(".modal-body").html(tr);
                    debtCustomerView.displayModal('show', '#modal-notification');
                },
                deleteInvoiceCustomerDetail: function (invoiceCustomerDetail_id, flag) {
                    var action = 'delete1';
                    if (typeof flag !== 'undefined') {
                        action = 'delete2';
                    }
                    var sendToServer = {
                        _token: _token,
                        _action: action,
                        _invoiceCustomerDetail_id: invoiceCustomerDetail_id
                    };
                    console.log("CLIENT");
                    console.log(sendToServer._invoiceCustomerDetail_id);
                    $.ajax({
                        url: url + 'invoice-customer-detail/delete',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            if (action == 'delete1') {
                                debtCustomerView.dataTransport = data['transports'];
                                debtCustomerView.dataSearch = data['transports'];
                                debtCustomerView.dataInvoiceCustomerDetail = data['invoiceCustomerDetails'];
                                debtCustomerView.dataPrintHistory = data['printHistories'];
                                debtCustomerView.dataTransportInvoice = data['transportInvoices'];
                                debtCustomerView.dataInvoiceCustomer = data['invoiceCustomers'];
                                debtCustomerView.dataSearchInvoiceCustomer = data['invoiceCustomers'];
                                debtCustomerView.invoiceCode = data['invoiceCode'];

                                debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                                debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);
                                debtCustomerView.fillDataToDatatableInvoiceCustomerDetail(debtCustomerView.dataInvoiceCustomerDetail);

                                debtCustomerView.searchTransport();
                                debtCustomerView.searchInvoice();

                                var debtInvoice = data['arrayInput']['debtInvoice'];
                                var debtNotExportInvoice = data['arrayInput']['debtNotExportInvoice'];
                                var debtExportInvoice = data['arrayInput']['debtExportInvoice'];
                                var debtReal = data['arrayInput']['debtReal'];


                                $("input[id=debtExportInvoice]").val(debtExportInvoice);
                                $("input[id=debt-real]").val(debtReal);
                                $("input[id=debtInvoice]").val(debtInvoice);
                                $("input[id=paidAmt]").val(0);

                                //Show notification
                                showNotification("success", "Xóa chi tiết đơn hàng thành công!");
                                debtCustomerView.displayModal("hide", "#modal-notification");
                            } else {
                                debtCustomerView.dataTransport = data['transports'];
                                debtCustomerView.dataSearch = data['transports'];
                                debtCustomerView.dataInvoiceCustomerDetail = data['invoiceCustomerDetails'];
                                debtCustomerView.dataPrintHistory = data['printHistories'];
                                debtCustomerView.dataTransportInvoice = data['transportInvoices'];
                                debtCustomerView.dataInvoiceCustomer = data['invoiceCustomers'];
                                debtCustomerView.dataSearchInvoiceCustomer = data['invoiceCustomers'];
                                debtCustomerView.invoiceCode = data['invoiceCode'];

                                debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                                debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);

                                debtCustomerView.searchTransport();
                                debtCustomerView.searchInvoice();

                                //Show notification
                                showNotification("success", "Xóa chi tiết đơn hàng thành công!");
                                debtCustomerView.displayModal("hide", "#modal-notification");

                                //Close form
                                debtCustomerView.clearInput();
                                debtCustomerView.clearValidation("#frmInvoice");
                                debtCustomerView.hideControl();
                            }
                            formatCurrency(".currency");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                deleteInvoiceCustomerDetailConfirm: function (invoiceCustomerDetail_id) {
                    array_invoiceCustomerDetail_of_invoiceCustomer = _.filter(debtCustomerView.dataInvoiceCustomerDetail, function (o) {
                        return o.invoiceCustomer_id == debtCustomerView.invoiceCustomerId;
                    });
                    if (typeof array_invoiceCustomerDetail_of_invoiceCustomer === 'undefined') {
                        showNotification("error", "Có lỗi xảy ra. Vui lòng làm mới lại trình duyệt.");
                        return;
                    }
                    if (array_invoiceCustomerDetail_of_invoiceCustomer.length == 1) {
                        //Warning, delete InvoiceCustomerDetail & InvoiceCustomer
                        $("#modal-notification").find(".modal-title").html("Xóa chi tiết đơn hàng này cũng sẽ xóa hóa đơn.<br>Có chắc muốn xóa chi tiết hóa đơn này?");
                        tr = '<div class="row">';
                        tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                        tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtCustomerView.deleteInvoiceCustomerDetail(' + invoiceCustomerDetail_id + ', 1)">';
                        tr += 'Đồng ý';
                        tr += '</button>';
                        tr += '<button type="button" class="btn default" onclick="debtCustomerView.displayModal(\'hide\', \'#modal-notification\')">';
                        tr += 'Huỷ';
                        tr += '</button>';
                        tr += '</div>';
                        tr += '</div>';
                        $("#modal-notification").find(".modal-body").html(tr);
                        debtCustomerView.displayModal('show', '#modal-notification');
                    } else {
                        $("#modal-notification").find(".modal-title").html("Có chắc muốn xóa chi tiết hóa đơn này?");
                        tr = '<div class="row">';
                        tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                        tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtCustomerView.deleteInvoiceCustomerDetail(' + invoiceCustomerDetail_id + ')">';
                        tr += 'Đồng ý';
                        tr += '</button>';
                        tr += '<button type="button" class="btn default" onclick="debtCustomerView.displayModal(\'hide\', \'#modal-notification\')">';
                        tr += 'Huỷ';
                        tr += '</button>';
                        tr += '</div>';
                        tr += '</div>';
                        $("#modal-notification").find(".modal-body").html(tr);
                        debtCustomerView.displayModal('show', '#modal-notification');
                    }
                },

                validateListTransport: function () {
                    var array = $.map(debtCustomerView.table.rows('.selected').data(), function (value, index) {
                        return [value];
                    });
                    debtCustomerView.array_transportId = [];
                    debtCustomerView.array_transportId = _.map(array, 'id');

                    var array_customerId = _.map(array, 'customer_id');
                    var array_customerId = _.uniq(array_customerId);

                    if (array_customerId.length == 1 && debtCustomerView.array_transportId.length > 0) {
                        //Kiem tra xem nhung don hang nay da xuat hoa don chua
                        //Neu xuat roi thi load totalPay con lai len

                        var sendToServer = {
                            _token: _token,
                            _array_transportId: debtCustomerView.array_transportId
                        };

                        var result = null;
                        $.ajax({
                            url: url + 'debt-customer/validate',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer,
                            async: false
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 200) {
                                result = data;
                            } else if (jqXHR.status == 203) {
                                result = data;
                            } else {
                                showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                result = data;
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
                            'msg': 'Khách hàng hoặc đơn hàng không hợp lệ!'
                        };
                        return result;
                    }
                },
                validateInvoice: function () {
                    var sendToServer = {
                        _token: _token,
                        _invoiceId: debtCustomerView.invoiceCustomerId
                    };

                    var result = null;
                    $.ajax({
                        url: url + 'debt-customer/validate-invoice',
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
                },
                validateFormJquery: function () {
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
                validateForm: function () {
                    var totalPayReal = asNumberFromCurrency("#totalPay-real");
                    if(totalPayReal <= 0){
                        showNotification("warning", "Tiền xuất hóa đơn phải lớn hơn 0.");
                        return false;
                    }
                    return true;
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
                            debtCustomerView.dataTransport = data['transports'];
                            debtCustomerView.dataSearch = data['transports'];
                            debtCustomerView.dataInvoiceCustomerDetail = data['invoiceCustomerDetails'];
                            debtCustomerView.dataPrintHistory = data['printHistories'];
                            debtCustomerView.dataTransportInvoice = data['transportInvoices'];
                            debtCustomerView.dataInvoiceCustomer = data['invoiceCustomers'];
                            debtCustomerView.dataSearchInvoiceCustomer = data['invoiceCustomers'];
                            debtCustomerView.invoiceCode = data['invoiceCode'];

                            debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                            debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);

                            debtCustomerView.searchTransport();
                            debtCustomerView.searchInvoice();

                            //clear Input
                            debtCustomerView.clearInput();

                            //Show notification
                            showNotification("success", "Thanh toán thành công!");
                            debtCustomerView.displayModal("hide", "#modal-notification");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                saveInvoiceCustomer: function () {
                    debtCustomerView.validateFormJquery();
                    if ($("#frmInvoice").valid()) {
                        if(!debtCustomerView.validateForm())
                            return;

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
                            if (jqXHR.status == 201) {
                                debtCustomerView.dataTransport = data['transports'];
                                debtCustomerView.dataSearch = data['transports'];
                                debtCustomerView.dataInvoiceCustomerDetail = data['invoiceCustomerDetails'];
                                debtCustomerView.dataPrintHistory = data['printHistories'];
                                debtCustomerView.dataTransportInvoice = data['transportInvoices'];
                                debtCustomerView.dataInvoiceCustomer = data['invoiceCustomers'];
                                debtCustomerView.dataSearchInvoiceCustomer = data['invoiceCustomers'];
                                debtCustomerView.invoiceCode = data['invoiceCode'];

                                debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                                debtCustomerView.fillDataToDatatableInvoiceCustomer(debtCustomerView.dataInvoiceCustomer);
                                debtCustomerView.fillDataToDatatableInvoiceCustomerDetail(debtCustomerView.dataInvoiceCustomerDetail);

                                debtCustomerView.searchTransport();
                                debtCustomerView.searchInvoice();

                                if (debtCustomerView.action == 'new') {
                                    //clear Input
                                    debtCustomerView.clearInput();
                                    debtCustomerView.clearValidation("#frmInvoice");
                                    debtCustomerView.hideControl();

                                    //Show notification
                                    showNotification("success", "Thanh toán thành công!");
                                } else {
                                    //clear Input
                                    $("input[id=paidAmt]").val('');
                                    $("textarea[id=note]").val('');
                                    $("#paidAmt").focus();

                                    $("input[id=debtNotExportInvoice]").val(data['arrayInput']['debtNotExportInvoice']);
                                    $("input[id=debtExportInvoice]").val(data['arrayInput']['debtExportInvoice']);
                                    $("input[id=debt-real]").val(data['arrayInput']['debtReal']);
                                    $("input[id=debtInvoice]").val(data['arrayInput']['debtInvoice']);

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

                printReview: function (invoiceCustomerDetail_id) {
                    debtCustomerView.displayModal('show', '#modal-printReview');
                    console.log(invoiceCustomerDetail_id);
                },
                attachFile: function (invoiceCustomerDetail_id) {
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
                searchTransport: function (money) {
                    found = debtCustomerView.searchExportInvoice(debtCustomerView.dataTransport);

                    if (typeof money === 'undefined')
                        found = debtCustomerView.searchStatusMoney(found);
                    else
                        found = debtCustomerView.searchStatusMoney(found, money.value);

                    found = debtCustomerView.searchCustomer(found);
                    found = debtCustomerView.searchDate(found);

                    debtCustomerView.dataSearch = found;
                    debtCustomerView.table.clear().rows.add(debtCustomerView.dataSearch).draw();

                    //fill data to listSearch
                    debtCustomerView.tagsCustomerNameTransport = _.map(debtCustomerView.dataSearch, 'customers_fullName');
                    debtCustomerView.tagsCustomerNameTransport = _.union(debtCustomerView.tagsCustomerNameTransport);
                    debtCustomerView.renderAutoCompleteSearch();
                },
                searchInvoice: function () {
                    found = debtCustomerView.searchStatusMoneyInvoice(debtCustomerView.dataInvoiceCustomer);

                    found = debtCustomerView.searchCustomerInvoice(found);
                    found = debtCustomerView.searchDateInvoice(found);

                    debtCustomerView.dataSearchInvoiceCustomer = found;
                    debtCustomerView.tableInvoiceCustomer.clear().rows.add(debtCustomerView.dataSearchInvoiceCustomer).draw();

                    //fill data to listSearch
                    debtCustomerView.tagsCustomerNameInvoice = _.map(debtCustomerView.dataSearchInvoiceCustomer, 'customers_fullName');
                    debtCustomerView.tagsCustomerNameInvoice = _.union(debtCustomerView.tagsCustomerNameInvoice);
                    debtCustomerView.renderAutoCompleteSearch();
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
                searchCustomer: function (data) {
                    custName = $("#custName_transport").val();
                    if (custName == '')
                        return data;

                    found = _.filter(data, function (o) {
                        if (o.customers_fullName == null)
                            return false;
                        else
                            return removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()));
                    });
                    return found;
                },
                searchExportInvoice: function (data) {
                    var invoice = $("#invoiceUp").find("input:checked").val();
                    var found = _.filter(data, function (o) {
                        if (invoice == 'All') {
                            return true;
                        } else if (invoice == 'Invoice') {
                            return o.invoiceCode != "";
                        } else {
                            return o.invoiceCode == "";
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
                            return o.cashRevenue == o.cashReceive;
                        } else if (money == 'PrePay') {
                            return o.cashReceive != 0 && o.cashRevenue > o.cashReceive;
                        } else if (money == 'NotPay') {
                            return o.cashReceive == 0;
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
                searchCustomerInvoice: function (data) {
                    custName = $("#custName_invoice").val();
                    if (custName == '')
                        return data;

                    found = _.filter(data, function (o) {
                        return removeDiacritics(o.customers_fullName.toLowerCase()).includes(removeDiacritics(custName.toLowerCase()));
                    });
                    return found;
                },
                searchStatusMoneyInvoice: function (data) {
                    var money = $("#invoiceDown").find("input:checked").val();
                    var found = _.filter(data, function (o) {
                        if (money == 'All') {
                            return true;
                        } else if (money == 'StillDebt') {
                            if(o.statusPrePaid == 1){
                                return parseInt(o.hasVAT) > parseInt(o.totalPaid) + parseInt(o.prePaid);
                            } else {
                                return parseInt(o.hasVAT) > parseInt(o.totalPaid);
                            }
                        } else {
                            debugger;
                            if(o.statusPrePaid == 1){
                                return parseInt(o.hasVAT) == parseInt(o.totalPaid) + parseInt(o.prePaid);
                            } else {
                                return parseInt(o.hasVAT) == parseInt(o.totalPaid);
                            }
                        }
                    });
                    return found;
                },

                computeWhenChangeTotalPay: function (totalPay) {
                    var totalPay = convertStringToNumber(totalPay);
                    var statusCheck = $("#statusPrePaid").prop('checked');
                    var debtNotExportInvoice = asNumberFromCurrency("#debtNotExportInvoice");
                    var totalTransport = asNumberFromCurrency("#totalTransport");
                    var cashReceive = asNumberFromCurrency("#cashReceive");
                    var payNeed = asNumberFromCurrency("#payNeed");
                    var paidAmt = asNumberFromCurrency("#paidAmt");
                    var vat = parseFloat($("#VAT").val());
                    var invoice_id = $('#invoice_id').val();

                    if(invoice_id == ''){
                        // Tạo mới hóa đơn
                        if(totalPay > payNeed){
                            showNotification('warning', 'Số tiền xuất hóa đơn không được lớn hơn tiền cần thanh toán.');
                            totalPay = payNeed;
                        }

                        if(statusCheck) {
                            // Dùng trả trước
                            if (totalPay > debtNotExportInvoice - cashReceive) {
                                showNotification('warning', 'Số tiền xuất hóa đơn không được lớn hơn tiền cần thanh toán.');
                                totalPay = debtNotExportInvoice - cashReceive;
                            }
                            var totalPayReal = totalPay + cashReceive;
                        } else {
                            // Không dùng trả trước
                            if (totalPay > debtNotExportInvoice) {
                                showNotification('warning', 'Số tiền xuất hóa đơn không được lớn hơn tổng tiền đơn hàng.');
                                totalPay = debtNotExportInvoice;
                            }
                            var totalPayReal = totalPay;
                        }
                    } else {
                        // Xem chi tiết hóa đơn
                        var invoiceCustomer = _.find(debtCustomerView.dataInvoiceCustomer, function(o){
                            return o.id == invoice_id;
                        });
                        var ConNo = invoiceCustomer['hasVAT'] - invoiceCustomer['totalPaid'];

                        if(statusCheck) {
                            // Dùng trả trước
                            if (totalPay > ConNo - cashReceive) {
                                showNotification('warning', 'Số tiền xuất hóa đơn không được lớn hơn tiền cần thanh toán.');
                                totalPay = ConNo - cashReceive;
                            }
                            var totalPayReal = totalPay + cashReceive;
                        } else {
                            // Không dùng trả trước
                            if (totalPay > ConNo) {
                                showNotification('warning', 'Số tiền xuất hóa đơn không được lớn hơn tổng tiền đơn hàng.');
                                totalPay = ConNo;
                            }
                            var totalPayReal = totalPay;
                        }
                    }

                    var hasVat = totalPayReal + (totalPayReal * vat / 100);

                    if(statusCheck) {
                        var debtInvoice = hasVat - paidAmt - cashReceive;
                    } else {
                        var debtInvoice = hasVat - paidAmt;
                    }

                    debtInvoice = (debtInvoice < 0) ? 0 : debtInvoice;

                    $("input[id=totalPay]").val(totalPay);
                    $("input[id=totalPay-real]").val(totalPayReal);
                    $("input[id=hasVAT]").val(hasVat);
                    $("input[id=debtInvoice]").val(debtInvoice);
                    formatCurrency(".currency");
                },
                computeWhenChangeVat: function (vat) {
                    if (vat == '')
                        vat = 0;

                    var totalPayReal = asNumberFromCurrency("#totalPay-real");
                    var paidAmt = asNumberFromCurrency("#paidAmt");
                    var cashReceive = asNumberFromCurrency("#cashReceive");

                    var hasVat = totalPayReal + (totalPayReal * vat / 100);

                    if(debtCustomerView.statusPrePaid === 1) {
                        var debtInvoice = hasVat - paidAmt - cashReceive;
                    } else {
                        var debtInvoice = hasVat - paidAmt;
                    }
                    debtInvoice = (debtInvoice < 0) ? 0 : debtInvoice;

                    $("input[id=hasVAT]").val(hasVat);
                    $("input[id=debtInvoice]").val(debtInvoice);
                    formatCurrency(".currency");
                },
                computeWhenChangeHasVat: function (hasVat) {
                    hasVat = convertStringToNumber(hasVat);

                    var totalPayReal = asNumberFromCurrency("#totalPay-real");
                    var paidAmt = asNumberFromCurrency("#paidAmt");
                    var cashReceive = asNumberFromCurrency("#cashReceive");

                    var vat = (hasVat - totalPayReal) * 100 / totalPayReal;

                    if(debtCustomerView.statusPrePaid === 1) {
                        var debtInvoice = hasVat - paidAmt - cashReceive;
                    } else {
                        var debtInvoice = hasVat - paidAmt;
                    }
                    debtInvoice = (debtInvoice < 0) ? 0 : debtInvoice;


                    $("input[id=VAT]").val(vat);
                    $("input[id=debtInvoice]").val(debtInvoice);
                    formatCurrency(".currency");
                },
                computeWhenChangePaidAmt: function (paidAmt) {
                    paidAmt = convertStringToNumber(paidAmt);
                    var invoice_id = $("#invoice_id").val();
                    var statusCheck = $("#statusPrePaid").prop('checked');
                    var cashReceive = asNumberFromCurrency("#cashReceive");
                    var hasVat = asNumberFromCurrency("#hasVAT");

                    if(invoice_id == ''){
                        if(statusCheck) {
                            var debtInvoice = hasVat - paidAmt - cashReceive;
                            var debtInvoiceRoot = hasVat - cashReceive;
                        } else {
                            var debtInvoice = hasVat - paidAmt;
                            var debtInvoiceRoot = hasVat;
                        }

                        if(paidAmt > debtInvoiceRoot){
                            paidAmt = debtInvoiceRoot;
                        }
                    } else {
                        var dataDetail = _.filter(debtCustomerView.dataInvoiceCustomerDetail, function(o){
                           return o.invoiceCustomer_id == invoice_id;
                        });
                        var dataDetail_map = _.map(dataDetail, 'paidAmt');
                        dataDetail_map = dataDetail_map.map(Number);
                        var dataDetail_sum = _.sum(dataDetail_map);

                        if(statusCheck) {
                            if(paidAmt > hasVat - dataDetail_sum - cashReceive){
                                paidAmt = hasVat - dataDetail_sum - cashReceive;
                            }
                            var debtInvoice = hasVat - (dataDetail_sum + paidAmt) - cashReceive;
                        } else {
                            if(paidAmt > hasVat - dataDetail_sum){
                                paidAmt = hasVat - dataDetail_sum;
                            }
                            var debtInvoice = hasVat - (dataDetail_sum + paidAmt);
                        }
                    }

                    debtInvoice = (debtInvoice < 0) ? 0 : debtInvoice;

                    $("input[id=paidAmt]").val(paidAmt);
                    $("input[id=debtInvoice]").val(debtInvoice);
                    formatCurrency(".currency");
                }
            };
            debtCustomerView.loadData();
        } else {
            debtCustomerView.loadData();
        }
    });
</script>
