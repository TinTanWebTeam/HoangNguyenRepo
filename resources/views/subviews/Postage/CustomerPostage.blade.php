<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 55%;
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

<!-- Begin Table Postage -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li class="active">QL cước phí</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="postageView.addPostage();">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
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
                                <th>Cước phí</th>
                                <th>Khách hàng</th>
                                <th>Tháng</th>
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
<!-- End Table Postage -->

<!-- Begin divControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thêm mới cước phí
                <div class="menu-toggles pull-right" onclick="postageView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-12 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="customer_id"><b>Khách hàng</b></label>
                                        <input type="text" class="form-control cursor-copy" id="customer_id" name="customer_id"
                                               readonly placeholder="Nhấp đôi để chọn khách hàng"
                                               data-customerId=""
                                               ondblclick="postageView.loadListCustomer()">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="postage"><b>Cước phí</b></label>
                                        <input type="number" class="form-control" id="postage" name="postage">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="month"><b>Tháng</b></label>
                                        <select class="form-control" id="month" name="month">
                                            @for($i = 1; $i < 13; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary marginRight" onclick="postageView.save()">Hoàn
                                        tất
                                    </button>
                                    <button type="button" class="btn default" onclick="postageView.clearInput()">Huỷ
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

<!-- Modal confirm delete Postage -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa cước phí này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="postageView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="postageView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Postage -->

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

<script>
    $(function () {
        if (typeof postageView === 'undefined') {
            postageView = {
                table: null,
                tableCustomer: null,

                dataPostage: null,
                dataCustomer: null,

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

                    postageView.clearValidation("#frmControl");
                    postageView.clearInput();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (postageView.action == 'delete' && type == 'hide') {
                        postageView.action = null;
                        postageView.idDelete = null;
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
                    $("input[id='customer_id']").val('');
                    $("#customer_id").attr("data-customerId", "");

                    $("input[id='postage']").val('');
                    $("select[id='month']").val('');
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'postage/postages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            postageView.dataPostage = data['postages'];
                            postageView.fillDataToDatatable(postageView.dataPostage);

                            postageView.dataCustomer = data['customers'];
                        } else {
                            postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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

                    //Event click for table modal
                    $("#table-customer").find("tbody").on('click', 'tr', function () {
                        $('#customer_id').attr('data-customerId', $(this).find('td:first')[0].innerText);
                        $('input[id=customer_id]').val($(this).find('td:eq(2)')[0].innerText);
                        postageView.displayModal("hide", "#modal-customer");
                    });
                },
                loadListCustomer: function () {
                    $.ajax({
                        url: url + 'customer/customers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (postageView.tableCustomer != null) {
                                postageView.tableCustomer.destroy();
                            }
                            postageView.tableCustomer = $('#table-customer').DataTable({
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
                            postageView.displayModal("show", "#modal-customer");
                        } else {
                            postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },

                fillDataToDatatable: function (data) {
                    postageView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {
                                data: 'postage',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {data: 'customers_fullName'},
                            {data: 'month'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="postageView.editPostage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="postageView.deletePostage(' + full.id + ')">';
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
                    $("input[id='vehicle_id']").val(postageView.current["vehicles_areaCode"] + '-' + postageView.current["vehicles_vehicleNumber"]);
                    $("#vehicle_id").attr('data-vehicleId', postageView.current["vehicles_id"]);
                    $("input[id='customer_id']").val(postageView.current["customers_fullName"]);
                    $("#customer_id").attr('data-customerId', postageView.current["customers_id"]);
                    $("input[id='product_id']").val(postageView.current["products_name"]);
                    $("#product_id").attr('data-productId', postageView.current["products_id"]);

                    $("input[id='quantumProduct']").val(postageView.current["quantumProduct"]);
                    $("input[id='weight']").val(postageView.current["weight"]);
                    $("input[id='cashRevenue']").val(postageView.current["cashRevenue"]);
                    $("input[id='cashDelivery']").val(postageView.current["cashDelivery"]);
                    $("input[id='cashReceive']").val(postageView.current["cashReceive"]);
                    $("input[id='receiver']").val(postageView.current["receiver"]);

                    var day = postageView.current["receiveDate"].substr(8,2);
                    var month = postageView.current["receiveDate"].substr(5,2);
                    var year = postageView.current["receiveDate"].substr(0,4);
                    var hourMinus = postageView.current["receiveDate"].substr(11,5);
                    $("input[id='receiveDate']").val(day + "/" + month + "/" + year + " " + hourMinus);

                    $("input[id='receivePlace']").val(postageView.current["receivePlace"]);
                    $("input[id='deliveryPlace']").val(postageView.current["deliveryPlace"]);
                    $("input[id='voucherNumber']").val(postageView.current["voucherNumber"]);
                    $("input[id='voucherQuantumProduct']").val(postageView.current["voucherQuantumProduct"]);
                    $("input[id='note']").val(postageView.current["note"]);
                    $("select[id='status']").val(postageView.current["status_id"]);
                    $("input[id='cost']").val(postageView.current["cost"]);
                    $("input[id='costs_note']").val(postageView.current["costs_note"]);

                    var strVoucherName = "";
                    for (var i = 0; i < postageView.arrayVoucher.length; i++) {
                        var objVoucher = _.clone(_.find(postageView.dataVoucher, function (o) {
                            return o.id == postageView.arrayVoucher[i];
                        }), true);
                        strVoucherName += objVoucher.name + ", ";
                    }
                    $("input[id='voucher_transport']").val(strVoucherName);

                },
                fillFormDataToCurrentObject: function () {
                    if (postageView.action == 'add') {
                        postageView.current = {
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
                            voucher_transport: postageView.arrayVoucher
                        };
                    } else if (postageView.action == 'update') {
                        postageView.current.vehicles_id = $("#vehicle_id").attr("data-vehicleId");
                        postageView.current.customers_id = $("#customer_id").attr("data-customerId");
                        postageView.current.products_id = $("#product_id").attr("data-productId");
                        postageView.current.quantumProduct = $("input[id='quantumProduct']").val();
                        postageView.current.weight = $("input[id='weight']").val();
                        postageView.current.cashRevenue = $("input[id='cashRevenue']").val();
                        postageView.current.cashDelivery = $("input[id='cashDelivery']").val();
                        postageView.current.cashReceive = $("input[id='cashReceive']").val();
                        postageView.current.receiver = $("input[id='receiver']").val();
                        postageView.current.receiveDate = $("input[id='receiveDate']").val();
                        postageView.current.receivePlace = $("input[id='receivePlace']").val();
                        postageView.current.deliveryPlace = $("input[id='deliveryPlace']").val();
                        postageView.current.voucherNumber = $("input[id='voucherNumber']").val();
                        postageView.current.voucherQuantumProduct = $("input[id='voucherQuantumProduct']").val();
                        postageView.current.note = $("input[id='note']").val();
                        postageView.current.status_id = $("select[id='status']").val();
                        postageView.current.cost = $("input[id='cost']").val();
                        postageView.current.costs_note = $("input[id='costs_note']").val();
                        postageView.current.voucher_transport = postageView.arrayVoucher;
                    }
                },

                editPostage: function (id) {
                    postageView.current = null;
                    postageView.current = _.clone(_.find(postageView.dataTransport, function (o) {
                        return o.id == id;
                    }), true);

                    var arrayVoucherTransport = _.clone(_.filter(postageView.dataVoucherTransport, function (o) {
                        return o.transport_id == id;
                    }), true);

                    postageView.arrayVoucher = _.map(arrayVoucherTransport, 'voucher_id');

                    postageView.fillCurrentObjectToForm();
                    postageView.action = 'update';
                    postageView.showControl();
                },
                addPostage: function () {
                    postageView.arrayVoucher = [];
                    postageView.current = null;
                    postageView.action = 'add';
                    postageView.showControl();
                },
                deletePostage: function (id) {
                    postageView.action = 'delete';
                    postageView.idDelete = id;
                    postageView.displayModal("show", "#modal-confirmDelete");
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
                    postageView.formValidate();
                    if ($("#frmControl").valid()) {
                        if (postageView.action != 'delete') {
                            if ($("#vehicle_id").attr('data-vehicleId') == '') {
                                postageView.showNotification('warning', 'Vui lòng chọn một xe có trong danh sách.');
                                return;
                            }
                            if ($("#customer_id").attr('data-customerId') == '') {
                                postageView.showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
                                return;
                            }
                            if ($("#product_id").attr('data-productId') == '') {
                                postageView.showNotification('warning', 'Vui lòng chọn một hàng có trong danh sách.');
                                return;
                            }
                        }

                        postageView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: postageView.action,
                            _transport: postageView.current
                        };
                        if (postageView.action == 'delete') {
                            sendToServer._id = postageView.idDelete;
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
                                switch (postageView.action) {
                                    case 'add':
                                        data['transport'][0].fullNumber = data['transport'][0]['vehicles_areaCode'] + '-' + data['transport'][0]['vehicles_vehicleNumber'];
                                        postageView.dataTransport.push(data['transport'][0]);

                                        postageView.dataVoucherTransport = _.union(postageView.dataVoucherTransport, data['voucherTransport']);

                                        postageView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var Old = _.find(postageView.dataTransport, function (o) {
                                            return o.id == sendToServer._transport.id;
                                        });
                                        var indexOfOld = _.indexOf(postageView.dataTransport, Old);

                                        data['transport'][0].fullNumber = data['transport'][0]['vehicles_areaCode'] + '-' + data['transport'][0]['vehicles_vehicleNumber'];
                                        postageView.dataTransport.splice(indexOfOld, 1, data['transport'][0]);

                                        _.remove(postageView.dataVoucherTransport, function (currentObject) {
                                            return currentObject.transport_id === sendToServer._transport.id;
                                        });
                                        postageView.dataVoucherTransport = postageView.dataVoucherTransport.concat(data['voucherTransport']);

                                        postageView.showNotification("success", "Cập nhật thành công!");
                                        postageView.hideControl();
                                        break;
                                    case 'delete':
                                        var Old = _.find(postageView.dataTransport, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfOld = _.indexOf(postageView.dataTransport, Old);
                                        postageView.dataTransport.splice(indexOfOld, 1);
                                        postageView.showNotification("success", "Xóa thành công!");
                                        postageView.displayModal("hide", "#modal-confirmDelete");
                                        break;
                                    default:
                                        break;
                                }
                                postageView.table.clear().rows.add(postageView.dataTransport).draw();
                                postageView.clearInput();
                            } else {
                                postageView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                },
            };
            postageView.loadData();
        } else {
            postageView.loadData();
        }
    });
</script>