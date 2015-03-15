<?php
/**
 * Custom functions that act independently of the theme templates 
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Armored
 * @since Armored 1.0 
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Armored 1.0
 */

function armored_page_menu_args( $args ) {
	$args['show_name'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'armored_page_menu_args' );

 /**
  * Adds custom classed to the array of body classes.
  *
  * @since Armored 1.0
  */
 function armored_body_classes( $classes ) {
 	// Adds a class of group-blog to blogs with more that 1 published author
 	if ( is_multi_author() ) {
 		$classes[] = 'group-blog';
 	}

 	return $classes;
 }
 add_filter( 'body_class', 'armored_body_classes' );

 /**
  * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
  *
  * @since Armored 1.0
  */
 function armored_enchanced_image_navigation( $url, $id ) {
 	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
 		return $url;

 	$image = get_post( $id );
 	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
 		$url .= '#main' ;

 	return $url;
 }
 add_filter( 'attachment_link', 'armored_enchanced_image_navigation', 10, 2 );