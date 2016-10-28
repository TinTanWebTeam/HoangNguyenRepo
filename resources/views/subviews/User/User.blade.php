<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 50%;
        height: 100%;
    }

    #divControl .panel-body {
        height: 500px;
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
                        <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                                onclick="userView.deleteUser()">Ðồng ý
                        </button>
                        <button type="button" class="btn default" name="modalClose"
                                onclick="userView.cancelDelete()">Hủy
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
                                onclick="userView.cancelUser()">Hủy
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
                                onclick="userView.createUser()">Tạo tài khoản mới
                        </button>
                        <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                                onclick="userView.restoreUser()">Khôi phục tài khoản củ
                        </button>
                        <button type="button" class="btn default" name="modalClose"
                                onclick="userView.cancelRestoreUser()">Hủy
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
                        <li class="active">Tài khoản</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới" onclick="userView.addNewUser()">
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
            <div class="panel-heading">Đăng ký người dùng
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="userView.hide()">
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
                                               name="fullName"
                                               placeholder="Nhập họ tên"
                                               autofocus>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="username"><b>Tên đăng nhập</b></label>
                                        <input type="text" class="form-control"
                                               id="username"
                                               name="username"
                                               placeholder="Tên đăng nhập">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="email"><b>Email</b></label>
                                        <input type="email" class="form-control"
                                               id="email"
                                               name="email"
                                               placeholder="email@example.com">
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
                                               minlength="6"
                                               placeholder="password">


                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input ">
                                        <label for="password_confirmation"><b>Nhập lại mật khẩu</b></label>
                                        <input type="password" class="form-control"
                                               id="password_confirmation"
                                               name="password_confirmation"
                                               maxlength="20"
                                               minlength="6"
                                               placeholder="Nhập lại mật khẩu">

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
                                               name="address"
                                               placeholder="Địa chỉ">
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
                                               name="phone"
                                               placeholder="090">
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
                                                                       onclick="userView.checkRole(this)">{{$item->description}}
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
                                            onclick="userView.validateUser()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="userView.cancel()">Nhập lại</button>
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



