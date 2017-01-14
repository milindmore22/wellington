<?php
/**
 * General Settings
 *
 * Register General section, settings and controls for Theme Customizer
 *
 * @package Delphine
 */

/**
 * Adds all general settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function delphine_customize_register_general_settings( $wp_customize ) {

	// Add Section for Theme Options.
	$wp_customize->add_section( 'delphine_section_general', array(
		'title'    => esc_html__( 'General Settings', 'delphine' ),
		'priority' => 10,
		'panel' => 'delphine_options_panel',
		)
	);

	// Add Settings and Controls for Layout.
	$wp_customize->add_setting( 'delphine_theme_options[layout]', array(
		'default'           => 'right-sidebar',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'delphine_sanitize_select',
		)
	);
	$wp_customize->add_control( 'delphine_theme_options[layout]', array(
		'label'    => esc_html__( 'Theme Layout', 'delphine' ),
		'section'  => 'delphine_section_general',
		'settings' => 'delphine_theme_options[layout]',
		'type'     => 'radio',
		'priority' => 1,
		'choices'  => array(
			'left-sidebar' => esc_html__( 'Left Sidebar', 'delphine' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'delphine' ),
			),
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'delphine_theme_options[blog_title]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'delphine_theme_options[blog_title]', array(
		'label'    => esc_html__( 'Blog Title', 'delphine' ),
		'section'  => 'delphine_section_general',
		'settings' => 'delphine_theme_options[blog_title]',
		'type'     => 'text',
		'priority' => 3,
		)
	);

	// Add Homepage Title.
	$wp_customize->add_setting( 'delphine_theme_options[blog_description]', array(
		'default'           => '',
		'type'           	=> 'option',
		'transport'         => 'refresh',
		'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( 'delphine_theme_options[blog_description]', array(
		'label'    => esc_html__( 'Blog Description', 'delphine' ),
		'section'  => 'delphine_section_general',
		'settings' => 'delphine_theme_options[blog_description]',
		'type'     => 'textarea',
		'priority' => 4,
		)
	);

}
add_action( 'customize_register', 'delphine_customize_register_general_settings' );
