<?php
/**
 * dreikommaein functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dreikommaein
 */

if ( ! function_exists( 'dreikommaein_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dreikommaein_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dreikommaein, use a find and replace
		 * to change 'dreikommaein' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dreikommaein', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Header menu', 'dreikommaein' ),
			'menu-2' => esc_html__( 'Footer menu', 'dreikommaein' ),
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
		add_theme_support( 'custom-background', apply_filters( 'dreikommaein_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'dreikommaein_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dreikommaein_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dreikommaein_content_width', 640 );
}
add_action( 'after_setup_theme', 'dreikommaein_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dreikommaein_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dreikommaein' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'dreikommaein' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dreikommaein_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dreikommaein_scripts() {
	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/bootstrap.min.css');
	
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');

	wp_enqueue_script('tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js');

	wp_enqueue_script('scrollmagic', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js');

	wp_enqueue_script('scrollmagic-indicators', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js');

	wp_enqueue_script('scrollmagic-animation', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js');
	
	wp_enqueue_style( 'dreikommaein-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dreikommaein-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'dreikommaein-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '/js/scripts.js');
	
	wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dreikommaein_scripts' );

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

/* Add categories to pages */
function page_category() {
	register_taxonomy(
		'page_category',
		'page',
		array(
			'label' => __( 'Page Categories' ),
			'rewrite' => array( 'slug' => 'page_category' ),
			'hierarchical' => 'true'
		)
	);
}
add_action( 'init', 'page_category' );
/*function add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );*/

/* Modify More link */
function modify_read_more_link() {
    return '<p class="more-link-p"><a id="post-'.get_the_ID().'" href="javascript:" class="more-link" title="Weiter lesen">Weiter lesen &nbsp;&nbsp;&nbsp; <span>&#9701;&#9700;</span></a></p>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/* Split Contact Form 7 shortcode */
function split_cf7($form) {
	$a=explode('id="', $form);
	$b=explode('"', $a[1]);
	$id=$b[0];
	$c=explode('title="', $form);
	$d=explode('"', $c[1]);
	$title=$d[0];
	$form_arr= array('id' => $id, 'title' => $title);
	return $form_arr;
}

function dreikommaein_team() {
  register_post_type( 'team',
    array(
      'labels' => array(
        'name' => __( 'Team' ),
        'singular_name' => __( 'Team member' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'team'),
      'revisions' => true,
      'supports' => array('title', 'thumbnail', 'revisions')
    )
  );
}
add_action( 'init', 'dreikommaein_team' );