<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package Wellington
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function wellington_gutenberg_support() {

	// Add theme support for wide and full images.
	#add_theme_support( 'align-wide' );

	// Define block color palette.
	$color_palette = apply_filters( 'wellington_color_palette', array(
		'primary_color'    => '#ee3333',
		'secondary_color'  => '#d51a1a',
		'tertiary_color'   => '#bb0000',
		'accent_color'     => '#3333ee',
		'highlight_color'  => '#eeee33',
		'light_gray_color' => '#fafafa',
		'gray_color'       => '#999999',
		'dark_gray_color'  => '#303030',
	) );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', apply_filters( 'wellington_editor_color_palette_args', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'wellington' ),
			'slug'  => 'primary',
			'color' => esc_html( $color_palette['primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'wellington' ),
			'slug'  => 'secondary',
			'color' => esc_html( $color_palette['secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Tertiary', 'block color', 'wellington' ),
			'slug'  => 'tertiary',
			'color' => esc_html( $color_palette['tertiary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'wellington' ),
			'slug'  => 'accent',
			'color' => esc_html( $color_palette['accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Highlight', 'block color', 'wellington' ),
			'slug'  => 'highlight',
			'color' => esc_html( $color_palette['highlight_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'wellington' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'wellington' ),
			'slug'  => 'light-gray',
			'color' => esc_html( $color_palette['light_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Gray', 'block color', 'wellington' ),
			'slug'  => 'gray',
			'color' => esc_html( $color_palette['gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'wellington' ),
			'slug'  => 'dark-gray',
			'color' => esc_html( $color_palette['dark_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'wellington' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
	) ) );
}
add_action( 'after_setup_theme', 'wellington_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function wellington_block_editor_assets() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'wellington-editor-styles', get_theme_file_uri( '/assets/css/gutenberg-styles.css' ), array(), '20210306', 'all' );

	// Enqueue Page Template Switcher Editor plugin.
	#wp_enqueue_script( 'wellington-page-template-switcher', get_theme_file_uri( '/assets/js/page-template-switcher.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), '20210306' );
}
add_action( 'enqueue_block_editor_assets', 'wellington_block_editor_assets' );


/**
 * Remove inline styling in Gutenberg.
 *
 * @return array $editor_settings
 */
function wellington_block_editor_settings( $editor_settings ) {
	// Remove editor styling.
	if ( ! current_theme_supports( 'editor-styles' ) ) {
		$editor_settings['styles'] = '';
	}

	return $editor_settings;
}
#add_filter( 'block_editor_settings', 'wellington_block_editor_settings', 11 );


/**
 * Add body classes in Gutenberg Editor.
 */
function wellington_block_editor_body_classes( $classes ) {
	global $post;
	$current_screen = get_current_screen();

	// Return early if we are not in the Gutenberg Editor.
	if ( ! ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) ) {
		return $classes;
	}

	// Fullwidth Page Template?
	if ( 'templates/template-fullwidth.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' wellington-fullwidth-page-layout ';
	}

	// No Title Page Template?
	if ( 'templates/template-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-left-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-right-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' wellington-page-title-hidden ';
	}

	// Full-width / No Title Page Template?
	if ( 'templates/template-fullwidth-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' wellington-fullwidth-page-layout wellington-page-title-hidden ';
	}

	return $classes;
}
#add_filter( 'admin_body_class', 'wellington_block_editor_body_classes' );
