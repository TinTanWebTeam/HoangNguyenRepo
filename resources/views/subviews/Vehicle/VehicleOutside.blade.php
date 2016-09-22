<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 40%;
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
                        <li class="active">Nhà xe ngoài</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="vehicleOutView.show()">
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
                            <th>Tên nhà xe</th>
                            <th>Người liên hệ</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($garages)
                            @foreach($garages as $garage)
                                <tr>
                                    <td>{{ $garage->name }}</td>
                                    <td>{{ $garage->contactor }}</td>
                                    <td>{{ $garage->address }}</td>
                                    <td>{{ $garage->phone }}</td>
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
        <div class="panel-heading">Thêm mới nhà xe ngoài
            <div class="menu-toggles pull-right" onclick="vehicleOutView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="NameHouseVehicle"><b>Tên nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NameHouseVehicle"
                                           name="NameHouseVehicle"
                                           placeholder="Tên nhà xe">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Name"><b>Người liên hệ</b></label>
                                    <input type="text" class="form-control"
                                           id="Name"
                                           name="Name"
                                           placeholder="Người liên hệ">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Telephone"><b>Số điện thoại</b></label>
                                    <input type="text" class="form-control"
                                           id="Telephone"
                                           name="Telephone"
                                           placeholder="090..">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="Adress"><b>Địa chỉ</b></label>
                                    <input type="text" class="form-control"
                                           id="Adress"
                                           name="Adress"
                                           placeholder="Địa chỉ">
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
        if (typeof (vehicleOutView) === 'undefined') {
            vehicleOutView = {
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
                    vehicleOutView.table = $('#table-data').DataTable({
                        language: languageOptions
                    })
                }
            };
            vehicleOutView.loadData();
        } else {
            vehicleOutView.loadData();
        }
    });
</script>
