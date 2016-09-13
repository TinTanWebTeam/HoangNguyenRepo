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
        width: 60%;
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
            <table class="table table-bordered table-hover" id="table-data">
                <thead>
                <tr class="active">
                    <th>Mã yêu cầu</th>
                    <th>Mã hàng</th>
                    <th>Mã tài xế</th>
                    <th>Mã xe</th>
                    <th>Mã khách hàng</th>
                    <th>Trọng tải</th>
                    <th>Doanh thu</th>
                    <th>Giao xe</th>
                    <th>Nhận</th>
                    <th>Lợi nhuận</th>
                    <th>Ghi chú</th>
                    <th>Số chứng từ</th>
                    <th>Số hàng trên chứng từ </th>
                    <th>Người nhận</th>
                    <th>Ngày nhận</th>
                    <th>Trạng thái</th>
                    <th>Nơi nhận</th>
                    <th>Nơi giao</th>
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
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
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
                                    <div class="col-md-3 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="Code"><b>Mã yêu cầu</b></label>
                                            <input type="text" class="form-control"
                                                   id="Code"
                                                   name="Code"
                                                   placeholder="Mã yêu cầu"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-3 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="FullName"><b>Mã hàng</b></label>
                                            <input type="text" class="form-control"
                                                   id="FullName"
                                                   name="FullName"
                                                   placeholder="Tên khách hàng"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-3 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="FullName"><b>Mã tài xế</b></label>
                                            <input type="text" class="form-control"
                                                   id="FullName"
                                                   name="FullName"
                                                   placeholder="Tên khách hàng"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Date"><b>Mã xe</b></label>
                                            <input type="date" class="form-control"
                                                   id="Date"
                                                   name="Date"
                                                   value={{date('')}}>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-3 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Number"><b>Mã khách hàng</b></label>
                                            <input type="number" class="form-control"
                                                   id="Number"
                                                   name="Number"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Number"><b>Trọng tải</b></label>
                                            <input type="number" class="form-control"
                                                   id="Number"
                                                   name="Number"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="Transport"><b>Doanh thu</b></label>
                                            <input type="text" class="form-control"
                                                   id="Transport"
                                                   name="Transport"
                                                   placeholder="Vị trí vận chuyển">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <label for="Status"><b>Giao xe</b></label>
                                            <input type="text" class="form-control"
                                                   id="Status"
                                                   name="Status"
                                                   placeholder="Trạng thái">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Number"><b>Nhận</b></label>
                                            <input type="number" class="form-control"
                                                   id="Number"
                                                   name="Number"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="Transport"><b>Lợi nhuận</b></label>
                                            <input type="text" class="form-control"
                                                   id="Transport"
                                                   name="Transport"
                                                   placeholder="Vị trí vận chuyển">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label for="Status"><b>Ghi chú</b></label>
                                            <input type="text" class="form-control"
                                                   id="Status"
                                                   name="Status"
                                                   placeholder="Trạng thái">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Number"><b>Số chứng từ</b></label>
                                            <input type="number" class="form-control"
                                                   id="Number"
                                                   name="Number"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="Transport"><b>Số hàng trên chứng từ</b></label>
                                            <input type="text" class="form-control"
                                                   id="Transport"
                                                   name="Transport"
                                                   placeholder="Vị trí vận chuyển">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group form-md-line-input">
                                            <label for="Status"><b>Người nhận</b></label>
                                            <input type="text" class="form-control"
                                                   id="Status"
                                                   name="Status"
                                                   placeholder="Trạng thái">
                                        </div>
                                    </div>
                                    <div class="col-md-3 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Number"><b>Ngày nhận</b></label>
                                            <input type="number" class="form-control"
                                                   id="Number"
                                                   name="Number"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="Transport"><b>Trạng thái</b></label>
                                            <input type="text" class="form-control"
                                                   id="Transport"
                                                   name="Transport"
                                                   placeholder="Vị trí vận chuyển">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label for="Status"><b>Nơi nhận</b></label>
                                            <input type="text" class="form-control"
                                                   id="Status"
                                                   name="Status"
                                                   placeholder="Trạng thái">
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Number"><b>Nơi giao</b></label>
                                            <input type="number" class="form-control"
                                                   id="Number"
                                                   name="Number"
                                                   placeholder="0">
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
