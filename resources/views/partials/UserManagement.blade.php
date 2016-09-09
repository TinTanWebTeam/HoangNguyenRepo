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
                                            <label for="Name"><b>Tên đăng nhập</b></label>
                                            <input type="text" class="form-control"
                                                   id="Name"
                                                   name="Name"
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
                                                   onclick=""
                                                   onchange=""
                                                   placeholder="Nhập email">
                                            <label id="Email" style="display: none; color: red">Email đã tồn tại</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="PositionId"><b>Chức vụ</b></label>
                                            <select class="form-control" id="PositionId">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label><b>Phân Quyền</b></label>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            @for($i=0;$i<count($roles);$i++)
                                                @if($i == 5)
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            @endif
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="">{{$roles[$i]}}</label>
                                            </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                    </form>
                </div>
            </div>
        </div> <!-- end #frmControl -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<script>
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
