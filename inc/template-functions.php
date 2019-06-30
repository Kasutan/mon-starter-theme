<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Kasutan
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function kasutan_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'kasutan_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function kasutan_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'kasutan_pingback_header' );


/**
* Get picto url.
*/
function kasutan_get_picto_url($name) {
	return get_template_directory_uri() . '/icons/utility/'.$name.'.svg';
}


/**
* Modify excerpt length and '[..]' read more string.
*/
function wpdocs_custom_excerpt_length( $length ) {
	return 18;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
	if ( ! is_single() ) {
		return '...'.'<a href="'.esc_url( get_permalink() ).'" class="read-more-link"><span class="screen-reader-text">'.kpll__('Lire la suite').get_the_title().'</span> >>></a>';
	}
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
* Récupérer l'ID d'une page - traduite - stockée dans une option ACF.
*/

function kasutan_get_page_ID($nom) {
	if (!function_exists('get_field')) {
		return;
	}

	$page=get_field($nom,'option');

	if(get_post($page)) : //on vérifie qu'on a bien un post ou une page qui existe
		if(function_exists('pll_get_post')) : 
			$page=pll_get_post($page); // on récupère l'ID de la traduction si besoin
		endif;
	endif;

	return $page;
}