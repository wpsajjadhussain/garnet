<?php 

/**
 * ACF Blocks Register
 * 
 * @return void
 */

/**
 * Hero Block
 * Mini Card Block
 * Content Card
 * Color Card
 * CTA
 * Newsletter
 * Cover 
 * Post Carousel
 * logo Carousel
 * Accordion
 * 
 */

function garnet_family_block_register()
{

       /*check function exists*/

       if (function_exists('acf_register_block')) {

                /* Hero Section*/
                acf_register_block(array(
                    'name' => 'hero-block-garnet',
                    'title' => __('Hero Block - Garnet'),
                    'description' => __('Garnet Hero Block with custom settings.'),
                    'render_template' => 'blocks/hero/hero-block-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#8F001A',
                        'foreground' => '#fff',
                        'src' => 'slides',
                    ),  
                    'keywords' => array( 'garnet', 'family', 'hero', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
                ));

                // Content card 
                acf_register_block(array(
                    'name' => 'content-card-garnet',
                    'title' => __('Content Card - Garnet'),
                    'description' => __('Garnet Content Card with custom settings.'),
                    'render_template' => 'blocks/content-card/content-card-block-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#8F001A',
                        'foreground' => '#fff',
                        'src' => 'book-alt',
                    ),
                    'keywords' => array( 'content', 'card', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));

                // Accordion -Garnet
                acf_register_block(array(
                    'name' => 'accordion-garnet',
                    'title' => __('Accordion - Garnet'),
                    'description' => __('Garnet Accordion with custom settings.'),
                    'render_template' => 'blocks/accordion/accordion-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#009BA3',
                        'foreground' => '#fff',
                        'src' => 'menu-alt3',
                    ),
                    'keywords' => array( 'accordion', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));

                 //  cover -Garnet
                 acf_register_block(array(
                    'name' => 'cover-garnet',
                    'title' => __('Cover - Garnet'),
                    'description' => __('Garnet Cover with custom settings.'),
                    'render_template' => 'blocks/cover/cover-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#F5B800',
                        'foreground' => '#fff',
                        'src' => 'book-alt',
                    ),
                    'keywords' => array( 'cover', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));

                /* Mini Card Block*/
                acf_register_block(array(
                    'name' => 'mini-card-block-garnet',
                    'title' => __('Mini Card Block - Garnet'),
                    'description' => __('Garnet Mini Card Block with custom settings.'),
                    'render_template' => 'blocks/mini-card/mini-card-block-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#8F001A',
                        'foreground' => '#fff',
                        'src' => 'book-alt',
                    ),
                    'keywords' => array( 'mini', 'card', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));



                // Color Card -Garnet
                acf_register_block(array(
                    'name' => 'color-card-garnet',
                    'title' => __('Color Card - Garnet'),
                    'description' => __('Garnet Color Card with custom settings.'),
                    'render_template' => 'blocks/color-card/color-card-block-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#00263E',
                        'foreground' => '#fff',
                        'src' => 'color-picker',
                    ),
                    'keywords' => array( 'color', 'card', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));


                // CTA -Garnet
                acf_register_block(array(
                    'name' => 'cta-garnet',
                    'title' => __('CTA - Garnet'),
                    'description' => __('Garnet CTA with custom settings.'),
                    'render_template' => 'blocks/cta/cta-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#009BA3',
                        'foreground' => '#fff',
                        'src' => 'button',
                    ),
                    'keywords' => array( 'cta', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));

                // Newsletter -Garnet
                acf_register_block(array(
                    'name' => 'newsletter-garnet',
                    'title' => __('Newsletter - Garnet'),
                    'description' => __('Garnet Newsletter with custom settings.'),
                    'render_template' => 'blocks/newsletter/newsletter-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#F5B800',
                        'foreground' => '#fff',
                        'src' => 'welcome-widgets-menus',
                    ),
                    'keywords' => array( 'newsletter', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));


                // logo Carousel -Garnet
                acf_register_block(array(
                    'name' => 'logo-carousel-garnet',
                    'title' => __('Logo Carousel - Garnet'),
                    'description' => __('Garnet Logo Carousel with custom settings.'),
                    'render_template' => 'blocks/logo-carousel/logo-carousel-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#00263E',
                        'foreground' => '#fff',
                        'src' => 'slides',
                    ),
                    'keywords' => array( 'logo', 'carousel', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));


                //  Post Carousel -Garnet
                acf_register_block(array(
                    'name' => 'post-carousel-garnet',
                    'title' => __('Post Carousel - Garnet'),
                    'description' => __('Garnet Post Carousel with custom settings.'),
                    'render_template' => 'blocks/post-carousel/post-carousel-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#8F001A',
                        'foreground' => '#fff',
                        'src' => 'embed-post',
                    ),
                    'keywords' => array( 'post', 'carousel', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));

                // Testimonial -Garnet
                acf_register_block(array(
                    'name' => 'testimonial-garnet',
                    'title' => __('Testimonial - Garnet'),
                    'description' => __('Garnet Testimonial with custom settings.'),
                    'render_template' => 'blocks/testimonial-slider/testimonial-slider-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#00263E',
                        'foreground' => '#fff',
                        'src' => 'welcome-widgets-menus',
                    ),
                    'keywords' => array( 'testimonial', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));

                  // Team -Garnet
                   acf_register_block(array(
                    'name' => 'team-garnet',
                    'title' => __('Team - Garnet'),
                    'description' => __('Garnet Team with custom settings.'),
                    'render_template' => 'blocks/team/team-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#00263E',
                        'foreground' => '#fff',
                        'src' => 'welcome-widgets-menus',
                    ),
                    'keywords' => array( 'team', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));

                //  Projects -Garnet
                acf_register_block(array(
                    'name' => 'projects-garnet',
                    'title' => __('Projects - Garnet'),
                    'description' => __('Garnet Projects with custom settings.'),
                    'render_template' => 'blocks/projects/projects-garnet.php',
                    'category' => 'garnet-family-blocks',
                    'icon' => array(
                        'background' => '#00263E',
                        'foreground' => '#fff',
                        'src' => 'welcome-widgets-menus',
                    ),
                    'keywords' => array( 'projects', 'family', 'block' ),
                    'multiple' => true,
                    'mode' => 'edit',
            
                ));
                

        

            }
}
add_action('acf/init', 'garnet_family_block_register');



