<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 50%;
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
        height: 260px;
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
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-striped table-hover" id="table-data">
                        <thead>
                        <tr class="active">
                            <th>Stt</th>
                            <th>Số xe</th>
                            <th>Nhà xe</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
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

{{--Modal update trang thai xe--}}
<div class="row">
    <div id="modal-confirmUpdate" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="">×</span>
                    </button>
                    <h5 class="modal-title">Cập nhật trạng thái xe</h5>
                </div>
                <div class="modal-body">
                    <form id="frmVehicleType">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicle"><b>Số xe</b></label>
                                    <input type="text" class="form-control"
                                           id="vehicle" readonly
                                           name="vehicle">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="garage"><b>Nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="garage" readonly
                                           name="garage">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicle"><b>Trạng thái</b></label>
                                    <select id="status_transport" name="status_transport"
                                            class="form-control"></select>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="note"><b>Ghi chú</b></label>
                                    <textarea class="form-control"
                                              id="note"
                                              name="note"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-offset-7 col-md-5">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="VehicleAllView.save()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="VehicleAllView.cancel()">Hủy
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
{{--Modal update trang thai xe--}}


<script>
    $(function () {
        if (typeof (VehicleAllView) === 'undefined') {
            VehicleAllView = {
                table: null,
                data: null,
                action: null,
                idVehicle: null,
                tableVehicle: null,
                dataStatus: null,
                current: null,
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
                cancel:function () {
                    VehicleAllView.displayModal("hide", "#modal-confirmUpdate");
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'vehicle-all-management/get-data-vehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            VehicleAllView.dataVehicle = data['dataAllVehicle'];
                            VehicleAllView.dataStatus = data['dataStatus'];
                            VehicleAllView.fillDataToDatatable(data['dataAllVehicle']);
                            VehicleAllView.loadSelectBox(data['dataStatus']);
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
                    $("#table-data").find("tbody").on('dblclick', 'tr', function () {
                        var vehicleId = $(this).find('td:eq(0)')[0].innerText;
                        VehicleAllView.loadModal(vehicleId);
                    });
                },
                loadModal: function (data) {
                    VehicleAllView.current = _.clone(_.find(VehicleAllView.dataVehicle, function (o) {
                        return o.id == data;
                    }), true);
                    VehicleAllView.fillCurrentObjectToForm();
                    VehicleAllView.idVehicle = data;
                    VehicleAllView.displayModal("show", "#modal-confirmUpdate");
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (VehicleAllView.action == 'update' && type == 'hide') {
                        VehicleAllView.action = null;
                        VehicleAllView.idUpdate = null;
                    }

                },
                fillCurrentObjectToForm: function () {
                    var vehicle = VehicleAllView.current["areaCode"] + "-" + VehicleAllView.current["vehicleNumber"];
                    $("input[id='vehicle']").val(vehicle);
                    $("input[id='garage']").val(VehicleAllView.current["garagesName"]);
                    $("textarea[id='noted']").val(VehicleAllView.current["note"]);
                    $("select[id='status_transport']").val(VehicleAllView.current["status_id"]);
                },
                loadSelectBox: function (lstStr) {
                    $('#status_transport')
                        .find('option')
                        .remove()
                        .end();
                    //fill option to selectbox
                    var select = document.getElementById("status_transport");
                    for (var i = 0; i < lstStr.length; i++) {
                        var opt = lstStr[i]['status'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstStr[i]['id'];
                        select.appendChild(el);
                    }
                },
                fillDataToDatatable: function (data) {
                    if (VehicleAllView.table != null) {
                        VehicleAllView.table.destroy();
                    }
                    for (var i = 0; i < data.length; i++) {
                        data[i].fullNumber = (data[i]['areaCode'] == null || data[i]['vehicleNumber'] == null) ? "" : data[i]['areaCode'] + "-" + data[i]['vehicleNumber'];
                    }

                    VehicleAllView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'fullNumber'},
                            {data: 'garagesName'},
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
                                    tr += '<i style="width: 50%; display: inline-block; font-size: 20px;" class="fa fa-truck ' + color_vehicle + '" aria-hidden="true"></i>';
                                    tr += '<p>' + full.status + '</p>';
                                    return tr;
                                }


                            },
                            {data: 'note'}
                        ]
                    });
                },
                save: function () {
                    var sendToServer = null;
                    var _obj = {
                        status_id: $("select[id='status_transport']").val(),
                        note: $("textarea[id='note']").val(),
                        idVehicle: VehicleAllView.idVehicle
                    };
                    sendToServer = {
                        _token: _token,
                        _action: "updateStatusVehicle",
                        _object: _obj
                    };
                    $.ajax({
                        url: url + 'vehicle-all-management/post-data-vehicle',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            data['vehicle'].fullNumber = data['vehicle']['areaCode'] + "-" + data['vehicle']["vehicleNumber"];
                            var VehicleOld = _.find(VehicleAllView.dataVehicle, function (o) {
                                return o.id == sendToServer._object.idVehicle;
                            });
                            var indexOfVehicleOld = _.indexOf(VehicleAllView.dataVehicle, VehicleOld);
                            VehicleAllView.dataVehicle.splice(indexOfVehicleOld, 1, data['vehicle']);
                            VehicleAllView.showNotification("success", "Cập nhật thành công!");
                            VehicleAllView.displayModal("hide", "#modal-confirmUpdate");
                        }
                        VehicleAllView.fillDataToDatatable(VehicleAllView.dataVehicle);
//                        VehicleAllView.table.clear().rows.add(VehicleAllView.dataVehicle).draw();
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        VehicleAllView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                }
            };
            VehicleAllView.loadData();
        }
        else {
            VehicleAllView.loadData();
        }
    });
</script>


