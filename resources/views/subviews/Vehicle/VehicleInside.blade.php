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
                data: null,
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
                    $.post(url + 'vehicle-inside', {_token: _token, fromDate: null, toDate: null}, function (list) {
                        vehicleInsideView.data = list;
                        vehicleInsideView.fillDataToDatatable(list);
                    });

                },
                localSearch: function () {
                    var dataSearch = _.filter(vehicleInsideView.data, function (o) {
                        return o.vehicleNumber == "15432";
                    });
                    vehicleInsideView.table.destroy();
                    vehicleInsideView.fillDataToDatatable(dataSearch);
                },
                fillDataToDatatable: function (data) {
                    vehicleInsideView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'areaCode'},
                            {data: 'vehicleNumber'},
                            {data: 'vehicleTypes_name'},
                            {data: 'garages_name'},
                            {data: 'size'},
                            {data: 'weight'},
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
                        ],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                exportOptions: {
                                    columns: [ 0, ':visible' ]
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                    console.log(sheet);
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                message: 'Thống Kê Xe Từ Ngày ... Đến Ngày',
                                customize: function ( doc ) {
                                    doc.content.splice(0,1);
                                    doc.styles.tableBodyEven.alignment = 'center';
                                    doc.styles.tableBodyOdd.alignment = 'center';
                                    doc.content.columnGap = 10;
                                    doc.pageOrientation = 'landscape';
                                    for(var i = 0; i < doc.content[1].table.body.length;i++){
                                        for(var j = 0; j < doc.content[1].table.body[i].length; j++){
                                            doc.content[1].table.body[i].splice(6,1);
                                        }
                                    }
                                    doc.content[1].table.widths = [ '*', '*', '*', '*' ,'*','*'];
                                }
                            }
                        ]
                    })
                }
            };
            vehicleInsideView.loadData();
        } else {
            vehicleInsideView.loadData();
//            vehicleInsideView.fillDataToDatatable(vehicleInsideView.data);
        }
    });
</script>
