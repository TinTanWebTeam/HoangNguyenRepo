{{--Model--}}
<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent">Chắc chắn xoá ?</div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal" name="modalClose">Đóng</button>
                <button type="button" class="btn green" name="modalAgree"
                        onclick="">Tiếp tục
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}

<div class="row">
    <div class="col-lg-12">
        <h4 style="color:#2196f3">Quản lý chi phí thay nhớt</h4>
        <hr style="margin-top: 0px;">
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    {{--<div class="col-md-6 col-sm-6" style="height: 660px; overflow: scroll">--}}
    <div class="col-md-6 col-sm-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="color:#2196f3;font-size: 17px;">Danh sách chi phí thay nhớt
                    {{--<button type="button" class="btn btn-danger btn-circle pull-right"--}}
                    {{--onclick="userView.deleteUser()"><i--}}
                    {{--class="fa fa-times"></i>--}}
                    {{--</button>--}}
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover order-column" id="tableUserList"
                       style="margin-bottom: 0px;">
                    <thead>
                    <tr>
                        <th>Số xe</th>
                        <th>Thời gian thay nhớt</th>
                        <th>Số lít</th>
                        <th>Đơn giá</th>
                        <th>Tổng chi phí</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyUserList">
                    {{--@if($users)--}}
                    {{--@foreach($users as $item)--}}
                    {{--<tr id="{{$item->id}}" onclick="userView.viewListUser(this)"--}}
                    {{--style="cursor: pointer">--}}
                    {{--<td>{{$item->name}}</td>--}}
                    {{--<td>{{$item->fullName}}</td>--}}
                    {{--<td>{{$item->email}}</td>--}}
                    {{--<td>{{$item->Position()->name}}</td>--}}
                    {{--<td>{{$item->Role()->name}}</td>--}}
                    {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="color:#2196f3;font-size: 17px;">Thêm mới | Chỉnh sửa
                    <button type="button" class="btn btn-primary btn-circle pull-right"
                            onclick="userView.addNewUser('')"><i
                                class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="portlet-body form">
                <form role="form" id="formUser">
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input" style="display:none">
                                <input type="text" class="form-control" name="Id" id="Id">
                            </div>
                            <div class="form-group form-md-line-input"></div>
                            <div class="form-group form-md-line-input">
                                <label for="Name"><b>Số xe</b></label>
                                <select class="form-control" id="PositionId">

                                </select>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="FullName"><b>Thời gian thay nhớt</b></label>
                                <input type="text" class="form-control"
                                       id="FullName"
                                       name="FullName"
                                       placeholder="Nhập họ tên">
                            </div>

                            <div class="form-group form-md-line-input">
                                <label for="Password"><b>Số lít</b></label>
                                <input type="password" class="form-control"
                                       id="Password"
                                       name="Password"
                                       placeholder="Mật khẩu có ít nhất 6 kí tự">
                            </div>
                            <div class="form-group form-md-line-input ">
                                <label for="PasswordConfirm"><b>Đơn giá</b></label>
                                <input type="Password" class="form-control"
                                       id="PasswordConfirm"
                                       name="PasswordConfirm"
                                       maxlength="20"
                                       minlength="6"
                                       placeholder="Nhập lại mật khẩu">
                            </div>

                            <div class="form-group form-md-line-input">
                                <label for="Email"><b>Tổng chi phí</b></label>
                                <input type="text" class="form-control"
                                       id="Email"
                                       name="Email"
                                       onclick="userView.checkEmail()"
                                       onchange="userView.checkEmail()"
                                       placeholder="Nhập email">
                                <label id="Email" style="display: none; color: red">Email đã tồn tại</label>
                            </div>

                        </div>
                        <div class="form-actions noborder">
                            <div class="form-group" style="padding-left: 15px;padding-bottom: 15px">
                                <button type="button" class="btn btn-primary"
                                        onclick="userView.addNewAndUpdateUser()">
                                    Hoàn tất
                                </button>
                                <button type="button" class="btn default" onclick="userView.Cancel()">Huỷ</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
