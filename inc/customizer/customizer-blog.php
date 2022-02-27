<?php

function minaz_blog_customizer_sections( $wp_customize ) {
	
	/**
	 * Add sections
	 */
     $wp_customize->add_section( 'blog_customizer', array(
 		'title'       => __( 'Slider Settings', 'minaz' ),
 		'priority'    => 12,
 		'panel'       => 'minaz_customizer',
 	) );

    

}
add_action( 'customize_register', 'minaz_blog_customizer_sections' );

function minaz_blog_customizer_fields( $fields ) {
	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'select_cat',
		'label'       => __( 'Slider Category', 'minaz' ),
		'description' => __( 'Select your category', 'minaz' ),
		'section'     => 'blog_customizer',
		'multiple'    => 999,
		'default'     => 0,
		'priority'    => 10,
		'choices'     => Kirki_Helper::get_terms( 'category' ),
    );
	
   $fields[] = array(
		'type'        => 'number',
		'settings'    => 'slider_blog_number',
		'label'       => esc_html__( 'Slider to show', 'minaz' ),
		'section'     => 'blog_customizer',
		'default'     => 5,
		'choices'     => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
    ); 
	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'order_setting',
		'label'       => esc_html__( 'Order', 'minaz' ),
		'section'     => 'blog_customizer',
		'default'     => 'DESC',
		'placeholder' => esc_html__( 'Select an option...', 'minaz' ),
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'DESC' => esc_html__( 'DESC', 'minaz' ),
			'ASC' => esc_html__( 'ASC', 'minaz' ),
		],
    );
	$fields[] = array(
		'type'        => 'select',
		'settings'    => 'order_by_setting',
		'label'       => esc_html__( 'Order by', 'minaz' ),
		'section'     => 'blog_customizer',
		'default'     => 'date',
		'placeholder' => esc_html__( 'Select an option...', 'minaz' ),
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'date' => esc_html__( 'date', 'minaz' ),
			'ID' => esc_html__( 'ID', 'minaz' ),
			'author' => esc_html__( 'author', 'minaz' ),
			'title' => esc_html__( 'title', 'minaz' ),
			'name' => esc_html__( 'name', 'minaz' ),
			'rand' => esc_html__( 'rand', 'minaz' ),
		],
    );
	 $fields[] = array(
        'type'        => 'color',
        'settings'    => 'minaz_slide_color',
        'label'       => __( 'Slider Background', 'minaz' ),
        'section'     => 'blog_customizer',
        'priority'    => 10,
		'transport'   => 'refresh',
		'output' => array(
				array(
					'element'  => '.slick-nav, .blog-slider figure:hover .slide-wrapper .slide-text',
					'property' => 'background',
				),
		),
    );
	
    return $fields;
}
add_filter( 'kirki/fields', 'minaz_blog_customizer_fields' );

?>