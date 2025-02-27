<?php
/**
 * garnets functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package garnet
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function garnet_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on garnet, use a find and replace
	 * to change 'garnet' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('garnet', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	add_image_size('blog', 450, 274, true); // 450 x 274 for all Article posts
	add_image_size('featured', 540, 355, true); // 450 x 274 for all Article posts

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'garnet'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'garnet_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'garnet_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function garnet_content_width()
{
	$GLOBALS['content_width'] = apply_filters('garnet_content_width', 640);
}
add_action('after_setup_theme', 'garnet_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function garnet_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'garnet'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'garnet'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'garnet_widgets_init');






/**
 * Enqueue scripts 
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * misha-scripts
*/
// require get_template_directory() . '/inc/misha-scripts.php';

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
 * Team Popup
 */
require get_template_directory() . '/inc/popup/teampopup.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*Theme Options*/
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(
		array(
			'page_title' => 'Theme Options',
			'menu_title' => 'Theme Options',
			'menu_slug' => 'theme-options',
			'capability' => 'edit_posts',
			'redirect' => false
		)
	);
}

//add SVG to allowed file uploads
function svg_file_upload($mimes)
{

	// New allowed mime types.
	$mimes['svg'] = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	$mimes['doc'] = 'application/msword';

	// Optional. Remove a mime type.
	unset($mimes['exe']);
	return $mimes;
}
add_filter('upload_mimes', 'svg_file_upload');


function inb_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Footer', 'garnet'),
			'id' => 'footer',
			'description' => esc_html__('Add widgets here.', 'garnet'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'inb_widgets_init');


//  block partial parts
include_once get_template_directory() . '/blocks/partials/block-partial.php';



// register ACF blocks
include_once get_template_directory() . '/blocks/blocks-register.php';


// custom block category
function add_block_category($categories, $post)
{
	$categories[] = array(
		'slug' => 'garnet-family-blocks',
		'title' => __('Garnet Family Blocks', 'garnet'),
	);
	return $categories;
}
add_filter('block_categories', 'add_block_category', 10, 2);



// custom checkbox register for pages 
function register_container_meta() {
    register_post_meta('page', 'enable_container', array(
        'show_in_rest' => true,
        'single'       => true,
        'type'         => 'boolean',
        'auth_callback' => function() {
            return current_user_can('edit_posts');
        },
    ));
}
add_action('init', 'register_container_meta');


function enqueue_gutenberg_checkbox_script() {
    wp_enqueue_script(
        'gutenberg-container-checkbox',
        get_template_directory_uri() . '/gutenberg-checkbox.js',
        array('wp-plugins', 'wp-edit-post', 'wp-components', 'wp-data', 'wp-compose'),
        null,
        true
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_gutenberg_checkbox_script');
