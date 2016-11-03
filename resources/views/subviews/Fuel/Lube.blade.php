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
                        <li><a href="javascript:;">QL Giá Nhiên Liệu</a></li>
                        <li class="active">Giá Nhớt</li>
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

<script>
    $(function () {
        if (typeof lubePriceView === 'undefined') {
            lubePriceView = {

            };
        } else {

        }
    });
</script>