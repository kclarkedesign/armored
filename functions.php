<?php
/**
 * Armored functions and definitions
 * 
 * @package Armored
 * @since Armored 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Armored 1.0
 */
 if ( ! isset( $content_width ) ) {
 	 $content_width = 654; /*pixels */
 }

 if ( ! function_exists( 'armored_setup' ) );
 /**
  * Sets up theme defaults and registers support for various Wordpress features.
  * 
  * Note that this function is hooked into the after_setup_theme hook, which runs
  * before the init hook. The init hook is too late for some features, such as indicating
  * support post thumbnails.
  * 
  * @since Armored 1.0
  */
  function armored_setup() {

  	 /**
  	  * Custom template tage for this theme.
  	  */
  	 require( get_template_directory() . '/inc/template-tags.php' );

  	 /**
  	 * Custom functions that act independently of the theme templates
  	 */
  	 require( get_template_directory() . '/inc/tweaks.php' );

  	 /**
  	 * Make theme available for translation
  	 * Translations can be filled in the /languages/ directory
  	 * If you're building a theme based on Armored, use a find a replace
  	 * to change 'armored' to the name of your theme in all template files
  	 */
  	load_theme_textdomain( 'armored' , get_template_directory() . '/languages' );

  	/**
  	 * Add default posts and comments RSS feed links to head
  	 */
  	add_theme_support( 'automatic-feed-links' );

  	/**
  	 * Enable support for the Aside Post Format
  	 */
  	add_theme_support( 'post-formats', 'armored' ) );

	/**
	 * This theme uses wp_nav_menu() in one locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'armored' ),
		//'social'  => __( 'Social Links Menu', 'armored' ),
	) );

}
endif; // armored_setup
add_action( 'after_setup_theme', 'armored_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Armored 1.0
 **/
function armored_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'armored' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'armored' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'armored_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function armored_scripts() {
  wp_enqueue_style( 'style' , get_stylesheet() );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_scripts( 'comment_reply' );
  }

  wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
  if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'armored_scripts' );
