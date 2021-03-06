<?php
/*
Author: Long Duong
URL: http://wpreboot.lduong.com

This place is much cleaner. Put your theme specific codes here,
anything else you may wan to use plugins to keep things tidy.

*/

/*
1. lib/clean.php
    - head cleanup
	- post and images related cleaning
*/
require_once('lib/clean.php'); // do all the cleaning and enqueue here
/*
2. lib/enqueue.php
    - enqueueing scripts & styles
*/
require_once('lib/enqueue.php'); // to deregister or register styles & scripts
/*
3. lib/bootstrap.php
	- add pagination
	- custom walker for top-bar and related
*/
require_once('lib/bootstrap.php'); // load Foundation specific functions like top-bar


/**********************
Add theme supports
**********************/
function wpreboot_theme_support() {
	// Add language supports.
	load_theme_textdomain('wpreboot', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Nav', 'wpreboot'),
		'utility' => __('Utility Nav', 'wpreboot'),
		'footer' => __('Footer Nav', 'wpreboot')
	));
	
	// Add custom background support
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',  // background image default
	    'default-color' => '', // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
}
add_action('after_setup_theme', 'wpreboot_theme_support'); /* end wpreboot theme support */


// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}


// return entry meta information for posts, used by multiple loops.
function wpreboot_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'wpreboot'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author">'. __('Written by', 'wpreboot') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}


// highlight keyword search term
function wpreboot_highlight_results($text){
     if(is_search()){
     $sr = get_query_var('s');
     $keys = explode(" ",$sr);
     $text = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">'.$sr.'</span>', $text);
     }
     return $text;
}
//add_filter('the_content', 'wpreboot_highlight_results');
add_filter('the_excerpt', 'wpreboot_highlight_results');
add_filter('the_title', 'wpreboot_highlight_results');



// customize the length of excerpt
function wpreboot_excerpt_length( $length ) {
	return 100;
}
add_filter( 'excerpt_length', 'wpreboot_excerpt_length', 999 );



// add more link
function wpreboot_excerpt_more( $more ) {
	return ' <a href="'.get_permalink($post->ID).'" title="'.get_the_title().'">&raquo; Read More</a>';
}
add_filter('excerpt_more', 'wpreboot_excerpt_more');



// exclude page from search filter
function wpreboot_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','wpreboot_search_filter');



// add credits
if ( !function_exists( 'wpreboot_credits' ) ) :
function wpreboot_credits() {
	printf(
		__('Copyright &copy; %1$s <a href="%2$s">%3$s</a> - All Rights Reserved.', 'wpreboot'),
		date( 'Y' ),
		home_url( '/' ),
		get_bloginfo( 'name' )
	);
}
endif; // Output credit information

?>