<!DOCTYPE html>
<html lang="en">
<head>
    @include('client.share.head')
</head>
<body>
	<header class="entire_header">
		<div class="header-area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-5">
						<div class="user-menu">
							<ul class="list-unstyled list-inline">
								<li class="dropdown dropdown-small">
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">English </span><i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#">English</a>
										</li>
										<li><a href="#">French</a>
										</li>
										<li><a href="#">German</a>
										</li>
									</ul>
								</li>

								<li class="dropdown dropdown-small">
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="value">USD </span><i class="fa fa-angle-down"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#">USD</a>
										</li>
										<li><a href="#">INR</a>
										</li>
										<li><a href="#">GBP</a>
										</li>
									</ul>
								</li>
								<li>Welcome to Ecommerce</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-7">
						<div class="header-right">
							<ul>
								<li class="dropdown dropdown-small">
									<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><img class="account" src="/assets_client/images/account.png" alt="#"><span class="value">My Account </span><i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu account-menu">
										<li><a href="profile.html">My account</a>
										</li>
										<li><a href="wishlist.html">Wishlist</a>
										</li>
										<li><a href="product-list.html">Shopping</a>
										</li>
									</ul>
								</li>
								<li><a href="wishlist.html"><i class="fa fa-heart-o"></i> Wishlist</a>
								</li>
								<li>
									<a href="checkout.html"><img src="/assets_client/images/check.png" alt="#"> Checkout</a>
								</li>
								<li class="last-child">
									<a class="logg" href="#"><img class="login" src="/assets_client/images/log.png" alt="#"> Login</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header-area:END -->

		<!-- Logo-area -->
		<div class="logo_area">
			<div class="container">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-xs-12">
						<div class="logo">
							<a href="index.html"><img src="/assets_client/images/logo.png" alt="">
							</a>
						</div>
					</div>
					<div class="col-sm-8 col-md-8 col-xs-12">
						<div class="search-area">
							<form>
								<div class="control-group">

									<ul class="categories-filter animate-dropdown">
										<li class="dropdown">

											<a class="dropdown-toggle" data-toggle="dropdown" href="#">All Categories <b class="caret"></b></a>

											<ul class="dropdown-menu" role="menu">

												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Fashion</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Watches</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">House Wares</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Desktop</a>
												</li>
												<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Smartphones</a>
												</li>


											</ul>
										</li>
									</ul>
									<input class="search-field" placeholder="Search here..." />
									<a class="search-button" href="#"></a>
								</div>
							</form>
						</div>
						<div class="logo_right">
							<span><i class="fa fa-phone"></i></span>
							<a href="tel:+112345689">CALL US FREE
								<br/>+01 123 456 89</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- LOGO-AREA:END -->

		<!-- MENU-AREA -->
		<div class="menu-area">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="categories">
							<ul id="nav">
								<li>Categories <i class="fa fa-bars"></i>
									<ul>
										<li><a href="#"><i class="fa fa-male"></i> Fashion</a> </li>
										<li><a href="#"><i class="fa fa-clock-o"></i> Watches<i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-home"></i>House Wares  <i class="fa fa-angle-right icon-right"></i></a> </li>
										<li><a href="#"><i class="fa fa-desktop"></i> Desktop & Monitors <i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-mobile"></i> Smartphones</a> </li>
										<li><a href="#"><i class="fa fa-laptop"></i> Laptop & Tablates <i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-lightbulb-o"></i> Light & Lamps <i class="fa fa-angle-right icon-right"></i></a>
										</li>
										<li><a href="#"><i class="fa fa-volume-up"></i> Sound & Audio</a>
										</li>
										<li><a href="#"><i class="fa fa-heart-o"></i> Health & Medical</a>
										</li>
										<li><a href="#"><i class="fa fa-wheelchair"></i> Gym Equipments</a>
										</li>
										<li class="last-li"><a href="#">View all categories</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<nav class="main-menu">
							<ul id="navigation">
								<li class="active"><a href="index.html">Home <i class="fa fa-caret-down"></i></a>
									<ul class="drop_nav">
										<li><a href="homepage_02.html">Home two</a></li>
										<li><a href="homepage_03.html">Home three</a></li>
									</ul>
								</li>
								<li><a href="#">Pages <i class="fa fa-caret-down"></i></a>
									<ul class="drop_nav">
										<li><a href="blog.html">Blog</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="product-list.html">Product list</a></li>
										<li><a href="profile.html">Profile</a></li>
										<li><a href="search-result.html">Search result</a></li>
										<li><a href="single-product.html">Single product</a></li>
										<li><a href="wishlist.html">wishlist</a></li>
										<li><a href="404.html">404</a></li>
									</ul>
								</li>
								<li><a href="about-us.html">About Us</a>
								</li>
								<li><a href="product-list.html">Men</a>
								</li>
								<li><a href="product-list.html">Women</a>
								</li>
								<li><a href="contact-us.html">Contact Us</a>
								</li>
							</ul>
						</nav>

						<!-- Mobile Navigation -->
						<div class="only-for-mobile">
							<div class="col-xs-12">
								<ul class="ofm">
									<li class="m_nav"><i class="fa fa-bars"></i> Navigation</li>
								</ul>

								<!-- MOBILE MENU -->
								<div class="mobi-menu">
									<div id='cssmenu'>
										<ul>
											<li class='has-sub'>
												<a href='index.html'><span>Home</span></a>
												<ul class="sub-nav">
													<li><a href="homepage_02.html"><span>Home version 2</span></a></li>
													<li><a href="homepage_03.html"><span>Home version 3</span></a></li>
												</ul>
											</li>
											<li class='has-sub'>
												<a href='#'><span>Pages</span></a>
												<ul class="sub-nav">
													<li><a href="blog.html">Blog</a></li>
													<li><a href="checkout.html">Checkout</a></li>
													<li><a href="product-list.html">Product list</a></li>
													<li><a href="profile.html">Profile</a></li>
													<li><a href="search-result.html">Search result</a></li>
													<li><a href="single-product.html">Single product</a></li>
													<li><a href="wishlist.html">wishlist</a></li>
													<li><a href="404.html">404</a></li>
												</ul>
											</li>
											<li>
												<a href='about-us.html'><span>About Us</span></a>
											</li>
											<li>
												<a href='product-list.html'><span>Men</span></a>
											</li>
											<li>
												<a href='product-list.html'><span>Women</span></a>
											</li>
											<li>
												<a href='contact-us.html'><span>Contact Us</span></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12">
						<div class="menu_right">
							<a href="cart-page.html"><i class="fa fa-shopping-cart"></i>My Cart</a>
							<span>2</span>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MENU-AREA:END -->
	</header>
    <!-- Header-AREA END -->

    @yield('content')


	<!-- Entire FOOTER START -->
	<footer class="entire_footer">

		<!-- FOOTER-WIDGET-AREA -->
		<div class="footer-widget">
			<div class="ovelay">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-4 col-xs-12">
							<div class="widget_logo">
								<a href="index.html"><img src="/assets_client/images/logo_footer.png" alt="logo"></a>
								<ul>
									<li>
										<div class="wl_left">
											<i class="fa fa-location-arrow"></i>
										</div>
										<div class="wl_right">
											<a href="#"><span>Address :</span> 09 Ecommerceshop, Design Street,  Victoria, Australia</a>
										</div>
									</li>
									<li>
										<div class="wl_left">
											<i class="fa fa-envelope-o"></i>
										</div>
										<div class="wl_right">
											<a href="#"><span>E-mail :</span> Info@Ecommerceshop.com</a>
										</div>
									</li>
									<li>
										<div class="wl_left">
											<i class="fa fa-phone"></i>
										</div>
										<div class="wl_right">
											<a href="#"><span>phone :</span> +01 123 456 78</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">My Account</a></h4>
								<ul>
									<li><a href="profile.html">My Account</a>
									</li>
									<li><a href="wishlist.html">Wishlist</a>
									</li>
									<li><a href="cart-page.html">Shopping Cart</a>
									</li>
									<li><a href="checkout.html">Checkout</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">Information</a></h4>
								<ul>
									<li><a href="#">About Our Shop</a>
									</li>
									<li><a href="#">Top Seller</a>
									</li>
									<li><a href="#">Special Products</a>
									</li>
									<li><a href="#">Manufacturers</a>
									</li>
									<li><a href="#">Secure Shopping</a>
									</li>
									<li><a href="#">Privacy Policy</a>
									</li>
									<li><a href="#">Delivery Information</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">Our Support</a></h4>
								<ul>
									<li><a href="contact-us.html">Contact Us</a>
									</li>
									<li><a href="#">Shipping & Taxes</a>
									</li>
									<li><a href="#">Return Policy</a>
									</li>
									<li><a href="#">Careers</a>
									</li>
									<li><a href="#">Affiliates</a>
									</li>
									<li><a href="#">Gift Vouchers</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-2 col-sm-2 col-xs-12">
							<div class="widget_single">
								<h4><a href="#">Our Services</a></h4>
								<ul>
									<li><a href="#">Shipping & Returns</a>
									</li>
									<li><a href="#">International Shopping</a>
									</li>
									<li><a href="#">Best Customer Support</a>
									</li>
									<li><a href="#">Easy Replacement</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FOOTER-WIDGET-AREA:END -->

		<!-- FOOTER-AREA -->
		<div class="footer_area">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="footer_text">
							<p>&copy;2015 <a href="index.html">E-Comshop</a>. All rights reserved</p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="footer_right">
							<ul>
								<li><a href="#"><img src="/assets_client/images/mc.png" alt="" /></a></li>
								<li><a href="#"><img src="/assets_client/images/visa.png" alt="" /></a></li>
								<li><a href="#"><img src="/assets_client/images/crr.png" alt="" /></a></li>
								<li><a href="#"><img src="/assets_client/images/disco.png" alt="" /></a></li>
								<li><a href="#"><img src="/assets_client/images/bank.png" alt="" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- FOOTER-AREA:END -->
	</footer>
	<!-- Entire FOOTER END -->

    @include('client.share.js')
    @yield('js')
</body>

</html>
