jQuery(window).on('load', function() {
  if (jQuery('.blog-slider').length) {
      jQuery('.blog-slider').slick({
          dots: false,
          infinite: true,
          speed: 2000,
          slidesToShow: 3,
          slidesToScroll: 3,
          arrows: true,
          prevArrow: '<button type="button" class="slick-prev" style="display:none;"></button>',
          nextArrow: "<button type='button' class='slick-next'><svg width='20' height='20' viewBox='0 0 20 20' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M2.5 10.0003H17.5M17.5 10.0003L10.4167 2.91699M17.5 10.0003L10.4167 17.0837' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'/></svg></button>",
          autoplay: true,
          autoplaySpeed: 2000,
          pauseOnHover: true,
          responsive: [
              {
                  breakpoint: 1024,
                  settings: {
                      slidesToShow: 3,
                      slidesToScroll: 3,
                      infinite: true,
                      dots: false
                  }
              },
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2
                  }
              },
              {
                  breakpoint: 480,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                  }
              }
          ]
      });
  }
});
