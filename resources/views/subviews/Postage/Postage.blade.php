<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 60%;
        height: 100%;
    }

    #divControl .panel-body {
        height: 501px;
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
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="postageView.addPostage()">
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
            <div class="panel-heading">
                <span>Cập nhật cước phí</span>
                <div class="menu-toggles pull-right" onclick="postageView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" id="frmControl">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <label for="customer_id"><b>Khách hàng</b></label>
                                            <input type="text" class="form-control" id="customer_id"
                                                   name="customer_id"
                                                   placeholder="Nhập tên khách hàng"
                                                   data-customerId="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="receivePlace"><b>Nơi nhận</b></label>
                                            <input type="text" class="form-control" id="receivePlace" name="receivePlace">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="deliveryPlace"><b>Nơi giao</b></label>
                                            <input type="text" class="form-control" name="deliveryPlace" id="deliveryPlace">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="createdDate"><b>Ngày tạo</b></label>
                                            <input type="text" class="form-control date ignore" id="createdDate" name="createdDate">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="applyDate"><b>Ngày áp dụng</b></label>
                                            <input type="text" class="date ignore form-control" id="applyDate" name="applyDate">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="postage"><b>Cước phí</b></label>
                                            <input type="text" class="form-control currency" id="postage" name="postage">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="cashDelivery"><b>Phí giao xe</b></label>
                                            <input type="text" class="form-control currency" id="cashDelivery" name="cashDelivery">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <textarea class="form-control" name="note" id="note" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-actions">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary marginRight"
                                                        onclick="postageView.save()">Hoàn tất
                                                </button>
                                                <button type="button" class="btn default"
                                                        onclick="postageView.retype()">Nhập lại
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <span class="text text-primary">Cước phí khách hàng</span>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-invoiceCustomerDetail">
                                <thead>
                                <tr class="active">
                                    <th>Mã</th>
                                    <th>Cước phí</th>
                                    <th>Nơi nhận</th>
                                    <th>Nơi giao</th>
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

