<section class="bg-light">
    <div class="container">
        @for ($i = 0; $i < 4; $i++)
            @if ($danhMuc[$i]->id_danh_muc_cha == 0)
                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <div class="row py-4">
                        <div class="col-lg-3 mb-4 mb-lg">
                            <h2 class="mb-0">{{ $danhMuc[$i]->ten_danh_muc }}</h2>
                            <p><a href="#" class="link link-main link-dark">Explore all categories</a></p>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                @foreach ($danhMuc as $k => $v)
                                    @if($danhMuc[$i]->id == $v->id_danh_muc_cha)
                                        <div class="col col-lg-3 mb-3">
                                            <a href="/category/{{$v->id}}" class="btn btn-rounded btn-block btn-sm btn-outline-dark text-nowrap">{{ $v->ten_danh_muc }}</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endfor
    </div>
</section>
