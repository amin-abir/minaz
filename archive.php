<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minaz
 */

get_header();
?>
<main id="site-content" class="site-main container mt-5">
    <div id="primary" class="content-area">
        <div class="row">
            <div class="col-md-8">

                <?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
                <header>
                    <h1 class="page-title screen-reader-text entry-title mb-3"><?php single_post_title(); ?></h1>
                </header>
                <?php
						endif;

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'archive');

						endwhile;

						the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
            </div>
			<aside class="sidebar col-md-3 text-left">
				<div class="blog-sidebar">
					<?php get_sidebar();?>
				</div>
			</aside>
        </div>
    </div><!-- #primary -->
</main><!-- #main -->

<?php
get_footer();