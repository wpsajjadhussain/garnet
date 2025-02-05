<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package troon
 */ 
$image = get_sub_field('image');
if( !empty($image) ): ?>
	<figure>
		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="img-fluid" />
	</figure> 
<?php endif;