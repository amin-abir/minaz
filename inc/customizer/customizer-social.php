<?php

function minaz_customizer_sections( $wp_customize ) {
	/**
	 * Add panels
	 */
	$wp_customize->add_panel( 'minaz_customizer', array(
		'priority'    => 10,
		'title'       => __( 'Minaz Options', 'minaz' ),
	) );

	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'header_background', array(
 		'title'       => __( 'Social Settings', 'minaz' ),
 		'priority'    => 10,
 		'panel'       => 'minaz_customizer',
 	) );
	$wp_customize->add_section( 'social_color_setting', array(
 		'title'       => __( 'Social Color Settings', 'minaz' ),
 		'priority'    => 11,
 		'panel'       => 'minaz_customizer',
 	) );

    

}
add_action( 'customize_register', 'minaz_customizer_sections' );

function minaz_customizer_fields( $fields ) {

   $fields[] = array(
        'type'        => 'url',
        'settings'    => 'facebook',
        'label'       => __( 'Facebook URL', 'minaz' ),
        'section'     => 'header_background',
        'priority'    => 10,
    ); 
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'twitter',
        'label'       => __( 'Twitter', 'minaz' ),
        'section'     => 'header_background',
        'priority'    => 10,
    );
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'linkedin',
        'label'       => __( 'Linkedin', 'minaz' ),
        'section'     => 'header_background',
        'priority'    => 10,
    );
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'pinterest',
        'label'       => __( 'Pinterest', 'minaz' ),
        'section'     => 'header_background',
        'priority'    => 10,
    ); 
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'instagram',
        'label'       => __( 'Instagram', 'minaz' ),
        'section'     => 'header_background',
        'priority'    => 10,
    ); 
	$fields[] = array(
        'type'        => 'url',
        'settings'    => 'email',
        'label'       => __( 'Email', 'minaz' ),
        'section'     => 'header_background',
        'priority'    => 10,
    );
	$fields[] = array(
        'type'        => 'color',
        'settings'    => 'social_color',
        'label'       => __( 'Social Color', 'minaz' ),
        'section'     => 'social_color_setting',
        'priority'    => 11,
		'default'     => '#888',
		'transport'   => 'postMessage',
		'output' => array(
				array(
					'element'  => '.fa.social',
					'property' => 'color',
				),
		),
    );
	$fields[] = array(
        'type'        => 'dimension',
		'settings'    => 'social_font_size',
		'label'       => esc_html__( 'Font Size', 'minaz' ),
		'description' => esc_html__( 'Use any font size with size and unit (eg. 36px).', 'minaz' ),
		'section'     => 'social_color_setting',
		'default'     => '36px',
		'output' => array(
				array(
					'element'  => '.fa.social',
					'property' => 'font-size',
				),
		),
    );
	
    return $fields;

}
add_filter( 'kirki/fields', 'minaz_customizer_fields' );

?>