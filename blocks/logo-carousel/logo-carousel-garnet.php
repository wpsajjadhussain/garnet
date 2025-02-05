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

//  acf fields for the block Logo Carousel - Garnet:

    $brand_logos = get_field('brand_logos');
    $number_of_logos = get_field('number_of_logos');
    $secion_padding = get_field('section_padding');

    if (empty($brand_logos) || !is_array($brand_logos)) {
        return;
    }
    
    // Chunk array into groups of 4 logos per slide
    $logo_chunks = array_chunk($brand_logos, $number_of_logos);

    ?>
    
    <section class="brand-logos <?php if($secion_padding == 'enable') : ?>py-5 <?php endif; ?>">
        <div class="container">
            <div id="brand-logos" class="carousel slide carousel-dark" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($logo_chunks as $index => $chunk) : ?>
                        <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                            <div class="row justify-content-center">
                                <?php foreach ($chunk as $brand_logo) : ?>
                                    <div class="col-6 col-md-3 text-center">
                                        <?php if (!empty($brand_logo['logo'])) : ?>
                                           <?php render_image($brand_logo['logo']); ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
    
                <!-- Carousel Controls -->
                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#brand-logos" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#brand-logos" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button> -->
            </div>
        </div>
    </section>
    
    <style>
        .brand-logos img {
            max-height: 80px; /* Adjust logo height */
            filter: grayscale(100%);
            transition: 0.3s;
        }
    
        .brand-logos img:hover {
            filter: grayscale(0%);
            transform: scale(1.1);
        }
    </style>
    
    

