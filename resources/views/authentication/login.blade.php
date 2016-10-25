<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>

    <!-- Toastr -->
    <link rel="stylesheet" href="{{ URL::to('libs/toastr/toastr.min.css') }}">
    <!--My Custom-->
    <link rel="stylesheet" href="{{ URL::to('src/css/login.css') }}">
</head>
<body>
<div class="wrapper">
    <!-----start-main---->
    <div class="main">
        <div class="login-form">
            <h1>Thông tin đăng nhập</h1>
            <div class="head">
                <img src="{{ URL::to('src/images/login/user.png') }}" alt=""/>
            </div>
            <div style="padding: 40px">
                <input type="text" id="username" name="username" placeholder="Tên tài khoản" autofocus>
                <input type="password" id="password" name="password" placeholder="Mật khẩu">

                <div class="submit">
                    <input type="submit" id="btnLogin" value="Đăng nhập" onclick="loginView.save()">
                </div>
            </div>
        </div>
        <!--//End-login-form-->
    </div>
    <!-----//end-main---->
</div>

<!-- JQuery -->
<script src="{{ URL::to('libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ URL::to('libs/toastr/toastr.min.js') }}"></script>
<!-- Global -->
<script src=" {{ URL::to('src/js/global.js') }} "></script>


<script>
    $(function () {
        var _url = '{{ URL::to('/') }}/';
        var _token = '{{ csrf_token() }}';
        if (typeof loginView === 'undefined') {
            loginView = {
                current: null,
                loadData: function(){
                    loginView.renderEventKeyCode();
                },
                renderEventKeyCode: function(){
                    $("#username").keyup(function(event){
                        if(event.keyCode == 13){ //Enter
                            $("#btnLogin").click();
                        }
                    });

                    $("#password").keyup(function(event){
                        if(event.keyCode == 13){ //Enter
                            $("#btnLogin").click();
                        }
                    });
                },
                fillFormDataToCurrent: function(){
                    loginView.current = {
                        username: $("input[id=username]").val(),
                        password: $("input[id=password]").val()
                    }
                },
                save: function(){
                    loginView.fillFormDataToCurrent();
                    var sendToServer = {
                        _token: _token,
                        _login: loginView.current
                    };

                    $.ajax({
                        url: _url + 'auth/login',
                        type: "POST",
                        dataType: "json",
                        data: sendToServer
                    }).done(function (data, textStatus, jqXHR) {
                        console.log("SERVER");
                        console.log(data);
                        if (jqXHR.status == 202) {
                            showNotification("success", data['msg']);
//                            window.location = 'http://google.com';
                            window.location.replace(_url);
                        } else if (jqXHR.status == 203) {
                            showNotification("error", data['msg']);
                        } else {
                            showNotification("error", "Tác vụ thất bại! Vui lòng làm mới trình duyệt và thử lại.");
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        showNotification("error", "Kết nối đến máy chủ thất bại. Vui lòng làm mới trình duyệt và thử lại.");
                    });
                }
            };
            loginView.loadData();
        } else {
            loginView.loadData();
        }
    });
</script>

</body>
</html>