<!doctype html>
<html lang="en">

    <head>
        <title>Hasta - Responsive MultiPurpose HTML5 Template</title>
        <meta charset="utf-8">
        <!-- Meta -->
        <meta name="keywords" content="" />
        <meta name="author" content="">
        <meta name="robots" content="" />
        <meta name="description" content="" />

        <!-- this styles only adds some repairs on idevices  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">

        <!-- Google fonts - witch you want to use - (rest you can just remove) -->
        <link
            href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic'
            rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet'
            type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Stylesheets -->
        <link rel="stylesheet" media="screen" href="/assets_new_client/js/bootstrap/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="/assets_new_client/js/mainmenu/menu.css" type="text/css" />
        <link rel="stylesheet" href="/assets_new_client/css/default.css" type="text/css" />
        <link rel="stylesheet" href="/assets_new_client/css/layouts.css" type="text/css" />
        <link rel="stylesheet" href="/assets_new_client/css/shortcodes.css" type="text/css" />
        <link rel="stylesheet" href="/assets_new_client/css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" media="screen" href="/assets_new_client/css/responsive-leyouts.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/assets_new_client/css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen" />
        <link rel="stylesheet" href="/assets_new_client/css/et-line-font/et-line-font.css">

        <link rel="stylesheet" type="text/css" href="/assets_new_client/js/tabs/assets/css/responsive-tabs.css">

        <link rel="stylesheet" href="/assets_new_client/js/product-preview/stylesheet.css">
        <link rel="stylesheet" href="/assets_new_client/js/product-preview/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" type="text/css" href="/assets_new_client/js/smart-forms/smart-forms.css">

        @toastr_css()


    </head>

