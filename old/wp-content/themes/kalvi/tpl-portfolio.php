<?php
/*
Template Name: Form Template
*/
get_header();
    $settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
    $settings = is_array( $settings ) ?  array_filter( $settings )  : array();

    $global_breadcrumb = cs_get_option( 'show-breadcrumb' );

    $header_class = '';
    if( !$settings['enable-sub-title'] || !isset( $settings['enable-sub-title'] ) ) {
        if( isset( $settings['show_slider'] ) && $settings['show_slider'] ) {
            if( isset( $settings['slider_type'] ) ) {
                $header_class =  $settings['slider_position'];
            }
        }
    }
    
    if( !empty( $global_breadcrumb ) ) {
        if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
            $header_class = $settings['breadcrumb_position'];
        }
    }?>
<!-- ** Header Wrapper ** -->
<div id="header-wrapper" class="<?php echo esc_attr($header_class); ?>">

    <!-- **Header** -->
    <header id="header">

        <div class="container"><?php
            /**
             * kalvi_header hook.
             * 
             * @hooked kalvi_vc_header_template - 10
             *
             */
            do_action( 'kalvi_header' ); ?>
        </div>
    </header><!-- **Header - End ** -->
<div class="fullwidth">
   <div class="container">
  <div class="vc_row">
    <div class="vc_col-xs-12 vc_col-md-8 vc_col-lg-8">
        
        <div class="fleftcontent">
            <h1>
               <?php echo get_the_title();?>
                
            </h1>
<div class="thim-widget-icon-box template-base">
 <div class="wrapper-box-icon text-left  ">
  <div class="smicon-box iconbox-left">
  <div class="boxes-icon" ><span class="inner-icon">
  <span class="icon"><i class="fa fa-pencil" ></i></span></span></div>
         <div class="content-inner">
            <div class="sc-heading article_heading">
               <div class="heading__primary">Expert Instructors</div>
            </div>
    <div class="desc-icon-box">
       <div class="desc-content">With the team of professionals, we guarantee the best lessons and courses for your students</div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="thim-widget-icon-box template-base">
 <div class="wrapper-box-icon text-left  ">
  <div class="smicon-box iconbox-left">
  <div class="boxes-icon" ><span class="inner-icon">
  <span class="icon"><i class="fa fa-newspaper-o" ></i></span></span></div>
         <div class="content-inner">
            <div class="sc-heading article_heading">
               <div class="heading__primary">Learning Content</div>
            </div>
    <div class="desc-icon-box">
       <div class="desc-content">Detailed Learning Documents and Video Tutorials are well-prepared and can be accessed anytime.</div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="thim-widget-icon-box template-base">
 <div class="wrapper-box-icon text-left  ">
  <div class="smicon-box iconbox-left">
  <div class="boxes-icon" ><span class="inner-icon">
  <span class="icon"><i class="fa fa-graduation-cap" ></i></span></span></div>
         <div class="content-inner">
            <div class="sc-heading article_heading">
               <div class="heading__primary">Powerful Learning Tools</div>
            </div>
    <div class="desc-icon-box">
       <div class="desc-content">NMIMS NGASCE can provide the best environment for learning via a friendly UI with many exclusive features.</div>
            </div>
         </div>
      </div>
   </div>
</div>
        </div>
        
    </div>
    <div class="vc_col-xs-12 vc_col-md-4 vc_col-lg-4">
        <div class="innerpageform">
            <h3>Enquire Now</h3>
            <?php echo do_shortcode('[contact-form-7 id="12596" title="Inner Page Form"]');?>
        </div>
        
        
    </div>
  </div>
</div>
</div>




    <!-- ** Breadcrumb ** -->
    <?php
        # Global Breadcrumb
        if( !empty( $global_breadcrumb ) ) {
            if( isset( $settings['enable-sub-title'] ) && $settings['enable-sub-title'] ) {
                $breadcrumbs = array();
                $bstyle = kalvi_cs_get_option( 'breadcrumb-style', 'default' );

                if( $post->post_parent ) {
                    $parent_id  = $post->post_parent;
                    $parents = array();

                    while( $parent_id ) {
                        $page = get_page( $parent_id );
                        $parents[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
                        $parent_id  = $page->post_parent;
                    }

                    $parents = array_reverse( $parents );
                    $breadcrumbs = array_merge_recursive($breadcrumbs, $parents);
                }

                $breadcrumbs[] = the_title( '<span class="current">', '</span>', false );
                $style = kalvi_breadcrumb_css( $settings['breadcrumb_background'] );

                kalvi_breadcrumb_output ( the_title( '<h1>', '</h1>',false ), $breadcrumbs, $bstyle, $style );
            }
        }
    ?><!-- ** Breadcrumb End ** -->                
</div><!-- ** Header Wrapper - End ** -->

<!-- **Main** -->
<div id="main">

    <?php
    $page_layout  = array_key_exists( "layout", $settings ) ? $settings['layout'] : "content-full-width";
    $layout = kalvi_page_layout( $page_layout );
    extract( $layout );
    ?>

    <!-- ** Container ** -->
    <div class="<?php echo esc_attr($container_class); ?>">

  
        <!-- Primary -->
        <section id="primary" class="<?php echo esc_attr( $page_layout );?>"><?php
            if( have_posts() ) {
                while( have_posts() ) {
                    the_post();
                    get_template_part( 'framework/loops/content', 'page' );
                }
            }?>

            <div class="dt-sc-clear"></div>

              <!-- Portfolio Template -->
        </section><!-- Primary End -->
    </div>
    <!-- ** Container End ** -->
    
</div><!-- **Main - End ** -->    
<?php get_footer(); ?>