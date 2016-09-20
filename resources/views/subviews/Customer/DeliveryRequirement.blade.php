<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 10%;
        display: none;
        right: 0px;
        width: 60%;
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
                        <li class="active">Đơn hàng</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="deliveryRequirementView.show()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper table-responsive">
                    <table class="table table-bordered table-hover" id="table-data">

                        <thead>
                        <tr class="active">
                            <th>Số xe</th>
                            <th>Tên hàng</th>
                            <th>Nơi nhận</th>
                            <th>Nơi giao</th>
                            <th>Khách hàng</th>
                            <th>Doanh thu</th>
                            <th>Giao xe</th>
                            <th>Nhận</th>
                            <th>Lợi nhuận</th>
                            <th>Người nhận</th>
                            <th>Ngày nhận</th>
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
        <div class="panel-heading">Thêm mới yêu cầu giao hàng
            <div class="menu-toggles pull-right" onclick="deliveryRequirementView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Mã xe</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           value=""
                                           ondblclick="deliveryRequirementView.searchVehicle()">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Mã khách hàng</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Mã hàng</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Số lượng</b></label>
                                    <input type="" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="row ">

                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Trọng tải</b></label>
                                    <input type="number" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Doanh thu</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Giao xe</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Nhận</b></label>
                                    <input type="number" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Người nhận</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Ngày nhận</b></label>
                                    <input type="date" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Nơi nhận</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Nơi giao</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Số chứng từ</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Số hàng trên chứng từ</b></label>
                                    <input type="number" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for=""><b>Ghi chú</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Trạng thái</b></label>
                                    <input type="text" class="form-control"
                                           id=""
                                           name=""
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Số chứng từ nhận</b></label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <select name="" id="" class="form-control">
                                                <option value="">0</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="btn btn-primary btn-sm btn-circle">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Chi phí</b></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Nhiên liệu</option>
                                        <option value="">Thay nhớt</option>
                                        <option value="">Đậu bãi</option>
                                        <option value="" selected>Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Số tiền</b></label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input ">
                                    <label for=""><b>Ghi chú</b></label>
                                    <input type="text" class="form-control">
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

<!-- Modal vehicles -->
<div class="modal fade" id="modal-vehicle">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Danh sách xe
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Mã vùng</th>
                            <th>Số xe</th>
                            <th>Loại xe</th>
                            <th>Nhà xe</th>
                            <th>Kích thước</th>
                            <th>Trọng tải</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="vehicle-talbe-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        if (typeof (deliveryRequirementView) === 'undefined') {
            deliveryRequirementView = {
                table: null,
                data: null,
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
                    $.post(url + 'delivery-requirement', {_token: _token, fromDate: null, toDate: null}, function(listOrders){
                        deliveryRequirementView.data = listOrders;
                        deliveryRequirementView.fillDataToDatatable(listOrders);
                    });
                },
                fillDataToDatatable: function(listOrders) {
                    deliveryRequirementView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: listOrders,
                        columns : [
                            {data: 'vehicles_vehicleNumber' },
                            {data: 'products_name' },
                            {data: 'receivePlace' },
                            {data: 'deliveryPlace' },
                            {data: 'customers_fullName' },
                            {data: 'cashRevenue' },
                            {
                                data: 'cashDelivery',
                                render: $.fn.dataTable.render.number( '.', ',',0)
                            },
                            {
                                data: 'cashReceive',
                                render: $.fn.dataTable.render.number( '.', ',',0) 
                            },
                            {
                                data: 'cashProfit',
                                render: $.fn.dataTable.render.number( '.', ',',0) 
                            },
                            {
                                data: 'receiver',
                                render: $.fn.dataTable.render.number( '.', ',',0) 
                            },
                            {
                                data: 'receiveDate',
                                render: function(data, type, full, meta){
                                    return moment(data).format('DD/MM/YYYY');
                                }
                            },
                            {
                                render: function(){
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
                },
                searchVehicle: function() {
                    $.get(url + 'getAllVehicle',function (listVehicle) {
                        var row = "";
                        for (var i = 0; i < listVehicle.length; i++) {
                            var tr = "<tr>";
                            tr += "<td>" + listVehicle[i]['areaCode'] + "</td>";
                            tr += "<td>"+ listVehicle[i]['vehicleNumber'] + "</td>";
                            tr += "<td>" + listVehicle[i]['vehicleTypes_name'] + "</td>";
                            tr += "<td>"+ listVehicle[i]['garages_name'] + "</td>";
                            tr += "<td>" + listVehicle[i]['size'] + "</td>";
                            tr += "<td>"+ listVehicle[i]['weight'] + "</td>";
                            tr += "<td><button class='btn btn-xs btn-success' onclick=''><span class='glyphicon glyphicon-ok'></span></button></td>";
                            tr += "</tr>";
                            row += tr;
                        }
                        $("#vehicle-talbe-body").empty().append(row);
                    });
                    $("#modal-vehicle").modal("show");
                }
            };
            deliveryRequirementView.loadData();
        } else {
            deliveryRequirementView.loadData();
        }
    });
</script>
