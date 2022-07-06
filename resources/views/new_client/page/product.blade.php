<!doctype html>
<html lang="en">

<head>
    @include('new_client.share.head')

</head>

<body>
    <div class="site_wrapper">

        @include('new_client.share.top')
        <div class="clearfix"></div>

        @include('new_client.share.menu')
        <div class="clearfix"></div>

        <section>
            <div class="header-inner two">
                <div class="inner text-center">
                    <h4 class="title text-white uppercase roboto-slab">Product</h4>
                    <h5 class="text-white uppercase">Collections</h5>
                </div>
                <div class="overlay bg-opacity-5"></div>
                <img src="/assets_new_client/images/sliders/slide1.png" class="img-responsive" />
            </div>
        </section>
        <!-- end header inner -->
        <div class="clearfix"></div>

        <section>
            <div class="pagenation-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{$danhMucCha->ten_danh_muc}}</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="pagenation_links"><a href="index.html">Home</a><i>/</i> Shop With Sidebar
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end section-->
        <div class="clearfix"></div>

        <section class="sec-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        @foreach ($listSanPham as $value)
                            <div class="col-md-4">
                                <div class="shop-product-holder"> <a href="/product/{{$value->id}}">
                                        <div class="image-holder">
                                            <div class="hoverbox"><i class="fa fa-link"></i></div>
                                            <img src="{{$value->hinh_anh}}" alt="" class="img-responsive" />
                                        </div>
                                    </a> </div>
                                <div class="clearfix"></div>
                                <br/>
                                <h5 class="less-mar1 roboto-slab"><a href="/product/{{$value->id}}">{{ strlen($value->ten_san_pham) < 24 ? $value->ten_san_pham : Str::substr($value->ten_san_pham, 0, 24) . '...' }}</a></h5>
                                <p>{{ strlen($value->mo_ta_ngan) < 30 ? $value->mo_ta_ngan : Str::substr($value->mo_ta_ngan, 0, 30) . '...' }}</p>
                                <h5 class="text-red-4">{{ number_format($value->don_gia_khuyen_mai, 0) }} đ</h5>
                                <p><del>{{ number_format($value->don_gia_ban, 0) }} đ</del></p>
                                <br/>
                                <a class="btn btn-red-4 btn-small" href="#">Add to cart</a>
                                <br />
                                <br />
                                <br />
                            </div>
                            @endforeach
                        </div>
                    <!--end left-->

                    <div class="col-md-3">
                        <div class="col-md-12 nopadding">
                            <div class="blog1-sidebar-box">
                                <h6 class="uppercase roboto-slab">Search</h6>
                                <div class="clearfix"></div>
                                <input class="blog1-sidebar-serch_input" type="search" placeholder="Email Address">
                                <input name="" value="Submit" class="blog1-sidebar-serch-submit" type="submit">
                            </div>
                        </div>
                        <!--end sidebar box-->

                        <div class="col-md-12 nopadding">
                            <div class="blog1-sidebar-box">
                                <h6 class="uppercase roboto-slab">Categories</h6>
                                <div class="clearfix"></div>
                                <ul class="category-links red-4">
                                    @foreach ($danhMuc as $value)
                                    @foreach ($danhMuc as $k => $v)
                                            @if($value->id == $v->id_danh_muc_cha)
                                                <li><a href="/category/{{$v->id}}">{{$v->ten_danh_muc}}</a></li>
                                            @endif
                                            @endforeach

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--end sidebar box-->

                        <div class="col-md-12 nopadding">
                            <div class="blog1-sidebar-box">
                                <h6 class="uppercase roboto-slab">Featured Products</h6>
                                <div class="clearfix"></div>
                               @for($i = 0; $i < 4; $i++)
                                <div class="blog1-sidebar-posts red-4">
                                    <div class="image-left"><img src="{{$listSanPham[$i]->hinh_anh}}" style="height: 80px" alt="" /></div>
                                    <div class="text-box-right">
                                        <h6 class="less-mar3 nopadding roboto-slab"><a href="/product/{{$listSanPham[$i]->slug_san_pham}}-post{{$listSanPham[$i]->id}}">{{$listSanPham[$i]->ten_san_pham}}</a></h6>
                                        <p>{{ number_format($listSanPham[$i]->don_gia_khuyen_mai, 0) }} đ</p>
                                           <p><del>{{ number_format($listSanPham[$i]->don_gia_ban, 0) }} đ</del></p>
                                        <div class="post-info">
                                            <span>
                                                <i class="fa fa-star"></i></span><span>
                                                <i class="fa fa-star"></i></span><span>
                                                <i class="fa fa-star"></i></span><span>
                                                <i class="fa fa-star"></i></span><span>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                                <!--end item-->
                            </div>
                        </div>
                        <!--end sidebar box-->

                        <div class="col-md-12 nopadding">
                            <div class="blog1-sidebar-box">
                                <h5 class="uppercase dosis">Tags</h5>
                                <div class="clearfix"></div>
                                <ul class="shop-tags">
                                    <li><a href="#">Animation</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">UI Design</a></li>
                                    <li><a href="#">Photography</a></li>
                                    <li><a class="active" href="#">Design</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Responsive</a></li>
                                    <li><a href="#">Develop</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--end sidebar box-->

                    </div>
                    <!--end right-->
                </div>
            </div>
        </section>
        <div class="clearfix"></div>

        <div class=" divider-line solid light opacity-6"></div>

        <div class="clearfix"></div>

        @include('new_client.share.foot')

        <a href="#" class="scrollup red-4"></a><!-- end scroll to top of the page-->
    </div>

    <script type="text/javascript" src="/assets_new_client/js/universal/jquery.js"></script>
    <script src="/assets_new_client/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets_new_client/js/mainmenu/jquery.sticky.js"></script>

    <script src="/assets_new_client/js/scripts/functions.js" type="text/javascript"></script>
</body>

</html>
