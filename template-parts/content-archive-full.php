<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package minaz
 */

?>

<div id="post-<?php the_ID();?>" <?php post_class('row mb-4 home-blog'); ?>>
	<div class="col-md-12">
		<div class="caption">
			<header class="entry-header list">
				<?php if ( 'post' === get_post_type() ) :?>
				<?php  if(has_post_thumbnail()):?>
				<?php 
				minaz_post_thumbnail('minaz-blog-thumbnail'); 
				else:?>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/no-thumb.png">
				
				<?php 
				endif;
				?>
				<?php endif; ?>

			</header><!-- .entry-header -->
		</div>
		<div class="blog_post_meta mt-3 mb-2">
			<?php
			minaz_get_category();
			
			?>
		</div>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title mb-2">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title mb-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;?>
		
		<div class="entry-content">
			<?php echo minaz_get_excerpt(255);?>
		</div><!-- .entry-content -->
		<div class="post-date">
			<?php minaz_posted_on(); ?>
			</div>
	</div>
</div>
<hr>

