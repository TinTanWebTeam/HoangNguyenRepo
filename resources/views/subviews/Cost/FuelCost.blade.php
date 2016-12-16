<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 40%;
        display: none;
        right: 0;
        width: 50%;
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
        height: 320px;
    }
</style>

<div class="modal fade" id="modalConfirm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="fuelCostView.deleteFuelCost()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="fuelCostView.cancelDelete()">Hủy
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
                        <li class="active">Dầu</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="fuelCostView.addNewFuelCost(this)">
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
                            <th>Khấu trừ %(trước VAT)</th>
                            <th>Thành tiền</th>
                            <th>Tiền trả</th>
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
</div>
<!-- end .row -->

<!-- Start #frmControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="fuelCostView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body portlet-body">
                <form role="form" id="formFuelCost">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row" id='datetimepicker'>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicle_id"><b>Chọn xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-9 col-xs-9">
                                                <input type="text"
                                                       class="form-control"
                                                       id="vehicle_id"
                                                       name="vehicle_id">
                                            </div>
                                            <div class="col-sm-3 col-xs-3">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm xe mới"
                                                     onclick="fuelCostView.loadListGarageAndVehicleType()">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="dateFuel"><b>Ngày đổ</b></label>
                                        <input type="text" id="dateFuel" name="dateFuel"
                                               class="date form-control ignore"/>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="timeFuel"><b>Giờ đổ</b></label>
                                        <input id="timeFuel" name="timeFuel" type="text" class="time form-control"
                                        />
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="literNumber"><b>Số lít</b></label>
                                        <input type="number" class="form-control"
                                               id="literNumber"
                                               name="literNumber"
                                               onkeyup="fuelCostView.totalPrice()">

                                    </div>

                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="price"><b>Đơn giá</b></label>
                                        <div class="row">
                                            <div class="col-sm-9 col-xs-9">
                                                <input type="text" class="form-control currency"
                                                       id="price" readonly
                                                       name="price" data-priceId=""
                                                >
                                            </div>
                                            <div class="col-sm-3 col-xs-3">
                                                <div class="btn btn-primary btn-sm btn-circle" title="Thêm giá mới"
                                                     onclick="fuelCostView.displayModal('show', '#modal-addCostPrice')">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="hasVat"><b>Thành tiền</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control currency"
                                                       id="hasVat"
                                                       name="hasVat"
                                                       onkeyup="fuelCostView.lit()">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vat"><b>Khấu trừ %(trước VAT)</b></label>
                                        <input type="text" class="form-control"
                                               onkeyup="fuelCostView.totalPrice()"
                                               id="vat" maxlength="3" minlength="1"
                                               name="vat">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="totalPrice"><b>Tiền trả</b></label>
                                        <input type="text" class="form-control currency"
                                               id="totalPrice" readonly
                                               name="totalPrice">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <label for="noted"><b>Ghi chú</b></label>
                                        <input type="text" class="form-control"
                                               id="noted"
                                               name="noted">
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
                                    <button type="button" class="btn default" onclick="fuelCostView.cancel()">Nhập lại
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


<!-- Modal add CostPrice -->
<div class="row">
    <div id="modal-addCostPrice" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="fuelCostView.cancelPriceType()">×</span>
                    </button>
                    <h5 class="modal-title">Thêm mới đơn giá</h5>
                </div>
                <div class="modal-body">
                    <form id="formCostPrice">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="costPrice"><b>Giá tiền</b></label>
                                    <input type="text" class="form-control currency" value="0"
                                           id="costPrice" name="costPrice">
                                    <label class="error" style="color: red; display: none"><p>Giá tiền phải lớn hơn
                                            1000</p></label>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="description"><b>Mô tả</b></label>
                                    <textarea name="description" id="description" cols="10" rows="3"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-7 col-md-5">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="fuelCostView.savePriceType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="fuelCostView.cancelPriceType()">Nhập lại
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
                        <span aria-hidden="true" onclick="fuelCostView.cancelVehicle()">×</span>
                    </button>
                    <h5 class="modal-title">Thêm mới xe</h5>
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
                                           name="size"

                                    >
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
                                                onclick="fuelCostView.addVehicles()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="fuelCostView.cancelVehicle()">Nhập lại
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


