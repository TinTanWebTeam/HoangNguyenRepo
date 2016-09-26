<style>
    #frmControl {
        z-index: 3;
        position: fixed;
        top: 30%;
        display: none;
        right: 0px;
        width: 40%;
        height: 100%;
    }

    div.col-lg-12 {
        height: 40px;
    }
</style>

<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent"></div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" name="modalClose"
                        onclick="fuelCostView.cancelDelete()">Hủy
                </button>
                <button type="button" class="btn green" name="modalAgree"
                        onclick="fuelCostView.deleteFuelCost()">Ðồng ý
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal--}}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL chi phí</a></li>
                        <li class="active">Nhiên liệu</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="fuelCostView.addNewFuelCost()">
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
                            <th>Mã vùng</th>
                            <th>Số xe</th>
                            <th>Thời gian đổ</th>
                            <th>Ghi chú</th>
                            <th>Số lít</th>
                            <th>Đơn giá</th>
                            <th>Tổng chi phí</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end table-reposive -->
    </div> <!-- end .col-md-12-->
</div> <!-- end .row -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chi phí nhiên liệu
            <div class="menu-toggles pull-right" onclick="fuelCostView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>
        <div class="panel-body">
            <form role="form" id="formUser">
                <div class="form-body">
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input ">
                                    <label for="areaCode"><b>Số xe</b></label>
                                    <select name="areaCode" id="areaCode" class="form-control"
                                            onchange="fuelCostView.select()">
                                        <option value="">-- Mã vùng --</option>
                                        @foreach($vehicles as $item)
                                            {
                                            <option value="{{$item->id}}">{{$item->areaCode}}</option>
                                            }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input ">
                                    <label for="vehicleNumber"><b>Số xe</b></label>
                                    <select name="vehicleNumber" id="vehicleNumber" class="form-control">
                                        <option value="">-- Chọn xe --</option>
                                        @foreach($vehicles as $item)
                                            {
                                            <option value="{{$item->vehicleNumber}}">{{$item->vehicleNumber}}</option>
                                            }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-md-line-input ">
                                    <label for="TotalPrice"><b>Thời gian đổ dầu</b></label>
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
                            <div class="col-md-6">
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
                            <div class="col-md-6 ">
                                <div class="form-group form-md-line-input ">
                                    <label for="Transport"><b>Loại phí</b></label>
                                    <select name="costprice_id" id="costprice_id" class="form-control">
                                        <option value="">-- Chọn loại --</option>
                                        @foreach($costPrices as $item)
                                            {
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            }
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="TotalPrice"><b>Tổng chi phí</b></label>
                                    <input type="text" class="form-control"
                                           id="TotalPrice"
                                           name="TotalPrice"
                                           placeholder="Tổng chi phí">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input ">
                                    <label for="note"><b>Ghi chú</b></label>
                                    <input type="text" class="form-control"
                                           id="note"
                                           name="note"
                                           placeholder="Ghi chú">
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
        if (typeof (fuelCostView) === 'undefined') {
            fuelCostView = {
                table: null,
                data: null,
                action: null,
                idDelete: null,
                current: null,
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
                    $.post(url + 'fuel-cost', {_token: _token, formDate: null, toDate: null}, function (list) {
                        fuelCostView.data = list;
                        fuelCostView.fillDataToDatatable(list);
                    });
                },
                cancel: function () {
                    if (fuelCostView.action == 'add') {
                        fuelCostView.clearInput();
                    } else {
                        fuelCostView.fillCurrentObjectToForm();
                    }
                },
                clearInput: function () {
                    if (fuelCostView.current)
                        for (var propertyName in fuelCostView.current) {
                            $("input[id=" + propertyName + "]").val('');
                        }
                },
                editFuelCost: function (id) {
                    fuelCostView.current = _.clone(_.find(fuelCostView.data, function (o) {
                        return o.id == id;
                    }), true);
                    fuelCostView.action = "update";
                    fuelCostView.fillCurrentObjectToForm();
                    fuelCostView.show();
                },

                msgDelete: function (id) {
                    if (id) {
                        fuelCostView.idDelete = id;
                        $("div#modalConfirm").modal("show");
                        $("div#modalContent").empty().append("Bạn có muốn xóa ?");
                        $("button[name=modalAgree]").show();
                    }
                },
                fillCurrentObjectToForm: function () {
                    for (var propertyName in fuelCostView.current) {
                        $("input[id=" + propertyName + "]").val(fuelCostView.current[propertyName]);
                    }
                    fuelCostView.show();
                },
                addNewFuelCost: function () {
                    fuelCostView.action = 'add';
                    fuelCostView.show();
                },

                fillDataToDatatable: function (data) {
                    fuelCostView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'vehicles_code'},
                            {data: 'vehicles_vehicleNumber'},
                            {data: 'created_at'},
                            {data: 'note'},
                            {data: 'literNumber'},
                            {data: 'prices_price'},
                            {data: 'cost'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="fuelCostView.editfuelcost(' + full.id + ')">';
                                    tr += '<i class="glyphicon glyphicon-pencil"></i>';
                                    tr += '</div>';
                                    tr += '</div>';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-danger btn-circle" onclick="fuelCostView.msgDelete(' + full.id + ')">';
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
            fuelCostView.loadData();
        } else {
            fuelCostView.loadData();
        }
    });


</script>