<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 60%;
        display: none;
        right: 0;
        height: 60vh;
        width: 50%;
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

<!-- Table -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li class="active">Quản lý tài xế</li>
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
                                <th>Tài xế</th>
                                <th>Điện thoại</th>
                                <th>Loại bằng</th>
                                <th>Ngày cấp</th>
                                <th>Ngày hết hạn</th>
                                <th>CMND</th>
                                <th>Ngày cấp</th>
                                <th>Số xe</th>
                                <th>Loại xe</th>
                                <th>Nhà xe</th>
                                <th>Nhà xe</th>
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
                <span class="titleControl">Thêm mới phân tài</span>
                <div class="menu-toggles pull-right" onclick="divisiveDriverView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="row">
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight" onclick="divisiveDriverView.save()">Hoàn tất</button>
                                        <button type="button" class="btn default" onclick="divisiveDriverView.clearInput()">Nhập lại</button>
                                    </div>
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
        if (typeof driverView === 'undefined') {
            driverView = {
                table: null,
                dataDrivers: null,
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
                loadData: function () {
                    $.ajax({
                        url: url + 'driver-management/driver',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            driverView.dataDrivers = data['dataDrivers'];
                            driverView.fillDataToDatatable(data['dataDrivers']);
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['areaCode'] + "-" + data[i]['vehicleNumber'];
                    }

                    driverView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullName'},
                            {data: 'phone'},
                            {data: 'driverType'},
                            {data: 'issueDate_driver',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'expireDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'governmentId'},
                            {data: 'expireDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'fullNumber'},
                            {data: 'vehicle_types'},
                            {data: 'garage'},
                            {data: 'garageTypes'},
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
                        order: [[0, "desc"]]

                    })
                }

            };
            driverView.loadData();
        } else {
            driverView.loadData();
        }
    });


</script>
