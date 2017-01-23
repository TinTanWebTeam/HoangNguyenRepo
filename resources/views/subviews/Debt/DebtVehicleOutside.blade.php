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

    th {
        white-space: nowrap;
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
                        <div class="btn btn-primary btn-circle btn-md" title="Tạo Hóa đơn"
                             onclick="debtVehicleOutSideView.createInvoiceGarage(0)">
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
                        <div class="col-md-offset-8 col-md-2">
                            <span class="label label-danger" style="font-size: 1em;">Chưa trả</span>
                            <span class="label label-success" style="font-size: 1em;">Đã trả đủ</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchTransport">
                            <div class="ui-widget" style="padding-top:8px">
                                <input type="text" class="date start"/> đến
                                <input type="text" class="date end"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ui-widget">
                                <input type="text" class="form-control" id="fullNumber_transport"
                                       name="fullNumber_transport" placeholder="Nhập số xe">
                            </div>
                        </div>
                    </div>
                    <div class="row" style="float: right;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="radio">
                                        <button id="btnSearchTransport" class="btn btn-sm btn-info marginRight"
                                                onclick="debtVehicleOutSideView.search('transport')">
                                            <i class="fa fa-search" aria-hidden="true"></i> Tìm
                                        </button>
                                        <button class="btn btn-sm btn-default"
                                                onclick="debtVehicleOutSideView.clearSearch('transport');debtVehicleOutSideView.clearSearch('vehicleCost');$('#ToolTables_table-data_1').click()">
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
                                        <th>Mã Hóa đơn</th>
                                        <th>Nơi giao</th>
                                        <th>Số chứng từ</th>
                                        <th>Giao xe</th>
                                        <th>Còn nợ</th>
                                        <th>Người nhận</th>
                                        <th>Người tạo</th>
                                        <th>Người sửa</th>
                                        <th>Ngày nhận</th>
                                        <th>Thanh toán</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                    <tr class="active">
                                        <td colspan="8" style="text-align:right;font-weight: bold">Total:</td>
                                        <td colspan="6" style="font-weight: bold"></td>
                                    </tr>
                                    </tfoot>
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

                        <div class="col-md-12">
                            <div class="radio" style="float: right;">
                                <button onclick="debtVehicleOutSideView.search('vehicleCost')" id="btnSearchInvoice"
                                        class="btn btn-sm btn-info marginRight"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button class="btn btn-sm btn-default"
                                        onclick="debtVehicleOutSideView.clearSearch('vehicleCost')">
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
                                        <th>STT</th>
                                        <th>Số xe</th>
                                        <th>Phí đổ dầu</th>
                                        <th>Phí thay nhớt</th>
                                        <th>Phí Đậu bãi</th>
                                        <th>Phí khác</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                    </thead>
                                    <tfoot>

                                    </tfoot>
                                    <tbody>

                                    </tbody>
                                    {{--<tfoot>--}}
                                    {{--<tr class="active">--}}
                                        {{--<td colspan="2" style="text-align:right;font-weight: bold">Total:</td>--}}
                                        {{--<td colspan="5" style="font-weight: bold"></td>--}}
                                    {{--</tr>--}}
                                    {{--</tfoot>--}}
                                </table>
                            </div>
                        </div>
                    </div>


                    {{--Hóa đơn--}}
                    <hr>
                    <p class="lead text-primary text-left"><strong>Hóa đơn</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchPTT">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fullNumber_PTT" name="fullNumber_PTT"
                                   placeholder="Nhập số xe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="radio" id="PTTDown">
                                <label style="margin-right: 10px">
                                    <input type="radio" name="rdoPTT" checked value="All"
                                           onchange="debtVehicleOutSideView.search('PTT')">
                                    Tất cả
                                </label>
                                <label style="margin-right: 10px">
                                    <input type="radio" name="rdoPTT" value="StillDebt"
                                           onchange="debtVehicleOutSideView.search('PTT')">
                                    Còn nợ
                                </label>
                                <label>
                                    <input type="radio" name="rdoPTT" value="FullPay"
                                           onchange="debtVehicleOutSideView.search('PTT')">
                                    Trả đủ
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="radio" style="float: right;">
                                <button onclick="debtVehicleOutSideView.search('PTT')" id="btnSearchInvoice"
                                        class="btn btn-sm btn-info marginRight"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                {{--<button onclick="debtVehicleOutSideView.searchPTT()" id="btnSearchInvoice"--}}
                                {{--class="btn btn-sm btn-info marginRight"><i--}}
                                {{--class="fa fa-search" aria-hidden="true"></i> Tìm--}}
                                {{--</button>--}}
                                <button class="btn btn-sm btn-default"
                                        onclick="debtVehicleOutSideView.clearSearch('PTT')">
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
                                        <th>STT</th>
                                        <th>Mã phiếu</th>
                                        <th>Số xe</th>
                                        <th>Nhà xe</th>
                                        <th>Tổng Hóa đơn</th>
                                        <th>Chi phí xe</th>
                                        <th>Đã thanh toán</th>
                                        <th>Nợ</th>
                                        <th>Người nhận</th>
                                        <th>Người tạo</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày trả</th>
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
                    <p class="lead text-primary text-left"><strong>Tiền mặt</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchPay">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fullNumber_Pay" name="fullNumber_Pay"
                                   placeholder="Nhập số xe">
                        </div>

                    </div>
                    <div class="row" style="float: right;">
                        <div class="col-md-12">
                            <div class="radio">
                                <button onclick="debtVehicleOutSideView.search('pay')" id="btnSearchInvoice"
                                        class="btn btn-sm btn-info marginRight"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button class="btn btn-sm btn-default"
                                        onclick="debtVehicleOutSideView.clearSearch('pay')">
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
                                        <th>STT</th>
                                        <th>Số xe</th>
                                        <th>Nhà xe</th>
                                        <th>Nơi giao</th>
                                        <th>Số chứng từ</th>
                                        <th>Thanh toán</th>
                                        <th>Người nhận</th>
                                        <th>Người tạo</th>
                                        <th>Người sửa</th>
                                        <th>Ngày thanh toán</th>

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
                                debtVehicleOutSideView.clearInput();
                                debtVehicleOutSideView.deselectAll();
                                debtVehicleOutSideView.clearValidation('#frmInvoice');
                                debtVehicleOutSideView.hideControl()">
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
                                            <label for="invoiceCode"><b>Mã Hóa đơn</b></label>
                                            <input type="text" class="form-control"
                                                   id="invoiceCode"
                                                   name="invoiceCode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="fullNumber"><b>Số xe</b></label>
                                            <input type="text" class="form-control" readonly
                                                   id="fullNumber" data-vehicleId=""
                                                   name="fullNumber">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="totalTransport"><b>Tiền giao xe</b></label>
                                            <input type="text" class="form-control currency" readonly
                                                   id="totalTransport" name="totalTransport">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debt"><b>Còn nợ lại</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="debt" name="debt" data-id="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="paidAmt" class="red"><b>Tiền trả</b></label>
                                            <input type="text" class="form-control currency defaultZero"
                                                   id="paidAmt" name="paidAmt"
                                                   onkeyup="debtVehicleOutSideView.computeDebt(this.value)">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="sendToPerson"><b>Người nhận</b></label>
                                            <input type="text" id="sendToPerson" name="sendToPerson"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input ">
                                            <label for="oil"><b>Dầu</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="oil" readonly
                                                   name="oil">
                                            <input type="text" class="form-control" style="display: none"
                                                   id="totalCost" readonly
                                                   name="totalCost">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input ">
                                            <label for="lube"><b>Thay nhớt</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="lube" readonly
                                                   name="lube">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input ">
                                            <label for="parking"><b>Đậu bãi</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="parking" readonly
                                                   name="parking">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input ">
                                            <label for="other"><b>Khác</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="other" readonly
                                                   name="other">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="exportDate"><b>Ngày tạo Hóa đơn</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="exportDate"
                                                   name="exportDate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
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
                                                        onclick="debtVehicleOutSideView.saveInvoiceGarage()">
                                                    Hoàn tất
                                                </button>
                                                <button type="button" class="btn default"
                                                        onclick="debtVehicleOutSideView.retype(0)">Nhập lại
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
                                debtVehicleOutSideView.clearInput();
                                debtVehicleOutSideView.deselectAll();
                                debtVehicleOutSideView.clearValidation('#frmInvoice');
                                debtVehicleOutSideView.hideControl()">
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
                                            <label for="DebtVerbCode"><b>Mã Hóa đơn</b></label>
                                            <input type="text" class="form-control"
                                                   id="DebtVerbCode" readonly
                                                   name="DebtVerbCode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="totalDebtVerb"><b>Tổng tiền</b></label>
                                            <input type="text" class="form-control currency" readonly
                                                   id="totalDebtVerb" name="totalDebtVerb">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debtVerb"><b>Còn nợ lại</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="debtVerb" name="debtVerb" data-id="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="paidAmtDebtVerb"><b>Tiền đã thanh toán</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="paidAmtDebtVerb" name="paidAmtDebtVerb" data-id="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="payMore"><b>Trả tiếp</b></label>
                                            <input type="text" class="form-control currency"
                                                   id="payMore" onkeyup="debtVehicleOutSideView.payMore(this.value)"
                                                   name="payMore">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input ">
                                            <label for="debtVerbPerson"><b>Người nhận</b></label>
                                            <input type="text" id="debtVerbPerson" name="debtVerbPerson"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="payDateDebtVerb"><b>Ngày trả</b></label>
                                            <input type="text" class="date form-control ignore"
                                                   id="payDateDebtVerb"
                                                   name="payDateDebtVerb">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="noteDebtVerb"><b>Ghi chú</b></label>
                                            <textarea class="form-control" id="noteDebtVerb" name="noteDebtVerb"
                                                      rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-actions noborder">
                                            <div class="form-group">
                                                <button id="button-debt" type="button"
                                                        class="btn btn-primary marginRight"
                                                        onclick="debtVehicleOutSideView.savePayMore()">
                                                    Hoàn tất
                                                </button>
                                                <button type="button" class="btn default"
                                                        onclick="debtVehicleOutSideView.retype(1)">Nhập lại
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
<!-- End divDebtVerb -->

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

<!-- Modal Detail PTT -->
<div class="row">
    <div id="modal-detailPtt" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title"> Chi tiết Hóa đơn</h5>
                </div>
                <div class="modal-body" style="padding-top: 0; font-size: 15px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered  table-striped table-hover" id="table-detailPTT">
                                    <thead>
                                    <tr class="active">
                                        <th>STT</th>
                                        <th>Số xe</th>
                                        <th>Tổng Hóa đơn</th>
                                        <th>Chi phí</th>
                                        <th>Nợ</th>
                                        <th>Đã trả</th>
                                        <th>Ngày trả</th>
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
<!-- end Modal Detail PTT -->


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
        if (typeof debtVehicleOutSideView === 'undefined') {
            debtVehicleOutSideView = {
                table: null,
                tableTransportCost: null,
                tableInvoiceGarage: null,
                tableDebtTransport: null,
                tableDetailPTT: null,
                dataTransport: null,
                dataInvoiceGarage: null,
                dataDebtTransport: null,
                arrayCostDataVehicle: null,
                action: null, //new, edit, autoEdit
                current: null, //for autoEdit
                currentPayMore: null, //trả tiếp
                currentInvoiceGarage: null, //tao Hóa đơn
                invoiceGarageId: null, //for edit
                payMoreId: null, // id tra tiep
                invoiceCode: null, //Get invoiceCode newest form Server
                dataTransportInvoice: null,
                array_transportId: [], //array_transportId of InvoiceGarage current
                tagsFullNumberTransport: [], //for search
                tagsFullNumberCost: [], //for search
                tagsFullNumberPTT: [], //for search
                tagsFullNumberPay: [], //for search
                firstDay: null,
                lastDay: null,
                dataDetailPTT: null,
                clearSearch: function (temp) {
                    if (temp == 'transport') {
                        $("input[id=fullNumber_transport]").val('');
                        debtVehicleOutSideView.search('transport');
                    } else if (temp == 'vehicleCost') {
                        $("input[id=fullNumber_cost]").val('');
                        debtVehicleOutSideView.search('vehicleCost');
                    } else if (temp == 'PTT') {
                        $("input[id=fullNumber_PTT]").val('');
                        debtVehicleOutSideView.search('PTT');
                    } else if (temp == 'pay') {
                        $("input[id=fullNumber_Pay]").val('');
                        debtVehicleOutSideView.search('pay');
                    }
//
                },
                showControl: function (flag) {
                    if (flag == 0) {
                        $('#divInvoice').css("width", "40%");
                        $("#tbl-history").hide();
                        $("#frm-control").removeClass("col-md-6").addClass("col-md-12");
                        $('#divInvoice').fadeIn(300);
                    } else {
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
                    $("input[id='debt']").val('');
                    $("input[id='debt-real']").val('');
                    $("input[id='paidAmt']").val('');
                    $("textarea[id='note']").val('');
                },
                retype: function (temp) {
                    if (temp == 0) {
                        $("#button").prop("disabled", false);
                        var debt = $('#debt').attr('data-id');
                        $("input[id='debt']").val(debt);
                        $("input[id='invoiceCode']").val('');
                        $("input[id='paidAmt']").val(0);
                        $("input[id='sendToPerson']").val('');
                        $("textarea[id='note']").val('');
                        debtVehicleOutSideView.renderDateTimePicker();
                    } else {
                        $("#button-debt").prop("disabled", false);
                        var debtVerb = $('#debtVerb').attr('data-id');
                        $("input[id='debtVerb']").val(debtVerb);
                        $("input[id='payMore']").val('');
                        $("input[id='debtVerbPerson']").val('');
                        $("textarea[id='noteDebtVerb']").val('');
                        debtVehicleOutSideView.renderDateTimePicker();
                    }
                    formatCurrency(".currency");

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
                    $('#dateSearchPTT .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#dateSearchTransport .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#dateSearchVehicleCost .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#dateSearchPay .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#payDateDebtVerb .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#divInvoice').find('.date').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#divInvoice').find('.date').datepicker("setDate", new Date());
                    $('#divDebtVerb').find('.date').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#divDebtVerb').find('.date').datepicker("setDate", new Date());

                },
                renderAutoCompleteSearch: function () {
                    debtVehicleOutSideView.tagsFullNumberTransport = _.map(debtVehicleOutSideView.dataTransport, function (o) {
                        return o['vehicles_areaCode'] + '-' + o['vehicles_vehicleNumber'];
                    });
                    debtVehicleOutSideView.tagsFullNumberTransport = _.union(debtVehicleOutSideView.tagsFullNumberTransport);

                    $("#fullNumber_transport").autocomplete({
                        source: debtVehicleOutSideView.tagsFullNumberTransport
                    });
////search fullNumber_cost
                    debtVehicleOutSideView.tagsFullNumberCost = _.map(debtVehicleOutSideView.arrayCostDataVehicle, function (o) {
                        return o['fullNumber'];
                    });
                    debtVehicleOutSideView.tagsFullNumberCost = _.union(debtVehicleOutSideView.tagsFullNumberCost);

                    $("#fullNumber_cost").autocomplete({
                        source: debtVehicleOutSideView.tagsFullNumberCost
                    });
//PTT
                    debtVehicleOutSideView.tagsFullNumberPTT = _.map(debtVehicleOutSideView.dataInvoiceGarage, function (o) {
                        return o['vehicles_areaCode'] + '-' + o['vehicles_vehicleNumber'];
                    });
                    $("#fullNumber_PTT").autocomplete({
                        source: debtVehicleOutSideView.tagsFullNumberPTT
                    });
//tra du
                    debtVehicleOutSideView.tagsFullNumberPay = _.map(debtVehicleOutSideView.dataDebtTransport, function (o) {
                        return o['vehicles_areaCode'] + '-' + o['vehicles_vehicleNumber'];
                    });
                    debtVehicleOutSideView.tagsFullNumberPay = _.union(debtVehicleOutSideView.tagsFullNumberPay);
                    $("#fullNumber_Pay").autocomplete({
                        source: debtVehicleOutSideView.tagsFullNumberPay
                    });

                },
                renderEventKeyCode: function () {
                    $("#fullNumber_transport").keyup(function (event) {
                        if (event.keyCode == 13) { //Enter
                            $("#btnSearchTransport").click();
                        }
                    });

                    $("#fullNumber_Pay").keyup(function (event) {
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
                            $("input[id=fullNumber_cost]").val(td.text());
                            debtVehicleOutSideView.search('transport');
                            debtVehicleOutSideView.search('vehicleCost');
                        }
                    });
                },
                loadData: function () {
                    if (debtVehicleOutSideView.table != null)
                        debtVehicleOutSideView.table.destroy();
                    $.ajax({
                        url: url + 'debt-garage/transports',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            debtVehicleOutSideView.dataTransport = data['transports'];
                            debtVehicleOutSideView.dataDebtTransport = data['debtTransports'];
                            debtVehicleOutSideView.arrayCostDataVehicle = data['arrayCostDataVehicle'];
                            debtVehicleOutSideView.invoiceCode = data['invoiceCode'];
                            debtVehicleOutSideView.dataInvoiceGarage = data['invoiceGarages'];
                            debtVehicleOutSideView.dataDetailPTT = data['invoiceGarageDetails'];
                            debtVehicleOutSideView.fillDataToDatatable(debtVehicleOutSideView.dataTransport);
                            debtVehicleOutSideView.fillDataToDatatableTransportCost(debtVehicleOutSideView.arrayCostDataVehicle);
                            debtVehicleOutSideView.fillDataToDatatableInvoiceGarage(debtVehicleOutSideView.dataInvoiceGarage);
                            debtVehicleOutSideView.fillDataToDatatableDebtTransport(debtVehicleOutSideView.dataDebtTransport);
                            debtVehicleOutSideView.firstDay = data['firstDay'];
                            debtVehicleOutSideView.lastDay = data['lastDay'];
                            debtVehicleOutSideView.setCurrentMonth();
                            debtVehicleOutSideView.search('transport');
                            debtVehicleOutSideView.search('vehicleCost');
                            debtVehicleOutSideView.search('PTT');
                            debtVehicleOutSideView.search('pay');
                            debtVehicleOutSideView.renderAutoCompleteSearch();
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    debtVehicleOutSideView.renderDateTimePicker();
                    debtVehicleOutSideView.renderScrollbar();
//                    debtVehicleOutSideView.renderEventRadioInput();
//                    debtVehicleOutSideView.renderEventKeyCode();
                    debtVehicleOutSideView.renderEventRowClick();
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    defaultZero("#paidAmt");

                },
//                table - transport
                fillDataToDatatable: function (data) {
                    if (debtVehicleOutSideView.table != null)
                        debtVehicleOutSideView.table.destroy();
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                        data[i].debt = parseInt(data[i]['totalDelivery']) - parseInt(data[i]['totalPreDelivery']);
                        var transportInvoice = _.filter(debtVehicleOutSideView.dataTransportInvoice, function (o) {
                            return o.transport_id == data[i]['id'];
                        });
                        if (transportInvoice.length > 0) {
                            transportInvoice = _.map(transportInvoice, 'invoiceGarage_id');
                            var invoice = _.filter(debtVehicleOutSideView.dataInvoiceGarage, function (o) {
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
                    debtVehicleOutSideView.table = $('#table-data').DataTable({
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
                                data: 'totalDelivery',
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
                                    tr += "<div class='btn btn-circle btn-danger' title='Click để trả đủ' onclick='debtVehicleOutSideView.autoEditTransportConfirm(" + full.id + ")'>";
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
                            {responsivePriority: 1, targets: 13}
                        ],
                        order: [[1, "asc"]],
                        dom: 'T<"clear">frtip',
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
                        ],
                        footerCallback: function (row, temp, start, end, display) {
                            var api = this.api(), temp;
                            // Remove the formatting to get integer data for summation
                            var intVal = function (i) {
                                return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '') * 1 :
                                    typeof i === 'number' ?
                                        i : 0;
                            };

//                             Total over all pages
//                            total = api
//                                .column(8)
//                                .data()
//                                .reduce(function (a, b) {
//                                    return intVal(a) + intVal(b);
//                                }, 0);

                            // Total over this page
                            pageTotal = api
                                .column(8, {page: 'current'})
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Update footer
                            $(api.column(8).footer()).html(
                                pageTotal + ' Vnd'
                            );
                        }
                    });
                },

//                table - chi phi xe
                fillDataToDatatableTransportCost: function (data) {
                    if (debtVehicleOutSideView.tableTransportCost != null)
                        debtVehicleOutSideView.tableTransportCost.destroy();
                    for (var i = 0; i < data.length; i++) {
                        data[i].stt = i + 1;
                    }
                    debtVehicleOutSideView.tableTransportCost = $('#table-transportCost').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'stt'},
                            {data: 'fullNumber'},
                            {
                                data: 'oil',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'lube',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'parking',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'other',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {data: 'note'}
                        ],

                        footerCallback: function (row, temp, start, end, display) {
                            var api = this.api(), temp;
                            // Remove the formatting to get integer data for summation
                            var intVal = function (i) {
                                return typeof i === 'string' ?
                                    i.replace(/[\$,]/g, '') * 1 :
                                    typeof i === 'number' ?
                                        i : 0;
                            };
//                             Total over all pages
                            total = api
                                .column(2)
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Total over this page
                            pageTotal = api
                                .column(2, {page: 'current'})
                                .data()
                                .reduce(function (a, b) {
                                    return intVal(a) + intVal(b);
                                }, 0);

                            // Update footer
                            $(api.column(2).footer()).html(
                                pageTotal + ' Vnd'
                            );

                        }
                    });
//                    $("#table-transportCost").css("width", "auto");
                },

//                table - Hóa đơn
                fillDataToDatatableInvoiceGarage: function (data) {
                    if (debtVehicleOutSideView.tableInvoiceGarage != null)
                        debtVehicleOutSideView.tableInvoiceGarage.destroy();
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                        data[i].stt = i + 1;
                    }
                    debtVehicleOutSideView.tableInvoiceGarage = $('#table-garageInvoice').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'stt'},
                            {data: 'invoiceCode'},
                            {data: 'fullNumber'},
                            {data: 'garages_name'},
                            {
                                data: 'totalTransport',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'totalCost',
                                render: $.fn.dataTable.render.number(",", ".", 0)

                            },
                            {
                                data: 'paidAmt',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'debt',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {data: 'sendToPerson'},
                            {data: 'users_createdBy'},
                            {
                                data: 'exportDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                data: 'payDate_detail',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var color = 'btn-default';
                                    var text = '';
                                    var display = '';
                                    var line = '';
                                    if (full.debt != 0) {
                                        color = 'btn-danger';
                                        text = 'Click để trả đủ';
                                        display = 'block';
                                        line = 'inline-block';

                                    }
                                    else if (full.debt == 0) {
                                        color = 'btn-success';
                                        text = 'Đã trả đủ';
                                        display = 'none';
                                        line = 'inline-block';

                                    }
                                    var tr = '';
                                    tr += '<div class="text-center" style="display:' + line + ';padding-right: 5px"  >';
                                    tr += "<div class='btn btn-circle " + color + "' title='" + text + "' style='display:" + display + "'  onclick='debtVehicleOutSideView.debtVerb(" + full.id + ")'>";
                                    tr += '<i class="fa fa-usd" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="text-center" style="display:' + line + '">';
                                    tr += "<div class='btn btn-circle btn-primary' title='Chi tiết Hóa đơn'  onclick='debtVehicleOutSideView.detailPTT(" + full.id + ")'>";
                                    tr += '<i class="glyphicon glyphicon-list"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;

                                }
                            }
                        ]
                    });
                },

