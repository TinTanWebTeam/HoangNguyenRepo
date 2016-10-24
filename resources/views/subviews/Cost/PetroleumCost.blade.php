<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 40%;
        display: none;
        right: 0px;
        width: 50%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

    #divControl .panel-body {
        height: 322px;
    }
</style>

<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="petroleumCostView.deletePetroleum()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="petroleumCostView.cancelDelete()">Hủy
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
                        <li class="active">Thay nhớt</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="petroleumCostView.addPetroleum()">
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
            <div class="panel-heading">Thêm mới chi phí thay nhớt
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="petroleumCostView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="formPetroleum">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row" id='datetimepicker'>
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicle_id"><b>Chọn xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" data-id=""
                                                       ondblclick="petroleumCostView.loadListVehicles()"
                                                       class="form-control"
                                                       id="vehicle_id" readonly
                                                       name="vehicle_id"
                                                       placeholder="click 2 lần để chọn xe">
                                                <label id="vehicle_id" class="error" style="display: none; color: red">Vui
                                                    lòng
                                                    chọn xe</label>
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm xe mới"
                                                     onclick="petroleumCostView.loadListGarageAndVehicleType()">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group form-md-line-input">
                                        <label for="dateFuel"><b>Ngày đổ</b></label>
                                        <input id="dateFuel" name="dateFuel" type="text"
                                               class="date form-control ignore"
                                        />
                                        <label class="error" id="dateFuel" style="display: none; color: red">Vui
                                            lòng nhập đúng định dạng dd-mm-yyyy</label>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="timeFuel"><b>Giờ đổ</b></label>
                                        <input id="timeFuel" name="timeFuel" type="text" class="time form-control"
                                        />
                                        <label class="error" id="timeFuel" style="display: none; color: red">Vui lòng
                                            nhập giờ</label>
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
                                               onkeyup="petroleumCostView.totalPrice()"
                                               placeholder="Số lít">
                                        <label id="literNumber" class="error" style="display: none; color: red">Vui lòng
                                            nhập số lít</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="price"><b>Đơn giá</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control"
                                                       id="price" readonly
                                                       name="price" data-priceId=""
                                                >
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm giá mới"
                                                     onclick="petroleumCostView.displayModal('show', '#modal-addCostPrice')">
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
                                            onclick="petroleumCostView.save()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="petroleumCostView.cancel()">Huỷ
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


<!-- Modal add CostPrice -->
<div class="row">
    <div id="modal-addCostPrice" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Thêm giá nhiên liệu</h5>
                </div>
                <div class="modal-body">
                    <form id="formCostPrice">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="costPrice"><b>Giá tiền</b></label>
                                    <input type="number" class="form-control"
                                           id="costPrice" step="1000"
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
                                                onclick="petroleumCostView.savePriceType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="petroleumCostView.displayModal('hide','#modal-addCostPrice')">
                                            Huỷ
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

