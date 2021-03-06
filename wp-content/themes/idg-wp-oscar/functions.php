<?php
/*
 * Styles for our child theme
 *
 */
function idg_child_enqueue_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/main.css?2', array('idg-wp-style'), wp_get_theme()->get('Version') );
  wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/ac7029627a.js', false, false, true );
  wp_enqueue_script( 'oscar-scripts', get_stylesheet_directory_uri() . '/assets/js/main.js', false, false, true );
}
add_action( 'wp_enqueue_scripts', 'idg_child_enqueue_styles' );

/*
 * Unregister some of the IDG main sidebars
 *
 */
function remove_some_widgets(){
	unregister_sidebar( 'main-menu-area' );
	unregister_sidebar( 'services-widgets-area' );
	unregister_sidebar( 'meet-the-ministry-widgets-area' );
	unregister_sidebar( 'content-widgets-area' );
	unregister_sidebar( 'social-participation-widgets-area' );
	unregister_sidebar( 'multimedia-widgets-area' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

