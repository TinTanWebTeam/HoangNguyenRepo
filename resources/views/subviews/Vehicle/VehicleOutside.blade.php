<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 38%;
        display: none;
        right: 0;
        height: 60vh;
        width: 40%;
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
        height: 341px;
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
                        <li class="active">Nhà xe</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới" onclick="garageView.addGarage();">
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
                                <th>Mã nhà xe</th>
                                <th>Loại nhà xe</th>
                                <th>Tên nhà xe</th>
                                <th>Người liên hệ</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
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
                <span class="titleControl">Thêm mới nhà xe</span>
                <div class="menu-toggles pull-right" onclick="garageView.hideControl()">
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
                                    <input type="text" class="form-control"
                                           id="name"
                                           name="name">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="garageType_id"><b>Loại nhà xe</b></label>
                                    <select name="garageType_id" id="garageType_id" class="form-control">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <div class="form-group form-md-line-input">
                                    <label for="contactor"><b>Người liên hệ</b></label>
                                    <input type="text" class="form-control"
                                           id="contactor"
                                           name="contactor">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="phone"><b>Số điện thoại</b></label>
                                    <input type="number" class="form-control"
                                           id="phone"
                                           name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group form-md-line-input">
                                    <label for="address"><b>Địa chỉ</b></label>
                                    <textarea type="text" class="form-control"
                                              id="address"
                                              name="address" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-actions">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight" onclick="garageView.save()">Hoàn tất</button>
                                        <button type="button" class="btn default" onclick="garageView.clearInput()">Nhập lại</button>
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

<!-- Modal confirm delete Garage -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa nhà xe này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="garageView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="garageView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Garage -->


