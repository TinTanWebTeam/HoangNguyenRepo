<style>
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 10%;
        display: none;
        right: 0;
        width: 40%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

</style>
<div class="modal fade" id="modalConfirm" tabindex="-1" role="" aria-hidden="true" style="display: none;">
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


<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Đăng ký người dùng
            <div class="menu-toggles pull-right" onclick="userView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>
        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="form-group form-md-line-input" style="display:none">
                        <input type="text" class="form-control" id="id" value="">
                    </div>
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="fullname"><b>Họ và tên</b></label>
                                    <input type="text" class="form-control"
                                           id="fullname"
                                           name="fullname"
                                           placeholder="Nhập họ tên"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="username"><b>Tên đăng nhập</b></label>
                                    <input type="text" class="form-control"
                                           id="username"
                                           name ="username"
                                           placeholder="Tên đăng nhập có ít nhất 6 kí tự">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="password"><b>Mật khẩu</b></label>
                                    <input type="password" class="form-control"
                                           id="password"
                                           name="password"
                                           maxlength="20"
                                           minlength="6"
                                           placeholder="Mật khẩu có ít nhất 6 kí tự">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="passwordconfirm"><b>Nhập lại mật khẩu</b></label>
                                    <input type="Password" class="form-control"
                                           id="passwordconfirm"
                                           name="passwordconfirm"
                                           maxlength="20"
                                           minlength="6"
                                           placeholder="Nhập lại mật khẩu">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="email"><b>Email</b></label>
                                    <input type="text" class="form-control"
                                           id="email"
                                           name="email"
                                           placeholder="email@example.com">
                                    <label id="email" style="display: none; color: red">Email đã tồn tại</label>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                                                            <input type="checkbox" id="array_roleid" value="{{$item->id}}"
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
                                <button type="button" class="btn default" onclick="">Huỷ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- end #frmControl -->

