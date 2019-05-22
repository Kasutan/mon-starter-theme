<?php

/*Modifier les salts*/


/*Désactiver l'éditeur dans l'espace administrateur*/
define('DISALLOW_FILE_EDIT', true);

/*Logger les messages d'erreur php*/
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );

/*Limiter le nombre de révisions stockées dans la base*/
define( 'WP_POST_REVISIONS', 5 );
