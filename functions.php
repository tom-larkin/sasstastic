<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

function avia_add_fontawesome(){
?>
<script src="https://use.fontawesome.com/e95b19dda6.js"></script>
<?php
}
add_action('wp_head', 'avia_add_fontawesome');

add_theme_support('avia_template_builder_custom_css');


define('WP_SCSS_ALWAYS_RECOMPILE', true);


// add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

// function theme_enqueue_styles() {
//     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
//     wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/CSS/main.css', array( 'parent-style' ) );
// }

function my_remove_wp_seo_meta_box() {
	remove_meta_box('wpseo_meta', vegetables, 'normal');
}
add_action('add_meta_boxes', 'my_remove_wp_seo_meta_box', 100);






add_theme_support('post-thumbnails'); 



/**
 * Pass in a taxonomy value that is supported by WP's `get_taxonomy`
 * and you will get back the url to the archive view.
 * @param $taxonomy string|int
 * @return string
 */
function get_taxonomy_archive_link( $taxonomy ) {
	$tax = get_taxonomy( $taxonomy ) ;
	return get_bloginfo( 'url' ) . '/' . $tax->rewrite['slug'];
  }


  


//   if (!is_admin()) add_action( 'wp_enqueue_scripts', 'add_jquery_to_my_theme' );

//   function add_jquery_to_my_theme() {
// 	  // scrap WP jquery and register from google cdn - load in footer
// 	  wp_deregister_script('jquery');
// 	  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-3.4.1.min.js", false, null, true );    
// 	  // load jquery
// 	  wp_enqueue_script('jquery');
//   }







/**
 * WP: Unwrap images from <p> tag
 * @param $content
 * @return mixed
 */
function so226099_filter_p_tags_on_images( $content ) {
    $content = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '\1', $content);

    return $content;
}
add_filter('the_content', 'so226099_filter_p_tags_on_images');



add_filter( 'the_content', 'wpse_226099_remove_p' );
function wpse_226099_remove_p( $content ) {
    global $post;
    return $post->post_content;
}


