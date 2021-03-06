<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 12%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divControl .panel-body {
        height: 510px;
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

    .ui-autocomplete {
        z-index: 1510 !important;
    }

    span:hover {
        color: blue;
    }
</style>

<!-- Begin Table Transport -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL khách hàng</a></li>
                        <li class="active">Đơn hàng</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed" id="button-box">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="transportView.addTransport();">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                        <div class="btn btn-primary btn-circle btn-md" style="display: none" title="Ẩn thêm mới"
                             onclick="transportView.displayControl('hide');">
                            <i class="glyphicon glyphicon-minus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div id="control-box" style="display: none">
                        <div class="row" style="height: auto;">
                            <div class="col-md-12" style="height: auto;">
                                <form id="frmControl">
                                    <fieldset>
                                        <legend>Đơn hàng:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-size: 13px;">ĐH khống: </span>
                                            <input type="checkbox" id="transportType" name="transportType"
                                                   onchange="transportView.checked_TransportType(this)">
                                        </legend>
                                        <div class="row" style="padding: 0 10px">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="customer_id" class="red"><b>Khách hàng</b></label>
                                                    <input type="text" class="form-control" id="customer_id" name="customer_id"
                                                        placeholder="Nhập tên khách hàng" data-customerId=""
                                                        onfocusout="transportView.focusOut_getCustomer()">
                                                    <input type="hidden" id="formula_id">
                                                </div>
                                            </div>
                                        </div>
                                        <fieldset style="margin: 10px 10px">
                                            <legend>Chi tiết công thức: </legend>
                                            <div class="row" style="padding: 0 10px" id="formula-detail">
                                                
                                            </div>
                                        </fieldset>
                                        <div class="row" style="padding: 0 10px">
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="vehicle_id" class="red"><b>Xe</b></label>
                                                    <input type="text" class="form-control" id="vehicle_id"
                                                           name="vehicle_id"
                                                           placeholder="Nhập số xe" data-vehicleId="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="receiveDate" class="red"><b>Ngày vận chuyển</b></label>
                                                    <input type="text" class="date form-control ignore" id="transportDate" name="transportDate">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="paymentDate" class="red"><b>Ngày thanh toán</b></label>
                                                    <input type="text" class="date form-control ignore" id="paymentDate" name="paymentDate">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="receivePlace" class="red"><b>Nơi nhận</b></label>
                                                    <input type="text" class="form-control" id="receivePlace"
                                                           name="receivePlace">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="deliveryPlace" class="red"><b>Nơi giao</b></label>
                                                    <input type="text" class="form-control" id="deliveryPlace"
                                                           name="deliveryPlace">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="quantumProduct"><b>Lượng hàng</b></label>
                                                    <input type="number" class="form-control" id="quantumProduct" name="quantumProduct">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="unitPrice" class="red"><b>Đơn giá</b></label>
                                                    <input type="text" class="form-control currency" id="unitPrice" name="unitPrice" data-customerId="" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="carrying"><b>Bốc xếp</b></label>
                                                    <input type="text" name="carrying" id="carrying"
                                                           class="form-control currency">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="parking"><b>Neo đêm</b></label>
                                                    <input type="text" name="parking" id="parking"
                                                           class="form-control currency">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="fine"><b>Công an</b></label>
                                                    <input type="text" name="fine" id="fine" class="form-control currency">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="phiTangBo"><b>Phí tăng bo</b></label>
                                                    <input type="text" name="phiTangBo" id="phiTangBo" class="form-control currency">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="addScore"><b>Thêm điểm</b></label>
                                                    <input type="text" name="addScore" id="addScore" class="form-control currency">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input ">
                                                    <label for="cashRevenue" class="red"><b>Doanh thu</b></label>
                                                    <input type="text" class="form-control currency" id="cashRevenue" name="cashRevenue">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="cashDelivery" class="red"><b>Giao xe</b></label>
                                                    <input type="text" class="form-control currency" id="cashDelivery"
                                                           name="cashDelivery">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="cashReceive" class="red"><b>Nhận</b></label>
                                                    <input type="text" class="form-control currency" id="cashReceive"
                                                           name="cashReceive"
                                                           onkeyup="transportView.computeWhenCashReceiveChange(this.value)">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input ">
                                                    <label for="product_name"><b>Hàng</b></label>
                                                    <div class="ui-widget">
                                                        <input type="text" class="form-control" id="product_name"
                                                               name="product_name" data-productId=""
                                                               placeholder="Nhập tên hàng">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="productCode"><b>Mã hàng</b></label>
                                                    <input type="text" class="form-control" id="productCode" name="productCode">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="weight"><b>Trọng tải</b></label>
                                                    <input type="number" class="form-control" id="weight" name="weight">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="receiveDate" class="red"><b>Ngày nhận</b></label>
                                                    <input type="text" class="date form-control ignore" id="receiveDate"
                                                           name="receiveDate">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="receiver"><b>Người nhận</b></label>
                                                    <input type="text" class="form-control" id="receiver" name="receiver">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="voucherNumber"><b>Số chứng từ</b></label>
                                                    <input type="text" class="form-control" id="voucherNumber"
                                                           name="voucherNumber">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="voucherQuantumProduct"><b>Số hàng chứng từ</b></label>
                                                    <input type="number" class="form-control" id="voucherQuantumProduct"
                                                           name="voucherQuantumProduct">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="voucher_transport"><b>Số chứng từ nhận</b></label>
                                                    <div class="row">
                                                        <div class="col-xs-9">
                                                            <input type="text" class="form-control cursor-copy"
                                                                   id="voucher_transport" data-id="" readonly
                                                                   name="voucher_transport"
                                                                   placeholder="Nhấp đôi để chọn chứng từ"
                                                                   ondblclick="transportView.loadListVoucher()">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="btn btn-primary btn-sm btn-circle"
                                                                 title="Thêm mới chứng từ"
                                                                 onclick="transportView.displayModal('show', '#modal-addVoucher')">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="costNote"><b>Ghi chú chi phí</b></label>
                                                    <textarea type="text" class="form-control" id="costNote" name="costNote"
                                                              rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group form-md-line-input">
                                                    <label for="note"><b>Ghi chú đơn hàng</b></label>
                                                    <textarea type="text" class="form-control" id="note" name="note"
                                                              rows="3"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="padding: 0 10px">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for=""></label>
                                                    <div class="form-actions">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary marginRight"
                                                                    onclick="transportView.save()">Hoàn tất
                                                            </button>
                                                            <button type="button" class="btn btn-info" id="attach-file"
                                                                    onclick="transportView.showFormAttachFile()">Thêm tập
                                                                tin
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Đơn hàng -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead text-primary text-left"><strong>Đơn hàng</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="dateOnlySearch">
                                <input type="text" class="date start"/> đến
                                <input type="text" class="date end"/>
                                <button onclick="transportView.searchFromDateToDate()" class="btn btn-sm btn-info"><i
                                            class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button onclick="transportView.clearSearch()" class="btn btn-sm btn-default"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                </button>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="table-data">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã</th>
                                        <th>STT</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày vận chuyển</th>
                                        <th>Số xe</th>
                                        <th>Nơi nhận</th>
                                        <th>Nơi giao</th>
                                        <th>Lượng hàng</th>
                                        <th>Đơn giá</th>
                                        <th>Bốc xếp</th>
                                        <th>Neo đêm</th>
                                        <th>Công an</th>
                                        <th>Phí tăng bo</th>
                                        <th>Thêm điểm</th>
                                        <th>Nhận</th>
                                        <th id="showRevenue">Doanh thu</th>
                                        <th id="showProfit">Lợi nhuận</th>
                                        <th>Sửa/ Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Đơn hàng cần thanh toán -->
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead text-primary text-left"><strong>Đơn hàng cần thanh toán</strong></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p id="search-paymentDate">
                                <input type="text" class="date start"/> đến
                                <input type="text" class="date end"/>
                                <button onclick="transportView.searchFromDateToDate_PaymentDate()" class="btn btn-sm btn-info">
                                    <i class="fa fa-search" aria-hidden="true"></i> Tìm
                                </button>
                                <button onclick="transportView.clearSearch_PaymentDate()" class="btn btn-sm btn-default">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                                </button>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="table-paymentDate">
                                    <thead>
                                    <tr class="active">
                                        <th>Mã</th>
                                        <th>STT</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày vận chuyển</th>
                                        <th>Số xe</th>
                                        <th>Nơi nhận</th>
                                        <th>Nơi giao</th>
                                        <th>Lượng hàng</th>
                                        <th>Đơn giá</th>
                                        <th>Bốc xếp</th>
                                        <th>Neo đêm</th>
                                        <th>Công an</th>
                                        <th>Phí tăng bo</th>
                                        <th>Thêm điểm</th>
                                        <th>Nhận</th>
                                        <th id="showRevenue">Doanh thu</th>
                                        <th id="showProfit">Lợi nhuận</th>
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
<!-- End Table Transport -->

<!-- Modal confirm delete Transport -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa đơn hàng này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="transportView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="transportView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Transport -->

<!-- Modal list vehicles -->
<div class="row">
    <div id="modal-vehicle" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách xe</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-vehicle" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Mã xe</th>
                                <th>Số xe</th>
                                <th>Loại xe</th>
                                <th>Nhà xe</th>
                                <th>Kích thước</th>
                                <th>Trọng tải</th>
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
<!-- end Modal list vehicles -->

<!-- Modal list customers -->
<div class="row">
    <div id="modal-customer" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách khách hàng</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-customer" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Mã khách hàng</th>
                                <th>Loại khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Mã số thuế</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
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
<!-- end Modal list customers -->

<!-- Modal list products -->
<div class="row">
    <div id="modal-product" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách nhà xe</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-product" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Mã hàng</th>
                                <th>Loại hàng</th>
                                <th>Tên hàng</th>
                                <th>Mô tả</th>
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
<!-- end Modal list products -->

<!-- Modal list vouchers -->
<div class="row">
    <div id="modal-voucher" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách nhà xe</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-voucher" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Mã chứng từ</th>
                                <th>Tên chứng từ</th>
                                <th>Mô tả</th>
                                <th>Chọn</th>
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
<!-- end Modal list vouchers -->

<!-- Modal add vehicleTypes -->
<div class="row">
    <div id="modal-addVoucher" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm chứng từ</h4>
                </div>
                <div class="modal-body">
                    <form id="frmVoucher">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="Voucher_name"><b>Tên chứng từ</b></label>
                                    <input type="text" class="form-control"
                                           id="Voucher_name"
                                           name="Voucher_name">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="description"><b>Mô tả</b></label>
                                    <textarea name="description" id="description" cols="10" rows="3"
                                              class="form-control">
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="transportView.saveVoucher()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="transportView.displayModal('hide','#modal-addVoucher')">Huỷ
                                        </button>
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
<!-- end Modal add vehicleTypes -->

<!-- Modal warningTransport -->
<div class="row">
    <div id="modal-warningTransport" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Cảnh báo</h5>
                </div>
                <div class="modal-body">
                    <p class="bg-warning" style="padding: 10px">Đơn hàng này đã xuất hóa đơn.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal warningTransport -->

<!-- Modal add Product -->
<div class="row">
    <div id="modal-addProduct" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Thêm hàng</h5>
                </div>
                <div class="modal-body">
                    <form id="frmProduct">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group form-md-line-input">
                                    <label for="productName"><b>Tên hàng</b></label>
                                    <input type="text" class="form-control"
                                           id="productName"
                                           name="productName">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input">
                                    <label for="product-code"><b>Mã hàng</b></label>
                                    <input type="text" class="form-control"
                                           id="product-code"
                                           name="product-code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="productType_id"><b>Loại hàng</b></label>
                                    <input name="productType_id" data-id="" id="productType_id" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="description"><b>Mô tả</b></label>
                                    <textarea name="description" id="description" cols="10" rows="3"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="transportView.saveProduct()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="
                                    $('input[id=product_name]').val('');
                                    $('#product_name').attr('data-productId', '');
                                    transportView.displayModal('hide','#modal-addProduct')">Huỷ
                                        </button>
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
<!-- end add Product -->

<!-- Modal notification -->
<div class="row">
    <div id="modal-notification" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal notification -->

<!-- Modal attach file -->
<div class="row">
    <div id="modal-attachFile" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Thêm tập tin cho đơn hàng</h5>
                </div>
                <div class="modal-body">
                    <form id="upload" onsubmit="return false;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="transportId" id="transportId" value="">
                        <label for="file">Chọn tập tin:</label>
                        <input type="file" id="file" name="file[]" multiple class="form-control">
                    </form>
                    <h5>Danh sách tập tin</h5>
                    <table class="table table-bordered table-hover table-striped" id="table-file">
                        <thead>
                        <tr class="active">
                            <th>Mã</th>
                            <th>Tên tập tin</th>
                            <th>Xem</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <hr>
                    <div id="thumbnail">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal attach file -->

<script>
    $(function () {
        if (typeof transportView === 'undefined') {
            transportView = {
                table: null,
                tableVoucher: null,
                tableFile: null,
                tablePaymentDate: null,

                dataTransport: null,
                dataVehicle: null,
                dataCustomer: null,
                dataProduct: null,
                dataVoucher: null,
                dataVoucherTransport: null,
                dataStatus: null,
                dataCostPrice: null,
                dataProductType: null,
                dataFormula: null,
                dataFormulaDetail: null,
                dataTransportFormulaDetail: null,
                dataFuel: null,
                dataProductCode: null,

                tagsProductName: [],
                tagsCustomerName: [],
                tagsVehicleName: [],
                tagsProductType: [],
                tagsProductCode: [],
                tagsValueFormulaDetail: [],

                arrayVoucher: {},
                current: null,
                currentFormula: [],
                currentFormulaDetail: [],
                formulaDetail: [],
                action: null,
                idDelete: null,
                transportType: 0,
                isAdmin: null,
                oilPrice: null,
                vndPerXe: false,
                firstDay: null,
                lastDay: null,
                today: null,
                text2: null,
                quantumTransportNeedPayment: 0,

                displayControl: function (mode) {
                    if (mode === 'show') {
                        $("#control-box").fadeIn(300);
                        $("#button-box div").eq(0).fadeOut(0);
                        $("#button-box div").eq(1).fadeIn(0);
                    } else {
                        $("#control-box").fadeOut(300);
                        $("#button-box div").eq(0).fadeIn(0);
                        $("#button-box div").eq(1).fadeOut(0);
                        transportView.clearValidation("#frmControl");
                        transportView.clearInput();
                    }
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (transportView.action == 'delete' && type == 'hide') {
                        transportView.action = null;
                        transportView.idDelete = null;
                    }

                    //Clear Validate
                },
                clearInput: function () {
                    $("input[id='my-id']").val('');
                    $("#my-id").attr("data-id", "");
                    $("input[id='customer_id']").val('');
                    $("#customer_id").attr("data-customerId", "");
                    $("input[id='product_name']").val('');
                    $("#product_name").attr("data-productId", "");
                    $("input[id='quantumProduct']").val(0);
                    $("input[id='weight']").val('');
                    $("input[id='cashRevenue']").val(0);
                    $("input[id='cashDelivery']").val(0);
                    $("input[id='cashPreDelivery']").val(0);
                    $("input[id='cashReceive']").val(0);
                    $("input[id='receiver']").val('');
                    $("input[id='receivePlace']").val('');
                    $("input[id='deliveryPlace']").val('');
                    $("input[id='voucherNumber']").val('');
                    $("input[id='voucherQuantumProduct']").val('');
                    $("textarea[id='note']").val('');
                    $("input[id='voucher_transport']").val('');
                    $("input[id='voucher_transport']").attr("voucher_transport", "");
                    $("input[id='cost']").val(0);
                    $("input[id=carrying]").val(0);
                    $("input[id=parking]").val(0);
                    $("input[id=fine]").val(0);
                    $("input[id=phiTangBo]").val(0);
                    $("input[id=addScore]").val(0);
                    $("textarea[id=costNote]").val('');
                    $("input[id=transportType]").attr('checked', false);
                    $("input[id=unitPrice]").val(0);
                    $("input[id=unit]").val('');
                    $("input[id=formulaCode]").val('');
                    $("input[id=productCode]").val('');
                    $("#formula-detail").html("");

                    transportView.arrayVoucher = {};
                },

                renderDateTimePicker: function () {
                    $('#dateOnlySearch .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#search-paymentDate .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });

                    var dateOnlySearchEl = document.getElementById('dateOnlySearch');
                    var dateOnlyDatepair = new Datepair(dateOnlySearchEl);

                    $('#receiveDate').datepicker({
                        setDate: new Date(),
                        format: 'dd-mm-yyyy',
                        autoclose: true
                    }).on("input change", function (e) {
                        
                    });

                    $('#paymentDate').datepicker({
                        setDate: new Date(),
                        format: 'dd-mm-yyyy',
                        autoclose: true
                    }).on("input change", function (e) {
                        
                    });

                    $('#transportDate').datepicker({
                        setDate: new Date(),
                        format: 'dd-mm-yyyy',
                        autoclose: true
                    }).on("input change", function (e) {
                        if(typeof transportView.formulaDetail === 'undefined')
                            return;

                        var flag = false;
                        for(var i in transportView.formulaDetail) {
                            if(transportView.formulaDetail[i]['rule'] == 'O') {
                                flag = true;
                                transportView.getUsingFuel($("#transportDate").val());
                                $("#id_" + transportView.formulaDetail[i]['id']).val(transportView.oilPrice);
                            }
                        }

                        if(flag) {
                            transportView.focusOut_getFormula();
                        }
                        
                    });
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                renderEventTableModal: function () {
                    $("#table-vehicle").find("tbody").on('click', 'tr', function () {
                        $('#vehicle_id').attr('data-id', $(this).find('td:first')[0].innerText);
                        $('input[id=vehicle_id]').val($(this).find('td:eq(1)')[0].innerText);
                        transportView.displayModal("hide", "#modal-vehicle");
                    });
                    $("#table-customer").find("tbody").on('click', 'tr', function () {
                        var cust_id = $(this).find('td:first')[0].innerText;
                        $('#customer_id').attr('data-customerId', cust_id);
                        $('input[id=customer_id]').val($(this).find('td:eq(2)')[0].innerText);
                        transportView.displayModal("hide", "#modal-customer");

                    });
                    $("#table-product").find("tbody").on('click', 'tr', function () {
                        $('#product_id').attr('data-productId', $(this).find('td:first')[0].innerText);
                        $('input[id=product_id]').val($(this).find('td:eq(2)')[0].innerText);
                        transportView.displayModal("hide", "#modal-product");
                    });
                    $('#table-voucher').on('draw.dt', function () {
                        transportView.fillVoucher();
                    });
                },
                renderEventFocusOut: function () {
                    $("#product_name").focusout(function () {
                        if (transportView.transportType === 1)
                            return;
                        var productName = this.value;
                        if (productName == '') {
                            transportView.loadListProductCode(0);
                            return;
                        } 
                        var product = _.find(transportView.dataProduct, function (o) {
                            return o.name == productName;
                        });
                        if (typeof product === "undefined") {
                            transportView.displayModal("show", "#modal-addProduct");
                            transportView.loadListProductType();
                            $("input[id=productName]").val(productName);
                            $("input[id=productName]").attr('data-productId', '');

                            transportView.loadListProductCode(0);
                        } else {
                            $("#product_name").attr("data-productId", product.id);

                            transportView.loadListProductCode(product.id);
                        }
                    });
                    $("#vehicle_id").focusout(function () {
                        if (transportView.transportType === 1)
                            return;
                        fullNumber = this.value;
                        if (fullNumber == '') return;
                        vehicle = _.find(transportView.dataVehicle, function (o) {
                            return o.fullNumber == fullNumber;
                        });
                        if (typeof vehicle === "undefined") {
                            $("#modal-notification").find(".modal-title").html("Số xe <label class='text text-danger'>" + fullNumber + "</label> không tồn tại");
                            transportView.displayModal('show', '#modal-notification');
                            $("input[id=vehicle_id]").val('');
                            $("#vehicle_id").attr("data-id", '');
                        } else {
                            $("#vehicle_id").attr("data-id", vehicle.id);
                        }
                    });
                },
                renderEventChange: function(){
                    $("#carrying").keyup(function () {
                        transportView.computeWhenCostChange();
                    });
                    $("#parking").keyup(function () {
                        transportView.computeWhenCostChange();
                    });
                    $("#fine").keyup(function () {
                        transportView.computeWhenCostChange();
                    });
                    $("#phiTangBo").keyup(function () {
                        transportView.computeWhenCostChange();
                    });
                    $("#addScore").keyup(function () {
                        transportView.computeWhenCostChange();
                    });
                    $("#quantumProduct").keyup(function() {
                        transportView.computeWhenChangeQuantumProduct(this.value);
                    });
                },
                checked_TransportType: function (cb) {
                    transportView.transportType = (cb.checked) ? 1 : 0;
                },

                reloadData: function(data){
                    transportView.dataTransport = data['transports'];
                    transportView.dataVoucherTransport = data['voucherTransports'];
                    transportView.dataVoucher = data['vouchers'];
                    transportView.dataStatus = data['statuses'];
                    transportView.dataCostPrice = data['costPrices'];
                    transportView.dataFormula = data['formulas'];
                    transportView.dataFormulaDetail = data['formulaDetails'];
                    transportView.dataTransportFormulaDetail = data['transportFormulaDetails'];
                    transportView.oilPrice = data['oilPrice'];
                    transportView.dataFuel = data['fuels'];
                    transportView.isAdmin = data['isAdmin'];
                    transportView.firstDay = data['firstDay'];
                    transportView.lastDay = data['lastDay'];
                    transportView.today = data['today'];
                    transportView.dataProductCode = data['productCodes'];
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'transport/transports',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            transportView.reloadData(data);
                            transportView.fillDataToDatatable(transportView.dataTransport);
                            transportView.fillDataToDatatable_PaymentDate(transportView.dataTransport);
                            transportView.setCurrentMonth();
                            $("#search-paymentDate").find(".start").datepicker('update', transportView.today);
                            $("#search-paymentDate").find(".end").datepicker('update', transportView.today);
                            transportView.searchFromDateToDate();
                            transportView.searchFromDateToDate_PaymentDate();

                            $("#receiveDate").datepicker('update', transportView.today);
                            $("#transportDate").datepicker('update', transportView.today);
                            $("#paymentDate").datepicker('update', transportView.today);

                            if(transportView.quantumTransportNeedPayment > 0){
                                showNotification('info', 'Có ' + transportView.quantumTransportNeedPayment + ' đơn hàng cần thanh toán trong hôm nay.');
                            }
                            
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    transportView.renderDateTimePicker();
                    transportView.renderScrollbar();
                    transportView.renderEventTableModal();
                    transportView.renderEventFocusOut();
                    transportView.renderEventChange();

                    transportView.loadListProduct();
                    transportView.loadListCustomer();
                    transportView.loadListVehicle();
                    renderAutoCompleteSearch('#receivePlace', array_city);
                    renderAutoCompleteSearch('#deliveryPlace', array_city);

                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    defaultZero("#cashRevenue");
                    defaultZero("#cashDelivery");
                    defaultZero("#cashReceive");
                    defaultZero("#cost");
                    defaultZero("#carrying");
                    defaultZero("#parking");
                    defaultZero("#fine");
                    defaultZero("#phiTangBo");
                    defaultZero("#addScore");
                    defaultZero("#weight");
                    defaultZero("#quantumProduct");
                    defaultZero("#voucherQuantumProduct");
                    defaultZero("#unitPrice");
                },
                loadListVehicle: function () {
                    $.ajax({
                        url: url + 'customer/vehicles',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                        //    for (var i = 0; i < data['vehicles'].length; i++) {
                        //        data['vehicles'][i].fullNumber = data['vehicles'][i]['areaCode'] + "-" + data['vehicles']   [i]['vehicleNumber'];
                        //    }
                            transportView.dataVehicle = data['vehicles'];
                        //    transportView.tagsVehicleName = _.map(transportView.dataVehicle, 'fullNumber');
                        //    transportView.tagsVehicleName = _.union(transportView.tagsVehicleName);
                           // renderAutoCompleteSearch('#vehicle_id', transportView.tagsVehicleName);
                            console.log(transportView.dataVehicle);
                            transportView.text2 = $("#vehicle_id").tautocomplete({
                                width: "350px",
                                columns: ['Số xe','Loại xe', 'Tài xế'],
                                data: function () {
                                    try {
                                        var data = transportView.dataVehicle;
                                    }
                                    catch (e) {
                                        alert(e)
                                    }
                                    var filterData = [];
                                    var searchData = eval("/" + transportView.text2.searchdata() + "/gi");
                                    $.each(data, function (i, v) {
                                        if (v.fullNumber.search(new RegExp(searchData)) != -1) {
                                            filterData.push(v);
                                        }
                                    });

                                    return filterData;
                                },
                                onchange: function () {
                                    $('#my-id').attr('data-id', transportView.text2.id());
                                }
                            });

                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                loadListCustomer: function () {
                    $.ajax({
                        url: url + 'customer/customers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            transportView.dataCustomer = data['customers'];
                            transportView.tagsCustomerName = _.map(transportView.dataCustomer, 'fullName');
                            transportView.tagsCustomerName = _.union(transportView.tagsCustomerName);
                            renderAutoCompleteSearch('#customer_id', transportView.tagsCustomerName);
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                loadListProduct: function () {
                    $.ajax({
                        url: url + 'product/products',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            transportView.dataProduct = data['products'];
                            transportView.tagsProductName = _.map(transportView.dataProduct, 'name');
                            transportView.tagsProductName = _.union(transportView.tagsProductName);
                            renderAutoCompleteSearch('#product_name', transportView.tagsProductName);
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                loadListProductCode: function (product_id) {
                    var lstProductCode = _.filter(transportView.dataProductCode, function(o) {
                        return o['product_id'] == product_id;
                    });
                    transportView.tagsProductCode = _.map(lstProductCode, 'code');
                    transportView.tagsProductCode = _.union(transportView.tagsProductCode);
                    renderAutoCompleteSearch('#productCode', transportView.tagsProductCode);
                },

                loadListVoucher: function () {
                    $.ajax({
                        url: url + 'voucher/vouchers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (transportView.tableVoucher != null) {
                                transportView.tableVoucher.destroy();
                            }
                            transportView.tableVoucher = $('#table-voucher').DataTable({
                                language: languageOptions,
                                data: data['vouchers'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'name'},
                                    {data: 'description'},
                                    {
                                        render: function (data, type, full, meta) {
                                            var tr = '';
                                            tr += '<div class="btn btn-xs btn-primary marginRight" onclick="transportView.increaseVoucher(' + full.id + ')">';
                                            tr += '<i class="fa fa-plus" aria-hidden="true"></i>';
                                            tr += '</div>';
                                            tr += '<span id="voucher_' + full.id + '" data-voucherId="' + full.id + '" class="badge marginRight">0</span>';
                                            tr += '<div class="btn btn-xs btn-primary" onclick="transportView.reduceVoucher(' + full.id + ')">';
                                            tr += '<i class="fa fa-minus" aria-hidden="true"></i>';
                                            tr += '</div>';
                                            return tr;
                                        }
                                    }
                                ]
                            });
                            transportView.dataVoucher = data['vouchers'];
                            if (transportView.arrayVoucher.length > 0) {
                                transportView.fillVoucher();
                            }

                            transportView.displayModal("show", "#modal-voucher");
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                loadSelectBox: function (lstData, strId, propertyName) {
                    //reset selectbox
                    $('#' + strId)
                        .find('option')
                        .remove()
                        .end();
                    //fill option to selectbox
                    var select = document.getElementById(strId);
                    for (var i = 0; i < lstData.length; i++) {
                        var opt = lstData[i][propertyName];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstData[i]['id'];
                        select.appendChild(el);
                    }
                },

                checkVoucher: function (element) {
                    // Method not use anymore
                    var voucherId = $(element).attr("data-voucherId");

                    if ($(element).find("i").hasClass("fa-times")) {
                        //check
                        $(element).removeClass("btn-primary").addClass("btn-success");
                        $(element).find("i").removeClass("fa-times").addClass("fa-check");

                        transportView.arrayVoucher.push(voucherId);

                        var objVoucher = _.clone(_.find(transportView.dataVoucher, function (o) {
                            return o.id == voucherId;
                        }), true);
                        $("input[id='voucher_transport']").val($("input[id='voucher_transport']").val() + objVoucher.name + ", ");
                    } else {
                        //uncheck
                        $(element).removeClass("btn-success").addClass("btn-primary");
                        $(element).find("i").removeClass("fa-check").addClass("fa-times");

                        var index = _.indexOf(transportView.arrayVoucher, voucherId);
                        transportView.arrayVoucher.splice(index, 1);

                        var objVoucher = _.clone(_.find(transportView.dataVoucher, function (o) {
                            return o.id == voucherId;
                        }), true);
                        var strVoucherName = $("input[id='voucher_transport']").val();
                        if (strVoucherName.indexOf(objVoucher.name) >= 0) {
                            strVoucherName = strVoucherName.replace(objVoucher.name + ", ", '');
                        }
                        $("input[id='voucher_transport']").val(strVoucherName);
                    }
                },
                fillVoucher: function () {
                    if (transportView.arrayVoucher.length <= 0) return;

                    for (var item in transportView.arrayVoucher) {
                        var span = $("span[data-voucherId=" + item + "]");
                        span.text(transportView.arrayVoucher[item]);
                    }
                },

                fillDataToDatatable: function (data) {
                    if (transportView.table != null)
                        transportView.table.destroy();

                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['transportType'] === 1) {
                            data[i].fullNumber = data[i]['vehicle_name'];
                            data[i].products_name = data[i]['product_name'];
                            data[i].customers_fullName = data[i]['customer_name'];
                        } else {
                            var fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + "-" + data[i]['vehicles_vehicleNumber'];
                            data[i].fullNumber = fullNumber;
                        }
                        data[i].stt = i + 1;
                    }
                    transportView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {data: 'stt'},
                            {data: 'customers_fullName'},
                            {
                                data: 'transportDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'fullNumber'},
                            {data: 'receivePlace'},
                            {data: 'deliveryPlace'},
                            {data: 'quantumProduct'},
                            {
                                data: 'formula_unitPrice',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'carrying',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'parking',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'fine',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'phiTangBo',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'addScore',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'cashReceive',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'cashRevenue',
                                render: function (data, type, row, meta) {
                                    if (transportView.isAdmin == 1)
                                        return $.fn.dataTable.render.number(",", ".", 0).display(data);
                                    else
                                        return "";
                                },
                                visible: (transportView.isAdmin == 1) ? true : false
                            },
                            {
                                data: 'cashProfit',
                                render: function (data, type, row, meta) {
                                    if (transportView.isAdmin == 1)
                                        return $.fn.dataTable.render.number(",", ".", 0).display(data);
                                    else
                                        return "";
                                },
                                visible: (transportView.isAdmin == 1) ? true : false
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div title="Chỉnh sửa" class="btn btn-success btn-circle" onclick="transportView.editTransport(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '<div title="Xóa" class="btn btn-danger btn-circle" onclick="transportView.deleteTransport(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        columnDefs: [
                            {responsivePriority: 1, targets: 0}, // STT
                            {responsivePriority: 1, targets: 1}, // KH
                            {responsivePriority: 1, targets: 2}, // Ngay van chuyen
                            {responsivePriority: 1, targets: 3}, // Xe
                            {responsivePriority: 1, targets: 4}, // Noi nhan
                            {responsivePriority: 1, targets: 5}, // Noi giao
                            {responsivePriority: 1, targets: 6}, // Luong hang
                            {responsivePriority: 1, targets: 7}, // Don gia
                            {responsivePriority: 10, targets: 8}, // Boc xep
                            {responsivePriority: 10, targets: 9}, // Neo dem
                            {responsivePriority: 10, targets: 10}, // Cong an
                            {responsivePriority: 10, targets: 11}, // Phi tang bo
                            {responsivePriority: 10, targets: 12}, // Them diem
                            {responsivePriority: 10, targets: 13}, // Them diem
                            {responsivePriority: 1, targets: 14}, // Doanh thu
                            {responsivePriority: 1, targets: 15}, // Loi nhuan
                            {responsivePriority: 1, targets: 16} // sua xoa
                        ],
                        responsive: true,
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
                    $("#table-data").css("width", "auto");

                    if (transportView.isAdmin == 1) {
                        $("#showRevenue").removeClass("hide");
                        $("#showProfit").removeClass("hide");
                    }
                    else {
                        $("#showRevenue").addClass("hide");
                        $("#showProfit").addClass("hide");
                    }
                },
                fillDataToDatatable_PaymentDate: function (data) {
                    if (transportView.tablePaymentDate != null)
                        transportView.tablePaymentDate.destroy();

                    for (var i = 0; i < data.length; i++) {
                        if (data[i]['transportType'] === 1) {
                            data[i].fullNumber = data[i]['vehicle_name'];
                            data[i].products_name = data[i]['product_name'];
                            data[i].customers_fullName = data[i]['customer_name'];
                        } else {
                            var fullNumber = (data[i]['vehicles_areaCode'] == null || data[i]['vehicles_vehicleNumber'] == null) ? "" : data[i]['vehicles_areaCode'] + "-" + data[i]['vehicles_vehicleNumber'];
                            data[i].fullNumber = fullNumber;
                        }
                        data[i].stt = i + 1;
                    }
                    transportView.tablePaymentDate = $('#table-paymentDate').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {data: 'stt'},
                            {data: 'customers_fullName'},
                            {
                                data: 'transportDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'fullNumber'},
                            {data: 'receivePlace'},
                            {data: 'deliveryPlace'},
                            {data: 'quantumProduct'},
                            {
                                data: 'formula_unitPrice',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'carrying',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'parking',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'fine',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'phiTangBo',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'addScore',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'cashReceive',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {
                                data: 'cashRevenue',
                                render: function (data, type, row, meta) {
                                    if (transportView.isAdmin == 1)
                                        return $.fn.dataTable.render.number(",", ".", 0).display(data);
                                    else
                                        return "";
                                },
                                visible: (transportView.isAdmin == 1) ? true : false
                            },
                            {
                                data: 'cashProfit',
                                render: function (data, type, row, meta) {
                                    if (transportView.isAdmin == 1)
                                        return $.fn.dataTable.render.number(",", ".", 0).display(data);
                                    else
                                        return "";
                                },
                                visible: (transportView.isAdmin == 1) ? true : false
                            }
                        ],
                        responsive: true,
                        order: [[1, "asc"]],
                        dom: 'frtip',
                    });
                    $("#table-paymentDate").css("width", "auto");
                },
                fillCurrentObjectToForm: function () {
                    transportView.transportType = transportView.current["transportType"];
                    var status = (transportView.transportType === 0) ? false : true;
                    $("input[id=transportType]").attr('checked', status);

                    if (transportView.transportType === 1) {
                        $("input[id=my-id]").val(transportView.current["vehicle_name"]);
                        $("#my-id").attr('data-id', transportView.current["vehicle_id"]);
                        $("input[id=customer_id]").val(transportView.current["customer_name"]);
                        $("#customer_id").attr('data-customerId', transportView.current["customer_id"]);
                        $("input[id=product_name]").val(transportView.current["product_name"]);
                        $("#product_name").attr("data-productId", transportView.current["product_id"]);
                    } else {
                        var fullNumber = (transportView.current["fullNumber"] == null) ? "" : transportView.current["fullNumber"];
                        $("input[id=my-id]").val(fullNumber);
                        $("#my-id").attr('data-id', transportView.current["vehicle_id"]);
                        $("input[id=customer_id]").val(transportView.current["customers_fullName"]);
                        $("#customer_id").attr('data-customerId', transportView.current["customer_id"]);
                        $("input[id=product_name]").val(transportView.current["products_name"]);
                        $("#product_name").attr("data-productId", transportView.current["product_id"]);
                    }

                    $("input[id=quantumProduct]").val(transportView.current["quantumProduct"]);
                    $("input[id=weight]").val(transportView.current["weight"]);
                    $("input[id=cashRevenue]").val(transportView.current["cashRevenue"]);
                    $("input[id=cashDelivery]").val(transportView.current["cashDelivery"]);
                    $("input[id=cashReceive]").val(transportView.current["cashReceive"]);
                    $("input[id=carrying]").val(transportView.current["carrying"]);
                    $("input[id=parking]").val(transportView.current["parking"]);
                    $("input[id=fine]").val(transportView.current["fine"]);
                    $("input[id=phiTangBo]").val(transportView.current["phiTangBo"]);
                    $("input[id=addScore]").val(transportView.current["addScore"]);
                    $("input[id=receiver]").val(transportView.current["receiver"]);

                    var receiveDate = moment(transportView.current["receiveDate"], "YYYY-MM-DD");
                    $("input[id=receiveDate]").datepicker('update', receiveDate.format("DD-MM-YYYY"));
                    var transportDate = moment(transportView.current["transportDate"], "YYYY-MM-DD");
                    $("input[id=transportDate]").datepicker('update', transportDate.format("DD-MM-YYYY"));
                    var paymentDate = moment(transportView.current["paymentDate"], "YYYY-MM-DD");
                    $("input[id=paymentDate]").datepicker('update', paymentDate.format("DD-MM-YYYY"));

                    $("input[id=receivePlace]").val(transportView.current["receivePlace"]);
                    $("input[id=deliveryPlace]").val(transportView.current["deliveryPlace"]);
                    $("input[id=voucherNumber]").val(transportView.current["voucherNumber"]);
                    $("input[id=voucherQuantumProduct]").val(transportView.current["voucherQuantumProduct"]);
                    $("textarea[id=note]").val(transportView.current["note"]);
                    $("select[id=status_transport]").val(transportView.current["status_transport"]);
                    $("textarea[id=costNote]").val(transportView.current["costNote"]);
                    $("input[id=formula_id]").val(transportView.current["formula_id"]);
                    $("input[id=productCode]").val(transportView.current["productCode"]);

                    var strVoucherName = "";
                    for (var item in transportView.arrayVoucher) {
                        var objVoucher = _.clone(_.find(transportView.dataVoucher, function (o) {
                            return o.id == item;
                        }), true);
                        strVoucherName += objVoucher.name + ", ";
                    }
                    $("input[id=voucher_transport]").val(strVoucherName);

                    var formula = _.find(transportView.dataFormula, function (o) {
                        return o.id == transportView.current['formula_id'];
                    });
                    if (typeof formula === 'undefined') return;
                    $("input[id=unitPrice]").val(formula.unitPrice);
                    $("input[id=unit]").val(formula.unit);
                    $("input[id=formulaCode]").val(formula.formulaCode);

                    var formulaDetail = _.filter(transportView.dataFormulaDetail, function (o) {
                        return o.formula_id == formula.id;
                    });
                    if (typeof formulaDetail === 'undefined') return;
                    transportView.appendViewFormulaDetail(formulaDetail);

                    var transportFormulaDetail = _.filter(transportView.dataTransportFormulaDetail, function (o) {
                        return o.transport_id == transportView.current['id'];
                    });
                    if (typeof transportFormulaDetail === 'undefined') return;
                    transportView.setValueFormFormulaDetail(transportFormulaDetail);

                    formatCurrency(".currency");
                },
                fillFormDataToCurrentObject: function () {
                    if (transportView.action == 'add') {
                        transportView.current = {
                            vehicle_id: $("#my-id").attr("data-id"),
                            customer_id: $("#customer_id").attr("data-customerId"),
                            product_id: $("#product_name").attr("data-productId"),
                            quantumProduct: $("input[id=quantumProduct]").val(),
                            weight: $("input[id=weight]").val(),
                            cashRevenue: asNumberFromCurrency("#cashRevenue"),
                            cashDelivery: asNumberFromCurrency("#cashDelivery"),
                            cashReceive: asNumberFromCurrency("#cashReceive"),
                            carrying: asNumberFromCurrency("#carrying"),
                            parking: asNumberFromCurrency("#parking"),
                            fine: asNumberFromCurrency("#fine"),
                            phiTangBo: asNumberFromCurrency("#phiTangBo"),
                            addScore: asNumberFromCurrency("#addScore"),
                            receiver: $("input[id=receiver]").val(),
                            receiveDate: $("input[id=receiveDate]").val(),
                            transportDate: $("input[id=transportDate]").val(),
                            paymentDate: $("input[id=paymentDate]").val(),
                            receivePlace: $("input[id=receivePlace]").val(),
                            deliveryPlace: $("input[id=deliveryPlace]").val(),
                            voucherNumber: $("input[id=voucherNumber]").val(),
                            voucherQuantumProduct: $("input[id=voucherQuantumProduct]").val(),
                            note: $("textarea[id=note]").val(),
                            status_transport: $("select[id=status_transport]").val(),
                            costNote: $("textarea[id=costNote]").val(),
                            voucher_transport: transportView.arrayVoucher,
                            transportType: transportView.transportType,
                            formula_id: $("input[id=formula_id]").val(),
                            productCode: $("input[id=productCode]").val()
                        };
                    } else if (transportView.action == 'update') {
                        transportView.current.vehicle_id = $("#my-id").attr("data-id");
                        transportView.current.customer_id = $("#customer_id").attr("data-customerId");
                        transportView.current.product_id = $("#product_name").attr("data-productId");
                        transportView.current.quantumProduct = $("input[id=quantumProduct]").val();
                        transportView.current.weight = $("input[id=weight]").val();
                        transportView.current.cashRevenue = asNumberFromCurrency("#cashRevenue");
                        transportView.current.cashDelivery = asNumberFromCurrency("#cashDelivery");
                        transportView.current.cashReceive = asNumberFromCurrency("#cashReceive");
                        transportView.current.carrying = asNumberFromCurrency("#carrying");
                        transportView.current.parking = asNumberFromCurrency("#parking");
                        transportView.current.fine = asNumberFromCurrency("#fine");
                        transportView.current.phiTangBo = asNumberFromCurrency("#phiTangBo");
                        transportView.current.addScore = asNumberFromCurrency("#addScore");
                        transportView.current.receiver = $("input[id=receiver]").val();
                        transportView.current.receiveDate = $("input[id=receiveDate]").val();
                        transportView.current.transportDate = $("input[id=transportDate]").val();
                        transportView.current.paymentDate = $("input[id=paymentDate]").val();
                        transportView.current.receivePlace = $("input[id=receivePlace]").val();
                        transportView.current.deliveryPlace = $("input[id=deliveryPlace]").val();
                        transportView.current.voucherNumber = $("input[id=voucherNumber]").val();
                        transportView.current.voucherQuantumProduct = $("input[id=voucherQuantumProduct]").val();
                        transportView.current.note = $("textarea[id=note]").val();
                        transportView.current.status_transport = $("select[id=status_transport]").val();
                        transportView.current.costNote = $("textarea[id=costNote]").val();
                        transportView.current.voucher_transport = transportView.arrayVoucher;
                        transportView.current.transportType = transportView.transportType;
                        transportView.current.formula_id = $("input[id=formula_id]").val();
                        transportView.current.productCode = $("input[id=productCode]").val();
                    }
                    if (transportView.transportType === 1) {
                        transportView.current.vehicle_name = $("input[id=my-id]").val();
                        transportView.current.customer_name = $("input[id=customer_id]").val();
                        transportView.current.product_name = $("input[id=product_name]").val();
                    }
                },

                validateEditTransport(id){
                    var result = false;
                    $.ajax({
                        url: url + 'transport/validate-edit-transport',
                        type: "POST",
                        dataType: "json",
                        data: { _token: _token, id: id },
                        async: false
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 200) {
                            result = true;
                        } else {
                            showNotification("warning", data['msg']);
                            result = false;
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        result = false;
                    });
                    return result;
                },
                editTransport: function (id) {
                    if(!transportView.validateEditTransport(id)){
                        return;
                    }

                    transportView.displayControl('show');

                    $("input[id=transportType]").attr('disabled', true);

                    transportView.current = null;
                    transportView.current = _.clone(_.find(transportView.dataTransport, function (o) {
                        return o.id == id;
                    }), true);

                    if (transportView.current['invoiceCustomer_id'] != null) {
                        $("#modal-warningTransport").modal("show").on("shown.bs.modal", function () {
                            window.setTimeout(function () {
                                $("#modal-warningTransport").modal("hide");
                            }, 3000);
                        });
                    }

                    var arrayVoucherTransport = _.clone(_.filter(transportView.dataVoucherTransport, function (o) {
                        return o.transport_id == id;
                    }), true);

                    var b = [];
                    var a = _.map(arrayVoucherTransport, function (o) {
                        return b[o.id] = o.quantity;
                    });
                    transportView.arrayVoucher = b;
                    
                    transportView.fillCurrentObjectToForm();
                    transportView.action = 'update';
                    $("#divControl").find(".titleControl").html("Cập nhật đơn hàng");

                    $("div[id=thumbnail]").html('');
                },
                addTransport: function () {
                    transportView.displayControl('show');

                    $("input[id=transportType]").attr('disabled', false);

                    transportView.arrayVoucher = [];
                    transportView.current = null;
                    transportView.action = 'add';

                    $("input[id=unitPrice]").val(0);
                    $("input[id=cashRevenue]").val(0);
                    $("input[id=cashDelivery]").val(0);
                    $("input[id=cashReceive]").val(0);
                    $("input[id=cost]").val(0);
                    $("input[id=carrying]").val(0);
                    $("input[id=parking]").val(0);
                    $("input[id=fine]").val(0);
                    $("input[id=phiTangBo]").val(0);
                    $("input[id=addScore]").val(0);
                    $("input[id=weight]").val(0);
                    $("input[id=quantumProduct]").val(0);
                    $("input[id=voucherQuantumProduct]").val(0);
                    $("#divControl").find(".titleControl").html("Thêm mới đơn hàng");

                    $("div[id=thumbnail]").html('');
                },
                deleteTransport: function (id) {
                    transportView.action = 'delete';
                    transportView.idDelete = id;
                    transportView.displayModal("show", "#modal-confirmDelete");
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            "my-id": "required",
                            customer_id: "required",
                            product_name: "required",
                            quantumProduct: "required",
                            weight: "required",
                            cashRevenue: "required",
                            cashDelivery: "required",
                            cashPreDelivery: "required",
                            cashReceive: "required",
                            receiver: "required",
                            receivePlace: "required",
                            deliveryPlace: "required",
                            voucherQuantumProduct: "required",
                            costs_note: "required"
                        },
                        ignore: ".ignore",
                        messages: {
                            "my-id": "Vui lòng chọn xe",
                            customer_id: "Vui lòng chọn khách hàng",
                            product_name: "Vui lòng nhập hàng",
                            quantumProduct: "Vui lòng nhập số lượng hàng",
                            weight: "Vui lòng nhập trọng lượng",
                            cashRevenue: "Vui lòng nhập doanh thu",
                            cashDelivery: "Vui lòng nhập tiền giao",
                            cashPreDelivery: "Vui lòng nhập tiền giao trước",
                            cashReceive: "Vui lòng nhập tiền nhận",
                            receiver: "Vui lòng nhập người nhận",
                            receivePlace: "Vui lòng nhập nơi nhận",
                            deliveryPlace: "Vui lòng nhập nơi giao",
                            voucherQuantumProduct: "Vui lòng nhập số lượng hàng trên chứng từ",
                            costs_note: "Vui lòng nhập ghi chú cho chi phí"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
                    //  var validator = $(idForm).validate();
                    //  validator.resetForm();
                },
                validateVoucher: function () {
                    $("#frmVoucher").validate({
                        rules: {
                            Voucher_name: "required"
                        },
                        messages: {
                            Voucher_name: "Vui lòng nhập tên chứng từ"
                        }
                    });
                },
                validateProduct: function () {
                    $("#frmProduct").validate({
                        rules: {
                            productName: "required",
                            productType_id: "required"
                        },
                        messages: {
                            productName: "Vui lòng nhập tên hàng",
                            productType_id: "Vui lòng chọn loại hàng"
                        }
                    });
                },

                save: function () {
                    if (transportView.action == 'delete') {
                        var sendToServer = {
                            _token: _token,
                            _action: transportView.action,
                            _id: transportView.idDelete
                        };
                    } else {
                        if (transportView.transportType === 0) {
                            transportView.formValidate();
                            if (!$("#frmControl").valid()) {
                                $("form#frmControl").find("label[class=error]").css("color", "red");
                                return;
                            }
                            if ($("#my-id").attr('data-id') == '') {
                                showNotification('warning', 'Vui lòng chọn một xe có trong danh sách.');
                                return;
                            }
                            if ($("#customer_id").attr('data-customerId') == '') {
                                showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
                                return;
                            }
                            if ($("#product_name").attr('data-productId') == '') {
                                showNotification('warning', 'Vui lòng nhập hàng.');
                                return;
                            }
                        }
                        transportView.fillFormDataToCurrentObject();
                        var sendToServer = {
                            _token: _token,
                            _action: transportView.action,
                            _transport: transportView.current,
                            _formulaDetail: transportView.formulaDetail
                        };
                    }

                    $.ajax({
                        url: url + 'transport/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            transportView.reloadData(data);
                            transportView.fillDataToDatatable(transportView.dataTransport);

                            switch (transportView.action) {
                                case 'add':
                                    showNotification("success", "Thêm thành công!");
                                    break;
                                case 'update':
                                    showNotification("success", "Cập nhật thành công!");
                                    break;
                                case 'delete':
                                    showNotification("success", "Xóa thành công!");
                                    transportView.displayModal("hide", "#modal-confirmDelete");
                                    break;
                                default:
                                    break;
                            }

                            if ($("input[id=file]").val() != "") {
                                $("input[id=transportId]").val(data['transport']['id']);
                                transportView.uploadMultiFile();
                            }

                            // transportView.table.clear().rows.add(transportView.dataTransport).draw();
                            transportView.clearInput();
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                saveVoucher: function () {
                    transportView.validateVoucher();
                    if ($("#frmVoucher").valid()) {
                        var voucher = {
                            name: $("input[id='Voucher_name']").val(),
                            description: $("textarea[id='description']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _voucher: voucher
                        };
                        $.ajax({
                            url: url + 'voucher/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                showNotification("success", "Thêm thành công!");
                                transportView.displayModal("hide", "#modal-addVoucher");
                                transportView.clearInput();
                                //
                                transportView.dataVoucher.push(data['voucher']);
                            } else {
                                showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmVoucher").find("label[class=error]").css("color", "red");
                    }
                },
                loadListProductType: function () {
                    $.ajax({
                        url: url + 'product-type/product-types',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            transportView.dataProductType = data['productTypes'];
                            transportView.tagsProductType = _.map(transportView.dataProductType, "name");
                            transportView.tagsProductType = _.union(transportView.tagsProductType);
                            renderAutoCompleteSearch("#productType_id", transportView.tagsProductType);
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },

                saveProduct: function () {
                    transportView.validateProduct();
                    if ($("#frmProduct").valid()) {
                        var product = {
                            name: $("input[id=productName]").val(),
                            description: $("textarea[id=description]").val(),
                            productType_id: $("#productType_id").attr('data-id'),
                            productType: $("input[id=productType_id]").val(),
                            productCode: $("input[id=product-code]").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _product: product
                        };
                        $.ajax({
                            url: url + 'product/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                transportView.dataProduct.push(data['product']);
                                transportView.tagsProductName = _.map(transportView.dataProduct, 'name');
                                transportView.tagsProductName = _.union(transportView.tagsProductName);
                                renderAutoCompleteSearch('#product_name', transportView.tagsProductName);
                                $("input[id=product_name]").val(data['product']['name']);
                                $("#product_name").attr("data-productId", data['product']['id']);
                                transportView.displayModal("hide", "#modal-addProduct");
                            } else {
                                showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmProduct").find("label[class=error]").css("color", "red");
                    }
                },

                focusOut_getFormula: function () {
                    transportView.getValueFormFormulaDetail();

                    var kt = true;
                    if(transportView.formulaDetail.length <= 0) {
                        kt = false;
                    } else {
                        _.each(transportView.formulaDetail, function (value, key) {
                            switch (transportView.formulaDetail[key]['rule']) {
                                case 'S': 
                                case 'R': 
                                case 'O': 
                                case 'PC': 
                                    if (transportView.formulaDetail[key]['value'] == null || transportView.formulaDetail[key]['value'] == "") {
                                        kt = false;
                                    }
                                    break;
                                case 'P': 
                                    if (transportView.formulaDetail[key]['fromPlace'] == null || transportView.formulaDetail[key]['fromPlace'] == ""
                                        || transportView.formulaDetail[key]['toPlace'] == null || transportView.formulaDetail[key]['toPlace'] == ""
                                    ) {
                                        kt = false;
                                    }
                                    break;
                                default: break;
                            }
                        });
                    }
                    
                    if (kt == false) {
                        $("#unitPrice").val(0);
                        $("#unit").val('');
                        $("#formulaCode").val('');
                        $("#cashDelivery").val(0);
                        $("label[for=quantumProduct] b").html('Lượng hàng');
                        return;
                    }

                    if(transportView.vndPerXe) {
                        if($("#quantumProduct").val() === "")
                            return;
                        transportView.formulaDetail.quantumProduct = $("#quantumProduct").val();
                    }

                    var sendToServer = {
                        _token: _token,
                        _formulaDetail: transportView.formulaDetail,
                        _customerId: $("#customer_id").attr("data-customerId")
                    };

                    $.ajax({
                        url: url + 'customer/formula/find',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 200) {
                            transportView.setValueForPlace(transportView.formulaDetail);
                            transportView.setValueForProductCode(transportView.formulaDetail);

                            $("#unitPrice").val(data['formula']['unitPrice']);
                            $("#unit").val(data['formula']['unit']);
                            $("#formulaCode").val(data['formula']['formulaCode']);
                            $("#cashDelivery").attr('bak-data', data['formula']['cashDelivery']);
                            $("#cashDelivery").val(0);
                            $("#formula_id").val(data['formula']['id']);
                            $("label[for=quantumProduct] b").html('Số lượng (' + data['formula']['unit_name'].toLowerCase() + ')');
                            formatCurrency(".currency");
                        } else if (jqXHR.status == 203) {
                            $("#unitPrice").val(0);
                            $("#unit").val('');
                            $("#formulaCode").val('');
                            $("#cashDelivery").val(0);
                            $("#formula_id").val('');
                            $("label[for=quantumProduct] b").html('Lượng hàng');
                            showNotification("warning", data['msg']);
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                focusOut_getCustomer: function () {
                    $("#unitPrice").val(0);
                    $("#unit").val('');
                    $("label[for=quantumProduct] b").html('Lượng hàng');

                    if (transportView.transportType === 1)
                        return;
                    var custName = $("#customer_id").val();
                    if (custName == '') {
                        $("#customer_id").attr("data-customerId", '');
                        $("#formula-detail").html("");
                        return;
                    }
                    var customer = _.find(transportView.dataCustomer, function (o) {
                        return o.fullName == custName;
                    });
                    if (typeof customer === "undefined") {
                        $("#modal-notification").find(".modal-title").html("Khách hàng <label class='text text-danger'>" + custName + "</label> không tồn tại");
                        transportView.displayModal('show', '#modal-notification');
                        $("input[id=customer_id]").val('');
                        $("#customer_id").attr("data-customerId", '');
                    } else {
                        if($("#customer_id").attr("data-customerId") != customer.id) {
                            $("#customer_id").attr("data-customerId", customer.id);
                            transportView.findFormulaDetail();
                        }
                    }
                },

                findFormulaDetail: function () {
                    if ($("#customer_id").attr('data-customerId') == '')
                        return;

                    var customerId = $("#customer_id").attr('data-customerId');

                    var sendToServer = {
                        _token: _token,
                        _customerId: customerId
                    };
                    $.ajax({
                        url: url + 'customer/formula-detail/find',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 200) {
                            transportView.currentFormula = data['formulas'];
                            var exists = _.filter(transportView.currentFormula, function(o){
                                return o['unit_name'] == 'VNĐ/Xe';
                            });
                            if(exists.length > 0) {
                                // Có tồn tại VNĐ/Xe
                                transportView.vndPerXe = true;
                            }
                            transportView.currentFormulaDetail = data['formulaDetails'];
                            var dataRender = _.filter(transportView.currentFormulaDetail, function(o){
                                return o['formula_id'] == transportView.currentFormula[0]['id'];
                            });
                            transportView.appendViewFormulaDetail(dataRender);
                        } else {
                            showNotification("warning", data['msg']);
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                appendViewFormulaDetail: function (data) {
                    transportView.formulaDetail = [];
                    $("#formula-detail").html("");
                    _.each(data, function (value, key) {
                        switch (data[key]["rule"]) {
                            case 'S':
                            case 'R':
                            case 'O':
                                var str = '';
                                str += '<div class="col-md-3">';
                                str += '<div class="form-group form-md-line-input">';
                                str += '<label for="id_' + data[key]["id"] + '" class="red"><b>' + data[key]["name"] + '</b></label>';
                                str += '<input value="" type="text" class="form-control name" id="id_' + data[key]["id"] + '" data-rule=' + data[key]["rule"] + ' onfocusout="transportView.focusOut_getFormula()">';
                                str += '</div>';
                                str += '</div>';
                                break;
                            case 'PC': 
                                var str = '';
                                str += '<div class="col-md-3">';
                                str += '<div class="form-group form-md-line-input">';
                                str += '<label for="id_' + data[key]["id"] + '" class="red"><b>' + data[key]["name"] + '</b></label>';
                                str += '<input value="" type="text" class="form-control name" id="id_' + data[key]["id"] + '" data-rule=' + data[key]["rule"] + ' onfocusout="transportView.focusOut_getFormula()">';
                                str += '</div>';
                                str += '</div>';
                                break;
                            case 'P':
                                var str = '';
                                str += '<div class="col-md-3">';
                                str += '<div class="form-group form-md-line-input">';
                                str += '<label for="id_' + data[key]["id"] + '_fromPlace" class="red"><b>Nơi nhận</b></label>';
                                str += '<input value="" type="text" class="form-control name" id="id_' + data[key]["id"] + '_fromPlace" data-rule=' + data[key]["rule"] + ' onfocusout="transportView.focusOut_getFormula()">';
                                str += '</div>';
                                str += '</div>';
                                str += '<div class="col-md-3">';
                                str += '<div class="form-group form-md-line-input">';
                                str += '<label for="id_' + data[key]["id"] + '_toPlace" class="red"><b>Nơi giao</b></label>';
                                str += '<input value="" type="text" class="form-control name" id="id_' + data[key]["id"] + '_toPlace" data-rule=' + data[key]["rule"] + ' onfocusout="transportView.focusOut_getFormula()">';
                                str += '</div>';
                                str += '</div>';
                                break;
                            
                            default: break;
                        }
                        
                        $("#formula-detail").append(str);

                        // Hide input duplicate
                        var existPair = _.filter(data, function(o) {
                            return o['rule'] == 'P';
                        });

                        if(existPair.length > 0) {
                            $("#receivePlace").parent().parent().addClass('hide');
                            $("#deliveryPlace").parent().parent().addClass('hide');
                        } else {
                            $("#receivePlace").parent().parent().removeClass('hide');
                            $("#deliveryPlace").parent().parent().removeClass('hide');
                        }

                        var existProductCode = _.filter(data, function(o) {
                            return o['rule'] == 'PC';
                        });

                        if(existProductCode.length > 0) {
                            $("#productCode").parent().parent().addClass('hide');
                        } else {
                            $("#productCode").parent().parent().removeClass('hide');
                        }


                        //AutoComplete
                        var dataAutoComplete = _.filter(transportView.currentFormulaDetail, function (o) {
                            return o['rule'] == data[key]["rule"];
                        });
                        
                        switch (data[key]["rule"]) {
                            case 'S':
                            case 'R':
                            case 'O':
                            case 'PC':
                                 var tagsValueFormulaDetail = _.map(dataAutoComplete, 'value');
                                 tagsValueFormulaDetail = _.union(tagsValueFormulaDetail);
                                 renderAutoCompleteSearch('#id_' + data[key]["id"], tagsValueFormulaDetail);
                                 break;
                            case 'P':
                                var tagsValueFormulaDetail_From = _.map(dataAutoComplete, 'fromPlace');
                                var tagsValueFormulaDetail_To = _.map(dataAutoComplete, 'toPlace');
                                tagsValueFormulaDetail_From = _.union(tagsValueFormulaDetail_From);
                                tagsValueFormulaDetail_To = _.union(tagsValueFormulaDetail_To);
                                renderAutoCompleteSearch('#id_' + data[key]["id"] + '_fromPlace', tagsValueFormulaDetail_From);
                                renderAutoCompleteSearch('#id_' + data[key]["id"] + '_toPlace', tagsValueFormulaDetail_To);
                                break;
                            default: break;
                        }

                        if (data[key]["rule"] == 'O') {
                            $("#id_" + data[key]["id"]).attr('readonly', true);
                            transportView.getUsingFuel(transportView.today);
                            $("#id_" + data[key]["id"]).val(transportView.oilPrice);
                        } else {
                            $("#id_" + data[key]["id"]).attr('readonly', false);
                        }

                        var formulaDetail = {
                            id: data[key]["id"],
                            rule: data[key]["rule"],
                            name: data[key]["name"],
                            value: null,
                            fromPlace: null,
                            toPlace: null
                        };
                        transportView.formulaDetail.push(formulaDetail);
                    });
                },
                getValueFormFormulaDetail: function () {
                    if(transportView.formulaDetail.length <= 0) return;
                    var searchEles = $("#formula-detail input").not($("#formula-detail input[id$=_toPlace]"));
                    for (var i = 0; i < searchEles.length; i++) {
                        switch (transportView.formulaDetail[i]['rule']) {
                            case 'S':
                            case 'R':
                            case 'O':
                            case 'PC':
                                transportView.formulaDetail[i]['value'] = $(searchEles[i]).val();
                                break;
                            case 'P': 
                                transportView.formulaDetail[i]['fromPlace'] = $(searchEles[i]).val();
                                var id_to = $(searchEles[i]).attr('id').split("_fromPlace")[0];
                                transportView.formulaDetail[i]['toPlace'] = $("#"+id_to+"_toPlace").val();
                                break;
                            default: break;
                        }
                    }
                },
                setValueFormFormulaDetail: function (formulaDetail) {
                    var searchEles = $("#formula-detail input").not($("#formula-detail input[id$=_toPlace]"));
                    for (var i = 0; i < searchEles.length; i++) {
                        switch (transportView.formulaDetail[i]['rule']) {
                            case 'S':
                            case 'R':
                            case 'O':
                            case 'PC':
                                $(searchEles[i]).val(formulaDetail[i]['value']);
                                break;
                            case 'P': 
                                $(searchEles[i]).val(formulaDetail[i]['fromPlace']);
                                var id_to = $(searchEles[i]).attr('id').split("_fromPlace")[0];
                                $("#"+id_to+"_toPlace").val(formulaDetail[i]['toPlace']);
                                break;
                            default: break;
                        }
                    }
                },

                searchFromDateToDate: function () {
                    var fromDate = $("#dateOnlySearch").find(".start").val();
                    var toDate = $("#dateOnlySearch").find(".end").val();
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");

                    if (fromDate.isValid() && toDate.isValid()) {
                        var found = _.filter(transportView.dataTransport, function (o) {
                            var find = moment(o.receiveDate, "YYYY-MM-DD");
                            find.hour(0);
                            find.minute(0);
                            find.second(0);
                            return moment(find).isBetween(fromDate, toDate, null, '[]');
                        });
                        transportView.table.clear().rows.add(found).draw();
                    } else {
                        showNotification('warning', 'Giá trị nhập vào không phải định dạng ngày tháng, vui lòng nhập lại!');
                    }
                },
                clearSearch: function () {
                    $("#dateOnlySearch").find(".start").datepicker('update', '');
                    $("#dateOnlySearch").find(".end").datepicker('update', '');
                    transportView.table.clear().rows.add(transportView.dataTransport).draw();
                },
                searchFromDateToDate_PaymentDate: function () {
                    var fromDate = $("#search-paymentDate").find(".start").val();
                    var toDate = $("#search-paymentDate").find(".end").val();
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");

                    if (fromDate.isValid() && toDate.isValid()) {
                        var found = _.filter(transportView.dataTransport, function (o) {
                            var find = moment(o['paymentDate'], "YYYY-MM-DD");
                            find.hour(0);
                            find.minute(0);
                            find.second(0);
                            return moment(find).isBetween(fromDate, toDate, null, '[]');
                        });
                        transportView.quantumTransportNeedPayment = found.length;
                        transportView.tablePaymentDate.clear().rows.add(found).draw();
                    } else {
                        showNotification('warning', 'Giá trị nhập vào không phải định dạng ngày tháng, vui lòng nhập lại!');
                    }
                },
                clearSearch_PaymentDate: function () {
                    $("#search-paymentDate").find(".start").datepicker('update', '');
                    $("#search-paymentDate").find(".end").datepicker('update', '');
                    transportView.tablePaymentDate.clear().draw();
                },
                showCurrentRows: function () {
                    $(transportView.table.$('tr', {"filter": "applied"}).each(function () {
                        // console.log($(this).find("td:eq(1)").text());
                    }));
                },

                computeWhenCashReceiveChange: function (cashReceive) {
                    cashReceive = convertStringToNumber(cashReceive);
                    var cashRevenue = asNumberFromCurrency("#cashRevenue");

                    if (cashReceive > cashRevenue) {
                        showNotification('warning', 'Số tiền nhận từ khách hàng không được lớn hơn doanh thu của đơn hàng.');
                        cashReceive = cashRevenue;
                        $("input[id=cashReceive]").val(cashReceive);
                        formatCurrency(".currency");
                    }
                },
                computeWhenCostChange: function() {
                    var quantumProduct = parseInt($("#quantumProduct").val());
                    var unitPrice = asNumberFromCurrency("#unitPrice");

                    var cashRevenue = quantumProduct * unitPrice;
                    var carrying = asNumberFromCurrency("#carrying");
                    var parking = asNumberFromCurrency("#parking");
                    var fine = asNumberFromCurrency("#fine");
                    var phiTangBo = asNumberFromCurrency("#phiTangBo");
                    var addScore = asNumberFromCurrency("#addScore");
                    cashRevenue += carrying + parking + fine + phiTangBo + addScore;

                    $("input[id=cashRevenue]").val(cashRevenue);
                    formatCurrency(".currency");
                },
                computeWhenChangeQuantumProduct: function (quantumProduct) {
                    if(quantumProduct == "") quantumProduct = 0;
                    var unitPrice = asNumberFromCurrency("#unitPrice");
                    var cashDelivery = $("#cashDelivery").attr('bak-data');
                    cashDelivery = (unitPrice * cashDelivery / 100) * quantumProduct;

                    var cashRevenue = quantumProduct * unitPrice;
                    var carrying = asNumberFromCurrency("#carrying");
                    var parking = asNumberFromCurrency("#parking");
                    var fine = asNumberFromCurrency("#fine");
                    var phiTangBo = asNumberFromCurrency("#phiTangBo");
                    var addScore = asNumberFromCurrency("#addScore");
                    cashRevenue += carrying + parking + fine + phiTangBo + addScore;
                    $("#cashRevenue").val(cashRevenue);
                    $("#cashDelivery").val(cashDelivery);
                    formatCurrency(".currency");
                },

                showFormAttachFile: function () {
                    if (transportView.current != null) {
                        $("input[name=transportId]").val(transportView.current.id);
                        transportView.retrieveMultiFile();
                    }
                    else {
                        if (transportView.tableFile != null)
                            transportView.tableFile.clear().draw();
                    }

                    transportView.displayModal('show', '#modal-attachFile');
                },
                uploadMultiFile: function () {
                    $.ajax({
                        url: url + 'transport/upload-file',
                        type: 'POST',
                        data: new FormData(document.getElementById('upload')),
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,  // tell jQuery not to set contentType
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            showNotification("success", "Thêm tập tin thành công!");
                            $("input[id=file]").val('');
                            $("input[id=transportId]").val('');
                            $("div[id=thumbnail]").html('');
                            transportView.displayModal("hide", "#modal-attachFile");
                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                retrieveMultiFile: function () {
                    var sendToServer = {
                        _token: _token,
                        _transportId: transportView.current.id
                    };
                    $.ajax({
                        url: url + 'transport/retrieve-file',
                        type: 'POST',
                        data: sendToServer,
                        dataType: 'json'
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            var files = data['files'];
                            transportView.fillFileToDatatable(files);
                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                fillFileToDatatable: function (data) {
                    if (transportView.tableFile != null)
                        transportView.tableFile.destroy();

                    transportView.tableFile = $('#table-file').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {
                                data: 'fileName',
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    //    tr += "<span onclick='transportView.downloadFile("+full.id+")'>" + full.fileName + "</span>";
                                    tr += "<a href='" + full.filePath + "' download>" + full.fileName + "</a>";
                                    return tr;
                                }
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div title="Xem" class="btn btn-primary btn-circle text-center" onclick="transportView.showThumbnail(\'' + full.filePath + '\')">';
                                    tr += '<i class="fa fa-eye"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                },
                                visible: false
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div title="Xóa" class="btn btn-danger btn-circle" onclick="transportView.deleteFile(' + full.id + ')">';
                                    tr += '<i class="fa fa-trash"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        dom: "t"
                    });
                },
                showThumbnail: function (filePath) {
                    var tr = "";
                    tr += "<embed src='" + filePath + "' height='100px' width='100px'>";
                    $("#thumbnail").html(tr);
                },
                deleteFile: function (fileId) {
                    var sendToServer = {
                        _token: _token,
                        _fileId: fileId
                    };
                    $.ajax({
                        url: url + 'transport/delete-file',
                        type: 'POST',
                        data: sendToServer,
                        dataType: 'json'
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            var files = data['files'];
                            transportView.tableFile.clear().rows.add(files).draw();
                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                downloadFile: function (fileId) {
                    var sendToServer = {
                        _token: _token,
                        _fileId: fileId
                    };
                    $.ajax({
                        url: url + 'transport/download-file',
                        type: 'POST',
                        data: sendToServer,
                        dataType: 'json'
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {

                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                increaseVoucher: function (voucherId) {
                    var num = parseInt($("#voucher_" + voucherId).text());
                    num += 1;

                    transportView.arrayVoucher[voucherId] = num;

                    $("#voucher_" + voucherId).empty().text(num);

                    if (num == 1) {
                        var objVoucher = _.clone(_.find(transportView.dataVoucher, function (o) {
                            return o.id == voucherId;
                        }), true);
                        $("input[id='voucher_transport']").val($("input[id='voucher_transport']").val() + objVoucher.name + ", ");
                    }
                },
                reduceVoucher: function (voucherId) {
                    var num = parseInt($("#voucher_" + voucherId).text());
                    if (num == 0)
                        return;

                    num -= 1;
                    transportView.arrayVoucher[voucherId] = num;

                    $("#voucher_" + voucherId).text(num);

                    if (num == 0) {
                        var objVoucher = _.clone(_.find(transportView.dataVoucher, function (o) {
                            return o.id == voucherId;
                        }), true);
                        var strVoucherName = $("input[id='voucher_transport']").val();
                        if (strVoucherName.indexOf(objVoucher.name) >= 0) {
                            strVoucherName = strVoucherName.replace(objVoucher.name + ", ", '');
                        }
                        $("input[id='voucher_transport']").val(strVoucherName);
                    }

                },
                setValueForPlace: function(data){
                    var pair = _.filter(data, function(o){
                        return o.rule == 'P';
                    });
                    if(pair.length > 0){
                        $("#receivePlace").val(pair[0]['fromPlace']);
                        $("#deliveryPlace").val(pair[0]['toPlace']);
                    }
                },
                setValueForProductCode: function(data){
                    var pair = _.filter(data, function(o){
                        return o.rule == 'PC';
                    });
                    if(pair.length > 0){
                        $("#productCode").val(pair[0]['value']);
                    }
                },
                setCurrentMonth: function() {
                    $("#dateOnlySearch").find(".start").datepicker('update', transportView.firstDay);
                    $("#dateOnlySearch").find(".end").datepicker('update', transportView.lastDay);
                },

                getUsingFuel: function (applyDate) {
                    transportView.oilPrice = 0;
                    if(transportView.dataFuel != null && transportView.dataFuel.length > 0) {
                        var filter = _.filter(transportView.dataFuel, function(o) {
                            return moment(o['applyDate'], "YYYY-MM-DD").hour(0).minute(0).second(0).isSameOrBefore(moment(applyDate, 'DD-MM-YYYY').hour(0).minute(0).second(0))
                        });
                        if(filter.length > 0) {
                            var fuel = _.maxBy(filter, function (o) {
                                return o['applyDate'];
                            });
                            
                            if (typeof fuel !== 'undefined') {
                                transportView.oilPrice = fuel['price'];
                            }
                        }
                    }
                }
            };
            transportView.loadData();
        } else {
            transportView.loadData();
        }
    });
</script>
