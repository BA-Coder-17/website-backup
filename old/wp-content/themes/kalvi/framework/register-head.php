<?php
/* ---------------------------------------------------------------------------
 * Loading Theme Scripts
 * --------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'kalvi_enqueue_scripts');
function kalvi_enqueue_scripts() {

	// comment reply script ------------------------------------------------------
	if (is_singular() AND comments_open()):
		wp_enqueue_script( 'comment-reply' );
	endif;

	// scipts variable -----------------------------------------------------------
	$loadingbar = cs_get_option( 'use-site-loader' );
	$loadingbar = !empty( $loadingbar ) ?  "enable" : "disable";

	if(is_rtl()) $rtl = true; else $rtl = false;

	wp_enqueue_script('jquery-ui-totop', get_theme_file_uri('/framework/js/jquery.ui.totop.min.js'), array(), false, true);
	wp_enqueue_script('jquery-easing', get_theme_file_uri('/framework/js/jquery.easing.js'), array(), false, true);
	wp_enqueue_script('jquery-caroufredsel', get_theme_file_uri('/framework/js/jquery.caroufredsel.js'), array(), false, true);
	wp_enqueue_script('jquery-debouncedresize', get_theme_file_uri('/framework/js/jquery.debouncedresize.js'), array(), false, true);
	wp_enqueue_script('jquery-prettyphoto', get_theme_file_uri('/framework/js/jquery.prettyphoto.js'), array(), false, true);
	wp_enqueue_script('jquery-touchswipe', get_theme_file_uri('/framework/js/jquery.touchswipe.js'), array(), false, true);
	wp_enqueue_script('jquery-parallax', get_theme_file_uri('/framework/js/jquery.parallax.js'), array(), false, true);
	wp_enqueue_script('jquery-downcount', get_theme_file_uri('/framework/js/jquery.downcount.js'), array(), false, true);
	wp_enqueue_script('jquery-nicescroll', get_theme_file_uri('/framework/js/jquery.nicescroll.js'), array(), false, true);
	wp_enqueue_script('jquery-bxslider', get_theme_file_uri('/framework/js/jquery.bxslider.js'), array(), false, true);
	wp_enqueue_script('jquery-fitvids', get_theme_file_uri('/framework/js/jquery.fitvids.js'), array(), false, true);
	wp_enqueue_script('jquery-sticky', get_theme_file_uri('/framework/js/jquery.sticky.js'), array(), false, true);
	wp_enqueue_script('jquery-simple-sidebar', get_theme_file_uri('/framework/js/jquery.simple-sidebar.js'), array(), false, true);
	wp_enqueue_script('jquery-classie', get_theme_file_uri('/framework/js/jquery.classie.js'), array(), false, true);
	wp_enqueue_script('jquery-placeholder', get_theme_file_uri('/framework/js/jquery.placeholder.js'), array(), false, true);
	wp_enqueue_script('jquery-visualnav', get_theme_file_uri('/framework/js/jquery.visualNav.min.js'), array(), false, true);
	wp_enqueue_script('resizesensor', get_theme_file_uri('/framework/js/ResizeSensor.min.js'), array(), false, true);
	wp_enqueue_script('theia-sticky-sidebar', get_theme_file_uri('/framework/js/theia-sticky-sidebar.min.js'), array(), false, true);
	wp_register_script('particles-min', get_theme_file_uri('/framework/js/particles.min.js'), array(), false, true);

	if(class_exists('Tribe__Events__Pro__Main')) {
		if( function_exists( 'tribe_is_photo') && !tribe_is_photo()) {
			wp_enqueue_script('isotope-pkgd', get_theme_file_uri('/framework/js/isotope.pkgd.min.js'), array(), false, true);
		}
	} else {
		wp_enqueue_script('isotope-pkgd', get_theme_file_uri('/framework/js/isotope.pkgd.min.js'), array(), false, true);
	}
	
	if( cs_get_option('enable-cookie-consent') == "true" ) {
		wp_enqueue_script('kalvi-cookie-js', get_theme_file_uri('/framework/js/cookieconsent.js'), array(), false, true);
	}

	wp_enqueue_script('kalvi-popup-js', get_theme_file_uri('/framework/js/magnific/jquery.magnific-popup.min.js'), array(), false, true);

	if( $loadingbar == 'enable' ) {
		wp_enqueue_script('pace', get_theme_file_uri('/framework/js/pace.min.js'),array(),false,true);
		wp_localize_script('pace', 'paceOptions', array(
			'restartOnRequestAfter' => 'false',
			'restartOnPushState' => 'false'
		));
	}

	wp_enqueue_script('kalvi-jqcustom', get_theme_file_uri('/framework/js/custom.js'), array(), false, true);

	wp_localize_script('jquery', 'dttheme_urls', array(
		'theme_base_url' => esc_js(KALVI_THEME_URI),
		'framework_base_url' => esc_js(KALVI_THEME_URI).'/framework/',
		'ajaxurl' => esc_url( admin_url('admin-ajax.php') ),
		'url' => esc_url( get_site_url() ),
		'isRTL' => esc_js($rtl),
		'loadingbar' => esc_js($loadingbar),
		'advOptions' => esc_html__('Show Advanced Options', 'kalvi'),
		'wpnonce' => wp_create_nonce('rating-nonce')
	));

}

/* ---------------------------------------------------------------------------
 * Scripts of Custom JS from Theme Back-End
* --------------------------------------------------------------------------- */
function kalvi_scripts_custom() {
	
	$enable_custom_js = (int) get_theme_mod( 'enable-custom-js', kalvi_defaults('enable-custom-js') );
	$custom_js = get_theme_mod( 'custom-js', '');
	
	if( !empty( $enable_custom_js ) && !empty( $custom_js ) ){
		wp_add_inline_script('kalvi-jqcustom', kalvi_wp_kses(stripslashes($custom_js)) ,'after');
	}
}
add_action('wp_enqueue_scripts', 'kalvi_scripts_custom', 100);

