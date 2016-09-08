<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px
    }
    #frmControl {
        z-index: 1000;
        position: fixed;
        top: 200px;
        display: none;
        right: 10px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <h5 style="color:#2196f3">Quản lý khách hàng
                    <div class="pull-right menu-toggle">
                        <button onclick="show()" type="button" class="btn btn-primary btn-sm btn-circle"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </h5>
                <hr style="margin-top: 0px;">
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover order-column" id="tableUserList"
                   style="margin-bottom: 0px;">
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
                <tbody id="tbodyUserList">
                <tr>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>
                        <div class="menu-toggle btn-del-edit">
                            <div class="btn btn-success  btn-circle">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </div>
                        </div>
                        <div class="menu-toggle">
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
                <div class="panel-heading">Panel heading without title</div>
                <div class="panel-body">
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" class="form-control" name="" id="" placeholder="Input...">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" class="form-control" name="" id="" placeholder="Input...">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" class="form-control" name="" id="" placeholder="Input...">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" class="form-control" name="" id="" placeholder="Input...">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div> <!-- end #frmControl -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<script>
    function show() {
        $('#frmControl').fadeToggle();
    }
</script>