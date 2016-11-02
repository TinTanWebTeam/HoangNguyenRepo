<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

    .marginRight {
        margin-right: 5px;
    }

    @media (max-height: 500px) {
        #divControl {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }
    }

    #divControl .panel-body {
        height: 488px;
    }
</style>

<!-- Table -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL khách hàng</a></li>
                        <li class="active">Khách hàng</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="customerView.addCustomer();">
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
                                <th>Mã khách hàng</th>
                                <th>Loại khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Mã số thuế</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Ghi chú</th>
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
<!-- end Table -->

<!-- Control -->
<div class="row">
    <div id="divControl" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl">Thêm mới khách hàng</span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="customerView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" id="frmControl">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="fullName"><b>Họ và tên</b></label>
                                            <input type="text" class="form-control"
                                                   id="fullName"
                                                   name="fullName"
                                                   autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="customerType_id"><b>Loại khách hàng</b></label>
                                            <div class="row">
                                                <div class="col-sm-10 col-xs-10">
                                                    <select name="customerType_id" id="customerType_id" class="form-control">

                                                    </select>
                                                </div>
                                                <div class="col-sm-2 col-xs-2">
                                                    <div class="btn btn-primary btn-sm btn-circle" title="Thêm loại khách hàng"
                                                         onclick="customerView.displayModal('show', '#modal-addCustomerType')">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="taxCode"><b>Mã số thuế</b></label>
                                            <input type="text" class="form-control"
                                                   id="taxCode"
                                                   name="taxCode">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="address"><b>Địa chỉ</b></label>
                                            <input type="text" class="form-control"
                                                   id="address"
                                                   name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="phone"><b>Số điện thoại</b></label>
                                            <input type="number" class="form-control"
                                                   id="phone"
                                                   name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="email"><b>Email</b></label>
                                            <input type="email" class="form-control"
                                                   id="email"
                                                   name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="percentFuel"><b>Phần trăm nhiên liệu</b></label>
                                                    <input type="number" id="percentFuel" name="percentFuel"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="percentFuelChange"><b>Phần trăm nhiên liệu thay đổi</b></label>
                                                    <input type="number" id="percentFuelChange" name="percentFuelChange"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group form-md-line-input">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <textarea class="form-control" id="note" name="note" rows="4" cols="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-actions noborder">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary marginRight"
                                                        onclick="customerView.save()">
                                                    Hoàn tất
                                                </button>
                                                <button type="button" class="btn default" onclick="customerView.clearInput()">
                                                    Nhập lại
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="text text-primary">Nhân viên khách hàng</span>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="table-invoiceCustomerDetail">
                                        <thead>
                                        <tr class="active">
                                            <th>Mã</th>
                                            <th>Tên</th>
                                            <th>Chức vụ</th>
                                            <th>Điện thoại</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <form role="form" id="frmStaffCustomer">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group form-md-line-input ">
                                                <label for="fullName"><b>Tên nhân viên</b></label>
                                                <input type="text" class="form-control"
                                                       id="fullName"
                                                       name="fullName">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group form-md-line-input ">
                                                <label for="fullName"><b>Chức vụ</b></label>
                                                <input type="text" class="form-control"
                                                       id="fullName"
                                                       name="fullName">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group form-md-line-input ">
                                                <label for="fullName"><b>Điện thoại</b></label>
                                                <input type="text" class="form-control"
                                                       id="fullName"
                                                       name="fullName">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="address"><b>Địa chỉ</b></label>
                                                <input type="text" class="form-control"
                                                       id="address"
                                                       name="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-6">
                                            <div class="form-group form-md-line-input">
                                                <label for="address"><b>Ngày sinh</b></label>
                                                <input type="text" class="form-control"
                                                       id="address"
                                                       name="address">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group form-md-line-input ">
                                                <label for="fullName"><b>Email</b></label>
                                                <input type="text" class="form-control"
                                                       id="fullName"
                                                       name="fullName">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group form-md-line-input">
                                                <label for="address"><b>Ghi chú</b></label>
                                                <input type="text" class="form-control"
                                                       id="address"
                                                       name="address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-actions noborder">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary marginRight"
                                                            onclick="customerView.save()">
                                                        Hoàn tất
                                                    </button>
                                                    <button type="button" class="btn default" onclick="customerView.clearInput()">
                                                        Nhập lại
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
    </div> <!-- end #divControl -->