<body>
    <div class="site_wrapper">
        @include('new_client.share.top')
        <div class="clearfix"></div>

        @include('new_client.share.menu')
        <!--end menu-->
        <div class="clearfix"></div>

        <section>
            <div class="header-inner two">
                <div class="inner text-center">
                    <h4 class="title text-white uppercase roboto-slab">Detail Product</h4>
                    <h5 class="text-white uppercase">Collections</h5>
                </div>
                <div class="overlay bg-opacity-5"></div>
                <img src="/assets_new_client/images/sliders/slide1.png" alt="" class="img-responsive" />
            </div>
        </section>
        <!-- end header inner -->
        <div class="clearfix"></div>

        <section>
            <div class="pagenation-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Detail Product</h3>
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
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="product_preview_left bmargin">
                            <div class="gallery">
                                <div class="full">
                                    <!-- first image is viewable to start -->
                                    <img src="{{$sanPham->hinh_anh}}"
                                        style="height: 550px; width: 550px" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end left-->

                    <div class="col-md-6 col-sm-12 col-xs-12 bmargin">
                        <h3 class=" raleway">{{$sanPham->ten_san_pham}}</h3>
                        <div class="divider-line solid light opacity-6"></div>
                        <br />
                        <div class="col-md-8 col-sm-6">
                            <h3 class="text-red-4">{{ number_format($sanPham->don_gia_khuyen_mai, 0) }} đ</h3>
                            <h3 class="text-red-4"><del>{{ number_format($sanPham->don_gia_ban, 0) }} đ</h3>
                        </div>
                        <div class="col-md-4 col-sm-6 text-right product-review-stars"> <span><i
                                    class="fa fa-star"></i></span><span><i
                                    class="fa fa-star"></i></span><span><i
                                    class="fa fa-star"></i></span><span><i
                                    class="fa fa-star"></i></span><span><i
                                    class="fa fa-star"></i></span><br />
                            (24 customer reviews) </div>
                        <div class="clearfix"></div>
                        <br />
                        <p>{{$sanPham->mo_ta_ngan}}</p>
                        <br />
                        <a class="btn btn-red-4 less-padding addToCart" data-id="{{$sanPham->id}}" >Add to cart</a>
                        <div class="clearfix"></div>
                        <br />
                        <br />
                        <ul class="product-details">
                            <li><span>Product ID :</span> {{$sanPham->ma_san_pham}}</li>
                            <li><span>Category :</span> {{$sanPham->ten_danh_muc}}</li>
                            <li><span>Tags :</span> Summer, Fashion, Women</li>
                            <li><span>Category :</span> Tops</li>
                        </ul>
                        <div class="clearfix"></div>
                        <br />
                        <br />
                        <ul class="product-info-socialicons">
                            <li><a class="twitter" href="https://twitter.com/codelayers"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="googleplus" href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a class="in" href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a class="dribble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                    <!--end item-->
                </div>
            </div>
        </section>
        <!-- end section -->
        <div class="clearfix"></div>

        <section class="sec-bpadding-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="tabs13">
                            <li><a href="#example-13-tab-1" target="_self">Description</a></li>
                            <li><a href="#example-13-tab-2" target="_self">Reviews (1)</a></li>
                        </ul>
                        <div class="tabs-content13">
                            <div id="example-13-tab-1" class="tabs-panel13">
                                {{-- <p>Development dolor sit amet, consectetur adipiscing elit. Phasellus ac fringilla
                                    nulla, sit amet consequat eros. Pellentesque pharetra blandit commyolk. Phasellus
                                    massa nisl, feugiat ac bibendum et.</p>
                                <br /> --}}
                                <p>{{$sanPham->mo_ta_chi_tiet}}</p>
                            </div>
                            <!-- end tab 1 -->

                            <div id="example-13-tab-2" class="tabs-panel13">
                                <div class="image-left"><img src="" alt="" /></div>
                                <div class="text-box-right">
                                    <h5>Celina John</h5>
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-left product-review-stars-2">
                                        <span><i class="fa fa-star"></i></span><span><i
                                                class="fa fa-star"></i></span><span><i
                                                class="fa fa-star"></i></span><span><i
                                                class="fa fa-star"></i></span><span><i
                                                class="fa fa-star"></i></span> </div>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo.
                                        Praesent mattis commyolk augue. Aliquam ornare hendrerit augue. Cras tellus. In
                                        pulvinar lectus a est. Curabitur eget orci. </p>
                                </div>
                                <div class="clearfix"></div>
                                <br />
                                <br />
                                <div class="smart-forms bmargin">
                                    <h4 class=" roboto-slab">Add a Review</h4>
                                    <br />
                                    <br />
                                    <form method="post" action="php/smartprocess.php" id="smart-form">
                                        <div>
                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="text" name="sendername" id="sendername"
                                                        class="gui-input" placeholder="Enter name">
                                                    <span class="field-icon"><i class="fa fa-user"></i></span>
                                                </label>
                                            </div>
                                            <!-- end section -->

                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <input type="email" name="emailaddress" id="emailaddress"
                                                        class="gui-input" placeholder="Email address">
                                                    <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                                </label>
                                            </div>
                                            <!-- end section -->

                                            <div class="section">
                                                <label class="field prepend-icon">
                                                    <textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Enter message"></textarea>
                                                    <span class="field-icon"><i class="fa fa-comments"></i></span>
                                                    <span class="input-hint"> <strong>Hint:</strong> Please enter
                                                        between 80 - 300 characters.</span>
                                                </label>
                                            </div>
                                            <!-- end section -->

                                            <div class="result"></div>
                                            <!-- end .result  section -->

                                        </div>
                                        <!-- end .form-body section -->
                                        <div class="form-footer">
                                            <button type="submit" data-btntext-sending="Sending..."
                                                class="button btn-primary red-4">Submit</button>
                                            <button type="reset" class="button"> Cancel </button>
                                        </div>
                                        <!-- end .form-footer section -->
                                    </form>
                                </div>
                                <!-- end .smart-forms section -->

                            </div>
                            <!-- end tab 2 -->

                        </div>
                        <!-- end all tabs -->
                    </div>
                </div>
            </div>
        </section>
        <!--end section-->
        <div class="clearfix"></div>

        <div class=" divider-line solid light opacity-6"></div>

        <!--end section -->
        <div class="clearfix"></div>

        @include('new_client.share.foot')

        <!--end section-->
        <div class="clearfix"></div>

        <a href="#" class="scrollup red-4"></a><!-- end scroll to top of the page-->
    </div>
    @jquery
    @toastr_js
    @toastr_render
    <script type="text/javascript" src="/assets_new_client/js/universal/jquery.js"></script>
    <script src="/assets_new_client/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="/assets_new_client/js/product-preview/fancybox/jquery.fancybox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.min.js"></script>
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
            $(".addToCart").click(function(e) {
            var id_san_pham = $(this).data('id');
            axios
                .get('/client/add-to-cart/' + id_san_pham)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.message);
                    } else {
                        toastr.error(res.data.message);
                    }
                });
        });
        }); //closing our doc ready
    </script>
    <script src="/assets_new_client/js/mainmenu/jquery.sticky.js"></script>

    <script src="/assets_new_client/js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets_new_client/js/smart-forms/jquery.form.min.js"></script>
    <script type="text/javascript" src="/assets_new_client/js/smart-forms/jquery.validate.min.js"></script>
    <script type="text/javascript" src="/assets_new_client/js/smart-forms/additional-methods.min.js"></script>
    <script type="text/javascript" src="/assets_new_client/js/smart-forms/smart-form.js"></script>
    <script src="/assets_new_client/js/scripts/functions.js" type="text/javascript"></script>
</body>

</html>
