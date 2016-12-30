<style>
    #divControl_add {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 50%;
        height: 100%;
    }

    #divControl_edit {
        z-index: 3;
        position: fixed;
        top: 15%;
        display: none;
        right: 0;
        width: 80%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }

    .marginRight {
        margin-right: 5px;
    }

    @media (max-height: 500px) {
        #divControl_add {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }

    }

    @media (max-height: 500px) {
        #divControl_edit {
            top: 53px;
            overflow: auto;
            height: 80vh;
        }

    }

    #divControl_add .panel-body {
        height: 488px;
    }

    #divControl_edit .scroll-bar {
        height: 488px;
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
                        <li><a href="javascript:;">QL khách hàng</a></li>
                        <li class="active">Khách hàng</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới"
                             onclick="customerView.addCustomer();">
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
                                <th>Loại</th>
                                <th>Tên</th>
                                <th>Mã số thuế</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Ghi chú</th>
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

<!-- Add customer-->
<div class="row">
    <div id="divControl_add" class="col-md-offset-4 col-md-8">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl">Thêm mới khách hàng</span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="customerView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" id="frmControl">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="fullName"><b>Họ và tên</b></label>
                                            <input type="text" class="form-control"
                                                   id="fullName"
                                                   name="fullName"
                                                   autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="customerType_id"><b>Loại khách hàng</b></label>
                                            <div class="row">
                                                <div class="col-sm-9 col-xs-9">
                                                    <select name="customerType_id" id="customerType_id"
                                                            class="form-control">

                                                    </select>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <div class="btn btn-primary btn-sm btn-circle"
                                                         title="Thêm loại khách hàng"
                                                         onclick="customerView.displayModal('show', '#modal-addCustomerType')">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="taxCode"><b>Mã số thuế</b></label>
                                            <input type="number" class="form-control"
                                                   id="taxCode"
                                                   name="taxCode">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="address"><b>Địa chỉ</b></label>
                                            <input type="text" class="form-control"
                                                   id="address"
                                                   name="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="phone"><b>Số điện thoại</b></label>
                                            <input type="number" class="form-control"
                                                   id="phone"
                                                   name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="email"><b>Email</b></label>
                                            <input type="email" class="form-control"
                                                   id="email"
                                                   name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="percentFuel"><b>Phí nhiên liệu/cước phí (%)</b></label>
                                                    <input type="number" id="percentFuel" name="percentFuel"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="percentFuelChange"><b>Cước phí tăng khi nhiên liệu tăng
                                                            (%)</b></label>
                                                    <input type="number" id="percentFuelChange" name="percentFuelChange"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <textarea class="form-control" id="note" name="note" rows="4"
                                                      cols="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-actions noborder">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary marginRight"
                                                        onclick="customerView.save()">
                                                    Hoàn tất
                                                </button>
                                                <button type="button" class="btn default"
                                                        onclick="customerView.cancel()">
                                                    Nhập lại
                                                </button>
                                            </div>
                                        </div>
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
<!-- end Add customer -->

