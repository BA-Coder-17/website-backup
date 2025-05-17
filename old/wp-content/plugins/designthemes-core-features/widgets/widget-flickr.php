<?php 
class Kalvi_Flickr extends WP_Widget {
	#1.constructor
	function __construct() {
		$widget_options = array("classname"=>'widget_flickr', 'description'=>esc_html__('A widget that show last flickr photo streams', 'kalvi'));
		parent::__construct(false,KALVI_THEME_NAME.esc_html__(' Flickr Widget','kalvi'),$widget_options);
	}

	#2.widget input form in back-end
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title'=>'','flickr_id'=>'','count'=>'3','show'=>'latest','size'=>'s') );
						
		$title = 			empty($instance['title']) ?	'' : strip_tags($instance['title']);
		$flickr_id = 		empty($instance['flickr_id']) ? '' : strip_tags($instance['flickr_id']);
		$count = 			empty($instance['count']) ? '' : strip_tags($instance['count']);
		$show = 			empty($instance['show']) ? '' : strip_tags($instance['show']);
		$size = 			empty($instance['size']) ? '' : strip_tags($instance['size']);?>
        
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','kalvi');?> 
		   <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" 
            type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
           
        <p><label for="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>"><?php esc_html_e('Flickr ID:','kalvi');?>
           <input class="widefat" id="<?php echo esc_attr($this->get_field_id('flickr_id')); ?>" name="<?php echo esc_attr($this->get_field_name('flickr_id')); ?>"
            type="text" value="<?php echo esc_attr($flickr_id); ?>" /></label></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_html_e('How many entries do you want to show:','kalvi');?>
        	<select class="widefat" id="<?php echo esc_attr($this->get_field_id('count')); ?>" name="<?php echo esc_attr($this->get_field_name('count')); ?>">
            <?php for($i = 1; $i <= 30; $i++):	
					$selected = ($count == $i ) ? "selected='selected'" : "";?>
	              <option <?php echo esc_attr($selected);?> value="<?php echo esc_attr($i);?>"><?php echo esc_attr($i);?></option>
            <?php endfor;?>
            </select></label></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('show'));?>"><?php esc_html_e('What pictures to display','kalvi'); ?>
         	<select class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>" name="<?php echo esc_attr($this->get_field_name('show')); ?>">
            <?php  $a = array("latest"=>esc_html__("Latest",'kalvi'),"random"=>esc_html__("Random",'kalvi'));
			foreach($a as $key => $value ):
				$selected = ($show == $key ) ? "selected='selected'" : ""; 
				echo "<option value='$key' $selected> $value</option>";
			endforeach;?>	
            </select>
         </label></p>

         <p><label for="<?php echo esc_attr($this->get_field_id('size'));?>"><?php esc_html_e('What pictures to display','kalvi'); ?>
         	<select class="widefat" id="<?php echo esc_attr($this->get_field_id('size')); ?>" name="<?php echo esc_attr($this->get_field_name('size')); ?>">
            <?php  $a = array("s"=>esc_html__("square",'kalvi'),"t"=>esc_html__("thumbnail",'kalvi'), "m" => esc_html__("medium",'kalvi'));
			foreach($a as $key => $value ):
				$selected = ($size == $key ) ? "selected='selected'" : ""; 
				echo "<option value='$key' $selected> $value</option>";
			endforeach;?>	
            </select>
         </label></p>
<?php
	}
	
	#3.processes & saves the twitter widget option
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = strip_tags($new_instance['count']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);
		$instance['show'] = strip_tags($new_instance['show']);
		$instance['size'] = strip_tags($new_instance['size']);
		return $instance;
	}
	
	#4.output in front-end
	function widget($args, $instance) {
		extract($args);
		echo kalvi_before_after_widget( $before_widget );
			$title =		empty($instance['title']) ?	'' : strip_tags($instance['title']);
			$flickr_id =	empty($instance['flickr_id']) ? '' : strip_tags($instance['flickr_id']);
			$count = 		empty($instance['count']) ? '' : strip_tags($instance['count']);
			$show = 		$instance['show'];
			$size = 		$instance['size'];
			
			if ( !empty( $title ) ) {
				echo kalvi_widget_title( $before_title . $title . $after_title );	
			}

			echo "<div class='flickr-widget'>";
			echo'<script type="text/javascript" 
			src="http://www.flickr.com/badge_code_v2.gne?count='.$count.'&amp;display='.$show.'&amp;size='.$size.'&amp;layout=x&amp;source=user&amp;user='.$flickr_id.'"></script>'; 
			echo "</div>";
		echo kalvi_before_after_widget( $after_widget ); 
	}
}?>