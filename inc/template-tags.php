<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package minaz
 */

if ( ! function_exists( 'minaz_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function minaz_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'minaz' ),// phpcs:ignore WordPress.WP.I18n.NoEmptyStrings
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="post-date">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'minaz_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function minaz_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'minaz' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

/**Get Single Category**/

if ( ! function_exists( 'minaz_get_category' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function minaz_get_category() {
		$category = get_the_category();
		if ( !empty($category) && $category[0] ){?>
			<span> <a  class="minaz-cat" href="<?php echo esc_url(get_category_link( $category[0]->term_id ));?>"><?php echo esc_html($category[0]->cat_name);?></a></span>
	<?php }

	}
endif;


if ( ! function_exists( 'minaz_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function minaz_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'minaz' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'minaz' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'minaz' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tags %1$s', 'minaz' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'minaz' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'minaz' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'minaz_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function minaz_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('minaz-blog-thumbnail'); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>

		<a class="post-thumbnail lazy-load replace" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'minaz-blog-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
				'class' => 'preview'
				
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;