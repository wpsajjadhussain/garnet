<?php
/**
 * Enqueue scripts and styles.
 */

function garnet_troon_scripts()
{
	wp_enqueue_script('jquery');

	wp_enqueue_style('garnet-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('garnet-style', 'rtl', 'replace');

	//Google Fonts 
	wp_enqueue_style('Inter', '//fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"', false);

	//Style
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style('gotham', get_template_directory_uri() . '/assets/fonts/humansans/stylesheet.css');
	wp_enqueue_style('screen', get_template_directory_uri() . '/assets/scss/theme.css');
	wp_enqueue_style('slick-css', get_template_directory_uri() . '/assets/js/slick/slick.css');


	//Js   
	wp_enqueue_script('slick-js', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array(), '1', true);
	wp_enqueue_script('garnet-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1', true);

	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/app.js', array(), '1', true);

	// Custom Script
	wp_enqueue_script( 'garnetfamily-custom-script', get_template_directory_uri() . '/assets/js/custom-script.js', array(), _S_VERSION, true );


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'garnet_troon_scripts');

?>