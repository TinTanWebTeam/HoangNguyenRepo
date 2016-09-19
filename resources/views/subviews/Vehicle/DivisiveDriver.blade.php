<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 53%;
        display: none;
        right: 0;
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
                        <li class="active">Phân tài</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="divisiveDriverView.show()">
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
                            <th>Nhà xe</th>
                            <th>Tài xế</th>
                            <th>Điện thoại</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Phân tài vào xe
            <div class="menu-toggles pull-right" onclick="divisiveDriverView.hide()">
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
                                    <label for="HouseVehicle"><b>Nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="HouseVehicle"
                                           name="HouseVehicle"
                                           placeholder="Nhà xe"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="NameGoods"><b>Xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NameGoods"
                                           name="NameGoods"
                                           placeholder="Tên hàng"
                                           autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="PrepayCost"><b>Tài xế</b></label>
                                    <input type="text" class="form-control"
                                           id="PrepayCost"
                                           name="PrepayCost"
                                           placeholder="00.00"
                                    >
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
        if (typeof (divisiveDriverView) === 'undefined') {
            divisiveDriverView = {
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
                    $.post(url + 'divisive-driver', {_token: _token, formDate: null, toData: null}, function (list) {
                        divisiveDriverView.data = list;
                        divisiveDriverView.fillDataToDatatable(list);
                    })
                },
                fillDataToDatatable: function (data) {
                    divisiveDriverView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'vehicles_areaCode'},
                            {data: 'vehicles_vehicleNumber'},
                            {data: 'garages_name'},
                            {data: 'users_fullname'},
                            {data: 'users_phone'},
                            {
                                render: function () {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ]
                    })
                }
            };
            divisiveDriverView.loadData();
        } else {
            divisiveDriverView.loadData();
        }
    });
</script>
