<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => constant('KALVI_THEME_NAME').' '.esc_html__('Options', 'kalvi'),
  'menu_type'       => 'theme', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'cs-framework',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => sprintf(esc_html__('Designthemes Framework %sby Designthemes%s', 'kalvi'),'<small>','</small>')
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();

$options[]      = array(
  'name'        => 'general',
  'title'       => esc_html__('General', 'kalvi'),
  'icon'        => 'fa fa-gears',

  'fields'      => array(

	array(
	  'type'    => 'subheading',
	  'content' => esc_html__( 'General Options', 'kalvi' ),
	),
	
	array(
		'id'	=> 'header',
		'type'	=> 'select',
		'title'	=> esc_html__('Site Header', 'kalvi'),
		'class'	=> 'chosen',
		'options'	=> 'posts',
		'query_args'	=> array(
			'post_type'	=> 'dt_headers',
			'orderby'	=> 'title',
			'order'	=> 'ASC',
			'posts_per_page' => -1
		),
		'default_option'	=> esc_attr__('Select Header', 'kalvi'),
		'attributes'	=> array ( 'style'	=> 'width:50%'),
		'info'	=> esc_html__('Select default header.','kalvi'),
	),
	
	array(
		'id'	=> 'footer',
		'type'	=> 'select',
		'title'	=> esc_html__('Site Footer', 'kalvi'),
		'class'	=> 'chosen',
		'options'	=> 'posts',
		'query_args'	=> array(
			'post_type'	=> 'dt_footers',
			'orderby'	=> 'title',
			'order'	=> 'ASC',
			'posts_per_page' => -1
		),
		'default_option'	=> esc_attr__('Select Footer', 'kalvi'),
		'attributes'	=> array ( 'style'	=> 'width:50%'),
		'info'	=> esc_html__('Select defaultfooter.','kalvi'),
	),

	array(
	  'id'  	 => 'use-site-loader',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Site Loader', 'kalvi'),
	  'info'	 => esc_html__('YES! to use site loader.', 'kalvi')
	),	

	array(
	  'id'  	 => 'show-pagecomments',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Globally Show Page Comments', 'kalvi'),
	  'info'	 => esc_html__('YES! to show comments on all the pages. This will globally override your "Allow comments" option under your page "Discussion" settings.', 'kalvi'),
	  'default'  => true,
	),

	array(
	  'id'  	 => 'showall-pagination',
	  'type'  	 => 'switcher',
	  'title' 	 => esc_html__('Show all pages in Pagination', 'kalvi'),
	  'info'	 => esc_html__('YES! to show all the pages instead of dots near the current page.', 'kalvi')
	),



	array(
	  'id'      => 'google-map-key',
	  'type'    => 'text',
	  'title'   => esc_html__('Google Map API Key', 'kalvi'),
	  'after' 	=> '<p class="cs-text-info">'.esc_html__('Put a valid google account api key here', 'kalvi').'</p>',
	),

	array(
	  'id'      => 'mailchimp-key',
	  'type'    => 'text',
	  'title'   => esc_html__('Mailchimp API Key', 'kalvi'),
	  'after' 	=> '<p class="cs-text-info">'.esc_html__('Put a valid mailchimp account api key here', 'kalvi').'</p>',
	),

  ),
);

$options[]      = array(
  'name'        => 'layout_options',
  'title'       => esc_html__('Layout Options', 'kalvi'),
  'icon'        => 'dashicons dashicons-exerpt-view',
  'sections' => array(

	// -----------------------------------------
	// Header Options
	// -----------------------------------------
	array(
	  'name'      => 'breadcrumb_options',
	  'title'     => esc_html__('Breadcrumb Options', 'kalvi'),
	  'icon'      => 'fa fa-sitemap',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Breadcrumb Options", 'kalvi' ),
		  ),

		  array(
			'id'  		 => 'show-breadcrumb',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Breadcrumb', 'kalvi'),
			'info'		 => esc_html__('YES! to display breadcrumb for all pages.', 'kalvi'),
			'default' 	 => true,
		  ),

		  array(
			'id'           => 'breadcrumb-delimiter',
			'type'         => 'icon',
			'title'        => esc_html__('Breadcrumb Delimiter', 'kalvi'),
			'info'         => esc_html__('Choose delimiter style to display on breadcrumb section.', 'kalvi'),
			'default'      => 'fa fa-arrow-circle-right'
		  ),

		  array(
			'id'           => 'breadcrumb-style',
			'type'         => 'select',
			'title'        => esc_html__('Breadcrumb Style', 'kalvi'),
			'options'      => array(
			  'default' 							=> esc_html__('Default', 'kalvi'),
			  'aligncenter'    						=> esc_html__('Align Center', 'kalvi'),
			  'alignright'  						=> esc_html__('Align Right', 'kalvi'),
			  'breadcrumb-left'    					=> esc_html__('Left Side Breadcrumb', 'kalvi'),
			  'breadcrumb-right'     				=> esc_html__('Right Side Breadcrumb', 'kalvi'),
			  'breadcrumb-top-right-title-center'  	=> esc_html__('Top Right Title Center', 'kalvi'),
			  'breadcrumb-top-left-title-center'  	=> esc_html__('Top Left Title Center', 'kalvi'),
			),
			'class'        => 'chosen',
			'default'      => 'aligncenter',
			'info'         => esc_html__('Choose alignment style to display on breadcrumb section.', 'kalvi'),
		  ),

		  array(
			  'id'                 => 'breadcrumb-position',
			  'type'               => 'select',
			  'title'              => esc_html__('Position', 'kalvi' ),
			  'options'            => array(
				  'header-top-absolute'    => esc_html__('Behind the Header','kalvi'),
				  'header-top-relative'    => esc_html__('Default','kalvi'),
			  ),
			  'class'        => 'chosen',
			  'default'      => 'header-top-relative',
			  'info'         => esc_html__('Choose position of breadcrumb section.', 'kalvi'),
		  ),

		  array(
			'id'    => 'breadcrumb_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'kalvi'),
			'desc'  => esc_html__('Choose background options for breadcrumb title section.', 'kalvi'),
	        'default' => array(
					'image'      => KALVI_THEME_URI . '/images/breadcrumb.png',
					'attachment' => 'fixed',
					'size'       => 'cover',
					'color'      => '#000000',
	        )			
		  ),

		),
	),

  ),
);

