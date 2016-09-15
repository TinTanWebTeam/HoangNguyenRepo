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
</style>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <h5 class="blue">Quản lý công nợ khách hàng</h5>
                <div class="menu-toggle  pull-right fixed">
                    <div class="btn btn-warning btn-circle btn-md">
                        <i class="glyphicon glyphicon-upload icon-center"></i>
                    </div>
                    <div class="btn btn-primary btn-circle btn-md" onclick="debtCustomerView.show()">
                        <i class="glyphicon glyphicon-plus icon-center"></i>
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
                    <th>Mã khách hàng</th>
                    <th>Tổng nợ</th>
                    <th>Đã trả</th>
                    <th>Trạng thái</th>
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
                            <div class="btn btn-success btn-circle">
                                <i class="glyphicon glyphicon-pencil icon-center"></i>
                            </div>
                        </div>
                        <div class="btn-del-edit">
                            <div class="btn btn-danger btn-circle">
                                <i class="glyphicon glyphicon-remove icon-center"></i>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

        </div> <!-- end table-reposive -->
        <div id="frmControl" class="col-md-offset-4 col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">Thanh toán cước phí
                    <div class="menu-toggles pull-right" onclick="debtCustomerView.hide()">
                        <i class="glyphicon glyphicon-remove"></i>
                    </div>
                </div>

                <div class="panel-body">
                    <form role="form" id="formUser">
                        <div class="form-body">
                            <div class="col-md-12 ">
                                <div class="row ">
                                    <div class="col-md-12 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="FullName"><b>Khách hàng</b></label>
                                            <input type="text" class="form-control"
                                                   id="FullName"
                                                   name="FullName"
                                                   placeholder="Tên khách hàng"
                                                   autofocus>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group form-md-line-input ">
                                            <label for="Payments"><b>Tiền thanh toán</b></label>
                                            <input type="text" class="form-control"
                                                   id="Payments"
                                                   name="Payments"
                                                   placeholder="00.00">
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
    if (typeof debtCustomerView === 'undefined') {
        debtCustomerView = {
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
                debtCustomerView.table = $('#table-data').DataTable({
                    language: languageOptions
                });
            }
        };
    } else {
        debtCustomerView.loadData();
    }


</script>