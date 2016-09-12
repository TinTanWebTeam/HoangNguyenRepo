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
                <h5 class="blue">Quản lý cước phí vận chuyển theo tháng</h5>
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
                    <th>Mã</th>
                    <th>Tháng</th>
                    <th>Cước phí</th>
                    <th>Sửa/ Xóa</th>
                </tr>
                </thead>
                <tbody>
                <tr>
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
                <div class="panel-heading">Cập nhật cước phí vận chuyển
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
                                    <div class="col-md-6 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="Month"><b>Tháng</b></label>
                                            <input type="text" class="form-control"
                                                   id="Month"
                                                   name="Month"
                                                   placeholder="Tháng"
                                                   autofocus >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 "  >
                                        <div class="form-group form-md-line-input " >
                                            <label for="Cost"><b>Cước phí</b></label>
                                            <input type="text" class="form-control"
                                                   id="Cost"
                                                   name="Cost"
                                                   placeholder="00.00"
                                                   autofocus >
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
