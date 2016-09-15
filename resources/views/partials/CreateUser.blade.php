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

    .fixed {
        top: 72px;
        position: fixed;
        right: 20px;
        z-index: 2;
    }

    .menu-toggles {
        cursor: pointer
    }

    .icon-center {
        line-height: 130%;
        padding-left: 3%;
        font-size: 13px;
    }

    ol.breadcrumb {
        border-bottom: 2px solid #e7e7e7
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>

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
                        <div class="btn btn-primary btn-circle btn-md" onclick="CreateUserView.show()">
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
                                    <div class="btn btn-success  btn-circle" onclick="CreateUserView.show()">
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
            </div> <!-- end .col-md-12-->
        </div> <!-- end .row -->
    </div>
</div>



<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Đăng ký người dùng
            <div class="menu-toggles pull-right" onclick="CreateUserView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>
        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="FullName"><b>Họ và tên</b></label>
                                    <input type="text" class="form-control"
                                           id="FullName"
                                           name="FullName"
                                           placeholder="Nhập họ tên"
                                           autofocus>
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

<script>
    $(function () {
        if (typeof (CreateUserView) === 'undefined') {
            CreateUserView = {
                table: null,
                show: function () {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                },
                hide: function () {
                    $('#frmControl').slideUp('', function () {
                        $('.menu-toggle').show();
                    });
                },
                loadData: function () {
                    CreateUserView.table = $('#table-data').DataTable({
                        language: languageOptions
                    })
                }
            };
            CreateUserView.loadData();
        } else {
            CreateUserView.loadData();
        }
    })();
</script>