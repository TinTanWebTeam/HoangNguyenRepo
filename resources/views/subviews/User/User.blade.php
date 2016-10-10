<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 9%;
        display: none;
        right: 0;
        width: 50%;
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
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" name="modalClose"
                        onclick="userView.cancelDelete()">Hủy
                </button>
                <button type="button" class="btn green" name="modalAgree"
                        onclick="userView.deleteUser()">Ðồng ý
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}


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
                        <div class="btn btn-primary btn-circle btn-md" onclick="userView.addNewUser()">
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


<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Đăng ký người dùng
                <div class="menu-toggles pull-right" onclick="userView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body" style="padding-top: 0;height:530px; overflow: auto ">
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
                                               name="username" onblur="userView.validateUser()"
                                               placeholder="Tên đăng nhập">
                                        <label id="username" style="display: none; color: red">Tài khoản đã tồn
                                            tại</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="email"><b>Email</b></label>
                                        <input type="text" class="form-control"
                                               id="email"
                                               name="email"
                                               placeholder="email@example.com">
                                        <label id="email" style="display: none; color: red">Email đã tồn tại</label>
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
                                        <input type="Password" class="form-control"
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
                                        <select class="form-control" id="position_id" name="position_id">
                                            <option value="">--Chọn chức vụ--</option>
                                            @foreach($positions as $item ){
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            }
                                            @endforeach
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
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="birthday"><b>Năm Sinh</b></label>
                                        <input type='text' id="birthday" name="birthday"
                                               value="{{date('d-m-Y')}}" class="form-control"/>

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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input">
                                        <label for="note"><b>Ghi chú</b></label>
                                        <input type="text" class="form-control"
                                               id="note"
                                               name="note"
                                               placeholder="ghi chú">
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
                                                                <input type="checkbox" id="array_roleid"
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
                                            onclick="userView.save()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="userView.cancel()">Huỷ</button>
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
                action: null,
                idDelete: null,
                current: null,
                array_roleid: null,
                show: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hide: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    userView.resetRolesInDom();
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
                    $.post(url + 'user', {_token: _token, fromDate: null, toDate: null}, function (list) {
                        userView.data = list;
                        userView.fillDataToDatatable(list);
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
                editUser: function (id) {
                    var pwd = null;
                    $.post(url + 'user/edit', {
                        _token: _token,
                        user_id: id,
                        fromDate: null,
                        toDate: null
                    }, function (lstsubroles) {
                        userView.resetRolesInDom();
                        var roles_array = [];
                        for (var i = 0; i < lstsubroles['subroles'].length; i++) {
                            roles_array.push(lstsubroles['subroles'][i]['role_id'])
                        }
                        pwd = lstsubroles['password'][0];
                        userView.fillRolesToDom(roles_array);
                    });
                    userView.current = _.clone(_.find(userView.data, function (o) {
                        return o.id == id;
                    }), true);
                    userView.current.password = pwd;
                    $("input[id=password_confirmation]").val(pwd);
                    userView.action = "update";
                    userView.fillCurrentObjectToForm();
                    userView.show();
                },
                fillCurrentObjectToForm: function () {
                    for (var propertyName in userView.current) {
                        $("select[id=" + propertyName + "]").val(userView.current[propertyName]);
                        $("input[id=" + propertyName + "]").val(userView.current[propertyName]);
                        $("input[id=password]").val(userView.current[propertyName]);
                        $("input[id=password_confirmation]").val(userView.current[propertyName]);

                    }

                    userView.show();
                },
                msgDelete: function (id) {
                    if (id) {
                        userView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("div#modalContent").empty().append("Bạn có muốn xóa ?");
                        $("button[name=modalAgree]").show();

                    }
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
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="userView.editUser(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
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
                    var subrole = [];
                    $("input[id=array_roleid]").each(function () {
                        if ($(this).prop('checked')) {
                            subrole.push($(this).attr('value'));
                        }
                    });
                    userView.array_roleid = subrole;
                    if (userView.action == 'add') {
                        userView.current = {
                            fullName: $("input[id='fullName']").val(),
                            username: $("input[id='username']").val(),
                            password: $("input[id='password']").val(),
                            password_confirmation: $("input[id='password_confirmation']").val(),
                            email: $("input[id='email']").val(),
                            address: $("input[id='address']").val(),
                            phone: $("input[id='phone']").val(),
                            note: $("input[id='note']").val(),
                            birthday: $("input[id='birthday']").val(),
                            position_id: $("select[id='position_id']").val()
                        }

                    } else if (userView.action == 'update') {
                        for (var propertyName in userView.current) {
                            if (propertyName != 'position_id')
                                userView.current[propertyName] = $("input[id=" + propertyName + "]").val();
                        }
                        userView.current['position_id'] = $("select[id='position_id']").val();
                    }
                },
                addNewUser: function () {
                    userView.action = 'add';
                    userView.show();
                    userView.clearInput();
                    userView.resetRolesInDom();
                },
                clearInput: function () {
                    if (userView.current) {
                        for (var propertyName in userView.current) {
                            if (propertyName != 'position_id')
                                $("input[id=" + propertyName + "]").val('');
                        }
                    }
                    $("select[id='position_id' ]").val('');
                    $("input[id='password_confirmation']").val('');
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
                            position_id: "required"
                        },
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
                validateUser: function () {

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
                            $("form#formUser").find("label[id=username]").css("display", "none");
                        } else if (jqXHR.status == 201) {
                            $("form#formUser").find("label[id=username]").css("display", "block");
                        } else {
                            userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        userView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                },


                save: function () {
                    userView.validate();
                    userView.fillFormDataToCurrentObject();
                    var sendToServer = {
                        _token: _token,
                        _action: userView.action,
                        _object: userView.current,
                        _object2: userView.array_roleid
                    };
                    if (userView.action == 'delete') {
                        sendToServer._object = {
                            id: userView.idDelete,
                            fullName: "delete",
                            username: "delete",
                            password: "delete",
                            email: "delete"
                        };
                    }
                    if ($("#formUser").valid()) {
                        $.post(
                                url + 'user/modify',
                                sendToServer
                                , function (data) {
                                    if (data['status'] == 'Ok') {
                                        var obj = null;
                                        var index = null;
                                        switch (userView.action) {
                                            case'add' :
                                                userView.data.push(data['obj'][0]);
                                                userView.showNotification("success", "Thêm thành công!");
                                                break;
                                            case 'update':
                                                obj = _.find(userView.data, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                index = _.indexOf(userView.data, obj);
                                                userView.data.splice(index, 1, data['obj'][0]);
                                                userView.hide();
                                                userView.showNotification("success", "Cập nhật thành công!");
                                                break;
                                            case 'delete':
                                                obj = _.find(userView.data, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                index = _.indexOf(userView.data, obj);
                                                userView.data.splice(index, 1);
                                                userView.showNotification("success", "Xóa thành công!");
                                                break;
                                            default:
                                                break;
                                        }
                                        userView.table.clear().rows.add(userView.data).draw();
                                        userView.clearInput();
                                    }

                                }
                        );
                        userView.resetRolesInDom();

                    } else {
                        $("form#formUser").find("label[class=error]").css("color", "red");
                    }
                },
                resetRolesInDom: function () {
                    $("input[id=array_roleid]").each(function () {
                        $(this).prop('checked', false);
                    });
                },
                fillRolesToDom: function (roles_array) {
                    $("input[id=array_roleid]").each(function () {
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

    //setup before functions Expense
    //    var typingTimer;          //timer identifier
    //    var doneTypingInterval = 500;  //time in ms, 3 second for example
    //    var $inputExpense = $("input#ExpenseCode");
    //
    //    //on keyup, start the countdown
    //    $inputExpense.on('keyup', function () {
    //        clearTimeout(typingTimer);
    //        typingTimer = setTimeout(doneTypingExpense, doneTypingInterval);
    //    });
    //
    //    //on keydown, clear the countdown
    //    $inputExpense.on('keydown', function () {
    //        clearTimeout(typingTimer);
    //    });
    //    function doneTypingExpense() {
    //        $.get(url + 'getSearchExpense', {
    //            token: _token,
    //            Code: $inputExpense.val()
    //        }, function (data) {
    //            if (data === "0") {
    //                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this task!Please choose other one");
    //                $("div[id=modal-confirm]").modal("show");
    //                $inputExpense.val("");
    //                $("input#Expense").val("");
    //            }
    //            else {
    //                $inputExpense.val(data["code"]);
    //                $("input#Expense").val(data["id"]);
    //            }
    //        });
    //    }


</script>