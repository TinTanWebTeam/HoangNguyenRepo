<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 30%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
    }

    @media (max-height: 500px) {
        #divControl {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }
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


<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
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
                                        <label for="vehicle_id"><b>Chọn xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" data-id="" class="form-control"
                                                       id="vehicle_id" readonly
                                                       name="vehicle_id">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle"
                                                     onclick="fuelCostView.loadListVehicles()">
                                                    <i class="glyphicon glyphicon-search"></i>
                                                </div>
                                            </div>
                                        </div>
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
                                        <label for="literNumber"><b>Số lít</b></label>
                                        <input type="number" class="form-control"
                                               id="literNumber"
                                               name="literNumber"
                                               placeholder="Số lít">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="price"><b>Đơn giá</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control"
                                                       id="price" readonly
                                                       name="price"
                                                >
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle"
                                                     onclick="fuelCostView.displayModal('show', '#modal-addCostPrice')">
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
                                            onclick="fuelCostView.save()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="fuelCostView.cancel()">Huỷ
                                    </button>
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


<!-- Modal list searchVehicle -->
<div class="row">
    <div id="modal-searchVehicle" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
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
                        <table class="table table-hover" id="table-vehicles">
                            <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Mã vùng</th>
                                <th>Số xe</th>
                                <th>Trọng tải</th>
                                <th>Kích thước</th>
                                <th>Loại xe</th>
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

<!-- Modal add CostPrice -->
<div class="row">
    <div id="modal-addCostPrice" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm giá nhiên liệu</h4>
                </div>
                <div class="modal-body">
                    <form id="fromCostPrice">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="costPrice"><b>Giá tiền</b></label>
                                    <input type="number" class="form-control"
                                           id="costPrice"
                                           name="costPrice">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="description"><b>Mô tả</b></label>
                                    <textarea name="description" id="description" cols="10" rows="3"
                                              class="form-control">
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="fuelCostView.savePriceType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="fuelCostView.displayModal('hide','#modal-addCostPrice')">Huỷ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal add CostPrice -->


<script>
    $(function () {
        $('#datetimepicker').datetimepicker();
        if (typeof (fuelCostView) === 'undefined') {
            fuelCostView = {
                table: null,
                data: null,
                action: null,
                tablePrice: null,
                tableCost: null,
                tableCostPrice: null,
                tableVehicle: null,
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
                    fuelCostView.clearInput();
                    fuelCostView.clearValidation();
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

                            fuelCostView.tablePrice = data['tablePrice'];
                            fuelCostView.inputPrice(data['tablePrice']);

//                            fuelCostView.tableCostPrice = data['tableCostPrice'];
//                            fuelCostView.loadSelectBoxPrice(data['tableCostPrice']);


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
                    $("input[id='vehicle_id']").val(vehicle);
                    $("#vehicle_id").attr('data-id', fuelCostView.current["vehicle_id"]);
                    $("input[id='datetime']").val(fuelCostView.current["dateRefuel"]);
                    $("input[id='literNumber']").val(fuelCostView.current["literNumber"]);
                    $("input[id='price']").val(fuelCostView.current["prices_price"]);
                    $("input[id='totalprice']").val(totalPrice);
                    $("input[id='noted']").val(fuelCostView.current["costprice_name"]);

                },
                fillFormDataToCurrentObject: function () {
                    if (fuelCostView.action == 'add') {
                        fuelCostView.current = {
                            vehicle_id: $("#vehicle_id").attr('data-id'),
                            datetime: $("input[id='datetime']").val(),
                            totalprice: $("input[id='totalprice']").val(),
                            literNumber: $("input[id='literNumber']").val(),
                            prices_price: $("input[id='price']").val(),
                            note: $("input[id='noted']").val()
                        };
                    } else if (fuelCostView.action == 'update') {
                        fuelCostView.current.prices_price = $("input[id='price']").val();
                        fuelCostView.current.literNumber = $("input[id='literNumber']").val();
                        fuelCostView.current.totalCost = $("input[id='totalprice']").val();
                        fuelCostView.current.datetime = $("input[id='datetime']").val();
                        fuelCostView.current.noted = $("input[id='noted']").val();
                        fuelCostView.current.vehicle_id = $("#vehicle_id").attr('data-id');
                    }
                },
                clearValidation: function () {
                    $('label[class=error]').hide();

                },
                clearInput: function () {
                    $("input[id='vehicle_id']").val('');
                    $("input[id='literNumber']").val('');
                    $("input[id='totalprice']").val('');
                    $("input[id='noted']").val('');
                    $("input[id='datetime']").val('');
                    $("input[id='price']").val('');
                    $("input[id='costPrice']").val('');
//                    fuelCostView.current = null;
                },
                inputPrice: function () {
                    $("input[id='price']").val(fuelCostView.tablePrice['price']);
                },
                addNewFuelCost: function () {
                    fuelCostView.current = null;
                    fuelCostView.action = 'add';
                    fuelCostView.inputPrice();
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
                            {data: 'fullNumber'},
                            {
                                data: 'dateRefuel',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY HH:mm:ss");
                                }
                            },
                            {data: 'costPrice_name'},
                            {data: 'literNumber'},
                            {data: 'prices_price'},
                            {data: 'totalCost'},
                            {data: 'noteCost'},
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
                ValidateCost: function () {
                    $("#fromFuelCost").validate({
                        rules: {
                            vehicle_id: "required",
                            literNumber: "required"
                        },
                        messages: {
                            vehicle_id: "Vui lòng chọn xe",
                            literNumber: "Vui lòng nhập số lít"
                        }
                    });
                },
                ValidateCostPrice: function () {
                    $("#fromCostPrice").validate({
                        rules: {
                            costPrice: "required",
                        },
                        messages: {
                            costPrice: "Vui lòng nhập số tiền",
                        }
                    });

                },
                save: function () {
                    fuelCostView.ValidateCost();
                    fuelCostView.fillFormDataToCurrentObject();
                    if ($("#fromFuelCost").valid()) {
                        var sendToServer = {
                            _token: _token,
                            _action: fuelCostView.action,
                            _object: fuelCostView.current
                        };
                        if (fuelCostView.action != 'delete') {
                            if ($("#vehicle_id").attr('data-id') == '') {
                                fuelCostView.showNotification('warning', 'Vui lòng chọn xe có trong danh sách.');
                                return;
                            }
                        } else {
                            sendToServer._object = {
                                id: fuelCostView.idDelete,
                                vehicle_id: "delete",
                                literNumber: "0"
                            };
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
                                        data['tableCost'][0].fullnumber = data['tableCost'][0]['vehicles_code'] + "-" + data['tableCost'][0]["vehicles_vehicleNumber"];
                                        fuelCostView.tableCost.push(data['tableCost'][0]);
                                        fuelCostView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        data['tableCost'][0].fullnumber = data['tableCost'][0]['vehicles_code'] + "-" + data['tableCost'][0]["vehicles_vehicleNumber"];
                                        var CostOld = _.find(fuelCostView.tableCost, function (o) {
                                            return o.id == sendToServer._object.id;
                                        });
                                        var indexOfVehicleOld = _.indexOf(fuelCostView.tableCost, CostOld);
                                        fuelCostView.tableCost.splice(indexOfVehicleOld, 1, data['tableCost'][0]);
                                        fuelCostView.showNotification("success", "Cập nhật thành công!");
                                        fuelCostView.hide();
                                        break;
                                    case 'delete':
                                        var costOld = _.find(fuelCostView.tableCost, function (o) {
                                            return o.id == sendToServer._object.id;
                                        });
                                        var indexOfcostOld = _.indexOf(fuelCostView.tableCost, costOld);
                                        fuelCostView.tableCost.splice(indexOfcostOld, 1);
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
                    } else {
                        $("form#fromFuelCost").find("label[class=error]").css("color", "red");
                    }
                },
                loadListVehicles: function () {
                    $.ajax({
                        url: url + 'fuel-cost/fuelcost',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (fuelCostView.tableVehicle != null) {
                                fuelCostView.tableVehicle.destroy();
                            }
                            fuelCostView.tableVehicle = $('#table-vehicles').DataTable({
                                language: languageOptions,
                                data: data['tableVehicle'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'areaCode'},
                                    {data: 'vehicleNumber'},
                                    {data: 'size'},
                                    {data: 'weight'},
                                    {data: 'vehicletype'}

                                ]
                            })
                        } else {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    fuelCostView.displayModal("show", "#modal-searchVehicle")
                },


                savePriceType: function () {
                    fuelCostView.ValidateCostPrice();

                        var priceType = {
                            price: $("input[id='costPrice']").val(),
                            note: $("textarea[id='description']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add1',
                            _PriceType: priceType
                        };
                    if ($("#fromCostPrice").valid()) {
                        $.ajax({
                            url: url + 'fuel-price-type/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                fuelCostView.showNotification("success", "Thêm thành công!");
                                fuelCostView.displayModal("hide", "#modal-addCostPrice");
                                fuelCostView.clearInput();
                                $("input[id='price']").val(data["prices"]["price"]);

                            } else {
                                fuelCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#fromCostPrice").find("label[class=error]").css("color", "red");
                    }
                }


            };
            fuelCostView.loadData();
        } else {
            fuelCostView.loadData();
        }
        $("#table-vehicles").find("tbody").on('click', 'tr', function () {
            var vehicle = $(this).find('td:eq(1)')[0].innerText + '-' + $(this).find('td:eq(2)')[0].innerText;
            $('#vehicle_id').attr('data-id', $(this).find('td:first')[0].innerText);
            $('#vehicle_id').val(vehicle);
            fuelCostView.displayModal("hide", "#modal-searchVehicle");
        });

    });


</script>

