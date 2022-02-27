
<?php
/**
 * The template for displaying sidebar results
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package minaz
 */
	if(is_active_sidebar('sidebar')){
		dynamic_sidebar( 'sidebar' );
	}
?>