$options[]      = array(
  'name'        => 'allpage_options',
  'title'       => esc_html__('All Page Options', 'kalvi'),
  'icon'        => 'fa fa-files-o',
  'sections' => array(

	// -----------------------------------------
	// Post Options
	// -----------------------------------------
	array(
	  'name'      => 'post_options',
	  'title'     => esc_html__('Post Options', 'kalvi'),
	  'icon'      => 'fa fa-file',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Single Post Options", 'kalvi' ),
		  ),
		
		  array(
			'id'  		 => 'single-post-authorbox',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Author Box', 'kalvi'),
			'info'		 => esc_html__('YES! to display author box in single blog posts.', 'kalvi')
		  ),

		  array(
			'id'  		 => 'single-post-related',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Related Posts', 'kalvi'),
			'info'		 => esc_html__('YES! to display related blog posts in single posts.', 'kalvi')
		  ),

		  array(
			'id'  		 => 'single-post-navigation',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Single Post Navigation', 'kalvi'),
			'info'		 => esc_html__('YES! to display post navigation in single posts.', 'kalvi')
		  ),

		  array(
			'id'  		 => 'single-post-comments',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Posts Comments', 'kalvi'),
			'info'		 => esc_html__('YES! to display single blog post comments.', 'kalvi'),
			'default' 	 => true,
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Post Archives Page Layout", 'kalvi' ),
		  ),

		  array(
			'id'      	 => 'post-archives-page-layout',
			'type'       => 'image_select',
			'title'      => esc_html__('Page Layout', 'kalvi'),
			'options'    => array(
			  'content-full-width'   => KALVI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => KALVI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'post-archives-page-layout',
			),
		  ),

		  array(
			'id'  		 => 'show-standard-left-sidebar-for-post-archives',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Standard Left Sidebar', 'kalvi'),
			'dependency' => array( 'post-archives-page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  		 => 'show-standard-right-sidebar-for-post-archives',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Show Standard Right Sidebar', 'kalvi'),
			'dependency' => array( 'post-archives-page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Post Archives Post Layout", 'kalvi' ),
		  ),

		  array(
			'id'      	   => 'post-archives-post-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Post Layout', 'kalvi'),
			'options'      => array(
			  'one-column' 		  => KALVI_THEME_URI . '/cs-framework-override/images/one-column.png',
			  'one-half-column'   => KALVI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
			  'one-third-column'  => KALVI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
			  '1-2-2'			  => KALVI_THEME_URI . '/cs-framework-override/images/1-2-2.png',
			  '1-2-2-1-2-2' 	  => KALVI_THEME_URI . '/cs-framework-override/images/1-2-2-1-2-2.png',
			  '1-3-3-3'			  => KALVI_THEME_URI . '/cs-framework-override/images/1-3-3-3.png',
			  '1-3-3-3-1' 		  => KALVI_THEME_URI . '/cs-framework-override/images/1-3-3-3-1.png',
			),
			'default'      => 'one-half-column',
		  ),

		  array(
			'id'           => 'post-style',
			'type'         => 'select',
			'title'        => esc_html__('Post Style', 'kalvi'),
			'options'      => array(
			  'blog-default-style' 		=> esc_html__('Default', 'kalvi'),
			  'entry-date-left'      	=> esc_html__('Date Left', 'kalvi'),
			  'entry-date-left outer-frame-border'      	=> esc_html__('Date Left Modern', 'kalvi'),
			  'entry-date-author-left'  => esc_html__('Date and Author Left', 'kalvi'),
			  'blog-modern-style'       => esc_html__('Modern', 'kalvi'),
			  'bordered'      			=> esc_html__('Bordered', 'kalvi'),
			  'classic'      			=> esc_html__('Classic', 'kalvi'),
			  'entry-overlay-style' 	=> esc_html__('Trendy', 'kalvi'),
			  'overlap' 				=> esc_html__('Overlap', 'kalvi'),
			  'entry-center-align'		=> esc_html__('Stripe', 'kalvi'),
			  'entry-fashion-style'	 	=> esc_html__('Fashion', 'kalvi'),
			  'entry-minimal-bordered' 	=> esc_html__('Minimal Bordered', 'kalvi'),
			  'blog-medium-style'       => esc_html__('Medium', 'kalvi'),
			  'blog-medium-style dt-blog-medium-highlight'     					 => esc_html__('Medium Hightlight', 'kalvi'),
			  'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight'  => esc_html__('Medium Skin Highlight', 'kalvi'),
			),
			'class'        => 'chosen',
			'default'      => 'blog-default-style',
			'info'         => esc_html__('Choose post style to display post archives pages.', 'kalvi'),
		  ),

		  array(
			'id'  		 => 'post-archives-enable-excerpt',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Allow Excerpt', 'kalvi'),
			'info'		 => esc_html__('YES! to allow excerpt', 'kalvi'),
			'default'    => true,
		  ),

		  array(
			'id'  		 => 'post-archives-excerpt',
			'type'  	 => 'number',
			'title' 	 => esc_html__('Excerpt Length', 'kalvi'),
			'after'		 => '<span class="cs-text-desc">&nbsp;'.esc_html__('Put Excerpt Length', 'kalvi').'</span>',
			'default' 	 => 45,
		  ),

		  array(
			'id'  		 => 'post-archives-enable-readmore',
			'type'  	 => 'switcher',
			'title' 	 => esc_html__('Read More', 'kalvi'),
			'info'		 => esc_html__('YES! to enable read more button', 'kalvi'),
			'default'	 => false,
		  ),

		  array(
			'id'  		 => 'post-archives-readmore',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Read More Shortcode', 'kalvi'),
			'info'		 => esc_html__('Paste any button shortcode here', 'kalvi'),
			'default'	 => '[dt_sc_button iconclass="fa fa-long-arrow-right" iconalign="icon-right with-icon" class="filled" title="Read More" icon_type="fontawesome" target="_blank" /]',
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Single Post & Post Archive options", 'kalvi' ),
		  ),

		  array(
			'id'      => 'post-format-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Post Format Meta', 'kalvi' ),
			'info'	  => esc_html__('YES! to show post format meta information', 'kalvi'),
			'default' => false
		  ),

		  array(
			'id'      => 'post-author-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Author Meta', 'kalvi' ),
			'info'	  => esc_html__('YES! to show post author meta information', 'kalvi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-date-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Date Meta', 'kalvi' ),
			'info'	  => esc_html__('YES! to show post date meta information', 'kalvi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-comment-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Comment Meta', 'kalvi' ),
			'info'	  => esc_html__('YES! to show post comment meta information', 'kalvi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-category-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Category Meta', 'kalvi' ),
			'info'	  => esc_html__('YES! to show post category information', 'kalvi'),
			'default' => true
		  ),

		  array(
			'id'      => 'post-tag-meta',
			'type'    => 'switcher',
			'title'   => esc_html__('Tag Meta', 'kalvi' ),
			'info'	  => esc_html__('YES! to show post tag information', 'kalvi'),
			'default' => true
			),
			
			array(
				'id'      => 'post-likes',
				'type'    => 'switcher',
				'title'   => esc_html__('Post Likes', 'kalvi' ),
				'info'    => esc_html__('YES! to show post likes information', 'kalvi'),
				'default' => true
			),

			array(
				'id'      => 'post-views',
				'type'    => 'switcher',
				'title'   => esc_html__('Post Views', 'kalvi' ),
				'info'    => esc_html__('YES! to show post views information', 'kalvi'),
				'default' => true
			),

		),
	),

	// -----------------------------------------
	// 404 Options
	// -----------------------------------------
	array(
	  'name'      => '404_options',
	  'title'     => esc_html__('404 Options', 'kalvi'),
	  'icon'      => 'fa fa-warning',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "404 Message", 'kalvi' ),
		  ),
		  
		  array(
			'id'      => 'enable-404message',
			'type'    => 'switcher',
			'title'   => esc_html__('Enable Message', 'kalvi' ),
			'info'	  => esc_html__('YES! to enable not-found page message.', 'kalvi'),
			'default' => true
		  ),

		  array(
			'id'           => 'notfound-style',
			'type'         => 'select',
			'title'        => esc_html__('Template Style', 'kalvi'),
			'options'      => array(
			  'type1' 	   => esc_html__('Modern', 'kalvi'),
			  'type2'      => esc_html__('Classic', 'kalvi'),
			  'type4'  	   => esc_html__('Diamond', 'kalvi'),
			  'type5'      => esc_html__('Shadow', 'kalvi'),
			  'type6'      => esc_html__('Diamond Alt', 'kalvi'),
			  'type7'  	   => esc_html__('Stack', 'kalvi'),
			  'type8'  	   => esc_html__('Minimal', 'kalvi'),
			),
			'class'        => 'chosen',
			'default'      => 'type1',
			'info'         => esc_html__('Choose the style of not-found template page.', 'kalvi')
		  ),

		  array(
			'id'      => 'notfound-darkbg',
			'type'    => 'switcher',
			'title'   => esc_html__('404 Dark BG', 'kalvi' ),
			'info'	  => esc_html__('YES! to use dark bg notfound page for this site.', 'kalvi')
		  ),

		  array(
			'id'           => 'notfound-pageid',
			'type'         => 'select',
			'title'        => esc_html__('Custom Page', 'kalvi'),
			'options'      => 'pages',
			'class'        => 'chosen',
			'default_option' => esc_html__('Choose the page', 'kalvi'),
			'info'       	 => esc_html__('Choose the page for not-found content.', 'kalvi')
		  ),
		  
		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Background Options", 'kalvi' ),
		  ),

		  array(
			'id'    => 'notfound_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'kalvi')
		  ),

		  array(
			'id'  		 => 'notfound-bg-style',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Custom Styles', 'kalvi'),
			'info'		 => esc_html__('Paste custom CSS styles for not found page.', 'kalvi')
		  ),

		),
	),

	// -----------------------------------------
	// Underconstruction Options
	// -----------------------------------------
	array(
	  'name'      => 'comingsoon_options',
	  'title'     => esc_html__('Under Construction Options', 'kalvi'),
	  'icon'      => 'fa fa-thumbs-down',

		'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Under Construction", 'kalvi' ),
		  ),
	
		  array(
			'id'      => 'enable-comingsoon',
			'type'    => 'switcher',
			'title'   => esc_html__('Enable Coming Soon', 'kalvi' ),
			'info'	  => esc_html__('YES! to check under construction page of your website.', 'kalvi')
		  ),
	
		  array(
			'id'           => 'comingsoon-style',
			'type'         => 'select',
			'title'        => esc_html__('Template Style', 'kalvi'),
			'options'      => array(
			  'type1' 	   => esc_html__('Diamond', 'kalvi'),
			  'type2'      => esc_html__('Teaser', 'kalvi'),
			  'type3'  	   => esc_html__('Minimal', 'kalvi'),
			  'type4'      => esc_html__('Counter Only', 'kalvi'),
			  'type5'      => esc_html__('Belt', 'kalvi'),
			  'type6'  	   => esc_html__('Classic', 'kalvi'),
			  'type7'  	   => esc_html__('Boxed', 'kalvi')
			),
			'class'        => 'chosen',
			'default'      => 'type1',
			'info'         => esc_html__('Choose the style of coming soon template.', 'kalvi'),
		  ),

		  array(
			'id'      => 'uc-darkbg',
			'type'    => 'switcher',
			'title'   => esc_html__('Coming Soon Dark BG', 'kalvi' ),
			'info'	  => esc_html__('YES! to use dark bg coming soon page for this site.', 'kalvi')
		  ),

		  array(
			'id'           => 'comingsoon-pageid',
			'type'         => 'select',
			'title'        => esc_html__('Custom Page', 'kalvi'),
			'options'      => 'pages',
			'class'        => 'chosen',
			'default_option' => esc_html__('Choose the page', 'kalvi'),
			'info'       	 => esc_html__('Choose the page for comingsoon content.', 'kalvi')
		  ),

		  array(
			'id'      => 'show-launchdate',
			'type'    => 'switcher',
			'title'   => esc_html__('Show Launch Date', 'kalvi' ),
			'info'	  => esc_html__('YES! to show launch date text.', 'kalvi'),
		  ),

		  array(
			'id'      => 'comingsoon-launchdate',
			'type'    => 'text',
			'title'   => esc_html__('Launch Date', 'kalvi'),
			'attributes' => array( 
			  'placeholder' => '10/30/2016 12:00:00'
			),
			'after' 	=> '<p class="cs-text-info">'.esc_html__('Put Format: 12/30/2016 12:00:00 month/day/year hour:minute:second', 'kalvi').'</p>',
		  ),

		  array(
			'id'           => 'comingsoon-timezone',
			'type'         => 'select',
			'title'        => esc_html__('UTC Timezone', 'kalvi'),
			'options'      => array(
			  '-12' => '-12', '-11' => '-11', '-10' => '-10', '-9' => '-9', '-8' => '-8', '-7' => '-7', '-6' => '-6', '-5' => '-5', 
			  '-4' => '-4', '-3' => '-3', '-2' => '-2', '-1' => '-1', '0' => '0', '+1' => '+1', '+2' => '+2', '+3' => '+3', '+4' => '+4',
			  '+5' => '+5', '+6' => '+6', '+7' => '+7', '+8' => '+8', '+9' => '+9', '+10' => '+10', '+11' => '+11', '+12' => '+12'
			),
			'class'        => 'chosen',
			'default'      => '0',
			'info'         => esc_html__('Choose utc timezone, by default UTC:00:00', 'kalvi'),
		  ),

		  array(
			'id'    => 'comingsoon_background',
			'type'  => 'background',
			'title' => esc_html__('Background', 'kalvi')
		  ),

		  array(
			'id'  		 => 'comingsoon-bg-style',
			'type'  	 => 'textarea',
			'title' 	 => esc_html__('Custom Styles', 'kalvi'),
			'info'		 => esc_html__('Paste custom CSS styles for under construction page.', 'kalvi'),
		  ),

		),
	),

  ),
);

