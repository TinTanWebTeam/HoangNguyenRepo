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
        height: 310px;
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
                        <li class="active">Giá Nhớt</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="lubePriceView.showFormForAddNew()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="table_lube_price">
                            <thead>
                            <tr class="active">
                                <th>Mã</th>
                                <th>Ngày áp dụng</th>
                                <th>Giá nhớt</th>
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
                    <i class="glyphicon glyphicon-remove" onclick="lubePriceView.hideFormControl()"></i>
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
                                            <input type="text" class="form-control currency" value="0"
                                                   id="price" name="price">


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
                                <button class="btn btn-primary marginRight" onclick="lubePriceView.save()">Hoàn tất
                                </button>
                                <button type="button" class="btn default" onclick="lubePriceView.hideFormControl()"
                                        style="margin-right: 10px">Nhập lại
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
        if (typeof lubePriceView === "undefined") {
            lubePriceView = {
                lubeObject: null,
                tableLubePrice: null,
                dataForTableLubePrice: null,
                showFormControl: function () {
                    $(".menu-toggle").fadeOut();
                    $("#divControl").fadeIn(300);
                },
                hideFormControl: function () {
                    lubePriceView.lubeObject = null;
                    lubePriceView.resetForm();
                    $(".menu-toggle").fadeIn();
                    $("#divControl").fadeOut(300);
                    lubePriceView.clearValidation();
                },
                clearValidation: function () {
                    $('label[class=error]').hide();
                },
                showFormForAddNew: function () {
                    lubePriceView.resetForm();
                    lubePriceView.renderDateTimePicker();
                    $("#form_mode").text("Thêm giá Nhớt");
                    lubePriceView.showFormControl();
                },
                showFormForEdit: function (id) {
                    lubePriceView.resetForm();
                    lubePriceView.lubeObject = _.find(lubePriceView.dataForTableLubePrice, function (o) {
                        return o.id == id;
                    });
                    $("#form_mode").text("Chỉnh sửa giá nhớt");
                    lubePriceView.fillForm(lubePriceView.lubeObject);
                    lubePriceView.showFormControl();
                },
                resetForm: function () {
                    $("#price").empty().val(0);
                    $("#note").empty().val("");
                    $("#applyDate").empty().val("");
                },
                fillForm: function (lubeObject) {
                    $("#price").empty().val(lubeObject.price);
                    $("#note").empty().val(lubeObject.note);
                    $("#applyDate").datepicker('update', moment(lubeObject.applyDate).format("DD-MM-YYYY"));
                    formatCurrency(".currency");
                },
                save: function () {
                    lubePriceView.validateForm();
                    var price = $('input[id=price]').val();
                    if (price < 1) {
                        showNotification("error", "Giá phải lớn hơn 1000");
                        $('input[id=price]').focus();
                    } else {
                        if ($("#formFuelPrice").valid()) {
                            if (lubePriceView.lubeObject) {
                                /* EDIT */
                                $.ajax({
                                    url: url + "fuel-price/lube/update",
                                    type: "POST",
                                    dataType: "json",
                                    data: {
                                        _token: _token,
                                        id: lubePriceView.lubeObject.id,
                                        price: asNumberFromCurrency("#price"),
                                        note: $("#note").val().trim(),
                                        applyDate: $("#applyDate").val()
                                    }
                                }).done(function (data, textStatus, jqXHR) {
                                    if (jqXHR.status == 201) {
                                        var indexLubePriceOld = _.findIndex(lubePriceView.dataForTableLubePrice, function (o) {
                                            return o.id == lubePriceView.lubeObject.id;
                                        });
                                        lubePriceView.dataForTableLubePrice.splice(indexLubePriceOld, 1, data);
                                        lubePriceView.tableLubePrice.clear().rows.add(lubePriceView.dataForTableLubePrice).draw();
                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {

                                }).always(function () {
                                    lubePriceView.hideFormControl();
                                });
                            } else {
                                /* ADD */
                                $.ajax({
                                    async: false,
                                    url: url + "fuel-price/lube/add",
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
                                        lubePriceView.dataForTableLubePrice.push(data);
                                        lubePriceView.tableLubePrice.clear().rows.add(lubePriceView.dataForTableLubePrice).draw();
                                        lubePriceView.clearValidation();
                                    }
                                }).fail(function (jqXHR, textStatus, errorThrown) {
                                    showNotification("error","Vui lòng nhập giá dầu và ngày áp dụng phù hợp!")   
                                }).always(function () {
                                    lubePriceView.hideFormControl();
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
                                required: "Giá nhớt bắt buộc nhập và lớn hơn 1000!"
                            }
                        }
                    });
                },
                loadDateWhenViewRendComplete: function () {
                    $.ajax({
                        url: url + "fuel-price/lube/getLubeViewCompleteData",
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        lubePriceView.dataForTableLubePrice = data;
                        lubePriceView.tableLubePrice = $("#table_lube_price").DataTable({
                            language: languageOptions,
                            data: lubePriceView.dataForTableLubePrice,
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
                                        tr += '<div class="btn btn-success  btn-circle" onclick="lubePriceView.showFormForEdit(' + full.id + ')">';
                                        tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                        tr += '</div>';
                                        tr += '</div>';
                                        return tr;
                                    }
                                }
                            ],
                            order: [[0, "desc"]],
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
                                    message: "Bảng giá nhớt",
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
                    lubePriceView.renderDateTimePicker();
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                }
            };
            lubePriceView.loadDateWhenViewRendComplete();
        } else {
            lubePriceView.loadDateWhenViewRendComplete();
        }
    });
</script>