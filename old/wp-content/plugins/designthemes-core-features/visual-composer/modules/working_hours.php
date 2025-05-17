<?php add_action( 'vc_before_init', 'dt_sc_working_hours_vc_map' );
function dt_sc_working_hours_vc_map() {

	class WPBakeryShortCode_dt_sc_working_hours extends WPBakeryShortCodesContainer {
	}

	vc_map( array(
		"name"            => esc_html__("Working Hours", 'designthemes-core'),
		"base"            => "dt_sc_working_hours",
		"icon"            => "dt_sc_working_hours",
		"category"        => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view"         => 'VcColumnView',
		'as_parent'       => array( 'only' => 'dt_sc_work_hour' ),
		"description"     => esc_html__("Add weekly working hours.",'designthemes-core'),
		"params"          => array(

			# Text
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Text', 'designthemes-core'),
				'param_name' => 'text'
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)
		)
	) );
}?>