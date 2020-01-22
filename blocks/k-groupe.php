<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package kasutan
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type/#enqueuing-block-scripts
 */
function k_groupe_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_template_directory() . '/blocks';

	$index_js = 'k-groupe/index.js';
	wp_register_script(
		'k-groupe-block-editor',
		get_template_directory_uri() . "/blocks/$index_js",
		array(
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-editor',
		),
		filemtime("$dir/$index_js")
	);

	$editor_css = 'k-groupe/editor.css';
	wp_register_style(
		'k-groupe-block-editor',
		get_template_directory_uri() . "/blocks/$editor_css",
		array(),
		filemtime( "$dir/$editor_css" )
	);

	$style_css = 'k-groupe/style.css';
	wp_register_style(
		'k-groupe-block',
		get_template_directory_uri() . "/blocks/$style_css",
		array(),
		filemtime( "$dir/$style_css" )
	);

	register_block_type( 'kasutan/k-groupe', array(
		'editor_script' => 'k-groupe-block-editor',
		'editor_style'  => 'k-groupe-block-editor',
		'style'         => 'k-groupe-block',
	) );
}
add_action( 'init', 'k_groupe_block_init' );
