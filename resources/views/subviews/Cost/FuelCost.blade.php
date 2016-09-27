<style>
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 30%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>

<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" name="modalClose"
                        onclick="fuelCostView.cancelDelete()">Hủy
                </button>
                <button type="button" class="btn green" name="modalAgree"
                        onclick="fuelCostView.deleteFuelCost()">Ðồng ý
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL chi phí</a></li>
                        <li class="active">Nhiên liệu</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="fuelCostView.addNewFuelCost()">
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
                            <th>Thời gian đổ</th>
                            <th>Loại phí</th>
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


<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chi phí nhiên liệu
            <div class="menu-toggles pull-right" onclick="fuelCostView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>
        <div class="panel-body portlet-body">
            <form role="form" id="fromFuelCost">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="vehicle"><b>Chọn xe</b></label>
                                    <input type="text" class="form-control"
                                           id="vehicle" data-id="" readonly
                                           name="vehicle" readonly
                                           placeholder="">
                                </div>
                            </div>
                            <div class='col-md-6'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker'>
                                        <label for="datetime"><b>Thời gian đổ nhiên liệu</b></label>
                                        <input type='text' id="datetime" name="datetime" class="form-control"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="liter"><b>Số lít</b></label>
                                    <input type="text" class="form-control"
                                           id="liter"
                                           name="liter"
                                           placeholder="Số lít">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="price"><b>Đơn giá</b></label>
                                    <div class="row">
                                        <div class="col-sm-10 col-xs-10">
                                            <input type="number" class="form-control"
                                                   id="price" readonly
                                                   name="price"
                                                   placeholder="00.00">
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            <div class="btn btn-primary btn-sm btn-circle">
                                                {{--onclick="vehicleInsideView.displayModal('show', '#modal-addVehicleType')">--}}
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="totalprice"><b>Tổng chi phí</b></label>
                                    <input type="text" class="form-control"
                                           id="totalprice" readonly
                                           name="totalprice"
                                           placeholder="Tổng chi phí">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="noted"><b>Ghi chú</b></label>
                                    <input type="text" class="form-control"
                                           id="noted"
                                           name="noted"
                                           placeholder="ghi chú">
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
                                <button type="button" class="btn default" onclick="fuelCostView.cancel()">Huỷ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div> <!-- end #frmControl -->


<!-- Modal list garages -->
<div class="row">
    <div id="modal-garage" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách xe</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-garage">
                            <thead>
                            <tr>
                                <th>Mã nhà xe</th>
                                <th>Tên nhà xe</th>
                                <th>Người liên hệ</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal list garages -->

