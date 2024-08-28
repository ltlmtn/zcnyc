<?php

/**
 * @package WordPress
 * @subpackage asw_template
 */

// Thumbnails
add_theme_support('post-thumbnails');

// Enqueue Scripts and Styles
function asw_enqueue_scripts() {

	$styleSheetHash = rand(0, 99999999999);
	$theme = get_stylesheet_directory_uri();

    // Styles
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
    wp_enqueue_style('fonts', $theme . '/assets/fonts/stylesheet.css', array(), $styleSheetHash);
	wp_enqueue_style('featherlight', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.min.css', array(), '1.7.13');
	wp_enqueue_style('featherlight-gallery', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.gallery.min.css', array(), '1.7.13');
	wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css', array(), '1.9.0');
    wp_enqueue_style('base', $theme . '/assets/css/base.css', array(), $styleSheetHash);
    wp_enqueue_style('tablet', $theme . '/assets/css/tablet.css', array(), $styleSheetHash);
    wp_enqueue_style('desktop', $theme . '/assets/css/desktop.css', array(), $styleSheetHash);

    // Scripts
	wp_enqueue_script('featherlight', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.min.js', array(), '1.7.13', true);
	wp_enqueue_script('featherlight-gallery', 'https://cdnjs.cloudflare.com/ajax/libs/featherlight/1.7.13/featherlight.gallery.min.js', array(), '1.7.13', true);
	wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array(), '1.9.0', true);
	wp_enqueue_script('featherlight-gallery-conversion', $theme . '/assets/featherlight-gallery.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'asw_enqueue_scripts');



//menus
add_action( 'init', 'register_my_menus' );
function register_my_menus() {
	register_nav_menus(
		array(
			'main_navigation' => __( 'Main Navigation' )
		)
	);
}



function asw_widgets_init() {

	register_sidebar( array(
		'name'          => 'Homepage Hero',
		'id'            => 'homepage_hero',
		'before_widget' => '<div class="hero homepage">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => ''
	) );

	register_sidebar( array(
		'name'          => 'Footer Content',
		'id'            => 'footer_content',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => ''
	) );

}
add_action( 'widgets_init', 'asw_widgets_init' );



function mytheme_setup() {
    // Add support for Block Styles
	add_theme_support( 'wp-block-styles' );
	// Add Color Palettes
	add_theme_support( 'editor-color-palette', array(
		array(
			'name' => __( 'White' ),
			'slug' => 'white',
			'color' => '#FFF',
		),
		array(
			'name' => __( 'Black' ),
			'slug' => 'black',
			'color' => '#000',
		),
		array(
			'name' => __( 'Smoke' ),
			'slug' => 'smoke',
			'color' => '#EDEDED',
		),
		array(
			'name' => __( 'Red' ),
			'slug' => 'red',
			'color' => '#A22931',
		),
		array(
			'name' => __( 'Charcoal' ),
			'slug' => 'charcoal',
			'color' => '#333333',
		)
	) );
	add_theme_support( 'disable-custom-colors' );
	add_theme_support('disable-custom-font-sizes');
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
}

add_post_type_support( 'page', 'excerpt' );


// Disable support for comments
function disable_comments() {
	// Remove support for comments and trackbacks from post types
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
	// Close comments on the front-end
	add_filter( 'comments_open', '__return_false' );
	// Hide existing comments
	add_filter( 'comments_array', '__return_empty_array' );
	// Remove comments form from the front-end
	add_action( 'wp_head', 'remove_comment_support', 1 );
  }
  add_action( 'admin_init', 'disable_comments' );
  
  function remove_comment_support() {
	// Remove comments from the post and page editor screens
	remove_meta_box( 'commentsdiv', 'post', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'post', 'normal' );
	remove_meta_box( 'commentsdiv', 'page', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'page', 'normal' );
  }


// Redirect 404 errors to homepage
function redirect_404_to_homepage() {
    if ( is_404() ) {
        wp_redirect( home_url() );
        exit;
    }
}
add_action( 'template_redirect', 'redirect_404_to_homepage' );


// Include Extras
get_template_part('customizations/page-seo');
get_template_part('customizations/customizations');
get_template_part('customizations/post_options');
get_template_part('customizations/programs_shortcode');