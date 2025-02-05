<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package garnet
 */

get_header();

$slug = get_the_permalink();
$title = get_the_title();
$url = get_bloginfo('template_url');

// Get the current category
$current_category = single_cat_title('', false);

// Get the current tag
$current_tag = single_tag_title('', false);


?>


<section class="article-section pt-170">
	<div class="container all-articles">
		<div class="row">
			<!-- Filters -->
			<div class="col-md-12 articles-filter">
				<h1 class="h3 mb-32">
					<?php
					if ($current_category) {
						echo $current_category;
					} else {
						echo $current_tag;
					}
					?>
				</h1>

			</div>
		</div>
		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 9, // Show all posts
			'post_status' => 'publish',
			'tax_query' => array(
				'relation' => 'OR',
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $current_category,
				),
				array(
					'taxonomy' => 'post_tag',
					'field' => 'slug',
					'terms' => $current_tag,
				),
			),
		);

		$posts = get_posts($args);
		?>
		<div class="row gap-32" id="posts">
			<?php
			foreach ($posts as $post) {
				setup_postdata($post);
				get_template_part('template-parts/common/article');
			}
			// wp_reset_postdata();
			wp_reset_query();
			?>

		</div>
		<?php

		// nothing found
		echo '<p class="posts_not_found" style=" display: none; "> Nothing found</p>';
		?>
	</div>
</section>
<?php


get_footer();