<script>
    $(function () {
        if (typeof (fuelCostView) === 'undefined') {
            fuelCostView = {
                table: null,
                data: null,
                action: null,
                tablePrice: null,
                tableNewPrice: null,
                tableCost: null,
                tableVehicle: null,
                idDelete: null,
                tableGarage: null,
                tableVehicleType: null,
                tableVehicleNew: null,
                current: null,
                text2: null,
                dataAllVehicle:null,
                tableAutoCompleteSearch: function () {
                    fuelCostView.text2 = $("#vehicle_id").tautocomplete({
                        width: "300px",
                        columns: ['Số xe','Loại xe', 'Tài xế'],
                        data: function () {
                            try {
                                var data = fuelCostView.dataAllVehicle;
                            }
                            catch (e) {
                                alert(e)
                            }
                            var filterData = [];
                            var searchData = eval("/" + fuelCostView.text2.searchdata() + "/gi");
                            $.each(data, function (i, v) {
                                if (v.fullNumber.search(new RegExp(searchData)) != -1) {
                                    filterData.push(v);
                                }
                            });

                            return filterData;
                        },
                        onchange: function () {
                            $('#my-id').attr('data-id', fuelCostView.text2.id());
                        }
                    });
                },
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
                        url: url + 'fuel-cost/fuelCost',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            fuelCostView.tableCost = data['tableCost'];
                            fuelCostView.fillDataToDatatable(data['tableCost']);
                            fuelCostView.tablePrice = data['tablePrice'];
                            fuelCostView.inputPrice(data['tablePrice']);
                            fuelCostView.tableVehicle = data['dataVehicle'];
                            fuelCostView.dataAllVehicle = data['dataAllVehicle'];
//                            fuelCostView.renderAutoCompleteSearch();
                            fuelCostView.tableAutoCompleteSearch();
                        } else {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    $('#datetimepicker .time').timepicker({
                        'showDuration': true,
                        'timeFormat': 'H:i'
                    });
                    $('#datetimepicker .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
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
                    fuelCostView.renderDateTimePicker();
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    defaultZero("#costPrice");
                    defaultZero("#vat");
                    defaultZero("#hasVat");
                    defaultZero("#notVat");
                    defaultOne("#literNumber");
                },
//                renderAutoCompleteSearch: function () {
//                    fuelCostView.tagsVehicle = _.map(fuelCostView.tableVehicle, function (o) {
//                        return o.areaCode + '-' + o.vehicleNumber;
//                    });
//                    fuelCostView.tagsVehicle = _.union(fuelCostView.tagsVehicle);
//                    renderAutoCompleteSearch('#vehicle_id', fuelCostView.tagsVehicle, $("#vehicle_id").focusout(function () {
//                        var vehicleName = this.value;
//                        if (vehicleName == '') return;
//                        var vehicle = _.find(fuelCostView.tableVehicle, function (o) {
//                            return o.areaCode + '-' + o.vehicleNumber == vehicleName;
//                        });
//                        if (typeof vehicle === "undefined") {
//                            fuelCostView.loadListGarageAndVehicleType();
//                        } else {
//                            $("#vehicle_id").attr("data-id", vehicle.id);
//                        }
//                    }));
//
//                },
                inputPrice: function () {
                    if (fuelCostView.tablePrice == null) {
                        $("input[id='price']").val('0');
                    } else {
                        $("input[id='price']").val(fuelCostView.tablePrice.price);
                        $("#price").attr('data-priceId', fuelCostView.tablePrice.id);
                        fuelCostView.totalDefault();
                        formatCurrency(".currency");
                    }

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
                        $("h5#modalContent").empty().append("Bạn có muốn xóa chi phi này ?");
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
                    var dateFuel = moment(fuelCostView.current["dateRefuel"], "YYYY-MM-DD");
                    var timeFuel = moment(fuelCostView.current["dateRefuel"], "YYYY-MM-DD HH:mm:ss");
                    $("input[id='dateFuel']").datepicker('update', dateFuel.format("DD-MM-YYYY"));
                    $("input[id='timeFuel']").val(timeFuel.format("HH:mm"));
                    var vehicle = fuelCostView.current["vehicles_code"] + "-" + fuelCostView.current["vehicles_vehicleNumber"];
//                    var totalPrice = fuelCostView.current["literNumber"] * fuelCostView.current["prices_price"];
                    //$("input[id='vehicle_id']").val(vehicle);
                    fuelCostView.text2.settext(vehicle);
                    $("#my-id").attr('data-id', fuelCostView.current["vehicle_id"]);
                    $("input[id='literNumber']").val(fuelCostView.current["literNumber"]);
                    $("input[id='noted']").val(fuelCostView.current["note"]);
                    $("input[id='price']").val(fuelCostView.current["prices_price"]);
                    $("input[id='vat']").val(fuelCostView.current["vat"]);
                    $("input[id='hasVat']").val(fuelCostView.current["hasVat"]);
                    $("input[id='totalPrice']").val(fuelCostView.current["totalCost"]);
                    $("#price").attr('data-priceId', fuelCostView.current["price_id"]);
                    formatCurrency(".currency");

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
                    if (fuelCostView.action == 'add') {
                        fuelCostView.current = {
                            vehicle_id: $("#my-id").attr('data-id'),
                            dateFuel: $("input[id='dateFuel']").val(),
                            timeFuel: $("input[id='timeFuel']").val(),
                            totalPrice: $("input[id='totalprice']").val(),
                            literNumber: $("input[id='literNumber']").val(),
                            prices_price: $("input[id='price']").val(),
                            prices_id: $("#price").attr('data-priceId'),
                            noted: $("input[id='noted']").val(),
                            vat: $("input[id='vat']").val(),
                            hasVat: $("input[id='hasVat']").val()
                        };

                    } else if (fuelCostView.action == 'update') {

                        fuelCostView.current.prices_price = $("input[id='price']").val();
                        fuelCostView.current.prices_id = $("#price").attr('data-priceId');
                        fuelCostView.current.literNumber = $("input[id='literNumber']").val();
                        fuelCostView.current.totalCost = $("input[id='totalprice']").val();
                        fuelCostView.current.dateFuel = $("input[id='dateFuel']").val();
                        fuelCostView.current.timeFuel = $("input[id='timeFuel']").val();
                        fuelCostView.current.noted = $("input[id='noted']").val();
                        fuelCostView.current.vehicle_id = $("#my-id").attr('data-id');
                        fuelCostView.current.vat = $("input[id='vat']").val();
                        fuelCostView.current.hasVat = $("input[id='hasVat']").val();
                    }
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                clearInput: function () {
                    /* form addCost*/
                    fuelCostView.text2.settext('');
                    $('#my-id').attr('data-id', '');
                    $("input[id='noted']").val('');
                    fuelCostView.totalDefault();

                },
                clearInputVehicle: function () {
                    /* Form addVehicle*/
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                    fuelCostView.totalDefault();
                },
                addNewFuelCost: function () {
                    fuelCostView.renderDateTimePicker();
                    $("#divControl").find(".titleControl").html("Thêm mới chi phí dầu");
                    fuelCostView.action = 'add';
                    fuelCostView.inputPrice();
                    fuelCostView.show();
                    fuelCostView.clearInput();
                },
                editFuelCost: function (id) {
                    $("#divControl").find(".titleControl").html("Cập nhật chi phi");
                    fuelCostView.current = _.clone(_.find(fuelCostView.tableCost, function (o) {
                        return o.id == id;
                    }), true);
                    fuelCostView.fillCurrentObjectToForm();
                    fuelCostView.action = 'update';
                    fuelCostView.show();
                    fuelCostView.clearValidation();

                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['vehicles_code'] + '-' + data[i]['vehicles_vehicleNumber'];
                    }
                    fuelCostView.table = $('#table-data').DataTable({
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
                                data: 'literNumber'
                            },
                            {
                                data: 'prices_price',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {
                                data: 'vat'
                            },
                            {
                                data: 'hasVat',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {
                                data: 'totalCost',
                                render: $.fn.dataTable.render.number(",", ",", 0)
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sữa">';
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
                        ],
                        order: [[1, "desc"]]
                    })
                },
                totalDefault: function () {
                    $("input[id=literNumber]").val('1');
                    $("input[id=vat]").val(3);
                    $("input[id=notVat]").val(0);
                    $("input[id=hasVat]").val(0);
                    fuelCostView.totalPrice();
                },
                lit: function () {
                    var price = asNumberFromCurrency('#price');
                    var hasVat = asNumberFromCurrency('#hasVat');
                    var vat = asNumberFromCurrency('#vat');
                    var lit = hasVat / price;
                    $("input[id=literNumber]").val(lit);
                    var notVat = hasVat / 1.1;
                    var total = hasVat - (notVat * (vat / 100));
                    $("input[id=totalPrice]").val(total);
                    formatCurrency(".currency");
                },
                totalPrice: function () {
                    var lit = $("input[id=literNumber]").val();
                    var price = asNumberFromCurrency('#price');
                    var vat = asNumberFromCurrency('#vat');
                    if (vat > 100) {
                        vat = 100;
                        $("input[id=vat]").val(vat);
                    } else if (vat < 0 || vat == 0) {
                        vat = '';
                        $("input[id=vat]").val(vat);
                    }
                    var hasVat = lit * price;
                    var notVat = hasVat / 1.1;
                    $("input[id=hasVat]").val(hasVat);
                    var total = hasVat - (notVat * (vat / 100));
                    $("input[id=totalPrice]").val(total);
                    formatCurrency(".currency");
                },
                ValidateCost: function () {
                    $("#formFuelCost").validate({
                        rules: {
                            literNumber: {
                                required: true,
                                number: true
                            }
                        },
                        ignore: ".ignore",
                        messages: {
                            literNumber: {
                                required: "Vui lòng nhập số lít",
                                number: "Số lít phải là số"
                            }
                        }
                    });
                },
                save: function () {
                    var sendToServer = null;
                    if (fuelCostView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: fuelCostView.action,
                            _object: fuelCostView.idDelete
                        };
                        $.ajax({
                            url: url + 'fuel-cost/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var costOld = _.find(fuelCostView.tableCost, function (o) {
                                    return o.id == sendToServer._object;
                                });
                                var indexOfcostOld = _.indexOf(fuelCostView.tableCost, costOld);
                                fuelCostView.tableCost.splice(indexOfcostOld, 1);
                                fuelCostView.showNotification("success", "Xóa thành công!");
                                fuelCostView.displayModal("hide", "#modal-confirmDelete");
                            }
                            fuelCostView.table.clear().rows.add(fuelCostView.tableCost).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        if($('#my-id').attr('data-id') == ''){
                            showNotification("error", "Vui lòng chọn xe");
                        }else if ($('input[id=price]').val() == 0) {
                            showNotification("error", "Đơn giá phải lớn hơn 0");
                        } else {
                            fuelCostView.ValidateCost();
                            if ($("#formFuelCost").valid()) {
                                fuelCostView.fillFormDataToCurrentObject();
                                sendToServer = {
                                    _token: _token,
                                    _action: fuelCostView.action,
                                    _object: fuelCostView.current
                                };

                                $.ajax({
                                    url: url + 'fuel-cost/modify',
                                    type: "POST",
                                    dataType: "json",
                                    data: sendToServer
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        switch (fuelCostView.action) {
                                            case 'add':
                                                data['tableCost'][0].fullNumber = data['tableCost'][0]['vehicles_code'] + "-" + data['tableCost'][0]["vehicles_vehicleNumber"];
                                                fuelCostView.tableCost.push(data['tableCost'][0]);
                                                fuelCostView.showNotification("success", "Thêm thành công!");
                                                $("#price").attr('data-priceId', fuelCostView.current["prices_id"]);
                                                break;
                                            case 'update':
                                                data['tableCost'][0].fullNumber = data['tableCost'][0]['vehicles_code'] + "-" + data['tableCost'][0]["vehicles_vehicleNumber"];
                                                var CostOld = _.find(fuelCostView.tableCost, function (o) {
                                                    return o.id == sendToServer._object.id;
                                                });
                                                var indexOfVehicleOld = _.indexOf(fuelCostView.tableCost, CostOld);
                                                fuelCostView.tableCost.splice(indexOfVehicleOld, 1, data['tableCost'][0]);
                                                fuelCostView.showNotification("success", "Cập nhật thành công!");
                                                fuelCostView.hide();
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
                                $("form#formFuelCost").find("label[class=error]").css("color", "red");
                            }
                        }

                    }
                },
                loadListGarageAndVehicleType: function () {
                    fuelCostView.displayModal('show', '#modal-addVehicle');
                    $.ajax({
                        url: url + 'get-list-option/Garage-Vehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            fuelCostView.tableGarage = data['tableGarage'];
                            fuelCostView.loadSelectBoxGarage(data['tableGarage']);
                            fuelCostView.tableVehicleType = data['tableVehicleType'];
                            fuelCostView.loadSelectBoxVehicleType(data['tableVehicleType']);
                            fuelCostView.tableVehicleNew = data['tableVehicleNew'];

                        } else {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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
                    var numberVehicle = fuelCostView.tableVehicleNew.areaCode + '-' + fuelCostView.tableVehicleNew.vehicleNumber;
                    $("input[id='my-id']").val(numberVehicle);
                    $("#my-id").attr('data-id', fuelCostView.tableVehicleNew.id);
                },
                addVehicles: function () {
                    fuelCostView.ValidateVehicle();
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
                                fuelCostView.showNotification("success", "Thêm thành công!");
                                fuelCostView.displayModal("hide", "#modal-addVehicle");
                                fuelCostView.tableVehicleNew = data['vehicleNew'];
                                fuelCostView.inputVehicle();
                                fuelCostView.clearInputVehicle();
                            } else {
                                fuelCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }

                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#formVehicle").find("label[class=error]").css("color", "red");
                    }

                },
                cancelVehicle: function () {
                    /* Form addVehicle*/
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                    fuelCostView.clearValidation();
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
                clearInputPrice: function () {
                    /* Form addPrice*/
                    $("input[id='costPrice']").val(0);
                    $("textarea[id='description']").val('');
                },
                savePriceType: function () {
                    if ($("input[id='costPrice']").val() < 1000) {
                        $("form#formCostPrice").find("label[class=error]").css("display", "block");

                    } else {
                        var priceType = {
                            price: asNumberFromCurrency('#costPrice'),
                            note: $("textarea[id='description']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'addFuelCost',
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
                                    fuelCostView.showNotification("success", "Thêm thành công!");
                                    fuelCostView.displayModal("hide", "#modal-addCostPrice");
                                    fuelCostView.tablePrice = data['price'];
                                    fuelCostView.inputPrice();
                                    fuelCostView.clearInputPrice();
                                } else {
                                    fuelCostView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }
                            }).fail(function (jqXHR, textStatus, errorThrown) {
                                fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            });
                        } else {
                            $("form#formCostPrice").find("label[class=error]").css("color", "red");
                        }
                    }

                },
                cancelPriceType: function () {
                    $("input[id='costPrice']").val(0);
                    $("textarea[id='description']").val('');
                }
            };
            fuelCostView.loadData();
        }
        else {
            fuelCostView.loadData();
        }
    });


</script>

