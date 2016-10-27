<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 60%;
        display: none;
        right: 0;
        height: 60vh;
        width: 40%;
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

    #boxShadow {
        -webkit-box-shadow: 0px 0px 88px 5px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 0px 88px 5px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 0px 88px 5px rgba(0, 0, 0, 0.75);
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
                        <li class="active">Phân tài</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới" onclick="divisiveDriverView.addVehicleUser();">
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
                                <th>Số xe</th>
                                <th>Nhà xe</th>
                                <th>Tài xế</th>
                                <th>Điện thoại</th>
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
        <div class="panel panel-primary" id="boxShadow">
            <div class="panel-heading">Phân tài vào xe
                <div class="menu-toggles pull-right" onclick="divisiveDriverView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="col-sm-12">
                            <div class="row ">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicle_id"><b>Xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control"
                                                       id="vehicle_id"
                                                       name="vehicle_id"
                                                       data-vehicleId=""
                                                       placeholder="Nhấp đôi để chọn"
                                                       autofocus readonly
                                                       ondblclick="divisiveDriverView.loadListVehicle()">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm xe mới"
                                                     onclick="divisiveDriverView.addVehicle()">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="user_id"><b>Tài xế</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control"
                                                       id="user_id"
                                                       name="user_id"
                                                       data-userId=""
                                                       placeholder="Nhấp đôi để chọn"
                                                       readonly ondblclick="divisiveDriverView.loadListDriver()">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm mới tài xế"
                                                     onclick="divisiveDriverView.displayModal('show', '#modal-addDriver')">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary marginRight"
                                            onclick="divisiveDriverView.save()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="divisiveDriverView.clearInput()">
                                        Huỷ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end #divControl -->
</div>
<!-- end Control -->

<!-- Modal confirm delete VehicleUser -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="divisiveDriverView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="divisiveDriverView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete VehicleUser -->

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
                        <table class="table table-hover" id="table-vehicle">
                            <thead>
                            <tr>
                                <th>Mã xe</th>
                                <th>Số xe</th>
                                <th>Loại xe</th>
                                <th>Nhà xe</th>
                                <th>Kích thước</th>
                                <th>Trọng tải</th>
                                <th></th>
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

<!-- Modal list users -->
<div class="row">
    <div id="modal-user" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách tài xế</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-user">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Họ và tên</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th></th>
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
<!-- end Modal list users -->

<!-- Modal add Vehicle -->
<div class="row">
    <div id="modal-addVehicle" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm Xe</h4>
                </div>
                <div class="modal-body">
                    <form id="frmVehicle">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="areaCode"><b>Mã vùng</b></label>
                                    <input type="text" class="form-control"
                                           id="areaCode"
                                           name="areaCode">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleNumber"><b>Số xe</b></label>
                                    <input type="number" class="form-control"
                                           id="vehicleNumber"
                                           name="vehicleNumber">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="size"><b>Kích thước</b></label>
                                    <input type="number" class="form-control"
                                           id="size"
                                           name="size">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="weight"><b>Trọng tải</b></label>
                                    <input type="number" class="form-control"
                                           id="weight"
                                           name="weight">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="garage_id"><b>Nhà xe</b></label>

                                    <select class="form-control" id="garage_id"
                                            name="garage_id">
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleType_id"><b>Loại Xe</b></label>
                                    <select class="form-control" id="vehicleType_id"
                                            name="vehicleType_id">
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="divisiveDriverView.saveVehicle()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="divisiveDriverView.displayModal('hide','#modal-addVehicle')">
                                            Huỷ
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
<!-- end Modal add vehicle -->

<!-- Modal add Driver -->
<div class="row">
    <div id="modal-addDriver" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm tài xế</h4>
                </div>
                <div class="modal-body">
                    <form id="frmDriver">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="fullName"><b>Họ và tên</b></label>
                                    <input type="text" class="form-control"
                                           id="fullName"
                                           name="fullName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="phone"><b>Số điện thoại</b></label>
                                    <input type="number" class="form-control"
                                           id="phone"
                                           name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="address"><b>Địa chỉ</b></label>
                                    <input type="text" class="form-control"
                                           id="address"
                                           name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="note"><b>Ghi chú</b></label>
                                    <input type="text" class="form-control"
                                           id="note"
                                           name="note">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="divisiveDriverView.saveDriver()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="divisiveDriverView.displayModal('hide','#modal-addDriver')">
                                            Huỷ
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
<!-- end Modal add Driver -->

