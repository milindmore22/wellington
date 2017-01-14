<?php
/**
 * The template for displaying single posts
 *
 * @package Delphine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php delphine_post_image_single(); ?>

	<header class="entry-header">

		<?php delphine_entry_meta(); ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content clearfix">

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'delphine' ),
			'after'  => '</div>',
		) ); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php delphine_entry_categories(); ?>
		<?php delphine_entry_tags(); ?>
		<?php delphine_post_navigation(); ?>

	</footer><!-- .entry-footer -->

</article>
