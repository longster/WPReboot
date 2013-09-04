<?php
/*********************
Enqueue the proper CSS
if you use vanilla CSS.
*********************/
function wpreboot_css_style()
{	
	// Register the main style under root directory
	wp_register_style( 'wpreboot-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
	
	wp_enqueue_style( 'wpreboot-stylesheet' );
	
}
add_action( 'wp_enqueue_scripts', 'wpreboot_css_style' );
?>