</div>
<!-- end Control -->

<!-- Modal confirm delete Customer -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa khách hàng này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="customerView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="customerView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Customer -->

<!-- Modal add customerTypes -->
<div class="row">
    <div id="modal-addCustomerType" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm loại khách hàng</h4>
                </div>
                <div class="modal-body">
                    <form id="frmCustomerType">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="CustomerType_name"><b>Tên loại khách hàng</b></label>
                                    <input type="text" class="form-control"
                                           id="CustomerType_name"
                                           name="CustomerType_name">
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
                                                onclick="customerView.saveCustomerType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="customerView.displayModal('hide','#modal-addCustomerType')">Huỷ
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
<!-- end Modal add customerTypes -->

<script>
    $(function () {
        if (typeof (customerView) === 'undefined') {
            customerView = {
                table: null,
                tableCustomer: null,
                tableCustomerType: null,
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

                    customerView.clearValidation("#frmControl");
                    customerView.clearInput();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (customerView.action == 'delete' && type == 'hide') {
                        customerView.action = null;
                        customerView.idDelete = null;
                    }
                    customerView.clearValidation("#frmCustomerType");
                    customerView.clearInput();
                },
                clearInput: function () {
                    $("input[id='fullName']").val('');
                    $("input[id='address']").val('');
                    $("input[id='taxCode']").val('');
                    $("input[id='phone']").val('');
                    $("input[id='email']").val('');
                    $("textarea[id='note']").val('');
                    customerView.current = null;

                    $("input[id='CustomerType_name']").val('');
                    $("textarea[id='description']").val('');
                },

                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'customer/customers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            customerView.tableCustomer = data['customers'];
                            customerView.fillDataToDatatable(data['customers']);

                            customerView.tableCustomerType = data['customerTypes'];
                            customerView.loadSelectBox(data['customerTypes']);
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    customerView.renderScrollbar();
                },
                loadSelectBox: function (lstCustomerType) {
                    //reset selectbox
                    $('#customerType_id')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("customerType_id");
                    for (var i = 0; i < lstCustomerType.length; i++) {
                        var opt = lstCustomerType[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstCustomerType[i]['id'];
                        select.appendChild(el);
                    }
                },

                fillDataToDatatable: function (data) {
                    customerView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'customerTypes_name'},
                            {data: 'fullName'},
                            {data: 'taxCode'},
                            {data: 'address'},
                            {data: 'phone'},
                            {data: 'email'},
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh Sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="customerView.editCustomer(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="customerView.deleteCustomer(' + full.id + ')">';
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
                    $("input[id='fullName']").val(customerView.current["fullName"]);
                    $("input[id='taxCode']").val(customerView.current["taxCode"]);
                    $("input[id='address']").val(customerView.current["address"]);
                    $("input[id='phone']").val(customerView.current["phone"]);
                    $("input[id='email']").val(customerView.current["email"]);
                    $("textarea[id='note']").val(customerView.current["note"]);
                    $("select[id='customerType_id']").val(customerView.current["customerType_id"]);
                },
                fillFormDataToCurrentObject: function () {
                    if (customerView.action == 'add') {
                        customerView.current = {
                            fullName: $("input[id='fullName']").val(),
                            taxCode: $("input[id='taxCode']").val(),
                            address: $("input[id='address']").val(),
                            phone: $("input[id='phone']").val(),
                            email: $("input[id='email']").val(),
                            note: $("textarea[id='note']").val(),
                            customerType_id: $('#customerType_id').val()
                        };
                    } else if (customerView.action == 'update') {
                        customerView.current.fullName = $("input[id='fullName']").val();
                        customerView.current.taxCode = $("input[id='taxCode']").val();
                        customerView.current.address = $("input[id='address']").val();
                        customerView.current.phone = $("input[id='phone']").val();
                        customerView.current.email = $("input[id='email']").val();
                        customerView.current.note = $("textarea[id='note']").val();
                        customerView.current.customerType_id = $("select[id='customerType_id']").val();
                    }
                },

                editCustomer: function (id) {
                    customerView.current = null;
                    customerView.current = _.clone(_.find(customerView.tableCustomer, function (o) {
                        return o.id == id;
                    }), true);
                    customerView.fillCurrentObjectToForm();
                    customerView.action = 'update';
                    $("#divControl").find(".titleControl").html("Cập nhật khách hàng");
                    customerView.showControl();
                },
                addCustomer: function () {
                    customerView.current = null;
                    customerView.action = 'add';
                    $("#divControl").find(".titleControl").html("Thêm mới khách hàng");
                    customerView.showControl();
                },
                deleteCustomer: function (id) {
                    customerView.action = 'delete';
                    customerView.idDelete = id;
                    customerView.displayModal("show", "#modal-confirmDelete");
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            customerType_id: "required",
                            fullName: "required",
                            taxCode: "required",
                            email: "email"
                        },
                        messages: {
                            customerType_id: "Vui lòng chọn loại khách hàng",
                            fullName: "Vui lòng nhập tên khách hàng",
                            taxCode: "Vui lòng nhập mã số thuế",
                            email: "Vui lòng nhập một email hợp lệ"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
//                    var validator = $(idForm).validate();
//                    validator.resetForm();
                },

                save: function () {
                    customerView.formValidate();
                    if ($("#frmControl").valid()) {
                        customerView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: customerView.action,
                            _customer: customerView.current
                        };
                        if (customerView.action == 'delete') {
                            sendToServer._id = customerView.idDelete;
                        }
                        $.ajax({
                            url: url + 'customer/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                switch (customerView.action) {
                                    case 'add':
                                        customerView.tableCustomer.push(data['customer'][0]);
                                        showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var customerOld = _.find(customerView.tableCustomer, function (o) {
                                            return o.id == sendToServer._customer.id;
                                        });
                                        var indexOfCustomerOld = _.indexOf(customerView.tableCustomer, customerOld);
                                        customerView.tableCustomer.splice(indexOfCustomerOld, 1, data['customer'][0]);
                                        showNotification("success", "Cập nhật thành công!");
                                        customerView.hideControl();
                                        break;
                                    case 'delete':
                                        var customerOld = _.find(customerView.tableCustomer, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfCustomerOld = _.indexOf(customerView.tableCustomer, customerOld);
                                        customerView.tableCustomer.splice(indexOfCustomerOld, 1);
                                        showNotification("success", "Xóa thành công!");
                                        customerView.displayModal("hide", "#modal-confirmDelete");
                                        break;
                                    default:
                                        break;
                                }
                                customerView.table.clear().rows.add(customerView.tableCustomer).draw();
                                customerView.clearInput();
                            } else if (jqXHR.status == 203) {
                                showNotification("error", "Tên khách hàng đã tồn tại!");
                            } else {
                                showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                },
                validateCustomerType: function () {
                    $("#frmCustomerType").validate({
                        rules: {
                            CustomerType_name: "required"
                        },
                        messages: {
                            CustomerType_name: "Vui lòng nhập tên loại khách hàng"
                        }
                    });
                },
                saveCustomerType: function () {
                    customerView.validateCustomerType();
                    if ($("#frmCustomerType").valid()) {
                        var customerType = {
                            name: $("input[id='CustomerType_name']").val(),
                            description: $("textarea[id='description']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _customerType: customerType
                        };
                        $.ajax({
                            url: url + 'customer-type/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                showNotification("success", "Thêm thành công!");
                                customerView.displayModal("hide", "#modal-addCustomerType");
                                customerView.clearInput();
                                //
                                customerView.tableCustomerType.push(data['customerType']);
                                customerView.loadSelectBox(customerView.tableCustomerType);
                                $("select[id='customerType_id']").val(data['customerType']['id']);
                            } else {
                                showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                }
            };
            customerView.loadData();
        } else {
            customerView.loadData();
        }
    });
</script>
