<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Wellington
 */

?>
	<section id="secondary" class="sidebar widget-area clearfix" role="complementary">

		<?php // Check if Sidebar has widgets.
		if ( is_active_sidebar( 'sidebar-1' ) ) :

			dynamic_sidebar( 'sidebar-1' );

		endif; ?>

	</section><!-- #secondary -->
