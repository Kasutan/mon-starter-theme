<?php
/*https://www.advancedcustomfields.com/resources/local-json/*/

add_filter('acf/settings/save_json', 'kasutan_acf_json_save_point');
 
function kasutan_acf_json_save_point( $path ) {
    
	// update path
	$path = plugin_dir_path( __FILE__ ) . '/acf-json';
    
    
	// return
	return $path;
    
}

/* Ne fonctionne pas bien - à creuser */
/*https://www.billerickson.net/acf-json-with-git/*/
/*
add_filter('acf/settings/load_json', 'kasutan_acf_json_load_point');

function kasutan_acf_json_load_point( $paths ) {
    
	// remove original path (optional)
	unset($paths[0]);
    
    
	// append path
	$paths[] = plugin_dir_path( __FILE__ ) . '/acf-json';
    
    
	// return
	return $paths;
    
}*/

