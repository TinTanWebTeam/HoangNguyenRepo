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
                        <div class="btn btn-primary btn-circle btn-md" onclick="show()">
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
                        <tbody id="tbodyPositionList">
                        @if($positions)
                            @foreach($positions as $item)
                                <tr id="{{$item->id}}" onclick="positionView.viewListPosition(this)"
                                    style="cursor: pointer">
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td style="width: 80px">
                                        <div class=" btn-del-edit">
                                            <div class="btn btn-success btn-circle" onclick="show()">
                                                <i class="glyphicon glyphicon-pencil icon-center"></i>
                                            </div>
                                        </div>
                                        <div class="btn-del-edit">
                                            <div class="btn btn-danger btn-circle">
                                                <i class="glyphicon glyphicon-remove icon-center"></i>
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
        </div>
    </div>
</div>
<!-- end View list -->


<!-- Start #frmControl -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chức vụ
            <div class="menu-toggles pull-right" onclick="hide()">
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
                                    <label for="Code"><b>Mã</b></label>
                                    <input type="text" class="form-control"
                                           id="Code"
                                           name="Code"
                                           placeholder="Mã chức vụ"
                                           autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input ">
                                    <label for="Position"><b>Chức vụ</b></label>
                                    <input type="text" class="form-control"
                                           id="Position"
                                           name="Position"
                                           placeholder="Chức vụ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-md-line-input ">
                                    <label for="Description"><b>Mô ta</b></label>
                                    <input type="text" class="form-control"
                                           id="Description"
                                           name="Description"
                                           placeholder="Mô tả">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-actions noborder">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary"
                                        onclick="positionView.addNewAndUpdatePosition()">
                                    Hoàn tất
                                </button>
                                <button type="button" class="btn default" onclick="positionView.Cancel()">Huỷ</button>
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
        if (typeof (positionView) === 'undefined') {
            positionView = {
                table: null,
                goBack: null,
                idPositionView: null,
                PositionViewObject: {
                    Id: null,
                    Code: null,
                    Position: null,
                    Description: null
                },
                resetPositionObject: function () {
                    for (var propertyName in positionView.PositionViewObject) {
                        if (positionView.PositionViewObject.hasOwnProperty(propertyName)) {
                            positionView.PositionViewObject.propertyName = null;
                        }
                    }
                },
                Cancel: function () {
                    positionView.resetForm();
                },
                resetForm: function () {
                    if ($("input[name=Id]").val() === "") {
                        var allinput = $("input");
                        $("div[class=form-body]").find(allinput).val("");
                    } else {
                        positionView.viewListPosition(positionView.goBack);
                    }
                },
                viewListPosition: function (element) {
                    positionView.goBack = element;
                    positionView.idPositionView = $(element).attr("id");
                    $("tbody#tbodyPositionList").find("tr").removeClass("active");
                    $(element).addClass("active");
                },
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
                    positionView.table = $('#table-data').DataTable({
                        language: languageOptions
                    });
                }
            };
        } else {
            positionView.loadData();
        }
    });
</script>