<script>
    $(function () {
        if (typeof divisiveDriverView === 'undefined') {
            divisiveDriverView = {
                table: null,
                tableVehicle: null,
                tableUser: null,

                dataVehicleUser: null,
                dataGarage: null,
                dataVehicleType: null,

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

                    divisiveDriverView.clearInput();
                    divisiveDriverView.clearValidation("frmControl");
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (divisiveDriverView.action == 'delete' && type == 'hide') {
                        divisiveDriverView.action = null;
                        divisiveDriverView.idDelete = null;
                    }
                    divisiveDriverView.clearInputVehicle();
                    divisiveDriverView.clearInputDriver();
                    divisiveDriverView.clearValidation('frmVehicle');
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
                    $("input[id='user_id']").val('');
                    $("#vehicle_id").attr("data-vehicleId", '');
                    $("#user_id").attr("data-userId", '');
                    divisiveDriverView.current = null;
                },
                clearInputVehicle: function () {
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                },
                clearInputDriver: function() {
                    $("input[id='fullName']").val('');
                    $("input[id='phone']").val('');
                    $("input[id='address']").val('');
                    $("input[id='note']").val('');
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'divisive-driver/vehicle-user',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            divisiveDriverView.dataVehicleUser = data['vehicleUser'];
                            divisiveDriverView.fillDataToDatatable(divisiveDriverView.dataVehicleUser);
                        } else {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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

                    $("#table-vehicle").find("tbody").on('click', 'tr', function () {
                        $('#vehicle_id').attr('data-vehicleId', $(this).find('td:first')[0].innerText);
                        $('#vehicle_id').val($(this).find('td:eq(1)')[0].innerText);
                        divisiveDriverView.displayModal("hide", "#modal-vehicle");
                    });
                    $("#table-user").find("tbody").on('click', 'tr', function () {
                        $('#user_id').attr('data-userId', $(this).find('td:first')[0].innerText);
                        $('#user_id').val($(this).find('td:eq(1)')[0].innerText);
                        divisiveDriverView.displayModal("hide", "#modal-user");
                    });
                },
                loadListVehicle: function () {
                    $.ajax({
                        url: url + 'vehicle-inside/vehicles',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (divisiveDriverView.tableVehicle != null) {
                                divisiveDriverView.tableVehicle.destroy();
                            }

                            for (var i = 0; i < data['vehicles'].length; i++) {
                                data['vehicles'][i].fullNumber = data['vehicles'][i]['areaCode'] + "-" + data['vehicles'][i]['vehicleNumber'];
                            }

                            divisiveDriverView.tableVehicle = $('#table-vehicle').DataTable({
                                language: languageOptions,
                                data: data['vehicles'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'fullNumber'},
                                    {data: 'vehicleTypes_name'},
                                    {data: 'garages_name'},
                                    {data: 'size'},
                                    {data: 'weight'}
                                ],
                                order: [[0, "desc"]]
                            })
                        } else {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    divisiveDriverView.displayModal("show", "#modal-vehicle")
                },
                loadListDriver: function () {
                    $.ajax({
                        url: url + 'divisive-driver/drivers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (divisiveDriverView.tableUser != null) {
                                divisiveDriverView.tableUser.destroy();
                            }

                            divisiveDriverView.tableUser = $('#table-user').DataTable({
                                language: languageOptions,
                                data: data['user'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'fullName'},
                                    {data: 'phone'},
                                    {data: 'address'}
                                ],
                                order: [[0, "desc"]]
                            })
                        } else {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    divisiveDriverView.displayModal("show", "#modal-user")
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

                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_areaCode'] + "-" + data[i]['vehicles_vehicleNumber'];
                    }

                    divisiveDriverView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'fullNumber'},
                            {data: 'garages_name'},
                            {data: 'users_fullname'},
                            {data: 'users_phone'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="divisiveDriverView.editVehicleUser(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="divisiveDriverView.deleteVehicleUser(' + full.id + ')">';
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
                    $("input[id=user_id]").val(divisiveDriverView.current["users_fullname"]);
                    $("input[id=vehicle_id]").val(divisiveDriverView.current["vehicles_areaCode"] + '-' + divisiveDriverView.current["vehicles_vehicleNumber"]);

                    $("#user_id").attr("data-userId", divisiveDriverView.current["user_id"]);
                    $("#vehicle_id").attr("data-vehicleId", divisiveDriverView.current["vehicle_id"]);
                },
                fillFormDataToCurrentObject: function () {
                    if (divisiveDriverView.action == 'add') {
                        divisiveDriverView.current = {
                            user_id: $("#user_id").attr("data-userId"),
                            vehicle_id: $("#vehicle_id").attr("data-vehicleId")
                        };
                    } else if (divisiveDriverView.action == 'update') {
                        divisiveDriverView.current.user_id = $("#user_id").attr("data-userId"),
                                divisiveDriverView.current.vehicle_id = $("#vehicle_id").attr("data-vehicleId")
                    }
                },

                editVehicleUser: function (id) {
                    divisiveDriverView.current = null;
                    divisiveDriverView.current = _.clone(_.find(divisiveDriverView.dataVehicleUser, function (o) {
                        return o.id == id;
                    }), true);
                    divisiveDriverView.fillCurrentObjectToForm();
                    divisiveDriverView.action = 'update';
                    divisiveDriverView.showControl();
                },
                addVehicleUser: function () {
                    divisiveDriverView.current = null;
                    divisiveDriverView.action = 'add';
                    divisiveDriverView.showControl();
                },
                deleteVehicleUser: function (id) {
                    divisiveDriverView.action = 'delete';
                    divisiveDriverView.idDelete = id;
                    divisiveDriverView.displayModal("show", "#modal-confirmDelete");
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            user_id: "required",
                            vehicle_id: "required"
                        },
                        messages: {
                            user_id: "Vui lòng chọn tài xế",
                            vehicle_id: "Vui lòng chọn xe"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $('#' + idForm).find("label[class=error]").remove();
                },
                validateVehicle: function () {
                    $("#frmVehicle").validate({
                        rules: {
                            vehicleNumber: {
                                required: true,
                                number: true
                            },
                            areaCode: "required",
                            vehicleType_id: "required",
                            garage_id: "required"
                        },
                        messages: {
                            vehicleNumber: {
                                required: "Vui lòng nhập số xe",
                                number: "Số xe phải là số"
                            },
                            areaCode: "Vui lòng nhập mã vùng",
                            vehicleType_id: "Vui lòng chọn loại xe",
                            garage_id: "Vui lòng chọn nhà xe"
                        }
                    });
                },
                validateDriver: function () {
                    $("#frmVehicle").validate({
                        rules: {
                            fullName: "required",
                            phone: "required"
                        },
                        messages: {
                            fullName: "Vui lòng nhập tên tài xế.",
                            phone: "Vui lòng nhập số điện thoại"
                        }
                    });
                },

                save: function () {
                    divisiveDriverView.formValidate();
                    if ($("#frmControl").valid()) {
                        if (divisiveDriverView.action != 'delete') {
                            if ($("#user_id").attr('data-userId') == '') {
                                divisiveDriverView.showNotification('warning', 'Vui lòng chọn một tài xế có trong danh sách.');
                                return;
                            }
                            if ($("#vehicle_id").attr('data-vehicleId') == '') {
                                divisiveDriverView.showNotification('warning', 'Vui lòng chọn một xe có trong danh sách.');
                                return;
                            }
                        }

                        divisiveDriverView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: divisiveDriverView.action,
                            _vehicleUser: divisiveDriverView.current
                        };
                        if (divisiveDriverView.action == 'delete') {
                            sendToServer._id = divisiveDriverView.idDelete;
                        }
                        $.ajax({
                            url: url + 'divisive-driver/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            console.log(data);
                            if (jqXHR.status == 201) {
                                var vehicleUserOld = null;
                                var indexOfVehicleUserOld = null;
                                switch (divisiveDriverView.action) {
                                    case 'add':
                                        data['vehicleUser'].fullNumber = data['vehicleUser']['vehicles_areaCode'] + '-' + data['vehicleUser']['vehicles_vehicleNumber'];
                                        divisiveDriverView.dataVehicleUser.push(data['vehicleUser']);
                                        divisiveDriverView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        vehicleUserOld = _.find(divisiveDriverView.dataVehicleUser, function (o) {
                                            return o.id == sendToServer._vehicleUser.id;
                                        });
                                        indexOfVehicleUserOld = _.indexOf(divisiveDriverView.dataVehicleUser, vehicleUserOld);
                                        data['vehicleUser'].fullNumber = data['vehicleUser']['vehicles_areaCode'] + '-' + data['vehicleUser']['vehicles_vehicleNumber'];
                                        divisiveDriverView.dataVehicleUser.splice(indexOfVehicleUserOld, 1, data['vehicleUser']);
                                        divisiveDriverView.showNotification("success", "Cập nhật thành công!");
                                        divisiveDriverView.hideControl();
                                        break;
                                    case 'delete':
                                        vehicleUserOld = _.find(divisiveDriverView.dataVehicleUser, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        indexOfVehicleUserOld = _.indexOf(divisiveDriverView.dataVehicleUser, vehicleUserOld);
                                        divisiveDriverView.dataVehicleUser.splice(indexOfVehicleUserOld, 1);
                                        divisiveDriverView.showNotification("success", "Xóa thành công!");
                                        divisiveDriverView.displayModal("hide", "#modal-confirmDelete")
                                        break;
                                    default:
                                        break;
                                }
                                divisiveDriverView.table.clear().rows.add(divisiveDriverView.dataVehicleUser).draw();
                                divisiveDriverView.clearInput();
                            } else {
                                divisiveDriverView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                },

                addVehicle: function () {
                    if (divisiveDriverView.dataVehicleType == null) {
                        $.ajax({
                            url: url + 'vehicle-type/vehicleTypes',
                            type: "GET",
                            dataType: "json"
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 200) {
                                divisiveDriverView.dataVehicleType = data['vehicleTypes'];
                                divisiveDriverView.loadSelectBox(divisiveDriverView.dataVehicleType, "vehicleType_id", "name");
                            } else {
                                divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }

                    if (divisiveDriverView.dataGarage == null) {
                        $.ajax({
                            url: url + 'vehicle-outside/garages',
                            type: "GET",
                            dataType: "json"
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 200) {
                                divisiveDriverView.dataGarage = data['garages'];
                                divisiveDriverView.loadSelectBox(divisiveDriverView.dataGarage, "garage_id", "name");
                            } else {
                                divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }

                    divisiveDriverView.displayModal('show', '#modal-addVehicle');
                },
                saveVehicle: function () {
                    divisiveDriverView.validateVehicle();
                    if ($("#frmVehicle").valid()) {
                        var vehicle = {
                            vehicleNumber: $("input[id='vehicleNumber']").val(),
                            areaCode: $("input[id='areaCode']").val(),
                            size: $("input[id='size']").val(),
                            weight: $("input[id='weight']").val(),
                            vehicleType_id: $("select[id='vehicleType_id']").val(),
                            garage_id: $("select[id='garage_id']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _vehicle: vehicle
                        };

                        $.ajax({
                            url: url + 'vehicle-inside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                divisiveDriverView.showNotification("success", "Thêm thành công!");
                                divisiveDriverView.displayModal("hide", "#modal-addVehicle");

                                $("#vehicle_id").attr('data-vehicleId', data['vehicle']['id']);
                                $("input[id=vehicle_id]").val(data['vehicle']['areaCode'] + ' ' + data['vehicle']['vehicleNumber']);

                                divisiveDriverView.clearInputVehicle();
                            } else {
                                divisiveDriverView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmVehicle").find("label[class=error]").css("color", "red");
                    }
                },
                saveDriver: function () {
                    divisiveDriverView.validateDriver();
                    if ($("#frmDriver").valid()) {
                        var driver = {
                            fullName: $("input[id='fullName']").val(),
                            phone: $("input[id='phone']").val(),
                            address: $("input[id='address']").val(),
                            note: $("input[id='note']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _driver: driver
                        };

                        $.ajax({
                            url: url + 'driver/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                divisiveDriverView.showNotification("success", "Thêm thành công!");
                                divisiveDriverView.displayModal("hide", "#modal-addDriver");

                                $("#user_id").attr('data-userId', data['driver']['id']);
                                $("input[id=user_id]").val(data['driver']['fullName']);

                                divisiveDriverView.clearInputDriver();
                            } else {
                                divisiveDriverView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            divisiveDriverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmDriver").find("label[class=error]").css("color", "red");
                    }
                }
            };
            divisiveDriverView.loadData();
        } else {
            divisiveDriverView.loadData();
        }
    });


</script>
