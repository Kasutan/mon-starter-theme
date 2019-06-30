<?php


 /**
 * Register the block once ACF has initialized
 */
add_action( 'acf/init', 'kasutan_acf_block_demi_trame_acf_init' );
function kasutan_acf_block_demi_trame_acf_init() {
 	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
 		acf_register_block( [
			'name'            => 'acf-demi-trame',
			'title'           => __( 'ACF Bloc demi trame', 'banagrumes' ),
			'description'     => __( 'Bloc avec une image de fond et une trame sur la moitié de l\'image.', 'banagrumes' ),
			'render_callback' => 'acf_demi_trame_callback',
			'category'        => 'formatting',
			'icon'            => 'format-image',
			'keywords'        => [ 'trame', 'acf' ],
		] );
	}
 }
 /**
 * Render Callback for the block. This is what is output in the Theme AND
 * in the preview within Gutenberg
 *
 * @param $block
 */
function acf_demi_trame_callback( $block ) {
	if(function_exists("get_field")) :
		ob_start();
		$className=esc_attr($block["className"]);
		$titre=esc_html(get_field('titre'));
		$balise=esc_attr(get_field('niveau_du_titre'));
		$image=wp_get_attachment_url(get_field('image'),'large');
		$texte=wp_kses_post(get_field('texte'));
		$opacite=esc_attr(get_field('opacite_trame'));
		$couleur=esc_attr(get_field('couleur_trame'));
		?>
		<div class="acf-block-demi-trame <?php echo $className;?> " style="background-image:url(<?php echo $image;?>); min-height:200px;color:#fff">
			<div class="conteneur-texte">
				<div class="trame" style="background-color:<?php echo $couleur;?>;opacity:<?php echo $opacite;?>"></div>
				<<?php echo $balise;?> class="titre"><?php echo $titre;?></<?php echo $balise;?>>
				<div class="texte"><?php echo $texte;?></div>
			</div>
		</div>
		<?php
		echo ob_get_clean();
	endif;
} 