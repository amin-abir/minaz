<?php
/**
 * Header of minaz theme
 * @package minaz
 * @subpackage minaz
 * @since minaz 1.0
 * */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<?php
/**
 * Hook - minaz_action_header
 *
 * @hooked minaz_header - 10
 */
	do_action( 'minaz_action_header' );
?>