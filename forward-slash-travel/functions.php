<?php

/**
* load styles
*/
function forward_slash_travel_enqueue_styles() {

    $parent_style = 'illdy';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script( 'child-theme.js', get_stylesheet_directory_uri() . '/scripts.js', array( 'jquery' ), '1.0', true );

}

add_action( 'wp_enqueue_scripts', 'forward_slash_travel_enqueue_styles' );


/**
 * Load ACF options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}