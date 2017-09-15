<?php

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */

/**
 * Enqueue scripts and styles.
 */
function mro_deregister_scripts() {

    //Deregister styles

	// Bootstrap
	wp_dequeue_style( 'oceanwp-style' );
	wp_deregister_style( 'oceanwp-style' );

}
add_action('wp_print_styles', 'mro_deregister_scripts', 99999);


function mro_enqueue_scripts_styles() {
    // wp_enqueue_style( 'sydney-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'thai-style',
        get_stylesheet_directory_uri() . '/assets/dist/css/stylesheet.css'
    );

	// Add our main app js file
	// wp_enqueue_script(
	// 	'rachel_appjs',
	// 	get_stylesheet_directory_uri() . '/assets/dist/js/app.js',
	// 	['jquery'],
	// 	'',
	// 	true
	// );
}
add_action( 'wp_enqueue_scripts', 'mro_enqueue_scripts_styles' );


// function oceanwp_child_enqueue_parent_style() {
// 	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
// 	$theme   = wp_get_theme( 'OceanWP' );
// 	$version = $theme->get( 'Version' );
// 	// Load the stylesheet
//     wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );

// }
// add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );