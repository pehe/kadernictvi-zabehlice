<?php
/**
 * SKT Cutsnstyle Theme Customizer
 *
 * @package SKT Cutsnstyle
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function skt_cutsnstyle_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'skt_cutsnstyle_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_cutsnstyle_customize_preview_js() {
	wp_enqueue_script( 'skt_cutsnstyle_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_cutsnstyle_customize_preview_js' );

function skt_cutsnstyle_custom_customize_enqueue() {
 wp_enqueue_script( 'skt-cutsnstyle-custom-customize', get_template_directory_uri() . '/js/custom.customize.js', array( 'jquery', 'customize-controls' ), false, true );
}
add_action( 'customize_controls_enqueue_scripts', 'skt_cutsnstyle_custom_customize_enqueue' );
