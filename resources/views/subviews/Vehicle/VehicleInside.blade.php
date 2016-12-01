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

    #listVehicle {
        z-index: 3;
        position: fixed;
        top: 20%;
        display: none;
        right: 0;
        height: 60vh;
        width: 70%;
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
        #listVehicle {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }

    }

    #divControl .panel-body {
        height: 330px;
    }

    #listVehicle .table-list-vehicle {
        height: 410px;
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
                        <li class="active">Xe công ty</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="garageInsideView.addGarage();">
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
                                <th>Ghi chú</th>
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
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="garageInsideView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="name"><b>Tên nhà xe</b></label>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <input type="text" class="form-control" id="name"
                                                   name="name">
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
                                    <label for="note"><b>Ghi chú</b></label>
                                    <textarea type="text" class="form-control" id="note"
                                              name="note"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="garageInsideView.save()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="garageInsideView.cancel()">Nhập lại
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

<!-- Modal confirm delete garage -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Bạn có muốn xóa nhà xe này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="garageInsideView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="garageInsideView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete garage -->


<!-- Modal confirm delete Vehicle -->
<div class="row">
    <div id="modal-confirmDeleteVehicle" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Bạn có muốn xóa xe này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="garageInsideView.saveVehicle()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="garageInsideView.displayModal('hide','#modal-confirmDeleteVehicle')">
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