<script>
    $(function () {
        if (typeof (userView) === 'undefined') {
            userView = {

                table: null,
                data: null,
                action: null,
                idDelete: null,
                current: null,
                array_roleid:null,
                show: function () {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                    $('label.error').hide();
                },
                hide: function () {
                    $('#frmControl').slideUp('', function () {
                        $('.menu-toggle').show();
                    });

                },
                loadData: function () {
                    $.post(url + 'user', {_token: _token, fromDate: null, toDate: null}, function (list) {
                        userView.data = list;
                        userView.fillDataToDatatable(list);
                    });
                },
                editUser: function (id) {
                    $.post(url + 'user/edit', {
                        _token: _token,
                        user_id: id,
                        fromDate: null,
                        toDate: null
                    }, function (lstsubroles) {
                        userView.resetRolesInDom();
                        var roles_array = [];
                        for (var i = 0; i < lstsubroles.length; i++) {
                            roles_array.push(lstsubroles[i]['role_id'])
                        }
                        userView.fillRolesToDom(roles_array);
                    });
                    userView.current = _.clone(_.find(userView.data, function (o) {
                        return o.id == id;
                    }), true);
                    userView.action = "update";
                    userView.fillCurrentObjectToForm();
                    userView.show();
                },
                fillCurrentObjectToForm: function () {
                    for (var propertyName in userView.current) {
                        if (propertyName == 'password') {
                            $("input[id=" + propertyName + "]").val();
                        } else {
                            $("select[id=" + propertyName + "]").val(userView.current[propertyName]);
                            $("input[id=" + propertyName + "]").val(userView.current[propertyName]);
                        }
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
                            {data: 'fullname'},
                            {data: 'email'},
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
                    $("input[id=role_id]").each(function () {
                        if ($(this).prop('checked')) {
                            subrole.push($(this).attr('value'));
                        }
                    });

                    if (userView.action == 'add') {
                        userView.current = {
                            fullname: $("input[id='fullname']").val(),
                            username: $("input[id='username']").val(),
                            password: $("input[id='password']").val(),
                            passwordconfirm: $("input[id='passwordconfirm']").val(),
                            email: $("input[id='email']").val(),
                            position_id: $("select[id='position_id']").val()
//                            array_roleid: subrole

                        }
                    } else if (userView.action == 'update') {
                        for (var propertyName in userView.current) {
                            userView.current[propertyName] = $("input[id=" + propertyName + "]").val();
                            userView.current[propertyName] = $("select[id=" + propertyName + "]").val();
                        }
                    }
                },
                addNewUser: function () {
                    userView.action = 'add';
                    userView.show();
                    userView.clearInput();
                    userView.resetRolesInDom();
                },
                clearInput: function () {
                    if (userView.current)
                        for (var propertyName in userView.current) {
                            $("input[id=" + propertyName + "]").val('');
                            $("select[id=" + propertyName + "]").val('');
                        }
                },
                deleteUser: function () {
                    userView.action = 'delete';
                    userView.save();
                    $("#modalConfirm").modal('hide');
                },
                save: function () {
                    userView.fillFormDataToCurrentObject();
                    var sendToServer = {
                        _token: _token,
                        _action: userView.action,
                        _object: userView.current
                    };
                    if (userView.action == 'delete') {
                        sendToServer._object = {
                            id: userView.idDelete,
                            fullname: "delete",
                            username: "delete",
                            password: "delete",
                            email: "delete",
                            position_id: "delete"
                        };
                    }
                    else if (userView.action == 'add') {
                        userView.formValidate();
                    }else{
                        userView.action = 'update';
                    }
                    if ($("#formUser").valid()) {
                        $.post(
                                url + 'user/modify',
                                sendToServer
                                , function (data) {
                                    if (data['status'] == 'Ok') {
                                        console.log(userView.action);
                                        switch (userView.action) {
                                            case'add' :
                                                userView.data.push(data['obj'][0]);
                                                break;
                                            case 'update':
                                                var obj = _.find(userView.data, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                var index = _.indexOf(userView.data, obj);
                                                userView.data.splice(index, 1, data['obj']);
                                                userView.hide();
                                                break;
                                            case 'delete':
                                                var obj = _.find(userView.data, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                    console.log(obj);
                                                var index = _.indexOf(userView.data, obj);
                                                    console.log(index);
                                                console.log(userView.data);
                                                userView.data.splice(index, 1);
                                                    console.log(userView.data);
                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                    userView.table.clear().rows.add(userView.data).draw();
                                }
                        );
                        userView.clearInput();
                        userView.resetRolesInDom();
                    }
                },
                resetRolesInDom: function () {
                    $("input[id=role_id]").each(function () {
                        $(this).prop('checked', false);
                    });
                },
                fillRolesToDom: function (roles_array) {
                    $("input[id=role_id]").each(function () {
                        if (roles_array.includes(Number($(this).attr('value')))) {
                            $(this).prop('checked', true);
                        }
                    });
                },
                formValidate: function(){
                    $("#formUser").validate({
                        rules: {
                            fullname: "required",
                            username:"required",
                            email:{
                                required: true,
                                email: true
                            },
                            password: {
                                required: true,
                                minlength: 6,
                                maxlength: 20
                            },
                            passwordconfirm: {
                                equalTo: "#password",
                                minlength: 6,
                                maxlength: 20
                            }
                        },
                        messages: {
                            fullname: " Vui lòng nhập họ tên",
                            username:"Vui lòng nhập tài khoản",
                            email: {
                                required: "Vui lòng nhập Email",
                                email: 'Email không đúng định dạng'
                            },
                            password: {
                                required: "Vui lòng nhập mật khẩu",
                                minlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự",
                                maxlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự"
                            },
                            passwordconfirm: {
                                equalTo: "Nhập lại mật khẩu không đúng",
                                minlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự",
                                maxlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự"
                            }
                        }
                    });
                }
            }
            ;
            userView.loadData();
        } else {
            userView.loadData();
        }
        $("#passwordconfirm").on('keypress',function(){
            console.log("fadsfds");
            userView.formValidate();
        })
    });
</script>