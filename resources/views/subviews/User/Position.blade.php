<style>
    .btn-del-edit {
        float: left;
        padding-right: 5px;
    }

    #frmControl {
        z-index: 3;
        position: fixed;
        top: 50%;
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
<!-- start View list -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL người dùng</a></li>
                        <li class="active">Chức vụ</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="PositionView.show()">
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
                        <tr>
                            <th>Mã</th>
                            <th>Chức vụ</th>
                            <th>Mô tả</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyPackageList">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end View list -->


<!-- Start #frmControl -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chức vụ
            <div class="menu-toggles pull-right" onclick="PositionView.hide()">
                <i class="glyphicon glyphicon-remove"></i>
            </div>
        </div>
        <div class="panel-body">
            <form role="form" id="formPosition">
                <div class="form-body">
                    <div class="form-group form-md-line-input" style="display:none">
                        <input type="text" class="form-control" name="Id" id="Id">
                    </div>
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="code"><b>Mã</b></label>
                                    <input type="text" class="form-control"
                                           id="code"
                                           name="code"
                                           placeholder="Mã chức vụ"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="name"><b>Chức vụ</b></label>
                                    <input type="text" class="form-control"
                                           id="name"
                                           name="name"
                                           placeholder="Chức vụ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input ">
                                    <label for="description"><b>Mô ta</b></label>
                                    <input type="text" class="form-control"
                                           id="description"
                                           name="description"
                                           placeholder="Mô tả">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-actions noborder">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="PositionView.addAndUpdate()">
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
</div>
<!-- end #frmControl -->


<script>
    $(function () {
        if (typeof (PositionView) === 'undefined') {
            PositionView = {
                table: null,
                data: null,
                data2: null,
                idChange: null,
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
                    $.post(url + 'position', {_token: _token, fromDate: null, toDate: null}, function (list) {
                        PositionView.data = list;
                        PositionView.data2 = _.clone(list, true);
                        PositionView.fillDataToDatatable(list);
                    })
                },
                fillDataToDatatable: function (data) {
                    PositionView.table = $('#table-data').DataTable({
                        language: languageOptions,
                        data: data,
                        columns: [
                            {data: 'code'},
                            {data: 'name'},
                            {data: 'description'},
                            {
                                render: function (data, type, full, meta) {
                                    var tr = '';
                                    tr += '<div class="btn-del-edit">';
                                    tr += '<div class="btn btn-success  btn-circle" onclick="PositionView.loadEdit(' + full.id + ')">';
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
                },
                loadEdit: function (id) {
                    var current = _.find(PositionView.data, function (o) {
                        return o.id == id
                    });
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                    for (var propertyName in current) {
                        $("input[name=" + propertyName + "]").val(current[propertyName]);
                    }
                    PositionView.idChange = id;
                },
                addAndUpdate: function(){
                    var current = _.find(PositionView.data, function (o) {
                        return o.id == PositionView.idChange;
                    });
                    var dataSendTo = {
                        _token:_token,
                        fromDate:null,
                        toDate:null
                    };
                    for (var propertyName in current) {
                        dataSendTo[propertyName] = $("input[id=" + propertyName + "]").val();
                    }
                    $.post(url + 'create-position',dataSendTo, function(msg){
//                      console.log(msg);
                    });
//                    PositionView.table.clear().rows.add(PositionView.data).draw();
                }


            };
            PositionView.loadData();
        } else {
            PositionView.loadData();
        }
    });
</script>
