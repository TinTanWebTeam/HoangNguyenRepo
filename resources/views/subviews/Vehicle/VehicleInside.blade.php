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
                        <div class="btn btn-primary btn-circle btn-md" onclick="vehicleInsideView.addNewVehicle();">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-hover table-striped" id="table-data">
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
                                    <label for="id"><b>Mã</b></label>
                                    <input type="text" class="form-control"
                                           id="id"
                                           placeholder="Mã"
                                           autofocus data-id>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="garage_id"><b>Mã nhà xe</b></label>
                                    <input type="text" class="form-control"
                                           id="garage_id"
                                           placeholder="Số xe">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleType_id"><b>Mã loại xe</b></label>
                                    <input type="text" class="form-control"
                                           id="vehicleType_id"
                                           placeholder="Số xe">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="areaCode"><b>Mã vùng</b></label>
                                    <input type="text" class="form-control"
                                           id="areaCode"
                                           placeholder="Số xe">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleNumber"><b>Số xe</b></label>
                                    <input type="text" class="form-control"
                                           id="vehicleNumber"
                                           placeholder="Số xe">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="size"><b>Kích thước</b></label>
                                    <input type="text" class="form-control"
                                           id="size"
                                           placeholder="Kích thước">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="weight"><b>Trọng tải</b></label>
                                    <input type="text" class="form-control"
                                           id="weight"
                                           placeholder="Trọng tải">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-actions noborder">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="vehicleInsideView.save()">
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
                current: null,
                action: null,
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
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle"  onclick="vehicleInsideView.loadEdit('+full.id+')">';
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
                            },
                            {
                                extend: 'colvis'
                            }
                        ]
                    })
                },
                loadEdit: function(id) {
                    vehicleInsideView.show();
                    vehicleInsideView.current = _.clone(_.find(vehicleInsideView.data, function(o){
                        return o.id == id;
                    }),true);
                    vehicleInsideView.fillCurrentObjectToForm();
                },
                fillCurrentObjectToForm: function(){
                    for(var propertyName in vehicleInsideView.current){
                        $("input[id=" + propertyName + "]").val(vehicleInsideView.current[propertyName]);
                    }
                    vehicleInsideView.action = 'update';
                    vehicleInsideView.show();
                },
                fillFormDataToCurrentObject: function () {
                    for(var propertyName in vehicleInsideView.current){
                        vehicleInsideView.current[propertyName] = $("input[id=" + propertyName + "]").val();
                    }
                },
                addNewVehicle: function () {
                    vehicleInsideView.action = 'add';
                    vehicleInsideView.show();
                },
                save : function () {
                    vehicleInsideView.fillFormDataToCurrentObject();
                    $.post(
                        url + 'vehicle-inside/modify',
                        {
                            _token: _token,
                            _action: vehicleInsideView.action,
                            _object :  vehicleInsideView.current
                        }, function (data) {
                            vehicleInsideView.table.clear().rows.add(vehicleInsideView.data).draw();
                        }
                    );

                    vehicleInsideView.clearInput();
                },
                clearInput: function(){
                    for(var propertyName in vehicleInsideView.current){
                        $("input[id=" + propertyName + "]").val('');
                    }
                    vehicleInsideView.current = null;
                }
            };
            vehicleInsideView.loadData();
        } else {
            vehicleInsideView.loadData();
        }
    });
</script>
