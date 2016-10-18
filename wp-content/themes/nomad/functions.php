<?php
/**
 * Nomad functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nomad
 */

if ( ! function_exists( 'nomad_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nomad_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Nomad, use a find and replace
	 * to change 'nomad' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nomad', get_template_directory() . '/languages' );

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
	add_editor_style();
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'nomad-featured-thumbnails',  640, 430, true );
	add_image_size( 'nomad-thumb-medium', 600, 400, true );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'nomad' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nomad_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'nomad_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nomad_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nomad_content_width', 640 );
}
add_action( 'after_setup_theme', 'nomad_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nomad_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nomad' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer One', 'nomad' ),
		'id' => 'footer-one-widget',
		'before_widget' => '<div id="footer-one" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Two', 'nomad' ),
		'id' => 'footer-two-widget',
		'before_widget' => '<div id="footer-two" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Three', 'nomad' ),
		'id' => 'footer-three-widget',
		'before_widget' => '<div id="footer-three" class="widget footer-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Header Widget', 'nomad' ),
		'id' => 'header-widget',
		'before_widget' => '<div id="header-widget" class="header-widget">',
		'after_widget' => "</div>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

}
add_action( 'widgets_init', 'nomad_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nomad_scripts() {
	global $wp_scripts;
	global $wp_styles;

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/assets/css/bootstrap.min.css', array(), false ,'screen' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css' );
	wp_enqueue_style('nomad-google-Fonts', '//fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900|Ubuntu:400,300,500,700');
	wp_enqueue_style( 'nomad-ie-style', get_stylesheet_directory_uri() . "/assets/css/ie.css", array()  );
    $wp_styles->add_data( 'nomad-ie-style', 'conditional', 'IE' );
	wp_enqueue_style( 'nomad-style', get_stylesheet_uri() );

	wp_enqueue_script( 'nomad-responsive-js', get_template_directory_uri() . '/js/responsive.js', array('jquery') );
	wp_enqueue_script( 'nomad-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery-masonry', 'imagesloaded') );
	wp_enqueue_script( 'nomad-ie-responsive-js', get_template_directory_uri() . '/js/ie-responsive.min.js', array() );
	$wp_scripts->add_data( 'nomad-ie-responsive-js', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'nomad-ie-shiv', get_template_directory_uri() . "/js/html5shiv.min.js");
	$wp_scripts->add_data( 'nomad-ie-shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'nomad-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'nomad-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	$slider_speed = 6000;
	if ( get_theme_mod( 'nomad_slider_speed_setting' ) ) {
		$slider_speed = get_theme_mod( 'nomad_slider_speed_setting' ) ;
	}
	wp_localize_script( "nomad-custom-js", "slider_speed", array('vars' => $slider_speed) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nomad_scripts' );

function nomad_custom_title($before = '', $after = '', $echo = true, $length = false) { $title = get_the_title();

	if ( $length && is_numeric($length) ) {
		$title = substr( $title, 0, $length );
	}

	if ( strlen($title)> 0 ) {
		$title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
		if ( $echo )
			echo $title;
		else
			return $title;
	}
}

function nomad_exclude_category( $query ) {
	$cat_name = get_theme_mod( 'nomad_featured_category_setting');
	$cat_name =  str_replace('-',' ', $cat_name);
	$cat_id = get_cat_ID( $cat_name );
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '-'.$cat_id );
    }
}
add_action( 'pre_get_posts', 'nomad_exclude_category' );

function nomad_ignore_sticky( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'ignore_sticky_posts', true );
}
add_action( 'pre_get_posts', 'nomad_ignore_sticky' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Widget.
 */
require get_template_directory() . '/inc/widget.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
