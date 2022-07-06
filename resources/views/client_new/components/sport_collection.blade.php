<section class="bg-white">
    <div class="container">

        <header class="wow fadeInUp" data-wow-delay=".2s">
            <h2 class="display-4">Explore <strong>sport</strong> collections</h2>
        </header>

        <div class="wow fadeInUp" data-wow-delay=".2s">
            <div class="row">
                @foreach ($top5DanhMuc as $value)
                    <div class="col mb-3 mb-lg-0">
                        <a href="/category/{{$value->id}}" class="btn btn-rounded btn-block btn-outline-dark">{{$value->ten_danh_muc}}</a>
                    </div>
                @endforeach
                <div class="col mb-3 mb-lg-0">
                    <a href="#" class="btn btn-rounded btn-block btn-dark text-nowrap">All categories</a>
                </div>
            </div>
        </div>

    </div>
</section>
