<?php 
// block render template

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Content Card Block Template
 * 
 * @param array $attributes The block attributes.
 * 
 * @return string The block HTML.
 */

//  acf fields for the block Content Card - Garnet: fields name, image, heading, content, options tab within options tab Section background, content Background CTAs

$heading = get_field('heading');
$content = get_field('content');
$image = get_field('image');
$cta = get_field('cta');
$section_background = get_field('section_background');
$content_background = get_field('content_background');


if ( !empty($heading) || !empty($content) || !empty($image) ): ?>
<section class="content-card <?php if($section_background == 'enable'): echo 'bg-color-garnet'; endif; ?>">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10">
                    <h4><?php echo $heading; ?></h4>
                <div class="row align-items-center <?php if($content_background == 'enable'): echo 'bg-color'; endif; ?>">
                    <div class="col-lg-6">
                            <div class="content">
                                <?php echo $content; ?>
                                <?php if ($cta): ?>
                                    <?php echo render_hero_cta_buttons($cta); ?>
                                <?php endif; ?>
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="image">
                            <?php echo render_image($image); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<style>
    .bg-color-garnet {
        background-color: #EDF7F9;
    }
    .bg-color {
        background-color: #FFFFFF;
    }
</style>