<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 45%;
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

<!-- Begin Table Postage -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL Giá Nhiên Liệu</a></li>
                        <li class="active">Giá Dầu</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="oilPriceView.showFormForAddNew()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="table_oil_price">
                            <thead>
                            <tr class="active">
                                <th>Mã</th>
                                <th>Ngày áp dụng</th>
                                <th>Giá dầu</th>
                                <th>Người tạo</th>
                                <th>Người sửa</th>
                                <th>Ghi chú</th>
                                <th>Chỉnh sửa</th>
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
                <span id="form_mode"></span>
                <div class="menu-toggles pull-right">
                    <i class="glyphicon glyphicon-remove" onclick="oilPriceView.hideFormControl()"></i>
                </div>
            </div>
            <div class="panel-body">
                <form role="form" id="formFuelPrice" data-parsley-validate="" onsubmit="return false;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="applyDate"><b>Ngày áp dụng</b></label>
                                            <input type="text" id="applyDate" name="applyDate"
                                                   class="date form-control ignore">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="price"><b>Giá</b></label>
                                            <input type="text" id="price" name="price" value="0"
                                                   class="form-control currency">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <textarea id="note" name="note" rows="4" class="form-control"
                                                      style="resize: none"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-group">
                                <button class="btn btn-primary marginRight" onclick="oilPriceView.save()">Hoàn tất
                                </button>
                                <button class="btn default" onclick="oilPriceView.hideFormControl()"
                                        style="margin-right: 10px">Hủy
                                </button>
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
    $(function () {
        if (typeof oilPriceView === "undefined") {
            oilPriceView = {
                oilObject: null,
                tableOilPrice: null,
                dataForTableOilPrice: null,

                showFormControl: function () {
                    $(".menu-toggle").fadeOut();
                    $("#divControl").fadeIn(300);
                },
                hideFormControl: function () {
                    oilPriceView.oilObject = null;
                    oilPriceView.resetForm();
                    $(".menu-toggle").fadeIn();
                    $("#divControl").fadeOut(300);
                    oilPriceView.clearValidation();
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                showFormForAddNew: function () {
                    oilPriceView.resetForm();
                    oilPriceView.renderDateTimePicker();
                    $("#form_mode").text("Thêm giá dầu");
                    oilPriceView.showFormControl();
                },
                showFormForEdit: function (id) {
                    oilPriceView.resetForm();
                    oilPriceView.oilObject = _.find(oilPriceView.dataForTableOilPrice, function (o) {
                        return o.id == id;
                    });
                    $("#form_mode").text("Chỉnh sửa giá dầu");
                    oilPriceView.fillForm(oilPriceView.oilObject);
                    oilPriceView.showFormControl();
                },
                resetForm: function () {
                    $("#price").empty().val(0);
                    $("#note").empty().val("");
                    $("#applyDate").empty().val("");
                },
                fillForm: function (oilObject) {
                    $("#price").empty().val(oilObject.price);
                    $("#note").empty().val(oilObject.note);
                    $("#applyDate").datepicker('update', moment(oilObject.applyDate).format("DD-MM-YYYY"));
                    formatCurrency(".currency");
                },
                save: function () {
                    oilPriceView.validateForm();
                    var price = $('input[id=price]').val();
                    if (price < 1) {
                        showNotification("error", "Giá phải lớn hơn 1000");
                        $('input[id=price]').focus();
                    } else {
                        if ($("#formFuelPrice").valid()) {
                            if (oilPriceView.oilObject) {
                                /* EDIT */
                                $.ajax({
                                    url: url + "fuel-price/oil/update",
                                    type: "POST",
                                    dataType: "json",
                                    data: {
                                        _token: _token,
                                        id: oilPriceView.oilObject.id,
                                        price: asNumberFromCurrency("#price"),
                                        note: $("#note").val().trim(),
                                        applyDate: $("#applyDate").val()
                                    }
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        var indexOilPriceOld = _.findIndex(oilPriceView.dataForTableOilPrice, function (o) {
                                            return o.id == oilPriceView.oilObject.id;
                                        });
                                        oilPriceView.dataForTableOilPrice.splice(indexOilPriceOld, 1, data);
                                        oilPriceView.tableOilPrice.clear().rows.add(oilPriceView.dataForTableOilPrice).draw();
                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {

                                }).always(function () {
                                    oilPriceView.hideFormControl();
                                });
                            } else {
                                /* ADD */
                                $.ajax({
                                    async: false,
                                    url: url + "fuel-price/oil/add",
                                    type: "POST",
                                    dataType: "json",
                                    data: {
                                        _token: _token,
                                        price: asNumberFromCurrency("#price"),
                                        note: $("#note").val().trim(),
                                        applyDate: $("#applyDate").val()
                                    }
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        oilPriceView.dataForTableOilPrice.push(data);
                                        oilPriceView.tableOilPrice.clear().rows.add(oilPriceView.dataForTableOilPrice).draw();
                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    showNotification("error","Vui lòng nhập giá dầu và ngày áp dụng phù hợp!")     
                                }).always(function () {
                                    oilPriceView.hideFormControl();
                                });
                            }
                        }
                        else {
                            $("form#formFuelPrice").find("label[class=error]").css("color", "red");
                        }
                    }

                },
                renderDateTimePicker: function () {
                    $("#applyDate").datepicker({
                        "format": "dd-mm-yyyy",
                        "autoclose": true
                    });
                    $("#applyDate").datepicker("setDate", new Date());
                },
                validateForm: function () {

                    $("#formFuelPrice").validate({
                        rules: {
                            applyDate: {
                                required: true
                            },
                            price: {
                                required: true
                            }
                        },
                        ignore: ".ignore",
                        messages: {
                            applyDate: {
                                required: "Ngày áp dụng bắt buộc nhập và phải lớn hơn ngày áp dụng lớn nhất trong bảng!"
                            },
                            price: {
                                required: "Giá dầu bắt buộc nhập và lớn hơn 1000!"
                            }
                        }
                    });
                },
                loadDateWhenViewRendComplete: function () {
                    $.ajax({
                        url: url + "fuel-price/oil/getOilViewCompleteData",
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        oilPriceView.dataForTableOilPrice = data;
                        oilPriceView.tableOilPrice = $("#table_oil_price").DataTable({
                            language: languageOptions,
                            data: oilPriceView.dataForTableOilPrice,
                            columns: [
                                {
                                    data: "id",
                                    visible: false
                                },
                                {
                                    data: "applyDate",
                                    render: function (data, type, full, meta) {
                                        return moment(data).format("DD/MM/YYYY");
                                    }
                                },
                                {
                                    data: "price",
                                    render: $.fn.dataTable.render.number(",", ".", 0)
                                },
                                {
                                    data: "createdBy"
                                },
                                {
                                    data: "updatedBy"
                                },
                                {
                                    data: "note",
                                    visible: false,
                                },
                                {
                                    // visible: false,
                                    render: function (data, type, full, meta) {
                                        var tr = '';
                                        tr += '<div class="btn-del-edit" title="Chỉnh sửa">';
                                        tr += '<div class="btn btn-success  btn-circle" onclick="oilPriceView.showFormForEdit(' + full.id + ')">';
                                        tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                        tr += '</div>';
                                        tr += '</div>';
                                        return tr;
                                    }
                                }
                            ],
                            order: [[1, "asc"]],
                            dom: "Bfrtip",
                            buttons: [
                                {
                                    extend: "copyHtml5",
                                    text: "Sao chép",
                                    exportOptions: {
                                        columns: [0, ":visible"]
                                    }
                                },
                                {
                                    extend: "excelHtml5",
                                    text: "Xuất Excel",
                                    exportOptions: {
                                        columns: ":visible"
                                    },
                                    customize: function (xlsx) {
                                        var sheet = xlsx.xl.worksheets["sheet1.xml"];
                                    }
                                },
                                {
                                    extend: "pdfHtml5",
                                    text: "Xuất PDF",
                                    message: "Bảng giá dầu",
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
                                        doc.content[1].table.widths = ["*", "*", "*", "*", "*", "*"];
                                    }
                                },
                                {
                                    extend: "colvis",
                                    text: "Ẩn cột"
                                }
                            ]
                        });
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    oilPriceView.renderDateTimePicker();
                }
            };
            oilPriceView.loadDateWhenViewRendComplete();
        } else {
            oilPriceView.loadDateWhenViewRendComplete();
        }
    });
</script>