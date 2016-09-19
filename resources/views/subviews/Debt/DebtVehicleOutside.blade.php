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

    .fixed {
        top: 72px;
        position: fixed;
        right: 20px;
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

    ol.breadcrumb {
        border-bottom: 2px solid #e7e7e7
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL công nợ</a></li>
                        <li class="active">Nhà xe ngoài</li>
                    </ol>
                    <div class="menu-toggle  pull-right fixed">
                        <div class="btn btn-warning btn-circle btn-md">
                            <i class="glyphicon glyphicon-upload icon-center"></i>
                        </div>
                        <div class="btn btn-primary btn-circle btn-md" onclick="debtVehicleOutsideView.show()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-hover" id="table-data">
                        <thead>
                        <tr class="active">
                            <th>Mã nhà xe</th>
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
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thanh toán cước cho nhà xe ngoài
            <div class="menu-toggles pull-right" onclick="debtVehicleOutsideView.hide()">
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
                                    <label for="CodeHouseVehicle"><b>Mã nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="CodeHouseVehicle"
                                           name="CodeHouseVehicle"
                                           placeholder="Mã nhà xe"
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
                                           placeholder="00.00"
                                           autofocus>
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

<script>
    if (typeof debtVehicleOutsideView === 'undefined') {
        debtVehicleOutsideView = {
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
                debtVehicleOutsideView.table = $('#table-data').DataTable({
                    language: languageOptions,
                    drawCallback: function () {
                        var api = this.api(),
                                sum = 0;
                        api.rows(":not('.sgrouptotal')").every(function () {
                            sum += parseFloat(this.data()[1]);
                        });
                        $(api.column(1).footer()).text(sum);
                        api.rows(":not('.sgrouptotal')").every(function () {
                            sum += parseFloat(this.data()[2]);
                        });
                        $(api.column(2).footer()).text(sum);
                    }
                });
            }
        };
        debtVehicleOutsideView.loadData();
    } else {
        debtVehicleOutsideView.loadData();
    }

</script>
