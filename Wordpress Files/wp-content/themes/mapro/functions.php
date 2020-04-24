<?php
/**
 * mapro functions and definitions.
 *
 * @package mapro
 */

if ( ! function_exists( 'mapro_setup' ) ) :

//Sets up theme defaults and registers support for various WordPress features.

function mapro_setup() {
	// Make theme available for translation.
	load_theme_textdomain( 'mapro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Let WordPress manage the document title.
	add_theme_support( 'title-tag' );


add_theme_support( 'custom-logo' );
	
	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'mapro' ),
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




	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mapro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', mapro_fonts_url() ) );
}
endif; // mapro_setup
add_action( 'after_setup_theme', 'mapro_setup' );

function mapro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mapro_content_width', 800 );
}
add_action( 'after_setup_theme', 'mapro_content_width', 0 );


if ( ! function_exists( 'mapro_fonts_url' ) ) :
/**
 * Register Google fonts for mapro.
 *
 * @since mapro 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function mapro_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'mapro' ) ) {
		$fonts[] = 'Open+Sans:400,400i';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Poppins Condensed font: on or off', 'mapro' ) ) {
		$fonts[] = 'Poppins:300,400,500,600,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'mapro' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}
 

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' =>  urlencode( implode( '|', $fonts ) ) ,
			'subset' =>  urlencode( $subsets ) ,
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function mapro_scripts() {

	 wp_enqueue_script( 'popper', get_template_directory_uri() . '/js/popper.js', array('jquery'), true );
	 wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), true );

	 wp_enqueue_script( 'owl-carousel
	 	', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), true );
	 wp_enqueue_script( 'mapro-owl-custom', get_template_directory_uri() . '/js/owl.custom.js', array('jquery'),true );

	 wp_enqueue_script( 'jquery-hover3d', get_template_directory_uri() . '/js/jquery.hover3d.js',true );
	wp_enqueue_script( 'jquery-navigation', get_template_directory_uri() . '/js/navigation.js', true );

	 wp_enqueue_script( 'mapro-custom', get_template_directory_uri() . '/js/custom.js',true );

	wp_enqueue_style( 'mapro-fonts', mapro_fonts_url(), array(), null );
 
 	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array());

 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array());

 	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array());

	wp_enqueue_style( 'owl-theme', get_template_directory_uri() . '/css/owl.theme.default.css', array());

	wp_enqueue_style( 'mapro-style', get_stylesheet_uri());

	wp_add_inline_style( 'mapro-style', mapro_inline_styles() );

	wp_enqueue_style('mapro-responsive', get_template_directory_uri() . '/css/responsive.css', array());
	wp_enqueue_style( 'mapro-preview', get_template_directory_uri() . '/css/preview.css', array());

	wp_enqueue_style( 'mapro-skin-2', get_template_directory_uri() . '/css/skin-2.css', array());
	



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mapro_scripts' );

/**
 * Enqueue admin style
 */
function mapro_admin_scripts() {
	wp_enqueue_media();
	wp_enqueue_style( 'mapro-admin-style', get_template_directory_uri() . '/inc/css/admin-style.css', array(), '1.0' );
	wp_enqueue_script( 'mapro-admin-scripts', get_template_directory_uri() . '/inc/js/admin-scripts.js', array('jquery'), '20160915', true );
}
add_action( 'admin_enqueue_scripts', 'mapro_admin_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
 require get_template_directory() . '/inc/mapro-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Dynamic Styles additions.
 */
require get_template_directory() . '/inc/colors.php';


if ( ! function_exists( 'breadcrumb_trail' ) ) {
	require get_template_directory() . '/inc/breadcrumbs-trail.php';
}

require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */
require_once  get_template_directory()  . '/inc/class-tgm-plugin-activation.php';
require get_template_directory(). '/inc/hook-tgm.php';