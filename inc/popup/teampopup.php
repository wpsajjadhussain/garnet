<?php

function artisansweb_scripts()
{
    if (is_page('about')):
        wp_register_script('popup-script', get_stylesheet_directory_uri() . '/inc/popup/teampopup.js', array('jquery'), false, true);
    endif;
    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('view_post'),
    );
    wp_localize_script('popup-script', 'blog', $script_data_array);
    wp_enqueue_script('popup-script');
}
add_action('wp_enqueue_scripts', 'artisansweb_scripts');


// Ajax Call 
function load_post_by_ajax_callback()
{
    check_ajax_referer('view_post', 'security');
    $args = array(
        'post_type' => 'garnet-team',
        'p' => $_POST['id'],
    );

    $posts = new WP_Query($args);

    $arr_response = array();
    if ($posts->have_posts()) {
        while ($posts->have_posts()) {
            $posts->the_post();
            $arr_response = array(
                'title' => get_the_title(),
                'designation' => get_field('designation'),
                'content' => get_the_content(),
                'image' => get_the_post_thumbnail_url(),
                'linkedin_link' => get_field('linkedin_link'),
            );
        }
        wp_reset_postdata();
    }
    echo json_encode($arr_response);
    wp_die();
}
add_action('wp_ajax_load_post_by_ajax', 'load_post_by_ajax_callback');
add_action('wp_ajax_nopriv_load_post_by_ajax', 'load_post_by_ajax_callback');