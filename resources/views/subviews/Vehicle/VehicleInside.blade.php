<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 40%;
        display: none;
        right: 0;
        height: 60vh;
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
        height: 320px;
    }
</style>

<!-- Table -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL xe</a></li>
                        <li class="active">Xe</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="vehicleInsideView.addVehicle();">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="table-data">
                            <thead>
                            <tr class="active">
                                <th>Mã xe</th>
                                <th>Chủ xe</th>
                                <th>Số xe</th>
                                <th>Loại xe</th>
                                <th>Nhà xe</th>
                                <th>Kích thước</th>
                                <th>Trọng tải</th>
                                <th>Sửa/ Xóa</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div>
<!-- end Table -->

<!-- Control -->
<div class="row">
    <div id="divControl" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl">Thêm mới xe</span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="vehicleInsideView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="garages_name"><b>Nhà xe</b></label>
                                    <div class="row">
                                        <div class="col-sm-10 col-xs-10">
                                            <input type="text" class="form-control" id="garages_name" data-garageId=""
                                                   name="garages_name">
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            <div class="btn btn-primary btn-sm btn-circle" title="Thêm giá mới"
                                                 onclick="vehicleInsideView.displayModal('show', '#modal-addGarage')">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleType_id"><b>Loại xe</b></label>
                                    <div class="row">
                                        <div class="col-sm-10 col-xs-10">
                                            <select class="form-control" id="vehicleTypes_name"
                                                    name="vehicleTypes_name">
                                            </select>
                                        </div>
                                        <div class="col-sm-2 col-xs-2">
                                            <div class="btn btn-primary btn-sm btn-circle" title="Thêm xe mới"
                                                 onclick="vehicleInsideView.displayModal('show', '#modal-addVehicleType')">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group form-md-line-input">
                                    <label for="areaCode"><b>Mã vùng</b></label>
                                    <input type="text" class="form-control uppercase" id="areaCode" name="areaCode">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleNumber"><b>Số xe</b></label>
                                    <input type="number" class="form-control" id="vehicleNumber" name="vehicleNumber">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group form-md-line-input">
                                    <label for="owner"><b>Chủ xe</b></label>
                                    <input type="text" class="form-control" id="owner" name="owner">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="size"><b>Kích thước</b></label>
                                    <input type="number" class="form-control" id="size" name="size">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-md-line-input">
                                    <label for="weight"><b>Trọng tải</b></label>
                                    <input type="number" class="form-control" id="weight" name="weight">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group form-md-line-input">
                                    <label for="driver"><b>Tài xế</b></label>
                                    <input type="text" class="form-control" id="driver" name="driver">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="vehicleInsideView.save()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="vehicleInsideView.clearInput()">Nhập lại
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end #divControl -->
</div>
<!-- end Control -->

<!-- Modal confirm delete Vehicle -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa xe này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="vehicleInsideView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="vehicleInsideView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Vehicle -->

<!-- Modal add garage -->
<div class="row">
    <div id="modal-addGarage" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm nhà xe</h4>
                </div>
                <div class="modal-body">
                    <form id="frmGarage">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Garage_name"><b>Tên nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="Garage_name"
                                           name="Garage_name">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="contactor"><b>Người liên hệ</b></label>
                                    <input type="text" class="form-control"
                                           id="contactor"
                                           name="contactor">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="phone"><b>Số điện thoại</b></label>
                                    <input type="number" class="form-control"
                                           id="phone"
                                           name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="address"><b>Địa chỉ</b></label>
                                    <input type="text" class="form-control"
                                           id="address"
                                           name="address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-7 col-md-5">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button class="btn btn-primary marginRight"
                                                onclick="vehicleInsideView.saveGarage()">Hoàn tất
                                        </button>
                                        <button class="btn default" onclick="vehicleInsideView.clearInputFormGarage()">
                                            Nhập lại
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
<!-- end Modal add garages -->

<!-- Modal add vehicleTypes -->
<div class="row">
    <div id="modal-addVehicleType" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Thêm loại xe</h4>
                </div>
                <div class="modal-body">
                    <form id="frmVehicleType">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="VehicleType_name"><b>Tên loại xe</b></label>
                                    <input type="text" class="form-control"
                                           id="VehicleType_name"
                                           name="VehicleType_name">
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
                                        <button class="btn btn-primary marginRight"
                                                onclick="vehicleInsideView.saveVehicleType()">Hoàn tất
                                        </button>
                                        <button class="btn default"
                                                onclick="vehicleInsideView.clearInputFormVehicleType()">Nhập lại
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
<!-- end Modal add vehicleTypes -->

