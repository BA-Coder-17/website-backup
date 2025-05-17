<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

// -----------------------------------------
// Custom Widgets                    -
// -----------------------------------------
function kalvi_custom_widgets() {
  $custom_widgets = array();
  $widgets = is_array( cs_get_option( 'widgetarea-custom' ) ) ? cs_get_option( 'widgetarea-custom' ) : array();
  $widgets = array_filter($widgets);

  if( isset( $widgets ) ):
    foreach ( $widgets as $widget ) :
      $id = mb_convert_case($widget['widgetarea-custom-name'], MB_CASE_LOWER, "UTF-8");
      $id = str_replace(" ", "-", $id);
      $custom_widgets[$id] = $widget['widgetarea-custom-name'];
    endforeach;
  endif;

  return $custom_widgets;
}

// -----------------------------------------
// Layer Sliders
// -----------------------------------------
function kalvi_layersliders() {
  $layerslider = array(  esc_html__('Select a slider','kalvi') );

  if(class_exists('LS_Config')) {

    $sliders = LS_Sliders::find(array('limit' => 50));

    if(!empty($sliders)) {
      foreach($sliders as $key => $item){
        $layerslider[ $item['id'] ] = $item['name'];
      }
    }
  }

  return $layerslider;
}

// -----------------------------------------
// Revolution Sliders
// -----------------------------------------
function kalvi_revolutionsliders() {
  $revolutionslider = array( '' => esc_html__('Select a slider','kalvi') );

  if(class_exists('RevSliderBase')) {
    $sld = new RevSlider();
    $sliders = $sld->getArrSliders();
    if(!empty($sliders)){
      foreach($sliders as $key => $item) {
        $revolutionslider[$item->getAlias()] = $item->getTitle();
      }
    }    
  }

  return $revolutionslider;  
}

