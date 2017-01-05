<style>
    #divInvoice {
        z-index: 3;
        position: fixed;
        top: 30%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divDebtVerb {
        z-index: 3;
        position: fixed;
        top: 30%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divInvoice .panel-body {
        height: 430px;
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
                        <div class="btn btn-primary btn-circle btn-md" title="Tạo phiếu thanh toán"
                             onclick="debtGarageView.createInvoiceGarage(0)">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
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
                            <span class="label label-success" style="font-size: 1em;">Đã trả đủ</span>
                            <span class="label label-info" style="font-size: 1em;">Đã xuất hóa đơn</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5" id="dateSearchTransport">
                            <div class="ui-widget" style="padding-top:8px">
                                <input type="text" class="date start"/> đến
                                <input type="text" class="date end"/>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="ui-widget">
                                <input type="text" class="form-control" id="fullNumber_transport"
                                       name="fullNumber_transport" placeholder="Nhập số xe">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="row">
                                <div class="col-md-12">
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
                                <table class="table table-bordered table-striped table-hover" id="table-data">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã</th>
                                        <th>STT</th>
                                        <th>Số xe</th>
                                        <th>Nhà xe</th>
                                        <th>Mã phiếu thanh toán</th>
                                        <th>Nơi giao</th>
                                        <th>Số chứng từ</th>
                                        <th>Giao xe</th>
                                        <th>Nợ</th>
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
                    {{--Chi phí xe--}}
                    <hr>
                    <p class="lead text-primary text-left"><strong>Chi phí xe</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchVehicleCost">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fullNumber_cost" name="fullNumber_cost"
                                   placeholder="Nhập số xe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="radio" id="costDown">
                                <label style="margin-right: 10px"><input type="radio" name="rdoCost" checked
                                                                         value="All">Tất cả</label>
                                <label style="margin-right: 10px"><input type="radio" name="rdoCost"
                                                                         value="StillDebt">Còn nợ</label>
                                <label><input type="radio" name="rdoCost" value="FullPay">Trả đủ</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio">
                                <button onclick="debtGarageView.searchVehicleCost()" id="btnSearchInvoice"
                                        class="btn btn-sm btn-info marginRight"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button class="btn btn-sm btn-default"
                                        onclick="debtGarageView.clearSearch('vehicleCost')">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" id="table-transportCost">
                                    <thead>
                                    <tr class="active">
                                        <th>Số xe</th>
                                        <th>Nhà xe</th>
                                        <th>Phí thay nhớt</th>
                                        <th>Phí đổ xăng</th>
                                        <th>Phí Đậu bãi</th>
                                        <th>Phí khác</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    {{--Phiếu Thanh Toán--}}
                    <hr>
                    <p class="lead text-primary text-left"><strong>Phiếu thanh toán</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchInvoice">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fullNumber_invoice" name="fullNumber_invoice"
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
                                <table class="table table-bordered  table-striped table-hover" id="table-garageInvoice">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã phiếu</th>
                                        <th>Số xe</th>
                                        <th>Nhà xe</th>
                                        <th>Đã thanh toán</th>
                                        <th>Còn nợ</th>
                                        <th>Người nhận</th>
                                        <th>Người tạo</th>
                                        <th>Ngày tạo</th>
                                        <th>Thanh toán</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    {{--Tra tien mat--}}
                    <hr>
                    <p class="lead text-primary text-left"><strong>Thanh toán tiền mặt</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchInvoice">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fullNumber_invoice" name="fullNumber_invoice"
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
                                <table class="table table-bordered  table-striped table-hover" id="table-debtTransport">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã</th>
                                        <th>STT</th>
                                        <th>Số xe</th>
                                        <th>Nhà xe</th>
                                        <th>Mã phiếu thanh toán</th>
                                        <th>Nơi giao</th>
                                        <th>Số chứng từ</th>
                                        <th>Đã thanh toán</th>
                                        <th>Người nhận</th>
                                        <th>Người tạo</th>
                                        <th>Người sửa</th>
                                        <th>Ngày thanh toán</th>
                                        <th>Thanh toán</th>
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
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" onclick="
                                debtGarageView.clearInput();
                                debtGarageView.deselectAll();
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
                                            <label for="invoiceCode"><b>Mã phiếu thanh toán</b></label>
                                            <input type="text" class="form-control"
                                                   id="invoiceCode"
                                                   name="invoiceCode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="totalTransport"><b>Tổng tiền</b></label>
                                            <input type="text" class="form-control currency" readonly
                                                   id="totalTransport" name="totalTransport">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debt"><b>Còn nợ lại</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="debt" name="debt" readonly>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4" hidden>--}}
                                    {{--<div class="form-group form-md-line-input ">--}}
                                    {{--<label for="debt-real"><b>Còn nợ</b></label>--}}
                                    {{--<input type="text" class="form-control currency"--}}
                                    {{--id="debt-real" name="debt-real" readonly>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
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
                                            <label for="sendToPerson"><b>Người nhận</b></label>
                                            <input type="text" id="sendToPerson" name="sendToPerson"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="exportDate"><b>Ngày xuất</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="exportDate"
                                                   name="exportDate">
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4" hidden>--}}
                                    {{--<div class="form-group form-md-line-input ">--}}
                                    {{--<label for="prePaid"><b>Trả trước</b></label>--}}
                                    {{--<input type="text" class="form-control currency"--}}
                                    {{--id="prePaid"--}}
                                    {{--name="prePaid" readonly>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="invoiceDate"><b>Ngày phiếu thanh toán</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="invoiceDate"
                                                   name="invoiceDate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                                <button id="button" type="button" class="btn btn-primary marginRight"
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End divInvoice -->


<!-- Begin divDebtVerb -->
<div class="row">
    <div id="divDebtVerb" class="col-md-offset-2 col-md-10">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" onclick="
                                debtGarageView.clearInput();
                                debtGarageView.deselectAll();
                                debtGarageView.clearValidation('#frmInvoice');
                                debtGarageView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6" id="frm-control-debtVerb">
                        <form role="form" id="frmDebtVerb">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="invoiceCode"><b>Mã phiếu thanh toán</b></label>
                                            <input type="text" class="form-control"
                                                   id="invoiceCode"
                                                   name="invoiceCode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="totalTransport"><b>Tổng tiền</b></label>
                                            <input type="text" class="form-control currency" readonly
                                                   id="totalTransport" name="totalTransport">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debt"><b>Còn nợ lại</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="debt" name="debt" readonly>
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
                                            <label for="sendToPerson"><b>Người nhận</b></label>
                                            <input type="text" id="sendToPerson" name="sendToPerson"
                                                   class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="exportDate"><b>Ngày xuất</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="exportDate"
                                                   name="exportDate">
                                        </div>
                                    </div>
                                    {{--<div class="col-md-4" hidden>--}}
                                    {{--<div class="form-group form-md-line-input ">--}}
                                    {{--<label for="prePaid"><b>Trả trước</b></label>--}}
                                    {{--<input type="text" class="form-control currency"--}}
                                    {{--id="prePaid"--}}
                                    {{--name="prePaid" readonly>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="invoiceDate"><b>Ngày phiếu thanh toán</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="invoiceDate"
                                                   name="invoiceDate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                                <button id="button" type="button" class="btn btn-primary marginRight"
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
                    <h5 class="modal-title" style="padding-bottom: 0"></h5>
                </div>
                <div class="modal-body" style="padding-top: 0; font-size: 15px">

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
                    <h5 class="modal-title" style="padding-bottom: 0"></h5>
                </div>
                <div class="modal-body" style="padding-top: 0; font-size: 15px">

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
                tableTransportCost: null,
                tableInvoiceGarage: null,
                tableDebtTransport: null,


              //  tableInvoiceGarageDetail: null,


                // tablePrintHistory: null,

                dataTransport: null,
                dataVehicleCost: null,
                dataInvoiceGarage: null,
                dataDebtTransport: null,


                dataInvoiceGarageDetail: null,
                dataPrintHistory: null,
                dataTransportInvoice: null,
                dataSearch: null,
                dataSearchInvoiceGarage: null,
                dataSearchVehicleCost: null,

                action: null, //new, edit, autoEdit
                current: null, //for autoEdit
                currentInvoiceGarage: null, //for new & edit
                invoiceGarageId: null, //for edit
                array_transportId: [], //array_transportId of InvoiceGarage current
                invoiceCode: null, //Get invoiceCode newest form Server

                tagsFullNumberTransport: [], //for search
                tagsFullNumberInvoice: [], //for search
                tagsFullNumberCost: [], //for search

                showControl: function (flag) {
                    if (flag == 0) {
                        $('#divInvoice').css("width", "40%");
                        $("#tbl-history").hide();
                        $("#frm-control").removeClass("col-md-6").addClass("col-md-12");
                        $('#divInvoice').fadeIn(300);
                    } else  {
                        $('#divDebtVerb').css("width", "40%");
                        $("#tbl-history").hide();
                        $("#frm-control-debtVerb").removeClass("col-md-6").addClass("col-md-12");
                        $('#divDebtVerb').fadeIn(300);
                    }
                    $('.menu-toggle').fadeOut();


                },
                hideControl: function () {
                    $('#divInvoice').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    $('#divDebtVerb').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);

                    //Clear Validate
                },
                clearInput: function () {
                    $("input[id='invoiceCode']").val('');
                    $("input[id='sendToPerson']").val('');
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
                    $('#dateSearchVehicleCost .date').datepicker({
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
                    $("#fullNumber_transport").autocomplete({
                        source: debtGarageView.tagsFullNumberTransport
                    });
                    $("#fullNumber_invoice").autocomplete({
                        source: debtGarageView.tagsFullNumberInvoice
                    });
                    $("#fullNumber_cost").autocomplete({
                        source: debtGarageView.tagsFullNumberCost
                    });
                },
                renderEventKeyCode: function () {
                    $("#fullNumber_transport").keyup(function (event) {
                        if (event.keyCode == 13) { //Enter
                            $("#btnSearchTransport").click();
                        }
                    });

                    $("#fullNumber_invoice").keyup(function (event) {
                        if (event.keyCode == 13) { //Enter
                            $("#btnSearchInvoice").click();
                        }
                    });
                },
                renderEventRowClick: function () {
                    $("#table-data").find("tbody").on('click', 'tr td', function () {
                        var td = $(this);
                        var tr = $(this).parent();
                        if (tr.find('td:eq(1)').text() == td.text()) {
                            $("input[id=fullNumber_transport]").val(td.text());
                            // debtGarageView.searchTransport();
                            debtGarageView.selectAll();
                        }
                    });

                    $("#table-garageInvoice").find("tbody").on('click', 'tr td', function () {
                        var td = $(this);
                        var tr = $(this).parent();
                        if (tr.find('td:eq(0)').text() == td.text()) {
                            $("input[id=fullNumber_invoice]").val(td.text());
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
                            debtGarageView.dataDebtTransport = data['debtTransports'];
                            debtGarageView.invoiceCode = data['invoiceCode'];
                            debtGarageView.dataVehicleCost = data['vehicleCost'];
                            debtGarageView.dataInvoiceGarage = data['invoiceGarages'];
                            debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);
                            debtGarageView.fillDataToDatatableTransportCost(debtGarageView.dataVehicleCost);
                            debtGarageView.fillDataToDatatableInvoiceGarage(debtGarageView.dataInvoiceGarage);
                            debtGarageView.fillDataToDatatableDebtTransport(debtGarageView.dataDebtTransport);

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
                    defaultZero("#paidAmt");
                },
//                table - transport
                fillDataToDatatable: function (data) {
                    if (debtGarageView.table != null)
                        debtGarageView.table.destroy();

                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                        data[i].debt = parseInt(data[i]['cashDelivery']) - parseInt(data[i]['cashPreDelivery']);

                        var transportInvoice = _.filter(debtGarageView.dataTransportInvoice, function (o) {
                            return o.transport_id == data[i]['id'];
                        });

                        if (transportInvoice.length > 0) {
                            transportInvoice = _.map(transportInvoice, 'invoiceGarage_id');
                            var invoice = _.filter(debtGarageView.dataInvoiceGarage, function (o) {
                                return _.includes(transportInvoice, o.id);
                            });
                            if (invoice.length > 0) {
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
                        data[i].stt = i + 1;
                    }
                    debtGarageView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {
                                data: 'stt'
                            },
                            {data: 'fullNumber'},
                            {data: 'garages_name'},
                            {
                                data: 'invoiceCode',
                                visible: false
                            },

                            {data: 'deliveryPlace'},
                            {
                                data: 'voucherNumber'
                            },
                            {
                                data: 'cashDelivery',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'debt',
                                render: $.fn.dataTable.render.number(",", ".", 0)

                            },
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
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += "<div class='btn btn-circle btn-danger' title='Click để trả đủ' onclick='debtGarageView.autoEditTransportConfirm(" + full.id + ")'>";
                                    tr += '<i class="fa fa-usd" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        responsive: true,
                        columnDefs: [
                            {responsivePriority: 1, targets: 1},
                            {responsivePriority: 1, targets: 2},
                            {responsivePriority: 1, targets: 3},
                            {responsivePriority: 1, targets: 4},
                            {responsivePriority: 1, targets: 5},
                            {responsivePriority: 1, targets: 6},
                            {responsivePriority: 1, targets: 7},
                            {responsivePriority: 1, targets: 8},
                            {responsivePriority: 1, targets: 9},
                            {responsivePriority: 1, targets: 10},
                            {responsivePriority: 10, targets: 11},
                            {responsivePriority: 1, targets: 12},
                            {responsivePriority: 1, targets: 13},
                        ],
                        order: [[1, "asc"]],
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
                },

//                table - chi phi xe
                fillDataToDatatableTransportCost: function (data) {
                    if (debtGarageView.tableTransportCost != null)
                        debtGarageView.tableTransportCost.destroy();
//                    for (var i = 0; i < data.length; i++) {
//                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
//
//                    }
                    debtGarageView.tableTransportCost = $('#table-transportCost').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullNumber'},
                            {data: 'garageName'},
                            {
                                data: 'cost',
                                render: function (data, type, full, meta) {
                                    return (full.price_id == 3) ? full.cost : "0";
                                }

                            },
                            {
                                data: 'cost',
                                render: function (data, type, full, meta) {
                                    return (full.price_id == 2) ? full.cost : "0";
                                }

                            },
                            {
                                data: 'cost',
                                render: function (data, type, full, meta) {
                                    return (full.price_id == 4) ? full.cost : "0";
                                }

                            },
                            {
                                data: 'cost',
                                render: function (data, type, full, meta) {
                                    return (full.price_id == 1) ? full.cost : "0";
                                }

                            },
                            {data: 'note'}
                        ]
                    });
                    $("#table-transportCost").css("width", "auto");
                },

//                table - phiếu thanh toán
                fillDataToDatatableInvoiceGarage: function (data) {
                    if (debtGarageView.tableInvoiceGarage != null)
                        debtGarageView.tableInvoiceGarage.destroy();
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                    }
                    debtGarageView.tableInvoiceGarage = $('#table-garageInvoice').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'invoiceCode'},
                            {data: 'fullNumber'},
                            {data: 'garages_name'},
                            {data: 'paidAmt',
                                render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'debt',
                                render: $.fn.dataTable.render.number(",", ".", 0)},
                            {data: 'sendToPerson'},
                            {data: 'users_createdBy'},
                            {data: 'exportDate'},
                            {
                                render: function (data, type, full, meta) {
                                    var color = 'btn-default';
                                    var text = '';
                                    if (full.debt != 0) {
                                        color = 'btn-danger';
                                        text = 'Click để trả đủ';
                                    }
                                    else if (full.debt == 0) {
                                        color = 'btn-success';
                                        text = 'Đã trả đủ';
                                    }
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += "<div class='btn btn-circle " + color + "' title='" + text + "' onclick='debtGarageView.debtVerb(" + full.id + ")'>";
                                    tr += '<i class="fa fa-usd" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;

                                }
                            }
                        ]
                    });
                    $("#table-garageInvoice").css("width", "auto");
                },

//                table - tra đủ
                fillDataToDatatableDebtTransport: function (data) {
                    if (debtGarageView.tableDebtTransport != null)
                        debtGarageView.tableDebtTransport.destroy();

                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                        data[i].debt = parseInt(data[i]['cashDelivery']) - parseInt(data[i]['cashPreDelivery']);

                        var transportInvoice = _.filter(debtGarageView.dataTransportInvoice, function (o) {
                            return o.transport_id == data[i]['id'];
                        });

                        if (transportInvoice.length > 0) {
                            transportInvoice = _.map(transportInvoice, 'invoiceGarage_id');
                            var invoice = _.filter(debtGarageView.dataInvoiceGarage, function (o) {
                                return _.includes(transportInvoice, o.id);
                            });
                            if (invoice.length > 0) {
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
                        data[i].stt = i + 1;
                    }
                    debtGarageView.tableDebtTransport = $('#table-debtTransport').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {
                                data: 'stt'
                            },
                            {data: 'fullNumber'},
                            {data: 'garages_name'},
                            {
                                data: 'invoiceCode',
                                visible: false
                            },

                            {data: 'deliveryPlace'},
                            {
                                data: 'voucherNumber'
                            },
                            {
                                data: 'cashDelivery',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },

                            {data: 'receiver'},
                            {data: 'users_createdBy'},
                            {data: 'users_updatedBy',visible: false},
                            {
                                data: 'updated_at',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var color = 'btn-default';
                                    var text = '';

                                    if (full.cashPreDelivery == 0 && full.invoiceCode == "") {
                                        color = 'btn-danger';
                                        text = 'Click để trả đủ';
                                    }
                                    else if (full.cashPreDelivery == full.cashDelivery && full.invoiceCode == "") {
                                        color = 'btn-success';
                                        text = 'Đã trả đủ';
                                    }
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += "<div class='btn btn-circle " + color + "' title='" + text + "' onclick='debtGarageView.autoEditTransportConfirm(" + full.id + ")'>";
                                    tr += '<i class="fa fa-usd" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                },
                                visible: false
                            }
                        ],
                        order: [[1, "asc"]],
                        dom: 'TBfrtip',
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
                        ],

                    });
                    $("#table-debtTransport").css("width", "auto");
                },
                debtVerb:function (id) {
                    var flag = 1;
                    $("#divDebtVerb").find(".titleControl").html("Cập nhật phiếu thanh toán");

                    debtGarageView.showControl(flag);
                    debtGarageView.action = "new";
                },

                computeDebt: function (paidAmt) {
                    paidAmt = convertStringToNumber(paidAmt);
                    var totalTransport = asNumberFromCurrency("#totalTransport");
                    if (paidAmt > totalTransport) {
                        showNotification('warning', 'Số tiền trả không được lớn hơn tiền còn nợ.');
                        $("input[id='debt']").val(0);
                        $("#button").prop("disabled", true);
                    } else {
                        var debt = totalTransport - paidAmt;
                        $("input[id=debt]").val(debt);
                        $("#button").prop("disabled", false);
                    }

                    formatCurrency(".currency");
                },
                fillFormDataToCurrentObject: function () {
                    debtGarageView.currentInvoiceGarage = {
                        id: debtGarageView.invoiceGarageId,
                        invoiceCode: $("input[id='invoiceCode']").val(),
                        totalTransport: asNumberFromCurrency("#totalTransport"),
                        debt: asNumberFromCurrency("#debt"),
                        paidAmt: asNumberFromCurrency("#paidAmt"),
                        sendToPerson: $("input[id=sendToPerson]").val(),
                        exportDate: $("input[id='exportDate']").val(),
                        invoiceDate: $("input[id='invoiceDate']").val(),
                        payDate: $("input[id='payDate']").val(),
                        note: $("textarea[id='note']").val()
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
                            'msg': 'Vui lòng chọn đơn hàng !'
                        };
                        return result;
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
                        $("#divInvoice").find(".titleControl").html("Tạo phiếu thanh toán");
                        debtGarageView.showControl(flag);
                        debtGarageView.action = "new";
                        var prePaid = 0;
                        var totalPay = 0;

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
                            $("input[id=totalTransport]").val(totalPay);
                            $("input[id=prePaid]").val(prePaid);
                            debt = totalPay - prePaid;
                            $("input[id=debt]").val(debt);
                            $("input[id=debt-real]").val(debt);
                        }
                        $("input[id=invoiceCode]").attr("placeholder", debtGarageView.invoiceCode);
                        //set default value
                        $("input[id=paidAmt]").val(0);
                        //remove readly input
                        $("input[id=invoiceCode]").prop('readonly', false);
                        $("input[id=invoiceCode]").focus();
