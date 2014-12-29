<?php
/**
 * la_crida theme functions defined in /lib/init.php
 *
 * @package la_crida
 */

 /**
  * Add humans.txt to the <head> element.
  */
 function la_crida_header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'la_crida_humans', $humans );
 }

 /**
  * Add basic open graph protocol stuff to the <head> element.
  */
 function la_crida_og_header_meta() {
	$ogmeta = '<!-- Open Graph protocol -->
	<meta property="og:image" content="' . get_stylesheet_directory_uri() . '/assets/images/og-image.png">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="630">
	<meta property="og:image:type" content="image/png">
	<!--end Open Graph protocol -->';
	
	echo apply_filters( 'la_crida_og', $ogmeta );
 }

  /**
  * Add favicon/icons to the <head> element.
  */
 function la_crida_icon_header_meta() {
	$iconmeta = '<!-- Icons/favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="' . esc_url( home_url() ) . '/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="' . esc_url( home_url() ) . '/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="' . esc_url( home_url() ) . '/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="' . esc_url( home_url() ) . '/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="' . esc_url( home_url() ) . '/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="' . esc_url( home_url() ) . '/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="' . esc_url( home_url() ) . '/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="' . esc_url( home_url() ) . '/apple-touch-icon-152x152.png">
		<link rel="icon" type="image/png" href="' . esc_url( home_url() ) . '/favicon-196x196.png" sizes="196x196">
		<link rel="icon" type="image/png" href="' . esc_url( home_url() ) . '/favicon-160x160.png" sizes="160x160">
		<link rel="icon" type="image/png" href="' . esc_url( home_url() ) . '/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="' . esc_url( home_url() ) . '/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="' . esc_url( home_url() ) . '/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="msapplication-TileImage" content="' . esc_url( home_url() ) . '/mstile-144x144.png">
	<!--end Icons/favicons protocol -->';
	
	echo apply_filters( 'la_crida_icons', $iconmeta );
 }

/**
 * Register Widget Areas
 */
function la_crida_widgets_init() {
	// Main Sidebar
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'la_crida' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	// Footer Sidebar
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'la_crida' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s item">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );}

/**
 * Remove Dashboard Meta Boxes
 */
function la_crida_remove_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

/**
 * Change Admin Menu Order
 */
function la_crida_custom_menu_order( $menu_ord ) {
	if ( !$menu_ord ) return true;
	return array(
		// 'index.php', // Dashboard
		// 'separator1', // First separator
		// 'edit.php?post_type=page', // Pages
		// 'edit.php', // Posts
		// 'upload.php', // Media
		// 'gf_edit_forms', // Gravity Forms
		// 'genesis', // Genesis
		// 'edit-comments.php', // Comments
		// 'separator2', // Second separator
		// 'themes.php', // Appearance
		// 'plugins.php', // Plugins
		// 'users.php', // Users
		// 'tools.php', // Tools
		// 'options-general.php', // Settings
		// 'separator-last', // Last separator
	);
}

/**
 * Hide Admin Areas that are not used
 */
function la_crida_remove_menu_pages() {
	// remove_menu_page( 'link-manager.php' );
}

/**
 * Remove default link for images
 */
function la_crida_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	if ( $image_set !== 'none' ) {
		update_option( 'image_default_link_type', 'none' );
	}
}

/**
 * Show Kitchen Sink in WYSIWYG Editor
 */
function la_crida_unhide_kitchensink( $args ) {
	$args['wordpress_adv_hidden'] = false;
	return $args;
}

/**
 * Enqueue scripts
 */