// -----------------------------------------
// Meta Layout Section
// -----------------------------------------
$meta_layout_section =array(
  'name'  => 'layout_section',
  'title' => esc_html__('Layout', 'kalvi'),
  'icon'  => 'fa fa-columns',
  'fields' =>  array(
    array(
      'id'  => 'layout',
      'type' => 'image_select',
      'title' => esc_html__('Page Layout', 'kalvi' ),
      'options'      => array(
          'content-full-width'   => KALVI_THEME_URI . '/cs-framework-override/images/without-sidebar.png',
          'with-left-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/left-sidebar.png',
          'with-right-sidebar'   => KALVI_THEME_URI . '/cs-framework-override/images/right-sidebar.png',
          'with-both-sidebar'    => KALVI_THEME_URI . '/cs-framework-override/images/both-sidebar.png',
          'fullwidth'            => KALVI_THEME_URI . '/cs-framework-override/images/fullwidth.png',
      ),
      'default'      => 'content-full-width',
	  'info'		 => esc_html__('Layout "fullwidth" only apply for portfolio template.', 'kalvi'),
      'attributes'   => array( 'data-depend-id' => 'page-layout' )
    ),
    array(
      'id'        => 'show-standard-sidebar-left',
      'type'      => 'switcher',
      'title'     => esc_html__('Show Standard Left Sidebar', 'kalvi' ),
      'dependency'  => array( 'page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
    ),
    array(
      'id'        => 'widget-area-left',
      'type'      => 'select',
      'title'     => esc_html__('Choose Left Widget Areas', 'kalvi' ),
      'class'     => 'chosen',
      'options'   => kalvi_custom_widgets(),
      'attributes'  => array( 
        'multiple'  => 'multiple',
        'data-placeholder' => esc_html__('Select Left Widget Areas','kalvi'),
        'style' => 'width: 400px;'
      ),
      'dependency'  => array( 'page-layout', 'any', 'with-left-sidebar,with-both-sidebar' ),
    ),
    array(
      'id'          => 'show-standard-sidebar-right',
      'type'        => 'switcher',
      'title'       => esc_html__('Show Standard Right Sidebar', 'kalvi' ),
      'dependency'  => array( 'page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
    ),
    array(
      'id'        => 'widget-area-right',
      'type'      => 'select',
      'title'     => esc_html__('Choose Right Widget Areas', 'kalvi' ),
      'class'     => 'chosen',
      'options'   => kalvi_custom_widgets(),
      'attributes'    => array( 
        'multiple' => 'multiple',
        'data-placeholder' => esc_html__('Select Right Widget Areas','kalvi'),
        'style' => 'width: 400px;'
      ),
      'dependency'  => array( 'page-layout', 'any', 'with-right-sidebar,with-both-sidebar' ),
    )
  )
);

// -----------------------------------------
// Meta Breadcrumb Section
// -----------------------------------------
$meta_breadcrumb_section = array(
  'name'  => 'breadcrumb_section',
  'title' => esc_html__('Breadcrumb', 'kalvi'),
  'icon'  => 'fa fa-arrows-h',
  'fields' =>  array(
    array(
      'id'      => 'enable-sub-title',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Breadcrumb', 'kalvi' ),
      'default' => true
    ),
    array(
    	'id'                 => 'breadcrumb_position',
	'type'               => 'select',
      'title'              => esc_html__('Position', 'kalvi' ),
      'options'            => array(
        'header-top-absolute'    => esc_html__('Behind the Header','kalvi'),
        'header-top-relative' 	   => esc_html__('Default','kalvi'),
		),
		'default'            => 'header-top-relative',	
      'dependency'         => array( 'enable-sub-title', '==', 'true' ),
    ),    
    array(
      'id'    => 'breadcrumb_background',
      'type'  => 'background',
      'title' => esc_html__('Background', 'kalvi' ),
      'dependency'   => array( 'enable-sub-title', '==', 'true' ),
    ),
  )
);

// -----------------------------------------
// Meta Slider Section
// -----------------------------------------
$meta_slider_section = array(
  'name'  => 'slider_section',
  'title' => esc_html__('Slider', 'kalvi'),
  'icon'  => 'fa fa-slideshare',
  'fields' =>  array(
    array(
      'id'           => 'slider-notice',
      'type'         => 'notice',
      'class'        => 'danger',
      'content'      => esc_html__('Slider tab works only if breadcrumb disabled.','kalvi'),
      'class'        => 'margin-30 cs-danger',
      'dependency'   => array( 'enable-sub-title', '==', 'true' ),
    ),

    array(
      'id'           => 'show_slider',
      'type'         => 'switcher',
      'title'        => esc_html__('Show Slider', 'kalvi' ),
      'dependency'   => array( 'enable-sub-title', '==', 'false' ),
    ),
    array(
    	'id'                 => 'slider_position',
	'type'               => 'select',
	'title'              => esc_html__('Position', 'kalvi' ),
	'options'            => array(
		'header-top-relative'     => esc_html__('Top Header Relative','kalvi'),
		'header-top-absolute'    => esc_html__('Top Header Absolute','kalvi'),
		'bottom-header' 	   => esc_html__('Bottom Header','kalvi'),
	),
	'default'            => 'bottom-header',
	'dependency'         => array( 'enable-sub-title|show_slider', '==|==', 'false|true' ),
   ),
   array(
      'id'                 => 'slider_type',
      'type'               => 'select',
      'title'              => esc_html__('Slider', 'kalvi' ),
      'options'            => array(
        ''                 => esc_html__('Select a slider','kalvi'),
        'layerslider'      => esc_html__('Layer slider','kalvi'),
        'revolutionslider' => esc_html__('Revolution slider','kalvi'),
        'customslider'     => esc_html__('Custom Slider Shortcode','kalvi'),
      ),
      'validate' => 'required',
      'dependency'         => array( 'enable-sub-title|show_slider', '==|==', 'false|true' ),
    ),

    array(
      'id'          => 'layerslider_id',
      'type'        => 'select',
      'title'       => esc_html__('Layer Slider', 'kalvi' ),
      'options'     => kalvi_layersliders(),
      'validate'    => 'required',
      'dependency'  => array( 'enable-sub-title|show_slider|slider_type', '==|==|==', 'false|true|layerslider' )
    ),

    array(
      'id'          => 'revolutionslider_id',
      'type'        => 'select',
      'title'       => esc_html__('Revolution Slider', 'kalvi' ),
      'options'     => kalvi_revolutionsliders(),
      'validate'    => 'required',
      'dependency'  => array( 'enable-sub-title|show_slider|slider_type', '==|==|==', 'false|true|revolutionslider' )
    ),

    array(
      'id'          => 'customslider_sc',
      'type'        => 'textarea',
      'title'       => esc_html__('Custom Slider Code', 'kalvi' ),
      'validate'    => 'required',
      'dependency'  => array( 'enable-sub-title|show_slider|slider_type', '==|==|==', 'false|true|customslider' )
    ),
  )  
);

// -----------------------------------------
// Blog Template Section
// -----------------------------------------
$blog_template_section = array(
  'name'  => 'blog_template_section',
  'title' => esc_html__('Blog Template', 'kalvi'),
  'icon'  => 'fa fa-files-o',
  'fields' =>  array(
    array(
      'id'           => 'blog-tpl-notice',
      'type'         => 'notice',
      'class'        => 'success',
      'content'      => esc_html__('Blog Tab Works only if page template set to Blog Template in Page Attributes','kalvi'),
      'class'        => 'margin-30 cs-success',      
    ),
    array(
      'id'                     => 'blog-post-layout',
      'type'                   => 'image_select',
      'title'                  => esc_html__('Post Layout', 'kalvi' ),
      'options'                => array(
          'one-column'         => KALVI_THEME_URI . '/cs-framework-override/images/one-column.png',
          'one-half-column'    => KALVI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
          'one-third-column'   => KALVI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
		  '1-2-2'			   => KALVI_THEME_URI . '/cs-framework-override/images/1-2-2.png',
		  '1-2-2-1-2-2' 	   => KALVI_THEME_URI . '/cs-framework-override/images/1-2-2-1-2-2.png',
		  '1-3-3-3'			   => KALVI_THEME_URI . '/cs-framework-override/images/1-3-3-3.png',
		  '1-3-3-3-1' 		   => KALVI_THEME_URI . '/cs-framework-override/images/1-3-3-3-1.png',
      ),
      'default'                => 'one-half-column'
    ),
    array(
      'id'                     => 'blog-post-style',
      'type'                   => 'select',
      'title'                  => esc_html__('Post Style', 'kalvi' ),
      'options'                => array(
        'blog-default-style' => esc_html__('Default','kalvi'),
        'entry-date-left'    => esc_html__('Date Left','kalvi'),
		'entry-date-left outer-frame-border'      	=> esc_html__('Date Left Modern', 'kalvi'),
        'entry-date-author-left' => esc_html__('Date and Author Left','kalvi'),
		'blog-modern-style'      => esc_html__('Modern', 'kalvi'),
		'bordered'      		 => esc_html__('Bordered', 'kalvi'),
		'classic'      			 => esc_html__('Classic', 'kalvi'),
		'entry-overlay-style' 	 => esc_html__('Trendy', 'kalvi'),
		'overlap' 				 => esc_html__('Overlap', 'kalvi'),
		'entry-center-align'	 => esc_html__('Stripe', 'kalvi'),
		'entry-fashion-style'	 => esc_html__('Fashion', 'kalvi'),
		'entry-minimal-bordered' => esc_html__('Minimal Bordered', 'kalvi'),
        'blog-medium-style'  	 => esc_html__('Medium','kalvi'),
        'blog-medium-style dt-blog-medium-highlight' => esc_html__('Medium Highlight','kalvi'),
        'blog-medium-style dt-blog-medium-highlight dt-sc-skin-highlight' => esc_html__('Medium Skin Highlight','kalvi')
      ),
    ),
    array(
      'id'      => 'enable-blog-readmore',
      'type'    => 'switcher',
      'title'   => esc_html__('Read More', 'kalvi' ),
      'default' => true
    ),
    array(
      'id'           => 'blog-readmore',
      'type'         => 'textarea',
      'title'        => esc_html__('Read More Shortcode', 'kalvi' ),
      'default'      => '[dt_sc_button title="'.esc_attr__('Read More', 'kalvi').'" style="filled" icon_type="fontawesome" iconalign="icon-right with-icon" iconclass="fa fa-long-arrow-right" class="type1" /]',
      'dependency'   => array( 'enable-blog-readmore', '==', 'true' ),
    ),
    array(
      'id'      => 'blog-post-excerpt',
      'type'    => 'switcher',
      'title'   => esc_html__('Allow Excerpt', 'kalvi' ),
      'default' => true
    ),
    array(
      'id'           => 'blog-post-excerpt-length',
      'type'         => 'number',
      'title'        => esc_html__('Excerpt Length', 'kalvi' ),
      'default'      => '45',
      'dependency'   => array( 'blog-post-excerpt', '==', 'true' ),
    ),
    array(
      'id'           => 'blog-post-per-page',
      'type'         => 'number',
      'title'        => esc_html__('Post Per Page', 'kalvi' ),
      'default'      => '-1',      
    ),
    array(
      'id'             => 'blog-post-cats',
      'type'           => 'select',
      'title'          => esc_html__('Categories','kalvi'),
      'options'        => 'categories',
      'default_option' => esc_html__('Select a categories','kalvi'),
      'class'              => 'chosen',
      'attributes'         => array(
        'multiple'         => 'only-key',
        'style'            => 'width: 200px;'
      ),
      'info'           => esc_html__('Select categories to exclude from your blog page.','kalvi'),
    ),
    array(
      'id'      => 'show-postformat-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Format Info', 'kalvi' ),
      'default' => true
    ),
    array(
      'id'      => 'show-author-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Author Info', 'kalvi' ),
      'default' => true,
    ),
    array(
      'id'      => 'show-date-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Date Info', 'kalvi' ),
      'default' => true
    ),
    array(
      'id'      => 'show-comment-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Comment Info', 'kalvi' ),
      'default' => true
    ),
    array(
      'id'      => 'show-category-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Category Info', 'kalvi' ),
      'default' => true
    ),
    array(
      'id'      => 'show-tag-info',
      'type'    => 'switcher',
      'title'   => esc_html__('Show Post Tag Info', 'kalvi' ),
      'default' => true
    )    
  )
);

