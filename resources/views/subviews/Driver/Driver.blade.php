<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 30%;
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
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới" onclick="driverView.addDriver();">
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
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" onclick="driverView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
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
                                <label for="address"><b>CMND</b></label>
                                <input type="text" class="form-control"
                                       id="address"
                                       name="address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <label for="note"><b>Ngày cấp</b></label>
                                <input type="text" class="form-control"
                                       id="note"
                                       name="note">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <label for="driverType"><b>Loại bằng</b></label>
                                <input type="text" class="form-control"
                                       id="driverType"
                                       name="driverType">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <label for="note"><b>Ngày cấp</b></label>
                                <input type="text" class="form-control"
                                       id="note"
                                       name="note">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-md-line-input">
                                <label for="note"><b>Ngày hết hạn</b></label>
                                <input type="text" class="form-control"
                                       id="note"
                                       name="note">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label for="note"><b>Ghi chú</b></label>
                                <textarea type="text" class="form-control"
                                       id="note"
                                       name="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary marginRight" onclick="garageView.save()">Hoàn tất</button>
                                    <button type="button" class="btn default" onclick="garageView.clearInput()">Nhập lại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--<div class="row">--}}
                        {{--<div class="col-md-offset-8 col-md-4">--}}
                            {{--<div class="form-actions noborder">--}}
                                {{--<div class="form-group">--}}
                                    {{--<button type="button" class="btn btn-primary marginRight"--}}
                                            {{--onclick="divisiveDriverView.saveDriver()">--}}
                                        {{--Hoàn tất--}}
                                    {{--</button>--}}
                                    {{--<button type="button" class="btn default"--}}
                                            {{--onclick="divisiveDriverView.displayModal('hide','#modal-addDriver')">--}}
                                        {{--Nhập lại--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </form>
            </div>
        </div>
    </div> <!-- end #divControl -->
</div>
<!-- end Control -->






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
                            {data: 'fullNumber'},
                            {data:'vehicle_types'},
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
                },
                addDriver: function () {
                    $("#divControl").find(".titleControl").html("Thêm mới tài xế");
                    driverView.action = 'add';
                    driverView.showControl();
                }

            };
            driverView.loadData();
        } else {
            driverView.loadData();
        }
    });


</script>
