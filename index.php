<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minaz
 */

get_header();
?>

<?php 
/**
 * Hook - minaz_blog_slider_action
 *
 * @hooked minaz_blog_slider - 10
 */
do_action('minaz_blog_slider_action');
?>

<section id="site-content" class="site-main mt-6">
    <div id="primary" class="container">
        <div class="row">
            <div class="col-md-9">
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
					$count=0;
					while ( have_posts() ) :
						the_post();
					$count=$count+1;	

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						if($count%3 === 0):
							get_template_part( 'template-parts/content', 'archive-full');
						else:
						get_template_part( 'template-parts/content', 'archive');
						
						endif;
						

					endwhile;

					if(function_exists('minaz_the_posts_pagination')):
						minaz_the_posts_pagination();
					endif;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>
            </div>
            <div class="col-md-3">
			<?php get_sidebar();?>
			</div>
        </div>
    </div><!-- #primary -->
			</section><!-- #main -->

<?php
get_footer();