<!-- Control -->
<div class="row">
    <div id="divControl_edit" class="col-md-offset-6 col-md-6 col-sm-offset-4 col-sm-8 col-xs-offset-0 col-xs-12">
        <div class="panel panel-primary box-shadow">
            <div class="panel-heading">
                <span class="titleControl">Thêm mới khách hàng</span>
                <div class="menu-toggles pull-right" title="Ẩn thêm mới" onclick="customerView.hideControl()">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" id="frmControlEdit">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="fullNameEdit"><b>Họ và tên</b></label>
                                            <input type="text" class="form-control"
                                                   id="fullNameEdit"
                                                   name="fullNameEdit"
                                                   autofocus>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="customerType_id"><b>Loại khách hàng</b></label>
                                            <div class="row">
                                                <div class="col-sm-9 col-xs-9">
                                                    <select name="customerType" id="customerType"
                                                            class="form-control">

                                                    </select>
                                                </div>
                                                <div class="col-sm-3 col-xs-3">
                                                    <div class="btn btn-primary btn-sm btn-circle"
                                                         title="Thêm loại khách hàng"
                                                         onclick="customerView.displayModal('show', '#modal-addCustomerType')">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="taxCodeEdit"><b>Mã số thuế</b></label>
                                            <input type="number" class="form-control"
                                                   id="taxCodeEdit"
                                                   name="taxCodeEdit">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="addressEdit"><b>Địa chỉ</b></label>
                                            <input type="text" class="form-control"
                                                   id="addressEdit"
                                                   name="addressEdit">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="phoneEdit"><b>Số điện thoại</b></label>
                                            <input type="number" class="form-control"
                                                   id="phoneEdit"
                                                   name="phoneEdit">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group form-md-line-input ">
                                            <label for="emailEdit"><b>Email</b></label>
                                            <input type="email" class="form-control"
                                                   id="emailEdit"
                                                   name="emailEdit">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="percentFuelEdit"><b>Phí nhiên liệu/cước phí
                                                            (%)</b></label>
                                                    <input type="number" id="percentFuelEdit" name="percentFuel"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="percentFuelChangeEdit"><b>Cước phí tăng khi nhiên liệu
                                                            tăng (%)</b></label>
                                                    <input type="number" id="percentFuelChangeEdit"
                                                           name="percentFuelChange"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-md-line-input">
                                            <label for="noteEdit"><b>Ghi chú</b></label>
                                            <textarea class="form-control" id="noteEdit" name="note" rows="4"
                                                      cols="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-actions noborder">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary marginRight"
                                                        onclick="customerView.save()">
                                                    Hoàn tất
                                                </button>
                                                <button type="button" class="btn default"
                                                        onclick="customerView.cancel()">
                                                    Nhập lại
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-6">
                        <div class="row scroll-bar">
                            <div class="col-md-12" align="center">
                                <span class="text text-primary" style="font-size: 23px">Nhân viên khách hàng</span>
                                <div class="table-responsive">
                                    <table style="width: 100%" class="table table-striped table-bordered table-hover"
                                           id="table-tableStaffCustomers">
                                        <thead>
                                        <tr class="active">
                                            <th>Mã</th>
                                            <th>Tên</th>
                                            <th>Chức vụ</th>
                                            <th>Điện thoại</th>
                                            <th>Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <form role="form" id="frmStaffCustomer">
                                    <input id="idStaff" style="display: none;">
                                    <input id="idCustomer" style="display: none;">
                                    <div class="form-body" id='datetimepicker'>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group form-md-line-input ">
                                                    <label for="fullNameStaff"><b>Tên nhân viên</b></label>
                                                    <input type="text" class="form-control"
                                                           id="fullNameStaff"
                                                           name="fullNameStaff">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group form-md-line-input ">
                                                    <label for="positionStaff"><b>Chức vụ</b></label>
                                                    <input type="text" class="form-control"
                                                           id="positionStaff"
                                                           name="positionStaff">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group form-md-line-input ">
                                                    <label for="phoneStaff"><b>Điện thoại</b></label>
                                                    <input type="number" class="form-control"
                                                           id="phoneStaff"
                                                           name="phoneStaff">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group form-md-line-input">
                                                    <label for="addressStaff"><b>Địa chỉ</b></label>
                                                    <input type="text" class="form-control"
                                                           id="addressStaff"
                                                           name="addressStaff">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="form-group form-md-line-input">
                                                    <label for="birthdayStaff"><b>Ngày sinh</b></label>
                                                    <input type="text" class="date form-control ignore"
                                                           id="birthdayStaff"
                                                           name="birthdayStaff">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group form-md-line-input ">
                                                    <label for="emailStaff"><b>Email</b></label>
                                                    <input type="text" class="form-control"
                                                           id="emailStaff"
                                                           name="emailStaff">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group form-md-line-input">
                                                    <label for="noteStaff"><b>Ghi chú</b></label>
                                                    <textarea type="text" class="form-control"
                                                              id="noteStaff"
                                                              name="noteStaff"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-actions noborder">
                                                    <div class="form-group">
                                                        <button id="addStaffCustomer" type="button"
                                                                class="btn btn-primary marginRight"
                                                                onclick="customerView.saveStaff()">
                                                            Hoàn tất
                                                        </button>
                                                        <button id="retype" type="button" class="btn default"
                                                                onclick="customerView.clearInputStaff()">
                                                            Nhập lại
                                                        </button>
                                                    </div>
                                                </div>
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
    </div> <!-- end #divControl -->
