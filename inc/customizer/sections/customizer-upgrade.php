<?php
/**
 * Pro Version Upgrade Section
 *
 * Registers Upgrade Section for the Pro Version of the theme
 *
 * @package Delphine
 */

/**
 * Adds pro version description and CTA button
 *
 * @param object $wp_customize / Customizer Object.
 */
function delphine_customize_register_upgrade_settings( $wp_customize ) {

	// Add Upgrade / More Features Section.
	$wp_customize->add_section( 'delphine_section_upgrade', array(
		'title'    => esc_html__( 'More Features', 'delphine' ),
		'priority' => 70,
		'panel' => 'delphine_options_panel',
		)
	);

	// Add custom Upgrade Content control.
	$wp_customize->add_setting( 'delphine_theme_options[upgrade]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new Delphine_Customize_Upgrade_Control(
		$wp_customize, 'delphine_theme_options[upgrade]', array(
		'section' => 'delphine_section_upgrade',
		'settings' => 'delphine_theme_options[upgrade]',
		'priority' => 1,
		)
	) );

}
add_action( 'customize_register', 'delphine_customize_register_upgrade_settings' );
