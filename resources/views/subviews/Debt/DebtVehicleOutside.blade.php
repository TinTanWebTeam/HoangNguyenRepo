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
                        <li><a href="javascript:;">QL công nợ</a></li>
                        <li class="active">Nhà xe ngoài</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-warning btn-circle btn-md"
                             data-toggle="tooltip" data-placement="left" title="Xuất hóa đơn">
                            <i class="glyphicon glyphicon-list-alt icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="table-data">
                            <thead>
                            <tr class="active">
                                <th>Mã</th>
                                <th>Khách hàng</th>
                                <th>Số xe</th>
                                <th>Nơi nhận</th>
                                <th>Nơi giao</th>
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
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div>
<!-- End Table Transport -->

<!-- Begin divControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thêm mới yêu cầu giao hàng
                <div class="menu-toggles pull-right" onclick="debtGarageView.hideControl()">
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
                                        <input type="text" class="form-control cursor-copy" id="vehicle_id" name="vehicle_id"
                                               readonly placeholder="Nhấp đôi để chọn xe"
                                               data-vehicleId=""
                                               ondblclick="debtGarageView.loadListVehicle()">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="customer_id"><b>Khách hàng</b></label>
                                        <input type="text" class="form-control cursor-copy" id="customer_id" name="customer_id"
                                               readonly placeholder="Nhấp đôi để chọn khách hàng"
                                               data-customerId=""
                                               ondblclick="debtGarageView.loadListCustomer()">
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="product_id"><b>Hàng</b></label>
                                        <input type="text" class="form-control cursor-copy" id="product_id" name="product_id"
                                               readonly placeholder="Nhấp đôi để chọn hàng"
                                               data-productId=""
                                               ondblclick="debtGarageView.loadListProduct()">
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
                                        <div class='input-group date' id='datetimepicker1'>
                                            <label for="receiveDate"><b>Ngày nhận</b></label>
                                            <input id="receiveDate" name="receiveDate" type='text' class="form-control" value="<?php echo date('d-m-Y H-i'); ?>">
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
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
                                        <label for="note"><b>Ghi chú</b></label>
                                        <input type="text" class="form-control" id="note" name="note">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="status"><b>Trạng thái</b></label>
                                        <select id="status" name="status" class="form-control"></select>
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
                                                       ondblclick="debtGarageView.loadListVoucher()">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle" onclick="debtGarageView.displayModal('show', '#modal-addVoucher')">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group form-md-line-input">
                                        <label for="price_id"><b>Chi phí</b></label>
                                        <select name="price_id" id="price_id" class="form-control" disabled>
                                            <option value="" selected>Khác</option>
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
                                        <label for="costs_note"><b>Ghi chú</b></label>
                                        <input type="text" class="form-control" id="costs_note" name="costs_note">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary marginRight" onclick="debtGarageView.save()">Hoàn
                                        tất
                                    </button>
                                    <button type="button" class="btn default" onclick="debtGarageView.clearInput()">Huỷ
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

