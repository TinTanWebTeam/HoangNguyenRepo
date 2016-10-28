<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 25%;
        display: none;
        right: 0px;
        width: 50%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

    #divControl .panel-body {
        height: 425px;
    }
</style>


<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="parkingCostView.deleteParkingCost()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="parkingCostView.cancelDelete()">Hủy
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
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="parkingCostView.addParkingCost()">
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
            <div class="panel-heading">
                <span class="titleControl"></span>
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
                                                       placeholder="Nhấp đôi để chọn">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm xe mới"
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
                                            <div class="col-sm-9 col-xs-9">
                                                <input type="text" class="form-control currency"
                                                       id="price" readonly
                                                       name="price" data-priceId="">
                                            </div>
                                            <div class="col-sm-3 col-xs-3">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm giá mới"
                                                     onclick="parkingCostView.displayModal('show', '#modal-addCostPrice')">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="dateIn">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="dateCheckIn"><b>Ngày đậu xe</b></label>
                                        <input id="dateCheckIn" name="dateCheckIn" type="text"
                                               class="date form-control ignore"
                                               onchange="parkingCostView.totalDay();"
                                        />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="timeCheckIn"><b>Giờ đậu xe</b></label>
                                        <input id="timeCheckIn" name="timeCheckIn" type="text"
                                               class="time form-control ignore"
                                               onchange="parkingCostView.totalDay();"
                                        />
                                    </div>

                                </div>

                            </div>
                            <div class="row" id="dateOut">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="dateCheckOut"><b>Ngày lấy xe </b></label>
                                        <input id="dateCheckOut" name="dateCheckOut" type="text"
                                               class="date form-control ignore"
                                               onchange="parkingCostView.totalDay();"
                                        />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="timeCheckOut"><b>Giờ lấy xe</b></label>
                                        <input id="timeCheckOut" name="timeCheckOut" type="text"
                                               class="time form-control ignore"
                                               onchange="parkingCostView.totalDay();"
                                        />
                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="totalDate"><b>Số ngày đậu</b></label>
                                        <input id="totalDate" name="totalDate" type="text" readonly class="form-control"
                                        />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="totalTime"><b>Số giờ đậu</b></label>
                                        <input id="totalTime" name="totalTime" type="text" readonly class="form-control"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="totalCost"><b>Tổng chi phí</b></label>
                                        <input type="text" class="form-control currency"
                                               id="totalCost" readonly
                                               name="totalCost">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
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
                    <h5 class="modal-title">Thêm mới đơn giá</h5>
                </div>
                <div class="modal-body">
                    <form id="formCostPrice">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="costPrice"><b>Giá tiền</b></label>
                                    <input type="number" class="form-control currency"
                                           id="costPrice" value="0"
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
                            <div class="col-md-offset-7 col-md-5">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="parkingCostView.savePriceType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="parkingCostView.cancelPriceType()">Nhập lại</button>
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
                        <span aria-hidden="true">×</span>
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
                            <div class="col-md-offset-7 col-md-5">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="parkingCostView.addVehicles()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="parkingCostView.cancelVehicle()">Nhập lại
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
                        $("h5#modalContent").empty().append("Bạn có muốn xóa bãi đậu này ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                addParkingCost: function () {
                    $("#divControl").find(".titleControl").html("Thêm mới phí đậu bãi");
                    parkingCostView.renderDateTimePicker();
                    parkingCostView.current = null;
                    parkingCostView.action = 'add';
                    parkingCostView.inputPrice();
                    parkingCostView.show();
                    parkingCostView.clearInput();

                },
                editParkingCost: function (id) {
                    $("#divControl").find(".titleControl").html("Cập nhập phí đậu bãi");
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
                    $("textarea[id='note']").val('');
                    $("input[id='totalCost']").val(0);
                    $("input[id='totalDate']").val(0);
                    $("input[id='totalTime']").val(0);
                },
                clearInputPrice: function () {
                    /* Form addPrice*/
                    $("input[id='costPrice']").val('');
                    $("input[id='totalCost']").val('');

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
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    $('#dateIn .time').timepicker({
                        'showDuration': true,
                        'timeFormat': 'H:i'
                    });

                    $('#dateIn .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoClose': true
                    });
                    $('#dateOut .time').timepicker({
                        'showDuration': true,
                        'timeFormat': 'H:i'
                    });

                    $('#dateOut .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoClose': true
                    });
                    parkingCostView.renderDateTimePicker();
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    defaultZero("#costPrice");

                },
                renderDateTimePicker: function () {
                    $('#dateCheckOut').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoClose': true
                    });

                    $('#dateCheckIn').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoClose': true
                    });
                    $('#dateCheckIn').datepicker("setDate", new Date());
                    $('#dateCheckOut').datepicker('setDate', new Date());
                    $('#timeCheckIn').timepicker("setTime", new Date());
                    $('#timeCheckOut').timepicker('setTime', new Date());
                },
                fillFormDataToCurrentObject: function () {
                    if (parkingCostView.action == 'add') {
                        parkingCostView.current = {
                            vehicle_id: $("#vehicle_id").attr('data-id'),
                            prices_price: $("input[id='price']").val(),
                            prices_id: $("#price").attr('data-priceId'),
                            note: $("textarea[id='note']").val(),
                            dateCheckIn: $("input[id='dateCheckIn']").val(),
                            dateCheckOut: $("input[id='dateCheckOut']").val(),
                            timeCheckIn: $("input[id='timeCheckIn']").val(),
                            timeCheckOut: $("input[id='timeCheckOut']").val(),
                            totalTime: $("input[id='totalTime']").val(),
                            totalDate: $("input[id='totalDate']").val(),
                            totalCost: $("input[id='totalCost']").val()


                        };
                    } else if (parkingCostView.action == 'update') {
                        parkingCostView.current.prices_price = $("input[id='price']").val();
                        parkingCostView.current.prices_id = $("#price").attr('data-priceId');
                        parkingCostView.current.literNumber = $("input[id='literNumber']").val();
                        parkingCostView.current.note = $("textarea[id='note']").val();
                        parkingCostView.current.vehicle_id = $("#vehicle_id").attr('data-id');
                        parkingCostView.current.dateCheckIn = $("input[id='dateCheckIn']").val();
                        parkingCostView.current.dateCheckOut = $("input[id='dateCheckOut']").val();
                        parkingCostView.current.timeCheckIn = $("input[id='timeCheckIn']").val();
                        parkingCostView.current.timeCheckOut = $("input[id='timeCheckOut']").val();
                        parkingCostView.current.totalTime = $("input[id='totalTime']").val();
                        parkingCostView.current.totalDate = $("input[id='totalDate']").val();
                        parkingCostView.current.totalCost = $("input[id='totalCost']").val();

                    }
                },
                fillCurrentObjectToForm: function () {
                    var dateCheckIn = moment(parkingCostView.current["dateCheckIn"], "YYYY-MM-DD");
                    var timeCheckIn = moment(parkingCostView.current["dateCheckIn"], "YYYY-MM-DD HH:mm:ss");
                    var dateCheckOut = moment(parkingCostView.current["dateCheckOut"], "YYYY-MM-DD");
                    var timeCheckOut = moment(parkingCostView.current["dateCheckOut"], "YYYY-MM-DD HH:mm:ss");
                    var vehicle = parkingCostView.current["vehicles_code"] + "-" + parkingCostView.current["vehicles_vehicleNumber"];
                    var totalCost = parkingCostView.current["totalHour"] * parkingCostView.current["prices_price"];

                    $("input[id='dateCheckIn']").datepicker('update', dateCheckIn.format("DD-MM-YYYY"));
                    $("input[id='timeCheckIn']").val(timeCheckIn.format("HH:mm"));
                    $("input[id='dateCheckOut']").datepicker('update', dateCheckOut.format("DD-MM-YYYY"));
                    $("input[id='timeCheckOut']").val(timeCheckOut.format("HH:mm"));
                    $("input[id='vehicle_id']").val(vehicle);

                    $("textarea[id='note']").val(parkingCostView.current["note"]);
                    $("input[id='price']").val(parkingCostView.current["prices_price"]);
                    $("input[id='totalCost']").val(totalCost);

                    $("#vehicle_id").attr('data-id', parkingCostView.current["vehicle_id"]);
                    $("#price").attr('data-priceId', parkingCostView.current["price_id"]);
                    formatCurrency(".currency");
                },
                totalDay: function () {
                    if ($('input[id=dateCheckIn]').val() == ""
                            || $('input[id=dateCheckOut]').val() == ""
                            || $('input[id=timeCheckIn]').val() == ""
                            || $('input[id=timeCheckOut]').val() == "")
                        return;

                    start = moment($('input[id=dateCheckIn]').val() + " " + $('input[id=timeCheckIn]').val(), "DD-MM-YYYY HH:mm");
                    end = moment($('input[id=dateCheckOut]').val() + " " + $('input[id=timeCheckOut]').val(), "DD-MM-YYYY HH:mm");
                    hour = end.diff(start, "minute") / 60;
                    day = end.diff(start, "day");
                    $('input[id=totalDate]').val(day);
                    if (hour % 2 == 0) {
                        $('input[id=totalTime]').val(hour);
                    } else {
                        $('input[id=totalTime]').val(hour.toFixed(2));

                    }
                    parkingCostView.totalCost();

                },
                totalCost: function () {
                    var time = $("input[id=totalTime]").val();
                    var price = $("input[id=price]").val();
                    price = price.replace(',', '');
                    var totalCost = time * price;
                    $("input[id=totalCost]").val(totalCost);
                    formatCurrency(".currency");

                },
                save: function () {
                    var sendToServer = null;
                    if (parkingCostView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: parkingCostView.action,
                            _object: parkingCostView.idDelete
                        };

                        $.ajax({
                            url: url + 'parking-cost/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var parkingOld = _.find(parkingCostView.tableParkingCost, function (o) {
                                    return o.id == sendToServer._object;
                                });
                                var indexOfParkingOld = _.indexOf(parkingCostView.tableParkingCost, parkingOld);
                                parkingCostView.tableParkingCost.splice(indexOfParkingOld, 1);
                                parkingCostView.showNotification("success", "Xóa thành công!");
                                parkingCostView.displayModal("hide", "#modal-confirmDelete");

                            }
                            parkingCostView.table.clear().rows.add(parkingCostView.tableParkingCost).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        parkingCostView.ValidateParking();
                        if ($("#formParkingCost").valid()) {
                            parkingCostView.fillFormDataToCurrentObject();
                            sendToServer = {
                                _token: _token,
                                _action: parkingCostView.action,
                                _object: parkingCostView.current
                            };

                            $.ajax({
                                url: url + 'parking-cost/modify',
                                type: "POST",
                                dataType: "json",
                                data: sendToServer
                            }).done(function (data, textStatus, jqXHR) {
                                if (jqXHR.status == 201) {
                                    switch (parkingCostView.action) {
                                        case 'add':
                                            data['tableParkingNew'][0].fullNumber = data['tableParkingNew'][0]['vehicles_code'] + "-" + data['tableParkingNew'][0]["vehicles_vehicleNumber"];
                                            parkingCostView.tableParkingCost.push(data['tableParkingNew'][0]);
                                            parkingCostView.showNotification("success", "Thêm thành công!");
                                            $("#price").attr('data-priceId', parkingCostView.current["prices_id"]);
                                            break;
                                        case 'update':
                                            data['tableParkingUpdate'][0].fullNumber = data['tableParkingUpdate'][0]['vehicles_code'] + "-" + data['tableParkingUpdate'][0]["vehicles_vehicleNumber"];
                                            var parkingOld = _.find(parkingCostView.tableParkingCost, function (o) {
                                                return o.id == sendToServer._object.id;
                                            });
                                            var indexOfParkingOld = _.indexOf(parkingCostView.tableParkingCost, parkingOld);
                                            parkingCostView.tableParkingCost.splice(indexOfParkingOld, 1, data['tableParkingUpdate'][0]);
                                            parkingCostView.showNotification("success", "Cập nhật thành công!");
                                            parkingCostView.hide();
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
                    }
                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_code'] + '-' + data[i]['vehicles_vehicleNumber'];
                    }
                    parkingCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullNumber'},
                            {
                                data: 'dateCheckIn',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY HH:mm");
                                }
                            },
                            {
                                data: 'dateCheckOut',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY HH:mm");
                                }
                            },
                            {data: 'totalDate'},
                            {data: 'totalHour'},
                            {
                                data: 'prices_price',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {
                                data: 'totalCost',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="parkingCostView.editParkingCost(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="parkingCostView.msgDelete(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }

                            }
                        ],
                        order: [[1, "desc"]]
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

                },
                cancelVehicle: function () {
                    /* Form addVehicle*/
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                    parkingCostView.clearValidation();
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
                inputVehicle: function () {
                    var numberVehicle = parkingCostView.tableVehicleNew.areaCode + '-' + parkingCostView.tableVehicleNew.vehicleNumber
                    $("input[id='vehicle_id']").val(numberVehicle);
                    $("#vehicle_id").attr('data-id', parkingCostView.tableVehicleNew.id);

                },
                addVehicles: function () {
                    parkingCostView.ValidateVehicle();
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
                                parkingCostView.showNotification("success", "Thêm thành công!");
                                parkingCostView.displayModal("hide", "#modal-addVehicle");
                                parkingCostView.tableVehicleNew = data['vehicleNew'];
                                parkingCostView.inputVehicle();
                            } else {
                                parkingCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#formVehicle").find("label[class=error]").css("color", "red");
                    }

                },
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
                                order: [[0, "desc"]]
                            })
                        } else {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    parkingCostView.displayModal("show", "#modal-searchVehicle")
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
                },

                ValidateParking: function () {
                    $("#formParkingCost").validate({
                        rules: {
                            vehicle_id: "required",
                            totalTime: {
                                min: 0.1
                            }
                        },
                        ignore: ".ignore",
                        messages: {
                            vehicle_id: "Vui lòng chọn xe",
                            totalTime: {
                                min: "Số giờ đậu không được bằng 0"
                            }

                        }
                    });
                },
                inputPrice: function () {
                    $("input[id='price']").val(parkingCostView.tablePrice.price);
                    $("#price").attr('data-priceId', parkingCostView.tablePrice.id);
                    formatCurrency(".currency");
                },
                ValidateCostPrice: function () {
                    $("#formCostPrice").validate({
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

                },
                cancelPriceType: function () {
                    $("input[id='costPrice']").val(0);
                },
                savePriceType: function () {
                    parkingCostView.ValidateCostPrice();
                    var priceType = {
                        price: asNumberFromCurrency('#costPrice'),
                        note: $("textarea[id='description']").val()
                    };
                    var sendToServer = {
                        _token: _token,
                        _action: 'addParkingCost',
                        _priceType: priceType
                    };
                    if ($("#formCostPrice").valid()) {
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
                            } else {
                                parkingCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                parkingCostView.clearInputPrice();
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            parkingCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#formCostPrice").find("label[class=error]").css("color", "red");
                    }
                }

            };
            parkingCostView.loadData();
        }
        else {
            parkingCostView.loadData();
        }

    })
    ;
</script>
