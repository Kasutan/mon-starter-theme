<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/***************************************************************
	Custom Taxonomy Gamme de Produits
/***************************************************************/

add_action( 'init', 'create_gamme_tag', 0 );
function create_gamme_tag() {
// Labels part for the GUI
$labels = array(
	'name' => _x( 'Gammes', 'taxonomy general name' ),
	'singular_name' => _x( 'Gamme', 'taxonomy singular name' ),
	'menu_name' => __( 'Gammes' ),
); 
register_taxonomy('gamme','produit',array(
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'update_count_callback' => '_update_post_term_count',
	'query_var' => true,
));
}


/***************************************************************
	Custom Post Type : produit
/***************************************************************/
function kasutan_produit_cpt() {
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Produits', 'Post Type General Name', 'themeLangDomain' ),
			'singular_name'       => _x( 'Produit', 'Post Type Singular Name', 'themeLangDomain' ),
			'menu_name'           => __( 'Produits', 'themeLangDomain' ),
			'parent_item_colon'   => __( 'Produit parent', 'themeLangDomain' ),
			'all_items'           => __( 'Tous les produits', 'themeLangDomain' ),
			'view_item'           => __( 'Voir le produit', 'themeLangDomain' ),
			'add_new_item'        => __( 'Ajouter un produit', 'themeLangDomain' ),
			'add_new'             => __( 'Ajouter', 'themeLangDomain' ),
			'menu_name'           => 'Fiches produits'						
		);
	// Set other options for Custom Post Type
		$args = array(
			'label'               => __( 'Produit', 'themeLangDomain' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array('gamme'),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/	
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 25,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-cart'
		);
		// Registering your Custom Post Type
		register_post_type( 'produit', $args );
	}
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	add_action( 'init', 'kasutan_produit_cpt', 0 );



/***************************************************************
    Custom Post Type : univers
/***************************************************************/
function kasutan_univers_cpt() {
// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Univers', 'Post Type General Name', 'themeLangDomain' ),
		'singular_name'       => _x( 'Univers', 'Post Type Singular Name', 'themeLangDomain' ),
		'menu_name'           => __( 'Univers', 'themeLangDomain' ),
		'parent_item_colon'   => __( 'Univers parent', 'themeLangDomain' ),
		'all_items'           => __( 'Tous les univers', 'themeLangDomain' ),
		'view_item'           => __( 'Voir l\'univers', 'themeLangDomain' ),
		'add_new_item'        => __( 'Ajouter un univers', 'themeLangDomain' ),
		'add_new'             => __( 'Ajouter', 'themeLangDomain' ),
		'menu_name'           => 'Univers'						
	);
// Set other options for Custom Post Type
	$args = array(
		'label'               => __( 'Univers', 'themeLangDomain' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions'),
		// You can associate this CPT with a taxonomy or custom taxonomy.
		//'taxonomies'          => array('sources','category'),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'menu_icon'           => 'dashicons-admin-multisite'
	);
	// Registering your Custom Post Type
	register_post_type( 'univers', $args );
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'kasutan_univers_cpt', 0 );

