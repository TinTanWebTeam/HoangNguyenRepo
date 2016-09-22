<style>
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 45%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
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
                        <div class="btn btn-primary btn-circle btn-md" onclick="vehicleInsideView.addVehicle();">
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
                            <th>Loại xe</th>
                            <th>Nhà xe</th>
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
                                <input type="hidden" class="form-control"
                                       id="id"
                                       autofocus>
                                <div class="form-group form-md-line-input">
                                    <label for="garage_id"><b>Nhà xe</b></label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="hidden" id="garage_id">
                                            <input type="text" class="form-control"
                                                   id="garages_name"
                                                   placeholder="Số xe" ondblclick="vehicleInsideView.searchGarage()">
                                        </div>
                                        <div class="col-md-2">
                                            <div class="btn btn-primary btn-sm btn-circle" onclick="vehicleInsideView.addGarage()">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleType_id"><b>Loại xe</b></label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <select class="form-control" id="vehicleType_id">
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="btn btn-primary btn-sm btn-circle" onclick="vehicleInsideView.addVehicleType()">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="areaCode"><b>Mã vùng</b></label>
                                    <input type="text" class="form-control"
                                           id="areaCode"
                                           placeholder="Số xe">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="vehicleNumber"><b>Số xe</b></label>
                                    <input type="text" class="form-control"
                                           id="vehicleNumber"
                                           placeholder="Số xe">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="size"><b>Kích thước</b></label>
                                    <input type="text" class="form-control"
                                           id="size"
                                           placeholder="Kích thước">
                                </div>
                            </div>
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

<!-- Modal garages -->
<div id="modal-garage" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Danh sách nhà xe</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table-garage">
                        <thead>
                        <tr>
                            <th>Tên nhà xe</th>
                            <th>Người liên hệ</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th></th>
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
<!-- end Modal garages -->

<!-- Modal add garage -->
<div id="modal-addGarage" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Thêm nhà xe</h4>
            </div>
            <div class="modal-body">
                <form>
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
                        <div class="col-md-6 ">
                            <div class="form-group form-md-line-input">
                                <label for="Name"><b>Người liên hệ</b></label>
                                <input type="text" class="form-control"
                                       id="Name"
                                       name="Name"
                                       placeholder="Người liên hệ">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 ">
                            <div class="form-group form-md-line-input ">
                                <label for="Telephone"><b>Số điện thoại</b></label>
                                <input type="text" class="form-control"
                                       id="Telephone"
                                       name="Telephone"
                                       placeholder="090..">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-md-line-input">
                                <label for="Adress"><b>Địa chỉ</b></label>
                                <input type="text" class="form-control"
                                       id="Adress"
                                       name="Adress"
                                       placeholder="Địa chỉ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4">
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
    </div>
</div>
<!-- end Modal add garages -->

<!-- Modal add vehicleTypes -->
<div id="modal-addVehicleType" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Thêm loại xe</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label for="NameHouseVehicle"><b>Tên loại xe</b></label>
                                <input type="text" class="form-control"
                                       id="NameHouseVehicle"
                                       name="NameHouseVehicle"
                                       placeholder="Tên nhà xe">
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input">
                                <label for="Name"><b>Mô tả</b></label>
                                <textarea name="" id="" cols="10" rows="3" class="form-control">

                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4">
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
    </div>
</div>
<!-- end Modal add vehicleTypes -->

