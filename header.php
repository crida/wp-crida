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
		<div id="page" class="hfeed site">



			<header id="masthead" class="site-header section" role="banner">
			<div class="container">
				
				<div class="site-branding">
					<h5 class="site-title bg-check-target">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

							<img class="desktop-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" title="<?php bloginfo( 'name' ); ?>">

						</a>
					</h5>
					<a id="nav-toggle" class="toggle"><!-- id "menu-toggle" required by responsive-nav.js Using custom toggle so can be translated -->
						<span class="visuallyhidden"><?php _e( 'Menu', '_mbbasetheme' ); ?></span>
					</a>

				</div>


				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_mbbasetheme' ); ?></a>

				<nav class="nav-collapse main-navigation bg-check-target">
				<?php 
					wp_nav_menu( 
						array( 
							'theme_location' => 'primary', 
							'container' => 'ul', 
							'container_class' => 'nav-collapse main-navigation ' // Required by responsive-nav.js
						) 
					); 
				?>


				<!-- <div id="nav-bar-search"><?php // get_search_form(); ?></div>-->
				</nav><!-- .nav-collapse .main-navigation -->
				
				<div class="social">
					<ul class="social-media-links">
						<li><a href="">
							<span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i aria-hidden="true" class="fa fa-twitter fa-stack-1x fa-inverse"></i>
							</span>
							<span class="visuallyhidden">Twitter</span></a>
						</li> 
						<li><a href=""><span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i aria-hidden="true" class="fa fa-facebook fa-stack-1x fa-inverse"></i>
							</span>
							<span class="visuallyhidden">Facebook</span></a>
						</li>
						<li><a href=""><span class="fa-stack">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i aria-hidden="true" class="fa fa-youtube fa-stack-1x fa-inverse"></i>
							</span>
							<span class="visuallyhidden">YouTube</span></a>
						</li> 
						<!-- <li><a href="<?php bloginfo('rss2_url'); ?>"><i aria-hidden="true" class="icon-feed icon-left"></i><span class="visuallyhidden">RSS</span></a></li>-->
					</ul>
				</div><!-- .social -->

			</div><!-- .container -->
			</header><!-- #masthead -->
			<div class="section">
				<div class="container">
			<nav class="nav-collapse secondary-navigation">
				<?php 
					wp_nav_menu( 
						array( 
							'theme_location' => 'secondary', 
							'container' => 'ul', 
							'container_class' => 'nav-collapse' // Required by responsive-nav.js
						) 
					); 
				?>


				<!-- <div id="nav-bar-search"><?php // get_search_form(); ?></div>-->
				</nav><!-- .nav-collapse .main-navigation -->
				</div><!-- .container -->
				</div><!-- .section -->
			<div id="content">
