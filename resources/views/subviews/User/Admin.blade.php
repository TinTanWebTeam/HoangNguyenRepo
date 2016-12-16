<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 13%;
        display: none;
        right: 0;
        width: 50%;
        height: 100%;
    }

    #divControl .panel-body {
        height: 470px;
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
<!-- Modal Confirm -->
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="modalConfirm" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body"><h5 id="modalContent"></h5></div>
                    <div class="modal-footer">
                        <button id="id" type="button" class="btn btn-primary marginRight" name="modalAgree"
                                onclick="adminView.deleteUser()">Ðồng ý
                        </button>
                        <button type="button" class="btn default" name="modalClose"
                                onclick="adminView.cancelDelete()">Hủy
                        </button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<!--End Modal-->
<!-- Modal Confirm -->
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="modalUser" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body"><h5 id="modalUser"></h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn default" name="modalClose"
                                onclick="adminView.cancelUser()">Hủy
                        </button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<!--End Modal-->
<!-- Modal Confirm -->
<div class="row">
    <div class="col-md-12">
        <div class="modal fade" id="modalRestoreUser" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body"><h5 id="modalRestoreUser"></h5></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                                onclick="adminView.restoreUser()">Khôi phục tài khoản
                        </button>
                        <button type="button" class="btn default" name="modalClose"
                                onclick="adminView.cancelRestoreUser()">Hủy
                        </button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
<!--End Modal-->
<!-- Table -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL người dùng</a></li>
                        <li class="active">Admin</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="adminView.addNewUser()">
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
                            <th>Tài khoản</th>
                            <th>Họ và tên</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Chức vụ</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div> <!-- end table-reposive -->
            </div> <!-- end .col-md-12-->
        </div> <!-- end .row -->
    </div>
</div>
<!-- end Table -->

