<?php 
/* 
 * Team - Garnet
 */


// acf field to select team category
$team_category_id = get_field('select_team_category');
$team_text = get_field('team_text');
$enable_padding = get_field('enable_padding');

// if the field is empty, return early
// if (empty($team_category)) {
//     return;
// }


// get the team posts using the category ID create custom query
$team_posts = new WP_Query(array(
    'post_type' => 'garnet-team',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'team_category',
            'field' => 'term_id',
            'terms' => $team_category_id,
        ),
    ),
));


?>

<!-- Team listing -->
<section id="team" class="team-listing">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 p-0" id="team-modal">
                <!-- Popup Container -->
                <div class="team-popup">
                    <div class="team-popup-content">
                        <!-- Content will be populated dynamically -->
                    </div>
                </div>
                <?php while ($team_posts->have_posts()) {
                    $team_posts->the_post(); ?>
                <div class="team-card team-card-popup position-relative pointer" data-id="<?php the_ID(); ?>">
                    <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid w-100" alt="Team Member Name">
                    <div class="member-info">
                        <h5 class="member-title"><?php the_title(); ?></h5>
                        <p><?php the_excerpt(); ?></p>
                        <div id="links" class="links d-flex justify-content-between align-items-center">
                            <a class="linkedin-btn" href="#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                                    <path d="M20.08 0C9.03 0 0.08 8.95 0.08 20C0.08 31.04 9.03 40 20.08 40C31.12 40 40.08 31.04 40.08 20C40.08 8.95 31.12 0 20.08 0ZM15.18 28.28H11.13V15.25H15.18V28.28ZM13.13 13.65C11.85 13.65 11.02 12.75 11.02 11.62C11.02 10.48 11.88 9.60 13.18 9.60C14.49 9.60 15.29 10.48 15.31 11.62C15.31 12.75 14.49 13.65 13.13 13.65ZM29.97 28.28H25.92V21.06C25.92 19.38 25.33 18.24 23.87 18.24C22.75 18.24 22.09 19.01 21.79 19.76C21.68 20.02 21.66 20.4 21.66 20.77V28.28H17.60V19.41C17.60 17.78 17.55 16.42 17.50 15.25H21.02L21.20 17.06H21.28C21.82 16.21 23.12 14.96 25.31 14.96C27.97 14.96 29.97 16.74 29.97 20.58V28.28Z" fill="#8F001A"/>
                                </svg>
                            </a>
                            <h6>Read More</h6>
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
                    <?php } 
                    wp_reset_postdata();
                    ?>
            </div>
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
                        <img id="teamImage" src="team-member-image.jpg" alt="Team Member">
                    </div>
                    <div class="col-md-7 p-0">
                        <div class="--content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h4 id="memberName">Team Member Name</h4>
                            <p id="designation">Team Member Role</p>
                            <div id="popupcontent">Team member description goes here.</div>
                            <a id="linkdin-btn" class="linkedin-btn" href="#" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
                                    <path d="M20.08 0C9.03 0 0.08 8.95 0.08 20C0.08 31.04 9.03 40 20.08 40C31.12 40 40.08 31.04 40.08 20C40.08 8.95 31.12 0 20.08 0ZM15.18 28.28H11.13V15.25H15.18V28.28ZM13.13 13.65C11.85 13.65 11.02 12.75 11.02 11.62C11.02 10.48 11.88 9.60 13.18 9.60C14.49 9.60 15.29 10.48 15.31 11.62C15.31 12.75 14.49 13.65 13.13 13.65ZM29.97 28.28H25.92V21.06C25.92 19.38 25.33 18.24 23.87 18.24C22.75 18.24 22.09 19.01 21.79 19.76C21.68 20.02 21.66 20.4 21.66 20.77V28.28H17.60V19.41C17.60 17.78 17.55 16.42 17.50 15.25H21.02L21.20 17.06H21.28C21.82 16.21 23.12 14.96 25.31 14.96C27.97 14.96 29.97 16.74 29.97 20.58V28.28Z" fill="#8F001A"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