// else if (dataAfterValidate['status'] === 2) { //Exported
//                            alert('2');
//                            $("input[id=totalTransport]").val(totalPay);
//                            totalPay = dataAfterValidate['totalPay'];
//                            $("input[id=totalPay]").val(totalPay);
//                            $("input[id=prePaid]").val(prePaid);
//
//                            $("input[id=debt]").val(totalPay);
//                            $("input[id=debt-real]").val(totalPay);
//                        }
                    }
                    formatCurrency(".currency");
                },
//                createInvoiceGarage: function (flag, invoiceGarage_id) {
//                    if (flag == 0) {
//                        var dataAfterValidate = debtGarageView.validateListTransport();
//                        if (dataAfterValidate['status'] === 0) {
//                            $("#modal-notification").find(".modal-title").html("Cảnh báo");
//                            $("#modal-notification").find(".modal-body").html(dataAfterValidate['msg']);
//                            debtGarageView.displayModal('show', '#modal-notification');
//                            return;
//                        }
//                        $("#divInvoice").find(".titleControl").html("Tạo phiếu thanh toán");
//                        debtGarageView.showControl(flag);
//                        debtGarageView.action = "new";
//                        var prePaid = 0;
//                        var totalPay = 0;
//
//                        for (var i = 0; i < debtGarageView.array_transportId.length; i++) {
//                            var currentRow = _.find(debtGarageView.dataTransport, function (o) {
//                                return o.id == debtGarageView.array_transportId[i];
//                            });
//                            if (typeof currentRow !== 'undefined') {
//                                totalPay += parseInt(currentRow['cashDelivery']);
//                                prePaid += parseInt(currentRow['cashPreDelivery']);
//                            }
//                        }
//                        if (dataAfterValidate['status'] === 1) { //First
//                            $("input[id=totalTransport]").val(totalPay);
//                            $("input[id=prePaid]").val(prePaid);
//                            debt = totalPay - prePaid;
//                            $("input[id=debt]").val(debt);
//                            $("input[id=debt-real]").val(debt);
//                        }
//                        $("input[id=invoiceCode]").attr("placeholder", debtGarageView.invoiceCode);
//                        //set default value
//                        $("input[id=paidAmt]").val(0);
//                        //remove readly input
//                        $("input[id=invoiceCode]").prop('readonly', false);
//                        $("input[id=invoiceCode]").focus();
//// else if (dataAfterValidate['status'] === 2) { //Exported
////                            alert('2');
////                            $("input[id=totalTransport]").val(totalPay);
////                            totalPay = dataAfterValidate['totalPay'];
////                            $("input[id=totalPay]").val(totalPay);
////                            $("input[id=prePaid]").val(prePaid);
////
////                            $("input[id=debt]").val(totalPay);
////                            $("input[id=debt-real]").val(totalPay);
////                        }
//                    }
//                    formatCurrency(".currency");
//                },
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

                    $("#modal-notification").find(".modal-title").html("Có chắc muốn trả đủ cho đơn hàng này không?");
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
//                deleteInvoiceGarage: function (invoiceGarage_id) {
//                    var sendToServer = {
//                        _token: _token,
//                        _invoiceGarage_id: invoiceGarage_id
//                    };
//                    $.ajax({
//                        url: url + 'invoice-garage/delete',
//                        type: "POST",
//                        dataType: "json",
//                        data: sendToServer
//                    }).done(function (data, textStatus, jqXHR) {
//                        if (jqXHR.status == 201) {
//                            debtGarageView.dataTransport = data['transports'];
//                            debtGarageView.dataSearch = data['transports'];
//                            debtGarageView.dataInvoiceGarage = data['invoiceGarages'];
//                            debtGarageView.dataSearchInvoiceGarage = data['invoiceGarages'];
//                            debtGarageView.dataInvoiceGarageDetail = data['invoiceGarageDetails'];
//                            debtGarageView.dataPrintHistory = data['printHistories'];
//                            debtGarageView.dataTransportInvoice = data['transportInvoices'];
//                            debtGarageView.invoiceCode = data['invoiceCode'];
//
//                            debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);
//                            debtGarageView.fillDataToDatatableInvoiceGarage(debtGarageView.dataInvoiceGarage);
//
//                            debtGarageView.searchTransport();
//                            debtGarageView.searchInvoice();
//
//                            //Show notification
//                            showNotification("success", "Xóa hóa đơn thành công!");
//                            debtGarageView.displayModal("hide", "#modal-notification");
//                        } else {
//                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
//                        }
//                    }).fail(function (jqXHR, textStatus, errorThrown) {
//                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
//                    });
//                },
//                deleteInvoiceGarageConfirm: function (invoiceGarage_id) {
//                    $("#modal-notification").find(".modal-title").html("Có chắc muốn xóa hóa đơn này?");
//                    tr = '<div class="row">';
//                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
//                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.deleteInvoiceGarage(' + invoiceGarage_id + ')">';
//                    tr += 'Đồng ý';
//                    tr += '</button>';
//                    tr += '<button type="button" class="btn default" onclick="debtGarageView.displayModal(\'hide\', \'#modal-notification\')">';
//                    tr += 'Huỷ';
//                    tr += '</button>';
//                    tr += '</div>';
//                    tr += '</div>';
//                    $("#modal-notification").find(".modal-body").html(tr);
//                    debtGarageView.displayModal('show', '#modal-notification');
//                },
//                deleteInvoiceGarageDetail: function (invoiceGarageDetail_id, flag) {
//                    var action = 'delete1';
//                    if (typeof flag !== 'undefined') {
//                        action = 'delete2';
//                    }
//                    var sendToServer = {
//                        _token: _token,
//                        _action: action,
//                        _invoiceGarageDetail_id: invoiceGarageDetail_id
//                    };
//
//                    $.ajax({
//                        url: url + 'invoice-garage-detail/delete',
//                        type: "POST",
//                        dataType: "json",
//                        data: sendToServer
//                    }).done(function (data, textStatus, jqXHR) {
//
//                        if (jqXHR.status == 201) {
//                            if (action == 'delete1') {
//                                var invoiceDetail = _.find(debtGarageView.dataInvoiceGarageDetail, function (o) {
//                                    return o.id == invoiceGarageDetail_id;
//                                });
//
//                                debtGarageView.dataTransport = data['transports'];
//                                debtGarageView.dataSearch = data['transports'];
//                                debtGarageView.dataInvoiceGarage = data['invoiceGarages'];
//                                debtGarageView.dataSearchInvoiceGarage = data['invoiceGarages'];
//                                debtGarageView.dataInvoiceGarageDetail = data['invoiceGarageDetails'];
//                                debtGarageView.dataPrintHistory = data['printHistories'];
//                                debtGarageView.dataTransportInvoice = data['transportInvoices'];
//                                debtGarageView.invoiceCode = data['invoiceCode'];
//
//                                debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);
//                                debtGarageView.fillDataToDatatableInvoiceGarage(debtGarageView.dataInvoiceGarage);
//
//                                var dataDetail = _.filter(debtGarageView.dataInvoiceGarageDetail, function (o) {
//                                    return o.invoiceGarage_id == invoiceDetail.invoiceGarage_id;
//                                });
//                                debtGarageView.fillDataToDatatableInvoiceGarageDetail(dataDetail);
//
//                                debtGarageView.searchTransport();
//                                debtGarageView.searchInvoice();
//
//                                var invoice = _.find(debtGarageView.dataInvoiceGarage, function (o) {
//                                    return o.id == invoiceDetail.invoiceGarage_id;
//                                });
//
//                                var debtReal = invoice.hasVat - invoice.totalPaid;
//                                $("input[id=debt]").val(debtReal);
//                                $("input[id=debt-real]").val(debtReal);
//
//                                //Show notification
//                                showNotification("success", "Xóa chi tiết đơn hàng thành công!");
//                                debtGarageView.displayModal("hide", "#modal-notification");
//                            } else {
//                                debtGarageView.dataTransport = data['transports'];
//                                debtGarageView.dataSearch = data['transports'];
//                                debtGarageView.dataInvoiceGarage = data['invoiceGarages'];
//                                debtGarageView.dataSearchInvoiceGarage = data['invoiceGarages'];
//                                debtGarageView.dataInvoiceGarageDetail = data['invoiceGarageDetails'];
//                                debtGarageView.dataPrintHistory = data['printHistories'];
//                                debtGarageView.dataTransportInvoice = data['transportInvoices'];
//                                debtGarageView.invoiceCode = data['invoiceCode'];
//
//                                debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);
//                                debtGarageView.fillDataToDatatableInvoiceGarage(debtGarageView.dataInvoiceGarage);
//
//                                debtGarageView.searchTransport();
//                                debtGarageView.searchInvoice();
//
//                                //Show notification
//                                showNotification("success", "Xóa chi tiết đơn hàng thành công!");
//                                debtGarageView.displayModal("hide", "#modal-notification");
//
//                                //Close form
//                                debtGarageView.clearInput();
//                                debtGarageView.clearValidation("#frmInvoice");
//                                debtGarageView.hideControl();
//                            }
//                            formatCurrency(".currency");
//                        } else {
//                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
//                        }
//                    }).fail(function (jqXHR, textStatus, errorThrown) {
//                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
//                    });
//                },
//                deleteInvoiceGarageDetailConfirm: function (invoiceGarageDetail_id) {
//                    array_invoiceGarageDetail_of_invoiceGarage = _.filter(debtGarageView.dataInvoiceGarageDetail, function (o) {
//                        return o.invoiceGarage_id == debtGarageView.invoiceGarageId;
//                    });
//                    if (typeof array_invoiceGarageDetail_of_invoiceGarage === 'undefined') {
//                        showNotification("error", "Có lỗi xảy ra. Vui lòng làm mới lại trình duyệt.");
//                        return;
//                    }
//                    if (array_invoiceGarageDetail_of_invoiceGarage.length == 1) {
//                        //Warning, delete InvoiceGarageDetail & InvoiceGarage
//                        $("#modal-notification").find(".modal-title").html("Xóa chi tiết đơn hàng này cũng sẽ xóa hóa đơn.<br>Có chắc muốn xóa chi tiết hóa đơn này?");
//                        tr = '<div class="row">';
//                        tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
//                        tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.deleteInvoiceGarageDetail(' + invoiceGarageDetail_id + ', 1)">';
//                        tr += 'Đồng ý';
//                        tr += '</button>';
//                        tr += '<button type="button" class="btn default" onclick="debtGarageView.displayModal(\'hide\', \'#modal-notification\')">';
//                        tr += 'Huỷ';
//                        tr += '</button>';
//                        tr += '</div>';
//                        tr += '</div>';
//                        $("#modal-notification").find(".modal-body").html(tr);
//                        debtGarageView.displayModal('show', '#modal-notification');
//                    } else {
//                        $("#modal-notification").find(".modal-title").html("Có chắc muốn xóa chi tiết hóa đơn này?");
//                        tr = '<div class="row">';
//                        tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
//                        tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.deleteInvoiceGarageDetail(' + invoiceGarageDetail_id + ')">';
//                        tr += 'Đồng ý';
//                        tr += '</button>';
//                        tr += '<button type="button" class="btn default" onclick="debtGarageView.displayModal(\'hide\', \'#modal-notification\')">';
//                        tr += 'Huỷ';
//                        tr += '</button>';
//                        tr += '</div>';
//                        tr += '</div>';
//                        $("#modal-notification").find(".modal-body").html(tr);
//                        debtGarageView.displayModal('show', '#modal-notification');
//                    }
//                },

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
                        $.ajax({
                            url: url + 'invoice-garage/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                debtGarageView.dataTransport = data['transports'];
                                debtGarageView.dataDebtTransport = data['debtTransports'];
                                debtGarageView.invoiceCode = data['invoiceCode'];
                                debtGarageView.dataVehicleCost = data['vehicleCost'];
                                debtGarageView.dataInvoiceGarage = data['invoiceGarages'];
                                debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);
                                debtGarageView.fillDataToDatatableTransportCost(debtGarageView.dataVehicleCost);
                                debtGarageView.fillDataToDatatableInvoiceGarage(debtGarageView.dataInvoiceGarage);
                                debtGarageView.fillDataToDatatableDebtTransport(debtGarageView.dataDebtTransport);
                                if (debtGarageView.action == 'new') {
                                    //clear Input
                                    debtGarageView.clearInput();
                                    debtGarageView.clearValidation("#frmInvoice");
                                    debtGarageView.hideControl();
                                    debtGarageView.deselectAll();
                                    //Show notification
                                    showNotification("success", "Tạo phiếu thanh toán thành công!");
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
                        $("#frmInvoice").find("label[class=error]").css("color", "red");
                    }
                },

