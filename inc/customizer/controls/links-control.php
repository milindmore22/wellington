<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Wellington
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Wellington_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'wellington' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/wellington/', 'wellington' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=wellington&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'wellington' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=wellington&utm_source=customizer&utm_campaign=wellington" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'wellington' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/wellington-documentation/', 'wellington' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=wellington&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'wellington' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=wellington/', 'wellington' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'wellington' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/wellington/reviews/', 'wellington' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'wellington' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
