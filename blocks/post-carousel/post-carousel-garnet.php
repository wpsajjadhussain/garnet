<?php

/**
 * Post Carousel Block
 * 
 * @return void
 */

/**
 * Post Carousel Block Template
 * 
 * @param array $attributes The block attributes.
 *
 *
 * @return string The block HTML.
 */


$post_carousel = get_field('post_carousel');
$number_of_posts = get_field('number_of_posts');
$order_by = get_field('order_by');
$category_enable = get_field('enable_category');
$date_enable = get_field('date_enable');
$yellow_box = get_field('enable_yellow_box');
// $post_category = get_field('post_category');
$slide_arrow = get_field('slide_arrow');



if (empty($post_carousel) && empty($number_of_posts) ) {
    return;
}
// create custom query
$args = array(
    'post_type' => 'post',
    'posts_per_page' => $number_of_posts,
    'orderby' => $order_by,
    
);



// post query
$query = new WP_Query($args);

?>

<section class="post-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row post-carousel blog-slider" id="post-carousel-slider">
                   <?php while ($query->have_posts()): $query->the_post(); ?>
                   <div class="col-lg-4">
                        <?php  render_post_card($category_enable, $yellow_box); ?>
                    </div>
                   <?php endwhile; ?>
                   <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- style -->
<style>
    .post-carousel .post__card {
        background-color: #FEF8E6;
        padding: 4.4rem 4rem 6rem 4rem;
        width: 100%;
        margin-left: 1rem;
        margin-top: -6rem;
        position: relative;
    }
    .post-carousel .post__card .entry-title {
        font-size: 2.4rem;
    }
    .post-carousel .post__card .entry-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .post-carousel .post__card .entry-footer .yellow-box {
        width: 4rem;
        height: 4rem;
        position: relative;
        left: 4rem;
        top: 6rem;
        background-color: #FDDC4C;
    }
    .post-carousel .post__card .entry-footer .date {  
        font-size: 1.4rem;
     }
     .post-carousel .post__card .entry-footer .date {
        color: #848484;
     }
     .post-carousel .post__card .entry-footer .date {
        font-size: 1.4rem;
     }

     .button.slick-prev.slick-arrow {
        display: none !important;
     }
    

</style>


