<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Kasutan
 */

if ( ! function_exists( 'kasutan_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function kasutan_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);


		$posted_on=kpll__('Publié le').' <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'kasutan_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function kasutan_posted_by() {
		$byline=' '.kpll__('par').' <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'kasutan_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kasutan_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				echo '<span class="cat-links">' . kpll__( 'Publié dans') .' '. $categories_list. '</span>'; // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', ', ');
			if ( $tags_list ) {
				echo ' <span class="tags-links">' . kpll__( 'Etiquetté') .' '. $tags_list. '</span>'; // WPCS: XSS OK.
			}
		}

	}
endif;

if ( ! function_exists( 'kasutan_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function kasutan_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'medium', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;



if ( ! function_exists( 'kasutan_fil_ariane' ) ) :
	/**
	* Affiche le fil d'ariane.
	*/
	function kasutan_fil_ariane($tax='') {

		//On n'affiche pas le fil d'ariane sur la page d'accueil
		if(!is_front_page()) :
			echo '<p class="fil-ariane medium-container no-margin-bottom">';

			//Afficher le lien vers l'accueil
			$accueil=get_option('page_on_front');
			if(function_exists('pll_get_post')) :
				$accueil=pll_get_post($accueil);
			endif;
			printf('<a href="%s">%s</a> > ',
				get_the_permalink( $accueil),
				get_the_title($accueil)
			);

			//Afficher le lien vers la page parente s'il y en a une
			$current=get_post(get_the_ID());
			$parent=$current->post_parent; // déjà traduit ?
			if($parent) :
				printf('<a href="%s">%s</a> > ',
					get_the_permalink( $parent),
					get_the_title($parent)
				);
			endif;
			
			/*Cas particuliers : à adapter selon les sites 

			//Afficher la page des actualités pour les articles
			if ( 'post' === get_post_type() ) :
				//l'ID de la page est stockée dans les options ACF
				$actus=kasutan_get_page_ID('page_actualites'); // ID traduit si besoin
				if($actus) :
					printf('<a href="%s">%s</a> > ',
						get_the_permalink( $actus),
						get_the_title($actus)
					);
				endif;
			endif;
			
			if ( is_tax() ) :
				$famille=get_queried_object();
				$tax=$famille->taxonomy;
				if('produits_conventionnels'==$tax) :
					$page=kasutan_get_page_ID('page_produits_conventionnels');
				elseif ('produits_bio'==$tax) :
					$page=kasutan_get_page_ID('page_produits_bio');
				endif;
				if($page) :
					printf('<a href="%s">%s</a> > ',
					get_the_permalink( $page),
					get_the_title($page)
				);
				endif;
			endif;

			*/

			//Afficher le titre de la page courante
			if(is_singular()):
				the_title('<span class="current">','</span>'); 
			elseif (is_tax()) : 
				echo '<span class="current">'.single_term_title( '', false ).'</span>';
			elseif (is_archive('')) :
				the_archive_title('<span class="current">','</span>');
			endif;

			//Fermer la balise du fil d'ariane
			echo '</p>';

		endif;
	}
endif;