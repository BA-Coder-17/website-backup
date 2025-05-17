<?php add_action( 'vc_before_init', 'dt_sc_special_events_list_vc_map' );
function dt_sc_special_events_list_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Special Events List", 'designthemes-core' ),
		"base" => "dt_sc_special_events_list",
		"icon" => "dt_sc_special_events_list",
		"category" => DT_VC_CATEGORY .' ( '.esc_html__('Events','designthemes-core').')',
		"params" => array(

			// Limit
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Limit', 'designthemes-core' ),
				'param_name' => 'limit',
				'description' => esc_html__( 'Enter limit', 'designthemes-core' )
			),

			// Categories
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Categories', 'designthemes-core' ),
				'param_name' => 'categories',
				'description' => esc_html__( 'Enter categories', 'designthemes-core' )
			),									

			// Post type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type','designthemes-core'),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Type 1','designthemes-core') => 'type1', 
					esc_html__('Type 2','designthemes-core') => 'type2', 
					esc_html__('Type 3','designthemes-core') => 'type3', 
					esc_html__('Type 4','designthemes-core') => 'type4', 
					esc_html__('Type 5','designthemes-core') => 'type5',
					esc_html__('Type 6','designthemes-core') => 'type6'
				),
				'std' => 'type1'
			),

			// Columns
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns','designthemes-core'),
				'param_name' => 'column',
				'value' => array(
					esc_html__('I Column','designthemes-core') => 1,
					esc_html__('II Columns','designthemes-core') => 2 ,
					esc_html__('III Columns','designthemes-core') => 3,
				),
				'std' => 3
			),

		)
	) );
}?>