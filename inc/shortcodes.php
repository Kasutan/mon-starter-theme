<?php

/*Afficher les derniers articles de la même façon que la page archive*/

add_shortcode('actualites', 'kasutan_shortcode_actualites');
function kasutan_shortcode_actualites($atts) {
	$args = shortcode_atts( array(
		'nombre'=> 3,
	), $atts );
	$nombre=$args['nombre'];

	$query_args=array(
		'post_type' => 'post',
		'posts_per_page' => $nombre,
	);
	$articles=new WP_Query($query_args);
	ob_start();
	if ( $articles->have_posts() ) {
		echo '<section class="loop">';
		while ( $articles->have_posts() ) {
			$articles->the_post();
			get_template_part( 'template-parts/content-loop');
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		echo '</section>';
	}
	return ob_get_clean(); 
}