</div>
<!-- end Control -->


<!-- Modal confirm delete Customer -->
<div class="row">
    <div id="modal-confirmDelete" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa khách hàng này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="customerView.save()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="customerView.displayModal('hide','#modal-confirmDelete')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Customer -->
<!-- Modal confirm delete Staff -->
<div class="row">
    <div id="modal-confirmDeleteStaff" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h5 class="modal-title">Có chắc muốn xóa nhân viên này?</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-offset-8 col-md-4 col-xs-offset-8 col-xs-4">
                            <button type="button" class="btn btn-primary marginRight"
                                    onclick="customerView.saveStaff()">
                                Đồng ý
                            </button>
                            <button type="button" class="btn default"
                                    onclick="customerView.displayModal('hide','#modal-confirmDeleteStaff')">
                                Huỷ
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Modal confirm delete Staff -->


<!-- Modal add customerTypes -->
<div class="row">
    <div id="modal-addCustomerType" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" onclick="customerView.cancelCustomerType()">×</span>
                    </button>
                    <h4 class="modal-title">Thêm loại khách hàng</h4>
                </div>
                <div class="modal-body">
                    <form id="frmCustomerType">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="CustomerType_name"><b>Tên loại khách hàng</b></label>
                                    <input type="text" class="form-control"
                                           id="CustomerType_name"
                                           name="CustomerType_name">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input">
                                    <label for="description"><b>Mô tả</b></label>
                                    <textarea name="description" id="description" cols="10" rows="3"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-7 col-md-5">
                                <div class="form-actions noborder">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary marginRight"
                                                onclick="customerView.saveCustomerType()">
                                            Hoàn tất
                                        </button>
                                        <button type="button" class="btn default"
                                                onclick="customerView.cancelCustomerType()">Nhập lại
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
</div>
<!-- end Modal add customerTypes -->

