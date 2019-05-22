<?php


 /**
 * Register the block once ACF has initialized
 */
add_action( 'acf/init', 'kasutan_acf_block_demo_acf_init' );
function kasutan_acf_block_demo_acf_init() {
 	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
 		acf_register_block( [
			'name'            => 'acf-demo',
			'title'           => __( 'ACF Demo', 'themeLangDomain' ),
			'description'     => __( 'A custom Demo block, using Advanced Custom Fields Pro.', 'themeLangDomain' ),
			'render_callback' => 'acf_demo_callback',
			'category'        => 'formatting',
			'icon'            => 'admin-comments',
			'keywords'        => [ 'demo', 'acf' ],
		] );
	}
 }
 /**
 * Render Callback for the block. This is what is output in the Theme AND
 * in the preview within Gutenberg
 *
 * @param $block
 */
function acf_demo_callback( $block ) {
	if(function_exists("get_field")) :
		echo '<p>block acf block demo</p>';
	endif;
} 