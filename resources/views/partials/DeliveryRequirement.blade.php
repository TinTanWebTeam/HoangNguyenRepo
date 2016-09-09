<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }
    #frmControl {
        z-index: 1;
        position: fixed;
        top: 40%;
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
                <h5 class="blue">Quản lý yêu cầu giao hàng</h5>
                <div class="menu-toggle  pull-right fixed" >
                    <div class="btn btn-primary btn-circle btn-md" onclick="show()">
                        <i class="glyphicon glyphicon-plus"></i>
                    </div>
                </div>
                <hr>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="table-test">
                <thead>
                <tr class="active">
                    <th>Mã yêu cầu</th>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày yêu cầu</th>
                    <th>Số lượng hàng</th>
                    <th>Nơi vận chuyển</th>
                    <th>Trạng thái</th>
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
                <tr>
                    <td>bbaaaa</td>
                    <td>bbaaaa</td>
                    <td>bbaaaa</td>
                    <td>bbaaaa</td>
                    <td>bbaaaa</td>
                    <td>bbaaaa</td>
                    <td>baaaa</td>
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
                <div class="panel-heading">Thêm mới yêu cầu giao hàng
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
                                            <label for="FullName"><b>Mã yêu cầu</b></label>
                                            <input type="text" class="form-control"
                                                   id="FullName"
                                                   name="FullName"
                                                   placeholder="Nhập họ tên"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-6 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="FullName"><b>Khách hàng</b></label>
                                            <input type="text" class="form-control"
                                                   id="FullName"
                                                   name="FullName"
                                                   placeholder="Nhập họ tên"
                                                   autofocus >
                                        </div>
                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Name"><b>Ngày yêu cầu</b></label>
                                            <input type="text" class="form-control"
                                                   id="Name"
                                                   name="Name"
                                                   placeholder="Tên đăng nhập có ít nhất 6 kí tự">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Password"><b>Số lượng hàng</b></label>
                                            <input type="password" class="form-control"
                                                   id="Password"
                                                   name="Password"
                                                   placeholder="Mật khẩu có ít nhất 6 kí tự">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="PasswordConfirm"><b>Nơi vận chuyển</b></label>
                                            <input type="Password" class="form-control"
                                                   id="PasswordConfirm"
                                                   name="PasswordConfirm"
                                                   maxlength="20"
                                                   minlength="6"
                                                   placeholder="Nhập lại mật khẩu">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="Email"><b>Trạng thái</b></label>
                                            <input type="text" class="form-control"
                                                   id="Email"
                                                   name="Email"
                                                   onclick=""
                                                   onchange=""
                                                   placeholder="Nhập email">
                                            <label id="Email" style="display: none; color: red">Email đã tồn tại</label>
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


    $('#table-test').DataTable({
        language: languageOptions
    });

</script>
