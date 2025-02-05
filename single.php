<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package garnet
 */

get_header();
$url = get_bloginfo('template_url');
while (have_posts()):
    the_post();
    ?>
    <section class="post-detail mt-100">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="title">
                        <h1 class="h2">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                    <div class="date mb-30">
                        <?php echo get_the_date(); ?>
                    </div>
                    <?php get_template_part('template-parts/common/featured_image'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="--post-content mb-50">
        <div class="container">
            <div class="row justify-content-center mt-50">
                <div class="col-lg-10">
                    <div class="--content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

endwhile; // End of the loop.

// Footer
get_footer();