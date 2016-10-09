<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>

    <!-- Custom Bootstrap Core CSS -->
    <link href=" {{ URL::to('libs/bootstrap/dist/css/bootstrap.material.min.css') }} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=" {{ URL::to('libs/metisMenu/dist/metisMenu.min.css')  }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href=" {{ URL::to('src/css/sb-admin-2.css') }} " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=" {{ URL::to('libs/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ URL::to('src/css/custom-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('src/css/components-md.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
@include('flash::message')
<div class="container">
    <div class="mainbox col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" id="loginbox" style="margin-top:50px;">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="panel-title">
                    Thông tin đăng nhập
                </div>
            </div>
            <div class="panel-body" style="padding-top:30px">
                <div class="alert alert-danger col-sm-12" id="login-alert" style="display:none">
                </div>
                <form  class="login-form" action="{{ asset('auth/login') }}" class="form-horizontal" method="post" role="form">
                    {{ csrf_field() }}
                    @if(Session::has('flash_message'))
                    <div class="alert alert-danger fade in">
                        <span>{{Session::get('flash_message')}} </span>
                    </div>
                    @endif
                    <div class="input-group" style="margin-bottom: 25px">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user" style="font-size:1.5em">
                            </i>
                        </span>
                        <input class="form-control" id="login-username" name="username" placeholder="Tên tài khoản" type="text" value="">
                        </input>
                    </div>
                    <div class="input-group" style="margin-bottom: 25px">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock" style="font-size:1.5em">
                            </i>
                        </span>
                        <input class="form-control" id="login-password" name="password" placeholder="Mật khẩu" type="password">
                        </input>
                    </div>
                    <div class="form-group" style="margin-top:10px">
                        <!-- Button -->
                        <div class="col-sm-12 controls text-center">
                            <button class="btn btn-success " type="submit">
                                Đăng nhập
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{ URL::to('libs/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>

<script>
    (function(){
        $('div.alert').delay(3000).slideUp(350);
    })();
</script>

</body>
</html>