<!-- Modal notification -->
<div class="row">
    <div id="modal-notification" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title"></h5>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal notification -->

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
                clearInput: function () {
                    $("input[id='customer_id']").val('');
                    $("#customer_id").attr("data-customerId", "");

                    $("input[id='postage']").val('');
                    $("input[id='createdDate']").val('');
                    $("input[id='note']").val('');
                },
                retype: function () {
                    $("input[id='postage']").val('');
                    $("input[id='note']").val('');
                },
                tagsCustomerName: [],

                renderEventClickTableModal: function () {
                    $("#table-customer").find("tbody").on('click', 'tr', function () {
                        $('#customer_id').attr('data-customerId', $(this).find('td:first')[0].innerText);
                        $('input[id=customer_id]').val($(this).find('td:eq(2)')[0].innerText);
                        postageView.displayModal("hide", "#modal-customer");
                    });
                },
                renderEventFocusOut: function () {
                    $("#customer_id").focusout(function () {
                        custName = this.value;
                        if (custName == '') return;
                        customer = _.find(postageView.dataCustomer, function (o) {
                            return o.fullName == custName;
                        });
                        if (typeof customer === "undefined") {
                            $("#modal-notification").find(".modal-title").html("Khách hàng <label class='text text-danger'>" + custName + "</label> không tồn tại");
                            postageView.displayModal('show', '#modal-notification');
                            $("input[id=customer_id]").val('');
                            $("#customer_id").attr("data-customerId", '');
                        } else {
                            $("#customer_id").attr("data-customerId", customer.id);
                        }
                    });
                },
                renderDateTimePicker: function () {
                    $('#applyDate').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#applyDate').datepicker("setDate", new Date());

                    $('#createdDate').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#createdDate').datepicker("setDate", new Date());
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
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
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    postageView.loadListCustomer();
                    postageView.renderEventClickTableModal();
                    postageView.renderEventFocusOut();
                    postageView.renderDateTimePicker();
                    postageView.renderScrollbar();
                    formatCurrency(".currency");
                    setEventFormatCurrency(".currency");
                    defaultZero("#postage");
                    defaultZero("#cashDelivery");
                },
                loadListCustomer: function () {
                    $.ajax({
                        url: url + 'customer/customers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            postageView.dataCustomer = data['customers'];
                            postageView.tagsCustomerName = _.map(postageView.dataCustomer, 'fullName');
                            postageView.tagsCustomerName = _.union(postageView.tagsCustomerName);
                            renderAutoCompleteSearch('#customer_id', postageView.tagsCustomerName);
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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
                            {
                                data: 'createdDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("MM/YYYY");
                                }, width: "5%"
                            },
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
                    $("input[id=customer_id]").val(postageView.current["customers_fullName"]);
                    $("#customer_id").attr('data-customerId', postageView.current["customer_id"]);

                    $("input[id=postage]").val(postageView.current["postage"]);
                    $("textarea[id=note]").val(postageView.current["note"]);
                    $("input[id=receivePlace]").val(postageView.current["receivePlace"]);
                    $("input[id=deliveryPlace]").val(postageView.current["deliveryPlace"]);
                    $("input[id=applyDate]").val(postageView.current["applyDate"]);
                    $("input[id=createdDate]").val(postageView.current["createdDate"]);
                    $("input[id=cashDelivery]").val(postageView.current["cashDelivery"]);
                },
                fillFormDataToCurrentObject: function () {
                    if (postageView.action == 'add') {
                        postageView.current = {
                            customer_id: $("#customer_id").attr("data-customerId"),
                            postage: asNumberFromCurrency('#postage'),
                            createdDate: $("input[id='createdDate']").val(),
                            note: $("textarea[id='note']").val(),
                            receivePlace: $("input[id=receivePlace]").val(),
                            deliveryPlace: $("input[id=deliveryPlace]").val(),
                            applyDate: $("input[id=applyDate]").val(),
                            cashDelivery: asNumberFromCurrency("#cashDelivery")
                        };
                    } else if (postageView.action == 'update') {
                        postageView.current.customer_id = $("#customer_id").attr("data-customerId");
                        postageView.current.postage = asNumberFromCurrency('#postage');
                        postageView.current.createdDate = $("input[id='createdDate']").val();
                        postageView.current.note = $("textarea[id='note']").val();
                        postageView.current.receivePlace = $("input[id='receivePlace']").val();
                        postageView.current.deliveryPlace = $("input[id='deliveryPlace']").val();
                        postageView.current.applyDate = $("input[id='applyDate']").val();
                        postageView.current.cashDelivery = asNumberFromCurrency("#cashDelivery");
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
                    $("input[id=postage]").val(0);
                    $("input[id=cashDelivery]").val(0);
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
                            postage: "required"
                        },
                        messages: {
                            customer_id: "Vui lòng chọn khách hàng",
                            postage: "Vui lòng nhập cước phí"
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
                                showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
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
                        console.log(sendToServer);
                        return;
                        $.ajax({
                            url: url + 'postage/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                switch (postageView.action) {
                                    case 'add':
                                        postageView.dataPostage.push(data['postage']);

                                        showNotification("success", "Thêm thành công!");
                                        break;
                                    case 'update':
                                        var Old = _.find(postageView.dataPostage, function (o) {
                                            return o.id == sendToServer._postage.id;
                                        });
                                        var indexOfOld = _.indexOf(postageView.dataPostage, Old);

                                        postageView.dataPostage.splice(indexOfOld, 1, data['postage']);

                                        showNotification("success", "Cập nhật thành công!");
                                        postageView.hideControl();
                                        break;
                                    case 'delete':
                                        var Old = _.find(postageView.dataPostage, function (o) {
                                            return o.id == sendToServer._id;
                                        });
                                        var indexOfOld = _.indexOf(postageView.dataPostage, Old);
                                        postageView.dataPostage.splice(indexOfOld, 1);
                                        showNotification("success", "Xóa thành công!");
                                        postageView.displayModal("hide", "#modal-confirmDelete");
                                        break;
                                    default:
                                        break;
                                }
                                postageView.table.clear().rows.add(postageView.dataPostage).draw();
                                postageView.clearInput();
                            } else {
                                showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
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