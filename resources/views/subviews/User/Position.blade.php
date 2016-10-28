<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 55%;
        display: none;
        right: 0;
        width: 40%;
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

    #divControl .panel-body {
        height: 256px;
    }

</style>
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="PositionView.deletePosition()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="PositionView.cancelDelete()">Hủy
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}

<div class="modal fade" id="modalPositionRestore" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalPositionRestore"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="PositionView.restorePosition()">Tạo lại
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="PositionView.cancelPositionRestore()">Hủy
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}

<div class="modal fade" id="modalPosition" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalPosition"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn default" name="modalClose"
                        onclick="PositionView.cancelValidatePosition()">Hủy
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}
<!-- start View list -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL người dùng</a></li>
                        <li class="active">Chức vụ</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="PositionView.addNewPosition()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-hover" id="table-data">
                        <thead>
                        <tr>
                            <th>Chức vụ</th>
                            <th>Mô tả</th>
                            <th>Sửa / Xóa</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyPackageList">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end View list -->


<!-- Start #divControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thêm mới chức vụ
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="PositionView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body portlet-body">
                <form role="form" id="formPosition">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="hidden" class="form-control" id="id" value="">
                        </div>
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input ">
                                        <label for="name"><b>Chức vụ</b></label>
                                        <input type="text" class="form-control"
                                               id="name"
                                               name="name"
                                               placeholder="Chức vụ">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input ">
                                        <label for="description"><b>Mô tả</b></label>
                                        <input type="text" class="form-control"
                                               id="description">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary"
                                            onclick="PositionView.validatePosition()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="PositionView.cancel()">Hủy
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
<!-- end #divControl -->