<!-- list vehicle + them xe vào nha xe -->
<div class="row">
    <div id="listVehicle" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl"></span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="garageInsideView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-5">
                    <form role="form" id="frmVehicle">
                        <input id="idGarage" style="display: none">
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
                                <div class="col-sm-6 col-xs-6">
                                    <div class="form-group form-md-line-input ">
                                        <label for="vehicleType_id"><b>Loại xe</b></label>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <input name="vehicleType_id" id="vehicleType_id" data-id=""
                                                       class="form-control">
                                            </div>
                                            {{--<div class="col-sm-3 col-xs-3">--}}
                                            {{--<div class="btn btn-primary btn-sm btn-circle"--}}
                                            {{--title="Thêm loại xe"--}}
                                            {{--onclick="garageInsideView.displayModal('show', '#modal-addVehicleType')">--}}
                                            {{--<i class="glyphicon glyphicon-plus"></i>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
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
                                    <div class="form-group form-md-line-input ">
                                        <label for="size"><b>Kích thước</b></label>
                                        <input type="text" class="form-control"
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
                                        <input type="text" class="form-control"
                                               id="yearOfProduction"
                                               name="yearOfProduction">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group form-md-line-input">
                                        <label for="transferGarage"><b>Chuyển nhà xe</b></label>
                                        <input type="text" class="form-control"
                                                  id="transferGarage"
                                                  name="transferGarage">
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
                                                    onclick="garageInsideView.saveVehicle()">
                                                Hoàn tất
                                            </button>
                                            <button id="retype" type="button" class="btn default"
                                                    onclick="garageInsideView.clearInputFormVehicle()">
                                                Nhập lại
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="row table-list-vehicle">
                        <div class="col-md-12" style="padding: 0" align="center">
                            <span class="text text-primary titleListVehicle" style="font-size: 17px">Danh sách xe trong công ty</span>
                            <div class="table-responsive">
                                <table style="width: 100%" class="table table-bordered table-hover"
                                       id="table-tableVehicle">
                                    <thead>
                                    <tr class="active">
                                        <th>Stt</th>
                                        <th>Số xe</th>
                                        <th>Chủ xe</th>
                                        <th>Kích thước</th>
                                        <th>Trọng tải</th>
                                        <th>Loại xe</th>
                                        <th>Sửa / Xóa</th>
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
<!-- end list vehicle + them xe vào nha xe -->


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
                                                onclick="garageInsideView.saveVehicleType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="garageInsideView.cancelVehiclesType()">Nhập lại
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
<!-- list vehicle + them xe vào nha xe -->

<script>
    $(function () {
        if (typeof (garageInsideView) === 'undefined') {
            garageInsideView = {
                table: null,
                tableVehicle: null,
                dataGarage: null,
                dataVehicle: null,
                current: null,
                action: null,
                idDelete: null,
                idDeleteVehicle: null,
                dataVehicleType: null,
                tagsVehicleType: [],
                cancel: function () {
                    if (garageInsideView.action == 'add') {
                        garageInsideView.clearInput();
                    } else {
                        garageInsideView.fillCurrentObjectToForm();
                    }
                },
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    if (garageInsideView.action == 'addVehicle') {
                        $('#listVehicle').fadeIn(300);
                    } else {
                        $('#divControl').fadeIn(300);
                    }
                    garageInsideView.clearValidation("#frmControl");
                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    $('#listVehicle').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    garageInsideView.clearValidation("#frmControl");
                    garageInsideView.clearInput();
                    garageInsideView.clearInputFormVehicle();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (garageInsideView.action == 'delete' && type == 'hide') {
                        garageInsideView.action = null;
                        garageInsideView.idDelete = null;
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
                clearInput: function () {
                    $("input[id='name']").val('');
                    $("input[id='address']").val('');
                    $("input[id='contactor']").val('');
                    $("input[id='phone']").val('');
                    $("textarea[id='note']").val('');

                },
                fillDataToDatatableVehicles: function (data) {
                    if (garageInsideView.tableVehicle != null) {
                        garageInsideView.tableVehicle.destroy();
                    }

                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['areaCode'] + '-' + data[i]['vehicleNumber'];
                    }
                    garageInsideView.tableVehicle = $('#table-tableVehicle').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id',visible: false},
                            {data: 'fullNumber'},
                            {data: 'owner'},
                            {data: 'size'},
                            {data: 'weight'},
                            {data: 'name'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="garageInsideView.editVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageInsideView.deleteVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "10%"
                            }
                        ]


                    })
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'garage-inside/garages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            garageInsideView.dataGarage = data['dataGarages'];
                            garageInsideView.fillDataToDatatable(data['dataGarages']);

                        } else {
                            garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    garageInsideView.renderScrollbar();
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    $("#listVehicle").find('.table-list-vehicle').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                deleteGarage: function (id) {
                    garageInsideView.action = 'delete';
                    garageInsideView.idDelete = id;
                    garageInsideView.displayModal("show", "#modal-confirmDelete");
                },
                save: function () {
                    var sendToServer = null;
                    if (garageInsideView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: garageInsideView.action,
                            _id: garageInsideView.idDelete
                        };
                        $.ajax({
                            url: url + 'garage-inside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var garageOld = _.find(garageInsideView.dataGarage, function (o) {
                                    return o.id == sendToServer._id;
                                });
                                var indexOfGarageOld = _.indexOf(garageInsideView.dataGarage, garageOld);
                                garageInsideView.dataGarage.splice(indexOfGarageOld, 1);
                                garageInsideView.showNotification("success", "Xóa thành công!");
                                garageInsideView.displayModal("hide", "#modal-confirmDelete");
                            }
                            garageInsideView.table.clear().rows.add(garageInsideView.dataGarage).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        garageInsideView.formValidate();
                        if ($("#frmControl").valid()) {
                            garageInsideView.fillFormDataToCurrentObject();
                            if (garageInsideView.current.id == null) {
                                var name = _.find(garageInsideView.dataGarage, function (o) {
                                    return o.name == $("input[id=name]").val();
                                });
                            } else {
                                var name = _.find(garageInsideView.dataGarage, function (o) {
                                    return o.name == $("input[id=name]").val() && o.id != garageInsideView.current.id;
                                });
                            }
                            if (typeof name !== "undefined") {
                                showNotification("error", "Nhà xe đã tồn tại!");
                            } else {
                                sendToServer = {
                                    _token: _token,
                                    _action: garageInsideView.action,
                                    _garage: garageInsideView.current
                                };
                                $.ajax({
                                    url: url + 'garage-inside/modify',
                                    type: "POST",
                                    dataType: "json",
                                    data: sendToServer
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        switch (garageInsideView.action) {
                                            case 'add':
                                                garageInsideView.dataGarage.push(data['addGarage']);
                                                showNotification("success", "Thêm thành công!");
                                                break;
                                            case 'update':
                                                var garageOld = _.find(garageInsideView.dataGarage, function (o) {
                                                    return o.id == sendToServer._garage.id;
                                                });
                                                var indexOfGarageOld = _.indexOf(garageInsideView.dataGarage, garageOld);
                                                garageInsideView.dataGarage.splice(indexOfGarageOld, 1, data['updateGarage']);
                                                garageInsideView.showNotification("success", "Cập nhật thành công!");
                                                garageInsideView.hideControl();
                                                break;
                                            default:
                                                break;
                                        }
                                        garageInsideView.table.clear().rows.add(garageInsideView.dataGarage).draw();
                                        garageInsideView.clearInput();
                                    } else {
                                        garageInsideView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");

                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                                });
                            }
                        } else {
                            $("form#frmControl").find("label[class=error]").css("color", "red");
                        }
                    }
                },
                addGarage: function () {
                    garageInsideView.current = null;
                    garageInsideView.action = 'add';
                    $("#divControl").find(".titleControl").html("Thêm mới nhà xe");
                    garageInsideView.showControl();
                },
                formValidate: function () {

                    $("#frmControl").validate({
                        rules: {
                            name: "required",
                            address: "required",
                            contactor: "required",
                            phone: {
                                required: true,
                                number: true
                            }
                        },
                        messages: {
                            name: "Vui lòng nhập tên nhà xe",
                            address: "Vui lòng nhập địa chỉ nhà xe",
                            contactor: "Vui lòng nhập tên người liên hệ",
                            phone: {
                                required: "Vui lòng nhập số điện thoại",
                                number: "Điện thoại phải là số"
                            }
                        }
                    });
                },

                fillDataToDatatable: function (data) {
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['areaCode'] + '-' + data[i]['vehicleNumber'];
                    }
                    garageInsideView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'name'},
                            {data: 'address'},
                            {data: 'contactor'},
                            {data: 'phone'},
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="garageInsideView.editGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageInsideView.deleteGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Danh sách xe công ty">';
                                    tr += '<div class="btn btn-primary btn-circle" onclick="garageInsideView.addVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-list"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ]

                    });

                },
                addVehicle: function (id) {
                    var name = _.find(garageInsideView.dataGarage, function (o) {
                        return o.id == id;
                    });
                    $('input[id=idGarage]').val(id);
                    $("#listVehicle").find(".titleListVehicle").html("Danh sách xe trong nhà xe " + name.name);
                    garageInsideView.action = 'addVehicle';
                    $("#listVehicle").find(".titleControl").html("Thêm mới xe");
                    garageInsideView.showControl();
                    garageInsideView.loadVehicleTypeInput(id);
                },
                fillFormDataToCurrentObject: function () {
                    if (garageInsideView.action == 'add') {
                        garageInsideView.current = {
                            name: $("input[id='name']").val(),
                            address: $("input[id='address']").val(),
                            contactor: $("input[id='contactor']").val(),
                            phone: $("input[id='phone']").val(),
                            note: $("textarea[id='note']").val()

                        };
                    } else if (garageInsideView.action == 'update') {
                        garageInsideView.current.name = $("input[id='name']").val();
                        garageInsideView.current.address = $("input[id='address']").val();
                        garageInsideView.current.contactor = $("input[id='contactor']").val().toUpperCase();
                        garageInsideView.current.phone = $("input[id='phone']").val();
                        garageInsideView.current.note = $("textarea[id='note']").val();

                    }
                },
                clearInputFormVehicle: function () {
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicleNumber']").val('');
                    $("input[id='owner']").val('');
                    $("input[id='vehicleType_id']").val('');
                    $('#vehicleType_id').attr('data-id','');
                    $("input[id='size']").val('');
                    $("input[id='weight']").val('');
                    $("textarea[id='noteVehicle']").val('');
                    $("#listVehicle").find(".titleControl").html("Thêm mới xe");
                },
                clearInputFormVehicleType: function () {
                    $("input[id='vehicleType']").val('');
                    $("textarea[id='description']").val('');
                },
                fillCurrentObjectToForm: function () {
                    $("input[id='name']").val(garageInsideView.current["name"]);
                    $("input[id='address']").val(garageInsideView.current["address"]);
                    $("input[id='contactor']").val(garageInsideView.current["contactor"]);
                    $("input[id='phone']").val(garageInsideView.current["phone"]);
                    $("textarea[id='note']").val(garageInsideView.current["note"]);

                },
                editGarage: function (id) {
                    garageInsideView.current = null;
                    garageInsideView.current = _.clone(_.find(garageInsideView.dataGarage, function (o) {
                        return o.id == id;
                    }), true);
                    garageInsideView.fillCurrentObjectToForm();
                    garageInsideView.action = 'update';
                    $("#divControl").find(".titleControl").html("Cập nhật nhà xe");
                    garageInsideView.showControl();
                },

                editVehicle: function (id) {
                    garageInsideView.currentVehicle = null;
                    garageInsideView.currentVehicle = _.clone(_.find(garageInsideView.dataVehicle, function (o) {
                        return o.id == id;
                    }), true);
                    $("input[id='areaCode']").val(garageInsideView.currentVehicle["areaCode"]);
                    $("input[id='vehicleNumber']").val(garageInsideView.currentVehicle["vehicleNumber"]);
                    $("input[id='owner']").val(garageInsideView.currentVehicle["owner"]);
                    $("input[id='size']").val(garageInsideView.currentVehicle["size"]);
                    $("input[id='weight']").val(garageInsideView.currentVehicle["weight"]);
                    $("input[id='vehicleType_id']").val(garageInsideView.currentVehicle["name"]);
                    $("#vehicleType_id").attr('data-id', garageInsideView.currentVehicle["vehicleType_id"]);
                    $("textarea[id='noteVehicle']").val(garageInsideView.currentVehicle["note"]);

                    garageInsideView.action = 'updateVehicle';
                    $("#listVehicle").find(".titleControl").html("Cập nhật xe");

                },

                vehicleTypeValidate: function () {
                    $("#frmVehicleType").validate({
                        rules: {
                            vehicleType: "required"
                        },
                        messages: {
                            vehicleType: "Vui lòng nhập loại xe"
                        }
                    });
                },
                loadVehicleTypeInput: function (id) {
                    var sendToServer = {
                        _token: _token,
                        _idGarage: id
                    };
                    $.ajax({
                        url: url + 'vehicle-type/vehicleTypes',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            garageInsideView.dataVehicleType = data['vehicleTypes'];
                            garageInsideView.dataVehicle = data['dataVehicles'];
                            garageInsideView.fillDataToDatatableVehicles(data['dataVehicles']);
                            garageInsideView.renderAutoCompleteSearch();

                        } else {
                            garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                },
                renderAutoCompleteSearch: function () {

                    garageInsideView.tagsVehicleType = _.map(garageInsideView.dataVehicleType, 'name');
                    garageInsideView.tagsVehicleType = _.union(garageInsideView.tagsVehicleType);
                    renderAutoCompleteSearch('#vehicleType_id', garageInsideView.tagsVehicleType, $("#vehicleType_id").focusout(function () {
                        var vehicleTypeName = this.value;
                        if (vehicleTypeName == '') return;
                        var vehicleType = _.find(garageInsideView.dataVehicleType, function (o) {
                            return o.name == vehicleTypeName;
                        });
                        if (typeof vehicleType === "undefined") {
                            var nameType = $('input[id=vehicleType_id]').val();
                            $("#vehicleType_id").attr("data-id", '');
                            $('input[id=vehicleType]').val(nameType);
                            garageInsideView.displayModal('show', '#modal-addVehicleType')
                        } else {
                            $("#vehicleType_id").attr("data-id", vehicleType.id);
                        }
                    }));

                },
                saveVehicleType: function () {

                    garageInsideView.vehicleTypeValidate();
                    var vehicleType = {
                        vehicleType: $("input[id='vehicleType']").val(),
                        description: $("textarea[id='description']").val()
                    };
                    var sendToServer = {
                        _token: _token,
                        _action: 'vehicleType',
                        _vehicleType: vehicleType
                    };
                    if ($("#frmVehicleType").valid()) {
                        $.ajax({
                            url: url + 'garage-inside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                garageInsideView.dataVehicleType.push(data['dataVehicleTypes']);
                                garageInsideView.showNotification("success", "Thêm mới loại xe thành công");
                                garageInsideView.displayModal("hide", "#modal-addVehicleType");
                                var idVehicleType = data['dataVehicleTypes']['id'];
                                var nameVehicleType = data['dataVehicleTypes']['name'];
                                $('input[id=vehicleType_id]').val(nameVehicleType);
                                $("#vehicleType_id").attr("data-id", idVehicleType);
                                garageInsideView.clearInputFormVehicleType();
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmVehicleType").find("label[class=error]").css("color", "red");
                    }
                },
                fillFormDataToCurrentObjectVehicle: function () {
                    if (garageInsideView.action == 'addVehicle') {
                        garageInsideView.currentVehicle = {
                            idGarage:$("input[id='idGarage']").val(),
                            areaCode: $("input[id='areaCode']").val(),
                            vehicleNumber: $("input[id='vehicleNumber']").val(),
                            vehicleType_id: $("#vehicleType_id").attr('data-id'),
                            owner: $("input[id='owner']").val(),
                            size: $("input[id='size']").val(),
                            weight: $("input[id='weight']").val(),
                            noteVehicle: $("textarea[id='noteVehicle']").val()
                        };
                    } else if (garageInsideView.action == 'updateVehicle') {
                        garageInsideView.currentVehicle.areaCode = $("input[id='areaCode']").val();
                        garageInsideView.currentVehicle.vehicleNumber = $("input[id='vehicleNumber']").val();
                        garageInsideView.currentVehicle.vehicleType_id = $("#vehicleType_id").attr('data-id'),
                            garageInsideView.currentVehicle.owner = $("input[id='owner']").val().toUpperCase();
                        garageInsideView.currentVehicle.size = $("input[id='size']").val();
                        garageInsideView.currentVehicle.weight = $("input[id='weight']").val();
                        garageInsideView.currentVehicle.noteVehicle = $("textarea[id='noteVehicle']").val();

                    }
                },
                vehicleValidate: function () {
                    $("#frmVehicle").validate({
                        rules: {
                            areaCode: "required",
                            owner: "required",
                            vehicleType_id: "required",
                            vehicleNumber: {
                                required: true,
                                number: true
                            }
                        },
                        messages: {
                            areaCode: "Vui lòng nhập mã vùng",
                            vehicleNumber: {
                                required: "Vui lòng nhập số xe",
                                number: "Số xe phải là số"
                            },
                            vehicleType_id: "Vui lòng nhập loại xe",
                            owner: "Vui lòng nhập chủ xe"
                        }
                    });
                },
                deleteVehicle: function (id) {
                    garageInsideView.action = 'deleteVehicle';
                    garageInsideView.idDeleteVehicle = id;
                    garageInsideView.displayModal("show", "#modal-confirmDeleteVehicle");
                },
                saveVehicle: function () {
                    var sendToServer = null;
                    if (garageInsideView.action == 'deleteVehicle') {
                        sendToServer = {
                            _token: _token,
                            _action: garageInsideView.action,
                            _id: garageInsideView.idDeleteVehicle
                        };
                        $.ajax({
                            url: url + 'vehicle-inside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var vehicleOld = _.find(garageInsideView.dataVehicle, function (o) {
                                    return o.id == sendToServer._id;
                                });
                                var indexOfVehicleOld = _.indexOf(garageInsideView.dataVehicle, vehicleOld);
                                garageInsideView.dataVehicle.splice(indexOfVehicleOld, 1);
                                garageInsideView.showNotification("success", "Xóa thành công!");
                                garageInsideView.displayModal("hide", "#modal-confirmDeleteVehicle");
                            }
                            garageInsideView.tableVehicle.clear().rows.add(garageInsideView.dataVehicle).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        garageInsideView.vehicleValidate();
                        garageInsideView.fillFormDataToCurrentObjectVehicle();
                        if ($("#frmVehicle").valid()) {
                            if ($("#vehicleType_id").attr("data-id") == '') {
                                showNotification("warning", "Loại xe không tồn tại!");
                                return;
                            } else {
                                sendToServer = {
                                    _token: _token,
                                    _action: garageInsideView.action,
                                    _vehicle: garageInsideView.currentVehicle
                                };
                                $.ajax({
                                    url: url + 'vehicle-inside/modify',
                                    type: "POST",
                                    dataType: "json",
                                    data: sendToServer
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        switch (garageInsideView.action) {
                                            case 'addVehicle':
                                                data['addVehicle'].fullNumber = data['addVehicle']['areaCode'] + "-" + data['addVehicle']["vehicleNumber"];
                                                garageInsideView.dataVehicle.push(data['addVehicle']);
                                                garageInsideView.showNotification("success", "Thêm thành công!");
                                                garageInsideView.clearInputFormVehicle();
                                                break;
                                            case 'updateVehicle':
                                                data['updateVehicle'].fullNumber = data['updateVehicle']['areaCode'] + "-" + data['updateVehicle']["vehicleNumber"];
                                                var vehicleOld = _.find(garageInsideView.dataVehicle, function (o) {
                                                    return o.id == sendToServer._vehicle.id;
                                                });
                                                var indexOfVehicleOld = _.indexOf(garageInsideView.dataVehicle, vehicleOld);
                                                garageInsideView.dataVehicle.splice(indexOfVehicleOld, 1, data['updateVehicle']);
                                                garageInsideView.showNotification("success", "Cập nhật thành công!");
                                                garageInsideView.clearInputFormVehicle();
                                                garageInsideView.action ="addVehicle";
                                                break;
                                            default:
                                                break;
                                        }
                                        garageInsideView.tableVehicle.clear().rows.add(garageInsideView.dataVehicle).draw();
                                        garageInsideView.clearInput();
                                    } else {
                                        garageInsideView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");

                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    garageInsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                                });
                            }

                        } else {
                            $("form#frmVehicle").find("label[class=error]").css("color", "red");
                        }
                    }
                }

            };
            garageInsideView.loadData();
        } else {
            garageInsideView.loadData();
        }
    });
</script>
