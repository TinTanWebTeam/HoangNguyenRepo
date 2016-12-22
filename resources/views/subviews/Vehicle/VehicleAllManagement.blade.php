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
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalContent"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="PositionView.deletePosition()">Ðồng ý
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="PositionView.cancelDelete()">Hủy
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}

<div class="modal fade" id="modalPositionRestore" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalPositionRestore"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary marginRight" name="modalAgree"
                        onclick="PositionView.restorePosition()">Tạo lại
                </button>
                <button type="button" class="btn default" name="modalClose"
                        onclick="PositionView.cancelPositionRestore()">Nhập lại
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}

<div class="modal fade" id="modalPosition" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"><h5 id="modalPosition"></h5></div>
            <div class="modal-footer">
                <button type="button" class="btn default" name="modalClose"
                        onclick="PositionView.cancelValidatePosition()">Nhập lại
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}
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
                    {{--<div class="pull-right menu-toggle fixed">--}}
                    {{--<div class="btn btn-primary btn-circle btn-md" title="Thêm mới"--}}
                    {{--onclick="PositionView.addNewPosition()">--}}
                    {{--<i class="glyphicon glyphicon-plus icon-center"></i>--}}
                    {{--</div>--}}
                    {{--</div>--}}
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
                            <th>Tài xế</th>
                            <th>Tình trạng</th>
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



<script>
    $(function () {
        if (typeof (VehicleAllView) === 'undefined') {
            VehicleAllView = {
                table: null,
                data: null,
                action: null,
                idDelete: null,
                tableVehicle: null,
                current: null,

                loadData: function () {
                    $.ajax({
                        url: url + 'vehicle-all-management/get-data-vehicle',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            VehicleAllView.dataVehicle = data['dataAllVehicle'];
                            VehicleAllView.fillDataToDatatable(data['dataAllVehicle']);
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
                            {data: 'fullNumber'},
                            {data: 'garagesName'},
                            {data: 'driverName'},
                            {data: 'status'}
                        ],
                        order: [[0, "desc"]]


                    })
                }


            };
            VehicleAllView.loadData();
        }
        else {
            VehicleAllView.loadData();
        }
    });
</script>


