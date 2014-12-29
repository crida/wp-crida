<?php
/**
 * The template for displaying the header.
 *
 * @package La Crida
 * @since 0.1.0
 */
 ?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>


	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<main>