function la_crida_scripts() {
	
	global $wp_styles;

	// Load the main stylesheet
	wp_enqueue_style( 'la_crida-style', get_stylesheet_directory_uri() . '/style.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( !is_admin() ) {
		
		wp_enqueue_script( 'jquery' );
		// wp_enqueue_script( 'jquery-masonry' );	


		// Typekit script 
		// wp_enqueue_script( 'la_crida-typekit', '//use.typekit.net/vfi6wgy.js');

		// Enqueue javascript plugins


		// Plugins
		wp_enqueue_script( 'la_crida_modernizr', get_template_directory_uri() . '/assets/js/source/vendor/modernizr-custom.js', array() );
		wp_enqueue_script( 'la_crida_headroom', get_template_directory_uri() . '/assets/js/source/vendor/headroom.min.js', array() );
		wp_enqueue_script( 'la_crida_morpheus', get_template_directory_uri() . '/assets/js/source/vendor/svg-morpheus.js', array() );
		wp_enqueue_script( 'la_crida_responsivenav', get_template_directory_uri() . '/assets/js/source/vendor/responsive-nav.js', array() );
		if ( is_front_page() ) {
			wp_enqueue_script( 'la_crida_slider', get_template_directory_uri() . '/assets/js/source/vendor/jquery.flexslider.js', array() );
		}

		// Custom scripts
		wp_enqueue_script( 'la_crida_main', get_template_directory_uri() . '/assets/js/source/custom/main.js', array() );
		wp_enqueue_script( 'la_crida_svgicons_config', get_template_directory_uri() . '/assets/js/source/custom/custom-svgicons-config.js', array(), NULL, true );
		wp_enqueue_script( 'la_crida_svgicons', get_template_directory_uri() . '/assets/js/source/vendor/svgicons.js', array(), NULL, true );
		wp_enqueue_script( 'la_crida_navicons_config', get_template_directory_uri() . '/assets/js/source/custom/custom-navicons-config.js', array(), NULL, true );
		// wp_enqueue_script( 'la_crida_navicons', get_template_directory_uri() . '/assets/js/source/custom/custom-navicons.js', array() );		

		
		
		if ( is_singular( 'portfolio_item' )) {
			wp_enqueue_script( 'la_crida_portfolio', get_template_directory_uri() . '/assets/js/source/custom/portfolio.js', array() );
		}

		// Localize
		$wnm_custom = array( 'stylesheet_directory_uri' => get_stylesheet_directory_uri() );
		wp_localize_script( 'la_crida_svgicons_config', 'directory_uri', $wnm_custom );
	}
}

/**
 * Add Typekit Webfonts Inline Script
 */	
function la_crida_typekit_inline() {
	
	/* Conditionally loads the Typekit script inline if fonts are enqueued */
	
	if ( wp_script_is( 'la_crida-typekit', 'done' ) ) { 
		echo '<script type="text/javascript">try{Typekit.load();}catch(e){}</script>'; 
	}
}


/**
 * Remove Query Strings From Static Resources
 */
function la_crida_remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}

/**
 * Remove Read More Jump
 */
function la_crida_remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	if ($offset) {
		$end = strpos( $link, '"',$offset );
	}
	if ($end) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}

/**
 * Custom body classes
 */
function la_crida_body_classes( $classes ) {

	/*
	 * Since we used 'option' in add_setting arguments array
	 * we retrieve the value by using get_option function
	 */
	$la_crida_settings = get_option( 'la_crida_settings' );	
	
	$classes[] = $la_crida_settings['layout_setting'];

		if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) )
		$classes[] = 'slider';
	elseif ( is_front_page() )
		$classes[] = 'grid';
	
	return $classes;

}	

/**
 * Getter function for Featured Content Plugin.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return array An array of WP_Post objects.
 */
function la_crida_get_featured_posts() {
	return apply_filters( 'la_crida_get_featured_posts', array() );
}

/**
 * A helper conditional function that returns a boolean value.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return bool Whether there are featured posts.
 */
function la_crida_has_featured_posts() {
	return ! is_paged() && (bool) apply_filters( 'la_crida_get_featured_posts', false );
}

/*
 * Add Featured Content functionality.
 *
 * To overwrite in a plugin, define your own Featured_Content class on or
 * before the 'setup_theme' hook.
 */
if ( ! class_exists( 'Featured_Content' ) && 'plugins.php' !== $GLOBALS['pagenow'] )
	require get_template_directory() . '/lib/inc/featured-content.php';
