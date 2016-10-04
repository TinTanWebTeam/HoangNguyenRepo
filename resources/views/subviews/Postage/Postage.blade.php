<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 55%;
        display: none;
        right: 0;
        width: 60%;
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
</style>

<!-- Begin Table Postage -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li class="active">QL cước phí</li>
                    </ol>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="table-data">
                            <thead>
                            <tr class="active">
                                <th>Mã</th>
                                <th>Cước phí</th>
                                <th>Tháng</th>
                                <th>Khách hàng</th>
                                <th>Ghi chú</th>
                                <th>Sửa</th>
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
<!-- End Table Postage -->

<!-- Begin divControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thêm mới cước phí
                <div class="menu-toggles pull-right" onclick="postageView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="customer_id"><b>Khách hàng</b></label>
                                        <input type="text" class="form-control cursor-copy" id="customer_id" name="customer_id"
                                               readonly placeholder="Nhấp đôi để chọn khách hàng"
                                               data-customerId="">
                                               <!--ondblclick="postageView.loadListCustomer()"-->
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="month"><b>Tháng</b></label>
                                        <select class="form-control" id="month" name="month" disabled>
                                            @for($i = 1; $i < 13; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="postage"><b>Cước phí</b></label>
                                        <input type="number" class="form-control" id="postage" name="postage">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input">
                                        <label for="note"><b>Ghi chú</b></label>
                                        <input type="text" class="form-control" name="note" id="note">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary marginRight" onclick="postageView.save()">Hoàn
                                        tất
                                    </button>
                                    <button type="button" class="btn default" onclick="postageView.clearInput()">Huỷ
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
<!-- End divControl -->

<!-- Modal confirm delete Postage -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa cước phí này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="postageView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="postageView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Postage -->

<!-- Modal list customers -->
<div class="row">
    <div id="modal-customer" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Danh sách khách hàng</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="table-customer" style="width: 100%">
                            <thead>
                            <tr>
                                <th>Mã khách hàng</th>
                                <th>Loại khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Mã số thuế</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
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
<!-- end Modal list customers -->

<script>
    $(function () {
        if (typeof postageView === 'undefined') {
            postageView = {
                table: null,
                tableCustomer: null,

                dataPostage: null,
                dataCustomer: null,

                current: null,
                action: null,
                idDelete: null,
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    $('#divControl').fadeIn(300);
                },
                hideControl: function () {
                    $('#divControl').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });

                    postageView.clearValidation("#frmControl");
                    postageView.clearInput();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (postageView.action == 'delete' && type == 'hide') {
                        postageView.action = null;
                        postageView.idDelete = null;
                    }

                    //Clear Validate
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
                    $("input[id='customer_id']").val('');
                    $("#customer_id").attr("data-customerId", "");

                    $("input[id='postage']").val('');
                    $("select[id='month']").val('');
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'postage/postages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            postageView.dataPostage = data['postages'];
                            postageView.fillDataToDatatable(postageView.dataPostage);

                            postageView.dataCustomer = data['customers'];
                        } else {
                            postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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

                    //Event click for table modal
                    $("#table-customer").find("tbody").on('click', 'tr', function () {
                        $('#customer_id').attr('data-customerId', $(this).find('td:first')[0].innerText);
                        $('input[id=customer_id]').val($(this).find('td:eq(2)')[0].innerText);
                        postageView.displayModal("hide", "#modal-customer");
                    });
                },
                loadListCustomer: function () {
                    $.ajax({
                        url: url + 'customer/customers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            if (postageView.tableCustomer != null) {
                                postageView.tableCustomer.destroy();
                            }
                            postageView.tableCustomer = $('#table-customer').DataTable({
                                language: languageOptions,
                                data: data['customers'],
                                columns: [
                                    {data: 'id'},
                                    {data: 'customerTypes_name'},
                                    {data: 'fullName'},
                                    {data: 'taxCode'},
                                    {data: 'address'},
                                    {data: 'phone'},
                                    {data: 'email'}
                                ]
                            });
                            postageView.displayModal("show", "#modal-customer");
                        } else {
                            postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },

                fillDataToDatatable: function (data) {
                    postageView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {
                                data: 'postage',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {data: 'month', width: "5%"},
                            {data: 'customers_fullName'},
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="postageView.editPostage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "5%"
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
                    $("input[id='customer_id']").val(postageView.current["customers_fullName"]);
                    $("#customer_id").attr('data-customerId', postageView.current["customer_id"]);

                    $("input[id='postage']").val(postageView.current["postage"]);
                    $("input[id='note']").val(postageView.current["note"]);
                    $("select[id='month']").val(postageView.current["month"]);
                },
                fillFormDataToCurrentObject: function () {
                    if (postageView.action == 'add') {
                        postageView.current = {
                            customer_id: $("#customer_id").attr("customer_id"),
                            postage: $("input[id='postage']").val(),
                            month: $("select[id='month']").val(),
                            note: $("input[id='note']").val()
                        };
                    } else if (postageView.action == 'update') {
                        postageView.current.customer_id = $("#customer_id").attr("data-customerId");
                        postageView.current.postage = $("input[id='postage']").val();
                        postageView.current.month = $("select[id='month']").val();
                        postageView.current.note = $("input[id='note']").val();
                    }
                },

                editPostage: function (id) {
                    postageView.current = null;
                    postageView.current = _.clone(_.find(postageView.dataPostage, function (o) {
                        return o.id == id;
                    }), true);

                    postageView.fillCurrentObjectToForm();
                    postageView.action = 'update';
                    postageView.showControl();
                },
                addPostage: function () {
                    postageView.current = null;
                    postageView.action = 'add';
                    postageView.showControl();
                },
                deletePostage: function (id) {
                    postageView.action = 'delete';
                    postageView.idDelete = id;
                    postageView.displayModal("show", "#modal-confirmDelete");
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            customer_id: "required",
                            postage: "required",
                            month: "required"
                        },
                        messages: {
                            customer_id: "Vui lòng chọn khách hàng",
                            postage: "Vui lòng nhập cước phí",
                            month: "Vui lòng chọn tháng"
                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
//                    var validator = $(idForm).validate();
//                    validator.resetForm();
                },

                save: function () {
                    postageView.formValidate();
                    if ($("#frmControl").valid()) {
                        if (postageView.action != 'delete') {
                            if ($("#customer_id").attr('data-customerId') == '') {
                                postageView.showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
                                return;
                            }
                        }

                        postageView.fillFormDataToCurrentObject();

                        var sendToServer = {
                            _token: _token,
                            _action: postageView.action,
                            _postage: postageView.current
                        };
                        if (postageView.action == 'delete') {
                            sendToServer._id = postageView.idDelete;
                        }
                        console.log("CLIENT");
                        console.log(sendToServer._postage);
                        $.ajax({
                            url: url + 'postage/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            console.log("SERVER");
                            console.log(data);
                            if (jqXHR.status == 201) {
                                switch (postageView.action) {
                                    case 'add':
                                        postageView.dataPostage.push(data['postage']);

                                        postageView.showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var Old = _.find(postageView.dataPostage, function (o) {
                                            return o.id == sendToServer._postage.id;
                                        });
                                        var indexOfOld = _.indexOf(postageView.dataPostage, Old);

                                        postageView.dataPostage.splice(indexOfOld, 1, data['postage']);

                                        postageView.showNotification("success", "Cập nhật thành công!");
                                        postageView.hideControl();
                                        break;
                                    case 'delete':
                                        var Old = _.find(postageView.dataPostage, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfOld = _.indexOf(postageView.dataPostage, Old);
                                        postageView.dataPostage.splice(indexOfOld, 1);
                                        postageView.showNotification("success", "Xóa thành công!");
                                        postageView.displayModal("hide", "#modal-confirmDelete");
                                        break;
                                    default:
                                        break;
                                }
                                postageView.table.clear().rows.add(postageView.dataPostage).draw();
                                postageView.clearInput();
                            } else {
                                postageView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            postageView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmControl").find("label[class=error]").css("color", "red");
                    }
                },
            };
            postageView.loadData();
        } else {
            postageView.loadData();
        }
    });
</script>