<script>
    $(function () {
        if (typeof (customerView) === 'undefined') {
            customerView = {
                table: null,
                tableStaff: null,
                tableCustomer: null,
                tableCustomerType: null,
                dataStaffTemp: null,
                action: null,
                dataStaff: null,
                idDelete: null,
                currentStaff: null,
                cancel: function () {
                    if (customerView.action == 'add') {
                        customerView.clearInput();
                    } else {
                        customerView.fillCurrentObjectToForm();

                    }
                },
                showControl: function () {
                    $('.menu-toggle').fadeOut();
                    if (customerView.action == 'add') {
                        $('#divControl_add').fadeIn(300);
                    }
                    if (customerView.action == 'update') {
                        $('#divControl_edit').fadeIn(300);
                    }
                },
                hideControl: function () {
                    $('#divControl_add').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    $('#divControl_edit').fadeOut(300, function () {
                        $('.menu-toggle').fadeIn();
                    });
                    customerView.clearValidation("#frmControl");
                    customerView.clearValidation("#frmControlEdit");
                    customerView.clearValidation("#frmStaffCustomer");
                    customerView.clearInput();
                    customerView.clearInputStaff();
                },
                displayModal: function (type, idModal) {
                    $(idModal).modal(type);
                    if (customerView.action == 'delete' && type == 'hide') {
                        customerView.action = null;
                        customerView.idDelete = null;
                    }
                    customerView.clearValidation("#frmCustomerType");
//                    customerView.clearInput();
                },
                clearInput: function () {
                    //Clear form Customer
                    $("input[id='fullName']").val('');
                    $("input[id='address']").val('');
                    $("input[id='taxCode']").val('');
                    $("input[id='phone']").val('');
                    $("input[id='email']").val('');
                    $("input[id='percentFuel']").val('');
                    $("input[id='percentFuelChange']").val('');
                    $("textarea[id='note']").val('');
                    $("input[id='idCustomer']").val('');
                },
                clearInputStaff: function () {
                    //Clear form Staff
                    $("input[id='idStaff']").val('');
                    $("input[id='fullNameStaff']").val('');
                    $("input[id='phoneStaff']").val('');
                    $("input[id='positionStaff']").val('');
                    $("input[id='emailStaff']").val('');
                    $("input[id='addressStaff']").val('');
                    $("textarea[id='noteStaff']").val('');
                    customerView.renderDateTimePicker();
                },
                renderScrollbar: function () {
                    $("#divControl_add").find('.panel-body').mCustomScrollbar({
                        theme: "dark"
                    });
                    $("#divControl_edit").find('.scroll-bar').mCustomScrollbar({
                        theme: "dark"
                    });
                },
                loadData: function () {
                    $.ajax({
                        url: url + 'customer/customers',
                        type: "GET",
                        dataType: "json"
                    }).done(function (data, textStatus, jqXHR) {
                        if (jqXHR.status == 200) {
                            customerView.tableCustomer = data['customers'];
                            customerView.fillDataToDatatable(data['customers']);
                            customerView.dataStaff = data['dataStaff'];
                            customerView.fillDataToDatatableStaff(data['dataStaff']);
                            customerView.tableCustomerType = data['customerTypes'];
                            customerView.loadSelectBox(data['customerTypes']);
                        } else {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                    customerView.renderScrollbar();
                    $("#table-tableStaffCustomers").find("tbody").on('click', 'tr', function () {
                        var staffId = $(this).find('td:eq(0)')[0].innerText;
                        customerView.fillDataStaffToForm(staffId);
                    });
                    customerView.renderDateTimePicker();
                    $('#datetimepicker .date').datepicker({
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                },
                renderDateTimePicker: function () {
                    $('#birthdayStaff').datepicker({
                        "setDate": new Date(),
                        'format': 'dd-mm-yyyy',
                        'autoclose': true
                    });
                    $('#birthdayStaff').datepicker("setDate", new Date());

                },
                loadSelectBox: function (lstCustomerType) {
                    //reset selectbox
                    $('#customerType_id')
                        .find('option')
                        .remove()
                        .end();
                    //fill option to selectbox
                    var select = document.getElementById("customerType_id");
                    for (var i = 0; i < lstCustomerType.length; i++) {
                        var opt = lstCustomerType[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstCustomerType[i]['id'];
                        select.appendChild(el);
                    }
                    $('#customerType')
                        .find('option')
                        .remove()
                        .end();
                    //fill option to selectbox
                    var select = document.getElementById("customerType");
                    for (var i = 0; i < lstCustomerType.length; i++) {
                        var opt = lstCustomerType[i]['name'];
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = lstCustomerType[i]['id'];
                        select.appendChild(el);
                    }
                },
                fillDataToDatatableStaff: function (data) {
                    if (customerView.tableStaff != null) {
                        customerView.tableStaff.destroy();
                    }
                    customerView.tableStaff = $('#table-tableStaffCustomers').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'fullName'},
                            {data: 'position'},
                            {data: 'phone'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="customerView.deleteStaff(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }, width: "10%"
                            }


                        ],
                        dom: ''

                    })
                },
                fillDataToDatatable: function (data) {
                    customerView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'id'},
                            {data: 'customerTypes_name'},
                            {data: 'fullName'},
                            {data: 'taxCode'},
                            {data: 'address'},
                            {data: 'phone'},
                            {data: 'email'},
                            {
                                data: 'note',

                            },
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit" title="Chỉnh Sửa">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="customerView.editCustomer(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit" title="Xóa">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="customerView.deleteCustomer(' + full.id + ')">';
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
                    //Cty
                    $("input[id='fullNameEdit']").val(customerView.current["fullName"]);
                    $("input[id='taxCodeEdit']").val(customerView.current["taxCode"]);
                    $("input[id='addressEdit']").val(customerView.current["address"]);
                    $("input[id='phoneEdit']").val(customerView.current["phone"]);
                    $("input[id='emailEdit']").val(customerView.current["email"]);
                    $("input[id='percentFuelEdit']").val(customerView.current["percentOilPerPostage"]);
                    $("input[id='percentFuelChangeEdit']").val(customerView.current["percentOilLimitToChangePostage"]);
                    $("textarea[id='noteEdit']").val(customerView.current["note"]);
                    $("select[id='customerType']").val(customerView.current["customerType_id"]);

                },
                fillFormDataToCurrentObject: function () {
                    if (customerView.action == 'add') {
                        customerView.current = {
                            fullName: $("input[id='fullName']").val(),
                            taxCode: $("input[id='taxCode']").val(),
                            address: $("input[id='address']").val(),
                            phone: $("input[id='phone']").val(),
                            email: $("input[id='email']").val(),
                            note: $("textarea[id='note']").val(),
                            percentFuel: $("input[id='percentFuel']").val(),
                            percentFuelChange: $("input[id='percentFuelChange']").val(),
                            customerType_id: $("select[id='customerType_id']").val()

                        };
                    } else if (customerView.action == 'update') {
                        customerView.current.fullName = $("input[id='fullNameEdit']").val();
                        customerView.current.taxCode = $("input[id='taxCodeEdit']").val();
                        customerView.current.address = $("input[id='addressEdit']").val();
                        customerView.current.phone = $("input[id='phoneEdit']").val();
                        customerView.current.email = $("input[id='emailEdit']").val();
                        customerView.current.percentFuel = $("input[id='percentFuelEdit']").val();
                        customerView.current.percentFuelChange = $("input[id='percentFuelChangeEdit']").val();
                        customerView.current.note = $("textarea[id='noteEdit']").val();
                        customerView.current.customerType_id = $("select[id='customerType']").val();
                    }
                },
                fillDataStaffToForm: function (id) {
                    customerView.currentStaff = null;
                    customerView.currentStaff = _.clone(_.find(customerView.dataStaff, function (o) {
                        return o.id == id;
                    }), true);
                    $("input[id='idStaff']").val(customerView.currentStaff["id"]);
                    $("input[id='fullNameStaff']").val(customerView.currentStaff["fullName"]);
                    $("input[id='phoneStaff']").val(customerView.currentStaff["phone"]);
                    $("input[id='positionStaff']").val(customerView.currentStaff["position"]);
                    $("input[id='emailStaff']").val(customerView.currentStaff["email"]);
                    $("input[id='addressStaff']").val(customerView.currentStaff["address"]);
                    $("textarea[id='noteStaff']").val(customerView.currentStaff["note"]);
                    var birthday = moment(customerView.currentStaff["birthday"], "YYYY-MM-DD HH:mm:ss");
                    $("input[id='birthdayStaff']").datepicker('update', birthday.format("DD-MM-YYYY"));
                    customerView.clearValidation("#frmStaffCustomer");
                },
                editCustomer: function (id) {
                    customerView.dataStaffTemp = _.filter(customerView.dataStaff, function (o) {
                        return o.customer_id == id;
                    });
                    customerView.fillDataToDatatableStaff(customerView.dataStaffTemp);
                    $("input[id='idCustomer']").val(id);
                    customerView.current = null;
                    customerView.current = _.clone(_.find(customerView.tableCustomer, function (o) {
                        return o.id == id;
                    }), true);
                    customerView.fillCurrentObjectToForm();
                    customerView.action = 'update';
                    $("#divControl_edit").find(".titleControl").html("Cập nhật khách hàng");
                    customerView.showControl();

                },
                addCustomer: function () {
                    customerView.current = null;
                    customerView.action = 'add';
                    $("#divControl_add").find(".titleControl").html("Thêm mới khách hàng");
                    customerView.showControl();
                },
                deleteCustomer: function (id) {
                    customerView.action = 'delete';
                    customerView.idDelete = id;
                    customerView.displayModal("show", "#modal-confirmDelete");
                },
                deleteStaff: function (id) {
                    customerView.action = 'deleteStaff';
                    customerView.idStaff = id;
                    customerView.displayModal("show", "#modal-confirmDeleteStaff");
                },
                formValidateEdit: function () {
                    $("#frmControlEdit").validate({
                        rules: {
                            customerType_id: "required",
                            fullNameEdit: "required",
                            taxCodeEdit: {
                                required: true,
                                number: true
                            },
                            phoneEdit: {
                                number: "Số điện thoại không hợp lệ"
                            },
                            emailEdit: {
                                required: true,
                                email: true
                            }
                        },
                        messages: {
                            customerType_id: "Vui lòng chọn loại khách hàng",
                            fullNameEdit: "Vui lòng nhập tên khách hàng",
                            taxCodeEdit: {
                                required: "Vui lòng nhập mã số thuế",
                                number: "Mã số thuế không hợp lệ"
                            },
                            phoneEdit: {
                                number: "Số điện thoại không hợp lệ"
                            },
                            emailEdit: {
                                required: "Vui lòng nhập email ",
                                email: "Email không hợp lệ"
                            }
                        }
                    });
                },
                formValidate: function () {
                    $("#frmControl").validate({
                        rules: {
                            customerType_id: "required",
                            fullName: "required",
                            taxCode: {
                                required: true,
                                number: true
                            },
                            phone: {
                                number: true
                            },
                            email: {
                                required: true,
                                email: true
                            }

                        },
                        messages: {
                            customerType_id: "Vui lòng chọn loại khách hàng",
                            fullName: "Vui lòng nhập tên khách hàng",
                            taxCode: {
                                required: "Vui lòng nhập mã số thuế",
                                number: "Mã số thuế không hợp lệ"
                            },
                            phone: {
                                number: "Số điện thoại không hợp lệ"
                            },
                            email: {
                                required: "Vui lòng nhập email ",
                                email: "Email không hợp lệ"
                            }

                        }
                    });


                },
                staffFormValidate: function () {
                    $("#frmStaffCustomer").validate({
                        rules: {
                            fullNameStaff: "required",
                            phoneStaff: "required"
                        },

                        ignore: ".ignore",
                        messages: {
                            fullNameStaff: "Vui lòng nhập tên nhân viên",
                            phoneStaff: "Vui lòng nhập số điện thoại"

                        }
                    });
                },
                clearValidation: function (idForm) {
                    $(idForm).find("label[class=error]").remove();
                },
                saveStaff: function () {
                    var sendToServer = null;
                    if (customerView.action == 'deleteStaff') {
                        sendToServer = {
                            _token: _token,
                            _action: customerView.action,
                            _object: customerView.idStaff
                        };
                        $.ajax({
                            url: url + 'staff/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                var staffDelete = _.find(customerView.dataStaff, function (o) {
                                    return o.id == sendToServer._object;
                                });
                                var indexOfStaffOld = _.indexOf(customerView.dataStaff, staffDelete);
                                customerView.dataStaff.splice(indexOfStaffOld, 1);
                                var staffOld = _.filter(customerView.dataStaff, function (o) {
                                    return o.customer_id == customerView.current.id;
                                });
                                customerView.fillDataToDatatableStaff(staffOld);
                                showNotification("success", "Xóa nhân viên thành công!");
                                customerView.displayModal("hide", "#modal-confirmDeleteStaff");
                                customerView.clearInputStaff();
                            }

                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        if ($("input[id='idStaff']").val().trim() == '') {
                            customerView.action = "addStaff";
                            customerView.currentStaff = {
                                customer_id: $("input[id='idCustomer']").val(),
                                fullNameStaff: $("input[id='fullNameStaff']").val(),
                                phoneStaff: $("input[id='phoneStaff']").val(),
                                birthdayStaff: $("input[id='birthdayStaff']").val(),
                                positionStaff: $("input[id='positionStaff']").val(),
                                emailStaff: $("input[id='emailStaff']").val(),
                                addressStaff: $("input[id='addressStaff']").val(),
                                noteStaff: $("textarea[id='noteStaff']").val()
                            };
                        } else {
                            customerView.action = "updateStaff";
                            customerView.currentStaff.fullNameStaff = $("input[id='fullNameStaff']").val();
                            customerView.currentStaff.phoneStaff = $("input[id='phoneStaff']").val();
                            customerView.currentStaff.birthdayStaff = $("input[id='birthdayStaff']").val();
                            customerView.currentStaff.positionStaff = $("input[id='positionStaff']").val();
                            customerView.currentStaff.addressStaff = $("input[id='addressStaff']").val();
                            customerView.currentStaff.emailStaff = $("input[id='emailStaff']").val();
                            customerView.currentStaff.noteStaff = $("textarea[id='noteStaff']").val();
                        }
                        customerView.staffFormValidate();
                        if ($("#frmStaffCustomer").valid()) {
                            sendToServer = {
                                _token: _token,
                                _action: customerView.action,
                                _object: customerView.currentStaff
                            };
                            $.ajax({
                                url: url + 'staff/modify',
                                type: "POST",
                                dataType: "json",
                                data: sendToServer
                            }).done(function (data, textStatus, jqXHR) {
                                if (jqXHR.status == 201) {
                                    switch (customerView.action) {
                                        case 'addStaff':
                                            customerView.dataStaff.push(data['staffNew']);
                                            var StaffOld = _.filter(customerView.dataStaff, function (o) {
                                                return o.customer_id == customerView.current.id;
                                            });
                                            customerView.fillDataToDatatableStaff(StaffOld);
                                            showNotification("success", "Thêm nhân viên thành công!");
                                            break;
                                        case 'updateStaff':
                                            var StaffOld = _.find(customerView.dataStaffTemp, function (o) {
                                                return o.id == sendToServer._object.id;
                                            });
                                            var indexOfStaffOld = _.indexOf(customerView.dataStaffTemp, StaffOld);
                                            customerView.dataStaffTemp.splice(indexOfStaffOld, 1, data['updateStaff']);

                                            var StaffOld = _.find(customerView.dataStaff, function (o) {
                                                return o.id == sendToServer._object.id;
                                            });
                                            var indexOfStaffOld = _.indexOf(customerView.dataStaff, StaffOld);
                                            customerView.dataStaff.splice(indexOfStaffOld, 1, data['updateStaff']);
                                            customerView.tableStaff.clear().rows.add(customerView.dataStaffTemp).draw();
                                            showNotification("success", "Cập nhật nhân viên thành công!");
                                            break;
                                        default:
                                            break;
                                    }
                                    customerView.clearInputStaff();

                                } else {
                                    showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }

                            }).fail(function (jqXHR, textStatus, errorThrown) {
                                showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");

                            });
                        } else {
                            $("form#frmStaffCustomer").find("label[class=error]").css("color", "red");
                        }
                    }


                },
                save: function () {

                    if ($("input[id=idCustomer]").val() == "") {
                        customerView.action = "add";
                    }
                    if ($("input[id=idCustomer]").val() != "") {
                        customerView.action = "update";
                    }
                    var nameCustomer = _.map(customerView.tableCustomer, function (o) {
                        return o.fullName;
                    });
                    if (_.indexOf(nameCustomer, $("input[id=fullName]").val()) >= 0) {
                        showNotification("error", "Khách hàng đã tồn tại!");
                    } else {
                        customerView.formValidate();
                        customerView.formValidateEdit();
                        if ($("#frmControl").valid() && $("#frmControlEdit").valid()) {
                            customerView.fillFormDataToCurrentObject();
                            var sendToServer = {
                                _token: _token,
                                _action: customerView.action,
                                _customer: customerView.current
                            };
                            if (customerView.action == 'delete') {
                                sendToServer._id = customerView.idDelete;
                            }
                            $.ajax({
                                url: url + 'customer/modify',
                                type: "POST",
                                dataType: "json",
                                data: sendToServer
                            }).done(function (data, textStatus, jqXHR) {
                                if (jqXHR.status == 201) {
                                    switch (customerView.action) {
                                        case 'add':
                                            customerView.tableCustomer.push(data['customer'][0]);
                                            showNotification("success", "Thêm thành công!");
                                            break;
                                        case 'update':
                                            var customerOld = _.find(customerView.tableCustomer, function (o) {
                                                return o.id == sendToServer._customer.id;
                                            });
                                            var indexOfCustomerOld = _.indexOf(customerView.tableCustomer, customerOld);
                                            customerView.tableCustomer.splice(indexOfCustomerOld, 1, data['customer'][0]);
                                            showNotification("success", "Cập nhật thành công!");
                                            customerView.hideControl();
                                            customerView.clearInput();
                                            break;
                                        case 'delete':
                                            var customerOld = _.find(customerView.tableCustomer, function (o) {
                                                return o.id == sendToServer._id;
                                            });
                                            var indexOfCustomerOld = _.indexOf(customerView.tableCustomer, customerOld);
                                            customerView.tableCustomer.splice(indexOfCustomerOld, 1);
                                            showNotification("success", "Xóa thành công!");
                                            customerView.displayModal("hide", "#modal-confirmDelete");
                                            break;
                                        default:
                                            break;
                                    }
                                    customerView.table.clear().rows.add(customerView.tableCustomer).draw();
                                    customerView.clearInput();
                                } else if (jqXHR.status == 203) {
                                    showNotification("error", "Tên khách hàng đã tồn tại!");
                                } else {
                                    showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                                }
                            }).fail(function (jqXHR, textStatus, errorThrown) {
                                showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                            });
                        } else {
                            $("form#frmControl").find("label[class=error]").css("color", "red");
                            $("form#frmControlEdit").find("label[class=error]").css("color", "red");
                        }
                    }
                },
                clearInputCustomerType: function () {
                    $("input[id='CustomerType_name']").val('');
                    $("textarea[id='description']").val('');
                },
                validateCustomerType: function () {
                    $("#frmCustomerType").validate({
                        rules: {
                            CustomerType_name: "required"
                        },
                        messages: {
                            CustomerType_name: "Vui lòng nhập tên loại khách hàng"
                        }
                    });
                },
                cancelCustomerType: function () {
                    $('input[id=CustomerType_name]').val('');
                    $('textarea[id=description]').val('');
                },
                saveCustomerType: function () {
                    customerView.validateCustomerType();
                    if ($("#frmCustomerType").valid()) {
                        var customerType = {
                            name: $("input[id='CustomerType_name']").val(),
                            description: $("textarea[id='description']").val()
                        };
                        var sendToServer = {
                            _token: _token,
                            _action: 'add',
                            _customerType: customerType
                        };
                        $.ajax({
                            url: url + 'customer-type/modify',
                            type: "POST",
                            dataType: "json",
                            data: sendToServer
                        }).done(function (data, textStatus, jqXHR) {
                            if (jqXHR.status == 201) {
                                showNotification("success", "Thêm thành công!");
                                customerView.displayModal("hide", "#modal-addCustomerType");
                                customerView.tableCustomerType.push(data['customerType']);
                                customerView.clearInputCustomerType();
                                customerView.loadSelectBox(customerView.tableCustomerType);
                                $("select[id='customerType_id']").val(data['customerType']['id']);
                            } else {
                                showNotification("error", "Thêm thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                            }
                        }).fail(function (jqXHR, textStatus, errorThrown) {
                            showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                        });
                    } else {
                        $("form#frmCustomerType").find("label[class=error]").css("color", "red");
                    }
                }
            };
            customerView.loadData();
        }
        else {
            customerView.loadData();
        }
    });
</script>