<script>
    $(function () {
        if (typeof (vehicleInsideView) === 'undefined') {
            vehicleInsideView = {
                table: null,
                tableGarage: null,
                tableVehicleType: null,
                tableVehicle: null,

                dataGarage: null,

                current: null,
                action: null,
                idDelete: null,
                tagsGarageName: [],
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });

                    vehicleInsideView.clearValidation("#frmControl");
                    vehicleInsideView.clearInput();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (vehicleInsideView.action == 'delete' && type == 'hide') {
                        vehicleInsideView.action = null;
                        vehicleInsideView.idDelete = null;
                    }

                    vehicleInsideView.clearValidation("#frmGarage");
                    vehicleInsideView.clearValidation("#frmVehicleType");
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
                clearInput: function () {
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                    $("input[id='garages_name']").val('');
                    $("#garages_name").attr('data-id', '');
                    vehicleInsideView.current = null;

                    $("input[id='VehicleType_name']").val('');
                    $("textarea[id='description']").val('');

                    $("input[id='Garage_name']").val('');
                    $("input[id='contactor']").val('');
                    $("input[id='phone']").val('');
                    $("input[id='address']").val('');
                    $("input[id='owner']").val('');
                },
                clearInputFormGarage: function () {
                    $("input[id='VehicleType_name']").val('');
                    $("textarea[id='description']").val('');

                    $("input[id='Garage_name']").val('');
                    $("input[id='contactor']").val('');
                    $("input[id='phone']").val('');
                    $("input[id='address']").val('');
                },
                clearInputFormVehicleType: function () {
                    $("input[id='VehicleType_name']").val('');
                    $("textarea[id='description']").val('');
                },

                renderEventClickTableModal: function () {
                    $("#table-garage").find("tbody").on('click', 'tr', function () {
                        $('#garages_name').attr('data-id', $(this).find('td:first')[0].innerText);
                        $('#garages_name').val($(this).find('td:eq(1)')[0].innerText);
                        vehicleInsideView.displayModal("hide", "#modal-garage");
                    });
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                renderAutoCompleteSearch: function () {
                    $("#garages_name").autocomplete({
                        source: vehicleInsideView.tagsGarageName
                    });
                },
                renderEventFocusOut: function () {
                    $("#garages_name").focusout(function () {
                        var garageName = this.value;
                        if (garageName == '') return;
                        var garage = _.find(vehicleInsideView.dataGarage, function (o) {
                            return o.name == garageName;
                        });
                        if (typeof garage === "undefined") {
                            vehicleInsideView.displayModal("show", "#modal-addGarage");
                            $("input[id=Garage_name]").val(garageName);
                        } else {
                            $("#garages_name").attr("data-garageId", garage.id);
                        }
                    });
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'vehicle-inside/vehicles',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            vehicleInsideView.tableVehicle = data['vehicles'];
                            vehicleInsideView.fillDataToDatatable(data['vehicles']);

                            vehicleInsideView.tableVehicleType = data['vehicleTypes'];
                            vehicleInsideView.loadSelectBox(data['vehicleTypes']);
                        } else {
                            vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    vehicleInsideView.loadListGarage();
                    vehicleInsideView.renderEventFocusOut();
                    vehicleInsideView.renderEventClickTableModal();
                    vehicleInsideView.renderScrollbar();
                },
                localSearch: function () {
                    var dataSearch = _.filter(vehicleInsideView.tableVehicle, function (o) {
                        return o.vehicleNumber == "15432";
                    });
                    vehicleInsideView.fillDataToDatatable(dataSearch);
                },
                loadSelectBox: function (lstVehicleType) {
                    //reset selectbox
                    $('#vehicleTypes_name')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("vehicleTypes_name");
                    for (var i = 0; i < lstVehicleType.length; i++) {
                        var opt = lstVehicleType[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstVehicleType[i]['id'];
                        select.appendChild(el);
                    }
                },
                loadListGarage: function () {
                    $.ajax({
                        url: url + 'vehicle-outside/garages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            vehicleInsideView.dataGarage = data['garages'];
                            vehicleInsideView.tagsGarageName = _.map(vehicleInsideView.dataGarage, 'name');
                            vehicleInsideView.tagsGarageName = _.union(vehicleInsideView.tagsGarageName);
                            vehicleInsideView.renderAutoCompleteSearch();
                        } else {
                            garageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        garageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },

                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['areaCode'] + '-' + data[i]['vehicleNumber'];
                    }

                    vehicleInsideView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'owner'},
                            {data: 'fullNumber'},
                            {data: 'vehicleTypes_name'},
                            {data: 'garages_name'},
                            {data: 'size'},
                            {data: 'weight'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="vehicleInsideView.editVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="vehicleInsideView.deleteVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        order: [[0, "desc"]],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                text: 'Sao chép',
                                exportOptions: {
                                    columns: [0, ':visible']
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                text: 'Xuất Excel',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'Xuất PDF',
                                message: 'Thống Kê Xe Từ Ngày ... Đến Ngày',
                                customize: function (doc) {
                                    doc.content.splice(0, 1);
                                    doc.styles.tableBodyEven.alignment = 'center';
                                    doc.styles.tableBodyOdd.alignment = 'center';
                                    doc.content.columnGap = 10;
                                    doc.pageOrientation = 'landscape';
                                    for (var i = 0; i < doc.content[1].table.body.length; i++) {
                                        for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                                            doc.content[1].table.body[i].splice(6, 1);
                                        }
                                    }
                                    doc.content[1].table.widths = ['*', '*', '*', '*', '*', '*'];
                                }
                            },
                            {
                                extend: 'colvis',
                                text: 'Ẩn cột'
                            }
                        ]
                    })
                },
                fillCurrentObjectToForm: function () {
                    $("input[id='areaCode']").val(vehicleInsideView.current["areaCode"]);
                    $("input[id='owner']").val(vehicleInsideView.current["owner"]);
                    $("input[id='vehicleNumber']").val(vehicleInsideView.current["vehicleNumber"]);
                    $("input[id='size']").val(vehicleInsideView.current["size"]);
                    $("input[id='weight']").val(vehicleInsideView.current["weight"]);
                    $("select[id='vehicleTypes_name']").val(vehicleInsideView.current["vehicleType_id"]);
                    $("input[id='garages_name']").val(vehicleInsideView.current["garages_name"]);
                    $("#garages_name").attr('data-id', vehicleInsideView.current["garage_id"]);
                },
                fillFormDataToCurrentObject: function () {
                    if (vehicleInsideView.action == 'add') {
                        vehicleInsideView.current = {
                            garage_id: $('#garages_name').attr('data-id'),
                            vehicleType_id: $('#vehicleTypes_name').val(),
                            vehicleNumber: $("input[id='vehicleNumber']").val(),
                            areaCode: $("input[id='areaCode']").val(),
                            size: $("input[id='size']").val(),
                            owner: $("input[id='owner']").val(),
                            weight: $("input[id='weight']").val()
                        };
                    } else if (vehicleInsideView.action == 'update') {
                        vehicleInsideView.current.garage_id = $('#garages_name').attr('data-id');
                        vehicleInsideView.current.vehicleType_id = $('#vehicleTypes_name').val();
                        vehicleInsideView.current.vehicleNumber = $("input[id='vehicleNumber']").val();
                        vehicleInsideView.current.areaCode = $("input[id='areaCode']").val();
                        vehicleInsideView.current.size = $("input[id='size']").val();
                        vehicleInsideView.current.weight = $("input[id='weight']").val();
                        vehicleInsideView.current.owner = $("input[id='owner']").val();
                    }
                },

                editVehicle: function (id) {
                    vehicleInsideView.current = null;
                    vehicleInsideView.current = _.clone(_.find(vehicleInsideView.tableVehicle, function (o) {
                        return o.id == id;
                    }), true);
                    vehicleInsideView.fillCurrentObjectToForm();
                    vehicleInsideView.action = 'update';
                    $("#divControl").find(".titleControl").html("Cập nhật xe");
                    vehicleInsideView.showControl();
                },
                addVehicle: function () {
                    vehicleInsideView.current = null;
                    vehicleInsideView.action = 'add';
                    $("#divControl").find(".titleControl").html("Thêm mới xe");
                    vehicleInsideView.showControl();
                },
                deleteVehicle: function (id) {
                    vehicleInsideView.action = 'delete';
                    vehicleInsideView.idDelete = id;
                    vehicleInsideView.displayModal("show", "#modal-confirmDelete");
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            garages_name: "required",
                            vehicleTypes_name: "required",
                            areaCode: "required",
                            vehicleNumber: "required"
                        },
                        messages: {
                            garages_name: "Vui lòng chọn nhà xe",
                            vehicleTypes_name: "Vui lòng chọn loại xe",
                            areaCode: "Vui lòng nhập mã vùng",
                            vehicleNumber: "Vui lòng nhập số xe"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
//                    var validator = $(idForm).validate();
//                    validator.resetForm();
                },
                validateGarage: function () {
                    $("#frmGarage").validate({
                        rules: {
                            Garage_name: "required",
                            contactor: "required",
                            phone: "required",
                            address: "required"
                        },
                        messages: {
                            Garage_name: "Vui lòng nhập tên nhà xe",
                            contactor: "Vui lòng nhập tên người liên hệ",
                            phone: "Vui lòng nhập số điện thoại người liên hệ",
                            address: "Vui lòng nhập điện chỉ nhà xe"
                        }
                    });
                },
                validateVehicleType: function () {
                    $("#frmVehicleType").validate({
                        rules: {
                            VehicleType_name: "required"
                        },
                        messages: {
                            VehicleType_name: "Vui lòng nhập tên loại xe"
                        }
                    });
                },

                save: function () {
                    vehicleInsideView.formValidate();
                    if ($("#frmControl").valid()) {
                        if (vehicleInsideView.action != 'delete') {
                            if ($("#garages_name").attr('data-id') == '') {
                                vehicleInsideView.showNotification('warning', 'Vui lòng chọn một nhà xe có trong danh sách.');
                                return;
                            }
                        }

                        vehicleInsideView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: vehicleInsideView.action,
                            _vehicle: vehicleInsideView.current
                        };
                        if (vehicleInsideView.action == 'delete') {
                            sendToServer._id = vehicleInsideView.idDelete;
                        }
                        $.ajax({
                            url: url + 'vehicle-inside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                switch (vehicleInsideView.action) {
                                    case 'add':
                                        data['vehicle'].fullNumber = data['vehicle']['areaCode'] + '-' + data['vehicle']['vehicleNumber'];
                                        vehicleInsideView.tableVehicle.push(data['vehicle']);
                                        vehicleInsideView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var vehicleOld = _.find(vehicleInsideView.tableVehicle, function (o) {
                                            return o.id == sendToServer._vehicle.id;
                                        });
                                        var indexOfVehicleOld = _.indexOf(vehicleInsideView.tableVehicle, vehicleOld);
                                        data['vehicle'].fullNumber = data['vehicle']['areaCode'] + '-' + data['vehicle']['vehicleNumber'];
                                        vehicleInsideView.tableVehicle.splice(indexOfVehicleOld, 1, data['vehicle']);
                                        vehicleInsideView.showNotification("success", "Cập nhật thành công!");
                                        vehicleInsideView.hideControl();
                                        break;
                                    case 'delete':
                                        var vehicleOld = _.find(vehicleInsideView.tableVehicle, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfVehicleOld = _.indexOf(vehicleInsideView.tableVehicle, vehicleOld);
                                        vehicleInsideView.tableVehicle.splice(indexOfVehicleOld, 1);
                                        vehicleInsideView.showNotification("success", "Xóa thành công!");
                                        vehicleInsideView.displayModal("hide", "#modal-confirmDelete");
                                        break;
                                    default:
                                        break;
                                }
                                vehicleInsideView.table.clear().rows.add(vehicleInsideView.tableVehicle).draw();
                                vehicleInsideView.clearInput();
                            } else {
                                vehicleInsideView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                },
                saveGarage: function () {
                    vehicleInsideView.validateGarage();
                    if ($("#frmGarage").valid()) {
                        var garage = {
                            name: $("input[id='Garage_name']").val(),
                            contactor: $("input[id='contactor']").val(),
                            phone: $("input[id='phone']").val(),
                            address: $("input[id='address']").val()
                        };

                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _garage: garage
                        };
                        $.ajax({
                            url: url + 'vehicle-outside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                vehicleInsideView.showNotification("success", "Thêm thành công!");
                                vehicleInsideView.displayModal("hide", "#modal-addGarage");
                                vehicleInsideView.clearInput();
                                //
                                $("input[id='garages_name']").val(data["garage"]["name"]);
                                $("#garages_name").attr('data-garageId', data["garage"]["id"]);
                            } else {
                                vehicleInsideView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmGarage").find("label[class=error]").css("color", "red");
                    }
                },
                saveVehicleType: function () {
                    vehicleInsideView.validateVehicleType();
                    if ($("#frmVehicleType").valid()) {
                        var vehicleType = {
                            name: $("input[id='VehicleType_name']").val(),
                            description: $("textarea[id='description']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _vehicleType: vehicleType
                        };
                        $.ajax({
                            url: url + 'vehicle-type/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                vehicleInsideView.showNotification("success", "Thêm thành công!");
                                vehicleInsideView.displayModal("hide", "#modal-addVehicleType");
                                vehicleInsideView.clearInput();
                                //
                                vehicleInsideView.tableVehicleType.push(data['vehicleType']);
                                vehicleInsideView.loadSelectBox(vehicleInsideView.tableVehicleType);
                                $("select[id='vehicleTypes_name']").val(data['vehicleType']['id']);
                            } else {
                                vehicleInsideView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmVehicleType").find("label[class=error]").css("color", "red");
                    }
                }
            };
            vehicleInsideView.loadData();
        } else {
            vehicleInsideView.loadData();
        }
    });
</script>
