<?php
$config = kalvi_kirki_config();

KALVI_Kirki::add_section( 'dt_site_layout_section', array(
	'title' => esc_html__( 'Site Layout', 'kalvi' ),
	'priority' => 20
) );

	# site-layout
	KALVI_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'site-layout',
		'label'    => esc_html__( 'Site Layout', 'kalvi' ),
		'section'  => 'dt_site_layout_section',
		'default'  => kalvi_defaults('site-layout'),
		'choices' => array(
			'boxed' =>  KALVI_THEME_URI.'/kirki/assets/images/site-layout/boxed.png',
			'wide' => KALVI_THEME_URI.'/kirki/assets/images/site-layout/wide.png',
		)
	));

	# site-boxed-layout
	KALVI_Kirki::add_field( $config, array(
		'type'     => 'switch',
		'settings' => 'site-boxed-layout',
		'label'    => esc_html__( 'Customize Boxed Layout?', 'kalvi' ),
		'section'  => 'dt_site_layout_section',
		'default'  => '1',
		'choices'  => array(
			'on'  => esc_attr__( 'Yes', 'kalvi' ),
			'off' => esc_attr__( 'No', 'kalvi' )
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
		)			
	));

	# body-bg-type
	KALVI_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-type',
		'label'    => esc_html__( 'Background Type', 'kalvi' ),
		'section'  => 'dt_site_layout_section',
		'multiple' => 1,
		'default'  => 'none',
		'choices'  => array(
			'pattern' => esc_attr__( 'Predefined Patterns', 'kalvi' ),
			'upload' => esc_attr__( 'Set Pattern', 'kalvi' ),
			'none' => esc_attr__( 'None', 'kalvi' ),
		),
		'active_callback' => array(
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-pattern
	KALVI_Kirki::add_field( $config, array(
		'type'     => 'radio-image',
		'settings' => 'body-bg-pattern',
		'label'    => esc_html__( 'Predefined Patterns', 'kalvi' ),
		'description'    => esc_html__( 'Add Background for body', 'kalvi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'choices' => array(
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern1.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern1.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern2.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern2.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern3.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern3.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern4.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern4.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern5.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern5.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern6.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern6.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern7.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern7.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern8.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern8.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern9.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern9.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern10.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern10.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern11.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern11.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern12.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern12.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern13.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern13.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern14.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern14.jpg',
			KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern15.jpg'=> KALVI_THEME_URI.'/kirki/assets/images/site-layout/pattern15.jpg',
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'pattern' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)						
	));

	# body-bg-image
	KALVI_Kirki::add_field( $config, array(
		'type' => 'image',
		'settings' => 'body-bg-image',
		'label'    => esc_html__( 'Background Image', 'kalvi' ),
		'description'    => esc_html__( 'Add Background Image for body', 'kalvi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-image' )
		),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => '==', 'value' => 'upload' ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-position
	KALVI_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-position',
		'label'    => esc_html__( 'Background Position', 'kalvi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-position' )
		),
		'default' => 'center',
		'multiple' => 1,
		'choices' => kalvi_image_positions(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload') ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));

	# body-bg-repeat
	KALVI_Kirki::add_field( $config, array(
		'type' => 'select',
		'settings' => 'body-bg-repeat',
		'label'    => esc_html__( 'Background Repeat', 'kalvi' ),
		'section'  => 'dt_site_layout_section',
		'output' => array(
			array( 'element' => 'body' , 'property' => 'background-repeat' )
		),
		'default' => 'repeat',
		'multiple' => 1,
		'choices' => kalvi_image_repeats(),
		'active_callback' => array(
			array( 'setting' => 'body-bg-type', 'operator' => 'contains', 'value' => array( 'pattern', 'upload' ) ),
			array( 'setting' => 'site-layout', 'operator' => '==', 'value' => 'boxed' ),
			array( 'setting' => 'site-boxed-layout', 'operator' => '==', 'value' => '1' )
		)
	));	