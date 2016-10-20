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


<!-- Begin Table Detail Report -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">Báo cáo</a></li>
                        <li class="active">Doanh thu</li>
                    </ol>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <p class="lead text-primary text-left"><strong>Chi tiết doanh Thu</strong></p>
                    <div class="row">
                        <div class="col-md-6" id="dateSearchRevenueReport">
                            <input type="text" class="date start"/> đến
                            <input type="text" class="date end"/>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-data">
                                    <thead>
                                    <tr class="active">
                                        <th>Ngày</th>
                                        <th>Khách hàng</th>
                                        <th>Doanh thu</th>
                                        <th>Lợi nhuận</th>
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
                    <p class="lead text-primary text-left"><strong>Doanh thu theo tháng</strong></p>
                    <div class="row">
                        <div class="col-md-2" id="dateSearch">
                            <select class="form-control">
                                <option>2016</option>
                                <option>2017</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="table-data-year">
                                    <thead>
                                    <tr class="active">
                                        <th>Tháng</th>
                                        <th>Doanh thu</th>
                                        <th>Lợi nhuận</th>
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
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div>


<!-- End Table Detail Report -->


<script>
    $(function () {
        if (typeof (revenueReportView) === 'undefined') {
            revenueReportView = {
                table: null,
                tableYear: null,
                loadData: function () {
                    revenueReportView.table = $('#table-data').DataTable({
                        language: languageOptions
                    });
                    revenueReportView.tableYear = $('#table-data-year').DataTable({
                        language: languageOptions
                    })
                }
            };
            revenueReportView.loadData();
        } else {
            revenueReportView.loadData();
        }
    });
</script>