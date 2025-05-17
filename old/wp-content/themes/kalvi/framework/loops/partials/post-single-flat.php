<?php
	global $post;

	$show_format_meta = cs_get_option( 'post-format-meta' );
	$show_format_meta = !empty( $show_format_meta ) ? "" : "hidden";

	$show_author_meta = cs_get_option( 'post-author-meta' );
	$show_author_meta = !empty( $show_author_meta ) ? "" : "hidden";

	$show_date_meta = cs_get_option( 'post-date-meta' );
	$show_date_meta = !empty( $show_date_meta ) ? "" : "hidden";	

	$show_comment_meta = cs_get_option( 'post-comment-meta' );
	$show_comment_meta = !empty( $show_comment_meta ) ? "" : "hidden";

	$show_category_meta = cs_get_option( 'post-category-meta' );
    $show_category_meta = !empty( $show_category_meta ) ? "" : "hidden";
    
    $show_post_likes = cs_get_option( 'post-likes' );
	$show_post_likes = !empty( $show_post_likes ) ? "" : "hidden";

	$show_post_views = cs_get_option( 'post-views' );
	$show_post_views = !empty( $show_post_views ) ? "" : "hidden";

	$show_tag_meta = cs_get_option( 'post-tag-meta' );
	$show_tag_meta = !empty( $show_tag_meta ) ? "" : "hidden";

	$post_meta = get_post_meta($post->ID, '_dt_post_settings', TRUE);
	$post_meta = is_array($post_meta) ? $post_meta : array();
	
	$format = !empty( $post_meta['post-format-type'] ) ? $post_meta['post-format-type'] : 'standard'; ?>

    <!-- Featured Image -->
    <div class="entry-thumb">
        <div class="blog-image">
            <?php get_template_part( 'framework/loops/partials/entry', 'thumb' ); ?>
        </div>

        <div class="date <?php echo esc_attr($show_date_meta);?>"><?php echo get_the_date ('M'); ?><?php echo get_the_date (' d, '); ?><?php echo get_the_date ('Y'); ?></div>

        <!-- Share -->
        <?php if( shortcode_exists( 'dt_sc_post_social_share' ) && class_exists( 'DTCorePlugin' ) ):
                  echo do_shortcode('[dt_sc_post_social_share post_id="'.$post->ID.'" /]');
              endif;?><!-- Share -->

        <!-- Entry Format -->
        <div class="entry-format <?php echo esc_attr($show_format_meta);?>">
            <a class="ico-format" href="<?php echo esc_url(get_post_format_link( $format ));?>"></a>
        </div><!-- Entry Format -->
    </div><!-- Featured Image -->

    <div class="author <?php echo esc_attr( $show_author_meta );?>"><span><?php echo esc_html__('Posted by: ', 'kalvi'); ?><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" title="<?php esc_attr_e('View all posts by ', 'kalvi'); echo get_the_author();?>"><?php echo get_the_author();?></a></span></div>

    <!-- Entry Meta Data -->
    <div class="entry-meta-data"><?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ):?>
            <div class="<?php echo esc_attr( $show_category_meta );?> category"><?php the_category(' '); ?></div><?php
        endif;?>
    </div><!-- Entry Meta Data -->
    
    <div class="entry-title">
        <!-- <h4><a href="<?php the_permalink();?>" title="<?php printf( esc_attr__('Permalink to %s','kalvi'), the_title_attribute('echo=0'));?>"><?php the_title(); ?></a></h4> -->
    </div>
    
    <!-- Entry Details -->
    <div class="entry-details">

        <div class="entry-body">
           <?php the_content();?>
           <?php wp_link_pages( array( 'before'=>'<div class="page-link">', 'after'=>'</div>', 'link_before'=>'<span>', 'link_after'=>'</span>', 'next_or_number'=>'number',
                            'pagelink' => '%', 'echo' => 1 ) );?>
        </div>

        <!-- Meta -->
        <div class="entry-meta">
		    <?php the_tags("<div class='tags {$show_tag_meta}'>".esc_html__('Tags : ', 'kalvi') ,', ','</div>'); ?>

            <div class="comments <?php echo esc_attr($show_comment_meta);?>">
            	<i class="fa fa-comments-o"> </i>
				<?php comments_popup_link('0', '1', '%', '', esc_html__('Off', 'kalvi')); ?>
            </div>

            <?php if( shortcode_exists( 'dt_sc_post_view_count' ) && shortcode_exists( 'dt_sc_post_like_count' ) && class_exists( 'DTCorePlugin' ) ): ?>
                <div class="entry-info">
                    <div class="dt-sc-like-views">
                        <div class="views <?php echo esc_attr($show_post_views);?>">
                            <i class="fa fa-eye"> </i>
                            <span><?php echo do_shortcode('[dt_sc_post_view_count post_id="'.$post->ID.'" /]'); ?></span>
                        </div>
                        
                        <div class="likes dt_like_btn <?php echo esc_attr($show_post_likes);?>">
                            <i class="fa fa-heart"> </i>
                            <a href="#" data-postid="<?php the_ID(); ?>" data-action="like">
                                <i><?php echo do_shortcode('[dt_sc_post_like_count post_id="'.$post->ID.'" /]'); ?></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif;?>    
        </div><!-- Meta -->
    </div><!-- Entry Details -->

	<?php edit_post_link( esc_html__( ' Edit ','kalvi' ) ); ?>