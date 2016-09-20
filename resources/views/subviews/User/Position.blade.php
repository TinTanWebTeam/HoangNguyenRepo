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
                        <div class="btn btn-primary btn-circle btn-md" onclick="PositionView.addNewPosition()">
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
                    <div class="form-group form-md-line-input" style="display:block">
                        <input type="text" class="form-control" id="id" value="">
                    </div>
                    <div class="col-md-12 ">
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="code"><b>Mã</b></label>
                                    <input type="text" class="form-control"
                                           id="code"
                                           placeholder="Mã chức vụ"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="name"><b>Chức vụ</b></label>
                                    <input type="text" class="form-control"
                                           id="name"
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
                                           placeholder="Mô tả">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-actions noborder">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="PositionView.save()">
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
                action: null,
                current: {
                    code: null,
                    name: null,
                    description: null,
                    active: null,
                    created_at: null,
                    updated_at: null
                },
                show: function () {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                },
                hide: function () {
                    $('#frmControl').slideUp('', function () {
                        $('.menu-toggle').show();
                        PositionView.clearInput();
                    });

                },
                clearInput: function () {
                    if (PositionView.current)
                        for (var propertyName in PositionView.current) {
                            $("input[id=" + propertyName + "]").val('');
                        }
                },
//                loadInput: function () {
//                    for (var propertyName in PositionView.current) {
//                        $("input[name=" + propertyName + "]").val(PositionView.current[propertyName]);
//                    }
//                },
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
//                loadEdit: function (id) {
//                    PositionView.current = _.clone(_.find(PositionView.data, function (o) {
//                        return o.id == id
//                    }), true);
//                    $('.menu-toggle').hide();
//                    $('#frmControl').slideDown();
//                    PositionView.loadInput();
//                },

                loadEdit: function (id) {
                    $('.menu-toggle').hide();
                    $('#frmControl').slideDown();
                    PositionView.current = _.clone(_.find(PositionView.data, function (o) {
                        return o.id == id;
                    }), true);
                    PositionView.action = "update";
                    PositionView.fillCurrentObjectToForm();
                },
                fillCurrentObjectToForm: function () {
                    for (var propertyName in PositionView.current) {
                        $("input[id=" + propertyName + "]").val(PositionView.current[propertyName]);
                    }
                    PositionView.show();
                },
                fillFormDataToCurrentObject: function () {
                    for (var propertyName in PositionView.current) {
                        PositionView.current[propertyName] = $("input[id=" + propertyName + "]").val();
                    }
                },
                addNewPosition: function () {
                    PositionView.action = 'add';
                    PositionView.show();
                },
                save: function () {
                    PositionView.fillFormDataToCurrentObject();
                    $.post(
                            url + 'position/modify',
                            {
                                _token: _token,
                                _action: PositionView.action,
                                _object: PositionView.current
                            }, function (data) {

                                PositionView.clearInput();

                                if (PositionView.action === 'update') {
                                    var obj = _.find(PositionView.data, function (o) {
                                        return o.id == PositionView.current.id;
                                    });
                                    var index = _.indexOf(PositionView.data, obj);
                                    PositionView.data.splice(index, 1, PositionView.current);
                                    PositionView.table.clear().rows.add(PositionView.data).draw();
                                    PositionView.hide();
                                } else if (PositionView.action === 'add') {
                                    PositionView.data.push(data['obj']);
                                    PositionView.table.clear().rows.add(PositionView.data).draw();

                                } else {

                                }

                            }
                    );
                },

//                addAndUpdate: function () {
//                    if(PositionView.current === null || PositionView.current.id === null) {
//                        PositionView.current = {
//                            code : $("input[name=code]").val(),
//                            name : $("input[name=name]").val(),
//                            description : $("input[name=description]").val()
//                        };
//                        $.post(
//                                url + "create-position",
//                                {
//                                    _token: _token,
//                                    fromDate: null,
//                                    toDate: null,
//                                    dataPosition: PositionView.current
//                                },
//                                function (data) {
//
//                                    if (data['status'] === 'OK') {
//                                        PositionView.data.push(data['obj']);
//                                        PositionView.table.clear().rows.add(PositionView.data).draw();
//                                        PositionView.clearInput();
//                                    } else {
//                                        alert('tao moi k thanh cong');
//                                    }
//                                }
//                        );
//                    }else {
//                        PositionView.current.id = $("input[name=id]").val();
//                        PositionView.current.code = $("input[name=code]").val();
//                        PositionView.current.name = $("input[name=name]").val();
//                        PositionView.current.description = $("input[name=description]").val();
//                        $.post(
//                                url + "update-position",
//                                {
//                                    _token: _token,
//                                    fromDate: null,
//                                    toDate: null,
//                                    dataPosition: PositionView.current
//                                },
//                                function (data) {
//                                    if (data['status'] === 'OK') {
//                                        var test = _.find(PositionView.data, function (o) {
//                                            return o.id == PositionView.current.id
//                                        });
//                                        var index = _.indexOf(PositionView.data, test);
//                                        PositionView.data.splice(index, 1, PositionView.current);
//                                        PositionView.table.clear().rows.add(PositionView.data).draw();
//                                        PositionView.hide();
//                                        PositionView.current.id = null;
//                                    } else {
//                                        alert(' update k thanh cong');
//                                    }
//
//                                }
//                        );
//                    }
//
//                }
            };


            PositionView.loadData();
        } else {
            PositionView.loadData();
        }
    });
</script>


