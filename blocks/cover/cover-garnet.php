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

//  acf fields for the block Cover - Garnet:

$background_image = get_field('background_image');
$content = get_field('content');
$link = get_field('link');

// setting
$number_of_columns = get_field('number_of_column');
$alignment = get_field('alignment');


// check if the fields have been filled
if (empty($content) && empty($background_image)) {
    return;
}

?>

<section class="cover" style="background-image: url('<?php echo $background_image['url']; ?>'); background-size: cover; background-position: center center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row justify-content-<?php echo $alignment; ?>">
                    <div class="col-<?php echo $number_of_columns; ?> card-content">
                        <?php echo $content; ?>
                        <?php if ($link) : ?>
                            <a href="<?php echo esc_url($link['url']); ?>" class="btn primary-btn">
                                <?php echo $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- styling -->

<style>
   .cover .card-content{
        background: var(--white);
        text-align: center;
        padding: 2rem;
        border: 1.6rem solid var(--white);
        border-radius: 2rem;
    }
    .cover {
        padding:12rem 0;
        border-radius: 2rem;
        background-size: cover;
        background-position: center center;
    }

</style>