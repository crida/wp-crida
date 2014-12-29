<?php
/**
 * la_crida Theme Customizer
 *
 * @package la_crida
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function la_crida_customize_register( $wp_customize ) {

	// Custom Branding
	//
	$wp_customize->add_section( 'la_crida_branding_section' , array(
    'title'       => __( 'Branding', 'mbdmaster' ),
    'priority'    => 30,
    'description' => 'Upload your logos here.',
 ) );
	
	// Hero logo 
	//
	$wp_customize->add_setting( 'la_crida_hero_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'la_crida_hero_logo', array(
    'label'    => __( 'Hero Logo', 'la_crida' ),
    'section'  => 'la_crida_branding_section',
    'settings' => 'la_crida_hero_logo',
 ) ) );
	
	// Header Logo
	//
	$wp_customize->add_setting( 'la_crida_header_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'la_crida_header_logo', array(
    'label'    => __( 'Header Logo', 'la_crida' ),
    'section'  => 'la_crida_branding_section',
    'settings' => 'la_crida_header_logo',
 ) ) );

	// Footer logo 
	//
	$wp_customize->add_setting( 'la_crida_footer_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'la_crida_footer_logo', array(
    'label'    => __( 'Footer Logo', 'la_crida' ),
    'section'  => 'la_crida_branding_section',
    'settings' => 'la_crida_footer_logo',
 ) ) );

		// Custom hero background
	//
	$wp_customize->add_section( 'la_crida_hero_section' , array(
    'title'       => __( 'Hero Image', 'la_crida' ),
    'priority'    => 30,
    'description' => 'Add a full-width background image to your hero section.',
 ) );

	$wp_customize->add_setting( 'la_crida_hero_background' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'la_crida_hero_background', array(
    'label'    => __( 'Hero Background Image', 'la_crida' ),
    'section'  => 'la_crida_hero_section',
    'settings' => 'la_crida_hero_background',
) ) );

	$wp_customize->add_section(
		// ID
		'layout_section',
		// Arguments array
		array(
			'title' => __( 'Layout', 'la_crida' ),
			'capability' => 'edit_theme_options',
			'description' => __( 'Allows you to edit your theme\'s layout.', 'la_crida' )
		)
	);
	$wp_customize->add_setting(
		// ID
		'la_crida_settings[layout_setting]',
		// Arguments array
		array(
			'default' => 'no-sidebar',
			'type' => 'option'
		)
	);

		// Add the featured content section.
	$wp_customize->add_section( 'featured_content', array(
		'title'    => __( 'Featured Content', 'la_crida' ),
		'priority' => 120,
	) );

	// Add the featured content layout setting and control.
	$wp_customize->add_setting( 'featured_content_layout', array(
		'default'    => 'grid',
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'featured_content_layout', array(
		'label'   => __( 'Layout', 'la_crida' ),
		'section' => 'featured_content',
		'type'    => 'select',
		'choices' => array(
			'grid'   => __( 'Grid', 'la_crida' ),
			'slider' => __( 'Slider', 'la_crida' ),
		),
	) );

	$wp_customize->add_control(
		// ID
		'layout_control',
		// Arguments array
		array(
			'type' => 'radio',
			'label' => __( 'Theme layout', 'la_crida' ),
			'section' => 'layout_section',
			'choices' => array(
				'left-sidebar' => __( 'Left sidebar', 'la_crida' ),
				'right-sidebar' => __( 'Right sidebar', 'la_crida' ),
				'no-sidebar' => __( 'No sidebar', 'la_crida' ),
				
			),
			// This last one must match setting ID from above
			'settings' => 'la_crida_settings[layout_setting]'
		)
	);

	// Contact Details
	//
	//

	class la_crida_Customize_Textarea_Control extends WP_Customize_Control {
  	public $type = 'textarea';
  	public function render_content() {
?>

  <label>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
  </label>

<?php
  }
}
	$wp_customize->add_section( 'la_crida_contact_section' , array(
    	'title'       => __( 'Contact details', 'la_crida' ),
    	'priority'    => 30,
    	'description' => 'Your contact details.',
 	) );

	$wp_customize->add_setting( 'la_crida_contact_number' );

	$wp_customize->add_control( new la_crida_Customize_Textarea_Control( $wp_customize, 'la_crida_contact_number', array(
    'label'    => __( 'Telephone Number', 'la_crida' ),
    'section'  => 'la_crida_contact_section',
    'settings' => 'la_crida_contact_number',
 ) ) );

	$wp_customize->add_setting( 'la_crida_email' );

	$wp_customize->add_control( new la_crida_Customize_Textarea_Control( $wp_customize, 'la_crida_email', array(
    'label'    => __( 'Email address', 'la_crida' ),
    'section'  => 'la_crida_contact_section',
    'settings' => 'la_crida_email',
 ) ) );

	// Address
	
	$wp_customize->add_setting( 'la_crida_address' );

	$wp_customize->add_control( new la_crida_Customize_Textarea_Control( $wp_customize, 'la_crida_address', array(
    'label'    => __( 'Street address', 'la_crida' ),
    'section'  => 'la_crida_contact_section',
    'settings' => 'la_crida_address',
 ) ) );

	$wp_customize->add_setting( 'la_crida_map_link' );

	$wp_customize->add_control( new la_crida_Customize_Textarea_Control( $wp_customize, 'la_crida_map_link', array(
    'label'    => __( 'Link to map', 'la_crida' ),
    'section'  => 'la_crida_contact_section',
    'settings' => 'la_crida_map_link',
 ) ) );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'la_crida_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function la_crida_customize_preview_js() {
	wp_enqueue_script( 'la_crida_customizer', get_template_directory_uri() . 'assets/js/vendor/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'la_crida_customize_preview_js' );
