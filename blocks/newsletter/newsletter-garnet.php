<?php 
// block render template

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Color Card Block Template
 * 
 * @param array $attributes The block attributes.
 * 
 * @return string The block HTML.
 */

//  acf fields for the block Newsletter - Garnet:

    $image = get_field('image');
    $form_code = get_field('form_code');
    $content = get_field('content');
    $padding = get_field('padding');

 

    // check if content is empty and image is not empty and form code is not empty
    if (empty($content) && empty($image) && empty($form_code)) {
        return;
    }

?>

<section class="network <?php if($padding == 'enable'): echo "section-padding"; endif; ?>">
    <div class="container p-0 max-1440">
        <div class="row position-relative">
            <div class="col-lg-10 offset-lg-2 text-end">
                <?php echo render_image($image); ?>
            </div>
            <div class="newsletter-content">
                <div class="--content">
                    <?php echo $content; ?>
                </div>
                <div class="--newsletter">
                    <?php echo $form_code; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- styling -->

<style>
    .section-padding {
        padding: 10rem 0;
    }
</style>