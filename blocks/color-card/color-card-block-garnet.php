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

//  acf fields for the block Color Card - Garnet: headings,  card repeater within card title, link card_background, content.Also block_padding, cards_spacing, block_background

$heading = get_field('headings');


// settings
$block_padding = get_field('block_padding');
$cards_spacing = get_field('cards_spacing');
$block_background = get_field('block_background');

// cards repeater
$cards = get_field('cards');

if (empty($heading) && empty($cards)) {
    return;
}


?>

<section class="garnet-color-card <?php echo $block_background; ?> ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if ($heading) : ?>
                    <h2><?php echo $heading; ?></h2>
                <?php endif; ?>
            </div>
                <?php foreach ($cards as $card) : ?>
                    <div class="col-lg-3 <?php echo $card['card_background']; ?> <?php if($block_padding == 'enable') echo "block-padding"; ?> <?php if($cards_spacing == 'enable') echo "cards-spacing"; ?>">
                        <?php if ($card['title']) : ?>
                            <h4><?php echo $card['title']; ?></h4>
                        <?php endif; ?>
                        <?php if ($card['content']) : ?>
                            <?php echo $card['content']; ?>
                        <?php endif; ?>
                        <?php if ($card['link']) : ?>
                            <a href="<?php echo $card['link']['url']; ?>">
                                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="64" height="64" rx="32" fill="black" fill-opacity="0.2"/>
                                        <path d="M24.5 32.0001H39.5M39.5 32.0001L32.4167 24.9167M39.5 32.0001L32.4167 39.0834" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
</section>


<style>

    .garnet-color-card h4, .garnet-color-card p {
        color: #ffffff;
        
    }
    /* only target the p */
    .garnet-color-card p {
        padding-bottom: 4.5rem;
    }

    .block-padding {
        padding: 2.5rem;
    }

    .cards-spacing {
        margin-bottom: 2.5rem;
    }

    .bg-teal {
        background-color: #0d9488 !important;
    }
    .bg-red {
        background-color: #8F001A !important;
    }
    .bg-white {
        background-color: #ffffff !important;
    }
    .bg-navy {
        background-color: #0d1f2d !important;
    }
    .bg-yellow {
        background-color: #f5b800 !important;
    }
    .bg-teal-light {
        background-color: #00a699 !important;
    }
    .bg-red-light {
        background-color: #8f001a !important;
    }
    .bg-red-light {
        background-color: #8f001a !important;
    }
    .bg-white {
        background-color: #ffffff !important;
    }
    .bg-navy {
        background-color: #0d1f2d !important;
    }
    .bg-yellow {
        background-color: #f5b800 !important;
    }
    .bg-teal-light {
        background-color: #00a699 !important;
    }
    .bg-red-light {
        background-color: #8f001a !important;
    }

</style>