/* ---------------------------------------------------------------------------
 * Loading Theme Styles
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'kalvi_enqueue_styles', 101 );
function kalvi_enqueue_styles() {

	// site icons ---------------------------------------------------------------
	if ( ! has_site_icon() ):
		$url = KALVI_THEME_URI . "/images/favicon.ico";
		echo "<link href='$url' rel='shortcut icon' type='image/x-icon' />\n";		
	endif;

	// wp_enqueue_style ---------------------------------------------------------------
	wp_enqueue_style( 'kalvi', get_stylesheet_uri(), false, KALVI_THEME_VERSION, 'all' );

	wp_enqueue_style( 'kalvi-base',		  get_theme_file_uri('/css/base.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-grid', 		  get_theme_file_uri('/css/grid.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-widget', 	  get_theme_file_uri('/css/widget.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-layout', 	  get_theme_file_uri('/css/layout.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-megamenu',   get_theme_file_uri('/css/megamenu.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-blog',	      get_theme_file_uri('/css/blog.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-contact',	  get_theme_file_uri('/css/contact.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-custom-class', get_theme_file_uri('/css/custom-class.css'), false, KALVI_THEME_VERSION, 'all' );
	wp_enqueue_style( 'kalvi-browsers', 	  get_theme_file_uri('/css/browsers.css'), false, KALVI_THEME_VERSION, 'all' );

	wp_enqueue_style( 'prettyphoto',	get_theme_file_uri('/css/prettyPhoto.css'), false, KALVI_THEME_VERSION, 'all' );

	if (function_exists('bp_add_cover_image_inline_css')) {
		$inline_css = bp_add_cover_image_inline_css( true );
		wp_add_inline_style( 'bp-parent-css', strip_tags( $inline_css['css_rules'] ) );
	}

	// icon fonts ---------------------------------------------------------------------
	wp_enqueue_style ( 'custom-font-awesome',		get_theme_file_uri('/css/font-awesome.min.css'), array (), '4.3.0' );
	wp_enqueue_style ( 'pe-icon-7-stroke',			get_theme_file_uri('/css/pe-icon-7-stroke.css'), array () );
	wp_enqueue_style ( 'stroke-gap-icons-style',	get_theme_file_uri('/css/stroke-gap-icons-style.css'), array () );
	wp_enqueue_style ( 'icomoon',					get_theme_file_uri('/css/icomoon.css'), array () );
	wp_enqueue_style ( 'icon-moon',					get_theme_file_uri('/css/icon-moon.css'), array () );
	wp_enqueue_style ( 'material-design-iconic',	get_theme_file_uri('/css/material-design-iconic-font.min.css'), array () );

	// comingsoon css
	if( cs_get_option( 'enable-comingsoon' ) )
		wp_enqueue_style("kalvi-comingsoon",  get_theme_file_uri("/css/comingsoon.css"), false, KALVI_THEME_VERSION, 'all' );

	// notfound css
	if ( is_404() )
		wp_enqueue_style("kalvi-notfound",	get_theme_file_uri("/css/notfound.css"), false, KALVI_THEME_VERSION, 'all' );

	// loader css
	$loadingbar = cs_get_option( 'use-site-loader' );
	if( !empty( $loadingbar ) )
		wp_enqueue_style("kalvi-loader", 		get_theme_file_uri("/css/loaders.css"), false, KALVI_THEME_VERSION, 'all' );

	// woocommerce css
	if( function_exists( 'is_woocommerce' ) ):
		wp_enqueue_style( 'kalvi-woo-default', 		get_theme_file_uri('/css/woocommerce/woocommerce-default.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type1', 			get_theme_file_uri('/css/woocommerce/type1-fashion.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type4', 			get_theme_file_uri('/css/woocommerce/type4-hosting.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type8', 			get_theme_file_uri('/css/woocommerce/type8-insurance.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type10', 		get_theme_file_uri('/css/woocommerce/type10-medical.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type11', 		get_theme_file_uri('/css/woocommerce/type11-model.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type12', 		get_theme_file_uri('/css/woocommerce/type12-attorney.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type13', 		get_theme_file_uri('/css/woocommerce/type13-architecture.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type14', 		get_theme_file_uri('/css/woocommerce/type14-fitness.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type16', 		get_theme_file_uri('/css/woocommerce/type16-photography.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type17', 		get_theme_file_uri('/css/woocommerce/type17-restaurant.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type20', 		get_theme_file_uri('/css/woocommerce/type20-yoga.css'), false, KALVI_THEME_VERSION, 'all' );
		wp_enqueue_style( 'kalvi-woo-type21', 		get_theme_file_uri('/css/woocommerce/type21-styleshop.css'), false, KALVI_THEME_VERSION, 'all' );

		wp_enqueue_style( 'kalvi-woo', 				get_theme_file_uri('/css/woocommerce.css'), 'woocommerce-general-css', KALVI_THEME_VERSION, 'all' );
	endif;

	// tribe-events -------------------------------------------------------------------
	wp_enqueue_style( 'kalvi-customevent', 		get_theme_file_uri('/tribe-events/custom.css'), false, KALVI_THEME_VERSION, 'all' );
	
	// cookie-consent -----------------------------------------------------------------
	if( cs_get_option('enable-cookie-consent') == "true" ) {
		wp_enqueue_style( 'kalvi-cookie-css', 		get_theme_file_uri('/css/cookieconsent.css'), false, KALVI_THEME_VERSION, 'all' );
	}

	wp_enqueue_style( 'kalvi-popup-css', 		get_theme_file_uri('/framework/js/magnific/magnific-popup.css'), false, KALVI_THEME_VERSION, 'all' );

	// custom css ---------------------------------------------------------------------
	wp_enqueue_style( 'kalvi-custom', 			get_theme_file_uri('/css/custom.css'), false, KALVI_THEME_VERSION, 'all' );

	// jquery scripts --------------------------------------------
	wp_enqueue_script('modernizr-custom', 	get_theme_file_uri('/framework/js/modernizr.custom.js'), array('jquery'));

	// rtl ----------------------------------------------------------------------------
	if(is_rtl()) wp_enqueue_style('kalvi-rtl', 	get_theme_file_uri('/css/rtl.css'), false, KALVI_THEME_VERSION, 'all' );

	// gutenberg css ---------------------------------------------------------------------
	wp_enqueue_style( 'kalvi-gutenberg', get_theme_file_uri('/css/gutenberg.css'), false, KALVI_THEME_VERSION, 'all' );

	$primary_color = get_theme_mod('primary-color',kalvi_defaults('primary-color'));
	$secondary_color = get_theme_mod('secondary-color',kalvi_defaults('secondary-color'));
	$tertiary_color = get_theme_mod('tertiary-color',kalvi_defaults('tertiary-color'));
	
	$css = '';

	if( !empty( $primary_color ) ) {

		$rgba = kalvi_hex2rgb( $primary_color );
		$rgba = implode(',', $rgba);

		# Widget Style
		$widget_style = cs_get_option( 'wtitle-style' );
		if( $widget_style == 'type5' ) {
			$css .= '.secondary-sidebar .type5 .widgettitle { border-color:rgba('.$rgba.', 0.5) }';
		} if( $widget_style == 'type12' ) {
			$css .= '.secondary-sidebar .type12 .widgettitle { background: rgba('.$rgba.', 0.2) }';
		}

		$css .= '.dt-sc-menu-sorting a { color: rgba('.$rgba.', 0.6) }';
		$css .= '.dt-sc-team.type2 .dt-sc-team-thumb .dt-sc-team-thumb-overlay, .dt-sc-hexagon-image span:before, .dt-sc-keynote-speakers .dt-sc-speakers-thumb .dt-sc-speakers-thumb-overlay {  background: rgba('.$rgba.', 0.9) }';

		$css .= '.portfolio .image-overlay, .recent-portfolio-widget ul li a:before, .dt-sc-fitness-program-short-details-wrapper .dt-sc-fitness-program-short-details { background: rgba('.$rgba.', 0.9) }';

		# Shortcode
		$css .= '.dt-sc-icon-box.type10 .icon-wrapper:before, .dt-sc-pr-tb-col.type2 .dt-sc-tb-header:before { box-shadow:5px 0px 0px 0px '.$primary_color.'}';
		$css .= '.dt-sc-icon-box.type10:hover .icon-wrapper:before { box-shadow:7px 0px 0px 0px '.$primary_color.'}';
		$css .= '.dt-sc-counter.type6 .dt-sc-couter-icon-holder:before { box-shadow:5px 1px 0px 0px '.$primary_color.'}';
		$css .= '.dt-sc-button.with-shadow.white, .dt-sc-pr-tb-col.type2 .dt-sc-buy-now a { box-shadow:3px 3px 0px 0px '.$primary_color.'}';
		$css .= '.custom-blockquote:hover .custom-blockquote-content-section .dt-sc-image-flip { box-shadow:0px 0px 0px 10px '.$primary_color.'}';

		$css .= '.dt-sc-restaurant-events-list .dt-sc-restaurant-event-details h6:before { border-bottom-color: rgba('.$rgba.',0.6) }';
		$css .= '.portfolio.type4 .image-overlay, .dt-sc-timeline-section.type4 .dt-sc-timeline-thumb-overlay, .dt-sc-yoga-classes .dt-sc-yoga-classes-image-wrapper:before, .dt-sc-yoga-course .dt-sc-yoga-course-thumb-overlay, .dt-sc-yoga-program .dt-sc-yoga-program-thumb-overlay, .dt-sc-yoga-pose .dt-sc-yoga-pose-thumb:before, .dt-sc-yoga-teacher .dt-sc-yoga-teacher-thumb:before, .dt-sc-doctors .dt-sc-doctors-thumb-overlay, .dt-sc-event-addon > .dt-sc-event-addon-date, .dt-sc-course .dt-sc-course-overlay, .dt-sc-process-steps .dt-sc-process-thumb-overlay { background: rgba('.$rgba.',0.85) }';

		$css .= '@media only screen and (max-width: 767px) { .dt-sc-contact-info.type4:after, .dt-sc-icon-box.type10 .icon-content h4:after, .dt-sc-counter.type6.last h4::before, .dt-sc-counter.type6 h4::after { background-color:'.$primary_color.'} }';
		$css .= '@media only screen and (max-width: 767px) { .dt-sc-timeline-section.type2, .dt-sc-timeline-section.type2::before { border-color:'.$primary_color.'} }';
		
		# WooCommerce
		if( function_exists( 'is_woocommerce' ) ){

			$css .= '.woocommerce ul.products li.product .woo-type1 .star-rating:before, .woocommerce ul.products li.product .woo-type1 .star-rating span:before, .woocommerce ul.products li.product .woo-type1 .star-rating:before, .woocommerce ul.products li.product .woo-type1 .star-rating span:before, .woocommerce .woo-type1 .star-rating:before, .woocommerce .woo-type1 .star-rating span:before, .woocommerce .woo-type1 .star-rating:before, .woocommerce .woo-type1 .star-rating span:before { color: rgba('.$rgba.', 0.75) }';
			$css .= '.woocommerce ul.products li.product:hover .woo-type8 .product-content, .woocommerce ul.products li.product-category:hover .woo-type8 .product-thumb .image:after, .woocommerce ul.products li.product:hover .woo-type8 .product-content, .woocommerce ul.products li.product-category:hover .woo-type8 .product-thumb .image:after, .woocommerce ul.products li.product:hover .woo-type13 .product-content, .woocommerce ul.products li.product:hover .woo-type13 .product-content, .woocommerce ul.products li.product.instock:hover .woo-type13 .on-sale-product .product-content, .woocommerce ul.products li.product.instock:hover .woo-type13 .on-sale-product .product-content, .woocommerce ul.products li.product.outofstock:hover .woo-type13 .out-of-stock-product .product-content, .woocommerce ul.products li.product.outofstock:hover .woo-type13 .out-of-stock-product .product-content, .woocommerce ul.products li.product-category:hover .woo-type13 .product-thumb .image:after, .woocommerce ul.products li.product-category:hover .woo-type13 .product-thumb .image:after { background-color: rgba('.$rgba.', 0.75) }';

			$css .= '.woocommerce ul.products li.product:hover .woo-type8 .product-content:after, .woocommerce ul.products li.product:hover .woo-type8 .product-content:after {
				border-color : rgba( '.$rgba.', 0.75 ) rgba('.$rgba.', 0.75 ) rgba(255, 255, 255, 0.35) rgba(255, 255, 255, 0.35)
			}';				

			$css .= 'ul.products li.product:hover .woo-type11 .product-wrapper {
				-webkit-box-shadow: 0 0 0 3px '.$primary_color.';
				-moz-box-shadow: 0 0 0 3px '.$primary_color.';
				-ms-box-shadow: 0 0 0 3px '.$primary_color.';
				-o-box-shadow: 0 0 0 3px '.$primary_color.';
				box-shadow: 0 0 0 3px '.$primary_color.';
			}';

			$css .= '.woo-type12 ul.products li.product .product-details {
				-webkit-box-shadow: 0 -3px 0 0 '.$primary_color.' inset;
				-moz-box-shadow: 0 -3px 0 0 '.$primary_color.' inset;
				-ms-box-shadow: 0 -3px 0 0 '.$primary_color.' inset;
				-o-box-shadow: 0 -3px 0 0 '.$primary_color.' inset;
				box-shadow: 0 -3px 0 0 '.$primary_color.' inset;
			}';

			$css .= 'ul.products li.product .woo-type14 .product-details, ul.products li.product .woo-type14 .product-details h5:after {
				-webkit-box-shadow: 0 0 0 2px '.$primary_color.' inset;
				-moz-box-shadow: 0 0 0 2px '.$primary_color.' inset;
				-ms-box-shadow: 0 0 0 2px '.$primary_color.' inset;
				-o-box-shadow: 0 0 0 2px '.$primary_color.' inset;
				box-shadow: 0 0 0 2px '.$primary_color.' inset;					
			}';
		}			
	}

	if( !empty( $secondary_color ) ) {

		$rgba = kalvi_hex2rgb( $secondary_color );
		$rgba = implode(',', $rgba);

		$css .= '.dt-sc-event-month-thumb .dt-sc-event-read-more, .dt-sc-training-thumb-overlay{ background: rgba('.$rgba.',0.85) }';

		# Shortcode
		$css .= '@media only screen and (max-width: 767px) { .dt-sc-highlight .dt-sc-testimonial.type6 .dt-sc-testimonial-author:after,.dt-sc-highlight .dt-sc-testimonial.type6 .dt-sc-testimonial-author:after,.skin-highlight .dt-sc-testimonial.type6 .dt-sc-testimonial-author:after { background-color:'.$secondary_color.'} }';

		# WooCommerce
		if( function_exists( 'is_woocommerce' ) ){

			$css .= 'ul.products li.product:hover .woo-type8 .product-details h5:after { border-color: rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) '.$secondary_color.' rgba(0, 0, 0, 0); }';

			$css .= 'ul.products li.product .woo-type20 .product-thumb a.add_to_cart_button:hover, ul.products li.product .woo-type20 .product-thumb a.button.product_type_simple:hover, ul.products li.product .woo-type20 .product-thumb a.button.product_type_variable:hover, ul.products li.product .woo-type20 .product-thumb a.added_to_cart.wc-forward:hover, ul.products li.product .woo-type20 .product-thumb a.add_to_wishlist:hover, ul.products li.product .woo-type20 .product-thumb .yith-wcwl-wishlistaddedbrowse a:hover, ul.products li.product .woo-type20 .product-thumb .yith-wcwl-wishlistexistsbrowse a:hover, ul.products li.product:hover .woo-type20 .product-wrapper, .woocommerce ul.products li.product .woo-type20 .product-buttons-wrapper a.yith-wcqv-button:hover, .woocommerce ul.products li.product .woo-type20 .product-buttons-wrapper a.yith-woocompare-button:hover { background-color: rgba('.$rgba.',0.5 )}';
			
			$css .= '.woocommerce ul.products li.product:hover .woo-type20 .product-buttons-wrapper { background-color: rgba('.$rgba.', 0.3); }';
		}	
	}

	if( !empty( $tertiary_color ) ) {

		$rgba = kalvi_hex2rgb( $tertiary_color );
		$rgba = implode(',', $rgba);

		$css .= '.dt-sc-faculty .dt-sc-faculty-thumb-overlay { background: rgba('.$rgba.',0.9) }';

		# WooCommerce
		if( function_exists( 'is_woocommerce' ) ){

			$css .= 'ul.products li.product:hover .woo-type1 .product-thumb:after { 
				-webkit-box-shadow: 0 0 0 10px rgba('. $rgba.',0.35) inset;
				-moz-box-shadow: 0 0 0 10px rgba('. $rgba.',0.35) inset;
				-ms-box-shadow: 0 0 0 10px rgba('. $rgba.',0.35) inset;
				-o-box-shadow: 0 0 0 10px rgba('. $rgba.',0.35) inset;
				box-shadow: 0 0 0 10px rgba('. $rgba.',0.35) inset;
			}';

			$css .= 'ul.products li.product .woo-type20 .product-wrapper {
				-webkit-box-shadow: 0 0 0 5px rgba('. $rgba.',0.75) inset;
				-moz-box-shadow: 0 0 0 5px rgba('. $rgba.',0.75) inset;
				-ms-box-shadow: 0 0 0 5px rgba('. $rgba.',0.75) inset;
				-o-box-shadow: 0 0 0 5px rgba('. $rgba.',0.75) inset;
				box-shadow: 0 0 0 5px rgba('. $rgba.',0.75) inset;					
			}';
		}
	}
	
	if( !empty($primary_color) && !empty($secondary_color) && !empty($tertiary_color) ) {

		$css .= '@-webkit-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; }  100% { color:'.$tertiary_color.'; } }';
		$css .= '@-moz-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; } }';
		$css .= '@-ms-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; }	}';
		$css .= '@-o-keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; }	}';
		$css .= '@keyframes color-change { 0% { color:'.$primary_color.'; } 50% { color:'.$secondary_color.'; } 100% { color:'.$tertiary_color.'; }	}';
	}

	wp_add_inline_style( 'kalvi-custom', $css );

	$fonts = cs_get_option('custom_font_fields');
	$fonts = (isset($fonts) && !empty($fonts)) ? $fonts : array ();
	if( count( $fonts ) > 0 ){
		wp_add_inline_style('kalvi-custom', kalvi_styles_custom_font() );
	}
}

add_action( 'wp_enqueue_scripts', 'kalvi_enqueue_custom_inline', 999 );
if ( ! function_exists( 'kalvi_enqueue_custom_inline' ) ) {
	function kalvi_enqueue_custom_inline() {
		wp_register_style( 'kalvi-custom-inline', '', array(), KALVI_THEME_VERSION, 'all' );
	}
}

/* ---------------------------------------------------------------------------
 * Styles of Custom Font
 * --------------------------------------------------------------------------- */
