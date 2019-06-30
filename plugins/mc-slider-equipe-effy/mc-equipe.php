<?php
/*Plugin Name: Effy Equipe 
Description: CPT membres du comité de direction avec template Gutenberg et affichage en carrousel
Version: 1.0
License: GPLv2
Author: Magalie Castaing
*/

function effy_register_membre_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Membres',
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-id',
        'has_archive'  => false,
        'supports' => array('title','editor','thumbnail'),
        'template' => array(
            array( 'core/paragraph', array(
                'placeholder' => 'Fonction du membre',
                'className' => 'fonction',

            ) ),
            array( 'core/paragraph', array(
                'className' => 'bio',
                'placeholder' => 'Biographie',
                
            ) ),
        ),
    );
    register_post_type( 'effy-membre', $args );
}
add_action( 'init', 'effy_register_membre_post_type' );

/* Scripts du slider */
function effy_slider_scripts() {
    wp_register_script( 'slider-siema', plugins_url( 'siema.min.js', __FILE__ ), array('jquery'), true);
    wp_register_script( 'slider', plugins_url( 'mc-slider-scripts.js', __FILE__ ), array('jquery','slider-siema'), true);
    if (is_page(44742)) {
        wp_enqueue_script( 'slider-siema');
        wp_enqueue_script( 'slider');
    }
  
}
add_action('wp_enqueue_scripts', 'effy_slider_scripts');


/* Shortcode pour afficher le slider */

add_shortcode( 'comite-direction', 'effy_shortode_comite' );

function effy_shortode_comite() {

	$args = array(

		'post_type' => 'effy-membre',

		'posts_per_page'=> -1,

		'order' => 'ASC',

		'orderby' => 'date',

	);

	$membres = new WP_Query( $args );

	
    ob_start();

	if( $membres->have_posts() ) {
        echo '<div class="siema">';

		while ( $membres->have_posts() ) : $membres->the_post();
            ?>
            <div class="membre shadow">
                <div class="membre-portrait"><?php the_post_thumbnail( 'medium'); ?></div>
                <h3 class="membre-nom"><?php  the_title(); ?> </h3>        
                <div class="membre-contenu"><?php the_content(); ?></div>
            </div>
            <?php

		endwhile;

        echo '</div>';
        echo '<div id="siema-fleches"></div>';
        

	}

	wp_reset_postdata();

	return ob_get_clean();

	

}