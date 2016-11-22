<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 20%;
        display: none;
        right: 0;
        height: 60vh;
        width: 50%;
    }

    div.col-lg-12 {
        height: 44px;
    }

    @media (max-height: 500px) {
        #divControl {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }
    }

    #divControl .panel-body {
        height: 430px;
    }

</style>
{{--start Modal delete Driver--}}
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="driverView.deleteDriver()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="driverView.cancelDelete()">Hủy
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal delete Driver--}}


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
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="driverView.addDriver();">
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
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Loại bằng</th>
                                <th>Ngày cấp</th>
                                <th>Ngày hết hạn</th>
                                <th>CMND</th>
                                <th>Số xe</th>
                                <th>Loại xe</th>
                                <th>Nhà xe</th>
                                <th>Loại nhà xe</th>
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

            <div class="panel-body portlet-body">
                <form id="frmDriver">
                    <input id="driverId" style="display: none">
                    <div class="col-md-12">
                        <div class="row" id='datetimepicker'>
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="fullName"><b>Họ và tên</b></label>
                                        <input type="text" class="form-control"
                                               id="fullName"
                                               name="fullName">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="address"><b>Địa chỉ</b></label>
                                        <input type="text" class="form-control"
                                               id="address"
                                               name="address">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="phone"><b>Số điện thoại</b></label>
                                        <input type="number" class="form-control"
                                               id="phone"
                                               name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="birthday"><b>Năm sinh</b></label>
                                        <input type="text" class="date form-control ignore"
                                               id="birthday"
                                               name="birthday">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="governmentId"><b>CMND</b></label>
                                        <input type="text" class="form-control"
                                               id="governmentId" maxlength="12" minlength="9"
                                               name="governmentId">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="issueDateId"><b>Ngày cấp</b></label>
                                        <input type="text" class="form-control date ignore"
                                               id="issueDateId"
                                               name="issueDateId">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="driverType"><b>Loại bằng</b></label>
                                        <input type="text" class="form-control"
                                               id="driverType"
                                               name="driverType">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="issueDateDriver"><b>Ngày cấp</b></label>
                                        <input type="text" class="form-control date ignore"
                                               id="issueDateDriver"
                                               name="issueDateDriver">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="expireDateDriver"><b>Ngày hết hạn</b></label>
                                        <input type="text" class="form-control date ignore"
                                               id="expireDateDriver"
                                               name="expireDateDriver">
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
                                            <button type="button" class="btn btn-primary marginRight"
                                                    onclick="driverView.save()">Hoàn tất
                                            </button>
                                            <button type="button" class="btn default" onclick="driverView.cancel()">
                                                Nhập lại
                                            </button>
                                        </div>
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


