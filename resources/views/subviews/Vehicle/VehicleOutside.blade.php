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
        top: 10%;
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
        height: 500px;
    }

    #listVehicle .scroll-bar {
        height: 500px;
    }

    table.table-autocomplete {
        width: 100%;
    }

    table.table-autocomplete thead tr {
        border-bottom: solid 1px #B6B6B6;
    }

    table.table-autocomplete thead tr th {
        padding: 5px;
    }

    table.table-autocomplete .ui-menu-item td {
        border-left: solid 1px #B6B6B6;
        padding: 5px;
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
                        <li><a href="javascript:;">QL nhà xe</a></li>
                        <li class="active">Nhà xe công ty</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="garageOutsideView.addGarage();">
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
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="garageOutsideView.hideControl()">
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
                                    <label for="contact"><b>Người liên hệ</b></label>
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <input class="form-control uppercase" id="contact"
                                                   name="contact">
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
                                                onclick="garageOutsideView.save()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="garageOutsideView.cancel()">Nhập lại
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
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight hidden-OK"
                                    onclick="garageOutsideView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="garageOutsideView.displayModal('hide','#modal-confirmDelete')">
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


<!-- Kiem tra nhà xe còn xe khong cho xóa -->
<div class="row">
    <div id="modal-deniedDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title"></h5>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Kiem tra nhà xe còn xe khong cho xóa end-->






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
                                    onclick="garageOutsideView.saveVehicle()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="garageOutsideView.displayModal('hide','#modal-confirmDeleteVehicle')">
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
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="garageOutsideView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-5 scroll-bar">
                    <form role="form" id="frmVehicle" onsubmit="return false;">
                        <input id="vehicle_id" style="display: none">
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
                                                       class="form-control" onkeyup="garageOutsideView.cleaIdVehicle()">
                                            </div>
                                            <div class="col-sm-3 col-xs-3">
                                                <button id="editVehicleType" class="btn btn-primary btn-sm btn-circle"
                                                        onclick="garageOutsideView.editVehicleType()">
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
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group form-md-line-input">
                                        <label for="driver"><b>Tài xế</b></label>
                                        <input type="text" class="form-control"
                                               id="driver"
                                               name="driver">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12" id="input-transfer-garage" hidden>
                                    <div class="form-group form-md-line-input">
                                        <label for="transferGarage"><b>Chuyển nhà xe</b></label>
                                        <input type="text" class="form-control"
                                               id="transferGarage" data-idGarage=""
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
                                                    onclick="garageOutsideView.saveVehicle()">
                                                Hoàn tất
                                            </button>
                                            <button id="retype" type="button" class="btn default"
                                                    onclick="garageOutsideView.clearInputFormVehicle()">
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
                                        <th>Số xe</th>
                                        <th>Chủ xe</th>
                                        <th>Tài xế</th>
                                        <th>Hãng Xe</th>
                                        <th>Năm sản xuất</th>
                                        <th>Loại xe</th>
                                        <th>Kích thước</th>
                                        <th>Trọng tải</th>
                                        <th>Ghi chú</th>
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
                                                onclick="garageOutsideView.saveVehicleType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="garageOutsideView.clearInputFormVehicleType()">Nhập lại
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


<script>
    $(function () {
        if (typeof (garageOutsideView) === 'undefined') {
            garageOutsideView = {
                table: null,
                tableVehicle: null,
                dataGarage: null,
                dataAllGarages: null,
                dataAllVehicle: null,
                dataVehicle: null,
                dataDriver: null,
                dataAllDriver: null,
                current: null,
                currentVehicle: null,
                currentVehicleType: null,
                action: null,
                idDelete: null,
                idDeleteVehicle: null,
                dataVehicleType: null,
                tagsVehicleType: [],
                tagsGarageVehicle: [],
                text2: null,
                tableAutoCompleteSearch: function () {

                    garageOutsideView.text2 = $("#driver").tautocomplete({
                        width: "400px",
                        columns: ['Tài xế', 'CMND', 'Loại bằng lái'],
                        data: function () {
                            try {
                                var data = garageOutsideView.dataDriver;
                            }
                            catch (e) {
                                alert(e)
                            }
                            var filterData = [];
                            var searchData = eval("/" + garageOutsideView.text2.searchdata() + "/gi");
                            $.each(data, function (i, v) {
                                if (v.fullName.search(new RegExp(searchData)) != -1) {
                                    filterData.push(v);
                                }
                            });
                            return filterData;
                        },
                        onchange: function () {
                            $('#my-id').attr('data-id', garageOutsideView.text2.id());
                        }
                    });
                },
                renderEventCloseModal: function () {
                    $('#modal-addVehicleType').on('hidden.bs.modal', function () {
                        if ($('input[id=vehicle_id]').val() == '') {
                            garageOutsideView.action = "addVehicle"
                        }else {
                            garageOutsideView.action = "updateVehicle"
                        }
                    });
                },
                cancel: function () {
                    if (garageOutsideView.action == 'add') {
                        garageOutsideView.clearInput();
                    } else {
                        garageOutsideView.fillCurrentObjectToForm();
                    }
                },
                cleaIdVehicle: function () {
                    if ($('input[id=vehicleType_id]').val() == "") {
                        $("#vehicleType_id").attr('data-id', '');
                        if ($("#vehicleType_id").attr('data-id') == '') {
                            $("button[id=editVehicleType]").prop("disabled", true);
                        } else {
                            $("button[id=editVehicleType]").prop("disabled", false);
                        }
                    }
                },
                editVehicleType: function () {
                    var idVehicle = $("#vehicleType_id").attr('data-id');
                    garageOutsideView.currentVehicleType = null;
                    garageOutsideView.currentVehicleType = _.clone(_.find(garageOutsideView.dataVehicleType, function (o) {
                        return o.id == idVehicle;
                    }), true);
                    var nameType = $('input[id=vehicleType_id]').val();
                    $('input[id=vehicleType]').val(nameType);
                    garageOutsideView.action = 'updateVehicleType';
                    garageOutsideView.displayModal('show', '#modal-addVehicleType');
                    if (idVehicle == "") {
                        $("h5.modal-title").empty().append("Thêm mới loại xe");
                        $('input[id=vehicleType]').val(nameType);
                        garageOutsideView.action = 'vehicleType';
                    } else {
                        $("h5.modal-title").empty().append("Cập nhật loại xe");
                    }
                },
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    if (garageOutsideView.action == 'addVehicle') {
                        if ($("#vehicleType_id").attr('data-id') == '') {
                            $("button[id=editVehicleType]").prop("disabled", true);
                        } else {
                            $("button[id=editVehicleType]").prop("disabled", false);
                        }
                        $('#listVehicle').fadeIn(300);
                    } else {
                        $('#divControl').fadeIn(300);
                    }
                    garageOutsideView.clearValidation("#frmControl");
                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    $('#listVehicle').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    garageOutsideView.clearValidation("#frmControl");
                    garageOutsideView.clearInput();
                    garageOutsideView.clearInputFormVehicle();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (garageOutsideView.action == 'delete' && type == 'hide') {
                        garageOutsideView.action = null;
                        garageOutsideView.idDelete = null;
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
                    $("input[id='contact']").val('');
                    $("input[id='phone']").val('');
                    $("textarea[id='note']").val('');

                },
                fillDataToDatatableVehicles: function (data) {

                    if (garageOutsideView.tableVehicle != null) {
                        garageOutsideView.tableVehicle.destroy();
                    }
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = data[i]['areaCode'] + '-' + data[i]['vehicleNumber'];
                    }
                    garageOutsideView.tableVehicle = $('#table-tableVehicle').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'fullNumber'},
                            {data: 'owner'},
                            {data: 'fullName'},
                            {data: 'trademark'},
                            {data: 'yearOfProduction'},
                            {data: 'name'},
                            {data: 'size'},
                            {data: 'weight'},
                            {data: 'note'},
                            {
                                render: function (data, type, row, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="garageOutsideView.editVehicle(' + row.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageOutsideView.deleteVehicle(' + row.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "10%"
                            }
                        ],
                        columnDefs: [
                            {responsivePriority: 10, targets: 0},
                            {responsivePriority: 10, targets: 1},
                            {responsivePriority: 10, targets: 2},
                            {responsivePriority: 10, targets: 3},
                            {responsivePriority: 10, targets: 5},
                            {responsivePriority: 10, targets: 6},
                            {responsivePriority: 1, targets: 7}
                        ],
                        responsive: true
                    })
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'garage-outside/garages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            garageOutsideView.dataAllVehicle = data['allVehicles'];
                            garageOutsideView.dataGarage = data['dataGarages'];
                            garageOutsideView.fillDataToDatatable(data['dataGarages']);

                        } else {
                            garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    garageOutsideView.renderScrollbar();
                    garageOutsideView.renderEventCloseModal();
                    $('.date-own').datepicker({
                        minViewMode: 2,
                        format: 'yyyy'
                    });
                    garageOutsideView.tableAutoCompleteSearch();
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    $("#listVehicle").find('.scroll-bar').mCustomScrollbar({
                        theme: "dark"
                    });
                    $("#listVehicle").find('.table-list-vehicle').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                deleteGarage: function (id) {
                    var driverOfGarage = _.filter(garageOutsideView.dataAllVehicle, function (o) {
                        return o.garage_id == id;
                    });
                    if(driverOfGarage == 0){
                        garageOutsideView.action = 'delete';
                        garageOutsideView.idDelete = id;
                        $("#modal-confirmDelete").find(".modal-title").html("Bạn muốn xóa nhà xe này ?");
                        garageOutsideView.displayModal("show", "#modal-confirmDelete");
                    }else {
                        $("#modal-deniedDelete").find(".modal-title").html("Nhà xe đang có xe. Không được xóa !");
                        garageOutsideView.displayModal("show", "#modal-deniedDelete");
                        return;
                    }
                },
                save: function () {
                    var sendToServer = null;
                    if (garageOutsideView.action == 'delete') {
                        sendToServer = {
                            _token: _token,
                            _action: garageOutsideView.action,
                            _id: garageOutsideView.idDelete
                        };
                        $.ajax({
                            url: url + 'garage-outside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var garageOld = _.find(garageOutsideView.dataGarage, function (o) {
                                    return o.id == sendToServer._id;
                                });
                                var indexOfGarageOld = _.indexOf(garageOutsideView.dataGarage, garageOld);
                                garageOutsideView.dataGarage.splice(indexOfGarageOld, 1);
                                garageOutsideView.showNotification("success", "Xóa thành công!");
                                garageOutsideView.displayModal("hide", "#modal-confirmDelete");
                            }
                            garageOutsideView.table.clear().rows.add(garageOutsideView.dataGarage).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        garageOutsideView.formValidate();
                        if ($("#frmControl").valid()) {
                            garageOutsideView.fillFormDataToCurrentObject();
                            if (garageOutsideView.current.id == null) {
                                var name = _.find(garageOutsideView.dataGarage, function (o) {
                                    return o.name == $("input[id=name]").val();
                                });
                            } else {
                                var name = _.find(garageOutsideView.dataGarage, function (o) {
                                    return o.name == $("input[id=name]").val() && o.id != garageOutsideView.current.id;
                                });
                            }
                            if (typeof name !== "undefined") {
                                showNotification("error", "Nhà xe đã tồn tại!");
                            } else {
                                sendToServer = {
                                    _token: _token,
                                    _action: garageOutsideView.action,
                                    _garage: garageOutsideView.current
                                };
                                $.ajax({
                                    url: url + 'garage-outside/modify',
                                    type: "POST",
                                    dataType: "json",
                                    data: sendToServer
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        switch (garageOutsideView.action) {
                                            case 'add':
                                                garageOutsideView.dataGarage.push(data['addGarage']);
                                                showNotification("success", "Thêm thành công!");
                                                break;
                                            case 'update':
                                                var garageOld = _.find(garageOutsideView.dataGarage, function (o) {
                                                    return o.id == sendToServer._garage.id;
                                                });
                                                var indexOfGarageOld = _.indexOf(garageOutsideView.dataGarage, garageOld);
                                                garageOutsideView.dataGarage.splice(indexOfGarageOld, 1, data['updateGarage']);
                                                garageOutsideView.showNotification("success", "Cập nhật thành công!");
                                                garageOutsideView.hideControl();
                                                break;
                                            default:
                                                break;
                                        }
                                        garageOutsideView.table.clear().rows.add(garageOutsideView.dataGarage).draw();
                                        garageOutsideView.clearInput();
                                    } else {
                                        garageOutsideView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");

                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                                });
                            }
                        } else {
                            $("form#frmControl").find("label[class=error]").css("color", "red");
                        }
                    }
                },
                addGarage: function () {
                    garageOutsideView.current = null;
                    garageOutsideView.action = 'add';
                    $("#divControl").find(".titleControl").html("Thêm mới nhà xe");
                    garageOutsideView.showControl();
                },
                formValidate: function () {

                    $("#frmControl").validate({
                        rules: {
                            name: "required",
                            address: "required",
                            contact: "required",
                            phone: {
                                required: true,
                                number: true
                            }
                        },
                        messages: {
                            name: "Vui lòng nhập tên nhà xe",
                            address: "Vui lòng nhập địa chỉ nhà xe",
                            contact: "Vui lòng nhập tên người liên hệ",
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
                    garageOutsideView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'name'},
                            {data: 'address'},
                            {data: 'contact'},
                            {data: 'phone'},
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="garageOutsideView.editGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageOutsideView.deleteGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Danh sách xe công ty">';
                                    tr += '<div class="btn btn-primary btn-circle" onclick="garageOutsideView.addVehicle(' + full.id + ')">';
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
                    var name = _.find(garageOutsideView.dataGarage, function (o) {
                        return o.id == id;
                    });
                    $('#transferGarage').attr('data-idGarage', id);
                    $("#listVehicle").find(".titleListVehicle").html("Danh sách xe trong nhà xe " + name.name);
                    garageOutsideView.action = 'addVehicle';
                    $("#listVehicle").find(".titleControl").html("Thêm mới xe");
                    garageOutsideView.showControl();
                    garageOutsideView.loadVehicleTypeInput(id);
                },
                fillFormDataToCurrentObject: function () {
                    if (garageOutsideView.action == 'add') {
                        garageOutsideView.current = {
                            name: $("input[id='name']").val(),
                            address: $("input[id='address']").val(),
                            contact: $("input[id='contact']").val().toUpperCase(),
                            phone: $("input[id='phone']").val(),
                            note: $("textarea[id='note']").val()
                        };
                    } else if (garageOutsideView.action == 'update') {
                        garageOutsideView.current.name = $("input[id='name']").val();
                        garageOutsideView.current.address = $("input[id='address']").val();
                        garageOutsideView.current.contact = $("input[id='contact']").val().toUpperCase();
                        garageOutsideView.current.phone = $("input[id='phone']").val();
                        garageOutsideView.current.note = $("textarea[id='note']").val();
                    }
                },
                clearInputFormVehicle: function () {
                    $("input[id='areaCode']").val('');
                    $("input[id='vehicle_id']").val('');
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
                    $("input[id='transferGarage']").val('');
                    $("input[id='driver']").val('');
                    garageOutsideView.text2.settext('');
                    $('#my-id').attr('data-id', '');
                    $("#listVehicle").find(".titleControl").html("Thêm mới xe");
                    $("button[id=editVehicleType]").prop("disabled", true);
                    $('#input-transfer-garage').hide(500);

                },
                clearInputFormVehicleType: function () {
                    $("input[id='vehicleType']").val('');
                    $("textarea[id='description']").val('');
                },
                fillCurrentObjectToForm: function () {
                    $("input[id='name']").val(garageOutsideView.current["name"]);
                    $("input[id='address']").val(garageOutsideView.current["address"]);
                    $("input[id='contact']").val(garageOutsideView.current["contact"]);
                    $("input[id='phone']").val(garageOutsideView.current["phone"]);
                    $("textarea[id='note']").val(garageOutsideView.current["note"]);
                },
                editGarage: function (id) {
                    garageOutsideView.current = null;
                    garageOutsideView.current = _.clone(_.find(garageOutsideView.dataGarage, function (o) {
                        return o.id == id;
                    }), true);
                    garageOutsideView.fillCurrentObjectToForm();
                    garageOutsideView.action = 'update';
                    $("#divControl").find(".titleControl").html("Cập nhật nhà xe");
                    garageOutsideView.showControl();
                },
                editVehicle: function (id) {
                    garageOutsideView.currentVehicle = null;
                    garageOutsideView.currentVehicle = _.clone(_.find(garageOutsideView.dataVehicle, function (o) {
                        return o.id == id;
                    }), true);
                    var sizeOld = garageOutsideView.currentVehicle["size"];
                    var size = sizeOld.split("x");
                    $("input[id='areaCode']").val(garageOutsideView.currentVehicle["areaCode"]);
                    $("input[id='vehicleNumber']").val(garageOutsideView.currentVehicle["vehicleNumber"]);
                    $("input[id='owner']").val(garageOutsideView.currentVehicle["owner"]);
                    $("input[id='long']").val(size[0]);
                    $("input[id='wide']").val(size[1]);
                    $("input[id='high']").val(size[2]);
                    $("input[id='weight']").val(garageOutsideView.currentVehicle["weight"]);
                    $("input[id='transferGarage']").val(garageOutsideView.currentVehicle["garageName"]);
                    $('#transferGarage').attr('data-idGarage', garageOutsideView.currentVehicle["garage_id"]);
                    $("input[id='vehicleType_id']").val(garageOutsideView.currentVehicle["name"]);
                    $("input[id='trademark']").val(garageOutsideView.currentVehicle["trademark"]);
                    $("input[id='yearOfProduction']").val(garageOutsideView.currentVehicle["yearOfProduction"]);
                    $("input[id='vehicle_id']").val(garageOutsideView.currentVehicle["vehicle_id"]);
                    $("#vehicleType_id").attr('data-id', garageOutsideView.currentVehicle["vehicleType_id"]);
                    garageOutsideView.text2.settext(garageOutsideView.currentVehicle["fullName"]);
                    $("#my-id").attr('data-id', garageOutsideView.currentVehicle["idDriver"]);
                    $("textarea[id='noteVehicle']").val(garageOutsideView.currentVehicle["note"]);
                    garageOutsideView.action = 'updateVehicle';
                    $("button[id=editVehicleType]").prop("disabled", false);
                    $("#listVehicle").find(".titleControl").html("Cập nhật xe");
                    garageOutsideView.clearValidation();
                    $('#input-transfer-garage').show(500);
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
                        url: url + 'load-vehicle/vehicle',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            garageOutsideView.dataVehicleType = data['vehicleTypes'];
                            garageOutsideView.dataVehicle = data['dataVehicles'];
                            garageOutsideView.dataDriver = data['dataDriver'];
                            garageOutsideView.dataAllDriver = data['allDriver'];
                            garageOutsideView.dataAllGarages = data['allGarage'];
                            garageOutsideView.fillDataToDatatableVehicles(data['dataVehicles']);
                            garageOutsideView.renderAutoCompleteSearch();

                        } else {
                            garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                },
                renderAutoCompleteSearch: function () {
                    garageOutsideView.tagsVehicleType = _.map(garageOutsideView.dataVehicleType, 'name');
                    garageOutsideView.tagsVehicleType = _.union(garageOutsideView.tagsVehicleType);
                    renderAutoCompleteSearch('#vehicleType_id', garageOutsideView.tagsVehicleType, $("#vehicleType_id").focusout(function () {
                        var vehicleTypeName = this.value;
                        if (vehicleTypeName == '') return;
                        var vehicleType = _.find(garageOutsideView.dataVehicleType, function (o) {
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
                                garageOutsideView.action = 'vehicleType';
                                garageOutsideView.displayModal('show', '#modal-addVehicleType');
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

                    garageOutsideView.tagsGarageVehicle = _.map(garageOutsideView.dataAllGarages, 'name');
                    garageOutsideView.tagsGarageVehicle = _.union(garageOutsideView.tagsGarageVehicle);
                    renderAutoCompleteSearch('#transferGarage', garageOutsideView.tagsGarageVehicle, $("#transferGarage").focusout(function () {
                        var garageName = this.value;
                        if (garageName == '') return;
                        var name = _.find(garageOutsideView.dataAllGarages, function (o) {
                            return o.name == garageName;
                        });
                        if (typeof name === "undefined") {
                            $("#transferGarage").attr("data-idGarage", '');
                            if ($('input[id=transferGarage]').val() == "") {
                                $("#transferGarage").attr("data-idGarage", '');
                            }
                        } else {
                            $("#transferGarage").attr("data-idGarage", name.id);
                        }
                    }));
                },
                saveVehicleType: function () {
                    garageOutsideView.vehicleTypeValidate();
                    var vehicleType = null;
                    if (garageOutsideView.action == "updateVehicleType" && $("#vehicleType_id").attr("data-id") != "") {
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
                        _action: garageOutsideView.action,
                        _vehicleType: vehicleType
                    };
                    if ($("#frmVehicleType").valid()) {
                        $.ajax({
                            url: url + 'vehicle-type/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                switch (garageOutsideView.action) {
                                    case 'vehicleType':
                                        garageOutsideView.dataVehicleType.push(data['dataVehicleTypes']);
                                        garageOutsideView.showNotification("success", "Thêm mới loại xe thành công");
                                        garageOutsideView.displayModal("hide", "#modal-addVehicleType");
                                        var idVehicleType = data['dataVehicleTypes']['id'];
                                        var nameVehicleType = data['dataVehicleTypes']['name'];
                                        $('input[id=vehicleType_id]').val(nameVehicleType);
                                        $("#vehicleType_id").attr("data-id", idVehicleType);
                                        garageOutsideView.clearInputFormVehicleType();
                                        if ($('input[id=vehicle_id]').val() != '') {
                                            garageOutsideView.action = "addVehicle"
                                        } else {
                                            garageOutsideView.action = "updateVehicle"
                                        }
                                        break;
                                    case 'updateVehicleType':
                                        garageOutsideView.dataVehicleType.push(data['updateVehicleType']);
                                        garageOutsideView.showNotification("success", "Cập nhật loại xe thành công");
                                        garageOutsideView.displayModal("hide", "#modal-addVehicleType");
                                        var nameVehicleType = data['updateVehicleType']['name'];
                                        $('input[id=vehicleType_id]').val(nameVehicleType);
                                        if ($('input[id=vehicle_id]').val() != '') {
                                            garageOutsideView.action = "addVehicle"
                                        } else {
                                            garageOutsideView.action = "updateVehicle"
                                        }
                                        break;
                                    default:
                                        break;
                                }
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmVehicleType").find("label[class=error]").css("color", "red");
                    }
                },
//                saveVehicleType: function () {
//                    garageOutsideView.vehicleTypeValidate();
//                    var vehicleType = null;
//                    if (garageOutsideView.action == "updateVehicleType" && $("#vehicleType_id").attr("data-id") != "") {
//                        vehicleType = {
//                            vehicleType: $("input[id='vehicleType']").val(),
//                            description: $("textarea[id='description']").val(),
//                            id: $("#vehicleType_id").attr('data-id')
//                        };
//                    } else {
//                        vehicleType = {
//                            vehicleType: $("input[id='vehicleType']").val(),
//                            description: $("textarea[id='description']").val()
//                        };
//                    }
//                    var sendToServer = {
//                        _token: _token,
//                        _action: garageOutsideView.action,
//                        _vehicleType: vehicleType
//                    };
//                    if ($("#frmVehicleType").valid()) {
//                        $.ajax({
//                            url: url + 'vehicle-type/modify',
//                            type: "POST",
//                            dataType: "json",
//                            data: sendToServer
//                        }).done(function (data, textStatus, jqXHR) {
//                            if (jqXHR.status == 201) {
//                                switch (garageOutsideView.action) {
//                                    case 'vehicleType':
//                                        garageOutsideView.dataVehicleType.push(data['dataVehicleTypes']);
//                                        garageOutsideView.showNotification("success", "Thêm mới loại xe thành công");
//                                        garageOutsideView.displayModal("hide", "#modal-addVehicleType");
//                                        var idVehicleType = data['dataVehicleTypes']['id'];
//                                        var nameVehicleType = data['dataVehicleTypes']['name'];
//                                        $('input[id=vehicleType_id]').val(nameVehicleType);
//                                        $("#vehicleType_id").attr("data-id", idVehicleType);
//                                        garageOutsideView.clearInputFormVehicleType();
//                                        if ($('input[id=vehicle_id]').val() != '') {
//                                            garageOutsideView.action = "updateVehicle"
//                                        } else {
//                                            garageOutsideView.action = "addVehicle"
//                                        }
//                                        break;
//                                    case 'updateVehicleType':
//                                        garageOutsideView.dataVehicleType.push(data['updateVehicleType']);
//                                        garageOutsideView.showNotification("success", "Cập nhật loại xe thành công");
//                                        garageOutsideView.displayModal("hide", "#modal-addVehicleType");
//                                        var nameVehicleType = data['updateVehicleType']['name'];
//                                        $('input[id=vehicleType_id]').val(nameVehicleType);
//                                        $('#modal-addVehicleType').on('hidden.bs.modal', function () {
//                                            if ($('input[id=vehicle_id]').val() != '') {
//                                                garageOutsideView.action = "addVehicle"
//                                            }else {
//                                                garageOutsideView.action = "updateVehicle"
//                                            }
//                                        });
//                                        break;
//                                    default:
//                                        break;
//                                }
//                            }
//                        }).fail(function (jqXHR, textStatus, errorThrown) {
//                            garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
//                        });
//                    } else {
//                        $("form#frmVehicleType").find("label[class=error]").css("color", "red");
//                    }
//                },
                fillFormDataToCurrentObjectVehicle: function () {
                    var long = $("input[id='long']").val();
                    var wide = $("input[id='wide']").val();
                    var high = $("input[id='high']").val();
                    if (long == '' && wide == '' && high == '') {
                        var size = '';
                    } else {
                        var size = long.concat(' x ' + wide + ' x ' + high);
                    }

                    if (garageOutsideView.action == 'addVehicle') {
                        garageOutsideView.currentVehicle = {
                            garage_id: $("input[id='garage_id']").val(),
                            idUpdateGarage: $("#transferGarage").attr('data-idGarage'),
                            idDriver: $("#my-id").attr('data-id'),
                            areaCode: $("input[id='areaCode']").val(),
                            vehicleNumber: $("input[id='vehicleNumber']").val(),
                            vehicleType_id: $("#vehicleType_id").attr('data-id'),
                            owner: $("input[id='owner']").val(),
                            size: size,
                            weight: $("input[id='weight']").val(),
                            note: $("textarea[id='noteVehicle']").val(),
                            trademark: $("input[id='trademark']").val(),
                            yearOfProduction: $("input[id='yearOfProduction']").val()
                        };
                    } else if (garageOutsideView.action == 'updateVehicle') {
                        garageOutsideView.currentVehicle.garage_id = $("input[id='garage_id']").val();
                        garageOutsideView.currentVehicle.idUpdateGarage = $("#transferGarage").attr('data-idGarage');
                        garageOutsideView.currentVehicle.areaCode = $("input[id='areaCode']").val();
                        garageOutsideView.currentVehicle.vehicleNumber = $("input[id='vehicleNumber']").val();
                        garageOutsideView.currentVehicle.vehicleType_id = $("#vehicleType_id").attr('data-id');
                        garageOutsideView.currentVehicle.owner = $("input[id='owner']").val().toUpperCase();
                        garageOutsideView.currentVehicle.size = size;
                        garageOutsideView.currentVehicle.weight = $("input[id='weight']").val();
                        garageOutsideView.currentVehicle.note = $("textarea[id='noteVehicle']").val();
                        garageOutsideView.currentVehicle.trademark = $("input[id='trademark']").val();
                        garageOutsideView.currentVehicle.yearOfProduction = $("input[id='yearOfProduction']").val();
                        garageOutsideView.currentVehicle.idDriver = $("#my-id").attr('data-id');
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
                    garageOutsideView.action = 'deleteVehicle';
                    garageOutsideView.idDeleteVehicle = id;
                    garageOutsideView.displayModal("show", "#modal-confirmDeleteVehicle");
                },
                saveVehicle: function () {
                    var sendToServer = null;
                    if (garageOutsideView.action == 'deleteVehicle') {
                        sendToServer = {
                            _token: _token,
                            _action: garageOutsideView.action,
                            _id: garageOutsideView.idDeleteVehicle
                        };
                        $.ajax({
                            url: url + 'vehicle-inside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var vehicleOld = _.find(garageOutsideView.dataVehicle, function (o) {
                                    return o.id == sendToServer._id;
                                });
                                var indexOfVehicleOld = _.indexOf(garageOutsideView.dataVehicle, vehicleOld);
                                garageOutsideView.dataVehicle.splice(indexOfVehicleOld, 1);
                                garageOutsideView.showNotification("success", "Xóa thành công!");
                                garageOutsideView.displayModal("hide", "#modal-confirmDeleteVehicle");
                            }
                            garageOutsideView.tableVehicle.clear().rows.add(garageOutsideView.dataVehicle).draw();
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        garageOutsideView.vehicleValidate();
                        garageOutsideView.fillFormDataToCurrentObjectVehicle();
                        var areaCode = $("input[id=areaCode]").val();
                        var vehicleNumber = $("input[id=vehicleNumber]").val();
                        var fullNumber = areaCode + vehicleNumber;
                        var vehicle = _.filter(garageOutsideView.dataAllVehicle, function (o) {
                            return o.areaCode + o.vehicleNumber == fullNumber;
                        });

                        var inDriver = $("input[id=my-id]").val();
                        if (inDriver != "") {
                            var driver = _.find(garageOutsideView.dataAllDriver, function (o) {
                                return o.fullName == inDriver;
                            });
                            if (typeof driver == 'undefined') {
                                showNotification("warning", "Tài xế không tồn tại!");
                                return;
                            }
                        }

                        if ($("#frmVehicle").valid()) {
                            if ($("#vehicleType_id").attr("data-id") == '') {
                                showNotification("warning", "Loại xe không tồn tại!");
                                return;
                            }
                            else if (vehicle != 0 && garageOutsideView.action == "addVehicle") {
                                showNotification("warning", "Xe đã tồn tại!");
                                return;
                            }
                            else if ($('input[id=transferGarage]').val() != '' && $("#transferGarage").attr("data-idGarage") == '') {
                                showNotification("warning", "Nhà xe không tồn tại!");
                                return;
                            }
                            else {
                                sendToServer = {
                                    _token: _token,
                                    _action: garageOutsideView.action,
                                    _vehicle: garageOutsideView.currentVehicle
                                };
                                $.ajax({
                                    url: url + 'vehicle-inside/modify',
                                    type: "POST",
                                    dataType: "json",
                                    data: sendToServer
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        switch (garageOutsideView.action) {
                                            case 'addVehicle':
                                                data['addVehicle'].fullNumber = data['addVehicle']['areaCode'] + "-" + data['addVehicle']["vehicleNumber"];
                                                garageOutsideView.dataVehicle.push(data['addVehicle']);
                                                garageOutsideView.dataAllVehicle.push(data['addVehicle']);
                                                garageOutsideView.showNotification("success", "Thêm thành công!");
                                                break;
                                            case 'updateVehicle':
                                                data['updateVehicle'].fullNumber = data['updateVehicle']['areaCode'] + "-" + data['updateVehicle']["vehicleNumber"];
                                                var vehicleOld = _.find(garageOutsideView.dataVehicle, function (o) {
                                                    return o.id == sendToServer._vehicle.id;
                                                });
                                                var indexOfVehicleOld = _.indexOf(garageOutsideView.dataVehicle, vehicleOld);
                                                if (data['updateVehicle']['garage_id'] == vehicleOld['garage_id']) {
                                                    garageOutsideView.dataVehicle.splice(indexOfVehicleOld, 1, data['updateVehicle']);
                                                } else {
                                                    garageOutsideView.dataVehicle.splice(indexOfVehicleOld, 1);
                                                }
                                                garageOutsideView.showNotification("success", "Cập nhật thành công!");
                                                garageOutsideView.action = "addVehicle";
                                                break;
                                            default:
                                                break;
                                        }
                                        garageOutsideView.tableVehicle.clear().rows.add(garageOutsideView.dataVehicle).draw();
                                        garageOutsideView.clearInputFormVehicle();
                                        garageOutsideView.dataDriver = data['drivers'];
                                        $("#my-id").remove();
                                        garageOutsideView.tableAutoCompleteSearch();

                                    } else {
                                        garageOutsideView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");

                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    garageOutsideView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                                });
                            }
                        } else {
                            $("form#frmVehicle").find("label[class=error]").css("color", "red");
                        }
                    }
                }
            };
            garageOutsideView.loadData();
        } else {
            garageOutsideView.loadData();
        }
    });
</script>
