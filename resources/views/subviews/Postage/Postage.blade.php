<style>
    #divControl {
        z-index: 3;
        position: fixed;
        top: 53px;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    #divControl .panel-body {
        height: 570px;
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
                                <th>Khách hàng</th>
                                <th>Mã công thức</th>
                                <th>Đơn giá</th>
                                <th>Đơn vị tính</th>
                                <th>Giao xe</th>
                                <th>Ngày tạo</th>
                                <th>Ngày áp dụng</th>
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
                <span class="titleControl">Cập nhật cước phí</span>
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
                                        <fieldset>
                                            <legend>Công thức:</legend>
                                            <div class="row" style="padding: 0 10px">
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
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="formulaCode"><b>Mã công thức</b></label>
                                                        <input type="text" class="form-control" id="formulaCode"
                                                               name="formulaCode">
                                                        <input type="hidden" id="formula_id">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="cashDelivery" class="red"><b>Phí giao xe</b></label>
                                                        <input type="text" class="form-control currency"
                                                               id="cashDelivery" name="cashDelivery">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="unitPrice" class="red"><b>Đơn giá</b></label>
                                                        <input type="text" class="form-control currency" id="unitPrice" name="unitPrice">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="unit_id" class="red"><b>Đơn vị tính</b></label>
                                                        <div class="row">
                                                        <div class="col-xs-9">
                                                            <select class="form-control" id="unit_id" name="unit_id"></select>
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <div class="btn btn-primary btn-sm btn-circle"
                                                                 title="Thêm mới đơn vị tính"
                                                                 onclick="postageView.showAddUnit()">
                                                                <i class="glyphicon glyphicon-plus"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input ">
                                                        <label for="createdDate"><b>Ngày tạo</b></label>
                                                        <input type="text" class="date ignore form-control"
                                                               id="createdDate"
                                                               name="createdDate" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="applyDate" class="red"><b>Ngày áp dụng</b></label>
                                                        <input type="text" class="date ignore form-control"
                                                               id="applyDate"
                                                               name="applyDate">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="note"><b>Ghi chú</b></label>
                                                        <textarea class="form-control" name="note" id="note"
                                                                  rows="2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-sm-12">
                                                    <fieldset>
                                                        <legend>Thông tin giá dầu:</legend>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input">
                                                                <label for="oils_price"><b>Giá dầu</b></label>
                                                                <input type="text" class="form-control currency"
                                                                       name="oils_price"
                                                                       id="oils_price" disabled>
                                                                <input type="hidden" name="fuel_id" id="fuel_id">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input">
                                                                <label for="oils_applyDate"><b>Ngày áp dụng giá dầu</b></label>
                                                                <input type="text" class="date ignore form-control"
                                                                       name="oils_applyDate" id="oils_applyDate"
                                                                       disabled>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
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
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form role="form" id="frmControlDetail">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <fieldset>
                                            <legend>Chi tiết công thức:</legend>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="rule" class="marginRight"><b>Công thức: </b></label>
                                                        <input type="radio" name="rule" value="S" checked> <span class="marginRight">Giá trị</span>
                                                        <input type="radio" name="rule" value="R"> <span class="marginRight">Một khoảng</span>
                                                        <input type="radio" name="rule" value="P"> <span>Một cặp</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-12">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="condition" class="marginRight"><b>Điều kiện: </b></label>
                                                        <select class="form-control" id="condition" name="condition"></select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="name" class="red"><b>Tên trường</b></label>
                                                        <input type="text" class="form-control" id="name" name="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="value"><b>Giá trị</b></label>
                                                        <input type="text" class="form-control" id="value" name="value">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="from" class="red hide"><b>Từ</b></label>
                                                        <input type="text" class="form-control hide" id="from" name="from">
                                                        <input type="text" class="form-control hide" id="fromPlace" name="fromPlace">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-md-line-input">
                                                        <label for="to" class="red hide"><b>Đến</b></label>
                                                        <input type="text" class="form-control hide" name="to" id="to">
                                                        <input type="text" class="form-control hide" name="toPlace" id="toPlace">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding: 0 10px">
                                                <div class="col-md-12">
                                                    <div class="form-actions">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-primary marginRight"
                                                                    onclick="postageView.saveDetail()">Hoàn tất
                                                            </button>
                                                            <button type="button" class="btn default"
                                                                    onclick="postageView.retypeDetail()">Nhập lại
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="row">
                                    <span class="text text-primary">Danh sách chi tiết công thức:</span>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped" id="table-postageDetail">
                                            <thead>
                                            <tr class="active">
                                                <th>STT</th>
                                                <th>Tên trường</th>
                                                <th>Giá trị</th>
                                                <th>Từ</th>
                                                <th>Đến</th>
                                                <th>Từ</th>
                                                <th>Đến</th>
                                                <th>Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
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

