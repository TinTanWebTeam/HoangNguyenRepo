<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 53%;
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
                <h5 class="blue">Phân tài</h5>
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
                    <th>Mã yêu cầu</th>
                    <th>Ngày yêu cầu</th>
                    <th>Tên khách hàng</th>
                    <th>Tỉnh thành</th>
                    <th>Mã xe</th>
                    <th>Tên hàng</th>
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
                <div class="panel-heading">Thiết lập danh sách và số lượng hàng cần giao
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
                                            <label for="HouseVehicle"><b>Nhà xe</b></label>
                                            <input type="text" class="form-control"
                                                   id="HouseVehicle"
                                                   name="HouseVehicle"
                                                   placeholder="Nhà xe"
                                                   autofocus >
                                        </div>
                                    </div>
                                    <div class="col-md-6 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="NameGoods"><b>Tên hàng</b></label>
                                            <input type="text" class="form-control"
                                                   id="NameGoods"
                                                   name="NameGoods"
                                                   placeholder="Tên hàng"
                                                   autofocus >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="PrepayCost"><b>Tiền trả trước</b></label>
                                            <input type="text" class="form-control"
                                                   id="PrepayCost"
                                                   name="PrepayCost"
                                                   placeholder="00.00"
                                                   >
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
