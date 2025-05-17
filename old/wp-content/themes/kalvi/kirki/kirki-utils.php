<?php
function kalvi_kirki_config() {
	return 'kalvi_kirki_config';
}

function kalvi_defaults( $key = '' ) {
	$defaults = array();

	# site identify
	$defaults['use-custom-logo'] = '1';
	$defaults['custom-logo'] = KALVI_THEME_URI.'/images/logo.png';
	$defaults['custom-light-logo'] = KALVI_THEME_URI.'/images/light-logo.png';
	$defaults['site_icon'] = KALVI_THEME_URI.'/images/favicon.ico';
	$defaults['custom-title-color'] = '#000000';

	# site layout
	$defaults['site-layout'] = 'wide';

	# site skin
	$defaults['primary-color'] = '#ffcc21';
	$defaults['secondary-color'] = '#40c4ff';
	$defaults['tertiary-color'] = '#9bafc6';

	$defaults['body-bg-color']      = '#ffffff';
	$defaults['body-content-color'] = '#2f2f2f';
	$defaults['body-a-color']       = '#0089cf';
	$defaults['body-a-hover-color'] = '#40c4ff';

	# site breadcrumb
	$defaults['customize-breadcrumb-title-typo'] = '1';
	$defaults['breadcrumb-title-typo'] = array( 'font-family' => 'Poppins',
		'variant' => '700',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '40px',
		'line-height' => '',
		'letter-spacing' => '0.5px',
		'color' => '#ffffff',
		'text-align' => 'unset',
		'text-transform' => 'Uppercase' );
	$defaults['customize-breadcrumb-typo'] = '1';
	$defaults['breadcrumb-typo'] = array( 'font-family' => 'Poppins',
		'variant' => 'regular',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '16px',
		'line-height' => '',
		'letter-spacing' => '0',
		'color' => '#ffffff',
		'text-align' => 'unset',
		'text-transform' => 'Uppercase' );
	$defaults['customize-breadcrumb-content-typo'] = '1';
	$defaults['breadcrumb-content-typo'] = array( 'font-family' => 'Poppins',
		'variant' => 'regular',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '16px',
		'line-height' => '',
		'letter-spacing' => '0',
		'color' => '#ffffff',
		'text-align' => 'unset',
		'text-transform' => 'Uppercase' );

	# site footer
	$defaults['customize-footer-title-typo'] = '1';
	$defaults['footer-title-typo'] = array( 'font-family' => 'Poppins',
		'variant' => '500',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '20px',
		'line-height' => '36px',
		'letter-spacing' => '0',
		'color' => '#222222',
		'text-align' => 'left',
		'text-transform' => 'none' );
	$defaults['customize-footer-content-typo'] = '1';
	$defaults['footer-content-typo'] = array( 'font-family' => 'Poppins',
		'variant' => 'regular',
		'subsets' => array( 'latin-ext' ),
		'font-size' => '16px',
		'line-height' => '24px',
		'letter-spacing' => '0',
		'color' => '#777777',
		'text-align' => 'left',
		'text-transform' => 'none' );

	# site typography
	$defaults['customize-body-h1-typo'] = '1';
	$defaults['h1'] = array(
		'font-family' => 'Poppins',
		'variant' => '500',
		'font-size' => '50px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#222222',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h2-typo'] = '1';
	$defaults['h2'] = array(
		'font-family' => 'Poppins',
		'variant' => '500',
		'font-size' => '40px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#222222',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h3-typo'] = '1';
	$defaults['h3'] = array(
		'font-family' => 'Poppins',
		'variant' => '500',
		'font-size' => '30px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#222222',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h4-typo'] = '1';
	$defaults['h4'] = array(
		'font-family' => 'Poppins',
		'variant' => '500',
		'font-size' => '24px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#222222',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h5-typo'] = '1';
	$defaults['h5'] = array(
		'font-family' => 'Poppins',
		'variant' => '500',
		'font-size' => '20px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#222222',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-h6-typo'] = '1';
	$defaults['h6'] = array(
		'font-family' => 'Poppins',
		'variant' => '500',
		'font-size' => '18px',
		'line-height' => '',
		'letter-spacing' => '0px',
		'color' => '#222222',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);
	$defaults['customize-body-content-typo'] = '1';
	$defaults['body-content-typo'] = array(
		'font-family' => 'Roboto',
		'variant' => '300',
		'font-size' => '16px',
		'line-height' => '28px',
		'letter-spacing' => '',
		'color' => '#2f2f2f',
		'text-align' => 'unset',
		'text-transform' => 'none'
	);

	if( !empty( $key ) && array_key_exists( $key, $defaults) ) {
		return $defaults[$key];
	}

	return '';
}

function kalvi_image_positions() {

	$positions = array( "top left" => esc_attr__('Top Left','kalvi'),
		"top center"    => esc_attr__('Top Center','kalvi'),
		"top right"     => esc_attr__('Top Right','kalvi'),
		"center left"   => esc_attr__('Center Left','kalvi'),
		"center center" => esc_attr__('Center Center','kalvi'),
		"center right"  => esc_attr__('Center Right','kalvi'),
		"bottom left"   => esc_attr__('Bottom Left','kalvi'),
		"bottom center" => esc_attr__('Bottom Center','kalvi'),
		"bottom right"  => esc_attr__('Bottom Right','kalvi'),
	);

	return $positions;
}

function kalvi_image_repeats() {

	$image_repeats = array( "repeat" => esc_attr__('Repeat','kalvi'),
		"repeat-x"  => esc_attr__('Repeat in X-axis','kalvi'),
		"repeat-y"  => esc_attr__('Repeat in Y-axis','kalvi'),
		"no-repeat" => esc_attr__('No Repeat','kalvi')
	);

	return $image_repeats;
}

function kalvi_border_styles() {

	$image_repeats = array(
		"none"	 => esc_attr__('None','kalvi'),
		"dotted" => esc_attr__('Dotted','kalvi'),
		"dashed" => esc_attr__('Dashed','kalvi'),
		"solid"	 => esc_attr__('Solid','kalvi'),
		"double" => esc_attr__('Double','kalvi'),
		"groove" => esc_attr__('Groove','kalvi'),
		"ridge"	 => esc_attr__('Ridge','kalvi'),
	);

	return $image_repeats;
}

function kalvi_animations() {

	$animations = array(
		'' 					 => esc_html__('Default','kalvi'),	
		"bigEntrance"        =>  esc_attr__("bigEntrance",'kalvi'),
        "bounce"             =>  esc_attr__("bounce",'kalvi'),
        "bounceIn"           =>  esc_attr__("bounceIn",'kalvi'),
        "bounceInDown"       =>  esc_attr__("bounceInDown",'kalvi'),
        "bounceInLeft"       =>  esc_attr__("bounceInLeft",'kalvi'),
        "bounceInRight"      =>  esc_attr__("bounceInRight",'kalvi'),
        "bounceInUp"         =>  esc_attr__("bounceInUp",'kalvi'),
        "bounceOut"          =>  esc_attr__("bounceOut",'kalvi'),
        "bounceOutDown"      =>  esc_attr__("bounceOutDown",'kalvi'),
        "bounceOutLeft"      =>  esc_attr__("bounceOutLeft",'kalvi'),
        "bounceOutRight"     =>  esc_attr__("bounceOutRight",'kalvi'),
        "bounceOutUp"        =>  esc_attr__("bounceOutUp",'kalvi'),
        "expandOpen"         =>  esc_attr__("expandOpen",'kalvi'),
        "expandUp"           =>  esc_attr__("expandUp",'kalvi'),
        "fadeIn"             =>  esc_attr__("fadeIn",'kalvi'),
        "fadeInDown"         =>  esc_attr__("fadeInDown",'kalvi'),
        "fadeInDownBig"      =>  esc_attr__("fadeInDownBig",'kalvi'),
        "fadeInLeft"         =>  esc_attr__("fadeInLeft",'kalvi'),
        "fadeInLeftBig"      =>  esc_attr__("fadeInLeftBig",'kalvi'),
        "fadeInRight"        =>  esc_attr__("fadeInRight",'kalvi'),
        "fadeInRightBig"     =>  esc_attr__("fadeInRightBig",'kalvi'),
        "fadeInUp"           =>  esc_attr__("fadeInUp",'kalvi'),
        "fadeInUpBig"        =>  esc_attr__("fadeInUpBig",'kalvi'),
        "fadeOut"            =>  esc_attr__("fadeOut",'kalvi'),
        "fadeOutDownBig"     =>  esc_attr__("fadeOutDownBig",'kalvi'),
        "fadeOutLeft"        =>  esc_attr__("fadeOutLeft",'kalvi'),
        "fadeOutLeftBig"     =>  esc_attr__("fadeOutLeftBig",'kalvi'),
        "fadeOutRight"       =>  esc_attr__("fadeOutRight",'kalvi'),
        "fadeOutUp"          =>  esc_attr__("fadeOutUp",'kalvi'),
        "fadeOutUpBig"       =>  esc_attr__("fadeOutUpBig",'kalvi'),
        "flash"              =>  esc_attr__("flash",'kalvi'),
        "flip"               =>  esc_attr__("flip",'kalvi'),
        "flipInX"            =>  esc_attr__("flipInX",'kalvi'),
        "flipInY"            =>  esc_attr__("flipInY",'kalvi'),
        "flipOutX"           =>  esc_attr__("flipOutX",'kalvi'),
        "flipOutY"           =>  esc_attr__("flipOutY",'kalvi'),
        "floating"           =>  esc_attr__("floating",'kalvi'),
        "hatch"              =>  esc_attr__("hatch",'kalvi'),
        "hinge"              =>  esc_attr__("hinge",'kalvi'),
        "lightSpeedIn"       =>  esc_attr__("lightSpeedIn",'kalvi'),
        "lightSpeedOut"      =>  esc_attr__("lightSpeedOut",'kalvi'),
        "pullDown"           =>  esc_attr__("pullDown",'kalvi'),
        "pullUp"             =>  esc_attr__("pullUp",'kalvi'),
        "pulse"              =>  esc_attr__("pulse",'kalvi'),
        "rollIn"             =>  esc_attr__("rollIn",'kalvi'),
        "rollOut"            =>  esc_attr__("rollOut",'kalvi'),
        "rotateIn"           =>  esc_attr__("rotateIn",'kalvi'),
        "rotateInDownLeft"   =>  esc_attr__("rotateInDownLeft",'kalvi'),
        "rotateInDownRight"  =>  esc_attr__("rotateInDownRight",'kalvi'),
        "rotateInUpLeft"     =>  esc_attr__("rotateInUpLeft",'kalvi'),
        "rotateInUpRight"    =>  esc_attr__("rotateInUpRight",'kalvi'),
        "rotateOut"          =>  esc_attr__("rotateOut",'kalvi'),
        "rotateOutDownRight" =>  esc_attr__("rotateOutDownRight",'kalvi'),
        "rotateOutUpLeft"    =>  esc_attr__("rotateOutUpLeft",'kalvi'),
        "rotateOutUpRight"   =>  esc_attr__("rotateOutUpRight",'kalvi'),
        "shake"              =>  esc_attr__("shake",'kalvi'),
        "slideDown"          =>  esc_attr__("slideDown",'kalvi'),
        "slideExpandUp"      =>  esc_attr__("slideExpandUp",'kalvi'),
        "slideLeft"          =>  esc_attr__("slideLeft",'kalvi'),
        "slideRight"         =>  esc_attr__("slideRight",'kalvi'),
        "slideUp"            =>  esc_attr__("slideUp",'kalvi'),
        "stretchLeft"        =>  esc_attr__("stretchLeft",'kalvi'),
        "stretchRight"       =>  esc_attr__("stretchRight",'kalvi'),
        "swing"              =>  esc_attr__("swing",'kalvi'),
        "tada"               =>  esc_attr__("tada",'kalvi'),
        "tossing"            =>  esc_attr__("tossing",'kalvi'),
        "wobble"             =>  esc_attr__("wobble",'kalvi'),
        "fadeOutDown"        =>  esc_attr__("fadeOutDown",'kalvi'),
        "fadeOutRightBig"    =>  esc_attr__("fadeOutRightBig",'kalvi'),
        "rotateOutDownLeft"  =>  esc_attr__("rotateOutDownLeft",'kalvi')
    );

	return $animations;
}

function kalvi_custom_fonts( $standard_fonts ){

	$custom_fonts = array();

	$fonts = cs_get_option('custom_font_fields');
	if( is_countable( $fonts ) && count( $fonts ) > 0 ):
		foreach( $fonts as $font ):
			$custom_fonts[$font['custom_font_name']] = array(
				'label' => $font['custom_font_name'],
				'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
				'stack' => $font['custom_font_name'] . ', sans-serif'
			);
		endforeach;
	endif;

	return array_merge_recursive( $custom_fonts, $standard_fonts );
}
add_filter( 'kirki/fonts/standard_fonts', 'kalvi_custom_fonts', 20 );