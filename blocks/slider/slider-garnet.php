<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Get ACF fields for the slider section
$section_title = get_field('section_title');
$slider_items = get_field('slider_items');
$slider_image = get_field('slider_image');

?>


<!-- Serving Section -->
<section class="serving-section"> 
    <div class="serving-bg"> 
        <div class="container"> 
            <h2 class="serving-title"><?php echo $section_title; ?></h2> 
            <div class="row serving-content-col"> 
                <div class="col-lg-6"> 
                    <div class="testimonial-container"> 
                        <div class="navigation-bar"> 
                            <?php foreach($slider_items as $index => $item): ?> 
                                <div class="nav-dot <?php echo ($index == 0) ? 'active' : ''; ?>" data-index="<?php echo $index; ?>"></div> 
                            <?php endforeach; ?> 
                        </div> 
                        <div class="testimonial-wrapper"> 
                            <?php foreach($slider_items as $index => $item): ?> 
                                <div class="testimonial <?php echo ($index == 0) ? 'active' : ''; ?>"> 
                                    <p class="testimonial-text"> 
                                    <?php echo $item['slider_text']; ?> 
                                    </p> 
                                </div> 
                            <?php endforeach; ?> 
                        </div> 
                    </div> 
                </div> 
                <div class="col-lg-6 serving-img-col"> 
                    <img src="<?php echo $slider_image; ?>" alt="Service Image" class="serving-image"> 
                </div> 
            </div> 
        </div> 
    </div> 
</section>

<style>
    /* Serving Section */
.serving__section {
    /* padding: 16rem 0; */
    margin-top: -12rem;
    z-index: -1;
    background-color: blue;
    position: relative;
    overflow: hidden;
    background-image: url('../images/who-serve-background.svg');
    background-repeat: no-repeat;
    background-size: 60rem 60rem;
    background-position: right center;
}

.serving__section h2 {
    font-size: 3.6rem;
    font-weight: 700;
    margin-bottom: 4rem;
    color: blue;
}

.serving-part {
    height: 40rem;
    border-radius: 1.2rem 0 0 1.2rem;
    background-color: #fff;
}

.serving-part p {
    padding-left: 5rem;
    padding-right: 2rem;
}

.section-title {
    font-size: 3.6rem;
    font-weight: 700;
    margin-bottom: 4rem;
    color: #fff;
    position: relative;
}

.serving-text {
    color: #fff;
    font-size: 1.6rem;
    line-height: 1.8;
    margin-bottom: 3rem;
    position: relative;
}

.serving-image {
    width: 100%;
    height: 40rem;
    object-fit: cover;
    border-radius: 0 1.2rem 1.2rem 0;
    position: relative;
    z-index: 1;
}

</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const testimonials = document.querySelectorAll('.testimonial');
        const navDots = document.querySelectorAll('.nav-dot');
        let currentIndex = 0;
        let interval;

  function showTestimonial(index) {
      testimonials.forEach(testimonial => {
          testimonial.classList.remove('active');
      });
      navDots.forEach(dot => {
          dot.classList.remove('active');
      });

      testimonials[index].classList.add('active');
      navDots[index].classList.add('active');
  }

  function nextTestimonial() {
      currentIndex = (currentIndex + 1) % testimonials.length;
      showTestimonial(currentIndex);
  }

  function startAutoScroll() {
      interval = setInterval(nextTestimonial, 3000);
  }

  function stopAutoScroll() {
      clearInterval(interval);
  }

  navDots.forEach(dot => {
      dot.addEventListener('click', function() {
          stopAutoScroll();
          currentIndex = parseInt(this.dataset.index);
          showTestimonial(currentIndex);
          startAutoScroll();
      });
  });

  // Start auto-scrolling
  startAutoScroll();

  // Pause on hover
  const testimonialContainer = document.querySelector('.testimonial-container');
  testimonialContainer.addEventListener('mouseenter', stopAutoScroll);
  testimonialContainer.addEventListener('mouseleave', startAutoScroll);
});

</script>