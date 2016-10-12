<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 60%;
        height: 100%;
    }

    #divControl .panel-body {
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
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="transportView.addTransport();">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p id="dateOnlySearch">
                        <input type="text" class="date start" /> đến
                        <input type="text" class="date end" />
                        <button onclick="transportView.searchFromDateToDate()" class="btn btn-sm btn-info"><i class="fa fa-search" aria-hidden="true"></i> Tìm</button>
                        <button onclick="transportView.clearSearch()" class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                    </p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="table-data">
                            <thead>
                            <tr class="active">
                                <th>Mã</th>
                                <th>Số xe</th>
                                <th>Tên hàng</th>
                                <th>Nơi nhận</th>
                                <th>Nơi giao</th>
                                <th>Khách hàng</th>
                                <th>Doanh thu</th>
                                <th>Giao xe</th>
                                <th>Nhận</th>
                                <th>Lợi nhuận</th>
                                <th>Người nhận</th>
                                <th>Ngày nhận</th>
                                <th>Trạng thái</th>
                                <th>Sửa/ Xóa</th>
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
<!-- End Table Transport -->

<!-- Chú thích -->
<div class="row">
    <div class="col-md-6">
        <i class="fa fa-user" aria-hidden="true" style="font-size: 1.2em; margin-right: 30px;"> Khách hàng</i>
        <i class="fa fa-truck" aria-hidden="true" style="font-size: 1.2em;"> Nhà xe ngoài</i>
    </div>
    <div class="col-md-6">
        <span class="label label-danger" style="font-size: 1em;">Chưa thanh toán</span>
        <span class="label label-primary" style="font-size: 1em;">Đã thanh toán</span>
        <span class="label label-success" style="font-size: 1em;">Đã thanh toán và xuất hóa đơn</span>
    </div>
</div>

<!-- Begin divControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thêm mới yêu cầu giao hàng
                <div class="menu-toggles pull-right" onclick="transportView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="vehicle_id"><b>Xe</b></label>
                                        <input type="text" class="form-control cursor-copy" id="vehicle_id"
                                               name="vehicle_id"
                                               readonly placeholder="Nhấp đôi để chọn xe"
                                               data-vehicleId=""
                                               ondblclick="transportView.loadListVehicle()">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="customer_id"><b>Khách hàng</b></label>
                                        <input type="text" class="form-control cursor-copy" id="customer_id"
                                               name="customer_id"
                                               readonly placeholder="Nhấp đôi để chọn khách hàng"
                                               data-customerId=""
                                               ondblclick="transportView.loadListCustomer()">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="product_id"><b>Hàng</b></label>
                                        <input type="text" class="form-control cursor-copy" id="product_id"
                                               name="product_id"
                                               readonly placeholder="Nhấp đôi để chọn hàng"
                                               data-productId=""
                                               ondblclick="transportView.loadListProduct()">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="quantumProduct"><b>Số lượng hàng</b></label>
                                        <input type="number" class="form-control" id="quantumProduct"
                                               name="quantumProduct">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="weight"><b>Trọng tải</b></label>
                                        <input type="number" class="form-control" id="weight" name="weight">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="cashRevenue"><b>Doanh thu</b></label>
                                        <input type="number" class="form-control" id="cashRevenue" name="cashRevenue">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="cashDelivery"><b>Giao xe</b></label>
                                        <input type="number" class="form-control" id="cashDelivery" name="cashDelivery">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="cashReceive"><b>Nhận</b></label>
                                        <input type="number" class="form-control" id="cashReceive" name="cashReceive">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="receiver"><b>Người nhận</b></label>
                                        <input type="text" class="form-control" id="receiver" name="receiver">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="receiveDate"><b>Ngày nhận</b></label>
                                        <input type="text" class="date form-control"
                                               id="receiveDate"
                                               name="receiveDate">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="receivePlace"><b>Nơi nhận</b></label>
                                        <input type="text" class="form-control" id="receivePlace" name="receivePlace">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="deliveryPlace"><b>Nơi giao</b></label>
                                        <input type="text" class="form-control" id="deliveryPlace" name="deliveryPlace">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="voucherNumber"><b>Số chứng từ</b></label>
                                        <input type="text" class="form-control" id="voucherNumber" name="voucherNumber">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="voucherQuantumProduct"><b>Số hàng trên chứng từ</b></label>
                                        <input type="number" class="form-control" id="voucherQuantumProduct"
                                               name="voucherQuantumProduct">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="note"><b>Ghi chú đơn hàng</b></label>
                                        <input type="text" class="form-control" id="note" name="note">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="status_transport"><b>Trạng thái</b></label>
                                        <select id="status_transport" name="status_transport"
                                                class="form-control"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="voucher_transport"><b>Số chứng từ nhận</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control cursor-copy"
                                                       id="voucher_transport" data-id="" readonly
                                                       name="voucher_transport"
                                                       placeholder="Nhấp đôi để chọn chứng từ"
                                                       ondblclick="transportView.loadListVoucher()">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle"
                                                     onclick="transportView.displayModal('show', '#modal-addVoucher')">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-md-line-input">
                                        <label for="costPrices_id"><b>Chi phí</b></label>
                                        <select name="costPrices_id" id="costPrices_id" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-md-line-input">
                                        <label for="cost"><b>Số tiền</b></label>
                                        <input type="number" class="form-control" id="cost" name="cost">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-md-line-input">
                                        <label for="costs_note"><b>Ghi chú chi phí</b></label>
                                        <input type="text" class="form-control" id="costs_note" name="costs_note">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary marginRight"
                                            onclick="transportView.save()">Hoàn
                                        tất
                                    </button>
                                    <button type="button" class="btn default" onclick="transportView.clearInput()">Huỷ
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
<!-- End divControl -->

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

