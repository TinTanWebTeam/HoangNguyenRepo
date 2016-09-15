<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 20%;
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
                        <li><a href="javascript:;">QL khách hàng</a></li>
                        <li class="active">Khách hàng</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="show()">
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
                            <th>Mã</th>
                            <th>Họ và tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Mã số thuế</th>
                            <th>Ghi chú</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>3</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <div class="btn-del-edit">
                                    <div class="btn btn-success  btn-circle">
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
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>1</td>
                            <td>3</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <div class="btn-del-edit">
                                    <div class="btn btn-success  btn-circle">
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
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>3</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                <div class="btn-del-edit">
                                    <div class="btn btn-success  btn-circle">
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
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->

<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading ">Thêm mới khách hàng
            <div class="menu-toggles pull-right" onclick="customerView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Code"><b>Mã khách hàng</b></label>
                                    <input type="text" class="form-control"
                                           id="Code"
                                           name="Code"
                                           placeholder="Mã khách hàng"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="FullName"><b>Họ và tên</b></label>
                                    <input type="text" class="form-control"
                                           id="FullName"
                                           name="FullName"
                                           placeholder="Tên khách hàng"
                                           autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Adress"><b>Địa chỉ</b></label>
                                    <input type="text" class="form-control"
                                           id="Adress"
                                           name="Adress"
                                           placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Telephone"><b>Số điện thoại</b></label>
                                    <input type="text" class="form-control"
                                           id="Telephone"
                                           name="Telephone"
                                           placeholder="090..">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Email"><b>Email</b></label>
                                    <input type="email" class="form-control"
                                           id="Email"
                                           name="Email"
                                           placeholder="email@example.com">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Email"><b>Mã số thuế</b></label>
                                    <input type="text" class="form-control"
                                           id="Email"
                                           name="Email"
                                           placeholder="AX900">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="Note"><b>Ghi chú</b></label>
                                            <textarea class="form-control" id="Note" name="Note" rows="3" cols="3"
                                                      placeholder="Nhập ghi chú"></textarea>
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
    $(function () {
        if (typeof customerView === 'undefined') {
            customerView = {
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
                    customerView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        drawCallback: function () {
                            var api = this.api(),
                                    sum = 0;
                            api.rows(":not('.sgrouptotal')").every(function () {
                                sum += parseFloat(this.data()[1]);
                            });
                            $(api.column(1).footer()).text(sum);
                        }
                    })
                }
            };
            customerView.loadData();
        } else {
            customerView.loadData();
        }
    }());
</script>
