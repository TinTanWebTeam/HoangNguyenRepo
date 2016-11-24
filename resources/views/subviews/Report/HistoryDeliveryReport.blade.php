<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    ol.breadcrumb {
        border-bottom: 2px solid #e7e7e7
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">Báo cáo</a></li>
                        <li class="active">Lịch sử giao hàng</li>
                    </ol>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Chi tiết giao hàng</strong></p>
                    <div class="row">
                        <div class="col-md-7" id="dateSearchDetailDelivery">
                            <input id="dateStart" type="text" class="date start"/> đến
                            <input id="dateEnd" type="text" class="date end"/>

                        </div>
                        <div class="col-md-5" style="padding-left: 0">
                            <button onclick="" id="btnSearchDelivery"
                                    class="btn btn-sm btn-info marginRight"><i
                                        class="fa fa-search" aria-hidden="true"></i> Tìm
                            </button>
                            <button class="btn btn-sm btn-default" onclick="">
                                <i class="fa fa-trash-o" aria-hidden="true"></i> Xóa
                            </button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-data">
                                    <thead>
                                    <tr class="active">
                                        <th>Khách hàng</th>
                                        <th>Số chuyến</th>
                                        <th>Doanh thu</th>
                                        <th>Đã thanh toán</th>
                                        <th>Còn nợ</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Các chuyến theo tháng</strong></p>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group form-md-line-input">
                                <label for="optionYear"><b>Chọn năm</b></label>
                                <select class="form-control" id="optionYear"
                                        name="optionYear"
                                        onchange="">
                                </select>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-hover" id="table-data-year">
                                        <thead>
                                        <tr class="active">
                                            <th>Tháng</th>
                                            <th>Số chuyến</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6 ">
                                    <div id="container"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<script>
    $(function () {
        if (typeof (historyDeliveryReportView) === 'undefined') {

        } else {

        }
    });
</script>