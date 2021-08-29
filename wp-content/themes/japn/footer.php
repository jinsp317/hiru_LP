<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Japn
 */

?>

	<!-- FOOTER_START -->
	<footer id="footer">
    	<!--<div class="back-to-top-hp" id="gototop">
        	<a href="javascript:void(0)"><img src="images/backtotop.svg" alt="" /></a>
        </div>-->
    	<div class="footer-top-hp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-inner-hp">
                    	<div class="copyright-hp">©2021 HiruNavi</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </footer>
<!-- FOOTER_END -->
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/owl.carousel.min.js"></script>
<script type="text/javascript">
	$('#work_slider').owlCarousel({
		loop:true,
		margin:100,
		nav:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				stagePadding:50,
				margin:20
			},
			768:{
				items:2,
				stagePadding:50,
				margin:20
			},
			992:{
				items:3,
				margin:50
			},
			1200:{
				items:3,
				margin:100
			}
		}
	})
</script>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/custom.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.validate.min.js"></script>
</body>
</html>
