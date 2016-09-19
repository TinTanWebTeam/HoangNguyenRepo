<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 28%;
        display: none;
        right: 0px;
        width: 40%;
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
                        <li><a href="javascript:;">QL chi phí</a></li>
                        <li class="active">Đậu Bãi</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="parkingCostView.show()">
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
                            <th>Ngày đậu bãi</th>
                            <th>Giờ vào</th>
                            <th>Giờ ra</th>
                            <th>Số giờ đậu</th>
                            <th>Đơn giá</th>
                            <th>Tổng chi phí</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if($parkingCosts)--}}
                        {{--@foreach($parkingCosts as $parking)--}}
                        {{--<tr>--}}
                        {{--<td>{{ $parking->vehicles_vehicleNumber }}</td>--}}
                        {{--<td>{{ $parking->note }}</td>--}}
                        {{--<td>{{ $parking->created_at }}</td>--}}
                        {{--<td>aaaa</td>--}}
                        {{--<td>aaaa</td>--}}
                        {{--<td>aaaa</td>--}}
                        {{--<td>{{ $parking->prices_price }}</td>--}}
                        {{--<td>{{ $parking->cost }}</td>--}}
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
        <div class="panel-heading">Thêm mới chi phí đậu bãi
            <div class="menu-toggles pull-right" onclick="parkingCostView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>

        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input ">
                                    <label for="NumberVehicle"><b>Số xe</b></label>
                                    <input type="text" class="form-control"
                                           id="NumberVehicle"
                                           name="NumberVehicle"
                                           placeholder="Số xe"
                                           autofocus>
                                </div>
                            </div>

                        </div>
                        <div class="row ">
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Date"><b>Ngày đậu bãi</b></label>
                                    <input type="date" class="form-control"
                                           id="Date"
                                           name="Date"
                                           value="{{date("")}}">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input">
                                    <label for="TimeIn"><b>Giờ vào</b></label>
                                    <input type="Time" class="form-control"
                                           id="TimeIn"
                                           name="TimeIn">
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group form-md-line-input">
                                    <label for="TimeOut"><b>Giờ ra</b></label>
                                    <input type="time" class="form-control"
                                           id="TimeOut"
                                           name="TimeOut">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-6 ">
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
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Price"><b>Đơn giá</b></label>
                                    <input type="text" class="form-control"
                                           id="Price"
                                           name="Price"
                                           placeholder="00.00">
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="TotalPrice"><b>Tổng chi phí</b></label>
                                    <input type="text" class="form-control"
                                           id="TotalPrice"
                                           name="TotalPrice"
                                           placeholder="00.00">
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
        if (typeof (parkingCostView) === 'undefined') {
            parkingCostView = {
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
                    $.post(url + 'parking-cost', {_token: _token, formDate: null, toDate: null}, function (list) {
                        parkingCostView.data = list;
                        parkingCostView.fillDataToDatatable(list);
                    })
                },
                fillDataToDatatable: function (data) {
                    parkingCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'vehicles_vehicleNumber'},
                            {data: 'note'},
                            {data: 'created_at'},
                            { render: function () {
                                return "13:00";
                            }},
                            { render: function () {
                                return "15:00";
                            }},
                            { render: function () {
                                return "2:00";
                            }},
                            {data: 'prices_price'},
                            {data: 'cost'},
                            {
                                render: function () {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle">';
                                    tr += '<i class="glyphicon glyphicon-remove"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    return tr;
                                }
                            }

                        ]
                    })
                }
            };
            parkingCostView.loadData();
        } else {
            parkingCostView.loadData();
        }
    })();
</script>