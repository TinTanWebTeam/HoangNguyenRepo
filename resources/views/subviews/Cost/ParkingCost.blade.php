<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0px;
        width: 50%;
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
                        onclick="parkingCostView.cancelDelete()">Hủy
                </button>
                <button type="button" class="btn green" name="modalAgree"
                        onclick="parkingCostView.deleteParkingCost()">Ðồng ý
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
                        <li class="active">Đậu Bãi</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="parkingCostView.addParkingCost()">
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
                            <th>Ngày vào</th>
                            <th>Ngày ra</th>
                            <th>Số ngày đậu</th>
                            <th>Số giờ đậu</th>
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
            <div class="panel-heading">Thêm mới chi phí đậu bãi
                <div class="menu-toggles pull-right" onclick="parkingCostView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" id="formParkingCost">
                    <div class="form-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicle_id"><b>Chọn xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" data-id=""
                                                       ondblclick="parkingCostView.loadListVehicles()"
                                                       class="form-control"
                                                       id="vehicle_id" readonly
                                                       name="vehicle_id"
                                                       placeholder="click 2 lần để chọn xe">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle"
                                                     onclick="parkingCostView.createVehicle()">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="price"><b>Đơn giá</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control"
                                                       id="price" readonly
                                                       name="price" data-priceId=""
                                                >
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle"
                                                     onclick="parkingCostView.displayModal('show', '#modal-addCostPrice')">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepickerIn'>
                                            <label for="datetimeCheckIn"><b>Ngày đậu xe</b></label>
                                            <input type='text' id="datetimeCheckIn" name="datetimeCheckIn"
                                                   value="{{date('d-m-Y H-i')}}" class="form-control"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepickerOut'>
                                            <label for="datetimeCheckOut"><b>Ngày lấy xe</b></label>
                                            <input type='text' id="datetimeCheckOut" name="datetimeCheckOut"
                                                   value="{{date('d-m-Y H-i')}}" class="form-control"
                                                   onload="parkingCostView.loadDatetime()"
                                            />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="totalDay"><b>Số ngày đậu</b></label>
                                        <input type="text" class="form-control"
                                               id="totalDay" readonly
                                               name="totalDay">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="totalHour"><b>Số giờ đậu</b></label>
                                        <input type="text" class="form-control"
                                               id="totalHour" readonly
                                               name="totalHour">
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="TotalPrice"><b>Tổng chi phí</b></label>
                                        <input type="text" class="form-control"
                                               id="TotalPrice" readonly
                                               name="TotalPrice"
                                               placeholder="00.00">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="note"><b>Ghi chú</b></label>
                                        <textarea type="text" class="form-control"
                                                  id="note"
                                                  name="note"
                                                  placeholder="Ghi chú"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary"
                                            onclick="parkingCostView.save()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="parkingCostView.cancel()">Huỷ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end #frmControl -->
</div>


<!-- Modal add CostPrice -->
<div class="row">
    <div id="modal-addCostPrice" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Chi phí đậu bãi</h4>
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
                                                onclick="parkingCostView.savePriceType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="parkingCostView.displayModal('hide','#modal-addCostPrice')">Huỷ
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
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm Xe</h4>
                </div>
                <div class="modal-body">
                    <form id="fromVehicle">
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
                                                onclick="parkingCostView.addVehicles()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="parkingCostView.displayModal('hide','#modal-addVehicle')">Huỷ
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
<!-- end Modal add Vehicle -->