<script>
    $(function () {
        if (typeof (PositionView) === 'undefined') {
            PositionView = {
                table: null,
                data: null,
                action: null,
                idDelete: null,
                tablePosition: null,
                TableRestorePosition: null,
                current: null,
                show: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hide: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    PositionView.clearValidation();
                    PositionView.clearInput();
                },
                clearValidation: function () {
                    $("form#formPosition").find("label[class=error]").css("display", "none");
                },
                cancel: function () {
                    if (PositionView.action == 'add') {
                        PositionView.clearInput();
                    } else {
                        PositionView.fillCurrentObjectToForm();
                    }
                },
                clearInput: function () {
                    $("input[id=name]").val('');
                    $("input[id=description]").val('');
                },
                editPosition: function (id) {
                    PositionView.current = _.clone(_.find(PositionView.data, function (o) {
                        return o.id == id;
                    }), true);
                    PositionView.action = "update";
                    PositionView.fillCurrentObjectToForm();
                    PositionView.show();
                },
                loadData: function () {
                    $.post(url + 'position', {_token: _token, fromDate: null, toDate: null}, function (list) {
                        PositionView.data = list;
                        PositionView.data2 = _.clone(list, true);
                        PositionView.fillDataToDatatable(list);
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
                },
                validate: function () {
                    $("#formPosition").validate({
                        rules: {
                            name: 'required'
                        },
                        messages: {
                            name: "Vui lòng nhập chức vụ"
                        }
                    });
                },
                validatePosition: function () {
                    if(PositionView.action == "update"){
                        PositionView.save();
                    }else {
                        var sendToServer = {
                            _token: _token,
                            _object: $("input[id=name]").val()
                        };
                        $.ajax({
                            url: url + 'validate-position',
                            type: "post",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 200) {
                                PositionView.save();
                            } else if (jqXHR.status == 201) {
                                if (data['dataPosition']['active'] == 1) {
                                    PositionView.msgValidatePosition();
                                } else {
                                    PositionView.msgPositionRestore(data['dataPosition']['id']);
                                }

                            } else {
                                PositionView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            PositionView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }

                },
                restorePosition: function () {
                    var sendToServer = null;
                    sendToServer = {
                        _token: _token,
                        _action: "restorePosition",
                        _object: PositionView.idRestore
                    }
                    ;
                    $.ajax({
                        url: url + 'position/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            PositionView.data.push(data['TableRestorePosition']);
                            PositionView.table.clear().rows.add(PositionView.data).draw();
                            PositionView.showNotification("success", "Đã khôi phục thành công!");
                            $("#modalPositionRestore").modal('hide');
                            PositionView.clearInput();
                            PositionView.hide();
                        } else {
                            PositionView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        PositionView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                fillDataToDatatable: function (data) {
                    PositionView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'name'},
                            {data: 'description'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="PositionView.editPosition(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="PositionView.msgDelete(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ]
                    })
                },
                fillCurrentObjectToForm: function () {
                    for (var propertyName in PositionView.current) {
                        $("input[id=" + propertyName + "]").val(PositionView.current[propertyName]);
                    }
                    PositionView.show();
                },
                fillFormDataToCurrentObject: function () {
                    if (PositionView.action == 'add') {
                        PositionView.current = {
                            name: $("input[id='name']").val(),
                            description: $("input[id='description']").val()
                        }
                    } else if (PositionView.action == 'update') {
                        for (var propertyName in PositionView.current) {
                            PositionView.current[propertyName] = $("input[id=" + propertyName + "]").val();
                        }
                    }
                },
                addNewPosition: function () {
                    PositionView.action = 'add';
                    PositionView.show();
                },
                msgDelete: function (id) {
                    if (id) {
                        PositionView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Bạn có muốn xóa chức vụ này ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                msgPositionRestore: function (id) {
                    if (id) {
                        PositionView.idRestore = id;
                        $("div#modalPositionRestore").modal("show");
                        $("h5#modalPositionRestore").empty().append("Chức vụ này đã bị xóa. Bạn có muốn tạo lại ?");
                        $("button[name=modalAgree]").show();
                    }

                },
                msgValidatePosition: function () {
                    $("div#modalPosition").modal("show");
                    $("h5#modalPosition").empty().append("Chức vụ này đã tồn tại");
                    $("button[name=modalAgree]").show();
                },
                cancelDelete: function () {
                    PositionView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },

                cancelValidatePosition: function () {
                    $("#modalPosition").modal('hide');
                },
                cancelPositionRestore: function () {
                    $("#modalPositionRestore").modal('hide');
                },
                deletePosition: function () {
                    PositionView.action = 'delete';
                    PositionView.save();
                    $("#modalConfirm").modal('hide');
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (PositionView.action == 'delete' && type == 'hide') {
                        PositionView.action = null;
                        PositionView.idDelete = null;
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
                save: function () {
                    var sendToServer = null;
                    if (PositionView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: PositionView.action,
                            _object: PositionView.idDelete
                        };
                        $.ajax({
                            url: url + 'position/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var obj = _.find(PositionView.data, function (o) {
                                    return o.id == sendToServer._object;
                                });
                                var index = _.indexOf(PositionView.data, obj);
                                PositionView.data.splice(index, 1);
                                PositionView.showNotification("success", "Xóa thành công!");
                                PositionView.hide();
                            }
                            PositionView.table.clear().rows.add(PositionView.data).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            PositionView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        PositionView.validate();
                        if ($("#formPosition").valid()) {
                            PositionView.fillFormDataToCurrentObject();
                            sendToServer = {
                                _token: _token,
                                _action: PositionView.action,
                                _object: PositionView.current
                            };
                            $.ajax({
                                url: url + 'position/modify',
                                type: "POST",
                                dataType: "json",
                                data: sendToServer
                            }).done(function (data, textStatus, jqXHR) {
                                if (jqXHR.status == 201) {
                                    switch (PositionView.action) {
                                        case'add' :
                                            PositionView.data.push(data['tablePositionAdd'][0]);
                                            PositionView.showNotification("success", "Thêm thành công!");
                                            break;
                                        case 'update':
                                            var obj = _.find(PositionView.data, function (o) {
                                                return o.id == sendToServer._object.id;
                                            });
                                            var index = _.indexOf(PositionView.data, obj);
                                            PositionView.data.splice(index, 1, data['tablePositionUpdate'][0]);
                                            PositionView.hide();
                                            PositionView.showNotification("success", "Cập nhật thành công!");
                                            break;
                                        default:
                                            break;
                                    }
                                    PositionView.table.clear().rows.add(PositionView.data).draw();
                                    PositionView.clearInput();
                                } else {
                                    PositionView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }
                            }).fail(function (jqXHR, textStatus, errorThrown) {
                                PositionView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            });
                        } else {
                            $("form#formPosition").find("label[class=error]").css("color", "red");
                        }
                    }
                }

            };
            PositionView.loadData();
        }
        else {
            PositionView.loadData();
        }
    });
</script>