<script>
    $(function () {
        if (typeof driverView === 'undefined') {
            driverView = {
                table: null,
                dataDrivers: null,
                current: null,
                action: null,
                idDelete: null,
                tagsGovernmentId: [],
                cancel: function () {
                    if (driverView.action == 'add') {
                        driverView.clearInput();
                        driverView.renderDateTimePicker();
                    } else {
                        var driverId = $('input[id=driverId]').val();
                        var driver = _.find(driverView.dataDrivers, function (o) {
                            return o.id == driverId;
                        });
                        if (typeof driver === 'undefined') {
                            return;
                        }
                        driverView.current = driver;
                        driverView.fillCurrentObjectToForm();
                    }
                },
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    driverView.clearInput();
                    driverView.clearValidation();

                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (driverView.action == 'delete' && type == 'hide') {
                        driverView.action = null;
                        driverView.idDelete = null;
                    }
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
                    $('#datetimepicker .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
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
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    driverView.renderScrollbar();
                    driverView.renderDateTimePicker();
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                cancelDelete: function () {
                    driverView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                renderDateTimePicker: function () {
                    $('#birthday').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#birthday').datepicker("setDate", new Date());
                    $('#issueDateId').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#issueDateDriver').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#expireDateDriver').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#issueDateId').datepicker("setDate", new Date());
                    $('#issueDateDriver').datepicker("setDate", new Date());
                    $('#expireDateDriver').datepicker("setDate", new Date());

                },
                clearInput: function () {
                    $('input[id=fullName]').val('');
                    $('input[id=address]').val('');
                    $('input[id=phone]').val('');
                    $('input[id=governmentId]').val('');
                    $('input[id=driverType]').val('');
                    $('textarea[id=note]').val('');
                },
                deleteDriver: function () {
                    driverView.action = 'delete';
                    driverView.save();
                    $("#modalConfirm").modal('hide');

                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['areaCode'] == null || data[i]['vehicleNumber'] == null) ? "" : data[i]['areaCode'] + "-" + data[i]['vehicleNumber'];
                    }
                    driverView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullName'},
                            {
                                data: 'address',
                                visible: false
                            },
                            {data: 'phone'},
                            {data: 'driverType'},
                            {
                                data: 'issueDate_driver',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                data: 'expireDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'governmentId'},
                            {data: 'fullNumber'},
                            {data: 'vehicle_types'},
                            {data: 'garage', visible: false},
                            {data: 'garageTypes', visible: false},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="driverView.editDriver(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="driverView.msgDelete(' + full.id + ')">';
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
                validateDriver: function () {
                    $("#frmDriver").validate({
                        rules: {
                            fullName: "required",
                            governmentId: {
                                required: true,
                                minlength: 9,
                                maxlength:12,
                                number: true
                            },
                            driverType: "required"
                        },
                        ignore: ".ignore",
                        messages: {
                            fullName: "Vui lòng nhập tên",
                            governmentId: {
                                required: "Vui lòng nhập CMND",
                                minlength: "Số CMND tối thiểu 9 số",
                                maxlength: "Số CMND tối đa 12 số",
                                number: "CMND phải là số"
                            },
                            driverType: "Vui lòng nhập loại Bằng lái"
                        }
                    });
                },
                msgDelete: function (id) {
                    if (id) {
                        driverView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Bạn có muốn xóa tài xế này ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                addDriver: function () {
                    driverView.renderDateTimePicker();
                    $("#divControl").find(".titleControl").html("Thêm mới tài xế");
                    driverView.action = 'add';
                    driverView.showControl();
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                fillCurrentObjectToForm: function () {
                    var birthday = moment(driverView.current["birthday"], "YYYY-MM-DD");
                    var issueDateGovernmentId = moment(driverView.current["issueDate_governmentId"], "YYYY-MM-DD");
                    var issueDateDriver = moment(driverView.current["issueDate_driver"], "YYYY-MM-DD");
                    var expireDate = moment(driverView.current["expireDate"], "YYYY-MM-DD");
                    $("input[id='birthday']").datepicker('update', birthday.format("DD-MM-YYYY"));
                    $("input[id='issueDateId']").datepicker('update', issueDateGovernmentId.format("DD-MM-YYYY"));
                    $("input[id='issueDateDriver']").datepicker('update', issueDateDriver.format("DD-MM-YYYY"));
                    $("input[id='expireDateDriver']").datepicker('update', expireDate.format("DD-MM-YYYY"));
                    $("input[id='fullName']").val(driverView.current["fullName"]);
                    $("input[id='phone']").val(driverView.current["phone"]);
                    $("input[id='governmentId']").val(driverView.current["governmentId"]);
                    $("input[id='driverType']").val(driverView.current["driverType"]);
                    $("input[id='address']").val(driverView.current["address"]);
                    $("textarea[id='note']").val(driverView.current["note"]);
                },
                editDriver: function (id) {
                    $('input[id=driverId]').val(id);
                    $("#divControl").find(".titleControl").html("Cập nhật tài xế");
                    driverView.current = _.clone(_.find(driverView.dataDrivers, function (o) {
                        return o.id == id;
                    }), true);
                    driverView.fillCurrentObjectToForm();
                    driverView.action = 'update';
                    driverView.showControl();
                    driverView.clearValidation();
                },
                fillFormDataToCurrentObject: function () {
                    if (driverView.action == 'add') {
                        driverView.current = {
                            id: null,
                            fullName: $("input[id='fullName']").val(),
                            address: $("input[id='address']").val(),
                            phone: $("input[id='phone']").val(),
                            governmentId: $("input[id='governmentId']").val(),
                            driverType: $("input[id='driverType']").val(),
                            note: $("textarea[id='note']").val(),
                            birthday: $("input[id='birthday']").val(),
                            issueDateId: $("input[id='issueDateId']").val(),
                            issueDateDriver: $("input[id='issueDateDriver']").val(),
                            expireDateDriver: $("input[id='expireDateDriver']").val()
                        };

                    } else if (driverView.action == 'update') {
                        driverView.current.fullName = $("input[id='fullName']").val();
                        driverView.current.address = $("input[id='address']").val();
                        driverView.current.phone = $("input[id='phone']").val();
                        driverView.current.governmentId = $("input[id='governmentId']").val();
                        driverView.current.driverType = $("input[id='driverType']").val();
                        driverView.current.note = $("textarea[id='note']").val();
                        driverView.current.birthday = $("input[id='birthday']").val();
                        driverView.current.issueDateId = $("input[id='issueDateId']").val();
                        driverView.current.issueDateDriver = $("input[id='issueDateDriver']").val();
                        driverView.current.expireDateDriver = $("input[id='expireDateDriver']").val();
                    }
                },
                save: function () {
                    var sendToServer = null;
                    if (driverView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: driverView.action,
                            _id: driverView.idDelete
                        };
                        $.ajax({
                            url: url + 'driver/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var driverOld = _.find(driverView.dataDrivers, function (o) {
                                    return o.id == sendToServer._id;
                                });
                                var indexOfDriverOld = _.indexOf(driverView.dataDrivers, driverOld);
                                driverView.dataDrivers.splice(indexOfDriverOld, 1);
                                driverView.showNotification("success", "Xóa thành công!");
                                driverView.displayModal("hide", "#modalConfirm");
                            }
                            driverView.table.clear().rows.add(driverView.dataDrivers).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            driverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }
                    else {
                        driverView.validateDriver();
                        if ($("#frmDriver").valid()) {
                            driverView.fillFormDataToCurrentObject();
                            if (driverView.current.id == null) {
                                var existCMND = _.find(driverView.dataDrivers, function (o) {
                                    return o.governmentId == $("input[id=governmentId]").val();
                                });
                            } else {
                                var existCMND = _.find(driverView.dataDrivers, function (o) {
                                    return o.governmentId == $("input[id=governmentId]").val() && o.id != driverView.current.id;
                                });
                            }
                            if (typeof existCMND !== "undefined") {
                                showNotification("error", "CMND đã tồn tại!");
                            } else {
                                dateBirthday = $("input[id='birthday']").val();
                                birthday = moment(dateBirthday, "DD-MM-YYYY").year();
                                yearNow = moment().year();
                                old = yearNow - birthday;
                                if (old >= 18) {
                                    if (old >= 60) {
                                        driverView.showNotification("error", "Người dùng đã hết tuổi lao động");
                                    } else {
                                        sendToServer = {
                                            _token: _token,
                                            _action: driverView.action,
                                            _object: driverView.current
                                        };
                                        $.ajax({
                                            url: url + 'driver/modify',
                                            type: "POST",
                                            dataType: "json",
                                            data: sendToServer
                                        }).done(function (data, textStatus, jqXHR) {
                                            if (jqXHR.status == 201) {
                                                switch (driverView.action) {
                                                    case 'add':
                                                        data['dataAddDriver'].fullNumber = (data['dataAddDriver']['areaCode'] == null || data['dataAddDriver']['vehicleNumber'] == null) ? "" : data['dataAddDriver']['areaCode'] + "-" + data['dataAddDriver']['vehicleNumber'];
                                                        if (data['dataAddDriver'].fullNumber == null) {
                                                            data['dataAddDriver'].fullNumber = 'chứa có xe'
                                                        }
                                                        driverView.dataDrivers.push(data['dataAddDriver']);
                                                        showNotification("success", "Thêm thành công!");
                                                        break;
                                                    case 'update':
                                                        data['dataUpdateDriver'].fullNumber = (data['dataUpdateDriver']['areaCode'] == null || data['dataUpdateDriver']['vehicleNumber'] == null) ? "" : data['dataUpdateDriver']['areaCode'] + "-" + data['dataUpdateDriver']['vehicleNumber'];
                                                        if (data['dataUpdateDriver'].fullNumber == null) {
                                                            data['dataUpdateDriver'].fullNumber = 'chứa có xe'
                                                        }
                                                        var driverOld = _.find(driverView.dataDrivers, function (o) {
                                                            return o.id == sendToServer._object.id;
                                                        });
                                                        var indexOfDriverOld = _.indexOf(driverView.dataDrivers, driverOld);
                                                        driverView.dataDrivers.splice(indexOfDriverOld, 1, data['dataUpdateDriver']);
                                                        showNotification("success", "Cập nhật thành công!");
                                                        driverView.hideControl();
                                                        break;
                                                    default:
                                                        break;
                                                }
                                                driverView.table.clear().rows.add(driverView.dataDrivers).draw();
                                                driverView.clearInput();
                                            } else {
                                                driverView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                            }
                                        }).fail(function (jqXHR, textStatus, errorThrown) {
                                            driverView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                                        });
                                    }
                                } else {
                                    driverView.showNotification("error", "Người dùng chưa đủ tuổi lao động");
                                }

                            }
                        } else {
                            $("form#frmDriver").find("label[class=error]").css("color", "red");
                        }

                    }

                }

            };
            driverView.loadData();
        } else {
            driverView.loadData();
        }
    });


</script>
