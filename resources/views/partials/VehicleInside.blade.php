<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }
    #frmControl {
        z-index: 3;
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

    .menu-toggles{
        cursor: pointer
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="blue">Quản lý xe công ty</h5>
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
                    <th>Mã xe</th>
                    <th>Số xe</th>
                    <th>Trọng tải</th>
                    <th>Kích thước</th>
                    <th>Tài xế</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ liên lạc</th>
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
                </tbody>
            </table>

        </div> <!-- end table-reposive -->
        <div id="frmControl" class="col-md-offset-4 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Thêm mới xe công ty
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
                                            <label for="Code"><b>Mã</b></label>
                                            <input type="text" class="form-control"
                                                   id="Code"
                                                   name="Code"
                                                   placeholder="Mã"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="NumberVehicle"><b>Số xe</b></label>
                                            <input type="text" class="form-control"
                                                   id="NumberVehicle"
                                                   name="NumberVehicle"
                                                   placeholder="Số xe">
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Kg"><b>Trọng tải</b></label>
                                            <input type="text" class="form-control"
                                                   id="Kg"
                                                   name="Kg"
                                                   placeholder="Trọng tải">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="Size"><b>Kích thước</b></label>
                                            <input type="text" class="form-control"
                                                   id="Size"
                                                   name="Size"
                                                   placeholder="Kích thước">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <label for="Driver"><b>Tài xế</b></label>
                                            <input type="text" class="form-control"
                                                   id="Driver"
                                                   name="Driver"
                                                   placeholder="Tài xế">
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
