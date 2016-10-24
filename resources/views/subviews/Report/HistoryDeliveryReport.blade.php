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
                    <table class="table table-bordered table-hover" id="table-data">
                        <thead>
                        <tr class="active">
                            <th>a</th>
                            <th>a</th>
                            <th>a</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>aaaa</td>
                            <td>aaaa</td>
                            <td>aaaa</td>
                            <td>
                                <div class="btn-del-edit">
                                    <div class="btn btn-success  btn-circle">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </div>
                                </div>
                                <div class="btn-del-edit">
                                    <div class="btn btn-danger btn-circle">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<script>
    $(function () {
        if (typeof (historyDeliveryReportView) === 'undefined') {
            historyDeliveryReportView = {
                table: null,
                loadData: function () {
                    historyDeliveryReportView.table = $('#table-data').DataTable({
                        language: languageOptions
                    })
                }
            };
            historyDeliveryReportView.loadData();
        } else {
            historyDeliveryReportView.loadData();
        }
    });
</script>