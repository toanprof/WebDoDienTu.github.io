@extends('client_new.master')

@section('main_title')
    {{$sanPham->ten_san_pham}}
@endsection

@section('sub_title')
    Chi Tiết Sản Phẩm
@endsection

@section('content')
<section class="bg-white py-3">
    <div class="container">
        <div class="row align-items-lg-center">

            <!-- Product gallery -->

            <div class="col-lg-7 col-xl-8 pb-5">

                <div class="owl-carousel" data-items="1" data-nav="false" data-margin="15" data-dots="true">
                    <img src="{{$sanPham->hinh_anh}}" alt="Product image" />
                </div>
            </div>

            <!-- Product info -->

            <div class="col-lg-5 col-xl-4">
                <div class="bg-light shadow-sm br-sm p-3 p-lg-4">

                    <!-- Product order -->

                    <div class="clearfix">

                        <!-- Product price -->

                        <div class="h2 mb-0">
                            <span>{{ number_format($sanPham->don_gia_khuyen_mai, 0) }} đ</span>
                            <small>
                                <del>{{ number_format($sanPham->don_gia_ban, 0) }} đ</del>
                            </small>
                        </div>

                        <hr />

                        <!-- Product brand -->

                        <div class="row">
                            <div class="col-6 col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-xl-4">
                                        <span class="text-muted">Manifacturer</span>
                                    </div>
                                    <div class="col-xl-8">{{$sanPham->ten_danh_muc}}</div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-xl-4">
                                        <span class="text-muted">Materials</span>
                                    </div>
                                    <div class="col-xl-8">Plastic, Leather</div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-xl-4">
                                        <span class="text-muted">Shipping</span>
                                    </div>
                                    <div class="col-xl-8">
                                        <i class="icon icon-checkmark-circle"></i> Free shipping
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-xl-4">
                                        <span class="text-muted">Availability</span>
                                    </div>
                                    <div class="col-xl-8">
                                        <i class="icon icon-checkmark-circle"></i> {{$sanPham->so_luong}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr />

                        <!-- Product quantity -->
                        @if (Auth::guard('customer')->check())
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-block btn-primary addToCart" data-id="{{$sanPham->id}}" >
                                            <i class="icon icon-cart"></i> Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <a class="btn btn-block btn-primary toggle-show addToCart" data-show="loginComponent">
                                            <i class="icon icon-cart"></i> Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <hr />

                    </div>

                    <!-- Add to basket -->

                    <div class="btn-group w-100">
                        <span class="btn btn-sm btn-outline-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <span class="show"><i class="fa fa-heart-o"></i> Whish</span>
                            <span class="hide"><i class="fa fa-heart"></i> Whislisted</span>
                        </span>
                        <span class="btn btn-sm btn-outline-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                            <span class="show"><i class="fa fa-eye-slash"></i> Watch</span>
                            <span class="hide"><i class="fa fa-eye"></i> Watching</span>
                        </span>
                    </div>


                </div>
            </div>

        </div>

    </div>
</section>

<!-- Product details -->

<section>
    <div class="container">

        <!-- Product tabs -->

        <ul class="nav nav-tabs nav-lavalamp justify-content-center mb-4" id="productTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="true">
                    Review
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">
                    Description
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="false">
                    Shipping
                </a>
            </li>
        </ul>

        <!-- Product tab content -->

        <div class="tab-content" id="productTabContent">
            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">

                <!-- Widget rating -->

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="rating-overall">
                            <div class="py-3 py-lg-4">

                                <!-- Rating header -->

                                <header>
                                    <div class="row align-items-center mb-4">

                                        <div class="col-2">
                                            <div class="h1 m-0">4.8</div>
                                        </div>

                                        <div class="col-10">
                                            <div class="h3 m-0">User rating overall</div>
                                            <small class="text-muted">4.8 average based on 625 reviews</small>
                                        </div>

                                    </div>
                                </header>

                                <!-- Rating content -->

                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <p>5 <i class="fa fa-star icon-xs"></i></p>
                                    </div>

                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <p>4 <i class="fa fa-star icon-xs"></i></p>
                                    </div>

                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="85"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <p>3 <i class="fa fa-star icon-xs"></i></p>
                                    </div>
                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <p>2 <i class="fa fa-star icon-xs"></i></p>
                                    </div>
                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <p>1 <i class="fa fa-star icon-xs"></i></p>
                                    </div>
                                    <div class="col-10">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="15"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <!-- Comments -->

                            <div class="py-3 py-lg-4">

                                <!-- Comments header -->

                                <header>
                                    <div class="h3 mb-1">Recent comments</div>
                                    <p class="text-muted"><small>14 review for this product</small></p>
                                </header>

                                <!-- Comments feedback -->

                                <div class="pt-3 pt-lg-4">

                                    <div id="comment-1">

                                        <div class="mb-4">
                                            <div class="d-flex align-items-center text-small">
                                                <img src="/assets_client_new/assets/images//demo/user-1.jpg" class="mr-2 rounded-circle" alt="..." style="width: 40px;">
                                                <div><strong class="mr-1">Anna North</strong></div>
                                                <div class="text-muted">- 45 minutes ago</div>
                                                <div class="ml-auto">
                                                    <i class="fa fa-star icon-xs text-primary"></i>
                                                    <i class="fa fa-star icon-xs text-primary"></i>
                                                    <i class="fa fa-star icon-xs text-primary"></i>
                                                    <i class="fa fa-star icon-xs text-secondary"></i>
                                                    <i class="fa fa-star icon-xs text-secondary"></i>
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            </div>
                                            <div>
                                                <a href="#" class="link link-right link-dark"><strong>Reply</strong></a>
                                            </div>
                                        </div>

                                        <div id="comment-1-reply" class="mb-4">
                                            <div class="mb-4 pl-5 border-left">
                                                <div class="d-flex align-items-center text-small">

                                                    <img src="/assets_client_new/assets/images//demo/user-2.jpg" class="mr-2 rounded-circle" alt="..." style="width: 40px;">
                                                    <div><strong class="text-dark mr-1">Megan Watts</strong></div>
                                                    <div class="text-muted">- just now</div>

                                                    <div class="ml-auto">
                                                        <i class="fa fa-star icon-xs text-primary"></i>
                                                        <i class="fa fa-star icon-xs text-primary"></i>
                                                        <i class="fa fa-star icon-xs text-primary"></i>
                                                        <i class="fa fa-star icon-xs text-secondary"></i>
                                                        <i class="fa fa-star icon-xs text-secondary"></i>
                                                    </div>

                                                </div>

                                                <div class="my-2">
                                                    Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                </div>

                                                <div>
                                                    <a href="#" class="link link-right link-dark"><strong>Reply</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="comment-2">

                                        <div class="mb-4">
                                            <div class="d-flex align-items-center text-small">
                                                <img src="/assets_client_new/assets/images//demo/user-3.jpg" class="mr-2 rounded-circle" alt="..." style="width: 40px;">
                                                <div><strong class="mr-1">Sophia Guess</strong></div>
                                                <div class="text-muted">- hour ago</div>
                                                <div class="ml-auto">
                                                    <i class="fa fa-star icon-xs text-primary"></i>
                                                    <i class="fa fa-star icon-xs text-secondary"></i>
                                                    <i class="fa fa-star icon-xs text-secondary"></i>
                                                    <i class="fa fa-star icon-xs text-secondary"></i>
                                                    <i class="fa fa-star icon-xs text-secondary"></i>
                                                </div>
                                            </div>
                                            <div class="my-2">
                                                Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                            </div>
                                            <div>
                                                <a href="#" class="link link-right link-dark"><strong>Reply</strong></a>
                                            </div>
                                        </div>

                                        <div id="comment-2-reply" class="mb-4">
                                            <div class="mb-4 pl-5 border-left">
                                                <div class="d-flex align-items-center text-small">

                                                    <img src="/assets_client_new/assets/images//demo/user-4.jpg" class="mr-2 rounded-circle" alt="..." style="width: 40px;">
                                                    <div><strong class="text-dark mr-1">James Tomasek</strong></div>
                                                    <div class="text-muted">- just now</div>

                                                    <div class="ml-auto">
                                                        <i class="fa fa-star icon-xs text-primary"></i>
                                                        <i class="fa fa-star icon-xs text-primary"></i>
                                                        <i class="fa fa-star icon-xs text-primary"></i>
                                                        <i class="fa fa-star icon-xs text-primary"></i>
                                                        <i class="fa fa-star icon-xs text-secondary"></i>
                                                    </div>

                                                </div>

                                                <div class="my-2">
                                                    Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                </div>

                                                <div>
                                                    <a href="#" class="link link-right link-dark"><strong>Reply</strong></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr>

                            <!-- Reply -->

                            <div class="py-3 py-lg-4">

                                <!-- Reply header -->

                                <header>
                                    <div class="h3 mb-1">Leave a Reply</div>
                                    <p class="text-muted"><small>Your email address will not be published.</small></p>
                                </header>

                                <!-- Reply form -->

                                <div class="pt-3 pt-lg-4">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="label" for="exampleInputEmail1">Email address</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="label" for="exampleInputName1">Your name</label>
                                                    <input type="password" class="form-control" id="exampleInputName1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="label" for="exampleComment">Comment</label>
                                            <textarea class="form-control" name="" id="exampleComment" cols="20" rows="4"></textarea>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="custom-control custom-checkbox custom-control-light">
                                                <input type="checkbox" class="custom-control-input" id="customCheckTheme1">
                                                <label class="custom-control-label" for="customCheckTheme1">Notify me on reply</label>
                                            </div>
                                            <button type="submit" class="btn link link-right link-dark"><strong>Send reply</strong></button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="py-3 py-lg-4">

                            <header>
                                <div class="h3 mb-1">Product description</div>
                                <p>Specfication</p>
                            </header>

                            <div class="py-3 py-lg-4">
                                <p>{{$sanPham->mo_ta_chi_tiet}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="py-3 py-lg-4">

                            <header>
                                <div class="h3 mb-1">Shipping information</div>
                                <p>Specfication</p>
                            </header>

                            <div class="py-3 py-lg-4">

                                <h5>Money Back Guarantee</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus odio quam, facilisis vel placerat at, convallis at ipsum. Quisque posuere justo non imperdiet volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec vehicula felis lorem, at sodales mauris convallis in. Quisque elementum augue justo, at rutrum velit eleifend sed. Mauris vitae metus erat. Duis augue purus, ornare vitae mauris eget, dictum tincidunt leo. Sed quis felis blandit, aliquam sapien eget, pulvinar dolor. Vivamus vulputate egestas justo non ullamcorper.</p>

                                <h5>Need to Return an Item?</h5>
                                <p>Sed eget erat justo. Curabitur scelerisque sagittis molestie. Nunc sit amet porttitor odio. In blandit sem eu ante pellentesque, ornare placerat metus fringilla. Ut eu arcu finibus, aliquam libero nec, porta elit. Praesent sit amet odio a quam vehicula molestie eu ut quam. Vivamus viverra augue nulla, ac commodo sapien dictum ut. Pellentesque vehicula maximus velit vitae imperdiet.</p>

                                <h5>Check an open return request</h5>
                                <p>Praesent mattis justo sit amet dui semper tempus vel eu turpis. Donec sem nulla, porta vitae sollicitudin et, finibus vel ligula. Fusce et lorem pharetra, egestas tortor sit amet, ultricies mi. Cras ac tellus et eros maximus cursus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris ultricies leo tempor, ullamcorper magna nec, consectetur sapien. Maecenas rhoncus non eros id tristique. Aenean condimentum in quam sed rhoncus. Nunc aliquet, dolor rhoncus imperdiet faucibus, est ipsum sollicitudin massa, a placerat justo leo vel turpis. In venenatis felis vitae volutpat viverra. Donec sit amet urna tempus, convallis nunc eget, tempor neque. Nunc gravida tincidunt lectus. Mauris molestie sit amet dolor sit amet luctus. Maecenas ligula mi, tempor at dignissim ut, fermentum ut arcu.</p>

                                <h5>Send the item back</h5>
                                <p>Curabitur non ipsum sit amet elit ultricies venenatis. Sed blandit vitae justo sit amet convallis. Aliquam tristique, odio quis vestibulum interdum, magna risus luctus augue, vitae lobortis est enim vel mauris. In eu nibh sed neque auctor efficitur. Aenean quis congue urna. Suspendisse id ultrices eros. Aliquam bibendum massa eget ex scelerisque, vitae convallis felis rutrum. Integer sed augue quam.</p>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.product_preview_left .previews a').on("click", function() {
            var largeImage = $(this).attr('data-full');
            $('.selected').removeClass();
            $(this).addClass('selected');
            $('.full img').hide();
            $('.full img').attr('src', largeImage);
            $('.full img').fadeIn();


        }); // closing the listening on a click
        $('.full img').on("click", function() {
            var modalImage = $(this).attr('src');
            $.fancybox.open(modalImage);
        });
    }); //closing our doc ready
</script>
@endsection
