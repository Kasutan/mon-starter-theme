<?php

//Tableau qui contient toutes les chaines du plugin à traduire
global $kasutan_plugin_chaines;
$kasutan_plugin_chaines=array(
//	"Ajouter un produit",
);


add_action('plugins_loaded', 'kasutan_late_loader');
function kasutan_late_loader() {
	//Si besoin ponctuel : associer 2 pages traduites entre elles
/* $arr=array(
		'fr'=>5860,
		'en'=>5955,
	);
	if (function_exists('pll_save_post_translations') ){
		pll_save_post_translations($arr);
	} */

	/*Définir une fonction qui traduit, que Polylang et le thème soient activés ou pas*/
	/*Cette fonction est définie aussi dans le thème*/

	if ( ! function_exists( 'kpll__' ) ) :

		function kpll__($string) {
			if ( function_exists('pll__') ) {
				return esc_html(pll__($string));
			} else {
				return esc_html__($string,'themeLangDomain');
			}
		}

	endif;

	//Enregistrer toutes les chaines à traduire dans Polylang
	if(function_exists('pll_register_string')) {
		global $kasutan_plugin_chaines;
		foreach($kasutan_plugin_chaines as $chaine) {
			pll_register_string('themeLangDomain',$chaine,'Plugin');

		} 
        
	}
}