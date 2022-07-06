@jquery
@toastr_js
@toastr_render
<script type="text/javascript" src="/assets_new_client/js/universal/jquery.js"></script>
<script src="/assets_new_client/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets_new_client/js/masterslider/jquery.easing.min.js"></script>
<script src="/assets_new_client/js/masterslider/masterslider.min.js"></script>
<script type="text/javascript">
(function($) {
 "use strict";
	var slider = new MasterSlider();
	// adds Arrows navigation control to the slider.
	slider.control('arrows');
	slider.control('bullets');

	slider.setup('masterslider' , {
		 width:1600,    // slider standard width
		 height:630,   // slider standard height
		 space:0,
		 speed:45,
		 layout:'fullwidth',
		 loop:true,
		 preload:0,
		 autoplay:true,
		 view:"parallaxMask"
	});

})(jQuery);
</script>
<script src="/assets_new_client/js/mainmenu/customeUI.js"></script>
<script src="/assets_new_client/js/scrolltotop/totop.js"></script>
<script src="/assets_new_client/js/mainmenu/jquery.sticky.js"></script>
<script src="/assets_new_client/js/pagescroll/animatescroll.js"></script>

<script src="/assets_new_client/js/scripts/functions.js" type="text/javascript"></script>
