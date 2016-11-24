<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divControl .panel-body {
        height: 519px;
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
                                <th>Ngày tạo</th>
                                <th>Ngày áp dụng</th>
                                <th>Khách hàng</th>
                                <th>Nơi nhận</th>
                                <th>Nơi giao</th>
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
                                            <label for="customer_id" class="red"><b>Khách hàng</b></label>
                                            <input type="text" class="form-control" id="customer_id"
                                                   name="customer_id"
                                                   placeholder="Nhập tên khách hàng"
                                                   data-customerId="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input">
                                                    <label for="receivePlace" class="red"><b>Nơi nhận</b></label>
                                                    <input type="text" class="form-control" id="receivePlace"
                                                           name="receivePlace">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input">
                                                    <label for="deliveryPlace" class="red"><b>Nơi giao</b></label>
                                                    <input type="text" class="form-control" name="deliveryPlace"
                                                           id="deliveryPlace">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input ">
                                                    <label for="createdDate"><b>Ngày tạo</b></label>
                                                    <input type="text" class="date ignore form-control" id="createdDate"
                                                           name="createdDate">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input">
                                                    <label for="applyDate" class="red"><b>Ngày áp dụng</b></label>
                                                    <input type="text" class="date ignore form-control" id="applyDate"
                                                           name="applyDate">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-md-line-input">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <textarea class="form-control" name="note" id="note" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="postage" class="red"><b>Cước phí</b></label>
                                            <input type="text" class="form-control currency" id="postage"
                                                   name="postage">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="cashDelivery" class="red"><b>Phí giao xe</b></label>
                                            <input type="text" class="form-control currency" id="cashDelivery"
                                                   name="cashDelivery">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <fieldset>
                                            <legend>Thông tin giá dầu:</legend>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input">
                                                    <label for="oils_price"><b>Giá dầu</b></label>
                                                    <input type="text" class="form-control currency" name="oils_price"
                                                           id="oils_price" disabled>
                                                    <input type="hidden" name="fuel_id" id="fuel_id">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input">
                                                    <label for="oils_applyDate"><b>Ngày áp dụng giá dầu</b></label>
                                                    <input type="text" class="date ignore form-control"
                                                           name="oils_applyDate" id="oils_applyDate" disabled>
                                                </div>
                                            </div>
                                        </fieldset>
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
                            <table class="table table-bordered table-hover" id="table-postageDetail">
                                <thead>
                                <tr class="active">
                                    <th>Mã</th>
                                    <th>Cước phí</th>
                                    <th>Phí giao xe</th>
                                    <th>Ngày áp dụng</th>
                                    <th>Thay đổi do</th>
                                    <th>Cập nhật</th>
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

<!-- Modal -->
<div class="row">
    <div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Cập nhật ngày áp dụng
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="apply-date">Ngày áp dụng</label>
                            <input type="text" class="date ignore form-control"
                                   id="apply-date" name="apply-date"/>
                            <input type="hidden" id="postage-id" name="postage-id"/>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" onclick="postageView.updateApplyDate()">
                        Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script>
    $(function () {
        if (typeof postageView === 'undefined') {
            postageView = {
                table: null,
                tablePostageDetail: null,

                dataPostageFiltered: null,
                dataPostage: null,
                dataCustomer: null,
                dataFuel: null,
                dataFuelLastest: null,

                current: null,
                action: null,
                idDelete: null,
                tagsCustomerName: [],

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
                    $("input[id='receivePlace']").val('');
                    $("input[id='deliveryPlace']").val('');
                    $("input[id='createdDate']").val('');
                    $("input[id='applyDate']").val('');
                    $("input[id='postage']").val('');
                    $("input[id='cashDelivery']").val('');
                    $("textarea[id='note']").val('');
                },
                retype: function () {
                    $("input[id='postage']").val('');
                    $("input[id='note']").val('');
                },

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

                    $('#apply-date').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#apply-date').datepicker("setDate", new Date());

                    $('#createdDate').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#createdDate').datepicker("setDate", new Date());

                    $('#oils_applyDate').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#oils_applyDate').datepicker("setDate", new Date());
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                renderEventRowClick: function () {
//                    $("#table-postageDetail").find("tbody").on('click', 'tr', function () {
//                        $("#postage-id").val($(this).find('td:first')[0].innerText);
//                        var applyDate = moment($(this).find('td:eq(4)')[0].innerText, "DD/MM/YYYY");
//                        $("input[id='apply-date']").datepicker('update', applyDate.format("DD-MM-YYYY"));
//                        postageView.displayModal('show', '#myModalNorm');
//                    });
                },

                loadData: function () {
                    $.ajax({
                        url: url + 'postage/postages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            postageView.dataFuel = data['fuels'];
                            postageView.dataPostage = data['postageFull'];
                            postageView.dataPostageFiltered = data['postageFiltered'];
                            postageView.fillDataToDatatable(postageView.dataPostageFiltered);

                            postageView.getLatestFuel();
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
                    postageView.renderEventRowClick();

                    renderAutoCompleteSearch('#receivePlace', array_city);
                    renderAutoCompleteSearch('#deliveryPlace', array_city);

                    formatCurrency(".currency");
                    setEventFormatCurrency(".currency");
                    defaultZero("#postage");
                    defaultZero("#cashDelivery");
                    defaultZero("#oils_price");
                },
                loadListCustomer: function () {
                    $.ajax({
                        url: url + 'postage/customers',
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
//                    removeDataTable();

                    if (postageView.table != null)
                        postageView.table.destroy();

                    postageView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {
                                data: 'postage',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'createdDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                data: 'applyDate',
                                render: function (data, type, full, meta) {
                                    if(data == null || data == "") return "";
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {data: 'customers_fullName'},
                            {data: 'receivePlace'},
                            {data: 'deliveryPlace'},
                            {data: 'note'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn btn-success btn-circle" onclick="postageView.editPostage(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        order: [[0, "desc"]],
//                        fixedHeader: {
//                            header: true
//                        },
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
                    });
                    $("#table-data").css("width", "auto");
//                    pushDataTable(postageView.table);
                },
                fillDataToDatatablePostageDetail: function (data) {
                    if (postageView.tablePostageDetail != null)
                        postageView.tablePostageDetail.destroy();

                    postageView.tablePostageDetail = $('#table-postageDetail').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'id',
                                visible: false
                            },
                            {
                                data: 'postage',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'cashDelivery',
                                render: $.fn.dataTable.render.number(".", ",", 0)
                            },
                            {
                                data: 'applyDate',
                                render: function (data, type, full, meta) {
                                    if (data != null)
                                        return moment(data).format("DD/MM/YYYY");
                                    else
                                        return "";
                                }
                            },
                            {
                                data: 'changeByFuel',
                                render: function (data, type, full, meta) {
                                    var tr = "";
                                    if (full.changeByFuel == 0)
                                        tr = "Nhập tay";
                                    else
                                        tr = "Giá dầu tăng"
                                    return tr;
                                }
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn btn-success btn-circle" onclick="postageView.showUpdateApplyDate(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }
                        ],
                        order: [[0, "desc"]],
                        dom: ''
                    })
                },
                fillCurrentObjectToForm: function () {
                    $("input[id=customer_id]").val(postageView.current["customers_fullName"]);
                    $("#customer_id").attr('data-customerId', postageView.current["customer_id"]);

                    $("input[id=postage]").val(postageView.current["postage"]);
                    $("textarea[id=note]").val(postageView.current["note"]);
                    $("input[id=receivePlace]").val(postageView.current["receivePlace"]);
                    $("input[id=deliveryPlace]").val(postageView.current["deliveryPlace"]);
                    $("input[id=cashDelivery]").val(postageView.current["cashDelivery"]);

                    var applyDate = moment(postageView.current["applyDate"], "YYYY-MM-DD");
                    $("input[id='applyDate']").datepicker('update', applyDate.format("DD-MM-YYYY"));
                    var createdDate = moment(postageView.current["createdDate"], "YYYY-MM-DD");
                    $("input[id='createdDate']").datepicker('update', createdDate.format("DD-MM-YYYY"));
                    formatCurrency(".currency");
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
                            cashDelivery: asNumberFromCurrency("#cashDelivery"),
                            fuel_id: $("input[id=fuel_id]").val()
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
                        postageView.current.fuel_id = $("input[id=fuel_id]").val();
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

                    var data = _.find(postageView.dataPostage, function (o) {
                        return o.id == id;
                    });
                    var dataDetail = _.filter(postageView.dataPostage, function (o) {
                        return o.customer_id == data['customer_id'] && o.receivePlace == data['receivePlace'] && o.deliveryPlace == data['deliveryPlace'];
                    });
                    postageView.fillDataToDatatablePostageDetail(dataDetail);

                    var oils_applyDate = moment(postageView.dataFuelLastest['applyDate'], "YYYY-MM-DD");
                    $("input[id='oils_applyDate']").datepicker('update', oils_applyDate.format("DD-MM-YYYY"));
                    $("input[id=oils_price]").val(postageView.dataFuelLastest['price']);
                    $("input[id=fuel_id]").val(postageView.dataFuelLastest['id']);
                },
                addPostage: function () {
                    if (postageView.tablePostageDetail != null)
                        postageView.tablePostageDetail.clear().draw();

                    $("input[id=oils_price]").val(0);
                    $("input[id=postage]").val(0);
                    $("input[id=cashDelivery]").val(0);
                    postageView.current = null;
                    postageView.action = 'add';
                    postageView.showControl();

                    var oils_applyDate = moment(postageView.dataFuelLastest['applyDate'], "YYYY-MM-DD");
                    $("input[id='oils_applyDate']").datepicker('update', oils_applyDate.format("DD-MM-YYYY"));
                    $("input[id=oils_price]").val(postageView.dataFuelLastest['price']);
                    $("input[id=fuel_id]").val(postageView.dataFuelLastest['id']);
                },
                deletePostage: function (id) {
                    postageView.action = 'delete';
                    postageView.idDelete = id;
                    postageView.save();
                },
                deletePostageConfirm: function (id) {
                    $("#modal-notification").find(".modal-title").html("Có chắc muốn xóa cước phí này?");
                    tr = '<div class="row">';
                    tr += '<div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">';
                    tr += '<button type="button" class="btn btn-primary marginRight" onclick="postageView.deletePostage(' + id + ')">';
                    tr += 'Đồng ý';
                    tr += '</button>';
                    tr += '<button type="button" class="btn default" onclick="postageView.displayModal(\'hide\', \'#modal-notification\')">';
                    tr += 'Huỷ';
                    tr += '</button>';
                    tr += '</div>';
                    tr += '</div>';
                    $("#modal-notification").find(".modal-body").html(tr);
                    postageView.displayModal('show', '#modal-notification');
                },
                getLatestFuel: function () {
                    var fuel = _.maxBy(postageView.dataFuel, function (o) {
                        return o.applyDate;
                    });
                    if (typeof fuel === 'undefined') {
                        postageView.dataFuelLastest = null;
                    }
                    postageView.dataFuelLastest = fuel;
                },

                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            customer_id: "required",
                            postage: "required"
                        },
                        ignore: ".ignore",
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
                    if (postageView.action == 'delete') {
                        var sendToServer = {
                            _token: _token,
                            _action: postageView.action,
                            _id: postageView.idDelete
                        };
                    } else {
                        postageView.formValidate();
                        if ($("#frmControl").valid()) {
                            if ($("#customer_id").attr('data-customerId') == '') {
                                showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
                                return;
                            }
                            postageView.fillFormDataToCurrentObject();
                            var sendToServer = {
                                _token: _token,
                                _action: postageView.action,
                                _postage: postageView.current
                            };
                        } else {
                            $("form#frmControl").find("label[class=error]").css("color", "red");
                        }
                    }
                    console.log(sendToServer);
                    $.ajax({
                        url: url + 'postage/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            console.log(data);
                            switch (postageView.action) {
                                case 'add':
                                    postageView.dataPostageFiltered = data['postageFiltered'];
                                    postageView.dataPostage = data['postageFull'];
                                    postageView.fillDataToDatatable(postageView.dataPostageFiltered);

                                    var custId = parseInt($("#customer_id").attr('data-customerId'));
                                    var data = _.filter(postageView.dataPostage, function (o) {
                                        return o.customer_id == custId;
                                    });
                                    postageView.fillDataToDatatablePostageDetail(data);

                                    showNotification("success", "Thêm thành công!");
                                    break;
                                case 'update':
                                    postageView.dataPostageFiltered = data['postageFiltered'];
                                    postageView.dataPostage = data['postageFull'];
                                    postageView.fillDataToDatatable(postageView.dataPostageFiltered);

                                    showNotification("success", "Cập nhật thành công!");
                                    postageView.hideControl();
                                    break;
                                case 'delete':

                                    showNotification("success", "Xóa thành công!");
                                    postageView.displayModal("hide", "#modal-notification");
                                    break;
                                default:
                                    break;
                            }
                            postageView.clearInput();
                        } else if (jqXHR.status == 203) {
                            showNotification("warning", data['msg']);
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },

                updateApplyDate: function(){
                    var sendToServer = {
                        _token: _token,
                        _id: $("#postage-id").val(),
                        _applyDate: $("#apply-date").val()
                    };

                    $.ajax({
                        url: url + 'postage/update-apply-date',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 201) {
                            postageView.dataPostageFiltered = data['postageFiltered'];
                            postageView.dataPostage = data['postageFull'];
                            postageView.fillDataToDatatable(postageView.dataPostageFiltered);

                            var custId = parseInt($("#customer_id").attr('data-customerId'));
                            var receivePlace = $("#receivePlace").val();
                            var deliveryPlace = $("#deliveryPlace").val();
                            var dataDetail = _.filter(postageView.dataPostage, function (o) {
                                return o.customer_id == custId && o.receivePlace == receivePlace && o.deliveryPlace == deliveryPlace;
                            });
                            postageView.fillDataToDatatablePostageDetail(dataDetail);

                            showNotification("success", "Cập nhật ngày áp dụng thành công!");
                            postageView.displayModal("hide", "#myModalNorm");
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                showUpdateApplyDate: function(detailId){
                    var postageDetail = _.find(postageView.dataPostage, function(o){
                        return o.id == detailId;
                    });

                    $("#postage-id").val(postageDetail.id);
                    var applyDate = moment(postageDetail.applyDate, "YYYY-MM-DD");
                    $("input[id='apply-date']").datepicker('update', applyDate.format("DD-MM-YYYY"));
                    postageView.displayModal('show', '#myModalNorm');
                }
            };
            postageView.loadData();
        } else {
            postageView.loadData();
        }
    });
</script>