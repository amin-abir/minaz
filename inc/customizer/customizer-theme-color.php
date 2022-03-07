<?php

function minaz_color_customizer_sections( $wp_customize ) {
	
	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'color_customizer', array(
 		'title'       => __( 'Color Settings', 'minaz' ),
 		'priority'    => 13,
 		'panel'       => 'minaz_customizer',
 	) );

    

}
add_action( 'customize_register', 'minaz_color_customizer_sections' );

function minaz_color_customizer_fields( $fields ) {
	 
	$fields[] = array(
        'type'        => 'color',
        'settings'    => 'minaz_body_color',
        'label'       => __( 'Body Background', 'minaz' ),
        'section'     => 'color_customizer',
        'priority'    => 10,
		'default'     => '#ededed',
		'transport'   => 'postMessage',
		'output' => array(
				array(
					'element'  => 'body',
					'property' => 'background-color',
				),
		),
    ); 
   $fields[] = array(
        'type'        => 'color',
        'settings'    => 'minaz_footer_color',
        'label'       => __( 'Footer Background', 'minaz' ),
        'section'     => 'color_customizer',
        'priority'    => 10,
		'default'     => '#ddd',
		'transport'   => 'postMessage',
		'output' => array(
				array(
					'element'  => '.footer',
					'property' => 'background-color',
				),
		),
    );
	 
    return $fields;
}
add_filter( 'kirki/fields', 'minaz_color_customizer_fields' );

?>