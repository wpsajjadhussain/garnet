<?php
/* Global settings for post */
$GLOBALS['post_count_initial'] = 5;
$GLOBALS['post_count_load_more'] = 5;

/* Global settings for content */
$GLOBALS['content_count_initial'] = 5;
$GLOBALS['content_count_load_more'] = 5;
$tmp = get_defined_vars();
$obj = $wp_query->get_queried_object();


// ajax loadmore
function misha_my_load_more_scripts() {

    global $wp_query;

    // register our main script but do not enqueue it yet
    wp_enqueue_script( 'my_loadmore', get_template_directory_uri() . '/assets/js/myloadmore.js', array(), '1', true );


    // if(is_page('portfolio')){
    //     $current_category = single_cat_title("", false);
    //     $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    //     $wp_query = new WP_Query(array(
    //         'post_type'=>'portfolio',
	// 		'paged' => $paged,
    //         'posts_per_page' => $GLOBALS['content_count_initial'],
    //         'post_status'=>'publish',
    //         'category_name' => $current_category,
    //     ));
    // }

    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );

    wp_enqueue_script( 'my_loadmore' );
}
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

// ajax handler
function misha_loadmore_ajax_handler(){
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_type'] = $_POST['postType'];
    $post_per_page = (int) $GLOBALS[$args['post_type'].'_count_initial'];
    $args['posts_per_page'] = $post_per_page;
    $pageId = $_POST['pageId'];
    
    $ex_ids = get_field('top_resources', $pageId);
    $id_to_exclude = array();

    foreach($ex_ids as $ex_id){
        $id_to_exclude[] = $ex_id; 
    }

    if($_POST['termId'] == '' || $_POST['termId'] == 'all'){
        $offset = $_POST['page'] * $post_per_page;
    } else {
        $offset = $_POST['page'] * $post_per_page;
    }


    $page_offset = $_POST['page'] -1;
    $args['offset'] = $page_offset * $post_per_page; 
    
    //echo $offset;exit;

    $ignore_posts = array();
    
    $wp_query_ignore = new WP_Query(array(
        'post_type'=>$_POST['postType'],
        'paged' => $_POST['page'],
        'posts_per_page' => $GLOBALS['content_count_initial'],
        'offset' => $offset - $GLOBALS['content_count_initial'],
        'post_status'=>'publish',
        'post__not_in' => $id_to_exclude
    ));

    if ( $wp_query_ignore->have_posts() ) :
        while ( $wp_query_ignore->have_posts() ) : $wp_query_ignore->the_post(); 
        $id_to_exclude[] = get_the_ID();
        endwhile;  
    endif;

    $args['post_status'] = 'publish';
    $args['post__not_in'] = $id_to_exclude; 
    
    // it is always better to use WP_Query but not here
    query_posts( $args );
    if( have_posts() ) :

        // run the loop
        while( have_posts() ): the_post();
            get_template_part( 'template-parts/common/'.$_POST['templateParts'] );
        endwhile;

    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}

function misha_filter_function(){
    $args['post_status'] = 'publish';
    $args['offset'] = 0;
    $args['post_type'] = $_POST['postType'];

    // Add this line to exclude sticky posts
    $args['post__not_in'] = get_option( 'sticky_posts' );

    $pageId = $_POST['postType'];

    $args['paged'] = '1';
    $args['posts_per_page'] = $GLOBALS[$args['post_type'].'_count_initial'];

    if( isset( $_POST['termId'] ) && $_POST['termId'] != 'all'):
        $args['tax_query'] = array(
            array(
                'taxonomy' => $_POST['taxonomy'],
                'field' => 'id',
                'terms' => $_POST['termId']
            )
        );
    endif;

    // it is always better to use WP_Query but not here
    query_posts( $args );

    global $wp_query;
    if( have_posts() ) :

        ob_start();

        // run the loop
        while( have_posts() ): the_post();
            get_template_part( 'template-parts/common/'.$_POST['templateParts'] );
        endwhile;

        $posts_html = ob_get_contents(); // we pass the posts to variable
        ob_end_clean(); // clear the buffer

    endif;

    echo json_encode( array(
        'posts' => json_encode( $wp_query->query_vars ),
        'max_page' => $wp_query->max_num_pages,
        'found_posts' => $wp_query->found_posts,
        'content' => $posts_html
    ) );

    die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');