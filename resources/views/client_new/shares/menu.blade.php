<nav class="navbar navbar-expand-lg navbar-sticky navbar-dark">
    <div class="container">

        <!-- Logo -->

        <a class="navbar-brand mr-1" href="index.html">
            <img src="/assets_client_new/assets/svg/reveal-logo.svg" alt="">
        </a>

        <!-- Collapse -->

        <div class="collapse navbar-collapse navbar-collapse-sidebar" id="mainNavbar">

            <!-- Mobile search -->

            <div class="d-block d-lg-none">
                <div class="p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <img src="/assets_client_new/assets/svg/reveal-symbol.svg" alt="">
                        <button class="btn p-0" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon icon-cross font-size-lg"></span>
                        </button>
                    </div>
                </div>
                <div class="bg-light">
                    <div class="form-group form-group-icon">
                        <input type="text" class="form-control form-control-simple" placeholder="Search site">
                        <button class="btn btn-clean"><i class="icon icon-magnifier"></i></button>
                    </div>
                </div>
            </div>

            <!-- Navbar links -->

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <!-- Single dropdown -->
                @foreach ($danhMuc as $key => $value)
                    @if ($value->id_danh_muc_cha == 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/category/{{$value->id}}" id="pages" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $value->ten_danh_muc }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="pages">
                                @foreach ($danhMuc as $k => $v)
                                    @if($value->id == $v->id_danh_muc_cha)
                                        <a class="dropdown-item" href="/category/{{$v->id}}">
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <div class="px-1">
                                                        <i class="icon icon-cart"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="px-2">
                                                        <p>{{ $v->ten_danh_muc }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <!-- Navbar toggler -->
        @if(Auth::guard('customer')->check())
            <div class="d-flex align-items-center">
                <a href="/client/bill-order" class="btn btn-sm btn-primary btn-rounded ml-lg-4 px-3">
                    <b>{{ Auth::guard('customer')->user()->full_name }}</b>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <a class="btn btn-sm btn-info btn-rounded ml-lg-4 px-3" href="/client/cart">
                    <i class="icon icon-cart"></i> Cart
                </a>
            </div>
            <div class="d-flex align-items-center">
                <a class="btn btn-sm btn-danger btn-rounded ml-lg-4 px-3" href="/logout">
                    <i class="icon icon-exit"></i> Logout
                </a>
            </div>
        @else
            <div class="d-flex align-items-center">
                <a class="btn btn-sm btn-primary btn-rounded ml-lg-4 px-3 toggle-show" href="#" data-show="loginComponent">
                    <i class="icon icon-user"></i> Login
                </a>
            </div>
        @endif


    </div>
</nav>

<!-- Breadcrumbs -->

<header class="header header-main bg-dark">
    <div class="pb-2 py-lg-3">
        <div class="container text-light">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="mb-0 h4">@yield('main_title')</h2>
                    <small class="pre-label d-none d-lg-block">@yield('sub_title')</small>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- SVG Divider -->

<section class="divider bg-dark">
    <svg class="svg svg-light" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1920" height="100" viewBox="0 0 1920 100" preserveAspectRatio="none meet">
        <path d="M0,11S168.915,69.242,406.27,70.7,685.853,57.593,850.4,37.207,1259.752,73.448,1517.323,70.7,1920,19.667,1920,19.667V101H0Z" transform="translate(0 -1)" />
        <path d="M1920,102.048s-89.6,137.879-398.308,19.053c-162.379-62.5-391.708,20.855-598.484,20.855-206.775,22.449-295.6-77.886-503.833-39.909C286.864,132.511,0,110.668,0,110.668v62.337H1920Z" transform="translate(0 -73.005)" fill-opacity=".2" />
        <path d="M0,102.147S407.045,189.7,555.574,121.265C717.953,58.549,760.893,69.884,840.982,85.957c188.351,79.39,348.351-56.61,532.351,70.057C1489,91.538,1920,110.8,1920,110.8v62.551H0Z" transform="translate(0 -73.347)" fill-opacity=".4" />
    </svg>
</section>
