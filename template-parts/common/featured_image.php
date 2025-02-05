<?php
	// Featured Image
	if (has_post_thumbnail()) {
		?>
		<div class="post-thumbnail">
				<?php the_post_thumbnail('large', ['class' => 'img-fluid w-100', 'alt' => '' . $title . '']); ?>
		</div>
	<?php } else { ?>
		<div class="post-thumbnail">
				<img src="<?= $url ?>/assets/images/placeholder_img.svg" alt="INBC" class="img-fluid w-100">
		</div>
	<?php } ?>