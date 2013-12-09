<?php
/**
 * Enqueue stylesheets only
**/
function wpreboot_css_style()
{	
	wp_register_style( 'wpreboot-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all' );
  wp_enqueue_style( 'wpreboot-stylesheet' );
}
add_action( 'wp_enqueue_scripts', 'wpreboot_css_style' );



/**
 * Enqueue scripts only
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.10.2.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.6.2.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function wpreboot_scripts() {
		// jQuery is loaded using the same method from HTML5 Boilerplate:
  	// Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  	// It's kept in the header instead of footer to avoid conflicts with plugins.
  	if (!is_admin()) { //&& current_theme_supports('jquery-cdn') - this was removed after admin() which interferes with google cdn and adds 2 jquery stuff which seems unnecesary
      
      // uncomment below and the enqueue if you want to support IE for html5shiv
      // ie-only style sheet
      //wp_register_style( 'wpreboot-ie-only', get_template_directory_uri() . '/assets/css/ie.css', array(), '' );

      //global $is_IE;
      //if ($is_IE) {
      //   wp_register_script ( 'html5shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js" , false, true);
      //}
      
      wp_deregister_script('jquery');
    	//wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', false, null, true);
      wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js', false, null, true);
      add_filter('script_loader_src', 'wpreboot_jquery_local_fallback', 10, 2);
  	}

  	if (is_single() && comments_open() && get_option('thread_comments')) {
   		wp_enqueue_script('comment-reply');
  	}

  	//wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', false, null);  	 //should already be minified within script.min.js file.
    wp_register_script('wpreboot_scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', false, '2a3e700c4c6e3d70a95b00241a845695', true);
    //wp_register_script('bootstrap-js','http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js', false, null, true);
    
    // enqueue styles and scripts
    //wp_enqueue_style('wpreboot-ie-only');
    //wp_enqueue_script( 'html5shiv' );
    //wp_enqueue_script('modernizr'); //it's already minified in script.js file.
    wp_enqueue_script('jquery');
    //wp_enqueue_script('bootstrap-js');
  	wp_enqueue_script('wpreboot_scripts');
    
}
add_action('wp_enqueue_scripts', 'wpreboot_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function wpreboot_jquery_local_fallback($src, $handle) {
	static $add_jquery_fallback = false;

  	if ($add_jquery_fallback) {
    	echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.1.min.js"><\/script>\')</script>' . "\n";
    	$add_jquery_fallback = false;
  	}

  	if ($handle === 'jquery') {
    	$add_jquery_fallback = true;
  	}

  	return $src;
}


?>