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

//  acf fields for the block CTA - Garnet:
// acf repeater cta_card within content, button, button_second

$content = get_field('cta_card'); // Retrieve the CTA card content
$card_type = get_field('card_type');
$button_type = get_field('button_type');

if (empty($content) && empty($card_type) && empty($button_type)) {
    return;
}
?>

<section class="cta-garnet">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12">
                <div class="row">
                    <?php if (!empty($content) && is_array($content)): ?>
                        <?php foreach ($content as $card): ?>
                            <div class="<?php echo ($card_type == 'single') ? 'col-lg-3' : 'col-lg-6'; ?>">
                                <div class="card">
                                    <div class="card-content">
                                        <h2 class="h3">
                                            <?php echo $card['content']; ?>
                                        </h2>
                                            <?php if (!empty($card['button']) && $button_type == 'text'): ?>
                                                <?php if (!empty($card['button']['url'])): ?>
                                                <a href="<?php echo esc_url($card['button']['url']); ?>" class="btn btn primary-btn">
                                                    <?php echo esc_html($card['button']['title']); ?>
                                                </a>
                                                <?php endif; ?>
                                                <?php if (!empty($card['button_second']['url'])): ?>
                                                <a href="<?php echo esc_url($card['button_second']['url']); ?>" class="btn btn primary-btn">
                                                    <?php echo esc_html($card['button_second']['title']); ?>
                                                </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if (!empty($card['button']) && $button_type == 'icon'): ?>
                                                <?php if (!empty($card['button']['url'])): ?>
                                                <a href="<?php echo esc_url($card['button']['url']); ?>" class="icon-btn">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2.5 9.99984H17.5M17.5 9.99984L10.4167 2.9165M17.5 9.99984L10.4167 17.0832" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <?php endif; ?>
                                                <?php if (!empty($card['button_second']['url'])): ?>
                                                <a class="icon-btn" href="<?php echo esc_url($card['button_second']['url']); ?>">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2.5 9.99984H17.5M17.5 9.99984L10.4167 2.9165M17.5 9.99984L10.4167 17.0832" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<style>
    .card{
        background-color: #FEF8E6;
        padding:4.4rem 4rem 6rem 4rem;
        width: 100%;
    }
    .icon-btn{
        padding:2rem;
        border-radius: 100%;
        background-color: #8f001a;
    }
</style>