<!-- frmControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="adminView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body portlet-body">
                <form role="form" id="formUser">
                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <input type="hidden" class="form-control" id="id" value="">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input ">
                                        <label for="fullName"><b>Họ và tên</b></label>
                                        <input type="text" class="form-control"
                                               id="fullName"
                                               name="fullName">
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="username"><b>Tên đăng nhập</b></label>
                                        <input type="text" class="form-control"
                                               id="username"
                                               name="username">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="email"><b>Email</b></label>
                                        <input type="email" class="form-control"
                                               id="email"
                                               name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="password"><b>Mật khẩu</b></label>
                                        <input type="password" class="form-control"
                                               id="password"
                                               name="password"
                                               maxlength="20"
                                               minlength="6">


                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input ">
                                        <label for="password_confirmation"><b>Nhập lại mật khẩu</b></label>
                                        <input type="password" class="form-control"
                                               id="password_confirmation"
                                               name="password_confirmation"
                                               maxlength="20"
                                               minlength="6">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="position_id"><b>Chức vụ</b></label>
                                        <select class="form-control" id="position_id"
                                                name="position_id">
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="address"><b>Địa chỉ</b></label>
                                        <input type="text" class="form-control"
                                               id="address"
                                               name="address">
                                    </div>
                                </div>
                                <div class="col-md-4" id="datePicker">
                                    <div class="form-group form-md-line-input">
                                        <label for="birthday"><b>Năm Sinh</b></label>
                                        <input id="birthday" name="birthday" type="text"
                                               class="date form-control ignore"/>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="phone"><b>Số điện thoại</b></label>
                                        <input type="text" class="form-control"
                                               id="phone"
                                               name="phone">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group form-md-line-input">
                                <label><b>Phân Quyền</b></label>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="checkbox">
                                            @foreach(array_chunk($roles,3) as $row)
                                                <div class="row">
                                                    @foreach($row as $item)
                                                        <div class="col-sm-4">
                                                            <label>
                                                                <input type="checkbox" id="array_roleId"
                                                                       value="{{$item->id}}"
                                                                       onclick="adminView.checkRole(this)">{{$item->description}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary"
                                            onclick="adminView.validateUser()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="adminView.cancel()">Nhập lại
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
<!-- end #frmControl -->

<!-- Modal notification -->
<div class="row">
    <div id="modal-notification" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal notification -->


<script>
    $(function () {
        if (typeof (adminView) === 'undefined') {
            adminView = {
                table: null,
                data: null,
                tableAdmin: null,
                tablePosition: null,
                action: null,
                idDelete: null,
                current: null,
                array_roleId: null,
                user_id: null,
                elementButton: null,
                show: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hide: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    adminView.resetRolesInDom();
                    adminView.clearInput();
                    $('label[class=error]').hide();
                },
                cancel: function () {
                    if (adminView.action == 'add') {
                        adminView.clearInput();
                    } else {
                        adminView.fillCurrentObjectToForm();
                    }
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'user/users',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            adminView.tableAdmin = data['tableUserOfAdmin'];
                            adminView.fillDataToDatatable(data['tableUserOfAdmin']);
                            adminView.tablePosition = data['tablePosition'];
                            adminView.loadSelectBoxPosition(data['tablePosition']);
                        } else {
                            adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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
//                    $("#datePicker .date").datepicker({
//                        'format': 'dd-mm-yyyy',
//                        'autoclose': true
//                    });
                    adminView.renderDateTimePicker();
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                loadSelectBoxPosition: function (lstPosition) {
                    //reset selectbox
                    $('#position_id')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("position_id");
                    for (var i = 0; i < lstPosition.length; i++) {
                        var opt = lstPosition[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstPosition[i]['id'];
                        select.appendChild(el);
                    }

                },
                renderDateTimePicker: function () {
                    $('#birthday').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#birthday').datepicker("setDate", new Date('1990'));
                },
                msgDelete: function (id) {
                    var userId = '{{ Auth::user()->id }}';
                    if (userId == id) {
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Tài khoản đang đăng nhập không được xóa.");
                        $("button[id=id]").hide();
                    } else {
                        adminView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Bạn có muốn xóa tài khoản này ?");
                        $("button[name=modalAgree]").show();
                    }


                },
                msgUser: function () {
                    $("div#modalUser").modal("show");
                    $("h5#modalUser").empty().append("Tài khoản đã tồn tại.");
                    $("button[name=modalAgree]").show();

                },
                cancelUser: function () {
                    $("#modalUser").modal('hide');
                },
                cancelDelete: function () {
                    adminView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                fillDataToDatatable: function (data) {
                    if (adminView.table != null) {
                        adminView.table.destroy();
                    }

                    adminView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'username'},
                            {data: 'fullName'},
                            {data: 'email'},
                            {data: 'address'},
                            {data: 'phone'},
                            {data: 'positions_name'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="adminView.editUser(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    if (full.active == 1) {
                                        tr += '<div id="deleteUser" title="Xóa"  data-id="' + full.id + '" class="btn btn-danger btn-circle" onclick="adminView.msgDelete(' + full.id + ')">';
                                        tr += '<i class="glyphicon glyphicon-remove"></i>';
                                        tr += '</div>';
                                    } else {
                                        tr += '<div id="restoreUser" title="Phục hồi" data-id="' + full.id + '" class="btn btn-info btn-circle" onclick="adminView.restoreUserConfirm(' + full.id + ')">';
                                        tr += '<i class="glyphicon glyphicon-plus"></i>';
                                        tr += '</div>';
                                    }
                                    return tr;
                                }
                            }
                        ]
                    })
                },
                checkRole: function (element) {
                    $(element).attr('value') + ' ' + $(element).prop('checked');
                },
                fillFormDataToCurrentObject: function () {
                    var subRole = [];
                    $("input[id=array_roleId]").each(function () {
                        if ($(this).prop('checked')) {
                            subRole.push($(this).attr('value'));
                        }
                    });
                    adminView.array_roleId = subRole;
                    if (adminView.action == 'add') {
                        adminView.current = {
                            fullName: $("input[id='fullName']").val(),
                            username: $("input[id='username']").val(),
                            password: $("input[id='password']").val(),
                            email: $("input[id='email']").val(),
                            address: $("input[id='address']").val(),
                            phone: $("input[id='phone']").val(),
                            birthday: $("input[id='birthday']").val(),
                            position_id: $("select[id='position_id']").val()
                        }

                    } else if (adminView.action == 'update') {
                        adminView.current.fullName = $("input[id='fullName']").val();
                        adminView.current.username = $("input[id='username']").val();
                        adminView.current.email = $("input[id='email']").val();
                        adminView.current.address = $("input[id='address']").val();
                        adminView.current.phone = $("input[id='phone']").val();
                        adminView.current.birthday = $("input[id='birthday']").val();
                        adminView.current.position_id = $("select[id='position_id']").val();
                        adminView.current.password = $("input[id='password']").val();
                    }
                },
                fillCurrentObjectToForm: function () {
                    var dateBirthday = moment(adminView.current["birthday"], "YYYY-MM-DD");
                    $("input[id='birthday']").datepicker('update', dateBirthday.format("DD-MM-YYYY"));
                    $("input[id='fullName']").val(adminView.current["fullName"]);
                    $("input[id='username']").val(adminView.current["username"]);
                    $("input[id='email']").val(adminView.current["email"]);
                    $("select[id='position_id']").val(adminView.current["position_id"]);
                    $("input[id='address']").val(adminView.current["address"]);
                    $("input[id='phone']").val(adminView.current["phone"]);
                    $("input[id='password']").val();
                    $("input[id='password_confirmation']").val();


                },
                editUser: function (id) {
                    if (adminView.action = 'update') {
                        $("input[id=username]").prop("readOnly", true);
                        $("input[id=username]").prop("onblur", false);
                    }
                    adminView.current = null;
                    var pwd = null;
                    var sendToServer = {
                        _token: _token,
                        _object: id
                    };
                    $.ajax({
                        url: url + 'user/edit',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            var roles_array = [];
                            for (var i = 0; i < data['subRoles'].length; i++) {
                                roles_array.push(data['subRoles'][i]['role_id']);
                            }
                            adminView.current = _.clone(_.find(adminView.tableAdmin, function (o) {
                                return o.id == id;
                            }), true);
                            pwd = data['password'];
                            adminView.fillRolesToDom(roles_array);
                            adminView.fillCurrentObjectToForm();
                            $("input[id=password]").val(pwd);
                            $("input[id=password_confirmation]").val(pwd);
                            $("input[id=username]").prop("readOnly", true);
                            $("#divControl").find(".titleControl").html("Cập nhật tài khoản");
                            adminView.action = 'update';
                            adminView.show();
                            adminView.clearValidation();
                        }
                    });
                },
                addNewUser: function () {
                    adminView.renderDateTimePicker();
                    adminView.current = null;
                    $("input[id=username]").prop("readOnly", false);
                    $("#divControl").find(".titleControl").html("Thêm mới tài khoản");
                    adminView.action = 'add';
                    adminView.show();
                },
                clearInput: function () {
                    $("input[id='fullName']").val('');
                    $("input[id='username']").val('');
                    $("input[id='email']").val('');
                    $("input[id='password']").val('');
                    $("input[id='password_confirmation']").val('');
                    $("input[id='address']").val('');
                    $("input[id='phone']").val('');
                    //clear input checkbox
                    adminView.resetRolesInDom();
                },
                deleteUser: function () {
                    adminView.action = 'delete';
                    adminView.save();
                    $("#modalConfirm").modal('hide');
                },
                validate: function () {
                    $("#formUser").validate({
                        rules: {
                            fullName: {
                                required: true,
                                minlength: 6
                            },
                            username: {
                                required: true,
                                minlength: 6

                            },
                            email: {
                                required: true,
                                email: true
                            },
                            password: {
                                required: true,
                                minlength: 6,
                                maxlength: 20
                            },
                            password_confirmation: {
                                required: true,
                                equalTo: "#password",
                                minlength: 6,
                                maxlength: 20
                            },
                            position_id: "required"

                        },
                        ignore: ".ignore",
                        messages: {
                            fullName: {
                                required: "Vui lòng nhập họ tên",
                                minlength: "Họ tên từ 6 kí tự đến 20 kí tự"
                            },
                            username: {
                                required: "Vui lòng nhập tài khoản",
                                minlength: "Tên đăng nhập từ 6 kí tự đến 20 kí tự"
                            },
                            email: {
                                required: "Vui lòng nhập Email",
                                email: 'Email không đúng định dạng'
                            },
                            password: {
                                required: "Vui lòng nhập mật khẩu",
                                minlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự",
                                maxlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự"
                            },
                            password_confirmation: {
                                required: "Vui lòng nhập lại mật khẩu",
                                equalTo: "Nhập lại mật khẩu không đúng",
                                minlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự",
                                maxlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự"
                            },
                            position_id: "Vui lòng chọn chức vụ"
                        }
                    });

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
                createUser: function () {
                    $("#modalRestoreUser").modal('hide');
                    $('input[id=username]').val('');
                    $('input[id=username]').focus();
                },
                validateUser: function () {
                    if (adminView.action == "update") {
                        adminView.save();
                    }
                    else {
                        var sendToServer = {
                            _token: _token,
                            _object: $("input[id=username]").val()
                        };
                        $.ajax({
                            url: url + 'validate-user',
                            type: "post",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 200) {
                                adminView.save();
                            } else if (jqXHR.status == 201) {
                                if (data['dataUser']['active'] == 1) {
                                    adminView.msgUser();
                                } else {
                                    adminView.msgRestoreUser(data['dataUser']['id']);
                                }
                            } else {
                                adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (adminView.action == 'delete' && type == 'hide') {
                        adminView.action = null;
                        adminView.idDelete = null;
                    }


                },
                save: function () {
                    var sendToServer = null;
                    if (adminView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: adminView.action,
                            _object: adminView.idDelete
                        };
                        $.ajax({
                            url: url + 'user/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var objectDelete = _.find(adminView.tableAdmin,function(o){
                                    return o.id == adminView.idDelete;
                                });
                                objectDelete.active = 0;
                                adminView.table.clear().rows.add(adminView.tableAdmin).draw();
                                adminView.showNotification("success", "Xóa thành công!");
                                adminView.displayModal('hide', '#modal-notification');
                            }
                            adminView.table.clear().rows.add(adminView.tableAdmin).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        dateBirthday = $("input[id='birthday']").val();
                        birthday = moment(dateBirthday,"DD-MM-YYYY").year();
                        yearNow = moment().year();
                        old = yearNow - birthday;
                        if(old >= 18){
                            if(old >= 60){
                                adminView.showNotification("error", "Người dùng đã hết tuổi lao động");
                            }else {
                                adminView.validate();
                                if ($("#formUser").valid()) {
                                    adminView.fillFormDataToCurrentObject();
                                    sendToServer = {
                                        _token: _token,
                                        _action: adminView.action,
                                        _object: adminView.current,
                                        _object2: adminView.array_roleId
                                    };
                                    $.ajax({
                                        url: url + 'user/modify',
                                        type: "POST",
                                        dataType: "json",
                                        data: sendToServer
                                    }).done(function (data, textStatus, jqXHR) {
                                        if (jqXHR.status == 201) {
                                            switch (adminView.action) {
                                                case 'add':
                                                    adminView.tableAdmin.push(data['tableUserAdd'][0]);
                                                    adminView.showNotification("success", "Thêm thành công!");
                                                    break;
                                                case 'update':
                                                    var UpdateUserOld = _.find(adminView.tableAdmin, function (o) {
                                                        return o.id == sendToServer._object.id;
                                                    });
                                                    var indexOfUpdateUserOld = _.indexOf(adminView.tableAdmin, UpdateUserOld);
                                                    adminView.tableAdmin.splice(indexOfUpdateUserOld, 1, data['tableUserUpdate'][0]);
                                                    adminView.tableSubRow = data['subRoles'][0];
                                                    adminView.showNotification("success", "Cập nhật thành công!");
                                                    adminView.hide();
                                                    break;
                                                default:
                                                    break;

                                            }
                                            adminView.table.clear().rows.add(adminView.tableAdmin).draw();
                                            adminView.clearInput();
                                        } else {
                                            adminView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                        }

                                    }).fail(function (jqXHR, textStatus, errorThrown) {
                                        adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                                    });
                                } else {
                                    $("form#formUser").find("label[class=error]").css("color", "red");
                                }
                            }
                        }
                        else {
                            adminView.showNotification("error", "Người dùng chưa đủ tuổi lao động");
                        }

                    }
                },
                resetRolesInDom: function () {
                    $("input[id=array_roleId]").each(function () {
                        $(this).prop('checked', false);
                    });
                },
                fillRolesToDom: function (roles_array) {
                    $("input[id=array_roleId]").each(function () {
                        if (roles_array.includes(Number($(this).attr('value')))) {
                            $(this).prop('checked', true);
                        }
                    });
                },
                restoreUser: function (idRestore) {
                    sendToServer = {
                        _token: _token,
                        _action: "restoreUser",
                        _object: idRestore
                    };
                    $.ajax({
                        url: url + 'user/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {

                            var objectRestore = _.find(adminView.tableAdmin, function (o) {
                                return o.id == idRestore;
                            });
                            objectRestore.active = 1;
                            adminView.table.clear().rows.add(adminView.tableAdmin).draw();
                            adminView.showNotification("success", "Đã khôi phục tài khoản thành công!");
                            adminView.displayModal('hide', '#modal-notification');
                        } else {
                            adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        adminView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                msgRestoreUser: function (id) {
                    if (id) {
                        adminView.restoreUserConfirm(id);
                    }
                },
                restoreUserConfirm: function (user_id) {
                    $("#modal-notification").find(".modal-title").html("Bạn muốn khôi phục tài khoản này?");
                    tr = '<div class="row">';
                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="adminView.restoreUser(' + user_id + ')">';
                    tr += 'Đồng ý';
                    tr += '</button>';
                    tr += '<button type="button" class="btn default" onclick="adminView.displayModal(\'hide\', \'#modal-notification\')">';
                    tr += 'Huỷ';
                    tr += '</button>';
                    tr += '</div>';
                    tr += '</div>';
                    $("#modal-notification").find(".modal-body").html(tr);
                    adminView.displayModal('show', '#modal-notification');
                }

            };
            adminView.loadData();
        } else {
            adminView.loadData();
        }


    });
</script>
