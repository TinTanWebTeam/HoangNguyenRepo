<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 30%;
        display: none;
        right: 0;
        width: 40%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

    @media (max-height: 500px) {
        #divControl {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }
    }

    #divControl .panel-body {
        height: 360px;
    }

</style>

<!-- start View list -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li class="active">Quản lý xe</li>
                    </ol>
                    <div class="menu-toggle pull-right fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Tạo Hóa đơn"
                             onclick="vehicleAllView.addNewVehicle()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin: 15px 0 0 0">
                <div class="col-lg-12">
                    <span class="label btn" onclick="vehicleAllView.changeStatus(1)"
                          style="font-size: 1em;background-color:rgba(78,79,76,0.9);cursor:pointer">Chưa phân tài</span>

                    <span class="label  label-primary btn" onclick="vehicleAllView.changeStatus(2)"
                          style="font-size: 1em;">Đang giao hàng</span>
                    <span class="label label-success btn" onclick="vehicleAllView.changeStatus(3)"
                          style="font-size: 1em;">Đã giao hàng</span>
                    <span class="label label-danger btn" onclick="vehicleAllView.changeStatus(4)"
                          style="font-size: 1em;">Không giao được</span>
                </div>
            </div>

            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-striped table-hover" id="table-data">
                        <thead>
                        <tr class="active">
                            <th>Số xe</th>
                            <th>Nhà xe</th>
                            <th style="width:10%">Loại xe</th>
                            <th>Hãng xe</th>
                            <th style="width:5%">Năm sản suất</th>
                            <th style="width:5%">Dài x Rộng x Cao</th>
                            <th style="width:5%">Trọng tải (tấn)</th>
                            <th style="width:20%">Trạng thái</th>
                            <th>Ghi chú</th>
                            <th style="width:10%">Sửa/ Xóa/ lịch sử phân tài</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyVehicleAllList">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end View list -->

{{-- Add Xe--}}
<div class="row">
    <div id="divControl" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="vehicleAllView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12 scroll-bar">
                    <form role="form" id="frmVehicle" onsubmit="return false;">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="areaCode"><b>Mã vùng</b></label>
                                        <input type="text" class="form-control" data-id=""
                                               id="areaCode"
                                               name="areaCode">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicleNumber"><b>Số xe</b></label>
                                        <input type="text" class="form-control"
                                               id="vehicleNumber"
                                               name="vehicleNumber">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="trademark"><b>Hãng xe</b></label>
                                        <input type="text" class="form-control"
                                               id="trademark"
                                               name="trademark">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="yearOfProduction"><b>Năm sản xuất</b></label>
                                        <input type="text" class="date-own form-control"
                                               id="yearOfProduction"
                                               name="yearOfProduction">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicleType_id"><b>Loại xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-9 col-xs-9">
                                                <input name="vehicleType_id" id="vehicleType_id" data-id=""
                                                       class="form-control"
                                                       onkeyup="vehicleAllView.clearIp('typeVehicle');">
                                            </div>
                                            <div class="col-sm-3 col-xs-3">
                                                <button id="editVehicleType" class="btn btn-primary btn-sm btn-circle"
                                                        onclick="vehicleAllView.editVehicleType()">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="owner"><b>Chủ xe</b></label>
                                        <input type="text" class="form-control"
                                               id="owner"
                                               name="owner">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label for="size"><b>Dài x rộng x cao</b></label>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="long"
                                                   name="long">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="wide"
                                                   name="wide">
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="high"
                                                   name="high">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="weight"><b>Trọng tải (tấn)</b></label>
                                        <input type="text" class="form-control"
                                               id="weight"
                                               name="weight">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="driver"><b>Tài xế</b></label>
                                        <input type="text" class="form-control"
                                               id="driver"
                                               name="driver">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="garage"><b>Nhà xe</b></label>
                                        <input id="garage" name="garage" data-id=""
                                               onkeyup="vehicleAllView.clearIp('garage');"
                                               class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group form-md-line-input">
                                        <label for="noteVehicle"><b>Ghi chú</b></label>
                                        <textarea type="text" class="form-control"
                                                  id="noteVehicle"
                                                  name="noteVehicle"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-actions noborder">
                                        <div class="form-group">
                                            <button id="addStaffCustomer" type="button"
                                                    class="btn btn-primary marginRight"
                                                    onclick="vehicleAllView.saveVehicle()">
                                                Hoàn tất
                                            </button>
                                            <button id="retype" type="button" class="btn default"
                                                    onclick="vehicleAllView.clearInputFormVehicle()">
                                                Nhập lại
                                            </button>
                                            <button type="button" class="btn btn-info" id="attach-file"
                                                    onclick="vehicleAllView.showFormAttachFile()">Thêm tập tin
                                            </button>
                                        </div>
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
<!-- end them moi xe -->