<script>
    $(function () {
        $('#datetimepicker').datetimepicker();
        if (typeof (fuelCostView) === 'undefined') {
            fuelCostView = {
                table: null,
                data: null,
                action: null,
                tableCostPrice: null,
                tableCost: null,
                idDelete: null,
                current: null,
                show: function () {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                },
                hide: function () {
                    $('#frmControl').slideUp('', function () {
                        $('.menu-toggle').show();
                    });
                },

                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (fuelCostView.action == 'delete' && type == 'hide') {
                        fuelCostView.action = null;
                        fuelCostView.idDelete = null;
                    }
                },
                showNotification: function (type, msg) {
                    switch (type) {
                        case "info":
                            toastr.info(msg);
                            break;
                        case "success":
                            toastr.success(msg);
                            break;
                        case "warning":
                            toastr.warning(msg);
                            break;
                        case "error":
                            toastr.error(msg);
                            break;
                    }
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'fuel-cost/fuelcost',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            fuelCostView.tableCost = data['tableCost'];
                            fuelCostView.fillDataToDatatable(data['tableCost']);
                            fuelCostView.tableCostPrice = data['tableCostPrice'];
//                            fuelCostView.loadSelectBox(data['tableCostPrice']);
                        } else {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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

                cancel: function () {
                    if (fuelCostView.action == 'add') {
                        fuelCostView.clearInput();
                    } else {
                        fuelCostView.fillCurrentObjectToForm();
                    }
                },

                msgDelete: function (id) {
                    if (id) {
                        fuelCostView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("div#modalContent").empty().append("Bạn có muốn xóa ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                cancelDelete: function () {
                    fuelCostView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                deleteFuelCost: function () {
                    fuelCostView.action = 'delete';
                    fuelCostView.save();
                    $("#modalConfirm").modal('hide');
                },
                fillCurrentObjectToForm: function () {
                    var vehicle = fuelCostView.current["vehicles_code"] + "-" + fuelCostView.current["vehicles_vehicleNumber"];
                    var totalPrice = fuelCostView.current["literNumber"] * fuelCostView.current["prices_price"];
                    $("input[id='vehicle']").val(vehicle);
                    $("input[id='datetime']").val(fuelCostView.current["daytime"]);
                    $("input[id='liter']").val(fuelCostView.current["literNumber"]);
                    $("input[id='price']").val(fuelCostView.current["prices_price"]);
                    $("input[id='totalprice']").val(totalPrice);
                    $("input[id='noted']").val(fuelCostView.current["costprice_name"]);

                },
                fillFormDataToCurrentObject: function () {
                    if (fuelCostView.action == 'add') {
                        fuelCostView.current = {
                            vehicle: $("input[id='vehicle']").val(),
                            datetime: $("input[id='datetime']").val(),
                            totalprice: $("input[id='totalprice']").val(),
                            liter: $("input[id='liter']").val(),
                            price: $("input[id='price']").val(),
                            note: $("input[id='noted']").val(),

                        };
                    } else if (fuelCostView.action == 'update') {
                        fuelCostView.current.price = $("input[id='price']").val();
                        fuelCostView.current.liter = $("input[id='liter']").val();
                        fuelCostView.current.totalprice = $("input[id='totalprice']").val();
                        fuelCostView.current.datetime = $("input[id='datetime']").val();
                        fuelCostView.current.noted = $("input[id='noted']").val();
                        fuelCostView.current.vehicle = $("input[id='vehicle']").val();
                    }
                },
                clearInput: function () {
                    $("input[id='vehicle']").val('');
                    $("input[id='liter']").val('');
                    $("input[id='price']").val('');
                    $("input[id='totalprice']").val('');
                    $("input[id='noted']").val('');
                    $("input[id='datetime']").val('');

                    fuelCostView.current = null;
                },
                addNewFuelCost: function () {

                    fuelCostView.current = null;
                    fuelCostView.clearInput();
                    fuelCostView.action = 'add';
                    fuelCostView.show();
                },
                editFuelCost: function (id) {
                    fuelCostView.current = null;
                    fuelCostView.current = _.clone(_.find(fuelCostView.tableCost, function (o) {
                        return o.id == id;
                    }), true);
                    fuelCostView.fillCurrentObjectToForm();
                    fuelCostView.action = 'update';
                    fuelCostView.show();

                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {

                        data[i].fullnumber = data[i]['vehicles_code'] + '-' + data[i]['vehicles_vehicleNumber'];

                    }
                    fuelCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,

                        columns: [
                            {data: 'fullnumber'},
                            {data: 'daytime'},
                            {data: 'costprice_name'},
                            {data: 'literNumber'},
                            {data: 'prices_price'},
                            {data: 'cost'},
                            {data: 'costprice_name'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="fuelCostView.editFuelCost(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="fuelCostView.msgDelete(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ]
                    })
                },
                formValidate: function () {
                    $("#fromFuelCost").validate({
                        rules: {},
                        messages: {}
                    });
                },


                save: function () {
//                    fuelCostView.formValidate();
//                    if ($("#frmControl").valid()) {
                    fuelCostView.fillFormDataToCurrentObject();
                    var sendToServer = {
                        _token: _token,
                        _action: fuelCostView.action,
                        _object: fuelCostView.current
                    };

                    if (fuelCostView.action == 'delete') {
                        sendToServer._id = fuelCostView.idDelete;
                    }
                    $.ajax({
                        url: url + 'fuel-cost/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            switch (fuelCostView.action) {
                                case 'add':
                                    fuelCostView.tableVehicle.push(data['tableCost'][0]);
                                    fuelCostView.showNotification("success", "Thêm thành công!");
                                    break;
                                case 'update':
                                    var vehicleOld = _.find(fuelCostView.tableCost, function (o) {
                                        return o.id == sendToServer._object.id;
                                    });
                                    var indexOfVehicleOld = _.indexOf(fuelCostView.tableCost, vehicleOld);
                                    fuelCostView.tableCost.splice(indexOfVehicleOld, 1, data['tableCost'][0]);
                                    fuelCostView.showNotification("success", "Cập nhật thành công!");
                                    fuelCostView.hideControl();
                                    break;
                                case 'delete':
                                    var costOld = _.find(fuelCostView.tableCost, function (o) {
                                        return o.id == sendToServer._id;
                                    });
                                    var indexOfVehicleOld = _.indexOf(fuelCostView.tableCost, costOld);
                                    fuelCostView.tableCost.splice(indexOfVehicleOld, 1);
                                    fuelCostView.showNotification("success", "Xóa thành công!");
                                    fuelCostView.displayModal("hide", "#modal-confirmDelete")
                                    break;
                                default:
                                    break;
                            }
                            fuelCostView.table.clear().rows.add(fuelCostView.tableCost).draw();
                            fuelCostView.clearInput();
                        } else {
                            fuelCostView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
//                    } else {
//                        $("form#frmControl").find("label[class=error]").css("color", "red");
//                    }
                },


            };
            fuelCostView.loadData();
        } else {
            fuelCostView.loadData();
        }

    });


</script>