// -----------------------------------------
// Widget area Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'widgetarea_options',
  'title'       => esc_html__('Widget Area', 'kalvi'),
  'icon'        => 'fa fa-trello',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Custom Widget Area for Sidebar", 'kalvi' ),
	  ),

	  array(
		'id'           => 'wtitle-style',
		'type'         => 'select',
		'title'        => esc_html__('Sidebar widget Title Style', 'kalvi'),
		'options'      => array(
		  'default' => esc_html__('Choose any type', 'kalvi'),
		  'type1' 	   => esc_html__('Double Border', 'kalvi'),
		  'type2'      => esc_html__('Tooltip', 'kalvi'),
		  'type3'  	   => esc_html__('Title Top Border', 'kalvi'),
		  'type4'      => esc_html__('Left Border & Pattren', 'kalvi'),
		  'type5'      => esc_html__('Bottom Border', 'kalvi'),
		  'type6'  	   => esc_html__('Tooltip Border', 'kalvi'),
		  'type7'  	   => esc_html__('Boxed Modern', 'kalvi'),
		  'type8'  	   => esc_html__('Elegant Border', 'kalvi'),
		  'type9' 	   => esc_html__('Needle', 'kalvi'),
		  'type10' 	   => esc_html__('Ribbon', 'kalvi'),
		  'type11' 	   => esc_html__('Content Background', 'kalvi'),
		  'type12' 	   => esc_html__('Classic BG', 'kalvi'),
		  'type13' 	   => esc_html__('Tiny Boders', 'kalvi'),
		  'type14' 	   => esc_html__('BG & Border', 'kalvi'),
		  'type15' 	   => esc_html__('Classic BG Alt', 'kalvi'),
		  'type16' 	   => esc_html__('Left Border & BG', 'kalvi'),
		  'type17' 	   => esc_html__('Basic', 'kalvi'),
		  'type18' 	   => esc_html__('BG & Pattern', 'kalvi'),
		),
		'class'          => 'chosen',
		'default' 		 =>  'default',
		'info'           => esc_html__('Choose the style of sidebar widget title.', 'kalvi')
	  ),

	  array(
		'id'              => 'widgetarea-custom',
		'type'            => 'group',
		'title'           => esc_html__('Custom Widget Area', 'kalvi'),
		'button_title'    => esc_html__('Add New', 'kalvi'),
		'accordion_title' => esc_html__('Add New Widget Area', 'kalvi'),
		'fields'          => array(

		  array(
			'id'          => 'widgetarea-custom-name',
			'type'        => 'text',
			'title'       => esc_html__('Name', 'kalvi'),
		  ),

		)
	  ),

	),
);

