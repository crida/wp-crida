<?php
/**
 * La Crida functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package La Crida
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'LA_CRIDA_VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function la_crida_setup() {
	/**
	 * Makes La Crida available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on La Crida, use a find and replace
	 * to change 'la_crida' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'la_crida', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'la_crida_setup' );
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function la_crida_scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'la_crida', get_template_directory_uri() . "/assets/js/la_crida{$postfix}.js", array(), LA_CRIDA_VERSION, true );
		
	wp_enqueue_style( 'la_crida', get_template_directory_uri() . "/assets/css/la_crida{$postfix}.css", array(), LA_CRIDA_VERSION );
 }
 add_action( 'wp_enqueue_scripts', 'la_crida_scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function la_crida_header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'la_crida_humans', $humans );
 }
 add_action( 'wp_head', 'la_crida_header_meta' );