// -----------------------------------------
// Portfolio Template Section
// -----------------------------------------
$portfolio_template_section = array(
  'name'  => 'portfolio_template_section',
  'title' => esc_html__('Portfolio Template', 'kalvi'),
  'icon'  => 'fa fa-picture-o',
  'fields' =>  array(

    array(
      'id'           => 'portfolio-tpl-notice',
      'type'         => 'notice',
      'class'        => 'success',
      'content'      => esc_html__('Portfolio Tab Works only if page template set to Portfolio Template in Page Attributes','kalvi'),
      'class'        => 'margin-30 cs-success',      
    ),

    array(
      'id'                     => 'portfolio-post-layout',
      'type'                   => 'image_select',
      'title'                  => esc_html__('Post Layout', 'kalvi' ),
      'options'                => array(
          'one-half-column'    => KALVI_THEME_URI . '/cs-framework-override/images/one-half-column.png',
          'one-third-column'   => KALVI_THEME_URI . '/cs-framework-override/images/one-third-column.png',
          'one-fourth-column'  => KALVI_THEME_URI . '/cs-framework-override/images/one-fourth-column.png',
      ),
      'default'                => 'one-half-column'
    ),

    array(
      'id'      => 'portfolio-post-style',
      'type'    => 'select',
      'title'   => esc_html__('Post Style', 'kalvi' ),
      'options' => array(
        'type1' => esc_html__('Modern Title','kalvi'),
        'type2' => esc_html__('Title & Icons Overlay','kalvi'),
        'type3' => esc_html__('Title Overlay','kalvi'),
        'type4' => esc_html__('Icons Only','kalvi'),
        'type5' => esc_html__('Classic','kalvi'),
        'type6' => esc_html__('Minimal Icons','kalvi'),
        'type7' => esc_html__('Presentation','kalvi'),
        'type8' => esc_html__('Girly','kalvi'),
        'type9' => esc_html__('Art','kalvi'),
      ),
    ),

    array(
      'id'      => 'portfolio-grid-space',
      'type'    => 'switcher',
      'title'   => esc_html__('Allow Grid Space', 'kalvi' ),
      'default' => true,
      'info'    => esc_html__('YES! to allow grid space in between portfolio item','kalvi')
    ),

    array(
      'id'      => 'filter',
      'type'    => 'switcher',
      'title'   => esc_html__('Allow Filters', 'kalvi' ),
      'default' => true,
      'info'    => esc_html__('YES! to allow filter options for portfolio items','kalvi')
    ),

    array(
      'id'           => 'portfolio-post-per-page',
      'type'         => 'number',
      'title'        => esc_html__('Post Per Page', 'kalvi' ),
      'default'      => '-1',      
    ),

    array(
      'id'             => 'portfolio-categories',
      'type'           => 'select',
      'title'          => esc_html__('Categories','kalvi'),
      'options'        => 'categories',
      'class'          => 'chosen',
      'query_args'     => array(
        'type'         => 'dt_portfolios',
        'taxonomy'     => 'portfolio_entries',
        'orderby'      => 'post_date',
        'order'        => 'DESC',
      ),
      'attributes'         => array(
        'data-placeholder' => esc_html__('Select a categories','kalvi'),
        'multiple'         => 'only-key',
        'style'            => 'width: 200px;'
      ),
      'info'           => esc_html__('Select categories to show in portfolio items.','kalvi'),
    ),   
  )
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
array_push( $meta_layout_section['fields'], array(
  'id'        => 'enable-sticky-sidebar',
  'type'      => 'switcher',
  'title'     => esc_html__('Enable Sticky Sidebar', 'kalvi' ),
  'dependency'  => array( 'page-layout', 'any', 'with-left-sidebar,with-right-sidebar,with-both-sidebar' )
) );

$options[] = array(
	'id'        => '_tpl_default_settings',
    'title'     => esc_html__('Page Settings','kalvi'),
    'post_type' => 'page',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
		$meta_layout_section,
		$meta_breadcrumb_section,
		$meta_slider_section,

		$blog_template_section,
		$portfolio_template_section,
		array(
		  'name'  => 'sidenav_template_section',
		  'title' => esc_html__('Side Navigation Template', 'kalvi'),
		  'icon'  => 'fa fa-th-list',
		  'fields' =>  array(

			array(
			  'id'           => 'sidenav-tpl-notice',
			  'type'         => 'notice',
			  'class'        => 'success',
			  'content'      => esc_html__('Side Navigation Tab Works only if page template set to Side Navigation Template in Page Attributes','kalvi'),
			  'class'        => 'margin-30 cs-success',      
			),

			array(
			  'id'     		 => 'sidenav-style',
			  'type'    	 => 'select',
			  'title'   	 => esc_html__('Side Navigation Style', 'kalvi' ),
			  'options'    => array(
				   'type1' => esc_html__('Type1','kalvi'),
				   'type2' => esc_html__('Type2','kalvi'),
				   'type3' => esc_html__('Type3','kalvi'),
				   'type4' => esc_html__('Type4','kalvi'),
				   'type5' => esc_html__('Type5','kalvi'),
				   'type6' => esc_html__('Type6','kalvi'),
				   'type7' => esc_html__('Type7','kalvi'),
				   'type8' => esc_html__('Type8','kalvi'),
				   'type9' => esc_html__('Type9','kalvi'),
				   'type10' => esc_html__('Type10','kalvi')
			  ),
			),

			array(
			  'id'    		 => 'sidenav-align',
			  'type'    	 => 'switcher',
			  'title'   	 => esc_html__('Align Right', 'kalvi' ),
			  'info'    	 => esc_html__('YES! to align right of side navigation.','kalvi')
			),

			array(
			  'id'    		 => 'sidenav-sticky',
			  'type'    	 => 'switcher',
			  'title'   	 => esc_html__('Sticky Side Navigation', 'kalvi' ),
			  'info'    	 => esc_html__('YES! to sticky side navigation content.','kalvi')
			),

			array(
			  'id'    		 => 'enable-sidenav-content',
			  'type'    	 => 'switcher',
			  'title'   	 => esc_html__('Show Content', 'kalvi' ),
			  'info'    	 => esc_html__('YES! to show content in below side navigation.','kalvi')
			),

			array(
			  'id'	    	 => 'sidenav-content',
			  'type'	     => 'textarea',
			  'title'  		 => esc_html__('Side Navigation Content', 'kalvi' ),
			  'info'    	 => esc_html__('Paste any shortcode content here','kalvi'),
			  'attributes' 	 => array(
				  'rows'     => 6,
			  ),
			),

		  )
		),
    )
);

// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$post_meta_layout_section = $meta_layout_section;
$fields = $post_meta_layout_section['fields'];

	$fields[0]['title'] =  esc_html__('Post Layout', 'kalvi' );
	unset( $fields[0]['options']['with-both-sidebar'] );
	unset( $fields[0]['info'] );
	unset( $fields[0]['options']['fullwidth'] );
	unset( $fields[5] );
	unset( $post_meta_layout_section['fields'] );
	$post_meta_layout_section['fields']  = $fields;  

	$post_format_section = array(
		'name'  => 'post_format_data_section',
		'title' => esc_html__('Post Format', 'kalvi'),
		'icon'  => 'fa fa-cog',
		'fields' =>  array(

			array(
				'id'      => 'show-featured-image',
				'type'    => 'switcher',
				'title'   => esc_html__('Show Featured Image', 'kalvi' ),
				'default' => true,
				'info'    => esc_html__('YES! to show featured image','kalvi')
			),

			array(
				'id'           => 'single-post-style',
				'type'         => 'select',
				'title'        => esc_html__('Post Style', 'kalvi'),
				'options'      => array(
				  'standard'      		=> esc_html__('Standard', 'kalvi'),
				  'info-within-image'   => esc_html__('Info WithIn Image', 'kalvi'),
				  'info-bottom-image'   => esc_html__('Info Over Image Bottom Left', 'kalvi'),
				  'info-vertical-image' => esc_html__('Info Over Image Vertically Center', 'kalvi'),
				  'info-above-image'    => esc_html__('Info Above Image', 'kalvi'),
				),
				'class'        => 'chosen',
				'default'      => 'standard',
				'info'         => esc_html__('Choose post style to display single post.', 'kalvi')
			),

			array(
			    'id'           => 'view_count',
			    'type'         => 'text',
			    'title'        => esc_html__('Views', 'kalvi' ),
				'info'         => esc_html__('No.of views of this post.', 'kalvi')
			),

			array(
			    'id'           => 'like_count',
			    'type'         => 'text',
			    'title'        => esc_html__('Likes', 'kalvi' ),
				'info'         => esc_html__('No.of likes of this post.', 'kalvi')
			),

			array(
				'id' => 'post-format-type',
				'title'   => esc_html__('Type', 'kalvi' ),
				'type' => 'select',
				'default' => 'standard',
				'options' => array(
					'standard'  => esc_html__('Standard', 'kalvi'),
					'status'	=> esc_html__('Status','kalvi'),
					'quote'		=> esc_html__('Quote','kalvi'),
					'gallery'	=> esc_html__('Gallery','kalvi'),
					'image'		=> esc_html__('Image','kalvi'),
					'video'		=> esc_html__('Video','kalvi'),
					'audio'		=> esc_html__('Audio','kalvi'),
					'link'		=> esc_html__('Link','kalvi'),
					'aside'		=> esc_html__('Aside','kalvi'),
					'chat'		=> esc_html__('Chat','kalvi')
				)
			),

			array(
				'id' 	  => 'post-gallery-items',
				'type'	  => 'gallery',
				'title'   => esc_html__('Add Images', 'kalvi' ),
				'add_title'   => esc_html__('Add Images', 'kalvi' ),
				'edit_title'  => esc_html__('Edit Images', 'kalvi' ),
				'clear_title' => esc_html__('Remove Images', 'kalvi' ),
				'dependency' => array( 'post-format-type', '==', 'gallery' ),
			),

			array(
				'id' 	  => 'media-type',
				'type'	  => 'select',
				'title'   => esc_html__('Select Type', 'kalvi' ),
				'dependency' => array( 'post-format-type', 'any', 'video,audio' ),
		      	'options'	=> array(
					'oembed' => esc_html__('Oembed','kalvi'),
					'self' => esc_html__('Self Hosted','kalvi'),
				)
			),

			array(
				'id' 	  => 'media-url',
				'type'	  => 'textarea',
				'title'   => esc_html__('Media URL', 'kalvi' ),
				'dependency' => array( 'post-format-type', 'any', 'video,audio' ),
			),
		)
	);

	$options[] = array(
		'id'        => '_dt_post_settings',
		'title'     => esc_html__('Post Settings','kalvi'),
		'post_type' => 'post',
		'context'   => 'normal',
		'priority'  => 'high',
		'sections'  => array(
			$post_meta_layout_section,
			$meta_breadcrumb_section,
			$post_format_section			
		)
	);

