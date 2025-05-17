<?php add_action( 'vc_before_init', 'dt_sc_work_hour_vc_map' );
function dt_sc_work_hour_vc_map() {

	vc_map( array(
		"name"        => esc_html__("Working Hour", 'designthemes-core'),
		"base"        => "dt_sc_work_hour",
		"icon"        => "dt_sc_work_hour",
		"category"    => DT_VC_CATEGORY,
		'as_child'    => array( 'only' => 'dt_sc_working_hours' ),
		"description" => esc_html__("Add a day working hour.",'designthemes-core'),
		"params"      => array(

			# Day
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Day', 'designthemes-core'),
				'param_name' => 'day'
			),

			# Time
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Time', 'designthemes-core'),
				'param_name' => 'time'
			)
		)
	) );
}?>