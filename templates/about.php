<?php
/**  
 * Template Name: About
 */


get_header();
$url = get_bloginfo('template_url'); ?>


<section class="research about-hero">
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

<!-- Team -->
<!-- Team listing -->
<section id="team" class="team-listing">
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'garnet-team',
                'posts_per_page' => -1,
            );
            $team_query = new WP_Query($args);
            $counter = 0;


            if ($team_query->have_posts()) {
                while ($team_query->have_posts()) {
                    $team_query->the_post();
                    $counter++;
                    if (get_the_content()) {
                        $viewpost = 'view-post';
                        $teamcard = 'team-card ';
                        $teamcardhover = ' ';
                    } else {
                        $viewpost = '';
                        $teamcard = '';
                        $teamcardhover = 'team-card-hover';
                    }
                    ?>
                    <div class="col-md-6 col-lg-4 p-0" id="team-modal">
                        <!-- Popup Container -->
                        <div class="team-popup">
                            <div class="team-popup-content">
                                <!-- Content will be populated dynamically -->
                            </div>
                        </div>
                        <div class="<?php echo $teamcardhover; ?>  <?php echo $teamcard; ?> team-card-popup <?php echo $viewpost; ?> position-relative pointer"
                            data-id="<?php the_ID(); ?>">
                            <?php the_post_thumbnail('full', ['class' => 'img-fluid w-100', 'alt' => '' . $title . '']); ?>
                            <div class="member-info">
                                <h5 class="-member-title">
                                    <?php the_title(); ?>
                                </h5>
                                <?php the_excerpt(); ?>
                                <div id="links" class="links d-flex justify-content-between align-items-center">
                                    <?php
                                    $link = get_field('linkedin_link');
                                    if ($link):
                                        ?>
                                        <a class="linkdin-btn" href="<?php echo $link; ?>" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40"
                                                fill="none">
                                                <path
                                                    d="M20.0801 0C9.03425 0 0.0800781 8.95417 0.0800781 20C0.0800781 31.0458 9.03425 40 20.0801 40C31.1259 40 40.0801 31.0458 40.0801 20C40.0801 8.95417 31.1259 0 20.0801 0ZM15.1842 28.2896H11.1342V15.2562H15.1842V28.2896ZM13.1342 13.6562C11.8551 13.6562 11.028 12.75 11.028 11.6292C11.028 10.4854 11.8801 9.60625 13.1863 9.60625C14.4926 9.60625 15.2926 10.4854 15.3176 11.6292C15.3176 12.75 14.4926 13.6562 13.1342 13.6562ZM29.9759 28.2896H25.9259V21.0667C25.9259 19.3854 25.3384 18.2437 23.8738 18.2437C22.7551 18.2437 22.0905 19.0167 21.7967 19.7604C21.6884 20.025 21.6613 20.4 21.6613 20.7729V28.2875H17.6092V19.4125C17.6092 17.7854 17.5572 16.425 17.503 15.2542H21.0217L21.2072 17.0646H21.2884C21.8217 16.2146 23.128 14.9604 25.3134 14.9604C27.978 14.9604 29.9759 16.7458 29.9759 20.5833V28.2896Z"
                                                    fill="#8F001A" />
                                            </svg>
                                        </a>
                                    <?php endif;
                                    if (get_the_content()) { ?>
                                        <h6>Read More</h6>
                                    <?php } ?>
                                </div>
                            </div>
                            <div id="loader" class="loader" style="display:none;">
                                <svg class="loadersvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                                    <g>
                                        <ellipse id="ellipse" cx="50" cy="50" rx="25" ry="25" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($counter == 2) {
                        echo '</div><div class="row">';
                    }
                }
                wp_reset_postdata();
            } else {
                echo 'No team members found.';
            }
            ?>
        </div>

    </div>
</section>


<!-- Modal -->
<div class="modal" id="teamModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 p-0">
                        <img id="teamImage">
                    </div>
                    <div class="col-md-7 p-0">
                        <div class="--content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h4 id="memberName"></h4>
                            <p id="designation"></p>
                            <div id="popupcontent"></div>
                            <a id="linkdin-btn" class="linkdin-btn" href="" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40"
                                    fill="none">
                                    <path
                                        d="M20.0801 0C9.03425 0 0.0800781 8.95417 0.0800781 20C0.0800781 31.0458 9.03425 40 20.0801 40C31.1259 40 40.0801 31.0458 40.0801 20C40.0801 8.95417 31.1259 0 20.0801 0ZM15.1842 28.2896H11.1342V15.2562H15.1842V28.2896ZM13.1342 13.6562C11.8551 13.6562 11.028 12.75 11.028 11.6292C11.028 10.4854 11.8801 9.60625 13.1863 9.60625C14.4926 9.60625 15.2926 10.4854 15.3176 11.6292C15.3176 12.75 14.4926 13.6562 13.1342 13.6562ZM29.9759 28.2896H25.9259V21.0667C25.9259 19.3854 25.3384 18.2437 23.8738 18.2437C22.7551 18.2437 22.0905 19.0167 21.7967 19.7604C21.6884 20.025 21.6613 20.4 21.6613 20.7729V28.2875H17.6092V19.4125C17.6092 17.7854 17.5572 16.425 17.503 15.2542H21.0217L21.2072 17.0646H21.2884C21.8217 16.2146 23.128 14.9604 25.3134 14.9604C27.978 14.9604 29.9759 16.7458 29.9759 20.5833V28.2896Z"
                                        fill="#8F001A" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>