{{--modal thong bao--}}
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="vehicleAllView.deleteVehicle()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="vehicleAllView.cancelDelete()">Hủy
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}



<!-- Modal Add vehicleType -->
<div class="row">
    <div id="modal-addVehicleType" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="">×</span>
                    </button>
                    <h5 class="modal-title">Thêm mới loại xe</h5>
                </div>
                <div class="modal-body">
                    <form id="frmVehicleType">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleType"><b>Loại xe</b></label>
                                    <input type="text" class="form-control"
                                           id="vehicleType"
                                           name="vehicleType">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="description"><b>Mô tả</b></label>
                                    <textarea class="form-control"
                                              id="description"
                                              name="description"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-offset-7 col-md-5">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="vehicleAllView.saveVehicleType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="vehicleAllView.clearInputFormVehicleType()">Nhập lại
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
<!-- Modal Add vehicleType -->


<!-- Modal History -->
<div class="row">
    <div id="modal-historyPt" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title"> Lịch sử phân tài của xe</h5>
                </div>
                <div class="modal-body" style="padding-top: 0; font-size: 15px">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered  table-striped table-hover" id="table-historyPt">
                                    <thead>
                                    <tr class="active">
                                        <th>Số xe</th>
                                        <th>Tài xế</th>
                                        <th>Ngày tạo</th>
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
    </div>
</div>
<!-- end History -->

<!-- Modal attach file -->
<div class="row">
    <div id="modal-attachFile" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Thêm tập tin cho xe</h5>
                </div>
                <div class="modal-body">
                    <form id="upload" onsubmit="return false;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="tableId" id="tableId" value="">
                        <input type="hidden" name="tableName" id="tableName" value="vehicle">
                        <label for="file">Chọn tập tin:</label>
                        <input type="file" id="file" name="file[]" multiple class="form-control">
                    </form>
                    <h5>Danh sách tập tin</h5>
                    <table class="table table-bordered table-hover table-striped" id="table-file">
                        <thead>
                        <tr class="active">
                            <th>Mã</th>
                            <th>Tên tập tin</th>
                            <th>Xem</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <hr>
                    <div id="thumbnail">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal attach file -->