//                printReview: function (invoiceGarageDetail_id) {
//                    debtGarageView.displayModal('show', '#modal-printReview');
//                },
//                attachFile: function (invoiceGarageDetail_id) {
//                    //    console.log(invoiceGarageDetail_id);
//                },
//
//                clearSearch: function (tableName) {
//                    if (tableName == "transport") {
//                        $("#dateSearchTransport").find(".start").datepicker('update', '');
//                        $("#dateSearchTransport").find(".end").datepicker('update', '');
//                        $("input[id=fullNumber_transport]").val('');
//                        debtGarageView.searchTransport();
//                    } else if (tableName == "vehicleCost") {
//                        $("#dateSearchVehicleCost").find(".start").datepicker('update', '');
//                        $("#dateSearchVehicleCost").find(".end").datepicker('update', '');
//                        $("input[id=fullNumber_cost]").val('');
//                        debtGarageView.searchVehicleCost();
//                    } else {
//                        $("#dateSearchInvoice").find(".start").datepicker('update', '');
//                        $("#dateSearchInvoice").find(".end").datepicker('update', '');
//                        $("input[id=fullNumber_invoice]").val('');
//                        debtGarageView.searchInvoice();
//                    }
//
//                },
//                searchTransport: function (money) {
//                    var found = debtGarageView.searchExportInvoice(debtGarageView.dataTransport);
//                    if (typeof money === 'undefined')
//                        found = debtGarageView.searchStatusMoney(found);
//                    else
//                        found = debtGarageView.searchStatusMoney(found, money.value);
//                    found = debtGarageView.searchVehicle(found);
//                    found = debtGarageView.searchDate(found);
//                    debtGarageView.dataSearch = found;
//
//                    debtGarageView.table.clear().rows.add(debtGarageView.dataSearch).draw();
//                    //fill data to listSearch
//                    debtGarageView.tagsFullNumberTransport = _.map(debtGarageView.dataSearch, 'fullNumber');
//                    debtGarageView.tagsFullNumberTransport = _.union(debtGarageView.tagsFullNumberTransport);
//
//                    debtGarageView.renderAutoCompleteSearch();
//
//                    // fill data to input
//                    var fromDate = $("#dateSearchTransport").find(".start").val();
//                    var toDate = $("#dateSearchTransport").find(".end").val();
//                    $("input[id='dateSearchVehicleCost']").find(".start").datepicker('update', fromDate);
//                    $("input[id='dateSearchVehicleCost']").find(".end").datepicker('update', toDate);
//                    $('input[id=fullNumber_cost]').val($('input[id=fullNumber_transport]').val());
//
//                    //    var invoice = $("#invoiceUp").find("input:checked").val();
//                    //    switch(){
//                    //        case 'All':
//                    //         $("#costDown[value=All]").prop('checked', true);
//                    //         break;
//                    //        case 'StillDebt':
//                    //         $("#costDown[value=StillDebt").prop('checked', true);
//                    //         break;
//                    //        case 'FullPay':
//                    //         $("#costDown[value=FullPay]").prop('checked', true);
//                    //         break;
//                    //    }
//
//                    // call search invoice
//                    debtGarageView.searchCost();
//
//                },
//                searchInvoice: function () {
//                    var found = debtGarageView.searchStatusMoneyInvoice(debtGarageView.dataInvoiceGarage);
//                    found = debtGarageView.searchGarageInvoice(found);
//                    found = debtGarageView.searchDateInvoice(found);
//                    debtGarageView.dataSearchInvoiceGarage = found;
//                    debtGarageView.tableInvoiceGarage.clear().rows.add(debtGarageView.dataSearchInvoiceGarage).draw();
//
//                    //fill data to listSearch
//                    debtGarageView.tagsFullNumberInvoice = _.map(debtGarageView.dataSearchInvoiceGarage, 'fullNumber');
//                    debtGarageView.tagsFullNumberInvoice = _.union(debtGarageView.tagsFullNumberInvoice);
//                    debtGarageView.renderAutoCompleteSearch();
//                },
//                searchCost: function () {
//                    var found = debtGarageView.searchDateVehicleCost(debtGarageView.dataVehicleCost);
//                    found = debtGarageView.searchVehicleCost(found);
//                    found = debtGarageView.searchStatusMoneyVehicleCost(found);
//
//                    debtGarageView.dataSearchVehicleCost = found;
//                    debtGarageView.tableTransportCost.clear().rows.add(debtGarageView.dataSearchVehicleCost).draw();
//                    //fill data to listSearch
//                    debtGarageView.tagsFullNumberCost = _.map(debtGarageView.dataSearchVehicleCost, 'fullNumber');
//                    debtGarageView.tagsFullNumberCost = _.union(debtGarageView.tagsFullNumberCost);
//                    debtGarageView.renderAutoCompleteSearch();
//
//                },
//
//                searchTransportVehicleCost: function () {
//                    var found = debtGarageView.searchStatusMoneyVehicleCost(debtGarageView.dataVehicleCost);
//                    found = debtGarageView.searchVehicleCost(found);
//
//                    debtGarageView.tagsFullNumberCost = _.map(debtGarageView.dataSearch, 'fullNumber');
//                    debtGarageView.tagsFullNumberCost = _.union(debtGarageView.tagsFullNumberCost);
//                    debtGarageView.renderAutoCompleteSearch();
//                },
//
//
//                searchDate: function (data) {
//                    var fromDate = $("#dateSearchTransport").find(".start").val();
//                    var toDate = $("#dateSearchTransport").find(".end").val();
//                    if (fromDate == '' || toDate == '')
//                        return data;
//                    fromDate = moment(fromDate, "DD-MM-YYYY");
//                    toDate = moment(toDate, "DD-MM-YYYY");
//                    if (!fromDate.isValid() && !toDate.isValid())
//                        return data;
//
//                    var found = _.filter(data, function (o) {
//                        var dateFind = moment(o.receiveDate, "YYYY-MM-DD H:m:s");
//                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
//                    });
//                    return found;
//                },
//                searchVehicle: function (data) {
//                    var vehicle = $("#fullNumber_transport").val();
//                    if (vehicle == '')
//                        return data;
//                    var found = _.filter(data, function (o) {
//                        return removeDiacritics(o.fullNumber.toLowerCase()).includes(removeDiacritics(vehicle.toLowerCase()));
//                    });
//                    return found;
//                },
//                searchExportInvoice: function (data) {
//                    var invoice = $("#invoiceUp").find("input:checked").val();
//                    var found = _.filter(data, function (o) {
//                        if (invoice == 'All') {
//                            return true;
//                        } else if (invoice == 'Invoice') {
//                            return o.invoiceGarage_id != null;
//                        } else {
//                            return o.invoiceGarage_id == null;
//                        }
//                    });
//                    return found;
//                },
//                searchStatusMoney: function (data, value) {
//                    if (typeof value === 'undefined')
//                        var money = $("select[id=statusMoney]").val();
//                    else
//                        var money = value;
//                    var found = _.filter(data, function (o) {
//                        if (money == 'FullPay') {
//                            return o.cashDelivery == o.cashPreDelivery;
//                        } else if (money == 'PrePay') {
//                            return o.cashPreDelivery != 0 && o.cashDelivery > o.cashPreDelivery;
//                        } else if (money == 'NotPay') {
//                            return o.cashPreDelivery == 0;
//                        } else if (money == 'All') {
//                            return true;
//                        }
//                    });
//                    return found;
//                },
//
//                searchDateInvoice: function (data) {
//                    fromDate = $("#dateSearchInvoice").find(".start").val();
//                    toDate = $("#dateSearchInvoice").find(".end").val();
//                    if (fromDate == '' || toDate == '')
//                        return data;
//
//                    fromDate = moment(fromDate, "DD-MM-YYYY");
//                    toDate = moment(toDate, "DD-MM-YYYY");
//                    if (!fromDate.isValid() && !toDate.isValid())
//                        return data;
//
//                    found = _.filter(data, function (o) {
//                        var dateFind = moment(o.invoiceDate, "YYYY-MM-DD H:m:s");
//                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
//                    });
//                    return found;
//                },
//                searchGarageInvoice: function (data) {
//                    garaName = $("#fullNumber_invoice").val();
//                    if (garaName == '')
//                        return data;
//
//                    found = _.filter(data, function (o) {
//                        return removeDiacritics(o.fullNumber.toLowerCase()).includes(removeDiacritics(fullNumber.toLowerCase()));
//                    });
//                    return found;
//                },
//                searchStatusMoneyInvoice: function (data) {
//                    money = $("#invoiceDown").find("input:checked").val();
//                    found = _.filter(data, function (o) {
//                        if (money == 'All') {
//                            return true;
//                        } else if (money == 'StillDebt') {
//                            return parseInt(o.totalPay) > parseInt(o.totalPaid) + parseInt(o.prePaid);
//                        } else {
//                            return parseInt(o.totalPay) == parseInt(o.totalPaid) + parseInt(o.prePaid);
//                        }
//                    });
//                    return found;
//                },
//
//                searchDateVehicleCost: function (data) {
//                    var fromDate = $("#dateSearchVehicleCost").find(".start").val();
//                    var toDate = $("#dateSearchVehicleCost").find(".end").val();
//                    if (fromDate == '' || toDate == '')
//                        return data;
//
//                    fromDate = moment(fromDate, "DD-MM-YYYY");
//                    toDate = moment(toDate, "DD-MM-YYYY");
//                    if (!fromDate.isValid() && !toDate.isValid())
//                        return data;
//
//                    found = _.filter(data, function (o) {
//                        var dateFind = moment(o.invoiceDate, "YYYY-MM-DD H:m:s");
//                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
//                    });
//                    return found;
//                },
//                searchVehicleCost: function (data) {
//                    var vehicle = $("#fullNumber_cost").val();
//                    if (vehicle == '')
//                        return data;
//                    var found = _.filter(data, function (o) {
//                        return removeDiacritics(o.fullNumber.toLowerCase()).includes(removeDiacritics(vehicle.toLowerCase()));
//                    });
//                    return found;
//                },
//                searchStatusMoneyVehicleCost: function (data) {
//                    var money = $("#costDown").find("input:checked").val();
//                    var found = _.filter(data, function (o) {
//                        if (money == 'All') {
//                            return true;
//                        } else if (money == 'StillDebt') {
//                            return parseInt(o.totalPay) > parseInt(o.totalPaid) + parseInt(o.prePaid);
//                        } else {
//                            return parseInt(o.totalPay) == parseInt(o.totalPaid) + parseInt(o.prePaid);
//                        }
//                    });
//                    return found;
//                },
                save: function () {
                    var sendToServer = {
                        _token: _token,
                        _transport: debtGarageView.current.id
                    };
                    $.ajax({
                        url: url + 'debt-garage/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {

                        if (jqXHR.status == 201) {
                            debtGarageView.dataTransport = data['transports'];
                            debtGarageView.dataDebtTransport = data['debtTransports'];


                            //debtGarageView.dataSearch = data['transports'];
//                            debtGarageView.dataInvoiceGarage = data['invoiceGarages'];
//                            debtGarageView.dataSearchInvoiceGarage = data['invoiceGarages'];
//                            debtGarageView.dataInvoiceGarageDetail = data['invoiceGarageDetails'];
//                            debtGarageView.dataPrintHistory = data['printHistories'];
//                            debtGarageView.dataTransportInvoice = data['transportInvoices'];
//                            debtGarageView.invoiceCode = data['invoiceCode'];

                            debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);
                            debtGarageView.fillDataToDatatableDebtTransport(debtGarageView.dataDebtTransport);

                            //debtGarageView.searchTransport();
                            // debtGarageView.searchInvoice();

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
                }


            };
            debtGarageView.loadData();
        } else {
            debtGarageView.loadData();
        }
    });
</script>