<script>
    $(function () {
        if (typeof transportView === 'undefined') {
            transportView = {
                table: null,
                tableVehicle: null,
                tableCustomer: null,
                tableProduct: null,
                tableVoucher: null,

                dataTransport: null,
                dataVoucher: null,
                dataVoucherTransport: null,
                dataStatus: null,
                dataCostPrice: null,

                arrayVoucher: [],
                current: null,
                action: null,
                idDelete: null,
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });

                    transportView.clearValidation("#frmControl");
                    transportView.clearInput();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (transportView.action == 'delete' && type == 'hide') {
                        transportView.action = null;
                        transportView.idDelete = null;
                    }

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
                    $("input[id='vehicle_id']").val('');
                    $("#vehicle_id").attr("data-vehicleId", "");

                    $("input[id='customer_id']").val('');
                    $("#customer_id").attr("data-customerId", "");

                    $("input[id='product_id']").val('');
                    $("#product_id").attr("data-productId", "");

                    $("input[id='quantumProduct']").val('');
                    $("input[id='weight']").val('');
                    $("input[id='cashRevenue']").val('');
                    $("input[id='cashDelivery']").val('');
                    $("input[id='cashReceive']").val('');
                    $("input[id='receiver']").val('');
//                    $("input[id='receiveDate']").val('');
                    $("input[id='receivePlace']").val('');
                    $("input[id='deliveryPlace']").val('');
                    $("input[id='voucherNumber']").val('');
                    $("input[id='voucherQuantumProduct']").val('');
                    $("input[id='note']").val('');

                    $("input[id='voucher_transport']").val('');
                    $("input[id='voucher_transport']").attr("voucher_transport", "");

                    $("input[id='cost']").val('');
                    $("input[id='costs_note']").val('');

                    transportView.arrayVoucher = [];
                },

                renderDateTimePicker: function(){
                    $('#dateOnlySearch .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });

                    var dateOnlySearchEl = document.getElementById('dateOnlySearch');
                    var dateOnlyDatepair = new Datepair(dateOnlySearchEl);

                    $('#receiveDate').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });

                    $('#receiveDate').datepicker("setDate", new Date());
                },
                renderScrollbar: function(){
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                renderEventTableModal: function() {
                    $("#table-vehicle").find("tbody").on('click', 'tr', function () {
                        $('#vehicle_id').attr('data-vehicleId', $(this).find('td:first')[0].innerText);
                        $('input[id=vehicle_id]').val($(this).find('td:eq(1)')[0].innerText);
                        transportView.displayModal("hide", "#modal-vehicle");
                    });
                    $("#table-customer").find("tbody").on('click', 'tr', function () {
                        var cust_id = $(this).find('td:first')[0].innerText;
                        $('#customer_id').attr('data-customerId', cust_id);
                        $('input[id=customer_id]').val($(this).find('td:eq(2)')[0].innerText);
                        transportView.displayModal("hide", "#modal-customer");

                        transportView.postDataPostageOfCustomer(cust_id);
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
                renderCustomToastr: function() {
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

                loadData: function () {
                    $.ajax({
                        url: url + 'transport/transports',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            transportView.dataTransport = data['transports'];
                            transportView.fillDataToDatatable(transportView.dataTransport);

                            transportView.dataVoucherTransport = data['voucherTransports'];
                            transportView.dataVoucher = data['vouchers'];
                            transportView.dataStatus = data['statuses'];
                            transportView.loadSelectBox(transportView.dataStatus, 'status_transport', 'status');
                            transportView.dataCostPrice = data['costPrices'];
                            transportView.loadSelectBox(transportView.dataCostPrice, 'costPrices_id', 'name');
                        } else {
                            transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    transportView.renderDateTimePicker();

                    transportView.renderScrollbar();

                    transportView.renderEventTableModal();

                    transportView.renderCustomToastr();

                    transportView.addDateFormat();
                },
                loadListVehicle: function () {
                    $.ajax({
                        url: url + 'vehicle-inside/vehicles',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {

                        for (var i = 0; i < data['vehicles'].length; i++) {
                            data['vehicles'][i].fullNumber = data['vehicles'][i]['areaCode'] + "-" + data['vehicles']   [i]['vehicleNumber'];
                        }

                        if (jqXHR.status == 200) {
                            if (transportView.tableVehicle != null) {
                                transportView.tableVehicle.destroy();
                            }
                            transportView.tableVehicle = $('#table-vehicle').DataTable({
                                language: languageOptions,
                                data: data['vehicles'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'fullNumber'},
                                    {data: 'vehicleTypes_name'},
                                    {data: 'garages_name'},
                                    {data: 'size'},
                                    {data: 'weight'}
                                ]
                            });
                            transportView.displayModal("show", "#modal-vehicle");
                        } else {
                            transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                loadListCustomer: function () {
                    $.ajax({
                        url: url + 'customer/customers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (transportView.tableCustomer != null) {
                                transportView.tableCustomer.destroy();
                            }
                            transportView.tableCustomer = $('#table-customer').DataTable({
                                language: languageOptions,
                                data: data['customers'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'customerTypes_name'},
                                    {data: 'fullName'},
                                    {data: 'taxCode'},
                                    {data: 'address'},
                                    {data: 'phone'},
                                    {data: 'email'}
                                ]
                            });
                            transportView.displayModal("show", "#modal-customer");
                        } else {
                            transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                loadListProduct: function () {
                    $.ajax({
                        url: url + 'product/products',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (transportView.tableProduct != null) {
                                transportView.tableProduct.destroy();
                            }
                            transportView.tableProduct = $('#table-product').DataTable({
                                language: languageOptions,
                                data: data['products'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'productTypes_name'},
                                    {data: 'name'},
                                    {data: 'description'}
                                ]
                            });
                            transportView.displayModal("show", "#modal-product");
                        } else {
                            transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
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
                                            tr += '<div class="btn btn-xs btn-primary" data-voucherId="' + full.id + '" onclick="transportView.checkVoucher(this)">';
                                            tr += '<i class="fa fa-times" aria-hidden="true"></i>';
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
                            transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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

                    for (var i = 0; i < transportView.arrayVoucher.length; i++) {
                        var checkbox = $("div[data-voucherId=" + transportView.arrayVoucher[i] + "]");
                        checkbox.removeClass("btn-primary").addClass("btn-success");
                        checkbox.find("i").removeClass("fa-times").addClass("fa-check");
                    }
                },

                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_areaCode'] + "-" + data[i]['vehicles_vehicleNumber'];
                    }
                    transportView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'fullNumber'},
                            {data: 'products_name'},
                            {data: 'receivePlace'},
                            {data: 'deliveryPlace'},
                            {data: 'customers_fullName', width: "15%"},
                            {
                                data: 'cashRevenue',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'cashDelivery',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'cashReceive',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'cashProfit',
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
                                    var color_customer = '';
                                    var color_garage = '';
                                    switch (full.status_customer) {
                                        case 5:
                                            color_customer = 'text-danger';
                                            break;
                                        case 6:
                                            color_customer = 'text-primary';
                                            break;
                                        case 7:
                                            color_customer = 'text-success';
                                            break;
                                    }
                                    switch (full.status_garage) {
                                        case 8:
                                            color_garage = 'text-danger';
                                            break;
                                        case 9:
                                            color_garage = 'text-primary';
                                            break;
                                        case 10:
                                            color_garage = 'text-success';
                                            break;
                                    }
                                    var tr = "";
                                    tr += '<i style="width: 50%; display: inline-block; font-size: 20px;" class="fa fa-user ' + color_customer + '" aria-hidden="true"></i>';
                                    tr += '<i style="width: 50%; display: inline-block; font-size: 20px;" class="fa fa-truck ' + color_garage + '" aria-hidden="true"></i>';
                                    tr += '<p>' + full.status_transport_ + '</p>';

                                    return tr;
                                }, width: "11%"
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="transportView.editTransport(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="transportView.deleteTransport(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "9%"
                            }
                        ],
                        order: [[0, "desc"]],
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
                fillCurrentObjectToForm: function () {
                    $("input[id='vehicle_id']").val(transportView.current["vehicles_areaCode"] + '-' + transportView.current["vehicles_vehicleNumber"]);
                    $("#vehicle_id").attr('data-vehicleId', transportView.current["vehicles_id"]);
                    $("input[id='customer_id']").val(transportView.current["customers_fullName"]);
                    $("#customer_id").attr('data-customerId', transportView.current["customers_id"]);
                    $("input[id='product_id']").val(transportView.current["products_name"]);
                    $("#product_id").attr('data-productId', transportView.current["products_id"]);

                    $("input[id='quantumProduct']").val(transportView.current["quantumProduct"]);
                    $("input[id='weight']").val(transportView.current["weight"]);
                    $("input[id='cashRevenue']").val(transportView.current["cashRevenue"]);
                    $("input[id='cashDelivery']").val(transportView.current["cashDelivery"]);
                    $("input[id='cashReceive']").val(transportView.current["cashReceive"]);
                    $("input[id='receiver']").val(transportView.current["receiver"]);

                    var receiveDate = moment(transportView.current["receiveDate"], "YYYY-MM-DD");
                    $("input[id='receiveDate']").datepicker('update', receiveDate.format("DD-MM-YYYY"));

                    $("input[id='receivePlace']").val(transportView.current["receivePlace"]);
                    $("input[id='deliveryPlace']").val(transportView.current["deliveryPlace"]);
                    $("input[id='voucherNumber']").val(transportView.current["voucherNumber"]);
                    $("input[id='voucherQuantumProduct']").val(transportView.current["voucherQuantumProduct"]);
                    $("input[id='note']").val(transportView.current["note"]);
                    $("select[id='status_transport']").val(transportView.current["status_transport"]);
                    $("input[id='cost']").val(transportView.current["cost"]);
                    $("input[id='costs_note']").val(transportView.current["costs_note"]);

                    var strVoucherName = "";
                    for (var i = 0; i < transportView.arrayVoucher.length; i++) {
                        var objVoucher = _.clone(_.find(transportView.dataVoucher, function (o) {
                            return o.id == transportView.arrayVoucher[i];
                        }), true);
                        strVoucherName += objVoucher.name + ", ";
                    }
                    $("input[id='voucher_transport']").val(strVoucherName);
                    $("select[id='costPrices_id']").val(transportView.current["costPrices_id"]);
                },
                fillFormDataToCurrentObject: function () {
                    if (transportView.action == 'add') {
                        transportView.current = {
                            vehicles_id: $("#vehicle_id").attr("data-vehicleId"),
                            customers_id: $("#customer_id").attr("data-customerId"),
                            products_id: $("#product_id").attr("data-productId"),
                            quantumProduct: $("input[id='quantumProduct']").val(),
                            weight: $("input[id='weight']").val(),
                            cashRevenue: $("input[id='cashRevenue']").val(),
                            cashDelivery: $("input[id='cashDelivery']").val(),
                            cashReceive: $("input[id='cashReceive']").val(),
                            receiver: $("input[id='receiver']").val(),
                            receiveDate: $("input[id='receiveDate']").val(),
                            receivePlace: $("input[id='receivePlace']").val(),
                            deliveryPlace: $("input[id='deliveryPlace']").val(),
                            voucherNumber: $("input[id='voucherNumber']").val(),
                            voucherQuantumProduct: $("input[id='voucherQuantumProduct']").val(),
                            note: $("input[id='note']").val(),
                            status_transport: $("select[id='status_transport']").val(),
                            cost: $("input[id='cost']").val(),
                            costs_note: $("input[id='costs_note']").val(),
                            voucher_transport: transportView.arrayVoucher,
                            costPrices_id: $("select[id='costPrices_id']").val()
                        };
                    } else if (transportView.action == 'update') {
                        transportView.current.vehicles_id = $("#vehicle_id").attr("data-vehicleId");
                        transportView.current.customers_id = $("#customer_id").attr("data-customerId");
                        transportView.current.products_id = $("#product_id").attr("data-productId");
                        transportView.current.quantumProduct = $("input[id='quantumProduct']").val();
                        transportView.current.weight = $("input[id='weight']").val();
                        transportView.current.cashRevenue = $("input[id='cashRevenue']").val();
                        transportView.current.cashDelivery = $("input[id='cashDelivery']").val();
                        transportView.current.cashReceive = $("input[id='cashReceive']").val();
                        transportView.current.receiver = $("input[id='receiver']").val();
                        transportView.current.receiveDate = $("input[id='receiveDate']").val();
                        transportView.current.receivePlace = $("input[id='receivePlace']").val();
                        transportView.current.deliveryPlace = $("input[id='deliveryPlace']").val();
                        transportView.current.voucherNumber = $("input[id='voucherNumber']").val();
                        transportView.current.voucherQuantumProduct = $("input[id='voucherQuantumProduct']").val();
                        transportView.current.note = $("input[id='note']").val();
                        transportView.current.status_transport = $("select[id='status_transport']").val();
                        transportView.current.cost = $("input[id='cost']").val();
                        transportView.current.costs_note = $("input[id='costs_note']").val();
                        transportView.current.voucher_transport = transportView.arrayVoucher;
                        transportView.current.costPrices_id = $("select[id='costPrices_id']").val();
                    }
                },

                editTransport: function (id) {
                    transportView.current = null;
                    transportView.current = _.clone(_.find(transportView.dataTransport, function (o) {
                        return o.id == id;
                    }), true);

                    var arrayVoucherTransport = _.clone(_.filter(transportView.dataVoucherTransport, function (o) {
                        return o.transport_id == id;
                    }), true);

                    transportView.arrayVoucher = _.map(arrayVoucherTransport, 'voucher_id');

                    transportView.fillCurrentObjectToForm();
                    transportView.action = 'update';
                    transportView.showControl();
                },
                addTransport: function () {
                    transportView.arrayVoucher = [];
                    transportView.current = null;
                    transportView.action = 'add';
                    transportView.showControl();
                },
                deleteTransport: function (id) {
                    transportView.action = 'delete';
                    transportView.idDelete = id;
                    transportView.displayModal("show", "#modal-confirmDelete");
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            vehicle_id: "required",
                            customer_id: "required",
                            product_id: "required",
                            quantumProduct: "required",
                            weight: "required",
                            cashRevenue: "required",
                            cashDelivery: "required",
                            cashReceive: "required",
                            receiver: "required",
                            receiveDate: {required: true, dateFormat: true},
                            receivePlace: "required",
                            deliveryPlace: "required",
                            voucherNumber: "required",
                            voucherQuantumProduct: "required",
                            costs_note: "required"
                        },
                        messages: {
                            vehicle_id: "Vui lòng chọn xe",
                            customer_id: "Vui lòng chọn khách hàng",
                            product_id: "Vui lòng chọn hàng",
                            quantumProduct: "Vui lòng nhập số lượng hàng",
                            weight: "Vui lòng nhập trọng lượng",
                            cashRevenue: "Vui lòng nhập doanh thu",
                            cashDelivery: "Vui lòng nhập tiền giao",
                            cashReceive: "Vui lòng nhập tiền nhận",
                            receiver: "Vui lòng nhập người nhận",
                            receiveDate: {
                                required: "Vui lòng chọn ngày nhận",
                                dateFormat: "Vui lòng nhập ngày theo định dạng dd-mm-yyyy."
                            },
                            receivePlace: "Vui lòng nhập nơi nhận",
                            deliveryPlace: "Vui lòng nhập nơi giao",
                            voucherNumber: "Vui lòng nhập số chứng từ",
                            voucherQuantumProduct: "Vui lòng nhập số lượng hàng trên chứng từ",
                            costs_note: "Vui lòng nhập ghi chú cho chi phí"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
//                    var validator = $(idForm).validate();
//                    validator.resetForm();
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
                addDateFormat: function() {
                    $.validator.addMethod("dateFormat",
                            function(value, element) {
                                return value.match(/^dd?-dd?-dd$/);
                            }, "Vui lòng nhập ngày theo định dạng dd-mm-yyyy.");
                },

                save: function () {
                    transportView.formValidate();
                    if ($("#frmControl").valid()) {
                        if (transportView.action != 'delete') {
                            if ($("#vehicle_id").attr('data-vehicleId') == '') {
                                transportView.showNotification('warning', 'Vui lòng chọn một xe có trong danh sách.');
                                return;
                            }
                            if ($("#customer_id").attr('data-customerId') == '') {
                                transportView.showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
                                return;
                            }
                            if ($("#product_id").attr('data-productId') == '') {
                                transportView.showNotification('warning', 'Vui lòng chọn một hàng có trong danh sách.');
                                return;
                            }
                        }

                        transportView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: transportView.action,
                            _transport: transportView.current
                        };
                        if (transportView.action == 'delete') {
                            sendToServer._id = transportView.idDelete;
                        }
                        console.log("CLIENT");
                        console.log(sendToServer._transport);
                        $.ajax({
                            url: url + 'transport/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            console.log("SERVER");
                            console.log(data);
                            if (jqXHR.status == 201) {
                                switch (transportView.action) {
                                    case 'add':
                                        data['transport'].fullNumber = data['transport']['vehicles_areaCode'] + '-' + data['transport']['vehicles_vehicleNumber'];
                                        transportView.dataTransport.push(data['transport']);

                                        transportView.dataVoucherTransport = _.union(transportView.dataVoucherTransport, data['voucherTransport']);

                                        transportView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var Old = _.find(transportView.dataTransport, function (o) {
                                            return o.id == sendToServer._transport.id;
                                        });
                                        var indexOfOld = _.indexOf(transportView.dataTransport, Old);

                                        data['transport'].fullNumber = data['transport']['vehicles_areaCode'] + '-' + data['transport']['vehicles_vehicleNumber'];
                                        transportView.dataTransport.splice(indexOfOld, 1, data['transport']);

                                        _.remove(transportView.dataVoucherTransport, function (currentObject) {
                                            return currentObject.transport_id === sendToServer._transport.id;
                                        });
                                        transportView.dataVoucherTransport = transportView.dataVoucherTransport.concat(data['voucherTransport']);

                                        transportView.showNotification("success", "Cập nhật thành công!");
                                        transportView.hideControl();
                                        break;
                                    case 'delete':
                                        var Old = _.find(transportView.dataTransport, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfOld = _.indexOf(transportView.dataTransport, Old);
                                        transportView.dataTransport.splice(indexOfOld, 1);
                                        transportView.showNotification("success", "Xóa thành công!");
                                        transportView.displayModal("hide", "#modal-confirmDelete");
                                        break;
                                    default:
                                        break;
                                }
                                transportView.table.clear().rows.add(transportView.dataTransport).draw();
                                transportView.clearInput();
                            } else {
                                transportView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
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
                                transportView.showNotification("success", "Thêm thành công!");
                                transportView.displayModal("hide", "#modal-addVoucher");
                                transportView.clearInput();
                                //
                                transportView.dataVoucher.push(data['voucher']);
                            } else {
                                transportView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmVoucher").find("label[class=error]").css("color", "red");
                    }
                },

                postDataPostageOfCustomer: function (cust_id) {
                    var sendToServer = {
                        _token: _token,
                        _cust_id: cust_id
                    };
                    $.ajax({
                        url: url + 'customer/postage',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            $("input[id='cashDelivery']").val(data['postage']);
                        } else {
                            transportView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        transportView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                searchFromDateToDate: function() {
                    var fromDate = $("#dateOnlySearch").find(".start").val();
                    var toDate = $("#dateOnlySearch").find(".end").val();
                    fromDate = moment(fromDate, "DD-MM-YYYY");
                    toDate = moment(toDate, "DD-MM-YYYY");

                    if(fromDate.isValid() && toDate.isValid()){
                        var found = _.filter(transportView.dataTransport, function(o){
                            var find = moment(o.receiveDate, "YYYY-MM-DD");
                            return moment(find).isBetween(fromDate, toDate, null, '[]');
                        });
                        transportView.table.clear().rows.add(found).draw();
                    } else {
                        transportView.showNotification('warning', 'Giá trị nhập vào không phải định dạng ngày tháng, vui lòng nhập lại!');
                    }
                },
                clearSearch: function(){
                    $("#dateOnlySearch").find(".start").datepicker('update', '');
                    $("#dateOnlySearch").find(".end").datepicker('update', '');
                    transportView.table.clear().rows.add(transportView.dataTransport).draw();
                },
                showCurrentRows: function() {
                    $(transportView.table.$('tr', {"filter":"applied"}).each( function () {
                        console.log($(this).find("td:eq(1)").text());
                    } ));
                }
            };
            transportView.loadData();
        } else {
            transportView.loadData();
        }
    });
</script>