<?php
/**
 * Main Navigation
 *
 * @version 1.1
 * @package Wellington
 */
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<div id="main-navigation-wrap" class="primary-navigation-wrap">

		<?php do_action( 'wellington_header_search' ); ?>

		<button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false" <?php wellington_amp_menu_toggle(); ?>>
			<?php
			echo wellington_get_svg( 'menu' );
			echo wellington_get_svg( 'close' );
			?>
			<span class="menu-toggle-text"><?php esc_html_e( 'Navigation', 'wellington' ); ?></span>
		</button>

		<div class="primary-navigation">

			<nav id="site-navigation" class="main-navigation" role="navigation" <?php wellington_amp_menu_is_toggled(); ?> aria-label="<?php esc_attr_e( 'Primary Menu', 'wellington' ); ?>">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .primary-navigation -->

	</div>

<?php endif; ?>

<?php do_action( 'wellington_after_navigation' ); ?>