function kalvi_styles_custom_font() {
	$out = '';

	$fonts = cs_get_option('custom_font_fields');
	$fonts = (is_array($fonts) && !empty($fonts)) ? $fonts : array ();

	if( count( $fonts ) > 0 ){
		foreach( $fonts as $font ):
			$out .= '@font-face {';
				$out .= 'font-family: "'. $font['custom_font_name'] .'";';
				$out .= 'src: url("'. $font['custom_font_woof'] .'") format("woff"),';
					$out .= 'url("'. $font['custom_font_woof2'] .'") format("woff2");';
				$out .= 'font-weight: normal;';
				$out .= 'font-style: normal;';
			$out .= '}';
		endforeach;
	}

	return $out;
}

/* ---------------------------------------------------------------------------
 * Site SSL Compatibility
 * --------------------------------------------------------------------------- */
function kalvi_ssl( $echo = false ){
	$ssl = '';
	if( is_ssl() ) $ssl = 's';
	if( $echo ){
		echo esc_html($ssl);
	}
	return $ssl;
}

if( !function_exists('kalvi_getVimeoThumb') ) {
	function kalvi_getVimeoThumb($id) {
		$data = wp_remote_fopen("http".kalvi_ssl()."://vimeo.com/api/v2/video/$id.json");
		$data = json_decode($data);
		return $data[0]->thumbnail_medium;
	}
}

