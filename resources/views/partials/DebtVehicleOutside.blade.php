{{--Model--}}
<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent">Chắt chắn xoá ?</div>
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

<div class="panel-heading">
    <div style="color:#2196f3;font-size: 17px;">Danh sách nhà xe ngoài
        <button type="button" class="btn btn-danger btn-circle pull-right"
                onclick="userView.deleteUser()"><i
                    class="fa fa-times"></i>
        </button>
    </div>
</div>
<!-- /.row -->
<div class="row">
    {{--<div class="col-md-6 col-sm-6" style="height: 660px; overflow: scroll">--}}
    <div class="col-md-6 col-sm-6" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="color:#2196f3;font-size: 17px;">Danh sách nhà xe ngoài
                    <button type="button" class="btn btn-danger btn-circle pull-right"
                    onclick="userView.deleteUser()"><i
                    class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover order-column" id="tableUserList"
                       style="margin-bottom: 0px;">
                    <thead>
                    <tr>
                        <th>Mã nhà xe</th>
                        <th>Tên nhà xe</th>
                        <th>Địa chỉ</th>
                        <th>Biển số xe</th>

                    </tr>
                    </thead>
                    <tbody id="tbodyVehicleList">
                    <tr>
                        <td>MX001</td>
                        <td>Nguyen van a</td>
                        <td>09000</td>
                        <td>59x..</td>
                    </tr>

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
                                <label for="NameDriver"><b>Tên nhà xe</b></label>
                                <input type="text" class="form-control"
                                       id="NameDriver"
                                       name="NameDriver"
                                       placeholder="Nhập tên tài xế">
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="CodeDriver"><b>Mã nhà xe</b></label>
                                <input type="text" class="form-control"
                                       id="CodeDriver"
                                       name="CodeDriver"
                                       placeholder="Mã xe">
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="Andress"><b>Địa chỉ</b></label>
                                <input type="text" class="form-control"
                                       id="Andress"
                                       name="Andress"
                                       placeholder="Andress...">
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="Telephone"><b>Số điện thoại</b></label>
                                <input type="text" class="form-control"
                                       id="Telephone"
                                       name="Telephone"
                                       placeholder="090...">
                            </div>

                            <div class="form-group form-md-line-input">
                                <label for="Contact"><b>Người liên hệ</b></label>
                                <input type="text" class="form-control"
                                       id="Contact"
                                       name="Contact"
                                       placeholder="nguyen van a">
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="TelContact"><b>Số điện thoại người liên hệ</b></label>
                                <input type="text" class="form-control"
                                       id="TelContact"
                                       name="TelContact"
                                       placeholder="090">
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="Kg"><b>Trọng tải xe</b></label>
                                <input type="text" class="form-control"
                                       id="Kg"
                                       name="Kg"
                                       placeholder="Kg">
                            </div>
                            <div class="form-group form-md-line-input">
                                <label for="Met"><b>Kích thước xe</b></label>
                                <input type="text" class="form-control"
                                       id="Met"
                                       name="Met"
                                       placeholder="Met">
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