//                table - chi tiet ptt
                fillDataToDatatableDetailPTT: function (data) {
                    if (debtVehicleOutSideView.tableDetailPTT != null)
                        debtVehicleOutSideView.tableDetailPTT.destroy();
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['areaCode'] == null || data[i]['vehicleNumber'] == null) ? "" : data[i]['areaCode'] + '-' + data[i]['vehicleNumber'];
                        data[i].stt = i + 1;
                    }
                    debtVehicleOutSideView.tableDetailPTT = $('#table-detailPTT').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'stt'},
                            {data: 'fullNumber'},
                            {
                                data: 'totalPtt',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'totalCost',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'debtOld',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {data: 'paidAmt', render: $.fn.dataTable.render.number(",", ".", 0)},
                            {
                                data: 'payDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            }
                        ]
                    });
                },

                detailPTT: function (id) {
                    debtVehicleOutSideView.displayModal('show', '#modal-detailPtt');
                    var detailPtt = _.filter(debtVehicleOutSideView.dataDetailPTT, function (o) {
                        return o.idDetail == id
                    });
                    debtVehicleOutSideView.fillDataToDatatableDetailPTT(detailPtt);
                },

//                table - tra đủ
                fillDataToDatatableDebtTransport: function (data) {
                    if (debtVehicleOutSideView.tableDebtTransport != null)
                        debtVehicleOutSideView.tableDebtTransport.destroy();
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                        data[i].stt = i + 1;
                    }
                    debtVehicleOutSideView.tableDebtTransport = $('#table-debtTransport').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'stt'},
                            {data: 'fullNumber'},
                            {data: 'garages_name'},
                            {data: 'deliveryPlace'},
                            {data: 'voucherNumber'},
                            {
                                data: 'cashDelivery',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },

                            {data: 'receiver'},
                            {data: 'users_createdBy'},
                            {data: 'users_updatedBy', visible: false},
                            {
                                data: 'updated_at',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            }
                        ],
                        order: [[1, "asc"]],
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

                    });

                },
                debtVerb: function (id) {
                    var flag = 1;
                    debtVehicleOutSideView.showControl(flag);
                    debtVehicleOutSideView.action = "new";
                    debtVehicleOutSideView.currentPayMore = null;
                    debtVehicleOutSideView.currentPayMore = _.clone(_.find(debtVehicleOutSideView.dataInvoiceGarage, function (o) {
                        return o.id == id;
                    }), true);
                    payMoreId = debtVehicleOutSideView.currentPayMore.id;
                    $('#debtVerb').attr('data-id', debtVehicleOutSideView.currentPayMore['debt']);
                    $('#paidAmtDebtVerb').attr('data-id', debtVehicleOutSideView.currentPayMore['paidAmt']);
                    $("input[id='DebtVerbCode']").val(debtVehicleOutSideView.currentPayMore['invoiceCode']);
                    $("input[id='totalDebtVerb']").val(debtVehicleOutSideView.currentPayMore['totalTransport']);
                    $("input[id='debtVerb']").val(debtVehicleOutSideView.currentPayMore['debt']);
                    $("input[id='paidAmtDebtVerb']").val(debtVehicleOutSideView.currentPayMore['paidAmt']);
                    $("input[id='payMore']").val(0);
                    $("input[id='debtVerbPerson']").val(debtVehicleOutSideView.currentPayMore['sendToPerson']);
                    $("textarea[id='noteDebtVerb']").val(debtVehicleOutSideView.currentPayMore['note']);
                    $("#divDebtVerb").find(".titleControl").html("Cập nhật Hóa đơn");
                    formatCurrency(".currency");
                },
                payMore: function (payMore) {
                    payMore = convertStringToNumber(payMore);
                    var finish = 0;
                    var pay = 0;
                    var debtVerb = $('#debtVerb').attr('data-id');
                    var paidAmtDebtVerb = $('#paidAmtDebtVerb').attr('data-id');
                    var NbDebtVerb = convertStringToNumber(debtVerb);
                    var NbPaidAmtDebtVerb = convertStringToNumber(paidAmtDebtVerb);
                    if (payMore > NbDebtVerb) {
                        payMore = NbDebtVerb;
                        $("input[id=payMore]").val(payMore);
                        showNotification('warning', 'Số tiền trả không được lớn hơn tiền còn nợ.');
                    }
                    finish = NbDebtVerb - payMore;
                    pay = NbPaidAmtDebtVerb + payMore;
                    $("input[id=debtVerb]").val(finish);
                    $("input[id=paidAmtDebtVerb]").val(pay);
                    formatCurrency(".currency");

                },
                computeDebt: function (paidAmt) {
                    paidAmt = convertStringToNumber(paidAmt);
                    var debt = $('input[id=debt]').attr('data-id');
                    if (paidAmt > debt) {
                        paidAmt = debt;
                        showNotification('warning', 'Số tiền trả không được lớn hơn tiền còn nợ.');
                        $("input[id='paidAmt']").val(paidAmt);
                    }
                    debt = debt - paidAmt;
                    $("input[id=debt]").val(debt);
                    formatCurrency(".currency");
                },
                fillFormDataToCurrentObject: function () {
                    debtVehicleOutSideView.currentInvoiceGarage = {
                        id: debtVehicleOutSideView.invoiceGarageId,
                        invoiceCode: $("input[id='invoiceCode']").val(),
                        totalTransport: asNumberFromCurrency("#totalTransport"),
                        debt: asNumberFromCurrency("#debt"),
                        paidAmt: asNumberFromCurrency("#paidAmt"),
                        sendToPerson: $("input[id=sendToPerson]").val(),
                        exportDate: $("input[id='exportDate']").val(),
                        payDate: $("input[id='payDate']").val(),
                        note: $("textarea[id='note']").val(),
                        vehicle_id: $("input[id='fullNumber']").attr('data-vehicleId'),
                        totalCost: $("input[id='totalCost']").val()
                    }
                },
                fillFormDataToCurrentObjectPayMore: function () {
                    debtVehicleOutSideView.currentPayMore = {
                        idPayMore: payMoreId,
                        DebtVerbCode: $("input[id='DebtVerbCode']").val(),
                        debtVerb: asNumberFromCurrency("#debtVerb"),
                        debtOld: $("input[id='debtVerb']").attr('data-id'),
                        paidAmtDebtVerb: asNumberFromCurrency("#paidAmtDebtVerb"),
                        payMore: asNumberFromCurrency("#payMore"),
                        debtVerbPerson: $("input[id=debtVerbPerson]").val(),
                        payDateDebtVerb: $("input[id='payDateDebtVerb']").val(),
                        noteDebtVerb: $("textarea[id='noteDebtVerb']").val()
                    }
                },
                validateListTransport: function () {
                    array = $.map(debtVehicleOutSideView.table.rows('.selected').data(), function (value, index) {
                        return [value];
                    });
                    debtVehicleOutSideView.array_transportId = [];
                    debtVehicleOutSideView.array_transportId = _.map(array, 'id');

                    array_garageId = _.map(array, 'garage_id');
                    array_garageId = _.uniq(array_garageId);

                    if (array_garageId.length == 1 && debtVehicleOutSideView.array_transportId.length > 0) {
                        var sendToServer = {
                            _token: _token,
                            _array_transportId: debtVehicleOutSideView.array_transportId
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
                        var dataAfterValidate = debtVehicleOutSideView.validateListTransport();
                        if (dataAfterValidate['status'] === 0) {
                            $("#modal-notification").find(".modal-title").html("Cảnh báo");
                            $("#modal-notification").find(".modal-body").html(dataAfterValidate['msg']);
                            debtVehicleOutSideView.displayModal('show', '#modal-notification');
                            return;
                        }
                        $("#divInvoice").find(".titleControl").html("Tạo Hóa đơn");
                        debtVehicleOutSideView.showControl(flag);
                        debtVehicleOutSideView.action = "new";
                        var prePaid = 0;
                        var totalPay = 0;
                        var totalCost = 0;
                        for (var i = 0; i < debtVehicleOutSideView.array_transportId.length; i++) {
                            var currentRow = _.find(debtVehicleOutSideView.dataTransport, function (o) {
                                return o.id == debtVehicleOutSideView.array_transportId[i];
                            });
                            var fullNumber = currentRow['vehicles_areaCode'] + '-' + currentRow['vehicles_vehicleNumber'];
                            if (typeof currentRow !== 'undefined') {
                                totalPay += parseInt(currentRow['totalDelivery']);
                                prePaid += parseInt(currentRow['totalPreDelivery']);
                            }
                        }
                        var cost = _.find(debtVehicleOutSideView.arrayCostDataVehicle, function (o) {
                            return o.vehicle_id == currentRow.vehicle_id;
                        });
                        if (dataAfterValidate['status'] === 1) { //First
                            if (typeof cost == "undefined") {
                                totalCost = 0;
                                $("input[id=oil]").val(0);
                                $("input[id=lube]").val(0);
                                $("input[id=parking]").val(0);
                                $("input[id=other]").val(0);
                            } else {
                                totalCost = cost.sum;
                                $("input[id=oil]").val(cost.oil);
                                $("input[id=lube]").val(cost.lube);
                                $("input[id=parking]").val(cost.parking);
                                $("input[id=other]").val(cost.other);
                            }
                            var debt = totalPay - prePaid - totalCost;
                            $("input[id=totalCost]").val(totalCost);
                            $("input[id=totalTransport]").val(totalPay);
                            $("input[id=debt]").val(parseInt(debt));
                            $("input[id=debt]").attr("data-id", debt);
                            $("input[id=debt-real]").val(debt);
                            // chi phi
                            $("input[id=fullNumber]").val(fullNumber);
                            $("input[id=fullNumber]").attr('data-vehicleId', currentRow.vehicle_id);


                        }
                        $("input[id=invoiceCode]").attr("placeholder", debtVehicleOutSideView.invoiceCode);
                        //set default value
                        $("input[id=paidAmt]").val(0);
                        //remove readly input
                        $("input[id=invoiceCode]").prop('readonly', false);
                        $("input[id=invoiceCode]").focus();
                    }
                    formatCurrency(".currency");
                },

                autoEditTransport: function (transportId) {
                    debtVehicleOutSideView.current = null;
                    var cost = 0;
                    var totalTransport = 0;
                    debtVehicleOutSideView.current = _.clone(_.find(debtVehicleOutSideView.dataTransport, function (o) {
                        return o.id == transportId;
                    }), true);
                    var debt = debtVehicleOutSideView.current.debt;
                    var vehicle_id = debtVehicleOutSideView.current.vehicle_id;
                    var costVehicle = _.find(debtVehicleOutSideView.arrayCostDataVehicle, function (o) {
                        return o.vehicle_id == vehicle_id;
                    });
                    if (typeof  costVehicle == "undefined") {
                        cost = 0;
                    } else {
                        cost = costVehicle.sum;
                    }
                    var totalTransport = debt - cost;
                    debtVehicleOutSideView.action = 'autoEdit';
                    debtVehicleOutSideView.save(totalTransport);
                },
                autoEditTransportConfirm: function (transportId) {
                    debtVehicleOutSideView.current = null;
                    debtVehicleOutSideView.current = _.clone(_.find(debtVehicleOutSideView.dataTransport, function (o) {
                        return o.id == transportId;
                    }), true);
                    $("#modal-notification").find(".modal-title").html("Có chắc muốn trả đủ cho đơn hàng này không?");
                    tr = '<div class="row">';
                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="debtVehicleOutSideView.autoEditTransport(' + transportId + ')">';
                    tr += 'Đồng ý';
                    tr += '</button>';
                    tr += '<button type="button" class="btn default" onclick="debtVehicleOutSideView.displayModal(\'hide\', \'#modal-notification\')">';
                    tr += 'Huỷ';
                    tr += '</button>';
                    tr += '</div>';
                    tr += '</div>';
                    $("#modal-notification").find(".modal-body").html(tr);
                    debtVehicleOutSideView.displayModal('show', '#modal-notification');
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
                savePayMore: function () {
                    debtVehicleOutSideView.currentPayMore = null;
                    var sendToServer = null;
                    debtVehicleOutSideView.fillFormDataToCurrentObjectPayMore();
                    sendToServer = {
                        _token: _token,
                        _payMore: debtVehicleOutSideView.currentPayMore
                    };
                    $.ajax({
                        url: url + 'pay-more/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {

                        if (jqXHR.status == 201) {
                            debtVehicleOutSideView.dataTransport = data['transports'];
                            debtVehicleOutSideView.dataDebtTransport = data['debtTransports'];
                            debtVehicleOutSideView.arrayCostDataVehicle = data['arrayCostDataVehicle'];
                            debtVehicleOutSideView.invoiceCode = data['invoiceCode'];
                            debtVehicleOutSideView.dataInvoiceGarage = data['invoiceGarages'];
                            debtVehicleOutSideView.dataDetailPTT = data['invoiceGarageDetails'];
                            debtVehicleOutSideView.fillDataToDatatable(debtVehicleOutSideView.dataTransport);
                            debtVehicleOutSideView.fillDataToDatatableTransportCost(debtVehicleOutSideView.arrayCostDataVehicle);
                            debtVehicleOutSideView.fillDataToDatatableInvoiceGarage(debtVehicleOutSideView.dataInvoiceGarage);
                            debtVehicleOutSideView.fillDataToDatatableDebtTransport(debtVehicleOutSideView.dataDebtTransport);
                            debtVehicleOutSideView.firstDay = data['firstDay'];
                            debtVehicleOutSideView.lastDay = data['lastDay'];
                            debtVehicleOutSideView.setCurrentMonth();
                            debtVehicleOutSideView.search('transport');
                            debtVehicleOutSideView.search('vehicleCost');
                            debtVehicleOutSideView.search('PTT');
                            debtVehicleOutSideView.search('pay');
                            debtVehicleOutSideView.renderAutoCompleteSearch(); //Show notification
                            showNotification("success", "Thanh toán thành công!");
                            debtVehicleOutSideView.displayModal("hide", "#modal-notification");
                            debtVehicleOutSideView.hideControl();
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                saveInvoiceGarage: function () {
                    debtVehicleOutSideView.validateForm();
                    if ($("#frmInvoice").valid()) {
                        debtVehicleOutSideView.fillFormDataToCurrentObject();
                        var sendToServer = {
                            _token: _token,
                            _action: debtVehicleOutSideView.action,
                            _invoiceGarage: debtVehicleOutSideView.currentInvoiceGarage,
                            _array_transportId: debtVehicleOutSideView.array_transportId
                        };
                        $.ajax({
                            url: url + 'invoice-garage/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                debtVehicleOutSideView.dataTransport = data['transports'];
                                debtVehicleOutSideView.dataDebtTransport = data['debtTransports'];
                                debtVehicleOutSideView.arrayCostDataVehicle = data['arrayCostDataVehicle'];
                                debtVehicleOutSideView.invoiceCode = data['invoiceCode'];
                                debtVehicleOutSideView.dataInvoiceGarage = data['invoiceGarages'];
                                debtVehicleOutSideView.dataDetailPTT = data['invoiceGarageDetails'];
                                debtVehicleOutSideView.fillDataToDatatable(debtVehicleOutSideView.dataTransport);
                                debtVehicleOutSideView.fillDataToDatatableTransportCost(debtVehicleOutSideView.arrayCostDataVehicle);
                                debtVehicleOutSideView.fillDataToDatatableInvoiceGarage(debtVehicleOutSideView.dataInvoiceGarage);
                                debtVehicleOutSideView.fillDataToDatatableDebtTransport(debtVehicleOutSideView.dataDebtTransport);
                                debtVehicleOutSideView.firstDay = data['firstDay'];
                                debtVehicleOutSideView.lastDay = data['lastDay'];
                                debtVehicleOutSideView.setCurrentMonth();
                                debtVehicleOutSideView.search('transport');
                                debtVehicleOutSideView.search('vehicleCost');
                                debtVehicleOutSideView.search('PTT');
                                debtVehicleOutSideView.search('pay');
                                debtVehicleOutSideView.renderAutoCompleteSearch();
                                if (debtVehicleOutSideView.action == 'new') {
                                    //clear Input
                                    debtVehicleOutSideView.clearInput();
                                    debtVehicleOutSideView.clearValidation("#frmInvoice");
                                    debtVehicleOutSideView.hideControl();
                                    debtVehicleOutSideView.deselectAll();
                                    //Show notification
                                    showNotification("success", "Tạo Hóa đơn thành công!");
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
                save: function (payTransport) {
                    var sendToServer = {
                        _token: _token,
                        _transport: debtVehicleOutSideView.current.id,
                        _pay: payTransport
                    };
                    $.ajax({
                        url: url + 'debt-garage/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            debtVehicleOutSideView.dataTransport = data['transports'];
                            debtVehicleOutSideView.dataDebtTransport = data['debtTransports'];
                            debtVehicleOutSideView.arrayCostDataVehicle = data['arrayCostDataVehicle'];
                            debtVehicleOutSideView.invoiceCode = data['invoiceCode'];
                            debtVehicleOutSideView.dataInvoiceGarage = data['invoiceGarages'];
                            debtVehicleOutSideView.dataDetailPTT = data['invoiceGarageDetails'];
                            debtVehicleOutSideView.dataDetailPTT = data['invoiceGarageDetails'];
                            debtVehicleOutSideView.fillDataToDatatable(debtVehicleOutSideView.dataTransport);
                            debtVehicleOutSideView.fillDataToDatatableTransportCost(debtVehicleOutSideView.arrayCostDataVehicle);
                            debtVehicleOutSideView.fillDataToDatatableInvoiceGarage(debtVehicleOutSideView.dataInvoiceGarage);
                            debtVehicleOutSideView.fillDataToDatatableDebtTransport(debtVehicleOutSideView.dataDebtTransport);
                            debtVehicleOutSideView.firstDay = data['firstDay'];
                            debtVehicleOutSideView.lastDay = data['lastDay'];
                            debtVehicleOutSideView.setCurrentMonth();
                            debtVehicleOutSideView.search('transport');
                            debtVehicleOutSideView.search('vehicleCost');
                            debtVehicleOutSideView.search('PTT');
                            debtVehicleOutSideView.search('pay');
                            debtVehicleOutSideView.renderAutoCompleteSearch();
                            //clear Input
                            debtVehicleOutSideView.clearInput();
                            debtVehicleOutSideView.clearSearch('transport');
                            debtVehicleOutSideView.clearSearch('vehicleCost');

                            //Show notification
                            showNotification("success", "Thanh toán thành công!");
                            debtVehicleOutSideView.displayModal("hide", "#modal-notification");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },


                search: function (temp) {
                    var found = null;
                    if (temp == 'transport') {
                        found = debtVehicleOutSideView.searchDateTransport(debtVehicleOutSideView.dataTransport);
                        found = debtVehicleOutSideView.searchFullNumberTransport(found);
                        debtVehicleOutSideView.fillDataToDatatable(found);
                    } else if (temp == 'vehicleCost') {
                        found = debtVehicleOutSideView.searchDateCostVehicle(debtVehicleOutSideView.arrayCostDataVehicle);
                        found = debtVehicleOutSideView.searchFullNumberCostVehicle(found);
                        debtVehicleOutSideView.fillDataToDatatableTransportCost(found);

                    } else if (temp == 'PTT') {
                        found = debtVehicleOutSideView.searchDatePTT(debtVehicleOutSideView.dataInvoiceGarage);
                        found = debtVehicleOutSideView.searchFullNumberPTT(found);
                        found = debtVehicleOutSideView.searchStatusMoneyPTT(found);
                        debtVehicleOutSideView.fillDataToDatatableInvoiceGarage(found);

                    } else if (temp == 'pay') {
                        found = debtVehicleOutSideView.searchDatePay(debtVehicleOutSideView.dataDebtTransport);
                        found = debtVehicleOutSideView.searchFullNumberPay(found);
                        debtVehicleOutSideView.fillDataToDatatableDebtTransport(found);

                    }
                },
/////////////////searchPTT

                searchDatePTT: function (data) {
                    var fromDate = $("#dateSearchPTT").find(".start").val();
                    var toDate = $("#dateSearchPTT").find(".end").val();
                    if (fromDate == '' || toDate == '')
                        return data;

                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid())
                        return data;

                    var found = _.filter(data, function (o) {
                        var dateFind = moment(o['exportDate'], "YYYY-MM-DD H:m:s");
                        dateFind.hour(0);
                        dateFind.minute(0);
                        dateFind.second(0);
                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
                    });
                    return found;
                },
                searchFullNumberPTT: function (data) {
                    var custName = $("#fullNumber_PTT").val();
                    if (custName == '')
                        return data;
                    var found = _.filter(data, function (o) {
                        if (o['fullNumber'] == null)
                            return false;
                        else
                            return removeDiacritics(o['fullNumber'].toLowerCase()).includes(removeDiacritics(custName.toLowerCase()));
                    });
                    return found;
                },
                searchStatusMoneyPTT: function (data) {
                    var money = $("input[name=rdoPTT]:checked").val();
                    // All, StillDebt, FullPay

                    var found = _.filter(data, function (o) {
                        if (money == 'FullPay') {
                            return o['debt'] == 0;
                        } else if (money == 'StillDebt') {
                            return o['debt'] > 0;
                        } else {
                            return true;
                        }
                    });
                    return found;
                },
                setCurrentMonth: function () {
                    $("#dateSearchPTT").find(".start").datepicker('update', debtVehicleOutSideView.firstDay);
                    $("#dateSearchPTT").find(".end").datepicker('update', debtVehicleOutSideView.lastDay);
                    $("#dateSearchTransport").find(".start").datepicker('update', debtVehicleOutSideView.firstDay);
                    $("#dateSearchTransport").find(".end").datepicker('update', debtVehicleOutSideView.lastDay);
                    $("#dateSearchVehicleCost").find(".start").datepicker('update', debtVehicleOutSideView.firstDay);
                    $("#dateSearchVehicleCost").find(".end").datepicker('update', debtVehicleOutSideView.lastDay);
                    $("#dateSearchPay").find(".start").datepicker('update', debtVehicleOutSideView.firstDay);
                    $("#dateSearchPay").find(".end").datepicker('update', debtVehicleOutSideView.lastDay);


                },
                /////////////////searchPTT

                searchDateTransport: function (data) {
                    var fromDate = $("#dateSearchTransport").find(".start").val();
                    var toDate = $("#dateSearchTransport").find(".end").val();
                    if (fromDate == '' || toDate == '')
                        return data;
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid())
                        return data;

                    var found = _.filter(data, function (o) {
                        var dateFind = moment(o['receiveDate'], "YYYY-MM-DD H:m:s");
                        dateFind.hour(0);
                        dateFind.minute(0);
                        dateFind.second(0);
                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
                    });
                    return found;
                },
                searchFullNumberTransport: function (data) {
                    var vehicle = $("#fullNumber_transport").val();
                    if (vehicle == '')
                        return data;
                    var found = _.filter(data, function (o) {
                        if (o['fullNumber'] == null)
                            return false;
                        else
                            return removeDiacritics(o['fullNumber'].toLowerCase()).includes(removeDiacritics(vehicle.toLowerCase()));
                    });
                    return found;
                },

                /////////////////search chi phí
                searchDateCostVehicle: function (data) {
                    var fromDate = $("#dateSearchVehicleCost").find(".start").val();
                    var toDate = $("#dateSearchVehicleCost").find(".end").val();
                    if (fromDate == '' || toDate == '')
                        return data;
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid())
                        return data;

                    var found = _.filter(data, function (o) {
                        var dateFind = moment(o['receiveDate'], "YYYY-MM-DD H:m:s");
                        dateFind.hour(0);
                        dateFind.minute(0);
                        dateFind.second(0);
                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
                    });
                    return found;
                },
                searchFullNumberCostVehicle: function (data) {
                    var vehicle = $("#fullNumber_cost").val();
                    if (vehicle == '')
                        return data;
                    var found = _.filter(data, function (o) {
                        if (o['fullNumber'] == null)
                            return false;
                        else
                            return removeDiacritics(o['fullNumber'].toLowerCase()).includes(removeDiacritics(vehicle.toLowerCase()));
                    });
                    return found;
                },
                /////////////////search trả đủ
                searchDatePay: function (data) {
                    var fromDate = $("#dateSearchPay").find(".start").val();
                    var toDate = $("#dateSearchPay").find(".end").val();
                    if (fromDate == '' || toDate == '')
                        return data;
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");
                    if (!fromDate.isValid() && !toDate.isValid())
                        return data;

                    var found = _.filter(data, function (o) {
                        var dateFind = moment(o['receiveDate'], "YYYY-MM-DD H:m:s");
                        dateFind.hour(0);
                        dateFind.minute(0);
                        dateFind.second(0);
                        return moment(dateFind).isBetween(fromDate, toDate, null, '[]');
                    });
                    return found;
                },
                searchFullNumberPay: function (data) {
                    var vehicle = $("#fullNumber_Pay").val();
                    if (vehicle == '')
                        return data;

                    var found = _.filter(data, function (o) {

                        if (o['fullNumber'] == null)
                            return false;
                        else
                            return removeDiacritics(o['fullNumber'].toLowerCase()).includes(removeDiacritics(vehicle.toLowerCase()));
                    });
                    return found;
                }


            };
            debtVehicleOutSideView.loadData();
        } else {
            debtVehicleOutSideView.loadData();
        }
    });
</script>
