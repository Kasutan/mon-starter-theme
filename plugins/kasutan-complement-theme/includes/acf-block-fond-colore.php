<?php


 /**
 * Register the block once ACF has initialized
 */
add_action( 'acf/init', 'kasutan_acf_block_fond_colore_acf_init' );
function kasutan_acf_block_fond_colore_acf_init() {
 	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
 		acf_register_block( [
			'name'            => 'acf-fond-colore',
			'title'           => __( 'ACF Bloc demi fond coloré', 'banagrumes' ),
			'description'     => __( 'Bloc avec un fond coloré et une image', 'banagrumes' ),
			'render_callback' => 'acf_fond_colore_callback',
			'category'        => 'formatting',
			'icon'            => 'admin-customizer',
			'keywords'        => [ 'fond', 'acf', 'coloré' ],
		] );
	}
 }
 /**
 * Render Callback for the block. This is what is output in the Theme AND
 * in the preview within Gutenberg
 *
 * @param $block
 */
function acf_fond_colore_callback( $block ) {
	if(function_exists("get_field")) :
		ob_start();
		
		$className=esc_attr($block["className"]);
		$titre=esc_html(get_field('titre'));
		$balise=esc_attr(get_field('niveau_du_titre'));
		$image=wp_get_attachment_image(get_field('image'),'medium');
		$texte=wp_kses_post(get_field('texte'));
		$couleur=esc_attr(get_field('couleur_fond'));
		?>
		<div class="acf-block-fond-colore <?php echo $className;?>">
			<div class="conteneur-image">
				<?php echo $image;?>
			</div>
			<div class="conteneur-texte" style="background-color:<?php echo $couleur;?>; color:#fff">
				<<?php echo $balise;?> class="titre"><?php echo $titre;?></<?php echo $balise;?>>
				<div class="texte"><?php echo $texte;?></div>
			</div>
		</div>
		<?php
		echo ob_get_clean();
	endif;
} 