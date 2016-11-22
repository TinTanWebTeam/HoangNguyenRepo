<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 35%;
        display: none;
        right: 0;
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

    #divControl .panel-body {
        height: 344px;
    }
</style>

<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="otherCostView.deleteOtherCost()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="otherCostView.cancelDelete()">Hủy
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
                        <li class="active">Khác</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="otherCostView.addNewOtherCost()">
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
                            <th style="display: none;">Ngày tạo</th>
                            <th>Số xe</th>
                            <th>Chi phí</th>
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
            <div class="panel-heading">
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" onclick="otherCostView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="formOtherCost">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicle_id"><b>Chọn xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" data-id=""
                                                       class="form-control"
                                                       id="vehicle_id"
                                                       name="vehicle_id">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm xe mới"
                                                     onclick="otherCostView.loadListGarageAndVehicleType()">
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
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input">
                                        <label for="cost"><b>Đơn giá</b></label>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <input type="text" class="form-control currency" value="0"
                                                       id="cost"
                                                       name="cost" data-priceId=""
                                                >
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input">
                                        <label for="note"><b>Ghi chú</b></label>
                                        <textarea type="text" class="form-control"
                                                  id="note"
                                                  name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary"
                                            onclick="otherCostView.save()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="otherCostView.cancel()">Huỷ
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
                    <h5 class="modal-title">Danh sách xe</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table style="width: 100%" class="table table-hover" id="table-vehicles">
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


<!-- Modal add Vehicle -->
<div class="row">
    <div id="modal-addVehicle" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="otherCostView.cancelVehicle()">×</span>
                    </button>
                    <h5 class="modal-title">Thêm xe mới</h5>
                </div>
                <div class="modal-body">
                    <form id="formVehicle">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="areaCode"><b>Mã vùng</b></label>
                                    <input type="text" class="form-control"
                                           id="areaCode"
                                           name="areaCode">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleNumber"><b>Số xe</b></label>
                                    <input type="number" class="form-control"
                                           id="vehicleNumber"
                                           name="vehicleNumber">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="size"><b>Kích thước</b></label>
                                    <input type="number" class="form-control"
                                           id="size"
                                           name="size">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="weight"><b>Trọng tải</b></label>
                                    <input type="number" class="form-control"
                                           id="weight"
                                           name="weight">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="garage_id"><b>Nhà xe</b></label>

                                    <select class="form-control" id="garage_id"
                                            name="garage_id">
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleType_id"><b>Loại Xe</b></label>
                                    <select class="form-control" id="vehicleType_id"
                                            name="vehicleType_id">
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="otherCostView.addVehicles()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="otherCostView.cancelVehicle()">Nhập lại
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
<!-- end Modal add vehicle -->


