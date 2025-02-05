<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package garnet
 */

get_header();
?>
<?php
$page404_content = get_field('404_content', 'options');
?>
<section class="page_404 pt-170">
	<div class="container">
		<div class="row ">
			<div class="col-md-12 text-center">
				<div class="--content">
					<?= $page404_content; ?>
				</div>
			</div>
		</div>
		<div class="row justify-content-between ">
			<?php
			if (have_rows('plans', 'options')):
				while (have_rows('plans', 'options')):
					the_row();
					$opportunity_title = get_sub_field('opportunity_title'); ?>
					<?php
					$link = get_sub_field('link', 'options');
					if ($link):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self'; ?>
						<div class="col-lg-4 col-md-6 position-relative max-39 mb-32 d-md-block d-none">
							<div class="--plancontent">
								<a class="stretched-link" href="<?php echo esc_url($link_url); ?>" target="_blank">
									<?= $link_title ?>
									<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
										<path d="M5.5 12H19.5M19.5 12L12.5 5M19.5 12L12.5 19" stroke="#304841"
											stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</a>
							</div>
						</div>
					<?php endif; endwhile; endif; ?>
			<div class="mobile-button d-md-none d-sm-block text-center">
				<a class=" btn secondary-btn" href="/">Go back to home</a>
			</div>
		</div>
	</div>
</section>

<?php
$image = get_field('image', 'options');
if (!empty($image)): ?>
	<section class="image-overlay-wrap overlay-image">
		<div class="--cover">
			<span class="--overlay"></span>
			<figure>
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid" />
			</figure>
		</div>
	</section>
<?php endif; ?>

<?php
get_footer();
