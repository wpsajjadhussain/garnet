<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package garnet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
       <?php if(category_exists()) { ?>
        <div class="category">
            <?php the_category(' '); ?>
        </div>
        <?php } ?>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
    </header>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    <footer class="entry-footer">
        <!-- date -->
        <?php the_date(); ?>
    </footer>
</article>
