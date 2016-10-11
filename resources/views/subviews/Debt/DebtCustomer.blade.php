<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 40%;
        display: none;
        right: 0;
        width: 40%;
        height: 100%;
    }

    #divControl .panel-body {
        height: 320px;
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

<!-- Begin Table -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL công nợ</a></li>
                        <li class="active">Khách hàng</li>
                    </ol>
                    <div class="menu-toggle  pull-right fixed">
                        <div class="btn btn-warning btn-circle btn-md" title="Xuất hóa đơn" onclick="debtCustomerView">
                            <i class="glyphicon glyphicon-list-alt icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p id="dateOnlySearch">
                        <input type="text" class="date start" /> đến
                        <input type="text" class="date end" />
                        <button onclick="debtCustomerView.searchFromDateToDate()" class="btn btn-sm btn-info"><i class="fa fa-search" aria-hidden="true"></i> Tìm</button>
                        <button onclick="debtCustomerView.clearSearch()" class="btn btn-sm btn-default"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                    </p>
                    <table class="table table-bordered table-hover" id="table-data">
                        <thead>
                        <tr class="active">
                            <th>Khách hàng</th>
                            <th>Số xe</th>
                            <th>Nơi giao</th>
                            <th>Số chứng từ</th>
                            <th>Doanh thu</th>
                            <th>Nợ</th>
                            <th>Người nhận</th>
                            <th>Ngày nhận</th>
                            <th>Thanh toán</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div>
<!-- End Table -->

<!-- Begin divControl -->
<div class="row">
    <div id="divControl" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">Thanh toán cước phí
                <div class="menu-toggles pull-right" onclick="debtCustomerView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <form role="form" id="frmControl">
                    <div class="form-body">
                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-md-12 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="customer_id"><b>Khách hàng</b></label>
                                        <input type="text" class="form-control"
                                               id="customer_id"
                                               name="customer_id"
                                               data-customerId=""
                                               readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="cashRevenue"><b>Doanh thu</b></label>
                                        <input type="text" class="form-control"
                                               id="cashRevenue"
                                               name="cashRevenue"
                                               readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="debt"><b>Tiền nợ</b></label>
                                        <input type="text" class="form-control"
                                               id="debt"
                                               name="debt"
                                               readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="cashReceive"><b>Đã trả</b></label>
                                        <input type="text" class="form-control"
                                               id="cashReceive"
                                               name="cashReceive"
                                               readonly>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group form-md-line-input ">
                                        <label for="payment"><b>Tiền thanh toán</b></label>
                                        <input type="number" class="form-control"
                                               id="payment"
                                               name="payment"
                                                autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-actions noborder">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary"
                                            onclick="debtCustomerView.save()">
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
<!-- End divControl -->

