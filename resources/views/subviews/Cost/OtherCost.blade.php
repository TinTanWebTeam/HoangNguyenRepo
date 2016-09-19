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
                        <li><a href="javascript:;">QL chi phí</a></li>
                        <li class="active">Khác</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="otherCostView.show()">
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
                            <th>Số xe</th>
                            <th>Ghi chú</th>
                            <th>Đơn giá</th>
                            <th>Tổng chi phí</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chi phí khác
            <div class="menu-toggles pull-right" onclick="otherCostView.hide()">
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
                                    <label for="NumberVehicle"><b>Số xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NumberVehicle"
                                           name="NumberVehicle"
                                           placeholder="Số xe"
                                           autofocus>
                                </div>
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Loại phí</b></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Nhiên liệu</option>
                                        <option value="">Thay nhớt</option>
                                        <option value="">Đậu bãi</option>
                                        <option value="" selected>Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Price"><b>Đơn giá</b></label>
                                    <input type="text" class="form-control"
                                           id="Price"
                                           name="Price"
                                           placeholder="00.00">
                                </div>
                            </div>
                            <div class="col-md-4 ">
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
        if (typeof (otherCostView) === 'undefined') {
            otherCostView = {
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
                    $.post(url + 'other-cost', {_token: _token, formDate: null, toDate: null}, function (list) {
                        otherCostView.data = list;
                        otherCostView.fillDataToDatatable(list);
                    })
                },
                fillDataToDatatable: function (data) {
                    otherCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'vehicles_vehicleNumber'},
                            {data: 'note'},
                            {data: 'prices_price'},
                            {data: 'cost'},
                            {
                                render: function () {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ]
                    })

                }
            };
            otherCostView.loadData();
        } else {
            otherCostView.loadData();
        }
    });
</script>