// -----------------------------------------
// Woocommerce Options
// -----------------------------------------
if( function_exists( 'is_woocommerce' ) && ! class_exists ( 'DTWooPlugin' ) ){

	$options[]      = array(
	  'name'        => 'woocommerce_options',
	  'title'       => esc_html__('Woocommerce', 'kalvi'),
	  'icon'        => 'fa fa-shopping-cart',

	  'fields'      => array(

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Woocommerce Shop Page Options", 'kalvi' ),
		  ),

		  array(
			'id'  		 => 'shop-product-per-page',
			'type'  	 => 'number',
			'title' 	 => esc_html__('Products Per Page', 'kalvi'),
			'after'		 => '<span class="cs-text-desc">&nbsp;'.esc_html__('Number of products to show in catalog / shop page', 'kalvi').'</span>',
			'default' 	 => 12,
		  ),

		  array(
			'id'           => 'product-style',
			'type'         => 'select',
			'title'        => esc_html__('Product Style', 'kalvi'),
			'options'      => array(
			  'woo-type1' 	   => esc_html__('Thick Border', 'kalvi'),
			  'woo-type4'      => esc_html__('Diamond Icons', 'kalvi'),
			  'woo-type8' 	   => esc_html__('Modern', 'kalvi'),
			  'woo-type10' 	   => esc_html__('Easing', 'kalvi'),
			  'woo-type11' 	   => esc_html__('Boxed', 'kalvi'),
			  'woo-type12' 	   => esc_html__('Easing Alt', 'kalvi'),
			  'woo-type13' 	   => esc_html__('Parallel', 'kalvi'),
			  'woo-type14' 	   => esc_html__('Pointer', 'kalvi'),
			  'woo-type16' 	   => esc_html__('Stack', 'kalvi'),
			  'woo-type17' 	   => esc_html__('Bouncy', 'kalvi'),
			  'woo-type20' 	   => esc_html__('Masked Circle', 'kalvi'),
			  'woo-type21' 	   => esc_html__('Classic', 'kalvi')
			),
			'class'        => 'chosen',
			'default' 	   => 'woo-type1',
			'info'         => esc_html__('Choose products style to display shop & archive pages.', 'kalvi')
		  ),

		  array(
			'id'      	 => 'shop-page-product-layout',
			'type'       => 'image_select',
			'title'      => esc_html__('Product Layout', 'kalvi'),
			'options'    => array(
				  1   => KALVI_THEME_URI . '/cs-framework-override/images/one-column.png',
				  2   => KALVI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
				  3   => KALVI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
				  4   => KALVI_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
			),
			'default'      => 4,
			'attributes'   => array(
			  'data-depend-id' => 'shop-page-product-layout',
			),
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Detail Page Options", 'kalvi' ),
		  ),

		  array(
			'id'      	   => 'product-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'kalvi'),
			'options'      => array(
			  'content-full-width'   => KALVI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => KALVI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'kalvi'),
			'dependency'   	 => array( 'product-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'kalvi'),
			'dependency' 	 => array( 'product-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  		 	 => 'enable-related',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Related Products', 'kalvi'),
			'info'	  		 => esc_html__("YES! to display related products on single product's page.", 'kalvi')
		  ),

		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Category Page Options", 'kalvi' ),
		  ),

		  array(
			'id'      	   => 'product-category-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'kalvi'),
			'options'      => array(
			  'content-full-width'   => KALVI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => KALVI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-category-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-category-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'kalvi'),
			'dependency'   	 => array( 'product-category-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-category-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'kalvi'),
			'dependency' 	 => array( 'product-category-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),
		  
		  array(
			'type'    => 'subheading',
			'content' => esc_html__( "Product Tag Page Options", 'kalvi' ),
		  ),

		  array(
			'id'      	   => 'product-tag-layout',
			'type'         => 'image_select',
			'title'        => esc_html__('Layout', 'kalvi'),
			'options'      => array(
			  'content-full-width'   => KALVI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
			  'with-left-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
			  'with-right-sidebar'   => KALVI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
			  'with-both-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
			),
			'default'      => 'content-full-width',
			'attributes'   => array(
			  'data-depend-id' => 'product-tag-layout',
			),
		  ),

		  array(
			'id'  		 	 => 'show-shop-standard-left-sidebar-for-product-tag-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Left Sidebar', 'kalvi'),
			'dependency'   	 => array( 'product-tag-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
		  ),

		  array(
			'id'  			 => 'show-shop-standard-right-sidebar-for-product-tag-layout',
			'type'  		 => 'switcher',
			'title' 		 => esc_html__('Show Shop Standard Right Sidebar', 'kalvi'),
			'dependency' 	 => array( 'product-tag-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
		  ),

	  ),
	);
}

// -----------------------------------------
// Sociable Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'sociable_options',
  'title'       => esc_html__('Sociable', 'kalvi'),
  'icon'        => 'fa fa-share-alt-square',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Sociable", 'kalvi' ),
	  ),

	  array(
		'id'              => 'sociable_fields',
		'type'            => 'group',
		'title'           => esc_html__('Sociable', 'kalvi'),
		'info'            => esc_html__('Click button to add type of social & url.', 'kalvi'),
		'button_title'    => esc_html__('Add New Social', 'kalvi'),
		'accordion_title' => esc_html__('Adding New Social Field', 'kalvi'),
		'fields'          => array(
		  array(
			'id'          => 'sociable_fields_type',
			'type'        => 'select',
			'title'       => esc_html__('Select Social', 'kalvi'),
			'options'      => array(
			  'delicious' 	 => esc_html__('Delicious', 'kalvi'),
			  'deviantart' 	 => esc_html__('Deviantart', 'kalvi'),
			  'digg' 	  	 => esc_html__('Digg', 'kalvi'),
			  'dribbble' 	 => esc_html__('Dribbble', 'kalvi'),
			  'envelope' 	 => esc_html__('Envelope', 'kalvi'),
			  'facebook' 	 => esc_html__('Facebook', 'kalvi'),
			  'flickr' 		 => esc_html__('Flickr', 'kalvi'),
			  'google-plus'  => esc_html__('Google Plus', 'kalvi'),
			  'gtalk'  		 => esc_html__('GTalk', 'kalvi'),
			  'instagram'	 => esc_html__('Instagram', 'kalvi'),
			  'lastfm'	 	 => esc_html__('Lastfm', 'kalvi'),
			  'linkedin'	 => esc_html__('Linkedin', 'kalvi'),
			  'pinterest'	 => esc_html__('Pinterest', 'kalvi'),
			  'reddit'		 => esc_html__('Reddit', 'kalvi'),
			  'rss'		 	 => esc_html__('RSS', 'kalvi'),
			  'skype'		 => esc_html__('Skype', 'kalvi'),
			  'stumbleupon'	 => esc_html__('Stumbleupon', 'kalvi'),
			  'tumblr'		 => esc_html__('Tumblr', 'kalvi'),
			  'twitter'		 => esc_html__('Twitter', 'kalvi'),
			  'viadeo'		 => esc_html__('Viadeo', 'kalvi'),
			  'vimeo'		 => esc_html__('Vimeo', 'kalvi'),
			  'yahoo'		 => esc_html__('Yahoo', 'kalvi'),
			  'youtube'		 => esc_html__('Youtube', 'kalvi'),
			),
			'class'        => 'chosen',
			'default'      => 'delicious',
		  ),

		  array(
			'id'          => 'sociable_fields_url',
			'type'        => 'text',
			'title'       => esc_html__('Enter URL', 'kalvi')
		  ),
		)
	  ),

   ),
);