<script>
    $(function () {
        if (typeof (otherCostView) === 'undefined') {
            otherCostView = {
                table: null,
                data: null,
                action: null,
                tableOtherCost: null,
                tableVehicle: null,
                tableGarage: null,
                tableVehicleType: null,
                tableVehicleNew: null,
                idDelete: null,
                current: null,
                tagsVehicle: [],
                show: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);

                },
                hide: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    otherCostView.clearInput();
                    otherCostView.clearValidation();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (otherCostView.action == 'delete' && type == 'hide') {
                        otherCostView.action = null;
                        otherCostView.idDelete = null;
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
                cancel: function () {
                    if (otherCostView.action == 'add') {
                        otherCostView.clearInput();
                    } else {
                        otherCostView.fillCurrentObjectToForm();
                    }
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                msgDelete: function (id) {
                    if (id) {
                        otherCostView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Bạn có muốn xóa chi phí này ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                cancelDelete: function () {
                    otherCostView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                deleteOtherCost: function () {
                    otherCostView.action = 'delete';
                    otherCostView.save();
                    $("#modalConfirm").modal('hide');
                },
                fillFormDataToCurrentObject: function () {
                    if (otherCostView.action == 'add') {
                        otherCostView.current = {
                            vehicle_id: $("#vehicle_id").attr('data-id'),
                            cost: $("input[id='cost']").val(),
                            note: $("textarea[id='note']").val()
                        };
                    } else if (otherCostView.action == 'update') {

                        otherCostView.current.cost = $("input[id='cost']").val();
                        otherCostView.current.note = $("textarea[id='note']").val();
                        otherCostView.current.vehicle_id = $("#vehicle_id").attr('data-id');
                    }
                },
                fillCurrentObjectToForm: function () {
                    var vehicle = otherCostView.current["vehicles_code"] + "-" + otherCostView.current["vehicles_vehicleNumber"];
                    $("input[id='vehicle_id']").val(vehicle);
                    $("#vehicle_id").attr('data-id', otherCostView.current["vehicle_id"]);
                    $("textarea[id='note']").val(otherCostView.current["note"]);
                    $("input[id='cost']").val(otherCostView.current["cost"])

                },
                editOtherCost: function (id) {
                    $("#divControl").find(".titleControl").html("Cập nhật chi phí khác");
                    otherCostView.current = null;
                    otherCostView.current = _.clone(_.find(otherCostView.tableOtherCost, function (o) {
                        return o.id == id;
                    }), true);
                    otherCostView.fillCurrentObjectToForm();
                    otherCostView.action = 'update';
                    otherCostView.show();

                },
                addNewOtherCost: function () {
                    $("#divControl").find(".titleControl").html("Thêm mới chi phí khác");
                    otherCostView.current = null;
                    otherCostView.action = 'add';
                    otherCostView.show();
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'other-cost/otherCost',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            otherCostView.tableOtherCost = data['tableOtherCost'];
                            otherCostView.fillDataToDatatable(data['tableOtherCost']);
                            otherCostView.tableVehicle = data['dataVehicle'];
                            otherCostView.renderAutoCompleteSearch();
                        } else {
                            otherCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        otherCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    defaultZero("#cost");

                },
                renderAutoCompleteSearch: function () {
                    otherCostView.tagsVehicle = _.map(otherCostView.tableVehicle, function (o) {
                        return o.areaCode + '-' + o.vehicleNumber;
                    });
                    otherCostView.tagsVehicle = _.union(otherCostView.tagsVehicle);

                    renderAutoCompleteSearch('#vehicle_id', otherCostView.tagsVehicle, $("#vehicle_id").focusout(function () {
                        var vehicleName = this.value;
                        if (vehicleName == '') return;
                        var vehicle = _.find(otherCostView.tableVehicle, function (o) {
                            return o.areaCode + '-' + o.vehicleNumber == vehicleName;
                        });
                        if (typeof vehicle === "undefined") {
                            otherCostView.loadListGarageAndVehicleType();
                            otherCostView.displayModal("show", "#modal-addVehicle");
                            $("input[id=areaCode]").focus();
                        } else {
                            $("#vehicle_id").attr("data-id", vehicle.id);
                        }
                    }));

                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_code'] + '-' + data[i]['vehicles_vehicleNumber'];
                    }
                    otherCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'created_at', visible: false},
                            {data: 'fullNumber'},
                            {
                                data: 'cost',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="otherCostView.editOtherCost(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="otherCostView.msgDelete(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        order: [[0, "desc"]],

                    });
                    $("#table-vehicles").find("tbody").on('click', 'tr', function () {
                        var vehicle = $(this).find('td:eq(1)')[0].innerText + '-' + $(this).find('td:eq(2)')[0].innerText;
                        $('#vehicle_id').attr('data-id', $(this).find('td:first')[0].innerText);
                        $('#vehicle_id').val(vehicle);
                        otherCostView.displayModal("hide", "#modal-searchVehicle");
                    });
                },
                clearInput: function () {
                    /* form addOtherCost*/
                    $("input[id='vehicle_id']").val('');
                    $("#vehicle_id").attr('data-id', '');
                    $("textarea[id='note']").val('');
                    $("input[id='cost']").val('');
                },
                cancelVehicle: function () {
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='areaCode']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                    otherCostView.clearValidation();
                },
                clearInputVehicle: function () {
                    /* Form addVehicle*/
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='areaCode']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                },
                inputVehicle: function () {
                    var numberVehicle = otherCostView.tableVehicleNew.areaCode + '-' + otherCostView.tableVehicleNew.vehicleNumber
                    $("input[id='vehicle_id']").val(numberVehicle);
                    $("#vehicle_id").attr('data-id', otherCostView.tableVehicleNew.id);
                },
                ValidateOtherCost: function () {
                    $("#formOtherCost").validate({
                        rules: {
                            vehicle_id: "required",
                            cost: {
                                required: true
                            }

                        },
                        messages: {
                            vehicle_id: "Vui lòng chọn xe",
                            cost: {
                                required: "Vui lòng nhập số tiền"
                            }
                        }
                    });
                },
                save: function () {
                    var sendToServer = null;
                    if (otherCostView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: otherCostView.action,
                            _object: otherCostView.idDelete
                        };
                        $.ajax({
                            url: url + 'other-cost/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var costOld = _.find(otherCostView.tableOtherCost, function (o) {
                                    return o.id == sendToServer._object;
                                });
                                var indexOfcostOld = _.indexOf(otherCostView.tableOtherCost, costOld);
                                otherCostView.tableOtherCost.splice(indexOfcostOld, 1);
                                otherCostView.showNotification("success", "Xóa thành công!");
                                otherCostView.displayModal("hide", "#modal-confirmDelete");

                            }
                            otherCostView.table.clear().rows.add(otherCostView.tableOtherCost).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            otherCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        if ($('input[id=cost]').val() == 0) {
                            showNotification("error", "Đơn giá phải lớn hơn 0");
                        } else {
                            otherCostView.ValidateOtherCost();
                            if ($("#formOtherCost").valid()) {
                                otherCostView.fillFormDataToCurrentObject();
                                sendToServer = {
                                    _token: _token,
                                    _action: otherCostView.action,
                                    _object: otherCostView.current
                                };
                                $.ajax({
                                    url: url + 'other-cost/modify',
                                    type: "POST",
                                    dataType: "json",
                                    data: sendToServer
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        switch (otherCostView.action) {
                                            case 'add':
                                                data['tableOtherCostNew'].fullNumber = data['tableOtherCostNew']['vehicles_code'] + "-" + data['tableOtherCostNew']["vehicles_vehicleNumber"];
                                                otherCostView.tableOtherCost.push(data['tableOtherCostNew']);
                                                otherCostView.showNotification("success", "Thêm thành công!");
                                                $("#price").attr('data-priceId', otherCostView.current["prices_id"]);
                                                break;
                                            case 'update':
                                                data['tableOtherUpdate'].fullNumber = data['tableOtherUpdate']['vehicles_code'] + "-" + data['tableOtherUpdate']["vehicles_vehicleNumber"];
                                                var CostOld = _.find(otherCostView.tableOtherCost, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                var indexOfVehicleOld = _.indexOf(otherCostView.tableOtherCost, CostOld);
                                                otherCostView.tableOtherCost.splice(indexOfVehicleOld, 1, data['tableOtherUpdate']);
                                                otherCostView.showNotification("success", "Cập nhật thành công!");
                                                otherCostView.hide();
                                                break;
                                            default:
                                                break;
                                        }
                                        otherCostView.table.clear().rows.add(otherCostView.tableOtherCost).draw();                                        otherCostView.clearInput();
                                    } else {
                                        otherCostView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                    }

                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    otherCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                                });
                            } else {
                                $("form#formOtherCost").find("label[class=error]").css("color", "red");

                            }

                        }
                    }
                },
                ValidateVehicle: function () {
                    $("#formVehicle").validate({
                        rules: {
                            vehicleNumber: {
                                required: true,
                                number: true
                            },
                            areaCode: "required",
                            vehicleType_id: "required",
                            garage_id: "required",
                            size: {
                                required: true,
                                number: true
                            },
                            weight: {
                                required: true,
                                number: true
                            }
                        },
                        messages: {
                            vehicleNumber: {
                                required: "Vui lòng nhập số xe",
                                number: "Số xe phải là số"
                            },
                            areaCode: "Vui lòng nhập mã vùng",
                            vehicleType_id: "Vui lòng chọn loại xe",
                            garage_id: "Vui lòng chọn nhà xe",
                            size: {
                                required: "Vui lòng nhập kích thước",
                                number: "Kích thước phải là số"
                            },
                            weight: {
                                required: "Vui lòng nhập trọng tải",
                                number: "Trọng tải phải là số"
                            }

                        }
                    });

                },
                addVehicles: function () {
                    otherCostView.ValidateVehicle();
                    var vehicle = {
                        vehicleNumber: $("input[id='vehicleNumber']").val(),
                        areaCode: $("input[id='areaCode']").val(),
                        size: $("input[id='size']").val(),
                        weight: $("input[id='weight']").val(),
                        vehicleType_id: $("select[id='vehicleType_id']").val(),
                        garage_id: $("select[id='garage_id']").val()
                    };
                    var sendToServer = {
                        _token: _token,
                        _action: 'addVehicles',
                        _vehicles: vehicle
                    };
                    if ($("#formVehicle").valid()) {
                        $.ajax({
                            url: url + 'create-vehicle-new/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                otherCostView.showNotification("success", "Thêm thành công!");
                                otherCostView.displayModal("hide", "#modal-addVehicle");
                                otherCostView.tableVehicleNew = data['vehicleNew'];
                                otherCostView.inputVehicle();
                                otherCostView.clearInputVehicle();
                            } else {
                                otherCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            otherCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#formVehicle").find("label[class=error]").css("color", "red");
                    }

                },
                loadListGarageAndVehicleType: function () {
                    otherCostView.displayModal('show', '#modal-addVehicle');
                    $.ajax({
                        url: url + 'get-list-option/Garage-Vehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            otherCostView.tableGarage = data['tableGarage'];
                            otherCostView.loadSelectBoxGarage(data['tableGarage']);
                            otherCostView.tableVehicleType = data['tableVehicleType'];
                            otherCostView.loadSelectBoxVehicleType(data['tableVehicleType']);
                            otherCostView.tableVehicleNew = data['tableVehicleNew'];

                        } else {
                            otherCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        otherCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                },
                loadSelectBoxGarage: function (lstGarage) {
                    //reset selectbox
                    $('#garage_id')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("garage_id");
                    for (var i = 0; i < lstGarage.length; i++) {
                        var opt = lstGarage[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstGarage[i]['id'];
                        select.appendChild(el);
                    }
                },
                loadSelectBoxVehicleType: function (lstVehicleType) {
                    //reset selectbox
                    $('#vehicleType_id')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("vehicleType_id");
                    for (var i = 0; i < lstVehicleType.length; i++) {
                        var opt = lstVehicleType[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstVehicleType[i]['id'];
                        select.appendChild(el);
                    }
                }


            };
            otherCostView.loadData();
        } else {
            otherCostView.loadData();
        }
    });
</script>