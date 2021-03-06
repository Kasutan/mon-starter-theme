<?php
/**
 * Kasutan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kasutan
 */

if ( ! function_exists( 'kasutan_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kasutan_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kasutan, use a find and replace
		 * to change 'kasutan' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kasutan', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Menu principal', 'themeLangDomain' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'kasutan_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		* Font sizes in editor
		* https://www.billerickson.net/building-a-gutenberg-website/#editor-font-sizes
		*/
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => __( 'Petite', 'themeLangDomain' ),
				'size' => 13,
				'slug' => 'small'
			),
			array(
				'name' => __( 'Normale', 'themeLangDomain' ),
				'size' => 16,
				'slug' => 'normal'
			),
			array(
				'name' => __( 'Grande', 'themeLangDomain' ),
				'size' => 20,
				'slug' => 'big'
			),
		) );
		add_theme_support( 'disable-custom-font-sizes' );

		/**
		* Editor styles
		*/
		add_theme_support( 'editor-styles' );
		add_editor_style( '/css/editor-style.css' );

		/**
		* Responsive embeds
		*/
		add_theme_support( 'responsive-embeds' );

		/**
		* Wide/full alignment
		*/
		add_theme_support( 'align-wide' );
	}
endif;
add_action( 'after_setup_theme', 'kasutan_setup' );

/**
* Register color palette for Gutenberg editor.
*/
require get_template_directory() . '/inc/colors.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kasutan_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'kasutan_content_width', 640 );
}
add_action( 'after_setup_theme', 'kasutan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kasutan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Barre latérale', 'themeLangDomain' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Bandeau en-tête', 'themeLangDomain' ),
		'id'            => 'topbar',
		'description'   => esc_html__( 'Bandeau au-dessus-de l\'en-tête', 'themeLangDomain' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Bandeau pied de page', 'themeLangDomain' ),
		'id'            => 'topfooter',
		'description'   => esc_html__( 'Bandeau au-dessus du pied de page', 'themeLangDomain' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Pied de page', 'themeLangDomain' ),
		'id'            => 'footer',
		'description'   => esc_html__( 'Widgets principaux du pied de page', 'themeLangDomain' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s col md6 lg4">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'themeLangDomain' ),
		'id'            => 'copyright',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'kasutan_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kasutan_scripts() {
    wp_enqueue_style( 'kasutan-style-colors',get_template_directory_uri() . '/css/colors.min.css' );
	wp_enqueue_style( 'kasutan-style', get_stylesheet_uri() );
	wp_enqueue_style( 'kasutan-google-font', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,700,600italic,700italic');

	wp_enqueue_script( 'kasutan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'kasutan-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'kasutan-scripts', get_template_directory_uri() . '/js/kasutan.js', array('jquery'), '20190522', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kasutan_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
* Prepare theme strings for translation with Polylang.
*/

require get_template_directory() . '/inc/polylang.php';

/**
* Image sizes. Work first with medium and large in admin if possible
* https://developer.wordpress.org/reference/functions/add_image_size/
*/

//add_image_size('banniere',1960,300,true);


/**
* Shortcodes
*/

require get_template_directory() . '/inc/shortcodes.php';




/**
* Blocks
*/

//require get_template_directory() . '/blocks/k-groupe.php';

