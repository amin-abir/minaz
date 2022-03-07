<?php 
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Minaz
 */
if ( ! function_exists( 'minaz_header' ) ) :
	function minaz_header(){?>

<header class="nav-header">
	<div class="container">
		<div class="brand text-center mx-auto">
			<?php minaz_site_logo(); ?>
			<?php minaz_site_description();?>
		</div>
		<!--Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-theme">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
				aria-controls="navbar-collapse" aria-expanded="false"
				aria-label="<?php esc_attr_e( 'Toggle navigation', 'minaz' ); ?>">
				<span class="toggle-menu fa fa-bars"></span>
			</button>
			<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 3,
					'container'         => 'div',
					'container_class'   => 'collapse navbar-collapse justify-content-center',
					'container_id'      => 'navbar-collapse',
					'menu_class'        => 'nav navbar-nav',
					'items_wrap'		=> '<ul class="nav navbar-nav" data-function="navbar">%3$s</ul>',
				) );
			else:
			wp_page_menu(
				array(
					'container'  => 'div',
					'menu_id'    => 'navbar-collapse',
					'menu_class' => 'nav navbar-nav',
					'menu_class' => 'collapse navbar-collapse justify-content-center',
					'before'     => '<ul class="nav navbar-nav" data-function="navbar">',
					'after'      => '</ul>',
				)
			); 
		 endif; 
		 ?>
		</nav><!--/navbar-->
	</div>
  
    
</header>
<?php
	}
endif;
add_action('minaz_action_header','minaz_header', 10);

/**
Footer hook function
**/
if ( ! function_exists( 'minaz_footer' ) ) :
	function minaz_footer(){?>
<!--Footer-->
<footer class="footer sec-bg">
    <div class="container">
        <div class="row copyright_info">
            <div class="col-md-12">
                <div class="mt-2">
                    
                    <div class="footer-credits">
                        <p class="footer-copyright powered-by-wordpress">
                            &copy;
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?>.</a>
                            <?php
							echo date_i18n(
								/* translators: Copyright date format, see https://secure.php.net/date */
								_x( 'Y', 'copyright date format', 'minaz' )
							);
							?>
									
							
							| Made with &#9829; by<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'minaz' ) ); ?>">
							<?php _e( 'WordPress', 'minaz' ); ?>
							</a>
                        </p><!-- .powered-by-wordpress -->
                    </div><!-- .footer-credits -->
                    
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
	}
endif;
add_action('minaz_action_footer','minaz_footer', 10);

/** 
	Post Slider 
**/
if ( ! function_exists( 'minaz_blog_slider' ) ) :
function minaz_blog_slider(){

 if(has_post_thumbnail()):
?>
	<div class="slide-grid">
		<div class="blog-slider">
			<?php
           
            global $post;
			$args = array(
				'category'       	=> get_theme_mod('select_cat'),
				'posts_per_page' 	=> get_theme_mod('slider_blog_number'),
				'orderby'          	=> get_theme_mod('order_by_setting'),
				'order'            	=> get_theme_mod('order_setting'),
			);
			$query = get_posts($args);
				foreach ( $query as $post ) :// phpcs:ignore WordPress.WP.GlobalVariablesOverride
				 ?>
				<figure class="post-slider">
					 <?php 
						minaz_post_thumbnail();
					 ?>
					<div class="slide-wrapper">
					  <div class="slide-text bg">
						<div class="cat">
							<?php minaz_get_category();?>
						</div>
						<div class="slide-heading">
							<?php the_title( '<h2 class="slider-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
						</div>
						  <div class="slider-button">
							<?php echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'" class="button">'.'More'.'</a>'; ?>
						  </div>
						</div>
					</div>
				</figure>
				<?php
			endforeach; 
			wp_reset_postdata();
			?>
		</div>
		<button class="slick-nav slick-prev slick-arrow">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15.983px" height="11.837px" viewBox="0 0 15.983 11.837" enable-background="new 0 0 15.983 11.837" xml:space="preserve"><path class="thb-arrow-head" d="M1.486,5.924l4.845-4.865c0.24-0.243,0.24-0.634,0-0.876c-0.242-0.243-0.634-0.243-0.874,0L0.18,5.481
	c-0.24,0.242-0.24,0.634,0,0.876l5.278,5.299c0.24,0.241,0.632,0.241,0.874,0c0.24-0.241,0.24-0.634,0-0.876L1.486,5.924z"></path><path class="pp-arrow-line" d="M15.982,5.92c0,0.328-0.264,0.593-0.592,0.593H0.592C0.264,6.513,0,6.248,0,5.92c0-0.327,0.264-0.591,0.592-0.591h14.799
	C15.719,5.329,15.982,5.593,15.982,5.92z"></path></svg>
		</button>
		<button class="slick-nav slick-next slick-arrow">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15.983px" height="11.837px" viewBox="0 0 15.983 11.837" enable-background="new 0 0 15.983 11.837" xml:space="preserve"><path class="thb-arrow-head" d="M9.651,10.781c-0.24,0.242-0.24,0.635,0,0.876c0.242,0.241,0.634,0.241,0.874,0l5.278-5.299c0.24-0.242,0.24-0.634,0-0.876
l-5.278-5.299c-0.24-0.243-0.632-0.243-0.874,0c-0.24,0.242-0.24,0.634,0,0.876l4.845,4.865L9.651,10.781z"></path><path class="pp-arrow-line" d="M0.591,5.329h14.799c0.328,0,0.592,0.265,0.592,0.591c0,0.328-0.264,0.593-0.592,0.593H0.591C0.264,6.513,0,6.248,0,5.92
C0,5.593,0.264,5.329,0.591,5.329z"></path></svg>
		</button>
	</div>
<?php
endif;
}
endif;
/** 
	Post Slide Hooked
**/
add_action('minaz_blog_slider_action','minaz_blog_slider', 10);

