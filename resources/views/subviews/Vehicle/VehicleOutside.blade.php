<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 40%;
        display: none;
        right: 0;
        height: 60vh;
        width: 45%;
    }

    #divControl_edit {
        z-index: 3;
        position: fixed;
        top: 20%;
        display: none;
        right: 0;
        height: 60vh;
        width: 80%;
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

    @media (max-height: 500px) {
        #divControl_edit {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }

    }

    #divControl .panel-body {
        height: 330px;
    }

    #divControl_edit .panel-body {
        height: 500px;
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
                        <li class="active">Xe ngoài</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới nhà xe ngoài"
                             onclick="garageOutSideView.addGarage();">
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
                                <th>Tên nhà xe</th>
                                <th>Địa chỉ</th>
                                <th>Người liên hệ</th>
                                <th>Số điện thoại</th>
                                <th>Xe</th>
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
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="garageOutSideView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="garage_name"><b>Tên nhà xe</b></label>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="garage_name"
                                                   name="garage_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-md-line-input">
                                    <label for="address"><b>Địa chỉ nhà xe</b></label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="contactor"><b>Người liên hệ</b></label>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <input class="form-control uppercase" id="contactor"
                                                   name="contactor">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-md-line-input">
                                    <label for="phone"><b>Số điện thoại</b></label>
                                    <input type="text" class="form-control " id="phone" name="phone">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group form-md-line-input">
                                    <label for="description"><b>Ghi chú</b></label>
                                    <textarea type="text" class="form-control" id="description"
                                              name="description"></textarea>
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
                                                onclick="vehicleInsideView.cancel()">Nhập lại
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

<!-- Control -->
<div class="row">
    <div id="divControl_edit" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="garageOutSideView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <form role="form" id="frmControl_edit">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="garage_name_edit"><b>Tên nhà xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <input type="text" class="form-control" id="garage_name_edit"
                                                       name="garage_name_edit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="address_edit"><b>Địa chỉ nhà xe</b></label>
                                        <input type="text" class="form-control" id="address_edit" name="address_edit">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="contactor_edit"><b>Người liên hệ</b></label>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <input class="form-control uppercase" id="contactor_edit"
                                                       name="contactor_edit">
                                                </input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group form-md-line-input">
                                        <label for="phone_edit"><b>Số điện thoại</b></label>
                                        <input type="text" class="form-control " id="phone_edit" name="phone_edit">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group form-md-line-input">
                                        <label for="description_edit"><b>Ghi chú</b></label>
                                        <textarea type="text" class="form-control" id="description_edit"
                                                  name="description_edit"></textarea>
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
                                                    onclick="vehicleInsideView.cancel()">Nhập lại
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12" style="padding: 0" align="center">
                            <span class="text text-primary" style="font-size: 23px">Danh sách xe trong nhà xe ngoài</span>
                            <div class="table-responsive">
                                <table style="width: 100%" class="table table-bordered table-hover"
                                       id="table-tableVehicle">
                                    <thead>
                                    <tr class="active">
                                        <th>Số xe</th>
                                        <th>Chủ xe</th>
                                        <th>Kích thước</th>
                                        <th>Trọng tải</th>
                                        <th>Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <form role="form" id="frmStaffCustomer">
                            <input id="idGarage" style="display: none;">
                            <input id="idVehicle" style="display: none;">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="areaCode"><b>Mã vùng</b></label>
                                            <input type="text" class="form-control"
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
                                            <label for="size"><b>Kích thước</b></label>
                                            <input type="number" class="form-control"
                                                   id="size"
                                                   name="size">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="weight"><b>Trọng tải</b></label>
                                            <input type="text" class="form-control"
                                                   id="weight"
                                                   name="weight">
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
                                                           class="form-control">
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <div class="btn btn-primary btn-sm btn-circle"
                                                         title="Thêm loại xe"
                                                         onclick="vehicleInsideView.displayModal('show', '#modal-addVehicleType')">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </div>
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
                                                        onclick="vehicleInsideView.saveVehicle()">
                                                    Hoàn tất
                                                </button>
                                                <button id="retype" type="button" class="btn default"
                                                        onclick="vehicleInsideView.clearInputStaff()">
                                                    Nhập lại
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
    </div> <!-- end #divControl -->
