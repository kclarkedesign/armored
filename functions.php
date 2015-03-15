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