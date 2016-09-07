<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Hoàng Nguyên</a>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->
    </div>
    <!-- /.navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                @foreach($filtered as $key => $value)

                    @if(count($value) == 0)
                        @if($key != 'Admin')
                            <li>
                                <a href="javascript:;" role-name="{{$key}}" data-url="{{ $array_url[$key] }}" onclick="getContentByUrl(this)">
                                    <i class="fa {{ $array_icon[$key] }}"></i> {{ \App\Role::where('name', $key)->pluck('description')[0] }}
                                </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#" role-name="{{$key}}" data-url="{{ $array_url[$key] }}"><i class="
                               fa {{ $array_icon[$key] }}
                                        "></i> {{ \App\Role::where('name', $key)->pluck('description')[0]}}
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                @foreach($value as $key2 => $value2)
                                    <li>
                                        <a href="javascript:;" role-name="{{ $value2 }}" data-url="{{ $array_url[$value2] }}" onclick="getContentByUrl(this)"> {{ \App\Role::where('name', $value2)->pluck('description')[0] }}</a>
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