// -----------------------------------------
// Tribe Events Post Metabox Options
// -----------------------------------------
  array_push( $post_meta_layout_section['fields'], array(
    'id' => 'event-post-style',
    'title'   => esc_html__('Post Style', 'kalvi' ),
    'type' => 'select',
    'default' => 'type1',
    'options' => array(
      'type1'  => esc_html__('Classic', 'kalvi'),
      'type2'  => esc_html__('Full Width','kalvi'),
      'type3'  => esc_html__('Minimal Tab','kalvi'),
      'type4'  => esc_html__('Clean','kalvi'),
      'type5'  => esc_html__('Modern','kalvi'),
    ),
	'class'    => 'chosen',
	'info'     => esc_html__('Your event post page show at most selected style.', 'kalvi')
  ) );

  $options[] = array(
    'id'        => '_custom_settings',
    'title'     => esc_html__('Settings','kalvi'),
    'post_type' => 'tribe_events',
    'context'   => 'normal',
    'priority'  => 'high',
    'sections'  => array(
      $post_meta_layout_section,
      $meta_breadcrumb_section
    )
  );


// -----------------------------------------
// Header And Footer Options Metabox
// -----------------------------------------
$post_types = apply_filters( 'kalvi_header_footer_default_cpt' , array ( 'post', 'page' )  );
$options[] = array(
	'id'	=> '_dt_custom_settings',
	'title'	=> esc_html__('Header & Footer','kalvi'),
	'post_type' => $post_types,
	'priority'  => 'high',
	'context'   => 'side', 
	'sections'  => array(
	
		# Header Settings
		array(
			'name'  => 'header_section',
			'title' => esc_html__('Header', 'kalvi'),
			'icon'  => 'fa fa-angle-double-right',
			'fields' =>  array(
			
				# Header Show / Hide
				array(
					'id'		=> 'show-header',
					'type'		=> 'switcher',
					'title'		=> esc_html__('Show Header', 'kalvi'),
					'default'	=>  true,
				),
				
				# Header
				array(
					'id'  		 => 'header',
					'type'  	 => 'select',
					'title' 	 => esc_html__('Choose Header', 'kalvi'),
					'class'		 => 'chosen',
					'options'	 => 'posts',
					'query_args' => array(
						'post_type'	 => 'dt_headers',
						'orderby'	 => 'ID',
						'order'		 => 'ASC',
						'posts_per_page' => -1,
					),
					'default_option' => esc_attr__('Select Header', 'kalvi'),
					'attributes' => array( 'style'	=> 'width:50%' ),
					'info'		 => esc_html__('Select custom header for this page.','kalvi'),
					'dependency'	=> array( 'show-header', '==', 'true' )
				),							
			)			
		),
		# Header Settings

		# Footer Settings
		array(
			'name'  => 'footer_settings',
			'title' => esc_html__('Footer', 'kalvi'),
			'icon'  => 'fa fa-angle-double-right',
			'fields' =>  array(
			
				# Footer Show / Hide
				array(
					'id'		=> 'show-footer',
					'type'		=> 'switcher',
					'title'		=> esc_html__('Show Footer', 'kalvi'),
					'default'	=>  true,
				),
				
				# Footer
		        array(
					'id'         => 'footer',
					'type'       => 'select',
					'title'      => esc_html__('Choose Footer', 'kalvi'),
					'class'      => 'chosen',
					'options'    => 'posts',
					'query_args' => array(
						'post_type'  => 'dt_footers',
						'orderby'    => 'ID',
						'order'      => 'ASC',
						'posts_per_page' => -1,
					),
					'default_option' => esc_attr__('Select Footer', 'kalvi'),
					'attributes' => array( 'style'  => 'width:50%' ),
					'info'       => esc_html__('Select custom footer for this page.','kalvi'),
					'dependency'    => array( 'show-footer', '==', 'true' )
				),			
			)			
		),
		# Footer Settings
		
	)	
);



	
CSFramework_Metabox::instance( $options );