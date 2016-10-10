<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 35%;
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
                        <div class="btn btn-primary btn-circle btn-md" onclick="fuelCostView.addNewFuelCost(this)">
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
</div>
<!-- end .row -->


<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thêm mới chi phí nhiên liệu
                <div class="menu-toggles pull-right" onclick="fuelCostView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body portlet-body">
                <form role="form" id="formFuelCost">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicle_id"><b>Chọn xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" data-id=""
                                                       ondblclick="fuelCostView.loadListVehicles()" class="form-control"
                                                       id="vehicle_id" readonly
                                                       name="vehicle_id"
                                                       placeholder="click 2 lần để chọn xe">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle"
                                                     onclick="fuelCostView.loadListGarageAndVehicleType()">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker'>
                                            <label for="datetime"><b>Thời gian đổ nhiên liệu</b></label>
                                            <input type='text' id="datetime" name="datetime"
                                                   value="{{date('d-m-Y H-i')}}" class="form-control"/>
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
                                               onkeyup="fuelCostView.totalPrice(this)"
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
                                                       name="price" data-priceId=""
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
                    <h4 class="modal-title">Thêm giá nhiên liệu</h4>
                </div>
                <div class="modal-body">
                    <form id="formCostPrice">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="costPrice"><b>Giá tiền</b></label>
                                    <input type="number" class="form-control"
                                           id="costPrice" name="costPrice">
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
                                                onclick="fuelCostView.addVehicles()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="fuelCostView.displayModal('hide','#modal-addVehicle')">Huỷ
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
                            fuelCostView.tableVehicle = data['tableVehicle'];

                        } else {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    $('#datetimepicker').datetimepicker();
                    $("#table-vehicles").find("tbody").on('click', 'tr', function () {
                        var vehicle = $(this).find('td:eq(1)')[0].innerText + '-' + $(this).find('td:eq(2)')[0].innerText;
                        $('#vehicle_id').attr('data-id', $(this).find('td:first')[0].innerText);
                        $('#vehicle_id').val(vehicle);
                        fuelCostView.displayModal("hide", "#modal-searchVehicle");
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
                inputPrice: function () {
                    $("input[id='price']").val(fuelCostView.formatMoney(fuelCostView.tablePrice.price, '.', '.'));
                    $("#price").attr('data-priceId', fuelCostView.tablePrice.id);
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
                    var day = fuelCostView.current["dateRefuel"].substr(8, 2);
                    var month = fuelCostView.current["dateRefuel"].substr(5, 2);
                    var year = fuelCostView.current["dateRefuel"].substr(0, 4);
                    var hourMinus = fuelCostView.current["dateRefuel"].substr(11, 5);
                    $("input[id='datetime']").val(day + "/" + month + "/" + year + " " + hourMinus);
                    var vehicle = fuelCostView.current["vehicles_code"] + "-" + fuelCostView.current["vehicles_vehicleNumber"];
                    var totalPrice = fuelCostView.current["literNumber"] * fuelCostView.current["prices_price"];
                    $("input[id='vehicle_id']").val(vehicle);
                    $("#vehicle_id").attr('data-id', fuelCostView.current["vehicle_id"]);
                    $("input[id='literNumber']").val(fuelCostView.current["literNumber"]);
                    $("input[id='totalprice']").val(fuelCostView.formatMoney(totalPrice, '.', '.'));
                    $("input[id='noted']").val(fuelCostView.current["note"]);
                    $("input[id='price']").val(fuelCostView.formatMoney(fuelCostView.current["prices_price"], '.', '.'));
                    $("#price").attr('data-priceId', fuelCostView.current["price_id"]);

                },
                fillFormDataToCurrentObject: function () {
                    if (fuelCostView.action == 'add') {
                        fuelCostView.current = {
                            vehicle_id: $("#vehicle_id").attr('data-id'),
                            datetime: $("input[id='datetime']").val(),
                            totalPrice: $("input[id='totalprice']").val(),
                            literNumber: $("input[id='literNumber']").val(),
                            prices_price: $("input[id='price']").val(),
                            prices_id: $("#price").attr('data-priceId'),
                            noted: $("input[id='noted']").val()
                        };
                    } else if (fuelCostView.action == 'update') {
                        fuelCostView.current.prices_price = $("input[id='price']").val();
                        fuelCostView.current.prices_id = $("#price").attr('data-priceId');
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
                                    return moment(data).format("DD/MM/YYYY HH:mm:ss");
                                }
                            },

                            {
                                data: 'literNumber',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'prices_price',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'totalCost',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
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
                        ],
                        order: [[1, "desc"]],
                    })
                },
                ValidateCost: function () {
                    $("#formFuelCost").validate({
                        rules: {
                            vehicle_id: "required",
                            literNumber: {
                                required: true,
                                number: true
                            }

                        },
                        messages: {
                            vehicle_id: "Vui lòng chọn xe",
                            literNumber: {
                                required: "Vui lòng nhập số lít",
                                number: "Số lít phải là số"
                            }

                        }
                    });
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

                totalPrice: function () {
                    var lit = $("input[id=literNumber]").val();
                    var price = $("input[id=price]").val();
                    price = price.replace('.', '');
                    var totalPrice = lit * price;
                    $("input[id=totalprice]").val(fuelCostView.formatMoney(totalPrice, '.', '.'));

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
                save: function () {
                    fuelCostView.ValidateCost();
                    fuelCostView.fillFormDataToCurrentObject();

                    if ($("#formFuelCost").valid()) {
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
                        $("form#formFuelCost").find("label[class=error]").css("color", "red");
                    }
                },
                loadListVehicles: function () {
                    $.ajax({
                        url: url + 'get-list-vehicle/getVehicle',
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
                                    {data: 'vehicleType'}
                                ],
                                order: [[0, "desc"]],
                            })
                        } else {
                            fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        fuelCostView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    fuelCostView.displayModal("show", "#modal-searchVehicle")
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
                            },
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
                            },

                        }
                    });

                },
                inputVehicle: function () {
                    var numberVehicle = fuelCostView.tableVehicleNew.areaCode + '-' + fuelCostView.tableVehicleNew.vehicleNumber
                    $("input[id='vehicle_id']").val(numberVehicle);
                    $("#vehicle_id").attr('data-id', fuelCostView.tableVehicleNew.id);
                },
                addVehicles: function () {
                    fuelCostView.ValidateVehicle();
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
                savePriceType: function () {
                    fuelCostView.ValidateCostPrice();
                    var priceType = {
                        price: $("input[id='costPrice']").val(),
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
                                fuelCostView.tablePrice = data['prices'];
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

            };
            fuelCostView.loadData();
        } else {
            fuelCostView.loadData();
        }


    });


</script>

