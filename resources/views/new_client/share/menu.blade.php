<div class="container">
    <div class="navbar red-2 navbar-default yamm">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid"
                class="navbar-toggle two three"><span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div id="navbar-collapse-grid" class="navbar-collapse collapse">
            <ul class="nav red-2 navbar-nav">
                <li class="dropdown">
                    <a href="/" class="dropdown-toggle active">Home</a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">About</a>
                </li>
                @foreach ($danhMuc as $key => $value)
                    @if ($value->id_danh_muc_cha == 0)
                    <li class="dropdown yamm-fw">
                        <a href="/category/{{$value->id}}" class="dropdown-toggle">
                           {{ $value->ten_danh_muc }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Content container to add padding -->
                                <div class="yamm-content">
                                    <div class="row">
                                        <ul class="col-sm-12 col-md-12 list-unstyled ">
                                            @foreach ($danhMuc as $k => $v)
                                            @if($value->id == $v->id_danh_muc_cha)
                                            <li>
                                                <a href="/category/{{$v->id}}">
                                                    <i class="fa fa-angle-right"></i>
                                                    {{ $v->ten_danh_muc }}
                                                </a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                @endforeach
                <li>
                    <a href="#" class="dropdown-toggle">Contact</a>
                </li>
            </ul>
            <br />
            @if(Auth::guard('customer')->check())
            <a href="/logout" class="dropdown-toggle pull-right btn btn-red" style="margin-left: 5px">
                Logout
            </a>
            <a class="dropdown-toggle pull-right btn btn-secondary">
                Chào bạn, <b>{{ Auth::guard('customer')->user()->full_name  }}</b>
            </a>
            @endif
        </div>
    </div>
</div>
