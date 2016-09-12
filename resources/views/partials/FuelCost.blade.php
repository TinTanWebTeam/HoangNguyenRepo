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
                <h5 class="blue">Quản lý chi phí nhiên liệu</h5>
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
                    <th>Số xe</th>
                    <th>Thời gian đổ dầu</th>
                    <th>Số lít</th>
                    <th>Đơn giá</th>
                    <th>Tổng chi phí</th>
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
                <div class="panel-heading">Thêm mới chi phí nhiên liệu
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
                                            <label for="NumberVehicle"><b>Số xe</b></label>
                                            <input type="text" class="form-control"
                                                   id="NumberVehicle"
                                                   name="NumberVehicle"
                                                   placeholder="Số xe"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-6 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="Time"><b>Thời gian đổ dầu</b></label>
                                            <input type="text" class="form-control"
                                                   id="Time"
                                                   name="Time"
                                                   placeholder="Thời gian đổ dầu"
                                                   autofocus >
                                        </div>
                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="liter"><b>Số lít</b></label>
                                            <input type="text" class="form-control"
                                                   id="liter"
                                                   name="liter"
                                                   placeholder="Số lít">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="Price"><b>Đơn giá</b></label>
                                            <input type="text" class="form-control"
                                                   id="Price"
                                                   name="Price"
                                                   placeholder="00.00">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="TotalPrice"><b>Tổng chi phí</b></label>
                                            <input type="text" class="form-control"
                                                   id="TotalPrice"
                                                   name="TotalPrice"
                                                   placeholder="Tổng chi phí">
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