// -----------------------------------------
// Hook Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'hook_options',
  'title'       => esc_html__('Hooks', 'kalvi'),
  'icon'        => 'fa fa-paperclip',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Top Hook", 'kalvi' ),
	  ),

	  array(
		'id'  	=> 'enable-top-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Top Hook', 'kalvi'),
		'info'	=> esc_html__("YES! to enable top hook.", 'kalvi')
	  ),

	  array(
		'id'  		 => 'top-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Top Hook', 'kalvi'),
		'info'		 => esc_html__('Paste your top hook, Executes after the opening &lt;body&gt; tag.', 'kalvi')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Content Before Hook", 'kalvi' ),
	  ),

	  array(
		'id'  	=> 'enable-content-before-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Content Before Hook', 'kalvi'),
		'info'	=> esc_html__("YES! to enable content before hook.", 'kalvi')
	  ),

	  array(
		'id'  		 => 'content-before-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Content Before Hook', 'kalvi'),
		'info'		 => esc_html__('Paste your content before hook, Executes before the opening &lt;#primary&gt; tag.', 'kalvi')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Content After Hook", 'kalvi' ),
	  ),

	  array(
		'id'  	=> 'enable-content-after-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Content After Hook', 'kalvi'),
		'info'	=> esc_html__("YES! to enable content after hook.", 'kalvi')
	  ),

	  array(
		'id'  		 => 'content-after-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Content After Hook', 'kalvi'),
		'info'		 => esc_html__('Paste your content after hook, Executes after the closing &lt;/#main&gt; tag.', 'kalvi')
	  ),

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Bottom Hook", 'kalvi' ),
	  ),

	  array(
		'id'  	=> 'enable-bottom-hook',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Bottom Hook', 'kalvi'),
		'info'	=> esc_html__("YES! to enable bottom hook.", 'kalvi')
	  ),

	  array(
		'id'  		 => 'bottom-hook',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Bottom Hook', 'kalvi'),
		'info'		 => esc_html__('Paste your bottom hook, Executes after the closing &lt;/body&gt; tag.', 'kalvi')
	  ),

  array(
		'id'  	=> 'enable-analytics-code',
		'type'  => 'switcher',
		'title' => esc_html__('Enable Tracking Code', 'kalvi'),
		'info'	=> esc_html__("YES! to enable site tracking code.", 'kalvi')
	  ),

	  array(
		'id'  		 => 'analytics-code',
		'type'  	 => 'textarea',
		'title' 	 => esc_html__('Google Analytics Tracking Code', 'kalvi'),
		'info'		 => esc_html__('Enter your Google tracking id (UA-XXXXX-X) here. If you want to offer your visitors the option to stop being tracked you can place the shortcode [dt_sc_privacy_google_tracking] somewhere on your site', 'kalvi')
	  ),

   ),
);

