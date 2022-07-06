<section class="bg-white p-0">
    <div class="container">
        <div class="row">
            @foreach ($topDanhMuc as $value)
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="wow fadeInUp" data-wow-delay=".2s">
                        <div class="box box-image box-hover-fall br-sm" style="background-image:url({{$value->hinh_anh}})">
                            <div class="box-spacer-xl"></div>
                            <div class="box-content">
                                <h2 class="display-4 font-family-body text-white">
                                    <strong>{{$value->ten_danh_muc}}</strong>
                                </h2>
                                <p><span><a href="/category/{{$value->id}}" class="text-muted">New arrivals</a></span></p>
                                <p><span><a href="/category/{{$value->id}}" class="text-muted">Discount sales</a></span></p>
                                <p><span><a href="/category/{{$value->id}}" class="text-muted">More</a></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
