<?php


 /**
 * Register the block once ACF has initialized
 */
add_action( 'acf/init', 'kasutan_acf_block_trame_acf_init' );
function kasutan_acf_block_trame_acf_init() {
 	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
 		acf_register_block( [
			'name'            => 'acf-trame',
			'title'           => __( 'ACF Bloc trame', 'banagrumes' ),
			'description'     => __( 'Bloc avec une image de fond et une trame au survol.', 'banagrumes' ),
			'render_callback' => 'acf_trame_callback',
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
function acf_trame_callback( $block ) {
	if(function_exists("get_field")) :
		ob_start();
		$className=esc_attr($block["className"]);
		$image=wp_get_attachment_url(get_field('image'),'medium');
		$titre=wp_kses_post(get_field('titre'));
		$balise=esc_attr(get_field('niveau_du_titre'));
		$position=esc_attr(get_field('position_du_titre'));
		$cible = esc_url(get_field('cible'));
		$opacite=esc_attr(get_field('opacite_trame'));
		$couleur=esc_attr(get_field('couleur_trame'));
		$target='';
		$option_target=esc_attr(get_field('nouvel_onglet'));
		if($option_target==1) {
			$target='target="_blank"';
		}

		//Cas particulier du bloc "offre produit de la semaine"
		if('offre-semaine'===$className) {
			$offre=esc_url(get_field('offre','option'));
			if($offre) {
				$cible = $offre;
				$target='target="_blank"';
			}
		}

		?>
		<a href="<?php echo $cible;?>" <?php echo $target;?> class="acf-block-trame <?php echo $className;?>" style="background-image:url(<?php echo $image;?>)">
			<div class="trame" style="background-color:<?php echo $couleur;?>;opacity:<?php echo $opacite;?>"></div>
			<<?php echo $balise;?> class="titre <?php echo $position;?>"><?php echo $titre;?></<?php echo $balise;?>>
		</a>
		<?php
		echo ob_get_clean();
	endif;
} 