<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minaz
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('thumbnail'); ?>>
    <div class="caption">
        <header class="entry-header">
			<div class="single-post-block-meta">
				<?php minaz_get_category(); ?>
			</div>
			
            <?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;?>
          	
			  <div class="single-post-date">
				<?php 
				minaz_posted_on();
				?>
			</div>
            <?php if ( 'post' === get_post_type() ) :?>
            <?php minaz_post_thumbnail(); ?>
            <?php endif; ?>
			
			<div class="single-post-author">
				<?php 
				minaz_posted_by();  ?>
				
			</div>


        </header><!-- .entry-header -->
        <div class="single-post-block-content entry-content mb-4 mt-4">
            <?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'minaz' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			?>
        </div><!-- .entry-content -->
    </div>
</div>