</div>
<!-- end Control -->


<!-- Modal confirm delete Garage -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa nhà xe này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="garageView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="garageView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Garage -->


<script>
    $(function () {
        if (typeof (garageOutSideView) === 'undefined') {
            garageOutSideView = {
                table: null,
                dataGarage: null,
                dataVehicle:null,
                current: null,
                action: null,
                idDelete: null,
//                cancel: function () {
//                    if (garageOutSideView.action == 'add') {
//                        garageOutSideView.clearInput();
//                    } else {
//                        garageOutSideView.fillCurrentObjectToForm();
//                    }
//                },

                loadData: function () {
                    $.ajax({
                        url: url + 'garage-outside/garages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if(jqXHR.status == 200){
                            garageOutSideView.dataGarage = data['dataGarages'];
                            garageOutSideView.fillDataToDatatable(data['dataGarages']);
                            garageOutSideView.dataVehicle = data['dataVehicles'];
                            garageOutSideView.fillDataToDatatableVehicles(data['dataVehicles']);
                        } else {
                            garageOutSideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        garageOutSideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    garageOutSideView.renderScrollbar();
//                    garageOutSideView.renderEventClickTableModal();
                },
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    if (garageOutSideView.action == 'add') {
                        $('#divControl').fadeIn(300);
                    }
                    if (garageOutSideView.action == 'update') {
                        $('#divControl_edit').fadeIn(300);
                    }

                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    $('#divControl_edit').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    garageOutSideView.clearValidation("#frmControl");
                    garageOutSideView.clearInput();
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    $("#divControl_edit").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                addGarage: function () {
                    garageOutSideView.current = null;
                    garageOutSideView.action = 'add';
                    $("#divControl").find(".titleControl").html("Thêm mới nhà xe ngoài");
                    garageOutSideView.showControl();
                },
                fillDataToDatatableVehicles: function (data) {

                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['areaCode'] + '-' + data[i]['vehicleNumber'];
                    }
                    garageOutSideView.dataVehicle = $('#table-tableVehicle').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullNumber'},
                            {data: 'owner'},
                            {data: 'size'},
                            {data: 'weight'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageInsideView.deleteStaff(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "10%"
                            }


                        ],
                        dom: ''

                    })
                },
                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['areaCode'] + '-' + data[i]['vehicleNumber'];
                    }
                    garageOutSideView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'name'},
                            {data: 'address'},
                            {data: 'contactor'},
                            {data: 'phone'},
                            {data: 'fullNumber'},
                            {data: 'size'},
                            {data: 'weight'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="garageOutSideView.editGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageOutSideView.deleteGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ]

                    });

                },
                editGarage: function (id) {
                    garageOutSideView.current = null;
                    garageOutSideView.current = _.clone(_.find(garageOutSideView.dataGarage, function (o) {
                        return o.id == id;
                    }), true);
                    garageOutSideView.fillCurrentObjectToForm();
                    garageOutSideView.action = 'update';
                    $("#divControl_edit").find(".titleControl").html("Cập nhật nhà xe ngoài");
                    garageOutSideView.showControl();
                },
                fillCurrentObjectToForm: function () {
                    $("input[id='name']").val(garageOutSideView.current["name"]);
                    $("input[id='contactor']").val(garageOutSideView.current["contactor"]);
                    $("input[id='phone']").val(garageOutSideView.current["phone"]);
                    $("textarea[id='address']").val(garageOutSideView.current["address"]);
                    $("select[id='garageType_id']").val(garageOutSideView.current["garageType_id"]);
                },



