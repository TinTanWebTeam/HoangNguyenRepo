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

    .marginRight{
        margin-right: 5px;
    }

    @media (max-height: 500px) {
        #divControl {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }
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
                        <div class="btn btn-primary btn-circle btn-md" onclick="vehicleInsideView.addVehicle();">
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
                                <th>Mã vùng</th>
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
        <div class="panel panel-primary">
            <div class="panel-heading">Thêm mới xe
                <div class="menu-toggles pull-right" onclick="vehicleInsideView.hide()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="col-sm-12">
                            <div class="row ">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="garages_name"><b>Nhà xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-10 col-xs-10">
                                                <input type="text" class="form-control"
                                                       id="garages_name" data-id=""
                                                       name="garages_name"
                                                       placeholder="" ondblclick="vehicleInsideView.searchGarage()">
                                            </div>
                                            <div class="col-sm-2 col-xs-2">
                                                <div class="btn btn-primary btn-sm btn-circle"
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
                                                <div class="btn btn-primary btn-sm btn-circle"
                                                     onclick="vehicleInsideView.displayModal('show', '#modal-addVehicleType')">
                                                    <i class="glyphicon glyphicon-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="areaCode"><b>Mã vùng</b></label>
                                        <input type="text" class="form-control"
                                               id="areaCode" name="areaCode"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="vehicleNumber"><b>Số xe</b></label>
                                        <input type="number" class="form-control"
                                               id="vehicleNumber" name="vehicleNumber"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="size"><b>Kích thước</b></label>
                                        <input type="number" class="form-control"
                                               id="size" name="size"
                                               placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="weight"><b>Trọng tải</b></label>
                                        <input type="number" class="form-control"
                                               id="weight" name="weight"
                                               placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary marginRight"
                                            onclick="vehicleInsideView.save()">
                                        Hoàn tất
                                    </button>
                                    <button type="button" class="btn default" onclick="vehicleInsideView.clearInput()">Huỷ</button>
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

<!-- Modal list garages -->
<div class="row">
    <div id="modal-garage" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách nhà xe</h4>
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
                    <form>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Garage_name"><b>Tên nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="Garage_name"
                                           name="Garage_name"
                                           placeholder="Tên nhà xe">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="contactor"><b>Người liên hệ</b></label>
                                    <input type="text" class="form-control"
                                           id="contactor"
                                           name="contactor"
                                           placeholder="Người liên hệ">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="phone"><b>Số điện thoại</b></label>
                                    <input type="text" class="form-control"
                                           id="phone"
                                           name="phone"
                                           placeholder="090..">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="address"><b>Địa chỉ</b></label>
                                    <input type="text" class="form-control"
                                           id="address"
                                           name="address"
                                           placeholder="Địa chỉ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-8 col-md-4">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="vehicleInsideView.saveGarage()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default" onclick="vehicleInsideView.displayModal('hide','#modal-addGarage')">Huỷ</button>
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
                    <form>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="VehicleType_name"><b>Tên loại xe</b></label>
                                    <input type="text" class="form-control"
                                           id="VehicleType_name"
                                           name="VehicleType_name"
                                           placeholder="Tên nhà xe">
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
                                                onclick="vehicleInsideView.saveVehicleType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default" onclick="vehicleInsideView.displayModal('hide','#modal-addVehicleType')">Huỷ</button>
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
                            <button type="button" class="btn green marginRight" name="modalAgree"
                                    onclick="vehicleInsideView.save()">Ðồng ý
                            </button>
                            <button type="button" class="btn dark btn-outline" name="modalClose"
                                    onclick="vehicleInsideView.displayModal('hide','#modal-confirmDelete')">Hủy
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Vehicle -->

<script>
    $(function () {
        if (typeof (vehicleInsideView) === 'undefined') {
            vehicleInsideView = {
                table: null,
                tableGarage: null,
                tableVehicleType: null,
                data: null,
                current: null,
                action: null,
                idDelete: null,
                show: function () {
                    $('.menu-toggle').hide();
                    $('#divControl').slideDown();
                },
                hide: function () {
                    $('#divControl').slideUp('', function () {
                        $('.menu-toggle').show();
                    });

                    var myForm = document.getElementById("frmControl");
                    vehicleInsideView.clearValidation(myForm);

                    vehicleInsideView.clearInput();
                },
                loadData: function () {
                    $.get(url + 'vehicle-inside/vehicles', function (arrayData) {
                        vehicleInsideView.data = arrayData['vehicles'];
                        vehicleInsideView.fillDataToDatatable(arrayData['vehicles']);

                        vehicleInsideView.tableVehicleType = arrayData['vehicleTypes'];
                        vehicleInsideView.loadSelectBox(arrayData['vehicleTypes']);
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
                localSearch: function () {
                    var dataSearch = _.filter(vehicleInsideView.data, function (o) {
                        return o.vehicleNumber == "15432";
                    });
                    vehicleInsideView.fillDataToDatatable(dataSearch);
                },
                fillDataToDatatable: function (data) {
                    vehicleInsideView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'areaCode'},
                            {data: 'vehicleNumber'},
                            {data: 'vehicleTypes_name'},
                            {data: 'garages_name'},
                            {data: 'size'},
                            {data: 'weight'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="vehicleInsideView.editVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
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
                editVehicle: function (id) {
                    vehicleInsideView.current = null;
                    vehicleInsideView.current = _.clone(_.find(vehicleInsideView.data, function (o) {
                        return o.id == id;
                    }), true);
                    vehicleInsideView.fillCurrentObjectToForm();
                    vehicleInsideView.action = 'update';
                    vehicleInsideView.show();
                },
                addVehicle: function () {
                    vehicleInsideView.current = null;
                    vehicleInsideView.action = 'add';
                    vehicleInsideView.show();
                },
                deleteVehicle: function (id) {
                    vehicleInsideView.action = 'delete';
                    vehicleInsideView.idDelete = id;
                    vehicleInsideView.displayModal("show", "#modal-confirmDelete");
                },
                displayModal: function(type, idModal){
                    $(idModal).modal(type);
                    if(vehicleInsideView.action == 'delete' && type == 'hide'){
                        vehicleInsideView.action = null;
                        vehicleInsideView.idDelete = null;
                    }
                },
                fillCurrentObjectToForm: function () {
                    $("input[id='areaCode']").val(vehicleInsideView.current["areaCode"]);
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
                            weight: $("input[id='weight']").val()
                        };
                    } else if (vehicleInsideView.action == 'update') {
                        vehicleInsideView.current.garage_id = $('#garages_name').attr('data-id');
                        vehicleInsideView.current.vehicleType_id = $('#vehicleTypes_name').val();
                        vehicleInsideView.current.vehicleNumber = $("input[id='vehicleNumber']").val();
                        vehicleInsideView.current.areaCode = $("input[id='areaCode']").val();
                        vehicleInsideView.current.size = $("input[id='size']").val();
                        vehicleInsideView.current.weight = $("input[id='weight']").val();
                    }
                },
                clearInput: function () {
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
//                    $("select[id='vehicleTypes_name']").val('');
                    $("input[id='garages_name']").val('');
                    $("#garages_name").attr('data-id', '');
                    vehicleInsideView.current = null;
                },
                showNotification: function (type ,msg) {
                    switch (type){
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
                save: function () {
                    vehicleInsideView.formValidate();
                    if ($("#frmControl").valid()) {
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
                                        vehicleInsideView.data.push(data['vehicle'][0]);
                                        vehicleInsideView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var vehicleOld = _.find(vehicleInsideView.data, function (o) {
                                            return o.id == sendToServer._vehicle.id;
                                        });
                                        var indexOfVehicleOld = _.indexOf(vehicleInsideView.data, vehicleOld);
                                        vehicleInsideView.data.splice(indexOfVehicleOld, 1, data['vehicle'][0]);
                                        vehicleInsideView.showNotification("success", "Cập nhật thành công!");
                                        vehicleInsideView.hide();
                                        break;
                                    case 'delete':
                                        var vehicleOld = _.find(vehicleInsideView.data, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfVehicleOld = _.indexOf(vehicleInsideView.data, vehicleOld);
                                        vehicleInsideView.data.splice(indexOfVehicleOld, 1);
                                        vehicleInsideView.showNotification("success", "Xóa thành công!");
                                        vehicleInsideView.displayModal("hide", "#modal-confirmDelete")
                                        break;
                                    default:
                                        break;
                                }
                                vehicleInsideView.table.clear().rows.add(vehicleInsideView.data).draw();
                                vehicleInsideView.clearInput();
                            } else {
                                vehicleInsideView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    }
                },
                searchGarage: function () {
                    $.get(url + 'vehicle-inside/garages', function (listGarage) {
                        if (vehicleInsideView.tableGarage != null) {
                            vehicleInsideView.tableGarage.destroy();
                        }
                        vehicleInsideView.tableGarage = $('#table-garage').DataTable({
                            language: languageOptions,
                            data: listGarage,
                            columns: [
                                {data: 'id'},
                                {data: 'name'},
                                {data: 'contactor'},
                                {data: 'address'},
                                {data: 'phone'}
                            ]
                        })
                    });
                    vehicleInsideView.displayModal("show", "#modal-garage")
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
                clearValidation: function (formElement) {
                    //Internal $.validator is exposed through $(form).validate()
                    var validator = $(formElement).validate();
                    //Iterate through named elements inside of the form, and mark them as error free
                    $('[name]', formElement).each(function () {
                        validator.successList.push(this);//mark as error free
                        validator.showErrors();//remove error messages if present
                    });
                    validator.resetForm();//remove error class on name elements and clear history
                    validator.reset();//remove all error and success data
                },
                saveGarage: function(){
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
                            $("input[id='garages_name']").val(data["garage"]["name"]);
                            $("#garages_name").attr('data-id', data["garage"]["id"]);
                        } else {
                            vehicleInsideView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                saveVehicleType: function(){
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
                        console.log(data);
                        if (jqXHR.status == 201) {
                            vehicleInsideView.showNotification("success", "Thêm thành công!");
                            vehicleInsideView.displayModal("hide", "#modal-addVehicleType");
                            vehicleInsideView.tableVehicleType.push(data['vehicleType']);
                            vehicleInsideView.loadSelectBox(vehicleInsideView.tableVehicleType);
                            $("select[id='vehicleTypes_name']").val(data['vehicleType']['id']);
                        } else {
                            vehicleInsideView.showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        vehicleInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                }
            };
            vehicleInsideView.loadData();
        } else {
            vehicleInsideView.loadData();
        }

        $("#table-garage").find("tbody").on('click', 'tr', function () {
            $('#garages_name').attr('data-id', $(this).find('td:first')[0].innerText);
            $('#garages_name').val($(this).find('td:eq(1)')[0].innerText);
            vehicleInsideView.displayModal("hide", "#modal-garage");
        });
    });
</script>
