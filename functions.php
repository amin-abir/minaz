<?php
/**
 * minaz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package minaz
 */

if ( ! function_exists( 'minaz_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function minaz_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on minaz, use a find and replace
		 * to change 'minaz' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'minaz', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'minaz' ),
			
		) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'minaz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minaz_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'minaz_content_width', 1040 );
}
add_action( 'after_setup_theme', 'minaz_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
 
function minaz_scripts() {
	wp_enqueue_style( 'minaz-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	
	wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/css/slick.css');
	
	wp_enqueue_style( 'slick-theme-style', get_template_directory_uri() . '/assets/css/slick-theme.css');
	 
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;1,400&family=Jost:ital,wght@0,400;0,500;1,400&display=swap');

	wp_enqueue_style( 'navbar', get_template_directory_uri() . '/assets/css/navbar.min.css');
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');
	
	wp_enqueue_style( 'minaz-main-style', get_template_directory_uri() . '/assets/css/minaz-style.css');

	wp_enqueue_script('jquery');

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'navbar-js', get_template_directory_uri() . '/assets/js/navbar.min.js', array(), '20151215', true );
	
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.js', array(), '20151215', true );
	
	wp_enqueue_script( 'lazyload', get_template_directory_uri() . '/assets/js/lazy-load-images.min.js', array(), '20151215', true );
		
	wp_enqueue_script( 'minaz-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'minaz_scripts' );



/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/hook/hook.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

require get_template_directory() . '/inc/customizer/customizer-blog.php';

require get_template_directory() . '/inc/customizer/customizer-theme-color.php';


//Custom Widgets 
require_once get_template_directory()  . '/inc/widgets/social-icons.php';
require_once get_template_directory()  . '/inc/widgets/about_widget.php';


/**
 * TGM plugin activation
 */
require get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

/**
 * Theme required plugin
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

