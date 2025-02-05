<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Get ACF fields for the slider section
$section_title = get_field('section_title');
$slider_items = get_field('slider_items');
$slider_image = get_field('slider_image');

?>


<!-- Testimonial Slider -->
<section class="testimonial-slider">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <h2 class="section-title"><?php echo $section_title; ?></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 slider-container">
                <div class="row testimonial-slider-wrapper">
                    <div class="col-lg-6 slider">
                        <?php 
                        if($slider_items): ?>
                            <?php
                            foreach ($slider_items as $item):
                                // echo $item['slider_text'];
                            ?>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <?php echo $item['slider_text']; ?>
                                </div>
                            </div>
                            <?php
                            endforeach;
                            ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-4 slider-image">
                        <!-- image slider -->
                        <?php 
                        if($slider_image): 
                            ?>
                            <?php render_image($slider_image); ?>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Testimonial Slider slick slider -->
<script>
    jQuery(document).ready(function($) {
        $('.testimonial-slider-wrapper .slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev" style="display:none;"></button>',
            nextArrow: '<button type="button" class="slick-next-btn"></button>',
            dots: false,
            autoplay: true,
            autoplaySpeed: 5000,
            // direction vertical
            vertical: true,
        });
        
        
    });
</script>



<!-- slider css -->
<style>
   .testimonial-slider .slider-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        position: relative;
    }
    .slick-next-btn {
        background: green;
        height: 3rem;
        width: 1rem;
        position: relative;
        top: 50%;
    }

</style>