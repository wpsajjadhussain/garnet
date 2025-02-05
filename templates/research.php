<?php
/**  
 * Template Name: Research
 */


get_header();
$url = get_bloginfo('template_url'); ?>


<section class="research">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-md-5">
                <div class="--content">
                    <?php the_content(); ?>
                </div>
            </div>
            <div class="col-md-7">
                <?php
                // Featured Image
                if (has_post_thumbnail()) {
                    ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('full', ['class' => 'img-fluid ', 'alt' => '' . $title . '']); ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>