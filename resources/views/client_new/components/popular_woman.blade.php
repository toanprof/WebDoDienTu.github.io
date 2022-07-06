<section class="bg-white">
    <div class="container">

        <header class="wow fadeInUp" data-wow-delay=".2s">
            <h2 class="display-4">Popular <strong>woman's</strong> products</h2>
        </header>

        <div class="row mx-n1">
            @foreach ($sanPhamBanChay as $value)
                <div class="col-6 col-xl-3 p-1">
                    <div class="wow fadeInUp" data-wow-delay=".0s">
                        <div class="card card-fill">
                            <div class="card-body p-3 p-lg-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h2 class="card-title mb-1 h5">
                                            <a href="/product/{{$value->id}}" class="text-dark">
                                                {{ strlen($value->ten_san_pham) < 20 ? $value->ten_san_pham : Str::substr($value->ten_san_pham, 0, 20) . '...' }}
                                            </a>
                                        </h2>
                                        <small class="text-muted">
                                            <span>{{ number_format($value->don_gia_khuyen_mai, 0) }} đ</span>
                                            <s>{{ number_format($value->don_gia_ban, 0) }} đ</s>
                                        </small>
                                    </div>
                                    @if (Auth::guard('customer')->check())
                                        <div>
                                            <a class="d-inline-block addToCart" data-toggle="tooltip"
                                                data-id="{{ $value->id }}" data-placement="top" title="Add to cart">
                                                <i class="icon icon-cart font-size-xl"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div>
                                            <a class="d-inline-block addToCart toggle-show" data-toggle="tooltip"
                                                data-show="loginComponent" data-placement="top" title="Add to cart">
                                                <i class="icon icon-cart font-size-xl"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card-image pb-4">
                                <a href="/product/{{$value->id}}">
                                    <img src="{{$value->hinh_anh}}" class="card-img-top img-hover" data-img="{{$value->hinh_anh}}" data-img-hover="{{$value->hinh_anh}}" alt="...">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-right pt-4">
            <a href="/category/{{$sanPhamBanChay[0]->danh_muc_id}}" class="link link-main link-dark">View collection</a>
        </div>
    </div>

</section>