<script>
    $(function () {
        if (typeof (vehicleInsideView) === 'undefined') {
            vehicleInsideView = {
                table: null,
                tableGarage: null,
                data: null,
                current: null,
                action: null,
                idDelete: null,
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
                    $.get(url + 'vehicle-inside/getData', function (list) {
                        vehicleInsideView.data = list['vehicles'];
                        vehicleInsideView.fillDataToDatatable(list['vehicles']);

                        vehicleInsideView.loadSelectBox(list['vehicleTypes']);
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
                                    tr += '<div class="btn btn-success  btn-circle" onclick="vehicleInsideView.editVehicle(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="vehicleInsideView.deleteVehicle(' + full.id + ')">';
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
                                    columns: [0, ':visible']
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                message: 'Thống Kê Xe Từ Ngày ... Đến Ngày',
                                customize: function (doc) {
                                    doc.content.splice(0, 1);
                                    doc.styles.tableBodyEven.alignment = 'center';
                                    doc.styles.tableBodyOdd.alignment = 'center';
                                    doc.content.columnGap = 10;
                                    doc.pageOrientation = 'landscape';
                                    for (var i = 0; i < doc.content[1].table.body.length; i++) {
                                        for (var j = 0; j < doc.content[1].table.body[i].length; j++) {
                                            doc.content[1].table.body[i].splice(6, 1);
                                        }
                                    }
                                    doc.content[1].table.widths = ['*', '*', '*', '*', '*', '*'];
                                }
                            },
                            {
                                extend: 'colvis'
                            }
                        ]
                    })
                },
                editVehicle: function (id) {
                    vehicleInsideView.current = _.clone(_.find(vehicleInsideView.data, function (o) {
                        return o.id == id;
                    }), true);
                    vehicleInsideView.fillCurrentObjectToForm();
                    vehicleInsideView.action = 'update';
                    vehicleInsideView.show();
                },
                addVehicle: function () {
                    vehicleInsideView.action = 'add';
                    vehicleInsideView.show();
                },
                deleteVehicle: function (id) {
                    vehicleInsideView.action = 'delete';
                    vehicleInsideView.idDelete = id;
                    vehicleInsideView.save();
                },
                fillCurrentObjectToForm: function () {
                    for (var propertyName in vehicleInsideView.current) {
                        $("input[id=" + propertyName + "]").val(vehicleInsideView.current[propertyName]);
                    }
                },
                fillFormDataToCurrentObject: function () {
                    if (vehicleInsideView.action == 'add') {
                        vehicleInsideView.current = {
                            vehicleType_id: $("input[id='vehicleType_id']").val(),
                            garage_id: $("input[id='garage_id']").val(),
                            vehicleNumber: $("input[id='vehicleNumber']").val(),
                            areaCode: $("input[id='areaCode']").val(),
                            size: $("input[id='size']").val(),
                            weight: $("input[id='weight']").val()
                        }
                    } else if (vehicleInsideView.action == 'update') {
                        for (var propertyName in vehicleInsideView.current) {
                            vehicleInsideView.current[propertyName] = $("input[id=" + propertyName + "]").val();
                        }
                    }
                },
                clearInput: function () {
                    for (var propertyName in vehicleInsideView.current) {
                        $("input[id=" + propertyName + "]").val('');
                    }
                    vehicleInsideView.current = null;
                },
                save: function () {
                    vehicleInsideView.fillFormDataToCurrentObject();

                    var sendToServer = {
                        _token: _token,
                        _action: vehicleInsideView.action,
                        _object: vehicleInsideView.current
                    };
                    if (vehicleInsideView.action == 'delete') {
                        sendToServer._object = vehicleInsideView.idDelete;
                    }
                    $.post(
                            url + 'vehicle-inside/modify',
                            sendToServer
                            , function (data) {
                                if (data['status'] == 'Ok') {
                                    switch (vehicleInsideView.action) {
                                        case 'add':
                                            vehicleInsideView.data.push(data['obj'][0]);
                                            break;
                                        case 'update':
                                            var obj = _.find(vehicleInsideView.data, function (o) {
                                                return o.id == sendToServer._object.id;
                                            });
                                            var index = _.indexOf(vehicleInsideView.data, obj);
                                            vehicleInsideView.data.splice(index, 1, data['obj'][0]);
                                            vehicleInsideView.hide();
                                            break;
                                        case 'delete':
                                            var obj = _.find(vehicleInsideView.data, function (o) {
                                                return o.id == sendToServer._object;
                                            });
                                            var index = _.indexOf(vehicleInsideView.data, obj);
                                            vehicleInsideView.data.splice(index, 1);
                                            break;
                                        default:
                                            break;
                                    }
                                }
                                vehicleInsideView.table.clear().rows.add(vehicleInsideView.data).draw();
                            }
                    );
                    vehicleInsideView.clearInput();
                },
                searchGarage: function () {
                    $.get(url + 'vehicle-inside/getAllGarage', function (listGarage) {
                        vehicleInsideView.tableGarage = $('#table-garage').DataTable({
                            language: languageOptions,
                            data: listGarage,
                            columns: [
                                {data: 'name'},
                                {data: 'contactor'},
                                {data: 'address'},
                                {data: 'phone'},
                                {
                                    render: function () {
                                        var tr = "";
                                        tr += "<div class='radio'>";
                                        tr += "<label><input type='radio'></label>";
                                        tr += "</div>";
                                        return tr;
                                    }
                                }
                            ]
                        })
                    });
                    $("#modal-garage").modal("show");
                    vehicleInsideView.tableGarage.destroy();
                },
                loadSelectBox: function(lstVehicleType){
                    var select = document.getElementById("vehicleType_id");
                    for(var i = 0; i < lstVehicleType.length; i++) {
                        var opt = lstVehicleType[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstVehicleType[i]['id'];
                        select.appendChild(el);
                    }
                },
                addGarage: function() {
                    $("#modal-addGarage").modal("show");
                },
                addVehicleType: function() {
                    $("#modal-addVehicleType").modal("show");
                }
            };
            vehicleInsideView.loadData();
        } else {
            vehicleInsideView.loadData();
        }
    });
</script>