// -----------------------------------------
// Custom Font Options
// -----------------------------------------
$options[]      = array(
  'name'        => 'font_options',
  'title'       => esc_html__('Custom Fonts', 'kalvi'),
  'icon'        => 'fa fa-font',

  'fields'      => array(

	  array(
		'type'    => 'subheading',
		'content' => esc_html__( "Custom Fonts", 'kalvi' ),
	  ),

	  array(
		'id'              => 'custom_font_fields',
		'type'            => 'group',
		'title'           => esc_html__('Custom Font', 'kalvi'),
		'info'            => esc_html__('Click button to add font name & urls.', 'kalvi'),
		'button_title'    => esc_html__('Add New Font', 'kalvi'),
		'accordion_title' => esc_html__('Adding New Font Field', 'kalvi'),
		'fields'          => array(
		  array(
			'id'          => 'custom_font_name',
			'type'        => 'text',
			'title'       => esc_html__('Font Name', 'kalvi')
		  ),

		  array(
			'id'      => 'custom_font_woof',
			'type'    => 'upload',
			'title'   => esc_html__('Upload File (*.woff)', 'kalvi'),
			'after'   => '<p class="cs-text-muted">'.esc_html__('You can upload custom font family (*.woff) file here.', 'kalvi').'</p>',
		  ),

		  array(
			'id'      => 'custom_font_woof2',
			'type'    => 'upload',
			'title'   => esc_html__('Upload File (*.woff2)', 'kalvi'),
			'after'   => '<p class="cs-text-muted">'.esc_html__('You can upload custom font family (*.woff2) file here.', 'kalvi').'</p>',
		  )
		)
	  ),

   ),
);

