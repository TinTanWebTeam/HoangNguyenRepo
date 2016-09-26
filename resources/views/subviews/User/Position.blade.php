<style>
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 50%;
        display: none;
        right: 0;
        width: 40%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

</style>
<div class="modal fade" id="modalConfirm" tabindex="-1"  aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" name="modalClose"
                        onclick="PositionView.cancelDelete()">Hủy
                </button>
                <button type="button" class="btn green" name="modalAgree"
                        onclick="PositionView.deletePosition()">Ðồng ý
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
                        <div class="btn btn-primary btn-circle btn-md" onclick="PositionView.addNewPosition()">
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


<!-- Start #frmControl -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chức vụ
            <div class="menu-toggles pull-right" onclick="PositionView.hide()">
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
                                           id="description"
                                           placeholder="Mô tả">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-actions noborder">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="PositionView.save()">
                                    Hoàn tất
                                </button>
                                <button type="button" class="btn default" onclick="PositionView.cancel()">Hủy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end #frmControl -->


<script>
    $(function () {
        if (typeof (PositionView) === 'undefined') {
            PositionView = {
                table: null,
                data: null,
                action: null,
                idDelete: null,
                current: null,
                show: function () {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                },
                hide: function () {
                    $('#frmControl').slideUp('', function () {
                        $('.menu-toggle').show();
                        PositionView.clearInput();
                    });
                    var myForm = document.getElementById("formPosition");
                    PositionView.clearValidation(myForm);
                },
                clearValidation: function (formElement) {
                    var validator = $(formElement).validate();
                    $('[name]', formElement).each(function () {
                        validator.successList.push(this);//mark as error free
                        validator.showErrors();//remove error messages if present
                    });
                    validator.resetForm();//remove error class on name elements and clear history
                    validator.reset();//remove all error and success data
                },
                cancel: function () {
                    if (PositionView.action == 'add') {
                        PositionView.clearInput();
                    } else {
                        PositionView.fillCurrentObjectToForm();
                    }
                },
                clearInput: function () {
                    if (PositionView.current)
                        for (var propertyName in PositionView.current) {
                            $("input[id=" + propertyName + "]").val('');
                        }
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
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="PositionView.editPosition(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
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
                            description: $("input[id='description']").val(),
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
                        $("div#modalContent").empty().append("Bạn có muốn xóa ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                cancelDelete: function () {
                    PositionView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                deletePosition: function () {
                    PositionView.action = 'delete';
                    PositionView.save();
                    $("#modalConfirm").modal('hide');
                },
                displayModal: function(type, idModal){
                    $(idModal).modal(type);
                    if(PositionView.action == 'delete' && type == 'hide'){
                        PositionView.action = null;
                        PositionView.idDelete = null;
                    }
                },
                showNotification: function (type ,msg) {
                    switch (type){
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
                    PositionView.validate();
                    PositionView.fillFormDataToCurrentObject();
                    var sendToServer = {
                        _token: _token,
                        _action: PositionView.action,
                        _object: PositionView.current
                    };
                    if (PositionView.action == 'delete') {
                        sendToServer._object = {
                            id: PositionView.idDelete,
                            name: "delete"
                        };
                    }
                    if ($("#formPosition").valid()) {
                        $.post(
                                url + 'position/modify',
                                sendToServer
                                , function (data) {
                                    if (data['status'] == 'Ok') {
                                        switch (PositionView.action) {
                                            case'add' :
                                                PositionView.data.push(data['obj']);
                                                PositionView.showNotification("success", "Thêm thành công!");
                                                break;

                                            case 'update':
                                                var obj = _.find(PositionView.data, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                var index = _.indexOf(PositionView.data, obj);
                                                PositionView.data.splice(index, 1, data['obj']);
                                                PositionView.hide();
                                                PositionView.showNotification("success", "Cập nhật thành công!");
                                                break;
                                            case 'delete':
                                                var obj = _.find(PositionView.data, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                var index = _.indexOf(PositionView.data, obj);
                                                PositionView.data.splice(index, 1);
                                                PositionView.showNotification("success", "Xóa thành công!");
                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                    PositionView.table.clear().rows.add(PositionView.data).draw();
                                });
                        PositionView.clearInput();
                    } else {
                        $("form#formPosition").find("label[class=error]").css("color", "red");
                    }
                }
            }
            ;
            PositionView.loadData();
        }
        else {
            PositionView.loadData();
        }
    });
</script>