/* ---------------------------------------------------------------------------
 * Body Class Filter for layout changes
 * --------------------------------------------------------------------------- */
function kalvi_body_classes( $classes ) {
	
	// layout
	$classes[] 		= 	'layout-'. get_theme_mod( 'site-layout', kalvi_defaults('site-layout') );
	
	if( is_page() ) {
		global $post;
		$page_meta = get_post_meta( $post->ID, '_tpl_default_settings', true );
		$page_meta = is_array( $page_meta ) ? $page_meta : array();

		if( array_key_exists( 'show_slider', $page_meta ) && $page_meta['show_slider'] ) {
			$classes[] = "page-with-slider";
		}
		if( array_key_exists( 'enable-sub-title', $page_meta ) && !($page_meta['enable-sub-title']) ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( is_singular('post') ) {
		global $post;
		$post_meta = get_post_meta( $post->ID, '_dt_post_settings', true );
		$post_meta = is_array( $post_meta ) ? $post_meta : array();

		if( array_key_exists( 'enable-sub-title', $post_meta ) && !($post_meta['enable-sub-title']) ) {
			$classes[] = "no-breadcrumb";
		}
	} elseif( is_home() ) {
		$pageid = get_option('page_for_posts');
		$page_meta = get_post_meta( $pageid, '_tpl_default_settings', true );
		$page_meta = is_array( $page_meta ) ? $page_meta : array();

		if( array_key_exists( 'show_slider', $page_meta ) && $page_meta['show_slider'] ) {
			$classes[] = "page-with-slider";
		}
	} else {
		$show_breadcrump = cs_get_option('show-breadcrumb');
		if( is_null( $show_breadcrump ) ) {
			$classes[] = "no-breadcrumb";
		}
	}

	# Gutenberg Class
	if ( is_singular() && function_exists('has_blocks') && has_blocks()) {
		$classes[] = 'has-gutenberg-blocks';
	}
	# Browsers
	global $is_macIE, $is_winIE, $is_IE, $is_gecko;

	if( $is_gecko )
		$classes[] = 'browser-firefox';

	if( $is_macIE || $is_winIE || $is_IE )
		$classes[] = 'browser-ie';

	return $classes;
}
add_filter( 'body_class', 'kalvi_body_classes' );?>