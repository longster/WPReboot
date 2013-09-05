<?php
/*********************
Enqueue the proper stuff
*********************/
//function wpreboot_css_style()
//{	
	// Register the main style under root directory
	//wp_register_style( 'wpreboot-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
	
	//wp_enqueue_style( 'wpreboot-stylesheet' );
	
//}
//add_action( 'wp_enqueue_scripts', 'wpreboot_css_style' );



/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function wpreboot_scripts() {
	wp_enqueue_style('wpreboot-stylesheet', get_template_directory_uri() . '/style.css', array(), '', 'all' );

  	// jQuery is loaded using the same method from HTML5 Boilerplate:
  	// Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  	// It's kept in the header instead of footer to avoid conflicts with plugins.
  	if (!is_admin() && current_theme_supports('jquery-cdn')) {
    	wp_deregister_script('jquery');
    	wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, false);
    	add_filter('script_loader_src', 'wpreboot_jquery_local_fallback', 10, 2);
  	}

  	if (is_single() && comments_open() && get_option('thread_comments')) {
   		wp_enqueue_script('comment-reply');
  	}

  	wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', false, null, false);
  	//wp_register_script('wpreboot_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', false, '2a3e700c4c6e3d70a95b00241a845695', true);

  	wp_enqueue_script('modernizr');
  	wp_enqueue_script('jquery');
  	wp_enqueue_script('roots_scripts');
}
add_action('wp_enqueue_scripts', 'wpreboot_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function wpreboot_jquery_local_fallback($src, $handle) {
	static $add_jquery_fallback = false;

  	if ($add_jquery_fallback) {
    	echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/js/jquery-1.10.1.min.js"><\/script>\')</script>' . "\n";
    	$add_jquery_fallback = false;
  	}

  	if ($handle === 'jquery') {
    	$add_jquery_fallback = true;
  	}

  	return $src;
}


?>