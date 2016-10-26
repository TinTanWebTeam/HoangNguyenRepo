<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header" style="background-color: #F5F5F5">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:;">
            <img src="{{ URL::to('Logo.png') }}" style="display:inline-block"/>&nbsp;&nbsp;&nbsp;<span
                    style="color:red; text-transform: uppercase;font-style: italic;">Hoàng Nguyễn</span>
        </a>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>&nbsp;&nbsp;{{ Auth::user()->username }}&nbsp;&nbsp;&nbsp;&nbsp;<i
                            class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i>Thông tin tài khoản</a>
                    </li>
                    <li class="divider"></li>
                    {{--<li><a href="#" onclick="resetPassword.reset()"><i class=" fa fa-refresh fa-fw"></i>Đổi mật khẩu</a>--}}
                    {{--</li>--}}
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    </div>
    <!-- /.navbar-header -->
    <div class="navbar-default sidebar" role="navigation" style="background-color: #F5F5F5">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                @foreach($filtered as $key => $value)

                    @if(count($value) == 0)
                        @if($key != 'Admin')
                            <li>
                                <a href="javascript:;" role-name="{{$key}}" data-url="{{ $array_url[$key] }}"
                                   onclick="getContentByUrl(this)">
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <img src="{{ URL::to('/src/images/navbar/' . $array_icon[$key]) }}" alt="" width="22" height="22">
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            {{ \App\Role::where('name', $key)->pluck('description')[0] }}
                                        </div>
                                    </div>

                                </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#" role-name="{{$key}}" data-url="{{ $array_url[$key] }}">
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                        <img src="{{ URL::to('/src/images/navbar/' . $array_icon[$key]) }}" alt="" width="22" height="22">
                                    </div>
                                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                        {{ \App\Role::where('name', $key)->pluck('description')[0]}}
                                        <span class="fa arrow"></span>
                                    </div>
                                </div>

                            </a>
                            <ul class="nav nav-second-level">
                                @foreach($value as $key2 => $value2)
                                    <li>
                                        <a href="javascript:;" role-name="{{ $value2 }}"
                                           data-url="{{ $array_url[$value2] }}"
                                           onclick="getContentByUrl(this)"><i>{{ \App\Role::where('name', $value2)->pluck('description')[0] }}</i></a>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>