<div class="row">
    <div class="modal fade" id="add-unit" tabindex="-1" role="dialog"
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
                        Them moi don vi tinh
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="apply-date">Ten</label>
                            <input type="text" class="form-control" id="unit_name" name="unit_name"/>
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" onclick="">
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

                dataPostage: null,
                dataPostageDetail: null,
                dataCustomer: null,
                dataFuel: null,
                dataFuelLastest: null,
                dataUnit: null,
                dataCondition: null,

                current: null,
                currentDetail: null,
                arrayDetail: [],
                action: null,
                actionDetail: null,
                idDelete: null,
                idDeleteDetail: null,
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
                    postageView.retype();
                    postageView.retypeDetail();
                },
                retype: function () {
                    $("input[id=customer_id]").val('');
                    $("#customer_id").prop('data-customerId', '');
                    $("input[id=formulaCode]").val('');
                    $("input[id=cashDelivery]").val(0);
                    $("input[id=unitPrice]").val(0);
                    $("input[id=unit]").val('');
                    $("input[id=note]").val('');
                },
                retypeDetail: function () {
                    if($("input[name=rule]:checked").val() != 'O')
                        $("input[id=name]").val('');
                    $("input[id=value]").val('');
                    $("input[id=from]").val('');
                    $("input[id=to]").val('');
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
                        setDate: new Date(),
                        format: 'dd-mm-yyyy',
                        autoclose: true
                    });
                    $('#oils_applyDate').datepicker("setDate", new Date());
                },
                renderScrollbar: function () {
                    $("#divControl").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                renderEventChangeRadio: function () {
                    $('input[type=radio][name=rule]').change(function () {
                        if($("select[id=condition] option:selected").text() == 'Khác'){
                            postageView.retypeDetail();
                            switch (this.value) {
                                case 'S':
                                    $("label[for=value]").removeClass('hide');
                                    $("label[for=from]").addClass('hide');
                                    $("label[for=to]").addClass('hide');
                                    $("#name").prop('readonly', false);
                                    $("#value").removeClass('hide')
                                    $("#from").addClass('hide');
                                    $("#to").addClass('hide');
                                    $("#fromPlace").addClass('hide');
                                    $("#toPlace").addClass('hide');
                                    break;
                                case 'R':
                                    $("label[for=value]").addClass('hide');
                                    $("label[for=from]").removeClass('hide');
                                    $("label[for=to]").removeClass('hide');
                                    $("#name").prop('readonly', false);
                                    $("#value").addClass('hide');
                                    $("#from").removeClass('hide');
                                    $("#to").removeClass('hide');
                                    $("#fromPlace").addClass('hide');
                                    $("#toPlace").addClass('hide');
                                    break;
                                case 'P':
                                    $("label[for=value]").addClass('hide');
                                    $("label[for=from]").removeClass('hide');
                                    $("label[for=to]").removeClass('hide');
                                    $("#name").prop('readonly', false);
                                    $("#value").addClass('hide');
                                    $("#from").addClass('hide');
                                    $("#to").addClass('hide');
                                    $("#fromPlace").removeClass('hide');
                                    $("#toPlace").removeClass('hide');
                                    break;
                                default: break;
                            }
                        }
                    });

                    $('select[id=condition]').change(function () {
                        var option = $(this).find('option:selected');
                        var name = option.text();
                        var flag = true;

                        $("#name").val(name);
                        if(name == 'Khác') {
                            flag = false;
                            $("#name").val('');
                            var rule_parent = $('input[type=radio][name=rule]:checked').val();
                            option.attr('my-rule', rule_parent);
                        }
                        var rule = option.attr('my-rule');
                        
                        // $("input[type=radio][name=rule][value="+rule+"]").prop('checked', true);
                        switch (rule) {
                            case 'S': 
                                $("label[for=value]").removeClass('hide');
                                $("label[for=from]").addClass('hide');
                                $("label[for=to]").addClass('hide');
                                $("#name").prop('readonly', flag);
                                $("#value").removeClass('hide')
                                $("#from").addClass('hide');
                                $("#to").addClass('hide');
                                $("#fromPlace").addClass('hide');
                                $("#toPlace").addClass('hide');
                                break;
                            case 'R': 
                                $("label[for=value]").addClass('hide');
                                $("label[for=from]").removeClass('hide');
                                $("label[for=to]").removeClass('hide');
                                $("#name").prop('readonly', flag);
                                $("#value").addClass('hide');
                                $("#from").removeClass('hide');
                                $("#to").removeClass('hide');
                                $("#fromPlace").addClass('hide');
                                $("#toPlace").addClass('hide');
                                break;
                            case 'P': 
                                $("label[for=value]").addClass('hide');
                                $("label[for=from]").removeClass('hide');
                                $("label[for=to]").removeClass('hide');
                                $("#name").prop('readonly', flag);
                                $("#value").addClass('hide');
                                $("#from").addClass('hide');
                                $("#to").addClass('hide');
                                $("#fromPlace").removeClass('hide');
                                $("#toPlace").removeClass('hide');
                                break;
                            default: break;
                        }
                    });
                },

                createDataCondition: function() {
                    postageView.dataCondition = [
                        { "id": 1, "name": "Khác", "rule": "S" },
                        { "id": 2, "name": "Tuyến đường", "rule": "P" },
                        { "id": 3, "name": "Khoảng cách", "rule": "R" },
                        { "id": 4, "name": "Loại xe", "rule": "S" },
                        { "id": 5, "name": "Lượng hàng", "rule": "R" },
                        { "id": 6, "name": "1 Chiều/2 Chiều", "rule": "S" },
                        { "id": 7, "name": "Mã hàng", "rule": "S" },
                        { "id": 8, "name": "Giá dầu", "rule": "R" }
                    ];
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'postage/postages',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            postageView.dataFuel = data['fuels'];
                            postageView.dataPostage = data['postages'];
                            postageView.dataPostageDetail = data['postageDetails'];
                            postageView.dataUnit = data['units'];
                            postageView.createDataCondition();

                            postageView.loadSelectBox(postageView.dataUnit, 'unit_id', 'name');
                            postageView.loadSelectBox(postageView.dataCondition, 'condition', 'name');
                            postageView.fillDataToDatatable(postageView.dataPostage);

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
                    postageView.renderEventChangeRadio();

                    formatCurrency(".currency");
                    setEventFormatCurrency(".currency");
                    defaultZero("#unitPrice");
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
                loadSelectBox: function (lstData, strId, propertyName) {
                    //reset selectbox
                    $('#' + strId)
                        .find('option')
                        .remove()
                        .end();
                    //fill option to selectbox
                    var select = document.getElementById(strId);
                    for (var i = 0; i < lstData.length; i++) {
                        var opt = lstData[i][propertyName];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstData[i]['id'];
                        if(lstData[i].hasOwnProperty("rule")){
                            el.setAttribute("my-rule", lstData[i]["rule"])
                        }
                        select.appendChild(el);
                    }
                },

                fillDataToDatatable: function (data) {
                    // removeDataTable();

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
                            {data: 'customers_fullName'},
                            {data: 'formulaCode'},
                            {
                                data: 'unitPrice',
                                render: $.fn.dataTable.render.number(",", ".", 0)
                            },
                            {data: 'unit'},
                            {data: 'cashDelivery'},
                            {
                                data: 'createdDate',
                                render: function (data, type, full, meta) {
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
                            {
                                data: 'applyDate',
                                render: function (data, type, full, meta) {
                                    if (data == null || data == "") return "";
                                    return moment(data).format("DD/MM/YYYY");
                                }
                            },
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
                    //    fixedHeader: {
                    //        header: true
                    //    },
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
                    // pushDataTable(postageView.table);
                },
                fillDataToDatatablePostageDetail: function (data) {
                    if (postageView.tablePostageDetail != null)
                        postageView.tablePostageDetail.destroy();

                    postageView.tablePostageDetail = $('#table-postageDetail').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {
                                data: 'stt',
                                visible: false
                            },
                            {
                                data: 'name',
                            },
                            {
                                data: 'value',
                            },
                            {
                                data: 'from'
                            },
                            {
                                data: 'to'
                            },
                            {
                                data: 'fromPlace'
                            },
                            {
                                data: 'toPlace'
                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="postageView.idDeleteDetail = ' + full.stt + ';postageView.actionDetail = \'delete\';postageView.saveDetail()">';
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
                    $("input[id=formulaCode]").val(postageView.current["formulaCode"]);
                    $("input[id=unitPrice]").val(postageView.current["unitPrice"]);
                    $("select[id=unit_id]").val(postageView.current["unit_id"]);
                    $("textarea[id=note]").val(postageView.current["note"]);
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
                            formulaCode: $("input[id=formulaCode]").val(),
                            cashDelivery: asNumberFromCurrency("#cashDelivery"),
                            unitPrice: asNumberFromCurrency('#unitPrice'),
                            unit_id: $("select[id=unit_id]").val(),
                            createdDate: $("input[id=createdDate]").val(),
                            applyDate: $("input[id=applyDate]").val(),
                            note: $("textarea[id=note]").val(),
                            fuel_id: $("input[id=fuel_id]").val()
                        };
                    } else if (postageView.action == 'update') {
                        postageView.current.customer_id = $("#customer_id").attr("data-customerId");
                        postageView.current.formulaCode = $("input[id=formulaCode]").val();
                        postageView.current.cashDelivery = asNumberFromCurrency("#cashDelivery");
                        postageView.current.unitPrice = asNumberFromCurrency('#unitPrice');
                        postageView.current.unit_id = $("select[id=unit_id]").val();
                        postageView.current.createdDate = $("input[id=createdDate]").val();
                        postageView.current.applyDate = $("input[id=applyDate]").val();
                        postageView.current.note = $("textarea[id=note]").val();
                        postageView.current.fuel_id = $("input[id=fuel_id]").val();
                    }
                },
                fillFormDataToCurrentObjectDetail: function () {
                    postageView.currentDetail = {
                        formula_id: $("#formula_id").val(),
                        rule: $("input[name=rule]:checked").val(),
                        name: $("#name").val(),
                        value: $("#value").val(),
                        from: $("#from").val(),
                        to: $("#to").val(),
                        fromPlace: $("#fromPlace").val(),
                        toPlace: $("#toPlace").val()
                    };
                },

                editPostage: function (id) {
                    postageView.current = null;
                    postageView.current = _.clone(_.find(postageView.dataPostage, function (o) {
                        return o.id == id;
                    }), true);

                    postageView.fillCurrentObjectToForm();
                    postageView.action = 'update';
                    postageView.showControl();
                    
                    postageView.arrayDetail = _.filter(postageView.dataPostageDetail, function (o) {
                        return o.formula_id == id;
                    });
                    for(var i=0; i<postageView.arrayDetail.length; i++){
                        postageView.arrayDetail[i].stt = i + 1;
                    }
                    postageView.fillDataToDatatablePostageDetail(postageView.arrayDetail);

                    var oils_applyDate = moment(postageView.dataFuelLastest['applyDate'], "YYYY-MM-DD");
                    $("input[id='oils_applyDate']").datepicker('update', oils_applyDate.format("DD-MM-YYYY"));
                    $("input[id=oils_price]").val(postageView.dataFuelLastest['price']);
                    $("input[id=fuel_id]").val(postageView.dataFuelLastest['id']);

                    $("#divControl").find(".titleControl").html("Cập nhật cước phí");

                    $("input[id=receivePlace]").prop('readonly', true);
                    $("input[id=deliveryPlace]").prop('readonly', true);
                },
                addPostage: function () {
                    postageView.renderDateTimePicker();

                    if (postageView.tablePostageDetail != null)
                        postageView.tablePostageDetail.clear().draw();

                    $("input[id=oils_price]").val(0);
                    $("input[id=unitPrice]").val(0);
                    $("input[id=cashDelivery]").val(0);
                    postageView.current = null;
                    postageView.action = 'add';
                    postageView.showControl();

                    var oils_applyDate = moment(postageView.dataFuelLastest['applyDate'], "YYYY-MM-DD");
                    $("input[id='oils_applyDate']").datepicker('update', oils_applyDate.format("DD-MM-YYYY"));
                    $("input[id=oils_price]").val(postageView.dataFuelLastest['price']);
                    $("input[id=fuel_id]").val(postageView.dataFuelLastest['id']);

                    $("#divControl").find(".titleControl").html("Thêm mới cước phí");

                    $("input[id=receivePlace]").prop('readonly', false);
                    $("input[id=deliveryPlace]").prop('readonly', false);
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

                formValidateJquery: function () {
                    $("#frmControl").validate({
                        rules: {
                            customer_id: "required",
                            cashDelivery: "required",
                            unitPrice: "required",
                            unit: "required"
                        },
                        ignore: ".ignore",
                        messages: {
                            customer_id: "Vui lòng chọn khách hàng",
                            cashDelivery: "Vui lòng nhập tiền giao xe",
                            unitPrice: "Vui lòng nhập đơn giá",
                            unit: "Vui lòng nhập đơn vị tính"
                        }
                    });
                },
                formValidateJqueryDetail: function () {
                    $("#frmControlDetail").validate({
                        rules: {
                            name: "required"
                        },
                        ignore: ".ignore",
                        messages: {
                            name: "Vui lòng nhập tên trường"
                        }
                    });
                },
                formValidate: function () {
                    var isValid = true;

                    if ($("#customer_id").attr('data-customerId') == '') {
                        showNotification('warning', 'Vui lòng chọn một khách hàng có trong danh sách.');
                        isValid = false;
                    }

                    var createdDate = $("#createdDate").val();
                    var applyDate = $("#applyDate").val();
                    createdDate = moment(createdDate, "DD-MM-YYYY");
                    applyDate = moment(applyDate, "DD-MM-YYYY");

                    if (applyDate.isBefore(createdDate)) {
                        showNotification('warning', 'Vui lòng chọn ngày áp dụng sau ngày tạo cước phí.');
                        isValid = false;
                    }

                    if(postageView.arrayDetail.length <= 0){
                        showNotification('warning', 'Vui lòng thêm chi tiết công thức trước khi thêm công thức!');
                        isValid = false;
                    }

                    return isValid;
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
                    // var validator = $(idForm).validate();
                    // validator.resetForm();
                },

                save: function () {
                    if (postageView.action == 'delete') {
                        var sendToServer = {
                            _token: _token,
                            _action: postageView.action,
                            _id: postageView.idDelete
                        };
                    } else {
                        postageView.formValidateJquery();
                        if ($("#frmControl").valid()) {

                            if (!postageView.formValidate()) {
                                return;
                            }

                            postageView.fillFormDataToCurrentObject();
                            var sendToServer = {
                                _token: _token,
                                _action: postageView.action,
                                _postage: postageView.current,
                                _postageDetail: postageView.arrayDetail
                            };
                        } else {
                            $("form#frmControl").find("label[class=error]").css("color", "red");
                            return;
                        }
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
                            console.log(data);
                            switch (postageView.action) {
                                case 'add':
                                    postageView.arrayDetail = [];
                                    postageView.dataPostage = data['postages'];
                                    postageView.dataPostageDetail = data['postageDetails'];
                                    postageView.fillDataToDatatable(postageView.dataPostage);

                                    showNotification("success", "Thêm thành công!");
                                    postageView.clearInput();
                                    postageView.hideControl();
                                    break;
                                case 'update':
                                    postageView.dataPostage = data['postages'];
                                    postageView.dataPostageDetail = data['postageDetails'];
                                    postageView.fillDataToDatatable(postageView.dataPostage);

                                    var formula_id = data['id'];
                                    postageView.arrayDetail = _.filter(postageView.dataPostageDetail, function (o) {
                                        return o.formula_id == formula_id;
                                    });
                                    if(postageView.arrayDetail.length > 0){
                                        for (var i = 0; i < postageView.arrayDetail.length; i++) {
                                            postageView.arrayDetail[i].stt = i + 1;
                                        }
                                        postageView.fillDataToDatatablePostageDetail(postageView.arrayDetail);
                                    }

                                    showNotification("success", "Cập nhật thành công!");
                                    postageView.retypeDetail();
                                    break;
                                case 'delete':
                                    postageView.arrayDetail = [];
                                    showNotification("success", "Xóa thành công!");
                                    postageView.displayModal("hide", "#modal-notification");
                                    postageView.hideControl();
                                    break;
                                default:
                                    break;
                            }
                        } else if (jqXHR.status == 203) {
                            showNotification("warning", data['msg']);
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                },
                saveDetail: function () {
                    if (postageView.actionDetail == 'delete') {
                        var find = _.find(postageView.arrayDetail, function(o){
                            return o.stt == postageView.idDeleteDetail;
                        });
                        var index = postageView.arrayDetail.indexOf(find); 
                        postageView.arrayDetail.splice(index, 1);
                        postageView.fillDataToDatatablePostageDetail(postageView.arrayDetail);
                        postageView.actionDetail = null;
                    } else {
                        postageView.formValidateJqueryDetail();
                        if ($("#frmControlDetail").valid()) {

                            postageView.fillFormDataToCurrentObjectDetail();

                            postageView.arrayDetail.push({
                                'action': postageView.action,
                                'rule': postageView.currentDetail['rule'],
                                'name': postageView.currentDetail['name'],
                                'value': postageView.currentDetail['value'],
                                'from': postageView.currentDetail['from'],
                                'to': postageView.currentDetail['to'],
                                'fromPlace': postageView.currentDetail['fromPlace'],
                                'toPlace': postageView.currentDetail['toPlace']
                            });

                            for (var i = 0; i < postageView.arrayDetail.length; i++) {
                                postageView.arrayDetail[i].stt = i + 1;
                            }
                            console.log(postageView.arrayDetail);
                            postageView.fillDataToDatatablePostageDetail(postageView.arrayDetail);
                        } else {
                            $("form#frmControlDetail").find("label[class=error]").css("color", "red");
                            return;
                        }
                    }
                },

                updateApplyDate: function () {
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
                            postageView.dataPostage = data['postages'];
                            postageView.fillDataToDatatable(postageView.dataPostage);

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
                showUpdateApplyDate: function (detailId) {
                    var postageDetail = _.find(postageView.dataPostage, function (o) {
                        return o.id == detailId;
                    });

                    if (postageDetail.applyDate != null) {
                        showNotification("warning", "Cước phí này đã có ngày áp dụng. Vui lòng chọn cước phí chưa có này áp dụng để cập nhật.");
                        return;
                    }

                    $("#postage-id").val(postageDetail.id);

                    var applyDate = moment(postageDetail.applyDate, "YYYY-MM-DD");
                    if (applyDate.isValid()) {
                        applyDate = applyDate.format("DD-MM-YYYY");
                        $("input[id='apply-date']").datepicker('update', applyDate);
                    }

                    postageView.displayModal('show', '#myModalNorm');
                },

                showAddUnit: function(){
                    postageView.displayModal('show', '#add-unit');
                }
            };
            postageView.loadData();
        } else {
            postageView.loadData();
        }
    });
</script>