<script>
    $(function () {

        if (typeof (parkingCostView) === 'undefined') {
            parkingCostView = {
                table: null,
                data: null,
                action: null,
                tableVehicle: null,
                tableParkingCost: null,
                tablePrice: null,
                tableGarage: null,
                tableVehicleType: null,
                tableVehicleNew: null,
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
                    parkingCostView.clearInput();
                    parkingCostView.clearValidation();
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (parkingCostView.action == 'delete' && type == 'hide') {
                        parkingCostView.action = null;
                        parkingCostView.idDelete = null;
                    }

                },
                cancelDelete: function () {
                    parkingCostView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                formatMoney: function (nStr, decSeperate, groupSeperate) {
                    nStr += '';
                    x = nStr.split(decSeperate);
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
                    }
                    return x1 + x2;
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
                    if (parkingCostView.action == 'add') {
                        parkingCostView.clearInput();
                    } else {
                        parkingCostView.fillCurrentObjectToForm();
                    }
                },
                msgDelete: function (id) {
                    if (id) {
                        parkingCostView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("div#modalContent").empty().append("Bạn có muốn xóa ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                addParkingCost: function () {
                    parkingCostView.current = null;
                    parkingCostView.action = 'add';
                    parkingCostView.inputPrice();
                    parkingCostView.show();

                },
                editParkingCost: function (id) {
                    parkingCostView.current = null;
                    parkingCostView.current = _.clone(_.find(parkingCostView.tableParkingCost, function (o) {
                        return o.id == id;
                    }), true);
                    parkingCostView.fillCurrentObjectToForm();
                    parkingCostView.action = 'update';
                    parkingCostView.show();

                },
                deleteParkingCost: function () {
                    parkingCostView.action = 'delete';
                    parkingCostView.save();
                    $("#modalConfirm").modal('hide');
                },
                clearInput: function () {

                    /* form addCost*/
                    $("input[id='vehicle_id']").val('');
                    $("#vehicle_id").attr('data-id', '');
                    $("input[id='literNumber']").val('');
                    $("input[id='noted']").val('');
                    $("input[id='totalprice']").val('');
                },
                clearInputPrice: function () {
                    /* Form addPrice*/
                    $("input[id='costPrice']").val('');
                    $("input[id='totalprice']").val('');
                },
                clearInputVehicle: function () {
                    /* Form addVehicle*/
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='areaCode']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'parking-cost/parkingCost',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            parkingCostView.tableParkingCost = data['tableParkingCost'];
                            parkingCostView.fillDataToDatatable(data['tableParkingCost']);
                            parkingCostView.tablePrice = data['tablePrice'];
                            parkingCostView.inputPrice(data['tablePrice']);

                        } else {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    $('#datetimepickerIn').datetimepicker();
                    $('#datetimepickerOut').datetimepicker();
                    jQuery.validator.addMethod("greaterThan",
                            function (value, element, params) {
                                if (!/Invalid|NaN/.test(new Date(value))) {
                                    return new Date(value) > new Date($(params).val());
                                }
                                return isNaN(value) && isNaN($(params).val())
                                        || (Number(value) > Number($(params).val()));
                            }, 'Ngày lấy xe phải hơn ngày đậu xe.');
                    $("#table-vehicles").find("tbody").on('click', 'tr', function () {
                        var vehicle = $(this).find('td:eq(1)')[0].innerText + '-' + $(this).find('td:eq(2)')[0].innerText;
                        $('#vehicle_id').attr('data-id', $(this).find('td:first')[0].innerText);
                        $('#vehicle_id').val(vehicle);
                        parkingCostView.displayModal("hide", "#modal-searchVehicle");
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
                fillFormDataToCurrentObject: function () {
                    if (parkingCostView.action == 'add') {
                        parkingCostView.current = {
                            vehicle_id: $("#vehicle_id").attr('data-id'),
                            datetimeCheckIn: $("input[id='datetimeCheckIn']").val(),
                            datetimeCheckOut: $("input[id='datetimeCheckOut']").val(),
                            totalPrice: $("input[id='totalprice']").val(),
                            prices_price: $("input[id='price']").val(),
                            prices_id: $("#price").attr('data-priceId'),
                            note: $("textarea[id='note']").val()
                        };
                    } else if (parkingCostView.action == 'update') {
                        parkingCostView.current.prices_price = $("input[id='price']").val();
                        parkingCostView.current.prices_id = $("#price").attr('data-priceId');
                        parkingCostView.current.literNumber = $("input[id='literNumber']").val();
                        parkingCostView.current.totalCost = $("input[id='totalprice']").val();
                        parkingCostView.current.datetimeCheckIn = $("input[id='datetimeCheckIn']").val();
                        parkingCostView.current.datetimeCheckOut = $("input[id='datetimeCheckOut']").val();
                        parkingCostView.current.note = $("textarea[id='note']").val();
                        parkingCostView.current.vehicle_id = $("#vehicle_id").attr('data-id');
                    }
                },

                fillCurrentObjectToForm: function () {
                    var dayIn = parkingCostView.current["dateCheckIn"].substr(8, 2);
                    var monthIn = parkingCostView.current["dateCheckIn"].substr(5, 2);
                    var yearIn = parkingCostView.current["dateCheckIn"].substr(0, 4);
                    var hourMinusIn = parkingCostView.current["dateCheckIn"].substr(11, 5);
                    var dayOut = parkingCostView.current["dateCheckOut"].substr(8, 2);
                    var monthOut = parkingCostView.current["dateCheckOut"].substr(5, 2);
                    var yearOut = parkingCostView.current["dateCheckOut"].substr(0, 4);
                    var hourMinusOut = parkingCostView.current["dateCheckOut"].substr(11, 5);
                    var vehicle = parkingCostView.current["vehicles_code"] + "-" + parkingCostView.current["vehicles_vehicleNumber"];
                    var totalPrice = parkingCostView.current["literNumber"] * parkingCostView.current["prices_price"];

                    $("input[id='datetimeCheckIn']").val(dayIn + "/" + monthIn + "/" + yearIn + " " + hourMinusIn);
                    $("input[id='datetimeCheckOut']").val(dayOut + "/" + monthOut + "/" + yearOut + " " + hourMinusOut);
                    $("input[id='vehicle_id']").val(vehicle);
                    $("#vehicle_id").attr('data-id', parkingCostView.current["vehicle_id"]);
                    $("input[id='literNumber']").val(parkingCostView.current["literNumber"]);
                    $("input[id='totalprice']").val(totalPrice);
                    $("textarea[id='note']").val(parkingCostView.current["note"]);
                    $("input[id='price']").val(parkingCostView.formatMoney(parkingCostView.current["prices_price"], '.', '.'));
                    $("#price").attr('data-priceId', parkingCostView.current["price_id"]);

                },
                save: function () {
                    parkingCostView.ValidateParking();
                    parkingCostView.fillFormDataToCurrentObject();
                    if ($("#formParkingCost").valid()) {
                        var sendToServer = {
                            _token: _token,
                            _action: parkingCostView.action,
                            _object: parkingCostView.current
                        };

                        if (parkingCostView.action != 'delete') {
                            if ($("#vehicle_id").attr('data-id') == '') {
                                parkingCostView.showNotification('warning', 'Vui lòng chọn xe có trong danh sách.');
                                return;
                            }
                        } else {
                            sendToServer._object = {
                                id: parkingCostView.idDelete,
                                vehicle_id: "delete",

                            };
                        }

                        $.ajax({
                            url: url + 'parking-cost/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {

                                switch (parkingCostView.action) {

                                    case 'add':
                                        data['tableParkingNew'][0].totalDay = data['tableParkingNew'][0]['totalMinus'];
                                        data['tableParkingNew'][0].totalHour = data['tableParkingNew'][0]['totalMinus'];

                                        data['tableParkingNew'][0].fullNumber = data['tableParkingNew'][0]['vehicles_code'] + "-" + data['tableParkingNew'][0]["vehicles_vehicleNumber"];
                                        parkingCostView.tableParkingCost.push(data['tableParkingNew'][0]);
                                        parkingCostView.showNotification("success", "Thêm thành công!");
                                        $("#price").attr('data-priceId', parkingCostView.current["prices_id"]);
                                        break;
                                    case 'update':
                                        if (data['tableParkingUpdate'][0]['totalMinus'] >= 60) {
                                            data['tableParkingUpdate'][0].totalHour = data['tableParkingUpdate'][0]['totalMinus'] / 60;
                                        } else {
                                            data['tableParkingUpdate'][0].totalHour = data['tableParkingUpdate'][0]['totalMinus']
                                        }
                                        var a = data['tableParkingUpdate'][0].totalHour.toString().substr(2, 3);
                                        var b = data['tableParkingUpdate'][0].totalHour.toString().substr(0, 1);
                                        var c = (a * 0.1) * 60;
                                        data['tableParkingUpdate'][0].totalHour = b + ':' + c;

                                        if (data['tableParkingUpdate'][0]['totalMinus'] >= 1440) {
                                            data['tableParkingUpdate'][0].totalDay = data['tableParkingUpdate'][0]['totalMinus'] / 60 / 24;
                                        } else {
                                            data['tableParkingUpdate'][0].totalDay = 0;
                                        }

                                        data['tableParkingUpdate'][0].fullNumber = data['tableParkingUpdate'][0]['vehicles_code'] + "-" + data['tableParkingUpdate'][0]["vehicles_vehicleNumber"];
                                        var parkingOld = _.find(parkingCostView.tableParkingCost, function (o) {
                                            return o.id == sendToServer._object.id;
                                        });
                                        var indexOfParkingOld = _.indexOf(parkingCostView.tableParkingCost, parkingOld);
                                        parkingCostView.tableParkingCost.splice(indexOfParkingOld, 1, data['tableParkingUpdate'][0]);
                                        parkingCostView.showNotification("success", "Cập nhật thành công!");
                                        parkingCostView.hide();
                                        break;
                                    case 'delete':
                                        var parkingOld = _.find(parkingCostView.tableParkingCost, function (o) {
                                            return o.id == sendToServer._object.id;
                                        });
                                        var indexOfParkingOld = _.indexOf(parkingCostView.tableParkingCost, parkingOld);
                                        parkingCostView.tableParkingCost.splice(indexOfParkingOld, 1);
                                        parkingCostView.showNotification("success", "Xóa thành công!");
                                        parkingCostView.displayModal("hide", "#modal-confirmDelete")
                                        break;
                                    default:
                                        break;
                                }
                                parkingCostView.table.clear().rows.add(parkingCostView.tableParkingCost).draw();
                                parkingCostView.clearInput();
                            } else {
                                parkingCostView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#formParkingCost").find("label[class=error]").css("color", "red");
                    }
                },
                splitString: function (stringToSplit, separator) {
                    var arrayOfStrings = stringToSplit.split(separator);

                    console.log('The original string is: "' + stringToSplit + '"');
                    console.log('The separator is: "' + separator + '"');
                    console.log('The array has ' + arrayOfStrings.length + ' elements: ' + arrayOfStrings.join(' / '));
                },
                fillDataToDatatable: function (data) {

                    for (var i = 0; i < data.length; i++) {

                        data[i].fullNumber = data[i]['vehicles_code'] + '-' + data[i]['vehicles_vehicleNumber'];
                        data[i].totalMinute = data[i]['totalMinus'] / 60;
                        var b = String(data[i].totalMinute).split('.');
                        var b1 = b[1] * 60;
                        var b2 = b[0] / 24;

                        var bb = String(b2).split('.');
                        var bb1 = bb[1];
                        var bb2 = bb[0];
                        var bb10 = bb1 * 0.24;
                        var b10 = String(b1).substr(0,3)
                        var b11 = Math.round(b10/10);
                        data[i].totalDay = bb2;
                        data[i].totalHour = bb10 + ":" + b11;

                    }


                    parkingCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [

                            {data: 'fullNumber'},
                            {
                                data: 'dateCheckIn',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY HH:mm:ss");
                                }
                            },
                            {
                                data: 'dateCheckOut',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY HH:mm:ss");
                                }
                            },
                            {data: 'totalDay'},
                            {data: 'totalHour'},


                            {
                                data: 'prices_price',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'totalCost',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="parkingCostView.editParkingCost(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="parkingCostView.msgDelete(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }

                            }
                        ],
                        order: [[1, "desc"]],
                    })
                },
                createVehicle: function () {
                    parkingCostView.displayModal('show', '#modal-addVehicle');
                    $.ajax({
                        url: url + 'get-list-option/Garage-Vehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            parkingCostView.tableGarage = data['tableGarage'];
                            parkingCostView.loadSelectBoxGarage(data['tableGarage']);
                            parkingCostView.tableVehicleType = data['tableVehicleType'];
                            parkingCostView.loadSelectBoxVehicleType(data['tableVehicleType']);
                            parkingCostView.tableVehicleNew = data['tableVehicleNew'];

                        } else {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                }
                ,
                ValidateVehicle: function () {
                    $("#fromVehicle").validate({
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

                }
                ,
                inputVehicle: function () {
                    var numberVehicle = parkingCostView.tableVehicleNew.areaCode + '-' + parkingCostView.tableVehicleNew.vehicleNumber
                    $("input[id='vehicle_id']").val(numberVehicle);
                    $("#vehicle_id").attr('data-id', parkingCostView.tableVehicleNew.id);

                }
                ,
                addVehicles: function () {
                    parkingCostView.ValidateVehicle();
                    var vehicle = {
                        vehicleNumber: $("input[id='vehicleNumber']").val(),
                        areaCode: $("input[id='areaCode']").val(),
                        size: $("input[id='size']").val(),
                        weight: $("input[id='weight']").val(),
                        vehicleType_id: $("select[id='vehicleType_id']").val(),
                        garage_id: $("select[id='garage_id']").val(),
                    };
                    var sendToServer = {
                        _token: _token,
                        _action: 'addVehicles',
                        _vehicles: vehicle
                    };
                    if ($("#fromVehicle").valid()) {
                        $.ajax({
                            url: url + 'create-vehicle-new/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                if (jqXHR.status == 201) {
                                    parkingCostView.showNotification("success", "Thêm thành công!");
                                    parkingCostView.displayModal("hide", "#modal-addVehicle");
                                    parkingCostView.tableVehicleNew = data['vehicleNew'];
                                    parkingCostView.inputVehicle();
                                } else {
                                    parkingCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }
                                parkingCostView.table.clear().rows.add(parkingCostView.tableParkingCost).draw();
                            } else {
                                parkingCostView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#fromVehicle").find("label[class=error]").css("color", "red");
                    }

                }
                ,
                loadListVehicles: function () {
                    $.ajax({
                        url: url + 'get-list-vehicle/getVehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (parkingCostView.tableVehicle != null) {
                                parkingCostView.tableVehicle.destroy();
                            }
                            parkingCostView.tableVehicle = $('#table-vehicles').DataTable({
                                language: languageOptions,
                                data: data['tableVehicle'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'areaCode'},
                                    {data: 'vehicleNumber'},
                                    {data: 'size'},
                                    {data: 'weight'},
                                    {data: 'vehicleType'}
                                ],
                                order: [[0, "desc"]],
                            })
                        } else {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    parkingCostView.displayModal("show", "#modal-searchVehicle")
                }
                ,
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
                }
                ,
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
                ,
                ValidateParking: function () {
                    $("#formParkingCost").validate({
                        rules: {
                            vehicle_id: "required",
                            datetimeCheckOut: {greaterThan: "#datetimeCheckIn"}

                        },
                        messages: {
                            vehicle_id: "Vui lòng chọn xe"

                        }
                    });
                }
                ,
                inputPrice: function () {

                    $("input[id='price']").val(parkingCostView.formatMoney(parkingCostView.tablePrice.price, '.', '.'));
                    $("#price").attr('data-priceId', parkingCostView.tablePrice.id);
                }
                ,
                ValidateCostPrice: function () {
                    $("#fromCostPrice").validate({
                        rules: {
                            costPrice: {
                                required: true,
                                number: true
                            }
                        },
                        messages: {
                            costPrice: {
                                required: "Vui lòng nhập số tiền",
                                number: "Giá tiền phải là số"
                            }
                        }
                    });

                }
                ,

                savePriceType: function () {
                    parkingCostView.ValidateCostPrice();
                    var priceType = {
                        price: $("input[id='costPrice']").val(),
                        note: $("textarea[id='description']").val()
                    };
                    var sendToServer = {
                        _token: _token,
                        _action: 'addParkingCost',
                        _priceType: priceType
                    };
                    if ($("#fromCostPrice").valid()) {
                        $.ajax({
                            url: url + 'create-price-new/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                parkingCostView.showNotification("success", "Thêm thành công!");
                                parkingCostView.displayModal("hide", "#modal-addCostPrice");
                                parkingCostView.tablePrice = data['prices'];
                                parkingCostView.inputPrice();
                                $("input[id='literNumber']").val('');
                                $("input[id='totalprice']").val('');

                            } else {
                                parkingCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#fromCostPrice").find("label[class=error]").css("color", "red");
                    }
                }
                ,
                loadDatetime: function () {
                    alert('a');
                }
            }
            ;
            parkingCostView.loadData();
        }
        else {
            parkingCostView.loadData();
        }

    })
    ;
</script>
