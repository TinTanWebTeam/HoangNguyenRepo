<style>
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 40%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
    }
    .btn-del-edit {
        float: left;
        padding-right: 5px;
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
                        <li><a href="javascript:;">QL chi phí</a></li>
                        <li class="active">Thay nhớt</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="petroleumCostView.show()">
                            <i class="glyphicon glyphicon-plus icon-center"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .panel-body -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered table-hover" id="table-data">
                        <thead>
                        <tr class="active">
                            <th>Số xe</th>
                            <th>Ghi chú</th>
                            <th>Thời gian thay nhớt</th>
                            <th>Số lít</th>
                            <th>Đơn giá</th>
                            <th>Tổng chi phí</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if($petroleumCosts)--}}
                            {{--@foreach($petroleumCosts as $petro)--}}
                                {{--<tr>--}}
                                    {{--<td>{{ $petro->vehicles_vehicleNumber }}</td>--}}
                                    {{--<td>{{ $petro->note }}</td>--}}
                                    {{--<td>{{ $petro->created_at }}</td>--}}
                                    {{--<td>{{ $petro->literNumber }}</td>--}}
                                    {{--<td>{{ $petro->prices_price }}</td>--}}
                                    {{--<td>{{ $petro->cost }}</td>--}}
                                    {{--<td>--}}
                                        {{--<div class="btn-del-edit">--}}
                                            {{--<div class="btn btn-success  btn-circle">--}}
                                                {{--<i class="glyphicon glyphicon-pencil"></i>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="btn-del-edit">--}}
                                            {{--<div class="btn btn-danger btn-circle">--}}
                                                {{--<i class="glyphicon glyphicon-remove"></i>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}

                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chi phí thay nhớt
            <div class="menu-toggles pull-right" onclick="petroleumCostView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="NumberVehicle"><b>Mã xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NumberVehicle"
                                           name="NumberVehicle"
                                           placeholder="Số xe"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Loại phí</b></label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Nhiên liệu</option>
                                        <option value="">Thay nhớt</option>
                                        <option value="">Đậu bãi</option>
                                        <option value="" selected>Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input">
                                    <label for="Price"><b>Đơn giá</b></label>
                                    <input type="text" class="form-control"
                                           id="Price"
                                           name="Price"
                                           placeholder="00.00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input ">
                                    <label for="TotalPrice"><b>Thời gian thay nhớt</b></label>
                                    <input type="date" class="form-control"
                                           id="TotalPrice"
                                           name="TotalPrice"
                                           placeholder="Tổng chi phí">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input">
                                    <label for="liter"><b>Số lít</b></label>
                                    <input type="text" class="form-control"
                                           id="liter"
                                           name="liter"
                                           placeholder="Số lít">
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="TotalPrice"><b>Tổng chi phí</b></label>
                                    <input type="text" class="form-control"
                                           id="TotalPrice"
                                           name="TotalPrice"
                                           placeholder="Tổng chi phí">
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
        if (typeof (petroleumCostView) === 'undefined') {
            petroleumCostView = {
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
                    $.post(url + 'petroleum-cost',{_token:token, formDate:null, toDate:null}, function(list){
                        petroleumCostView.data= list;
                        petroleumCostView.fillDataToDatatable();
                    })
                },
               
            };
            petroleumCostView.loadData();
        } else {
            petroleumCostView.loadData();
        }
    });
</script>