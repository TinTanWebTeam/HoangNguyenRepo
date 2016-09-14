<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 10%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
    }
    .blue {
        color: #2196f3
    }
    .fixed {
        position: fixed;
        right: 15px;
        z-index: 2
    }
    .menu-toggles{
        cursor: pointer
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="blue">Quản lý người dùng</h5>
                <div class="menu-toggle  pull-right fixed" >
                    <div class="btn btn-primary btn-circle btn-md" onclick="show()">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
                <hr>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="table-data">
                <thead>
                <tr class="active">
                    <th>Tài khoản</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Chức vụ</th>
                    <th>Quyền</th>
                    <th>Sửa/ Xóa</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>
                        <div class="btn-del-edit">
                            <div class="btn btn-success  btn-circle">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </div>
                        </div>
                        <div class="btn-del-edit">
                            <div class="btn btn-danger btn-circle">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>

                    </td>
                </tr>
                </tbody>
            </table>

        </div> <!-- end table-reposive -->
        <div id="frmControl" class="col-md-offset-4 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Đăng ký người dùng
                    <div class="menu-toggles pull-right" onclick="hide()">
                        <i class="glyphicon glyphicon-remove" ></i>
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form" id="formUser">
                        <div class="form-body">
                            <div class="col-md-12 ">
                                <div class="row " >
                                    <div class="col-md-6 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="FullName"><b>Họ và tên</b></label>
                                            <input type="text" class="form-control"
                                                   id="FullName"
                                                   name="FullName"
                                                   placeholder="Nhập họ tên"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="UserName"><b>Tên đăng nhập</b></label>
                                            <input type="text" class="form-control"
                                                   id="UserName"
                                                   name="UserName"
                                                   placeholder="Tên đăng nhập có ít nhất 6 kí tự">
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Password"><b>Mật khẩu</b></label>
                                            <input type="password" class="form-control"
                                                   id="Password"
                                                   name="Password"
                                                   placeholder="Mật khẩu có ít nhất 6 kí tự">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="PasswordConfirm"><b>Nhập lại mật khẩu</b></label>
                                            <input type="Password" class="form-control"
                                                   id="PasswordConfirm"
                                                   name="PasswordConfirm"
                                                   maxlength="20"
                                                   minlength="6"
                                                   placeholder="Nhập lại mật khẩu">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="Email"><b>Email</b></label>
                                            <input type="text" class="form-control"
                                                   id="Email"
                                                   name="Email"
                                                   placeholder="email@example.com">
                                            <label id="Email" style="display: none; color: red">Email đã tồn tại</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="Position_id"><b>Chức vụ</b></label>
                                            <select class="form-control" id="Position_id">
                                                    <option value="">----</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label><b>Phân Quyền</b></label>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            @for($i=2;$i<count($roles)+2;$i++)
                                                @if($i == 7)
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            @endif
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="{{$i}}">{{$roles[$i]}}</label>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary"
                                                onclick="">
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
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<script>
    $(function () {
        idUsers = null;
        if (typeof (userView) === 'undefined') {
            userView = {
                goBack: null,
                idUser: null,
                UserObject: {
                    Id: null,
                    FullName: null,
                    UserName:null,
                    Email: null,
                    Password: null,
                    RoleId: null,
                    PositionId: null
                },
                resetUserObject: function () {
                    for (var propertyName in userView.UserObject) {
                        if (userView.UserObject.hasOwnProperty(propertyName)) {
                            userView.UserObject.propertyName = null;
                        }
                    }
                },
                firstToUpperCase: function (str) {
                    return str.substr(0, 1).toUpperCase() + str.substr(1);
                },
                resetForm: function () {
                    if ($("input[name=Id]").val() === "") {
                        var allinput = $("input");
                        $("div[class=form-body]").find(allinput).val("");
                    } else {
                        userView.viewListUser(userView.goBack);
                    }
                },
                Cancel: function () {
                    userView.resetForm();
                },
                viewListUser: function (element) {
                    userView.goBack = element;
                    idUser = $(element).attr("id");
                    userView.idUser = $(element).attr("id");
                    $("tbody#tbodyUserList").find("tr").removeClass("active");
                    $(element).addClass("active");
                    $.post(url + "admin/postViewUser", {
                        _token: _token,
                        idUser: userView.idUser
                    }, function (data) {
                        $("input[name=Id]").empty().val(userView.idUser)
                        for (var propertyName in data) {
                            $("select[id=" + userView.firstToUpperCase(propertyName) + "]").val(data[propertyName]);
                            $("input[id=" + userView.firstToUpperCase(propertyName) + "]").val(data[propertyName]);
                        }
                    })
                },
                fillTbody: function (data, result) {
                    $("tbody#tbodyUserList").empty();
                    var row = "";
                    for (var i = 0; i < data["listUser"].length; i++) {
                        var tr = "";
                        tr += "<tr id=" + data["listUser"][i]["id"] + " onclick='userView.viewListUser(this)' style='cursor: pointer'>";
                        tr += "<td>" + data["listUser"][i]["name"] + "</td>";
                        tr += "<td>" + data["listUser"][i]["fullName"] + "</td>";
                        tr += "<td>" + data["listUser"][i]["email"] + "</td>";
                        tr += "<td>" + data["listUser"][i]["position"] + "</td>";
                        tr += "<td>" + data["listUser"][i]["role"] + "</td>";
                        row += tr;
                    }
                    $("tbody#tbodyUserList").append(row);
                    userView.idUser = null;
                    userView.addNewUser(result);
                },
                deleteUser: function () {
                    if(idUsers==null) {
                        $("div#modalContent").empty().append("Vui lòng chọn người dùng để xoá");
                        $("button[name=modalAgree]").hide();
                        $("div#modalConfirm").modal("show");
                    }else{
                        $("div#modalContent").empty().append("Chắc chắn xoá ?");
                        $("button[name=modalAgree]").show();
                        $("div#modalConfirm").modal("show");
                    }
                },
                modalAgree: function () {
                    if (idUser !== null) {
                        $.post(url + "admin/deleteUser", {
                            _token: _token,
                            idUser: idUser
                        }, function (data) {
                            if (data[0] === 1) {
                                idUsers==null,
                                        userView.fillTbody(data, 'delete');
                            }
                        });
                    }
                    else {
                        $("div#modalConfirm").modal("show");
                        $("div#modalContent").empty().append("Vui lòng chọn tài khoản cần xoá");
                        $("button[name=modalAgree]").hide();
                    }
                },
                addNewUser: function (result) {
                    if (result === "") {
                        //$("div#modalConfirm").modal("hide");
                        $("input[name=Id]").val("");
                        userView.resetForm();
                    } else if (result === "delete") {
                        $("div#modalContent").empty().append("Xoá thành công");
                        $("button[name=modalAgree]").hide();
                        $("input[name=Id]").val("");
                        therapistView.resetForm();
                    }

                },
                checkEmail: function () {
                    $("label#Email").hide();
                },
                addNewAndUpdateUser: function () {
                    userView.resetUserObject();
                    for (var i = 0; i < Object.keys(userView.UserObject).length; i++) {
                        userView.UserObject[Object.keys(userView.UserObject)[i]] = $("#" + Object.keys(userView.UserObject)[i]).val();
                    }
                    if ($("input[name=Id]").val().length == 0 || ($("input[name=Id]").val().length > 0 && $("input[name=Password]").val().length > 0)) {
                        $("#formUser").validate({
                            rules: {
                                Name: {
                                    required: true,
                                    minlength: 6,
                                    maxlength: 20
                                },
                                Password: {
                                    required: true,
                                    minlength: 6,
                                    maxlength: 20
                                },
                                PasswordConfirm: {
                                    required: true,
                                    equalTo: "#Password",
                                    minlength: 6,
                                    maxlength: 20
                                },
                                Email: {
                                    required: true,
                                    email: true
                                }
                            },
                            messages: {
                                Name: {
                                    required: "Tên đăng nhập không được rỗng",
                                    minlength: "Tên đăng nhập phải từ 6 kí tự đến 20 kí tự",
                                    maxlength: "Tên đăng nhập phải từ 6 kí tự đến 20 kí tự"
                                },
                                Password: {
                                    required: "Mật khẩu không được rỗng",
                                    minlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự",
                                    maxlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự"
                                },
                                PasswordConfirm: {
                                    required: "Nhập lại mật khẩu không đúng",
                                    equalTo: "Nhập lại mật khẩu không đúng",
                                    minlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự",
                                    maxlength: "Mật khẩu nhập phải từ 6 kí tự đến 20 kí tự"
                                },
                                Email: {
                                    required: "Email không được rỗng.",
                                    email: 'Email không đúng định dạng'
                                }
                            }
                        });
                    } else if ($("input[name=Id]").val().length > 0 && $("input[name=Password]").val().length == 0) {
                        $("#formUser").validate({
                            rules: {
                                Name: {
                                    required: true,
                                    minlength: 6,
                                    maxlength: 20

                                },
                                Email: {
                                    required: true,
                                    email: true
                                }
                            },
                            messages: {
                                Name: {
                                    required: "Tên đăng nhập không được rỗng,",
                                    minlenght: "Tên đăng nhập phải từ 6 kí tự đến 20 kí tự",
                                    maxlenght: "Tên đăng nhập phải từ 6 kí tự đến 20 kí tự"
                                },
                                Email: {
                                    required: "Email không được rỗng.",
                                    email: 'Email không đúng định dạng'
                                }
                            }
                        });
                    }
                    if ($("#formUser").valid()) {
                        $.post(url + "admin/addNewAndUpdateUser", {
                            _token: _token,
                            addNewOrUpdateId: $("input[name=Id]").val(),
                            dataUser: userView.UserObject
                        }, function (data) {
                            console.log(data);
                            if (data[0] !== 3) {
                                if (data[0] === 1) {
                                    idUsers=null;
                                    $("div#modalConfirm").modal("show");
                                    $("div#modalContent").empty().append("Thêm mới thành công");
                                    $("button[name=modalAgree]").hide();
                                    userView.fillTbody(data, '');
                                } else if (data[0] === 2) {
                                    idUsers=null;
                                    $("div#modalConfirm").modal("show");
                                    $("div#modalContent").empty().append("Chỉnh sửa thành công");
                                    $("button[name=modalAgree]").hide();
                                    userView.fillTbody(data, '');
                                } else if (data[0] === 0) {
                                    $("div#modalConfirm").modal("show");
                                    $("div#modalContent").empty().append("Chỉnh sửa KHÔNG thành công");
                                    $("button[name=modalAgree]").hide();
                                }
                                else {
                                    $("div#modalConfirm").modal("show");
                                    $("div#modalContent").empty().append("Thêm mới KHÔNG thành công. Kiểm tra tài khoản");
                                    $("button[name=modalAgree]").hide();
                                }
                            } else {
                                $("label#Email").show();
                            }
                        })
                    }else{
                        $("form#formUser").find("label[class=error]").css("color","red");
                    }
                }
            }
        }
    })





    function show() {
        $('.menu-toggle').hide();
        $('#frmControl').slideDown();
    }
    function hide() {
        $('#frmControl').slideUp('', function(){
            $('.menu-toggle').show();
        });
    }
    $('#table-data').DataTable({
        language: languageOptions
    });
</script>