//                displayModal: function(type, idModal){
//                    $(idModal).modal(type);
//                    if(garageOutSideView.action == 'delete' && type == 'hide'){
//                        garageOutSideView.action = null;
//                        garageOutSideView.idDelete = null;
//                    }
//                },
//                showNotification: function (type ,msg) {
//                    switch (type){
//                        case "info":
//                            toastr.info(msg);
//                            break;
//                        case "success":
//                            toastr.success(msg);
//                            break;
//                        case "warning":
//                            toastr.warning(msg);
//                            break;
//                        case "error":
//                            toastr.error(msg);
//                            break;
//                    }
//                },
//                clearInput: function () {
//                    $("input[id='name']").val('');
//                    $("input[id='contactor']").val('');
//                    $("input[id='phone']").val('');
//                    $("textarea[id='address']").val('');
//                    garageOutSideView.current = null;
//                },
//
//                renderEventClickTableModal: function(){
//                    $("#table-garage").find("tbody").on('click', 'tr', function () {
//                        $('#garages_name').attr('data-id', $(this).find('td:first')[0].innerText);
//                        $('#garages_name').val($(this).find('td:eq(1)')[0].innerText);
//                        garageView.displayModal("hide", "#modal-garage");
//                    });
//                },
//                renderScrollbar: function(){
//                    $("#divControl").find('.panel-body').mCustomScrollbar({
//                        theme:"dark"
//                    });
//                },
//
//
//
//
//
//
//
//
////
////
////
////
//
//
//
//
//
//
//
//
//
//
//
//                fillDataToDatatable: function (data) {
//                    garageView.table = $('#table-data').DataTable({
//                        language: languageOptions,
//                        data: data,
//                        columns: [
//                            {data: 'id'},
//                            {data: 'garageTypes'},
//                            {data: 'name'},
//                            {data: 'contactor'},
//                            {data: 'phone'},
//                            {data: 'address'},
//                            {
//                                render: function (data, type, full, meta) {
//                                    var tr = '';
//                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
//                                    tr += '<div class="btn btn-success  btn-circle" onclick="garageView.editGarage(' + full.id + ')">';
//                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
//                                    tr += '</div>';
//                                    tr += '</div>';
//                                    tr += '<div class="btn-del-edit" title="Xóa">';
//                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageView.deleteGarage(' + full.id + ')">';
//                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
//                                    tr += '</div>';
//                                    tr += '</div>';
//                                    return tr;
//                                }, width: "10%"
//                            }
//                        ],
//                        order: [[0, "desc"]],
//                        dom: 'Bfrtip',
//                        buttons: [
//                            {
//                                extend: 'copyHtml5',
//                                text: 'Sao chép',
//                                exportOptions: {
//                                    columns: [0, ':visible']
//                                }
//                            },
//                            {
//                                extend: 'excelHtml5',
//                                text: 'Xuất Excel',
//                                exportOptions: {
//                                    columns: ':visible'
//                                },
//                                customize: function (xlsx) {
//                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
//                                }
//                            },
//                            {
//                                extend: 'pdfHtml5',
//                                text: 'Xuất PDF',
//                                message: 'Thống Kê Xe Từ Ngày ... Đến Ngày',
//                                customize: function (doc) {
//                                    doc.content.splice(0, 1);
//                                    doc.styles.tableBodyEven.alignment = 'center';
//                                    doc.styles.tableBodyOdd.alignment = 'center';
//                                    doc.content.columnGap = 10;
//                                    doc.pageOrientation = 'landscape';
//                                    for (var i = 0; i < doc.content[1].table.body.length; i++) {
//                                        for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
//                                            doc.content[1].table.body[i].splice(6, 1);
//                                        }
//                                    }
//                                    doc.content[1].table.widths = ['*', '*', '*', '*', '*', '*'];
//                                }
//                            },
//                            {
//                                extend: 'colvis',
//                                text: 'Ẩn cột'
//                            }
//                        ]
//                    })
//                },
//
//
//
//
//
//
//
//                fillFormDataToCurrentObject: function () {
//                    if (garageView.action == 'add') {
//                        garageView.current = {
//                            name:      $("input[id='name']").val(),
//                            contactor: $("input[id='contactor']").val(),
//                            phone:     $("input[id='phone']").val(),
//                            address:   $("textarea[id='address']").val(),
//                            garageType_id: $("select[id='garageType_id']").val()
//                        };
//                    } else if (garageView.action == 'update') {
//                        garageView.current.name      = $("input[id='name']").val();
//                        garageView.current.contactor = $("input[id='contactor']").val();
//                        garageView.current.phone     = $("input[id='phone']").val();
//                        garageView.current.address   = $("textarea[id='address']").val();
//                        garageView.current.garageType_id   = $("select[id='garageType_id']").val();
//                    }
//                },
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//                deleteGarage: function (id) {
//                    garageView.action = 'delete';
//                    garageView.idDelete = id;
//                    garageView.displayModal("show", "#modal-confirmDelete");
//                },
//
//                formValidate: function () {
//                    $("#frmControl").validate({
//                        rules: {
//                            name: "required",
//                            contactor: "required",
//                            phone: "required",
//                            address: "required"
//                        },
//                        messages: {
//                            name: "Vui lòng nhập tên nhà xe",
//                            contactor: "Vui lòng nhập tên người liên hệ",
//                            phone: "Vui lòng nhập điện thoại người liên hệ",
//                            address: "Vui lòng nhập địa chỉ nhà xe"
//                        }
//                    });
//                },
//                clearValidation: function (idForm) {
//                    var validator = $(idForm).validate();
//                    validator.resetForm();
//                },
//                loadSelectBox: function (lstGarageType) {
//                    //reset selectbox
//                    $('#garageType_id')
//                            .find('option')
//                            .remove()
//                            .end();
//                    //fill option to selectbox
//                    var select = document.getElementById("garageType_id");
//                    for (var i = 0; i < lstGarageType.length; i++) {
//                        var opt = lstGarageType[i]['name'];
//                        var el = document.createElement("option");
//                        el.textContent = opt;
//                        el.value = lstGarageType[i]['id'];
//                        select.appendChild(el);
//                    }
//                },
//                save: function () {
//                    garageView.formValidate();
//                    if ($("#frmControl").valid()) {
//                        if (garageView.action != 'delete') {
//                            if($("#garages_name").attr('data-id') == ''){
//                                garageView.showNotification('warning', 'Vui lòng chọn một nhà xe có trong danh sách.');
//                                return ;
//                            }
//                        }
//                        garageView.fillFormDataToCurrentObject();
//                        var sendToServer = {
//                            _token: _token,
//                            _action: garageView.action,
//                            _garage: garageView.current
//                        };
//                        if (garageView.action == 'delete') {
//                            sendToServer._id = garageView.idDelete;
//                        }
//                        $.ajax({
//                            url: url + 'vehicle-outside/modify',
//                            type: "POST",
//                            dataType: "json",
//                            data: sendToServer
//                        }).done(function (data, textStatus, jqXHR) {
//                            if (jqXHR.status == 201) {
//                                switch (garageView.action) {
//                                    case 'add':
//                                        garageView.tableGarage.push(data['garage']);
//                                        garageView.showNotification("success", "Thêm thành công!");
//                                        break;
//                                    case 'update':
//                                        var garageOld = _.find(garageView.tableGarage, function (o) {
//                                            return o.id == sendToServer._garage.id;
//                                        });
//                                        var indexOfGarageOld = _.indexOf(garageView.tableGarage, garageOld);
//                                        garageView.tableGarage.splice(indexOfGarageOld, 1, data['garage']);
//                                        garageView.showNotification("success", "Cập nhật thành công!");
//                                        garageView.hideControl();
//                                        break;
//                                    case 'delete':
//                                        var garageOld = _.find(garageView.tableGarage, function (o) {
//                                            return o.id == sendToServer._id;
//                                        });
//                                        var indexOfGarageOld = _.indexOf(garageView.tableGarage, garageOld);
//                                        garageView.tableGarage.splice(indexOfGarageOld, 1);
//                                        garageView.showNotification("success", "Xóa thành công!");
//                                        garageView.displayModal("hide", "#modal-confirmDelete")
//                                        break;
//                                    default:
//                                        break;
//                                }
//                                garageView.table.clear().rows.add(garageView.tableGarage).draw();
//                                garageView.clearInput();
//                            } else {
//                                garageView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
//                            }
//                        }).fail(function (jqXHR, textStatus, errorThrown) {
//                            garageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
//                        });
//                    } else {
//                        $("form#frmControl").find("label[class=error]").css("color", "red");
//                    }
//                }
            };
            garageOutSideView.loadData();
        } else {
            garageOutSideView.loadData();
        }
    });
</script>
