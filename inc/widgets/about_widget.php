<?php
/* About Widget */

add_action( 'widgets_init', 'minaz_about_load_widget' );

function minaz_about_load_widget() {
	register_widget( 'minaz_about_widget' );
}

class minaz_about_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */

	public function __construct() {
		/* Widget settings. */
		$widget_options = array(
			'classname'   => 'minaz_about_widget',
			'description' => esc_html__( 'A widget that displays an About widget', 'minaz' )
		);
		/* Widget control settings. */
		$control_options = array(
			'width'  => 250,
			'height' => 350
		);
		parent::__construct( 'minaz_about_widget', esc_html__( 'Minaz About Author', 'minaz' ), $widget_options, $control_options );
	}

	/**
	 * How to display the widget on the screen.
	 */
	public function widget( $args, $instance ) {

		/* Our variables from the widget settings. */
		$title = isset($instance['title']) ? $instance['title'] : '';
		$image = isset($instance['image']) ? $instance['image'] : '';
		$name  = isset($instance['name']) ? $instance['name'] : '';
		$subtitle  = isset($instance['subtitle']) ? $instance['subtitle'] : '';
		$description = isset($instance['description']) ? $instance['description'] : '';

		/* Before widget (defined by themes). */
		echo $args['before_widget'];

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		?>

		<div class="about-widget">

			<?php if ( $image ) : ?>
				<div class=" about-image">
				<img class="img-responsive" src="<?php echo esc_url( $image ); ?>"
				     alt="<?php echo esc_attr( $title ); ?>"/>
					 <div class="about-curve"></div>
			   </div>
			<?php endif; ?>
            <div class="about-widget-content">
			<?php if ( $name ) : ?>
				<div class="about-me-name"><?php echo esc_html( $name ); ?></div>
			<?php endif; ?>

			<?php if ( $subtitle ) : ?>
				<div class="about-me-subtitle"><?php echo esc_html( $subtitle ); ?></div>
			<?php endif; ?>

			<?php if ( $description ) : ?>
				<div class="about-me-content"><?php echo esc_html( $description ); ?></div>
			<?php endif; ?>
            </div>
		</div>

		<?php

		/* After widget (defined by themes). */
		echo $args['after_widget'];
	}

	/**
	 * Update the widget settings.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		
		$instance['title']       = sanitize_text_field( $new_instance['title'] );
		$instance['image']       = esc_url_raw( $new_instance['image'] );
		$instance['name']        = sanitize_text_field( $new_instance['name'] );
		$instance['subtitle']    = sanitize_text_field( $new_instance['subtitle'] );
		$instance['description'] = sanitize_text_field( $new_instance['description'] );

		return $instance;
	}


	public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __( 'About Author', 'minaz' ), 'image' => '', 'name' => '', 'description' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'minaz' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
			       value="<?php echo esc_attr( $instance['title'] ); ?>" style="width:96%;"/>
		</p>

		<!-- image url -->
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php _e( 'Image URL:', 'minaz' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>"
			       value="<?php echo esc_url( $instance['image'] ); ?>" style="width:96%;"/><br/>
			<small><?php _e( 'Insert your image URL. Your image should be at least 300px wide for best result.', 'minaz' ) ?></small>
		</p>

        <!-- Name -->
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php esc_html_e( 'Name:', 'minaz' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>"
			       value="<?php echo esc_attr( $instance['name'] ); ?>" style="width:96%;"/>
		</p>
		 <!-- Designation -->
		 <p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"><?php esc_html_e( 'Designation:', 'minaz' ) ?></label>
			<input id="<?php echo esc_attr( $this->get_field_id( 'subtitle' ) ); ?>"
			       name="<?php echo esc_attr( $this->get_field_name( 'subtitle' ) ); ?>"
			       value="<?php echo esc_attr( $instance['subtitle'] ); ?>" style="width:96%;"/>
		</p>

		<!-- description -->
		<p>
			<label
				for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'About me text:', 'minaz' ) ?></label>
			<textarea id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"
			          name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" value = "<?php echo esc_attr( $instance['description'] ); ?>" style="width:95%;"
			          rows="6"></textarea>
		</p>


		<?php
	}
}

?>