<script>
    $(function () {
        if (typeof (garageView) === 'undefined') {
            garageView = {
                table: null,
                tableGarage: null,
                tableGarageTypes: null,
                current: null,
                action: null,
                idDelete: null,
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function(){
                        $('.menu-toggle').fadeIn();
                    });

                    $("label[class=error]").remove();
                    garageView.clearInput();
                },
                displayModal: function(type, idModal){
                    $(idModal).modal(type);
                    if(garageView.action == 'delete' && type == 'hide'){
                        garageView.action = null;
                        garageView.idDelete = null;
                    }
                },
                showNotification: function (type ,msg) {
                    switch (type){
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
                    $("input[id='contactor']").val('');
                    $("input[id='phone']").val('');
                    $("textarea[id='address']").val('');
                    garageView.current = null;
                },

                renderEventClickTableModal: function(){
                    $("#table-garage").find("tbody").on('click', 'tr', function () {
                        $('#garages_name').attr('data-id', $(this).find('td:first')[0].innerText);
                        $('#garages_name').val($(this).find('td:eq(1)')[0].innerText);
                        garageView.displayModal("hide", "#modal-garage");
                    });
                },
                renderScrollbar: function(){
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme:"dark"
                    });
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'vehicle-outside/garages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if(jqXHR.status == 200){
                            garageView.tableGarage = data['garages'];
                            garageView.fillDataToDatatable(data['garages']);
                            garageView.tableGarageTypes = data['garageTypes'];
                            garageView.loadSelectBox(data['garageTypes']);

                        } else {
                            garageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        garageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });

                    garageView.renderEventClickTableModal();
                },

                fillDataToDatatable: function (data) {
                    garageView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'garageTypes'},
                            {data: 'name'},
                            {data: 'contactor'},
                            {data: 'phone'},
                            {data: 'address'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="garageView.editGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="garageView.deleteGarage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "10%"
                            }
                        ],
                        order: [[0, "desc"]],
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                extend: 'copyHtml5',
                                text: 'Sao chép',
                                exportOptions: {
                                    columns: [0, ':visible']
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                text: 'Xuất Excel',
                                exportOptions: {
                                    columns: ':visible'
                                },
                                customize: function (xlsx) {
                                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'Xuất PDF',
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
                                extend: 'colvis',
                                text: 'Ẩn cột'
                            }
                        ]
                    })
                },
                fillCurrentObjectToForm: function () {
                    $("input[id='name']").val(garageView.current["name"]);
                    $("input[id='contactor']").val(garageView.current["contactor"]);
                    $("input[id='phone']").val(garageView.current["phone"]);
                    $("textarea[id='address']").val(garageView.current["address"]);
                    $("select[id='garageType_id']").val(garageView.current["garageType_id"]);
                },
                fillFormDataToCurrentObject: function () {
                    if (garageView.action == 'add') {
                        garageView.current = {
                            name:      $("input[id='name']").val(),
                            contactor: $("input[id='contactor']").val(),
                            phone:     $("input[id='phone']").val(),
                            address:   $("textarea[id='address']").val(),
                            garageType_id: $("select[id='garageType_id']").val()
                        };
                    } else if (garageView.action == 'update') {
                        garageView.current.name      = $("input[id='name']").val();
                        garageView.current.contactor = $("input[id='contactor']").val();
                        garageView.current.phone     = $("input[id='phone']").val();
                        garageView.current.address   = $("textarea[id='address']").val();
                        garageView.current.garageType_id   = $("select[id='garageType_id']").val();
                    }
                },

                editGarage: function (id) {
                    garageView.current = null;
                    garageView.current = _.clone(_.find(garageView.tableGarage, function (o) {
                        return o.id == id;
                    }), true);
                    garageView.fillCurrentObjectToForm();
                    garageView.action = 'update';
                    $("#divControl").find(".titleControl").html("Cập nhật nhà xe");
                    garageView.showControl();
                },
                addGarage: function () {
                    garageView.current = null;
                    garageView.action = 'add';
                    $("#divControl").find(".titleControl").html("Thêm mới nhà xe");
                    garageView.showControl();
                },
                deleteGarage: function (id) {
                    garageView.action = 'delete';
                    garageView.idDelete = id;
                    garageView.displayModal("show", "#modal-confirmDelete");
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            name: "required",
                            contactor: "required",
                            phone: "required",
                            address: "required"
                        },
                        messages: {
                            name: "Vui lòng nhập tên nhà xe",
                            contactor: "Vui lòng nhập tên người liên hệ",
                            phone: "Vui lòng nhập điện thoại người liên hệ",
                            address: "Vui lòng nhập địa chỉ nhà xe"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    var validator = $(idForm).validate();
                    validator.resetForm();
                },
                loadSelectBox: function (lstGarageType) {
                    //reset selectbox
                    $('#garageType_id')
                            .find('option')
                            .remove()
                            .end();
                    //fill option to selectbox
                    var select = document.getElementById("garageType_id");
                    for (var i = 0; i < lstGarageType.length; i++) {
                        var opt = lstGarageType[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstGarageType[i]['id'];
                        select.appendChild(el);
                    }
                },
                save: function () {
                    garageView.formValidate();
                    if ($("#frmControl").valid()) {
                        if (garageView.action != 'delete') {
                            if($("#garages_name").attr('data-id') == ''){
                                garageView.showNotification('warning', 'Vui lòng chọn một nhà xe có trong danh sách.');
                                return ;
                            }
                        }

                        garageView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: garageView.action,
                            _garage: garageView.current
                        };
                        if (garageView.action == 'delete') {
                            sendToServer._id = garageView.idDelete;
                        }
                        $.ajax({
                            url: url + 'vehicle-outside/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                switch (garageView.action) {
                                    case 'add':
                                        garageView.tableGarage.push(data['garage']);
                                        garageView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var garageOld = _.find(garageView.tableGarage, function (o) {
                                            return o.id == sendToServer._garage.id;
                                        });
                                        var indexOfGarageOld = _.indexOf(garageView.tableGarage, garageOld);
                                        garageView.tableGarage.splice(indexOfGarageOld, 1, data['garage']);
                                        garageView.showNotification("success", "Cập nhật thành công!");
                                        garageView.hideControl();
                                        break;
                                    case 'delete':
                                        var garageOld = _.find(garageView.tableGarage, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfGarageOld = _.indexOf(garageView.tableGarage, garageOld);
                                        garageView.tableGarage.splice(indexOfGarageOld, 1);
                                        garageView.showNotification("success", "Xóa thành công!");
                                        garageView.displayModal("hide", "#modal-confirmDelete")
                                        break;
                                    default:
                                        break;
                                }
                                garageView.table.clear().rows.add(garageView.tableGarage).draw();
                                garageView.clearInput();
                            } else {
                                garageView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            garageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                }
            };
            garageView.loadData();
        } else {
            garageView.loadData();
        }
    });
</script>
