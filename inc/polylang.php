<?php

/*Définir une fonction qui traduit, que Polylang soit activé ou pas*/
if ( ! function_exists( 'kpll__' ) ) :

	function kpll__($string) {
		if ( function_exists('pll__') ) {
			return esc_html(pll__($string));
		} else {
			return esc_html__($string,'themeLangDomain');
		}
	}

endif;

/*Si Polylang est activé, on enregistre les chaines du thème pour traduction*/

if ( function_exists('pll_register_string') ) {
	/*Chaines visibles en front uniquement*/
	/*Ajouter si besoin les chaines de comments.php*/
	$register_strings=[
		'Menu',
		'Aller directement au contenu',
		'Publié dans',
		'Etiquetté',
		'Publié le',
		'Par',
		'Lire la suite',
		'Pages&nbsp;:',
		
	];

	foreach ($register_strings as $string) {
		pll_register_string('themeLangDomain',$string,'Thème');
	}
}

