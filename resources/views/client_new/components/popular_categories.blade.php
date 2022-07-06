<section class="bg-white">
    <div class="container">

        <header class="wow fadeInUp" data-wow-delay=".2s">
            <h2 class="display-4">Popular <strong>categories</strong></h2>
        </header>

        <div class="row">
            @foreach ($top5DanhMuc as $value)
                <div class="col-md-6 mb-4">
                    <div class="wow fadeInUp" data-wow-delay=".4s">
                        <a href="/category/{{$value->id}}" class="box box-image box-hover-pull br-sm" style="background-image:url({{$value->hinh_anh}})">
                            <div class="box-spacer-xl"></div>
                            <div class="box-content text-white text-center">
                                <header>
                                    <div class="display-3"><strong>{{$value->ten_danh_muc}}</strong> </div>
                                </header>
                                <footer class="p-4">
                                    <small class="pre-label text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit soluta fugit earum optio</small>
                                </footer>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
