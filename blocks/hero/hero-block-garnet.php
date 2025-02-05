<?php 
// block render template

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Hero Block Template
 * 
 * @param array $attributes The block attributes.
 * 
 * @return string The block HTML.
 */

//  acf fields for the block Hero Block - Garnet:

$image = get_field('image');
$background_position = get_field('background_position');
$bleed = get_field('bleed');
$content = get_field('content');
$cta = get_field('ctas');
// generate rendom id for the section the id should be unique but 2 digits max 3 digits total but should be unique in every page
$section_id = 'hero-' . rand(10, 999);




// return if empty if image and content empty
if (empty($image) && empty($content)) {
    return;
}

?>
    <section class="hero-section position-relative" id="<?php echo $section_id; ?>">
    <div class="container position-relative z-3">
        <?php 
            $post = get_post();
            if ( $post->post_parent ) {
                ?>
                <div class="breadcrumbs">
                    <?php garnet_family_breadcrumb(); ?>
                </div>
            <?php
            }
        ?>
        <div class="row align-items-center">
            <div class="col-lg-5">
                <?php if ($content): ?>
                    <div class="hero__content">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
                <?php if ($cta): ?>
                    <?php echo render_hero_cta_buttons($cta); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-7">
                <?php echo render_image($image); ?>
                <?php if ($background_position == 'bg_left'): ?>
                    <div class="bg-left"></div>
                <?php endif; ?>
                <?php if ($background_position == 'bg_right'): ?>
                    <div class="bg-right"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if ($bleed == 'enable'): ?>
        <div class="container-fluid bleed">
        </div>
    <?php endif; ?>
   
</section>

 