<script>
    if (typeof debtCustomerView === 'undefined') {
        debtCustomerView = {
            table: null,

            dataTransport: null,
            payment: null,

            showControl: function () {
                $('.menu-toggle').fadeOut();
                $('#divControl').fadeIn(300);
            },
            hideControl: function () {
                $('#divControl').fadeOut(300, function () {
                    $('.menu-toggle').fadeIn();
                });

                debtCustomerView.clearValidation("#frmControl");
                debtCustomerView.clearInput();
            },
            displayModal: function (type, idModal) {
                $(idModal).modal(type);
                if (debtCustomerView.action == 'delete' && type == 'hide') {
                    debtCustomerView.action = null;
                    debtCustomerView.idDelete = null;
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
                $("#customer_id").attr('data-customerId', '');
                $("input[id='customer_id']").val('');
                $("input[id='cashRevenue']").val('');
                $("input[id='debt']").val('');
                $("input[id='cashReceive']").val('');
                $("input[id='payment']").val('');
            },

            renderScrollbar: function(){
                $("#divControl").find('.panel-body').mCustomScrollbar({
                    theme: "dark"
                });
            },
            renderCustomToastr: function() {
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
            },
            renderDateTimePicker: function(){
                $('#dateOnlySearch .date').datepicker({
                    'format': 'dd-mm-yyyy',
                    'autoclose': true
                });

                var dateOnlySearchEl = document.getElementById('dateOnlySearch');
                var dateOnlyDatepair = new Datepair(dateOnlySearchEl);
            },

            loadData: function () {
                $.ajax({
                    url: url + '/debt-customer/transports',
                    type: "GET",
                    dataType: "json"
                }).done(function (data, textStatus, jqXHR) {
                    if (jqXHR.status == 200) {
                        debtCustomerView.dataTransport = data['transports'];
                        debtCustomerView.fillDataToDatatable(debtCustomerView.dataTransport);
                    } else {
                        debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    }
                }).fail(function (jqXHR, textStatus, errorThrown) {
                    debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                });

                debtCustomerView.renderDateTimePicker();
                debtCustomerView.renderScrollbar();
                debtCustomerView.renderCustomToastr();
            },
            fillDataToDatatable: function (data) {
                for (var i = 0; i < data.length; i++) {
                    data[i].fullNumber = data[i]['vehicles_areaCode'] + '-' + data[i]['vehicles_vehicleNumber'];
                    data[i].debt = data[i]['cashRevenue'] - data[i]['cashReceive'];
                }

                debtCustomerView.table = $('#table-data').DataTable({
                    language: languageOptions,
                    data: data,
                    columns: [

                        {data: 'customers_fullName'},
                        {data: 'fullNumber'},
                        {data: 'deliveryPlace'},
                        {data: 'voucherNumber'},

                        {
                            data: 'cashRevenue',
                            render: $.fn.dataTable.render.number(".", ",", 0)
                        },
                        {
                            data: 'debt',
                            render: $.fn.dataTable.render.number(".", ",", 0)
                        },
                        {data: 'receiver'},
                        {
                            data: 'receiveDate',
                            render: function (data, type, full, meta) {
                                return moment(data).format("DD/MM/YYYY");
                            }
                        },
                        {
                            render: function (data, type, full, meta) {
                                var tr = '';
                                tr += '<div class="btn-del-edit">';
                                tr += '<div class="btn btn-success  btn-circle" title="Thanh toán" onclick="debtCustomerView.editTransport(' + full.id + ')">';
                                tr += '<i class="glyphicon glyphicon-credit-card"></i>';
                                tr += '</div>';
                                tr += '</div>';
                                tr += '<div class="btn-del-edit">';
                                tr += '<div class="btn btn-info btn-circle" title="Trả đủ" onclick="debtCustomerView.autoEditTransport(' + full.id + ')">';
                                tr += '<i class="fa fa-money" aria-hidden="true"></i>';
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
                $("input[id='customer_id']").val(debtCustomerView.current["customers_fullName"]);
                $("#customer_id").attr('data-customerId', debtCustomerView.current["customer_id"]);
                $("input[id='cashRevenue']").val(debtCustomerView.current["cashRevenue"]);
                $("input[id='debt']").val(debtCustomerView.current["debt"]);
                $("input[id='cashReceive']").val(debtCustomerView.current["cashReceive"]);
            },
            fillFormDataToCurrentObject: function () {
                if (debtCustomerView.action == 'add') {
                    debtCustomerView.current = {
                        customer_id: $("#customer_id").attr("data-customerId"),
                        cashRevenue: $("input[id='cashRevenue']").val(),
                        debt: $("input[id='debt']").val(),
                        cashReceive: $("input[id='cashReceive']").val()
                    };
                } else if (debtCustomerView.action == 'update') {
                    debtCustomerView.current.customer_id = $("#customer_id").attr("data-customerId");
                    debtCustomerView.current.cashRevenue = $("input[id='cashRevenue']").val();
                    debtCustomerView.current.debt = $("input[id='debt']").val();
                    debtCustomerView.current.cashReceive = $("input[id='cashReceive']").val();
                }
                debtCustomerView.payment = $("input[id='payment']").val();
            },

            editTransport: function (id) {
                debtCustomerView.current = null;
                debtCustomerView.current = _.clone(_.find(debtCustomerView.dataTransport, function (o) {
                    return o.id == id;
                }), true);

                debtCustomerView.fillCurrentObjectToForm();
                debtCustomerView.action = 'edit';
                debtCustomerView.showControl();
            },
            autoEditTransport: function (id) {
                debtCustomerView.current = null;
                debtCustomerView.current = _.clone(_.find(debtCustomerView.dataTransport, function (o) {
                    return o.id == id;
                }), true);
                debtCustomerView.action = 'autoEdit';
                debtCustomerView.save();
            },

            formValidate: function () {
                $("#frmControl").validate({
                    rules: {
                        payment: "required"
                    },
                    messages: {
                        payment: "Vui lòng nhập số tiền thanh toán."
                    }
                });
            },
            clearValidation: function (idForm) {
                $(idForm).find("label[class=error]").remove();
//                    var validator = $(idForm).validate();
//                    validator.resetForm();
            },

            save: function () {
                debtCustomerView.formValidate();
                if ($("#frmControl").valid()) {
                    debtCustomerView.fillFormDataToCurrentObject();

                    var _transport = {
                        'transport_id': debtCustomerView.current['id']
                    };
                    if(debtCustomerView.action == 'edit'){
                        _transport.payment = debtCustomerView.payment
                    }

                    var sendToServer = {
                        _token: _token,
                        _transport: _transport
                    };
                    console.log("CLIENT");
                    console.log(sendToServer._transport);
                    $.ajax({
                        url: url + 'debt-customer/modify',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 201) {
                            switch (debtCustomerView.action) {
                                case 'edit':
                                    var Old = _.find(debtCustomerView.dataTransport, function (o) {
                                        return o.id == sendToServer._transport.transport_id;
                                    });
                                    var indexOfOld = _.indexOf(debtCustomerView.dataTransport, Old);

                                    if(data['transport']['cashReceive'] == data['transport']['cashRevenue']){
                                        debtCustomerView.dataTransport.splice(indexOfOld, 1);
                                    } else {
                                        data['transport'].fullNumber = data['transport']['vehicles_areaCode'] + '-' + data['transport']['vehicles_vehicleNumber'];
                                        data['transport'].debt = data['transport']['cashRevenue'] - data['transport']['cashReceive'];
                                        debtCustomerView.dataTransport.splice(indexOfOld, 1, data['transport']);
                                    }

                                    debtCustomerView.showNotification("success", "Thanh toán thành công!");
                                    debtCustomerView.hideControl();
                                    break;
                                case 'autoEdit':
                                    var Old = _.find(debtCustomerView.dataTransport, function (o) {
                                        return o.id == sendToServer._transport.transport_id;
                                    });
                                    var indexOfOld = _.indexOf(debtCustomerView.dataTransport, Old);
                                    debtCustomerView.dataTransport.splice(indexOfOld, 1);
                                    debtCustomerView.showNotification("success", "Thanh toán thành công!");
                                    debtCustomerView.displayModal("hide", "#modal-confirmDelete");
                                    break;
                                default:
                                    break;
                            }
                            debtCustomerView.table.clear().rows.add(debtCustomerView.dataTransport).draw();
                            debtCustomerView.clearInput();
                        } else {
                            debtCustomerView.showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        debtCustomerView.showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                } else {
                    $("form#frmControl").find("label[class=error]").css("color", "red");
                }
            },

            searchFromDateToDate: function() {
                var fromDate = $("#dateOnlySearch").find(".start").val();
                var toDate = $("#dateOnlySearch").find(".end").val();
                fromDate = moment(fromDate, "DD-MM-YYYY");
                toDate = moment(toDate, "DD-MM-YYYY");

                if(fromDate.isValid() && toDate.isValid()){
                    var found = _.filter(debtCustomerView.dataTransport, function(o){
                        var find = moment(o.receiveDate, "YYYY-MM-DD");
                        return moment(find).isBetween(fromDate, toDate, null, '[]');
                    });
                    debtCustomerView.table.clear().rows.add(found).draw();
                } else {
                    debtCustomerView.showNotification('warning', 'Giá trị nhập vào không phải định dạng ngày tháng, vui lòng nhập lại!');
                }
            },
            clearSearch: function(){
                $("#dateOnlySearch").find(".start").datepicker('update', '');
                $("#dateOnlySearch").find(".end").datepicker('update', '');
                debtCustomerView.table.clear().rows.add(debtCustomerView.dataTransport).draw();
            }
        };
        debtCustomerView.loadData();
    } else {
        debtCustomerView.loadData();
    }
</script>
