<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 28%;
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
                    <th>Ngày đậu bãi</th>
                    <th>Giờ vào</th>
                    <th>Giờ ra</th>
                    <th>Số giờ đậu</th>
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
                <div class="panel-heading">Thêm mới chi phí đậu bãi
                    <div class="menu-toggles pull-right" onclick="hide()">
                        <i class="glyphicon glyphicon-remove" ></i>
                    </div>
                </div>

                <div class="panel-body">
                    <form role="form" id="formUser">
                        <div class="form-body">
                            <div class="col-md-12 ">
                                <div class="row " >
                                    <div class="col-md-6"  >
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
                                            <label for="Date"><b>Ngày đậu bãi</b></label>
                                            <input type="date" class="form-control"
                                                   id="Date"
                                                   name="Date"
                                                   value="{{date("")}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row " >
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="TimeIn"><b>Giờ vào</b></label>
                                            <input type="Time" class="form-control"
                                                   id="TimeIn"
                                                   name="TimeIn">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input">
                                            <label for="TimeOut"><b>Giờ ra</b></label>
                                            <input type="time" class="form-control"
                                                   id="TimeOut"
                                                   name="TimeOut">
                                        </div>
                                    </div>
                                </div>
                                <div class="row " >
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="TotalTime"><b>Số giờ đậu</b></label>
                                            <input type="text" class="form-control"
                                                   id="TotalTime"
                                                   name="TotalTime"
                                                   placeholder="Số giờ đậu">
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="Price"><b>Đơn giá</b></label>
                                            <input type="text" class="form-control"
                                                   id="Price"
                                                   name="Price"
                                                   placeholder="00.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="row " >
                                    <div class="col-md-12 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="TotalPrice"><b>Tổng chi phí</b></label>
                                            <input type="text" class="form-control"
                                                   id="TotalPrice"
                                                   name="TotalPrice"
                                                   placeholder="00.00">
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