<!-- Modal add Vehicle -->
<div class="row">
    <div id="modal-addVehicle" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Thêm Xe</h5>
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
                                                onclick="petroleumCostView.addVehicles()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="petroleumCostView.displayModal('hide','#modal-addVehicle')">Huỷ
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

        if (typeof (petroleumCostView) === 'undefined') {
            petroleumCostView = {
                table: null,
                data: null,
                action: null,
                tableVehicle: null,
                tablePetroleumCost: null,
                tablePetrolUpdate: null,
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
                    petroleumCostView.clearInput();
                    petroleumCostView.clearValidation();
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                totalPrice: function () {
                    var lit = $("input[id=literNumber]").val();
                    var price = $("input[id=price]").val();
                    price = price.replace(',', '');
                    var totalPrice = lit * price;
                    $("input[id=totalprice]").val(petroleumCostView.formatMoney(totalPrice, '.', ','));


                },
                clearInput: function () {

                    /* form addCost*/
                    $("input[id='vehicle_id']").val('');
                    $("#vehicle_id").attr('data-id', '');
                    $("input[id='literNumber']").val('');
                    $("input[id='noted']").val('');
                    $("input[id='totalprice']").val('');
                    $("input[id='dateFuel']").val('');
                    $("input[id='timeFuel']").val('');
                },
                clearInputPrice: function () {
                    /* Form addPrice*/
                    $("input[id='costPrice']").val('');
                    $("input[id='literNumber']").val('');
                    $("input[id='totalprice']").val('');
                },
                clearInputVehicle: function () {
                    /* Form addVehicle*/
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='areaCode']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');

                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (petroleumCostView.action == 'delete' && type == 'hide') {
                        petroleumCostView.action = null;
                        petroleumCostView.idDelete = null;
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
                    if (petroleumCostView.action == 'add') {
                        petroleumCostView.clearInput();
                    } else {
                        petroleumCostView.fillCurrentObjectToForm();
                    }
                },
                msgDelete: function (id) {
                    if (id) {
                        petroleumCostView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Bạn có muốn xóa chi phi này ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                cancelDelete: function () {
                    petroleumCostView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                deletePetroleum: function () {
                    petroleumCostView.action = 'delete';
                    petroleumCostView.save();
                    $("#modalConfirm").modal('hide');
                },
                editPetroleum: function (id) {
                    petroleumCostView.current = null;
                    petroleumCostView.current = _.clone(_.find(petroleumCostView.tablePetroleumCost, function (o) {
                        return o.id == id;
                    }), true);
                    petroleumCostView.fillCurrentObjectToForm();
                    petroleumCostView.action = 'update';
                    petroleumCostView.show();

                },
                loadListVehicles: function () {
                    $.ajax({
                        url: url + 'get-list-vehicle/getVehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (petroleumCostView.tableVehicle != null) {
                                petroleumCostView.tableVehicle.destroy();
                            }
                            petroleumCostView.tableVehicle = $('#table-vehicles').DataTable({
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
                            petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    petroleumCostView.displayModal("show", "#modal-searchVehicle")
                },

                addPetroleum: function () {
                    petroleumCostView.renderDateTimePicker();
                    petroleumCostView.current = null;
                    petroleumCostView.action = 'add';
                    petroleumCostView.inputPrice();
                    petroleumCostView.show();

                },
                loadData: function () {
                    $.ajax({
                        url: url + 'petroleum-cost/petroleum-cost',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            petroleumCostView.tablePetroleumCost = data['petroleumCost'];
                            petroleumCostView.fillDataToDatatable(data['petroleumCost']);
                            petroleumCostView.tablePrice = data['tablePrice'];
                            petroleumCostView.inputPrice(data['tablePrice']);
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
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });

                    $('#datetimepicker .time').timepicker({
                        'showDuration': true,
                        'timeFormat': 'H:i'
                    });

                    $('#datetimepicker .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $("#table-vehicles").find("tbody").on('click', 'tr', function () {
                        var vehicle = $(this).find('td:eq(1)')[0].innerText + '-' + $(this).find('td:eq(2)')[0].innerText;
                        $('#vehicle_id').attr('data-id', $(this).find('td:first')[0].innerText);
                        $('#vehicle_id').val(vehicle);
                        petroleumCostView.displayModal("hide", "#modal-searchVehicle");
                    });

                },
                renderDateTimePicker: function () {
                    $('#dateFuel').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#dateFuel').datepicker("setDate", new Date());
                    $('#timeFuel').timepicker('setTime', new Date());
                },
                fillFormDataToCurrentObject: function () {
                    if (petroleumCostView.action == 'add') {
                        petroleumCostView.current = {
                            vehicle_id: $("#vehicle_id").attr('data-id'),
                            dateFuel: $("input[id='dateFuel']").val(),
                            timeFuel: $("input[id='timeFuel']").val(),
                            totalPrice: $("input[id='totalprice']").val(),
                            literNumber: $("input[id='literNumber']").val(),
                            prices_price: $("input[id='price']").val(),
                            prices_id: $("#price").attr('data-priceId'),
                            noted: $("input[id='noted']").val()
                        };
                    } else if (petroleumCostView.action == 'update') {
                        petroleumCostView.current.prices_price = $("input[id='price']").val();
                        petroleumCostView.current.prices_id = $("#price").attr('data-priceId');
                        petroleumCostView.current.literNumber = $("input[id='literNumber']").val();
                        petroleumCostView.current.totalCost = $("input[id='totalprice']").val();
                        petroleumCostView.current.dateFuel = $("input[id='dateFuel']").val();
                        petroleumCostView.current.timeFuel = $("input[id='timeFuel']").val();
                        petroleumCostView.current.noted = $("input[id='noted']").val();
                        petroleumCostView.current.vehicle_id = $("#vehicle_id").attr('data-id');
                    }
                },
                fillCurrentObjectToForm: function () {
                    var dateFuel = moment(petroleumCostView.current["dateRefuel"], "YYYY-MM-DD");
                    var timeFuel = moment(petroleumCostView.current["dateRefuel"], "YYYY-MM-DD HH:mm:ss");
                    $("input[id='dateFuel']").datepicker('update', dateFuel.format("DD-MM-YYYY"));
                    $("input[id='timeFuel']").val(timeFuel.format("HH:mm"));


                    var vehicle = petroleumCostView.current["vehicles_code"] + "-" + petroleumCostView.current["vehicles_vehicleNumber"];
                    var totalPrice = petroleumCostView.current["literNumber"] * petroleumCostView.current["prices_price"];

                    $("input[id='vehicle_id']").val(vehicle);
                    $("#vehicle_id").attr('data-id', petroleumCostView.current["vehicle_id"]);
                    $("input[id='literNumber']").val(petroleumCostView.current["literNumber"]);
                    $("input[id='totalprice']").val(petroleumCostView.formatMoney(totalPrice, '.', ','));

                    $("input[id='noted']").val(petroleumCostView.current["note"]);
                    $("input[id='price']").val(petroleumCostView.formatMoney(petroleumCostView.current["prices_price"], '.', ','));
                    $("#price").attr('data-priceId', petroleumCostView.current["price_id"]);


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
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_code'] + '-' + data[i]['vehicles_vehicleNumber'];
                    }
                    petroleumCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullNumber'},
                            {
                                data: 'dateRefuel',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY HH:mm");
                                }
                            },

                            {
                                data: 'literNumber',
                            },
                            {
                                data: 'prices_price',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {
                                data: 'totalCost',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {data: 'noteCost'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="petroleumCostView.editPetroleum(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="petroleumCostView.msgDelete(' + full.id + ')">';
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

                ValidatePetrol: function () {
                    $("#formPetroleum").validate({
                        rules: {
                            vehicle_id: "required",
                            literNumber: {
                                required: true,
                                number: true,
                            }

                        },
                        ignore: ".ignore",
                        messages: {
                            vehicle_id: "Vui lòng chọn xe",
                            literNumber: {
                                required: "Vui lòng nhập số lít",
                                number: "Số lít phải là số",

                            }

                        }
                    });
                },

                save: function () {
                    var sendToServer = null;
                    if (petroleumCostView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: petroleumCostView.action,
                            _object: petroleumCostView.idDelete
                        };

                        $.ajax({
                            url: url + 'petroleum/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer

                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var petrolOld = _.find(petroleumCostView.tablePetroleumCost, function (o) {
                                    return o.id == sendToServer._object;
                                });
                                var indexOfPetrolOld = _.indexOf(petroleumCostView.tablePetroleumCost, petrolOld);
                                petroleumCostView.tablePetroleumCost.splice(indexOfPetrolOld, 1);
                                petroleumCostView.showNotification("success", "Xóa thành công!");
                                petroleumCostView.displayModal("hide", "#modal-confirmDelete")

                            }
                            petroleumCostView.table.clear().rows.add(petroleumCostView.tablePetroleumCost).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        petroleumCostView.ValidatePetrol();
                        if ($("#formPetroleum").valid()) {
                            petroleumCostView.fillFormDataToCurrentObject();
                            sendToServer = {
                                _token: _token,
                                _action: petroleumCostView.action,
                                _object: petroleumCostView.current
                            };

                            $.ajax({
                                url: url + 'petroleum/modify',
                                type: "POST",
                                dataType: "json",
                                data: sendToServer
                            }).done(function (data, textStatus, jqXHR) {
                                if (jqXHR.status == 201) {
                                    switch (petroleumCostView.action) {
                                        case 'add':
                                            data['tablePetrolNew'][0].fullNumber = data['tablePetrolNew'][0]['vehicles_code'] + "-" + data['tablePetrolNew'][0]["vehicles_vehicleNumber"];
                                            petroleumCostView.tablePetroleumCost.push(data['tablePetrolNew'][0]);
                                            petroleumCostView.showNotification("success", "Thêm thành công!");
                                            $("#price").attr('data-priceId', petroleumCostView.current["prices_id"]);
                                            break;
                                        case 'update':
                                            data['tablePetrolUpdate'][0].fullNumber = data['tablePetrolUpdate'][0]['vehicles_code'] + "-" + data['tablePetrolUpdate'][0]["vehicles_vehicleNumber"];
                                            var petrolOld = _.find(petroleumCostView.tablePetroleumCost, function (o) {
                                                return o.id == sendToServer._object.id;
                                            });
                                            var indexOfPetrolOld = _.indexOf(petroleumCostView.tablePetroleumCost, petrolOld);
                                            petroleumCostView.tablePetroleumCost.splice(indexOfPetrolOld, 1, data['tablePetrolUpdate'][0]);
                                            petroleumCostView.showNotification("success", "Cập nhật thành công!");
                                            petroleumCostView.hide();
                                            break;
                                        default:
                                            break;
                                    }
                                    petroleumCostView.table.clear().rows.add(petroleumCostView.tablePetroleumCost).draw();
                                    petroleumCostView.clearInput();
                                    petroleumCostView.renderDateTimePicker();
                                } else {
                                    petroleumCostView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }

                            }).fail(function (jqXHR, textStatus, errorThrown) {
                                petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            });
                        } else {
                            $("form#formPetroleum").find("label[class=error]").css("color", "red");
                        }
                    }
                },


                loadListGarageAndVehicleType: function () {
                    petroleumCostView.displayModal('show', '#modal-addVehicle');
                    $.ajax({
                        url: url + 'get-list-option/Garage-Vehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            petroleumCostView.tableGarage = data['tableGarage'];
                            petroleumCostView.loadSelectBoxGarage(data['tableGarage']);
                            petroleumCostView.tableVehicleType = data['tableVehicleType'];
                            petroleumCostView.loadSelectBoxVehicleType(data['tableVehicleType']);
                            petroleumCostView.tableVehicleNew = data['tableVehicleNew'];

                        } else {
                            petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

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

                    var numberVehicle = petroleumCostView.tableVehicleNew.areaCode + '-' + petroleumCostView.tableVehicleNew.vehicleNumber
                    $("input[id='vehicle_id']").val(numberVehicle);
                    $("#vehicle_id").attr('data-id', petroleumCostView.tableVehicleNew.id);

                },
                addVehicles: function () {
                    petroleumCostView.ValidateVehicle();
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
                    if ($("#formVehicle").valid()) {
                        $.ajax({
                            url: url + 'create-vehicle-new/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                petroleumCostView.showNotification("success", "Thêm thành công!");
                                petroleumCostView.displayModal("hide", "#modal-addVehicle");
                                petroleumCostView.tableVehicleNew = data['vehicleNew'];
                                petroleumCostView.inputVehicle();
                                petroleumCostView.clearInputVehicle();
                            } else {
                                petroleumCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#formVehicle").find("label[class=error]").css("color", "red");
                    }

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

                inputPrice: function () {
                    $("input[id='price']").val(petroleumCostView.formatMoney(petroleumCostView.tablePrice.price, '.', ','));
                    $("#price").attr('data-priceId', petroleumCostView.tablePrice.id);

                },
                ValidateCostPrice: function () {
                    $("#formCostPrice").validate({
                        rules: {
                            costPrice: {
                                required: true,
                                number: true,
                                min:0,
                                step: 1000
                            }
                        },
                        messages: {
                            costPrice: {
                                required: "Vui lòng nhập số tiền",
                                number: "Giá tiền phải là số",
                                min: "Giá tiền không được âm",
                                step: "Mệnh giá tiền phải 1000"
                            }
                        }
                    });

                },
                savePriceType: function () {
                    petroleumCostView.ValidateCostPrice();
                    var priceType = {
                        price: $("input[id='costPrice']").val(),
                        note: $("textarea[id='description']").val()
                    };
                    var sendToServer = {
                        _token: _token,
                        _action: 'addPetroleum',
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
                                petroleumCostView.showNotification("success", "Thêm thành công!");
                                petroleumCostView.displayModal("hide", "#modal-addCostPrice");
                                petroleumCostView.tablePrice = data['prices'];
                                petroleumCostView.inputPrice();
                                petroleumCostView.clearInputPrice();

                            } else {
                                petroleumCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            petroleumCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#formCostPrice").find("label[class=error]").css("color", "red");
                    }
                }

            };
            petroleumCostView.loadData();
        } else {
            petroleumCostView.loadData();
        }

    });
</script>