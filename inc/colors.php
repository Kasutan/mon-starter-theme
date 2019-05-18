<?php
/**
 * Register Custom color palette for Gutenberg editor
 *
 * Should be the colors from css/colors.css.
 *
 * @package Kasutan
 */

add_theme_support( 'editor-color-palette', array(
	
	array(
		'name'  =>'Principale',
		'slug'  => 'main',
		'color'	=> '#13547a',
	),
	array(
		'name'  =>'Principale 2',
		'slug'  => 'main-hover',
		'color'	=> '#2296da',
	),
	array(
		'name'  =>'Accent',
		'slug'  => 'accent',
		'color'	=> '#f4d706',
	),
	array(
		'name'  =>'Accent 2',
		'slug'  => 'accent-hover',
		'color'	=> '#dcc205',
	),
	array(
		'name'  =>'Gris clair',
		'slug'  => 'light-grey',
		'color'	=> '#ecf5f6',
	),
	array(
		'name'  =>'Gris',
		'slug'  => 'medium-grey',
		'color'	=> '#d1d1d1',
	),
	array(
		'name'  =>'Gris foncé',
		'slug'  => 'dark-grey',
		'color'	=> '#828d8b',
	),
	array(
		'name'  =>'Noir',
		'slug'  => 'black',
		'color'	=> '#3D3D3D',
	),
	array(
		'name'  =>'Blanc',
		'slug'  => 'white',
		'color'	=> '#ffffff',
	),
));