<?php
/*This file is part of AvadaChild, Avada child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function AvadaChild_enqueue_child_styles() {
	    // loading parent style
	    wp_register_style(
	      'parente2-style',
	      get_template_directory_uri() . '/style.css'
	    );

	    wp_enqueue_style( 'parente2-style' );
	    // loading child style
	    wp_register_style(
	      'childe2-style',
	      get_stylesheet_directory_uri() . '/style.css'
	    );
	    wp_enqueue_style( 'childe2-style');
	 }
}
add_action( 'wp_enqueue_scripts', 'AvadaChild_enqueue_child_styles' );

/**
 * Calculator on the single product page
 *
 * @package Calculator
 * @subpackage /Calculator/
 * @author Marko FixRunner <marko@fixrunner.com>
 * @version 1.0.0
 * @link https://www.fixrunner.com/
 */
include get_theme_file_path( '/Calculator/Fix_Calculator.php' );