<?php


 /**
 * Register the block once ACF has initialized
 */
add_action( 'acf/init', 'kasutan_acf_block_portrait_acf_init' );
function kasutan_acf_block_portrait_acf_init() {
 	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
 		acf_register_block( [
			'name'            => 'acf-portrait',
			'title'           => __( 'ACF Bloc portrait', 'banagrumes' ),
			'description'     => __( 'Bloc avec photo, nom et rôle.', 'banagrumes' ),
			'render_callback' => 'acf_portrait_callback',
			'category'        => 'formatting',
			'icon'            => 'admin-users',
			'keywords'        => [ 'portrait', 'acf','equipe' ],
		] );
	}
 }
 /**
 * Render Callback for the block. This is what is output in the Theme AND
 * in the preview within Gutenberg
 *
 * @param $block
 */
function acf_portrait_callback( $block ) {
	if(function_exists("get_field")) :
		ob_start();
		$image_id=get_field('image');
		if (!empty($image_id)) : 
			$image_url=wp_get_attachment_url($image_id,'thumbnail');
		else :
			$image_url="";
		endif;

		$nom=esc_attr(get_field('nom'));
		$role=esc_attr(get_field('role'));
		$telephone=esc_attr(get_field('telephone'));
		$email=antispambot(sanitize_email(get_field('email')));

		?>
		<div class="acf-block-portrait">
			<div class="img-portrait" style="background-image:url(<?php echo $image_url;?>); min-height:150px;background-repeat:no-repeat">
			</div>
			<h2 class="nom-portrait"><?php echo $nom;?></h2>
			<p class="role-portrait"><?php echo $role;?></p>
			<?php if($email):?>
				<p class="email-portrait">
					<?php 
						printf("<a href='mailto:%s'>%s</a>",
						$email,
						$email
					);
					?>
				</p>
			<?php endif;?>
			<?php if($telephone):?>
				<p class="telephone-portrait"><?php echo $telephone;?></p>
			<?php endif;?>
		</div>
		<?php 
		//echo '<p>portrait</p>';
		echo ob_get_clean();
	endif;
} 