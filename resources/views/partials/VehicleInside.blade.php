<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 27%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
    }

    .fixed {
        top: 72px;
        position: fixed;
        right: 20px;
        z-index: 2;
    }

    .menu-toggles {
        cursor: pointer
    }

    .icon-center {
        line-height: 130%;
        padding-left: 3%;
        font-size: 13px;
    }

    ol.breadcrumb {
        border-bottom: 2px solid #e7e7e7
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>

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
                        <div class="btn btn-primary btn-circle btn-md" onclick="vehicleInsideView.show()">
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
                            <th>Mã vùng</th>
                            <th>Số xe</th>
                            <th>Mã loại xe</th>
                            <th>Mã nhà xe</th>
                            <th>Kích thước</th>
                            <th>Trọng tải</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($vehicles)
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{ $vehicle->areaCode }}</td>
                                    <td>{{ $vehicle->vehicleNumber }}</td>
                                    <td>{{ $vehicle->vehicleTypes_name }}</td>
                                    <td>{{ $vehicle->garages_name }}</td>
                                    <td>{{ $vehicle->size }}</td>
                                    <td>{{ $vehicle->weight }}</td>
                                    <td>
                                        <div class="btn-del-edit">
                                            <div class="btn btn-success  btn-circle">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </div>
                                        </div>
                                        <div class="btn-del-edit">
                                            <div class="btn btn-danger btn-circle">
                                                <i class="glyphicon glyphicon-remove"></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới xe
            <div class="menu-toggles pull-right" onclick="vehicleInsideView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Code"><b>Mã</b></label>
                                    <input type="text" class="form-control"
                                           id="Code"
                                           name="Code"
                                           placeholder="Mã"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="NumberVehicle"><b>Mã nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NumberVehicle"
                                           name="NumberVehicle"
                                           placeholder="Số xe">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="NumberVehicle"><b>Mã loại xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NumberVehicle"
                                           name="NumberVehicle"
                                           placeholder="Số xe">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="NumberVehicle"><b>Mã vùng</b></label>
                                    <input type="text" class="form-control"
                                           id="NumberVehicle"
                                           name="NumberVehicle"
                                           placeholder="Số xe">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="NumberVehicle"><b>Số xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NumberVehicle"
                                           name="NumberVehicle"
                                           placeholder="Số xe">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Size"><b>Kích thước</b></label>
                                    <input type="text" class="form-control"
                                           id="Size"
                                           name="Size"
                                           placeholder="Kích thước">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Kg"><b>Trọng tải</b></label>
                                    <input type="text" class="form-control"
                                           id="Kg"
                                           name="Kg"
                                           placeholder="Trọng tải">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-md-line-input">
                                    <label for="Driver"><b>Tài xế</b></label>
                                    <input type="text" class="form-control"
                                           id="Driver"
                                           name="Driver"
                                           placeholder="Tài xế">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-actions noborder">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="">
                                    Hoàn tất
                                </button>
                                <button type="button" class="btn default" onclick="">Huỷ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- end #frmControl -->

<script>
    $(function () {
        if (typeof (vehicleInsideView) === 'undefined') {
            vehicleInsideView = {
                table: null,
                show: function () {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                },
                hide: function () {
                    $('#frmControl').slideUp('', function () {
                        $('.menu-toggle').show();
                    });
                },
                loadData: function () {
                    vehicleInsideView.table = $('#table-data').DataTable({
                        language: languageOptions
                    })
                }
            };
            vehicleInsideView.loadData();
        } else {
            vehicleInsideView.loadData();
        }
    });
</script>