<script>
    $(function () {
        if (typeof (userView) === 'undefined') {
            userView = {
                table: null,
                data: null,
                tableUser: null,
                tablePosition: null,
                action: null,
                idDelete: null,
                current: null,
                array_roleId: null,
                user_id: null,

                show: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hide: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    userView.resetRolesInDom();
                    userView.clearInput();
                    $('label[class=error]').hide();
                },
                cancel: function () {
                    if (userView.action == 'add') {
                        userView.clearInput();
                    } else {
                        userView.fillCurrentObjectToForm();
                    }
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'user/users',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            userView.tableUser = data['tableUser'];
                            userView.fillDataToDatatable(data['tableUser']);
                            userView.tablePosition = data['tablePosition'];
                            userView.loadSelectBoxPosition(data['tablePosition']);
                        } else {
                            userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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
                    $("#datePicker .date").datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    userView.renderDateTimePicker();
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
                    $('#birthday').datepicker("setDate", new Date());
                },
                msgDelete: function (id) {
                    if (id) {
                        userView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Bạn có muốn xóa tài khoản này ?");
                        $("button[name=modalAgree]").show();

                    }
                },
                msgRestoreUser: function (id) {
                    if (id) {
                        userView.idRestore = id;
                        $("div#modalRestoreUser").modal("show");
                        $("h5#modalRestoreUser").empty().append("Tài khoản chùng với tài khoản đã xóa.");
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
                cancelRestoreUser: function () {
                    $("#modalRestoreUser").modal('hide');
                },
                cancelDelete: function () {
                    userView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                fillDataToDatatable: function (data) {
                    userView.table = $('#table-data').DataTable({
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
                                    tr += '<div class="btn btn-success  btn-circle" onclick="userView.editUser(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="userView.msgDelete(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
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
                    userView.array_roleId = subRole;
                    if (userView.action == 'add') {
                        userView.current = {
                            fullName: $("input[id='fullName']").val(),
                            username: $("input[id='username']").val(),
                            password: $("input[id='password']").val(),
                            email: $("input[id='email']").val(),
                            address: $("input[id='address']").val(),
                            phone: $("input[id='phone']").val(),
                            birthday: $("input[id='birthday']").val(),
                            position_id: $("select[id='position_id']").val()
                        }

                    } else if (userView.action == 'update') {
                        userView.current.fullName = $("input[id='fullName']").val();
                        userView.current.username = $("input[id='username']").val();
                        userView.current.email = $("input[id='email']").val();
                        userView.current.address = $("input[id='address']").val();
                        userView.current.phone = $("input[id='phone']").val();
                        userView.current.birthday = $("input[id='birthday']").val();
                        userView.current.position_id = $("select[id='position_id']").val();
                        userView.current.password = $("input[id='password']").val();
                    }
                },
                fillCurrentObjectToForm: function () {
                    var dateBirthday = moment(userView.current["birthday"], "YYYY-MM-DD");
                    $("input[id='birthday']").datepicker('update', dateBirthday.format("DD-MM-YYYY"));
                    $("input[id='fullName']").val(userView.current["fullName"]);
                    $("input[id='username']").val(userView.current["username"]);
                    $("input[id='email']").val(userView.current["email"]);
                    $("select[id='position_id']").val(userView.current["position_id"]);
                    $("input[id='address']").val(userView.current["address"]);
                    $("input[id='phone']").val(userView.current["phone"]);
                    $("input[id='password']").val();
                    $("input[id='password_confirmation']").val();


                },
                editUser: function (id) {
                    if (userView.action = 'update') {
                        $("input[id=username]").prop("readOnly", true);
                        $("input[id=username]").prop("onblur", false);
                    }
                    userView.current = null;
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
                            userView.current = _.clone(_.find(userView.tableUser, function (o) {
                                return o.id == id;
                            }), true);
                            pwd = data['password'];
                            userView.fillRolesToDom(roles_array);
                            userView.fillCurrentObjectToForm();
                            $("input[id=password]").val(pwd);
                            $("input[id=password_confirmation]").val(pwd);
                            $("input[id=username]").prop("readOnly", true);
                            userView.action = 'update';
                            userView.show();
                            userView.clearValidation();
                        }
                    });
                },

                addNewUser: function () {
                    userView.renderDateTimePicker();
                    userView.current = null;
                    $("input[id=username]").prop("readOnly", false);
                    userView.action = 'add';
                    userView.show();
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
                    userView.resetRolesInDom();
                },
                deleteUser: function () {
                    userView.action = 'delete';
                    userView.save();
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
                            position_id: "required",

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

                restoreUser:function () {
                    var sendToServer = null;
                    sendToServer = {
                        _token: _token,
                        _action: "restoreUser",
                        _object: userView.idRestore
                    }
                    ;
                    $.ajax({
                        url: url + 'user/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            userView.tableUser.push(data['TableRestoreUser']);
                            userView.table.clear().rows.add(userView.tableUser).draw();
                            userView.showNotification("success", "Đã khôi phục tài khoản thành công!");
                            $("#modalRestoreUser").modal('hide');
                            userView.clearInput();
                            userView.hide();
                        } else {
                            userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                createUser: function () {
                    $("#modalRestoreUser").modal('hide');
                    $('input[id=username]').val('');
                    $('input[id=username]').focus();
                },
                validateUser: function () {
                    if(userView.action== "update"){
                        userView.save();
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
                                userView.save();
                            } else if (jqXHR.status == 201) {
                                if (data['dataUser']['active'] == 1) {
                                    userView.msgUser();
                                } else {
                                    userView.msgRestoreUser(data['dataUser']['id']);
                                }
                            } else {
                                userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }


                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (userView.action == 'delete' && type == 'hide') {
                        userView.action = null;
                        userView.idDelete = null;
                    }


                },
                save: function () {
                    var sendToServer = null;
                    if (userView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: userView.action,
                            _object: userView.idDelete
                        };
                        $.ajax({
                            url: url + 'user/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var userOld = _.find(userView.tableUser, function (o) {
                                    return o.id == sendToServer._object;
                                });
                                var indexOfUserOld = _.indexOf(userView.tableUser, userOld);
                                userView.tableUser.splice(indexOfUserOld, 1);
                                userView.showNotification("success", "Xóa thành công!");
                                userView.displayModal("hide", "#modal-confirmDelete");

                            }
                            userView.table.clear().rows.add(userView.tableUser).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        userView.validate();
                        if ($("#formUser").valid()) {
                            userView.fillFormDataToCurrentObject();
                            sendToServer = {
                                _token: _token,
                                _action: userView.action,
                                _object: userView.current,
                                _object2: userView.array_roleId
                            };
                            $.ajax({
                                url: url + 'user/modify',
                                type: "POST",
                                dataType: "json",
                                data: sendToServer
                            }).done(function (data, textStatus, jqXHR) {
                                if (jqXHR.status == 201) {
                                    switch (userView.action) {
                                        case 'add':
                                            userView.tableUser.push(data['tableUserAdd'][0]);
                                            userView.showNotification("success", "Thêm thành công!");
                                            break;
                                        case 'update':
                                            var UpdateUserOld = _.find(userView.tableUser, function (o) {
                                                return o.id == sendToServer._object.id;
                                            });
                                            var indexOfUpdateUserOld = _.indexOf(userView.tableUser, UpdateUserOld);
                                            userView.tableUser.splice(indexOfUpdateUserOld, 1, data['tableUserUpdate'][0]);
                                            userView.tableSubRow = data['subRoles'][0];
                                            userView.showNotification("success", "Cập nhật thành công!");
                                            userView.hide();
                                            break;
                                        default:
                                            break;

                                    }
                                    userView.table.clear().rows.add(userView.tableUser).draw();
                                    userView.clearInput();
                                } else {
                                    userView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }

                            }).fail(function (jqXHR, textStatus, errorThrown) {
                                userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            });
                        } else {
                            $("form#formUser").find("label[class=error]").css("color", "red");
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
                }

            };
            userView.loadData();
        } else {
            userView.loadData();
        }
    });
</script>