<script>
    $(function () {
        if (typeof (vehicleAllView) === 'undefined') {
            vehicleAllView = {
                table: null,
                tableHistory: null,
                tableFile: null,
                dataHistory: null,
                data: null,
                action: null,
                actionVehicleType: null,
                idVehicle: null,
                idDelete: null,
                tableVehicle: null,
                dataStatus: null,
                dataDrivers: null,
                dataGarages: null,
                current: null,
                dataVehicleType: null,
                text2: null,
                tagsVehicleType: [],
                tagsGarage: [],
                array_vehicleId: [],
                tableAutoCompleteSearch: function () {
                    vehicleAllView.text2 = $("#driver").tautocomplete({
                        width: "400px",
                        columns: ['Tài xế', 'CMND', 'Loại bằng lái'],
                        data: function () {
                            try {
                                var data = vehicleAllView.dataDrivers;
                            }
                            catch (e) {
                                alert(e)
                            }
                            var filterData = [];
                            var searchData = eval("/" + vehicleAllView.text2.searchdata() + "/gi");
                            $.each(data, function (i, v) {
                                if (v.fullName.search(new RegExp(searchData)) != -1) {
                                    filterData.push(v);
                                }
                            });
                            return filterData;
                        },
                        onchange: function () {
                            $('#my-id').attr('data-id', vehicleAllView.text2.id());
                        }
                    });
                },
                show: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                    vehicleAllView.clearInputFormVehicle();
                },
                hide: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    vehicleAllView.clearValidation();
                },
                clearInputFormVehicleType: function () {
                    $("input[id='vehicleType']").val('');
                    $("textarea[id='description']").val('');
                },
                clearInputFormVehicle: function () {
                    $("input[id=areaCode]").val('');
                    $("input[id=areaCode]").attr('data-id', '');
                    $("input[id='long']").val('');
                    $("input[id='wide']").val('');
                    $("input[id='high']").val('');
                    $("input[id='trademark']").val('');
                    $("input[id='yearOfProduction']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='owner']").val('');
                    $("input[id='vehicleType_id']").val('');
                    $('#vehicleType_id').attr('data-id', '');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                    $("textarea[id='noteVehicle']").val('');
                    $("input[id='garage']").val('');
                    $("input[id=garage]").attr('data-id', '');
                    $("#my-id").attr('data-id', '');
                    vehicleAllView.text2.settext('');

                },
                loadData: function () {
                    $.ajax({
                        url: url + 'vehicle-all-management/get-data-vehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            vehicleAllView.dataVehicle = data['dataAllVehicle'];
                            vehicleAllView.dataDrivers = data['dataDrivers'];
                            vehicleAllView.dataStatus = data['dataStatus'];
                            vehicleAllView.dataGarages = data['dataGarages'];
                            vehicleAllView.fillDataToDatatable(data['dataAllVehicle'], data['dataStatus']);
                            vehicleAllView.dataStatus = data['dataStatus'];
                        //    vehicleAllView.loadSelectBox(data['dataStatus']);
                            vehicleAllView.dataVehicleType = (data['dataVehicleType']);
                            vehicleAllView.renderAutoCompleteSearch();

                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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

                    $('.date-own').datepicker({
                        minViewMode: 2,
                        format: 'yyyy'
                    });
                    vehicleAllView.tableAutoCompleteSearch();
                },
                editVehicleType: function () {
                    var idVehicleType = $("#vehicleType_id").attr('data-id');
                    var nameType = $('input[id=vehicleType_id]').val();
                    vehicleAllView.currentType = null;
                    vehicleAllView.currentType = _.clone(_.find(vehicleAllView.dataVehicleType, function (o) {
                        return o.id == idVehicleType;
                    }), true);
                    $('input[id=vehicleType]').val(nameType);
                    vehicleAllView.actionVehicleType = 'updateVehicleType';
                    vehicleAllView.displayModal('show', '#modal-addVehicleType');
                    $("h5.modal-title").empty().append("Cập nhật loại xe");
                },
                vehicleValidate: function () {
                    $("#frmVehicle").validate({
                        rules: {
                            areaCode: "required",
                            garage: "required",
                            owner: "required",
                            vehicleType_id: "required",
                            vehicleNumber: {
                                required: true,
                                number: true
                            }
                        },
                        messages: {
                            vehicleType_id: "Vui lòng chọn loại xe",
                            garage: "Vui lòng chọn nhà xe",
                            areaCode: "Vui lòng nhập mã vùng",
                            vehicleNumber: {
                                required: "Vui lòng nhập số xe",
                                number: "Số xe phải là số"
                            },
                            owner: "Vui lòng nhập chủ xe"

                        }
                    });
                },
                addNewVehicle: function () {
                    $("#divControl").find(".titleControl").html("Thêm mới xe");
                    vehicleAllView.action = 'add';
                    vehicleAllView.show();
                },
                cancelDelete: function () {
                    vehicleAllView.idDelete = null;
                    $("#modalConfirm").modal('hide');
                },
                editVehicle: function (id) {
                    vehicleAllView.deselectAll();
                    vehicleAllView.current = null;
                    vehicleAllView.current = _.clone(_.find(vehicleAllView.dataVehicle, function (o) {
                        return o.id == id;
                    }), true);
                    vehicleAllView.action = 'update';
                    $("#divControl").find(".titleControl").html("Cập nhật xe");
                    vehicleAllView.show();
                    vehicleAllView.fillCurrentObjectToForm();
                },
                renderAutoCompleteSearch: function () {
                    vehicleAllView.tagsVehicleType = _.map(vehicleAllView.dataVehicleType, 'name');
                    vehicleAllView.tagsVehicleType = _.union(vehicleAllView.tagsVehicleType);
                    renderAutoCompleteSearch('#vehicleType_id', vehicleAllView.tagsVehicleType, $("#vehicleType_id").focusout(function () {
                        var vehicleTypeName = this.value;
                        if (vehicleTypeName == '') return;
                        var vehicleType = _.find(vehicleAllView.dataVehicleType, function (o) {
                            return o.name == vehicleTypeName;
                        });
                        if (typeof vehicleType === "undefined") {
                            $("#vehicleType_id").attr("data-id", '');
                            var nameType = $('input[id=vehicleType_id]').val();
                            if (nameType == '') {
                                $("#vehicleType_id").attr("data-id", '');
                            } else {
                                $('input[id=vehicleType]').val(nameType);
                                $("h5.modal-title").empty().append("Thêm mới loại xe");
                                vehicleAllView.actionVehicleType = 'addNewVehicleType';
                                vehicleAllView.displayModal('show', '#modal-addVehicleType');
                            }
                        } else {
                            $("#vehicleType_id").attr("data-id", vehicleType.id);
                            if ($("#vehicleType_id").attr('data-id') == '') {
                                $("button[id=editVehicleType]").prop("disabled", true);
                            } else {
                                $("button[id=editVehicleType]").prop("disabled", false);
                            }
                        }
                    }));


                    vehicleAllView.tagsGarage = _.map(vehicleAllView.dataGarages, 'name');
                    vehicleAllView.tagsGarage = _.union(vehicleAllView.tagsGarage);
                    renderAutoCompleteSearch('#garage', vehicleAllView.tagsGarage, $("#garage").focusout(function () {
                        var garageName = this.value;
                        if (garageName == '') return;
                        var nameGarage = _.find(vehicleAllView.dataGarages, function (o) {
                            return o.name == garageName;
                        });
                        if (typeof nameGarage === "undefined") {
                            $("#garage").attr("data-id", '');
                        } else {
                            $("#garage").attr("data-id", nameGarage.id);
                        }
                    }));

                },
                fillCurrentObjectToForm: function () {
                    var long = $("input[id='long']").val();
                    var wide = $("input[id='wide']").val();
                    var high = $("input[id='high']").val();
                    if (long == '' && wide == '' && high == '') {
                        var size = '';
                    } else {
                        var size = long.concat(' x ' + wide + ' x ' + high);
                    }
                    var sizeOld = vehicleAllView.current["size"];
                    var size = sizeOld.split("x");
                    $("input[id='areaCode']").val(vehicleAllView.current["areaCode"]);
                    $("input[id='areaCode']").attr('data-id', vehicleAllView.current["id"]);
                    $("input[id='vehicleNumber']").val(vehicleAllView.current["vehicleNumber"]);
                    $("input[id='owner']").val(vehicleAllView.current["owner"]);
                    $("input[id='long']").val(size[0]);
                    $("input[id='wide']").val(size[1]);
                    $("input[id='high']").val(size[2]);
                    $("input[id='weight']").val(vehicleAllView.current["weight"]);
                    $("input[id='garage']").val(vehicleAllView.current["garagesName"]);
                    $("input[id='garage']").attr('data-id', vehicleAllView.current["garage_id"]);
                    $("input[id='vehicleType_id']").val(vehicleAllView.current["name"]);
                    $("input[id='trademark']").val(vehicleAllView.current["trademark"]);
                    $("input[id='yearOfProduction']").val(vehicleAllView.current["yearOfProduction"]);
                    $("#vehicleType_id").attr('data-id', vehicleAllView.current["vehicleType_id"]);
                    $("textarea[id='noteVehicle']").val(vehicleAllView.current["note"]);
                    vehicleAllView.text2.settext(vehicleAllView.current["nameDriver"]);
                    $("#my-id").attr('data-id', vehicleAllView.current["idDriver"]);

                },
                fillFormDataToCurrentObject: function () {
                    var long = $("input[id='long']").val();
                    var wide = $("input[id='wide']").val();
                    var high = $("input[id='high']").val();
                    if (long == '' && wide == '' && high == '') {
                        var size = '';
                    } else {
                        var size = long.concat(' x ' + wide + ' x ' + high);
                    }
                    if (vehicleAllView.action == 'add') {
                        vehicleAllView.current = {
                            areaCode: $("input[id='areaCode']").val(),
                            vehicleNumber: $("input[id='vehicleNumber']").val(),
                            vehicleType_id: $("#vehicleType_id").attr('data-id'),
                            owner: $("input[id='owner']").val(),
                            size: size,
                            weight: $("input[id='weight']").val(),
                            note: $("textarea[id='noteVehicle']").val(),
                            trademark: $("input[id='trademark']").val(),
                            yearOfProduction: $("input[id='yearOfProduction']").val(),
                            garage_id: $("input[id=garage]").attr('data-id'),
                            idDriver: $("#my-id").attr('data-id')
                        };
                    } else if (vehicleAllView.action == 'update') {
                        vehicleAllView.current.areaCode = $("input[id='areaCode']").val();
                        vehicleAllView.current.vehicleNumber = $("input[id='vehicleNumber']").val();
                        vehicleAllView.current.vehicleType_id = $("#vehicleType_id").attr('data-id');
                        vehicleAllView.current.owner = $("input[id='owner']").val().toUpperCase();
                        vehicleAllView.current.size = size;
                        vehicleAllView.current.weight = $("input[id='weight']").val();
                        vehicleAllView.current.note = $("textarea[id='noteVehicle']").val();
                        vehicleAllView.current.trademark = $("input[id='trademark']").val();
                        vehicleAllView.current.yearOfProduction = $("input[id='yearOfProduction']").val();
                        vehicleAllView.current.idDriver = $("#my-id").attr('data-id');
                        vehicleAllView.current.garage_id = $("input[id=garage]").attr('data-id');
                    }
                },
                deleteVehicle: function () {
                    vehicleAllView.action = 'delete';
                    vehicleAllView.saveVehicle();
                    $("#modalConfirm").modal('hide');
                },
                saveVehicle: function () {
                    var sendToServer = null;
                    if (vehicleAllView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: vehicleAllView.action,
                            _id: vehicleAllView.idDelete
                        };
                        $.ajax({
                            url: url + 'vehicle-all-management/post-data-vehicle',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var vehicleOld = _.find(vehicleAllView.dataVehicle, function (o) {
                                    return o.id == sendToServer._id;
                                });
                                var indexOfVehicleOld = _.indexOf(vehicleAllView.dataVehicle, vehicleOld);
                                vehicleAllView.dataVehicle.splice(indexOfVehicleOld, 1);
                                vehicleAllView.showNotification("success", "Xóa thành công!");
                                vehicleAllView.displayModal("hide", "#modal-confirmDeleteVehicle");
                            }
                            vehicleAllView.table.clear().rows.add(vehicleAllView.dataVehicle).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        vehicleAllView.vehicleValidate();
                        vehicleAllView.fillFormDataToCurrentObject();
                        var areaCode = $("input[id=areaCode]").val();
                        var vehicleNumber = $("input[id=vehicleNumber]").val();
                        var fullNumber = areaCode + vehicleNumber;
                        var vehicle = _.filter(vehicleAllView.dataVehicle, function (o) {
                            return o.areaCode + o.vehicleNumber == fullNumber;
                        });
                        if (vehicle != 0 && vehicleAllView.action == "add") {
                            showNotification("warning", "Xe đã tồn tại!");
                            return;
                        }
                        if ($("#frmVehicle").valid()) {
                            if ($("#vehicleType_id").attr("data-id") == '') {
                                showNotification("warning", "Loại xe không tồn tại!");
                                $("#vehicleType_id").focus();
                                return;
                            }
                            else if ($("#garage").attr("data-id") == '' && $("#garage").attr("data-id") == 0) {
                                showNotification("warning", "Nhà xe không tồn tại!");
                                $("#garage").focus();
                                return;
                            }
                            sendToServer = {
                                _token: _token,
                                _action: vehicleAllView.action,
                                _vehicle: vehicleAllView.current
                            };
                            $.ajax({
                                url: url + 'vehicle-all-management/post-data-vehicle',
                                type: "POST",
                                dataType: "json",
                                data: sendToServer
                            }).done(function (data, textStatus, jqXHR) {
                                if (jqXHR.status == 201) {
                                    var tableId = null;
                                    switch (vehicleAllView.action) {
                                        case 'add':
                                            tableId = data['newVehicle'].id;
                                            data['newVehicle'].fullNumber = data['newVehicle']['areaCode'] + "-" + data['newVehicle']["vehicleNumber"];
                                            vehicleAllView.dataVehicle.push(data['newVehicle']);
                                            vehicleAllView.showNotification("success", "Thêm thành công!");
                                            vehicleAllView.clearInputFormVehicle();
                                            break;
                                        case 'update':
                                            tableId = data['updateVehicle'].id;
                                            data['updateVehicle'].fullNumber = data['updateVehicle']['areaCode'] + "-" + data['updateVehicle']["vehicleNumber"];
                                            var vehicleOld = _.find(vehicleAllView.dataVehicle, function (o) {
                                                return o.id == sendToServer._vehicle.id;
                                            });
                                            var indexOfVehicleOld = _.indexOf(vehicleAllView.dataVehicle, vehicleOld);
                                            vehicleAllView.dataVehicle.splice(indexOfVehicleOld, 1, data['updateVehicle']);
                                            vehicleAllView.showNotification("success", "Cập nhật thành công!");
                                            vehicleAllView.hide();
                                            break;
                                        default:
                                            break;
                                    }

                                    if ($("input[id=file]").val() != "") {
                                        $("input[id=tableId]").val(tableId);
                                        vehicleAllView.uploadMultiFile();
                                    }

                                    vehicleAllView.table.clear().rows.add(vehicleAllView.dataVehicle).draw();
                                } else {
                                    vehicleAllView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }
                            }).fail(function (jqXHR, textStatus, errorThrown) {
                                vehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            });

                        //    }
                        } else {
                            $("form#frmVehicle").find("label[class=error]").css("color", "red");
                        }
                    }

                },
                msgDelete: function (id) {
                    if (id) {
                        vehicleAllView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("h5#modalContent").empty().append("Bạn có muốn xóa xe này ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                clearIp: function (flag) {
                    if (flag == 'typeVehicle') {
                        if ($('input[id=vehicleType_id]').val() == "") {
                            $("#vehicleType_id").attr('data-id', '');
                        }
                    } else if (flag == 'garage') {
                        if ($('input[id=garage]').val() == "") {
                            $("#garage").attr('data-id', '');
                        }
                    }
                },
                saveVehicleType: function () {
                //    vehicleAllView.vehicleTypeValidate();
                    var vehicleType = null;
                    if ($("#vehicleType_id").attr("data-id") != "") {
                        vehicleType = {
                            vehicleType: $("input[id='vehicleType']").val(),
                            description: $("textarea[id='description']").val(),
                            id: $("#vehicleType_id").attr('data-id')
                        };
                    } else {
                        vehicleType = {
                            vehicleType: $("input[id='vehicleType']").val(),
                            description: $("textarea[id='description']").val()
                        };
                    }
                    var sendToServer = {
                        _token: _token,
                        _action: vehicleAllView.actionVehicleType,
                        _vehicleType: vehicleType
                    };

                    if ($("#frmVehicleType").valid()) {
                        $.ajax({
                            url: url + 'all-vehicle-type/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var nameVehicleType = null;
                                switch (vehicleAllView.actionVehicleType) {
                                    case 'addNewVehicleType':
                                        vehicleAllView.dataVehicleType = data['dataVehicleTypes'];
                                        vehicleAllView.showNotification("success", "Thêm mới loại xe thành công");
                                        vehicleAllView.displayModal("hide", "#modal-addVehicleType");
                                        vehicleAllView.renderAutoCompleteSearch();
                                        nameVehicleType = $('input[id=vehicleType]').val();
                                        var idVehicleType = data['dataVehicleTypes']['id'];
                                        nameVehicleType = $('input[id=vehicleType]').val();
                                        $('input[id=vehicleType_id]').val(nameVehicleType);
                                        $("#vehicleType_id").attr("data-id", idVehicleType);
                                        if ($("input[id='areaCode']").attr('data-id') != "") {
                                            vehicleAllView.action = "update";
                                        } else {
                                            vehicleAllView.action = "add";
                                        }

                                        break;
                                    case 'updateVehicleType':
                                        vehicleAllView.dataVehicleType = data['updateVehicleTypes'];
                                        vehicleAllView.showNotification("success", "Cập nhật loại xe thành công");
                                        vehicleAllView.displayModal("hide", "#modal-addVehicleType");
                                        vehicleAllView.renderAutoCompleteSearch();
                                        nameVehicleType = $('input[id=vehicleType]').val();
                                        $('input[id=vehicleType_id]').val(nameVehicleType);
                                        if ($("input[id='areaCode']").attr('data-id') != "") {
                                            vehicleAllView.action = "update";
                                        } else {
                                            vehicleAllView.action = "add";
                                        }


                                        break;
                                    default:
                                        break;
                                }

                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmVehicleType").find("label[class=error]").css("color", "red");
                    }
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
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
                    vehicleAllView.displayModal("hide", "#modal-confirmUpdate");
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (vehicleAllView.action == 'update' && type == 'hide') {
                        vehicleAllView.action = null;
                        vehicleAllView.idUpdate = null;
                    }

                },
                updateStatus: function (value, idVehicle) {
                    var sendToServer = {
                        _token: _token,
                        _action: 'updateStatus',
                        _status: value,
                        _flag: '0',
                        _idVehicle: idVehicle
                    };
                    $.ajax({
                        url: url + 'vehicle-all-management/post-data-vehicle',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            data['updateStatus'].fullNumber = data['updateStatus']['areaCode'] + "-" + data['updateStatus']["vehicleNumber"];
                            var vehicleOld = _.find(vehicleAllView.dataVehicle, function (o) {
                                return o.id == sendToServer._idVehicle;
                            });
                            var indexOfVehicleOld = _.indexOf(vehicleAllView.dataVehicle, vehicleOld);
                            vehicleAllView.dataVehicle.splice(indexOfVehicleOld, 1, data['updateStatus']);
                            vehicleAllView.showNotification("success", "Cập nhật trạng thái xe thành công!");
                            vehicleAllView.hide();
                        }
                        vehicleAllView.table.clear().rows.add(vehicleAllView.dataVehicle).draw();

                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        vehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                changeStatus: function (value) {
                    var sendToServer = null;
                    array = $.map(vehicleAllView.table.rows('.selected').data(), function (value, index) {
                        return [value];
                    });
                    vehicleAllView.array_vehicleId = [];
                    vehicleAllView.array_vehicleId = _.map(array, 'id');
                    if (vehicleAllView.array_vehicleId.length > 0) {
                        sendToServer = {
                            _token: _token,
                            _action: 'updateStatus',
                            _status: value,
                            _flag: '1',
                            _idVehicle: vehicleAllView.array_vehicleId
                        };
                        $.ajax({
                            url: url + 'vehicle-all-management/post-data-vehicle',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                for (var index in data['updateStatus']) {
                                    data['updateStatus'][index].fullNumber = data['updateStatus'][index]['areaCode'] + "-" + data['updateStatus'][index]["vehicleNumber"];
                                }
                                vehicleAllView.dataVehicle = data['updateStatus'];
                                vehicleAllView.showNotification("success", "Cập nhật trạng thái xe thành công!");
                                vehicleAllView.hide();
                            }
                            vehicleAllView.table.clear().rows.add(vehicleAllView.dataVehicle).draw();

                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        sendToServer = {
                            _token: _token,
                            _action: 'searchStt',
                            _status: value
                        };
                        $.ajax({
                            url: url + 'vehicle-all-management/post-data-vehicle',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                for (var index in data['searchStatus']) {
                                    data['searchStatus'][index].fullNumber = data['searchStatus'][index]['areaCode'] + "-" + data['searchStatus'][index]["vehicleNumber"];
                                }
                                vehicleAllView.dataVehicle = data['searchStatus'];
                            }
                            vehicleAllView.table.clear().rows.add(vehicleAllView.dataVehicle).draw();

                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }
                },
                deselectAll: function () {
                    $('#ToolTables_table-data_1').click();
                },
                historyPt: function (id) {
                    vehicleAllView.deselectAll();
                    vehicleAllView.displayModal('show', '#modal-historyPt');
                    var sendToServer = {
                        _token: _token,
                        _action: 'history',
                        _idVehicle: id
                    };
                    $.ajax({
                        url: url + 'vehicle-all-management/post-data-vehicle',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            vehicleAllView.dataHistory = data['listHistory'];
                            vehicleAllView.fillDataToDatatableHistory(data['listHistory']);
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        vehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                },
                fillDataToDatatable: function (data, status) {
                    if (vehicleAllView.table != null) {
                        vehicleAllView.table.destroy();
                    }
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['areaCode'] == null || data[i]['vehicleNumber'] == null) ? "" : data[i]['areaCode'] + "-" + data[i]['vehicleNumber'];
                    }
                    var lstStatus = [];
                    for (var j = 0; j < status.length; j++) {
                        status[j].status = status[j]['status'];
                        status[j].status_id = status[j]['id'];
                        lstStatus.push({id: status[j]['id'], status: status[j]['status']});
                    }

                    vehicleAllView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullNumber'},
                            {data: 'garagesName'},
                            {data: 'name'},
                            {data: 'trademark'},
                            {data: 'yearOfProduction'},
                            {data: 'size'},
                            {data: 'weight'},
                            {
                                render: function (data, type, full, meta) {
                                    var color_vehicle = '';
                                    switch (full.status_id) {
                                        case 2:
                                            color_vehicle = 'text-primary';
                                            break;
                                        case 3:
                                            color_vehicle = 'text-success';
                                            break;
                                        case 4:
                                            color_vehicle = 'text-danger';
                                            break;
                                    }
                                    var tr = "";
                                    tr += '<div class="row">';
                                    tr += '<div class="col-md-2 col-sm-2">';
                                    tr += '<i style="width: 50%; display: inline-block; font-size: 20px;" class="fa fa-truck ' + color_vehicle + '" aria-hidden="true"></i>';
                                    tr += '</div>';
                                    tr += '<div class="col-md-6 col-sm-6">';
                                    tr += '<select class="form-control" onchange="vehicleAllView.updateStatus(this.value,' + full.id + ')">';
                                    for (var status in lstStatus) {
                                        var select = "";
                                        if (lstStatus[status]['id'] == full.status_id) {
                                            select = 'selected';
                                        }
                                        tr += '<option value="' + lstStatus[status]['id'] + '"' + select + '>';
                                        tr += lstStatus[status]['status'];
                                        tr += '</option>';
                                    }
                                    tr += '</select>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            },
                        //    {
                        //        render: function (data, type, full, meta) {
                        //            var tr = '';
                        //            tr += '<div class="col-md-6 col-sm-6">';
                        //            tr += '<select class="form-control" onchange="vehicleAllView.updateStatus(this.value,' + full.id + ')">';
                        //            for (var status in lstStatus) {
                        //                var select = "";
                        //                if (lstStatus[status]['id'] == full.status_id) {
                        //                    select = 'selected';
                        //                }
                        //                tr += '<option value="' + lstStatus[status]['id'] + '"' + select + '>';
                        //                tr += lstStatus[status]['status'];
                        //                tr += '</option>';
                        //            }
                        //            tr += '</select>';
                        //            tr += '</div>';
                        //            return tr;
                        //        }
                        //    },
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sữa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="vehicleAllView.editVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="vehicleAllView.msgDelete(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-primary btn-circle" onclick="vehicleAllView.historyPt(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-list"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        dom: 'T<"clear">frtip',
                        tableTools: {
                            "sRowSelect": "multi",
                            "aButtons": ["select_all", "select_none"]
                        }
                    });
                },
                fillDataToDatatableHistory: function (data, status) {
                    if (vehicleAllView.tableHistory != null) {
                        vehicleAllView.tableHistory.destroy();
                    }
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['areaCode'] == null || data[i]['vehicleNumber'] == null) ? "" : data[i]['areaCode'] + "-" + data[i]['vehicleNumber'];
                    }
                    vehicleAllView.tableHistory = $('#table-historyPt').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullNumber'},
                            {data: 'fullName'},
                            {
                                data: 'date_created',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            }
                        ]
                    });
                    $("#table-historyPt").css("width", "100%");
                },
                showFormAttachFile: function () {
                    if (vehicleAllView.current != null) {
                        $("input[name=tableId]").val(vehicleAllView.current.id);
                        vehicleAllView.retrieveMultiFile();
                    }
                    else {
                        if (vehicleAllView.tableFile != null)
                            vehicleAllView.tableFile.clear().draw();
                    }

                    vehicleAllView.displayModal('show', '#modal-attachFile');
                },
                uploadMultiFile: function () {
                    $.ajax({
                        url: url + 'file/upload-file',
                        type: 'POST',
                        data: new FormData(document.getElementById('upload')),
                        processData: false,  // tell jQuery not to process the data
                        contentType: false,  // tell jQuery not to set contentType
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            showNotification("success", "Thêm tập tin thành công!");
                            $("input[id=file]").val('');
                            $("input[id=tableId]").val('');
                            $("div[id=thumbnail]").html('');
                            vehicleAllView.displayModal("hide", "#modal-attachFile");
                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                retrieveMultiFile: function () {
                    var sendToServer = {
                        _token: _token,
                        tableId: vehicleAllView.current.id,
                        tableName: $("input[id=tableName]").val()
                    };
                    $.ajax({
                        url: url + 'file/retrieve-file',
                        type: 'POST',
                        data: sendToServer,
                        dataType: 'json'
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            var files = data['files'];
                            console.log(files);
                            vehicleAllView.fillFileToDatatable(files);
                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                fillFileToDatatable: function (data) {
                    if (vehicleAllView.tableFile != null)
                        vehicleAllView.tableFile.destroy();

                    vehicleAllView.tableFile = $('#table-file').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {
                                data: 'fileName',
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    //    tr += "<span onclick='transportView.downloadFile("+full.id+")'>" + full.fileName + "</span>";
                                    tr += "<a href='" + full.filePath + "' download>" + full.fileName + "</a>";
                                    return tr;
                                }
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div title="Xem" class="btn btn-primary btn-circle text-center" onclick="vehicleAllView.showThumbnail(\'' + full.filePath + '\')">';
                                    tr += '<i class="fa fa-eye"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                },
                                visible: false
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="text-center">';
                                    tr += '<div title="Xóa" class="btn btn-danger btn-circle" onclick="vehicleAllView.deleteFile(' + full.id + ')">';
                                    tr += '<i class="fa fa-trash"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        dom: "t"
                    });
                },
                showThumbnail: function (filePath) {
                    var tr = "";
                    tr += "<embed src='" + filePath + "'>";
                    $("#thumbnail").html(tr);
                },
                deleteFile: function (fileId) {
                    $.ajax({
                        url: url + 'file/delete-file/' + fileId,
                        type: 'GET'
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            var files = data['files'];
                            vehicleAllView.tableFile.clear().rows.add(files).draw();
                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                downloadFile: function (fileId) {
                    $.ajax({
                        url: url + 'vehicle-all/download-file/' + fileId,
                        type: 'GET'
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            console.log(data);
                        } else {
                            showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                }
            };
            vehicleAllView.loadData();
        }
        else {
            vehicleAllView.loadData();
        }
    });
</script>

