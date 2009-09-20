<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 40%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
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
                        <li class="active">Thay nhớt</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="petroleumCostView.show()">
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
                            <th>Stt</th>
                            <th>Số xe</th>
                            <th>Thời gian đổ</th>
                            <th>Số lít</th>
                            <th>Đơn giá</th>
                            <th>Tổng chi phí</th>
                            <th>Ghi chú</th>
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


<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm mới chi phí thay nhớt
                <div class="menu-toggles pull-right" onclick="petroleumCostView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="formUser">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-4 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="NumberVehicle"><b>Mã xe</b></label>
                                        <input type="text" class="form-control"
                                               id="NumberVehicle"
                                               name="NumberVehicle"
                                               placeholder="Số xe"
                                               autofocus>
                                    </div>
                                </div>
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
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input ">
                                        <label for="TotalPrice"><b>Thời gian thay nhớt</b></label>
                                        <input type="date" class="form-control"
                                               id="TotalPrice"
                                               name="TotalPrice"
                                               placeholder="Tổng chi phí">
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
    </div>
</div>
<!-- end #frmControl -->
<script>
    $(function () {
        if (typeof (petroleumCostView) === 'undefined') {
            petroleumCostView = {
                table: null,
                data: null,
                action: null,
                tablePetroleumCosts: null,
                idDelete: null,
                current: null,
                show: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hide: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'petroleum-cost/petroleum-cost',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            petroleumCostView.tablePetroleumCosts = data['petroleumCosts'];
                            petroleumCostView.fillDataToDatatable(data['petroleumCosts']);
                           console.log(petroleumCostView.tablePetroleumCosts);

                        } else {
                            petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": true,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "2000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    };
                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_code'] + '-' + data[i]['vehicles_vehicleNumber'];
                    }
                    petroleumCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'fullNumber'},
                            {
                                data: 'dateRefuel',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY HH:mm:ss");
                                }
                            },

                            {data: 'literNumber'},
                            {data: 'prices_price'},
                            {data: 'totalCost'},
                            {data: 'noteCost'},
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
            petroleumCostView.loadData();
        } else {
            petroleumCostView.loadData();
        }
    });
</script>