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
        top:72px;
        position: fixed;
        right: 20px;
        z-index: 2;
    }
    .menu-toggles{
        cursor: pointer
    }
    ol.breadcrumb{border-bottom: 2px solid #e7e7e7}
    div.col-lg-12{height: 40px; }

</style>
<!-- start View list -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- .panel-heading -->
            <div class="row">
                <div class="col-lg-12" >
                    <ol class="breadcrumb">
                        <li><a href="javascript:;">Trang chủ</a></li>
                        <li><a href="javascript:;">QL người dùng</a></li>
                        <li class="active">Chức vụ</li>
                    </ol>
                    <div class="pull-right menu-toggle fixed">
                        <div class="btn btn-primary btn-circle btn-md" onclick="show()">
                            <i class="glyphicon glyphicon-plus"></i>
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
        </div>
    </div>
</div>
<!-- end View list -->







<!-- Start #frmControl -->
<div id="frmControl" class="col-md-offset-4 col-md-8">
    <div class="panel panel-primary">
        <div class="panel-heading">Thêm mới chức vụ
            <div class="menu-toggles pull-right" onclick="hide()">
                <i class="glyphicon glyphicon-remove" ></i>
            </div>
        </div>
        <div class="panel-body">
            <form role="form" id="formPosition">
                <div class="form-body">
                    <div class="form-group form-md-line-input" style="display:none">
                        <input type="text" class="form-control" name="Id" id="Id">
                    </div>
                    <div class="col-md-12 ">
                        <div class="row " >
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input " >
                                    <label for="Code"><b>Mã</b></label>
                                    <input type="text" class="form-control"
                                           id="Code"
                                           name="Code"
                                           placeholder="Mã chức vụ"
                                           autofocus >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-md-line-input " >
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
                                <div class="form-group form-md-line-input " >
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
</div> <!-- end #frmControl -->

<script>
    $(function () {
        if (typeof (positionView) === 'undefined') {
            positionView = {
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
//                addNewPosition: function () {
//                    //$("div#modalConfirm").modal("hide");
//                    $("input[name=Id]").val("");
//                    positionView.resetForm();
//                },

//                firstToUpperCase: function (str) {
//                    return str.substr(0, 1).toUpperCase() + str.substr(1);
//                },
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
                    $("tbody#tbodyPositionList").find("tr").removeClass("active blue");
                    $(element).addClass("active blue");
                    $.post(url + "/post-position", {
                        _token: _token,
                        idPosition: positionView.idPositionView
                    }, function (data) {
                        $("input[name=Id]").empty().val(positionView.idPositionView)
                        for (var propertyName in data) {
                            $("input[id=" + positionView.firstToUpperCase(propertyName) + "]").val(data[propertyName]);
                        }
                    })
                },
                fillTbody: function (data) {
                    $("tbody#tbodyPositionList").empty();
                    var row = "";
                    for (var i = 0; i < data["listPosition"].length; i++) {
                        var tr = "";
                        tr += "<tr id=" + data["listPosition"][i]["id"] + " onclick='positionView.viewListPosition(this)' style='cursor: pointer'>";
                        tr += "<td>" + data["listPosition"][i]["name"] + "</td>";
                        tr += "<td>" + data["listPosition"][i]["description"] + "</td>";
                        row += tr;
                    }
                    $("tbody#tbodyPositionList").append(row);
                    positionView.idPositionView = null;
                    positionView.addNewPosition();
                },
                addNewAndUpdatePosition: function () {
                    positionView.resetPositionObject();
                    for (var i = 0; i < Object.keys(positionView.PositionViewObject).length; i++) {
                        positionView.PositionViewObject[Object.keys(positionView.PositionViewObject)[i]] = $("#" + Object.keys(positionView.PositionViewObject)[i]).val();
                    }
                    $("#formPosition").validate({
                        rules: {
                            Name: 'required'
                        },
                        messages: {
                            Name: "Tên chức vụ không được rỗng",
                        }
                    });
                    if ($("#formPosition").valid()) {
                        $.post(url + "admin/addNewAndUpdatePosition", {
                            _token: _token,
                            addNewOrUpdateId: $("input[name=Id]").val(),
                            dataPosition: positionView.PositionViewObject
                        }, function (data) {
                            if (data[0] === 1) {
                                $("div#modalConfirm").modal("show");
                                $("div#modalContent").empty().append("Thêm mới thành công");
                                $("button[name=modalAgree]").hide();
                                positionView.fillTbody(data);
                            } else if (data[0] === 2) {
                                $("div#modalConfirm").modal("show");
                                $("div#modalContent").empty().append("Chỉnh sửa thành công");
                                $("button[name=modalAgree]").hide();
                                positionView.fillTbody(data);
                            } else if (data[0] === 0) {
                                $("div#modalConfirm").modal("show");
                                $("div#modalContent").empty().append("Chỉnh sửa KHÔNG thành công");
                                $("button[name=modalAgree]").hide();
                            }
                            else {
                                $("div#modalConfirm").modal("show");
                                $("div#modalContent").empty().append("Thêm mới KHÔNG thành công");
                                $("button[name=modalAgree]").hide();
                            }
                        })
                    }else{
                        $("form#formPosition").find("label[class=error]").css("color","red");
                    }
                }
            }
        }
    })



    function show() {
        $('.menu-toggle').hide();
        $('#frmControl').slideDown();
    }
    function hide() {
        $('#frmControl').slideUp('', function(){
            $('.menu-toggle').show();
        });
    }
    $('#table-data').DataTable({
        language: languageOptions
    });
</script>

