<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package garnet
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png" type="image/x-icon" />

    <?php
    if (get_field('head_scripts', 'options')) {
        echo get_field('head_scripts', 'options');
    }
    ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();

    $url = get_bloginfo('template_url');

    // Body scripts
    if (get_field('body_scripts', 'options')) {
        echo get_field('body_scripts', 'options');
    }

    ?>

    <main id="site-wrap" class="site-wrap" role="main">
        <section class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="--content d-flex align-items-center">
                            <?php echo get_field('important_message', 'options'); ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <header class="site-header  " id="site-header">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-2 col-xl-2">

                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo d-inline-block">
                            <?php
                            $site_logo = get_field('logo', 'options');
                            $darklogo = get_field('colored_logo', 'options');
                            ?>

                            <img src="<?php echo $site_logo['url']; ?>" class="img-fluid --light"
                                alt="<?php echo get_bloginfo(); ?>">

                        </a>
                    </div>
                    <div class="col-10 col-xl-10">
                        <div id="site-navigation" class="site-navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"
                                aria-label="Burger Menu">
                                <svg class="destop-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path d="M3 12H21M3 6H21M3 18H21" stroke="#8F001A" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <svg class="mobile-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path d="M18 6L6 18M6 6L18 18" stroke="#8F001A" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </button>
                            <nav id="main-navigation"
                                class="main-navigation d-lg-flex align-items-center justify-content-end">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'menu-1',
                                        'menu_id' => 'primary-menu',
                                    )
                                );
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>