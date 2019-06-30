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
		<?php get_template_part( 'template-parts/boutons-partage'); ?>
	</div>
	<footer id="colophon" class="site-footer">
		

		<div class="site-info container flex ">
			<?php dynamic_sidebar( 'footer' ); ?>

			<a class="back-to-top" href="#masthead" title="<?php echo kpll__("Retour en haut de page");?>">
				<img src="<?php echo get_template_directory_uri(); ?>/icons/utility/angle-up.svg" alt="<?php echo kpll__("Retour en haut de page");?>" height="20" width="20" />
			</a>

		</div><!-- .site-info -->

		<div class="copyright container flex no-margin-bottom ">
			<?php dynamic_sidebar( 'copyright' ); ?>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