<script>
    $(function () {
        if (typeof debtGarageView === 'undefined') {
            debtGarageView = {
                table: null,

                dataTransport: null,

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

                    debtGarageView.clearValidation("#frmControl");
                    debtGarageView.clearInput();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (debtGarageView.action == 'delete' && type == 'hide') {
                        debtGarageView.action = null;
                        debtGarageView.idDelete = null;
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

                    debtGarageView.arrayVoucher = [];
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'transport/transports',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            debtGarageView.dataTransport = data['transports'];
                            debtGarageView.fillDataToDatatable(debtGarageView.dataTransport);

                            debtGarageView.dataVoucherTransport = data['voucherTransports'];
                            debtGarageView.dataVoucher = data['vouchers'];
                            debtGarageView.dataStatus = data['statuses'];
                            debtGarageView.loadSelectBox(debtGarageView.dataStatus);
                        } else {
                            debtGarageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        debtGarageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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
                loadSelectBox: function (lstStatus) {
                    //reset selectbox
                    $('#status')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("status");
                    for (var i = 0; i < lstStatus.length; i++) {
                        var opt = lstStatus[i]['status'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstStatus[i]['id'];
                        select.appendChild(el);
                    }
                },

                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_areaCode'] + "-" + data[i]['vehicles_vehicleNumber'];
                    }
                    debtGarageView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'fullNumber'},
                            {data: 'products_name'},
                            {data: 'receivePlace'},
                            {data: 'deliveryPlace'},
                            {data: 'customers_fullName'},
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
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="debtGarageView.editTransport(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="debtGarageView.deleteTransport(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "10%"
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
                    $("input[id='vehicle_id']").val(debtGarageView.current["vehicles_areaCode"] + '-' + debtGarageView.current["vehicles_vehicleNumber"]);
                    $("#vehicle_id").attr('data-vehicleId', debtGarageView.current["vehicles_id"]);
                    $("input[id='customer_id']").val(debtGarageView.current["customers_fullName"]);
                    $("#customer_id").attr('data-customerId', debtGarageView.current["customers_id"]);
                    $("input[id='product_id']").val(debtGarageView.current["products_name"]);
                    $("#product_id").attr('data-productId', debtGarageView.current["products_id"]);

                    $("input[id='quantumProduct']").val(debtGarageView.current["quantumProduct"]);
                    $("input[id='weight']").val(debtGarageView.current["weight"]);
                    $("input[id='cashRevenue']").val(debtGarageView.current["cashRevenue"]);
                    $("input[id='cashDelivery']").val(debtGarageView.current["cashDelivery"]);
                    $("input[id='cashReceive']").val(debtGarageView.current["cashReceive"]);
                    $("input[id='receiver']").val(debtGarageView.current["receiver"]);

                    var day = debtGarageView.current["receiveDate"].substr(8,2);
                    var month = debtGarageView.current["receiveDate"].substr(5,2);
                    var year = debtGarageView.current["receiveDate"].substr(0,4);
                    var hourMinus = debtGarageView.current["receiveDate"].substr(11,5);
                    $("input[id='receiveDate']").val(day + "/" + month + "/" + year + " " + hourMinus);

                    $("input[id='receivePlace']").val(debtGarageView.current["receivePlace"]);
                    $("input[id='deliveryPlace']").val(debtGarageView.current["deliveryPlace"]);
                    $("input[id='voucherNumber']").val(debtGarageView.current["voucherNumber"]);
                    $("input[id='voucherQuantumProduct']").val(debtGarageView.current["voucherQuantumProduct"]);
                    $("input[id='note']").val(debtGarageView.current["note"]);
                    $("select[id='status']").val(debtGarageView.current["status_id"]);
                    $("input[id='cost']").val(debtGarageView.current["cost"]);
                    $("input[id='costs_note']").val(debtGarageView.current["costs_note"]);

                    var strVoucherName = "";
                    for (var i = 0; i < debtGarageView.arrayVoucher.length; i++) {
                        var objVoucher = _.clone(_.find(debtGarageView.dataVoucher, function (o) {
                            return o.id == debtGarageView.arrayVoucher[i];
                        }), true);
                        strVoucherName += objVoucher.name + ", ";
                    }
                    $("input[id='voucher_transport']").val(strVoucherName);

                },
                fillFormDataToCurrentObject: function () {
                    if (debtGarageView.action == 'add') {
                        debtGarageView.current = {
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
                            status_id: $("select[id='status']").val(),
                            cost: $("input[id='cost']").val(),
                            costs_note: $("input[id='costs_note']").val(),
                            voucher_transport: debtGarageView.arrayVoucher
                        };
                    } else if (debtGarageView.action == 'update') {
                        debtGarageView.current.vehicles_id = $("#vehicle_id").attr("data-vehicleId");
                        debtGarageView.current.customers_id = $("#customer_id").attr("data-customerId");
                        debtGarageView.current.products_id = $("#product_id").attr("data-productId");
                        debtGarageView.current.quantumProduct = $("input[id='quantumProduct']").val();
                        debtGarageView.current.weight = $("input[id='weight']").val();
                        debtGarageView.current.cashRevenue = $("input[id='cashRevenue']").val();
                        debtGarageView.current.cashDelivery = $("input[id='cashDelivery']").val();
                        debtGarageView.current.cashReceive = $("input[id='cashReceive']").val();
                        debtGarageView.current.receiver = $("input[id='receiver']").val();
                        debtGarageView.current.receiveDate = $("input[id='receiveDate']").val();
                        debtGarageView.current.receivePlace = $("input[id='receivePlace']").val();
                        debtGarageView.current.deliveryPlace = $("input[id='deliveryPlace']").val();
                        debtGarageView.current.voucherNumber = $("input[id='voucherNumber']").val();
                        debtGarageView.current.voucherQuantumProduct = $("input[id='voucherQuantumProduct']").val();
                        debtGarageView.current.note = $("input[id='note']").val();
                        debtGarageView.current.status_id = $("select[id='status']").val();
                        debtGarageView.current.cost = $("input[id='cost']").val();
                        debtGarageView.current.costs_note = $("input[id='costs_note']").val();
                        debtGarageView.current.voucher_transport = debtGarageView.arrayVoucher;
                    }
                },

                editTransport: function (id) {
                    debtGarageView.current = null;
                    debtGarageView.current = _.clone(_.find(debtGarageView.dataTransport, function (o) {
                        return o.id == id;
                    }), true);

                    var arrayVoucherTransport = _.clone(_.filter(debtGarageView.dataVoucherTransport, function (o) {
                        return o.transport_id == id;
                    }), true);

                    debtGarageView.arrayVoucher = _.map(arrayVoucherTransport, 'voucher_id');

                    debtGarageView.fillCurrentObjectToForm();
                    debtGarageView.action = 'update';
                    debtGarageView.showControl();
                },
                addTransport: function () {
                    debtGarageView.arrayVoucher = [];
                    debtGarageView.current = null;
                    debtGarageView.action = 'add';
                    debtGarageView.showControl();
                },
                deleteTransport: function (id) {
                    debtGarageView.action = 'delete';
                    debtGarageView.idDelete = id;
                    debtGarageView.displayModal("show", "#modal-confirmDelete");
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
                            receiveDate: "required",
                            receivePlace: "required",
                            deliveryPlace: "required",
                            voucherNumber: "required",
                            voucherQuantumProduct: "required"
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
                            receiveDate: "Vui lòng nhập ngày nhận",
                            receivePlace: "Vui lòng nhập nơi nhận",
                            deliveryPlace: "Vui lòng nhập nơi giao",
                            voucherNumber: "Vui lòng nhập số chứng từ",
                            voucherQuantumProduct: "Vui lòng nhập số lượng hàng trên chứng từ"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
//                    var validator = $(idForm).validate();
//                    validator.resetForm();
                },

                save: function () {
                    debtGarageView.formValidate();
                    if ($("#frmControl").valid()) {
                        if (debtGarageView.action != 'delete') {
                            if ($("#vehicle_id").attr('data-vehicleId') == '') {
                                debtGarageView.showNotification('warning', 'Vui lòng chọn một xe có trong danh sách.');
                                return;
                            }
                            if ($("#customer_id").attr('data-customerId') == '') {
                                debtGarageView.showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
                                return;
                            }
                            if ($("#product_id").attr('data-productId') == '') {
                                debtGarageView.showNotification('warning', 'Vui lòng chọn một hàng có trong danh sách.');
                                return;
                            }
                        }

                        debtGarageView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: debtGarageView.action,
                            _transport: debtGarageView.current
                        };
                        if (debtGarageView.action == 'delete') {
                            sendToServer._id = debtGarageView.idDelete;
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
                                switch (debtGarageView.action) {
                                    case 'add':
                                        data['transport'][0].fullNumber = data['transport'][0]['vehicles_areaCode'] + '-' + data['transport'][0]['vehicles_vehicleNumber'];
                                        debtGarageView.dataTransport.push(data['transport'][0]);

                                        debtGarageView.dataVoucherTransport = _.union(debtGarageView.dataVoucherTransport, data['voucherTransport']);

                                        debtGarageView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var Old = _.find(debtGarageView.dataTransport, function (o) {
                                            return o.id == sendToServer._transport.id;
                                        });
                                        var indexOfOld = _.indexOf(debtGarageView.dataTransport, Old);

                                        data['transport'][0].fullNumber = data['transport'][0]['vehicles_areaCode'] + '-' + data['transport'][0]['vehicles_vehicleNumber'];
                                        debtGarageView.dataTransport.splice(indexOfOld, 1, data['transport'][0]);

                                        _.remove(debtGarageView.dataVoucherTransport, function (currentObject) {
                                            return currentObject.transport_id === sendToServer._transport.id;
                                        });
                                        debtGarageView.dataVoucherTransport = debtGarageView.dataVoucherTransport.concat(data['voucherTransport']);

                                        debtGarageView.showNotification("success", "Cập nhật thành công!");
                                        debtGarageView.hideControl();
                                        break;
                                    case 'delete':
                                        var Old = _.find(debtGarageView.dataTransport, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfOld = _.indexOf(debtGarageView.dataTransport, Old);
                                        debtGarageView.dataTransport.splice(indexOfOld, 1);
                                        debtGarageView.showNotification("success", "Xóa thành công!");
                                        debtGarageView.displayModal("hide", "#modal-confirmDelete");
                                        break;
                                    default:
                                        break;
                                }
                                debtGarageView.table.clear().rows.add(debtGarageView.dataTransport).draw();
                                debtGarageView.clearInput();
                            } else {
                                debtGarageView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            debtGarageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                }
            };
            debtGarageView.loadData();
        } else {
            debtGarageView.loadData();
        }
    });
</script>