// ------------------------------
// backup                       
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => esc_html__('Backup', 'kalvi'),
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'kalvi')
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

// ------------------------------
// license
// ------------------------------
$options[]   = array(
  'name'     => 'theme_version',
  'title'    => constant('KALVI_THEME_NAME').esc_html__(' Log', 'kalvi'),
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => constant('KALVI_THEME_NAME').esc_html__(' Theme Change Log', 'kalvi')
    ),
    array(
      'type'    => 'content',
			'content' => '<pre>

2022.06.24 - version 3.5
* LMS AddOn Quiz and Question issue has been fixed
			
2022.06.14 - version 3.4
* Shortcode button link issue got fixed

2022.06.06 - version 3.3
* LMS Addon Plugin got updated - Package issue got fixed

2022.05.13 - version 3.2
* Quiz related jQuery issue fixed

2022.04.12 - version 3.1
* Course scrolling tab issue fixed

2022.04.04 - version 3.0
* Depreciated methods removed

2022.03.02 - version 2.9
* Fixed Kirki Customizer Issue
			
2021.01.23 - version 2.8
* Compatible with wordpress 5.6
* Some design issues updated
* Updated: All premium plugins

2020.12.02 - version 2.7
* Latest jQuery fixes updated
* Updated: All premium plugins

2020.08.13 - version 2.6
* Compatible with wordpress 5.5

2020.08.05 - version 2.5

* Updated: Envato Theme check
* Updated: sanitize_text_field added
* Updated: All wordpress theme standards
* Updated: All premium plugins

2020.05.05 - version 2.4

* Updated: Theme switch issue
* Updated: Social icons target link
* Updated: Testimonial quote html fix
* Updated: Envato theme check fix
* Updated: Prettyphoto issue

2020.03.11 - version 2.3

* Updated : Visual Composer editor fix.
* Updated : Menu Hover issue
* Updated : Redirect user from default login form

2020.02.06 - version 2.2

* Updated : All premium plugins

2020.01.29 - version 2.1

* Compatible - WordPress 5.3.2
* Update - WordPress theme standards
* Update - Gutenberg editor
* Update - All premium plugins

2019.11.16 - version 2.0

* Updated all wordpress theme standards
* Compatible with latest Gutenberg editor
* Updated: All premium plugins
* Compatible with wordpress 5.3

2019.08.23 - version 1.9
* Updated: All premium plugins
* Fixed: LMS Addon Color picker issue

2019.07.23 - version 1.8
* Compatible with wordpress 5.2.2
* Updated: All premium plugins
* Updated: Revisions added to all custom post types
* Updated: Gutenberg editor support for custom post types
* Updated: Link for phone number module
* Updated: Online documentation link, check readme file

* Fixed: Customizer logo option
* Fixed: Google Analytics issue
* Fixed: Mailchimp email client issue
* Fixed: Gutenberg check for old wordpress version
* Fixed: Edit with Visual Composer for portfolio
* Fixed: Header & Footer wpml option
* Fixed: Smooth scrolling in ie 11
* Fixed: Site title color
* Fixed: Privacy popup bg color

* Improved: Single product breadcrumb section
* Improved: Tags taxonomy added for portfolio
* Improved: Woocommerce cart module added with custom class option

* New: Whatsapp Shortcode

2019.05.17 - version 1.7
* Gutenberg Latest fixes
* Updated Visual Composer and Layerslider plugins

2019.05.06 - version 1.6
* Gutenberg Latest update compatible
* Portfolio Video option
* Coming Soon page fix
* Portfolio archive page breadcrumb fix
* Mega menu image fix
* GDPR product single page fix
* Codestar framework update
* Wpml xml file updated
* disable options for likes and views in single post page
* Updated latest version of all third party plugins
* Some design tweaks

2018.12.11 - version 1.5
* Gutenberg block changes updated
* Compatible with wordpress 5.0

2018.12.03 - version 1.4
 * Updated to latest gutenberg plugin.
 * Updated WPBakery Page Builder plugin.
 * Updated Ultimate Addons for WPBakery Page Builder.

2018.10.17 - version 1.3
 * Gutenberg plugin compatible
 * GDPR Compliant update in comment form, mailchimp form etc.
 * Updated documentation.
 * Updated WPBakery Page Builder plugin.
 * Updated Ultimate Addons for WPBakery Page Builder.
 * Updated Events calendar issue.
 * Class page issue fixed.
 * Compatible with wordpress 4.9.8

2018.09.19 - version 1.2
 * Minor bug fixes

2018.09.01 - version 1.1
 * Updated dummy content

2018.08.30 - version 1.0
 * First release!  </pre>',
    ),

  )
);

// ------------------------------
// Seperator
// ------------------------------
$options[] = array(
  'name'   => 'seperator_1',
  'title'  => esc_html__('Plugin Options', 'kalvi'),
  'icon'   => 'fa fa-plug'
);


CSFramework::instance( $settings, $options );