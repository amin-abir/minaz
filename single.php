<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package minaz
 */

get_header();
?>
<main id="site-content" class="site-main container single-blog-block">
    <div id="primary" class="content-area">
        <div class="row">
            <div class="col-md-8">
                <?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

				if ( is_singular( 'post' ) ) {
					// Previous/next post navigation.
					the_post_navigation(
						array(
							'next_text' => '<span class="next-post">' . __( 'Next:', 'minaz' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="previous-post">' . __( 'Previous:', 'minaz' ) . '</span> ' .
								'<span class="post-title">%title</span>',
						)
					);
				}
				?>
				
				
				
				<?php // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>
	
				<?php 
				endwhile; // End of the loop.
				?>
            </div>
            <!--/col-md-8-->
            <div class="col-md-4">
			<?php get_sidebar();?>
			</div>
        </div>
		
        <!--/Row-->     
    </div><!-- #primary -->
</main><!-- #main -->

<?php
get_footer();