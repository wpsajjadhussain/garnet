<?php
/**  
 * Template Name: Content Layout
 */
get_header();
?>
    <div class="container">
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>
    </div>
    
<?php get_footer(); ?>