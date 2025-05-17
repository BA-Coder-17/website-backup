<?php add_action( 'vc_before_init', 'dt_sc_donutchart_vc_map' );
function dt_sc_donutchart_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Donut chart", 'designthemes-core' ),
		"base" => "dt_sc_donutchart",
		"icon" => "dt_sc_donutchart",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Label			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Label", 'designthemes-core' ),
      			"param_name" => "title",
      			"description" => esc_html__( "Enter text used as title of donut chart", 'designthemes-core' ),
      		),

      		// description
			array(
				"type" => "textarea",
      			'admin_label' => true,
      			"heading" => esc_html__( "Description", 'designthemes-core' ),
      			"param_name" => "desc",
      			"description" => esc_html__( "Enter text used as description of donut chart", 'designthemes-core' ),
      		),

			// Size
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Size', 'designthemes-core'),
				'param_name' => 'size',
				'admin_label' => true,
				'value' => array(
					esc_html__('Small','designthemes-core') => 'small',
					esc_html__('Medium','designthemes-core') => 'medium',
					esc_html__('Large','designthemes-core') => 'large'					
				),
				'std' => 'medium'
			),

			// Datasize
			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Data size", 'designthemes-core' ),
      			"param_name" => "datasize",
      			'value' => 100,
      			"description" => esc_html__( "Enter data size", 'designthemes-core' ),
      		),

			// Data Percentage
			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Data Percentage", 'designthemes-core' ),
      			"param_name" => "datapercent",
      			'value' => 60,
      			"description" => esc_html__( "Enter data percentage eg: 70% , give 70 only", 'designthemes-core' ),
      		),

			// Donut width
			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Donut Width", 'designthemes-core' ),
      			"param_name" => "donutwidth",
      			'value' => 5,
      			"description" => esc_html__( "Enter donut with ( 1 to 15 )", 'designthemes-core' ),
      		),      		

			// BG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Background color", 'designthemes-core' ),
      			"param_name" => "bgcolor",
      			"description" => esc_html__( "Select chart background color", 'designthemes-core' ),
      			'value' => '#79deff'
      		),

			// FG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Foreground color", 'designthemes-core' ),
      			"param_name" => "fgcolor",
      			"description" => esc_html__( "Select chart foreground color", 'designthemes-core' ),
      			'value' => '#666666'
      		),

			# Extra class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','designthemes-core')
      		)	      		      		      		      					
		)
	) );
}?>