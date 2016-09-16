<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 10%;
        display: none;
        right: 0px;
        width: 60%;
        height: 100%;
    }

    .fixed {
        top: 72px;
        position: fixed;
        right: 20px;
        z-index: 2;
    }

    .menu-toggles {
        cursor: pointer
    }

    .icon-center {
        line-height: 130%;
        padding-left: 3%;
        font-size: 13px;
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
                        <li><a href="javascript:;">QL khách hàng</a></li>
                        <li class="active">Đơn hàng</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="deliveryRequirementView.show()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper table-responsive">
                    <table class="table table-bordered table-hover" id="table-data">

                        <thead>
                        <tr class="active">
                            <th>Số xe</th>
                            <th>Tên hàng</th>
                            <th>Nơi nhận</th>
                            <th>Nơi giao</th>
                            <th>Số lượng</th>
                            <th>Khách hàng</th>
                            <th>Doanh thu</th>
                            <th>Giao xe</th>
                            <th>Chi phí khác</th>
                            <th>Nhận</th>
                            <th>Lợi nhuận</th>
                            <th>Số chứng từ</th>
                            <th>Người nhận</th>
                            <th>Ngày nhận</th>
                            <th>Trạng thái</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($orders)
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->vehicles_vehicleNumber }}</td>
                                    <td>{{ $order->products_name }}</td>
                                    <td>{{ $order->receivePlace }}</td>
                                    <td>{{ $order->deliveryPlace }}</td>
                                    <td>{{ $order->voucherQuantumProduct }}</td>
                                    <td>{{ $order->customers_fullName }}</td>
                                    <td>{{ $order->cashRevenue }}</td>
                                    <td>{{ $order->cashDelivery }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->cashReceive }}</td>
                                    <td>{{ $order->cashProfit }}</td>
                                    <td>{{ $order->voucherNumber }}</td>
                                    <td>{{ $order->receiver }}</td>
                                    <td>{{ $order->receiveDate }}</td>
                                    <td>{{ $order->status }}</td>
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
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->

<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới yêu cầu giao hàng
            <div class="menu-toggles pull-right" onclick="deliveryRequirementView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Date"><b>Mã xe</b></label>
                                    <input type="text" class="form-control"
                                           id="Date"
                                           name="Date"
                                           value={{date('')}}>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Number"><b>Mã khách hàng</b></label>
                                    <input type="number" class="form-control"
                                           id="Number"
                                           name="Number"
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="FullName"><b>Mã hàng</b></label>
                                    <input type="text" class="form-control"
                                           id="FullName"
                                           name="FullName"
                                           placeholder="Tên khách hàng"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Number"><b>Số lượng</b></label>
                                    <input type="number" class="form-control"
                                           id="Number"
                                           name="Number"
                                           placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="row ">

                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Number"><b>Trọng tải</b></label>
                                    <input type="number" class="form-control"
                                           id="Number"
                                           name="Number"
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Doanh thu</b></label>
                                    <input type="text" class="form-control"
                                           id="Transport"
                                           name="Transport"
                                           placeholder="Vị trí vận chuyển">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for="Status"><b>Giao xe</b></label>
                                    <input type="text" class="form-control"
                                           id="Status"
                                           name="Status"
                                           placeholder="Trạng thái">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Number"><b>Nhận</b></label>
                                    <input type="number" class="form-control"
                                           id="Number"
                                           name="Number"
                                           placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for="Status"><b>Người nhận</b></label>
                                    <input type="text" class="form-control"
                                           id="Status"
                                           name="Status"
                                           placeholder="Trạng thái">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Number"><b>Ngày nhận</b></label>
                                    <input type="number" class="form-control"
                                           id="Number"
                                           name="Number"
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for="Status"><b>Nơi nhận</b></label>
                                    <input type="text" class="form-control"
                                           id="Status"
                                           name="Status"
                                           placeholder="Trạng thái">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Number"><b>Nơi giao</b></label>
                                    <input type="number" class="form-control"
                                           id="Number"
                                           name="Number"
                                           placeholder="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Number"><b>Số chứng từ</b></label>
                                    <input type="number" class="form-control"
                                           id="Number"
                                           name="Number"
                                           placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Số hàng trên chứng từ</b></label>
                                    <input type="text" class="form-control"
                                           id="Transport"
                                           name="Transport"
                                           placeholder="Vị trí vận chuyển">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-md-line-input">
                                    <label for="Status"><b>Ghi chú</b></label>
                                    <input type="text" class="form-control"
                                           id="Status"
                                           name="Status"
                                           placeholder="Trạng thái">
                                </div>
                            </div>
                            <div class="col-md-3 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Trạng thái</b></label>
                                    <input type="text" class="form-control"
                                           id="Transport"
                                           name="Transport"
                                           placeholder="Vị trí vận chuyển">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Số chứng từ nhận</b></label>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <select name="" id="" class="form-control">
                                                <option value="">abc</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="btn btn-primary btn-sm btn-circle">
                                                <i class="glyphicon glyphicon-plus"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Chi phí</b></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Nhiên liệu</option>
                                        <option value="">Thay nhớt</option>
                                        <option value="">Đậu bãi</option>
                                        <option value="" selected>Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Số tiền</b></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Ghi chú</b></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-actions noborder">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="">
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
</div> <!-- end #frmControl -->


<script>
    $(function () {
        if (typeof (deliveryRequirementView) === 'undefined') {
            deliveryRequirementView = {
                table: null,
                show: function () {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                },
                hide: function () {
                    $('#frmControl').slideUp('', function () {
                        $('.menu-toggle').show();
                    });
                },
                loadData: function () {
                    deliveryRequirementView.table = $('#table-data').DataTable({
                        language: languageOptions
                    })
                }
            };
            deliveryRequirementView.loadData();
        } else {
            deliveryRequirementView.loadData();
        }
    })();
</script>
