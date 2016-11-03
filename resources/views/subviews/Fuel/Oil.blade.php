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
        height: 300px;
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
                        <div class="btn btn-primary btn-circle btn-md" title="Thêm mới" onclick="oilPriceView.showFormForAddNew()">
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
                                <th>Ngày áp dụng</th>
                                <th>Giá dầu</th>
                                <th>Người tạo</th>
                                <th>Người sửa</th>
                                <th>Ghi chú</th>
                                <th>Loại</th>
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
                <form role="form" id="formFuelCost" data-parsley-validate="" onsubmit="return false;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="applyDate"><b>Ngày áp dụng</b></label>
                                            <input type="text" id="applyDate" name="applyDate" class="date form-control ignore">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="oilPrice"><b>Giá</b></label>
                                            <input type="text" id="oilPrice" name="oilPrice" class="form-control currency">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="note"><b>Ghi chú</b></label>
                                            <textarea id="note" name="note" rows="4" class="form-control" style="resize: none"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-success pull-right" onclick="oilPriceView.save()">Lưu</button>
                                <button class="btn btn-danger pull-right" onclick="oilPriceView.hideFormControl()" style="margin-right: 10px">Hủy</button>
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
                oilObjectId : null,
                showFormControl: function(){
                    $(".menu-toggle").fadeOut();
                    $("#divControl").fadeIn(300);
                },
                hideFormControl: function(){
                    oilObjectId = null;
                    oilPriceView.resetForm();
                    $(".menu-toggle").fadeIn();
                    $("#divControl").fadeOut(300);
                },
                showFormForAddNew: function(){
                    oilObjectId = null;
                    oilPriceView.resetForm();
                    $("#form_mode").text("Thêm giá dầu");
                    oilPriceView.showFormControl();
                },
                showFormForEdit: function(id){
                    oilObjectId = id;
                    oilPriceView.resetForm();
                    $("#form_mode").text("Chỉnh sửa giá dầu");
                    oilPriceView.fillForm();
                },
                resetForm: function(){

                },
                fillForm: function(oilObject){

                },
                save: function(){

                },
                renderDateTimePicker: function(){
                    $("#applyDate").datepicker({
                        "format": "dd-mm-yyyy",
                        "autoclose": true
                    });
                    $("#applyDate").datepicker("setDate", new Date());
                },
                loadDateWhenViewRendComplete: function(){
                    setEventFormatCurrency(".currency");
                    formatCurrency(".currency");
                    oilPriceView.renderDateTimePicker();
                }
            };
            oilPriceView.loadDateWhenViewRendComplete();
        } else {
            oilPriceView.loadDateWhenViewRendComplete();
        }
    });
</script>