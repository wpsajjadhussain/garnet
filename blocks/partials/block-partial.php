<?php
    /**
     * Function to render the buttons from the CTAs field
     * @param array $cta The CTAs field
     * @return string The rendered buttons
     */
    function render_hero_cta_buttons($cta) {
        // check if button style is not empty then assign the class if empty then assign the default class
        $button_filled_style = $cta['button_filled_style'];
        $button_outline_style = $cta['button_outline_style'];
        if (!$button_filled_style) $button_filled_style = 'primary-btn';
        if (!$button_outline_style) $button_outline_style = 'outline-btn';
    

        $html = '<div class="hero__cta">';
        if (!empty($cta['button_filled'])) {
            $html .= '<a class="btn ' . $button_filled_style . '" href="' . $cta['button_filled']['url'] . '">' . $cta['button_filled']['title'] . '</a>';
        }
        if (!empty($cta['button_outlined'])) {
            $html .= '<a class="btn ' . $button_outline_style . '" href="' . $cta['button_outlined']['url'] . '">' . $cta['button_outlined']['title'] . '</a>';
        }
        $html .= '</div>';
        return $html;
    }

    // render image 
    function render_image($image) {
        if (!$image) return;
        echo '<figure>';
        echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" class="img-fluid" />';
        echo '</figure>';
    }
    

    // render post card

    function render_post_card( $category_enable, $yellow_box ) {
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                            </header>
                            <div class="post__card">
                                <div class="entry-summary">
                                    <?php if ($category_enable) { ?>
                                        <div class="post-category">
                                            <?php the_category(' '); ?>
                                        </div>
                                    <?php } ?>
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                </div>
                                <footer class="entry-footer">
                                        <div class="post-date">
                                            <?php the_date(); ?>
                                        </div>
                                    <?php if ($yellow_box  == 'enable') { ?>
                                        <div class="yellow-box"></div>
                                    <?php } ?>
                                </footer>
                            </div>
                        </article>
        <?php
    }


    // custom breadcumb parent > child
    function garnet_family_breadcrumb() {
        global $post;
        
        if (!$post) return;
    
        $parents = array();
        $parent = $post->post_parent;
    
        // Get all parent pages
        while ($parent > 0) {
            $parents[] = $parent;
            $parent = get_post_field('post_parent', $parent);
        }
    
        // Reverse the order to show the hierarchy correctly
        $parents = array_reverse($parents);
    
        // Display parent pages with links
        foreach ($parents as $parent_id) {
            echo '<a href="' . get_permalink($parent_id) . '">' . get_the_title($parent_id) . '</a> &gt; ';
        }
    
        // Display the current page without a link
        echo get_the_title();
    }
    

