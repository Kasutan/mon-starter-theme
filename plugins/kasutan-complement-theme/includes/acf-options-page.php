<?php
//TODO Move to plugin ?
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Home page settings',
		'menu_title'	=> 'Home Settings',
		'menu_slug' 	=> 'home-page-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}