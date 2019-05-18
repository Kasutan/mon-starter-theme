<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kasutan
 */

?>

	</div><!-- #content -->
	<div class="topfooter">
		<div class="container flex no-margin-bottom ">
			<?php dynamic_sidebar( 'topfooter' ); ?>
		</div>
	</div>
	<footer id="colophon" class="site-footer">
		<div class="site-info container flex ">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div><!-- .site-info -->
		<div class="copyright container flex no-margin-bottom ">
			<?php dynamic_sidebar( 'copyright' ); ?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
