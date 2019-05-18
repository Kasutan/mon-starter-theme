<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kasutan
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php echo kpll__( 'Aucun résultat'); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_search() ) :
			?>

			<p><?php echo kpll__( "Désolé, aucun résultat n'a été trouvé. Voulez-vous essayer avec des mots-clés différents&nbsp;?"); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php echo kpll__( "Voulez-vous essayer une recherche&nbsp;?"); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
