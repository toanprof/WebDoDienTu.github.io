<section class="sec-bpadding-2 " style="margin-top:40px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                <h4 class="section-title-7"><span class="roboto-slab uppercase">Featured Products</span></h4>
            </div>
            <!--end title-->

            @foreach ($sanPhamMoi as $value)
            <div class="col-md-3 col-sm-6 bmargin">
                <div class="shop-product-holder">
                    <a href="/product/{{$value->id}}">
                        <div class="image-holder">
                            <div class="hoverbox"><i class="fa fa-link"></i></div>
                            <img src="{{ $value->hinh_anh }}"
                                alt="" class="img-responsive" />
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>
                <br/>
                <h5 class="less-mar1 roboto-slab">
                    <a href="/product/{{$value->id}}">
                        {{ $value->ten_san_pham }}
                    </a>
                </h5>
                <p>{{ $value->mo_ta_ngan }}</p>
                <h5 class="text-red-4">{{ number_format($value->don_gia_khuyen_mai, 0) }}
                    <del>{{ number_format($value->don_gia_ban, 0) }}</del></h5>
                <br />
                @if(Auth::guard('customer')->check())
                <a class="btn btn-red-4 btn-small addToCart" data-id="{{$value->id}}">Add to cart</a>
                @else
                <a class="btn btn-red-4 btn-small" data-toggle="modal" data-target="#loginModal">Add to cart</a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
